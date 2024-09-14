<?php

namespace App\Http\Livewire\user\perusahaan;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;



class Dashboard extends Component
{
    public function render()
    {

        $userinfo =Auth::user();


        return view('livewire..user.perusahaan.dashboard', compact('userinfo'));
    }
}
