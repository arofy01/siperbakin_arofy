<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpeke100001;

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




class peke100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $Baik, $Sedang, $Rusak, $RusakBerat, $Tahun, $SuratPengantar, $Filename;

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
        $peke100001 = Modpeke100001::find($this->hapusId);

        if ($peke100001) {
            $peke100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahpeke100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahpeke100001');
    }


    public function TampilModalLihatpeke100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatpeke100001');
    }


    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modpeke100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.peke100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'peke100001.pdf');
    }



    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\peke100001($TahunFilter), 'peke100001.xlsx');
    }



    public function Simpanpeke100001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Baik' => 'required',
            'Sedang' => 'required',
            'Rusak' => 'required',
            'RusakBerat' => 'required',
            'Tahun' => 'required',

           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Baik.required' => 'Silahkan isi',
            'Sedang.required' => 'Silahkan isikan',
            'Rusak.unique' => 'Silahkan isikan',
            'RusakBerat.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',

           
        ]);

        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/suratpengantar/', $this->Filename);
        // }


        Modpeke100001::create([
            'kode_referensi_anak' => 'PEKE-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'baik' =>$this->Baik,
            'sedang' =>$this->Sedang,
            'rusak'=>$this->Rusak,
            'rusak_berat'=>$this->RusakBerat,
            'tahun'=>$this->Tahun,
         
           
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatepeke100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Baik' => 'required',
            'Sedang' => 'required',
            'Rusak' => 'required',
            'RusakBerat' => 'required',
            'Tahun' => 'required',
      
            
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Baik.required' => 'Silahkan isi',
            'Sedang.required' => 'Silahkan isi',
            'Rusak.unique' => 'Silahkan isi',
            'RusakBerat.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan Masukan Tahun',
       
            
        ]);

        // Periksa baris apa benar-benar ada
        // $peke100001 = Modpeke100001::find($this->editId);

        // if ($SuratPengantar) {
        //     // Menghapus folder dan gambar jika ada
        //     if (Storage::exists('public/aplikasi/bappeda/sidarendu/client/' . $peke100001->surat_pengantar)) {
        //         $folderPath = 'public/aplikasi/bappeda/sidarendu/client/' . $peke100001->surat_pengantar;
        //         Storage::deleteDirectory($folderPath);
        //     }
        // }


        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/', $this->Filename);
        // }

        Modpeke100001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'baik' =>$this->Baik,
            'sedang' =>$this->Sedang,
            'rusak'=>$this->Rusak,
            'rusak_berat'=>$this->RusakBerat,
            'tahun'=>$this->Tahun,
          
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editpeke100001 ($Id){

        $this->editId = $Id;

        $editpeke100001 = Modpeke100001::find($this->editId);

        if ($editpeke100001){
            $this->KodeKecamatan = $editpeke100001->kecamatan;
            $this->Baik = $editpeke100001->baik;
            $this->Sedang = $editpeke100001->sedang;
            $this->Rusak = $editpeke100001->rusak;
            $this->RusakBerat= $editpeke100001->rusak_berat;
            $this->Tahun =$editpeke100001->tahun;
           


            $this->dispatchBrowserEvent('TampilModalEditpeke100001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->Baik= null;

        $this->Sedang= null;

        $this->Rusak= null;

        $this->RusakBerat= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



  
 


    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modpeke100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modpeke100001::where('tahun',$this->TahunFilter)->get();

       

        $peke100001 = Modpeke100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.peke100001', compact('peke100001'));
    }
}
