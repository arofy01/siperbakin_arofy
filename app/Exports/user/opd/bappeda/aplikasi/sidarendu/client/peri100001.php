<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modperi100001;



class peri100001 implements FromCollection, WithHeadings, WithTitle
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
            'KAPAL MOTOR',
            'PERAHU TANPA MOTOR KECIL',
            'MOTOR TEMPEL',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->kapal_motor;
        $total += $data->perahu_tanpa_motor_kecil;
        $total += $data->motor_tempel;
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
        $periData = Modperi100001::where('tahun', $this->TahunFilter)
            ->with('district', 'village')
            ->select('kode_referensi_anak', 'kecamatan', 'kapal_motor', 'perahu_tanpa_motor_kecil', 'motor_tempel')
            ->get();
    
        $periData->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $periData;
    }

    
}
