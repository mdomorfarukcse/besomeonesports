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
            
            // Seasons
            include_once 'season/season.php';

            // Events
            include_once 'event/event.php';

            // Division
            include_once 'division/division.php';
            
            // Player
            include_once 'player/player.php';
            
            // Coach
            include_once 'coach/coach.php';
            
            // Team
            include_once 'team/team.php';
            
            // Venue
            include_once 'venue/venue.php';
            
            // court
            include_once 'court/court.php';
            
            // Schedule
            include_once 'schedule/schedule.php';

            // Chat
            include_once 'chat/chat.php';
            
            // shop
            include_once 'shop/shop.php';
            
            // Sport
            include_once 'sport/sport.php';

            // Settings
            include_once 'settings/settings.php';
        });