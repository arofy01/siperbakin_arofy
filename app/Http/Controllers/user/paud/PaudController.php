<?php

namespace App\Http\Controllers\user\paud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class PaudController extends Controller
{

    Public function dashboard (){
        return view ('user.paud.dashboard');
    }
}
