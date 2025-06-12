<?php

use App\Http\Controllers\Admin\AuthControlller;
use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthControlller::class)->prefix('admin')->group(function(){
    Route::get('login', 'index');
    Route::post('login', 'login')->name('admin.login');
});

Route::middleware('admin')->group(function(){
    Route::controller(IndexController::class)->prefix('admin')->group(function(){
        Route::get('dashboard', 'index')->name('admin.dashboard');
        Route::get('users', 'users')->name('all.users');
        Route::get('logout', 'logout')->name('logout');
    });
});
