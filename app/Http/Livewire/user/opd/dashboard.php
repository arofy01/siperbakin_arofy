<?php

namespace App\Http\Livewire\user\opd;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;



class dashboard extends Component
{
    public function render()
    {

        $userinfo =Auth::user();

        return view('livewire.user.opd.dashboard', compact('userinfo'));
    }
}
