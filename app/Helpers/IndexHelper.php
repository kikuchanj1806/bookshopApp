<?php

namespace App\Helpers;


use App\Models\BannerModel;
use App\Models\ProductCategory;
use App\Models\ProductModel;

class IndexHelper
{
    /**
     * Lấy danh sách sản phẩm có cờ showHot.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getHotProducts($limit = 10)
    {
        return ProductModel::where('showHot', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Lấy danh sách sản phẩm có cờ showNew.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getNewProducts($limit = 10)
    {
        return ProductModel::where('showNew', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Lấy danh sách sản phẩm có cờ showHome.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getHomeProducts($limit = 10)
    {
        return ProductModel::where('showHome', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Lấy danh sách danh mục kèm sản phẩm.
     *
     * @param int $limit Số lượng sản phẩm mỗi danh mục
     * @return \Illuminate\Support\Collection
     */
    public static function getCategoriesWithProducts($limit = 10)
    {
        $categories = ProductCategory::with(['products' => function ($query) use ($limit) {
            $query->limit($limit);
        }])->where('status_display_index', true)->get();

        return $categories;
    }

    /**
     * Lấy danh sách banner theo vị trí
     *
     * @param int $position
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getBannersByPosition($position)
    {
        return BannerModel::where('position', $position)->get();
    }
}
