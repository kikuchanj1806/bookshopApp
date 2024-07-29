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
            return view('Website.detail', compact('product', 'relatedProducts'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', $e->getMessage());
        }
    }
}
