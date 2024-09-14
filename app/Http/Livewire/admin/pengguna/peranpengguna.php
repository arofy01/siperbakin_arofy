<?php

namespace App\Http\Livewire\admin\pengguna;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\admin\pengguna\ModPeranPengguna;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;


class Peranpengguna extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    

    Public $NamaPeranPengguna;

    Public $NamaGuardPengguna;

    public $editId;

    public $hapusId;

    public $lihatId;


    Public $listeners=['hapusmulai'=>'proseshapus'];


    public function mount()
    {
        
        
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        $role = Role::find($this->hapusId);

        if ($role) {
            $role->delete();
        }

        $this->dispatchBrowserEvent('dataterhapussukses');
    }

    public function create()
    {

        $validatedData = $this->validate(
            [
                'NamaPeranPengguna' =>  ['required', Rule::unique('roles', 'name')],
               
            ],
            [
                'NamaPeranPengguna.required' => 'Silahkan isi Nama Peran Pengguna',
                'NamaPeranPengguna.unique' => 'Nama Peran Pengguna sudah terdaftar, Isi Nama Peran Pengguna yang lain.',
               
            ],
        );

        // Cek apakah peran dengan nama yang sama sudah ada
        $existingRole = Role::where('name', $this->NamaPeranPengguna)->first();
        
        if ($existingRole) {
            $this->addError('NamaPeranPengguna', 'Peran dengan nama tersebut sudah ada');
            return;
        }

        Role::create(['name'=> $this->NamaPeranPengguna]);
        
        session()->flash('message', 'Peran Pengguna berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('closeModal');
    }

    Public function LihatPeranPengguna ($lihatId){

    

        $lihatperanpengguna = ModPeranPengguna::find($lihatId);

        

        if ($lihatperanpengguna){
            $this->NamaPeranPengguna= $lihatperanpengguna->name;
     
            $this->dispatchBrowserEvent('tampilModalLihat');

        }else{
            return redirect ()->to('/admin/pengguna/peranpengguna');
        }

    }



    Public function UpdatePeranPengguna (){

        $validatedData = $this->validate(
            [
                'NamaPeranPengguna' =>  ['required'],
              
            ],
            [
                'NamaPeranPengguna.required' => 'Silahkan Isi Peran Pengguna',
            ],
          
        );

    
        $role = Role::findOrFail($this->editId);
        $role->name = $this->NamaPeranPengguna;
        $role->save();
       
       
        session()->flash('message', 'Peran Pengguna berhasil di update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('closeModal');
    }




    Public function EditPeranPengguna ($Id){

        $this->editId = $Id;

        $peranpengguna = Role::findOrFail($this->editId);

        if ($peranpengguna){
            
            // untuk ditampilkan pada modal
            $this->NamaPeranPengguna = $peranpengguna->name;
           
           
            $this->dispatchBrowserEvent('tampilModalEdit');

        }else{
            return redirect ()->to('/admin/pengguna/peranpengguna');
        }
    }





    Public function resetInput(){

        $this->NamaPeranPengguna = '';

        $this->resetErrorBag();

        $this->resetValidation();

    }

    public function render()
    {
        $peranpengguna = ModPeranPengguna::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        // dd($peranpengguna);

        return view('livewire..admin.pengguna.peranpengguna', compact('peranpengguna'));
    }
}
