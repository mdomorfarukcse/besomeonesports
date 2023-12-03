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
            // schedule
            include_once 'schedule/schedule.php';
            // contact
            include_once 'contact/contact.php';
            // news
            include_once 'news/news.php';
            // settings
            include_once 'settings/settings.php';
        });