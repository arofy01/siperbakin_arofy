<?php

namespace App\Models\admin\jabatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModLingkupJabatan extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table ='lingkup_jabatan';

    protected $guarded = [];



}
