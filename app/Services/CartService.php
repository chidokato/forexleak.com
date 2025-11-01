<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CartService
{
    protected $cartKey = 'cart';

    // 🧺 Lấy toàn bộ sản phẩm trong giỏ
    public function items()
    {
        return Session::get($this->cartKey, []);
    }

    // ➕ Thêm sản phẩm vào giỏ
    public function add($product, $quantity = 1)
    {
        $cart = $this->items();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price ?? 0,
                'quantity' => $quantity,
            ];
        }

        $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];

        session()->put($this->cartKey, $cart);
    }

    // ➖ Giảm bớt hoặc xóa sản phẩm
    public function remove($id)
    {
        $cart = $this->items();
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put($this->cartKey, $cart);
        }
    }

    // 🔢 Đếm số lượng sản phẩm trong giỏ
    public function count()
    {
        $cart = $this->items();
        return array_sum(array_column($cart, 'quantity'));
    }

    // 💰 Tổng tiền giỏ hàng
    public function total()
    {
        $cart = $this->items();
        return array_sum(array_column($cart, 'subtotal'));
    }

    // 🧹 Xóa giỏ hàng sau khi đặt hàng xong
    public function clear()
    {
        Session::forget($this->cartKey);
    }

    // 🚀 Dùng khi checkout
    public function forCheckout()
    {
        return $this->items();
    }
}
