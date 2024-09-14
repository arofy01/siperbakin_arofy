<?php

namespace App\Http\Livewire\admin\dashboard;

use Livewire\Component;

use App\Models\admin\lembaga\ModLembaga;

use App\Models\admin\penduduk\ModPenduduk;

use App\Models\Village;

use App\Models\District;




class dashboard extends Component
{
    public function render()
    {
        $penduduk = ModPenduduk::all()->count();
        $dinas = ModLembaga::where('jenis_lembaga_id','1')->count();
        $badan = ModLembaga::where('jenis_lembaga_id','3')->count();
        $kecamatan = ModLembaga::where('jenis_lembaga_id','5')->count();
        $sekretariat = ModLembaga::where('jenis_lembaga_id','2')->count();
        $smp = ModLembaga::where('jenis_lembaga_id','9')->count();
        $sd = ModLembaga::where('jenis_lembaga_id','10')->count();
        $tk = ModLembaga::where('jenis_lembaga_id','11')->count();
        $paud = ModLembaga::where('jenis_lembaga_id','12')->count();
        $dayah = ModLembaga::where('jenis_lembaga_id','13')->count();
        $desa = ModLembaga::where('jenis_lembaga_id','8')->count();
        $puskesmas = ModLembaga::where('jenis_lembaga_id','14')->count();
        $posyandu = ModLembaga::where('jenis_lembaga_id','15')->count();

        // $regencyId = '1116';

        // $villages = Village::whereHas('district.regency', function ($query) use ($regencyId) {
        //     $query->where('regency_id', $regencyId);
        // })->count();
    
        // $districts = District::whereHas('regency', function ($query) use ($regencyId) {
        //     $query->where('regency_id', $regencyId);
        // })->count();
    

        return view('livewire..admin.dashboard.dashboard',
        compact('penduduk',
        'dinas',
        'badan',
        'kecamatan',
        'sekretariat',
        'smp',
        'sd',
        'tk',
        'paud',
        'dayah',
        'desa',
        'puskesmas',
        'posyandu'));
    }
}
