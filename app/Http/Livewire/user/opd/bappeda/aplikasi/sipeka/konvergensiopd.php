<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModKonvergensiOpd;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;





class konvergensiopd extends Component
{

    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    

    public $CariOpd;

    public $UsersWithRole;


    public function konvergensiopd (){
        $role = Role::where('name', 'sipeka-konvergensi-opd')->first();

        $this->UsersWithRole = User::role($role)->get();            
        // dd("$this->usersWithRole");
    }
   


    public function render()
    {

        // memanggil fungsi
        $this->konvergensiopd();

        $UsersWithRole = $this->UsersWithRole;


        // mengambil info user yang login
        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.konvergensiopd', compact('userinfo','UsersWithRole'));
    }
}
