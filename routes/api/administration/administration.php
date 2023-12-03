<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< administration Routes >============
===============================================*/
Route::prefix('administration')
        ->name('api.administration.')
        ->group(function () {
            // league
            include_once 'league/league.php';
            // chat
            include_once 'chat/chat.php';
            // profile
            include_once 'profile/profile.php';
        });