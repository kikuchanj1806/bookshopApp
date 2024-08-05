<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::middleware(['auth'])->group(function () {
        // Routes chỉ dành cho admin
        Route::middleware(['role:admin'])->group(function () {
            Route::post('/upload/services', [UploadController::class, 'store'])->name('admin.upload.services');
            Route::get('/user/index', [UserController::class, 'index'])->name('user');

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

            // Order

            Route::prefix('order')->group(function () {
                Route::post('/addBillOfLading', [OrderController::class, 'addBillOfLading'])->name('admin.order.addBillOfLading');

                Route::get('/lock/{id}', [OrderController::class, 'lockOrder']);
                Route::get('/unlock/{id}', [OrderController::class, 'unlockOrder']);
            });

            // User
            Route::prefix('user')->group(function () {
                Route::get('/index', [UserController::class, 'index'])->name('admin.user.index');
                Route::get('/create', [UserController::class, 'create'])->name('admin.user.add');
                Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
                Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
                Route::post('/edit/{user}', [UserController::class, 'update'])->name('admin.user.update');
                Route::delete('/destroy', [UserController::class, 'destroyUser']);
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
            Route::prefix('order')->group(function () {
                Route::get('/index', [OrderController::class, 'orderindex'])->name('admin.order.index');
                Route::get('/add', [OrderController::class, 'create'])->name('admin.order.add');
                Route::post('/store', [OrderController::class, 'store'])->name('admin.order.store');
                Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('admin.order.edit');
                Route::post('/edit/{order}', [OrderController::class, 'update'])->name('admin.order.update');
                Route::delete('/destroy', [OrderController::class, 'destroy'])->name('admin.order.destroy');
                Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('admin.order.detail');
                // routes/web.php
                Route::post('/export', [OrderController::class, 'exportSelected'])->name('admin.order.export');
            });
        });
    });
});
Route::get('/unauthorized', function () {
    return view('admin.errors.unauthorized');
})->name('unauthorized');

// Website
Route::get('/', [InterfaceController::class, "index"])->name('interface.index');
Route::get('/category', [CategoryController::class, "categoryIndex"])->name('category.index');
Route::get('/prd/{slug}', [DetailController::class, "show"])->name('detail.index');
Route::get('/card', [CardController::class, "cardAction"])->name('card');
Route::get('/carddone', [CardController::class, "carddoneAction"])->name('carddone');
Route::post('/add-to-cart', [CardController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cartcount', [CardController::class, 'cartCount'])->name('cart.count');

Route::get('/{slug}', [CategoryController::class, 'showByCategory'])->name('category.products');

Route::get('/search/suggestions', [SearchController::class, 'suggestions']);

Route::get('/cities', [LocationController::class, 'getCities'])->name('locations.cities');
Route::get('/districts/{city_id}', [LocationController::class, 'getDistricts'])->name('locations.districts');
Route::get('/wards/{district_id}', [LocationController::class, 'getWards'])->name('locations.wards');

