<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;






class agregatperklasifikasiusiakecamatan extends Component
{


    public $chartData;

    public $datahasilfilter;

    public $agregatklasifikasiusia;



    Public function agregatklasifikasiusia (){
        $this->agregatklasifikasiusia = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN tujuh_tahun = "Ya" THEN 1 ELSE NULL END) as tujuh_tahun'),
        DB::raw('COUNT(CASE WHEN tujuh_duabelas_tahun = "Ya" THEN 1 ELSE NULL END) as tujuh_duabelas_tahun'),
        DB::raw('COUNT(CASE WHEN tigabelas_limabelas_tahun = "Ya" THEN 1 ELSE NULL END) as tigabelas_limabelas_tahun'),
        DB::raw('COUNT(CASE WHEN enambelas_delapanbelas_tahun = "Ya" THEN 1 ELSE NULL END) as enambelas_delapanbelas_tahun'),
        DB::raw('COUNT(CASE WHEN sembilanbelas_duapuluhsatu_tahun = "Ya" THEN 1 ELSE NULL END) as sembilanbelas_duapuluhsatu_tahun'),
        DB::raw('COUNT(CASE WHEN duapuluhdua_limapuluhsembilan_tahun = "Ya" THEN 1 ELSE NULL END) as duapuluhdua_limapuluhsembilan_tahun'),
        DB::raw('COUNT(CASE WHEN enampuluh_tahun = "Ya" THEN 1 ELSE NULL END) as enampuluh_tahun'),
        )
        ->groupBy('kecamatan')
        ->get();
    }
    
 



    public function grafikklasifikasiusia(){
        $this->datahasilfilter = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->select('kecamatan', 
        DB::raw('COUNT(CASE WHEN tujuh_tahun = "Ya" THEN 1 ELSE NULL END) as tujuh_tahun'),
        DB::raw('COUNT(CASE WHEN tujuh_duabelas_tahun = "Ya" THEN 1 ELSE NULL END) as tujuh_duabelas_tahun'),
        DB::raw('COUNT(CASE WHEN tigabelas_limabelas_tahun = "Ya" THEN 1 ELSE NULL END) as tigabelas_limabelas_tahun'),
        DB::raw('COUNT(CASE WHEN enambelas_delapanbelas_tahun = "Ya" THEN 1 ELSE NULL END) as enambelas_delapanbelas_tahun'),
        DB::raw('COUNT(CASE WHEN sembilanbelas_duapuluhsatu_tahun = "Ya" THEN 1 ELSE NULL END) as sembilanbelas_duapuluhsatu_tahun'),
        DB::raw('COUNT(CASE WHEN duapuluhdua_limapuluhsembilan_tahun = "Ya" THEN 1 ELSE NULL END) as duapuluhdua_limapuluhsembilan_tahun'),
        DB::raw('COUNT(CASE WHEN enampuluh_tahun = "Ya" THEN 1 ELSE NULL END) as enampuluh_tahun'),
        )
        ->groupBy('kecamatan')
        ->get();

    
        $labels = $this->datahasilfilter->pluck('kecamatan');
        $data7tahun = $this->datahasilfilter->pluck('tujuh_tahun');
        $data712tahun = $this->datahasilfilter->pluck('tujuh_duabelas_tahun');
        $data1315tahun = $this->datahasilfilter->pluck('tigabelas_limabelas_tahun');
        $data1618tahun = $this->datahasilfilter->pluck('enambelas_delapanbelas_tahun');
        $data1921tahun = $this->datahasilfilter->pluck('sembilanbelas_duapuluhsatu_tahun');
        $data2259tahun = $this->datahasilfilter->pluck('duapuluhdua_limapuluhsembilan_tahun');
        $data60tahun = $this->datahasilfilter->pluck('enampuluh_tahun');


        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Usia < 7 Tahun',
                    'backgroundColor' => 'red',
                    'data' => $data7tahun,
                ],
                [
                    'label' => 'Usia 7-12 Tahun',
                    'backgroundColor' => 'orange',
                    'data' => $data712tahun,
                ],

                [
                    'label' => 'Usia 13-15 Tahun',
                    'backgroundColor' => 'yellow',
                    'data' => $data1315tahun,
                ],

                [
                    'label' => 'Usia 16-18 Tahun',
                    'backgroundColor' => 'blue',
                    'data' => $data1618tahun,
                ],

                [
                    'label' => 'Usia 19-21 Tahun',
                    'backgroundColor' => 'cyan',
                    'data' => $data1921tahun,
                ],

                [
                    'label' => 'Usia 22-59 Tahun',
                    'backgroundColor' => 'magenta',
                    'data' => $data2259tahun,
                ],
                [
                    'label' => 'Usia 60 Tahun',
                    'backgroundColor' => 'green',
                    'data' => $data60tahun,
                ],


            ],
        ];
    }



    public function render()
    {

        // Memanggil nilai chartdata

        $this->agregatklasifikasiusia();

        $this->grafikklasifikasiusia();


        $agregatklasifikasiusia=$this->agregatklasifikasiusia;
        
        $chartData= $this->chartData;
       
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperklasifikasiusiakecamatan', compact(
            'userinfo',
            'chartData'));
    }
}
