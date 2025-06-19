<?php

use App\Http\Controllers\User\Api\AgeController;
use App\Http\Controllers\User\Api\AuthController;
use App\Http\Controllers\User\Api\IncomeRangeController;
use App\Http\Controllers\User\Api\PaymentModeController;
use App\Http\Controllers\User\Api\PlanController;
use App\Http\Controllers\User\Api\ProfessionController;
use App\Http\Controllers\User\Api\UserGoalController;
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

    Route::controller(ProfessionController::class)->prefix('user')->group(function(){
        Route::get('professions', 'professions');
    });

     Route::controller(IncomeRangeController::class)->prefix('user')->group(function(){
        Route::get('income_range', 'incomeRange');
    });

     Route::controller(PaymentModeController::class)->prefix('user')->group(function(){
        Route::get('payment_mode', 'paymentMode');
    });

    Route::controller(AgeController::class)->prefix('user')->group(function(){
        Route::get('age', 'age');
    });

    Route::controller(PlanController::class)->prefix('user')->group(function(){
        Route::get('plans', 'plans');
    });

    Route::controller(UserGoalController::class)->prefix('user')->group(function(){
        Route::post('goal/calculate', 'goalCalculate');
    });
});