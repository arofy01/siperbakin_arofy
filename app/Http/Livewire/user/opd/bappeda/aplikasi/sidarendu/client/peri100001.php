<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modperi100001;

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



class peri100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan,$KapalMotor,$PerahuTanpaMotorKecil, $MotorTempel, $Tahun;

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
        $peri100001 = Modperi100001::find($this->hapusId);

        if ($peri100001) {
            $peri100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahperi100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahperi100001');
    }


    public function TampilModalLihatperi100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatperi100001');
    }

    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modperi100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.peri100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'peri100001.pdf');
    }


    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\peri100001($TahunFilter), 'peri100001.xlsx');
    }


    public function Simpanperi100001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'KapalMotor' => 'required',
            'PerahuTanpaMotorKecil' => 'required',
            'MotorTempel' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KapalMotor.required' => 'Silahkan isi',
            'PerahuTanpaMotorKecil.required' => 'Silahkan isikan',
            'MotorTempel.unique' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
        ]);

        // if ($this->SuratPengantar){
        //     // Menghasilkan nama unik untuk file gambar
        //     $this->Filename = md5($this->SuratPengantar . microtime()) . '.' . $this->SuratPengantar->extension();
        //     // Menyimpan Surat Pengantar PDF ke dalam folder storage
        //     $this->SuratPengantar->storeAs('public/aplikasi/bappeda/sidarendu/client/suratpengantar/', $this->Filename);
        // }


        Modperi100001::create([
            'kode_referensi_anak' => 'PERI-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'kapal_motor' =>$this->KapalMotor,
            'perahu_tanpa_motor_kecil' =>$this->PerahuTanpaMotorKecil,
            'motor_tempel'=>$this->MotorTempel,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updateperi100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'KapalMotor' => 'required',
            'PerahuTanpaMotorKecil' => 'required',
            'MotorTempel' => 'required',
            'Tahun' => 'required',
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KapalMotor.required' => 'Silahkan isi',
            'PerahuTanpaMotorKecil.required' => 'Silahkan isikan',
            'MotorTempel.unique' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
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
 
        Modperi100001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'kapal_motor' =>$this->KapalMotor,
            'perahu_tanpa_motor_kecil' =>$this->PerahuTanpaMotorKecil,
            'motor_tempel'=>$this->MotorTempel,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editperi100001 ($Id){

        $this->editId = $Id;

        $editperi100001 = Modperi100001::find($this->editId);

        if ($editperi100001){
            $this->KodeKecamatan = $editperi100001->kecamatan;
            $this->KapalMotor = $editperi100001->kapal_motor;
            $this->PerahuTanpaMotorKecil = $editperi100001->perahu_tanpa_motor_kecil;
            $this->MotorTempel = $editperi100001->motor_tempel;
            $this->Tahun =$editperi100001->tahun;

            $this->dispatchBrowserEvent('TampilModalEditperi100001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->KapalMotor= null;

        $this->PerahuTanpaMotorKecil= null;

        $this->MotorTempel= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modperi100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modperi100001::where('tahun',$this->TahunFilter)->get();

      

        $peri100001 = Modperi100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.peri100001', compact('peri100001'));
    }
}
