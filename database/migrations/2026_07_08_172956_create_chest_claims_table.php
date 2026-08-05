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
        Schema::create('chest_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('chest_type', ['daily', 'streak', 'unit_bonus']);
            $table->string('reference');
            $table->unsignedInteger('gems_awarded')->default(0);
            $table->unsignedInteger('xp_awarded')->default(0);
            $table->unsignedInteger('hearts_awarded')->default(0);
            $table->timestamp('claimed_at');
            $table->timestamps();

            $table->unique(['user_id', 'chest_type', 'reference']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chest_claims');
    }
};
