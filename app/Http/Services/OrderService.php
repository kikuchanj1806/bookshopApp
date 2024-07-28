<?php

namespace App\Http\Services;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\FormFilter\Product\ProductRequestFilter;


class OrderService extends AppService
{
    public function getAll()
    {
//        $products = OrderModel::paginate(10);
        $products = '';
        return $products;
    }

}
