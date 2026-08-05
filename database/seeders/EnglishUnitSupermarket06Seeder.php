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

class EnglishUnitSupermarket06Seeder extends Seeder
{
    /**
     * Seeds "Unit 6: Household Items" under the existing Supermarket chapter,
     * with 6 lessons covering cleaning supplies, paper products and toiletries.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 6: Household Items'],
            ['order_number' => 6]
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
                'title' => 'Lesson 1: Cleaning Supplies',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Broom', ['Broom', 'Mop', 'Sponge', 'Bucket'], 'Broom'),
                    $this->fillBlank('I need a ____ to sweep the floor.', ['broom', 'brooms', 'brooming', 'broomed'], 'broom'),
                    $this->tapWord('Where is the cleaning spray', ['spray', 'Where', 'is', 'the', 'cleaning'], ['Where', 'is', 'the', 'cleaning', 'spray']),
                    $this->listenSelect('This mop is very useful', ['This mop is very useful', 'This broom is broken', 'The bucket is empty', 'The sponge is wet']),
                    $this->multipleChoice('What does "detergent" mean?', ['A substance used for cleaning', 'A type of food', 'A kitchen tool', 'A soft cloth'], 'A substance used for cleaning'),
                    $this->multipleChoice('Which item do you use to clean windows?', ['Glass cleaner', 'Toothpaste', 'Shampoo', 'Toilet paper'], 'Glass cleaner'),
                ],
            ],
            [
                'title' => 'Lesson 2: Laundry Essentials',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Washing powder', ['Washing powder', 'Fabric softener', 'Bleach', 'Clothespin'], 'Washing powder'),
                    $this->fillBlank('Please add some ____ to the washing machine.', ['detergent', 'detergents', 'detergenting', 'detergented'], 'detergent'),
                    $this->tapWord('I am doing the laundry today', ['today', 'I', 'am', 'doing', 'the', 'laundry'], ['I', 'am', 'doing', 'the', 'laundry', 'today']),
                    $this->listenSelect('Do you have fabric softener?', ['Do you have fabric softener?', 'Is the bleach expensive?', 'Where are the clothespins?', 'I need a laundry basket']),
                    $this->multipleChoice('What does "bleach" mean?', ['A chemical that whitens clothes', 'A soft fabric', 'A type of soap', 'A clothes hanger'], 'A chemical that whitens clothes'),
                    $this->fillBlank('These clothes are still ____ from the wash.', ['wet', 'wets', 'wetting', 'wetted'], 'wet'),
                ],
            ],
            [
                'title' => 'Lesson 3: Paper Products',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Paper towels', ['Paper towels', 'Napkins', 'Tissues', 'Toilet paper'], 'Paper towels'),
                    $this->fillBlank('We need more ____ for the kitchen.', ['paper towels', 'paper towel', 'papering towels', 'papered towels'], 'paper towels'),
                    $this->tapWord('This tissue box is empty', ['empty', 'This', 'tissue', 'box', 'is'], ['This', 'tissue', 'box', 'is', 'empty']),
                    $this->listenSelect('Please pass me a napkin', ['Please pass me a napkin', 'Please pass me a spoon', 'Please pass me a bag', 'Please pass me a bottle']),
                    $this->multipleChoice('Which item is used to wipe your mouth at the table?', ['Napkin', 'Toilet paper', 'Sponge', 'Mop'], 'Napkin'),
                    $this->tapWord('I bought a pack of napkins', ['napkins', 'I', 'bought', 'a', 'pack', 'of'], ['I', 'bought', 'a', 'pack', 'of', 'napkins']),
                ],
            ],
            [
                'title' => 'Lesson 4: Toiletries & Personal Care',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Toothpaste', ['Toothpaste', 'Shampoo', 'Soap', 'Razor'], 'Toothpaste'),
                    $this->fillBlank('I brush my teeth with ____ every morning.', ['toothpaste', 'toothpastes', 'toothpasting', 'toothpasted'], 'toothpaste'),
                    $this->tapWord('I forgot to buy shampoo', ['shampoo', 'I', 'forgot', 'to', 'buy'], ['I', 'forgot', 'to', 'buy', 'shampoo']),
                    $this->listenSelect('This soap smells very nice', ['This soap smells very nice', 'This razor is sharp', 'This shampoo is expensive', 'This towel is soft']),
                    $this->multipleChoice('What does "toiletries" mean?', ['Personal hygiene products', 'Kitchen tools', 'Cleaning chemicals', 'Paper products'], 'Personal hygiene products'),
                    $this->listenSelect('I need a new toothbrush', ['I need a new toothbrush', 'I need a new razor', 'I need more shampoo', 'I need some soap']),
                ],
            ],
            [
                'title' => 'Lesson 5: Trash & Storage',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Trash bag', ['Trash bag', 'Storage box', 'Plastic wrap', 'Aluminum foil'], 'Trash bag'),
                    $this->fillBlank('Put the rubbish in the ____.', ['trash bag', 'trash bags', 'trashing bag', 'trashed bag'], 'trash bag'),
                    $this->tapWord('These storage boxes are very useful', ['useful', 'These', 'storage', 'boxes', 'are', 'very'], ['These', 'storage', 'boxes', 'are', 'very', 'useful']),
                    $this->listenSelect('We are out of trash bags', ['We are out of trash bags', 'We need more napkins', 'The bin is empty', 'The boxes are heavy']),
                    $this->multipleChoice('What does "aluminum foil" mean?', ['A thin metal sheet used to wrap food', 'A type of paper towel', 'A cleaning spray', 'A storage box'], 'A thin metal sheet used to wrap food'),
                    $this->matchPairs('Plastic wrap', ['Plastic wrap', 'Aluminum foil', 'Storage box', 'Trash bag'], 'Plastic wrap'),
                ],
            ],
            [
                'title' => 'Lesson 6: Kitchen & Dishwashing',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Dish soap', ['Dish soap', 'Sponge', 'Dishcloth', 'Scrub brush'], 'Dish soap'),
                    $this->fillBlank('I use ____ to wash the dishes.', ['dish soap', 'dish soaps', 'dishing soap', 'dished soap'], 'dish soap'),
                    $this->tapWord('This sponge is more absorbent than that one', ['one', 'This', 'sponge', 'is', 'more', 'absorbent', 'than', 'that'], ['This', 'sponge', 'is', 'more', 'absorbent', 'than', 'that', 'one']),
                    $this->listenSelect('The dishcloth is on the counter', ['The dishcloth is on the counter', 'The soap is under the sink', 'The brush is in the drawer', 'The sponge is by the sink']),
                    $this->multipleChoice('Which item is best for scrubbing a dirty pot?', ['Scrub brush', 'Napkin', 'Toothpaste', 'Paper towel'], 'Scrub brush'),
                    $this->multipleChoice('What does "absorbent" mean?', ['Able to soak up liquid', 'Able to cut food', 'Able to burn easily', 'Able to shine'], 'Able to soak up liquid'),
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
