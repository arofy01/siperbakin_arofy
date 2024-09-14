<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar



class lokuskecamatan extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    

    public $datahasilfilter;


    public function carilokuskecamatan(){
        $this->datahasilfilter = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', 
            DB::raw('COUNT(CASE WHEN pensasaran = 1 THEN 1 ELSE NULL END) as pensasaran'),
            DB::raw('COUNT(CASE WHEN intervensi = 1 THEN 1 ELSE NULL END) as intervensi')
        )
        ->groupBy('kecamatan')
        ->get();

    }

    public function render()
    {

        // Panggil Function
        $this->carilokuskecamatan();

       $datahasilfilter = $this->datahasilfilter;

        // mengambil info user yang login
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.lokuskecamatan', compact('userinfo','datahasilfilter'));
    }
}
