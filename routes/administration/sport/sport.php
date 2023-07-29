<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Sport\SportController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(SportController::class)->prefix('sport')->name('sport.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{sport}', 'show')->name('show');
});