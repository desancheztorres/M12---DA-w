<?php

use App\Http\Controllers\MagnitudeController;
use Illuminate\Support\Facades\Route;

Route::post('magnitudes', [MagnitudeController::class, 'store']);
Route::patch('magnitudes/{magnitude}', [MagnitudeController::class, 'update']);
Route::delete('magnitudes/{magnitude}', [MagnitudeController::class, 'destroy']);
