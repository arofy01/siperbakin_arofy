<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class ModKecamatan extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='districts';
    protected $primaryKey = 'id';

    protected $guarded = [];

}

