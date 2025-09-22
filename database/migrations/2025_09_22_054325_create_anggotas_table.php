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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->integer('no_urut');
            $table->string('no_reg_iapi', 50);
            $table->string('nama_anggota');
            $table->string('izin_ap', 100)->nullable();
            $table->enum('kategori', [
                'Anggota Madya',
                'Anggota Muda',
                'Anggota Biasa',
                'Anggota Pemula',
                'Anggota Umum'
            ]);
            $table->string('nama_kap')->nullable();
            $table->enum('status_id', ['Aktif', 'Cuti Sementara'])->default('Aktif');
            $table->string('korwil', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
