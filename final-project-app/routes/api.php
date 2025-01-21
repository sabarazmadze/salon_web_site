<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StylistController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StylistAvailabilityController;
use App\Http\Controllers\StylistServiceController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::apiResource('posts', PostController::class);

Route::prefix('api')->group(function () {
    Route::apiResource('stylists', StylistController::class);

    Route::apiResource('services', ServiceController::class);

    Route::apiResource('clients', ClientController::class);

    Route::apiResource('bookings', BookingController::class);

    Route::apiResource('stylist-availabilities', StylistAvailabilityController::class);

    Route::apiResource('stylist-services', StylistServiceController::class);
});
