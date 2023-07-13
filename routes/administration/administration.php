<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< Administration Routes >============
===============================================*/
Route::prefix('administration')
        ->name('administration.')
        ->group(function () {
            // Dashboard
            include_once 'dashboard/dashboard.php';
            
            // season
            include_once 'season/season.php';

            // settings
            include_once 'settings/settings.php';
        });