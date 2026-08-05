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

/**
 * TRANSLATION TEMPLATE — full English "Beginner" chapter
 * (10 units, 48 lessons, 282 exercises), generated from the
 * live database. To create this chapter for a new learning language:
 *
 *   1. Copy this file to a new seeder (e.g. JapaneseBeginnerFullSeeder.php).
 *   2. Change the class name and LANGUAGE_CODE constant below to the new
 *      language's code (it must already exist in the `languages` table).
 *   3. Translate every string value inside units() into the target
 *      language — word/sentence/options/target_sentence/words/
 *      correct_order/audio_text/question/correct_answer. Leave lesson
 *      titles, "type", and array keys unchanged (they are structural,
 *      not learner-facing content).
 *   4. Run: php artisan db:seed --class=<YourNewClassName>
 *
 * Safe to re-run (idempotent firstOrCreate/updateOrCreate throughout).
 */
class EnglishBeginnerFullSeeder extends Seeder
{
    private const LANGUAGE_CODE = 'en';

    public function run(): void
    {
        $language = Language::where('code', self::LANGUAGE_CODE)->firstOrFail();

        $chapter = Chapter::firstOrCreate(
            ['language_id' => $language->id, 'chapter_key' => ChapterKey::Beginner],
            ['title' => 'Beginner', 'order_number' => 1]
        );

        foreach ($this->units() as $unitData) {
            $unit = Unit::firstOrCreate(
                ['chapter_id' => $chapter->id, 'title' => $unitData['title']],
                ['order_number' => $unitData['order']]
            );

            foreach ($unitData['lessons'] as $lessonData) {
                $lesson = Lesson::firstOrCreate(
                    ['unit_id' => $unit->id, 'title' => $lessonData['title']],
                    ['order_number' => $lessonData['order']]
                );

                foreach ($lessonData['exercises'] as $index => $exerciseData) {
                    Exercise::updateOrCreate(
                        ['lesson_id' => $lesson->id, 'order_number' => $index + 1],
                        ['type' => ExerciseType::from($exerciseData['type']), 'data' => $exerciseData['data']]
                    );
                }
            }
        }
    }

