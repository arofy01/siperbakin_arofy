<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpeme100001;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\ModPangkat;

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


class peme100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodePangkat, $LakiLaki, $Perempuan, $Tahun;

    Public $Pangkat = []; //Menampilkan keseluruhan pangkat

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
        $peme100001 = Modpeme100001::find($this->hapusId);

        if ($peme100001) {
            $peme100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahpeme100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahpeme100001');
    }


    public function TampilModalLihatpeme100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatpeme100001');
    }


    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modpeme100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.peme100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'peme100001.pdf');
    }



    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\peme100001($TahunFilter), 'peme100001.xlsx');
    }



    public function Simpanpeme100001()
    {

        $validatedData = $this->validate([
            'KodePangkat' => 'required',
            'LakiLaki' => 'required',
            'Perempuan' => 'required',
            'Tahun' => 'required',
           
        ], [
            'KodePangkat.required' => 'Silahkan Pilih Pangkat',
            'LakiLaki.required' => 'Silahkan isi',
            'Perempuan.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
         
           
        ]);


        Modpeme100001::create([
            'kode_referensi_anak' => 'PEME-1-00001',
            'pangkat_golongan_ruang' => $this->KodePangkat,
            'laki_laki' =>$this->LakiLaki,
            'perempuan' =>$this->Perempuan,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatepeme100001 (){
        $validatedData = $this->validate([
            'KodePangkat' => 'required',
            'LakiLaki' => 'required',
            'Perempuan' => 'required',
            'Tahun' => 'required',
            
        ], [
            'KodePangkat.required' => 'Silahkan Pilih Pangkat',
            'LakiLaki.required' => 'Silahkan isi',
            'Perempuang.required' => 'Silahkan isi',
            'Tahun.required' => 'Silahkan Masukan Tahun',
        ]);


        Modpeme100001::where('id', $this->editId)->update([
            'pangkat_golongan_ruang' =>$this->KodePangkat,
            'laki_laki' =>$this->LakiLaki,
            'perempuan' =>$this->Perempuan,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editpeme100001 ($Id){

        $this->editId = $Id;

        $editpeme100001 = Modpeme100001::find($this->editId);

        if ($editpeme100001){
            $this->KodePangkat = $editpeme100001->pangkat_golongan_ruang;
            $this->LakiLaki = $editpeme100001->laki_laki;
            $this->Perempuan = $editpeme100001->perempuan;
            $this->Tahun =$editpeme100001->tahun;

            $this->dispatchBrowserEvent('TampilModalEditpeme100001');

        }
    }

    
    Public function resetInput(){


        $this->KodePangkat= null;

        $this->LakiLaki= null;

        $this->Perempuan= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



  
 


    public function render()
    {
        $this->Pangkat = ModPangkat::all();

        $this->TampilTahun = Modpeme100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modpeme100001::where('tahun',$this->TahunFilter)->get();

      

        $peme100001 = Modpeme100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.peme100001', compact('peme100001'));
    }
}
