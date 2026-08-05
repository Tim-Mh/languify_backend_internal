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

class EnglishUnitRestaurant08Seeder extends Seeder
{
    /**
     * Seeds "Unit 8: Desserts & Sweets" (6 lessons x 6 exercises) into the
     * existing Restaurant chapter for English.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();
        $chapter = Chapter::where('language_id', $english->id)->where('chapter_key', ChapterKey::Restaurant)->firstOrFail();
        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 8: Desserts & Sweets'],
            ['order_number' => 8]
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
                'title' => 'Lesson 1: Dessert Menu Vocabulary',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Cake', ['Cake', 'Pie', 'Cookie', 'Pudding'], 'Cake'),
                    $this->matchPairs('Ice Cream', ['Ice Cream', 'Pastry', 'Pie', 'Cookie'], 'Ice Cream'),
                    $this->fillBlank('I would like a slice of ____ for dessert.', ['cake', 'cakes', 'caking', 'caked'], 'cake'),
                    $this->tapWord('I would like some ice cream', ['ice', 'I', 'would', 'cream', 'like', 'some'], ['I', 'would', 'like', 'some', 'ice', 'cream']),
                    $this->listenSelect('Do you have any pudding?', ['Do you have any pudding?', 'Can I pay by card?', 'Where is the restroom?', 'Is the soup hot?']),
                    $this->multipleChoice('What does "pastry" mean?', ['A baked dough dessert', 'A cold drink', 'A type of meat', 'A vegetable'], 'A baked dough dessert'),
                ],
            ],
            [
                'title' => 'Lesson 2: Ordering Dessert',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Waiter', ['Waiter', 'Chef', 'Customer', 'Cashier'], 'Waiter'),
                    $this->fillBlank('I would like to ____ the chocolate cake.', ['order', 'orders', 'ordering', 'ordered'], 'order'),
                    $this->fillBlank('Could I ____ a slice of pie, please?', ['have', 'has', 'having', 'had'], 'have'),
                    $this->tapWord('Could I have the apple pie', ['have', 'Could', 'I', 'the', 'apple', 'pie'], ['Could', 'I', 'have', 'the', 'apple', 'pie']),
                    $this->listenSelect("I'll have the cheesecake, please", ["I'll have the cheesecake, please", 'The bill, please', 'I am not hungry', 'Do you have a menu?']),
                    $this->multipleChoice('What do you say to order dessert politely?', ['Could I have the ice cream, please?', 'Give me ice cream now', 'I want ice cream', 'Ice cream now'], 'Could I have the ice cream, please?'),
                ],
            ],
            [
                'title' => 'Lesson 3: Ice Cream Flavors & Preferences',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Vanilla', ['Vanilla', 'Chocolate', 'Strawberry', 'Mango'], 'Vanilla'),
                    $this->fillBlank('Chocolate ice cream is ____ than vanilla.', ['sweeter', 'sweet', 'sweetest', 'sweetness'], 'sweeter'),
                    $this->tapWord('This flavor is sweeter than that one', ['sweeter', 'This', 'flavor', 'is', 'than', 'that', 'one'], ['This', 'flavor', 'is', 'sweeter', 'than', 'that', 'one']),
                    $this->tapWord('Strawberry is my favorite flavor', ['flavor', 'Strawberry', 'is', 'my', 'favorite'], ['Strawberry', 'is', 'my', 'favorite', 'flavor']),
                    $this->listenSelect('Which flavor do you like best?', ['Which flavor do you like best?', 'How much does it cost?', 'Is this table free?', 'Can I have the bill?']),
                    $this->multipleChoice('Which sentence uses a comparative correctly?', ['This cake is sweeter than that pie.', 'This cake is sweet than that pie.', 'This cake more sweet that pie.', 'This cake sweetest than pie.'], 'This cake is sweeter than that pie.'),
                ],
            ],
            [
                'title' => 'Lesson 4: Sharing Dessert with Others',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Spoon', ['Spoon', 'Fork', 'Knife', 'Plate'], 'Spoon'),
                    $this->fillBlank("Let's share this ____ of cake.", ['slice', 'slices', 'slicing', 'sliced'], 'slice'),
                    $this->tapWord('Let us share this dessert together', ['dessert', 'Let', 'us', 'share', 'this', 'together'], ['Let', 'us', 'share', 'this', 'dessert', 'together']),
                    $this->listenSelect('Would you like to share a dessert?', ['Would you like to share a dessert?', 'Are you ready to pay?', 'Is the food fresh?', 'Do you need a napkin?']),
                    $this->listenSelect('Can I have a bite of your cake?', ['Can I have a bite of your cake?', 'Can I have the whole cake?', 'Is this cake fresh?', 'Where is the cake?']),
                    $this->multipleChoice('What does "a bite" mean?', ['A small taste of food', 'A full meal', 'A type of dessert', 'A type of drink'], 'A small taste of food'),
                ],
            ],
            [
                'title' => 'Lesson 5: Describing Taste & Texture',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Creamy', ['Creamy', 'Crunchy', 'Sour', 'Bitter'], 'Creamy'),
                    $this->fillBlank('This chocolate cake is very ____.', ['rich', 'riches', 'richer', 'riched'], 'rich'),
                    $this->tapWord('This pudding tastes very creamy', ['creamy', 'This', 'pudding', 'tastes', 'very'], ['This', 'pudding', 'tastes', 'very', 'creamy']),
                    $this->listenSelect('This pie tastes a little sour', ['This pie tastes a little sour', 'This pie tastes very sweet', 'This pie is too hot', 'This pie has no sugar']),
                    $this->multipleChoice('What does "crunchy" describe?', ['A texture that makes a crisp sound when bitten', 'A very sweet taste', 'A cold temperature', 'A liquid food'], 'A texture that makes a crisp sound when bitten'),
                    $this->multipleChoice('Which word means "having a lot of sugar"?', ['Sweet', 'Sour', 'Bitter', 'Salty'], 'Sweet'),
                ],
            ],
            [
                'title' => 'Lesson 6: Asking for Recommendations',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Recommend', ['Recommend', 'Suggest', 'Order', 'Choose'], 'Recommend'),
                    $this->fillBlank('What ____ you recommend for dessert?', ['do', 'does', 'did', 'done'], 'do'),
                    $this->tapWord('What would you recommend for dessert', ['recommend', 'What', 'would', 'you', 'for', 'dessert'], ['What', 'would', 'you', 'recommend', 'for', 'dessert']),
                    $this->listenSelect('Do you have any sugar-free desserts?', ['Do you have any sugar-free desserts?', 'Is the restaurant open now?', 'Can I get a table for two?', 'Where is the restroom?']),
                    $this->multipleChoice('Which question asks for a dessert suggestion?', ['What would you recommend?', 'Where is the kitchen?', 'How much is the bill?', 'Is this seat taken?'], 'What would you recommend?'),
                    $this->matchPairs('Menu', ['Menu', 'Bill', 'Receipt', 'Napkin'], 'Menu'),
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
