<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Team\TeamController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(TeamController::class)->prefix('team')->name('team.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{team}', 'show')->name('show');
    Route::get('/edit/{team}', 'edit')->name('edit');
    Route::post('/update/{team}', 'update')->name('update');
    Route::get('/destroy/{team}', 'destroy')->name('destroy');
});