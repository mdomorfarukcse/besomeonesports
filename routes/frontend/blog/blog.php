<?php

use App\Http\Controllers\Frontend\Blog\BlogController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Blog Routes >==============
===============================================*/
Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show', 'show')->name('show');
});