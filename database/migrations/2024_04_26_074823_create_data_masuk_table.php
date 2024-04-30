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
        Schema::create('data_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('Kategory')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('qty_barang')->nullable();
            $table->dateTime('tanggal_dibuat')->nullable();
            $table->string('dibuat_oleh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_masuk');
    }
};
