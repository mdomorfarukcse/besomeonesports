<?php

use App\Http\Controllers\Administration\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(ScheduleController::class)->prefix('schedule')->name('schedule.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});