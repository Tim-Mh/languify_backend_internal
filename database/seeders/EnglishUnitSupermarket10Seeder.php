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

class EnglishUnitSupermarket10Seeder extends Seeder
{
    /**
     * Seeds "Unit 10: Returns & Exchanges" under the Supermarket chapter,
     * with 6 lessons x 6 exercises each covering returning items, refunds,
     * and exchanging purchases.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 10: Returns & Exchanges'],
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
                'title' => 'Lesson 1: Returning a Faulty Item',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Faulty', ['Faulty', 'Perfect', 'New', 'Clean'], 'Faulty'),
                    $this->fillBlank('This blender is broken. It ____ turn on.', ["doesn't", "don't", "isn't", 'not'], "doesn't"),
                    $this->tapWord('This item is faulty', ['faulty', 'item', 'This', 'is'], ['This', 'item', 'is', 'faulty']),
                    $this->listenSelect('I want to return this because it is damaged', ['I want to return this because it is damaged', 'I want to buy this today', 'I love this product', 'This is a great gift']),
                    $this->multipleChoice('Why is the customer returning the toaster?', ['Because it is faulty', 'Because it is too big', 'Because it is a gift', 'Because he likes it'], 'Because it is faulty'),
                    $this->matchPairs('Damaged', ['Damaged', 'New', 'Fresh', 'Perfect'], 'Damaged'),
                ],
            ],
            [
                'title' => 'Lesson 2: Requesting a Refund',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Refund', ['Refund', 'Discount', 'Coupon', 'Receipt'], 'Refund'),
                    $this->fillBlank('I would like a ____, please.', ['refund', 'refunds', 'refunding', 'refunded'], 'refund'),
                    $this->tapWord('Can I get my money back', ['money', 'Can', 'back', 'I', 'get', 'my'], ['Can', 'I', 'get', 'my', 'money', 'back']),
                    $this->listenSelect('I would like to request a refund', ['I would like to request a refund', 'I would like to buy this shirt', 'I would like a bigger size', 'I need a shopping bag']),
                    $this->multipleChoice('What does "refund" mean?', ['Money given back to a customer', 'A discount on a new item', 'An exchange for another item', 'A free gift'], 'Money given back to a customer'),
                    $this->fillBlank('I need my receipt to get a ____.', ['refund', 'discount', 'coupon', 'bag'], 'refund'),
                ],
            ],
            [
                'title' => 'Lesson 3: Exchanging for a Different Size',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Exchange', ['Exchange', 'Refund', 'Discount', 'Receipt'], 'Exchange'),
                    $this->fillBlank('This shirt is too small. I need a ____ size.', ['bigger', 'big', 'biggest', 'more big'], 'bigger'),
                    $this->tapWord('I would like to exchange this for a larger size', ['size', 'I', 'larger', 'would', 'like', 'to', 'exchange', 'this', 'for', 'a'], ['I', 'would', 'like', 'to', 'exchange', 'this', 'for', 'a', 'larger', 'size']),
                    $this->listenSelect('Do you have this in a smaller size?', ['Do you have this in a smaller size?', 'Do you have a receipt?', 'Do you want a refund?', 'Do you like this color?']),
                    $this->multipleChoice('What should you say to exchange shoes for a bigger size?', ['I would like to exchange these for a bigger size', 'I would like to buy new shoes', 'I would like a refund only', 'I would like to keep these shoes'], 'I would like to exchange these for a bigger size'),
                    $this->tapWord('These shoes are too small for me', ['small', 'These', 'shoes', 'are', 'too', 'for', 'me'], ['These', 'shoes', 'are', 'too', 'small', 'for', 'me']),
                ],
            ],
            [
                'title' => 'Lesson 4: Receipts & Proof of Purchase',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Receipt', ['Receipt', 'Warranty', 'Coupon', 'Discount'], 'Receipt'),
                    $this->fillBlank('I ____ this jacket last week.', ['bought', 'buy', 'buys', 'buying'], 'bought'),
                    $this->tapWord('I have lost my receipt', ['receipt', 'I', 'have', 'lost', 'my'], ['I', 'have', 'lost', 'my', 'receipt']),
                    $this->listenSelect('Do you have your proof of purchase?', ['Do you have your proof of purchase?', 'Do you have a shopping list?', 'Do you have a discount card?', 'Do you have a shopping bag?']),
                    $this->multipleChoice('What is a "proof of purchase"?', ['Something that shows you bought an item', 'A type of discount', 'A store membership card', 'A shopping list'], 'Something that shows you bought an item'),
                    $this->listenSelect('I still have the original receipt', ['I still have the original receipt', 'I never got a receipt', 'I want a new receipt', 'I lost my shopping bag']),
                ],
            ],
            [
                'title' => 'Lesson 5: Store Return Policies',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Policy', ['Policy', 'Receipt', 'Warranty', 'Discount'], 'Policy'),
                    $this->fillBlank('You can return this item ____ 30 days.', ['within', 'inside', 'between', 'at'], 'within'),
                    $this->tapWord('You must return it within thirty days', ['days', 'You', 'must', 'return', 'it', 'within', 'thirty'], ['You', 'must', 'return', 'it', 'within', 'thirty', 'days']),
                    $this->listenSelect('What is your return policy?', ['What is your return policy?', 'What is your phone number?', 'What is the price of this?', 'What time do you open?']),
                    $this->multipleChoice('According to most store policies, when can you return an item?', ['Within a certain number of days', 'Only on the day you bought it', 'Never', 'Only with a manager present'], 'Within a certain number of days'),
                    $this->multipleChoice('What do you need to return an item under most policies?', ['A receipt or proof of purchase', 'A shopping cart', 'A discount coupon', 'A loyalty card'], 'A receipt or proof of purchase'),
                ],
            ],
            [
                'title' => 'Lesson 6: Talking to Customer Service',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Manager', ['Manager', 'Cashier', 'Customer', 'Stranger'], 'Manager'),
                    $this->fillBlank('Could you ____ me with a return, please?', ['help', 'helps', 'helping', 'helped'], 'help'),
                    $this->tapWord('Could you help me with this return', ['return', 'Could', 'you', 'help', 'me', 'with', 'this'], ['Could', 'you', 'help', 'me', 'with', 'this', 'return']),
                    $this->listenSelect('I would like to speak to the manager', ['I would like to speak to the manager', 'I would like to buy a gift', 'I would like a discount', 'I would like to pay in cash']),
                    $this->multipleChoice('What can you say to ask for help politely at customer service?', ['Could you help me with a return, please?', 'Give me my money now!', 'This store is terrible.', 'I do not need help.'], 'Could you help me with a return, please?'),
                    $this->matchPairs('Complaint', ['Complaint', 'Compliment', 'Question', 'Answer'], 'Complaint'),
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
