<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModDaftardata extends Model
{
    use HasFactory;

    protected $connection = 'mysql_sidarendu';
    protected $table ='daftardata';
    // protected $primaryKey = 'id';

    protected $guarded = [];


    public function role()
    {
        return $this->belongsTo(ModRoles::class, 'role_id');
    }
    

}

