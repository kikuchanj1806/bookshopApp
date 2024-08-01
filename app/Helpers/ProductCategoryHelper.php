<?php

namespace App\Helpers;

use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\Tag;

// Thay đổi tên mô hình nếu cần

class ProductCategoryHelper
{
    /**
     * Lấy danh sách sản phẩm với phân trang.
     *
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getPaginatedProducts($page = 1, $perPage = 20)
    {
        // Xác định số trang hiện tại
        $currentPage = $page;

        // Lấy danh sách sản phẩm từ cơ sở dữ liệu với phân trang
        $products = ProductModel::paginate($perPage, ['*'], 'page', $currentPage);

        return $products;
    }

    /**
     * Lấy danh sách sản phẩm theo slug danh mục với phân trang.
     *
     * @param string $slug
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getProductsByCategorySlug($slug, $page = 1, $perPage = 20)
    {
        // Tìm danh mục theo slug
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        // Lấy danh sách sản phẩm theo danh mục với phân trang
        $products = ProductModel::where('categoryId', $category->id)
            ->paginate($perPage, ['*'], 'page', $page);

        return $products;
    }

    public static function getProductCategories()
    {
        return ProductCategory::with('children')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->get();
    }

    public static function getProductsByTag($tagId, $page = 1, $perPage = 20)
    {
        $tag = Tag::findOrFail($tagId);
        $products = $tag->products()->paginate($perPage, ['*'], 'page', $page);
        return $products;
    }

    public static function getProductsByCategoryAndTags($slug, $tagIds, $page = 1, $perPage = 20)
    {
        // Tìm danh mục theo slug
        $category = ProductCategory::where('slug', $slug)->firstOrFail();

        // Lấy danh sách sản phẩm theo danh mục và các tag với phân trang
        $products = ProductModel::where('categoryId', $category->id)
            ->whereHas('tags', function ($query) use ($tagIds) {
                $query->whereIn('tag_id', $tagIds);
            })
            ->where(function ($query) use ($tagIds) {
                $query->whereHas('tags', function ($query) use ($tagIds) {
                    $query->selectRaw('count(*)')
                        ->whereIn('tag_id', $tagIds)
                        ->groupBy('product_id')
                        ->havingRaw('count(*) = ?', [count($tagIds)]);
                });
            })
            ->paginate($perPage, ['*'], 'page', $page);

        return $products;
    }
}
