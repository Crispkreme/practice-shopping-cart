<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/{id}', [ProductController::class, 'show'])->name('product');
Route::get('/cart', [CartsController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartsController::class, 'addToCart'])->name('add.to.cart');
Route::get('/delete-from-cart/{id}', [CartsController::class, 'deleteFromCart'])->name('delete.from.cart');
