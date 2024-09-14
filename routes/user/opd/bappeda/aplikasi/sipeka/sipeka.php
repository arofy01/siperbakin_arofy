<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\opd\bappeda\aplikasi\sipeka\SipekaController;




 
Route::middleware('role:bappeda-sipeka')->group(function () {
   
    Route::get('user/opd/bappeda/aplikasi/sipeka/dashboard', [SipekaController::class, 'dashboard'])->name('user.opd.bappeda.aplikasi.sipeka.dashboard');
   
    Route::get('user/opd/bappeda/aplikasi/sipeka/p3keindividu', [SipekaController::class, 'p3keindividu'])->name('user.opd.bappeda.aplikasi.sipeka.p3keindividu');

    Route::get('user/opd/bappeda/aplikasi/sipeka/p3kekeluarga', [SipekaController::class, 'p3kekeluarga'])->name('user.opd.bappeda.aplikasi.sipeka.p3kekeluarga');

    // Route::get('user/opd/bappeda/aplikasi/sipeka/totalindividu', [SipekaController::class, 'totalindividu']);


    // Berkaitan dengan Lokus
    Route::get('user/opd/bappeda/aplikasi/sipeka/lokuskecamatan', [SipekaController::class, 'lokuskecamatan']);
    Route::get('user/opd/bappeda/aplikasi/sipeka/lokusdesa', [SipekaController::class, 'lokusdesa']);


    // Berkaitan dengan agregat
    
        // Status Kesejahteraan
    Route::get('user/opd/bappeda/aplikasi/sipeka/agregatgrafikpeta/perkeluargadanindividukecamatan', [SipekaController::class, 'agregatperkeluargadanindividukecamatan']);
    Route::get('user/opd/bappeda/aplikasi/sipeka/agregatgrafikpeta/perklasifikasiusiakecamatan', [SipekaController::class, 'agregatperklasifikasiusiakecamatan']);
    Route::get('user/opd/bappeda/aplikasi/sipeka/agregatgrafikpeta/perkepalakeluargakecamatan', [SipekaController::class, 'agregatperkepalakeluargakecamatan']);
    
        // Pendidikan


        // Kesehatan


        // Ketenagakerjaan


        // Informasi Rumah

        
 
    Route::get('user/opd/bappeda/aplikasi/sipeka/agregatgrafikpeta/perkecamatan', [SipekaController::class, 'agregatperkecamatan']);
    Route::get('user/opd/bappeda/aplikasi/sipeka/agregatgrafikpeta/perresikostuntingkecamatan', [SipekaController::class, 'agregatperresikostuntingkecamatan']);


    // Berkaitan dengan Program Konvergensi
    Route::get('user/opd/bappeda/aplikasi/sipeka/konvergensiopd', [SipekaController::class, 'konvergensiopd']);
    Route::get('user/opd/bappeda/aplikasi/sipeka/konvergensiduniausaha', [SipekaController::class, 'konvergensiduniausaha']);


}); 

