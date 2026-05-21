<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\COntrollers\Admin\OrderController;

Route::get('/', function () {
    $products = Product::all();
    return view('front.home', compact('products'));
});

Route::prefix('admin')->group(function (){
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::get('/admin/orders',
    [OrderController::class, 'index']);

Route::delete('/admin/orders/{id}',
    [OrderController::class, 'destroy']);