    private function units(): array
    {
        return [
            [
                'title' => 'Unit 1: Greetings & Basics',
                'order' => 1,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Everyday Words',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Coffee',
                                    'options' => [
                                        [
                                            'text' => 'Coffee',
                                            'image' => '/images/exercises/coffee.png',
                                        ],
                                        [
                                            'text' => 'Sugar',
                                            'image' => '/images/exercises/sugar.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Tea',
                                            'image' => '/images/exercises/tea.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Coffee',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'please',
                                        'or',
                                        'with',
                                        'by',
                                    ],
                                    'sentence' => 'Give me tea ____!',
                                    'correct_answer' => 'please',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'dog',
                                        'I',
                                        'a',
                                        'have',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'a',
                                        'dog',
                                    ],
                                    'target_sentence' => 'I have a dog',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Milk',
                                        'Sugar',
                                        'Coffee',
                                        'Tea',
                                    ],
                                    'audio_url' => '/audio/exercises/milk.mp3',
                                    'audio_text' => 'Milk',
                                    'correct_answer' => 'Milk',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'Hello',
                                    'options' => [
                                        'Greeting',
                                        'Goodbye',
                                        'Thanks',
                                        'Sorry',
                                    ],
                                    'correct_answer' => 'Greeting',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Simple Sentences',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Book',
                                    'options' => [
                                        [
                                            'text' => 'Book',
                                            'image' => '/images/exercises/book.png',
                                        ],
                                        [
                                            'text' => 'Pen',
                                            'image' => '/images/exercises/pen.png',
                                        ],
                                        [
                                            'text' => 'Chair',
                                            'image' => '/images/exercises/chair.png',
                                        ],
                                        [
                                            'text' => 'Table',
                                            'image' => '/images/exercises/table.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Book',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'reading',
                                        'read',
                                        'reads',
                                        'to read',
                                    ],
                                    'sentence' => 'She is ____ a book.',
                                    'correct_answer' => 'reading',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'tea',
                                        'She',
                                        'likes',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'likes',
                                        'tea',
                                    ],
                                    'target_sentence' => 'She likes tea',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Chair',
                                        'Table',
                                        'Book',
                                        'Pen',
                                    ],
                                    'audio_url' => '/audio/exercises/chair.mp3',
                                    'audio_text' => 'Chair',
                                    'correct_answer' => 'Chair',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'Goodbye',
                                    'options' => [
                                        'Farewell greeting',
                                        'Morning greeting',
                                        'Thanks',
                                        'Sorry',
                                    ],
                                    'correct_answer' => 'Farewell greeting',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 2: Numbers & Colors',
                'order' => 2,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Counting Basics',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Red',
                                    'options' => [
                                        [
                                            'text' => 'Red',
                                            'image' => '/images/exercises/red.png',
                                        ],
                                        [
                                            'text' => 'Blue',
                                            'image' => '/images/exercises/blue.png',
                                        ],
                                        [
                                            'text' => 'Green',
                                            'image' => '/images/exercises/green.png',
                                        ],
                                        [
                                            'text' => 'Yellow',
                                            'image' => '/images/exercises/yellow.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Red',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'three',
                                        'third',
                                        'threes',
                                        'tree',
                                    ],
                                    'sentence' => 'I have ____ apples.',
                                    'correct_answer' => 'three',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cats',
                                        'I',
                                        'two',
                                        'have',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'two',
                                        'cats',
                                    ],
                                    'target_sentence' => 'I have two cats',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Blue',
                                        'Red',
                                        'Green',
                                        'Yellow',
                                    ],
                                    'audio_url' => '/audio/exercises/blue.mp3',
                                    'audio_text' => 'Blue',
                                    'correct_answer' => 'Blue',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'five',
                                    'options' => [
                                        'The number 5',
                                        'The number 4',
                                        'A color',
                                        'A fruit',
                                    ],
                                    'correct_answer' => 'The number 5',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Shapes & Colors',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Green',
                                    'options' => [
                                        [
                                            'text' => 'Green',
                                            'image' => '/images/exercises/green.png',
                                        ],
                                        [
                                            'text' => 'Red',
                                            'image' => '/images/exercises/red.png',
                                        ],
                                        [
                                            'text' => 'Black',
                                            'image' => '/images/exercises/black.png',
                                        ],
                                        [
                                            'text' => 'White',
                                            'image' => '/images/exercises/white.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Green',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'blue',
                                        'blues',
                                        'blueing',
                                        'blued',
                                    ],
                                    'sentence' => 'The sky is ____.',
                                    'correct_answer' => 'blue',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'circle',
                                        'This',
                                        'big',
                                        'is',
                                        'a',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'is',
                                        'a',
                                        'big',
                                        'circle',
                                    ],
                                    'target_sentence' => 'This is a big circle',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Yellow',
                                        'Purple',
                                        'Orange',
                                        'Pink',
                                    ],
                                    'audio_url' => '/audio/exercises/yellow.mp3',
                                    'audio_text' => 'Yellow',
                                    'correct_answer' => 'Yellow',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'black',
                                    'options' => [
                                        'A dark color',
                                        'A number',
                                        'A shape',
                                        'A fruit',
                                    ],
                                    'correct_answer' => 'A dark color',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 3: Family & People',
                'order' => 3,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Family Members',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Mother',
                                    'options' => [
                                        [
                                            'text' => 'Mother',
                                            'image' => '/images/exercises/mother.png',
                                        ],
                                        [
                                            'text' => 'Father',
                                            'image' => '/images/exercises/father.png',
                                        ],
                                        [
                                            'text' => 'Sister',
                                            'image' => '/images/exercises/sister.png',
                                        ],
                                        [
                                            'text' => 'Brother',
                                            'image' => '/images/exercises/brother.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Mother',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'father',
                                        'fathers',
                                        'fathering',
                                        'fathered',
                                    ],
                                    'sentence' => 'This is my ____.',
                                    'correct_answer' => 'father',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'sister',
                                        'She',
                                        'my',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'is',
                                        'my',
                                        'sister',
                                    ],
                                    'target_sentence' => 'She is my sister',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Brother',
                                        'Sister',
                                        'Mother',
                                        'Father',
                                    ],
                                    'audio_url' => '/audio/exercises/brother.mp3',
                                    'audio_text' => 'Brother',
                                    'correct_answer' => 'Brother',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'family',
                                    'options' => [
                                        'A group of related people',
                                        'A type of food',
                                        'A color',
                                        'A number',
                                    ],
                                    'correct_answer' => 'A group of related people',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: People Around Us',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Friend',
                                    'options' => [
                                        [
                                            'text' => 'Friend',
                                            'image' => '/images/exercises/friend.png',
                                        ],
                                        [
                                            'text' => 'Teacher',
                                            'image' => '/images/exercises/teacher.png',
                                        ],
                                        [
                                            'text' => 'Doctor',
                                            'image' => '/images/exercises/doctor.png',
                                        ],
                                        [
                                            'text' => 'Neighbor',
                                            'image' => '/images/exercises/neighbor.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Friend',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'friend',
                                        'friends',
                                        'friending',
                                        'friended',
                                    ],
                                    'sentence' => 'He is my best ____.',
                                    'correct_answer' => 'friend',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'kind',
                                        'My',
                                        'teacher',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'teacher',
                                        'is',
                                        'kind',
                                    ],
                                    'target_sentence' => 'My teacher is kind',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Doctor',
                                        'Teacher',
                                        'Friend',
                                        'Neighbor',
                                    ],
                                    'audio_url' => '/audio/exercises/doctor.mp3',
                                    'audio_text' => 'Doctor',
                                    'correct_answer' => 'Doctor',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'neighbor',
                                    'options' => [
                                        'Someone who lives near you',
                                        'A type of food',
                                        'A number',
                                        'A color',
                                    ],
                                    'correct_answer' => 'Someone who lives near you',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 4: Days & Time',
                'order' => 4,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Days of the Week',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Monday',
                                    'options' => [
                                        [
                                            'text' => 'Monday',
                                            'image' => '/images/exercises/monday.png',
                                        ],
                                        [
                                            'text' => 'Tuesday',
                                            'image' => '/images/exercises/tuesday.png',
                                        ],
                                        [
                                            'text' => 'Wednesday',
                                            'image' => '/images/exercises/wednesday.png',
                                        ],
                                        [
                                            'text' => 'Thursday',
                                            'image' => '/images/exercises/thursday.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Monday',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Monday',
                                        'Tuesday',
                                        'Saturday',
                                        'Friday',
                                    ],
                                    'sentence' => 'The day after Sunday is ____.',
                                    'correct_answer' => 'Monday',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'the',
                                        'week',
                                        'Monday',
                                        'first',
                                        'is',
                                        'of',
                                        'the',
                                        'day',
                                    ],
                                    'correct_order' => [
                                        'Monday',
                                        'is',
                                        'the',
                                        'first',
                                        'day',
                                        'of',
                                        'the',
                                        'week',
                                    ],
                                    'target_sentence' => 'Monday is the first day of the week',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Saturday',
                                        'Sunday',
                                        'Monday',
                                        'Thursday',
                                    ],
                                    'audio_url' => '/audio/exercises/saturday.mp3',
                                    'audio_text' => 'Saturday',
                                    'correct_answer' => 'Saturday',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Tuesday',
                                        'Thursday',
                                        'Monday',
                                        'Friday',
                                    ],
                                    'question' => 'Which day comes before Wednesday?',
                                    'correct_answer' => 'Tuesday',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'weekdays',
                                        'weekday',
                                        'weekending',
                                        'weekly',
                                    ],
                                    'sentence' => 'We go to school on ____.',
                                    'correct_answer' => 'weekdays',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Months of the Year',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'January',
                                    'options' => [
                                        [
                                            'text' => 'January',
                                            'image' => '/images/exercises/january.png',
                                        ],
                                        [
                                            'text' => 'February',
                                            'image' => '/images/exercises/february.png',
                                        ],
                                        [
                                            'text' => 'March',
                                            'image' => '/images/exercises/march.png',
                                        ],
                                        [
                                            'text' => 'April',
                                            'image' => '/images/exercises/april.png',
                                        ],
                                    ],
                                    'correct_answer' => 'January',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'January',
                                        'December',
                                        'June',
                                        'March',
                                    ],
                                    'sentence' => 'The first month of the year is ____.',
                                    'correct_answer' => 'January',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'year',
                                        'the',
                                        'December',
                                        'of',
                                        'last',
                                        'is',
                                        'the',
                                        'month',
                                    ],
                                    'correct_order' => [
                                        'December',
                                        'is',
                                        'the',
                                        'last',
                                        'month',
                                        'of',
                                        'the',
                                        'year',
                                    ],
                                    'target_sentence' => 'December is the last month of the year',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'September',
                                        'October',
                                        'November',
                                        'August',
                                    ],
                                    'audio_url' => '/audio/exercises/september.mp3',
                                    'audio_text' => 'September',
                                    'correct_answer' => 'September',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Twelve',
                                        'Ten',
                                        'Seven',
                                        'Fifty-two',
                                    ],
                                    'question' => 'How many months are there in a year?',
                                    'correct_answer' => 'Twelve',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'July',
                                        'May',
                                        'August',
                                        'September',
                                    ],
                                    'question' => 'Which month comes after June?',
                                    'correct_answer' => 'July',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Telling Time',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Clock',
                                    'options' => [
                                        [
                                            'text' => 'Clock',
                                            'image' => '/images/exercises/clock.png',
                                        ],
                                        [
                                            'text' => 'Watch',
                                            'image' => '/images/exercises/watch.png',
                                        ],
                                        [
                                            'text' => 'Calendar',
                                            'image' => '/images/exercises/calendar.png',
                                        ],
                                        [
                                            'text' => 'Alarm',
                                            'image' => '/images/exercises/alarm.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Clock',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'o\'clock',
                                        'oclock',
                                        'o clocks',
                                        'o\'clocks',
                                    ],
                                    'sentence' => 'It is three ____.',
                                    'correct_answer' => 'o\'clock',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'seven',
                                        'It',
                                        'past',
                                        'is',
                                        'half',
                                    ],
                                    'correct_order' => [
                                        'It',
                                        'is',
                                        'half',
                                        'past',
                                        'seven',
                                    ],
                                    'target_sentence' => 'It is half past seven',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is a quarter to five',
                                        'It is a quarter past five',
                                        'It is half past five',
                                        'It is five o\'clock',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-a-quarter-to-five.mp3',
                                    'audio_text' => 'It is a quarter to five',
                                    'correct_answer' => 'It is a quarter to five',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Half past six',
                                        'Quarter past six',
                                        'Six o\'clock',
                                        'Quarter to six',
                                    ],
                                    'question' => 'What time is 6:30?',
                                    'correct_answer' => 'Half past six',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'now',
                                        'What',
                                        'is',
                                        'time',
                                        'it',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'time',
                                        'is',
                                        'it',
                                        'now',
                                    ],
                                    'target_sentence' => 'What time is it now',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking and Answering "When" Questions',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'When',
                                    'options' => [
                                        [
                                            'text' => 'When',
                                            'image' => '/images/exercises/when.png',
                                        ],
                                        [
                                            'text' => 'Where',
                                            'image' => '/images/exercises/where.png',
                                        ],
                                        [
                                            'text' => 'Who',
                                            'image' => '/images/exercises/who.png',
                                        ],
                                        [
                                            'text' => 'Why',
                                            'image' => '/images/exercises/why.png',
                                        ],
                                    ],
                                    'correct_answer' => 'When',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'When',
                                        'What',
                                        'Who',
                                        'Whose',
                                    ],
                                    'sentence' => '____ does the movie start?',
                                    'correct_answer' => 'When',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'up',
                                        'When',
                                        'wake',
                                        'do',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'When',
                                        'do',
                                        'you',
                                        'wake',
                                        'up',
                                    ],
                                    'target_sentence' => 'When do you wake up',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The train leaves at nine o\'clock',
                                        'The train leaves at nine dollars',
                                        'The train leaves in nine days',
                                        'The train leaves nine kilometers',
                                    ],
                                    'audio_url' => '/audio/exercises/the-train-leaves-at-nine-oclock.mp3',
                                    'audio_text' => 'The train leaves at nine o\'clock',
                                    'correct_answer' => 'The train leaves at nine o\'clock',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'In July',
                                        'At the park',
                                        'Because I am happy',
                                        'With my friends',
                                    ],
                                    'question' => 'When is your birthday?',
                                    'correct_answer' => 'In July',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I usually have lunch at noon',
                                        'I usually have lunch at night',
                                        'I usually have breakfast at noon',
                                        'I never have lunch',
                                    ],
                                    'audio_url' => '/audio/exercises/i-usually-have-lunch-at-noon.mp3',
                                    'audio_text' => 'I usually have lunch at noon',
                                    'correct_answer' => 'I usually have lunch at noon',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Prepositions of Time (in, on, at)',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'At',
                                    'options' => [
                                        [
                                            'text' => 'At',
                                            'image' => '/images/exercises/at.png',
                                        ],
                                        [
                                            'text' => 'On',
                                            'image' => '/images/exercises/on.png',
                                        ],
                                        [
                                            'text' => 'In',
                                            'image' => '/images/exercises/in.png',
                                        ],
                                        [
                                            'text' => 'By',
                                            'image' => '/images/exercises/by.png',
                                        ],
                                    ],
                                    'correct_answer' => 'At',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'on',
                                        'in',
                                        'at',
                                        'to',
                                    ],
                                    'sentence' => 'The meeting is ____ Monday.',
                                    'correct_answer' => 'on',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'morning',
                                        'School',
                                        'in',
                                        'at',
                                        'starts',
                                        'the',
                                        'eight',
                                    ],
                                    'correct_order' => [
                                        'School',
                                        'starts',
                                        'at',
                                        'eight',
                                        'in',
                                        'the',
                                        'morning',
                                    ],
                                    'target_sentence' => 'School starts at eight in the morning',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I was born in March',
                                        'I was born on March',
                                        'I was born at March',
                                        'I was born by March',
                                    ],
                                    'audio_url' => '/audio/exercises/i-was-born-in-march.mp3',
                                    'audio_text' => 'I was born in March',
                                    'correct_answer' => 'I was born in March',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'at',
                                        'on',
                                        'in',
                                        'to',
                                    ],
                                    'question' => 'Which preposition goes with a clock time, like "5 o\'clock"?',
                                    'correct_answer' => 'at',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'In',
                                    'options' => [
                                        [
                                            'text' => 'In',
                                            'image' => '/images/exercises/in.png',
                                        ],
                                        [
                                            'text' => 'On',
                                            'image' => '/images/exercises/on.png',
                                        ],
                                        [
                                            'text' => 'At',
                                            'image' => '/images/exercises/at.png',
                                        ],
                                        [
                                            'text' => 'For',
                                            'image' => '/images/exercises/for.png',
                                        ],
                                    ],
                                    'correct_answer' => 'In',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Ordinal Numbers & Dates',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'First',
                                    'options' => [
                                        [
                                            'text' => 'First',
                                            'image' => '/images/exercises/first.png',
                                        ],
                                        [
                                            'text' => 'Second',
                                            'image' => '/images/exercises/second.png',
                                        ],
                                        [
                                            'text' => 'Third',
                                            'image' => '/images/exercises/third.png',
                                        ],
                                        [
                                            'text' => 'Fourth',
                                            'image' => '/images/exercises/fourth.png',
                                        ],
                                    ],
                                    'correct_answer' => 'First',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'fifth',
                                        'five',
                                        'fiveth',
                                        'fives',
                                    ],
                                    'sentence' => 'Today is the ____ of May.',
                                    'correct_answer' => 'fifth',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'June',
                                        'My',
                                        'of',
                                        'is',
                                        'tenth',
                                        'birthday',
                                        'on',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'birthday',
                                        'is',
                                        'on',
                                        'the',
                                        'tenth',
                                        'of',
                                        'June',
                                    ],
                                    'target_sentence' => 'My birthday is on the tenth of June',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The third of April',
                                        'The three of April',
                                        'The third on April',
                                        'The third at April',
                                    ],
                                    'audio_url' => '/audio/exercises/the-third-of-april.mp3',
                                    'audio_text' => 'The third of April',
                                    'correct_answer' => 'The third of April',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        '2nd',
                                        '2th',
                                        '2rd',
                                        '2st',
                                    ],
                                    'question' => 'How do you write the ordinal number for 2?',
                                    'correct_answer' => '2nd',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'first',
                                        'one',
                                        'oneth',
                                        'ones',
                                    ],
                                    'sentence' => 'We celebrate New Year on the ____ of January.',
                                    'correct_answer' => 'first',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 5: Common Verbs (Present Tense)',
                'order' => 5,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Present Simple with I, You, We, They',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Eat',
                                    'options' => [
                                        [
                                            'text' => 'Eat',
                                            'image' => '/images/exercises/eat.png',
                                        ],
                                        [
                                            'text' => 'Sleep',
                                            'image' => '/images/exercises/sleep.png',
                                        ],
                                        [
                                            'text' => 'Run',
                                            'image' => '/images/exercises/run.png',
                                        ],
                                        [
                                            'text' => 'Read',
                                            'image' => '/images/exercises/read.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Eat',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'eat',
                                        'eats',
                                        'eating',
                                        'ate',
                                    ],
                                    'sentence' => 'I ____ breakfast every morning.',
                                    'correct_answer' => 'eat',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'football',
                                        'They',
                                        'on',
                                        'play',
                                        'weekends',
                                    ],
                                    'correct_order' => [
                                        'They',
                                        'play',
                                        'football',
                                        'on',
                                        'weekends',
                                    ],
                                    'target_sentence' => 'They play football on weekends',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We walk to school every day',
                                        'We walked to school yesterday',
                                        'She walks to school every day',
                                        'He is walking to school',
                                    ],
                                    'audio_url' => '/audio/exercises/we-walk-to-school-every-day.mp3',
                                    'audio_text' => 'We walk to school every day',
                                    'correct_answer' => 'We walk to school every day',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I read books.',
                                        'I reads books.',
                                        'I reading books.',
                                        'I readed books.',
                                    ],
                                    'question' => 'Which sentence is correct for "I"?',
                                    'correct_answer' => 'I read books.',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Drink',
                                    'options' => [
                                        [
                                            'text' => 'Drink',
                                            'image' => '/images/exercises/drink.png',
                                        ],
                                        [
                                            'text' => 'Eat',
                                            'image' => '/images/exercises/eat.png',
                                        ],
                                        [
                                            'text' => 'Sleep',
                                            'image' => '/images/exercises/sleep.png',
                                        ],
                                        [
                                            'text' => 'Write',
                                            'image' => '/images/exercises/write.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Drink',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Present Simple with He, She, It (-s Ending)',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Works',
                                    'options' => [
                                        [
                                            'text' => 'Works',
                                            'image' => '/images/exercises/works.png',
                                        ],
                                        [
                                            'text' => 'Work',
                                            'image' => '/images/exercises/work.png',
                                        ],
                                        [
                                            'text' => 'Working',
                                            'image' => '/images/exercises/working.png',
                                        ],
                                        [
                                            'text' => 'Worked',
                                            'image' => '/images/exercises/worked.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Works',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'goes',
                                        'go',
                                        'going',
                                        'went',
                                    ],
                                    'sentence' => 'She ____ to the market every Friday.',
                                    'correct_answer' => 'goes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'TV',
                                        'He',
                                        'the',
                                        'in',
                                        'watches',
                                        'evening',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'watches',
                                        'TV',
                                        'in',
                                        'the',
                                        'evening',
                                    ],
                                    'target_sentence' => 'He watches TV in the evening',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'My brother studies English at night',
                                        'My brother study English at night',
                                        'My brothers studies English at night',
                                        'My brother studying English at night',
                                    ],
                                    'audio_url' => '/audio/exercises/my-brother-studies-english-at-night.mp3',
                                    'audio_text' => 'My brother studies English at night',
                                    'correct_answer' => 'My brother studies English at night',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'It runs fast.',
                                        'It run fast.',
                                        'It running fast.',
                                        'It ran fast.',
                                    ],
                                    'question' => 'Which verb form matches "It"?',
                                    'correct_answer' => 'It runs fast.',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'piano',
                                        'She',
                                        'the',
                                        'plays',
                                        'well',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'plays',
                                        'the',
                                        'piano',
                                        'well',
                                    ],
                                    'target_sentence' => 'She plays the piano well',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Present Continuous - Actions Happening Now',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Running',
                                    'options' => [
                                        [
                                            'text' => 'Running',
                                            'image' => '/images/exercises/running.png',
                                        ],
                                        [
                                            'text' => 'Runs',
                                            'image' => '/images/exercises/runs.png',
                                        ],
                                        [
                                            'text' => 'Ran',
                                            'image' => '/images/exercises/ran.png',
                                        ],
                                        [
                                            'text' => 'Run',
                                            'image' => '/images/exercises/run.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Running',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'am',
                                        'is',
                                        'are',
                                        'be',
                                    ],
                                    'sentence' => 'I ____ eating dinner right now.',
                                    'correct_answer' => 'am',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'book',
                                        'She',
                                        'a',
                                        'is',
                                        'reading',
                                        'now',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'is',
                                        'reading',
                                        'a',
                                        'book',
                                        'now',
                                    ],
                                    'target_sentence' => 'She is reading a book now',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'They are playing football now',
                                        'They play football every day',
                                        'He is playing football now',
                                        'She plays football now',
                                    ],
                                    'audio_url' => '/audio/exercises/they-are-playing-football-now.mp3',
                                    'audio_text' => 'They are playing football now',
                                    'correct_answer' => 'They are playing football now',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'We are cooking dinner.',
                                        'We cook dinner every day.',
                                        'We cooked dinner yesterday.',
                                        'We cook dinner.',
                                    ],
                                    'question' => 'Which sentence describes an action happening right now?',
                                    'correct_answer' => 'We are cooking dinner.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'is writing',
                                        'writes',
                                        'write',
                                        'wrote',
                                    ],
                                    'question' => 'What is the correct form: "He ____ a letter now."',
                                    'correct_answer' => 'is writing',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Everyday Action Verbs and Daily Routines',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cook',
                                    'options' => [
                                        [
                                            'text' => 'Cook',
                                            'image' => '/images/exercises/cook.png',
                                        ],
                                        [
                                            'text' => 'Clean',
                                            'image' => '/images/exercises/clean.png',
                                        ],
                                        [
                                            'text' => 'Drive',
                                            'image' => '/images/exercises/drive.png',
                                        ],
                                        [
                                            'text' => 'Brush',
                                            'image' => '/images/exercises/brush.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cook',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'brushes',
                                        'brush',
                                        'brushing',
                                        'brushed',
                                    ],
                                    'sentence' => 'He ____ his teeth twice a day.',
                                    'correct_answer' => 'brushes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'early',
                                        'I',
                                        'up',
                                        'wake',
                                        'every',
                                        'morning',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'wake',
                                        'up',
                                        'early',
                                        'every',
                                        'morning',
                                    ],
                                    'target_sentence' => 'I wake up early every morning',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'She cleans her room on Sundays',
                                        'She clean her room on Sundays',
                                        'She is cleaning her room now',
                                        'She cleaned her room yesterday',
                                    ],
                                    'audio_url' => '/audio/exercises/she-cleans-her-room-on-sundays.mp3',
                                    'audio_text' => 'She cleans her room on Sundays',
                                    'correct_answer' => 'She cleans her room on Sundays',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'drive',
                                    'options' => [
                                        'To operate a car',
                                        'To cook food',
                                        'To clean a house',
                                        'To wash clothes',
                                    ],
                                    'correct_answer' => 'To operate a car',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Wake up',
                                    'options' => [
                                        [
                                            'text' => 'Wake up',
                                            'image' => '/images/exercises/wake-up.png',
                                        ],
                                        [
                                            'text' => 'Sleep',
                                            'image' => '/images/exercises/sleep.png',
                                        ],
                                        [
                                            'text' => 'Cook',
                                            'image' => '/images/exercises/cook.png',
                                        ],
                                        [
                                            'text' => 'Drive',
                                            'image' => '/images/exercises/drive.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Wake up',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Present Simple vs Present Continuous',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Always',
                                    'options' => [
                                        [
                                            'text' => 'Always',
                                            'image' => '/images/exercises/always.png',
                                        ],
                                        [
                                            'text' => 'Now',
                                            'image' => '/images/exercises/now.png',
                                        ],
                                        [
                                            'text' => 'Yesterday',
                                            'image' => '/images/exercises/yesterday.png',
                                        ],
                                        [
                                            'text' => 'Tomorrow',
                                            'image' => '/images/exercises/tomorrow.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Always',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'drink',
                                        'am drinking',
                                        'drinks',
                                        'drank',
                                    ],
                                    'sentence' => 'I usually ____ coffee, but right now I am drinking tea.',
                                    'correct_answer' => 'drink',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'driving',
                                        'He',
                                        'usually',
                                        'walks',
                                        'but',
                                        'today',
                                        'is',
                                        'he',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'usually',
                                        'walks',
                                        'but',
                                        'today',
                                        'he',
                                        'is',
                                        'driving',
                                    ],
                                    'target_sentence' => 'He usually walks but today he is driving',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Look, it is raining outside',
                                        'It rains every winter',
                                        'It rained yesterday',
                                        'It will rain tomorrow',
                                    ],
                                    'audio_url' => '/audio/exercises/look-it-is-raining-outside.mp3',
                                    'audio_text' => 'Look, it is raining outside',
                                    'correct_answer' => 'Look, it is raining outside',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I go to the gym every Monday.',
                                        'I am going to the gym now.',
                                        'I am going to the gym.',
                                        'I went to the gym.',
                                    ],
                                    'question' => 'Which sentence describes a habit?',
                                    'correct_answer' => 'I go to the gym every Monday.',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We usually eat dinner at eight',
                                        'We are eating dinner now',
                                        'We ate dinner at eight',
                                        'We will eat dinner at eight',
                                    ],
                                    'audio_url' => '/audio/exercises/we-usually-eat-dinner-at-eight.mp3',
                                    'audio_text' => 'We usually eat dinner at eight',
                                    'correct_answer' => 'We usually eat dinner at eight',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Negative and Question Forms in Present Tenses',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Doesn\'t',
                                    'options' => [
                                        [
                                            'text' => 'Doesn\'t',
                                            'image' => '/images/exercises/doesnt.png',
                                        ],
                                        [
                                            'text' => 'Don\'t',
                                            'image' => '/images/exercises/dont.png',
                                        ],
                                        [
                                            'text' => 'Isn\'t',
                                            'image' => '/images/exercises/isnt.png',
                                        ],
                                        [
                                            'text' => 'Aren\'t',
                                            'image' => '/images/exercises/arent.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Doesn\'t',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'doesn\'t',
                                        'don\'t',
                                        'isn\'t',
                                        'aren\'t',
                                    ],
                                    'sentence' => 'She ____ like coffee.',
                                    'correct_answer' => 'doesn\'t',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'tennis',
                                        'Do',
                                        'you',
                                        'play',
                                    ],
                                    'correct_order' => [
                                        'Do',
                                        'you',
                                        'play',
                                        'tennis',
                                    ],
                                    'target_sentence' => 'Do you play tennis',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Does he work on Sundays?',
                                        'Do he works on Sundays?',
                                        'Is he working on Sundays?',
                                        'Did he work on Sundays?',
                                    ],
                                    'audio_url' => '/audio/exercises/does-he-work-on-sundays.mp3',
                                    'audio_text' => 'Does he work on Sundays?',
                                    'correct_answer' => 'Does he work on Sundays?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I don\'t like tea.',
                                        'I doesn\'t like tea.',
                                        'I not like tea.',
                                        'I isn\'t like tea.',
                                    ],
                                    'question' => 'Which is the correct negative form?',
                                    'correct_answer' => 'I don\'t like tea.',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Do',
                                        'Does',
                                        'Is',
                                        'Are',
                                    ],
                                    'sentence' => '____ they live in London?',
                                    'correct_answer' => 'Do',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 6: Adjectives & Descriptions',
                'order' => 6,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Describing People\'s Appearance',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Tall',
                                    'options' => [
                                        [
                                            'text' => 'Tall',
                                            'image' => '/images/exercises/tall.png',
                                        ],
                                        [
                                            'text' => 'Short',
                                            'image' => '/images/exercises/short.png',
                                        ],
                                        [
                                            'text' => 'Heavy',
                                            'image' => '/images/exercises/heavy.png',
                                        ],
                                        [
                                            'text' => 'Thin',
                                            'image' => '/images/exercises/thin.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Tall',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'old',
                                        'older',
                                        'oldest',
                                        'olden',
                                    ],
                                    'sentence' => 'My grandfather is very ____.',
                                    'correct_answer' => 'old',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'hair',
                                        'She',
                                        'has',
                                        'curly',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'has',
                                        'curly',
                                        'hair',
                                    ],
                                    'target_sentence' => 'She has curly hair',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'He is a tall man',
                                        'He is a short man',
                                        'He is a young man',
                                        'He is a thin man',
                                    ],
                                    'audio_url' => '/audio/exercises/he-is-a-tall-man.mp3',
                                    'audio_text' => 'He is a tall man',
                                    'correct_answer' => 'He is a tall man',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'handsome',
                                    'options' => [
                                        'Attractive (for a man)',
                                        'Very old',
                                        'Very short',
                                        'Very heavy',
                                    ],
                                    'correct_answer' => 'Attractive (for a man)',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Young',
                                    'options' => [
                                        [
                                            'text' => 'Young',
                                            'image' => '/images/exercises/young.png',
                                        ],
                                        [
                                            'text' => 'Old',
                                            'image' => '/images/exercises/old.png',
                                        ],
                                        [
                                            'text' => 'Tall',
                                            'image' => '/images/exercises/tall.png',
                                        ],
                                        [
                                            'text' => 'Short',
                                            'image' => '/images/exercises/short.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Young',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Describing Objects (Size and Shape)',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Round',
                                    'options' => [
                                        [
                                            'text' => 'Round',
                                            'image' => '/images/exercises/round.png',
                                        ],
                                        [
                                            'text' => 'Square',
                                            'image' => '/images/exercises/square.png',
                                        ],
                                        [
                                            'text' => 'Big',
                                            'image' => '/images/exercises/big.png',
                                        ],
                                        [
                                            'text' => 'Small',
                                            'image' => '/images/exercises/small.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Round',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'heavy',
                                        'heavier',
                                        'heaviest',
                                        'heaving',
                                    ],
                                    'sentence' => 'This box is very ____.',
                                    'correct_answer' => 'heavy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'wide',
                                        'The',
                                        'table',
                                        'is',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'table',
                                        'is',
                                        'very',
                                        'wide',
                                    ],
                                    'target_sentence' => 'The table is very wide',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That is a small box',
                                        'That is a big box',
                                        'That is a round box',
                                        'That is a heavy box',
                                    ],
                                    'audio_url' => '/audio/exercises/that-is-a-small-box.mp3',
                                    'audio_text' => 'That is a small box',
                                    'correct_answer' => 'That is a small box',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'narrow',
                                    'options' => [
                                        'Not wide',
                                        'Very wide',
                                        'Very tall',
                                        'Very short',
                                    ],
                                    'correct_answer' => 'Not wide',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'narrow',
                                        'narrower',
                                        'narrowest',
                                        'narrowly',
                                    ],
                                    'sentence' => 'The street is too ____ for two cars.',
                                    'correct_answer' => 'narrow',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Opposites (Antonyms)',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Hot',
                                    'options' => [
                                        [
                                            'text' => 'Hot',
                                            'image' => '/images/exercises/hot.png',
                                        ],
                                        [
                                            'text' => 'Cold',
                                            'image' => '/images/exercises/cold.png',
                                        ],
                                        [
                                            'text' => 'Warm',
                                            'image' => '/images/exercises/warm.png',
                                        ],
                                        [
                                            'text' => 'Cool',
                                            'image' => '/images/exercises/cool.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Hot',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'slow',
                                        'slower',
                                        'slowest',
                                        'slowly',
                                    ],
                                    'sentence' => 'The opposite of "fast" is ____.',
                                    'correct_answer' => 'slow',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'hot',
                                        'The',
                                        'soup',
                                        'is',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'soup',
                                        'is',
                                        'very',
                                        'hot',
                                    ],
                                    'target_sentence' => 'The soup is very hot',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This test is easy',
                                        'This test is difficult',
                                        'This test is long',
                                        'This test is short',
                                    ],
                                    'audio_url' => '/audio/exercises/this-test-is-easy.mp3',
                                    'audio_text' => 'This test is easy',
                                    'correct_answer' => 'This test is easy',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Sad',
                                        'Angry',
                                        'Tired',
                                        'Bored',
                                    ],
                                    'question' => 'What is the opposite of "happy"?',
                                    'correct_answer' => 'Sad',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'difficult',
                                        'This',
                                        'exercise',
                                        'is',
                                        'not',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'exercise',
                                        'is',
                                        'not',
                                        'difficult',
                                    ],
                                    'target_sentence' => 'This exercise is not difficult',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Adjective Order',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Old',
                                    'options' => [
                                        [
                                            'text' => 'Old',
                                            'image' => '/images/exercises/old.png',
                                        ],
                                        [
                                            'text' => 'New',
                                            'image' => '/images/exercises/new.png',
                                        ],
                                        [
                                            'text' => 'Wooden',
                                            'image' => '/images/exercises/wooden.png',
                                        ],
                                        [
                                            'text' => 'Round',
                                            'image' => '/images/exercises/round.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Old',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'red',
                                        'reddish',
                                        'redder',
                                        'reddened',
                                    ],
                                    'sentence' => 'I bought a nice ____ car.',
                                    'correct_answer' => 'red',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'dog',
                                        'She',
                                        'has',
                                        'a',
                                        'big',
                                        'black',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'has',
                                        'a',
                                        'big',
                                        'black',
                                        'dog',
                                    ],
                                    'target_sentence' => 'She has a big black dog',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'He has a small brown bag',
                                        'He has a brown small bag',
                                        'He has a bag, small and brown',
                                        'He has small a brown bag',
                                    ],
                                    'audio_url' => '/audio/exercises/he-has-a-small-brown-bag.mp3',
                                    'audio_text' => 'He has a small brown bag',
                                    'correct_answer' => 'He has a small brown bag',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A big old house',
                                        'An old big house',
                                        'A house big old',
                                        'A house old big',
                                    ],
                                    'question' => 'Which sentence has the correct adjective order?',
                                    'correct_answer' => 'A big old house',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'They live in a beautiful small white house',
                                        'They live in a small beautiful white house',
                                        'They live in a white small beautiful house',
                                        'They live in a house beautiful small white',
                                    ],
                                    'audio_url' => '/audio/exercises/they-live-in-a-beautiful-small-white-house.mp3',
                                    'audio_text' => 'They live in a beautiful small white house',
                                    'correct_answer' => 'They live in a beautiful small white house',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Comparative Adjectives',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Taller',
                                    'options' => [
                                        [
                                            'text' => 'Taller',
                                            'image' => '/images/exercises/taller.png',
                                        ],
                                        [
                                            'text' => 'Shorter',
                                            'image' => '/images/exercises/shorter.png',
                                        ],
                                        [
                                            'text' => 'Faster',
                                            'image' => '/images/exercises/faster.png',
                                        ],
                                        [
                                            'text' => 'Slower',
                                            'image' => '/images/exercises/slower.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Taller',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'taller',
                                        'tall',
                                        'tallest',
                                        'tallness',
                                    ],
                                    'sentence' => 'My brother is ____ than me.',
                                    'correct_answer' => 'taller',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'one',
                                        'This',
                                        'car',
                                        'is',
                                        'faster',
                                        'than',
                                        'that',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'car',
                                        'is',
                                        'faster',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This car is faster than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Today is colder than yesterday',
                                        'Today is warmer than yesterday',
                                        'Today is the coldest day',
                                        'Yesterday was cold too',
                                    ],
                                    'audio_url' => '/audio/exercises/today-is-colder-than-yesterday.mp3',
                                    'audio_text' => 'Today is colder than yesterday',
                                    'correct_answer' => 'Today is colder than yesterday',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Better',
                                        'Gooder',
                                        'Goodest',
                                        'More good',
                                    ],
                                    'question' => 'What is the comparative form of "good"?',
                                    'correct_answer' => 'Better',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'More beautiful',
                                        'Beautifuller',
                                        'Beautifulest',
                                        'Most beautiful',
                                    ],
                                    'question' => 'What is the comparative form of "beautiful"?',
                                    'correct_answer' => 'More beautiful',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Personality and Character',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Kind',
                                    'options' => [
                                        [
                                            'text' => 'Kind',
                                            'image' => '/images/exercises/kind.png',
                                        ],
                                        [
                                            'text' => 'Rude',
                                            'image' => '/images/exercises/rude.png',
                                        ],
                                        [
                                            'text' => 'Lazy',
                                            'image' => '/images/exercises/lazy.png',
                                        ],
                                        [
                                            'text' => 'Shy',
                                            'image' => '/images/exercises/shy.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Kind',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'friendly',
                                        'friendlier',
                                        'friendliest',
                                        'friendliness',
                                    ],
                                    'sentence' => 'My teacher is very ____ and helpful.',
                                    'correct_answer' => 'friendly',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'everyone',
                                        'He',
                                        'is',
                                        'always',
                                        'honest',
                                        'with',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'is',
                                        'always',
                                        'honest',
                                        'with',
                                        'everyone',
                                    ],
                                    'target_sentence' => 'He is always honest with everyone',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'She is a very funny person',
                                        'She is a very serious person',
                                        'She is a very quiet person',
                                        'She is a very lazy person',
                                    ],
                                    'audio_url' => '/audio/exercises/she-is-a-very-funny-person.mp3',
                                    'audio_text' => 'She is a very funny person',
                                    'correct_answer' => 'She is a very funny person',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'lazy',
                                    'options' => [
                                        'Not willing to work or do things',
                                        'Very hardworking',
                                        'Very kind',
                                        'Very smart',
                                    ],
                                    'correct_answer' => 'Not willing to work or do things',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Smart',
                                    'options' => [
                                        [
                                            'text' => 'Smart',
                                            'image' => '/images/exercises/smart.png',
                                        ],
                                        [
                                            'text' => 'Lazy',
                                            'image' => '/images/exercises/lazy.png',
                                        ],
                                        [
                                            'text' => 'Rude',
                                            'image' => '/images/exercises/rude.png',
                                        ],
                                        [
                                            'text' => 'Shy',
                                            'image' => '/images/exercises/shy.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Smart',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 7: Prepositions & Locations',
                'order' => 7,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: In, On, At',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'In',
                                    'options' => [
                                        [
                                            'text' => 'In',
                                            'image' => '/images/exercises/in.png',
                                        ],
                                        [
                                            'text' => 'On',
                                            'image' => '/images/exercises/on.png',
                                        ],
                                        [
                                            'text' => 'At',
                                            'image' => '/images/exercises/at.png',
                                        ],
                                        [
                                            'text' => 'Under',
                                            'image' => '/images/exercises/under.png',
                                        ],
                                    ],
                                    'correct_answer' => 'In',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'in',
                                        'on',
                                        'at',
                                        'under',
                                    ],
                                    'sentence' => 'The book is ____ the box.',
                                    'correct_answer' => 'in',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'on',
                                        'in',
                                        'at',
                                        'next to',
                                    ],
                                    'sentence' => 'The cup is ____ the table.',
                                    'correct_answer' => 'on',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'table',
                                        'The',
                                        'keys',
                                        'are',
                                        'on',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'keys',
                                        'are',
                                        'on',
                                        'the',
                                        'table',
                                    ],
                                    'target_sentence' => 'The keys are on the table',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'She is at school',
                                        'She is on school',
                                        'She is in school bag',
                                        'She is under school',
                                    ],
                                    'audio_url' => '/audio/exercises/she-is-at-school.mp3',
                                    'audio_text' => 'She is at school',
                                    'correct_answer' => 'She is at school',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'at',
                                        'on',
                                        'under',
                                        'next to',
                                    ],
                                    'question' => 'Which preposition do we use with "school" to say where someone is right now?',
                                    'correct_answer' => 'at',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Under, Next To, Between',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Under',
                                    'options' => [
                                        [
                                            'text' => 'Under',
                                            'image' => '/images/exercises/under.png',
                                        ],
                                        [
                                            'text' => 'Next to',
                                            'image' => '/images/exercises/next-to.png',
                                        ],
                                        [
                                            'text' => 'Between',
                                            'image' => '/images/exercises/between.png',
                                        ],
                                        [
                                            'text' => 'On',
                                            'image' => '/images/exercises/on.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Under',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'under',
                                        'at',
                                        'in',
                                        'between',
                                    ],
                                    'sentence' => 'The cat is ____ the chair.',
                                    'correct_answer' => 'under',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'door',
                                        'The',
                                        'dog',
                                        'is',
                                        'next',
                                        'to',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'dog',
                                        'is',
                                        'next',
                                        'to',
                                        'the',
                                        'door',
                                    ],
                                    'target_sentence' => 'The dog is next to the door',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'wall',
                                        'The',
                                        'lamp',
                                        'is',
                                        'between',
                                        'the',
                                        'sofa',
                                        'and',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'lamp',
                                        'is',
                                        'between',
                                        'the',
                                        'sofa',
                                        'and',
                                        'the',
                                        'wall',
                                    ],
                                    'target_sentence' => 'The lamp is between the sofa and the wall',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The ball is under the bed',
                                        'The ball is on the bed',
                                        'The ball is next to the bed',
                                        'The ball is in the bed',
                                    ],
                                    'audio_url' => '/audio/exercises/the-ball-is-under-the-bed.mp3',
                                    'audio_text' => 'The ball is under the bed',
                                    'correct_answer' => 'The ball is under the bed',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'next to',
                                    'options' => [
                                        'Beside something',
                                        'Above something',
                                        'Inside something',
                                        'Far from something',
                                    ],
                                    'correct_answer' => 'Beside something',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Rooms in a House',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Kitchen',
                                    'options' => [
                                        [
                                            'text' => 'Kitchen',
                                            'image' => '/images/exercises/kitchen.png',
                                        ],
                                        [
                                            'text' => 'Bedroom',
                                            'image' => '/images/exercises/bedroom.png',
                                        ],
                                        [
                                            'text' => 'Bathroom',
                                            'image' => '/images/exercises/bathroom.png',
                                        ],
                                        [
                                            'text' => 'Living room',
                                            'image' => '/images/exercises/living-room.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Kitchen',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Living room',
                                    'options' => [
                                        [
                                            'text' => 'Living room',
                                            'image' => '/images/exercises/living-room.png',
                                        ],
                                        [
                                            'text' => 'Kitchen',
                                            'image' => '/images/exercises/kitchen.png',
                                        ],
                                        [
                                            'text' => 'Bedroom',
                                            'image' => '/images/exercises/bedroom.png',
                                        ],
                                        [
                                            'text' => 'Bathroom',
                                            'image' => '/images/exercises/bathroom.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Living room',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'kitchen',
                                        'bedroom',
                                        'garden',
                                        'garage',
                                    ],
                                    'sentence' => 'The food is in the ____.',
                                    'correct_answer' => 'kitchen',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bedroom',
                                        'My',
                                        'bed',
                                        'is',
                                        'in',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'bed',
                                        'is',
                                        'in',
                                        'the',
                                        'bedroom',
                                    ],
                                    'target_sentence' => 'My bed is in the bedroom',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The bathroom is next to the bedroom',
                                        'The kitchen is under the bedroom',
                                        'The garden is in the kitchen',
                                        'The bedroom is at the door',
                                    ],
                                    'audio_url' => '/audio/exercises/the-bathroom-is-next-to-the-bedroom.mp3',
                                    'audio_text' => 'The bathroom is next to the bedroom',
                                    'correct_answer' => 'The bathroom is next to the bedroom',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'In the kitchen',
                                        'In the bedroom',
                                        'In the bathroom',
                                        'In the garden',
                                    ],
                                    'question' => 'Where do you usually cook food?',
                                    'correct_answer' => 'In the kitchen',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking \'Where is...?\'',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Where',
                                    'options' => [
                                        [
                                            'text' => 'Where',
                                            'image' => '/images/exercises/where.png',
                                        ],
                                        [
                                            'text' => 'When',
                                            'image' => '/images/exercises/when.png',
                                        ],
                                        [
                                            'text' => 'Who',
                                            'image' => '/images/exercises/who.png',
                                        ],
                                        [
                                            'text' => 'What',
                                            'image' => '/images/exercises/what.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Where',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Where',
                                        'What',
                                        'Who',
                                        'When',
                                    ],
                                    'sentence' => '____ is the bank?',
                                    'correct_answer' => 'Where',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'stop',
                                        'Where',
                                        'is',
                                        'the',
                                        'bus',
                                    ],
                                    'correct_order' => [
                                        'Where',
                                        'is',
                                        'the',
                                        'bus',
                                        'stop',
                                    ],
                                    'target_sentence' => 'Where is the bus stop',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Where is the hospital?',
                                        'When is the hospital?',
                                        'What is the hospital?',
                                        'Who is the hospital?',
                                    ],
                                    'audio_url' => '/audio/exercises/where-is-the-hospital.mp3',
                                    'audio_text' => 'Where is the hospital?',
                                    'correct_answer' => 'Where is the hospital?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Where is the nearest park?',
                                        'When is the nearest park?',
                                        'What is the nearest park?',
                                        'Who is the nearest park?',
                                    ],
                                    'audio_url' => '/audio/exercises/where-is-the-nearest-park.mp3',
                                    'audio_text' => 'Where is the nearest park?',
                                    'correct_answer' => 'Where is the nearest park?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Where is...?',
                                        'When is...?',
                                        'Who is...?',
                                        'What is...?',
                                    ],
                                    'question' => 'What question do you ask to find a place?',
                                    'correct_answer' => 'Where is...?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Giving Directions',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Straight',
                                    'options' => [
                                        [
                                            'text' => 'Straight',
                                            'image' => '/images/exercises/straight.png',
                                        ],
                                        [
                                            'text' => 'Left',
                                            'image' => '/images/exercises/left.png',
                                        ],
                                        [
                                            'text' => 'Right',
                                            'image' => '/images/exercises/right.png',
                                        ],
                                        [
                                            'text' => 'Behind',
                                            'image' => '/images/exercises/behind.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Straight',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'left',
                                        'lefts',
                                        'lefting',
                                        'lefted',
                                    ],
                                    'sentence' => 'Turn ____ at the corner.',
                                    'correct_answer' => 'left',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'shop',
                                        'The',
                                        'bank',
                                        'is',
                                        'behind',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'bank',
                                        'is',
                                        'behind',
                                        'the',
                                        'shop',
                                    ],
                                    'target_sentence' => 'The bank is behind the shop',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Turn right at the traffic light',
                                        'Turn left at the corner',
                                        'Go straight ahead',
                                        'Stop near the bank',
                                    ],
                                    'audio_url' => '/audio/exercises/turn-right-at-the-traffic-light.mp3',
                                    'audio_text' => 'Turn right at the traffic light',
                                    'correct_answer' => 'Turn right at the traffic light',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'behind',
                                    'options' => [
                                        'At the back of something',
                                        'In front of something',
                                        'Above something',
                                        'Inside something',
                                    ],
                                    'correct_answer' => 'At the back of something',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Straight',
                                        'Left',
                                        'Right',
                                        'Behind',
                                    ],
                                    'question' => 'Which word means to go without turning?',
                                    'correct_answer' => 'Straight',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Places in the City',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Hospital',
                                    'options' => [
                                        [
                                            'text' => 'Hospital',
                                            'image' => '/images/exercises/hospital.png',
                                        ],
                                        [
                                            'text' => 'Library',
                                            'image' => '/images/exercises/library.png',
                                        ],
                                        [
                                            'text' => 'Market',
                                            'image' => '/images/exercises/market.png',
                                        ],
                                        [
                                            'text' => 'Station',
                                            'image' => '/images/exercises/station.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Hospital',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'near',
                                        'nears',
                                        'nearing',
                                        'neared',
                                    ],
                                    'sentence' => 'The library is ____ the market.',
                                    'correct_answer' => 'near',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'on',
                                        'in',
                                        'at',
                                        'under',
                                    ],
                                    'sentence' => 'There is a bookstore ____ the corner.',
                                    'correct_answer' => 'on',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'here',
                                        'The',
                                        'station',
                                        'is',
                                        'far',
                                        'from',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'station',
                                        'is',
                                        'far',
                                        'from',
                                        'here',
                                    ],
                                    'target_sentence' => 'The station is far from here',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The market is close to my house',
                                        'The market is far from my house',
                                        'The market is under my house',
                                        'The market is inside my house',
                                    ],
                                    'audio_url' => '/audio/exercises/the-market-is-close-to-my-house.mp3',
                                    'audio_text' => 'The market is close to my house',
                                    'correct_answer' => 'The market is close to my house',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Far',
                                        'Close',
                                        'Next',
                                        'Behind',
                                    ],
                                    'question' => 'What is the opposite of "near"?',
                                    'correct_answer' => 'Far',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 8: Daily Routine',
                'order' => 8,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Morning Routine Basics',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Wake up',
                                    'options' => [
                                        [
                                            'text' => 'Wake up',
                                            'image' => '/images/exercises/wake-up.png',
                                        ],
                                        [
                                            'text' => 'Go to bed',
                                            'image' => '/images/exercises/go-to-bed.png',
                                        ],
                                        [
                                            'text' => 'Have dinner',
                                            'image' => '/images/exercises/have-dinner.png',
                                        ],
                                        [
                                            'text' => 'Take a shower',
                                            'image' => '/images/exercises/take-a-shower.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Wake up',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'wake',
                                        'wakes',
                                        'waking',
                                        'woke',
                                    ],
                                    'sentence' => 'I ____ up at seven o\'clock every morning.',
                                    'correct_answer' => 'wake',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'teeth',
                                        'I',
                                        'brush',
                                        'my',
                                        'every',
                                        'morning',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'brush',
                                        'my',
                                        'teeth',
                                        'every',
                                        'morning',
                                    ],
                                    'target_sentence' => 'I brush my teeth every morning',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I take a shower every morning',
                                        'I eat breakfast every morning',
                                        'I go to bed every morning',
                                        'I wash the dishes every morning',
                                    ],
                                    'audio_url' => '/audio/exercises/i-take-a-shower-every-morning.mp3',
                                    'audio_text' => 'I take a shower every morning',
                                    'correct_answer' => 'I take a shower every morning',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Wake up',
                                        'Go to sleep',
                                        'Have dinner',
                                        'Watch TV',
                                    ],
                                    'question' => 'What do most people do first in the morning?',
                                    'correct_answer' => 'Wake up',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Get dressed',
                                    'options' => [
                                        [
                                            'text' => 'Get dressed',
                                            'image' => '/images/exercises/get-dressed.png',
                                        ],
                                        [
                                            'text' => 'Go to bed',
                                            'image' => '/images/exercises/go-to-bed.png',
                                        ],
                                        [
                                            'text' => 'Have lunch',
                                            'image' => '/images/exercises/have-lunch.png',
                                        ],
                                        [
                                            'text' => 'Take a shower',
                                            'image' => '/images/exercises/take-a-shower.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Get dressed',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Frequency Adverbs: Always, Usually, Never',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Always',
                                    'options' => [
                                        [
                                            'text' => 'Always',
                                            'image' => '/images/exercises/always.png',
                                        ],
                                        [
                                            'text' => 'Usually',
                                            'image' => '/images/exercises/usually.png',
                                        ],
                                        [
                                            'text' => 'Never',
                                            'image' => '/images/exercises/never.png',
                                        ],
                                        [
                                            'text' => 'Rarely',
                                            'image' => '/images/exercises/rarely.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Always',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'usually',
                                        'usual',
                                        'user',
                                        'use',
                                    ],
                                    'sentence' => 'I ____ go to bed before 10 PM because it is part of my daily routine.',
                                    'correct_answer' => 'usually',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'night',
                                        'I',
                                        'always',
                                        'brush',
                                        'teeth',
                                        'my',
                                        'at',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'always',
                                        'brush',
                                        'my',
                                        'teeth',
                                        'at',
                                        'night',
                                    ],
                                    'target_sentence' => 'I always brush my teeth at night',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I never skip breakfast',
                                        'I always skip breakfast',
                                        'I usually eat breakfast',
                                        'I sometimes skip lunch',
                                    ],
                                    'audio_url' => '/audio/exercises/i-never-skip-breakfast.mp3',
                                    'audio_text' => 'I never skip breakfast',
                                    'correct_answer' => 'I never skip breakfast',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Never',
                                        'Always',
                                        'Usually',
                                        'Often',
                                    ],
                                    'question' => 'Which word means "not ever"?',
                                    'correct_answer' => 'Never',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'usually',
                                        'use',
                                        'usual',
                                        'user',
                                    ],
                                    'sentence' => 'She ____ wakes up early, but today she woke up late.',
                                    'correct_answer' => 'usually',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Evening Routine & Bedtime',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Have dinner',
                                    'options' => [
                                        [
                                            'text' => 'Have dinner',
                                            'image' => '/images/exercises/have-dinner.png',
                                        ],
                                        [
                                            'text' => 'Wake up',
                                            'image' => '/images/exercises/wake-up.png',
                                        ],
                                        [
                                            'text' => 'Take a shower',
                                            'image' => '/images/exercises/take-a-shower.png',
                                        ],
                                        [
                                            'text' => 'Get dressed',
                                            'image' => '/images/exercises/get-dressed.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Have dinner',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'have',
                                        'has',
                                        'having',
                                        'had',
                                    ],
                                    'sentence' => 'We ____ dinner at eight o\'clock every evening.',
                                    'correct_answer' => 'have',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bed',
                                        'I',
                                        'watch',
                                        'TV',
                                        'before',
                                        'going',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'watch',
                                        'TV',
                                        'before',
                                        'going',
                                        'to',
                                        'bed',
                                    ],
                                    'target_sentence' => 'I watch TV before going to bed',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I go to bed at ten o\'clock',
                                        'I wake up at ten o\'clock',
                                        'I eat lunch at ten o\'clock',
                                        'I leave home at ten o\'clock',
                                    ],
                                    'audio_url' => '/audio/exercises/i-go-to-bed-at-ten-oclock.mp3',
                                    'audio_text' => 'I go to bed at ten o\'clock',
                                    'correct_answer' => 'I go to bed at ten o\'clock',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Go to bed',
                                        'Wake up',
                                        'Have breakfast',
                                        'Go to school',
                                    ],
                                    'question' => 'What do you usually do right before sleeping?',
                                    'correct_answer' => 'Go to bed',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bed',
                                        'She',
                                        'brushes',
                                        'her',
                                        'teeth',
                                        'before',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'brushes',
                                        'her',
                                        'teeth',
                                        'before',
                                        'bed',
                                    ],
                                    'target_sentence' => 'She brushes her teeth before bed',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Present Simple Habits',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Brushes',
                                    'options' => [
                                        [
                                            'text' => 'Brushes',
                                            'image' => '/images/exercises/brushes.png',
                                        ],
                                        [
                                            'text' => 'Brush',
                                            'image' => '/images/exercises/brush.png',
                                        ],
                                        [
                                            'text' => 'Brushing',
                                            'image' => '/images/exercises/brushing.png',
                                        ],
                                        [
                                            'text' => 'Brushed',
                                            'image' => '/images/exercises/brushed.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Brushes',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'wakes',
                                        'wake',
                                        'waking',
                                        'woke',
                                    ],
                                    'sentence' => 'He ____ up at six every morning.',
                                    'correct_answer' => 'wakes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bed',
                                        'She',
                                        'always',
                                        'makes',
                                        'her',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'always',
                                        'makes',
                                        'her',
                                        'bed',
                                    ],
                                    'target_sentence' => 'She always makes her bed',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'He usually takes a shower at night',
                                        'He usually take a shower at night',
                                        'He usual takes a shower at night',
                                        'He usually taking a shower at night',
                                    ],
                                    'audio_url' => '/audio/exercises/he-usually-takes-a-shower-at-night.mp3',
                                    'audio_text' => 'He usually takes a shower at night',
                                    'correct_answer' => 'He usually takes a shower at night',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'She brushes her teeth every night.',
                                        'She brush her teeth every night.',
                                        'She brushing her teeth every night.',
                                        'She brushed her teeth every night now.',
                                    ],
                                    'question' => 'Which sentence is correct?',
                                    'correct_answer' => 'She brushes her teeth every night.',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'He never eats breakfast',
                                        'He never eat breakfast',
                                        'He never eating breakfast',
                                        'He never ate breakfast now',
                                    ],
                                    'audio_url' => '/audio/exercises/he-never-eats-breakfast.mp3',
                                    'audio_text' => 'He never eats breakfast',
                                    'correct_answer' => 'He never eats breakfast',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Daily Schedule & Time Expressions',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'In the morning',
                                    'options' => [
                                        [
                                            'text' => 'In the morning',
                                            'image' => '/images/exercises/in-the-morning.png',
                                        ],
                                        [
                                            'text' => 'In the evening',
                                            'image' => '/images/exercises/in-the-evening.png',
                                        ],
                                        [
                                            'text' => 'At night',
                                            'image' => '/images/exercises/at-night.png',
                                        ],
                                        [
                                            'text' => 'At noon',
                                            'image' => '/images/exercises/at-noon.png',
                                        ],
                                    ],
                                    'correct_answer' => 'In the morning',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'after',
                                        'before',
                                        'during',
                                        'between',
                                    ],
                                    'sentence' => 'I get dressed ____ I take a shower.',
                                    'correct_answer' => 'after',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'evening',
                                        'I',
                                        'go',
                                        'for',
                                        'a',
                                        'walk',
                                        'in',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'go',
                                        'for',
                                        'a',
                                        'walk',
                                        'in',
                                        'the',
                                        'evening',
                                    ],
                                    'target_sentence' => 'I go for a walk in the evening',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I eat dinner at seven in the evening',
                                        'I eat breakfast at seven in the evening',
                                        'I wake up at seven in the evening',
                                        'I go to school at seven in the evening',
                                    ],
                                    'audio_url' => '/audio/exercises/i-eat-dinner-at-seven-in-the-evening.mp3',
                                    'audio_text' => 'I eat dinner at seven in the evening',
                                    'correct_answer' => 'I eat dinner at seven in the evening',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'At night',
                                        'In the morning',
                                        'In the afternoon',
                                        'At noon',
                                    ],
                                    'question' => 'Which time expression means "during the night"?',
                                    'correct_answer' => 'At night',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Have dinner and relax',
                                        'Wake up and get dressed',
                                        'Go to school',
                                        'Eat breakfast',
                                    ],
                                    'question' => 'What do you usually do in the evening?',
                                    'correct_answer' => 'Have dinner and relax',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Asking About Routines',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Question',
                                    'options' => [
                                        [
                                            'text' => 'Question',
                                            'image' => '/images/exercises/question.png',
                                        ],
                                        [
                                            'text' => 'Answer',
                                            'image' => '/images/exercises/answer.png',
                                        ],
                                        [
                                            'text' => 'Statement',
                                            'image' => '/images/exercises/statement.png',
                                        ],
                                        [
                                            'text' => 'Command',
                                            'image' => '/images/exercises/command.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Question',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Do',
                                        'Does',
                                        'Are',
                                        'Is',
                                    ],
                                    'sentence' => '____ you usually wake up early?',
                                    'correct_answer' => 'Do',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bed',
                                        'What',
                                        'time',
                                        'do',
                                        'you',
                                        'go',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'time',
                                        'do',
                                        'you',
                                        'go',
                                        'to',
                                        'bed',
                                    ],
                                    'target_sentence' => 'What time do you go to bed',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Does she usually eat breakfast?',
                                        'Do she usually eat breakfast?',
                                        'Is she usually eat breakfast?',
                                        'Does she usually eating breakfast?',
                                    ],
                                    'audio_url' => '/audio/exercises/does-she-usually-eat-breakfast.mp3',
                                    'audio_text' => 'Does she usually eat breakfast?',
                                    'correct_answer' => 'Does she usually eat breakfast?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Does he always brush his teeth?',
                                        'Does he always brushes his teeth?',
                                        'Do he always brush his teeth?',
                                        'Is he always brush his teeth?',
                                    ],
                                    'question' => 'Which question is correct?',
                                    'correct_answer' => 'Does he always brush his teeth?',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Does',
                                        'Do',
                                        'Is',
                                        'Are',
                                    ],
                                    'sentence' => '____ your sister usually go to bed early?',
                                    'correct_answer' => 'Does',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 9: Weather & Seasons',
                'order' => 9,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Weather Vocabulary Basics',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sunny',
                                    'options' => [
                                        [
                                            'text' => 'Sunny',
                                            'image' => '/images/exercises/sunny.png',
                                        ],
                                        [
                                            'text' => 'Rainy',
                                            'image' => '/images/exercises/rainy.png',
                                        ],
                                        [
                                            'text' => 'Cloudy',
                                            'image' => '/images/exercises/cloudy.png',
                                        ],
                                        [
                                            'text' => 'Windy',
                                            'image' => '/images/exercises/windy.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sunny',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'rainy',
                                        'rain',
                                        'rains',
                                        'rained',
                                    ],
                                    'sentence' => 'It is very ____ today, so bring an umbrella.',
                                    'correct_answer' => 'rainy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'It',
                                        'is',
                                        'sunny',
                                    ],
                                    'correct_order' => [
                                        'It',
                                        'is',
                                        'sunny',
                                        'today',
                                    ],
                                    'target_sentence' => 'It is sunny today',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Cloudy',
                                        'Sunny',
                                        'Snowy',
                                        'Windy',
                                    ],
                                    'audio_url' => '/audio/exercises/cloudy.mp3',
                                    'audio_text' => 'Cloudy',
                                    'correct_answer' => 'Cloudy',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'windy',
                                    'options' => [
                                        'There is a lot of wind',
                                        'There is a lot of rain',
                                        'It is very hot',
                                        'It is very cold',
                                    ],
                                    'correct_answer' => 'There is a lot of wind',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'windy',
                                        'wind',
                                        'winds',
                                        'winded',
                                    ],
                                    'sentence' => 'The wind is blowing hard; it is very ____.',
                                    'correct_answer' => 'windy',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: The Four Seasons',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Winter',
                                    'options' => [
                                        [
                                            'text' => 'Winter',
                                            'image' => '/images/exercises/winter.png',
                                        ],
                                        [
                                            'text' => 'Summer',
                                            'image' => '/images/exercises/summer.png',
                                        ],
                                        [
                                            'text' => 'Spring',
                                            'image' => '/images/exercises/spring.png',
                                        ],
                                        [
                                            'text' => 'Autumn',
                                            'image' => '/images/exercises/autumn.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Winter',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'autumn',
                                        'autumns',
                                        'autumnal',
                                        'autumned',
                                    ],
                                    'sentence' => 'Leaves fall from the trees in ____.',
                                    'correct_answer' => 'autumn',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'spring',
                                        'Flowers',
                                        'bloom',
                                        'in',
                                    ],
                                    'correct_order' => [
                                        'Flowers',
                                        'bloom',
                                        'in',
                                        'spring',
                                    ],
                                    'target_sentence' => 'Flowers bloom in spring',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Summer',
                                        'Winter',
                                        'Spring',
                                        'Autumn',
                                    ],
                                    'audio_url' => '/audio/exercises/summer.mp3',
                                    'audio_text' => 'Summer',
                                    'correct_answer' => 'Summer',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Spring',
                                        'Summer',
                                        'Autumn',
                                        'Winter',
                                    ],
                                    'question' => 'Which season comes after winter?',
                                    'correct_answer' => 'Spring',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'season',
                                        'Summer',
                                        'is',
                                        'the',
                                        'hottest',
                                    ],
                                    'correct_order' => [
                                        'Summer',
                                        'is',
                                        'the',
                                        'hottest',
                                        'season',
                                    ],
                                    'target_sentence' => 'Summer is the hottest season',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: "It Is" Weather Expressions',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Raining',
                                    'options' => [
                                        [
                                            'text' => 'Raining',
                                            'image' => '/images/exercises/raining.png',
                                        ],
                                        [
                                            'text' => 'Snowing',
                                            'image' => '/images/exercises/snowing.png',
                                        ],
                                        [
                                            'text' => 'Shining',
                                            'image' => '/images/exercises/shining.png',
                                        ],
                                        [
                                            'text' => 'Freezing',
                                            'image' => '/images/exercises/freezing.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Raining',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'is',
                                        'are',
                                        'am',
                                        'be',
                                    ],
                                    'sentence' => 'It ____ raining outside, so take your umbrella.',
                                    'correct_answer' => 'is',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'outside',
                                        'It',
                                        'is',
                                        'snowing',
                                    ],
                                    'correct_order' => [
                                        'It',
                                        'is',
                                        'snowing',
                                        'outside',
                                    ],
                                    'target_sentence' => 'It is snowing outside',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is freezing today',
                                        'It is boiling today',
                                        'It is calm today',
                                        'It is dry today',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-freezing-today.mp3',
                                    'audio_text' => 'It is freezing today',
                                    'correct_answer' => 'It is freezing today',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'It is raining now.',
                                        'It raining now.',
                                        'It are raining now.',
                                        'It rain now.',
                                    ],
                                    'question' => 'Which sentence correctly describes the weather?',
                                    'correct_answer' => 'It is raining now.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'It is freezing',
                                    'options' => [
                                        'It is extremely cold',
                                        'It is extremely hot',
                                        'It is windy',
                                        'It is sunny',
                                    ],
                                    'correct_answer' => 'It is extremely cold',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Describing Today\'s Weather',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Forecast',
                                    'options' => [
                                        [
                                            'text' => 'Forecast',
                                            'image' => '/images/exercises/forecast.png',
                                        ],
                                        [
                                            'text' => 'Temperature',
                                            'image' => '/images/exercises/temperature.png',
                                        ],
                                        [
                                            'text' => 'Umbrella',
                                            'image' => '/images/exercises/umbrella.png',
                                        ],
                                        [
                                            'text' => 'Thermometer',
                                            'image' => '/images/exercises/thermometer.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Forecast',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'What',
                                        'Where',
                                        'Who',
                                        'Why',
                                    ],
                                    'sentence' => '____ is the weather like today?',
                                    'correct_answer' => 'What',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'What',
                                        'is',
                                        'the',
                                        'weather',
                                        'like',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'is',
                                        'the',
                                        'weather',
                                        'like',
                                        'today',
                                    ],
                                    'target_sentence' => 'What is the weather like today',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The temperature is rising',
                                        'The temperature is falling',
                                        'The sky is clear',
                                        'The wind is calm',
                                    ],
                                    'audio_url' => '/audio/exercises/the-temperature-is-rising.mp3',
                                    'audio_text' => 'The temperature is rising',
                                    'correct_answer' => 'The temperature is rising',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'What is the weather like today?',
                                        'What are you doing today?',
                                        'Where is the weather today?',
                                        'Who is the weather today?',
                                    ],
                                    'question' => 'How do you ask about today\'s weather?',
                                    'correct_answer' => 'What is the weather like today?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is a beautiful sunny day',
                                        'It is a terrible rainy day',
                                        'It is a cold winter night',
                                        'It is a warm spring morning',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-a-beautiful-sunny-day.mp3',
                                    'audio_text' => 'It is a beautiful sunny day',
                                    'correct_answer' => 'It is a beautiful sunny day',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Seasonal Activities & Clothing',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Coat',
                                    'options' => [
                                        [
                                            'text' => 'Coat',
                                            'image' => '/images/exercises/coat.png',
                                        ],
                                        [
                                            'text' => 'Scarf',
                                            'image' => '/images/exercises/scarf.png',
                                        ],
                                        [
                                            'text' => 'Swimsuit',
                                            'image' => '/images/exercises/swimsuit.png',
                                        ],
                                        [
                                            'text' => 'Sunglasses',
                                            'image' => '/images/exercises/sunglasses.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Coat',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'hotter',
                                        'hot',
                                        'hottest',
                                        'hotly',
                                    ],
                                    'sentence' => 'Summer is ____ than winter.',
                                    'correct_answer' => 'hotter',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'winter',
                                        'Wear',
                                        'a',
                                        'coat',
                                        'in',
                                    ],
                                    'correct_order' => [
                                        'Wear',
                                        'a',
                                        'coat',
                                        'in',
                                        'winter',
                                    ],
                                    'target_sentence' => 'Wear a coat in winter',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Sunglasses',
                                        'Scarf',
                                        'Boots',
                                        'Gloves',
                                    ],
                                    'audio_url' => '/audio/exercises/sunglasses.mp3',
                                    'audio_text' => 'Sunglasses',
                                    'correct_answer' => 'Sunglasses',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A warm coat and scarf',
                                        'A swimsuit and sunglasses',
                                        'Shorts and sandals',
                                        'A light T-shirt',
                                    ],
                                    'question' => 'What should you wear on a cold winter day?',
                                    'correct_answer' => 'A warm coat and scarf',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Boots',
                                    'options' => [
                                        [
                                            'text' => 'Boots',
                                            'image' => '/images/exercises/boots.png',
                                        ],
                                        [
                                            'text' => 'Sandals',
                                            'image' => '/images/exercises/sandals.png',
                                        ],
                                        [
                                            'text' => 'Swimsuit',
                                            'image' => '/images/exercises/swimsuit.png',
                                        ],
                                        [
                                            'text' => 'Sunglasses',
                                            'image' => '/images/exercises/sunglasses.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Boots',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Weather Forecast & Future',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Tomorrow',
                                    'options' => [
                                        [
                                            'text' => 'Tomorrow',
                                            'image' => '/images/exercises/tomorrow.png',
                                        ],
                                        [
                                            'text' => 'Yesterday',
                                            'image' => '/images/exercises/yesterday.png',
                                        ],
                                        [
                                            'text' => 'Today',
                                            'image' => '/images/exercises/today.png',
                                        ],
                                        [
                                            'text' => 'Tonight',
                                            'image' => '/images/exercises/tonight.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Tomorrow',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'will',
                                        'is',
                                        'was',
                                        'has',
                                    ],
                                    'sentence' => 'It ____ rain tomorrow, according to the forecast.',
                                    'correct_answer' => 'will',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'tomorrow',
                                        'It',
                                        'will',
                                        'be',
                                        'sunny',
                                    ],
                                    'correct_order' => [
                                        'It',
                                        'will',
                                        'be',
                                        'sunny',
                                        'tomorrow',
                                    ],
                                    'target_sentence' => 'It will be sunny tomorrow',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It will snow this weekend',
                                        'It will rain this weekend',
                                        'It snowed last weekend',
                                        'It rained last weekend',
                                    ],
                                    'audio_url' => '/audio/exercises/it-will-snow-this-weekend.mp3',
                                    'audio_text' => 'It will snow this weekend',
                                    'correct_answer' => 'It will snow this weekend',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'It will be windy tomorrow.',
                                        'It was windy yesterday.',
                                        'It is windy now.',
                                        'It has been windy.',
                                    ],
                                    'question' => 'Which sentence talks about the future weather?',
                                    'correct_answer' => 'It will be windy tomorrow.',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'rain',
                                        'The',
                                        'forecast',
                                        'says',
                                        'it',
                                        'will',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'forecast',
                                        'says',
                                        'it',
                                        'will',
                                        'rain',
                                    ],
                                    'target_sentence' => 'The forecast says it will rain',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 10: Basic Grammar: Plurals & Articles',
                'order' => 10,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: One Book, Two Books (Regular Plurals)',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Books',
                                    'options' => [
                                        [
                                            'text' => 'Books',
                                            'image' => '/images/exercises/books.png',
                                        ],
                                        [
                                            'text' => 'Pens',
                                            'image' => '/images/exercises/pens.png',
                                        ],
                                        [
                                            'text' => 'Cups',
                                            'image' => '/images/exercises/cups.png',
                                        ],
                                        [
                                            'text' => 'Bags',
                                            'image' => '/images/exercises/bags.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Books',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'books',
                                        'book',
                                        'bookes',
                                        'booking',
                                    ],
                                    'sentence' => 'I have two ____.',
                                    'correct_answer' => 'books',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'boxes',
                                        'box',
                                        'boxs',
                                        'boxies',
                                    ],
                                    'sentence' => 'She has three ____.',
                                    'correct_answer' => 'boxes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'books',
                                        'I',
                                        'two',
                                        'have',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'two',
                                        'books',
                                    ],
                                    'target_sentence' => 'I have two books',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The boxes are heavy',
                                        'The box is heavy',
                                        'The boxes is heavy',
                                        'The box are heavy',
                                    ],
                                    'audio_url' => '/audio/exercises/the-boxes-are-heavy.mp3',
                                    'audio_text' => 'The boxes are heavy',
                                    'correct_answer' => 'The boxes are heavy',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'buses',
                                        'bus',
                                        'buss',
                                        'busies',
                                    ],
                                    'question' => 'How do you make "bus" plural?',
                                    'correct_answer' => 'buses',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Irregular Plural Nouns',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Children',
                                    'options' => [
                                        [
                                            'text' => 'Children',
                                            'image' => '/images/exercises/children.png',
                                        ],
                                        [
                                            'text' => 'Men',
                                            'image' => '/images/exercises/men.png',
                                        ],
                                        [
                                            'text' => 'Women',
                                            'image' => '/images/exercises/women.png',
                                        ],
                                        [
                                            'text' => 'People',
                                            'image' => '/images/exercises/people.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Children',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'children',
                                        'childs',
                                        'childrens',
                                        'child',
                                    ],
                                    'sentence' => 'Three ____ are playing in the park.',
                                    'correct_answer' => 'children',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'working',
                                        'The',
                                        'men',
                                        'are',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'men',
                                        'are',
                                        'working',
                                    ],
                                    'target_sentence' => 'The men are working',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'talking',
                                        'Two',
                                        'women',
                                        'are',
                                    ],
                                    'correct_order' => [
                                        'Two',
                                        'women',
                                        'are',
                                        'talking',
                                    ],
                                    'target_sentence' => 'Two women are talking',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The children are happy',
                                        'The childs are happy',
                                        'The child are happy',
                                        'The children is happy',
                                    ],
                                    'audio_url' => '/audio/exercises/the-children-are-happy.mp3',
                                    'audio_text' => 'The children are happy',
                                    'correct_answer' => 'The children are happy',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'mice',
                                        'mouses',
                                        'mices',
                                        'mouse',
                                    ],
                                    'question' => 'What is the plural of "mouse"?',
                                    'correct_answer' => 'mice',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Using A and An',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Egg',
                                    'options' => [
                                        [
                                            'text' => 'Egg',
                                            'image' => '/images/exercises/egg.png',
                                        ],
                                        [
                                            'text' => 'Ball',
                                            'image' => '/images/exercises/ball.png',
                                        ],
                                        [
                                            'text' => 'Cup',
                                            'image' => '/images/exercises/cup.png',
                                        ],
                                        [
                                            'text' => 'Dog',
                                            'image' => '/images/exercises/dog.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Egg',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'an',
                                        'a',
                                        'the',
                                        'some',
                                    ],
                                    'sentence' => 'I saw ____ elephant at the zoo.',
                                    'correct_answer' => 'an',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'umbrella',
                                        'She',
                                        'an',
                                        'has',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'has',
                                        'an',
                                        'umbrella',
                                    ],
                                    'target_sentence' => 'She has an umbrella',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'He is an honest man',
                                        'He is a honest man',
                                        'He is an honesty man',
                                        'He is the honest man',
                                    ],
                                    'audio_url' => '/audio/exercises/he-is-an-honest-man.mp3',
                                    'audio_text' => 'He is an honest man',
                                    'correct_answer' => 'He is an honest man',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'an',
                                        'a',
                                        'the',
                                        'no article',
                                    ],
                                    'question' => 'Which article goes before "hour"?',
                                    'correct_answer' => 'an',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'a',
                                        'an',
                                        'the',
                                        'no article',
                                    ],
                                    'question' => 'Which article goes before "book"?',
                                    'correct_answer' => 'a',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Using The (Definite Article)',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sun',
                                    'options' => [
                                        [
                                            'text' => 'Sun',
                                            'image' => '/images/exercises/sun.png',
                                        ],
                                        [
                                            'text' => 'Moon',
                                            'image' => '/images/exercises/moon.png',
                                        ],
                                        [
                                            'text' => 'Star',
                                            'image' => '/images/exercises/star.png',
                                        ],
                                        [
                                            'text' => 'Sky',
                                            'image' => '/images/exercises/sky.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sun',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Moon',
                                    'options' => [
                                        [
                                            'text' => 'Moon',
                                            'image' => '/images/exercises/moon.png',
                                        ],
                                        [
                                            'text' => 'Sun',
                                            'image' => '/images/exercises/sun.png',
                                        ],
                                        [
                                            'text' => 'Cloud',
                                            'image' => '/images/exercises/cloud.png',
                                        ],
                                        [
                                            'text' => 'Star',
                                            'image' => '/images/exercises/star.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Moon',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'The',
                                        'A',
                                        'An',
                                        'Some',
                                    ],
                                    'sentence' => '____ sun is very bright today.',
                                    'correct_answer' => 'The',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bright',
                                        'The',
                                        'moon',
                                        'is',
                                        'tonight',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'moon',
                                        'is',
                                        'bright',
                                        'tonight',
                                    ],
                                    'target_sentence' => 'The moon is bright tonight',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Please close the door',
                                        'Please close a door',
                                        'Please close an door',
                                        'Please close doors',
                                    ],
                                    'audio_url' => '/audio/exercises/please-close-the-door.mp3',
                                    'audio_text' => 'Please close the door',
                                    'correct_answer' => 'Please close the door',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'When we talk about a specific thing',
                                        'When we talk about any one thing',
                                        'Before plural nouns only',
                                        'Before names only',
                                    ],
                                    'question' => 'When do we use "the"?',
                                    'correct_answer' => 'When we talk about a specific thing',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: This and That (Singular Demonstratives)',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'This',
                                    'options' => [
                                        [
                                            'text' => 'This',
                                            'image' => '/images/exercises/this.png',
                                        ],
                                        [
                                            'text' => 'That',
                                            'image' => '/images/exercises/that.png',
                                        ],
                                        [
                                            'text' => 'These',
                                            'image' => '/images/exercises/these.png',
                                        ],
                                        [
                                            'text' => 'Those',
                                            'image' => '/images/exercises/those.png',
                                        ],
                                    ],
                                    'correct_answer' => 'This',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'This',
                                        'That',
                                        'These',
                                        'Those',
                                    ],
                                    'sentence' => '____ is my book.',
                                    'correct_answer' => 'This',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'car',
                                        'That',
                                        'is',
                                        'your',
                                    ],
                                    'correct_order' => [
                                        'That',
                                        'is',
                                        'your',
                                        'car',
                                    ],
                                    'target_sentence' => 'That is your car',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This is my phone',
                                        'That is my phone',
                                        'These are my phones',
                                        'Those are my phones',
                                    ],
                                    'audio_url' => '/audio/exercises/this-is-my-phone.mp3',
                                    'audio_text' => 'This is my phone',
                                    'correct_answer' => 'This is my phone',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That is her house',
                                        'This is her house',
                                        'Those are her houses',
                                        'These are her houses',
                                    ],
                                    'audio_url' => '/audio/exercises/that-is-her-house.mp3',
                                    'audio_text' => 'That is her house',
                                    'correct_answer' => 'That is her house',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'That',
                                        'This',
                                        'These',
                                        'Those',
                                    ],
                                    'question' => 'Which word do we use for something far away (singular)?',
                                    'correct_answer' => 'That',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: These and Those (Plural Demonstratives)',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'These',
                                    'options' => [
                                        [
                                            'text' => 'These',
                                            'image' => '/images/exercises/these.png',
                                        ],
                                        [
                                            'text' => 'Those',
                                            'image' => '/images/exercises/those.png',
                                        ],
                                        [
                                            'text' => 'This',
                                            'image' => '/images/exercises/this.png',
                                        ],
                                        [
                                            'text' => 'That',
                                            'image' => '/images/exercises/that.png',
                                        ],
                                    ],
                                    'correct_answer' => 'These',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'These',
                                        'Those',
                                        'This',
                                        'That',
                                    ],
                                    'sentence' => '____ are my shoes.',
                                    'correct_answer' => 'These',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'friends',
                                        'These',
                                        'are',
                                        'my',
                                    ],
                                    'correct_order' => [
                                        'These',
                                        'are',
                                        'my',
                                        'friends',
                                    ],
                                    'target_sentence' => 'These are my friends',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cars',
                                        'Those',
                                        'are',
                                        'their',
                                    ],
                                    'correct_order' => [
                                        'Those',
                                        'are',
                                        'their',
                                        'cars',
                                    ],
                                    'target_sentence' => 'Those are their cars',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Those are beautiful flowers',
                                        'These are beautiful flowers',
                                        'That is a beautiful flower',
                                        'This is a beautiful flower',
                                    ],
                                    'audio_url' => '/audio/exercises/those-are-beautiful-flowers.mp3',
                                    'audio_text' => 'Those are beautiful flowers',
                                    'correct_answer' => 'Those are beautiful flowers',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Those',
                                        'These',
                                        'That',
                                        'This',
                                    ],
                                    'question' => 'Which word do we use for things far away (plural)?',
                                    'correct_answer' => 'Those',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
