<?php

namespace App\Models\admin\pengguna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModPeranPengguna extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table ='roles';
    
    protected $guarded = [];

  

}
