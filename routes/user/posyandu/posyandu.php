<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\posyandu\PosyanduController;


Route::middleware('role:posyandu')->group(function () {
    Route::get('user/posyandu/dashboard', [PosyanduController::class, 'dashboard'])->name('user.posyandu.dashboard');
   
}); 
