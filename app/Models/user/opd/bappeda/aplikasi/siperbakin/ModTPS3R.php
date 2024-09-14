<?php

namespace App\Models\user\opd\bappeda\aplikasi\siperbakin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModTPS3R extends Model
{
    use HasFactory;

    protected $connection = 'mysql_siperbakin';
    protected $table ='tps3r';
    // protected $primaryKey = 'id';

    protected $guarded = [];



    public function kecamatan() 
    {
        return $this->belongsTo(ModKecamatan::class,'kode_kecamatan');
    }


    public function desa()
    {
        return $this->belongsTo(ModDesa::class,'kode_desa');
    }

    
   
    

}

