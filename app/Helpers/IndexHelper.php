<?php

namespace App\Helpers;


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
}
