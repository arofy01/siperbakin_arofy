<?php

use Illuminate\Support\Facades\Route;


// Menuju Halaman Beranda


Route::group(['domain' => 'sidarendu.acehtamiangkab.go.id'], function () {
    Route::get('/', function () {
        return view('beranda.sidarendu.home');
    });
});

Route::group(['domain' => 'sipeka.acehtamiangkab.go.id'], function () {
    Route::get('/', function () {
        return view('beranda.sipeka.home');
    });
});


Route::group(['domain' => 'siperbakin.acehtamiangkab.go.id'], function () {
    Route::get('/', function () {
        return view('beranda.siperbakin.home');
    });
});

Route::group(['domain' => 'sipenting.acehtamiangkab.go.id'], function () {
    Route::get('/', function () {
        return view('beranda.sipenting.home');
    });
});


Route::get('/', function () {
    return view('beranda.siperbakin.home');
});


//  Menuju halaman Login

Route::get('/login', function () {
    return view('login'); 
});






// Route yang dapat digunakan apabila sudah berhasi login, telah sukses melewati middleware  Auth dan melalui middleware active menu

Route::middleware('auth','active.menu')->group(function () {
    
    // Admin
    require __DIR__.'/admin/penduduk/penduduk.php';
    require __DIR__.'/admin/dashboard/dashboard.php';
    require __DIR__.'/admin/lembaga/lembaga.php';
    require __DIR__.'/admin/aparatur/aparatur.php';
    require __DIR__.'/admin/pengguna/pengguna.php';
    require __DIR__.'/admin/wilayah/wilayah.php';
    require __DIR__.'/admin/aplikasi/sipenting/sipenting.php';
    require __DIR__.'/admin/aplikasi/sidarendu/sidarendu.php';
    require __DIR__.'/admin/aplikasi/sipeka/sipeka.php'; 

    //    User
    require __DIR__.'/user/dayah/dayah.php';
    require __DIR__.'/user/desa/desa.php';
    require __DIR__.'/user/lsm/lsm.php';
    require __DIR__.'/user/opd/opd.php';
    require __DIR__.'/user/paud/paud.php';
    require __DIR__.'/user/perusahaan/perusahaan.php';
    require __DIR__.'/user/posyandu/posyandu.php';
    require __DIR__.'/user/puskesmas/puskesmas.php';
    require __DIR__.'/user/sd/sd.php';
    require __DIR__.'/user/smp/smp.php';
    require __DIR__.'/user/tk/tk.php';
   

    // 4 buah aplikasi yang ada di BAPPEDA


    require __DIR__.'/user/opd/bappeda/aplikasi/siperbakin/siperbakin.php';

    require __DIR__.'/user/opd/bappeda/aplikasi/sipeka/sipeka.php';
    require __DIR__.'/user/opd/bappeda/aplikasi/sipeka/client/sipeka.php';


    require __DIR__.'/user/opd/bappeda/aplikasi/sidarendu/sidarendu.php';
    require __DIR__.'/user/opd/bappeda/aplikasi/sidarendu/client/sidarendu.php';

    require __DIR__.'/user/opd/bappeda/aplikasi/sipenting/sipenting.php';

   


    





});

require __DIR__.'/auth.php';