<?php

namespace App\Http\Controllers\user\opd\bappeda\aplikasi\sidarendu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;





class SidarenduController extends Controller
{
    Public Function dashboard (){
        return view ('user.opd.bappeda.aplikasi.sidarendu.dashboard');
    }

    Public Function daftardata (){
        return view ('user.opd.bappeda.aplikasi.sidarendu.daftardata');
    }

    // Public Function clientdaftardata (){
    //     return view ('user.opd.bappeda.aplikasi.sidarendu.client.daftardata');
    // }



    Public Function KESJ100001 (){
        return view ('user.opd.bappeda.aplikasi.sidarendu.kesj100001');
    }


    Public Function PEME100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.peme100001');
    }

    Public Function KESJ200001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.kesj200001');
    }


    Public Function KESE100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.kese100001');
    }

    Public Function PERI100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.peri100001');
    }

    Public Function PETE100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.pete100001');
    }

    Public Function PEKE100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.peke100001');
    }

    Public Function PEND100001 (){
  
        return view ('user.opd.bappeda.aplikasi.sidarendu.pend100001');
    }


}


