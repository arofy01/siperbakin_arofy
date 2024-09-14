<?php

namespace App\Http\Controllers\user\opd\bappeda\aplikasi\sipeka;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;





class SipekaController extends Controller
{
    Public Function dashboard (){
        return view ('user.opd.bappeda.aplikasi.sipeka.dashboard');
    }



    // Berkaitan dengan Data dan Informasi

    Public Function p3keindividu (){
        return view ('user.opd.bappeda.aplikasi.sipeka.p3keindividu');
    }

    Public Function p3kekeluarga (){
        return view ('user.opd.bappeda.aplikasi.sipeka.p3kekeluarga');
    }




    // Berkaitan dengan Agregat, Grafik, Peta

    Public Function agregatperkecamatan (){
        return view ('user.opd.bappeda.aplikasi.sipeka.agregatperkecamatan');
    }

    Public Function agregatperkeluargadanindividukecamatan (){
        return view ('user.opd.bappeda.aplikasi.sipeka.agregatperkeluargadanindividukecamatan');
    }


    Public Function agregatperkepalakeluargakecamatan (){
        return view ('user.opd.bappeda.aplikasi.sipeka.agregatperkepalakeluargakecamatan');
    }


    Public Function agregatperklasifikasiusiakecamatan (){
        return view ('user.opd.bappeda.aplikasi.sipeka.agregatperklasifikasiusiakecamatan');
    }



 







    // Berkaitan dengan Lokus

    Public Function lokuskecamatan (){
        return view ('user.opd.bappeda.aplikasi.sipeka.lokuskecamatan');
    }

    Public Function lokusdesa (){
        return view ('user.opd.bappeda.aplikasi.sipeka.lokusdesa');
    }






    // berkaitan dengan program konvergensi

    Public Function konvergensiduniausaha (){
        return view ('user.opd.bappeda.aplikasi.sipeka.konvergensiduniausaha');
    }


    Public Function konvergensiopd (){
        return view ('user.opd.bappeda.aplikasi.sipeka.konvergensiopd');
    }


}


