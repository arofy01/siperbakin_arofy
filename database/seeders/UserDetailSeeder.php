<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\UserDetail;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $superadmindetail = UserDetail::create ([
            'user_id'=>1,
            'jenis_user_id'=>2,
            'nama_jabatan_id'=>6,
            'pangkat_id'=>12,
            'opd_id'=>4,
            'gelar_depan'=>null,
            'gelar_belakang'=>'ST. M.Ikom',
            'nip'=>'198002072010031001',
            'nik'=>'1116030702805501',
            'nohp1'=>'082366833180',
            'nohp2'=>null,
            'avatar'=>null,
            'facebook'=>null,
            'twitter'=>null,  
        ]);

        $walidata = UserDetail::create ([
            'user_id'=>2,
            'jenis_user_id'=>4,
            'nama_jabatan_id'=>5,
            'pangkat_id'=>null,
            'opd_id'=>4,
            'gelar_depan'=> null,
            'gelar_belakang'=>null,
            'nip'=>null,
            'nik'=>null,
            'nohp1'=>null,
            'nohp2'=>null,
            'avatar'=>null,
            'facebook'=>null,
            'twitter'=>null,  
        ]);

       

        DB::commit();
    }
}
