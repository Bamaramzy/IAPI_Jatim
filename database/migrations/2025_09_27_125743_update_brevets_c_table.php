<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('brevets_c', function (Blueprint $table) {
            // Hapus kolom deskripsi dan tanggal jika ada
            if (Schema::hasColumn('brevets_c', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
            if (Schema::hasColumn('brevets_c', 'tanggal')) {
                $table->dropColumn('tanggal');
            }

            // Tambahkan kolom link_daftar
            $table->string('link_daftar')->nullable()->after('brosur');
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::table('brevets_c', function (Blueprint $table) {
            // Tambahkan kembali kolom deskripsi dan tanggal
            $table->text('deskripsi')->nullable();
            $table->date('tanggal')->nullable();

            // Hapus kolom link_daftar
            $table->dropColumn('link_daftar');
        });
    }
};
