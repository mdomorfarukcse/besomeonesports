<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Shop\Product\ProductController;

/* ==============================================
===============< Product Routes >==============
===============================================*/
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});