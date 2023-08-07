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
});