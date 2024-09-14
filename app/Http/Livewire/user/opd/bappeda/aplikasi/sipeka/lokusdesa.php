<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar




class lokusdesa extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
   

    public $datahasilfilter;


   
  


    public function render()
    {

    

        // mengambil info user yang login
        $userinfo =Auth::user();

        
        return view('livewire..user.opd.bappeda.aplikasi.sipeka.lokusdesa', compact('userinfo'));
    }
}
