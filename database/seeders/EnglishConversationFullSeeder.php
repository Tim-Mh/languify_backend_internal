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
 * TRANSLATION TEMPLATE — full English "Conversation" chapter
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
class EnglishConversationFullSeeder extends Seeder
{
    private const LANGUAGE_CODE = 'en';

    public function run(): void
    {
        $language = Language::where('code', self::LANGUAGE_CODE)->firstOrFail();

        $chapter = Chapter::firstOrCreate(
            ['language_id' => $language->id, 'chapter_key' => ChapterKey::Conversation],
            ['title' => 'Conversation', 'order_number' => 2]
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
                'title' => 'Unit 1: Introducing Yourself',
                'order' => 1,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Basic Introductions',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Name',
                                    'options' => [
                                        [
                                            'text' => 'Name',
                                            'image' => '/images/exercises/name.png',
                                        ],
                                        [
                                            'text' => 'Age',
                                            'image' => '/images/exercises/age.png',
                                        ],
                                        [
                                            'text' => 'City',
                                            'image' => '/images/exercises/city.png',
                                        ],
                                        [
                                            'text' => 'Country',
                                            'image' => '/images/exercises/country.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Name',
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
                                    'sentence' => 'My name ____ Ali.',
                                    'correct_answer' => 'is',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'Sara',
                                        'My',
                                        'name',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'name',
                                        'is',
                                        'Sara',
                                    ],
                                    'target_sentence' => 'My name is Sara',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Nice to meet you',
                                        'Good morning',
                                        'See you later',
                                        'Thank you',
                                    ],
                                    'audio_url' => '/audio/exercises/nice-to-meet-you.mp3',
                                    'audio_text' => 'Nice to meet you',
                                    'correct_answer' => 'Nice to meet you',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'nice to meet you',
                                    'options' => [
                                        'A greeting when you meet someone',
                                        'A goodbye phrase',
                                        'A question',
                                        'A number',
                                    ],
                                    'correct_answer' => 'A greeting when you meet someone',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Talking About Yourself',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Age',
                                    'options' => [
                                        [
                                            'text' => 'Age',
                                            'image' => '/images/exercises/age.png',
                                        ],
                                        [
                                            'text' => 'Job',
                                            'image' => '/images/exercises/job.png',
                                        ],
                                        [
                                            'text' => 'Hobby',
                                            'image' => '/images/exercises/hobby.png',
                                        ],
                                        [
                                            'text' => 'Home',
                                            'image' => '/images/exercises/home.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Age',
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
                                    'sentence' => 'I ____ from Pakistan.',
                                    'correct_answer' => 'am',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'old',
                                        'I',
                                        'am',
                                        'twenty',
                                        'years',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'am',
                                        'twenty',
                                        'years',
                                        'old',
                                    ],
                                    'target_sentence' => 'I am twenty years old',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I am a student',
                                        'I am a teacher',
                                        'I am a doctor',
                                        'I am a driver',
                                    ],
                                    'audio_url' => '/audio/exercises/i-am-a-student.mp3',
                                    'audio_text' => 'I am a student',
                                    'correct_answer' => 'I am a student',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'hobby',
                                    'options' => [
                                        'An activity you enjoy',
                                        'A type of job',
                                        'A place',
                                        'A number',
                                    ],
                                    'correct_answer' => 'An activity you enjoy',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 2: Asking Questions',
                'order' => 2,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Simple Questions',
                        'order' => 1,
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
                                        'Why',
                                    ],
                                    'sentence' => '____ are you from?',
                                    'correct_answer' => 'Where',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'name',
                                        'What',
                                        'your',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'is',
                                        'your',
                                        'name',
                                    ],
                                    'target_sentence' => 'What is your name',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How are you?',
                                        'What is this?',
                                        'Where are you?',
                                        'Who are you?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-are-you.mp3',
                                    'audio_text' => 'How are you?',
                                    'correct_answer' => 'How are you?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Manner or condition',
                                        'A place',
                                        'A time',
                                        'A person',
                                    ],
                                    'question' => 'What does "how" ask about?',
                                    'correct_answer' => 'Manner or condition',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Answering Questions',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Yes',
                                    'options' => [
                                        [
                                            'text' => 'Yes',
                                            'image' => '/images/exercises/yes.png',
                                        ],
                                        [
                                            'text' => 'No',
                                            'image' => '/images/exercises/no.png',
                                        ],
                                        [
                                            'text' => 'Maybe',
                                            'image' => '/images/exercises/maybe.png',
                                        ],
                                        [
                                            'text' => 'Sure',
                                            'image' => '/images/exercises/sure.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Yes',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Yes',
                                        'No',
                                        'Not',
                                        'Never',
                                    ],
                                    'sentence' => '____ I am fine.',
                                    'correct_answer' => 'Yes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'well',
                                        'I',
                                        'am',
                                        'doing',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'am',
                                        'doing',
                                        'well',
                                    ],
                                    'target_sentence' => 'I am doing well',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I don\'t know',
                                        'I am here',
                                        'I like it',
                                        'I am busy',
                                    ],
                                    'audio_url' => '/audio/exercises/i-dont-know.mp3',
                                    'audio_text' => 'I don\'t know',
                                    'correct_answer' => 'I don\'t know',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'maybe',
                                    'options' => [
                                        'Possibly',
                                        'Definitely',
                                        'Never',
                                        'Always',
                                    ],
                                    'correct_answer' => 'Possibly',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 3: Making Plans',
                'order' => 3,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Suggesting Activities',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Movie',
                                    'options' => [
                                        [
                                            'text' => 'Movie',
                                            'image' => '/images/exercises/movie.png',
                                        ],
                                        [
                                            'text' => 'Park',
                                            'image' => '/images/exercises/park.png',
                                        ],
                                        [
                                            'text' => 'Cafe',
                                            'image' => '/images/exercises/cafe.png',
                                        ],
                                        [
                                            'text' => 'Gym',
                                            'image' => '/images/exercises/gym.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Movie',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'park',
                                        'parks',
                                        'parking',
                                        'parked',
                                    ],
                                    'sentence' => 'Let\'s go to the ____.',
                                    'correct_answer' => 'park',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'movie',
                                        'Let\'s',
                                        'a',
                                        'watch',
                                    ],
                                    'correct_order' => [
                                        'Let\'s',
                                        'watch',
                                        'a',
                                        'movie',
                                    ],
                                    'target_sentence' => 'Let\'s watch a movie',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you want to come?',
                                        'I am busy today',
                                        'See you tomorrow',
                                        'Thank you',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-want-to-come.mp3',
                                    'audio_text' => 'Do you want to come?',
                                    'correct_answer' => 'Do you want to come?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'let\'s',
                                    'options' => [
                                        'Let us (a suggestion)',
                                        'A question',
                                        'A goodbye',
                                        'A name',
                                    ],
                                    'correct_answer' => 'Let us (a suggestion)',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Confirming Plans',
                        'order' => 2,
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
                                            'text' => 'Today',
                                            'image' => '/images/exercises/today.png',
                                        ],
                                        [
                                            'text' => 'Yesterday',
                                            'image' => '/images/exercises/yesterday.png',
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
                                        'tomorrow',
                                        'tomorrows',
                                        'tomorrowing',
                                        'tomorrowed',
                                    ],
                                    'sentence' => 'See you ____.',
                                    'correct_answer' => 'tomorrow',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'soon',
                                        'I',
                                        'will',
                                        'see',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'will',
                                        'see',
                                        'you',
                                        'soon',
                                    ],
                                    'target_sentence' => 'I will see you soon',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That sounds great',
                                        'I am not sure',
                                        'Maybe later',
                                        'No thanks',
                                    ],
                                    'audio_url' => '/audio/exercises/that-sounds-great.mp3',
                                    'audio_text' => 'That sounds great',
                                    'correct_answer' => 'That sounds great',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'sounds great',
                                    'options' => [
                                        'That seems like a good idea',
                                        'That is loud',
                                        'That is a song',
                                        'That is wrong',
                                    ],
                                    'correct_answer' => 'That seems like a good idea',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 4: Talking About Feelings',
                'order' => 4,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Basic Emotions Vocabulary',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Happy',
                                    'options' => [
                                        [
                                            'text' => 'Happy',
                                            'image' => '/images/exercises/happy.png',
                                        ],
                                        [
                                            'text' => 'Sad',
                                            'image' => '/images/exercises/sad.png',
                                        ],
                                        [
                                            'text' => 'Angry',
                                            'image' => '/images/exercises/angry.png',
                                        ],
                                        [
                                            'text' => 'Tired',
                                            'image' => '/images/exercises/tired.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Happy',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sad',
                                    'options' => [
                                        [
                                            'text' => 'Sad',
                                            'image' => '/images/exercises/sad.png',
                                        ],
                                        [
                                            'text' => 'Happy',
                                            'image' => '/images/exercises/happy.png',
                                        ],
                                        [
                                            'text' => 'Excited',
                                            'image' => '/images/exercises/excited.png',
                                        ],
                                        [
                                            'text' => 'Scared',
                                            'image' => '/images/exercises/scared.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sad',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'happy',
                                        'happiness',
                                        'happily',
                                        'happier',
                                    ],
                                    'sentence' => 'I am very ____ today.',
                                    'correct_answer' => 'happy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'I',
                                        'happy',
                                        'feel',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'feel',
                                        'happy',
                                        'today',
                                    ],
                                    'target_sentence' => 'I feel happy today',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Angry',
                                        'Happy',
                                        'Sad',
                                        'Tired',
                                    ],
                                    'audio_url' => '/audio/exercises/angry.mp3',
                                    'audio_text' => 'Angry',
                                    'correct_answer' => 'Angry',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'tired',
                                    'options' => [
                                        'Needing rest',
                                        'Feeling joyful',
                                        'Feeling scared',
                                        'Feeling angry',
                                    ],
                                    'correct_answer' => 'Needing rest',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Saying How You Feel',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Excited',
                                    'options' => [
                                        [
                                            'text' => 'Excited',
                                            'image' => '/images/exercises/excited.png',
                                        ],
                                        [
                                            'text' => 'Bored',
                                            'image' => '/images/exercises/bored.png',
                                        ],
                                        [
                                            'text' => 'Nervous',
                                            'image' => '/images/exercises/nervous.png',
                                        ],
                                        [
                                            'text' => 'Calm',
                                            'image' => '/images/exercises/calm.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Excited',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'feel',
                                        'feels',
                                        'feeling',
                                        'felt',
                                    ],
                                    'sentence' => 'I ____ excited about the trip.',
                                    'correct_answer' => 'feel',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'is',
                                        'am',
                                        'are',
                                        'be',
                                    ],
                                    'sentence' => 'She ____ happy today.',
                                    'correct_answer' => 'is',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'exam',
                                        'I',
                                        'feel',
                                        'the',
                                        'nervous',
                                        'about',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'feel',
                                        'nervous',
                                        'about',
                                        'the',
                                        'exam',
                                    ],
                                    'target_sentence' => 'I feel nervous about the exam',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I am feeling great',
                                        'I am feeling sick',
                                        'I am feeling bored',
                                        'I am feeling scared',
                                    ],
                                    'audio_url' => '/audio/exercises/i-am-feeling-great.mp3',
                                    'audio_text' => 'I am feeling great',
                                    'correct_answer' => 'I am feeling great',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I feel calm.',
                                        'I feels calm.',
                                        'I am feel calm.',
                                        'I calm feel.',
                                    ],
                                    'question' => 'Which sentence correctly says how you feel?',
                                    'correct_answer' => 'I feel calm.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Asking How Someone Feels',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Worried',
                                    'options' => [
                                        [
                                            'text' => 'Worried',
                                            'image' => '/images/exercises/worried.png',
                                        ],
                                        [
                                            'text' => 'Relaxed',
                                            'image' => '/images/exercises/relaxed.png',
                                        ],
                                        [
                                            'text' => 'Proud',
                                            'image' => '/images/exercises/proud.png',
                                        ],
                                        [
                                            'text' => 'Jealous',
                                            'image' => '/images/exercises/jealous.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Worried',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'How',
                                        'What',
                                        'Who',
                                        'Why',
                                    ],
                                    'sentence' => '____ are you feeling today?',
                                    'correct_answer' => 'How',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'How',
                                        'feeling',
                                        'are',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'How',
                                        'are',
                                        'you',
                                        'feeling',
                                        'today',
                                    ],
                                    'target_sentence' => 'How are you feeling today',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'all',
                                        'Is',
                                        'right',
                                        'everything',
                                    ],
                                    'correct_order' => [
                                        'Is',
                                        'everything',
                                        'all',
                                        'right',
                                    ],
                                    'target_sentence' => 'Is everything all right',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'What\'s wrong?',
                                        'I\'m fine, thanks.',
                                        'See you later.',
                                        'Good morning.',
                                    ],
                                    'audio_url' => '/audio/exercises/whats-wrong.mp3',
                                    'audio_text' => 'What\'s wrong?',
                                    'correct_answer' => 'What\'s wrong?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'How are you feeling?',
                                        'Where are you going?',
                                        'What is your name?',
                                        'How old are you?',
                                    ],
                                    'question' => 'What is a polite way to ask about someone\'s feelings?',
                                    'correct_answer' => 'How are you feeling?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Explaining Why You Feel That Way',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Proud',
                                    'options' => [
                                        [
                                            'text' => 'Proud',
                                            'image' => '/images/exercises/proud.png',
                                        ],
                                        [
                                            'text' => 'Ashamed',
                                            'image' => '/images/exercises/ashamed.png',
                                        ],
                                        [
                                            'text' => 'Grateful',
                                            'image' => '/images/exercises/grateful.png',
                                        ],
                                        [
                                            'text' => 'Jealous',
                                            'image' => '/images/exercises/jealous.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Proud',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'because',
                                        'but',
                                        'so',
                                        'or',
                                    ],
                                    'sentence' => 'I feel proud ____ I passed the test.',
                                    'correct_answer' => 'because',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'work',
                                        'I',
                                        'feel',
                                        'tired',
                                        'because',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'feel',
                                        'tired',
                                        'because',
                                        'of',
                                        'work',
                                    ],
                                    'target_sentence' => 'I feel tired because of work',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I feel happy because it is sunny',
                                        'I feel sad because it is raining',
                                        'I feel tired because of work',
                                        'I feel proud because I passed',
                                    ],
                                    'audio_url' => '/audio/exercises/i-feel-happy-because-it-is-sunny.mp3',
                                    'audio_text' => 'I feel happy because it is sunny',
                                    'correct_answer' => 'I feel happy because it is sunny',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'She feels sad because she lost her keys',
                                        'She feels happy because she found her keys',
                                        'She feels angry because she is late',
                                        'She feels calm because she is resting',
                                    ],
                                    'audio_url' => '/audio/exercises/she-feels-sad-because-she-lost-her-keys.mp3',
                                    'audio_text' => 'She feels sad because she lost her keys',
                                    'correct_answer' => 'She feels sad because she lost her keys',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'because',
                                        'however',
                                        'although',
                                        'maybe',
                                    ],
                                    'question' => 'Which word means "for this reason"?',
                                    'correct_answer' => 'because',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Describing the Strength of a Feeling',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Furious',
                                    'options' => [
                                        [
                                            'text' => 'Furious',
                                            'image' => '/images/exercises/furious.png',
                                        ],
                                        [
                                            'text' => 'Annoyed',
                                            'image' => '/images/exercises/annoyed.png',
                                        ],
                                        [
                                            'text' => 'Content',
                                            'image' => '/images/exercises/content.png',
                                        ],
                                        [
                                            'text' => 'Relieved',
                                            'image' => '/images/exercises/relieved.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Furious',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'little',
                                        'lot',
                                        'many',
                                        'much',
                                    ],
                                    'sentence' => 'I am a ____ nervous about the interview.',
                                    'correct_answer' => 'little',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'now',
                                        'I',
                                        'am',
                                        'much',
                                        'happier',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'am',
                                        'much',
                                        'happier',
                                        'now',
                                    ],
                                    'target_sentence' => 'I am much happier now',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I feel a bit anxious',
                                        'I feel extremely calm',
                                        'I feel very excited',
                                        'I feel completely relaxed',
                                    ],
                                    'audio_url' => '/audio/exercises/i-feel-a-bit-anxious.mp3',
                                    'audio_text' => 'I feel a bit anxious',
                                    'correct_answer' => 'I feel a bit anxious',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'happier',
                                        'happyer',
                                        'more happy',
                                        'happiest',
                                    ],
                                    'question' => 'What is the comparative form of "happy"?',
                                    'correct_answer' => 'happier',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I am extremely excited.',
                                        'I am a little excited.',
                                        'I am somewhat excited.',
                                        'I am slightly excited.',
                                    ],
                                    'question' => 'Which sentence shows a stronger feeling?',
                                    'correct_answer' => 'I am extremely excited.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Talking About Past Feelings',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Relieved',
                                    'options' => [
                                        [
                                            'text' => 'Relieved',
                                            'image' => '/images/exercises/relieved.png',
                                        ],
                                        [
                                            'text' => 'Disappointed',
                                            'image' => '/images/exercises/disappointed.png',
                                        ],
                                        [
                                            'text' => 'Embarrassed',
                                            'image' => '/images/exercises/embarrassed.png',
                                        ],
                                        [
                                            'text' => 'Confused',
                                            'image' => '/images/exercises/confused.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Relieved',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Disappointed',
                                    'options' => [
                                        [
                                            'text' => 'Disappointed',
                                            'image' => '/images/exercises/disappointed.png',
                                        ],
                                        [
                                            'text' => 'Relieved',
                                            'image' => '/images/exercises/relieved.png',
                                        ],
                                        [
                                            'text' => 'Proud',
                                            'image' => '/images/exercises/proud.png',
                                        ],
                                        [
                                            'text' => 'Grateful',
                                            'image' => '/images/exercises/grateful.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Disappointed',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'felt',
                                        'feel',
                                        'feeling',
                                        'feels',
                                    ],
                                    'sentence' => 'Yesterday, I ____ very tired after work.',
                                    'correct_answer' => 'felt',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'test',
                                        'She',
                                        'was',
                                        'nervous',
                                        'before',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'was',
                                        'nervous',
                                        'before',
                                        'the',
                                        'test',
                                    ],
                                    'target_sentence' => 'She was nervous before the test',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We were excited about the trip',
                                        'We are excited about the trip',
                                        'We will be excited about the trip',
                                        'We excited about the trip',
                                    ],
                                    'audio_url' => '/audio/exercises/we-were-excited-about-the-trip.mp3',
                                    'audio_text' => 'We were excited about the trip',
                                    'correct_answer' => 'We were excited about the trip',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'felt',
                                        'feeled',
                                        'feels',
                                        'feeling',
                                    ],
                                    'question' => 'What is the past tense of "feel"?',
                                    'correct_answer' => 'felt',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 5: Past Tense Conversations',
                'order' => 5,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Talking About Yesterday',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Yesterday',
                                    'options' => [
                                        [
                                            'text' => 'Yesterday',
                                            'image' => '/images/exercises/yesterday.png',
                                        ],
                                        [
                                            'text' => 'Today',
                                            'image' => '/images/exercises/today.png',
                                        ],
                                        [
                                            'text' => 'Tomorrow',
                                            'image' => '/images/exercises/tomorrow.png',
                                        ],
                                        [
                                            'text' => 'Now',
                                            'image' => '/images/exercises/now.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Yesterday',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'finished',
                                        'finish',
                                        'finishing',
                                        'finishes',
                                    ],
                                    'sentence' => 'I ____ my homework yesterday.',
                                    'correct_answer' => 'finished',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'dinner',
                                        'She',
                                        'yesterday',
                                        'cooked',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'cooked',
                                        'dinner',
                                        'yesterday',
                                    ],
                                    'target_sentence' => 'She cooked dinner yesterday',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I walked to school yesterday',
                                        'I walk to school today',
                                        'I will walk to school tomorrow',
                                        'I am walking to school now',
                                    ],
                                    'audio_url' => '/audio/exercises/i-walked-to-school-yesterday.mp3',
                                    'audio_text' => 'I walked to school yesterday',
                                    'correct_answer' => 'I walked to school yesterday',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'We watched a movie last night',
                                        'We watch a movie every night',
                                        'We will watch a movie tonight',
                                        'We are watching a movie now',
                                    ],
                                    'question' => 'Which sentence is in the simple past tense?',
                                    'correct_answer' => 'We watched a movie last night',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'played',
                                        'play',
                                        'plays',
                                        'playing',
                                    ],
                                    'sentence' => 'They ____ the game yesterday afternoon.',
                                    'correct_answer' => 'played',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Irregular Past Tense Verbs',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Went',
                                    'options' => [
                                        [
                                            'text' => 'Went',
                                            'image' => '/images/exercises/went.png',
                                        ],
                                        [
                                            'text' => 'Ate',
                                            'image' => '/images/exercises/ate.png',
                                        ],
                                        [
                                            'text' => 'Saw',
                                            'image' => '/images/exercises/saw.png',
                                        ],
                                        [
                                            'text' => 'Had',
                                            'image' => '/images/exercises/had.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Went',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'went',
                                        'goed',
                                        'go',
                                        'going',
                                    ],
                                    'sentence' => 'Yesterday, I ____ to the market.',
                                    'correct_answer' => 'went',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'pizza',
                                        'We',
                                        'last',
                                        'night',
                                        'ate',
                                    ],
                                    'correct_order' => [
                                        'We',
                                        'ate',
                                        'pizza',
                                        'last',
                                        'night',
                                    ],
                                    'target_sentence' => 'We ate pizza last night',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'She saw a movie last week',
                                        'She sees a movie every week',
                                        'She will see a movie next week',
                                        'She is seeing a movie now',
                                    ],
                                    'audio_url' => '/audio/exercises/she-saw-a-movie-last-week.mp3',
                                    'audio_text' => 'She saw a movie last week',
                                    'correct_answer' => 'She saw a movie last week',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Ate',
                                        'Eated',
                                        'Eaten',
                                        'Eating',
                                    ],
                                    'question' => 'What is the past tense of "eat"?',
                                    'correct_answer' => 'Ate',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'breakfast',
                                        'He',
                                        'at',
                                        'seven',
                                        'had',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'had',
                                        'breakfast',
                                        'at',
                                        'seven',
                                    ],
                                    'target_sentence' => 'He had breakfast at seven',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Asking Questions About the Past',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Did',
                                    'options' => [
                                        [
                                            'text' => 'Did',
                                            'image' => '/images/exercises/did.png',
                                        ],
                                        [
                                            'text' => 'Do',
                                            'image' => '/images/exercises/do.png',
                                        ],
                                        [
                                            'text' => 'Does',
                                            'image' => '/images/exercises/does.png',
                                        ],
                                        [
                                            'text' => 'Doing',
                                            'image' => '/images/exercises/doing.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Did',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Did',
                                        'Do',
                                        'Does',
                                        'Done',
                                    ],
                                    'sentence' => '____ you call me last night?',
                                    'correct_answer' => 'Did',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'homework',
                                        'Did',
                                        'you',
                                        'finish',
                                        'your',
                                    ],
                                    'correct_order' => [
                                        'Did',
                                        'you',
                                        'finish',
                                        'your',
                                        'homework',
                                    ],
                                    'target_sentence' => 'Did you finish your homework',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Did you sleep well last night?',
                                        'Do you sleep well every night?',
                                        'Will you sleep well tonight?',
                                        'Are you sleeping well now?',
                                    ],
                                    'audio_url' => '/audio/exercises/did-you-sleep-well-last-night.mp3',
                                    'audio_text' => 'Did you sleep well last night?',
                                    'correct_answer' => 'Did you sleep well last night?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Did she visit her parents?',
                                        'Does she visit her parents?',
                                        'Will she visit her parents?',
                                        'Is she visiting her parents?',
                                    ],
                                    'question' => 'Which question asks about the past?',
                                    'correct_answer' => 'Did she visit her parents?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Did + subject + base verb',
                                        'Do + subject + base verb',
                                        'Subject + verb + ed',
                                        'Will + subject + verb',
                                    ],
                                    'question' => 'How do we form a yes/no question in the simple past?',
                                    'correct_answer' => 'Did + subject + base verb',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Negative Past Tense Sentences',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Didn\'t',
                                    'options' => [
                                        [
                                            'text' => 'Didn\'t',
                                            'image' => '/images/exercises/didnt.png',
                                        ],
                                        [
                                            'text' => 'Do not',
                                            'image' => '/images/exercises/do-not.png',
                                        ],
                                        [
                                            'text' => 'Does not',
                                            'image' => '/images/exercises/does-not.png',
                                        ],
                                        [
                                            'text' => 'Won\'t',
                                            'image' => '/images/exercises/wont.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Didn\'t',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'didn\'t',
                                        'not',
                                        'no',
                                        'never',
                                    ],
                                    'sentence' => 'I ____ go to work yesterday because I was sick.',
                                    'correct_answer' => 'didn\'t',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'call',
                                        'She',
                                        'not',
                                        'did',
                                        'me',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'did',
                                        'not',
                                        'call',
                                        'me',
                                    ],
                                    'target_sentence' => 'She did not call me',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We didn\'t watch TV last night',
                                        'We watch TV every night',
                                        'We will watch TV tonight',
                                        'We aren\'t watching TV now',
                                    ],
                                    'audio_url' => '/audio/exercises/we-didnt-watch-tv-last-night.mp3',
                                    'audio_text' => 'We didn\'t watch TV last night',
                                    'correct_answer' => 'We didn\'t watch TV last night',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'He didn\'t play football',
                                        'He not played football',
                                        'He doesn\'t play football',
                                        'He isn\'t playing football',
                                    ],
                                    'question' => 'What is the negative form of "He played football"?',
                                    'correct_answer' => 'He didn\'t play football',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'They didn\'t finish the project on time',
                                        'They finish the project on time',
                                        'They will finish the project on time',
                                        'They aren\'t finishing the project',
                                    ],
                                    'audio_url' => '/audio/exercises/they-didnt-finish-the-project-on-time.mp3',
                                    'audio_text' => 'They didn\'t finish the project on time',
                                    'correct_answer' => 'They didn\'t finish the project on time',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Time Expressions: Last Week and Ago',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Ago',
                                    'options' => [
                                        [
                                            'text' => 'Ago',
                                            'image' => '/images/exercises/ago.png',
                                        ],
                                        [
                                            'text' => 'Last',
                                            'image' => '/images/exercises/last.png',
                                        ],
                                        [
                                            'text' => 'Next',
                                            'image' => '/images/exercises/next.png',
                                        ],
                                        [
                                            'text' => 'Every',
                                            'image' => '/images/exercises/every.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Ago',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'ago',
                                        'before',
                                        'last',
                                        'past',
                                    ],
                                    'sentence' => 'I visited my grandmother two days ____.',
                                    'correct_answer' => 'ago',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'Lahore',
                                        'We',
                                        'last',
                                        'month',
                                        'traveled',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'We',
                                        'traveled',
                                        'to',
                                        'Lahore',
                                        'last',
                                        'month',
                                    ],
                                    'target_sentence' => 'We traveled to Lahore last month',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I met him last week',
                                        'I meet him every week',
                                        'I will meet him next week',
                                        'I am meeting him now',
                                    ],
                                    'audio_url' => '/audio/exercises/i-met-him-last-week.mp3',
                                    'audio_text' => 'I met him last week',
                                    'correct_answer' => 'I met him last week',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Last week',
                                        'Next week',
                                        'Every week',
                                        'This week',
                                    ],
                                    'question' => 'Which phrase refers to a time before now?',
                                    'correct_answer' => 'Last week',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Last month',
                                    'options' => [
                                        [
                                            'text' => 'Last month',
                                            'image' => '/images/exercises/last-month.png',
                                        ],
                                        [
                                            'text' => 'Next month',
                                            'image' => '/images/exercises/next-month.png',
                                        ],
                                        [
                                            'text' => 'Every month',
                                            'image' => '/images/exercises/every-month.png',
                                        ],
                                        [
                                            'text' => 'This month',
                                            'image' => '/images/exercises/this-month.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Last month',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Telling a Story in the Past',
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
                                            'text' => 'Then',
                                            'image' => '/images/exercises/then.png',
                                        ],
                                        [
                                            'text' => 'Finally',
                                            'image' => '/images/exercises/finally.png',
                                        ],
                                        [
                                            'text' => 'Next',
                                            'image' => '/images/exercises/next.png',
                                        ],
                                    ],
                                    'correct_answer' => 'First',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Then',
                                        'First',
                                        'Ago',
                                        'Yesterday',
                                    ],
                                    'sentence' => 'First, I woke up. ____, I ate breakfast.',
                                    'correct_answer' => 'Then',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'home',
                                        'After',
                                        'we',
                                        'that',
                                        'went',
                                    ],
                                    'correct_order' => [
                                        'After',
                                        'that',
                                        'we',
                                        'went',
                                        'home',
                                    ],
                                    'target_sentence' => 'After that we went home',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Finally, we arrived at the airport',
                                        'Finally, we arrive at the airport',
                                        'Finally, we will arrive at the airport',
                                        'Finally, we are arriving at the airport',
                                    ],
                                    'audio_url' => '/audio/exercises/finally-we-arrived-at-the-airport.mp3',
                                    'audio_text' => 'Finally, we arrived at the airport',
                                    'correct_answer' => 'Finally, we arrived at the airport',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Then',
                                        'Never',
                                        'Always',
                                        'Often',
                                    ],
                                    'question' => 'Which word helps you tell events in order in a past story?',
                                    'correct_answer' => 'Then',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'then',
                                        'ago',
                                        'never',
                                        'soon',
                                    ],
                                    'sentence' => 'We visited the museum first, and ____ we had lunch.',
                                    'correct_answer' => 'then',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 6: Future Plans & Intentions',
                'order' => 6,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Making Plans with "Going To"',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Trip',
                                    'options' => [
                                        [
                                            'text' => 'Trip',
                                            'image' => '/images/exercises/trip.png',
                                        ],
                                        [
                                            'text' => 'Meeting',
                                            'image' => '/images/exercises/meeting.png',
                                        ],
                                        [
                                            'text' => 'Party',
                                            'image' => '/images/exercises/party.png',
                                        ],
                                        [
                                            'text' => 'Vacation',
                                            'image' => '/images/exercises/vacation.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Trip',
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
                                    'sentence' => 'I ____ going to visit my grandmother next week.',
                                    'correct_answer' => 'am',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'travel',
                                        'I',
                                        'am',
                                        'going',
                                        'to',
                                        'next',
                                        'month',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'am',
                                        'going',
                                        'to',
                                        'travel',
                                        'next',
                                        'month',
                                    ],
                                    'target_sentence' => 'I am going to travel next month',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We are going to have a party',
                                        'We had a party yesterday',
                                        'We like big parties',
                                        'We are at a party now',
                                    ],
                                    'audio_url' => '/audio/exercises/we-are-going-to-have-a-party.mp3',
                                    'audio_text' => 'We are going to have a party',
                                    'correct_answer' => 'We are going to have a party',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I am going to study medicine.',
                                        'I study medicine.',
                                        'I studied medicine.',
                                        'I sometimes study medicine.',
                                    ],
                                    'question' => 'Which sentence shows a plan that is already decided?',
                                    'correct_answer' => 'I am going to study medicine.',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'is',
                                        'am',
                                        'are',
                                        'be',
                                    ],
                                    'sentence' => 'She ____ going to start a new job tomorrow.',
                                    'correct_answer' => 'is',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Sudden Decisions with "Will"',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Promise',
                                    'options' => [
                                        [
                                            'text' => 'Promise',
                                            'image' => '/images/exercises/promise.png',
                                        ],
                                        [
                                            'text' => 'Decision',
                                            'image' => '/images/exercises/decision.png',
                                        ],
                                        [
                                            'text' => 'Offer',
                                            'image' => '/images/exercises/offer.png',
                                        ],
                                        [
                                            'text' => 'Plan',
                                            'image' => '/images/exercises/plan.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Promise',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'will',
                                        'wills',
                                        'willing',
                                        'willed',
                                    ],
                                    'sentence' => 'It\'s raining! I ____ close the window.',
                                    'correct_answer' => 'will',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'help',
                                        'I',
                                        'will',
                                        'you',
                                        'with',
                                        'your',
                                        'bags',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'will',
                                        'help',
                                        'you',
                                        'with',
                                        'your',
                                        'bags',
                                    ],
                                    'target_sentence' => 'I will help you with your bags',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'call',
                                        'She',
                                        'will',
                                        'you',
                                        'later',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'will',
                                        'call',
                                        'you',
                                        'later',
                                    ],
                                    'target_sentence' => 'She will call you later',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I will answer the phone',
                                        'I am going to answer the phone tomorrow',
                                        'I answered the phone already',
                                        'I never answer the phone',
                                    ],
                                    'audio_url' => '/audio/exercises/i-will-answer-the-phone.mp3',
                                    'audio_text' => 'I will answer the phone',
                                    'correct_answer' => 'I will answer the phone',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I will get that for you now.',
                                        'I am going to get that next week.',
                                        'I got that yesterday.',
                                        'I get that every day.',
                                    ],
                                    'question' => 'Which sentence is a decision made at the moment of speaking?',
                                    'correct_answer' => 'I will get that for you now.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Talking About Tomorrow and Next Week',
                        'order' => 3,
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
                                        'week',
                                        'weeks',
                                        'weekly',
                                        'weeked',
                                    ],
                                    'sentence' => 'We are going to travel next ____.',
                                    'correct_answer' => 'week',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'Friday',
                                        'The',
                                        'concert',
                                        'is',
                                        'next',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'concert',
                                        'is',
                                        'next',
                                        'Friday',
                                    ],
                                    'target_sentence' => 'The concert is next Friday',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'See you next week',
                                        'See you tomorrow',
                                        'See you tonight',
                                        'See you later today',
                                    ],
                                    'audio_url' => '/audio/exercises/see-you-next-week.mp3',
                                    'audio_text' => 'See you next week',
                                    'correct_answer' => 'See you next week',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Tomorrow',
                                        'Yesterday',
                                        'Today',
                                        'Tonight',
                                    ],
                                    'question' => 'Which word means the day after today?',
                                    'correct_answer' => 'Tomorrow',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Next month',
                                        'Last month',
                                        'This morning',
                                        'Yesterday',
                                    ],
                                    'question' => 'Which phrase talks about a future time?',
                                    'correct_answer' => 'Next month',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking About Future Plans',
                        'order' => 4,
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
                                            'text' => 'Plan',
                                            'image' => '/images/exercises/plan.png',
                                        ],
                                        [
                                            'text' => 'Idea',
                                            'image' => '/images/exercises/idea.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Question',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Are',
                                        'Is',
                                        'Am',
                                        'Be',
                                    ],
                                    'sentence' => '____ you going to join us tomorrow?',
                                    'correct_answer' => 'Are',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'do',
                                        'What',
                                        'are',
                                        'you',
                                        'going',
                                        'to',
                                        'tomorrow',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'are',
                                        'you',
                                        'going',
                                        'to',
                                        'do',
                                        'tomorrow',
                                    ],
                                    'target_sentence' => 'What are you going to do tomorrow',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Will you come to the meeting?',
                                        'Did you come to the meeting?',
                                        'Are you at the meeting?',
                                        'You came to the meeting.',
                                    ],
                                    'audio_url' => '/audio/exercises/will-you-come-to-the-meeting.mp3',
                                    'audio_text' => 'Will you come to the meeting?',
                                    'correct_answer' => 'Will you come to the meeting?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'What are you going to do next week?',
                                        'What did you do last week?',
                                        'What do you do every week?',
                                        'What were you doing?',
                                    ],
                                    'question' => 'How do you ask about someone\'s future plan?',
                                    'correct_answer' => 'What are you going to do next week?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Are you going to the party tomorrow?',
                                        'Were you at the party yesterday?',
                                        'Do you like parties?',
                                        'I went to the party.',
                                    ],
                                    'audio_url' => '/audio/exercises/are-you-going-to-the-party-tomorrow.mp3',
                                    'audio_text' => 'Are you going to the party tomorrow?',
                                    'correct_answer' => 'Are you going to the party tomorrow?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Weather and Predictions',
                        'order' => 5,
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
                                            'text' => 'Season',
                                            'image' => '/images/exercises/season.png',
                                        ],
                                        [
                                            'text' => 'Climate',
                                            'image' => '/images/exercises/climate.png',
                                        ],
                                        [
                                            'text' => 'Storm',
                                            'image' => '/images/exercises/storm.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Forecast',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'will',
                                        'wills',
                                        'willed',
                                        'willing',
                                    ],
                                    'sentence' => 'I think it ____ rain tomorrow.',
                                    'correct_answer' => 'will',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'sunny',
                                        'It',
                                        'will',
                                        'be',
                                        'next',
                                        'week',
                                    ],
                                    'correct_order' => [
                                        'It',
                                        'will',
                                        'be',
                                        'sunny',
                                        'next',
                                        'week',
                                    ],
                                    'target_sentence' => 'It will be sunny next week',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It will probably snow tonight',
                                        'It snowed last night',
                                        'It is snowing now',
                                        'It never snows here',
                                    ],
                                    'audio_url' => '/audio/exercises/it-will-probably-snow-tonight.mp3',
                                    'audio_text' => 'It will probably snow tonight',
                                    'correct_answer' => 'It will probably snow tonight',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'The weather will be cold next week.',
                                        'The weather was cold last week.',
                                        'The weather is cold today.',
                                        'The weather is never cold here.',
                                    ],
                                    'question' => 'Which sentence makes a prediction about the future?',
                                    'correct_answer' => 'The weather will be cold next week.',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Temperature',
                                    'options' => [
                                        [
                                            'text' => 'Temperature',
                                            'image' => '/images/exercises/temperature.png',
                                        ],
                                        [
                                            'text' => 'Umbrella',
                                            'image' => '/images/exercises/umbrella.png',
                                        ],
                                        [
                                            'text' => 'Cloud',
                                            'image' => '/images/exercises/cloud.png',
                                        ],
                                        [
                                            'text' => 'Rainbow',
                                            'image' => '/images/exercises/rainbow.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Temperature',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Making Arrangements for Next Week',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Appointment',
                                    'options' => [
                                        [
                                            'text' => 'Appointment',
                                            'image' => '/images/exercises/appointment.png',
                                        ],
                                        [
                                            'text' => 'Reminder',
                                            'image' => '/images/exercises/reminder.png',
                                        ],
                                        [
                                            'text' => 'Schedule',
                                            'image' => '/images/exercises/schedule.png',
                                        ],
                                        [
                                            'text' => 'Calendar',
                                            'image' => '/images/exercises/calendar.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Appointment',
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
                                    'sentence' => 'I have ____ appointment with the dentist next Monday.',
                                    'correct_answer' => 'an',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'meet',
                                        'We',
                                        'are',
                                        'going',
                                        'to',
                                        'next',
                                        'Tuesday',
                                    ],
                                    'correct_order' => [
                                        'We',
                                        'are',
                                        'going',
                                        'to',
                                        'meet',
                                        'next',
                                        'Tuesday',
                                    ],
                                    'target_sentence' => 'We are going to meet next Tuesday',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Let\'s schedule the meeting for next week',
                                        'We had the meeting last week',
                                        'The meeting is happening now',
                                        'I forgot about the meeting',
                                    ],
                                    'audio_url' => '/audio/exercises/lets-schedule-the-meeting-for-next-week.mp3',
                                    'audio_text' => 'Let\'s schedule the meeting for next week',
                                    'correct_answer' => 'Let\'s schedule the meeting for next week',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'To change the time of a plan',
                                        'To cancel a plan completely',
                                        'To forget a plan',
                                        'To repeat yesterday\'s plan',
                                    ],
                                    'question' => 'What does \'reschedule\' mean?',
                                    'correct_answer' => 'To change the time of a plan',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'are',
                                        'is',
                                        'am',
                                        'be',
                                    ],
                                    'sentence' => 'They ____ going to visit us next weekend.',
                                    'correct_answer' => 'are',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 7: Giving Directions',
                'order' => 7,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Turning Left and Right',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Left',
                                    'options' => [
                                        [
                                            'text' => 'Left',
                                            'image' => '/images/exercises/left.png',
                                        ],
                                        [
                                            'text' => 'Right',
                                            'image' => '/images/exercises/right.png',
                                        ],
                                        [
                                            'text' => 'Straight',
                                            'image' => '/images/exercises/straight.png',
                                        ],
                                        [
                                            'text' => 'Back',
                                            'image' => '/images/exercises/back.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Left',
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
                                        'light',
                                        'Turn',
                                        'right',
                                        'at',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Turn',
                                        'right',
                                        'at',
                                        'the',
                                        'light',
                                    ],
                                    'target_sentence' => 'Turn right at the light',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Turn left here',
                                        'Turn right here',
                                        'Go straight ahead',
                                        'Stop at the corner',
                                    ],
                                    'audio_url' => '/audio/exercises/turn-left-here.mp3',
                                    'audio_text' => 'Turn left here',
                                    'correct_answer' => 'Turn left here',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Right',
                                        'Straight',
                                        'Near',
                                        'Far',
                                    ],
                                    'question' => 'Which word means the opposite of "left"?',
                                    'correct_answer' => 'Right',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Stop and check for cars',
                                        'Speed up',
                                        'Close your eyes',
                                        'Turn off the engine',
                                    ],
                                    'question' => 'What should you do at a red traffic light before turning?',
                                    'correct_answer' => 'Stop and check for cars',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Going Straight Ahead',
                        'order' => 2,
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
                                            'text' => 'Around',
                                            'image' => '/images/exercises/around.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Straight',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'straight',
                                        'straighter',
                                        'straightest',
                                        'straightened',
                                    ],
                                    'sentence' => 'Go ____ for two blocks.',
                                    'correct_answer' => 'straight',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'straight',
                                        'left',
                                        'right',
                                        'behind',
                                    ],
                                    'sentence' => 'The bank is ____ ahead of you.',
                                    'correct_answer' => 'straight',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bridge',
                                        'Go',
                                        'straight',
                                        'ahead',
                                        'until',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Go',
                                        'straight',
                                        'ahead',
                                        'until',
                                        'the',
                                        'bridge',
                                    ],
                                    'target_sentence' => 'Go straight ahead until the bridge',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Keep going straight',
                                        'Turn left now',
                                        'Turn right now',
                                        'Stop right here',
                                    ],
                                    'audio_url' => '/audio/exercises/keep-going-straight.mp3',
                                    'audio_text' => 'Keep going straight',
                                    'correct_answer' => 'Keep going straight',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'straight ahead',
                                    'options' => [
                                        'Directly in front of you',
                                        'Behind you',
                                        'To the side',
                                        'Underneath',
                                    ],
                                    'correct_answer' => 'Directly in front of you',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Near and Far',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Near',
                                    'options' => [
                                        [
                                            'text' => 'Near',
                                            'image' => '/images/exercises/near.png',
                                        ],
                                        [
                                            'text' => 'Far',
                                            'image' => '/images/exercises/far.png',
                                        ],
                                        [
                                            'text' => 'Left',
                                            'image' => '/images/exercises/left.png',
                                        ],
                                        [
                                            'text' => 'Right',
                                            'image' => '/images/exercises/right.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Near',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'far',
                                        'farther',
                                        'farthest',
                                        'farness',
                                    ],
                                    'sentence' => 'The station is very ____ from here.',
                                    'correct_answer' => 'far',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'house',
                                        'The',
                                        'park',
                                        'is',
                                        'near',
                                        'my',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'park',
                                        'is',
                                        'near',
                                        'my',
                                        'house',
                                    ],
                                    'target_sentence' => 'The park is near my house',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'city',
                                        'The',
                                        'airport',
                                        'is',
                                        'far',
                                        'from',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'airport',
                                        'is',
                                        'far',
                                        'from',
                                        'the',
                                        'city',
                                    ],
                                    'target_sentence' => 'The airport is far from the city',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is not far from here',
                                        'It is very far away',
                                        'It is right next to you',
                                        'It is closed today',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-not-far-from-here.mp3',
                                    'audio_text' => 'It is not far from here',
                                    'correct_answer' => 'It is not far from here',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Near',
                                        'Far',
                                        'Straight',
                                        'Around',
                                    ],
                                    'question' => 'Which word means "a short distance away"?',
                                    'correct_answer' => 'Near',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking for Directions',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Excuse me',
                                    'options' => [
                                        [
                                            'text' => 'Excuse me',
                                            'image' => '/images/exercises/excuse-me.png',
                                        ],
                                        [
                                            'text' => 'Thank you',
                                            'image' => '/images/exercises/thank-you.png',
                                        ],
                                        [
                                            'text' => 'Goodbye',
                                            'image' => '/images/exercises/goodbye.png',
                                        ],
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Excuse me',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Excuse',
                                        'Sorry',
                                        'Please',
                                        'Thanks',
                                    ],
                                    'sentence' => '____ me, how do I get to the museum?',
                                    'correct_answer' => 'Excuse',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bank',
                                        'Excuse',
                                        'me',
                                        'where',
                                        'is',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Excuse',
                                        'me',
                                        'where',
                                        'is',
                                        'the',
                                        'bank',
                                    ],
                                    'target_sentence' => 'Excuse me, where is the bank',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Could you tell me the way to the station?',
                                        'Where were you yesterday?',
                                        'What time is it now?',
                                        'How much does this cost?',
                                    ],
                                    'audio_url' => '/audio/exercises/could-you-tell-me-the-way-to-the-station.mp3',
                                    'audio_text' => 'Could you tell me the way to the station?',
                                    'correct_answer' => 'Could you tell me the way to the station?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How do I get to the library?',
                                        'What is your name?',
                                        'Where do you live?',
                                        'Can I help you?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-do-i-get-to-the-library.mp3',
                                    'audio_text' => 'How do I get to the library?',
                                    'correct_answer' => 'How do I get to the library?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Excuse me, could you help me?',
                                        'Hey, where is it?',
                                        'Tell me now.',
                                        'I need it.',
                                    ],
                                    'question' => 'What is the best way to ask a stranger for directions?',
                                    'correct_answer' => 'Excuse me, could you help me?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Landmarks and Locations',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Bridge',
                                    'options' => [
                                        [
                                            'text' => 'Bridge',
                                            'image' => '/images/exercises/bridge.png',
                                        ],
                                        [
                                            'text' => 'River',
                                            'image' => '/images/exercises/river.png',
                                        ],
                                        [
                                            'text' => 'Church',
                                            'image' => '/images/exercises/church.png',
                                        ],
                                        [
                                            'text' => 'Corner',
                                            'image' => '/images/exercises/corner.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Bridge',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Corner',
                                    'options' => [
                                        [
                                            'text' => 'Corner',
                                            'image' => '/images/exercises/corner.png',
                                        ],
                                        [
                                            'text' => 'Bridge',
                                            'image' => '/images/exercises/bridge.png',
                                        ],
                                        [
                                            'text' => 'Square',
                                            'image' => '/images/exercises/square.png',
                                        ],
                                        [
                                            'text' => 'Tower',
                                            'image' => '/images/exercises/tower.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Corner',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'corner',
                                        'corners',
                                        'cornering',
                                        'cornered',
                                    ],
                                    'sentence' => 'Turn left at the ____.',
                                    'correct_answer' => 'corner',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'church',
                                        'The',
                                        'hotel',
                                        'is',
                                        'next',
                                        'to',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'hotel',
                                        'is',
                                        'next',
                                        'to',
                                        'the',
                                        'church',
                                    ],
                                    'target_sentence' => 'The hotel is next to the church',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is across from the park',
                                        'It is inside the mall',
                                        'It is under the bridge',
                                        'It is behind the school',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-across-from-the-park.mp3',
                                    'audio_text' => 'It is across from the park',
                                    'correct_answer' => 'It is across from the park',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'next to',
                                    'options' => [
                                        'Beside something',
                                        'Far from something',
                                        'Above something',
                                        'Inside something',
                                    ],
                                    'correct_answer' => 'Beside something',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Giving Step-by-Step Directions',
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
                                            'text' => 'Then',
                                            'image' => '/images/exercises/then.png',
                                        ],
                                        [
                                            'text' => 'Finally',
                                            'image' => '/images/exercises/finally.png',
                                        ],
                                        [
                                            'text' => 'Next',
                                            'image' => '/images/exercises/next.png',
                                        ],
                                    ],
                                    'correct_answer' => 'First',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'First',
                                        'Never',
                                        'Ever',
                                        'Fast',
                                    ],
                                    'sentence' => '____, turn left, then go straight.',
                                    'correct_answer' => 'First',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'straight',
                                        'First',
                                        'turn',
                                        'left',
                                        'then',
                                        'go',
                                    ],
                                    'correct_order' => [
                                        'First',
                                        'turn',
                                        'left',
                                        'then',
                                        'go',
                                        'straight',
                                    ],
                                    'target_sentence' => 'First turn left then go straight',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Finally, you will see the store on your right',
                                        'First, turn around and leave',
                                        'Never go that way',
                                        'Stop before the bridge',
                                    ],
                                    'audio_url' => '/audio/exercises/finally-you-will-see-the-store-on-your-right.mp3',
                                    'audio_text' => 'Finally, you will see the store on your right',
                                    'correct_answer' => 'Finally, you will see the store on your right',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Finally',
                                        'First',
                                        'Next',
                                        'Then',
                                    ],
                                    'question' => 'Which word signals the last step in directions?',
                                    'correct_answer' => 'Finally',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Then',
                                        'First',
                                        'Finally',
                                        'Never',
                                    ],
                                    'question' => 'Which word means "after that"?',
                                    'correct_answer' => 'Then',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 8: Phone Conversations',
                'order' => 8,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Answering Calls Politely',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Hello',
                                    'options' => [
                                        [
                                            'text' => 'Hello',
                                            'image' => '/images/exercises/hello.png',
                                        ],
                                        [
                                            'text' => 'Goodbye',
                                            'image' => '/images/exercises/goodbye.png',
                                        ],
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Hello',
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
                                    'sentence' => '____ is Sarah speaking.',
                                    'correct_answer' => 'This',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'speaking',
                                        'This',
                                        'is',
                                        'Ali',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'is',
                                        'Ali',
                                        'speaking',
                                    ],
                                    'target_sentence' => 'This is Ali speaking',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How can I help you?',
                                        'I am busy now',
                                        'Please call later',
                                        'Who is this?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-can-i-help-you.mp3',
                                    'audio_text' => 'How can I help you?',
                                    'correct_answer' => 'How can I help you?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Hello, this is Sarah speaking',
                                        'Goodbye, see you soon',
                                        'I am not home',
                                        'Please wait outside',
                                    ],
                                    'question' => 'What do you say when you answer the phone?',
                                    'correct_answer' => 'Hello, this is Sarah speaking',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'help',
                                        'helps',
                                        'helping',
                                        'helped',
                                    ],
                                    'sentence' => 'Good morning, ABC Company. How can I ____ you?',
                                    'correct_answer' => 'help',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Asking Who Is Calling',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Calling',
                                    'options' => [
                                        [
                                            'text' => 'Calling',
                                            'image' => '/images/exercises/calling.png',
                                        ],
                                        [
                                            'text' => 'Speaking',
                                            'image' => '/images/exercises/speaking.png',
                                        ],
                                        [
                                            'text' => 'Waiting',
                                            'image' => '/images/exercises/waiting.png',
                                        ],
                                        [
                                            'text' => 'Holding',
                                            'image' => '/images/exercises/holding.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Calling',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'May',
                                        'Do',
                                        'Am',
                                        'Is',
                                    ],
                                    'sentence' => '____ I ask who is calling?',
                                    'correct_answer' => 'May',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'please',
                                        'Who',
                                        'is',
                                        'calling',
                                    ],
                                    'correct_order' => [
                                        'Who',
                                        'is',
                                        'calling',
                                        'please',
                                    ],
                                    'target_sentence' => 'Who is calling please',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'May I ask who is calling?',
                                        'Please leave a message',
                                        'I will call you back',
                                        'The line is busy',
                                    ],
                                    'audio_url' => '/audio/exercises/may-i-ask-who-is-calling.mp3',
                                    'audio_text' => 'May I ask who is calling?',
                                    'correct_answer' => 'May I ask who is calling?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'May I ask who is calling?',
                                    'options' => [
                                        'A polite way to ask the caller\'s name',
                                        'A way to end the call',
                                        'A greeting',
                                        'An apology',
                                    ],
                                    'correct_answer' => 'A polite way to ask the caller\'s name',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Who am I speaking to?',
                                        'Who I am speaking to?',
                                        'Who speaking am I to?',
                                        'Am who I speaking to?',
                                    ],
                                    'question' => 'Which sentence correctly asks about the caller\'s identity?',
                                    'correct_answer' => 'Who am I speaking to?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Leaving a Voicemail Message',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Voicemail',
                                    'options' => [
                                        [
                                            'text' => 'Voicemail',
                                            'image' => '/images/exercises/voicemail.png',
                                        ],
                                        [
                                            'text' => 'Text message',
                                            'image' => '/images/exercises/text-message.png',
                                        ],
                                        [
                                            'text' => 'Email',
                                            'image' => '/images/exercises/email.png',
                                        ],
                                        [
                                            'text' => 'Letter',
                                            'image' => '/images/exercises/letter.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Voicemail',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'after',
                                        'before',
                                        'under',
                                        'between',
                                    ],
                                    'sentence' => 'Please leave a message ____ the beep.',
                                    'correct_answer' => 'after',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'back',
                                        'I',
                                        'will',
                                        'call',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'will',
                                        'call',
                                        'you',
                                        'back',
                                    ],
                                    'target_sentence' => 'I will call you back',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Please leave a message after the beep',
                                        'The number you dialed is busy',
                                        'Your call is important to us',
                                        'Please hold the line',
                                    ],
                                    'audio_url' => '/audio/exercises/please-leave-a-message-after-the-beep.mp3',
                                    'audio_text' => 'Please leave a message after the beep',
                                    'correct_answer' => 'Please leave a message after the beep',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Start speaking your message',
                                        'Hang up immediately',
                                        'Dial another number',
                                        'Wait silently',
                                    ],
                                    'question' => 'What should you do when you hear "the beep" on voicemail?',
                                    'correct_answer' => 'Start speaking your message',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'call',
                                        'Sorry',
                                        'I',
                                        'missed',
                                        'your',
                                    ],
                                    'correct_order' => [
                                        'Sorry',
                                        'I',
                                        'missed',
                                        'your',
                                        'call',
                                    ],
                                    'target_sentence' => 'Sorry I missed your call',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Taking a Message for Someone Else',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Message',
                                    'options' => [
                                        [
                                            'text' => 'Message',
                                            'image' => '/images/exercises/message.png',
                                        ],
                                        [
                                            'text' => 'Number',
                                            'image' => '/images/exercises/number.png',
                                        ],
                                        [
                                            'text' => 'Address',
                                            'image' => '/images/exercises/address.png',
                                        ],
                                        [
                                            'text' => 'Name',
                                            'image' => '/images/exercises/name.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Message',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'message',
                                        'messages',
                                        'messaging',
                                        'messaged',
                                    ],
                                    'sentence' => 'Could I take a ____ for him?',
                                    'correct_answer' => 'message',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'now',
                                        'He',
                                        'is',
                                        'not',
                                        'available',
                                        'right',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'is',
                                        'not',
                                        'available',
                                        'right',
                                        'now',
                                    ],
                                    'target_sentence' => 'He is not available right now',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can I take a message?',
                                        'He is on another call',
                                        'Please hold the line',
                                        'She left already',
                                    ],
                                    'audio_url' => '/audio/exercises/can-i-take-a-message.mp3',
                                    'audio_text' => 'Can I take a message?',
                                    'correct_answer' => 'Can I take a message?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'get back to you',
                                    'options' => [
                                        'To contact you again later',
                                        'To hang up now',
                                        'To repeat the message',
                                        'To transfer the call',
                                    ],
                                    'correct_answer' => 'To contact you again later',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Unavailable',
                                    'options' => [
                                        [
                                            'text' => 'Unavailable',
                                            'image' => '/images/exercises/unavailable.png',
                                        ],
                                        [
                                            'text' => 'Available',
                                            'image' => '/images/exercises/available.png',
                                        ],
                                        [
                                            'text' => 'Busy',
                                            'image' => '/images/exercises/busy.png',
                                        ],
                                        [
                                            'text' => 'Free',
                                            'image' => '/images/exercises/free.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Unavailable',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Ending a Phone Call Politely',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Goodbye',
                                    'options' => [
                                        [
                                            'text' => 'Goodbye',
                                            'image' => '/images/exercises/goodbye.png',
                                        ],
                                        [
                                            'text' => 'Hello',
                                            'image' => '/images/exercises/hello.png',
                                        ],
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Goodbye',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'calling',
                                        'call',
                                        'calls',
                                        'called',
                                    ],
                                    'sentence' => 'Thanks for ____, goodbye!',
                                    'correct_answer' => 'calling',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'now',
                                        'I',
                                        'have',
                                        'to',
                                        'go',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'to',
                                        'go',
                                        'now',
                                    ],
                                    'target_sentence' => 'I have to go now',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Talk to you soon, bye!',
                                        'Who is calling please?',
                                        'Please hold the line',
                                        'Can you repeat that?',
                                    ],
                                    'audio_url' => '/audio/exercises/talk-to-you-soon-bye.mp3',
                                    'audio_text' => 'Talk to you soon, bye!',
                                    'correct_answer' => 'Talk to you soon, bye!',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Thanks for calling, take care!',
                                        'Who is this?',
                                        'Please wait a moment',
                                        'I cannot hear you',
                                    ],
                                    'question' => 'Which phrase politely ends a phone call?',
                                    'correct_answer' => 'Thanks for calling, take care!',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It was nice talking to you',
                                        'Please leave a message',
                                        'The line is busy',
                                        'Can I ask who is calling?',
                                    ],
                                    'audio_url' => '/audio/exercises/it-was-nice-talking-to-you.mp3',
                                    'audio_text' => 'It was nice talking to you',
                                    'correct_answer' => 'It was nice talking to you',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Phone Etiquette: Repeating & Holding',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Repeat',
                                    'options' => [
                                        [
                                            'text' => 'Repeat',
                                            'image' => '/images/exercises/repeat.png',
                                        ],
                                        [
                                            'text' => 'Listen',
                                            'image' => '/images/exercises/listen.png',
                                        ],
                                        [
                                            'text' => 'Hold',
                                            'image' => '/images/exercises/hold.png',
                                        ],
                                        [
                                            'text' => 'Speak',
                                            'image' => '/images/exercises/speak.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Repeat',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'repeat',
                                        'repeats',
                                        'repeating',
                                        'repeated',
                                    ],
                                    'sentence' => 'Could you please ____ that?',
                                    'correct_answer' => 'repeat',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'slowly',
                                        'Can',
                                        'you',
                                        'speak',
                                        'more',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'you',
                                        'speak',
                                        'more',
                                        'slowly',
                                    ],
                                    'target_sentence' => 'Can you speak more slowly',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Sorry, could you repeat that?',
                                        'Please hold the line',
                                        'I will call you back',
                                        'Thanks for calling',
                                    ],
                                    'audio_url' => '/audio/exercises/sorry-could-you-repeat-that.mp3',
                                    'audio_text' => 'Sorry, could you repeat that?',
                                    'correct_answer' => 'Sorry, could you repeat that?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I can\'t hear you very well',
                                        'Nice to meet you',
                                        'See you later',
                                        'Thanks for holding',
                                    ],
                                    'question' => 'What should you say if the connection is bad?',
                                    'correct_answer' => 'I can\'t hear you very well',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'hold',
                                        'holds',
                                        'holding',
                                        'held',
                                    ],
                                    'sentence' => 'Please ____ on, I will transfer your call.',
                                    'correct_answer' => 'hold',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 9: Expressing Opinions',
                'order' => 9,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Sharing Your Opinion',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Think',
                                    'options' => [
                                        [
                                            'text' => 'Think',
                                            'image' => '/images/exercises/think.png',
                                        ],
                                        [
                                            'text' => 'Know',
                                            'image' => '/images/exercises/know.png',
                                        ],
                                        [
                                            'text' => 'Feel',
                                            'image' => '/images/exercises/feel.png',
                                        ],
                                        [
                                            'text' => 'Believe',
                                            'image' => '/images/exercises/believe.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Think',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'think',
                                        'thinks',
                                        'thinking',
                                        'thought',
                                    ],
                                    'sentence' => 'I ____ that English is fun.',
                                    'correct_answer' => 'think',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'interesting',
                                        'book',
                                        'I',
                                        'is',
                                        'this',
                                        'think',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'think',
                                        'this',
                                        'book',
                                        'is',
                                        'interesting',
                                    ],
                                    'target_sentence' => 'I think this book is interesting',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I think it\'s a good idea',
                                        'I don\'t like it',
                                        'That is not possible',
                                        'I have no idea',
                                    ],
                                    'audio_url' => '/audio/exercises/i-think-its-a-good-idea.mp3',
                                    'audio_text' => 'I think it\'s a good idea',
                                    'correct_answer' => 'I think it\'s a good idea',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A personal opinion',
                                        'A fact',
                                        'A command',
                                        'A question',
                                    ],
                                    'question' => 'What does "I think" introduce?',
                                    'correct_answer' => 'A personal opinion',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'thinks',
                                        'think',
                                        'thinking',
                                        'thought',
                                    ],
                                    'sentence' => 'She ____ that the movie was great.',
                                    'correct_answer' => 'thinks',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Using "In My Opinion"',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Opinion',
                                    'options' => [
                                        [
                                            'text' => 'Opinion',
                                            'image' => '/images/exercises/opinion.png',
                                        ],
                                        [
                                            'text' => 'Fact',
                                            'image' => '/images/exercises/fact.png',
                                        ],
                                        [
                                            'text' => 'Question',
                                            'image' => '/images/exercises/question.png',
                                        ],
                                        [
                                            'text' => 'Answer',
                                            'image' => '/images/exercises/answer.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Opinion',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'In',
                                        'On',
                                        'At',
                                        'For',
                                    ],
                                    'sentence' => '____ my opinion, the food here is excellent.',
                                    'correct_answer' => 'In',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'plan',
                                        'In',
                                        'this',
                                        'opinion',
                                        'my',
                                        'is',
                                        'good',
                                    ],
                                    'correct_order' => [
                                        'In',
                                        'my',
                                        'opinion',
                                        'this',
                                        'plan',
                                        'is',
                                        'good',
                                    ],
                                    'target_sentence' => 'In my opinion, this plan is good',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Personally, I prefer tea to coffee',
                                        'I never drink tea',
                                        'Coffee is not a drink',
                                        'I don\'t like drinks',
                                    ],
                                    'audio_url' => '/audio/exercises/personally-i-prefer-tea-to-coffee.mp3',
                                    'audio_text' => 'Personally, I prefer tea to coffee',
                                    'correct_answer' => 'Personally, I prefer tea to coffee',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'From my point of view',
                                        'From your point of view',
                                        'At any point',
                                        'On the point',
                                    ],
                                    'question' => 'Which phrase means "in my opinion"?',
                                    'correct_answer' => 'From my point of view',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Personally',
                                    'options' => [
                                        [
                                            'text' => 'Personally',
                                            'image' => '/images/exercises/personally.png',
                                        ],
                                        [
                                            'text' => 'Publicly',
                                            'image' => '/images/exercises/publicly.png',
                                        ],
                                        [
                                            'text' => 'Politely',
                                            'image' => '/images/exercises/politely.png',
                                        ],
                                        [
                                            'text' => 'Partly',
                                            'image' => '/images/exercises/partly.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Personally',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Agreeing Politely',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Agree',
                                    'options' => [
                                        [
                                            'text' => 'Agree',
                                            'image' => '/images/exercises/agree.png',
                                        ],
                                        [
                                            'text' => 'Disagree',
                                            'image' => '/images/exercises/disagree.png',
                                        ],
                                        [
                                            'text' => 'Argue',
                                            'image' => '/images/exercises/argue.png',
                                        ],
                                        [
                                            'text' => 'Refuse',
                                            'image' => '/images/exercises/refuse.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Agree',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'agree',
                                        'agrees',
                                        'agreeing',
                                        'agreed',
                                    ],
                                    'sentence' => 'I ____ with you completely.',
                                    'correct_answer' => 'agree',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'with',
                                        'I',
                                        'agree',
                                        'completely',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'completely',
                                        'agree',
                                        'with',
                                        'you',
                                    ],
                                    'target_sentence' => 'I completely agree with you',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That\'s a good point',
                                        'That\'s not true',
                                        'I disagree completely',
                                        'Let\'s stop talking',
                                    ],
                                    'audio_url' => '/audio/exercises/thats-a-good-point.mp3',
                                    'audio_text' => 'That\'s a good point',
                                    'correct_answer' => 'That\'s a good point',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'You\'re absolutely right',
                                        'I don\'t think so',
                                        'I\'m not sure about that',
                                        'That\'s not true',
                                    ],
                                    'question' => 'Which phrase shows agreement?',
                                    'correct_answer' => 'You\'re absolutely right',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'about',
                                        'You',
                                        'right',
                                        'are',
                                        'that',
                                    ],
                                    'correct_order' => [
                                        'You',
                                        'are',
                                        'right',
                                        'about',
                                        'that',
                                    ],
                                    'target_sentence' => 'You are right about that',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Disagreeing Politely',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Disagree',
                                    'options' => [
                                        [
                                            'text' => 'Disagree',
                                            'image' => '/images/exercises/disagree.png',
                                        ],
                                        [
                                            'text' => 'Agree',
                                            'image' => '/images/exercises/agree.png',
                                        ],
                                        [
                                            'text' => 'Accept',
                                            'image' => '/images/exercises/accept.png',
                                        ],
                                        [
                                            'text' => 'Support',
                                            'image' => '/images/exercises/support.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Disagree',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'differently',
                                        'different',
                                        'difference',
                                        'differ',
                                    ],
                                    'sentence' => 'I see it ____ from you.',
                                    'correct_answer' => 'differently',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'don\'t',
                                        'that',
                                        'I',
                                        'think',
                                        'is',
                                        'right',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'don\'t',
                                        'think',
                                        'that',
                                        'is',
                                        'right',
                                    ],
                                    'target_sentence' => 'I don\'t think that is right',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I\'m afraid I disagree',
                                        'I completely agree',
                                        'That\'s exactly right',
                                        'Sounds perfect to me',
                                    ],
                                    'audio_url' => '/audio/exercises/im-afraid-i-disagree.mp3',
                                    'audio_text' => 'I\'m afraid I disagree',
                                    'correct_answer' => 'I\'m afraid I disagree',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I see it a bit differently',
                                        'You are completely wrong',
                                        'That\'s stupid',
                                        'No way',
                                    ],
                                    'question' => 'Which is a polite way to disagree?',
                                    'correct_answer' => 'I see it a bit differently',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I\'m not sure that\'s correct',
                                        'That\'s absolutely true',
                                        'I agree completely',
                                        'Well done',
                                    ],
                                    'audio_url' => '/audio/exercises/im-not-sure-thats-correct.mp3',
                                    'audio_text' => 'I\'m not sure that\'s correct',
                                    'correct_answer' => 'I\'m not sure that\'s correct',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Asking for Others\' Opinions',
                        'order' => 5,
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
                                            'text' => 'Opinion',
                                            'image' => '/images/exercises/opinion.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Question',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'think',
                                        'thinks',
                                        'thinking',
                                        'thought',
                                    ],
                                    'sentence' => 'What do you ____ about this movie?',
                                    'correct_answer' => 'think',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'about',
                                        'What',
                                        'do',
                                        'you',
                                        'think',
                                        'it',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'do',
                                        'you',
                                        'think',
                                        'about',
                                        'it',
                                    ],
                                    'target_sentence' => 'What do you think about it',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How about you? What do you think?',
                                        'I think it\'s great.',
                                        'That\'s not true.',
                                        'See you later.',
                                    ],
                                    'audio_url' => '/audio/exercises/how-about-you-what-do-you-think.mp3',
                                    'audio_text' => 'How about you? What do you think?',
                                    'correct_answer' => 'How about you? What do you think?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'What\'s your opinion on this?',
                                        'What\'s your name?',
                                        'Where do you live?',
                                        'How old are you?',
                                    ],
                                    'question' => 'Which question asks for someone\'s opinion?',
                                    'correct_answer' => 'What\'s your opinion on this?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Do you have any thoughts on this?',
                                        'Give me your money.',
                                        'Close the door please.',
                                        'What time is it?',
                                    ],
                                    'question' => 'How do you politely ask someone\'s view?',
                                    'correct_answer' => 'Do you have any thoughts on this?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Comparing Opinions',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Better',
                                    'options' => [
                                        [
                                            'text' => 'Better',
                                            'image' => '/images/exercises/better.png',
                                        ],
                                        [
                                            'text' => 'Best',
                                            'image' => '/images/exercises/best.png',
                                        ],
                                        [
                                            'text' => 'Good',
                                            'image' => '/images/exercises/good.png',
                                        ],
                                        [
                                            'text' => 'Well',
                                            'image' => '/images/exercises/well.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Better',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'better',
                                        'best',
                                        'more good',
                                        'gooder',
                                    ],
                                    'sentence' => 'I think tea is ____ than coffee.',
                                    'correct_answer' => 'better',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'interesting',
                                        'This',
                                        'book',
                                        'is',
                                        'more',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'book',
                                        'is',
                                        'more',
                                        'interesting',
                                    ],
                                    'target_sentence' => 'This book is more interesting',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'In my opinion, this is the best option',
                                        'I don\'t like it at all',
                                        'This is the worst choice',
                                        'I have no opinion',
                                    ],
                                    'audio_url' => '/audio/exercises/in-my-opinion-this-is-the-best-option.mp3',
                                    'audio_text' => 'In my opinion, this is the best option',
                                    'correct_answer' => 'In my opinion, this is the best option',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I think dogs are smarter than cats.',
                                        'I think dogs are smart than cats.',
                                        'I think dogs are more smarter than cats.',
                                        'I think dogs is smarter than cats.',
                                    ],
                                    'question' => 'Which sentence correctly compares two things?',
                                    'correct_answer' => 'I think dogs are smarter than cats.',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'best',
                                        'better',
                                        'goodest',
                                        'more best',
                                    ],
                                    'sentence' => 'In my opinion, this is the ____ restaurant in town.',
                                    'correct_answer' => 'best',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 10: Comparisons & Preferences',
                'order' => 10,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Comparative Adjectives',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Bigger',
                                    'options' => [
                                        [
                                            'text' => 'Bigger',
                                            'image' => '/images/exercises/bigger.png',
                                        ],
                                        [
                                            'text' => 'Smaller',
                                            'image' => '/images/exercises/smaller.png',
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
                                    'correct_answer' => 'Bigger',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bigger',
                                        'big',
                                        'biggest',
                                        'bigly',
                                    ],
                                    'sentence' => 'An elephant is ____ than a mouse.',
                                    'correct_answer' => 'bigger',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bike',
                                        'than',
                                        'A',
                                        'faster',
                                        'a',
                                        'is',
                                        'car',
                                    ],
                                    'correct_order' => [
                                        'A',
                                        'car',
                                        'is',
                                        'faster',
                                        'than',
                                        'a',
                                        'bike',
                                    ],
                                    'target_sentence' => 'A car is faster than a bike',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This bag is heavier than that one',
                                        'This bag is lighter than that one',
                                        'This bag is the heaviest bag',
                                        'This bag is as heavy as that one',
                                    ],
                                    'audio_url' => '/audio/exercises/this-bag-is-heavier-than-that-one.mp3',
                                    'audio_text' => 'This bag is heavier than that one',
                                    'correct_answer' => 'This bag is heavier than that one',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Bigger',
                                        'Big',
                                        'Biggest',
                                        'Bigness',
                                    ],
                                    'question' => 'Which word compares two things?',
                                    'correct_answer' => 'Bigger',
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
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Superlative Adjectives',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Biggest',
                                    'options' => [
                                        [
                                            'text' => 'Biggest',
                                            'image' => '/images/exercises/biggest.png',
                                        ],
                                        [
                                            'text' => 'Bigger',
                                            'image' => '/images/exercises/bigger.png',
                                        ],
                                        [
                                            'text' => 'Smallest',
                                            'image' => '/images/exercises/smallest.png',
                                        ],
                                        [
                                            'text' => 'Smaller',
                                            'image' => '/images/exercises/smaller.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Biggest',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'tallest',
                                        'taller',
                                        'tall',
                                        'tallness',
                                    ],
                                    'sentence' => 'This is the ____ mountain in the world.',
                                    'correct_answer' => 'tallest',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'student',
                                        'She',
                                        'is',
                                        'the',
                                        'smartest',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'is',
                                        'the',
                                        'smartest',
                                        'student',
                                    ],
                                    'target_sentence' => 'She is the smartest student',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This is the best restaurant in town',
                                        'This is a good restaurant',
                                        'This is the worst restaurant in town',
                                        'This restaurant is better than that one',
                                    ],
                                    'audio_url' => '/audio/exercises/this-is-the-best-restaurant-in-town.mp3',
                                    'audio_text' => 'This is the best restaurant in town',
                                    'correct_answer' => 'This is the best restaurant in town',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Best',
                                        'Better',
                                        'Good',
                                        'Well',
                                    ],
                                    'question' => 'Which word describes the highest degree?',
                                    'correct_answer' => 'Best',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'hotel',
                                        'This',
                                        'is',
                                        'the',
                                        'cheapest',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'is',
                                        'the',
                                        'cheapest',
                                        'hotel',
                                    ],
                                    'target_sentence' => 'This is the cheapest hotel',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Saying What You Prefer',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Prefer',
                                    'options' => [
                                        [
                                            'text' => 'Prefer',
                                            'image' => '/images/exercises/prefer.png',
                                        ],
                                        [
                                            'text' => 'Like',
                                            'image' => '/images/exercises/like.png',
                                        ],
                                        [
                                            'text' => 'Dislike',
                                            'image' => '/images/exercises/dislike.png',
                                        ],
                                        [
                                            'text' => 'Choose',
                                            'image' => '/images/exercises/choose.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Prefer',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'prefer',
                                        'prefers',
                                        'preferring',
                                        'preferred',
                                    ],
                                    'sentence' => 'I ____ tea to coffee.',
                                    'correct_answer' => 'prefer',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'coffee',
                                        'I',
                                        'prefer',
                                        'tea',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'prefer',
                                        'tea',
                                        'to',
                                        'coffee',
                                    ],
                                    'target_sentence' => 'I prefer tea to coffee',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I would rather stay home',
                                        'I want to go out',
                                        'I prefer to travel',
                                        'I need to work',
                                    ],
                                    'audio_url' => '/audio/exercises/i-would-rather-stay-home.mp3',
                                    'audio_text' => 'I would rather stay home',
                                    'correct_answer' => 'I would rather stay home',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I prefer tea to coffee',
                                        'I am from Pakistan',
                                        'It is raining today',
                                        'She is my sister',
                                    ],
                                    'question' => 'Which sentence expresses a preference?',
                                    'correct_answer' => 'I prefer tea to coffee',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'I would rather',
                                    'options' => [
                                        'I prefer to',
                                        'I must',
                                        'I never',
                                        'I forgot',
                                    ],
                                    'correct_answer' => 'I prefer to',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Better Than and Worse Than',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Better',
                                    'options' => [
                                        [
                                            'text' => 'Better',
                                            'image' => '/images/exercises/better.png',
                                        ],
                                        [
                                            'text' => 'Worse',
                                            'image' => '/images/exercises/worse.png',
                                        ],
                                        [
                                            'text' => 'Best',
                                            'image' => '/images/exercises/best.png',
                                        ],
                                        [
                                            'text' => 'Worst',
                                            'image' => '/images/exercises/worst.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Better',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'better',
                                        'good',
                                        'best',
                                        'well',
                                    ],
                                    'sentence' => 'This phone is ____ than my old one.',
                                    'correct_answer' => 'better',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'one',
                                        'This',
                                        'coffee',
                                        'is',
                                        'worse',
                                        'than',
                                        'that',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'coffee',
                                        'is',
                                        'worse',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This coffee is worse than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'My new job is better than my old job',
                                        'My new job is worse than my old job',
                                        'My old job was the best job',
                                        'My new job is the same as my old job',
                                    ],
                                    'audio_url' => '/audio/exercises/my-new-job-is-better-than-my-old-job.mp3',
                                    'audio_text' => 'My new job is better than my old job',
                                    'correct_answer' => 'My new job is better than my old job',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Worse',
                                        'Worst',
                                        'Badder',
                                        'Baddest',
                                    ],
                                    'question' => 'What is the comparative form of "bad"?',
                                    'correct_answer' => 'Worse',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This restaurant is worse than the last one',
                                        'This restaurant is better than the last one',
                                        'This restaurant is the best in town',
                                        'This restaurant is as good as the last one',
                                    ],
                                    'audio_url' => '/audio/exercises/this-restaurant-is-worse-than-the-last-one.mp3',
                                    'audio_text' => 'This restaurant is worse than the last one',
                                    'correct_answer' => 'This restaurant is worse than the last one',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Comparing People and Things',
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
                                            'text' => 'Older',
                                            'image' => '/images/exercises/older.png',
                                        ],
                                        [
                                            'text' => 'Younger',
                                            'image' => '/images/exercises/younger.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Taller',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'expensive',
                                        'expense',
                                        'expensively',
                                        'expenses',
                                    ],
                                    'sentence' => 'This laptop is more ____ than that one.',
                                    'correct_answer' => 'expensive',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'me',
                                        'My',
                                        'sister',
                                        'is',
                                        'older',
                                        'than',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'sister',
                                        'is',
                                        'older',
                                        'than',
                                        'me',
                                    ],
                                    'target_sentence' => 'My sister is older than me',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This dress is more beautiful than that one',
                                        'This dress is less beautiful than that one',
                                        'This dress is the most beautiful dress',
                                        'This dress is as beautiful as that one',
                                    ],
                                    'audio_url' => '/audio/exercises/this-dress-is-more-beautiful-than-that-one.mp3',
                                    'audio_text' => 'This dress is more beautiful than that one',
                                    'correct_answer' => 'This dress is more beautiful than that one',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'more + adjective',
                                        'adjective + er',
                                        'the + adjective + est',
                                        'most + adjective',
                                    ],
                                    'question' => 'How do we form comparatives for long adjectives?',
                                    'correct_answer' => 'more + adjective',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Younger',
                                    'options' => [
                                        [
                                            'text' => 'Younger',
                                            'image' => '/images/exercises/younger.png',
                                        ],
                                        [
                                            'text' => 'Older',
                                            'image' => '/images/exercises/older.png',
                                        ],
                                        [
                                            'text' => 'Taller',
                                            'image' => '/images/exercises/taller.png',
                                        ],
                                        [
                                            'text' => 'Shorter',
                                            'image' => '/images/exercises/shorter.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Younger',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Asking About Preferences',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Which',
                                    'options' => [
                                        [
                                            'text' => 'Which',
                                            'image' => '/images/exercises/which.png',
                                        ],
                                        [
                                            'text' => 'What',
                                            'image' => '/images/exercises/what.png',
                                        ],
                                        [
                                            'text' => 'Who',
                                            'image' => '/images/exercises/who.png',
                                        ],
                                        [
                                            'text' => 'Where',
                                            'image' => '/images/exercises/where.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Which',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Which',
                                        'What',
                                        'Who',
                                        'Where',
                                    ],
                                    'sentence' => '____ do you prefer, tea or coffee?',
                                    'correct_answer' => 'Which',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'coffee',
                                        'Do',
                                        'you',
                                        'like',
                                        'tea',
                                        'better',
                                        'than',
                                    ],
                                    'correct_order' => [
                                        'Do',
                                        'you',
                                        'like',
                                        'tea',
                                        'better',
                                        'than',
                                        'coffee',
                                    ],
                                    'target_sentence' => 'Do you like tea better than coffee',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I like summer better than winter',
                                        'I like winter better than summer',
                                        'I like summer and winter equally',
                                        'I dislike summer and winter',
                                    ],
                                    'audio_url' => '/audio/exercises/i-like-summer-better-than-winter.mp3',
                                    'audio_text' => 'I like summer better than winter',
                                    'correct_answer' => 'I like summer better than winter',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Which one do you like more?',
                                        'What time is it?',
                                        'Where do you live?',
                                        'How old are you?',
                                    ],
                                    'question' => 'Which question asks about preference?',
                                    'correct_answer' => 'Which one do you like more?',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'better',
                                        'good',
                                        'best',
                                        'well',
                                    ],
                                    'sentence' => 'I like dogs ____ than cats.',
                                    'correct_answer' => 'better',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
