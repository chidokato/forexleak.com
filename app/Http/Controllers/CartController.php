<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Menu;

class CartController extends Controller
{
    protected CartService $cart;

    public function __construct(CartService $cart)
    {
        $setting = Setting::find('1');
        $menu = Menu::with('children')->where('parent', 0)->orderBy('view', 'asc')->get();
        $this->cart = $cart;

        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
        ]);
    }

    // Hiển thị giỏ hàng
    public function index()
    {
        $items = $this->cart->items();            // Collection of items from session
        $total = $this->cart->total();
        return view('cart.index', compact('items','total'));
    }

    public function add(Request $request)
    {
        //  Kiểm tra dữ liệu gửi lên
        $data = $request->validate([
            'post_id' => 'required|integer|exists:posts,id', //  đổi từ products → posts
            'quantity' => 'nullable|integer|min:1'
        ]);
        // dd($data );
        //  Lấy sản phẩm từ model Post
        $post = Post::findOrFail($data['post_id']);
        $qty = $data['quantity'] ?? 1;

        //  Nếu có kiểm tra tồn kho thì thêm vào đây
        // if (isset($post->stock) && $post->stock < $qty) {
        //     return back()->withErrors('Số lượng vượt quá tồn kho.');
        // }

        //  Thêm sản phẩm vào giỏ hàng
        $this->cart->add($post, $qty);

        return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
    }

    // Update nhiều item cùng lúc (quantity[<id>] => value)
    public function update(Request $request)
    {
        $quantities = $request->input('quantity', []);
        foreach ($quantities as $productId => $qty) {
            $this->cart->update((int)$productId, (int)$qty);
        }
        return redirect()->route('cart.index')->with('success','Giỏ hàng đã được cập nhật.');
    }

    // Xóa 1 item
    public function remove(Request $request)
    {
        $id = $request->input('id');
        $this->cart->remove($id);
        return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }

    // Xóa toàn bộ
    public function clear()
    {
        $this->cart->clear();
        return redirect()->route('cart.index')->with('success','Đã xóa toàn bộ giỏ.');
    }
}
