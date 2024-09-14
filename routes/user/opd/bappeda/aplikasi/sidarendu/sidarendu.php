<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\bappeda\aplikasi\sidarendu\SidarenduController;

Route::middleware('role:bappeda-sidarendu')->group(function () {
    Route::get('user/opd/bappeda/aplikasi/sidarendu/dashboard', [SidarenduController::class, 'dashboard'])->name('user.opd.bappeda.aplikasi.sidarendu.dashboard');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/daftardata', [SidarenduController::class, 'daftardata'])->name('user.opd.bappeda.aplikasi.sidarendu.daftardata');

     
    Route::get('user/opd/bappeda/aplikasi/sidarendu/KESJ-1-00001', [SidarenduController::class, 'KESJ100001'])->name('user.opd.bappeda.aplikasi.sidarendu.kesj100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/PEME-1-00001', [SidarenduController::class, 'PEME100001'])->name('user.opd.bappeda.aplikasi.sidarendu.peme100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/KESJ-2-00001', [SidarenduController::class, 'KESJ200001'])->name('user.opd.bappeda.aplikasi.sidarendu.kesj200001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/KESE-1-00001', [SidarenduController::class, 'KESE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.kese100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/PERI-1-00001', [SidarenduController::class, 'PERI100001'])->name('user.opd.bappeda.aplikasi.sidarendu.peri100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/PETE-1-00001', [SidarenduController::class, 'PETE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.pete100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/PEKE-1-00001', [SidarenduController::class, 'PEKE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.peke100001');
    Route::get('user/opd/bappeda/aplikasi/sidarendu/PEND-1-00001', [SidarenduController::class, 'PEND100001'])->name('user.opd.bappeda.aplikasi.sidarendu.pend100001');




}); 




  

