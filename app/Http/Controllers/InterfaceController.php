<?php

namespace App\Http\Controllers;


use App\Helpers\IndexHelper;
use App\Helpers\ProductCategoryHelper;
use App\Models\ProductCategory;

class InterfaceController extends Controller
{
    public function index()
    {
        $menuCategories = ProductCategory::with('children')->where('parent_id', 0)->get();

        $hotProducts = IndexHelper::getHotProducts();
        $newProducts = IndexHelper::getNewProducts();
        $homeProducts = IndexHelper::getHomeProducts();

        return view('Website.index',
            compact(
                'menuCategories',
                'hotProducts',
                'newProducts',
                'homeProducts'
            )
        );
    }
}
