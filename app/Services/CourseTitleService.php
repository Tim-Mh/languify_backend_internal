<?php

namespace App\Services;

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Unit;

/**
 * Resolves the NATIVE-language display title for chapters/units/lessons.
 *
 * Structural titles (e.g. "Unit 1: At the Café", "Lesson 1: Coffee & Tea") are
 * stored per course in that course's own language. A learner sees the course
 * in the language they're LEARNING, but the unit/lesson headings should read in
 * the language they already KNOW (their native language) so they can tell what
 * a unit is about at a glance.
 *
 * Every one of the 6 language courses is structurally identical (same chapters
 * by chapter_key, same number of units/lessons in the same order), so the
 * native-language title for any node is simply the title of the matching node
 * in the learner's native-language course — found by chapter_key + order_number.
 * No translation table needed: each course already holds its titles in its own
 * language. Falls back to the original (learning-language) title if the parallel
 * node can't be found, so a missing sibling never blanks out a heading.
 *
 * Lookups are memoized per request to avoid re-querying the native course for
 * every unit/lesson on a page.
 */
class CourseTitleService
{
    /** @var array<string, array<int, string>> unit titles keyed by "chapterKey|nativeLangId" then order_number */
    private array $unitCache = [];

    /** @var array<string, array<int, string>> lesson titles keyed by "unitId|nativeLangId" then order_number */
    private array $lessonCache = [];

    /**
     * @param  iterable<Unit>  $units  units of $chapter (the learning course)
     * @return array<int, string> native title keyed by unit id
     */
    public function unitTitlesById(Chapter $chapter, iterable $units, int $nativeLanguageId): array
    {
        $byOrder = $this->nativeUnitTitles($chapter, $nativeLanguageId);

        $out = [];
        foreach ($units as $unit) {
            $out[$unit->id] = $byOrder[$unit->order_number] ?? $unit->title;
        }

        return $out;
    }

    public function unitTitle(Unit $unit, int $nativeLanguageId): string
    {
        $unit->loadMissing('chapter');

        if (! $unit->chapter) {
            return $unit->title;
        }

        $byOrder = $this->nativeUnitTitles($unit->chapter, $nativeLanguageId);

        return $byOrder[$unit->order_number] ?? $unit->title;
    }

    /**
     * @param  iterable<Lesson>  $lessons  lessons of $unit (the learning course)
     * @return array<int, string> native title keyed by lesson id
     */
    public function lessonTitlesById(Unit $unit, iterable $lessons, int $nativeLanguageId): array
    {
        $byOrder = $this->nativeLessonTitles($unit, $nativeLanguageId);

        $out = [];
        foreach ($lessons as $lesson) {
            $out[$lesson->id] = $byOrder[$lesson->order_number] ?? $lesson->title;
        }

        return $out;
    }

    public function lessonTitle(Lesson $lesson, int $nativeLanguageId): string
    {
        $lesson->loadMissing('unit');

        if (! $lesson->unit) {
            return $lesson->title;
        }

        $byOrder = $this->nativeLessonTitles($lesson->unit, $nativeLanguageId);

        return $byOrder[$lesson->order_number] ?? $lesson->title;
    }

    /** @return array<int, string> native unit titles keyed by order_number */
    private function nativeUnitTitles(Chapter $chapter, int $nativeLanguageId): array
    {
        $key = $chapter->chapter_key->value.'|'.$nativeLanguageId;

        if (isset($this->unitCache[$key])) {
            return $this->unitCache[$key];
        }

        $nativeChapter = Chapter::where('language_id', $nativeLanguageId)
            ->where('chapter_key', $chapter->chapter_key)
            ->first();

        $titles = $nativeChapter
            ? Unit::where('chapter_id', $nativeChapter->id)->pluck('title', 'order_number')->all()
            : [];

        return $this->unitCache[$key] = $titles;
    }

    /** @return array<int, string> native lesson titles keyed by order_number */
    private function nativeLessonTitles(Unit $unit, int $nativeLanguageId): array
    {
        $key = $unit->id.'|'.$nativeLanguageId;

        if (isset($this->lessonCache[$key])) {
            return $this->lessonCache[$key];
        }

        $unit->loadMissing('chapter');

        $nativeChapter = $unit->chapter
            ? Chapter::where('language_id', $nativeLanguageId)
                ->where('chapter_key', $unit->chapter->chapter_key)
                ->first()
            : null;

        $nativeUnit = $nativeChapter
            ? Unit::where('chapter_id', $nativeChapter->id)
                ->where('order_number', $unit->order_number)
                ->first()
            : null;

        $titles = $nativeUnit
            ? Lesson::where('unit_id', $nativeUnit->id)->pluck('title', 'order_number')->all()
            : [];

        return $this->lessonCache[$key] = $titles;
    }
}
