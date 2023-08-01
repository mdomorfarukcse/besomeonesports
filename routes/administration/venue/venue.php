<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Venue\VenueController;

/* ==============================================
===============< Venue Routes >==============
===============================================*/
Route::controller(VenueController::class)->prefix('venue')->name('venue.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{venue}', 'show')->name('show');
    Route::get('/edit/{venue}', 'edit')->name('edit');
    Route::post('/update/{venue}', 'update')->name('update');
    Route::get('/destroy/{venue}', 'destroy')->name('destroy');
});