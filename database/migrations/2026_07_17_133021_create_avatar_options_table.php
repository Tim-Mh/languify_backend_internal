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
        Schema::create('avatar_options', function (Blueprint $table) {
            $table->id();
            $table->string('attribute_type');
            $table->string('value');
            $table->unsignedInteger('price_gems')->default(0);
            $table->boolean('is_default')->default(false);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();

            $table->unique(['attribute_type', 'value']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatar_options');
    }
};
