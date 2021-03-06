<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HallController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('city/get', [HallController::class, 'getCities']);

Route::get('occasion/get', [HallController::class, 'getOccasion']);

Route::get('feature/get', [HallController::class, 'getFeatures']);