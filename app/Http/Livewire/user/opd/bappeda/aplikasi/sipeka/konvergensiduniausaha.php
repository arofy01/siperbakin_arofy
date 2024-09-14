<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModKonvergensiDuniaUsaha;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;







class konvergensiduniausaha extends Component
{



    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    

    public $CariPerusahaan;

    public $UsersWithRole;


    public function konvergensiduniausaha (){
        $role = Role::where('name', 'sipeka-konvergensi-duniausaha')->first();

        $this->UsersWithRole = User::role($role)->get();            
        // dd("$this->usersWithRole");
    }
   


    public function render()
    {

        // memanggil fungsi
        $this->konvergensiduniausaha();

        $UsersWithRole = $this->UsersWithRole;


        // mengambil info user yang login
        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.konvergensiduniausaha', compact('userinfo','UsersWithRole'));
    }




}
