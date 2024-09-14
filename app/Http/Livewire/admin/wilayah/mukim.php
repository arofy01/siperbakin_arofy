<?php

namespace App\Http\Livewire\admin\wilayah;

use Livewire\Component;

use App\Models\Admin\wilayah\ModMukim;

use Livewire\WithPagination;

use Illuminate\Validation\Rule;




class mukim extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';


    Public $KodeMukim, $NamaMukim;
    
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
        ModMukim::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {

        $validatedData = $this->validate(
            [
                'KodeMukim' => 'required',
                'NamaMukim' =>  ['required', Rule::unique('opd', 'nama_opd')],
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
             
            ],
            [
                'KodeMukim.required' => 'Silahkan Isi Kode Mukim',
                'NamaMukim.required' => 'Silahkan Isi Nama Mukim',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
                
            ],
          
        );

        ModMukim::create([
            'kode_Mukim'=>$this->KodeMukim,
            'nama_Mukim' =>$this->NamaMukim,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);

        session()->flash('message', 'Mukim berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatMukim ($lihatId){

        $lihatMukim = ModMukim::find($lihatId);

        if ($lihatMukim){
            $this->KodeMukim= $lihatMukim->kode_Mukim;
            $this->NamaMukim = $lihatMukim->nama_Mukim;
            $this->KodeProvinsi =$lihatMukim->kode_Provinsi;
            $this->KodeKabupaten =$lihatMukim->kode_kabupaten;
            $this->LuasWilayah =$lihatMukim->luas_wilayah;
            $this->Koordinat =$lihatMukim->koordinat;
            $this->Keterangan =$lihatMukim->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatMukim');

        }else{
            return redirect ()->to('/admin/datamaster/Mukim');
        }

    }

    Public function UpdateMukim (){

        $validatedData = $this->validate(
            [
                'KodeMukim' => 'required',
                'NamaMukim' =>  'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'LuasWilayah' => 'required',
            ],
            [
                'KodeMukim.required' => 'Silahkan Isi Kode Mukim',
                'NamaMukim.required' => 'Silahkan Isi Nama Mukim',
                'KodeProvinsi.unique' => 'Silahkan Pilih Provinsi.',
                'KodeKabupaten.required' => 'Silahkan Pilih Kabupaten',
                'LuasWilayah.required' => 'Silahkan Isi Luas Wilayah',
            ],
        );

    
        ModMukim::where('id', $this->editId)->update([
            'kode_Mukim'=>$this->KodeMukim,
            'nama_Mukim' =>$this->NamaMukim,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'luas_wilayah'=>$this->LuasWilayah,
            'koordinat'=>$this->Koordinat,
            'keterangan'=>$this->Keterangan,
        ]);
       
       
        session()->flash('message', 'Mukim berhasil update');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahMukim (){
        $this->dispatchBrowserEvent('TampilModalTambahMukim');
    }



    Public function EditMukim ($Id){

        $this->editId = $Id;

        $Mukim = ModMukim::find($this->editId);

        if ($Mukim){
            $this->KodeMukim= $Mukim->kode_Mukim;
            $this->NamaMukim = $Mukim->nama_Mukim;
            $this->KodeProvinsi =$Mukim->kode_provinsi;
            $this->KodeKabupaten =$Mukim->kode_kabupaten;
            $this->LuasWilayah =$Mukim->luas_wilayah;
            $this->Koordinat =$Mukim->koordinat;
            $this->Keterangan =$Mukim->keterangan;

            $this->dispatchBrowserEvent('TampilModalEditMukim');

        }else{
            return redirect ()->to('/admin/datamaster/Mukim');
        }
    }

    Public function resetInput(){

        $this->KodeMukim='';
            $this->NamaMukim ='';
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
        $Mukim= ModMukim::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.wilayah.mukim', compact('mukim'));
    }
}
