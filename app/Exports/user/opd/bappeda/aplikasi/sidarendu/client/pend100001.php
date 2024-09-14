<?php

namespace App\Exports\user\opd\bappeda\aplikasi\sidarendu\client;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithTitle;

use App\Models\user\opd\bappeda\aplikasi\sidarendu\client\Modpend100001;



class pend100001 implements FromCollection, WithHeadings, WithTitle
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
            'SEKOLAH NEGERI',
            'SEKOLAH SWASTA',
            'JUMLAH',
            
        ];
    }


    public function calculateTotal($data)
    {
        $total = 0;
        $total += $data->sekolah_negeri;
        $total += $data->sekolah_swasta;
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
        $pendData = Modpend100001::where('tahun', $this->TahunFilter)
            ->with('district', 'village')
            ->select('kode_referensi_anak', 'kecamatan', 'sekolah_negeri', 'sekolah_swasta')
            ->get();
    
        $pendData->each(function ($item) {
            $item->total = $this->calculateTotal($item);
        });
    
        return $pendData;
    }

    
}
