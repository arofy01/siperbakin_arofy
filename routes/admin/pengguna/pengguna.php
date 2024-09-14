<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\pengguna\PenggunaController;


// ----------------------------untuk pengguna----------------------------------------------------------------------

Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen jenis pengguna
    Route::get('admin/pengguna/jenispengguna', [PenggunaController::class, 'EntryJenisPengguna'])->name('admin.pengguna.jenispengguna');

    // route menuju halaman manajemen pengguna
    Route::get('admin/pengguna/pengguna', [PenggunaController::class, 'EntryPengguna'])->name('admin.pengguna.pengguna');

    // route menuju halaman manajemen peran pengguna
    Route::get('admin/pengguna/peranpengguna', [PenggunaController::class, 'EntryPeranPengguna'])->name('admin.pengguna.peranpengguna');

    // route menuju halaman manajemen izin pengguna
    Route::get('admin/pengguna/izinpengguna', [PenggunaController::class, 'EntryIzinPengguna'])->name('admin.pengguna.izinpengguna');

}); 
