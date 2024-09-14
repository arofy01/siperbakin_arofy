<?php

namespace App\Models\user\opd\bappeda\aplikasi\siperbakin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class ModDesa extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='villages';
    protected $primaryKey = 'id';

    protected $guarded = [];

}

