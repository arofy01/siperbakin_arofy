<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\bappeda\aplikasi\sidarendu\client\SidarenduController;



Route::middleware('role:bappeda-sidarendu|dinsos|bkpsdm|distanak|disdikbud|dinkes|dpmkppkb|pupr|dpkp')->group(function () {
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/daftardata', [SidarenduController::class, 'daftardata'])->name('user.opd.bappeda.aplikasi.sidarendu.client.daftardata');
}); 




// dpmkppkb
Route::middleware('role:bappeda-sidarendu|dpmkppkb')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/KESJ-1-00001', [SidarenduController::class, 'KESJ100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.kesj100001');

}); 

// bkpsdm

Route::middleware('role:bappeda-sidarendu|bkpsdm')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/PEME-1-00001', [SidarenduController::class, 'PEME100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.peme100001');

}); 

// Dinsos
Route::middleware('role:bappeda-sidarendu|dinsos')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/KESJ-2-00001', [SidarenduController::class, 'KESJ200001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.kesj200001');

}); 

// Dinkes
Route::middleware('role:bappeda-sidarendu|dinkes')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/KESE-1-00001', [SidarenduController::class, 'KESE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.kese100001');

}); 

// pangan, kelautan dan perikanan
Route::middleware('role:bappeda-sidarendu|dpkp')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/PERI-1-00001', [SidarenduController::class, 'PERI100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.peri100001');

}); 

// peternakan
Route::middleware('role:bappeda-sidarendu|distanak')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/PETE-1-00001', [SidarenduController::class, 'PETE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.pete100001');

}); 

// PUPR
Route::middleware('role:bappeda-sidarendu|pupr')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/PEKE-1-00001', [SidarenduController::class, 'PEKE100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.peke100001');

}); 


// disdikbud
Route::middleware('role:bappeda-sidarendu|disdikbud')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sidarendu/client/PEND-1-00001', [SidarenduController::class, 'PEND100001'])->name('user.opd.bappeda.aplikasi.sidarendu.client.pend100001');

}); 



