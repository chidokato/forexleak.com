<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\DepositTransaction;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::with('children')->where('parent', 0)->orderBy('view', 'asc')->get();
        view()->share([
            'setting' => $setting,
            'menu' => $menu,
        ]);
    }

    public function dangnhap()
    {
        return view('account.login');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('account.main', compact('user'));
    }

    public function category($url)
    {
        $user = User::find(Auth::user()->id);
        if ($url == 'deposit') {
            $transactions = DepositTransaction::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            return view('account.deposit', compact(
                'user',
                'transactions',
            ));
        }
    }

    public function transfer($url)
    {
        $user = User::find(Auth::user()->id);
        return view('account.transfer', compact('user', 'url'));

    }

    /* =============================
       ⚙️  Các hàm xử lý nạp tiền
       ============================= */

    // 📜 Hiển thị lịch sử nạp
    public function depositHistory()
    {
        $transactions = DepositTransaction::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Nếu bạn muốn trả JSON (API)
        // return response()->json($transactions);

        // Nếu bạn muốn render view
        return view('account.deposit_history', compact('transactions'));
    }

    public function showDeposit($id)
    {
        $transaction = DepositTransaction::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        // Hết hạn sau 1 phút
        $expiresAt = $transaction->created_at->addMinutes(10);

        // Nếu đã quá hạn và vẫn pending => đổi sang cancelled
        if (now()->greaterThan($expiresAt) && $transaction->status === 'pending') {
            $transaction->update([
                'status' => 'cancelled',
            ]);
        }

        $remainingSeconds = max(0, $expiresAt->diffInSeconds(now(), false) * -1);

        return view('account.deposit_confirm', compact('transaction', 'remainingSeconds'));
    }

    // ➕ Tạo lệnh nạp mới
    public function depositCreate(Request $request)
    {
        // $validated = $request->validate([
        //     'amount' => 'required|numeric|min:1000',
        // ]);

        $transaction = DepositTransaction::create([
            'user_id' => Auth::id(),
            'order_code' => 'ORD-' . strtoupper(Str::random(10)),
            'amount' => $request->amount,
            'method' => $request->methods,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('account.showDeposit', ['id' => $transaction->id]);
    }

    // Cập nhật trạng thái nạp tiền
    public function depositUpdate(Request $request, $id)
    {
        $transaction = DepositTransaction::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,processing,success,failed,cancelled',
            'note' => 'nullable|string',
        ]);

        $transaction->update([
            'status' => $validated['status'],
            'note' => $validated['note'] ?? $transaction->note,
            'confirmed_at' => $validated['status'] === 'success' ? now() : null,
        ]);

        return response()->json([
            'message' => 'Cập nhật trạng thái thành công.',
            'data' => $transaction
        ]);
    }


    public function depositCancel($id)
    {
        $tx = DepositTransaction::where('user_id', Auth::id())->findOrFail($id);

        // chỉ cho hủy khi đang chờ
        if (in_array($tx->status, ['pending','processing'])) {
            $tx->update(['status' => 'cancelled']);
        }

        return redirect('account/deposit')->with('success', 'Đã hủy lệnh nạp.');
    }

    public function depositConfirm(Request $request, $id)
    {
        $tx = DepositTransaction::where('user_id', Auth::id())->findOrFail($id);

        // bắt buộc có ảnh, tối đa 5MB
        $request->validate([
            'proof' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        // lưu ảnh vào storage/public/deposit_proofs
        $path = $request->file('proof')->store('deposit_proofs', 'public');

        $tx->update([
            'status'            => 'processing',              // "chờ xác nhận"
            'proof_image_path'  => $path,
        ]);

        return redirect('account/deposit')->with('success', 'Đã gửi ảnh xác nhận. Vui lòng chờ duyệt.');
    }






}
