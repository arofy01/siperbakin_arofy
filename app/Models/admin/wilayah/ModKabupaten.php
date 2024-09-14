<?php

namespace App\Models\admin\wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModKabupaten extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='regencies';
    
    protected $guarded = [];
}
