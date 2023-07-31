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
    Route::get('/show/{season}', 'show')->name('show');
    Route::get('/edit/{season}', 'edit')->name('edit');
    Route::post('/update/{season}', 'update')->name('update');
    Route::get('/destroy/{season}', 'destroy')->name('destroy');
});