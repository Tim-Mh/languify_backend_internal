<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * One row per day a learner was active, for the Activity Calendar.
 *
 * The calendar used to be derived from `user_lesson_completions.completed_at`,
 * but that table holds ONE row per lesson and overwrites `completed_at` on
 * every play. So it could only ever show the last day each lesson was touched:
 * a learner who played the same lesson three days running had a streak of 3 and
 * a single tick on the calendar, because all three plays kept moving the one
 * row's timestamp forward.
 *
 * A day is its own fact, so it gets its own row. Stored as the date in the
 * LEARNER'S timezone, matching `user_game_states.last_lesson_date`, so the
 * calendar and the streak agree on where a day ends without any conversion at
 * read time.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_activity_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('activity_date');
            $table->timestamps();

            // Recording the same day twice is the normal case (every lesson
            // after the first one that day), so the insert is an upsert against
            // this.
            $table->unique(['user_id', 'activity_date']);
        });

        // Backfill what history can still be recovered. `completed_at` only
        // remembers each lesson's most recent play, so this cannot restore days
        // that were already overwritten, but it is strictly better than
        // starting everyone from empty.
        $appTz = config('app.timezone') ?: 'UTC';

        DB::table('user_lesson_completions')
            ->join('users', 'users.id', '=', 'user_lesson_completions.user_id')
            ->whereNotNull('user_lesson_completions.completed_at')
            ->select([
                'user_lesson_completions.user_id',
                'user_lesson_completions.completed_at',
                'users.timezone',
            ])
            ->orderBy('user_lesson_completions.id')
            ->chunk(1000, function ($rows) use ($appTz) {
                $seen = [];

                foreach ($rows as $row) {
                    $tz = $row->timezone ?: $appTz;
                    $date = \Illuminate\Support\Carbon::parse($row->completed_at, 'UTC')
                        ->setTimezone($tz)
                        ->format('Y-m-d');

                    $seen[$row->user_id.'|'.$date] = [
                        'user_id' => $row->user_id,
                        'activity_date' => $date,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if ($seen) {
                    DB::table('user_activity_days')->insertOrIgnore(array_values($seen));
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_activity_days');
    }
};
