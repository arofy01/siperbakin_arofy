<?php

namespace App\Http\Controllers\user\sd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class SdController extends Controller
{

    Public function dashboard (){
        return view ('user.sd.dashboard');
    }
}
