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
        Schema::create('silabus', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_utama');
            $table->string('sub_kategori');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('pdf_link')->nullable();
            $table->string('gambar')->nullable();
            $table->string('gambar_link')->nullable();
            $table->string('ilustrasi_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('silabuses');
    }
};
