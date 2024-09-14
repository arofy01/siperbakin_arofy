<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpend100001;

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



class pend100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $SekolahNegeri, $SekolahSwasta, $Tahun;

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
        $pend100001 = Modpend100001::find($this->hapusId);

        if ($pend100001) {
            $pend100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahpend100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahpend100001');
    }


    public function TampilModalLihatpend100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatpend100001');
    }


    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modpend100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.pend100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'pend100001.pdf');
    }


    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\pend100001($TahunFilter), 'pend100001.xlsx');
    }



    public function Simpanpend100001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'SekolahNegeri' => 'required',
            'SekolahSwasta' => 'required',
            'Tahun' => 'required',
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'SekolahNegeri.required' => 'Silahkan isi',
            'SekolahSwasta.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
        ]);

       

        Modpend100001::create([
            'kode_referensi_anak' => 'PEND-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'sekolah_negeri' =>$this->SekolahNegeri,
            'sekolah_swasta' =>$this->SekolahSwasta,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatepend100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'SekolahNegeri' => 'required',
            'SekolahSwasta' => 'required',
            'Tahun' => 'required',
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'SekolahNegeri.required' => 'Silahkan isi',
            'SekolahSwasta.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
        ]);

       

        Modpend100001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'sekolah_negeri' =>$this->SekolahNegeri,
            'sekolah_swasta' =>$this->SekolahSwasta,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }
 

    Public function Editpend100001 ($Id){

        $this->editId = $Id;

        $editpend100001 = Modpend100001::find($this->editId);

        if ($editpend100001){
            $this->KodeKecamatan = $editpend100001->kecamatan;
            $this->SekolahNegeri = $editpend100001->sekolah_negeri;
            $this->SekolahSwasta = $editpend100001->sekolah_swasta;
            $this->Tahun =$editpend100001->tahun;

            $this->dispatchBrowserEvent('TampilModalEditpend100001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->SekolahNegeri= null;

        $this->SekolahSwasta= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modpend100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modpend100001::where('tahun',$this->TahunFilter)->get();
        

        $pend100001 = Modpend100001::where('tahun', 'like', '%'.$this->search.'%')->orderByRaw('tahun DESC,kecamatan ASC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.pend100001', compact('pend100001'));
    }
}
