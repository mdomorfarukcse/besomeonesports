<?php

use App\Http\Controllers\Frontend\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Schedule Routes >==============
===============================================*/
Route::controller(ScheduleController::class)->prefix('schedule')->name('schedule.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
    Route::get('/show/{schedule}', 'apiShow')->name('show');
});