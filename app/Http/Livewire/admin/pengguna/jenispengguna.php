<?php

namespace App\Http\Livewire\admin\pengguna;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\admin\pengguna\ModJenisPengguna;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;


class Jenispengguna extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    
    Public $NamaJenisPengguna;

    public $editId;

    public $hapusId;

    public $lihatId;


    Public $listeners=['hapusmulai'=>'proseshapus'];


    public function mount()
    {
        
        
    }


    public function convertToUppercase()
    {
        $this->NamaJenisPengguna = strtoupper($this->NamaJenisPengguna);
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        ModJenisPengguna::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }

    public function create()
    {

        $validatedData = $this->validate(
            [
                'NamaJenisPengguna' => ['required', Rule::unique('jenis_pengguna', 'nama_jenis_pengguna')],
            ],
            [
                'NamaJenisPengguna.required' => 'Silahkan isi Nama Jenis Pengguna',
                'NamaJenisPengguna.unique' => 'Nama Jenis Pengguna sudah terdaftar, Isi Nama Jenis Pengguna yang lain.',
            ],
        );

        ModJenisPengguna::create([
            'nama_jenis_pengguna'=>$this->NamaJenisPengguna,
        ]);

        session()->flash('message', 'Jenis Pengguna berhasil ditambahkan');

        $this->dispatchBrowserEvent('closeModal');

        $this->resetInput();
        
    }


    Public function TambahJenisPengguna(){
        $this->dispatchBrowserEvent('TambahJenisPengguna');
    }


    Public function LihatJenisPengguna ($lihatId){

        $lihatjenispengguna = ModJenisPengguna::find($lihatId);

        if ($lihatjenispengguna){
            $this->NamaJenisPengguna= $lihatjenispengguna->nama_jenis_pengguna;
        //    dd($this->NamaJenisPengguna);
            $this->dispatchBrowserEvent('LihatJenisPengguna');

        }else{
            return redirect ()->to('/admin/pengguna/jenispengguna');
        }

    }


    Public function UpdateJenisPengguna (){

        $validatedData = $this->validate(
            [
                'NamaJenisPengguna' => ['required'],
            ],
            [
                'NamaJenisPengguna.required' => 'Silahkan Isi Jenis Pengguna',
            ],
        );

        ModJenisPengguna::where('id', $this->editId)->update([
            'nama_jenis_pengguna'=>$this->NamaJenisPengguna,
        ]);
       
        session()->flash('message', 'Jenis Pengguna berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('closeModal');
    }

    Public function EditJenisPengguna ($Id){

        $this->editId = $Id;

        $jenispengguna = ModJenisPengguna::find($this->editId);

        if ($jenispengguna){
            
            $this->NamaJenisPengguna = $jenispengguna->nama_jenis_pengguna;

            // dd($this->NamaJenisPengguna);
           
            $this->dispatchBrowserEvent('EditJenisPengguna');

        }else{
            return redirect ()->to('/admin/pengguna/jenispengguna');
        }
    }

    Public function resetInput(){

        $this->NamaJenisPengguna =null;

        $this->resetErrorBag();

        $this->resetValidation();

// dd('reset');
    }

 
       

    public function render()
    {
        $jenispengguna = ModJenisPengguna::where('nama_jenis_pengguna', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.pengguna.jenispengguna', compact('jenispengguna'));
    }
}
