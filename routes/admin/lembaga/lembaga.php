<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\lembaga\LembagaController;




Route::middleware('role:superadmin')->group(function () {  
    // route menuju halaman manajemen lembaga
    Route::get('admin/lembaga', [LembagaController::class, 'entrylembaga'])->name('admin.lembaga');

}); 

