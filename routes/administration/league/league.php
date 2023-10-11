<?php

use App\Http\Controllers\Administration\League\LeagueController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Routes >==============
===============================================*/
Route::controller(LeagueController::class)->prefix('league')->name('league.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:league.index']);
    Route::get('/my', 'myLeagues')->name('my')->middleware(['role:coach|player|guardian']);
    Route::get('/create', 'create')->name('create')->middleware(['can:league.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:league.create']);
    Route::get('/show/{league}', 'show')->name('show')->middleware(['can:league.show']);
    Route::get('/edit/{league}', 'edit')->name('edit')->middleware(['can:league.update']);
    Route::post('/update/{league}', 'update')->name('update')->middleware(['can:league.update']);
    Route::get('/destroy/{league}', 'destroy')->name('destroy')->middleware(['can:league.destroy']);
    
    Route::get('/registration/{league}', 'registration')->name('registration')->middleware(['can:league_registration.create']);
    Route::post('/registration/{league}/store', 'register_player')->name('registration.store')->middleware(['can:league_registration.create']);
});