<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetActiveMenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Ambil URL saat ini
        $currentUrl = $request->url();

        // Cek URL dan atur menu aktif berdasarkan URL

        // -------------------------------------------------------------------------------------------------
        // untuk Admin

        // untuk Dashboard
        if (strpos($currentUrl, 'admin/dashboard') !== false) {
            view()->share('dashboardActive', true);
            view()->share('menuActive', 'dashboard');

        // untuk Penduduk
        }elseif (strpos($currentUrl, 'admin/penduduk') !== false) {
            view()->share('pendudukActive', true);
            view()->share('menuActive', 'penduduk');

            
        // untuk Lembaga
        } elseif (strpos($currentUrl, 'admin/lembaga') !== false) {
            view()->share('opdActive', true);
            view()->share('menuActive', 'lembaga');
        
        // untuk Aparatur
        } elseif (strpos($currentUrl, 'admin/aparatur') !== false) {
            view()->share('aparaturActive', true);
            view()->share('menuActive', 'aparatur');

        // Untuk Wilayah
        } elseif (strpos($currentUrl, 'admin/wilayah') !== false) {
            view()->share('wilayahActive', true);
            view()->share('menuActive', 'wilayah');

        // Untuk Jabatan
        } elseif (strpos($currentUrl, 'admin/pangkatjabatan') !== false) {
            view()->share('pangkatjabatanActive', true);
            view()->share('menuActive', 'pangkatjabatan');

        // untuk Pengguna
        } elseif (strpos($currentUrl, 'admin/pengguna/jenispengguna') !== false) {
            view()->share('jenispenggunaActive', true);
            view()->share('menuActive', 'pengguna');

        } elseif (strpos($currentUrl, 'admin/pengguna/pengguna') !== false) {
            view()->share('penggunaActive', true);
            view()->share('menuActive', 'pengguna');

        } elseif (strpos($currentUrl, 'admin/pengguna/peranpengguna') !== false) {
            view()->share('peranPenggunaActive', true);
            view()->share('menuActive', 'pengguna');

        } elseif (strpos($currentUrl, 'admin/pengguna/izinpengguna') !== false) {
            view()->share('perizinanPenggunaActive', true);
            view()->share('menuActive', 'pengguna');

        } elseif (strpos($currentUrl, 'admin/satudata/daftardata') !== false) {
            view()->share('admindaftarsatudataActive', true);
            view()->share('menuActive', 'adminsatudata');


        } elseif (strpos($currentUrl, 'admin/satudata/buatdaftardata') !== false) {
            view()->share('adminbuatdaftarsatudataActive', true);
            view()->share('menuActive', 'adminsatudata');


            
        


        }
        

        // -------------------------------------------------------------------------------------------------
        // untuk sipenting




        // -------------------------------------------------------------------------------------------------
        // untuk sipeka



        // -------------------------------------------------------------------------------------------------
        // untuk siperbakin




        // -------------------------------------------------------------------------------------------------
        // untuk sidarendu




        return $next($request);
    }
}
