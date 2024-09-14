<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\aparatur\AparaturController;


Route::middleware('role:superadmin')->group(function () {

    // route menuju halaman aparatur bupati
    Route::get('admin/aparatur', [AparaturController::class, 'entryaparatur'])->name('admin.aparatur');

}); 