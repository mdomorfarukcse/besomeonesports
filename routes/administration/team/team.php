<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Team\TeamController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(TeamController::class)->prefix('team')->name('team.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:team.index', 'role:admin|developer']);
    Route::get('/my', 'myTeam')->name('my')->middleware(['role:coach|player']);
    Route::get('/create', 'create')->name('create')->middleware(['can:team.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:team.create']);
    Route::get('/show/{team}', 'show')->name('show')->middleware(['can:team.show']);
    Route::get('/edit/{team}', 'edit')->name('edit')->middleware(['can:team.update']);
    Route::post('/update/{team}', 'update')->name('update')->middleware(['can:team.update']);
    Route::post('/assign/player/{team}', 'assignPlayer')->name('assign')->middleware(['can:team.update']);
    Route::get('/destroy/player/{team}/{player}', 'destroyPlayer')->name('destroy.player')->middleware(['can:team.destroy']);
    Route::get('/destroy/{team}', 'destroy')->name('destroy')->middleware(['can:team.destroy']);
});