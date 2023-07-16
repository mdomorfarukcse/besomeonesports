<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Team\TeamController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(TeamController::class)->prefix('team')->name('team.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});