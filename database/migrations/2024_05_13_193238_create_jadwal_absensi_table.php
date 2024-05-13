<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_absensi', function (Blueprint $table) {
            $table->id();
            $table->integer('nik_karyawan');
            $table->string('hari');
            $table->string('tgl_bln_thn');
            $table->string('shift');
            $table->string('dibuat_kapan');
            $table->string('dibuat_oleh'); 
        });
    }  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_absensi');
    }
};
