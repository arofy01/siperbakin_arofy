<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj200001;



class kesj200001 implements FromCollection, WithHeadings, WithTitle
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
            'GELANDANGAN / PENGEMIS',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->gelandangan_pengemis;
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
        $kesj2Data = Modkesj200001::where('tahun', $this->TahunFilter)
            ->with('district', 'village')
            ->select('kode_referensi_anak', 'kecamatan', 'gelandangan_pengemis')
            ->get();
    
        $kesj2Data->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $kesj2Data;
    }

    
}
