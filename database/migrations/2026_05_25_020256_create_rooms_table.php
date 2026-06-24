<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kamar');
        $table->string('tipe_kamar'); // Contoh: Deluxe, Suite, Standard
        $table->integer('harga');
        $table->string('foto')->nullable(); // Menyimpan nama file foto kamar
        $table->enum('status', ['tersedia', 'penuh'])->default('tersedia');
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
