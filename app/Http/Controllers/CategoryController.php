<?php

namespace App\Http\Controllers;

use App\Helpers\ProductCategoryHelper;
use App\Models\ProductCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex(Request $request)
    {
        $page = $request->input('page', 1); // Lấy số trang từ yêu cầu hoặc mặc định là trang 1
        $products = ProductCategoryHelper::getPaginatedProducts($page, 20); // 20 sản phẩm mỗi trang

        return view('website.category', compact('products'));
    }

    /**
     * Hiển thị danh sách sản phẩm theo slug danh mục.
     *
     * @param string $slug
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showByCategory($slug, Request $request)
    {
        $page = $request->input('page', 1);
        $tagIds = $request->input('tag', []);
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        if ($tagIds) {
            $products = ProductCategoryHelper::getProductsByCategoryAndTags($slug, $tagIds, $page);
        } else {
            $products = ProductCategoryHelper::getProductsByCategorySlug($slug, $page);
        }

        $tags = Tag::all();

        return view('website.category', compact('products', 'category', 'tags', 'tagIds'));
    }

}
