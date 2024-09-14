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

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModAirlimbahperkotaan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;


class airlimbahperkotaan extends Component
{


    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $Desa=[], $KodeDesa, $Kecamatan, $KodeKecamatan, $Dusun, $Uraian, 
    $Pengelola, $JenisSaranaInfrastruktur, $CakupanLayanan, $Kondisi, $SumberDipa,
    $PelaksanaandanPeluncuran, $AlokasiAnggaran, $KondisiEksisting;


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
        $airlimbahperkotaan = ModAirlimbahperkotaan::find($this->hapusId);

        if ($airlimbahperkotaan) {
            // Menghapus folder dan gambar
            if (Storage::exists('public/images/siperbakin/airlimbahperkotaan/' . $airlimbahperkotaan->id)) {
                $folderPath = 'public/images/siperbakin/airlimbahperkotaan/' . $airlimbahperkotaan->id;
                Storage::deleteDirectory($folderPath);
            }

            // Menghapus data Pamsimas
            $pamsimas->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }


    public function TampilModalTambahAirLimbahPerkotaan (){
        $this->dispatchBrowserEvent('TampilModalTambahAirLimbahPerkotaan');
    }




    // Fungsi untuk membuat Pamsimas Baru
    public function SimpanAirLimbahPerkotaan()
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
            $this->KondisiEksisting->storeAs('public/images/siperbakin/airlimbahperkotaan/', $this->Filename);
        }


        ModAirlimbahperkotaan::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'dusun' =>$this->Dusun,
            'uraian'=>$this->Uraian,
            'pengelola'=>$this->Pengelola,
            'cakupan_layanan'=>$this->CakupanLayanan,
            'berfungsi'=>$this->Berfungsi,
            'sumber_dipa'=>$this->SumberDipa,
            'pelaksanaan_dan_peluncuran'=>$this->PelaksanaandanPeluncuran,
            'alokasi_anggaran'=>$this->AlokasiAnggaran,
            'kondisi_eksisting'=>$this->Filename,
           
        ]);


        $this->resetInput();

        session()->flash('message', 'Sistem Pengelolaan Air Limbah Perkotaan berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');
    }




    // Fungsi untuk melihat Pamsimas
    Public function LihatAirlimbahperkotaan ($lihatId){

        $lihatAirlimbahperkotaan = ModAirlimbahperkotaan::find($lihatId);

        if ($lihatAirlimbahperkotaan){
            $this->KodeKecamatan = $lihatAirlimbahperkotaan->kode_kecamatan;
            $this->KodeDesa = $lihatAirlimbahperkotaan->kode_desa;
            $this->Dusun = $lihatAirlimbahperkotaan->dusun;

            $this->Pengelola = $lihatAirlimbahperkotaan->pengelola;
            $this->CakupanLayanan= $lihatAirlimbahperkotaan->cakupan_layanan;

            $this->Berfungsi =$lihatAirlimbahperkotaan->berfungsi;
            $this->SumberDipa =$lihatAirlimbahperkotaan->sumber_dipa;
            $this->PelaksanaandanPeluncuran =$lihatAirlimbahperkotaan->pelaksanaan_dan_peluncuran;


            $this->AlokasiAnggaran =$lihatAirlimbahperkotaan->alokasi_anggaran;

            $this->KondisiEksisting =$lihatAirlimbahperkotaan->kondisi_eksisting;
            $this->Filename =$lihatAirlimbahperkotaan->kondisi_eksisting;         
     

            $this->dispatchBrowserEvent('TampilModalLihatAirLimbahPerkotaan');
        }

    }


    public function PDFAirlimbahperkotaan($Id)
    {
        

        $pdfdata = ModAirlimbahperkotaan::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.airlimbahperkotaan', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Airlimbahperkotaan.pdf');


    }






    // Fungsi untuk update Pamsimas
    Public function UpdateAirlimbahperkotaan (){

        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'KondisiEksisting' => 'nullable|image|max:2048'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KodeDesa.required' => 'Silahkan Pilih Desa',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB'
        ]);


        

        // Periksa baris apa benar-benar ada
        $airlimbahperkotaan = ModAirlimbahperkotaan::find($this->editId);

        if ($airlimbahperkotaan) {
            // Mendapatkan path ke file yang ingin dihapus
            $filePath = 'public/images/pamsimas/' . $airlimbahperkotaan->kondisi_eksisting;

            // Menghapus file jika ada
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
        
        

        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            
            $this->KondisiEksisting->storeAs('public/images/pamsimas/', $this->Filename);

            // dd($this->KondisiEksisting);

        }

        ModPamsimas::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'dusun' =>$this->Dusun,
            'uraian'=>$this->Uraian,
            'pengelola'=>$this->Pengelola,
            'cakupan_layanan'=>$this->CakupanLayanan,
            'berfungsi'=>$this->Berfungsi,
            'sumber_dipa'=>$this->SumberDipa,
            'pelaksanaan_dan_peluncuran'=>$this->PelaksanaandanPeluncuran,
            'alokasi_anggaran'=>$this->AlokasiAnggaran,
            'kondisi_eksisting'=>$this->Filename,
        ]);

        $this->resetInput();

        session()->flash('message', 'Sistem Pengelolaan Air Limbah Perkotaan berhasil diupdate');

        

        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function EditAirlimbahperkotaan ($Id){

        $this->editId = $Id;

        $editAirlimbahperkotaan = ModAirlimbahperkotaan::find($this->editId);

        if ($editAirlimbahperkotaan){
            

            $this->KodeKecamatan = $editAirlimbahperkotaan->kode_kecamatan;
            $this->KodeDesa = $editAirlimbahperkotaan->kode_desa;
            $this->Dusun = $editAirlimbahperkotaan->dusun;

            $this->Pengelola = $editAirlimbahperkotaan->pengelola;
            $this->CakupanLayanan= $editAirlimbahperkotaan->cakupan_layanan;

            $this->Berfungsi =$editAirlimbahperkotaan->berfungsi;
            $this->SumberDipa =$editAirlimbahperkotaan->sumber_dipa;
            $this->PelaksanaandanPeluncuran =$editAirlimbahperkotaan->pelaksanaan_dan_peluncuran;


            $this->AlokasiAnggaran =$editAirlimbahperkotaan->alokasi_anggaran;


            if ($editAirlimbahperkotaan->kondisi_eksisting) {
                $this->KondisiEksisting = Storage::url('public/images/siperbakin/airlimbahperkotaan/' . $editAirlimbahperkotaan->kondisi_eksisting);
            }

            $this->Filename =$editAirlimbahperkotaan->kondisi_eksisting;

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }

            $this->dispatchBrowserEvent('TampilModalEditAirlimbahPerkotaan');

       
        }
    }


    Public function resetInput(){

            $this->KodeKecamatan = null;
            $this->KodeDesa = null;
            $this->Dusun = null;

            $this->Pengelola = null;
            $this->CakupanLayanan= null;

            $this->Berfungsi =null;
            $this->SumberDipa =null;
            $this->PelaksanaandanPeluncuran =null;


            $this->AlokasiAnggaran =null;

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

        $airlimbahperkotaan = ModAirlimbahperkotaan::where('kode_desa', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $this->TotalAirlimbahperkotaan = $airlimbahperkotaan->count(); //mencari total pamsimas

        $this->Kecamatan = ModKecamatan::all();

       
        
        // $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();

        // dd($this->Desa);

        $userinfo =Auth::user();


        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.airlimbahperkotaan',compact('userinfo','airlimbahperkotaan'));

    }
}



