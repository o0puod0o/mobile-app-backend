<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Auth
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [ProfileController::class, 'me']);
});