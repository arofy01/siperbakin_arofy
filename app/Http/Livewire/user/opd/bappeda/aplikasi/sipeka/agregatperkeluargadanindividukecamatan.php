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





class agregatperkeluargadanindividukecamatan extends Component
{

    public $kolomfilter = null;

    public $nilaifilter =null;

    public $datahasilfilteragregatkeluarga;

    public $datahasilfilteragregatindividu;

    public $datahasilfilter;

    public $TotalPendudukMiskin = 0;

    public $chartData; 

 
   
    public function agregatdesilkesejahteraankeluarga(){
        $this->datahasilfilteragregatkeluarga = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 1 THEN 1 ELSE NULL END) as desil1keluarga'),
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 2 THEN 1 ELSE NULL END) as desil2keluarga'),
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 3 THEN 1 ELSE NULL END) as desil3keluarga'),
        )
        ->groupBy('kecamatan')
        ->get();
    }



    public function agregatdesilkesejahteraanindividu(){
        $this->datahasilfilteragregatindividu = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 1 THEN 1 ELSE NULL END) as desil1individu'),
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 2 THEN 1 ELSE NULL END) as desil2individu'),
        DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 3 THEN 1 ELSE NULL END) as desil3individu'),
        )
        ->groupBy('kecamatan')
        ->get();
    }



    public function grafikdesilkesejahteraan(){
        $this->datahasilfilter = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', 
            DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 1 THEN 1 ELSE NULL END) as desil1'),
            DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 2 THEN 1 ELSE NULL END) as desil2'),
            DB::raw('COUNT(CASE WHEN desil_kesejahteraan = 3 THEN 1 ELSE NULL END) as desil3'),
        )
        ->groupBy('kecamatan')
        ->get();

        $labels = $this->datahasilfilter->pluck('kecamatan');
        $dataDesil1 = $this->datahasilfilter->pluck('desil1');
        $dataDesil2 = $this->datahasilfilter->pluck('desil2');
        $dataDesil3 = $this->datahasilfilter->pluck('desil3');

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Desil 1',
                    'backgroundColor' => '#3490dc',
                    'data' => $dataDesil1,
                ],
                [
                    'label' => 'Desil 2',
                    'backgroundColor' => '#38c172',
                    'data' => $dataDesil2,
                ],
                [
                    'label' => 'Desil 3',
                    'backgroundColor' => '#e3342f',
                    'data' => $dataDesil3,
                ],
            ],
        ];


    }

    


    public function render()
    {

        // Memanggil nilai chartdata
        $chartData= $this->chartData;


        // Memanggil fungsi grafikdesilkesejahteraan
        $this->grafikdesilkesejahteraan();
        $this->agregatdesilkesejahteraankeluarga();
        $this->agregatdesilkesejahteraanindividu();

        $datahasilfilteragregatkeluarga =$this->datahasilfilteragregatkeluarga;

        // dd($datahasilfilteragregatkeluarga);

        $datahasilfilteragregatindividu =$this->datahasilfilteragregatindividu;

        // mengambil info user yang login
        $userinfo =Auth::user();

   

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperkeluargadanindividukecamatan', compact('userinfo','chartData', 'datahasilfilteragregatkeluarga','datahasilfilteragregatindividu'));
    }
}
