<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< administration Routes >============
===============================================*/
Route::prefix('administration')
        ->name('api.administration.')
        ->group(function () {
            // chat
            include_once 'chat/chat.php';
        });