<?php

use App\Http\Controllers\Administration\League\LeagueFilterController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< League Filter Routes >==============
===============================================*/
Route::controller(LeagueFilterController::class)->group(function () {
    Route::get('/by_sport/{sport_id}', 'fetchLeaguesBySport')->name('sport')->middleware(['can:league.index']);
    Route::get('/by_division/{division_id}', 'fetchLeaguesByDivision')->name('division')->middleware(['can:league.index']);
});