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

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModTPS3R;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;


class tps3r extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $Desa=[], $KodeDesa, $Kecamatan, $KodeKecamatan, $Pengelola, $JumlahPendudukKK,
    $JumlahPendudukJiwa, $TimbunanSampah, $KapasitasTPS3R, $SampahDikelola, $SampahBelumDikelola,
    $KapasitasTPS3RBelumDigunakan, $Latitude, $Longitude, $JarakTPS3RKePemukiman, $Kondisi, 
    $Permasalahan, $JamOperasi, $TahunPembangunan, $JumlahAnggaran, $KondisiEksisting, $RencanaPengembangan;


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
        $tps3r = ModTPS3R::find($this->hapusId);

        if ($tps3r->kondisi_eksisting) {
    
            // Mendapatkan path ke file yang ingin dihapus
            $filePath = 'public/images/siperbakin/tps3r/' . $tps3r->kondisi_eksisting;

            // Menghapus file jika ada
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }

            // Menghapus data Pamsimas
            $tps3r->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }



    public function TampilModalTambahTPS3R (){
        $this->dispatchBrowserEvent('TampilModalTambahTPS3R');
    }


    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\siperbakin\tps3r\tps3r, 'tps3r.xlsx');
    }


    // Fungsi untuk membuat Pamsimas Baru
    public function SimpanTps3r()
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
            $this->KondisiEksisting->storeAs('public/images/siperbakin/tps3r/', $this->Filename);
        }


        ModTPS3R::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'pengelola' =>$this->Pengelola,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,
            'timbunan_sampah'=>$this->TimbunanSampah,
            'kapasitas_tps3r'=>$this->KapasitasTPS3R,
            'sampah_dikelola'=>$this->SampahDikelola,
            'sampah_belum_dikelola'=>$this->SampahBelumDikelola,
            'kapasitas_tps3r_belum_digunakan'=>$this->KapasitasTPS3RBelumDigunakan,
            'latitude'=>$this->Latitude,

            'longitude'=>$this->Longitude,
            'jarak_tps3r_ke_pemukiman'=>$this->JarakTPS3RKePemukiman,
            'kondisi'=>$this->Kondisi,
            'permasalahan'=>$this->Permasalahan,
            'jam_operasi'=>$this->JamOperasi,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,

            'kondisi_eksisting'=>$this->Filename,
            'rencana_pengembangan'=>$this->RencanaPengembangan,
        ]);


        $this->resetInput();

        session()->flash('message', 'TPS3R berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat Pamsimas
    Public function LihatTps3r ($lihatId){

        $lihatTps3r = ModTPS3R::find($lihatId);

        if ($lihatTps3r){
            $this->KodeKecamatan = $lihatTps3r->kode_kecamatan;
            $this->KodeDesa = $lihatTps3r->kode_desa;
            $this->Pengelola = $lihatTps3r->pengelola;

            $this->JumlahPendudukKK = $lihatTps3r->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $lihatTps3r->jumlah_penduduk_jiwa;

            $this->TimbunanSampah =$lihatTps3r->timbunan_sampah;
            $this->KapasitasTPS3R =$lihatTps3r->kapasitas_tps3r;
            $this->SampahDikelola =$lihatTps3r->sampah_dikelola;


            $this->SampahBelumDikelola =$lihatTps3r->sampah_belum_dikelola;
            $this->KapasitasTPS3RBelumDigunakan =$lihatTps3r->kapasitas_tps3r_belum_digunakan;
            $this->Latitude =$lihatTps3r->latitude;


            $this->Longitude =$lihatTps3r->longitude;
            $this->JarakTPS3RKePemukiman =$lihatTps3r->jarak_tps3r_ke_pemukiman;
            $this->Kondisi =$lihatTps3r->kondisi;


            $this->Permasalahan =$lihatTps3r->permasalahan;
            $this->JamOperasi =$lihatTps3r->jam_operasi;

            $this->TahunPembangunan =$lihatTps3r->tahun_pembangunan;
            $this->JumlahAnggaran =$lihatTps3r->jumlah_anggaran;

            $this->Filename =$lihatTps3r->kondisi_eksisting;

            $this->RencanaPengembangan =$lihatTps3r->rencana_pengembangan;            

            $this->dispatchBrowserEvent('TampilModalLihatTPS3R');
        }

    }


    public function PDFTps3r($Id)
    {
        
        $pdfdata = ModTPS3R::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.tps3r', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Tps3r.pdf');


    }






    // Fungsi untuk update Pamsimas
    Public function UpdateTps3r (){

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
        
        // dd($this->KondisiEksisting);

        if ($this->KondisiEksisting){

        
            // dd($this->KondisiEksisting);

            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            
            $this->KondisiEksisting->storeAs('public/images/siperbakin/tps3r/', $this->Filename);

        }

        ModTPS3R::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'pengelola' =>$this->Pengelola,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,
            'timbunan_sampah'=>$this->TimbunanSampah,
            'kapasitas_tps3r'=>$this->KapasitasTPS3R,
            'sampah_dikelola'=>$this->SampahDikelola,
            'sampah_belum_dikelola'=>$this->SampahBelumDikelola,
            'kapasitas_tps3r_belum_digunakan'=>$this->KapasitasTPS3RBelumDigunakan,
            'latitude'=>$this->Latitude,

            'longitude'=>$this->Longitude,
            'jarak_tps3r_ke_pemukiman'=>$this->JarakTPS3RKePemukiman,
            'kondisi'=>$this->Kondisi,
            'permasalahan'=>$this->Permasalahan,
            'jam_operasi'=>$this->JamOperasi,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,

            'kondisi_eksisting'=>$this->Filename,
            'rencana_pengembangan'=>$this->RencanaPengembangan,
        ]);

        $this->resetInput();

        session()->flash('message', 'TPS3R berhasil diupdate');

        

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditTps3r($Id){

        $this->editId = $Id;

        $editTps3r = ModTPS3R::find($this->editId);

        if ($editTps3r){
            
            $this->KodeKecamatan = $editTps3r->kode_kecamatan;
            $this->KodeDesa = $editTps3r->kode_desa;
            $this->Pengelola = $editTps3r->pengelola;

            $this->JumlahPendudukKK = $editTps3r->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $editTps3r->jumlah_penduduk_jiwa;

            $this->TimbunanSampah =$editTps3r->timbunan_sampah;
            $this->KapasistasTPS3R =$editTps3r->kapasitas_tps3r;
            $this->SampahDikelola =$editTps3r->sampah_dikelola;


            $this->SampahBelumDikelola =$editTps3r->sampah_belum_dikelola;
            $this->KapasitasTPS3RBelumDigunakan =$editTps3r->kapasitas_tps3r_belum_digunakan;
            $this->Latitude =$editTps3r->latitude;


            $this->Longitude =$editTps3r->longitude;
            $this->JarakTPS3RKePemukiman =$editTps3r->jarak_tps3r_ke_pemukiman;
            $this->Kondisi =$editTps3r->kondisi;


            $this->Permasalahan =$editTps3r->permasalahan;
            $this->JamOperasi =$editTps3r->jam_operasi;

            $this->TahunPembangunan =$editTps3r->tahun_pembangunan;
            $this->JumlahAnggaran =$editTps3r->jumlah_anggaran;

            $this->Filename =$editTps3r->kondisi_eksisting;
 
            $this->RencanaPengembangan =$editTps3r->rencana_pengembangan;   


            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditTPS3R');

       
        }
    }


    Public function resetInput(){

        $this->KodeKecamatan = null;
        $this->KodeDesa = null;
        $this->Pengelola = null;

        $this->JumlahPendudukKK = null;
        $this->JumlahPendudukJiwa= null;

        $this->TimbunanSampah =null;
        $this->KapasistasTPS3R =null;
        $this->SampahDikelola =null;


        $this->SampahBelumDikelola =null;
        $this->KapasitasTPS3RBelumDigunakan =null;
        $this->Latitude =null;

        $this->Longitude =null;
        $this->JarakTPS3RKePemukiman =null;
        $this->Kondisi =null;

        $this->Permasalahan =null;
        $this->JamOperasi =null;

        $this->TahunPembangunan =null;
        $this->JumlahAnggaran =null;
        $this->KondisiEksisting =null;
        $this->Filename =null;

        $this->RencanaPengembangan =null;  

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

        $JumlahTps3r =ModTPS3R::all();

        $tps3r = ModTPS3R::where('kode_desa', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $this->TotalTps3r = $JumlahTps3r->count(); //mencari total pamsimas

        $this->Kecamatan = ModKecamatan::all();

       
        
        // $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();

        // dd($this->Desa);

        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.tps3r',compact('userinfo','tps3r'));

    }
}
