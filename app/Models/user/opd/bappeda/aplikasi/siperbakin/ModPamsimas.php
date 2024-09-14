<?php

namespace App\Models\user\opd\bappeda\aplikasi\siperbakin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModPamsimas extends Model
{
    use HasFactory;

    protected $connection = 'mysql_siperbakin';
    protected $table ='pamsimas';
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

