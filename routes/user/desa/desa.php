<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\desa\DesaController;


Route::middleware('role:desa')->group(function () {
   
    Route::get('user/desa/dashboard', [LsmController::class, 'dashboard'])->name('user.desa.dashboard');
}); 
