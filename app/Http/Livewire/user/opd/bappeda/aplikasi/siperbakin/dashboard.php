<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\siperbakin;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\DB;




class dashboard extends Component
{
    public function render()
    {
        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.dashboard',compact('userinfo'));
    }
}
