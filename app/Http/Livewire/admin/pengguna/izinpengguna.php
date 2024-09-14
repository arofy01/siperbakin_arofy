<?php

namespace App\Http\Livewire\admin\pengguna;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\User;

use App\Models\admin\pengguna\ModJenisPengguna;

use App\Models\admin\pengguna\ModPeranPengguna;

use App\Models\admin\pengguna\ModIzinPengguna;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

use Spatie\Permission\Models\Role;


class Izinpengguna extends Component
{

    use WithPagination;

    public $search = '';

    public $userId;

    public $tampilPeran = false;

    protected $paginationTheme = 'bootstrap';

 
    public function mount()
    {

       


    }


    public function saveRoles()
{
    // Mendapatkan objek pengguna berdasarkan ID yang sesuai
    $user = User::findOrFail($this->penggunaId);

    // Mengupdate role pengguna berdasarkan nilai yang tercentang
    $user->roles()->sync($this->userRoles);

    // Reset nilai properti userRoles setelah berhasil disimpan
    $this->userRoles = [];

    // Memberikan pesan sukses atau notifikasi lainnya
    session()->flash('message', 'Peran pengguna berhasil disimpan.');

    // Kembali ke tampilan pengguna atau lakukan tindakan lain yang sesuai dengan kebutuhan Anda
    $this->tampilPeran = false;

}


   Public function LihatPeranPadaPengguna ($penggunaId){
        

        $this->penggunaId = $penggunaId;

        $this->tampilPeran = true;

        $this->userId = $penggunaId;

        // Mengambil semua peran dari database
        $allRoles = Role::all();
        
        // Mencari User dengan Id tertentu
        $user = User::find($this->userId);

        //  Mengambil ID dengan perintah pluck
        $userRoles = $user->roles->pluck('id')->toArray();
     
        //  // Menginisialisasi properti userRoles dengan peran-peran yang dimiliki pengguna
         $this->userRoles = $allRoles->whereIn('id', $userRoles)->pluck('id')->toArray();

   }



    public function render()
    {
        $pengguna = User::where('name', 'like', '%'.$this->search.'%')->orderBy('Jenis_pengguna_id','DESC')->paginate(10);

        $jenispengguna = ModJenisPengguna::all();

        $peranpengguna = ModPeranPengguna::all();

        return view('livewire..admin.pengguna.izinpengguna', compact('pengguna','jenispengguna','peranpengguna'));
    }
}
