<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brevets', function (Blueprint $table) {
            $table->enum('status', ['publish', 'draft'])->default('draft')->after('brosur');
        });
    }

    public function down(): void
    {
        Schema::table('brevets', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
