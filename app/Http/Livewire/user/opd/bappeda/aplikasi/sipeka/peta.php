<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;



class Peta extends Component
{
    public $kolomfilter = null;

    public $nilaifilter =null;

    public $datahasilfilter=[];

    public $TotalPendudukMiskin = 0;
 


    public $chartData;

    public $totalindividu, $totalkeluarga, $totalperempuan, $totallakilaki, $total7tahun, $total1712tahun, $total1315tahun, $total1618tahun, $total1921tahun, $total2259tahun, $total60tahun;

    public $karangbaru, $kualasimpang, $sekerak, $kejuruanmuda, $rantau, $tenggulun, $tamianghulu, $bandarpusaka, $manyakpayed, $bandamulia, $bendahara, $seruway;

    public function mount()
    {
       
    }

    public function render()
    {
        $this->chartData = [
            'labels' => ['Karang Baru', 'Kualasimpang', 'sekerak', 'Kejuruan Muda', 'Rantau', 'Tenggulun', 'Tamiang Hulu', 'Bandar Pusaka', 'Manyak Payed', 'Banda Mulia', 'Bendahara', 'Seruway'],
            'datasets' => [
                [
                    'label' => 'Penduduk',
                    'backgroundColor' => '#3490dc',
                    'data' => [$this->karangbaru, $this->kualasimpang, $this->sekerak, $this->kejuruanmuda, $this->rantau, $this->tenggulun, $this->tamianghulu, $this->bandarpusaka, $this->manyakpayed, $this->bandamulia, $this->bendahara, $this->seruway],
                ],
            ],
        ];

        $userinfo = Auth::user();

        $chartData = $this->chartData;

        return view('livewire.user.opd.bappeda.aplikasi.sipeka.peta', compact(
            'chartData',
            'userinfo'
        ));
    }
}
