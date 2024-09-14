<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\admin\wilayah\ModKabupaten;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class kabupaten extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeKabupaten, $KodeProvinsi, $NamaKabupaten;
    
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
        ModKabupaten::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeKabupaten' => 'required',
                'NamaKabupaten' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeKabupaten.required' => 'Silahkan Isi Kode Kabupaten',
                'NamaKabupaten.required' => 'Silahkan Isi Nama Kabupaten',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModKabupaten::create([
            'kode_Kabupaten'=>$this->KodeKabupaten,
            'nama_Kabupaten' =>$this->NamaKabupaten,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Kabupaten berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatKabupaten ($lihatId){

        $lihatKabupaten = ModKabupaten::find($lihatId);

        if ($lihatKabupaten){
            $this->KodeKabupaten= $lihatKabupaten->kode_Kabupaten;
            $this->NamaKabupaten = $lihatKabupaten->nama_Kabupaten;
            $this->KodeProvinsi =$lihatKabupaten->kode_Provinsi;
            $this->KodeKabupaten =$lihatKabupaten->kode_kabupaten;
            $this->LuasWilayah =$lihatKabupaten->luas_wilayah;
            $this->Koordinat =$lihatKabupaten->koordinat;
            $this->Keterangan =$lihatKabupaten->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatKabupaten');

        }else{
            return redirect ()->to('/admin/datamaster/Kabupaten');
        }

    }

    Public function UpdateKabupaten (){

        $validatedData = $this->validate(
            [
                'KodeKabupaten' => 'required',
                'NamaKabupaten' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeKabupaten.required' => 'Silahkan Isi Kode Kabupaten',
                'NamaKabupaten.required' => 'Silahkan Isi Nama Kabupaten',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModKabupaten::where('id', $this->editId)->update([
            'kode_Kabupaten'=>$this->KodeKabupaten,
            'nama_Kabupaten' =>$this->NamaKabupaten,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Kabupaten berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahKabupaten (){
        $this->dispatchBrowserEvent('TampilModalTambahKabupaten');
    }



    Public function EditKabupaten ($Id){

        $this->editId = $Id;

        $Kabupaten = ModKabupaten::find($this->editId);

        if ($Kabupaten){
            $this->KodeKabupaten= $Kabupaten->kode_Kabupaten;
            $this->NamaKabupaten = $Kabupaten->nama_Kabupaten;
            $this->KodeProvinsi =$Kabupaten->kode_provinsi;
            $this->KodeKabupaten =$Kabupaten->kode_kabupaten;
            $this->LuasWilayah =$Kabupaten->luas_wilayah;
            $this->Koordinat =$Kabupaten->koordinat;
            $this->Keterangan =$Kabupaten->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditKabupaten');

        }else{
            return redirect ()->to('/admin/datamaster/Kabupaten');
        }
    }

    Public function resetInput(){

        $this->KodeKabupaten='';
            $this->NamaKabupaten ='';
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
        $Kabupaten= ModKabupaten::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.kabupaten', compact('kabupaten'));
    }
}
