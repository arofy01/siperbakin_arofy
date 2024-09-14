<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj100001;

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



class kesj100001 extends Component
{ 

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $Prasejahtera, $Sejahtera, $SejahteraI, $SejahteraII, $SejahteraIII, $SejahteraIIIplus, $Tahun;

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
        $kesj100001 = Modkesj100001::find($this->hapusId);

        if ($kesj100001) {
            $kesj100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahkesj100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahkesj100001');
    }


    public function TampilModalLihatkesj100001 (){
        $this->dispatchBrowserEvent('TampilModalLihatkesj100001');
    }


    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modkesj100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.kesj100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'kesj100001.pdf');
    }


    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\kesj100001($TahunFilter), 'kesj100001.xlsx');
    }



    public function Simpankesj100001()
    {
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Prasejahtera' => 'required',
            'SejahteraI' => 'required',
            'SejahteraII' => 'required',
            'SejahteraIII' => 'required',
            'SejahteraIIIplus' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Prasejahtera.required' => 'Silahkan isi',
            'SejahteraI.required' => 'Silahkan isikan',
            'SejahteraII.unique' => 'Silahkan isikan',
            'SejahteraIII.required' => 'Silahkan isikan',
            'SejahteraIIIpluas.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan isi',
           
        ]);

        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/suratpengantar/', $this->Filename);
        // }


        Modkesj100001::create([
            'kode_referensi_anak' => 'KESJ-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'prasejahtera' =>$this->Prasejahtera,
            'sejahtera1' =>$this->SejahteraI,
            'sejahtera2'=>$this->SejahteraII,
            'sejahtera3'=>$this->SejahteraIII,
            'sejahtera3plus'=>$this->SejahteraIIIplus,
            'tahun'=>$this->Tahun,
          
           
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatekesj100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Prasejahtera' => 'required',
            'SejahteraI' => 'required',
            'SejahteraII' => 'required',
            'SejahteraIII' => 'required',
            'SejahteraIIIplus' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Prasejahtera.required' => 'Silahkan isi',
            'SejahteraI.required' => 'Silahkan isikan',
            'SejahteraII.unique' => 'Silahkan isikan',
            'SejahteraIII.required' => 'Silahkan isikan',
            'SejahteraIIIpluas.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan isi',
            
        ]);

        // Periksa baris apa benar-benar ada
        // $kesj100001 = Modkesj100001::find($this->editId);

        // if ($SuratPengantar) {
        //     // Menghapus folder dan gambar jika ada
        //     if (Storage::exists('public/aplikasi/bappeda/sidarendu/client/' . $kesj100001->surat_pengantar)) {
        //         $folderPath = 'public/aplikasi/bappeda/sidarendu/client/' . $kesj100001->surat_pengantar;
        //         Storage::deleteDirectory($folderPath);
        //     }
        // }


        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/', $this->Filename);
        // }

        Modkesj100001::where('id', $this->editId)->update([
            'kecamatan' => $this->KodeKecamatan,
            'prasejahtera' =>$this->Prasejahtera,
            'sejahtera1' =>$this->SejahteraI,
            'sejahtera2'=>$this->SejahteraII,
            'sejahtera3'=>$this->SejahteraIII,
            'sejahtera3plus'=>$this->SejahteraIIIplus,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editkesj100001 ($Id){

        $this->editId = $Id;

        $editkesj100001 = Modkesj100001::find($this->editId);

        if ($editkesj100001){
            $this->KodeKecamatan = $editkesj100001->kecamatan;
            $this->Prasejahtera = $editkesj100001->prasejahtera;
            $this->SejahteraI = $editkesj100001->sejahtera1;
            $this->SejahteraII = $editkesj100001->sejahtera2;
            $this->SejahteraIII= $editkesj100001->sejahtera3;
            $this->SejahteraIIIplus= $editkesj100001->sejahtera3plus;
            $this->Tahun =$editkesj100001->tahun;
          


            $this->dispatchBrowserEvent('TampilModalEditkesj100001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->Prasejahtera= null;

        $this->Sejahtera1= null;

        $this->Sejahtera2= null;

        $this->Sejahtera3= null;

        $this->Sejahtera3plus= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modkesj100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modkesj100001::where('tahun',$this->TahunFilter)->get();

      

        $kesj100001 = Modkesj100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.kesj100001', compact('kesj100001'));
    }
}
