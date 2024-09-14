<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sipeka\p3kekeluarga;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEkeluarga;



class keluarga implements FromCollection, WithHeadings
{ 
 

    public function headings(): array
    {
        return [
            'ID Keluarga',
            'Provinsi','Kabupaten','Kecamatan',
            'Desa','Kode Kemdagri',
            'Desil Kesejahteraan','Alamat',
            'Kepala Keluarga','NIK',
            'Padan Dukcapil','Jenis Kelamin',
            'Tanggal Lahir','Pekerjaan',
            'Pendidikan','Kepemilikan Rumah',
            'Memiliki Simpanan Uang/Perhiasan/Ternak/Lainnya',
            'Jenis Atap','Jenis Dinding','Jenis Lantai','Sumber Penerangan',
            'Bahan Bakar Memasak','Sumber Air Minum','Memiliki Fasilitas Buang Air Besar',
            'Penerima BNPT','Penerima BPUM','Penerima BST','Penerima PKH','Penerima SEMBAKO',
            'Resiko Stunting','Pensasaran'
        ];
    }


   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $p3kekeluarga = ModP3KEkeluarga::select('id_keluarga', 
        'provinsi', 'kabupaten','kecamatan','desa','kode_kemdagri','desil_kesejahteraan',
        'alamat','kepala_keluarga','nik','padan_dukcapil','jenis_kelamin','tanggal_lahir',
        'pekerjaan','pendidikan','kepemilikan_rumah','memiliki_simpanan','jenis_atap',
        'jenis_dinding','jenis_lantai','sumber_penerangan','bahan_bakar_memasak',
        'sumber_air_minum','fasilitas_BAB','bnpt','bpum','bst','pkh','sembako',
        'resiko_stunting','pensasaran'
        )->get();

        // dd($p3kekeluarga);
        return $p3kekeluarga;
    }
}
