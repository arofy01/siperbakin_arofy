<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\paud\dashboard\PaudController;


Route::middleware('role:paud')->group(function () {
    Route::get('user/paud/dashboard', [PaudController::class, 'paud'])->name('user.paud.dashboard');
}); 


