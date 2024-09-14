<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\bappeda\aplikasi\sipenting\SipentingController;





Route::middleware('role:sipenting')->group(function () {

    Route::get('user/opd/bappeda/sipenting/dashboard', [SipentingController::class, 'desa'])->name('user.opd.aplikasi.sipenting.dashboard');

}); 

