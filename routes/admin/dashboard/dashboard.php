<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\dashboard\AdminDashboardController;



Route::middleware('role:superadmin')->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'admin'])->name('admin.dashboard');
}); 

