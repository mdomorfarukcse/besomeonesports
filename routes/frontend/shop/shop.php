<?php

use App\Http\Controllers\Frontend\Shop\ShopController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Shop Routes >==============
===============================================*/
Route::controller(ShopController::class)->prefix('shop')->name('shop.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{product}', 'show')->name('show');
    Route::post('/add_to_cart/{product}', 'add_to_cart')->name('add_to_cart')->middleware('auth');
    Route::get('/cart', 'show_cart')->name('cart.index')->middleware('auth');
    Route::post('/cart/update', 'update_cart')->name('cart.update')->middleware('auth');
    Route::get('/cart/checkout', 'show_checkout')->name('cart.checkout')->middleware('auth');
    Route::post('/cart/checkout/store', 'confirm_order')->name('cart.checkout.store')->middleware('auth');
    Route::get('/clear', 'clear_cart')->name('cart.clear')->middleware('auth');
    Route::get('/clear/item/{itemKey}', 'clear_cart_item')->name('cart.clear.item')->middleware('auth');
});

Route::name('shop.')->group(function () {
    // order
    include_once 'order/order.php';
});