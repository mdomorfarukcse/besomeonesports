<?php

use App\Http\Controllers\Administration\Product\ProductController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Product Routes >==============
===============================================*/
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});