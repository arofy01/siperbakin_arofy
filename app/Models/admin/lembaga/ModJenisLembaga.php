<?php

namespace App\Models\admin\lembaga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin\Lembaga\Lembaga;

class ModJenisLembaga extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='jenis_lembaga';
    
    protected $guarded = [];

    public function lembaga()
    {
        return $this->hasMany(ModLembaga::class,'jenis_lembaga_id');
    }
    
}
