<?php

namespace App\Exports\user\opd\bappeda\aplikasi\siperbakin\ipaldanseptictank;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModIpaldanseptictank;

 

class ipaldanseptictank implements FromCollection, WithHeadings
{ 


    public function headings(): array
    {
        return [
            'KODE KECAMATAN',
            'KODE DESA','PENGELOLA','JUMLAH PENDUDUK KK',
            'JUMLAH PENDUDUK JIWA','TARGET PEMANFAATAN SR',
            'TARGET PEMANFAATAN KK','TARGET PEMANFAATAN JIWA',
            'JUMLAH TERLAYANI SR','JUMLAH TERLAYANI KK',
            'JUMLAH TERLAYANI JIWA','JUMLAH BELUM TERLAYANI SR',
            'JUMLAH BELUM TERLAYANI KK','JUMLAH BELUM TERLAYANI JIWA',
            'LATITUDE','LONGITUDE','KONDISI','PERMASALAHAN',
            'KAPASITAS TERPASANG','KAPASITAS PRODUKSI','JAM OPERASI',
            'TAHUN PEMBANGUNAN','JUMLAH ANGGARAN','SUMBER AIR', 'RENCANA PENGEMBANGAN',
            'KETERANGAN'
        ];
    }


   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ipaldanseptictank = ModIpaldanseptictank::select('kode_kecamatan', 
        'kode_desa', 'pengelola', 'jumlah_penduduk_kk',
        'jumlah_penduduk_jiwa', 'target_pemanfaatan_sr', 
        'target_pemanfaatan_kk','target_pemanfaatan_jiwa',
        'jumlah_terlayani_sr','jumlah_terlayani_kk',
        'jumlah_terlayani_jiwa','jumlah_belum_terlayani_sr',
        'jumlah_belum_terlayani_kk','jumlah_belum_terlayani_jiwa',
        'latitude','longitude','berfungsi','permasalahan',
        'kapasitas_terpasang', 'kapasitas_produksi','jam_operasi',
        'tahun_pembangunan','jumlah_anggaran', 'sumber_air','rencana_pengembangan',
        'keterangan')->get();
    
        return $ipaldanseptictank;
    }

    
}
