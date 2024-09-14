<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\tk\TkController;


Route::middleware('role:tk')->group(function () {
    Route::get('user/tk/dashboard', [TkController::class, 'tk'])->name('user.tk.dashboard');
}); 


