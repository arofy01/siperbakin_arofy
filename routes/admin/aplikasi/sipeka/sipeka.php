<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\aplikasi\sipeka\SipekaController;


Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman manajemen aplikasi sipeka
    Route::get('admin/aplikasi/sipeka', [SipekaController::class, 'sipeka'])->name('admin.aplikasi.sipeka');

}); 