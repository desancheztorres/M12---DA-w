<?php

use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\UpdateUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users', CreateUserController::class);
Route::patch('users', UpdateUserController::class)->middleware('auth:sanctum');
