<?php

namespace App\Models\admin\aparatur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\admin\aparatur\Aparatur;

class ModJenisAparatur extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='jenis_aparatur';
    
    protected $guarded = [];

    public function aparatur()
    {
        return $this->hasMany(ModAparatur::class,'jenis_aparatur_id');
    }
    
}
