<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< Frontend Routes >============
===============================================*/
Route::prefix('frontend')
        ->name('api.frontend.')
        ->group(function () {
            // league
            include_once 'league/league.php';
        });