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

class EnglishUnitRestaurant10Seeder extends Seeder
{
    /**
     * Seeds "Unit 10: Fast Food & Takeaway" under the existing Restaurant chapter:
     * ordering fast food, "for here or to go", and combo meals.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 10: Fast Food & Takeaway'],
            ['order_number' => 10]
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
                'title' => 'Lesson 1: Ordering at the Counter',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Burger', ['Burger', 'Fries', 'Milkshake', 'Salad'], 'Burger'),
                    $this->fillBlank('I would ____ a cheeseburger, please.', ['like', 'likes', 'liking', 'liked'], 'like'),
                    $this->tapWord('I would like a burger', ['burger', 'would', 'I', 'a', 'like'], ['I', 'would', 'like', 'a', 'burger']),
                    $this->listenSelect('Can I take your order?', ['Can I take your order?', 'Where is the bathroom?', 'What time is it?', 'How much is this shirt?']),
                    $this->multipleChoice('What is the polite way to order food?', ['I would like a burger, please.', 'Give me burger now.', 'Burger give me.', 'I want it fast.'], 'I would like a burger, please.'),
                    $this->matchPairs('Fries', ['Fries', 'Napkin', 'Straw', 'Tray'], 'Fries'),
                ],
            ],
            [
                'title' => 'Lesson 2: For Here or To Go',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('To go', ['To go', 'For here', 'Delivery', 'Drive-thru'], 'To go'),
                    $this->fillBlank('Is this ____ here or to go?', ['for', 'to', 'at', 'in'], 'for'),
                    $this->tapWord('Is this for here or to go', ['here', 'this', 'for', 'Is', 'to', 'or', 'go'], ['Is', 'this', 'for', 'here', 'or', 'to', 'go']),
                    $this->listenSelect('For here, please.', ['For here, please.', 'To go, please.', 'I want a refund.', 'Where is the exit?']),
                    $this->multipleChoice('What does "to go" mean at a fast food restaurant?', ['Take the food with you', 'Eat inside the restaurant', 'Order online', 'Pay by card'], 'Take the food with you'),
                    $this->fillBlank('We are eating ____ today, not taking it home.', ['here', 'to go', 'away', 'out'], 'here'),
                ],
            ],
            [
                'title' => 'Lesson 3: Combo Meals & Sizes',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Medium', ['Medium', 'Small', 'Large', 'Extra Large'], 'Medium'),
                    $this->fillBlank('Can I have a ____ combo meal, please?', ['large', 'larger', 'largest', 'largely'], 'large'),
                    $this->tapWord('This size is bigger than that one', ['bigger', 'This', 'than', 'size', 'is', 'that', 'one'], ['This', 'size', 'is', 'bigger', 'than', 'that', 'one']),
                    $this->listenSelect('Which size would you like?', ['Which size would you like?', 'What time do you close?', 'How was your day?', 'Is it raining outside?']),
                    $this->multipleChoice('Which size is bigger, medium or large?', ['Large', 'Medium', 'They are the same', 'Small'], 'Large'),
                    $this->tapWord('I want the medium combo meal', ['combo', 'I', 'medium', 'want', 'the', 'meal'], ['I', 'want', 'the', 'medium', 'combo', 'meal']),
                ],
            ],
            [
                'title' => 'Lesson 4: Customizing Your Order',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Onions', ['Onions', 'Pickles', 'Ketchup', 'Mustard'], 'Onions'),
                    $this->fillBlank('Can I have extra cheese ____ my burger?', ['on', 'in', 'at', 'for'], 'on'),
                    $this->tapWord('I want no onions on my burger', ['onions', 'I', 'want', 'no', 'on', 'burger', 'my'], ['I', 'want', 'no', 'onions', 'on', 'my', 'burger']),
                    $this->listenSelect('No pickles, please.', ['No pickles, please.', 'Extra cheese, please.', 'For here, please.', 'One moment, please.']),
                    $this->multipleChoice('How do you ask for extra cheese?', ['Can I have extra cheese, please?', 'Give cheese now.', 'Cheese I want.', 'No cheese for me.'], 'Can I have extra cheese, please?'),
                    $this->listenSelect('Extra cheese, please.', ['Extra cheese, please.', 'No onions, please.', 'For here, please.', 'To go, please.']),
                ],
            ],
            [
                'title' => 'Lesson 5: Drinks & Sides',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Milkshake', ['Milkshake', 'Soda', 'Water', 'Juice'], 'Milkshake'),
                    $this->fillBlank('How ____ fries would you like?', ['many', 'much', 'few', 'little'], 'many'),
                    $this->tapWord('I would like a large soda', ['soda', 'I', 'large', 'would', 'a', 'like'], ['I', 'would', 'like', 'a', 'large', 'soda']),
                    $this->listenSelect('Would you like a drink with that?', ['Would you like a drink with that?', 'What is your name?', 'Where do you live?', 'How old are you?']),
                    $this->multipleChoice("Which word do we use with \"water\" because it's uncountable?", ['much', 'many', 'a', 'two'], 'much'),
                    $this->multipleChoice('What can you order as a side dish?', ['Fries', 'A car', 'A book', 'A shirt'], 'Fries'),
                ],
            ],
            [
                'title' => 'Lesson 6: Paying & Getting Your Order',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Receipt', ['Receipt', 'Tray', 'Straw', 'Napkin'], 'Receipt'),
                    $this->fillBlank('____ you like anything else?', ['Would', 'Is', 'Do', 'Are'], 'Would'),
                    $this->tapWord('Here is your order', ['order', 'Here', 'your', 'is'], ['Here', 'is', 'your', 'order']),
                    $this->listenSelect('That will be five dollars.', ['That will be five dollars.', 'Here is your order.', 'Would you like anything else?', 'Enjoy your meal!']),
                    $this->multipleChoice('What do you say when you give someone their food?', ['Here you go!', 'Give me that.', 'I am hungry.', 'Where is it?'], 'Here you go!'),
                    $this->matchPairs('Tray', ['Tray', 'Receipt', 'Bag', 'Cup'], 'Tray'),
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
