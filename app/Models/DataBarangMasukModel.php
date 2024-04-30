<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangMasukModel extends Model
{
    use HasFactory;
    protected $table = 'data_masuk';
    public $timestamps = false;
    protected $guarded=['id'];
}
