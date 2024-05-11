<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteKaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'data_karyawan';
    public $timestamps = false;
    protected $guarded=['id'];
}
