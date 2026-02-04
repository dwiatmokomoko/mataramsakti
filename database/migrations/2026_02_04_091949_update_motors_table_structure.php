<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('motors', function (Blueprint $table) {
            // Drop columns yang tidak diperlukan
            $table->dropColumn([
                'model',
                'price_otr',
                'price_dp', 
                'price_installment',
                'image',
                'specifications',
                'is_featured'
            ]);
        });
    }

    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            // Restore columns jika rollback
            $table->string('model')->nullable();
            $table->decimal('price_otr', 15, 0)->nullable();
            $table->decimal('price_dp', 15, 0)->nullable();
            $table->decimal('price_installment', 15, 0)->nullable();
            $table->string('image')->nullable();
            $table->json('specifications')->nullable();
            $table->boolean('is_featured')->default(false);
        });
    }
};