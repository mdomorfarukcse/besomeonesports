<?php

use App\Http\Controllers\Administration\League\LeagueController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Routes >==============
===============================================*/
Route::controller(LeagueController::class)->prefix('league')->name('league.')->group(function () {
    Route::get('/', 'index')->name('apiIndex')->middleware(['can:league.index']);
    Route::get('/my', 'myLeagues')->name('apiMy')->middleware(['role:coach|referee|player|guardian']);
    Route::get('/show/{league}', 'show')->name('apiShow')->middleware(['can:league.show']);
    
    Route::post('/registration/{league}/store', 'apiRegisterPlayer')->name('registration.store')->middleware(['can:league_registration.create']);
});