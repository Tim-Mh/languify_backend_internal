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

class EnglishUnitSupermarket09Seeder extends Seeder
{
    /**
     * Seeds "Unit 9: Frozen & Packaged Food" under the existing Supermarket
     * chapter for English, with 6 lessons x 6 exercises each.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 9: Frozen & Packaged Food'],
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
                'title' => 'Lesson 1: Frozen Vegetables & Fruits',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Frozen peas', ['Frozen peas', 'Frozen corn', 'Frozen spinach', 'Frozen berries'], 'Frozen peas'),
                    $this->fillBlank('These frozen vegetables ____ in the freezer.', ['are kept', 'is kept', 'was kept', 'were keep'], 'are kept'),
                    $this->tapWord('I bought frozen strawberries yesterday', ['yesterday', 'I', 'strawberries', 'frozen', 'bought'], ['I', 'bought', 'frozen', 'strawberries', 'yesterday']),
                    $this->listenSelect('Put the frozen peas in the freezer', ['Put the frozen peas in the freezer', 'Put the fresh peas in the basket', 'Take the frozen corn to the counter', 'Leave the frozen fruit on the shelf']),
                    $this->multipleChoice('What does "frozen" mean?', ['Kept extremely cold to preserve it', 'Cooked at high heat', 'Fresh from the farm', 'Left outside overnight'], 'Kept extremely cold to preserve it'),
                    $this->fillBlank('This bag of frozen corn ____ two kilograms.', ['weighs', 'weigh', 'weighing', 'weighed'], 'weighs'),
                ],
            ],
            [
                'title' => 'Lesson 2: Frozen Meat & Fish',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Frozen chicken', ['Frozen chicken', 'Frozen beef', 'Frozen shrimp', 'Frozen salmon'], 'Frozen chicken'),
                    $this->fillBlank('You should ____ the frozen fish before cooking it.', ['defrost', 'defrosts', 'defrosting', 'defrosted'], 'defrost'),
                    $this->tapWord('Please freeze the meat today', ['today', 'Please', 'meat', 'the', 'freeze'], ['Please', 'freeze', 'the', 'meat', 'today']),
                    $this->tapWord('The frozen shrimp is on sale', ['sale', 'The', 'on', 'shrimp', 'frozen', 'is'], ['The', 'frozen', 'shrimp', 'is', 'on', 'sale']),
                    $this->listenSelect('This frozen beef is on sale', ['This frozen beef is on sale', 'This frozen chicken is expensive', 'This fresh fish is too small', 'This canned meat is spicy']),
                    $this->multipleChoice('Why do we freeze meat?', ['To keep it fresh for longer', 'To cook it faster', 'To make it cheaper', 'To change its color'], 'To keep it fresh for longer'),
                ],
            ],
            [
                'title' => 'Lesson 3: Canned Goods',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Canned beans', ['Canned beans', 'Canned corn', 'Canned tomatoes', 'Canned soup'], 'Canned beans'),
                    $this->fillBlank('Open the can with a ____.', ['can opener', 'can openers', 'opening can', 'opener can'], 'can opener'),
                    $this->tapWord('This canned soup tastes great', ['great', 'This', 'tastes', 'canned', 'soup'], ['This', 'canned', 'soup', 'tastes', 'great']),
                    $this->listenSelect('These canned tomatoes are cheaper than fresh ones', ['These canned tomatoes are cheaper than fresh ones', 'These canned beans are more expensive than fresh ones', 'These fresh tomatoes are cheaper than canned ones', 'These canned tomatoes are heavier than fresh ones']),
                    $this->multipleChoice('What does "canned" mean?', ['Sealed in a metal container for storage', 'Cooked in oil', 'Frozen solid', 'Sold without packaging'], 'Sealed in a metal container for storage'),
                    $this->multipleChoice('Which food is usually sold in a can?', ['Beans', 'Fresh lettuce', 'Ice cream', 'Bread'], 'Beans'),
                ],
            ],
            [
                'title' => 'Lesson 4: Reading Expiry Dates',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Expiry date', ['Expiry date', 'Best before', 'Use by', 'Production date'], 'Expiry date'),
                    $this->fillBlank('Always check the expiry date ____ you buy food.', ['before', 'after', 'during', 'since'], 'before'),
                    $this->tapWord('The expiry date is on the label', ['label', 'The', 'on', 'is', 'date', 'expiry', 'the'], ['The', 'expiry', 'date', 'is', 'on', 'the', 'label']),
                    $this->listenSelect('This milk expires next week', ['This milk expires next week', 'This milk expired last month', 'This bread expires today', 'This juice never expires']),
                    $this->listenSelect('Do not eat food after the expiry date', ['Do not eat food after the expiry date', 'You can eat food after the expiry date', 'Always eat food before you buy it', 'Check the price before the expiry date']),
                    $this->multipleChoice('What does "expiry date" mean?', ['The date after which food should not be used', 'The date the food was made', 'The price of the food', 'The weight of the food'], 'The date after which food should not be used'),
                ],
            ],
            [
                'title' => 'Lesson 5: Storing Frozen & Packaged Food',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Freezer', ['Freezer', 'Fridge', 'Pantry', 'Cupboard'], 'Freezer'),
                    $this->matchPairs('Airtight container', ['Airtight container', 'Plastic bag', 'Paper box', 'Glass jar'], 'Airtight container'),
                    $this->fillBlank('You must keep frozen food ____ minus eighteen degrees.', ['below', 'above', 'between', 'beside'], 'below'),
                    $this->tapWord('Store the cans in a cool pantry', ['pantry', 'Store', 'cool', 'a', 'in', 'cans', 'the'], ['Store', 'the', 'cans', 'in', 'a', 'cool', 'pantry']),
                    $this->listenSelect('Keep the packaged food in a dry place', ['Keep the packaged food in a dry place', 'Keep the packaged food in the sun', 'Keep the frozen food out of the freezer', 'Keep the canned food in water']),
                    $this->multipleChoice('Where should you store frozen food?', ['In the freezer', 'In the pantry', 'On the counter', 'In a paper bag'], 'In the freezer'),
                ],
            ],
            [
                'title' => 'Lesson 6: Packaged Snacks & Ready Meals',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Ready meal', ['Ready meal', 'Frozen pizza', 'Instant noodles', 'Packaged chips'], 'Ready meal'),
                    $this->fillBlank('This ready meal ____ only three minutes to cook.', ['takes', 'take', 'taking', 'took'], 'takes'),
                    $this->fillBlank('These packaged snacks are ____ than homemade ones.', ['less healthy', 'healthiest', 'healthy', 'health'], 'less healthy'),
                    $this->tapWord('Heat the frozen pizza for ten minutes', ['minutes', 'Heat', 'ten', 'for', 'pizza', 'frozen', 'the'], ['Heat', 'the', 'frozen', 'pizza', 'for', 'ten', 'minutes']),
                    $this->listenSelect('This instant noodle package is quick to prepare', ['This instant noodle package is quick to prepare', 'This fresh salad takes an hour to prepare', 'This frozen pizza cannot be cooked', 'This canned soup must be frozen first']),
                    $this->multipleChoice('What does "ready meal" mean?', ['A meal that is already prepared and needs little cooking', 'A meal you cook from raw ingredients', 'A meal eaten only at restaurants', 'A drink'], 'A meal that is already prepared and needs little cooking'),
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
