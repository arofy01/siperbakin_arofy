<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\admin\wilayah\ModDusun;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class dusun extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeDusun, $KodeDesa, $NamaDusun;
    
    public $editId;

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];




    public function mount()
    {
        
        
    }

    public function convertToUppercase()
    {
        $this->NamaDusun = strtoupper($this->NamaDusun);
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        ModDusun::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeDusun' => 'required',
                'NamaDusun' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeDusun.required' => 'Silahkan Isi Kode Dusun',
                'NamaDusun.required' => 'Silahkan Isi Nama Dusun',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModDusun::create([
            'kode_Dusun'=>$this->KodeDusun,
            'nama_Dusun' =>$this->NamaDusun,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Dusun berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatDusun ($lihatId){

        $lihatDusun = ModDusun::find($lihatId);

        if ($lihatDusun){
            $this->KodeDusun= $lihatDusun->kode_Dusun;
            $this->NamaDusun = $lihatDusun->nama_Dusun;
            $this->KodeProvinsi =$lihatDusun->kode_Provinsi;
            $this->KodeKabupaten =$lihatDusun->kode_kabupaten;
            $this->LuasWilayah =$lihatDusun->luas_wilayah;
            $this->Koordinat =$lihatDusun->koordinat;
            $this->Keterangan =$lihatDusun->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatDusun');

        }else{
            return redirect ()->to('/admin/datamaster/Dusun');
        }

    }

    Public function UpdateDusun (){

        $validatedData = $this->validate(
            [
                'KodeDusun' => 'required',
                'NamaDusun' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeDusun.required' => 'Silahkan Isi Kode Dusun',
                'NamaDusun.required' => 'Silahkan Isi Nama Dusun',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModDusun::where('id', $this->editId)->update([
            'kode_Dusun'=>$this->KodeDusun,
            'nama_Dusun' =>$this->NamaDusun,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Dusun berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahDusun (){
        $this->dispatchBrowserEvent('TampilModalTambahDusun');
    }



    Public function EditDusun ($Id){

        $this->editId = $Id;

        $Dusun = ModDusun::find($this->editId);

        if ($Dusun){
            $this->KodeDusun= $Dusun->kode_Dusun;
            $this->NamaDusun = $Dusun->nama_Dusun;
            $this->KodeProvinsi =$Dusun->kode_provinsi;
            $this->KodeKabupaten =$Dusun->kode_kabupaten;
            $this->LuasWilayah =$Dusun->luas_wilayah;
            $this->Koordinat =$Dusun->koordinat;
            $this->Keterangan =$Dusun->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditDusun');

        }else{
            return redirect ()->to('/admin/datamaster/Dusun');
        }
    }

    Public function resetInput(){

        $this->KodeDusun='';
            $this->NamaDusun ='';
            $this->KodeProvinsi ='';
            $this->KodeKabupaten ='';
            $this->LuasWilayah ='';
            $this->Koordinat ='';
            $this->Keterangan ='';

        $this->resetErrorBag();

        $this->resetValidation();

    }



    public function render() 
    {
        $Dusun= ModDusun::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.dusun', compact('dusun'));
    }
}
