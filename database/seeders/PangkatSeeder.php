<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin\Pangkat\Pangkat;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $Ia = Pangkat::create ([
            'golongan'=>'I/a',     
            'nama_pangkat'=>'Juru Muda',       
        ]);
    
        $Ib = Pangkat::create ([
                'golongan'=>'I/b',     
                'nama_pangkat'=>'Juru Muda Tingkat I',            
            ]);
        
        $Ic = Pangkat::create ([
                'golongan'=>'I/c',     
                'nama_pangkat'=>'Juru',            
            ]);
        
        $Id = Pangkat::create ([
                'golongan'=>'I/d',     
                'nama_pangkat'=>'Juru Tingkat I',            
            ]);

            $IIa = Pangkat::create ([
                'golongan'=>'II/a',     
                'nama_pangkat'=>'Pengatur Muda',       
            ]);
        
        $IIb = Pangkat::create ([
                'golongan'=>'II/b',     
                'nama_pangkat'=>'Pengatur Muda Tingkat I',            
            ]);
        
        $IIc = Pangkat::create ([
                'golongan'=>'II/c',     
                'nama_pangkat'=>'Pengatur',            
            ]);
        
        $IId = Pangkat::create ([
                'golongan'=>'II/d',     
                'nama_pangkat'=>'Pengatur Tingkat I',            
            ]);
    

        $IIIa = Pangkat::create ([
            'golongan'=>'III/a',     
            'nama_pangkat'=>'Penata Muda',       
        ]);

        $IIIb = Pangkat::create ([
            'golongan'=>'III/b',     
            'nama_pangkat'=>'Penata Muda Tingkat I',            
        ]);

        $IIIc = Pangkat::create ([
            'golongan'=>'III/c',     
            'nama_pangkat'=>'Penata',            
        ]);

        $IIId = Pangkat::create ([
            'golongan'=>'III/d',     
            'nama_pangkat'=>'Penata Tingkat I',            
        ]);

        $IVa = Pangkat::create ([
            'golongan'=>'IV/a',     
            'nama_pangkat'=>'Penata Muda',       
        ]);
    
    $IVb = Pangkat::create ([
            'golongan'=>'IV/b',     
            'nama_pangkat'=>'Penata Muda Tingkat I',            
        ]);
    
    $IVc = Pangkat::create ([
            'golongan'=>'IV/c',     
            'nama_pangkat'=>'Penata',            
        ]);
    
    $IVd = Pangkat::create ([
            'golongan'=>'IV/d',     
            'nama_pangkat'=>'Penata Tingkat I',            
        ]);
    

        DB::commit();
    }
}
