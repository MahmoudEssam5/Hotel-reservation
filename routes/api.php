<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Admin route
Route::post('admin.login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('admin.logout', [AdminController::class, 'logout'])->name('admin.logout');

// users info
Route::post('user.register', [UserController::class, 'UserRegister'])
    ->name('user.register');
Route::post('user.login', [UserController::class, 'UserLogin'])
    ->name('user.login');
Route::get('users', [UserController::class, 'index'])->name("users");
Route::get('user.logout', [UserController::class, 'logout'])->name("user.logout");

//Route::apiResource rooms

Route::apiResource('rooms', RoomController::class);


// Order Routes
Route::get('orders',[OrderController::class , 'index'])->name('orders');
Route::post('order.store',[OrderController::class , 'OrderStore'])->name('order.store');
