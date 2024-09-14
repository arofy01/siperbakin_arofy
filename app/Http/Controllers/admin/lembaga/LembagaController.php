<?php

namespace App\Http\Controllers\admin\lembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    Public Function entrylembaga (){
        return view ('admin.lembaga.lembaga');
    }
}
