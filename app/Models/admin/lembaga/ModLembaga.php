<?php

namespace App\Models\admin\lembaga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\admin\lembaga\JenisLembaga;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class ModLembaga extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table ='lembaga';
    
    protected $guarded = [];


    
    public function jenislembaga()
    {
        return $this->belongsTo(ModJenisLembaga::class, 'jenis_lembaga_id');
    }

    public function pengguna()
    {
        return $this->hasMany(User::class);
    }

    
    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'kode_provinsi');
    }


    public function kabupaten()
    {
        return $this->belongsTo(Regency::class, 'kode_kabupaten');
    }


    public function kecamatan()
    {
        return $this->belongsTo(District::class, 'kode_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(Village::class,'kode_desa');
    }

    

}
