<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('get', [AuthController::class, 'get']);
    Route::get('phone/confirm', [AuthController::class, 'confirmPhone']);
});

Route::get('owners/get', [AuthController::class, 'getOwners']);