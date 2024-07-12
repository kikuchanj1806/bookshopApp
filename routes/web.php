<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CardController;
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
