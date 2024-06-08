<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\APIController;

Route::controller(WebController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/register', 'register');
    Route::get('/login', 'login');
    Route::get('/dashboard', 'dashboard');
    Route::get('/logout', 'logout');
});

Route::controller(APIController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/v1/thumbnails/single', 'thumbnails');
});
