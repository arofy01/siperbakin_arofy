<?php

namespace App\Http\Controllers\user\posyandu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PosyanduController extends Controller
{

    Public function dashboard (){
        return view ('user.posyandu.dashboard');
    }
}
