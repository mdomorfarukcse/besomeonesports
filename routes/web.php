<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Player\NewPlayerController;

Auth::routes();

/*==============================================================
======================< Homepage Routes >=================
==============================================================*/
Route::middleware(['web', 'player_exist'])->group(function () {
    include_once 'frontend/frontend.php';
});

/*==============================================================
======================< Administration Routes >=================
==============================================================*/
Route::middleware(['auth', 'player_exist'])->group(function () {
    include_once 'administration/administration.php';
});

// If the Authenticated user is player
Route::controller(NewPlayerController::class)
        ->prefix('administration/player/new')
        ->name('administration.player.new.')
        ->middleware(['role:player'])
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update/{user}', 'update')->name('update');
        });