<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Profile\ProfileController;

/* ==============================================
===============< Profile Routes >==============
===============================================*/
Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'index')->name('index');
});