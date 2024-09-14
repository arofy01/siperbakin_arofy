<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\admin\wilayah\ModProvinsi;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class provinsi extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeProvinsi, $NamaProvinsi;
    
    public $editId;

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];




    public function mount()
    {
        
        
    }

    public function convertToUppercase()
    {
        $this->NamaOPD = strtoupper($this->NamaOPD);
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        ModProvinsi::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeProvinsi' => 'required',
                'NamaProvinsi' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeProvinsi.required' => 'Silahkan Isi Kode Provinsi',
                'NamaProvinsi.required' => 'Silahkan Isi Nama Provinsi',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModProvinsi::create([
            'kode_Provinsi'=>$this->KodeProvinsi,
            'nama_Provinsi' =>$this->NamaProvinsi,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Provinsi berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatProvinsi ($lihatId){

        $lihatProvinsi = ModProvinsi::find($lihatId);

        if ($lihatProvinsi){
            $this->KodeProvinsi= $lihatProvinsi->kode_Provinsi;
            $this->NamaProvinsi = $lihatProvinsi->nama_Provinsi;
            $this->KodeProvinsi =$lihatProvinsi->kode_Provinsi;
            $this->KodeKabupaten =$lihatProvinsi->kode_kabupaten;
            $this->LuasWilayah =$lihatProvinsi->luas_wilayah;
            $this->Koordinat =$lihatProvinsi->koordinat;
            $this->Keterangan =$lihatProvinsi->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatProvinsi');

        }else{
            return redirect ()->to('/admin/datamaster/Provinsi');
        }

    }

    Public function UpdateProvinsi (){

        $validatedData = $this->validate(
            [
                'KodeProvinsi' => 'required',
                'NamaProvinsi' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeProvinsi.required' => 'Silahkan Isi Kode Provinsi',
                'NamaProvinsi.required' => 'Silahkan Isi Nama Provinsi',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModProvinsi::where('id', $this->editId)->update([
            'kode_Provinsi'=>$this->KodeProvinsi,
            'nama_Provinsi' =>$this->NamaProvinsi,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Provinsi berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahProvinsi (){
        $this->dispatchBrowserEvent('TampilModalTambahProvinsi');
    }



    Public function EditProvinsi ($Id){

        $this->editId = $Id;

        $Provinsi = ModProvinsi::find($this->editId);

        if ($Provinsi){
            $this->KodeProvinsi= $Provinsi->kode_Provinsi;
            $this->NamaProvinsi = $Provinsi->nama_Provinsi;
            $this->KodeProvinsi =$Provinsi->kode_provinsi;
            $this->KodeKabupaten =$Provinsi->kode_kabupaten;
            $this->LuasWilayah =$Provinsi->luas_wilayah;
            $this->Koordinat =$Provinsi->koordinat;
            $this->Keterangan =$Provinsi->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditProvinsi');

        }else{
            return redirect ()->to('/admin/datamaster/Provinsi');
        }
    }

    Public function resetInput(){

        $this->KodeProvinsi='';
            $this->NamaProvinsi ='';
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
        $Provinsi= ModProvinsi::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.provinsi', compact('provinsi'));
    }
}
