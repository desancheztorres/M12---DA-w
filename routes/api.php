<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\CreateUserToken;
use App\Http\Controllers\Users\UpdateUserController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserLogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::delete('users', [UserController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('users', CreateUserController::class);
Route::patch('users', UpdateUserController::class)->middleware('auth:sanctum');
Route::post('login', LoginController::class);
Route::post('/sanctum/token', CreateUserToken::class);
Route::post('logout', UserLogoutController::class);
