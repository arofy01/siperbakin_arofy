<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\dayah\DayahController;


Route::middleware('role:dayah')->group(function () {
   
    Route::get('user/dayah/dashboard', [LsmController::class, 'dashboard'])->name('user.dayah.dashboard');
}); 
