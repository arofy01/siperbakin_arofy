<?php

namespace App\Http\Controllers\admin\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PenggunaController extends Controller
{
    Public function EntryPengguna (){
        return view ('admin.pengguna.pengguna');
    }


    Public function EntryIzinPengguna (){   
        return view ('admin.pengguna.izinpengguna');
    }

    Public function EntryJenisPengguna (){
        return view ('admin.pengguna.jenispengguna');
    }


    Public function EntryPeranPengguna (){
        return view ('admin.pengguna.peranpengguna');
    }

}
