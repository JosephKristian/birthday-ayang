<?php

use App\Http\Controllers\Api\GymTrackersController;
use App\Models\GymTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('gym-tracker', GymTrackersController::class);