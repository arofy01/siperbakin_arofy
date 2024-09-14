<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj200001;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\ModDesa;


use Livewire\WithPagination;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use Carbon\Carbon;

use Dompdf\Dompdf;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Response;

use Maatwebsite\Excel\Facades\Excel;



class kesj200001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $GelandanganPengemis, $Tahun;

    Public $Kecamatan = []; //Menampilkan keseluruhan kecamatan

    Public $TampilTahun=[]; //untuk menampilkan tahun pada select di modal lihat

    public $TahunFilter;

    Public $LihatData=[];

    public $editId;

    public $hapusId;

    Public $listeners=['hapusmulai'=>'proseshapus']; 


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }


    public function proseshapus()
    {
        $kesj200001 = Modkesj200001::find($this->hapusId);

        if ($kesj200001) {
            $kesj200001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahkesj200001 (){
        $this->dispatchBrowserEvent('TampilModalTambahkesj200001');
    }


    public function TampilModalLihatkesj200001 (){

        $this->dispatchBrowserEvent('TampilModalLihatkesj200001');
    }

    
    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modkesj200001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.kesj200001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'kesj200001.pdf');
    }



    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\kesj200001($TahunFilter), 'kesj200001.xlsx');
    }




    public function Simpankesj200001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'GelandanganPengemis' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'GelandanganPengemis.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan isi',
        ]);

        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/suratpengantar/', $this->Filename);
        // }


        Modkesj200001::create([
            'kode_referensi_anak' => 'KESJ-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'gelandangan_pengemis' =>$this->GelandanganPengemis,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatekesj200001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'GelandanganPengemis' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'GelandanganPengemis.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan Masukan Tahun',
           
            
        ]);

        // Periksa baris apa benar-benar ada
        // $kesj200001 = Modkesj200001::find($this->editId);

        // if ($SuratPengantar) {
        //     // Menghapus folder dan gambar jika ada
        //     if (Storage::exists('public/aplikasi/bappeda/sidarendu/client/' . $kesj200001->surat_pengantar)) {
        //         $folderPath = 'public/aplikasi/bappeda/sidarendu/client/' . $kesj200001->surat_pengantar;
        //         Storage::deleteDirectory($folderPath);
        //     }
        // }


        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/', $this->Filename);
        // }

        Modkesj200001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'gelandangan_pengemis' =>$this->GelandanganPengemis,
            'tahun'=>$this->Tahun, 
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editkesj200001 ($Id){

        $this->editId = $Id;

        $editkesj200001 = Modkesj200001::find($this->editId);

        if ($editkesj200001){
            $this->KodeKecamatan = $editkesj200001->kecamatan;
            $this->GelandanganPengemis = $editkesj200001->gelandangan_pengemis;
            $this->Tahun =$editkesj200001->tahun;
          

            $this->dispatchBrowserEvent('TampilModalEditkesj200001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->GelandanganPengemis= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



  
 


    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modkesj200001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modkesj200001::where('tahun',$this->TahunFilter)->get();

      

        $kesj200001 = Modkesj200001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.kesj200001', compact('kesj200001'));
    }
}
