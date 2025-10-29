<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->enum('status_id', ['Aktif', 'Cuti Sementara', 'Tidak Aktif'])
                ->default('Aktif')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('status_id')->default('Aktif')->change();
        });
    }
};
