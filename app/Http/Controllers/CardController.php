<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class CardController extends Controller
{
    // Hàm để hiển thị trang giỏ hàng
    public function cardAction()
    {
        $cart = Session::get('cart', []);
        return view('Website.card', compact('cart'));
    }

    public function carddoneAction()
    {
        return view('Website.carddone');
    }

    public function addToCart(Request $request)
    {
        $product = $request->input('product', []);
        $cart = Session::get('cart', []);

        $existingProductKey = array_search($product['id'], array_column($cart, 'id'));

        if ($existingProductKey !== false) {
            $cart[$existingProductKey]['quantity'] += $product['quantity'];
        } else {
            $cart[] = $product;
        }

        Session::put('cart', $cart);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng!']);
    }

    public function cartCount()
    {
        $cart = Session::get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['count' => $count]);
    }
}
