<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\Lembaga\JenisOPD;


class JenisOPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        $dinas = JenisOPD::create ([
            'nama_jenis_opd'=>'DINAS',           
        ]);

        $badan = JenisOPD::create ([
            'nama_jenis_opd'=>'BADAN',           
        ]);

        $sekretariat = JenisOPD::create ([
            'nama_jenis_opd'=>'SEKRETARIAT',           
        ]);

        $rumahsakit = JenisOPD::create ([
            'nama_jenis_opd'=>'RUMAH SAKIT',           
        ]);

        $kecamatan = JenisOPD::create ([
            'nama_jenis_opd'=>'KECAMATAN',           
        ]);

        $kecamatan = JenisOPD::create ([
            'nama_jenis_opd'=>'INSPEKTORAT',           
        ]);
        
        DB::commit();

    }
}
