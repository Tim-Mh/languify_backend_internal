<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The "invisible safety net" hearts design was reverted back to a
     * visible 100-heart cap for Monthly/Yearly (see
     * LessonProgressService::effectiveMaxHearts()) — these columns backed
     * that abandoned mechanic and are no longer read anywhere.
     */
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn(['hearts_month', 'hearts_safety_net_remaining']);
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->string('hearts_month', 7)->nullable()->after('hearts_updated_at');
            $table->unsignedSmallInteger('hearts_safety_net_remaining')->default(0)->after('hearts_month');
        });
    }
};
