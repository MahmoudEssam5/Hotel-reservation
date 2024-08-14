<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Admin route
Route::post('adminlogin', [AdminController::class, 'AdminLogin'])->name('adminlogin');


// users info
Route::post('userregister', [UserController::class, 'UserRegister'])
    ->name('userregister');
Route::post('userlogin', [UserController::class, 'UserLogin'])
    ->name('userlogin');
Route::get('users', [UserController::class, 'index'])->name("users");

//Route::apiResource('rooms', RoomController::class);

Route::get('rooms',[RoomController::class ,'index'])->name('rooms');
Route::get('show/{id}',[RoomController::class , 'show'])->name('show');
Route::post('store',[RoomController::class , 'store'])->name('store');
Route::put('update/{id}',[RoomController::class , 'update'])->name('update');
Route::delete('delete/{id}',[RoomController::class , 'destroy'])->name('delete');


// Order Routes
Route::get('order',[OrderController::class , 'index'])->name('order');
Route::post('orderstore',[OrderController::class , 'OrderStore'])->name('orderstore');
