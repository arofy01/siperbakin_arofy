<?php

namespace App\Exports\user\opd\bappeda\aplikasi\siperbakin\sanimas;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModSanimas;



class sanimas implements FromCollection, WithHeadings
{ 


    public function headings(): array
    {
        return [
            'KODE KECAMATAN',
            'KODE DESA','JUMLAH TERBANGUN SEPTIC TANK','JUMLAH TERBANGUN SAMBUNGAN RUMAH',
            'JUMLAH PENDUDUK KK','JUMLAH PENDUDUK JIWA',
            'LATITUDE','LONGITUDE',
            'PERMASALAHAN','TAHUN PEMBANGUNAN',
            'JUMLAH ANGGARAN','JUMLAH BABS KK',
            'JUMLAH BABS JIWA','PENDUDUK MEMILIK JAMBAN KK',
            'PENDUDUK MEMILIKI JAMBAN JIWA','PENDUDUK TIDAK MEMILIKI JAMBAN KK',
            'PENDUDUK TIDAK MEMILIKI JAMBAN JIWA', 'RENCANA PEMBANGUNAN TANGKI SEPTIC DAN JAMBAN',
             'RENCANA PEMBANGUNAN SAMBUNGAN RUMAH', 'KETERANGAN'
            
        ];
    }


   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sanimas = ModSanimas::select('kode_kecamatan', 
        'kode_desa', 'tangki_septic', 'sambungan_rumah',
        'jumlah_penduduk_kk', 'jumlah_penduduk_jiwa', 
        'latitude','longitude',
        'permasalahan','tahun_pembangunan',
        'jumlah_anggaran','jumlah_babs_kk',
        'jumlah_babs_jiwa','memiliki_jamban_kk',
        'memiliki_jamban_jiwa','tidak_memiliki_jamban_kk',
        'tidak_memiliki_jamban_jiwa','rencana_pembangunan_tangki_septic',
        'rencana_pembangunan_sambungan_rumah', 'keterangan')->get();
    
        return $sanimas;
    }

    
}
