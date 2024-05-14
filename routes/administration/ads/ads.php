<?php

use App\Http\Controllers\Administration\Ads\AdsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Ads Routes >==============
===============================================*/
Route::controller(AdsController::class)->prefix('ads')->name('ads.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{ads}', 'show')->name('show');
    Route::get('/edit/{ads}', 'edit')->name('edit');
    Route::post('/update/{ads}', 'update')->name('update');
    Route::get('/destroy/{ads}', 'destroy')->name('destroy');
});