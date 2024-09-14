<?php

namespace App\Models\admin\aparatur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\admin\penduduk\ModPenduduk;

use App\Models\admin\aparatur\ModJenisAparatur;

class ModAparatur extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='aparatur';
    protected $primaryKey = 'id';

    protected $guarded = [];


    public function jenisaparatur()
    {
        return $this->belongsTo(ModJenisAparatur::class, 'jenis_aparatur_id');
    }


    public function penduduk()
    {
        return $this->belongsTo(ModPenduduk::class, 'penduduk_id');
    }



}

