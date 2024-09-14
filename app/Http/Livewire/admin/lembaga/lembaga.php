<?php

namespace App\Http\Livewire\admin\lembaga;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Validation\Rule;

use App\Models\admin\lembaga\ModLembaga;

use App\Models\admin\lembaga\ModJenisLembaga;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;


class Lembaga extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $NamaLembaga, $NamaSingkatLembaga, $JenisLembaga, $KodeProvinsi, $KodeKabupaten, $KodeKecamatan, $KodeDesa, $Alamat, $Telepon, $Fax, $Email, $Gambar, $Keterangan;

    // Public $JenisLembaga =[];

    Public $regencies=[]; //untuk menampung mencegah error perulangan di blade

    Public $districts=[]; //untuk menampung mencegah error perulangan di blade

    Public $villages=[]; //untuk menampung mencegah error perulangan di blade

    public $Filename; //untuk menampung nama file gambar yang telah disimpan

    public $editId;

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];   //listener untuk proses hapus




    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }



    public function proseshapus()
    {
        $lembaga = ModLembaga::find($this->hapusId);

        if ($lembaga) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/images/lembaga/' . $lembaga->nama_singkat_lembaga)) {
                $folderPath = 'public/images/lembaga/' . $lembaga->nama_singkat_lembaga;
                Storage::deleteDirectory($folderPath);
            }

            // Menghapus data lembaga
            $lembaga->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }


    public function TampilModalTambahLembaga (){
        $this->dispatchBrowserEvent('TampilModalTambahLembaga');
    }




    // Fungsi untuk membuat Lembaga Baru
    public function create()
    {
        $validatedData = $this->validate([
            'NamaLembaga' => ['required', Rule::unique('lembaga', 'nama_lembaga')],
            'NamaSingkatLembaga' => ['required', Rule::unique('lembaga', 'nama_singkat_lembaga')],
            'JenisLembaga' => 'required',
            'KodeProvinsi' => 'required',
            'KodeKabupaten' => 'required',
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'Gambar' => 'nullable|image|max:2048'
        ], [
            'NamaLembaga.required' => 'Silahkan Isi Nama Lembaga',
            'NamaLembaga.unique' => 'Nama Lembaga sudah terdaftar, Isi Nama Lembaga yang lain.',
            'NamaSingkatLembaga.required' => 'Silahkan Isi Nama Singkat Lembaga',
            'NamaSingkatLembaga.unique' => 'Nama Singkat Lembaga sudah terdaftar, Isi Nama Singkat Lembaga yang lain',
            'JenisLembaga.required' => 'Silahkan Pilih Jenis Lembaga',
            'KodeProvinsi.required' => 'Silahkan Pilih Lokasi Provinsi Lembaga',
            'KodeKabupaten.required' => 'Silahkan Pilih Lokasi Kabupaten Lembaga',
            'KodeKecamatan.required' => 'Silahkan Pilih Lokasi Kecamatan Lembaga',
            'KodeDesa.required' => 'Silahkan Pilih Lokasi Desa Lembaga',
            'Gambar.image' => 'Silahkan isi file dengan jenis gambar',
            'Gambar.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 Megabyite'
        ]);




        if ($this->Gambar){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->Gambar . microtime()) . '.' . $this->Gambar->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->Gambar->storeAs('public/images/lembaga/' . $this->NamaSingkatLembaga, $this->Filename);
        }


        ModLembaga::create([
            'nama_lembaga' => strtoupper($this->NamaLembaga),
            'nama_singkat_lembaga' =>strtoupper($this->NamaSingkatLembaga),
            'jenis_lembaga_id' =>$this->JenisLembaga,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'kode_kecamatan'=>$this->KodeKecamatan,
            'kode_desa'=>$this->KodeDesa,
            'alamat'=>$this->Alamat,
            'telepon'=>$this->Telepon,
            'fax'=>$this->Fax,
            'email'=>$this->Email,
            'gambar'=>$this->Filename,
            'keterangan'=>$this->Keterangan,
        ]);


        session()->flash('message', 'Lembaga berhasil ditambahkan');

        $this->resetInput();

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat lembaga
    Public function LihatLembaga ($lihatId){

        $lihatLembaga = ModLembaga::find($lihatId);

        if ($lihatLembaga){
            $this->NamaLembaga = $lihatLembaga->nama_lembaga;
            $this->NamaSingkatLembaga = $lihatLembaga->nama_singkat_lembaga;
            $this->JenisLembaga = $lihatLembaga->jenisLembaga->nama_jenis_lembaga;
            $this->KodeProvinsi = $lihatLembaga->provinsi->name;
            $this->KodeKabupaten= $lihatLembaga->kabupaten->name;
            $this->KodeKecamatan =$lihatLembaga->kecamatan->name;
            $this->KodeDesa =$lihatLembaga->desa->name;
            $this->Alamat =$lihatLembaga->alamat;
            $this->Telepon =$lihatLembaga->telepon;
            $this->Fax =$lihatLembaga->fax;
            $this->Email =$lihatLembaga->email;
            $this->Filename =$lihatLembaga->gambar;
            $this->Keterangan =$lihatLembaga->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatLembaga');

        }else{
            return redirect ()->to('/admin/lembaga/entrylembaga');
        }

    }

    // Fungsi untuk update Lembaga
    Public function UpdateLembaga (){

        $validatedData = $this->validate([
            'NamaLembaga' => 'required',
            'NamaSingkatLembaga' => 'required',
            'JenisLembaga' => 'required',
            'KodeProvinsi' => 'required',
            'KodeKabupaten' => 'required',
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'Gambar' => 'nullable|image|max:2048' 
        ], [
            'NamaLembaga.required' => 'Silahkan Isi Nama Lembaga',
            'NamaSingkatLembaga.required' => 'Silahkan Isi Nama Singkat Lembaga',
            'JenisLembaga.required' => 'Silahkan Pilih Jenis Lembaga',
            'KodeProvinsi.required' => 'Silahkan Pilih Lokasi Provinsi Lembaga',
            'KodeKabupaten.required' => 'Silahkan Pilih Lokasi Kabupaten Lembaga',
            'KodeKecamatan.required' => 'Silahkan Pilih Lokasi Kecamatan Lembaga',
            'KodeDesa.required' => 'Silahkan Pilih Lokasi Desa Lembaga',
            'Gambar.image' => 'Silahkan pilih file dengan jenis gambar',
            'Gambar.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 Megabyite'
        ]);



        // Periksa baris apa benar-benar ada
        $lembaga = ModLembaga::find($this->editId);

        if ($lembaga) {
            // Menghapus folder dan gambar jika ada
            if (Storage::exists('public/images/lembaga/' . $lembaga->nama_singkat_lembaga)) {
                $folderPath = 'public/images/lembaga/' . $lembaga->nama_singkat_lembaga;
                Storage::deleteDirectory($folderPath);
            }
        }


        if ($this->Gambar){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->Gambar . microtime()) . '.' . $this->Gambar->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->Gambar->storeAs('public/images/lembaga/' . $this->NamaSingkatLembaga, $this->Filename);
        }

        ModLembaga::where('id', $this->editId)->update([
            'nama_lembaga' =>strtoupper($this->NamaLembaga),
            'nama_singkat_lembaga' =>strtoupper($this->NamaSingkatLembaga),
            'jenis_lembaga_id' =>$this->JenisLembaga,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'kode_kecamatan'=>$this->KodeKecamatan,
            'kode_desa'=>$this->KodeDesa,
            'alamat'=>$this->Alamat,
            'telepon'=>$this->Telepon,
            'fax'=>$this->Fax,
            'email'=>$this->Email,
            'gambar'=>$this->Filename,
            'keterangan'=>$this->Keterangan,
        ]);


        session()->flash('message', 'Lembaga berhasil diupdate');

        $this->resetInput();

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditLembaga ($Id){

        $this->editId = $Id;

        $editLembaga = ModLembaga::find($this->editId);

        if ($editLembaga){
            $this->NamaLembaga = $editLembaga->nama_lembaga;
            $this->NamaSingkatLembaga = $editLembaga->nama_singkat_lembaga;
            $this->JenisLembaga = $editLembaga->jenis_lembaga_id;
            $this->KodeProvinsi = $editLembaga->kode_provinsi;
            $this->KodeKabupaten= $editLembaga->kode_kabupaten;
            $this->KodeKecamatan =$editLembaga->kode_kecamatan;
            $this->KodeDesa =$editLembaga->kode_desa;
            $this->Alamat =$editLembaga->alamat;
            $this->Telepon =$editLembaga->telepon;
            $this->Fax =$editLembaga->fax;
            $this->Email =$editLembaga->email;
            $this->Filename =$editLembaga->gambar;
            $this->Keterangan =$editLembaga->keterangan;


            // Mendapatkan data kabupaten berdasarkan $KodeProvinsi
            if ($this->KodeProvinsi) {
                $this->regencies = Regency::where('province_id', $this->KodeProvinsi)->get();
            }

            // Mendapatkan data kecamatan berdasarkan $KodeKabupaten
            if ($this->KodeKabupaten) {
                $this->districts = District::where('regency_id', $this->KodeKabupaten)->get();
            }

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->villages = Village::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditLembaga');

        }else{
            return redirect ()->to('/admin/lembaga/entrylembaga');
        }
    }


    Public function resetInput(){


        $this->NamaLembaga= null;

        $this->NamaSingkatLembaga= null;

        $this->JenisLembaga= null;

        $this->Alamat= null;

        $this->KodeProvinsi= null;

        $this->KodeKabupaten= null;

        $this->KodeKecamatan= null;

        $this->KodeDesa= null;

        $this->Telepon = null;

        $this->Fax=null;

        $this->Email=null;

        $this->Gambar= null;

        $this->Keterangan= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



    public function updatedKodeProvinsi()
    {
        $this->regencies = Regency::where('province_id', $this->KodeProvinsi)->get();
        $this->KodeKabupaten=null;
    }


    public function updatedKodeKabupaten()
    {
        $this->districts = District::where('regency_id', $this->KodeKabupaten)->get();
        $this->KodeKecamatan=null;
    }


    public function updatedKodeKecamatan()
    {

        $this->villages = village::where('district_id', $this->KodeKecamatan)->get();
        // dd($this->villages);
        $this->KodeDesa=null;
    } 


    public function render()
    {

        //  Mendapatkan data provinsi berdasarkan $KodeProvinsi
        $provinces = Province::all();


        $jenislembaga = ModJenisLembaga::all();


        $lembaga = ModLembaga::where('nama_lembaga', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);


        return view('livewire..admin.lembaga.lembaga', compact('lembaga','jenislembaga','provinces'));




    }
}
