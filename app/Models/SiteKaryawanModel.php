<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteKaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'data_karyawan';
    public $timestamps = false;

    protected $fillable = [
        'nik_karyawan',
        'nama',
        'email',
        'aktif_kerja',
        'tempat_tanggal_lahir',
        'status_karyawan',
        'area_kerja',
        'alamat_domisili',
    ];
}
