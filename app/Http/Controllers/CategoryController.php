<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex(Request $request)
    {
        $page = $request->input('page', 1); // Lấy số trang từ yêu cầu hoặc mặc định là trang 1
        $products = ProductHelper::getPaginatedProducts($page, 20); // 20 sản phẩm mỗi trang

        return view('Website.category', compact('products'));
    }
}
