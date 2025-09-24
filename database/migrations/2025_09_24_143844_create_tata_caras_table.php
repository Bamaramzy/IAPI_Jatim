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
        Schema::create('tata_caras', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file_pdf')->nullable();
            $table->string('link_drive')->nullable();
            $table->string('cover')->nullable();
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tata_caras');
    }
};
