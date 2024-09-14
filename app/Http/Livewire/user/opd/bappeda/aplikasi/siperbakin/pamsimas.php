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

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModPamsimas;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;


class pamsimas extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $Desa=[], $KodeDesa, $Kecamatan, $KodeKecamatan, $Pengelola, 
    $JumlahPendudukKK, $JumlahPendudukJiwa, 
    $TargetPemanfaatanSR, $TargetPemanfaatanKK, $TargetPemanfaatanJiwa,
    $JumlahTerlayaniSR, $JumlahTerlayaniKK, $JumlahTerlayaniJiwa, $JumlahBelumTerlayaniSR, 
    $JumlahBelumTerlayaniKK, $JumlahBelumTerlayaniJiwa, $Latitude, $Longitude, $Berfungsi,
    $Permasalahan, $KapasitasTerpasang, $KapasitasProduksi, $JamOperasi, $TahunPembangunan, $JumlahAnggaran, 
    $KondisiEksisting, $SumberAir, $RencanaPengembangan, $Keterangan;


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
        $pamsimas = ModPamsimas::find($this->hapusId);


        if ($pamsimas) {
            // Mendapatkan path ke file yang ingin dihapus
            $filePath = 'public/images/siperbakin/pamsimas/' . $pamsimas->kondisi_eksisting;

            // Menghapus file jika ada
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }


             // Menghapus data Pamsimas
             $pamsimas->delete();
             $this->dispatchBrowserEvent('dataterhapussukses');


        }
        
    }


    public function TampilModalTambahPamsimas (){
        $this->dispatchBrowserEvent('TampilModalTambahPamsimas');
    }


    // Fungsi untuk membuat Pamsimas Baru
    public function SimpanPamsimas()
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




        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->KondisiEksisting->storeAs('public/images/siperbakin/pamsimas/', $this->Filename);
        }


        ModPamsimas::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'pengelola' =>$this->Pengelola,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,
            'target_pemanfaatan_sr'=>$this->TargetPemanfaatanSR,
            'target_pemanfaatan_kk'=>$this->TargetPemanfaatanKK,
            'target_pemanfaatan_jiwa'=>$this->TargetPemanfaatanJiwa,

            'jumlah_terlayani_sr'=>$this->JumlahTerlayaniSR,
            'jumlah_terlayani_kk'=>$this->JumlahTerlayaniKK,
            'jumlah_terlayani_jiwa'=>$this->JumlahTerlayaniJiwa,

            'jumlah_belum_terlayani_sr'=>$this->JumlahBelumTerlayaniSR,
            'jumlah_belum_terlayani_kk'=>$this->JumlahBelumTerlayaniKK,
            'jumlah_belum_terlayani_jiwa'=>$this->JumlahBelumTerlayaniJiwa,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'berfungsi'=>$this->Berfungsi,
            'permasalahan'=>$this->Permasalahan,
            'kapasitas_terpasang'=>$this->KapasitasTerpasang,
            'kapasitas_produksi'=>$this->KapasitasProduksi,
            'jam_operasi'=>$this->JamOperasi,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,

            'kondisi_eksisting'=>$this->Filename,
            'sumber_air'=>$this->SumberAir,
            'rencana_pengembangan'=>$this->RencanaPengembangan,
            'keterangan'=>$this->Keterangan,
        ]);


        $this->resetInput();

        session()->flash('message', 'Pamsimas berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat Pamsimas
    Public function LihatPamsimas ($lihatId){

        $lihatPamsimas = ModPamsimas::find($lihatId);

        if ($lihatPamsimas){
            $this->KodeKecamatan = $lihatPamsimas->kode_kecamatan;
            $this->KodeDesa = $lihatPamsimas->kode_desa;
            $this->Pengelola = $lihatPamsimas->pengelola;

            $this->JumlahPendudukKK = $lihatPamsimas->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $lihatPamsimas->jumlah_penduduk_jiwa;

            $this->TargetPemanfaatanSR =$lihatPamsimas->target_pemanfaatan_sr;
            $this->TargetPemanfaatanKK =$lihatPamsimas->target_pemanfaatan_kk;
            $this->TargetPemanfaatanJiwa =$lihatPamsimas->target_pemanfaatan_jiwa;


            $this->JumlahTerlayaniSR =$lihatPamsimas->jumlah_terlayani_sr;
            $this->JumlahTerlayaniKK =$lihatPamsimas->jumlah_terlayani_kk;
            $this->JumlahTerlayaniJiwa =$lihatPamsimas->jumlah_terlayani_jiwa;


            $this->JumlahBelumTerlayaniSR =$lihatPamsimas->jumlah_belum_terlayani_sr;
            $this->JumlahBelumTerlayaniKK =$lihatPamsimas->jumlah_belum_terlayani_kk;
            $this->JumlahBelumTerlayaniJiwa =$lihatPamsimas->jumlah_belum_terlayani_jiwa;


            $this->Latitude =$lihatPamsimas->latitude;
            $this->Longitude =$lihatPamsimas->longitude;

            $this->Berfungsi =$lihatPamsimas->berfungsi;
            $this->Permasalahan =$lihatPamsimas->permasalahan;
            $this->KapasitasTerpasang =$lihatPamsimas->kapasitas_terpasang;
            $this->KapasitasProduksi =$lihatPamsimas->kapasitas_produksi;


            $this->JamOperasi =$lihatPamsimas->jam_operasi;
            $this->TahunPembangunan =$lihatPamsimas->tahun_pembangunan;
            $this->JumlahAnggaran =$lihatPamsimas->jumlah_anggaran;


            $this->Filename =$lihatPamsimas->kondisi_eksisting;
            $this->SumberAir =$lihatPamsimas->sumber_air;

            $this->RencanaPengembangan =$lihatPamsimas->rencana_pengembangan;            
            $this->Keterangan =$lihatPamsimas->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatPamsimas');
        }

    } 

    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\siperbakin\pamsimas\pamsimas, 'pamsimas.xlsx');
    }


    public function PDFPamsimas($Id)
    {
        
        $pdfdata = ModPamsimas::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.pamsimas', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Pamsimas.pdf');


    }






    // Fungsi untuk update Pamsimas
    Public function UpdatePamsimas (){

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
        

        if ($this->KondisiEksisting) {

            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            
            // Menyimpan gambar ke dalam folder storage
            $this->KondisiEksisting->storeAs('public/images/siperbakin/pamsimas/', $this->Filename);
        }
        

        ModPamsimas::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'pengelola' =>$this->Pengelola,
            'jumlah_penduduk_kk'=>$this->JumlahPendudukKK,
            'jumlah_penduduk_jiwa'=>$this->JumlahPendudukJiwa,

            'target_pemanfaatan_sr'=>$this->TargetPemanfaatanSR,
            'target_pemanfaatan_kk'=>$this->TargetPemanfaatanKK,
            'target_pemanfaatan_jiwa'=>$this->TargetPemanfaatanJiwa,

            'jumlah_terlayani_sr'=>$this->JumlahTerlayaniSR,
            'jumlah_terlayani_kk'=>$this->JumlahTerlayaniKK,
            'jumlah_terlayani_jiwa'=>$this->JumlahTerlayaniJiwa,

            'jumlah_belum_terlayani_sr'=>$this->JumlahBelumTerlayaniSR,
            'jumlah_belum_terlayani_kk'=>$this->JumlahBelumTerlayaniKK,
            'jumlah_belum_terlayani_jiwa'=>$this->JumlahBelumTerlayaniJiwa,
            'latitude'=>$this->Latitude,
            'longitude'=>$this->Longitude,
            'berfungsi'=>$this->Berfungsi,
            'permasalahan'=>$this->Permasalahan,
            'kapasitas_terpasang'=>$this->KapasitasTerpasang,
            'kapasitas_produksi'=>$this->KapasitasProduksi,
            'jam_operasi'=>$this->JamOperasi,
            'tahun_pembangunan'=>$this->TahunPembangunan,
            'jumlah_anggaran'=>$this->JumlahAnggaran,

            'kondisi_eksisting'=>$this->Filename,

            'sumber_air'=>$this->SumberAir,
            'rencana_pengembangan'=>$this->RencanaPengembangan,
            'keterangan'=>$this->Keterangan,
        ]);

        $this->resetInput();

        session()->flash('message', 'Pamsimas berhasil diupdate');

        

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditPamsimas ($Id){

        $this->editId = $Id;

        $editPamsimas = ModPamsimas::find($this->editId);

        if ($editPamsimas){
            $this->KodeKecamatan = $editPamsimas->kode_kecamatan;
            $this->KodeDesa = $editPamsimas->kode_desa;
            $this->Pengelola = $editPamsimas->pengelola;

            $this->JumlahPendudukKK = $editPamsimas->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $editPamsimas->jumlah_penduduk_jiwa;

            $this->TargetPemanfaatanSR =$editPamsimas->target_pemanfaatan_sr;
            $this->TargetPemanfaatanKK =$editPamsimas->target_pemanfaatan_kk;
            $this->TargetPemanfaatanJiwa =$editPamsimas->target_pemanfaatan_jiwa;

            $this->JumlahTerlayaniSR =$editPamsimas->jumlah_terlayani_sr;
            $this->JumlahTerlayaniKK =$editPamsimas->jumlah_terlayani_kk;
            $this->JumlahTerlayaniJiwa =$editPamsimas->jumlah_terlayani_jiwa;

            $this->JumlahBelumTerlayaniSR =$editPamsimas->jumlah_belum_terlayani_sr;
            $this->JumlahBelumTerlayaniKK =$editPamsimas->jumlah_belum_terlayani_kk;
            $this->JumlahBelumTerlayaniJiwa =$editPamsimas->jumlah_belum_terlayani_jiwa;


            $this->Latitude =$editPamsimas->latitude;
            $this->Longitude =$editPamsimas->longitude;

            $this->Berfungsi =$editPamsimas->berfungsi;
            $this->Permasalahan =$editPamsimas->permasalahan;
            $this->KapasitasTerpasang =$editPamsimas->kapasitas_terpasang;
            $this->KapasitasProduksi =$editPamsimas->kapasitas_produksi;
            $this->JamOperasi =$editPamsimas->jam_operasi;
            $this->TahunPembangunan =$editPamsimas->tahun_pembangunan;
            $this->JumlahAnggaran =$editPamsimas->jumlah_anggaran;

            $this->Filename =$editPamsimas->kondisi_eksisting;

            $this->SumberAir =$editPamsimas->sumber_air;
            $this->RencanaPengembangan =$editPamsimas->rencana_pengembangan;            
            $this->Keterangan =$editPamsimas->keterangan;

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditPamsimas');

       
        }
    }


    Public function resetInput(){


        $this->KodeKecamatan =null;
        $this->KodeDesa = null;
        $this->Pengelola = null;
        $this->JumlahPendudukKK = null;
        $this->JumlahPendudukJiwa= null;

        $this->TargetPemanfaatanSR =null;
        $this->TargetPemanfaatanKK =null;
        $this->TargetPemanfaatanJiwa =null;
        $this->JumlahTerlayaniSR =null;


        $this->JumlahBelumTerlayaniSR =null;
        $this->JumlahBelumTerlayaniKK =null;
        $this->JumlahBelumTerlayaniJiwa =null;


        $this->Latitude =null;
        $this->Longitude =null;

        $this->Berfungsi =null;
        $this->Permasalahan =null;
        $this->KapasitasTerpasang =null;
        $this->KapasitasProduksi =null;
        $this->JamOperasi =null;
        $this->TahunPembangunan =null;
        $this->JumlahAnggaran =null;
        $this->KondisiEksisting =null;
        $this->Filename =null;
        $this->SumberAir =null;
        $this->RencanaPengembangan =null;            
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
        $JumlahPamsimas = ModPamsimas::all();

        $pamsimas = ModPamsimas::where('kode_desa', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $this->TotalPamsimas = $JumlahPamsimas->count(); //mencari total pamsimas

        $this->Kecamatan = ModKecamatan::all();

       
        
        // $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();

        // dd($this->Desa);

        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.pamsimas',compact('userinfo','pamsimas'));

    }
}
