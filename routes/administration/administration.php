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
            
            // profile
            include_once 'profile/profile.php';
            
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

            // Faq
            include_once 'faq/faq.php';

            // Sponsor
            include_once 'sponsor/sponsor.php';

            // Role
            include_once 'role/role.php';

            // Permission
            include_once 'permission/permission.php';

            // Blog
            include_once 'blog/blog.php';

            // News
            include_once 'news/news.php';

            // Gallery
            include_once 'gallery/gallery.php';

            // Video
            include_once 'video/video.php';

            // Ads
            include_once 'ads/ads.php';

            // Manage User
            include_once 'user_management/user_management.php';
        });