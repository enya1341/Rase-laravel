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
Route::put('/v1/{store_id}/reservations', [ReservationsController::class, 'put']);
Route::delete('/v1/{user_id}/reservations', [ReservationsController::class, 'delete']);

Route::post('/v1/{store_id}/values', [ValuesController::class, 'post']);
Route::get('/v1/{store_id}/values', [ValuesController::class, 'get']);


// 管理者権限

Route::get('/v1/adminuserget/users', [UsersController::class, 'adminuserget'])->name('adminuserget');
Route::put('/v1/storeAdminGrant/users', [UsersController::class, 'storeAdminGrant'])->name('storeAdminGrant');

// 店舗代表者権限

Route::post('/v1/storeAdmin/stores', [StoresController::class, 'post']);
Route::put('/v1/{store_id}/storeAdmin/stores', [StoresController::class, 'put']);
Route::get('/v1/{store_id}/storeAdmin/reservations', [ReservationsController::class, 'storeAdminReservations'])->name('storeAdminReservations');