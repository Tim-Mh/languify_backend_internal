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
        Schema::create('user_leagues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->foreignId('league_tier_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('cohort_group_number');
            $table->date('week_start_date');
            $table->timestamps();

            $table->index(['league_tier_id', 'week_start_date', 'cohort_group_number'], 'user_leagues_cohort_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_leagues');
    }
};
