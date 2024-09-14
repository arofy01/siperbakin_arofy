<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkese100001;



class kese100001 implements FromCollection, WithHeadings, WithTitle
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
            'KECAMATAN',
            'DESA',
            'PERSALINAN',
            'LAHIR HIDUP',
            'LAHIR MATI',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->persalinan;
        $total += $data->lahir_hidup;
        $total += $data->lahir_mati;
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
        $keseData = Modkese100001::where('tahun', $this->TahunFilter)
            ->with('district', 'village')
            ->select('kode_referensi_anak', 'kecamatan', 'desa', 'persalinan', 'lahir_hidup', 'lahir_mati')
            ->get();
    
        $keseData->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $keseData;
    }

    
}
