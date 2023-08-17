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
});