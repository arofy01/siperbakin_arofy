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

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModWTP;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;


class wtp extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $Kecamatan, $KodeKecamatan, $NamaSpam, 
    $Pengelola, $Latitude, $Longitude,
    $Berfungsi, $Permasalahan, $JamOperasi,
    $KapasitasTerpasang, $KapasitasProduksi, 
    $KapasitasDistribusi, $KapasitasAirTerjual,
    $KapasitasBelumTerpakai, $KehilanganAir,
    $Sr,$WilayahPelayanan, $Keterangan, $KondisiEksisting; 
    


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
        $wtp = ModWTP::find($this->hapusId);

        if ($wtp) {
           // Mendapatkan path ke file yang ingin dihapus
           $filePath = 'public/images/siperbakin/wtp/' . $wtp->kondisi_eksisting;

           // Menghapus file jika ada
           if (Storage::exists($filePath)) {
               Storage::delete($filePath);
           }

            // Menghapus data Pamsimas
            $wtp->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }


    public function TampilModalTambahWTP (){
        $this->dispatchBrowserEvent('TampilModalTambahWTP');
    }




    // Fungsi untuk membuat Pamsimas Baru
    public function SimpanWTP()
    {
        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);


// dd($this->KondisiEksisting);

        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->KondisiEksisting->storeAs('public/images/siperbakin/wtp/', $this->Filename);
        }


        ModWTP::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            
            'nama_spam'=>$this->NamaSpam,
            'pengelola'=>$this->Pengelola,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'berfungsi'=>$this->Berfungsi,
            'permasalahan'=>$this->Permasalahan,
            'jam_operasi'=>$this->JamOperasi,
            'kapasitas_terpasang'=>$this->KapasitasTerpasang,

            'kapasitas_produksi'=>$this->KapasitasProduksi,
            'kapasitas_distribusi'=>$this->KapasitasDistribusi,
            'kapasitas_air_terjual'=>$this->KapasitasAirTerjual,
            'kapasitas_belum_terpakai'=>$this->KapasitasBelumTerpakai,
            'kehilangan_air'=>$this->KehilanganAir,
            'sr'=>$this->Sr,
            'wilayah_pelayanan'=>$this->WilayahPelayanan,
            'keterangan'=>$this->Keterangan,
            'kondisi_eksisting'=>$this->Filename,
            
        ]);


        $this->resetInput();

        session()->flash('message', 'WTP berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat Pamsimas
    Public function LihatWTP ($lihatId){

        $lihatWTP = ModWTP::find($lihatId);

        if ($lihatWTP){
            $this->KodeKecamatan = $lihatWTP->kode_kecamatan;

            $this->NamaSpam = $lihatWTP->nama_spam;
            $this->Pengelola= $lihatWTP->pengelola;

            $this->Latitude =$lihatWTP->latitude;
            $this->Longitude =$lihatWTP->longitude;
            $this->Berfungsi =$lihatWTP->berfungsi;


            $this->Permasalahan =$lihatWTP->permasalahan;
            $this->JamOperasi =$lihatWTP->jam_operasi;
            $this->KapasitasTerpasang =$lihatWTP->kapasitas_terpasang;


            $this->KapasitasProduksi =$lihatWTP->kapasitas_produksi;
            $this->KapasitasDistribusi =$lihatWTP->kapasitas_distribusi;
            $this->KapasitasAirTerjual =$lihatWTP->kapasitas_air_terjual;


            $this->KapasitasBelumTerpakai =$lihatWTP->kapasitas_belum_terpakai;
            $this->KehilanganAir =$lihatWTP->kehilangan_air;

            $this->Sr =$lihatWTP->sr;
            $this->WilayahPelayanan =$lihatWTP->wilayah_pelayanan;
            $this->Keterangan =$lihatWTP->keterangan;
            $this->KondisiEksisting =$lihatWTP->kondisi_eksisting;
            $this->Filename =$lihatWTP->kondisi_eksisting;


            $this->dispatchBrowserEvent('TampilModalLihatWTP');
        }

    }

    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\siperbakin\wtp\wtp, 'wtp.xlsx');
    }


    public function PDFWTP($Id)
    {

        $pdfdata = ModWTP::where('id', $Id)->first();

        $pdf = new Dompdf();
 
        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.wtp', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'WTP.pdf');


    }


 



    // Fungsi untuk update Pamsimas
    Public function UpdateWTP (){

        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);
 
        

        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            
            $this->KondisiEksisting->storeAs('public/images/siperbakin/wtp/', $this->Filename);

            // dd($this->KondisiEksisting);

        }

        ModWTP::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            
            'nama_spam'=>$this->NamaSpam,
            'pengelola'=>$this->Pengelola,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'berfungsi'=>$this->Berfungsi,
            'permasalahan'=>$this->Permasalahan,
            'jam_operasi'=>$this->JamOperasi,
            'kapasitas_terpasang'=>$this->KapasitasTerpasang,

            'kapasitas_produksi'=>$this->KapasitasProduksi,
            'kapasitas_distribusi'=>$this->KapasitasDistribusi,
            'kapasitas_air_terjual'=>$this->KapasitasAirTerjual,
            'kapasitas_belum_terpakai'=>$this->KapasitasBelumTerpakai,
            'kehilangan_air'=>$this->KehilanganAir,
            'sr'=>$this->Sr,
            'wilayah_pelayanan'=>$this->WilayahPelayanan,
            'keterangan'=>$this->Keterangan,
            'kondisi_eksisting'=>$this->Filename,
        ]);

        $this->resetInput();

        session()->flash('message', 'WTP berhasil diupdate');

        

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditWTP ($Id){

        $this->editId = $Id;

        $editWTP = ModWTP::find($this->editId);

        if ($editWTP){
            $this->KodeKecamatan = $editWTP->kode_kecamatan;

            $this->NamaSpam = $editWTP->nama_spam;
            $this->Pengelola= $editWTP->pengelola;

            $this->Latitude =$editWTP->latitude;
            $this->Longitude =$editWTP->longitude;
            $this->Berfungsi =$editWTP->berfungsi;


            $this->Permasalahan =$editWTP->permasalahan;
            $this->JamOperasi =$editWTP->jam_operasi;
            $this->KapasitasTerpasang =$editWTP->kapasitas_terpasang;


            $this->KapasitasProduksi =$editWTP->kapasitas_produksi;
            $this->KapasitasDistribusi =$editWTP->kapasitas_distribusi;
            $this->KapasitasAirTerjual =$editWTP->kapasitas_air_terjual;


            $this->KapasitasBelumTerpakai =$editWTP->kapasitas_belum_terpakai;
            $this->KehilanganAir =$editWTP->kehilangan_air;

            $this->Sr =$editWTP->sr;
            $this->WilayahPelayanan =$editWTP->wilayah_pelayanan;
            $this->Keterangan =$editWTP->keterangan;
            $this->Filename =$editWTP->kondisi_eksisting;


            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditWTP');

        }
    }


    Public function resetInput(){

        $this->KodeKecamatan = null;

        $this->NamaSpam = null;
        $this->Pengelola= null;

        $this->Latitude =null;
        $this->Longitude =null;
        $this->Berfungsi =null;


        $this->Permasalahan =null;
        $this->JamOperasi =null;
        $this->KapasitasTerpasang =null;


        $this->KapasitasProduksi =null;
        $this->KapasitasDistribusi =null;
        $this->KapasitasAirTerjual =null;


        $this->KapasitasBelumTerpakai =null;
        $this->KehilanganAir =null;

        $this->Sr =null;
        $this->WilayahPelayanan =null;
        $this->Keterangan =null;
        $this->KondisiEksisting =null;
        $this->Filename =null;

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

        $wtpTotal = ModWTP::all();
        
        $wtp = ModWTP::where('pengelola', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $this->TotalWTP = $wtpTotal->count(); //mencari total pamsimas

        $this->Kecamatan = ModKecamatan::all();

       
        
        // $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();

        // dd($this->Desa);

        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.wtp',compact('userinfo','wtp'));

    }
}



