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
        Schema::create('jamaah_siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dokumentasi_jamaah')->unsigned();
            $table->foreign('dokumentasi_jamaah')->references('id')->on('dokumentasi_jamaah_siswa')->cascadeOnDelete();
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')->cascadeOnDelete();
            $table->enum('status_jamaah', ['-','Hadir', 'Sakit', 'Alpha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah_siswa');
    }
};
