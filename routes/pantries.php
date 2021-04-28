<?php

use App\Http\Controllers\PantryController;
use Illuminate\Support\Facades\Route;

Route::get('pantries', [PantryController::class, 'index']);
Route::post('pantries', [PantryController::class, 'store']);
Route::patch('pantries/{pantry}', [PantryController::class, 'update']);
Route::delete('pantries/{pantry}', [PantryController::class, 'destroy']);
