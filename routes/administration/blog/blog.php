<?php

use App\Http\Controllers\Administration\Blog\BlogController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Blog Routes >==============
===============================================*/
Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:blog.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:blog.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:blog.create']);
    Route::get('/show/{blog}', 'show')->name('show')->middleware(['can:blog.show']);
    Route::get('/edit/{blog}', 'edit')->name('edit')->middleware(['can:blog.update']);
    Route::post('/update/{blog}', 'update')->name('update')->middleware(['can:blog.update']);
    Route::get('/destroy/{blog}', 'destroy')->name('destroy')->middleware(['can:blog.destroy']);
});