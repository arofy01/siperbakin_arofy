<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\admin\wilayah\ModKecamatan;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class kecamatan extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeKecamatan, $NamaKecamatan, $NamaKabupaten, $KodeProvinsi, $KodeKabupaten, $LuasWilayah, $Koordinat, $Keterangan;
    
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
        ModKecamatan::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeKecamatan' => 'required',
                'NamaKecamatan' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeKecamatan.required' => 'Silahkan Isi Kode Kecamatan',
                'NamaKecamatan.required' => 'Silahkan Isi Nama Kecamatan',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModKecamatan::create([
            'kode_kecamatan'=>$this->KodeKecamatan,
            'nama_kecamatan' =>$this->NamaKecamatan,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Kecamatan berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatKecamatan ($lihatId){

        $lihatKecamatan = ModKecamatan::find($lihatId);

        if ($lihatKecamatan){
            $this->KodeKecamatan= $lihatKecamatan->kode_kecamatan;
            $this->NamaKecamatan = $lihatKecamatan->nama_kecamatan;
            $this->KodeProvinsi =$lihatKecamatan->kode_Provinsi;
            $this->KodeKabupaten =$lihatKecamatan->kode_kabupaten;
            $this->LuasWilayah =$lihatKecamatan->luas_wilayah;
            $this->Koordinat =$lihatKecamatan->koordinat;
            $this->Keterangan =$lihatKecamatan->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatKecamatan');

        }else{
            return redirect ()->to('/admin/datamaster/kecamatan');
        }

    }

    Public function UpdateKecamatan (){

        $validatedData = $this->validate(
            [
                'KodeKecamatan' => 'required',
                'NamaKecamatan' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeKecamatan.required' => 'Silahkan Isi Kode Kecamatan',
                'NamaKecamatan.required' => 'Silahkan Isi Nama Kecamatan',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModKecamatan::where('id', $this->editId)->update([
            'kode_kecamatan'=>$this->KodeKecamatan,
            'nama_kecamatan' =>$this->NamaKecamatan,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Kecamatan berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahKecamatan (){
        $this->dispatchBrowserEvent('TampilModalTambahKecamatan');
    }



    Public function EditKecamatan ($Id){

        $this->editId = $Id;

        $Kecamatan = ModKecamatan::find($this->editId);

        if ($Kecamatan){
            $this->KodeKecamatan= $Kecamatan->kode_kecamatan;
            $this->NamaKecamatan = $Kecamatan->nama_kecamatan;
            $this->KodeProvinsi =$Kecamatan->kode_provinsi;
            $this->KodeKabupaten =$Kecamatan->kode_kabupaten;
            $this->LuasWilayah =$Kecamatan->luas_wilayah;
            $this->Koordinat =$Kecamatan->koordinat;
            $this->Keterangan =$Kecamatan->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditKecamatan');

        }else{
            return redirect ()->to('/admin/datamaster/kecamatan');
        }
    }

    Public function resetInput(){

        $this->KodeKecamatan='';
            $this->NamaKecamatan ='';
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
        $kecamatan= ModKecamatan::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.kecamatan', compact('kecamatan'));
    }
}
