<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Enums\ExerciseType;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class EnglishBeginnerContentSeeder extends Seeder
{
    /**
     * Seed a starter content set: English (learning) language, the Beginner
     * chapter, 1 unit, 2 lessons, 5 exercises each.
     */
    public function run(): void
    {
        // `is_active` is left to the column default (false) — an admin
        // publishes the language from /admin/language-activation.
        $english = Language::firstOrCreate(
            ['code' => 'en'],
            ['name' => 'English', 'native_name' => 'English', 'flag_emoji' => '🇺🇸']
        );

        $chapter = Chapter::firstOrCreate(
            ['language_id' => $english->id, 'chapter_key' => ChapterKey::Beginner],
            ['title' => 'Beginner', 'order_number' => 1]
        );

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 1: Greetings & Basics'],
            ['order_number' => 1]
        );

        $lesson1 = Lesson::firstOrCreate(
            ['unit_id' => $unit->id, 'title' => 'Lesson 1: Everyday Words'],
            ['order_number' => 1]
        );

        $lesson2 = Lesson::firstOrCreate(
            ['unit_id' => $unit->id, 'title' => 'Lesson 2: Simple Sentences'],
            ['order_number' => 2]
        );

        $this->seedLesson1Exercises($lesson1);
        $this->seedLesson2Exercises($lesson2);
    }

    private function seedLesson1Exercises(Lesson $lesson): void
    {
        $exercises = [
            [
                'type' => ExerciseType::MatchPairs,
                'data' => [
                    'word' => 'Coffee',
                    'options' => [
                        ['text' => 'Coffee', 'image' => '/images/exercises/coffee.png'],
                        ['text' => 'Sugar', 'image' => '/images/exercises/sugar.png'],
                        ['text' => 'Milk', 'image' => '/images/exercises/milk.png'],
                        ['text' => 'Tea', 'image' => '/images/exercises/tea.png'],
                    ],
                    'correct_answer' => 'Coffee',
                ],
            ],
            [
                'type' => ExerciseType::FillBlank,
                'data' => [
                    'sentence' => 'Give me tea ____!',
                    'options' => ['please', 'or', 'with', 'by'],
                    'correct_answer' => 'please',
                ],
            ],
            [
                'type' => ExerciseType::TapWord,
                'data' => [
                    'target_sentence' => 'I have a dog',
                    'words' => ['dog', 'I', 'a', 'have'],
                    'correct_order' => ['I', 'have', 'a', 'dog'],
                ],
            ],
            [
                'type' => ExerciseType::ListenSelect,
                'data' => [
                    'audio_text' => 'Milk',
                    'audio_url' => '/audio/exercises/milk.mp3',
                    'options' => ['Milk', 'Sugar', 'Coffee', 'Tea'],
                    'correct_answer' => 'Milk',
                ],
            ],
            [
                'type' => ExerciseType::MultipleChoice,
                'data' => [
                    'question' => 'What does "Hello" mean?',
                    'options' => ['Greeting', 'Goodbye', 'Thanks', 'Sorry'],
                    'correct_answer' => 'Greeting',
                ],
            ],
        ];

        $this->createExercises($lesson, $exercises);
    }

    private function seedLesson2Exercises(Lesson $lesson): void
    {
        $exercises = [
            [
                'type' => ExerciseType::MatchPairs,
                'data' => [
                    'word' => 'Book',
                    'options' => [
                        ['text' => 'Book', 'image' => '/images/exercises/book.png'],
                        ['text' => 'Pen', 'image' => '/images/exercises/pen.png'],
                        ['text' => 'Chair', 'image' => '/images/exercises/chair.png'],
                        ['text' => 'Table', 'image' => '/images/exercises/table.png'],
                    ],
                    'correct_answer' => 'Book',
                ],
            ],
            [
                'type' => ExerciseType::FillBlank,
                'data' => [
                    'sentence' => 'She is ____ a book.',
                    'options' => ['reading', 'read', 'reads', 'to read'],
                    'correct_answer' => 'reading',
                ],
            ],
            [
                'type' => ExerciseType::TapWord,
                'data' => [
                    'target_sentence' => 'She likes tea',
                    'words' => ['tea', 'She', 'likes'],
                    'correct_order' => ['She', 'likes', 'tea'],
                ],
            ],
            [
                'type' => ExerciseType::ListenSelect,
                'data' => [
                    'audio_text' => 'Chair',
                    'audio_url' => '/audio/exercises/chair.mp3',
                    'options' => ['Chair', 'Table', 'Book', 'Pen'],
                    'correct_answer' => 'Chair',
                ],
            ],
            [
                'type' => ExerciseType::MultipleChoice,
                'data' => [
                    'question' => 'What does "Goodbye" mean?',
                    'options' => ['Farewell greeting', 'Morning greeting', 'Thanks', 'Sorry'],
                    'correct_answer' => 'Farewell greeting',
                ],
            ],
        ];

        $this->createExercises($lesson, $exercises);
    }

    private function createExercises(Lesson $lesson, array $exercises): void
    {
        foreach ($exercises as $index => $exercise) {
            Exercise::updateOrCreate(
                ['lesson_id' => $lesson->id, 'order_number' => $index + 1],
                ['type' => $exercise['type'], 'data' => $exercise['data']]
            );
        }
    }
}
