<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use Livewire\WithPagination;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;



class daftardata extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';



    public function mount()
    {
       $daftardata= ModDaftardata::where('judul_data', 'like', '%'.$this->search.'%')->orderBy('judul_data','DESC')->paginate(10); 
    }



    public function render()
    {
        $daftardata= ModDaftardata::where('judul_data', 'like', '%'.$this->search.'%')->orderBy('judul_data','DESC')->paginate(10);

       
     
    
   
       
        

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.daftardata', compact('daftardata'));
    }
}
