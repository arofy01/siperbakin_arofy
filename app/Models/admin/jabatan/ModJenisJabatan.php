<?php

namespace App\Models\admin\jabatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModJenisJabatan extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table ='jenis_jabatan';

    protected $guarded = [];



}
