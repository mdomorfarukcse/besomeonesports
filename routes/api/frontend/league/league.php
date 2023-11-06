<?php

use App\Http\Controllers\Frontend\League\LeagueController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Routes >==============
===============================================*/
Route::controller(LeagueController::class)->prefix('league')->name('league.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
    Route::get('/show/{league}', 'apiShow')->name('show');
});