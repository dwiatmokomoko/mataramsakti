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
        Schema::create('motor_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_model_id')->constrained()->onDelete('cascade');
            $table->string('color_name'); // Nama warna: Matte Black, Racing Blue, dll
            $table->string('color_code')->nullable(); // Kode warna hex: #000000
            $table->string('image')->nullable(); // Gambar motor dengan warna ini
            $table->decimal('price_difference', 15, 0)->default(0); // Selisih harga dari harga dasar
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motor_variants');
    }
};
