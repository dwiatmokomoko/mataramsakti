<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('motor_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_id')->constrained()->onDelete('cascade');
            $table->string('name'); // contoh: "Standard", "Turbo", "Connected"
            $table->string('full_name'); // contoh: "NMAX Standard", "NMAX Turbo"
            $table->text('description')->nullable();
            $table->decimal('price_otr', 15, 0);
            $table->decimal('price_dp', 15, 0)->nullable();
            $table->decimal('price_installment', 15, 0)->nullable();
            $table->string('image')->nullable();
            $table->json('specifications')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motor_models');
    }
};