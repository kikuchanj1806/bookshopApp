<?php

namespace App\Providers;

use App\Helpers\ProductCategoryHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

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
        // Register view composers
//        $this->composeUnauthorizedSession();
        $this->composeMenuCategories();
        $this->composeHeaderAdmin();
        $this->composeCheckNavAdmin();
    }

    private function composeUnauthorizedSession()
    {
        View::composer('*', function ($view) {
            if (session()->has('unauthorized')) {
                $view->with('unauthorized', session('unauthorized'));
            }
        });
    }

    private function composeMenuCategories()
    {
        View::composer('*', function ($view) {
            $menuCategories = ProductCategoryHelper::getProductCategories();
            $view->with('menuCategories', $menuCategories);
        });
    }

    private function composeHeaderAdmin()
    {
        View::composer('*', function ($view) {
            $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập
            $view->with('user', $user);
        });
    }

    private function composeCheckNavAdmin()
    {
        View::composer('*', function ($view) {
            $currentUrl = URL::current(); // Lấy URL hiện tại
            $view->with('currentUrl', $currentUrl);
        });
    }
}
