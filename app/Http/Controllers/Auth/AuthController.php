<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function login_post(Request $request)
    {
        $request->validate(
            [
            'email' => 'required',
            'password' => 'required',
            ],
            [
                'email.required' => 'Silahkan isi email',
                'password.required' => 'Silahkan isikan password', 
            ]
        );
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            // Cek apakah user memiliki role tertentu setelah login
            if (Auth::user()->hasRole('superadmin')) {
                return redirect()->intended('admin/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('bappeda-siperbakin')) {
                return redirect()->intended('user/opd/bappeda/aplikasi/siperbakin/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('bappeda-sipeka')) {
                return redirect()->intended('user/opd/bappeda/aplikasi/sipeka/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('bappeda-sidarendu')) {
                return redirect()->intended('user/opd/bappeda/aplikasi/sidarendu/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('bappeda-sipenting')) {
                return redirect()->intended('user/opd/bappeda/aplikasi/sipenting/dashboard')->withSuccess('Anda Berhasil Login');

            
            } elseif (Auth::user()->hasRole('opd')) {
                return redirect()->intended('user/opd/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('desa')) {
                return redirect()->intended('user/desa/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('pusekesmas')) {
                return redirect()->intended('user/puskesmas/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('posyandu')) {
                return redirect()->intended('user/posyandu/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('smp')) {
                return redirect()->intended('user/smp/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('sd')) {
                return redirect()->intended('user/sd/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('tk')) {
                return redirect()->intended('user/tk/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('paud')) {
                return redirect()->intended('user/paud/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('dayah')) {
                return redirect()->intended('user/dayah/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('lsm')) {
                return redirect()->intended('user/lsm/dashboard')->withSuccess('Anda Berhasil Login');
            } elseif (Auth::user()->hasRole('perusahaan')) {
                return redirect()->intended('user/perusahaan/dashboard')->withSuccess('Anda Berhasil Login');
            } else {
                Auth::logout();
                return redirect("login")->withSuccess('Anda tidak memiliki hak akses');
            }
            
        }
        return redirect("login")->withSuccess('Login Anda gagal, email atau password anda kemungkinan salah!');
    
    }

    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
