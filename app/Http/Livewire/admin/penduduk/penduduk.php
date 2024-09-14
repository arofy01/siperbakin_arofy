<?php

namespace App\Http\Livewire\admin\penduduk;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Symfony\Component\HttpFoundation\Response;
use App\Models\admin\penduduk\ModPenduduk;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;



class Penduduk extends Component
{
    use WithPagination;

    public $search = ''; 

    protected $paginationTheme = 'bootstrap';


    Public $NIK, $Nama, $JenisKelamin, $TempatLahir, $TanggalLahir, $StatusPernikahan,  $Agama, $Alamat, $KodeProvinsi, $KodeKabupaten, $KodeKecamatan, $KodeDesa;
    
    Public $regencies=[]; //untuk menampung mencegah error perulangan di blade

    Public $districts=[]; //untuk menampung mencegah error perulangan di blade

    Public $villages=[]; //untuk menampung mencegah error perulangan di blade
    
    public $editId;

    public $hapusId;

    public $lihatId;

    Public $listeners=['hapusmulai'=>'proseshapus'];


    public function mount()
    {
        // Mengonversi string tanggal menjadi objek Carbon
        // $this->TanggalLahir = Carbon::parse($this->TanggalLahir);
    }


    public function DownloadPdfPenduduk($id)
    {
        $penduduk = ModPenduduk::findOrFail($id);

        $pdf = new Dompdf();

        $pdf->loadHTML(View::make('Admin.Penduduk.Pdfpenduduk', compact('penduduk')));

        $pdf->setPaper('A4', 'potrait');

        $pdf->render();

        // dd($pdf->output());
        
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'data_penduduk.pdf');
        

