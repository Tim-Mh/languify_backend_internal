<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Removes the ten old fixed-goal quests. They were switched off when the
 * quests that grow with the learner replaced them, and are never handed out.
 * Only rows still switched off are removed, so one an admin turned back on
 * stays.
 */
return new class extends Migration
{
    private const OLD_KEYS = [
        'quest-1-lesson', 'quest-3-lessons', 'quest-4-lessons', 'quest-6-lessons',
        'quest-15-xp', 'quest-30-xp', 'quest-60-xp', 'quest-100-xp',
        'quest-perfect-lesson', 'quest-2-perfect',
    ];

    public function up(): void
    {
        DB::table('quests')
            ->whereIn('key', self::OLD_KEYS)
            ->where('is_active', false)
            ->delete();
    }

    public function down(): void
    {
        // Not restored: they were unused, and the migrations that first
        // added them still describe their original settings.
    }
};
