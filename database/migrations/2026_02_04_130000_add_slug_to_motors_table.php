<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
        });

        // Generate slugs for existing motors
        DB::table('motors')->orderBy('id')->chunk(100, function ($motors) {
            foreach ($motors as $motor) {
                $slug = Str::slug($motor->name);
                
                // Check if slug already exists
                $count = DB::table('motors')->where('slug', $slug)->count();
                if ($count > 0) {
                    $slug = $slug . '-' . $motor->id;
                }
                
                DB::table('motors')
                    ->where('id', $motor->id)
                    ->update(['slug' => $slug]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motors', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
