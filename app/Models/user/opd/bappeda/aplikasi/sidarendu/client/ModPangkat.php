<?php

namespace App\Models\user\opd\bappeda\aplikasi\sidarendu\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class ModPangkat extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='pangkat';
    protected $primaryKey = 'id';

    protected $guarded = [];

}

