<?php

namespace App\Http\Controllers\user\smp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class SmpController extends Controller
{

    Public function dashboard (){
        return view ('user.smp.dashboard');
    }
}
