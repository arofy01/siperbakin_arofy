<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\aplikasi\sipenting\SipentingController;


Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen aplikasi stunting
    Route::get('admin/aplikasi/sipenting', [StuntingController::class, 'sipenting'])->name('admin.aplikasi.sipenting');

}); 