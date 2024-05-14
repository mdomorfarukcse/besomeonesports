<?php

use App\Http\Controllers\Frontend\Press\PressController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Press Routes >==============
===============================================*/
Route::controller(PressController::class)->prefix('press')->name('press.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{press}', 'show')->name('show');
});