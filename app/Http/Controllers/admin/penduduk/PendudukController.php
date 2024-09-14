<?php

namespace App\Http\Controllers\admin\penduduk;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;





class PendudukController extends Controller
{
    Public Function penduduk (){

        
        return view ('admin.penduduk.penduduk');
    }

    
}



