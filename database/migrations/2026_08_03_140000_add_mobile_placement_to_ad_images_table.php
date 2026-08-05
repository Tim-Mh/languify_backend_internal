<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Adds the mobile lesson-complete placement.
 *
 * The mobile app shows its interstitial full-screen and portrait, so it needs a
 * differently shaped creative from the website's landscape card. Sharing one
 * pool meant one upload had to serve both and was letterboxed on whichever it
 * did not match, so the two get their own pools and their own admin section.
 *
 * `placement` is a MySQL enum, so a new case is a column change rather than
 * just an application-level addition. Raw SQL because Doctrine DBAL does not
 * model enums and `$table->enum(...)->change()` silently drops to a varchar on
 * some driver versions, which would quietly remove the constraint that makes
 * this column trustworthy in the first place.
 */
return new class extends Migration
{
    private const OLD = ['home_primary', 'home_secondary', 'lesson_complete'];

    private const NEW = ['home_primary', 'home_secondary', 'lesson_complete', 'mobile_lesson_complete'];

    public function up(): void
    {
        $this->setEnum(self::NEW);
    }

    public function down(): void
    {
        // Anything already assigned to the mobile pool has nowhere to go once
        // the case is removed, so it falls back to the web equivalent rather
        // than failing the rollback on a constraint violation.
        DB::table('ad_images')
            ->where('placement', 'mobile_lesson_complete')
            ->update(['placement' => 'lesson_complete']);

        $this->setEnum(self::OLD);
    }

    private function setEnum(array $values): void
    {
        $list = collect($values)->map(fn (string $value) => "'".$value."'")->implode(',');

        DB::statement(
            "ALTER TABLE ad_images MODIFY placement ENUM({$list}) NOT NULL DEFAULT 'home_primary'"
        );
    }
};
