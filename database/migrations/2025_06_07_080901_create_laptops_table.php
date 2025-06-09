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
    Schema::create('laptops', function (Blueprint $table) {
        $table->id();
        $table->string('kode_laptop')->unique(); // Contoh: LAP001
        $table->string('merk'); // Contoh: ASUS, HP, Lenovo
        $table->string('tipe'); // Contoh: VivoBook, ThinkPad
        $table->string('Deskripsi');
        $table->string('gambar')->nullable(); // Path gambar laptop
        $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
