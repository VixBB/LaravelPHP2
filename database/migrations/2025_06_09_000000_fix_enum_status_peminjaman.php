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
        // Modify the enum column 'status' to fix the typo in enum values
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to the old enum values with typo if needed
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam')->change();
        });
    }
};
