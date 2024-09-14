<?php

namespace App\Http\Livewire\admin\pengguna;

use Livewire\Component;

use Livewire\WithPagination;

use Livewire\WithFileUploads;

use App\Models\User; 

use Illuminate\Support\Facades\Storage;  // untuk mengakses storage

use App\Models\admin\pengguna\ModJenisPengguna;

use App\Models\admin\lembaga\ModLembaga;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

 
class Pengguna extends Component
{

    use WithPagination;

    use WithFileUploads;


    public $search = '';

    protected $paginationTheme = 'bootstrap';

    

    Public   $NamaJenisPengguna, $NamaLembaga, $NamaPengguna, $Email, $Password, $KonfirmasiPassword, $Avatar;

    public $JenisPenggunaId;

    public $LembagaId;

    public $jenisPenggunaIdString;
    
    public $LembagaIdString;


    public $Filename;

    public $editId;

    public $hapusId;

    public $lihatId;

    public $showInputPassword = false;  //Menampilkan input untuk password pada modal edit

    Public $listeners=['hapusmulai'=>'proseshapus'];


   
    


    public function mount()
    {
        
        $this->JenisPenggunaId='';

        $this->LembagaId='';
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        $user = User::find($this->hapusId);

        if ($user) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/admin_template/mazer/assets/images/faces' . $user->avatar)) {
                $filePath = 'public/admin_template/mazer/assets/images/faces' . $user->avatar;
                Storage::delete($filePath);
            }

