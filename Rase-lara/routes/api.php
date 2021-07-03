<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ValuesController;


Route::post('/v1/users/registration', [RegisterController::class, 'post']);


Route::post('/v1/users/login', [LoginController::class, 'post']);
Route::post('/v1/users/logout', [LogoutController::class, 'post']);


Route::get('/v1/users', [UsersController::class, 'get']);
Route::get('/v1/{user_id}/favorites', [FavoritesController::class, 'get']);
Route::get('/v1/{user_id}/reservations', [ReservationsController::class, 'get']);


Route::get('/v1/stores', [StoresController::class, 'storeget'])->name('storeget');
Route::get('/v1/{store_id}/stores', [StoresController::class, 'storedata'])->name('storedata');


Route::post('/v1/{user_id}/favorites', [FavoritesController::class, 'post']);
Route::delete('/v1/{user_id}/favorites', [FavoritesController::class, 'delete']);

Route::post('/v1/{store_id}/reservations', [ReservationsController::class, 'post']);
Route::put('/v1/{user_id}/reservations', [ReservationsController::class, 'put']);
Route::delete('/v1/{user_id}/reservations', [ReservationsController::class, 'delete']);

Route::post('/v1/{store_id}/values', [ValuesController::class, 'post']);
Route::get('/v1/{store_id}/values', [ValuesController::class, 'get']);