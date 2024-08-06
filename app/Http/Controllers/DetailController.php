<?php

namespace App\Http\Controllers;

use App\Helpers\DetailHelper;

class DetailController extends Controller
{
    /**
     * Hiển thị chi tiết sản phẩm.
     *
     * @param string $slug
     */
    public function show($slug)
    {
        try {
            $product = DetailHelper::getProductDetail($slug, 'slug');
            if (is_string($product->thumbnails)) {
                $product->thumbnails = json_decode($product->thumbnails, true);
            }
            $relatedProducts = DetailHelper::getRelatedProducts($product);

            $category = $product->category;
            return view('website.detail', compact('product', 'relatedProducts', 'category'));
        } catch (\Exception $e) {
            return redirect()->route('website.index')->with('error', $e->getMessage());
        }
    }
}
