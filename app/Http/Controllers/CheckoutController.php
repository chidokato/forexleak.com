<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Trang hiển thị thông tin đặt hàng
     */
    public function index()
    {
        $items = $this->cart->forCheckout();
        $total = collect($items)->sum('subtotal');
        return view('checkout.index', compact('items', 'total'));
    }

    /**
     * Xử lý đặt hàng
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone' => 'nullable|string|max:50',
            'customer_address' => 'nullable|string|max:255',
        ]);

        // Lấy dữ liệu giỏ hàng
        $items = $this->cart->forCheckout();
        if (empty($items)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        DB::beginTransaction();
        try {
            // Tính tổng tiền
            $total = collect($items)->sum('subtotal');

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'] ?? null,
                'customer_phone' => $validated['customer_phone'] ?? null,
                'customer_address' => $validated['customer_address'] ?? null,
                'total_price' => $total,
                'status' => 'pending',
            ]);

            // Lưu từng sản phẩm trong đơn
            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            // Xóa giỏ hàng sau khi đặt xong
            $this->cart->clear();

            return redirect()->route('checkout.success', ['order' => $order->id])
                             ->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi khi tạo đơn hàng: ' . $e->getMessage());
        }
    }

    /**
     * Trang thông báo đặt hàng thành công
     */
    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
