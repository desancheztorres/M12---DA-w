<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserRecipeController;
use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\CreateUserToken;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\UserLogoutController;
use App\Http\Resources\UserRes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
    $recipes = \App\Models\Recipe::find(1);

    dd($recipes->ingredients->contains($request->user()->pantries));
//    dd($request->user()->pantries->contains($recipes->ingredients));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserRes($request->user());
});
Route::delete('users', [UserController::class, 'destroy'])->middleware('auth:sanctum');
Route::patch('users', [UserController::class, 'update'])->middleware('auth:sanctum');

Route::post('user-recipes', UserRecipeController::class)->middleware(['auth:sanctum']);

Route::post('users', CreateUserController::class);
Route::post('login', LoginController::class);
Route::post('/sanctum/token', CreateUserToken::class);
Route::post('logout', UserLogoutController::class);
