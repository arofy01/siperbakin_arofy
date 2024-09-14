<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use App\Events\RefreshChartData; 





class agregatperkecamatan extends Component
{

    public $kolomfilter = null;

    public $nilaifilter =null;

    public $datahasilfilter;

    public $TotalPendudukMiskin = 0;

    public $chartData; 

 
    public function grafikkecamatan(){
        $this->datahasilfilter = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', DB::raw('COUNT(id) as jumlah_penduduk'))
        ->groupBy('kecamatan')
        ->get();

    
        $labels = $this->datahasilfilter->pluck('kecamatan');
        $data = $this->datahasilfilter->pluck('jumlah_penduduk');

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk',
                    'backgroundColor' => '#3490dc',
                    'data' => $data,
                ],
            ],
        ];
    }



    public function render()
    {

        // Memanggil nilai chartdata
        $chartData= $this->chartData;


        // Memanggil fungsi grafik kecamatan
        $this->grafikkecamatan();
       

        // mengambil info user yang login
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperkecamatan', compact('userinfo','chartData'));
    }
}
