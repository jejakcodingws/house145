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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nik_karyawan')->nullable();            
            $table->string('jam_masuk')->nullable();            
            $table->string('jam_keluar')->nullable();            
            $table->string('keterangan_absen')->nullable();            
            $table->string('status_absen')->nullable();            
            $table->string('absen_kapan')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
        
    }
};
