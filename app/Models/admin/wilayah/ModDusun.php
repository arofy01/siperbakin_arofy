<?php

namespace App\Models\admin\wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModDusun extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='dusun';
    
    protected $guarded = [];
   
}
