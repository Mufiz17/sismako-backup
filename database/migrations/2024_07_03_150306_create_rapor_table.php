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
        Schema::create('rapor', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran', 9);
            $table->string('kelas', 10);
            $table->string('nama', 100);
            $table->string('nisn', 10);
            $table->string('semester');

            // Signature
            $table->string('released')->nullable();
            $table->string('wname', 100)->nullable();
            $table->string('nip', 18)->nullable();
            $table->string('hmaster', 100)->nullable();
            $table->string('hmnip', 18)->nullable();

            // Attitude
            $table->json('attitude')->nullable();

            // Ekstrakurikuler
            $table->json('extracurricular')->nullable();

            // Attendance
            $table->unsignedTinyInteger('izin')->nullable();
            $table->unsignedTinyInteger('sakit')->nullable();
            $table->unsignedTinyInteger('alpha')->nullable();

            // Achievements
            $table->json('achievements')->nullable();

            // Notes
            $table->text('note')->nullable();

            // Muatan Nasional
            $table->json('muatan_nasional')->nullable();

            // Muatan Kewilayahan
            $table->json('muatan_kewilayahan')->nullable();

            // Muatan Peminatan Kejuruan
            $table->json('muatan_peminatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapor');
    }
};
