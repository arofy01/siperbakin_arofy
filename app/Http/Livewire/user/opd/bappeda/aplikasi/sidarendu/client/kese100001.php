<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkese100001;

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



class kese100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $KodeDesa, $Persalinan, $LahirMati, $LahirHidup, $Tahun;

    Public $Kecamatan = [], $Desa=[];

    public $editId;

    public $hapusId;

    Public $TampilTahun=[]; //untuk menampilkan tahun pada select di modal lihat

    // public $Lihatkese100001=[];

    public $TahunFilter;

    Public $LihatData=[];

    Public $listeners=['hapusmulai'=>'proseshapus']; 



    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modkese100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.kese100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'kese100001.pdf');
    }


 

    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\kese100001($TahunFilter), 'kese100001.xlsx');
    }





    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }



    public function proseshapus()
    {
        $kese100001 = Modkese100001::find($this->hapusId);

        if ($kese100001) {
            $kese100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    
    public function TampilModalTambahkese100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahkese100001');
    }

    public function TampilModalLihatkese100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatkese100001');
    }



    public function Simpankese100001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Desa' => 'required',
            'Persalinan' => 'required',
            'LahirMati' => 'required',
            'LahirHidup' => 'required',
            'Tahun' => 'required',
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Desa.required' => 'Silahkan Pilih Desa',
            'Persalinan.required' => 'Silahkan isikan Jumlah Persalinan',
            'LahirMati.unique' => 'Silahkan isikan Jumlah Lahir Mati',
            'LahirHidup.required' => 'Silahkan isikan Jumlah Lahir Hidup',
            'Tahun.required' => 'Silahkan Masukan Tahun',
           
        ]);

        // dd($this->KodeKecamatan);

        Modkese100001::create([
            'kode_referensi_anak' => 'KESE-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'desa' =>$this->KodeDesa,
            'persalinan' =>$this->Persalinan,
            'lahir_hidup'=>$this->LahirHidup,
            'lahir_mati'=>$this->LahirMati,
            'tahun'=>$this->Tahun,
           
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }



    // Fungsi untuk update Lembaga
    Public function Updatekese100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'Desa' => 'required',
            'Persalinan' => 'required',
            'LahirMati' => 'required',
            'LahirHidup' => 'required',
            'Tahun' => 'required',
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'Desa.required' => 'Silahkan Pilih Desa',
            'Persalinan.required' => 'Silahkan isikan Jumlah Persalinan',
            'LahirMati.unique' => 'Silahkan isikan Jumlah Lahir Mati',
            'LahirHidup.required' => 'Silahkan isikan Jumlah Lahir Hidup',
            'Tahun.required' => 'Silahkan Masukan Tahun',
            
        ]);

        // Periksa baris apa benar-benar ada
        $kese100001 = Modkese100001::find($this->editId);

        Modkese100001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'desa' =>$this->KodeDesa,
            'persalinan' =>$this->Persalinan,
            'lahir_hidup'=>$this->LahirHidup,
            'lahir_mati'=>$this->LahirMati,
            'tahun'=>$this->Tahun
           
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }



    Public function Editkese100001 ($Id){

        $this->editId = $Id;

        $editkese100001 = Modkese100001::find($this->editId);

        if ($editkese100001){
            $this->KodeKecamatan = $editkese100001->kecamatan;
            $this->KodeDesa = $editkese100001->desa;
            $this->Persalinan = $editkese100001->persalinan;
            $this->LahirHidup = $editkese100001->lahir_hidup;
            $this->LahirMati= $editkese100001->lahir_mati;
            $this->Tahun =$editkese100001->tahun;

            $this->dispatchBrowserEvent('TampilModalEditkese100001');

        }else{
            return redirect ()->to('/user/opd/bappeda/aplikasi/sidarendu/client/KESE-1-00001');
        }
    }


    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->KodeDesa= null;

        $this->Persalinan= null;

        $this->LahirMati= null;

        $this->LahirHidup= null;

        $this->Tahun= null;

     
        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function render()
    {

        $this->Kecamatan = ModKecamatan::all();

        $this->Desa =  ModDesa::where('district_id', $this->KodeKecamatan)->get();

        $this->TampilTahun = Modkese100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modkese100001::where('tahun',$this->TahunFilter)->get();

      


        $kese100001 = Modkese100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.kese100001', compact('kese100001'));
    }
}
