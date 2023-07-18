<?php

use App\Http\Controllers\Administration\Player\PlayerController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Player Routes >==============
===============================================*/
Route::controller(PlayerController::class)->prefix('player')->name('player.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});