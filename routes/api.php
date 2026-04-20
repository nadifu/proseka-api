<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Endpoint untuk login (bebas diakses untuk dapat token)
Route::post('login', [AuthController::class, 'login']);

// Endpoint karakter yang DILINDUNGI oleh JWT
Route::middleware('auth:api')->group(function () {
    Route::apiResource('characters', CharacterController::class);
});