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
use Illuminate\Support\Str;

class EnglishUnitRestaurant09Seeder extends Seeder
{
    /**
     * Seeds "Unit 9: Table Manners & Requests" under the existing Restaurant
     * chapter, with 6 lessons x 6 exercises covering polite requests at the
     * table, napkins/cutlery, and "excuse me".
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 9: Table Manners & Requests'],
            ['order_number' => 9]
        );

        foreach ($this->lessonsData() as $lessonDef) {
            $lesson = Lesson::firstOrCreate(
                ['unit_id' => $unit->id, 'title' => $lessonDef['title']],
                ['order_number' => $lessonDef['order']]
            );

            foreach ($lessonDef['exercises'] as $index => $exercise) {
                Exercise::updateOrCreate(
                    ['lesson_id' => $lesson->id, 'order_number' => $index + 1],
                    ['type' => $exercise['type'], 'data' => $exercise['data']]
                );
            }
        }
    }

    private function lessonsData(): array
    {
        return [
            [
                'title' => 'Lesson 1: Excuse Me, Getting Attention',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Waiter', ['Waiter', 'Napkin', 'Fork', 'Plate'], 'Waiter'),
                    $this->fillBlank('____ me, could you help us?', ['Excuse', 'Excuses', 'Excusing', 'Excused'], 'Excuse'),
                    $this->fillBlank('Sorry to ____ you, but may I ask something?', ['bother', 'bothers', 'bothering', 'bothered'], 'bother'),
                    $this->tapWord('Excuse me, waiter', ['waiter', 'Excuse', 'me'], ['Excuse', 'me', 'waiter']),
                    $this->listenSelect('Excuse me, sir', ['Excuse me, sir', 'Thank you very much', 'See you later', 'I am hungry']),
                    $this->multipleChoice('What do you say to politely get a waiter\'s attention?', ['Excuse me', 'Goodbye', 'I am full', 'No thanks'], 'Excuse me'),
                ],
            ],
            [
                'title' => 'Lesson 2: Asking for Napkins & Cutlery',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Napkin', ['Napkin', 'Spoon', 'Knife', 'Fork'], 'Napkin'),
                    $this->fillBlank('Could I have a ____, please?', ['napkin', 'napkins', 'napkining', 'napkined'], 'napkin'),
                    $this->tapWord('Could I have a fork', ['fork', 'Could', 'I', 'have', 'a'], ['Could', 'I', 'have', 'a', 'fork']),
                    $this->tapWord('May I have a clean spoon', ['spoon', 'May', 'I', 'have', 'a', 'clean'], ['May', 'I', 'have', 'a', 'clean', 'spoon']),
                    $this->listenSelect('I need a clean knife', ['I need a clean knife', 'This soup is cold', 'Where is the bathroom', 'I am finished eating']),
                    $this->multipleChoice('What do you use to cut your food?', ['A knife', 'A napkin', 'A spoon', 'A cup'], 'A knife'),
                ],
            ],
            [
                'title' => 'Lesson 3: Requesting More Food or Drink',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Water', ['Water', 'Bread', 'Salt', 'Sugar'], 'Water'),
                    $this->fillBlank('Could I have some ____ water, please?', ['more', 'most', 'many', 'much'], 'more'),
                    $this->tapWord('Can I have another napkin', ['napkin', 'Can', 'I', 'have', 'another'], ['Can', 'I', 'have', 'another', 'napkin']),
                    $this->listenSelect('Could I have more bread, please?', ['Could I have more bread, please?', 'The food is delicious', 'I am not hungry', 'This is too spicy']),
                    $this->listenSelect('One more glass of water, please', ['One more glass of water, please', 'I have finished my meal', 'Where is the restroom', 'The bill, please']),
                    $this->multipleChoice('Which word means "one additional" item?', ['Another', 'Less', 'Some', 'Never'], 'Another'),
                ],
            ],
            [
                'title' => 'Lesson 4: Polite Requests with Could, Would & May',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Please', ['Please', 'Thanks', 'Sorry', 'Excuse'], 'Please'),
                    $this->fillBlank('____ you pass the salt, please?', ['Would', 'Do', 'Are', 'Is'], 'Would'),
                    $this->tapWord('Could you pass the pepper', ['pepper', 'Could', 'you', 'pass', 'the'], ['Could', 'you', 'pass', 'the', 'pepper']),
                    $this->listenSelect('Would you mind passing the salt?', ['Would you mind passing the salt?', 'I do not like salt', 'The salt is empty', 'Please sit down']),
                    $this->multipleChoice('Which is the most polite way to ask for something?', ['Could you pass the salt, please?', 'Give me salt', 'Salt now', 'I want salt'], 'Could you pass the salt, please?'),
                    $this->multipleChoice('What does "would you mind" mean?', ['A polite way to ask someone to do something', 'A way to say no', 'A way to say goodbye', 'A question about time'], 'A polite way to ask someone to do something'),
                ],
            ],
            [
                'title' => 'Lesson 5: Apologizing & Excusing Yourself from the Table',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Sorry', ['Sorry', 'Please', 'Thanks', 'Excuse'], 'Sorry'),
                    $this->matchPairs('Restroom', ['Restroom', 'Kitchen', 'Menu', 'Bill'], 'Restroom'),
                    $this->fillBlank('____ I be excused for a moment?', ['May', 'Do', 'Are', 'Is'], 'May'),
                    $this->tapWord('Excuse me, I will be right back', ['back', 'Excuse', 'me', 'I', 'will', 'be', 'right'], ['Excuse', 'me', 'I', 'will', 'be', 'right', 'back']),
                    $this->listenSelect('Sorry, may I leave the table?', ['Sorry, may I leave the table?', 'I love this restaurant', 'The food is ready', 'Please sit here']),
                    $this->multipleChoice('What should you say before leaving the table for a moment?', ['Excuse me, I will be right back', 'Goodbye forever', 'I am not coming back', 'Give me the bill'], 'Excuse me, I will be right back'),
                ],
            ],
            [
                'title' => 'Lesson 6: Please, Thank You & Table Prepositions',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Thank you', ['Thank you', 'Sorry', 'Please', 'Excuse me'], 'Thank you'),
                    $this->fillBlank('Please put the napkin ____ your lap.', ['on', 'in', 'at', 'under'], 'on'),
                    $this->tapWord('Thank you for the delicious meal', ['meal', 'Thank', 'you', 'for', 'the', 'delicious'], ['Thank', 'you', 'for', 'the', 'delicious', 'meal']),
                    $this->tapWord('The fork is on the table', ['table', 'The', 'fork', 'is', 'on', 'the'], ['The', 'fork', 'is', 'on', 'the', 'table']),
                    $this->listenSelect('Thank you very much for your help', ['Thank you very much for your help', 'I am still hungry', 'This is not what I ordered', 'Please bring the menu']),
                    $this->multipleChoice('Which preposition completes: "Please sit ____ the table"?', ['at', 'on', 'in', 'under'], 'at'),
                ],
            ],
        ];
    }

    private function matchPairs(string $word, array $options, string $correctAnswer): array
    {
        return [
            'type' => ExerciseType::MatchPairs,
            'data' => [
                'word' => $word,
                'options' => array_map(fn (string $option) => [
                    'text' => $option,
                    'image' => '/images/exercises/'.Str::slug($option).'.png',
                ], $options),
                'correct_answer' => $correctAnswer,
            ],
        ];
    }

    private function fillBlank(string $sentence, array $options, string $correctAnswer): array
    {
        return [
            'type' => ExerciseType::FillBlank,
            'data' => [
                'sentence' => $sentence,
                'options' => $options,
                'correct_answer' => $correctAnswer,
            ],
        ];
    }

    private function tapWord(string $targetSentence, array $words, array $correctOrder): array
    {
        return [
            'type' => ExerciseType::TapWord,
            'data' => [
                'target_sentence' => $targetSentence,
                'words' => $words,
                'correct_order' => $correctOrder,
            ],
        ];
    }

    private function listenSelect(string $audioText, array $options, ?string $correctAnswer = null): array
    {
        return [
            'type' => ExerciseType::ListenSelect,
            'data' => [
                'audio_text' => $audioText,
                'audio_url' => '/audio/exercises/'.Str::slug($audioText).'.mp3',
                'options' => $options,
                'correct_answer' => $correctAnswer ?? $audioText,
            ],
        ];
    }

    private function multipleChoice(string $question, array $options, string $correctAnswer): array
    {
        return [
            'type' => ExerciseType::MultipleChoice,
            'data' => [
                'question' => $question,
                'options' => $options,
                'correct_answer' => $correctAnswer,
            ],
        ];
    }
}
