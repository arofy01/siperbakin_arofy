<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;





class Modkesj100001 extends Model
{
    use HasFactory;

    protected $connection = 'mysql_sidarendu';
    protected $table ='KESJ-1-00001';
    // protected $primaryKey = 'id';

    protected $guarded = [];

    
    public function district()
    {
        return $this->belongsTo(ModKecamatan::class,'kecamatan');
    }


    public function village()
    {
        return $this->belongsTo(ModDesa::class,'desa');
    }


}

