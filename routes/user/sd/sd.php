<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\sd\SdController;




Route::middleware('role:sd')->group(function () {
    Route::get('user/sd/dashboard', [SdController::class, 'sd'])->name('user.sd.dashboard');
}); 

