<?php

namespace App\Models\admin\pengguna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModJenisPengguna extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='jenis_pengguna';
    
    protected $guarded = [];
    

    public function pengguna()
    {
        return $this->hasMany(User::class, 'jenis_pengguna_id');
    }
}

