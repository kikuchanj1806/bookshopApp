<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
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

Route::get('/', [InterfaceController::class, "index"])->name('interface.index');
Route::get('/category', [CategoryController::class, "categoryIndex"])->name('category.index');
Route::get('/detail', [DetailController::class, "detail"])->name('detail.index');
Route::get('/card', [CardController::class, "cardAction"])->name('card.index');
Route::get('/carddone', [CardController::class, "carddoneAction"])->name('carddone.index');


// Admin
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    // Routes chỉ dành cho admin
    Route::middleware(['role:admin'])->group(function () {


        Route::prefix('admin')->group(function () {
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
        });
    });

    // Routes dành cho cả admin và cộng tác viên
    Route::middleware(['role:admin,ctv'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
        Route::get('/admin/order/index', [OrderController::class, 'orderindex'])->name('admin.order');
    });
});
