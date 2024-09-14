<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sipeka\p3keindividu;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\user\opd\bappeda\aplikasi\sipeka\ModP3KEindividu;

class individu implements FromCollection, WithHeadings
{ 
    public function headings(): array
    {
        return [
            'ID Keluarga',
            'Provinsi',
            'Kabupaten',
            'Kecamatan',
            'Desa',
            'Kode Kemendagri',
            'Desil Kesejahteraan',
            'Alamat',
            'ID Individu',
            'Nama',
            'NIK',
            'Padan Dukcapil',
            'Jenis Kelamin',
            'Hubungan Dengan Kpl. Keluarga',
            'Tanggal Lahir',
            'Status Kawin',
            'Pekerjaan',
            'Pendidikan',
            'Usia dibawah 7 tahun',
            'Usia 7-12',
            'Usia 13-15',
            'Usia 16-18',
            'Usia 19-21',
            'Usia 22-59',
            'Usia 60 tahun keatas',
            'Penerima BPNT',
            'Penerima BPUM',
            'Penerima BST',
            'Penerima PKH',
            'Penerima SEMBAKO',
            'Resiko Stunting',
            'Pensasaran',
        ];
    }

    public function collection()
    {
        $p3keindividu = ModP3KEindividu::select(
            'id_keluarga',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'desa',
            'kode_kemdagri',
            'desil_kesejahteraan',
            'alamat',
            'id_individu',
            'nama',
            'nik',
            'padan_dukcapil',
            'jenis_kelamin',
            'hub_dgn_kpl_keluarga',
            'tanggal_lahir',
            'status_kawin',
            'pekerjaan',
            'pendidikan',
            'tujuh_tahun',
            'tujuh_duabelas_tahun',
            'tigabelas_limabelas_tahun',
            'enambelas_delapanbelas_tahun',
            'sembilanbelas_duapuluhsatu_tahun',
            'duapuluhdua_limapuluhsembilan_tahun',
            'enampuluh_tahun',
            'bnpt',
            'bpum',
            'bst',
            'pkh',
            'sembako',
            'resiko_stunting',
            'pensasaran'
        )->get();

        return $p3keindividu;
    }
}
