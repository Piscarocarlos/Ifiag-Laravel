<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){
    Route::get('/', [AppController::class, 'index'])->name('home');
    Route::get('/about-us', [AppController::class, 'about'])->name('about');
// });
