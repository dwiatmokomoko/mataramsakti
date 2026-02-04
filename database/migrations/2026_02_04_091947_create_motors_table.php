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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->text('description')->nullable();
            $table->decimal('price_otr', 15, 0);
            $table->decimal('price_dp', 15, 0)->nullable();
            $table->decimal('price_installment', 15, 0)->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable(); // Sport, Matic, Bebek, dll
            $table->json('specifications')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
