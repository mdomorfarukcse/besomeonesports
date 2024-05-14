<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Ads Routes >==============
===============================================*/
Route::prefix('user/management')->name('user.manage.')->group(function () {
    // Admin
    include_once 'admin/admin.php';
});