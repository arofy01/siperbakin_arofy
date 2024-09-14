<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\lsm\LsmController;




 
Route::middleware('role:lsm')->group(function () {
   
    Route::get('user/lsm/dashboard', [LsmController::class, 'dashboard'])->name('user.lsm.dashboard');
   
  

}); 

