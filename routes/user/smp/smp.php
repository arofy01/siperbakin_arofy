<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\smp\SmpController;


Route::middleware('role:smp')->group(function () {
    Route::get('user/smp/dashboard', [SmpController::class, 'smp'])->name('user.smp.dashboard');
}); 

