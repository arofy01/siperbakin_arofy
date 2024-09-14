<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;



class dashboard extends Component
{

    public $chartData;
    public $totalindividu, $totalkeluarga, $totalperempuan, $totallakilaki, $total7tahun, $tota1712tahun, $total1315tahun, $total1618tahun, $total1921tahun, $total2259tahun, $total60tahun;

    
    public function loadDataCount()
    {
       
        // Untuk individu

        $this->totalindividu = DB::connection('mysql_sipeka')->table('p3keindividu')->count();

        $this->totalperempuan = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('jenis_kelamin','Perempuan')->count();

        $this->totallakilaki = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('jenis_kelamin','Laki-laki')->count();

        $this->total7tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('tujuh_tahun','Ya')->count();

        $this->total712tahun =  DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('tujuh_duabelas_tahun','Ya')->count();


        $this->total1315tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('tigabelas_limabelas_tahun','Ya')->count();

        $this->total1618tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('enambelas_delapanbelas_tahun','Ya')->count();

        $this->total1921tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('sembilanbelas_duapuluhsatu_tahun','Ya')->count();

        $this->total2259tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('duapuluhdua_limapuluhsembilan_tahun','Ya')->count();

        $this->total60tahun = DB::connection('mysql_sipeka')->table('p3keindividu')
        ->where('enampuluh_tahun','Ya')->count();


        // UNtuk Kepala Keluarga

        $this->totalkeluarga = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->count();

        $this->totaldesil1 = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->where('desil_kesejahteraan', '1')
        ->count();

        $this->totaldesil2 = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->where('desil_kesejahteraan', '2')
        ->count();

        $this->totaldesil3 = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->where('desil_kesejahteraan', '3')
        ->count();

        $this->totallakilakikeluarga = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->where('jenis_kelamin', 'Laki-laki')
        ->count();

        $this->totalperempuankeluarga = DB::connection('mysql_sipeka')->table('p3kekeluarga')
        ->where('jenis_kelamin', 'Perempuan')
        ->count();


    }


    public function mount()
    {
        // Memanggil metode loadDataCount
        $this->loadDataCount();
    }

    
    public function render()
    {
        // mengambil info user
        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.dashboard',compact('userinfo'));
    }
}
