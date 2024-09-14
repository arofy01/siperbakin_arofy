<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\OpdController;




Route::middleware('role:opd')->group(function () {
    Route::get('user/opd/dashboard', [OpdController::class, 'dashboard'])->name('user.opd.dashboard');
}); 



