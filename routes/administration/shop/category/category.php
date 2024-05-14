<?php

use App\Http\Controllers\Administration\Shop\Category\CategoryController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Category Routes >==============
===============================================*/
Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:shop_category.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:shop_category.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:shop_category.create']);
    Route::get('/show/{category}', 'show')->name('show')->middleware(['can:shop_category.show']);
    Route::get('/edit/{category}', 'edit')->name('edit')->middleware(['can:shop_category.update']);
    Route::post('/update/{category}', 'update')->name('update')->middleware(['can:shop_category.update']);
    Route::get('/destroy/{category}', 'destroy')->name('destroy')->middleware(['can:shop_category.destroy']);
});