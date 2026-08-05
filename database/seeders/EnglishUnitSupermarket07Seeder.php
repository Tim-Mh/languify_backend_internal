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

class EnglishUnitSupermarket07Seeder extends Seeder
{
    /**
     * Seeds "Unit 7: Quantities & Measurements" (kilo, liter, dozen,
     * "a bag of", "a bottle of") into the existing Supermarket chapter.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 7: Quantities & Measurements'],
            ['order_number' => 7]
        );

        foreach ($this->lessons() as $lessonDef) {
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

    private function lessons(): array
    {
        return [
            [
                'title' => 'Lesson 1: Weighing with Kilos',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Kilo', ['Kilo', 'Liter', 'Dozen', 'Bag'], 'Kilo'),
                    $this->fillBlank('I bought two ____ of rice.', ['kilos', 'kilo', 'kilogram', 'kilograms of'], 'kilos'),
                    $this->fillBlank('Can I have a ____ of sugar?', ['kilo', 'kilos', 'liter', 'dozen'], 'kilo'),
                    $this->tapWord('This bag weighs one kilo', ['kilo', 'This', 'bag', 'weighs', 'one'], ['This', 'bag', 'weighs', 'one', 'kilo']),
                    $this->listenSelect('How many kilos do you want?', ['How many kilos do you want?', 'How much does it cost?', 'Where is the scale?', 'Is this fresh?']),
                    $this->multipleChoice('What does "kilo" mean?', ['A unit of weight (1000 grams)', 'A unit of volume', 'A dozen items', 'A type of bag'], 'A unit of weight (1000 grams)'),
                ],
            ],
            [
                'title' => 'Lesson 2: Liters & Liquids',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Liter', ['Liter', 'Kilo', 'Dozen', 'Piece'], 'Liter'),
                    $this->fillBlank('I need a ____ of milk.', ['liter', 'liters', 'litre of', 'litering'], 'liter'),
                    $this->tapWord('She bought two liters of juice', ['juice', 'She', 'bought', 'two', 'liters', 'of'], ['She', 'bought', 'two', 'liters', 'of', 'juice']),
                    $this->tapWord('How many liters do we need', ['need', 'How', 'many', 'liters', 'do', 'we'], ['How', 'many', 'liters', 'do', 'we', 'need']),
                    $this->listenSelect('This bottle holds one liter', ['This bottle holds one liter', 'This bottle is empty', 'The milk is fresh', 'The juice is sweet']),
                    $this->multipleChoice('Which is used to measure liquids?', ['Liter', 'Kilo', 'Dozen', 'Meter'], 'Liter'),
                ],
            ],
            [
                'title' => 'Lesson 3: Counting by Dozens',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Dozen', ['Dozen', 'Kilo', 'Liter', 'Bottle'], 'Dozen'),
                    $this->matchPairs('Eggs', ['Eggs', 'Milk', 'Rice', 'Oil'], 'Eggs'),
                    $this->fillBlank('I want to buy a ____ eggs.', ['dozen', 'dozens', 'kilo', 'liter'], 'dozen'),
                    $this->tapWord('A dozen eggs costs three dollars', ['dollars', 'A', 'dozen', 'eggs', 'costs', 'three'], ['A', 'dozen', 'eggs', 'costs', 'three', 'dollars']),
                    $this->listenSelect('I need half a dozen eggs', ['I need half a dozen eggs', 'I need a dozen apples', 'I need one egg', 'I need two dozen eggs']),
                    $this->multipleChoice('How many eggs are in a dozen?', ['Twelve', 'Ten', 'Six', 'Twenty'], 'Twelve'),
                ],
            ],
            [
                'title' => 'Lesson 4: A Bag of...',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Bag', ['Bag', 'Bottle', 'Box', 'Can'], 'Bag'),
                    $this->fillBlank('She carried a ____ of flour.', ['bag', 'bags', 'bagging', 'bagged'], 'bag'),
                    $this->tapWord('I bought a bag of potatoes', ['potatoes', 'I', 'bought', 'a', 'bag', 'of'], ['I', 'bought', 'a', 'bag', 'of', 'potatoes']),
                    $this->listenSelect('Can you grab a bag of rice?', ['Can you grab a bag of rice?', 'Can you grab a liter of milk?', 'Can you grab a dozen eggs?', 'Can you grab a bottle of water?']),
                    $this->listenSelect('There are three bags of sugar', ['There are three bags of sugar', 'There are three kilos of sugar', 'There is one bag of sugar', 'There are three liters of oil']),
                    $this->multipleChoice('Which item usually comes in a bag?', ['Chips', 'Milk', 'Juice', 'Water'], 'Chips'),
                ],
            ],
            [
                'title' => 'Lesson 5: A Bottle of...',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Bottle', ['Bottle', 'Bag', 'Box', 'Jar'], 'Bottle'),
                    $this->fillBlank('He drank a ____ of water.', ['bottle', 'bottles', 'bottling', 'bottled'], 'bottle'),
                    $this->tapWord('Please buy a bottle of oil', ['oil', 'Please', 'buy', 'a', 'bottle', 'of'], ['Please', 'buy', 'a', 'bottle', 'of', 'oil']),
                    $this->listenSelect('This bottle of juice is cold', ['This bottle of juice is cold', 'This bag of ice is cold', 'This bottle of oil is warm', 'This liter of milk is hot']),
                    $this->multipleChoice('What comes in a bottle?', ['Juice', 'Eggs', 'Bread', 'Potatoes'], 'Juice'),
                    $this->multipleChoice('Choose the correct sentence.', ['I need a bottle of water.', 'I need a bottle water.', 'I need bottle of water.', 'I need a bottles of water.'], 'I need a bottle of water.'),
                ],
            ],
            [
                'title' => 'Lesson 6: Mixed Quantities & Comparatives',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('How much', ['How much', 'How many', 'How far', 'How long'], 'How much'),
                    $this->fillBlank('____ milk do you need?', ['How much', 'How many', 'How far', 'How long'], 'How much'),
                    $this->fillBlank('____ eggs do you need?', ['How many', 'How much', 'How far', 'How long'], 'How many'),
                    $this->tapWord('I need more kilos than you', ['you', 'I', 'need', 'more', 'kilos', 'than'], ['I', 'need', 'more', 'kilos', 'than', 'you']),
                    $this->listenSelect('I need less sugar than before', ['I need less sugar than before', 'I need more sugar than before', 'I need a kilo of sugar', 'I need a liter of oil']),
                    $this->multipleChoice('Which word is used with countable nouns like eggs?', ['Many', 'Much', 'Less', 'Little'], 'Many'),
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
