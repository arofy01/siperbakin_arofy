<?php

namespace App\Http\Controllers\admin\aplikasi\sidarendu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSidarenduController extends Controller
{
    Public Function AdminDaftarData (){
        // dd('ddd');
        return view ('admin.satudata.daftardata');
    }

    Public Function AdminBuatDaftarData (){
        // dd('ddd');
        return view ('admin.satudata.buatdaftardata');
    }



}



