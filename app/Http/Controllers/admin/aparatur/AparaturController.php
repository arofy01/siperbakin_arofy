<?php

namespace app\Http\Controllers\Admin\Aparatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AparaturController extends Controller
{
    Public Function entryaparatur (){
        return view ('admin.aparatur.aparatur');
    }
}
