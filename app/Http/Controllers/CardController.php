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
        return view('website.card', compact('cart'));
    }
    public function carddoneAction()
    {
        return view('website.carddone');
    }

    public function addToCart(Request $request)
    {
        $product = $request->input('product', []);
        $cart = Session::get('cart', []);

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $existingProductKey = array_search($product['id'], array_column($cart, 'id'));

        if ($existingProductKey !== false) {
            // Nếu tồn tại, tăng số lượng sản phẩm
            $cart[$existingProductKey]['quantity'] += $product['quantity'];
        } else {
            // Nếu không tồn tại, thêm sản phẩm mới vào giỏ hàng
            $cart[] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'image' => $product['image'], // Đảm bảo sản phẩm bao gồm ảnh
            ];
        }

        // Cập nhật giỏ hàng trong session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng!']);
    }

    public function cartCount()
    {
        $cart = Session::get('cart', []);
        $count = array_sum(array_column($cart, 'quantity'));

        return response()->json(['count' => $count]);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('productId');
        $cart = Session::get('cart', []);
        $cart = array_filter($cart, function ($item) use ($productId) {
            return $item['id'] != $productId;
        });

        Session::put('cart', $cart);

        $cartSummary = $this->getCartSummary($cart);
        return response()->json([
            'cart' => $cart,
            'cartSummary' => $cartSummary
        ]);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        $cart = Session::get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] = $quantity;
                break;
            }
        }

        Session::put('cart', $cart);

        $cartSummary = $this->getCartSummary($cart);
        return response()->json([
            'cart' => $cart,
            'cartSummary' => $cartSummary
        ]);
    }

    private function getCartSummary($cart)
    {
        $totalItems = count($cart);
        $totalPrice = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $cart));

        return [
            'totalItems' => $totalItems,
            'totalPrice' => number_format($totalPrice, 0, ',', '.') . 'đ'
        ];
    }
}
