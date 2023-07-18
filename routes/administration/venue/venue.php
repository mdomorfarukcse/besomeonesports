<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Venue\VenueController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(VenueController::class)->prefix('venue')->name('venue.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});