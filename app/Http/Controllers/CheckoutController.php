<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends HomeController
{
    

    // Hiển thị trang checkout
    public function show()
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('cart.checkout', compact('cart', 'total', 'user'));
    }

    // Xử lý thanh toán
    public function process(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        if ($user->balance < $total) {
            return redirect()->back()->with('error', 'Insufficient balance to pay.');
        }

        DB::beginTransaction();
        try {
            // Trừ tiền user
            $user->balance -= $total;
            $user->save();

            // Tạo đơn hàng
            $orderCode = 'ORD-' . date('Ymd-His') . '-' . strtoupper(Str::random(4));
            $order = Order::create([
                'user_id' => $user->id,
                'order_code' => $orderCode, // thêm vào database
                'customer_name' => $request->customer_name ?? $user->name,
                'total_price' => $total,
                'status' => 'paid',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            // Xóa giỏ hàng
            session()->forget('cart');

            return redirect()->route('checkout.success', $order->id)
                             ->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    // Trang thông báo thành công
    public function success(Order $order)
    {
        return view('cart.success', compact('order'));
    }
}