<?php

namespace App\Providers;

use App\Helpers\ProductCategoryHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $categories = ProductCategoryHelper::getProductCategories();
            $view->with('categories', $categories);
        });
    }
}
