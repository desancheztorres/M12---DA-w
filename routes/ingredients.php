<?php

use App\Http\Controllers\IngredientController;
use Illuminate\Support\Facades\Route;

Route::get('ingredients', [IngredientController::class, 'index']);
Route::post('ingredients', [IngredientController::class, 'store']);
Route::patch('ingredients/{ingredient}', [IngredientController::class, 'update']);
Route::delete('ingredients/{ingredient}', [IngredientController::class, 'destroy']);
