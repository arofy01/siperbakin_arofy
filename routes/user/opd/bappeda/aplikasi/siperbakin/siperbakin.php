<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\bappeda\aplikasi\siperbakin\SiperbakinController;





Route::middleware('role:bappeda-siperbakin')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/siperbakin/dashboard', [SiperbakinController::class, 'dashboard'])->name('user.opd.aplikasi.siperbakin.dashboard');
   

    // Infrastruktur
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/pamsimas', [SiperbakinController::class, 'pamsimas'])->name('user.opd.aplikasi.siperbakin.pamsimas');
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/sanimas', [SiperbakinController::class, 'sanimas'])->name('user.opd.aplikasi.siperbakin.sanimas');
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/tps3r', [SiperbakinController::class, 'tps3r'])->name('user.opd.aplikasi.siperbakin.tps3r');
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/wtp', [SiperbakinController::class, 'wtp'])->name('user.opd.aplikasi.siperbakin.wtp');
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/airlimbahperkotaan', [SiperbakinController::class, 'airlimbahperkotaan'])->name('user.opd.aplikasi.siperbakin.airlimbahperkotaan');
    Route::get('/user/opd/bappeda/aplikasi/siperbakin/ipaldanseptictank', [SiperbakinController::class, 'ipaldanseptictank'])->name('user.opd.aplikasi.siperbakin.ipaldanseptictank');

}); 

