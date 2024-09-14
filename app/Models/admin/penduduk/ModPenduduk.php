<?php

namespace App\Models\admin\penduduk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\admin\aparatur\ModAparatur;

class ModPenduduk extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='penduduk';
    protected $primaryKey = 'id';
    
    protected $guarded = [];

    
    public function aparatur()
    {
        return $this->hasOne(ModAparatur::class, 'penduduk_id');
    }


}

