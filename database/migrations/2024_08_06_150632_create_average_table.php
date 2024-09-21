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
        Schema::create('average', function (Blueprint $table) {
            $table->id();

            $table->string('tahun_ajaran');
            $table->string('kelas');
            $table->string('semester');

            // Muatan Nasional
            $table->integer('pai')->nullable();
            $table->integer('pkn')->nullable();
            $table->integer('indo')->nullable();
            $table->integer('mtk')->nullable();
            $table->integer('sejindo')->nullable();
            $table->integer('bhs_asing')->nullable();

            // Muatan Kewilayahan
            $table->integer('sbd')->nullable();
            $table->integer('pjok')->nullable();

            // Muatan Peminatan Kejuruan
            // C1. Dasar Bidang Keahlian
            $table->integer('simdig')->nullable();
            $table->integer('fis')->nullable();
            $table->integer('kim')->nullable();

            // C2. Dasar Program Keahlian
            $table->integer('sis_kom')->nullable();
            $table->integer('komjar')->nullable();
            $table->integer('progdas')->nullable();
            $table->integer('ddg')->nullable();

            // C3. Kompetensi Keahlian
            $table->integer('iaas')->nullable();
            $table->integer('paas')->nullable();
            $table->integer('saas')->nullable();
            $table->integer('siot')->nullable();
            $table->integer('skj')->nullable();
            $table->integer('pkk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('average');
    }
};
