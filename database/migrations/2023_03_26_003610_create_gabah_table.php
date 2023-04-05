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
        Schema::create('gabah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pemilik');
            $table->string('jenis');
            $table->string('berat');
            $table->string('klasifikasi')->nullable();
            $table->string('suhu1')->nullable();
            $table->string('suhu2')->nullable();
            $table->string('kadar_air1')->nullable();
            $table->string('kadar_air2')->nullable();
            $table->string('waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gabah');
    }
};
