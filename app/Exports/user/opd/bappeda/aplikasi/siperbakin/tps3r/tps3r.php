<?php

namespace App\Exports\user\opd\bappeda\aplikasi\siperbakin\tps3r;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModTPS3R;
 


class tps3r implements FromCollection, WithHeadings
{ 
 

    public function headings(): array
    {
        return [
            'KODE KECAMATAN',
            'KODE DESA','PENGELOLA','JUMLAH PENDUDUK KK',
            'JUMLAH PENDUDUK JIWA','TIMBUNAN SAMPAH',
            'KAPASITAS TPS3R','SAMPAH DIKELOLA',
            'SAMPAH BELUM DIKELOLA','KAPASITAS TPS3R BELUM DIGUNAKAN',
            'LATITUDE','LONGITUDE',
            'JARAK TPS3R KE PEMUKIMAN','KONDISI',
            'PERMASALAHAN','JAM OPERASI',
            'TAHUN PEMBANGUNAN', 'JUMLAH ANGGARAN',
            'RENCANA PENGEMBANGAN'  
        ];
    }


   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tps3r = ModTPS3R::select('kode_kecamatan', 
        'kode_desa', 'pengelola', 'jumlah_penduduk_kk',
        'jumlah_penduduk_jiwa', 'timbunan_sampah', 
        'kapasitas_tps3r','sampah_dikelola',
        'sampah_belum_dikelola','kapasitas_tps3r_belum_digunakan',
        'latitude','longitude',
        'jarak_tps3r_ke_pemukiman','kondisi',
        'permasalahan','jam_operasi',
        'tahun_pembangunan','jumlah_anggaran',
        'kondisi_eksisting', 'rencana_pengembangan')->get();

        return $tps3r;
    }
}
