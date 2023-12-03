<?php

use App\Http\Controllers\Administration\News\NewsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< News Routes >==============
===============================================*/
Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
    Route::get('/show/{news}', 'apiShow')->name('show');
});