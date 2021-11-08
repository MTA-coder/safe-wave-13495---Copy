<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Request\OfferOrderController;
use App\Http\Controllers\Request\HallOrderController;

Route::middleware('auth:api')->group(function () {

    Route::prefix('hall')->group(function () {
        Route::get('get', [HallOrderController::class, 'get']);
        Route::post('create', [HallOrderController::class, 'create']);
        Route::put('update/{request_id}', [HallOrderController::class, 'update']);
    });

    Route::prefix('offer')->group(function () {
        Route::get('get', [OfferOrderController::class, 'get']);
        Route::post('create', [OfferOrderController::class, 'create']);
        Route::put('update/{request_id}', [OfferOrderController::class, 'update']);
    });
});