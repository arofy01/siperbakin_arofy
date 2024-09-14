<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modkesj100001;



class kesj100001 implements FromCollection, WithHeadings, WithTitle
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
            'PRASEJAHTERA',
            'SEJAHTERA I',
            'SEJAHTERA II',
            'SEJAHTERA III',
            'SEJAHTERA III+',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->prasejahtera;
        $total += $data->sejahtera1;
        $total += $data->sejahtera2;
        $total += $data->sejahtera3;
        $total += $data->sejahtera3plus;
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
        $kesj1Data = Modkesj100001::where('tahun', $this->TahunFilter)
            ->with('district')
            ->select('kode_referensi_anak', 'kecamatan', 'prasejahtera', 'sejahtera1', 'sejahtera2', 'sejahtera3','sejahtera3plus')
            ->get();
    
        $kesj1Data->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $kesj1Data;
    }

    
}
