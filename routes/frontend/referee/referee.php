<?php

use App\Http\Controllers\Frontend\Referee\RefereeController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< referee Routes >==============
===============================================*/
Route::controller(RefereeController::class)
    ->prefix('referee')
    ->name('referee.')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });