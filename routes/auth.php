<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


// Menuju Halaman Login
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login-post', [AuthController::class, 'login_post'])->name('login.post');


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


 