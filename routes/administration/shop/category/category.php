<?php

use App\Http\Controllers\Administration\Shop\Category\CategoryController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Category Routes >==============
===============================================*/
Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{category}', 'show')->name('show');
    Route::get('/edit/{category}', 'edit')->name('edit');
    Route::post('/update/{category}', 'update')->name('update');
    Route::get('/destroy/{category}', 'destroy')->name('destroy');
});