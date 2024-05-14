<?php

use App\Http\Controllers\Administration\News\NewsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< News Routes >==============
===============================================*/
Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:news.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:news.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:news.create']);
    Route::get('/show/{news}', 'show')->name('show')->middleware(['can:news.show']);
    Route::get('/edit/{news}', 'edit')->name('edit')->middleware(['can:news.update']);
    Route::post('/update/{news}', 'update')->name('update')->middleware(['can:news.update']);
    Route::get('/destroy/{news}', 'destroy')->name('destroy')->middleware(['can:news.destroy']);
});