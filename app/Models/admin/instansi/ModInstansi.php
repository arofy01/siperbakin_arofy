<?php

namespace App\Models\admin\instansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModInstansi extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table ='instansi';

    protected $guarded = [];



}
