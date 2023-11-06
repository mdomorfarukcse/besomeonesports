<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');



/*==============================================================
======================< API Routes >=================
==============================================================*/
/*==============================================================
======================< Non-Auth Routes >=======================
==============================================================*/
Route::middleware(['web'])->group(function () {
    include_once 'api/frontend/frontend.php';
});

/*==============================================================
=========================< Auth Routes >========================
==============================================================*/
Route::middleware(['auth:api', 'player_exist'])->group(function () {
    include_once 'api/administration/administration.php';
});
