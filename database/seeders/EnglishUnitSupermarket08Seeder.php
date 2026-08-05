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

class EnglishUnitSupermarket08Seeder extends Seeder
{
    /**
     * Seeds "Unit 8: Comparing Products & Prices" under the existing
     * Supermarket chapter, with 6 lessons x 6 exercises each.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 8: Comparing Products & Prices'],
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
                'title' => 'Lesson 1: Cheap vs Expensive',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Cheap', ['Cheap', 'Expensive', 'Free', 'Discounted'], 'Cheap'),
                    $this->fillBlank('This bag is ____ than that one.', ['cheaper', 'cheap', 'cheaply', 'cheapest'], 'cheaper'),
                    $this->tapWord('This phone is more expensive', ['expensive', 'This', 'phone', 'is', 'more'], ['This', 'phone', 'is', 'more', 'expensive']),
                    $this->listenSelect('This one is cheaper', ['This one is cheaper', 'This one is more expensive', 'This one is the same price', 'This one is free']),
                    $this->multipleChoice('What does "expensive" mean?', ['Costs a lot of money', 'Costs very little', 'Very small', 'Very large'], 'Costs a lot of money'),
                    $this->fillBlank('The red shoes are ____ than the blue shoes.', ['more expensive', 'expensive', 'expensively', 'most expensive'], 'more expensive'),
                ],
            ],
            [
                'title' => 'Lesson 2: Comparing Prices',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Price', ['Price', 'Discount', 'Cost', 'Value'], 'Price'),
                    $this->fillBlank('This jacket costs ____ than the other one.', ['less', 'few', 'small', 'short'], 'less'),
                    $this->tapWord('These shoes cost the same', ['same', 'These', 'shoes', 'cost', 'the'], ['These', 'shoes', 'cost', 'the', 'same']),
                    $this->listenSelect('It costs ten dollars more', ['It costs ten dollars more', 'It costs ten dollars less', 'It is the same price', 'It is on sale']),
                    $this->multipleChoice('What does "the same price" mean?', ['Both cost equally', 'One is cheaper', 'One is free', 'Prices are unknown'], 'Both cost equally'),
                    $this->tapWord('That brand is a bit pricier', ['pricier', 'That', 'brand', 'is', 'a', 'bit'], ['That', 'brand', 'is', 'a', 'bit', 'pricier']),
                ],
            ],
            [
                'title' => 'Lesson 3: Comparing Brands',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Brand', ['Brand', 'Product', 'Label', 'Model'], 'Brand'),
                    $this->fillBlank('I think this brand is ____ than that one.', ['better', 'best', 'good', 'well'], 'better'),
                    $this->tapWord('I prefer this brand', ['brand', 'I', 'prefer', 'this'], ['I', 'prefer', 'this', 'brand']),
                    $this->listenSelect('This brand is more popular', ['This brand is more popular', 'This brand is less popular', 'This brand is out of stock', 'This brand is on sale']),
                    $this->multipleChoice('What does "prefer" mean?', ['Like one thing more than another', 'Dislike something', 'Buy something', 'Sell something'], 'Like one thing more than another'),
                    $this->multipleChoice('Which sentence compares two brands correctly?', ['This brand is better than that one.', 'This brand better than that one.', 'This brand is gooder.', 'This brand more good.'], 'This brand is better than that one.'),
                ],
            ],
            [
                'title' => 'Lesson 4: Which One Is Better?',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Better', ['Better', 'Worse', 'Same', 'Equal'], 'Better'),
                    $this->fillBlank('____ one is better, this or that?', ['Which', 'What', 'Who', 'Where'], 'Which'),
                    $this->tapWord('Which one do you like', ['like', 'Which', 'one', 'do', 'you'], ['Which', 'one', 'do', 'you', 'like']),
                    $this->listenSelect('Which one is better?', ['Which one is better?', 'How much is it?', 'Where is it?', 'What color is it?']),
                    $this->multipleChoice('How do you ask someone to compare two things?', ['Which one is better?', 'Where is it?', 'How much is it?', 'What time is it?'], 'Which one is better?'),
                    $this->listenSelect('I like this one better', ['I like this one better', 'I like that one better', 'I like both the same', "I don't like either"]),
                ],
            ],
            [
                'title' => 'Lesson 5: Size & Quality',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Bigger', ['Bigger', 'Smaller', 'Heavier', 'Lighter'], 'Bigger'),
                    $this->fillBlank('This box is ____ than that one.', ['bigger', 'big', 'biggest', 'bigly'], 'bigger'),
                    $this->tapWord('The small pack is cheaper', ['cheaper', 'The', 'small', 'pack', 'is'], ['The', 'small', 'pack', 'is', 'cheaper']),
                    $this->listenSelect('This one is smaller but better', ['This one is smaller but better', 'This one is bigger but worse', 'This one is the same size', 'This one is broken']),
                    $this->multipleChoice('What does "quality" mean?', ['How good or bad something is', 'The price of something', 'The size of something', 'The color of something'], 'How good or bad something is'),
                    $this->matchPairs('Quality', ['Quality', 'Quantity', 'Price', 'Weight'], 'Quality'),
                ],
            ],
            [
                'title' => 'Lesson 6: Best Deals & Superlatives',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Cheapest', ['Cheapest', 'Most expensive', 'Biggest', 'Smallest'], 'Cheapest'),
                    $this->fillBlank('This is the ____ price in the store.', ['best', 'good', 'better', 'goodest'], 'best'),
                    $this->tapWord('This is the cheapest option', ['option', 'This', 'is', 'the', 'cheapest'], ['This', 'is', 'the', 'cheapest', 'option']),
                    $this->listenSelect('This is the best deal', ['This is the best deal', 'This is a bad deal', 'This is the most expensive', 'This is out of stock']),
                    $this->multipleChoice('What does "the best deal" mean?', ['The best value for your money', 'The most expensive item', 'A free item', 'A broken item'], 'The best value for your money'),
                    $this->fillBlank('Of the three brands, this one is the ____.', ['most expensive', 'expensive', 'more expensive', 'expensively'], 'most expensive'),
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
