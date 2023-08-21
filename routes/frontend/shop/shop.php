<?php

use App\Http\Controllers\Frontend\Shop\ShopController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Shop Routes >==============
===============================================*/
Route::controller(ShopController::class)->prefix('shop')->name('shop.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{product}', 'show')->name('show');
    Route::post('/add_to_cart/{product}', 'add_to_cart')->name('add_to_cart');
    Route::get('/cart', 'show_cart')->name('cart.index');
    Route::get('/cart/checkout', 'show_checkout')->name('cart.checkout');
    Route::post('/cart/checkout/store', 'confirm_order')->name('cart.checkout.store');
    Route::get('/clear', 'clear_cart')->name('cart.clear');
    Route::get('/clear/item/{itemKey}', 'clear_cart_item')->name('cart.clear.item');
});