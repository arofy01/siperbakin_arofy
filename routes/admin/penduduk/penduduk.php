<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\penduduk\PendudukController;




 Route::middleware('role:superadmin')->group(function () {
    // route menuju halaman manajemen penduduk
    Route::get('admin/penduduk', [PendudukController::class, 'penduduk'])->name('admin.penduduk');

}); 