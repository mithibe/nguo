<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('nguo', [NguoController::class, 'index']);
Route::post('nguo', [NguoController::class, 'store']);
Route::get('nguo/{id}', [NguoController::class, 'show']);
Route::put('nguo/{id}', [NguoController::class, 'update']);
Route::delete('nguo/{id}', [NguoController::class, 'destroy']);

