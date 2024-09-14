<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        // try {
            $superadmin = User::create ([
                'jenis_pengguna_id' => 5,
                'name'=>'Super Admin',
                'email'=>'superadmin@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
            

            $walidata = User::create ([
                'jenis_pengguna_id' => 14,
                'name'=>'Wali Data',
                'email'=>'walidata@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $diskominfosan = User::create ([
                'jenis_pengguna_id' => 4,
                'name'=>'DISKOMINFOSAN',
                'email'=>'diskominfosan@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $bappeda = User::create ([
                'jenis_pengguna_id' => 4,
                'name'=>'BAPPEDA',
                'email'=>'bappeda@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $bkpsdm = User::create ([
                'jenis_pengguna_id' => 4,
                'name'=>'BKPSDM',
                'email'=>'bkpsdm@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $kecamatankarangbaru= User::create ([
                'jenis_pengguna_id' => 4,
                'name'=>'Kecamatan Karang Baru',
                'email'=>'karangbaru@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);


            $desakesehatan= User::create ([
                'jenis_pengguna_id' => 12,
                'name'=>'Desa Kesehatan',
                'email'=>'kesehatan.karangbaru@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $smpn1karangbaru= User::create ([
                'jenis_pengguna_id' => 10,
                'name'=>'SMP Negeri 1 Karang Baru',
                'email'=>'smpn1karangbaru@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $sdn1karangbaru= User::create ([
                'jenis_pengguna_id' => 9,
                'name'=>'SD Negeri 1 Karang Baru',
                'email'=>'sdn1karangbaru@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $dayahmanarulislam= User::create ([
                'jenis_pengguna_id' => 11,
                'name'=>'Dayah Perbatasan Manarul Islam',
                'email'=>'manarulislam@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $bupati= User::create ([
                'jenis_pengguna_id' => 1,
                'name'=>'Meurah Budiman',
                'email'=>'meurah_budiman@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $wakilbupati= User::create ([
                'jenis_pengguna_id' => 2,
                'name'=>'Tengku Zulkarnain',
                'email'=>'tengku_zulkarnain@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $anggotadprk= User::create ([
                'jenis_pengguna_id' => 3,
                'name'=>'Muhammad Irwan',
                'email'=>'muhammad_irwan@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $asn= User::create ([
                'jenis_pengguna_id' => 5,
                'name'=>'Revi Rinaldi',
                'email'=>'revirinaldi@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $pppk= User::create ([
                'jenis_pengguna_id' => 6,
                'name'=>'Cut Mutia Rahmi',
                'email'=>'cut_mutia_rahmi@acehtamiangkab.go.id',
                'email_verified_at'=> now(),
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

         


            // $superadminrole =Role::create(['name'=>'superadmin']);
            // $opdrole =Role::create(['name'=>'opd']);
            // $walidatarole = Role::create(['name'=>'walidata']);
            // $diskominfosanrole = Role::create(['name'=>'diskominfosan']);
            // $bappedarole = Role::create(['name'=>'bappeda']);
            // $bkpsdmrole = Role::create(['name'=>'bkpsdm']);
            // $kecamatanrole = Role::create(['name'=>'kecamatan']);
            // $desarole =Role::create(['name'=>'desa']);
            // $smprole = Role::create(['name'=>'smp']);
            // $sdrole = Role::create(['name'=>'sd']);
            // $tkrole = Role::create(['name'=>'tk']);
            // $paudrole = Role::create(['name'=>'paud']);
            // $dayahrole = Role::create(['name'=>'dayah']);
            // $bupatirole = Role::create(['name'=>'bupati']);
            // $wakilbupatirole = Role::create(['name'=>'wakilbupati']);
            // $anggotadprkrole = Role::create(['name'=>'anggotadprk']);
            // $dprkrole = Role::create(['name'=>'dprk']);
            // $asnrole = Role::create(['name'=>'asn']);
            // $pppkrole = Role::create(['name'=>'pppk']);
            // $posyandurole = Role::create(['name'=>'posyandu']);
           


            $superadmin->assignRole('superadmin');
            $walidata->assignRole ('walidata');
            $bappeda->assignRole ('bappeda');
            $diskominfosan->assignRole ('diskominfosan');
            $bkpsdm->assignRole ('bkpsdm');
            $kecamatankarangbaru->assignRole('kecamatan');
            $desakesehatan->assignRole('desa');
            $smpn1karangbaru->assignRole('smp');
            $sdn1karangbaru->assignRole('sd');
            $dayahmanarulislam->assignRole('dayah');
            $bupati->assignRole('bupati');
            $wakilbupati->assignRole('wakilbupati');
            $anggotadprk->assignRole('dprk');
            $asn->assignRole('asn');
            $pppk->assignRole('pppk');


            DB::commit();

        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }



    }
}
