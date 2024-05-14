<?php

use App\Http\Controllers\Administration\League\LeagueController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Routes >==============
===============================================*/
Route::controller(LeagueController::class)
        ->prefix('league')
        ->name('league.')
        ->group(function () {
            Route::get('/my', 'apiMyLeagues')->name('my');
            Route::get('/show/{league}', 'apiShow')->name('show');
            
            Route::post('/registration/{league}/store', 'apiRegisterPlayer')->name('registration.store');
        });