<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Modpeme100001 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_sidarendu';
    protected $table ='PEME-1-00001';
    // protected $primaryKey = 'id';

    protected $guarded = [];


    public function pangkat()
    {
        return $this->belongsTo(ModPangkat::class,'pangkat_golongan_ruang');
    }

}

