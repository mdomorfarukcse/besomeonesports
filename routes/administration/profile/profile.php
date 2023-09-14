<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Profile\ProfileController;

/* ==============================================
===============< Profile Routes >==============
===============================================*/
Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/security', 'security')->name('security');
    Route::post('/security/password/update/{user}', 'passwordUpdate')->name('security.password.update');
    
    Route::get('/edit', 'edit')->name('edit');

    Route::post('/admin/update/{user}', 'adminUpdate')->name('admin.update');
    Route::post('/coach/update/{coach}', 'coachUpdate')->name('coach.update');
    Route::post('/player/update/{player}', 'playerUpdate')->name('player.update');
    Route::post('/user/update/{user}', 'userUpdate')->name('user.update');
});