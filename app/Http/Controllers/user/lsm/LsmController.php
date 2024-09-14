<?php

namespace App\Http\Controllers\user\lsm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class LsmController extends Controller
{

    Public function dashboard (){
        return view ('user.lsm.dashboard');
    }
}
