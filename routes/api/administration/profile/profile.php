<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Profile\ProfileController;

/* ==============================================
===============< Profile Routes >==============
===============================================*/
Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
    Route::post('/update', 'apiUpdateProfile')->name('update');
    
    Route::post('/security/password/update', 'apiPasswordUpdate')->name('security.password.update');
});