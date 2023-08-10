<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Shop\Product\ProductController;

/* ==============================================
===============< Product Routes >==============
===============================================*/
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{product}', 'show')->name('show');
    Route::get('/edit/{product}', 'edit')->name('edit');
    Route::post('/update/{product}', 'update')->name('update');
    Route::get('/destroy/{product}', 'destroy')->name('destroy');
    Route::get('/destroy/image/{image}', 'destroy_image')->name('destroy.image');
});