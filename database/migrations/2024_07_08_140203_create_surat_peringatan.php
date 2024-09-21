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
        // Membuat tabel 'surat_peringatan' jika belum ada
        if (!Schema::hasTable('surat_peringatan')) {
            Schema::create('surat_peringatan', function (Blueprint $table) {
                $table->id();
                $table->string('tp');
                $table->string('tanggal');
                $table->string('subjek');
                $table->string('no_surat');
                $table->string('alasan');
                $table->string('sp');
                $table->string('keterangan');
                $table->string('file_surat');
                $table->timestamps();
            });
        }

        // Tambah kolom siswa jika belum ada
        if (Schema::hasTable('surat_peringatan') && !Schema::hasColumn('surat_peringatan', 'siswa')) {
            Schema::table('surat_peringatan', function (Blueprint $table) {
                $table->string('siswa')->nullable()->after('subjek');
            });
        }

        // Tambah kolom guru jika belum ada
        if (Schema::hasTable('surat_peringatan') && !Schema::hasColumn('surat_peringatan', 'guru')) {
            Schema::table('surat_peringatan', function (Blueprint $table) {
                $table->string('guru')->nullable()->after('siswa');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom siswa jika ada
        if (Schema::hasColumn('surat_peringatan', 'siswa')) {
            Schema::table('surat_peringatan', function (Blueprint $table) {
                $table->dropColumn('siswa');
            });
        }

        // Hapus kolom guru jika ada
        if (Schema::hasColumn('surat_peringatan', 'guru')) {
            Schema::table('surat_peringatan', function (Blueprint $table) {
                $table->dropColumn('guru');
            });
        }

        // Hapus tabel 'surat_peringatan'
        Schema::dropIfExists('surat_peringatan');
    }
};
