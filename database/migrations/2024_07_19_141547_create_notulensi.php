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
        Schema::create('notulensi', function (Blueprint $table) {
            $table->id();
            $table->string('tp');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('daring');
            $table->string('materi');
            $table->string('pemateri');
            $table->text('peserta');
            $table->text('hasil');
            $table->string('file_surat');
            $table->string('file_dokumentasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notulensi');
    }
};
