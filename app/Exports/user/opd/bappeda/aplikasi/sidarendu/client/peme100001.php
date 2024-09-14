<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpeme100001;



class peme100001 implements FromCollection, WithHeadings, WithTitle
{ 

    protected $TahunFilter;

    
    public function title(): string
    {
    	return 'DATA SESUATU';
    }


    public function headings(): array
    {
        return [
            'KODE REFERENSI',
            'PANGKAT GOLONGAN RUANG',
            'LAKI LAKI',
            'PEREMPUAN',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->laki_laki;
        $total += $data->perempuan;
        return $total;
    }



    public function __construct($TahunFilter)
    {
        $this->TahunFilter = $TahunFilter;



    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pemeData = Modpeme100001::where('tahun', $this->TahunFilter)
            ->select('kode_referensi_anak', 'pangkat_golongan_ruang', 'laki_laki', 'perempuan')
            ->get();
    
        $pemeData->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $pemeData;
    }

    
}
