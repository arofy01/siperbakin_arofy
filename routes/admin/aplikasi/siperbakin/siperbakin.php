<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\aplikasi\siperbakin\SiperbakinController;


Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen aplikasi sipeka
    Route::get('admin/aplikasi/sperbakin', [SiperbakinController::class, 'siperbakin'])->name('admin.aplikasi.siperbakin');

}); 