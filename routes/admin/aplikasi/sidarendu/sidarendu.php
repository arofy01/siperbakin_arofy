<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\aplikasi\sidarendu\SidarenduController;


Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen aplikasi satudata
    Route::get('admin/aplikasi/sidarendu', [SidarenduController::class, 'sidarendu'])->name('admin.aplikasi.sidarendu');

}); 