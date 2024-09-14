<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class ModRoles extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='roles';
    protected $primaryKey = 'id';

    protected $guarded = [];


    // public function daftardata()
    // {
    //     return $this->hasMany(ModDaftardata::class, 'role_id');
    // }

 



}

