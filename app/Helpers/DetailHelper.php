<?php

namespace App\Helpers;


use App\Models\ProductModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DetailHelper
{
    /**
     * Lấy thông tin chi tiết sản phẩm dựa trên ID hoặc Slug.
     *
     * @param mixed $identifier
     * @param string $type
     * @return \App\Models\ProductModel
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getProductDetail($identifier, $type = 'slug')
    {
        try {
            if ($type === 'slug') {
                $product = ProductModel::where('slug', $identifier)->firstOrFail();
            }
            return $product;
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException('Sản phẩm không tồn tại.');
        }
    }


    /**
     * Lấy sản phẩm liên quan dựa trên danh mục sản phẩm.
     *
     * @param \App\Models\ProductModel $product
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getRelatedProducts(ProductModel $product)
    {
        return ProductModel::where('categoryId', $product->categoryId)
            ->where('id', '!=', $product->id)
            ->get();
    }
}
