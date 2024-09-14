<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\puskesmas\PuskesmasController;


Route::middleware('role:puskesmas')->group(function () {
    Route::get('user/puskesmas/dashboard', [PuskesmasController::class, 'dashboard'])->name('user.puskesmas.dashboard');
   
}); 
