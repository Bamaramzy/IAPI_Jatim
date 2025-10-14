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
        Schema::create('peraturan_spap', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->string('pdf_1_judul')->nullable();
            $table->string('pdf_1_url')->nullable();
            $table->string('pdf_2_judul')->nullable();
            $table->string('pdf_2_url')->nullable();
            $table->string('pdf_3_judul')->nullable();
            $table->string('pdf_3_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peraturan_spap');
    }
};
