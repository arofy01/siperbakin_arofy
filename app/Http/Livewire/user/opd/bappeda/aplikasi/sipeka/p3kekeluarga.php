<?php

namespace App\Http\Livewire\user\opd\bappeda\aplikasi\sipeka;

use Livewire\Component;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Support\Facades\DB;

use Dompdf\Dompdf;

use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;




class p3kekeluarga extends Component
{

    use WithPagination;

    use WithFileUploads;

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
            $this->datahasilfilter = ModP3KEkeluarga::select($this->kolomfilter, \DB::raw('COUNT(*) as count'))
            ->groupBy($this->kolomfilter)
            ->orderBy($this->kolomfilter)
            ->get();

            $this->carinik="";
            $this->carinama="";
        }
    }


    public function updatednilaifilter()
    {
          // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
          if ($this->nilaifilter){
            $this->datahasilfilter = ModP3KEkeluarga::select($this->kolomfilter, \DB::raw('COUNT(*) as count'))
            ->groupBy($this->kolomfilter)
            ->orderBy($this->kolomfilter)
            ->get();

            $this->carinik="";
            $this->carinama="";
        }
    }

    public function updatedcarinik()
    {
          // Mengambil seluruh nilai unik dari kolom A dan mengelompokkannya
          if ($this->carinik){
            $this->datahasilfilter = ModP3KEkeluarga::select('nik', \DB::raw('COUNT(*) as count'))
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
            $this->datahasilfilter = ModP3KEkeluarga::select('kepala_keluarga', \DB::raw('COUNT(*) as count'))
            ->groupBy('kepala_keluarga')
            ->orderBy('kepala_keluarga')
            ->get();

            $this->kolomfilter="";
            $this->nilaifilter="";
            $this->carinik="";
        }

    }


  
    public function PDFp3kekeluarga($Id)
    {
        

        $pdfdata = ModP3KEkeluarga::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.sipeka.pdf.p3kekeluarga', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'P3kekeluarga.pdf');


    }


    public function DownloadExcelData()
    {
        // dd("test");
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\sipeka\p3kekeluarga\keluarga, 'p3kekeluarga.xlsx');
    }

    

    Public function LihatP3kekeluarga ($lihatId){

        $lihatp3kekeluarga = ModP3KEkeluarga::find($lihatId);

        if ($lihatp3kekeluarga){
            $this->KodeKecamatan = $lihatSanimas->kode_kecamatan;
            $this->KodeDesa = $lihatSanimas->kode_desa;
            $this->JumlahTerbangunSepticTank = $lihatSanimas->tangki_septic;
            $this->JumlahTerbangunSambunganRumah = $lihatSanimas->sambungan_rumah;

            $this->JumlahPendudukKK= $lihatSanimas->jumlah_penduduk_kk;
            $this->JumlahPendudukJiwa= $lihatSanimas->jumlah_penduduk_jiwa;


            $this->Latitude =$lihatSanimas->latitude;
            $this->Longitude =$lihatSanimas->longitude;
            $this->Permasalahan =$lihatSanimas->permasalahan;


            $this->TahunPembangunan =$lihatSanimas->tahun_pembangunan;
            $this->JumlahAnggaran =$lihatSanimas->jumlah_anggaran;
            $this->Filename =$lihatSanimas->kondisi_eksisting;


            $this->JumlahBabsKK =$lihatSanimas->jumlah_babs_kk;
            $this->JumlahBabsJiwa =$lihatSanimas->jumlah_babs_jiwa;

            $this->MemilikiJambanKK =$lihatSanimas->memiliki_jamban_kk;
            $this->MemilikiJambanJiwa =$lihatSanimas->memiliki_jamban_jiwa;

            $this->TidakMemilikiJambanKK =$lihatSanimas->tidak_memiliki_jamban_kk;
            $this->TidakMemilikiJambanJiwa =$lihatSanimas->tidak_memiliki_jamban_jiwa;


            $this->RencanaPembangunanSepticTankJamban =$lihatSanimas->rencana_pembangunan_tangki_septic;
            $this->RencanaPembangunanSambunganRumah =$lihatSanimas->rencana_pembangunan_sambungan_rumah;

            $this->Keterangan =$lihatSanimas->keterangan;

            $this->dispatchBrowserEvent('TampilModalLihatSanimas');
        }

    }



    public function render()
    {
         // Mengambil seluruh barus data di database
        // $query = ModP3KEkeluarga::orderBy('id_keluarga', 'ASC');

        $query=DB::connection('mysql_sipeka')->table('p3kekeluarga')
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
            $query->where('kepala_keluarga', 'like', '%'.$this->carinama.'%');
           
        }



        // memberikan paginate 10
        $pendudukmiskin = $query->orderBy('kecamatan','ASC')->paginate(10);

        // menghitung total query
        $this->TotalPendudukMiskin = $query->count();

        return view('livewire..user.opd.bappeda.aplikasi.sipeka.p3kekeluarga', compact('pendudukmiskin'));
    }
    
}
