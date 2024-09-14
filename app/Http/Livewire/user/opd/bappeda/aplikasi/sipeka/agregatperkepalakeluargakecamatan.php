<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;







class agregatperkepalakeluargakecamatan extends Component
{

    public $kolomfilter = null;

    public $nilaifilter =null;

    public $datahasilfilteragregatkepalakeluarga;

    // public $datahasilfilter;

    // public $TotalPendudukMiskin = 0;

    public $chartData; 

 
   
    public function agregatkepalakeluarga(){
        $this->datahasilfilteragregatkepalakeluarga = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN jenis_kelamin = "Laki-laki" THEN 1 ELSE NULL END) as lakilaki'),
        DB::raw('COUNT(CASE WHEN jenis_kelamin =  "Perempuan" THEN 1 ELSE NULL END) as perempuan'),
        )
        ->groupBy('kecamatan')
        ->get();
    }


    public function grafikkepalakeluarga(){
        $this->datahasilfilter = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN jenis_kelamin = "Laki-laki" THEN 1 ELSE NULL END) as lakilaki'),
        DB::raw('COUNT(CASE WHEN jenis_kelamin =  "Perempuan" THEN 1 ELSE NULL END) as perempuan'),
        )
        ->groupBy('kecamatan')
        ->get();

        $labels = $this->datahasilfilter->pluck('kecamatan');
        $datalakilaki = $this->datahasilfilter->pluck('lakilaki');
        $dataperempuan = $this->datahasilfilter->pluck('perempuan');


        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'backgroundColor' => '#3490dc',
                    'data' => $datalakilaki,
                ],
                [
                    'label' => 'Perempuan',
                    'backgroundColor' => '#38c172',
                    'data' => $dataperempuan,
                ],
            ],
        ];


    }

    


    public function render()
    {

        // Memanggil nilai chartdata
        $chartData= $this->chartData;


        // Memanggil fungsi grafikdesilkesejahteraan
        $this->agregatkepalakeluarga();
        $this->grafikkepalakeluarga();

        $datahasilfilteragregatkepalakeluarga =$this->datahasilfilteragregatkepalakeluarga;

       
        // mengambil info user yang login
        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperkepalakeluargakecamatan', compact('userinfo','chartData', 'datahasilfilteragregatkepalakeluarga'));
    }
}
