<?php

namespace App\Http\Livewire\admin\aparatur;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Validation\Rule;

use App\Models\admin\Aparatur\ModAparatur;

use App\Models\admin\penduduk\ModPenduduk;

use App\Models\admin\instansi\ModInstansi;

use App\Models\admin\jabatan\ModLingkupJabatan;

use App\Models\admin\jabatan\ModJenisJabatan;


class Aparatur extends Component
{

    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodePenduduk, $KodeInstansi, $KodeLingkupJabatan;

    //untuk menampung nama file phot aparatur yang telah disimpan di database
    public $PhotoAparatur;

    public $editId;

    public $hapusId;

    public $lihatId;

    //listener untuk proses hapus
    Public $listeners=['hapusmulai'=>'proseshapus'];



    // Memunculkan Modal konfirmasi hapus
    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }



    // Fungsi untuk menghapus data dalam tabel dan menghapus gambar yang tersimpan dalam folder storage
    public function proseshapus()
    {
        $aparatur = Aparatur::find($this->hapusId);

        if ($aparatur) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/images/aparatur/' . $aparatur->id)) {
                $folderPath = 'public/images/aparatur/' . $aparatur->id;
                Storage::deleteDirectory($folderPath);
            }

            // Menghapus data lembaga
            $aparatur->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }


    }

    // Menampilkan modal tambah aparatur
    public function TampilModalTambahAparatur (){
        $this->dispatchBrowserEvent('TampilModalTambahAparatur');
    }


    // Fungsi untuk membuat Lembaga Baru
    public function SimpanAparatur()
    {
        $validatedData = $this->validate([
            'NIK' => ['required', Rule::unique('aparatur', 'nama_lembaga')],
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


        Lembaga::create([
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
    Public function LihatAparatur ($lihatId){

        $lihatLembaga = Lembaga::find($lihatId);

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
    Public function UpdateAparatur (){

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
        $lembaga = Lembaga::find($this->editId);

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

        Aparatur::where('id', $this->editId)->update([
            'nama_lembaga' =>strtoupper($this->NamaLembaga),
            'nama_singkat_lembaga' =>strtoupper($this->NamaSingkatLembaga),
            'jenis_lembaga_id' =>$this->JenisLembaga,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,

        ]);


        session()->flash('message', 'Aparatur berhasil diupdate');

        $this->resetInput();

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditAparatur ($Id){

        $this->editId = $Id;

        $editLembaga = Aparatur::find($this->editId);

        if ($editLembaga){
            $this->NamaLembaga = $editLembaga->nama_lembaga;
            $this->NamaSingkatLembaga = $editLembaga->nama_singkat_lembaga;
            $this->JenisLembaga = $editLembaga->jenis_lembaga_id;
            $this->KodeProvinsi = $editLembaga->kode_provinsi;
            $this->KodeKabupaten= $editLembaga->kode_kabupaten;



            $this->dispatchBrowserEvent('TampilModalEditAparatur');

        }else{
            return redirect ()->to('/admin/aparatur/entryaparatur');
        }
    }




    Public function resetInput(){


        $this->NamaLembaga= null;

        $this->NamaSingkatLembaga= null;

        $this->JenisLembaga= null;



        $this->resetErrorBag();

        $this->resetValidation();

    }








    public function render() 
    {
        $instansi= ModInstansi::all();

        $lingkupjabatan = ModLingkupJabatan::all();

        $jenisjabatan = ModJenisJabatan::all();

        
        $aparaturWithPenduduk = ModPenduduk::has('aparatur')
            ->where('nik', 'like', '%'.$this->search.'%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('livewire..admin.aparatur.aparatur', compact('aparaturWithPenduduk','instansi','lingkupjabatan','jenisjabatan'));

    }
}
