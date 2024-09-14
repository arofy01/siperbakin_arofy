<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\wilayah\WilayahController;

Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen wilayah 
    Route::get('admin/wilayah/provinsi', [WilayahController::class, 'provinsi'])->name('admin.wilayah.provinsi');

    Route::get('admin/wilayah/kabupaten', [WilayahController::class, 'kabupaten'])->name('admin.wilayah.kabupaten');

    Route::get('admin/wilayah/kecamatan', [WilayahController::class, 'kecamatan'])->name('admin.wilayah.kecamatan');

    Route::get('admin/wilayah/mukim', [WilayahController::class, 'mukim'])->name('admin.wilayah.mukim');

    Route::get('admin/wilayah/desa', [WilayahController::class, 'desa'])->name('admin.wilayah.desa');

    Route::get('admin/wilayah/dusun', [WilayahController::class, 'dusun'])->name('admin.wilayah.dusun');

}); 
