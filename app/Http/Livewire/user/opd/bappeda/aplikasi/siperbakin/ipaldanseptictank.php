<?php


namespace App\Http\Livewire\user\opd\bappeda\aplikasi\siperbakin;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithPagination; //untuk membuat halaman pada tabel

use Livewire\WithFileUploads; //untuk mengupload gambar

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Dompdf\Dompdf;

use Illuminate\Support\Facades\View;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModIpaldanseptictank;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModKecamatan;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModDesa;


class ipaldanseptictank extends Component
{
    use WithPagination;

    use WithFileUploads;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    Public $Desa=[], $KodeDesa, $Kecamatan, $KodeKecamatan, $Uraian, $NilaiAnggaran, 
    $JenisIpal, $Kondisi, $JumlahTangkiSeptic, $JumlahSambunganRumah, $KondisiEksisting;


    public $Filename; //untuk menampung nama file gambar yang telah disimpan

    public $editId; 

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];   //listener untuk proses hapus




    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }



    public function proseshapus()
    {
        $ipaldanseptictank = ModIpaldanseptictank::find($this->hapusId);

        if ($ipaldanseptictank) {
            // Mendapatkan path ke file yang ingin dihapus
            $filePath = 'public/images/siperbakin/ipaldanseptictank/' . $ipaldanseptictank->kondisi_eksisting;

            // Menghapus file jika ada
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }


             // Menghapus data Pamsimas
             $ipaldanseptictank->delete();
             $this->dispatchBrowserEvent('dataterhapussukses');
        }
    }


    public function TampilModalTambahIpaldanSepticTank (){
        $this->dispatchBrowserEvent('TampilModalTambahIpaldanSepticTank');
    }




    // Fungsi untuk membuat Pamsimas Baru
    public function SimpanIpaldanseptictank()
    {

        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KodeDesa.required' => 'Silahkan Pilih Desa',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);


        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            $this->KondisiEksisting->storeAs('public/images/siperbakin/ipaldanseptictank/', $this->Filename);
        }


        ModIpaldanseptictank::create([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'uraian' =>$this->Uraian,
            'nilai_anggaran'=>$this->NilaiAnggaran,
            'jenis_ipal'=>$this->JenisIpal,
            'kondisi'=>$this->Kondisi,
            'jumlah_tangki_septic'=>$this->JumlahTangkiSeptic,
            'jumlah_sambungan_rumah'=>$this->JumlahSambunganRumah,
            'kondisi_eksisting'=>$this->Filename,
        ]);


        $this->resetInput();

        session()->flash('message', 'Ipal dan Septic Tank berhasil ditambahkan');

        

        $this->dispatchBrowserEvent('TutupModal');
    }


    public function DownloadExcelData()
    {
        return Excel::download(new \App\Exports\user\opd\bappeda\aplikasi\siperbakin\ipaldanseptictank\ipaldanseptictank, 'ipaldanseptictank.xlsx');
    }


    // Fungsi untuk melihat Pamsimas
    Public function LihatIpaldanseptictank ($lihatId){

        $lihatIpaldanseptictank = ModIpaldanseptictank::find($lihatId);

        if ($lihatIpaldanseptictank){
            $this->KodeKecamatan = $lihatIpaldanseptictank->kode_kecamatan;
            $this->KodeDesa = $lihatIpaldanseptictank->kode_desa;
            $this->Uraian = $lihatIpaldanseptictank->uraian;

            $this->NilaiAnggaran = $lihatIpaldanseptictank->nilai_anggaran;
            $this->JenisIpal= $lihatIpaldanseptictank->jenis_ipal;

            $this->Kondisi =$lihatIpaldanseptictank->kondisi;
            $this->JumlahTangkiSeptic =$lihatIpaldanseptictank->jumlah_tangki_septic;
            $this->JumlahSambunganRumah =$lihatIpaldanseptictank->jumlah_sambungan_rumah;
            $this->Filename = $lihatIpaldanseptictank->kondisi_eksisting;

            $this->dispatchBrowserEvent('TampilModalLihatIpaldanSepticTank');
        }
    }


    public function PDFIpaldanseptictank($Id)
    {
        

        $pdfdata = ModIpaldanseptictank::where('id', $Id)->first();

        $pdf = new Dompdf();

        // dd($pdfdata);

        $pdf->loadHTML(View::make('user.opd.bappeda.aplikasi.siperbakin.pdf.ipaldanseptictank', compact('pdfdata')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'ipalseptictank.pdf');


    }




    // Fungsi untuk update Pamsimas
    Public function UpdateIpaldanseptictank (){

        $validatedData = $this->validate([
            'KodeKecamatan' => 'required',
            'KodeDesa' => 'required',
            'KondisiEksisting' => 'nullable|max:2048|image|mimes:jpeg,png,jpg,gif'
        ], [
            'KodeKecamatan.required' => 'Silahkan Pilih Kecamatan',
            'KodeDesa.required' => 'Silahkan Pilih Desa',
            'KondisiEksisting.max' => 'Silahkan pilih file gambar dengan kapasitas maksimal 2 MB',
            'KondisiEksisting.image' => 'Silahkan isi file dengan jenis gambar',
        ]);


        if ($this->KondisiEksisting){
            // Menghasilkan nama unik untuk file gambar
            $this->Filename = md5($this->KondisiEksisting . microtime()) . '.' . $this->KondisiEksisting->extension();
            // Menyimpan gambar ke dalam folder storage
            
            $this->KondisiEksisting->storeAs('public/images/siperbakin/ipaldanseptictank/', $this->Filename);

            // dd($this->KondisiEksisting);

        }

        ModIpaldanseptictank::where('id', $this->editId)->update([
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' =>$this->KodeDesa,
            'uraian' =>$this->Uraian,
            'nilai_anggaran'=>$this->NilaiAnggaran,
            'jenis_ipal'=>$this->JenisIpal,
            'kondisi'=>$this->Kondisi,
            'jumlah_tangki_septic'=>$this->JumlahTangkiSeptic,
            'jumlah_sambungan_rumah'=>$this->JumlahSambunganRumah,
            'kondisi_eksisting'=>$this->Filename,
        ]);

        $this->resetInput();

        session()->flash('message', 'Ipal dan Septic Tank berhasil diupdate');

        $this->dispatchBrowserEvent('TutupModal');
    }


    Public function EditIpaldanseptictank ($Id){

        $this->editId = $Id;

        $editIpaldanseptictank = ModIpaldanseptictank::find($this->editId);

        if ($editIpaldanseptictank){
            $this->KodeKecamatan = $editIpaldanseptictank->kode_kecamatan;
            $this->KodeDesa = $editIpaldanseptictank->kode_desa;
            $this->Uraian = $editIpaldanseptictank->uraian;
            $this->NilaiAnggaran = $editIpaldanseptictank->nilai_anggaran;
            $this->JenisIpal= $editIpaldanseptictank->jenis_ipal;

            $this->Kondisi =$editIpaldanseptictank->kondisi;
            $this->JumlahTangkiSeptic =$editIpaldanseptictank->jumlah_tangki_septic;
            $this->JumlahSambunganRumah =$editIpaldanseptictank->jumlah_sambungan_rumah;

            $this->Filename =$editIpaldanseptictank->kondisi_eksisting;

           

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
            }


            $this->dispatchBrowserEvent('TampilModalEditIpaldanSepticTank');

       
        }
    }


    Public function resetInput(){
        $this->KodeKecamatan =null;
        $this->KodeDesa = null;
        $this->Uraian = null;
        $this->NilaiAnggaran = null;
        $this->JenisIpal= null;
        $this->Kondisi =null;
        $this->JumlahTangkiSeptic =null;
        $this->JumlahSambunganRumah =null;
        $this->KondisiEksisting =null;
        $this->Filename =null;

        $this->resetErrorBag();

        $this->resetValidation();

    }


    public function updatedKodeKecamatan()
    {

        $this->Desa = ModDesa::where('district_id', $this->KodeKecamatan)->get();
        // dd($this->villages);
        $this->KodeDesa=null;
    } 


    public function render()
    {


        $ipaldanseptictank = ModIpaldanseptictank::where('kode_desa', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(3);
        
        $JumlahTotalIpal = ModIpaldanseptictank::all();

        $this->TotalIpaldanseptictank = $JumlahTotalIpal->count(); //mencari total pamsimas

        $this->Kecamatan = ModKecamatan::all();

        $userinfo =Auth::user();

        return view('livewire..user.opd.bappeda.aplikasi.siperbakin.ipaldanseptictank',compact('userinfo','ipaldanseptictank'));
        
    }
}



