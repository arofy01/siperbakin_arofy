<?php

namespace App\Http\Controllers\user\tk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class TkController extends Controller
{
    Public function dashboard (){
        return view ('user.tk.dashboard');
    }
}
