<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Front\CartController;

use App\Http\controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;

use App\Http\Controllers\Front\OrderController as FrontOrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/', function () {
//     return redirect('/admin/dashboard');
// });
Route::post('/cart/add/{id}',[CartController::class, 'add']) ->name('cart.add');
Route::get('/cart',[CartController::class, 'index']) ->name('cart.index');
Route::get('/cart/remove/{id}',[CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout',[CheckoutCOntroller::class, 'store'])->name('checkout.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::get('/admin/orders', [OrderController::class, 'index']);
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy']);

    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
});

Route::get('/product/{id}',[HomeController::class, 'show'])->name('product.detail');

Route::get('/wishlist',[WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add/{id}',[WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist/remove/{id}',[WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/my-orders',[FrontOrderController::class, 'index'])->name('orders');

require __DIR__.'/auth.php';
