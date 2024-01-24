<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test-api', function() {
    return response()->json([
        'message' => 'Bonjour à tous'
    ]);
});


Route::get('not-login-api', function() {
    return response()->json([
        'message' => 'User not authenticated'
    ]);
})->name('not-login-api');

Route::get('users', [DataController::class, 'users']);

Route::post('register', [AuthController::class, 'register'])->name('register');
