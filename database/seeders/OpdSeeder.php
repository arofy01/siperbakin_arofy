<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\Opd\Opd;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $sekretariatdaerah = Opd::create ([
            'nama_opd'=>'Sekretariat Daerah',
            'alamat_opd'=>'Komplek Perkantoran Bupati Aceh Tamiang',
           
        ]);

        $bkpsdm = Opd::create ([
            'nama_opd'=>'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
            'alamat_opd'=>'Komplek Perkantoran Bupati Aceh Tamiang',
           
        ]);


        $bpbd = Opd::create ([
            'nama_opd'=>'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan',
            'alamat_opd'=>'Komplek Perkantoran Bupati Aceh Tamiang',
           
        ]);

        $diskominfosan = Opd::create ([
            'nama_opd'=>'Dinas Komunikasi Informatika dan Persandian',
            'alamat_opd'=>'Komplek Perkantoran Bupati Aceh Tamiang',
           
        ]);


        DB::commit();
    }
}
