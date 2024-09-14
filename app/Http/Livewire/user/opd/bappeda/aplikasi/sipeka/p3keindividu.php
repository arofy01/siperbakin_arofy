<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use Dompdf\Dompdf;

use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;




class p3keindividu extends Component
{

    use WithPagination;

    use WithFileUploads;

    public $IdKeluarga, $Provinsi, $Kabupaten, $Kecamatan, $Desa, $KodeKemdagri, 
    $DesilKesejahteraan, $Alamat, $IdIndividu, $Nama, $NIK, $PadanDukcapil, 
    $JenisKelamin, $HubuganDgnKepalaKeluarga, $TanggalLahir, $StatusKawin, 
    $Pekerjaan, $Pendidikan, $TujuhTahun, $TujuhDuaBelasTahun, $TigaBelasLimaBelasTahun,
    $EnamBelasDelapanBelasTahun, $SembilanBelasDuapuluhsatuTahun, 
    $DuaPuluhDuaLimaPuluhSembilanTahun, $EnamPuluhTahun, $PenerimaBnpt,$PenerimaBpum,
    $PenerimaBst, $PenerimaPkh, $PenerimaSembako, $ResikoStunting, $Pensasaran;

    public $kolomfilter = null;

    public $nilaifilter =null;

    public $datahasilfilter=[];

    public $TotalPendudukMiskin = 0;

    public $carinik = '';

    public $carinama = '';

    protected $paginationTheme = 'bootstrap';


    public function updatedkolomfilter()
    {
        // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
        if ($this->kolomfilter){
            $this->datahasilfilter = ModP3KEindividu::select($this->kolomfilter, \DB::raw('COUNT(*) as count'))
            ->groupBy($this->kolomfilter)
            ->orderBy($this->kolomfilter)
            ->get();
        }
    }


    public function updatednilaifilter()
    {
          // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
          if ($this->kolomfilter){
            $this->datahasilfilter = ModP3KEindividu::select($this->kolomfilter, \DB::raw('COUNT(*) as count'))
            ->groupBy($this->kolomfilter)
            ->orderBy($this->kolomfilter)
            ->get();
        }
    }

    public function updatedcarinik()
    {
          // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
          if ($this->carinik){
            $this->datahasilfilter = ModP3KEindividu::select('nik', \DB::raw('COUNT(*) as count'))
            ->groupBy('nik')
            ->orderBy('nik')
            ->get();

            $this->kolomfilter="";
            $this->nilaifilter="";
            $this->carinama="";

        }

    }




        public function updatedcarinama()
    {
          // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
          if ($this->carinama){
            $this->datahasilfilter = ModP3KEindividu::select('nama', \DB::raw('COUNT(*) as count'))
            ->groupBy('nama')
            ->orderBy('nama')
            ->get();

            $this->kolomfilter="";
            $this->nilaifilter="";
            $this->carinik="";
        }

    }



    public function PDFP3keindividu($Id)
    {
        

        $pdfdata = ModP3KEindividu::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sipeka.pdf.p3keindividu', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'P3keindividu.pdf');


    }



    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sipeka\p3keindividu\individu, 'individu.xlsx');
    }


    Public function LihatP3keindividu ($lihatId){

        $lihatp3keindividu = ModP3KEindividu::find($lihatId);

        if ($lihatp3keindividu){
            $this->IdKeluarga = $lihatp3keindividu->id_keluarga;
            $this->Provinsi = $lihatp3keindividu->provinsi;
            $this->Kabupaten = $lihatp3keindividu->kabupaten;
            $this->Kecamatan = $lihatp3keindividu->kecamatan;
            $this->Desa = $lihatp3keindividu->desa;

            $this->KodeKemdagri= $lihatp3keindividu->kode_kemdagri;
            $this->DesilKesejahteraan= $lihatp3keindividu->desil_kesejahteraan;


            $this->Alamat =$lihatp3keindividu->alamat;
            $this->IdIndividu =$lihatp3keindividu->id_individu;
            $this->Nama =$lihatp3keindividu->nama;

            $this->NIK =$lihatp3keindividu->nik;
            $this->PadanDukcapil =$lihatp3keindividu->padan_dukcapil;
            $this->JenisKelamin =$lihatp3keindividu->jenis_kelamin;


            $this->HubuganDgnKepalaKeluarga =$lihatp3keindividu->hub_dgn_kpl_keluarga;
            $this->TanggalLahir =$lihatp3keindividu->tanggal_lahir;

            $this->StatusKawin =$lihatp3keindividu->status_kawin;
            $this->Pekerjaan =$lihatp3keindividu->pekerjaan;

            $this->Pendidikan =$lihatp3keindividu->pendidikan;
            $this->TujuhTahun =$lihatp3keindividu->tujuh_tahun;


            $this->TujuhDuaBelasTahun =$lihatp3keindividu->tujuh_duabelas_tahun;
            $this->TigaBelasLimaBelasTahun =$lihatp3keindividu->tigabelas_limabelas_tahun;

            $this->EnamBelasDelapanBelasTahun =$lihatp3keindividu->enambelas_delapanbelas_tahun;

            $this->SembilanBelasDuapuluhsatuTahun =$lihatp3keindividu->sembilanbelas_duapuluhsatu_tahun;
            $this->DuaPuluhDuaLimaPuluhSembilanTahun =$lihatp3keindividu->duapuluhdua_limapuluhsembilan_tahun;
            $this->EnamPuluhTahun =$lihatp3keindividu->enampuluh_tahun;

            $this->PenerimaBnpt =$lihatp3keindividu->bnpt;
            $this->PenerimaBpum =$lihatp3keindividu->bpum;
            $this->PenerimaBst =$lihatp3keindividu->bst;
            $this->PenerimaPkh =$lihatp3keindividu->pkh;
            $this->PenerimaSembako =$lihatp3keindividu->sembako;

            $this->ResikoStunting =$lihatp3keindividu->resiko_stunting;
            $this->Pensasaran =$lihatp3keindividu->pensasaran;


            $this->dispatchBrowserEvent('TampilModalLihatP3keindividu');
        }

    }



    public function render()
    {
         // Mengambil seluruh barus data di database
        // $query = ModP3KEindividu::orderBy('id_keluarga', 'ASC');

        $query=DB::connection('mysql_sipeka')->table('p3keindividu')
        ->orderBy('id_keluarga', 'ASC');


        if ($this->kolomfilter) {
            if ($this->kolomfilter && $this->nilaifilter) {
                // Jika $kolomfilter dan $nilaifilter berisi nilai
                // $query->where($this->kolomfilter, 'like', '%'.$this->nilaifilter.'%');
                $query->where($this->kolomfilter, '=', $this->nilaifilter);
              
            }
        }

        if ($this->carinik) {
            // Jika $search dan $nilaifilter berisi nilai
            $query->where('nik', 'like', '%'.$this->carinik.'%');
           
        }

        if ($this->carinama) {
            // Jika $search dan $nilaifilter berisi nilai
            $query->where('nama', 'like', '%'.$this->carinama.'%');
           
        }


        // memberikan paginate 10
        $pendudukmiskin = $query->orderBy('kecamatan','ASC')->paginate(10);

        // menghitung total query
        $this->TotalPendudukMiskin = $query->count();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.p3keindividu', compact('pendudukmiskin'));
    }
}
