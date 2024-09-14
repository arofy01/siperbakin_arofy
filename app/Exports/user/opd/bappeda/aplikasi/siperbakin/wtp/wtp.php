<?php

namespace App\Exports\user\opd\bappeda\aplikasi\siperbakin\wtp;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\siperbakin\ModWTP;



class wtp implements FromCollection, WithHeadings
{ 


    public function headings(): array
    {
        return [
            'KODE KECAMATAN',
            'NAMA SPAM','PENGELOLA','LATITUDE',
            'LONGITUDE','KONDISI',
            'PERMASALAHAN','JAM OPERASI',
            'KAPASITAS TERPASANG (L/dt)','KAPASITAS PRODUKSI (L/dt)',
            'KAPASITAS DISTRIBUSI (L/dt)','KAPASITAS AIR TERJUAL (L/dt)',
            'KAPASITAS BELUM TERPAKAI (L/dt)','KEHILANGAN AIR (%)',
            'SR (Unit)','WILAYAH PELAYANAN',
            'KETERANGAN' 
        ];
    }


   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $wtp = ModWTP::select('kode_kecamatan', 
        'nama_spam', 'pengelola',
        'latitude', 'longitude', 
        'berfungsi','permasalahan',
        'jam_operasi','kapasitas_terpasang',
        'kapasitas_produksi','kapasitas_distribusi',
        'kapasitas_air_terjual','kapasitas_belum_terpakai',
        'kehilangan_air','sr',
        'wilayah_pelayanan','keterangan')->get();

        return $wtp;
    }
}
