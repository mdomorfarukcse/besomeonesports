<?php

use App\Http\Controllers\Frontend\League\LeagueController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Routes >==============
===============================================*/
Route::controller(LeagueController::class)->prefix('league')->name('league.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{league}', 'show')->name('show');
});