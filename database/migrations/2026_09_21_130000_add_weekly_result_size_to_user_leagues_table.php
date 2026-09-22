<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * How many people the finished week was actually contested against.
 *
 * "You finished 3rd" means nothing without it, and the obvious source is
 * wrong: the rollover re-buckets every tier into fresh cohorts the moment it
 * finishes, so by the time the learner opens the app their current cohort has
 * different people and a different size. Reading it live produced "You
 * finished #3 of 1".
 *
 * The number belongs to the week that ended, so it is recorded with the rest
 * of that week's result and cleared with it.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_leagues', function (Blueprint $table) {
            $table->unsignedInteger('pending_result_size')->nullable()->after('pending_result_rank');
        });
    }

    public function down(): void
    {
        Schema::table('user_leagues', function (Blueprint $table) {
            $table->dropColumn('pending_result_size');
        });
    }
};
