<?php

use App\Http\Controllers\Administration\Player\PlayerController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Player Routes >==============
===============================================*/
Route::controller(PlayerController::class)->prefix('player')->name('player.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:player.index', 'role:admin|developer']);
    Route::get('/my', 'myPlayers')->name('my')->middleware(['role:coach|guardian']);
    Route::get('/create', 'create')->name('create')->middleware(['can:player.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:player.create']);
    Route::get('/show/{player}', 'show')->name('show')->middleware(['can:player.show']);
    Route::get('/edit/{player}', 'edit')->name('edit')->middleware(['can:player.update']);
    Route::post('/update/{player}', 'update')->name('update')->middleware(['can:player.update']);
    Route::get('/destroy/{player}', 'destroy')->name('destroy')->middleware(['can:player.destroy']);
    Route::post('/get-divisions', 'getDivisions')->name('get-divisions');
});