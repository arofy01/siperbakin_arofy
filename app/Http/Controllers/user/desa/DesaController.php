<?php

namespace App\Http\Controllers\user\desa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class DesaController extends Controller
{

    Public function dashboard (){
        return view ('user.desa.dashboard');
    }

    
}
