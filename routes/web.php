<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/about-us', [AppController::class, 'about'])->name('about');
