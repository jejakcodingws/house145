<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetPenghasilanModel extends Model
{
    use HasFactory;
    protected $table = 'target_penghasilan';
    public $timestamps = false;
    protected $guarded=['id'];
}
