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

class EnglishUnitSupermarket04Seeder extends Seeder
{
    /**
     * Seeds "Unit 4: Dairy & Bakery" under the existing Supermarket chapter,
     * with 6 lessons x 6 exercises covering milk, cheese, bread and bakery
     * vocabulary plus related grammar (plurals, comparatives/superlatives,
     * prepositions, quantifiers and question forms).
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 4: Dairy & Bakery'],
            ['order_number' => 4]
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
                'title' => 'Lesson 1: Types of Milk',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Milk', ['Milk', 'Cheese', 'Bread', 'Butter'], 'Milk'),
                    $this->fillBlank('I would like a carton of ____.', ['milk', 'milks', 'milking', 'milked'], 'milk'),
                    $this->tapWord('This milk is very fresh', ['fresh', 'This', 'milk', 'is', 'very'], ['This', 'milk', 'is', 'very', 'fresh']),
                    $this->listenSelect('Do you have skimmed milk?', ['Do you have skimmed milk?', 'Is this milk fresh?', 'How much is the cheese?', 'Where is the bakery?']),
                    $this->multipleChoice('What does "skimmed milk" mean?', ['Milk with the fat removed', 'Milk with extra cream', 'Milk from goats', 'Milk that is sour'], 'Milk with the fat removed'),
                    $this->fillBlank('We need ____ milk for the recipe.', ['some', 'a', 'many', 'few'], 'some'),
                ],
            ],
            [
                'title' => 'Lesson 2: Cheese Varieties',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Cheddar', ['Cheddar', 'Mozzarella', 'Butter', 'Yogurt'], 'Cheddar'),
                    $this->fillBlank('This cheese is ____ than that one.', ['softer', 'soft', 'softest', 'softly'], 'softer'),
                    $this->tapWord('I love mozzarella cheese', ['cheese', 'I', 'love', 'mozzarella'], ['I', 'love', 'mozzarella', 'cheese']),
                    $this->listenSelect('Can I try a piece of cheese?', ['Can I try a piece of cheese?', 'Is the bread fresh?', 'How much is the milk?', 'Where is the cashier?']),
                    $this->multipleChoice('What does "cream cheese" mean?', ['A soft, smooth cheese spread', 'A hard yellow cheese', 'A type of milk', 'A type of bread'], 'A soft, smooth cheese spread'),
                    $this->tapWord('This cheese smells strong', ['strong', 'This', 'cheese', 'smells'], ['This', 'cheese', 'smells', 'strong']),
                ],
            ],
            [
                'title' => 'Lesson 3: Bread & Loaves',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Loaf', ['Loaf', 'Baguette', 'Roll', 'Slice'], 'Loaf'),
                    $this->fillBlank('I bought two ____ of bread.', ['loaves', 'loaf', 'loafs', 'loafes'], 'loaves'),
                    $this->tapWord('Can I have a fresh baguette', ['baguette', 'Can', 'I', 'have', 'a', 'fresh'], ['Can', 'I', 'have', 'a', 'fresh', 'baguette']),
                    $this->listenSelect('Is this bread whole wheat?', ['Is this bread whole wheat?', 'Do you sell cheese here?', 'How much is a loaf?', 'Where is the milk aisle?']),
                    $this->multipleChoice('What does "slice" mean?', ['A thin flat piece cut from bread', 'A whole loaf', 'A type of cheese', 'A bakery tool'], 'A thin flat piece cut from bread'),
                    $this->multipleChoice('What does "whole wheat" mean?', ['Bread made from the whole grain', 'Bread made only from white flour', 'A type of cheese', 'A sweet pastry'], 'Bread made from the whole grain'),
                ],
            ],
            [
                'title' => 'Lesson 4: At the Bakery Counter',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Croissant', ['Croissant', 'Cake', 'Cookie', 'Muffin'], 'Croissant'),
                    $this->fillBlank('Could I have a slice of ____, please?', ['cake', 'cakes', 'caking', 'caked'], 'cake'),
                    $this->tapWord('How much is this croissant', ['croissant', 'How', 'much', 'is', 'this'], ['How', 'much', 'is', 'this', 'croissant']),
                    $this->listenSelect('These pastries look delicious', ['These pastries look delicious', 'The bread is stale', 'Is the milk cold?', 'Where is the cheese?']),
                    $this->multipleChoice('What does "bakery" mean?', ['A shop that sells bread and cakes', 'A shop that sells meat', 'A shop that sells fruit', 'A shop that sells milk'], 'A shop that sells bread and cakes'),
                    $this->matchPairs('Muffin', ['Muffin', 'Cookie', 'Baguette', 'Cheddar'], 'Muffin'),
                ],
            ],
            [
                'title' => 'Lesson 5: Yogurt & Butter',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Yogurt', ['Yogurt', 'Butter', 'Milk', 'Cheese'], 'Yogurt'),
                    $this->fillBlank('I always keep the butter ____ the fridge.', ['in', 'on', 'at', 'by'], 'in'),
                    $this->tapWord('She spreads butter on toast', ['toast', 'She', 'spreads', 'butter', 'on'], ['She', 'spreads', 'butter', 'on', 'toast']),
                    $this->listenSelect('Do you prefer yogurt or butter?', ['Do you prefer yogurt or butter?', 'Is the bread fresh?', 'How much is the cheese?', 'Where is the bakery?']),
                    $this->multipleChoice('What does "spread" mean here?', ['To put a soft food on bread', 'To cut something', 'To buy something', 'To bake something'], 'To put a soft food on bread'),
                    $this->listenSelect('This yogurt tastes sour', ['This yogurt tastes sour', 'This bread tastes sweet', 'This cheese is hard', 'This milk is cold']),
                ],
            ],
            [
                'title' => 'Lesson 6: Freshness, Prices & Quantities',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Fresh', ['Fresh', 'Stale', 'Expired', 'Frozen'], 'Fresh'),
                    $this->fillBlank('This bread is ____ than the one from yesterday.', ['fresher', 'fresh', 'freshest', 'freshly'], 'fresher'),
                    $this->tapWord('How many loaves do you need', ['need', 'How', 'many', 'loaves', 'do', 'you'], ['How', 'many', 'loaves', 'do', 'you', 'need']),
                    $this->listenSelect('How much does this cheese cost?', ['How much does this cheese cost?', 'How many eggs do you need?', 'Is the milk fresh?', 'Where is the bakery?']),
                    $this->multipleChoice('Which sentence uses a plural correctly?', ['I bought two loaves of bread.', 'I bought two loafs of bread.', 'I bought two loaf of bread.', 'I bought two loave of bread.'], 'I bought two loaves of bread.'),
                    $this->fillBlank('This is the ____ bread in the bakery.', ['freshest', 'fresher', 'fresh', 'freshly'], 'freshest'),
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
