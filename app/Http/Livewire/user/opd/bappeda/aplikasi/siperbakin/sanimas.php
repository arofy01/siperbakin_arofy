<?php


namespace App\Http\Livewire\user\opd\bappeda\aplikasi\siperbakin;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Dompdf\Dompdf;

use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModSanimas;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;




class sanimas extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = ''; 

    protected $paginationTheme = 'bootstrap';

    Public $Desa=[], $KodeDesa, $Kecamatan, $KodeKecamatan, $JumlahTerbangunSepticTank, $JumlahTerbangunSambunganRumah, 
    $JumlahPendudukKK, $JumlahPendudukJiwa, $Latitude, $Longitude, $Permasalahan, $TahunPembangunan, $JumlahAnggaran, $KondisiEksisting, 
    $JumlahBabsKK, $JumlahBabsJiwa, $MemilikiJambanKK, $MemilikiJambanJiwa, $TidakMemilikiJambanKK, $TidakMemilikiJambanJiwa,
    $RencanaPembangunanSepticTankJamban, $RencanaPembangunanSambunganRumah, $Keterangan;
    


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
        $sanimas = ModSanimas::find($this->hapusId);

        if ($sanimas) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/images/siperbakin/sanimas/' . $sanimas->id)) {
                $folderPath = 'public/images/siperbakin/sanimas/' . $sanimas->id;
                Storage::deleteDirectory($folderPath);
            }

            // Menghapus data Sanimas
            $sanimas->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }


    public function TampilModalTambahSanimas (){
        $this->dispatchBrowserEvent('TampilModalTambahSanimas');
    }



    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\siperbakin\sanimas\sanimas, 'sanimas.xlsx');
    }

    

    // Fungsi untuk membuat Sanimas Baru
    public function SimpanSanimas()
    {
        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KodeDesa.required' => 'Silahkan Pilih Desa',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);


        // dd($this->KondisiEksisting);

        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->KondisiEksisting->storeAs('public/images/siperbakin/sanimas/', $this->Filename);
        }


        ModSanimas::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'tangki_septic' =>$this->JumlahTerbangunSepticTank,
            'sambungan_rumah'=>$this->JumlahTerbangunSambunganRumah,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'permasalahan'=>$this->Permasalahan,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,
            'kondisi_eksisting'=>$this->Filename,
            'jumlah_babs_kk'=>$this->JumlahBabsKK,
            'jumlah_babs_jiwa'=>$this->JumlahBabsJiwa,
            'memiliki_jamban_kk'=>$this->MemilikiJambanKK,
            'memiliki_jamban_jiwa'=>$this->MemilikiJambanJiwa,
            'tidak_memiliki_jamban_kk'=>$this->TidakMemilikiJambanKK,
            'tidak_memiliki_jamban_jiwa'=>$this->TidakMemilikiJambanJiwa,
            'rencana_pembangunan_tangki_septic'=>$this->RencanaPembangunanSepticTankJamban,
            'rencana_pembangunan_sambungan_rumah'=>$this->RencanaPembangunanSambunganRumah,
            'keterangan'=>$this->Keterangan,
            
        ]);


        $this->resetInput();

        session()->flash('message', 'Sanimas berhasil ditambahkan');

        

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat Sanimas
    Public function LihatSanimas ($lihatId){

        $lihatSanimas = ModSanimas::find($lihatId);

        if ($lihatSanimas){
            $this->KodeKecamatan = $lihatSanimas->kode_kecamatan;
            $this->KodeDesa = $lihatSanimas->kode_desa;
            $this->JumlahTerbangunSepticTank = $lihatSanimas->tangki_septic;
            $this->JumlahTerbangunSambunganRumah = $lihatSanimas->sambungan_rumah;

            $this->JumlahPendudukKK= $lihatSanimas->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $lihatSanimas->jumlah_penduduk_jiwa;


            $this->Latitude =$lihatSanimas->latitude;
            $this->Longitude =$lihatSanimas->longitude;
            $this->Permasalahan =$lihatSanimas->permasalahan;


            $this->TahunPembangunan =$lihatSanimas->tahun_pembangunan;
            $this->JumlahAnggaran =$lihatSanimas->jumlah_anggaran;
            $this->Filename =$lihatSanimas->kondisi_eksisting;


            $this->JumlahBabsKK =$lihatSanimas->jumlah_babs_kk;
            $this->JumlahBabsJiwa =$lihatSanimas->jumlah_babs_jiwa;

            $this->MemilikiJambanKK =$lihatSanimas->memiliki_jamban_kk;
            $this->MemilikiJambanJiwa =$lihatSanimas->memiliki_jamban_jiwa;

            $this->TidakMemilikiJambanKK =$lihatSanimas->tidak_memiliki_jamban_kk;
            $this->TidakMemilikiJambanJiwa =$lihatSanimas->tidak_memiliki_jamban_jiwa;


            $this->RencanaPembangunanSepticTankJamban =$lihatSanimas->rencana_pembangunan_tangki_septic;
            $this->RencanaPembangunanSambunganRumah =$lihatSanimas->rencana_pembangunan_sambungan_rumah;

            $this->Keterangan =$lihatSanimas->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatSanimas');
        }

    }


    public function PDFSanimas($Id)
    {
        

        $pdfdata = ModSanimas::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.sanimas', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Sanimas.pdf');


    }




    // Fungsi untuk update Sanimas
    Public function UpdateSanimas (){ 

        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KodeDesa.required' => 'Silahkan Pilih Desa',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);


        

      

        // dd($this->KondisiEksisting);

        if ($this->KondisiEksisting){


            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            
            
            $this->KondisiEksisting->storeAs('public/images/siperbakin/sanimas/', $this->Filename);

            // dd($this->KondisiEksisting);

        }
 
        ModSanimas::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'tangki_septic' =>$this->JumlahTerbangunSepticTank,
            'sambungan_rumah'=>$this->JumlahTerbangunSambunganRumah,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'permasalahan'=>$this->Permasalahan,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,

            'kondisi_eksisting'=>$this->Filename,

            'jumlah_babs_kk'=>$this->JumlahBabsKK,
            'jumlah_babs_jiwa'=>$this->JumlahBabsJiwa,
            'memiliki_jamban_kk'=>$this->MemilikiJambanKK,
            'memiliki_jamban_jiwa'=>$this->MemilikiJambanJiwa,
            'tidak_memiliki_jamban_kk'=>$this->TidakMemilikiJambanKK,
            'tidak_memiliki_jamban_jiwa'=>$this->TidakMemilikiJambanJiwa,
            'rencana_pembangunan_tangki_septic'=>$this->RencanaPembangunanSepticTankJamban,
            'rencana_pembangunan_sambungan_rumah'=>$this->RencanaPembangunanSambunganRumah,
            'keterangan'=>$this->Keterangan,

        ]);

        $this->resetInput();

        session()->flash('message', 'Sanimas berhasil diupdate');

        

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditSanimas ($Id){

        $this->editId = $Id;

        $editSanimas = ModSanimas::find($this->editId);

        if ($editSanimas){
            
            $this->KodeKecamatan = $editSanimas->kode_kecamatan;
            $this->KodeDesa = $editSanimas->kode_desa;
            $this->JumlahTerbangunSepticTank = $editSanimas->tangki_septic;
            $this->JumlahTerbangunSambunganRumah = $editSanimas->sambungan_rumah;

            $this->JumlahPendudukKK= $editSanimas->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $editSanimas->jumlah_penduduk_jiwa;


            $this->Latitude =$editSanimas->latitude;
            $this->Longitude =$editSanimas->longitude;
            $this->Permasalahan =$editSanimas->permasalahan;


            $this->TahunPembangunan =$editSanimas->tahun_pembangunan;
            $this->JumlahAnggaran =$editSanimas->jumlah_anggaran;
        

            $this->Filename =$editSanimas->kondisi_eksisting;


            $this->JumlahBabsKK =$editSanimas->jumlah_babs_kk;
            $this->JumlahBabsJiwa =$editSanimas->jumlah_babs_jiwa;

            $this->MemilikiJambanKK =$editSanimas->memiliki_jamban_kk;
            $this->MemilikiJambanJiwa =$editSanimas->memiliki_jamban_jiwa;

            $this->TidakMemilikiJambanKK =$editSanimas->tidak_memiliki_jamban_kk;
            $this->TidakMemilikiJambanJiwa =$editSanimas->tidak_memiliki_jamban_jiwa;


            $this->RencanaPembangunanSepticTankJamban =$editSanimas->rencana_pembangunan_tangki_septic;
            $this->RencanaPembangunanSambunganRumah =$editSanimas->rencana_pembangunan_sambungan_rumah;
       
            $this->Keterangan =$editSanimas->keterangan;

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditSanimas');

       
        }
    }


    Public function resetInput(){

        $this->KodeKecamatan = null;
        $this->KodeDesa = null;
        $this->JumlahTerbangunSepticTank = null;
        $this->JumlahTerbangunSambunganRumah = null;

        $this->JumlahPendudukKK= null;
        $this->JumlahPendudukJiwa= null;


        $this->Latitude =null;
        $this->Longitude =null;
        $this->Permasalahan =null;


        $this->TahunPembangunan =null;
        $this->JumlahAnggaran =null;
        $this->KondisiEksisting =null;


        $this->JumlahBabsKK =null;
        $this->JumlahBabsJiwa =null;

        $this->MemilikiJambanKK =null;
        $this->MemilikiJambanJiwa =null;

        $this->TidakMemilikiJambanKK =null;
        $this->TidakMemilikiJambanJiwa =null;


        $this->RencanaPembangunanSepticTankJamban =null;
        $this->RencanaPembangunanSambunganRumah =null;

        $this->Keterangan =null;
       


        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function updatedKodeKecamatan()
    {

        $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
        // dd($this->villages);
        $this->KodeDesa=null;
    } 


    public function render()
    {

        $JumlahSanimas = ModSanimas::all();

        $sanimas = ModSanimas::where('kode_desa', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $this->TotalSanimas = $JumlahSanimas->count(); //mencari total sanimas

        $this->Kecamatan = ModKecamatan::all();

       
        
        // $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();

        // dd($this->Desa);

        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.sanimas',compact('userinfo','sanimas'));

    }
}



