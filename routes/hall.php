<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FeatureHallController;

Route::get('get', [HallController::class, 'get']);
Route::get('discount/get/{hall_id}', [DiscountController::class, 'get']);
Route::get('offer/get/{hall_id}', [OfferController::class, 'get']);
Route::get('feature/get/{hall_id}', [FeatureHallController::class, 'get']);

Route::get('getMost', [HallController::class, 'getMost']);
Route::get('detail/get/{hall_id}', [HallController::class, 'getDetails']);

Route::middleware('auth:api')->group(function () {

    Route::post('create', [HallController::class, 'create']);
    Route::put('update/{hall_id}', [HallController::class, 'update']);
    Route::delete('delete/{hall_id}', [HallController::class, 'delete']);

    Route::prefix('discount')->group(function () {

        Route::post('create', [DiscountController::class, 'create']);
        Route::put('update/{discount_id}', [DiscountController::class, 'update']);
        Route::delete('delete/{discount_id}', [DiscountController::class, 'delete']);
    });

    Route::prefix('offer')->group(function () {

        Route::post('create', [OfferController::class, 'create']);
        Route::put('update/{discount_id}', [OfferController::class, 'update']);
        Route::delete('delete/{discount_id}', [OfferController::class, 'delete']);
    });

    Route::prefix('feature')->group(function () {
        Route::post('create', [FeatureHallController::class, 'create']);
        Route::put('update/{feature_hall_id}', [FeatureHallController::class, 'update']);
        Route::delete('delete/{feature_hall_id}', [FeatureHallController::class, 'delete']);
    });

    Route::post('favourite/create', [ActivityController::class, 'favourite']);
    Route::post('watch/create', [ActivityController::class, 'watch']);
    Route::post('rate/create', [ActivityController::class, 'rate']);

    Route::prefix('price')->group(function () {
        Route::post('create', [PriceController::class, 'create']);
        Route::put('update/{price_id}', [PriceController::class, 'update']);
        Route::delete('delete/{price_id}', [PriceController::class, 'delete']);
    });
});
