<?php

use App\Http\Controllers\Frontend\Mission\MissionController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Mission Routes >==============
===============================================*/
Route::controller(MissionController::class)->prefix('mission')->name('mission.')->group(function () {
    Route::get('/', 'index')->name('index');
});