<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< Frontend Routes >============
===============================================*/
Route::name('frontend.')->group(function () {
    // Homepage
    include_once 'homepage/homepage.php';
    // About
    include_once 'about/about.php';
    // Contact
    include_once 'contact/contact.php';
    // Coach
    include_once 'coach/coach.php';
    // league
    include_once 'league/league.php';
    // Shop
    include_once 'shop/shop.php';
    // Mission
    include_once 'mission/mission.php';
    // Advertise WIth Us
    include_once 'advertise/advertise.php';
    // Our Team
    include_once 'ourteam/ourteam.php';
    // Testimonials
    include_once 'testimonials/testimonials.php';
    // Faqs
    include_once 'faqs/faqs.php';
    // App Info
    include_once 'appinfo/appinfo.php';
    // App Info
    include_once 'sponsors/sponsors.php';
    // Press Release
    include_once 'press/press.php';
    // Blog
    include_once 'blog/blog.php';
    // Blog
    include_once 'gallery/gallery.php';
    // Term
    include_once 'term/term.php';
    // Privacy
    include_once 'privacy/privacy.php';
    // Privacy
    include_once 'mediaInquiries/mediaInquiries.php';
    
});