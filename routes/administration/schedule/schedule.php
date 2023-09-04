<?php

use App\Http\Controllers\Administration\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(ScheduleController::class)->prefix('schedule')->name('schedule.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/calender', 'calender')->name('calender');
    Route::get('/create', 'create')->name('create');
    Route::get('/teams/{event}', 'teams')->name('teams');
    Route::get('/venues/{event}', 'venues')->name('venues');
    Route::get('/venue/courts/{venue}', 'courts')->name('venues.courts');
    
    Route::post('/store', 'store')->name('store');
});