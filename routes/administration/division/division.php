<?php

use App\Http\Controllers\Administration\Division\DivisionController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Division Routes >==============
===============================================*/
Route::controller(DivisionController::class)->prefix('division')->name('division.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{division}', 'show')->name('show');
});