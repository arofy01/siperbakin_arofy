<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Migration\MigrationController;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkese100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj200001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpeke100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpeme100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpend100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modperi100001;
use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpete100001;





Route::post('generate-table', [MigrationController::class, 'generateTable']);



// Berkaitan dengan Login dan Logout


Route::controller(AuthController::class)->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', 'logout');
    });
});


Route::get('/user/opd/bappeda/aplikasi/sidarendu/kese100001', function () {
    $data = Modkese100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/kesj100001', function () {
    $data = Modkesj100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});


Route::get('/user/opd/bappeda/aplikasi/sidarendu/kesj200001', function () {
    $data = Modkesj200001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/peke100001', function () {
    $data = Modpeke100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/peme100001', function () {
    $data = Modpeme100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/pend100001', function () {
    $data = Modpend100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/peri100001', function () {
    $data = Modperi100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});

Route::get('/user/opd/bappeda/aplikasi/sidarendu/pete100001', function () {
    $data = Modpete100001::where('tahun', request('tahun'))->get();
    return response()->json($data);
});



