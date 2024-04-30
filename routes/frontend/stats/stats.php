<?php

use App\Http\Controllers\Frontend\Stats\StatsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Mission Routes >==============
===============================================*/
Route::controller(StatsController::class)->prefix('stats')->name('stats.')->group(function () {
    Route::get('/', 'index')->name('index');
});