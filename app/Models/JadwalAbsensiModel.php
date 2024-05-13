<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAbsensiModel extends Model
{
    use HasFactory;
    protected $table = 'jadwal_absensi';
    public $timestamps = false;
    protected $guarded=['id'];
}
