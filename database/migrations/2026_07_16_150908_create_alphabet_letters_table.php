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
        Schema::create('alphabet_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->string('character');
            $table->string('romanization')->nullable();
            $table->string('example_word')->nullable();
            $table->string('script_group')->nullable();
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();

            $table->index(['language_id', 'order_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alphabet_letters');
    }
};
