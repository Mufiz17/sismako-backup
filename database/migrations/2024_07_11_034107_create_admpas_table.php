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
        Schema::create('admpas', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran')->nullable();
            $table->string('kelas')->nullable();
            $table->string('mapel')->nullable();
            $table->string('kisi_kisi')->nullable();
            $table->string('soal')->nullable();
            $table->string('jawaban')->nullable();
            $table->string('proker')->nullable();
            $table->string('kehadiran')->nullable();
            $table->string('ba')->nullable();
            $table->string('sk_panitia')->nullable();
            $table->string('tatib')->nullable();
            $table->string('surat_pemberitahuan')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('daftar_nilai')->nullable();
            $table->string('tanda_terima_dan_penerimaan_soal')->nullable();
            $table->string('denah')->nullable();
            $table->string('type');
            $table->string('kehadiran_panitia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admpas');
    }
};
