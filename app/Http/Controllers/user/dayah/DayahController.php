<?php

namespace App\Http\Controllers\user\dayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class DayahController extends Controller
{

    Public function dashboard (){
        return view ('user.dayah.dashboard');
    }
}
