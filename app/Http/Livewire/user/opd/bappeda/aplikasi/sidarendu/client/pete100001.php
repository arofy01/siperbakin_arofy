<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sidarendu\client;


use App\Models\user\opd\bappeda\aplikasi\sidarendu\ModDaftardata;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpete100001;

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


class pete100001 extends Component
{

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $KodeKecamatan, $AyamBuras, $AyamRasPedaging, $AyamRasPetelur, $Merpati, $BurungPuyuh, $Itik, $Manila, $Tahun;

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
        $pete100001 = Modpete100001::find($this->hapusId);

        if ($pete100001) {
            $pete100001->delete();
            $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }

    public function TampilModalTambahpete100001 (){
        $this->dispatchBrowserEvent('TampilModalTambahpete100001');
    }


    public function TampilModalLihatpete100001 (){

        $this->dispatchBrowserEvent('TampilModalLihatpete100001');
    }

    public function DownloadPdfData()
    {
        
        $TahunFilter = $this->TahunFilter;

        $pdfdata = Modpete100001::where('tahun', $this->TahunFilter)->get();

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sidarendu.client.pdf.pete100001', compact('pdfdata', 'TahunFilter')));

        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'pete100001.pdf');
    }


    public function DownloadExcelData()
    {
        $TahunFilter = $this->TahunFilter;

        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sidarendu\client\pete100001($TahunFilter), 'pete100001.xlsx');
    }



    public function Simpanpete100001()
    {

        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'AyamBuras' => 'required',
            'AyamRasPedaging' => 'required',
            'AyamRasPetelur' => 'required',
            'Merpati' => 'required',
            'BurungPuyuh' => 'required',
            'Itik' => 'required',
            'Manila' => 'required',
            'Tahun'=>'required'
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'AyamBuras.required' => 'Silahkan isi',
            'AyamRasPedaging.required' => 'Silahkan isikan',
            'AyamRasPetelur.unique' => 'Silahkan isikan',
            'Merpati.required' => 'Silahkan isikan',
            'BurungPuyuh.required' => 'Silahkan isikan',
            'Itik.required' => 'Silahkan isikan',
            'Manila.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
        ]);


        Modpete100001::create([
            'kode_referensi_anak' => 'PETE-1-00001',
            'kecamatan' => $this->KodeKecamatan,
            'ayam_buras' =>$this->AyamBuras,
            'ayam_ras_pedaging' =>$this->AyamRasPedaging,
            'ayam_ras_petelur'=>$this->AyamRasPetelur,
            'merpati'=>$this->Merpati,
            'burung_puyuh'=>$this->BurungPuyuh,
            'itik'=>$this->Itik,
            'manila'=>$this->Manila,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil ditambahkan');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();
    }


        
    Public function Updatepete100001 (){
        $validatedData = $this->validate([
            'Kecamatan' => 'required',
            'AyamBuras' => 'required',
            'AyamRasPedaging' => 'required',
            'AyamRasPetelur' => 'required',
            'Merpati' => 'required',
            'BurungPuyuh' => 'required',
            'Itik' => 'required',
            'Manila' => 'required',
            'Tahun'=>'required'
           
        ], [
            'Kecamatan.required' => 'Silahkan Pilih Kecamatan',
            'AyamBuras.required' => 'Silahkan isi',
            'AyamRasPedaging.required' => 'Silahkan isikan',
            'AyamRasPetelur.unique' => 'Silahkan isikan',
            'Merpati.required' => 'Silahkan isikan',
            'BurungPuyuh.required' => 'Silahkan isikan',
            'Itik.required' => 'Silahkan isikan',
            'Manila.required' => 'Silahkan isikan',
            'Tahun.required' => 'Silahkan isi',
            
        ]);


        Modpete100001::where('id', $this->editId)->update([
            'kecamatan' =>$this->KodeKecamatan,
            'ayam_buras' =>$this->AyamBuras,
            'ayam_ras_pedaging' =>$this->AyamRasPedaging,
            'ayam_ras_petelur'=>$this->AyamRasPetelur,
            'merpati'=>$this->Merpati,
            'burung_puyuh'=>$this->BurungPuyuh,
            'itik'=>$this->Itik,
            'manila'=>$this->Manila,
            'tahun'=>$this->Tahun,
        ]);


        session()->flash('message', 'Data berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');

        $this->resetInput();

    }


    Public function Editpete100001 ($Id){

        $this->editId = $Id;

        $editpete100001 = Modpete100001::find($this->editId);

        if ($editpete100001){
            $this->KodeKecamatan = $editpete100001->kecamatan;
            $this->AyamBuras = $editpete100001->ayam_buras;
            $this->AyamRasPedaging = $editpete100001->ayam_ras_pedaging;
            $this->AyamRasPetelur = $editpete100001->ayam_ras_petelur;
            $this->Merpati= $editpete100001->merpati;
            $this->BurungPuyuh =$editpete100001->burung_puyuh;
            $this->Itik =$editpete100001->itik;
            $this->Manila =$editpete100001->manila;
            $this->Tahun =$editpete100001->tahun;

            $this->dispatchBrowserEvent('TampilModalEditpete100001');

        }
    }

    
    Public function resetInput(){


        $this->KodeKecamatan= null;

        $this->AyamBuras= null;

        $this->AyamRasPedaging= null;

        $this->AyamRasPetelur= null;

        $this->Merpati= null;

        $this->BurungPuyuh= null;

        $this->Itik= null;
        
        $this->Manila= null;

        $this->Tahun= null;

        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function render()
    {
        $this->Kecamatan = ModKecamatan::all();

        $this->TampilTahun = Modpete100001::groupBy('tahun')->select('tahun')->get(); //untuk select dropdown Tahun

        $this->LihatData = Modpete100001::where('tahun',$this->TahunFilter)->get();

      

        $pete100001 = Modpete100001::where('tahun', 'like', '%'.$this->search.'%')->orderBy('tahun','DESC')->paginate(10);

        return view('livewire..user.opd.bappeda.aplikasi.sidarendu.client.pete100001', compact('pete100001'));
    }
}
