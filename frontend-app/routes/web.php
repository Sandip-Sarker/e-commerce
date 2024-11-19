<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheakoutController;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contact-us');
Route::get('/all-product', [WebsiteController::class, 'allProduct'])->name('all-product');
Route::get('/product-details', [WebsiteController::class, 'productDetails'])->name('product-details');

Route::controller(CartController::class)->group(function (){
   Route::get('/cart-index', 'index')->name('cart-index');
});

Route::controller(CheakoutController::class)->group(function (){
    Route::get('/checkout-index', 'index')->name('checkout-index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
