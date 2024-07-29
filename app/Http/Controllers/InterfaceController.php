<?php

namespace App\Http\Controllers;


use App\Helpers\IndexHelper;
use App\Helpers\ProductCategoryHelper;
use App\Models\ProductCategory;

class InterfaceController extends Controller
{
    public function index()
    {
        $menuCategories = ProductCategory::with('children')
            ->where('parent_id', 0)
            ->where('status', 1)
            ->get();

        $hotProducts = IndexHelper::getHotProducts();
        $newProducts = IndexHelper::getNewProducts();
        $homeProducts = IndexHelper::getHomeProducts();
        $categoriesWithProducts = IndexHelper::getCategoriesWithProducts();

        $bannerHomePage = IndexHelper::getBannersByPosition(1);

        return view('Website.index',
            compact(
                'menuCategories',
                'hotProducts',
                'newProducts',
                'homeProducts',
                'bannerHomePage',
                'categoriesWithProducts'
            )
        );
    }
}
