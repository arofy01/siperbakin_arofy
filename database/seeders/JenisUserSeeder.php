<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\Pengguna\JenisPengguna;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $bupati1 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'BUPATI',           
        ]);

        $wakilbupati2 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'WAKIL BUPATI',           
        ]);

        $anggotadprk3 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'ANGGOTA DPRK',           
        ]);

        $opd4 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'OPD',           
        ]);

        $pns5 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'PNS',           
        ]);

        $pppk6 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'PPPK',           
        ]);

        $paud7 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'PAUD',           
        ]);

        $tk8 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'TK',           
        ]);

        $sd9 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'SD',           
        ]);

        $smp10 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'SMP',           
        ]);

        $dayah11 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'DAYAH',           
        ]);

        $desa12 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'DESA',           
        ]);

        $posyandu13 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'POSYANDU',           
        ]);

        $walidata14 = JenisPengguna::create ([
            'nama_jenis_pengguna'=>'WALIDATA',           
        ]);

        DB::commit();
    }
}
