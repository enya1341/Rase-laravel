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

// 会員登録のapi
Route::post('/v1/users/registration', [RegisterController::class, 'post']);

// ログインとログアウトのapiは現状使ってませんが一応残してます
// ログインのapi
Route::post('/v1/users/login', [LoginController::class, 'post']);
// ログアウトのapi
Route::post('/v1/users/logout', [LogoutController::class, 'post']);

//ログイン時のユーザー取得api
Route::get('/v1/users', [UsersController::class, 'get']);

//お気に入り情報取得のapi
Route::get('/v1/{user_id}/favorites', [FavoritesController::class, 'get']);
//予約情報取得のapi
Route::get('/v1/{user_id}/reservations', [ReservationsController::class, 'get']);

//ストア一覧の取得api
Route::get('/v1/stores', [StoresController::class, 'storeget'])->name('storeget');
//ストア詳細の取得api
Route::get('/v1/{store_id}/stores', [StoresController::class, 'storedata'])->name('storedata');

//お気に入り追加api
Route::post('/v1/{user_id}/favorites', [FavoritesController::class, 'post']);
//お気に入り削除api
Route::delete('/v1/{user_id}/favorites', [FavoritesController::class, 'delete']);

//予約追加api
Route::post('/v1/{store_id}/reservations', [ReservationsController::class, 'post']);
//予約変更api
Route::put('/v1/{store_id}/reservations', [ReservationsController::class, 'put']);
//予約削除api
Route::delete('/v1/{user_id}/reservations', [ReservationsController::class, 'delete']);

//評価追加api
Route::post('/v1/{store_id}/values', [ValuesController::class, 'post']);
//評価情報取得api
Route::get('/v1/{store_id}/values', [ValuesController::class, 'get']);


// 管理者権限

//全ユーザー情報取得api
Route::get('/v1/{email}/users', [UsersController::class, 'adminuser'])->name('adminuser');
//店舗代表者権限付与api
Route::put('/v1/storeAdminGrant/users', [UsersController::class, 'storeAdminGrant'])->name('storeAdminGrant');
//店舗代表者権限削除api
Route::put('/v1/storeAdminDelete/users', [UsersController::class, 'storeAdminDelete'])->name('storeAdminDelete');

// 店舗代表者権限

//店舗情報作成api
Route::post('/v1/storeAdmin/stores', [StoresController::class, 'post']);
//店舗情報更新api
Route::put('/v1/{store_id}/storeAdmin/stores', [StoresController::class, 'put']);
//店舗画像をS3に送りパスをDBに保存するapi
Route::post('/v1/{store_id}/storeAdmin/stores/image', [StoresController::class, 'storeImagePost'])->name('storeImagePost');
//店舗の予約情報取得api
Route::get('/v1/{store_id}/storeAdmin/reservations', [ReservationsController::class, 'storeAdminReservations'])->name('storeAdminReservations');