            // Menghapus data user
            $user->delete();

        }

        $this->dispatchBrowserEvent('dataterhapussukses');
    }

    public function create()
    {

        $validatedData = $this->validate(
            [
                'JenisPenggunaId' => 'required',
                'LembagaId' => 'required',
                'NamaPengguna' =>  ['required', Rule::unique('users', 'name')],
                'Email' => ['required', 'email', Rule::unique('users', 'email')],
                'Password' => 'required|min:8',
                'KonfirmasiPassword' => ['required','required_with:Password','same:Password'],
            ],
            [
                'JenisPenggunaId.required' => 'Silahkan Pilih Jenis Pengguna',
                'LembagaId.required'=>'Silahkan Pilih Nama Lembaga',
                'NamaPengguna.required' => 'Silahkan masukan Nama Pengguna',
                'NamaPengguna.unique' => 'Nama Pengguna sudah terdaftar, Isi Nama Pengguna yang lain.',
                'Email.required' => 'Silahkan masukan Email',
                'Email.email' => 'Format Email belum benar',
                'Email.unique' => 'Email sudah terdaftar, gunakan email lain.',
                'Password.required' => 'Silahkan isi password',
                'Password.min' => 'Password minimal harus terdiri dari 8 karakter',
                'KonfirmasiPassword.required' => 'Silahkan Isi Konfirmasi Password',
                'KonfirmasiPassword.required_with:Password' => 'Silahkan isi Password terlebih dulu',
                'KonfirmasiPassword.same' => 'Konfirmasi Password tidak sama dengan Password',
              
            ],
          
        );

        if ($this->Avatar){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->Avatar . microtime()) . '.' . $this->Avatar->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->Avatar->storeAs('public/admin_template/mazer/assets/images/faces', $this->Filename);
        }


        // dd($this->JenisPenggunaId);

        // Mengambil nilai dari array properti yang di berada di Select Element
        $jenisPenggunaIdString = $this->JenisPenggunaId['value'];
        $LembagaIdString = $this->LembagaId['value'];

        User::create([
            'jenis_pengguna_id' => $jenisPenggunaIdString,
            'lembaga_id' => $LembagaIdString ,
            'name' => $this->NamaPengguna,
            'email' => $this->Email,
            'email_verified_at' => now(),
            'password' => Hash::make($this->Password),
            'avatar' => $this->Filename,
        ]);
      

        

        session()->flash('message', 'Pengguna berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('closeModal');
    }

    
    Public function LihatPengguna ($lihatId){

        $lihatpengguna = User::find($lihatId);

        if ($lihatpengguna){
            $this->NamaJenisPengguna= $lihatpengguna->jenispengguna->nama_jenis_pengguna;
            $this->NamaLembaga = $lihatpengguna->lembaga->nama_lembaga;
            $this->NamaPengguna = $lihatpengguna->name;
            $this->Email =$lihatpengguna->email;
            $this->Password =$lihatpengguna->password;
            $this->Avatar =$lihatpengguna->avatar;

            $this->dispatchBrowserEvent('tampilModalLihat');

        }else{
            return redirect ()->to('/admin/pengguna/pengguna');
        }

    }

    Public function UpdatePengguna (){

        $validatedData = $this->validate(
            [
                'JenisPenggunaId' => 'required',
                'LembagaId'=>'required',
                'NamaPengguna' =>  ['required'],
                'Email' => ['required','email'],
            ],
            [
                'JenisPenggunaId.required' => 'Silahkan Pilih Jenis Pengguna',
                'LembagaId.required' => 'Silahkan Pilih Nama Lembaga',
                'NamaPengguna.required' => 'Silahkan masukan Nama Pengguna',
                'Email.required' => 'Silahkan masukan Email',
                'Email.email' => 'Format Email belum benar',
                
            ],
        );

        // Mengambil nilai dari array properti yang di berada di Select Element
        $jenisPenggunaIdString = $this->JenisPenggunaId['value'];
        $LembagaIdString = $this->LembagaId['value'];

        if($this->showInputPassword){
            User::where('id', $this->editId)->update([
                'jenis_pengguna_id'=>$jenisPenggunaIdString,
                'lembaga_id'=>$LembagaIdString,
                'name'=>$this->NamaPengguna,
                'email'=>$this->Email,
                'password'=>Hash::make($this->Password),
                'avatar'=>$this->Filename
            ]);
        }else{
            User::where('id', $this->editId)->update([
                'jenis_pengguna_id'=>$jenisPenggunaIdString,
                'lembaga_id' =>$LembagaIdString,
                'name'=>$this->NamaPengguna,
                'email'=>$this->Email,
                'avatar'=>$this->Filename
            ]);
        }
       

        $user = User::find($this->hapusId);

        if ($user) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/admin_template/mazer/assets/images/faces' . $user->avatar)) {
                $filePath = 'public/admin_template/mazer/assets/images/faces' . $user->avatar;
                Storage::delete($filePath);
            }

            // Menghapus data user
            $user->delete();

        }


        if ($this->Avatar){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->Avatar . microtime()) . '.' . $this->Avatar->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->Avatar->storeAs('public/admin_template/mazer/assets/images/faces', $this->Filename);
        }



        session()->flash('message', 'Pengguna berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('closeModal');
    }


    

    Public function EditPengguna ($Id){

        $this->editId = $Id;

        $pengguna = User::find($this->editId);

        if ($pengguna){
            
            $this->JenisPenggunaId = $pengguna->jenis_pengguna_id;
            $this->LembagaId = $pengguna->lembaga_id;
            $this->NamaPengguna = $pengguna->name;
            $this->Email =$pengguna->email;
            $this->Password ='';
            $this->dispatchBrowserEvent('tampilModalEdit');

        }else{
            return redirect ()->to('/admin/pengguna/pengguna');
        }
    }



   

    Public function resetInput(){

        $this->JenisPenggunaId = '';

        $this->LembagaId = '';

        $this->NamaPengguna= '';

        $this->Email= '';

        $this->Password= '';

        $this->KonfirmasiPassword= '';

        $this->showInputPassword = false;

        $this->resetErrorBag();

        $this->resetValidation();

    }


       

    public function render()
    {
        $pengguna = User::where('name', 'like', '%'.$this->search.'%')->orderBy('Jenis_pengguna_id','DESC')->paginate(10);

        $jenispengguna = ModJenisPengguna::all();

        $lembaga = ModLembaga::all();

        return view('livewire..admin.pengguna.pengguna', compact('pengguna','jenispengguna','lembaga'));
    }
}
