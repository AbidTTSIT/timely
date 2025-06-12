<?php

use App\Http\Controllers\User\Api\AuthController;
use App\Http\Controllers\User\Api\UserSurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->prefix('user')->group(function(){
   Route::post('register', 'register');
   Route::post('login', 'login');
});

Route::middleware('auth:api')->group(function(){
    Route::controller(UserSurveyController::class)->prefix('user')->group(function(){
        Route::post('user-survey', 'store');
    });
});