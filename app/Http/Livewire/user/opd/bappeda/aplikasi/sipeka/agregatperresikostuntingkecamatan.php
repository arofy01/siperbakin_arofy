<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;







class agregatperresikostuntingkecamatan extends Component
{

    public function render()
    {

      

        // mengambil info user yang login
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.agregatperresikostuntingkecamatan', compact(
            'userinfo'));
    }
}
