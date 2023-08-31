<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Venue\VenueController;

/* ==============================================
===============< Venue Routes >==============
===============================================*/
Route::controller(VenueController::class)->prefix('venue')->name('venue.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:venue.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:venue.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:venue.create']);
    Route::get('/show/{venue}', 'show')->name('show')->middleware(['can:venue.show']);
    Route::get('/edit/{venue}', 'edit')->name('edit')->middleware(['can:venue.update']);
    Route::post('/update/{venue}', 'update')->name('update')->middleware(['can:venue.update']);
    Route::get('/destroy/{venue}', 'destroy')->name('destroy')->middleware(['can:venue.destroy']);
});