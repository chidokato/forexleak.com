<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositTransaction;
use Illuminate\Support\Facades\Auth;

class DepositTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposits = DepositTransaction::latest()->paginate(20);
        return view('admin.deposits.index', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Nếu admin tạo deposit thủ công (tuỳ nhu cầu)
        return view('admin.deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string',
        ]);

        $transaction = DepositTransaction::create([
            'user_id' => Auth::id(),
            'order_code' => 'ORD-' . strtoupper(\Illuminate\Support\Str::random(10)),
            'amount' => $request->amount,
            'method' => $request->method,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('deposits.show', $transaction->id)
            ->with('success', 'Deposit transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $deposit = DepositTransaction::findOrFail($id);
        return view('admin.deposits.show', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $deposit = DepositTransaction::findOrFail($id);
        return view('admin.deposits.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $deposit = DepositTransaction::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $deposit->status = $request->status;
        $deposit->save();

        return redirect()->route('deposits.show', $deposit->id)
            ->with('success', 'Deposit transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deposit = DepositTransaction::findOrFail($id);
        $deposit->delete();

        return redirect()->route('deposits.index')
            ->with('success', 'Deposit transaction deleted successfully.');
    }

    /**
     * Approve a deposit transaction (custom route).
     */
    public function approve($id)
    {
        $deposit = DepositTransaction::findOrFail($id);

        if ($deposit->status !== 'pending') {
            return back()->with('error', 'Transaction cannot be approved.');
        }

        $deposit->status = 'approved';
        $deposit->save();

        // TODO: cộng tiền cho user nếu cần

        return back()->with('success', 'Transaction approved successfully.');
    }

    public function updateStatus(Request $request, DepositTransaction $deposit)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $oldStatus = $deposit->status;
        $newStatus = $request->status;

        // Cập nhật trạng thái giao dịch
        $deposit->status = $newStatus;
        $deposit->save();

        $user = $deposit->user; // User liên kết với giao dịch

        // Nếu chuyển sang approved từ trạng thái khác => cộng tiền
        if ($newStatus === 'approved' && $oldStatus !== 'approved') {
            $user->balance += $deposit->amount;
            $user->save();
        }

        // Nếu chuyển từ approved sang trạng thái khác => trừ tiền
        if ($oldStatus === 'approved' && $newStatus !== 'approved') {
            $user->balance -= $deposit->amount;
            $user->save();
        }

        return back()->with('success', 'Deposit status updated successfully.');
    }


    /**
     * Reject a deposit transaction (custom route).
     */
    public function reject($id)
    {
        $deposit = DepositTransaction::findOrFail($id);

        if ($deposit->status !== 'pending') {
            return back()->with('error', 'Transaction cannot be rejected.');
        }

        $deposit->status = 'rejected';
        $deposit->save();

        return back()->with('success', 'Transaction rejected.');
    }
}
