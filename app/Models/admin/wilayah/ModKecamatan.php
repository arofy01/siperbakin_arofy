<?php

namespace App\Models\admin\wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModKecamatan extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='districts';
    
    protected $guarded = [];
}
