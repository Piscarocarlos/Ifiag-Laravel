<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test-api', function() {
    return response()->json([
        'message' => 'Bonjour à tous'
    ]);
})->middleware('auth:api');


Route::get('not-login-api', function() {
    return response()->json([
        'message' => 'User not authenticated'
    ]);
})->name('not-login-api');


Route::post('register', [AuthController::class, 'register'])->name('register');
