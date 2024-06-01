<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    public $timestamps = false;
    protected $guarded=['id'];

    protected $fillable = [
        'hari', 'nik_karyawan', 'jam_masuk', 'jam_keluar', 'keterangan_absen', 'status_absen', 'latitude', 'longitude', 'device_type'
    ];
}
