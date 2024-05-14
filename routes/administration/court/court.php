<?php

use App\Http\Controllers\Administration\Court\CourtController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Venue Routes >==============
===============================================*/
Route::controller(CourtController::class)->prefix('venue/court')->name('venue.court.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/destroy/{court}', 'destroy')->name('destroy');
});