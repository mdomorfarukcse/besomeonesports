<?php

use App\Http\Controllers\Administration\Shop\Category\CategoryController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Category Routes >==============
===============================================*/
Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});