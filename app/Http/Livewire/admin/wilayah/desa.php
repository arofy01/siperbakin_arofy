<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\admin\wilayah\ModDesa;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class desa extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeDesa, $NamaDesa, $NamaKabupaten, $KodeProvinsi, $KodeKabupaten, $LuasWilayah, $Koordinat, $Keterangan;
    
    public $editId;

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];




    public function mount()
    {
        
        
    }

    public function convertToUppercase()
    {
        $this->NamaDesa = strtoupper($this->NamaDesa);
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        ModDesa::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeDesa' => 'required',
                'NamaDesa' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeDesa.required' => 'Silahkan Isi Kode Desa',
                'NamaDesa.required' => 'Silahkan Isi Nama Desa',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModDesa::create([
            'kode_Desa'=>$this->KodeDesa,
            'nama_Desa' =>$this->NamaDesa,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Desa berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatDesa ($lihatId){

        $lihatDesa = ModDesa::find($lihatId);

        if ($lihatDesa){
            $this->KodeDesa= $lihatDesa->kode_Desa;
            $this->NamaDesa = $lihatDesa->nama_Desa;
            $this->KodeProvinsi =$lihatDesa->kode_Provinsi;
            $this->KodeKabupaten =$lihatDesa->kode_kabupaten;
            $this->LuasWilayah =$lihatDesa->luas_wilayah;
            $this->Koordinat =$lihatDesa->koordinat;
            $this->Keterangan =$lihatDesa->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatDesa');

        }else{
            return redirect ()->to('/admin/datamaster/Desa');
        }

    }

    Public function UpdateDesa (){

        $validatedData = $this->validate(
            [
                'KodeDesa' => 'required',
                'NamaDesa' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeDesa.required' => 'Silahkan Isi Kode Desa',
                'NamaDesa.required' => 'Silahkan Isi Nama Desa',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModDesa::where('id', $this->editId)->update([
            'kode_Desa'=>$this->KodeDesa,
            'nama_Desa' =>$this->NamaDesa,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Desa berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahDesa (){
        $this->dispatchBrowserEvent('TampilModalTambahDesa');
    }



    Public function EditDesa ($Id){

        $this->editId = $Id;

        $Desa = ModDesa::find($this->editId);

        if ($Desa){
            $this->KodeDesa= $Desa->kode_Desa;
            $this->NamaDesa = $Desa->nama_Desa;
            $this->KodeProvinsi =$Desa->kode_provinsi;
            $this->KodeKabupaten =$Desa->kode_kabupaten;
            $this->LuasWilayah =$Desa->luas_wilayah;
            $this->Koordinat =$Desa->koordinat;
            $this->Keterangan =$Desa->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditDesa');

        }else{
            return redirect ()->to('/admin/datamaster/Desa');
        }
    }

    Public function resetInput(){

        $this->KodeDesa='';
            $this->NamaDesa ='';
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
        $desa= ModDesa::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.desa', compact('desa'));
    }
}
