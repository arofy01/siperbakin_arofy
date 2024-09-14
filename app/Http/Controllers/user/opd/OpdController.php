<?php

namespace App\Http\Controllers\user\opd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class OpdController extends Controller
{

    Public function dashboard (){
        return view ('user.opd.dashboard');
    }
}
