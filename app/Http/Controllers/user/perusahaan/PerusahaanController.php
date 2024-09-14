<?php

namespace App\Http\Controllers\user\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PerusahaanController extends Controller
{

    Public function dashboard (){
        return view ('user.perusahaan.dashboard');
    }
}
