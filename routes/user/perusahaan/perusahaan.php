<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\perusahaan\PerusahaanController;




 
Route::middleware('role:perusahaan')->group(function () {
   
    Route::get('user/perusahaan/dashboard', [PerusahaanController::class, 'dashboard'])->name('user.perusahaan.bappeda.aplikasi.sipeka.dashboard');
   
}); 

