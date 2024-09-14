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





class agregatperpenerimabantuankecamatan extends Component
{

    public $kolomfilter = null;

    public $nilaifilter =null;

    

    



    public function render()
    {

      

        // mengambil info user yang login
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperpenerimabantuankecamatan', compact(
            'userinfo'));
    }
}
