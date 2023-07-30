<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Season\SeasonController;

/* ==============================================
===============< Season Routes >==============
===============================================*/
Route::controller(SeasonController::class)->prefix('season')->name('season.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});