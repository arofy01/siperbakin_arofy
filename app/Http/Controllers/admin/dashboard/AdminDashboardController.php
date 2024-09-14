<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class AdminDashboardController extends Controller
{
    Public function admin (){
        return view ('admin.dashboard.dashboard');
    }
}
