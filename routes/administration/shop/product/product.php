<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Shop\Product\ProductController;

/* ==============================================
===============< Product Routes >==============
===============================================*/
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:shop_product.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:shop_product.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:shop_product.create']);
    Route::get('/show/{product}', 'show')->name('show')->middleware(['can:shop_product.show']);
    Route::get('/edit/{product}', 'edit')->name('edit')->middleware(['can:shop_product.update']);
    Route::post('/update/{product}', 'update')->name('update')->middleware(['can:shop_product.update']);
    Route::get('/destroy/{product}', 'destroy')->name('destroy')->middleware(['can:shop_product.destroy']);
    Route::get('/destroy/image/{image}', 'destroy_image')->name('destroy.image')->middleware(['can:shop_product.destroy']);
});