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
        Schema::create('data_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik_karyawan');
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('hp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('lama_bekerja')->nullable();
            $table->string('area_kerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_karyawan');
    }
};
