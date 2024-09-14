<?php

namespace App\Http\Controllers\user\puskesmas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PuskesmasController extends Controller
{

    Public function dashboard (){
        return view ('user.puskesmas.dashboard');
    }
}
