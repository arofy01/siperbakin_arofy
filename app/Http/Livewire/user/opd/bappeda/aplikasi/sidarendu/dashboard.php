<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\admin\lembaga\ModLembaga;



class dashboard extends Component
{

    public function render()
    {
        // Menampilkan seluruh lembaga
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
        $perusahaan = ModLembaga::where('jenis_lembaga_id','6')->count();
        $lsm = ModLembaga::where('jenis_lembaga_id','7')->count();
        

        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.dashboard',  compact(
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
        'posyandu', 'userinfo'));
    }
}


