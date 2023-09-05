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
    Route::get('/show/{schedule}', 'show')->name('show')->middleware(['can:schedule.show']);
    Route::get('/edit/{schedule}', 'edit')->name('edit')->middleware(['can:schedule.update']);
    Route::get('/destroy/{schedule}', 'destroy')->name('destroy')->middleware(['can:schedule.destroy']);
    
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{schedule}', 'update')->name('update');
    Route::get('/calender/json', 'get_calender_data')->name('calender.json');
    Route::get('/calender/json/{schedule}', 'get_calender')->name('calender.json.data');
});