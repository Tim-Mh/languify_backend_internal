<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const OLD_TYPES = "'lessons_completed', 'xp_earned', 'perfect_lesson'";

    private const NEW_TYPES = "'lessons_completed', 'xp_earned', 'perfect_lesson', 'units_completed'";

    private const NEW_QUEST_KEYS = [
        'quest-1-lesson', 'quest-15-xp', 'quest-3-lessons', 'quest-1-unit',
        'quest-6-lessons', 'quest-100-xp', 'quest-2-perfect',
    ];

    public function up(): void
    {
        Schema::table('quests', function (Blueprint $table) {
            // 1 = easy, 2 = medium, 3 = hard — drives QuestService's adaptive
            // daily assignment (see quest_difficulty_level on user_game_states).
            $table->unsignedTinyInteger('difficulty')->default(1)->after('requirement_type');
        });

        $this->widenRequirementTypeColumn();

        // Backfill a difficulty tier for the 5 quests that predate this column.
        DB::table('quests')->where('key', 'quest-2-lessons')->update(['difficulty' => 1]);
        DB::table('quests')->where('key', 'quest-4-lessons')->update(['difficulty' => 2]);
        DB::table('quests')->where('key', 'quest-30-xp')->update(['difficulty' => 1]);
        DB::table('quests')->where('key', 'quest-60-xp')->update(['difficulty' => 2]);
        DB::table('quests')->where('key', 'quest-perfect-lesson')->update(['difficulty' => 2]);

        $now = now();
        $nextOrder = (int) DB::table('quests')->max('order_number') + 1;

        $newQuests = [
            ['key' => 'quest-1-lesson', 'title' => 'Warm Up', 'description' => 'Complete 1 lesson today', 'requirement_type' => 'lessons_completed', 'target_count' => 1, 'difficulty' => 1, 'gems_reward' => 10, 'xp_reward' => 0],
            ['key' => 'quest-15-xp', 'title' => 'Getting Started', 'description' => 'Earn 15 XP today', 'requirement_type' => 'xp_earned', 'target_count' => 15, 'difficulty' => 1, 'gems_reward' => 10, 'xp_reward' => 0],
            ['key' => 'quest-3-lessons', 'title' => 'Solid Effort', 'description' => 'Complete 3 lessons today', 'requirement_type' => 'lessons_completed', 'target_count' => 3, 'difficulty' => 2, 'gems_reward' => 30, 'xp_reward' => 10],
            ['key' => 'quest-1-unit', 'title' => 'Unit Finisher', 'description' => 'Complete a full unit today', 'requirement_type' => 'units_completed', 'target_count' => 1, 'difficulty' => 2, 'gems_reward' => 35, 'xp_reward' => 15],
            ['key' => 'quest-6-lessons', 'title' => 'Marathon', 'description' => 'Complete 6 lessons today', 'requirement_type' => 'lessons_completed', 'target_count' => 6, 'difficulty' => 3, 'gems_reward' => 60, 'xp_reward' => 30],
            ['key' => 'quest-100-xp', 'title' => 'XP Master', 'description' => 'Earn 100 XP today', 'requirement_type' => 'xp_earned', 'target_count' => 100, 'difficulty' => 3, 'gems_reward' => 50, 'xp_reward' => 0],
            ['key' => 'quest-2-perfect', 'title' => 'Double Flawless', 'description' => 'Finish 2 lessons with 0 mistakes today', 'requirement_type' => 'perfect_lesson', 'target_count' => 2, 'difficulty' => 3, 'gems_reward' => 45, 'xp_reward' => 20],
        ];

        foreach ($newQuests as $i => $quest) {
            DB::table('quests')->insert($quest + [
                'order_number' => $nextOrder + $i,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        DB::table('quests')->whereIn('key', self::NEW_QUEST_KEYS)->delete();

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE quests MODIFY requirement_type ENUM('.self::OLD_TYPES.') NOT NULL');
        }

        Schema::table('quests', function (Blueprint $table) {
            $table->dropColumn('difficulty');
        });
    }

    /**
     * Widens requirement_type to accept 'units_completed'. MySQL supports
     * ALTER MODIFY directly; SQLite (the test suite's driver) enforces the
     * original enum() as a CHECK constraint with no way to alter it in
     * place, so there it's swapped for an unconstrained column instead —
     * safe here since no data yet uses the new value.
     */
    private function widenRequirementTypeColumn(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE quests MODIFY requirement_type ENUM('.self::NEW_TYPES.') NOT NULL');

            return;
        }

        Schema::table('quests', function (Blueprint $table) {
            $table->string('requirement_type_new')->nullable()->after('requirement_type');
        });

        DB::statement('UPDATE quests SET requirement_type_new = requirement_type');

        Schema::table('quests', function (Blueprint $table) {
            $table->dropColumn('requirement_type');
        });

        Schema::table('quests', function (Blueprint $table) {
            $table->renameColumn('requirement_type_new', 'requirement_type');
        });
    }
};
