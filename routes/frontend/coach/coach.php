<?php

use App\Http\Controllers\Frontend\Coach\CoachController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Coach Routes >==============
===============================================*/
Route::controller(CoachController::class)
    ->prefix('coach')
    ->name('coach.')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::post('/get-divisions', 'getDivisions')->name('get-divisions');
    });