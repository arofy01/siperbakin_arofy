<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpete100001;



class pete100001 implements FromCollection, WithHeadings, WithTitle
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
            'AYAM BURAS',
            'AYAM RAS PEDAGING',
            'AYAM RAS PETELUR',
            'MERPATI',
            'BURUNG PUYUH',
            'ITIK',
            'MANILA',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->ayam_buras;
        $total += $data->ayam_ras_pedaging;
        $total += $data->ayam_ras_petelur;
        $total += $data->merpati;
        $total += $data->burung_puyuh;
        $total += $data->itik;
        $total += $data->manila;
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
        $peteData = Modpete100001::where('tahun', $this->TahunFilter)
            ->with('district', 'village')
            ->select('kode_referensi_anak', 'kecamatan', 'ayam_buras', 'ayam_ras_pedaging', 'ayam_ras_petelur','merpati','burung_puyuh','itik', 'manila')
            ->get();
    
        $peteData->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $peteData;
    }

    
}
