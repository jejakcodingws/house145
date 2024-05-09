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
        Schema::create('target_penghasilan', function (Blueprint $table) {
            $table->id();
            $table->string('kd_target')->nullable();
            $table->string('bulan')->nullable();
            $table->integer('nominal_target');
            $table->datetime('dibuat_kapan');
            $table->string('dibuat_oleh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_penghasilan');
    }
};
