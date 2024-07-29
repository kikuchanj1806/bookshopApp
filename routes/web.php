<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth'])->group(function () {
        // Routes chỉ dành cho admin
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin');
            Route::post('/upload/services', [UploadController::class, 'store'])->name('admin.upload.services');

            Route::get('/user/index', [UserController::class, 'index'])->name('user');
            Route::get('/order/index', [OrderController::class, 'orderindex'])->name('admin.order');

            // Category
            Route::prefix('category')->group(function () {
                Route::get('/add', [ProductCategoryController::class, 'create'])->name('admin.category.add');
                Route::get('/edit/{category}', [ProductCategoryController::class, 'show'])->name('admin.category.edit');
                Route::post('/edit/{category}', [ProductCategoryController::class, 'update'])->name('admin.category.update');
                Route::delete('/destroy', [ProductCategoryController::class, 'destroy']);
                Route::get('/index', [ProductCategoryController::class, 'index'])->name('admin.category.index');
                Route::post('/store', [ProductCategoryController::class, 'store'])->name('category.store');
            });

            // Products
            Route::prefix('product')->group(function () {
                Route::get('/add', [ProductController::class, 'create'])->name('admin.product.add');
                Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
                Route::post('/edit/{product}', [ProductController::class, 'update'])->name('admin.product.update');
                Route::delete('/destroy', [ProductController::class, 'destroy']);
                Route::get('/index', [ProductController::class, 'index'])->name('admin.product.index');
                Route::post('/store', [ProductController::class, 'store'])->name('product.store');

                Route::get('/{product}/thumbnails', [ProductController::class, 'getProductThumbnails'])->name('admin.product.thumb');
            });

            // Orders
            Route::prefix('order')->group(function () {
                Route::get('/index', [OrderController::class, 'index'])->name('admin.order.index');
                Route::get('/add', [ProductController::class, 'create'])->name('admin.order.add');
            });

            // Website

            Route::prefix('website')->group(function () {
                Route::prefix('banners')->group(function () {
                    Route::get('/index', [WebsiteController::class, 'bannerIndex'])->name('admin.banners.index');
                    Route::get('/add', [WebsiteController::class, 'createBanner'])->name('admin.banners.add');
                    Route::post('/store', [WebsiteController::class, 'storeBanner'])->name('admin.banners.store');
                    Route::get('/edit/{banner}', [WebsiteController::class, 'editBanner'])->name('admin.banners.edit');
                    Route::post('/update/{banner}', [WebsiteController::class, 'updateBanner'])->name('admin.banners.update');
                    Route::delete('/destroy', [WebsiteController::class, 'destroyBanner'])->name('admin.banners.destroy');
                });
            });
        });

        // Routes dành cho cả admin và cộng tác viên
        Route::middleware(['role:admin,ctv'])->group(function () {
            Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
            Route::get('/admin/order/index', [OrderController::class, 'orderindex'])->name('admin.order');
        });
    });
});

// Website
Route::get('/', [InterfaceController::class, "index"])->name('interface.index');
Route::get('/category', [CategoryController::class, "categoryIndex"])->name('category.index');
Route::get('/prd/{slug}', [DetailController::class, "show"])->name('detail.index');
Route::get('/card', [CardController::class, "cardAction"])->name('card.index');
Route::get('/carddone', [CardController::class, "carddoneAction"])->name('carddone.index');

Route::get('/{slug}', [CategoryController::class, 'showByCategory'])->name('category.products');
