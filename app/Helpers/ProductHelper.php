<?php

namespace App\Helpers;

use App\Models\ProductModel; // Thay đổi tên mô hình nếu cần

class ProductHelper
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
}
