<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('nguos', [NguoController::class, 'index']);
Route::post('nguos', [NguoController::class, 'store']);
Route::get('nguos/{id}', [NguoController::class, 'show']);
Route::put('nguos/{id}', [NguoController::class, 'update']);
Route::delete('nguos/{id}', [NguoController::class, 'destroy']);

