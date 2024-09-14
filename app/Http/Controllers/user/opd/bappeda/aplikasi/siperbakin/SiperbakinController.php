<?php

namespace App\Http\Controllers\user\opd\bappeda\aplikasi\siperbakin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SiperbakinController extends Controller
{
    Public Function dashboard (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.dashboard');
    }
    
    Public Function pamsimas (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.pamsimas');
    }   


    Public Function sanimas (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.sanimas');
    }   

    Public Function tps3r (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.tps3r');
    }   

    Public Function wtp (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.wtp');
    }   

    Public Function airlimbahperkotaan (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.airlimbahperkotaan');
    }   

    Public Function ipaldanseptictank (){
        return view ('user.opd.bappeda.aplikasi.siperbakin.ipaldanseptictank');
    }   


}


