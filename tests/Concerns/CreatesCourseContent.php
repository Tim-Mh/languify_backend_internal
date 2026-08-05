<?php

namespace Tests\Concerns;

use App\Models\Chapter;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use App\Models\User;

trait CreatesCourseContent
{
    /**
     * Creates a native+learning language pair, enrolls the given user in the
     * learning language, and returns [Language $native, Language $learning].
     *
     * @return array{0: Language, 1: Language}
     */
    protected function enrollUserInCourse(User $user): array
    {
        $native = Language::create(['code' => 'en', 'name' => 'English', 'native_name' => 'English', 'flag_emoji' => '🇺🇸']);
        $learning = Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);

        $user->forceFill([
            'native_language_id' => $native->id,
            'learning_language_id' => $learning->id,
            'proficiency_level' => 'beginner',
        ])->save();

        return [$native, $learning];
    }

    /**
     * Creates a single chapter with a single unit containing $lessonCount lessons,
     * for the given language.
     *
     * @return array{chapter: Chapter, unit: Unit, lessons: \Illuminate\Support\Collection<int, Lesson>}
     */
    protected function createChapterWithLessons(Language $language, int $lessonCount = 2): array
    {
        $chapter = Chapter::create([
            'language_id' => $language->id,
            'chapter_key' => 'beginner',
            'title' => 'Beginner',
            'order_number' => 1,
        ]);

        $unit = Unit::create([
            'chapter_id' => $chapter->id,
            'title' => 'Unit 1',
            'order_number' => 1,
        ]);

        $lessons = collect(range(1, $lessonCount))->map(fn ($i) => Lesson::create([
            'unit_id' => $unit->id,
            'title' => "Lesson {$i}",
            'order_number' => $i,
        ]));

        return ['chapter' => $chapter, 'unit' => $unit, 'lessons' => $lessons];
    }
}
