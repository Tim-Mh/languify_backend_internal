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
        Schema::create('user_avatars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            $table->string('skin_color')->nullable();
            $table->string('hair')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eyes')->nullable();
            $table->string('eyebrows')->nullable();
            $table->string('mouth')->nullable();
            $table->string('glasses')->nullable();
            $table->string('earrings')->nullable();
            $table->string('background_color')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_avatars');
    }
};
