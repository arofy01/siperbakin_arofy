<?php

namespace App\Http\Controllers\admin\wilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    Public Function provinsi (){
        return view ('admin.wilayah.provinsi');
    }

    Public Function kabupaten (){
        return view ('admin.wilayah.kabupaten');
    }

    Public Function kecamatan (){
        return view ('admin.wilayah.kecamatan');
    }

    Public Function mukim (){
        return view ('admin.wilayah.mukim');
    }

    Public Function desa (){
        return view ('admin.wilayah.desa');
    }

    Public Function dusun (){
        return view ('admin.wilayah.dusun');
    }


}
 
