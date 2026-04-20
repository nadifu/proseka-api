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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Kusanagi Nene
            $table->string('unit'); // Contoh: Wonderland x Showtime
            $table->string('attribute'); // Contoh: Cute, Cool, Pure, Happy, Mysterious
            $table->integer('star_rating'); // Contoh: 4 (untuk kartu bintang 4)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
