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
        // Tabel kategori
        Schema::create('workshop_penyetaraan_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100);
            $table->string('slug', 100)->unique();
            $table->timestamps();
        });

        // Tabel PDF
        Schema::create('workshop_penyetaraan_pdf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('workshop_penyetaraan_kategori')->onDelete('cascade');
            $table->string('judul', 255);
            $table->string('file_path', 255)->nullable();
            $table->string('link_url', 255)->nullable();
            $table->string('preview_thumbnail', 255)->nullable();
            $table->timestamps();
        });

        // Tabel Video
        Schema::create('workshop_penyetaraan_video', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('workshop_penyetaraan_kategori')->onDelete('cascade');
            $table->string('judul', 255);
            $table->string('video_url', 255); // YouTube/Vimeo/dll
            $table->string('thumbnail_url', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_penyetaraan_video');
        Schema::dropIfExists('workshop_penyetaraan_pdf');
        Schema::dropIfExists('workshop_penyetaraan_kategori');
    }
};
