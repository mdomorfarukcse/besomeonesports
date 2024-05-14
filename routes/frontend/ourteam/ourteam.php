<?php

use App\Http\Controllers\Frontend\OurTeam\OurTeamController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faqs Routes >==============
===============================================*/
Route::controller(OurTeamController::class)->prefix('our-team')->name('ourteam.')->group(function () {
    Route::get('/', 'index')->name('index');
});