        // dd($penduduk);

    }
   
    public function updatedKodeProvinsi()
    {
        $this->regencies = Regency::where('province_id', $this->KodeProvinsi)->get();
        $this->KodeKabupaten=null;
    }

   
    public function updatedKodeKabupaten()
    {
        $this->districts = District::where('regency_id', $this->KodeKabupaten)->get();
        $this->KodeKecamatan=null;
    }

    public function updatedKodeKecamatan()
    {
        $this->villages = village::where('district_id', $this->KodeKecamatan)->get();
        $this->KodeDesa=null;
    }

    public function convertToUppercase()
    {
        $this->Nama = strtoupper($this->Nama);
    }


    public function konfirmasihapus($id)
    {
        $this->hapusId = $id;
        $this->dispatchBrowserEvent('tampilkonfirmasihapus');
    }

    public function proseshapus()
    {
        ModPenduduk::find($this->hapusId)->delete();
        $this->dispatchBrowserEvent('dataterhapussukses');
    }



    public function create()
    {
        $validatedData = $this->validate(
            [
                'NIK' =>  ['required', Rule::unique('penduduk', 'nik')],
                'Nama' =>  'required',
                'JenisKelamin' => 'required',
                'TempatLahir' => 'required',
                'TanggalLahir' => 'required',
                'KodeProvinsi' => 'required',
                'KodeKabupaten' => 'required',
                'KodeKecamatan' => 'required',
                'KodeDesa' => 'required',
            ],
            [
                'NIK.required' => 'Silahkan Isi NIK Penduduk',
                'Nama.required' => 'Silahkan Isi Nama Penduduk',
                'JenisKelamin.required' => 'Silahkan Pilih Jenis Kelamin',
                'TempatLahir.required' => 'Silahkan Isi Tempat Lahir',
                'TanggalLahir.required' => 'Silahkan Isi Tanggal Lahir',
            ],
          
        );
        
        // dd($this->JenisKelamin);
        // dd($this->KodeKabupaten);
        ModPenduduk::create([
            'nik' => $this->NIK,
            'nama' => $this->Nama,
            'jenis_kelamin' => $this->JenisKelamin,
            'tempat_lahir' => $this->TempatLahir,
            'tanggal_lahir' => $this->TanggalLahir,
            'status_pernikahan' => $this->StatusPernikahan,
            'agama' => $this->Agama,
            'alamat'=> $this->Alamat,
            'kode_provinsi'=>$this->KodeProvinsi,
            'kode_kabupaten'=>$this->KodeKabupaten,
            'kode_kecamatan'=>$this->KodeKecamatan,
            'kode_desa'=>$this->KodeDesa,
        ]);

        session()->flash('message', 'Data Penduduk berhasil ditambahkan');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }

    
    Public function LihatPenduduk ($lihatId){

        $lihatPenduduk = ModPenduduk::find($lihatId);

        if ($lihatPenduduk){
            $this->NIK = $lihatPenduduk->nik;
            $this->Nama = $lihatPenduduk->nama;
            $this->JenisKelamin = $lihatPenduduk->jenis_kelamin;
            $this->TempatLahir = $lihatPenduduk->tempat_lahir;
            $this->TanggalLahir = Carbon::parse($lihatPenduduk->tanggal_lahir)->format('d-m-Y'); 
            $this->StatusPernikahan = $lihatPenduduk->status_pernikahan;
            $this->Agama = $lihatPenduduk->agama;
            $this->Alamat = $lihatPenduduk->alamat;
            $this->KodeProvinsi = $lihatPenduduk->kode_provinsi;
            $this->KodeKabupaten = $lihatPenduduk->kode_kabupaten;
            $this->KodeKecamatan = $lihatPenduduk->kode_kecamatan;
            $this->KodeDesa = $lihatPenduduk->kode_desa;
           
        

            $this->dispatchBrowserEvent('TampilModalLihatPenduduk');

        }else{
            return redirect ()->to('/admin/penduduk/penduduk');
        }

    }



    Public function UpdatePenduduk (){

        $validatedData = $this->validate(
            [
                'NIK' => 'required',
                'Nama' =>  'required',
                'JenisKelamin' => 'required',
                'TempatLahir' => 'required',
                'TanggalLahir' => 'required',
                'StatusPernikahan' => 'nullable',
                'Agama' => 'nullable',
                'Alamat' => 'nullable',
                'KodeProvinsi' => 'nullable',
                'KodeKabupaten' => 'nullable',
                'KodeKecamatan' => 'nullable',
                'KodeDesa' => 'nullable',
                
            ],
            [
                'NIK.required' => 'Silahkan Isi NIK Penduduk',
                'Nama.required' => 'Silahkan Isi Nama Penduduk',
                'JenisKelamin.required' => 'Silahkan Pilih Jenis Kelamin.',
                'TempatLahir.required' => 'Silahkan Isi Tempat Lahir',
                'TanggalLahir.required' => 'Silahkan Isi Tanggal Lahir',
            ],


        );

    
        ModPenduduk::where('id', $this->editId)->update([
            'nik' => $this->NIK,
            'nama' => $this->Nama,
            'jenis_kelamin' => $this->JenisKelamin,
            'tempat_lahir' => $this->TempatLahir,
            'tanggal_lahir' => $this->TanggalLahir,
            'status_pernikahan' => $this->StatusPernikahan,
            'agama' => $this->Agama,
            'alamat' => $this->Alamat,
            'kode_provinsi' => $this->KodeProvinsi,
            'kode_kabupaten' => $this->KodeKabupaten,
            'kode_kecamatan' => $this->KodeKecamatan,
            'kode_desa' => $this->KodeDesa,
        ]);
       
       
        session()->flash('message', 'Data Penduduk berhasil diupdate');

        $this->resetInput();
        
        $this->dispatchBrowserEvent('TutupModal');
    }



    Public function TampilModalTambahPenduduk (){
        $this->dispatchBrowserEvent('TampilModalTambahPenduduk');
    }



    Public function EditPenduduk ($Id){

        $this->editId = $Id;

        $penduduk = ModPenduduk::find($this->editId);

        if ($penduduk){
            $this->NIK = $penduduk->nik;
            $this->Nama = $penduduk->nama;
            $this->JenisKelamin = $penduduk->jenis_kelamin;
            $this->TempatLahir = $penduduk->tempat_lahir;
            $this->TanggalLahir = Carbon::parse($penduduk->tanggal_lahir)->format('Y-m-d'); 
            $this->StatusPernikahan = $penduduk->status_pernikahan;
            $this->Agama = $penduduk->agama;
            $this->Alamat = $penduduk->alamat;
            $this->KodeProvinsi = $penduduk->kode_provinsi;
            $this->KodeKabupaten = $penduduk->kode_kabupaten;
            $this->KodeKecamatan = $penduduk->kode_kecamatan;
            $this->KodeDesa = $penduduk->kode_desa;

             // Mendapatkan data kabupaten berdasarkan $KodeProvinsi
             if ($this->KodeProvinsi) {
                $this->regencies = Regency::where('province_id', $this->KodeProvinsi)->get();
            }

            // Mendapatkan data kecamatan berdasarkan $KodeKabupaten
            if ($this->KodeKabupaten) {
                $this->districts = District::where('regency_id', $this->KodeKabupaten)->get();
            }

            // Mendapatkan data desa berdasarkan $KodeKecamatan
            if ($this->KodeKecamatan) {
                $this->villages = Village::where('district_id', $this->KodeKecamatan)->get();
            }


            // dd($this->TanggalLahir);
            $this->dispatchBrowserEvent('TampilModalEditPenduduk');

        }else{
            return redirect ()->to('/admin/penduduk/penduduk');
        }
    }

    Public function resetInput(){

        $this->NIK = null;
        $this->Nama = null;
        $this->JenisKelamin = null;
        $this->TempatLahir = null;
        $this->TanggalLahir = null;
        $this->StatusPernikahan = null;
        $this->Agama = null;
        $this->KodeProvinsi = null;
        $this->KodeKabupaten = null;
        $this->KodeKecamatan = null;
        $this->KodeDesa = null;
        $this->Alamat = null;

        $this->resetErrorBag();

        $this->resetValidation();

    }



    public function render() 
    {
        $provinces = Province::all();

        $penduduk= ModPenduduk::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(10);

        return view('livewire..admin.penduduk.penduduk', compact('penduduk','provinces'));
    }
}
 