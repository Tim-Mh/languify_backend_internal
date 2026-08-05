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
 * TRANSLATION TEMPLATE — full English "Supermarket" chapter
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
class EnglishSupermarketFullSeeder extends Seeder
{
    private const LANGUAGE_CODE = 'en';

    public function run(): void
    {
        $language = Language::where('code', self::LANGUAGE_CODE)->firstOrFail();

        $chapter = Chapter::firstOrCreate(
            ['language_id' => $language->id, 'chapter_key' => ChapterKey::Supermarket],
            ['title' => 'Supermarket', 'order_number' => 4]
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
                'title' => 'Unit 1: Finding Items',
                'order' => 1,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Asking for Help',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Aisle',
                                    'options' => [
                                        [
                                            'text' => 'Aisle',
                                            'image' => '/images/exercises/aisle.png',
                                        ],
                                        [
                                            'text' => 'Shelf',
                                            'image' => '/images/exercises/shelf.png',
                                        ],
                                        [
                                            'text' => 'Basket',
                                            'image' => '/images/exercises/basket.png',
                                        ],
                                        [
                                            'text' => 'Cart',
                                            'image' => '/images/exercises/cart.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Aisle',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'milk',
                                        'milks',
                                        'milking',
                                        'milked',
                                    ],
                                    'sentence' => 'Where can I find the ____?',
                                    'correct_answer' => 'milk',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bread',
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
                                        'bread',
                                    ],
                                    'target_sentence' => 'Excuse me, where is the bread',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It\'s in aisle three',
                                        'We don\'t have that',
                                        'It\'s over there',
                                        'Check the shelf',
                                    ],
                                    'audio_url' => '/audio/exercises/its-in-aisle-three.mp3',
                                    'audio_text' => 'It\'s in aisle three',
                                    'correct_answer' => 'It\'s in aisle three',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'aisle',
                                    'options' => [
                                        'A passage between shelves in a store',
                                        'A type of food',
                                        'A cash register',
                                        'A shopping bag',
                                    ],
                                    'correct_answer' => 'A passage between shelves in a store',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Shopping List',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'List',
                                    'options' => [
                                        [
                                            'text' => 'List',
                                            'image' => '/images/exercises/list.png',
                                        ],
                                        [
                                            'text' => 'Cart',
                                            'image' => '/images/exercises/cart.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                        [
                                            'text' => 'Coupon',
                                            'image' => '/images/exercises/coupon.png',
                                        ],
                                    ],
                                    'correct_answer' => 'List',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'eggs',
                                        'egg',
                                        'eggses',
                                        'egged',
                                    ],
                                    'sentence' => 'I need to buy some ____.',
                                    'correct_answer' => 'eggs',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'list',
                                        'I',
                                        'forgot',
                                        'my',
                                        'shopping',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'forgot',
                                        'my',
                                        'shopping',
                                        'list',
                                    ],
                                    'target_sentence' => 'I forgot my shopping list',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have a cart?',
                                        'This is expensive',
                                        'I need a bag',
                                        'Where is the exit?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-a-cart.mp3',
                                    'audio_text' => 'Do you have a cart?',
                                    'correct_answer' => 'Do you have a cart?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'shopping list',
                                    'options' => [
                                        'A list of things to buy',
                                        'A list of prices',
                                        'A type of basket',
                                        'A store name',
                                    ],
                                    'correct_answer' => 'A list of things to buy',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 2: Fruits & Vegetables',
                'order' => 2,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Common Fruits',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Apple',
                                    'options' => [
                                        [
                                            'text' => 'Apple',
                                            'image' => '/images/exercises/apple.png',
                                        ],
                                        [
                                            'text' => 'Banana',
                                            'image' => '/images/exercises/banana.png',
                                        ],
                                        [
                                            'text' => 'Orange',
                                            'image' => '/images/exercises/orange.png',
                                        ],
                                        [
                                            'text' => 'Grapes',
                                            'image' => '/images/exercises/grapes.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Apple',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'apples',
                                        'apple',
                                        'applies',
                                        'appled',
                                    ],
                                    'sentence' => 'I would like two ____.',
                                    'correct_answer' => 'apples',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'fresh',
                                        'These',
                                        'bananas',
                                        'look',
                                    ],
                                    'correct_order' => [
                                        'These',
                                        'bananas',
                                        'look',
                                        'fresh',
                                    ],
                                    'target_sentence' => 'These bananas look fresh',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Are these oranges sweet?',
                                        'How much is this bag?',
                                        'I need a basket',
                                        'Where is the exit?',
                                    ],
                                    'audio_url' => '/audio/exercises/are-these-oranges-sweet.mp3',
                                    'audio_text' => 'Are these oranges sweet?',
                                    'correct_answer' => 'Are these oranges sweet?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'fresh',
                                    'options' => [
                                        'Recently picked, not old',
                                        'Very old',
                                        'Very cheap',
                                        'Very expensive',
                                    ],
                                    'correct_answer' => 'Recently picked, not old',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Common Vegetables',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Carrot',
                                    'options' => [
                                        [
                                            'text' => 'Carrot',
                                            'image' => '/images/exercises/carrot.png',
                                        ],
                                        [
                                            'text' => 'Potato',
                                            'image' => '/images/exercises/potato.png',
                                        ],
                                        [
                                            'text' => 'Onion',
                                            'image' => '/images/exercises/onion.png',
                                        ],
                                        [
                                            'text' => 'Tomato',
                                            'image' => '/images/exercises/tomato.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Carrot',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'potatoes',
                                        'potato',
                                        'potatos',
                                        'potatoed',
                                    ],
                                    'sentence' => 'Can I have a kilo of ____?',
                                    'correct_answer' => 'potatoes',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'tomatoes',
                                        'I',
                                        'need',
                                        'some',
                                        'fresh',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'need',
                                        'some',
                                        'fresh',
                                        'tomatoes',
                                    ],
                                    'target_sentence' => 'I need some fresh tomatoes',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'These onions are cheap',
                                        'This is too spicy',
                                        'I want a receipt',
                                        'Where is the milk?',
                                    ],
                                    'audio_url' => '/audio/exercises/these-onions-are-cheap.mp3',
                                    'audio_text' => 'These onions are cheap',
                                    'correct_answer' => 'These onions are cheap',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'vegetable',
                                    'options' => [
                                        'A plant food like carrot or potato',
                                        'A type of meat',
                                        'A type of fruit',
                                        'A drink',
                                    ],
                                    'correct_answer' => 'A plant food like carrot or potato',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 3: Checkout & Payment',
                'order' => 3,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: At the Checkout',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cashier',
                                    'options' => [
                                        [
                                            'text' => 'Cashier',
                                            'image' => '/images/exercises/cashier.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                        [
                                            'text' => 'Bag',
                                            'image' => '/images/exercises/bag.png',
                                        ],
                                        [
                                            'text' => 'Trolley',
                                            'image' => '/images/exercises/trolley.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cashier',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bag',
                                        'bags',
                                        'bagging',
                                        'bagged',
                                    ],
                                    'sentence' => 'Please put it in a ____.',
                                    'correct_answer' => 'bag',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cards',
                                        'Do',
                                        'you',
                                        'accept',
                                        'credit',
                                    ],
                                    'correct_order' => [
                                        'Do',
                                        'you',
                                        'accept',
                                        'credit',
                                        'cards',
                                    ],
                                    'target_sentence' => 'Do you accept credit cards',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That will be ten dollars',
                                        'Do you have a bag?',
                                        'Thank you, come again',
                                        'Here is your receipt',
                                    ],
                                    'audio_url' => '/audio/exercises/that-will-be-ten-dollars.mp3',
                                    'audio_text' => 'That will be ten dollars',
                                    'correct_answer' => 'That will be ten dollars',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'cashier',
                                    'options' => [
                                        'The person who takes your payment',
                                        'The person who packs bags',
                                        'A type of trolley',
                                        'A type of coupon',
                                    ],
                                    'correct_answer' => 'The person who takes your payment',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Using Discounts',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Discount',
                                    'options' => [
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                        [
                                            'text' => 'Coupon',
                                            'image' => '/images/exercises/coupon.png',
                                        ],
                                        [
                                            'text' => 'Sale',
                                            'image' => '/images/exercises/sale.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Discount',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'sale',
                                        'sales',
                                        'saling',
                                        'saled',
                                    ],
                                    'sentence' => 'This item is on ____.',
                                    'correct_answer' => 'sale',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'coupon',
                                        'I',
                                        'have',
                                        'a',
                                        'discount',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'a',
                                        'discount',
                                        'coupon',
                                    ],
                                    'target_sentence' => 'I have a discount coupon',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This is fifty percent off',
                                        'This is the full price',
                                        'I don\'t have a coupon',
                                        'The store is closed',
                                    ],
                                    'audio_url' => '/audio/exercises/this-is-fifty-percent-off.mp3',
                                    'audio_text' => 'This is fifty percent off',
                                    'correct_answer' => 'This is fifty percent off',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'discount',
                                    'options' => [
                                        'A reduction in price',
                                        'An increase in price',
                                        'A type of bag',
                                        'A type of card',
                                    ],
                                    'correct_answer' => 'A reduction in price',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 4: Dairy & Bakery',
                'order' => 4,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Types of Milk',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Milk',
                                    'options' => [
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Cheese',
                                            'image' => '/images/exercises/cheese.png',
                                        ],
                                        [
                                            'text' => 'Bread',
                                            'image' => '/images/exercises/bread.png',
                                        ],
                                        [
                                            'text' => 'Butter',
                                            'image' => '/images/exercises/butter.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Milk',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'milk',
                                        'milks',
                                        'milking',
                                        'milked',
                                    ],
                                    'sentence' => 'I would like a carton of ____.',
                                    'correct_answer' => 'milk',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'fresh',
                                        'This',
                                        'milk',
                                        'is',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'milk',
                                        'is',
                                        'very',
                                        'fresh',
                                    ],
                                    'target_sentence' => 'This milk is very fresh',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have skimmed milk?',
                                        'Is this milk fresh?',
                                        'How much is the cheese?',
                                        'Where is the bakery?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-skimmed-milk.mp3',
                                    'audio_text' => 'Do you have skimmed milk?',
                                    'correct_answer' => 'Do you have skimmed milk?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'skimmed milk',
                                    'options' => [
                                        'Milk with the fat removed',
                                        'Milk with extra cream',
                                        'Milk from goats',
                                        'Milk that is sour',
                                    ],
                                    'correct_answer' => 'Milk with the fat removed',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'some',
                                        'a',
                                        'many',
                                        'few',
                                    ],
                                    'sentence' => 'We need ____ milk for the recipe.',
                                    'correct_answer' => 'some',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Cheese Varieties',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cheddar',
                                    'options' => [
                                        [
                                            'text' => 'Cheddar',
                                            'image' => '/images/exercises/cheddar.png',
                                        ],
                                        [
                                            'text' => 'Mozzarella',
                                            'image' => '/images/exercises/mozzarella.png',
                                        ],
                                        [
                                            'text' => 'Butter',
                                            'image' => '/images/exercises/butter.png',
                                        ],
                                        [
                                            'text' => 'Yogurt',
                                            'image' => '/images/exercises/yogurt.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cheddar',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'softer',
                                        'soft',
                                        'softest',
                                        'softly',
                                    ],
                                    'sentence' => 'This cheese is ____ than that one.',
                                    'correct_answer' => 'softer',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cheese',
                                        'I',
                                        'love',
                                        'mozzarella',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'love',
                                        'mozzarella',
                                        'cheese',
                                    ],
                                    'target_sentence' => 'I love mozzarella cheese',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can I try a piece of cheese?',
                                        'Is the bread fresh?',
                                        'How much is the milk?',
                                        'Where is the cashier?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-i-try-a-piece-of-cheese.mp3',
                                    'audio_text' => 'Can I try a piece of cheese?',
                                    'correct_answer' => 'Can I try a piece of cheese?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'cream cheese',
                                    'options' => [
                                        'A soft, smooth cheese spread',
                                        'A hard yellow cheese',
                                        'A type of milk',
                                        'A type of bread',
                                    ],
                                    'correct_answer' => 'A soft, smooth cheese spread',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'strong',
                                        'This',
                                        'cheese',
                                        'smells',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'cheese',
                                        'smells',
                                        'strong',
                                    ],
                                    'target_sentence' => 'This cheese smells strong',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Bread & Loaves',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Loaf',
                                    'options' => [
                                        [
                                            'text' => 'Loaf',
                                            'image' => '/images/exercises/loaf.png',
                                        ],
                                        [
                                            'text' => 'Baguette',
                                            'image' => '/images/exercises/baguette.png',
                                        ],
                                        [
                                            'text' => 'Roll',
                                            'image' => '/images/exercises/roll.png',
                                        ],
                                        [
                                            'text' => 'Slice',
                                            'image' => '/images/exercises/slice.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Loaf',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'loaves',
                                        'loaf',
                                        'loafs',
                                        'loafes',
                                    ],
                                    'sentence' => 'I bought two ____ of bread.',
                                    'correct_answer' => 'loaves',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'baguette',
                                        'Can',
                                        'I',
                                        'have',
                                        'a',
                                        'fresh',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'I',
                                        'have',
                                        'a',
                                        'fresh',
                                        'baguette',
                                    ],
                                    'target_sentence' => 'Can I have a fresh baguette',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Is this bread whole wheat?',
                                        'Do you sell cheese here?',
                                        'How much is a loaf?',
                                        'Where is the milk aisle?',
                                    ],
                                    'audio_url' => '/audio/exercises/is-this-bread-whole-wheat.mp3',
                                    'audio_text' => 'Is this bread whole wheat?',
                                    'correct_answer' => 'Is this bread whole wheat?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'slice',
                                    'options' => [
                                        'A thin flat piece cut from bread',
                                        'A whole loaf',
                                        'A type of cheese',
                                        'A bakery tool',
                                    ],
                                    'correct_answer' => 'A thin flat piece cut from bread',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'whole wheat',
                                    'options' => [
                                        'Bread made from the whole grain',
                                        'Bread made only from white flour',
                                        'A type of cheese',
                                        'A sweet pastry',
                                    ],
                                    'correct_answer' => 'Bread made from the whole grain',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: At the Bakery Counter',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Croissant',
                                    'options' => [
                                        [
                                            'text' => 'Croissant',
                                            'image' => '/images/exercises/croissant.png',
                                        ],
                                        [
                                            'text' => 'Cake',
                                            'image' => '/images/exercises/cake.png',
                                        ],
                                        [
                                            'text' => 'Cookie',
                                            'image' => '/images/exercises/cookie.png',
                                        ],
                                        [
                                            'text' => 'Muffin',
                                            'image' => '/images/exercises/muffin.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Croissant',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cake',
                                        'cakes',
                                        'caking',
                                        'caked',
                                    ],
                                    'sentence' => 'Could I have a slice of ____, please?',
                                    'correct_answer' => 'cake',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'croissant',
                                        'How',
                                        'much',
                                        'is',
                                        'this',
                                    ],
                                    'correct_order' => [
                                        'How',
                                        'much',
                                        'is',
                                        'this',
                                        'croissant',
                                    ],
                                    'target_sentence' => 'How much is this croissant',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'These pastries look delicious',
                                        'The bread is stale',
                                        'Is the milk cold?',
                                        'Where is the cheese?',
                                    ],
                                    'audio_url' => '/audio/exercises/these-pastries-look-delicious.mp3',
                                    'audio_text' => 'These pastries look delicious',
                                    'correct_answer' => 'These pastries look delicious',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'bakery',
                                    'options' => [
                                        'A shop that sells bread and cakes',
                                        'A shop that sells meat',
                                        'A shop that sells fruit',
                                        'A shop that sells milk',
                                    ],
                                    'correct_answer' => 'A shop that sells bread and cakes',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Muffin',
                                    'options' => [
                                        [
                                            'text' => 'Muffin',
                                            'image' => '/images/exercises/muffin.png',
                                        ],
                                        [
                                            'text' => 'Cookie',
                                            'image' => '/images/exercises/cookie.png',
                                        ],
                                        [
                                            'text' => 'Baguette',
                                            'image' => '/images/exercises/baguette.png',
                                        ],
                                        [
                                            'text' => 'Cheddar',
                                            'image' => '/images/exercises/cheddar.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Muffin',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Yogurt & Butter',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Yogurt',
                                    'options' => [
                                        [
                                            'text' => 'Yogurt',
                                            'image' => '/images/exercises/yogurt.png',
                                        ],
                                        [
                                            'text' => 'Butter',
                                            'image' => '/images/exercises/butter.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Cheese',
                                            'image' => '/images/exercises/cheese.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Yogurt',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'in',
                                        'on',
                                        'at',
                                        'by',
                                    ],
                                    'sentence' => 'I always keep the butter ____ the fridge.',
                                    'correct_answer' => 'in',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'toast',
                                        'She',
                                        'spreads',
                                        'butter',
                                        'on',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'spreads',
                                        'butter',
                                        'on',
                                        'toast',
                                    ],
                                    'target_sentence' => 'She spreads butter on toast',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you prefer yogurt or butter?',
                                        'Is the bread fresh?',
                                        'How much is the cheese?',
                                        'Where is the bakery?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-prefer-yogurt-or-butter.mp3',
                                    'audio_text' => 'Do you prefer yogurt or butter?',
                                    'correct_answer' => 'Do you prefer yogurt or butter?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'To put a soft food on bread',
                                        'To cut something',
                                        'To buy something',
                                        'To bake something',
                                    ],
                                    'question' => 'What does "spread" mean here?',
                                    'correct_answer' => 'To put a soft food on bread',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This yogurt tastes sour',
                                        'This bread tastes sweet',
                                        'This cheese is hard',
                                        'This milk is cold',
                                    ],
                                    'audio_url' => '/audio/exercises/this-yogurt-tastes-sour.mp3',
                                    'audio_text' => 'This yogurt tastes sour',
                                    'correct_answer' => 'This yogurt tastes sour',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Freshness, Prices & Quantities',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Fresh',
                                    'options' => [
                                        [
                                            'text' => 'Fresh',
                                            'image' => '/images/exercises/fresh.png',
                                        ],
                                        [
                                            'text' => 'Stale',
                                            'image' => '/images/exercises/stale.png',
                                        ],
                                        [
                                            'text' => 'Expired',
                                            'image' => '/images/exercises/expired.png',
                                        ],
                                        [
                                            'text' => 'Frozen',
                                            'image' => '/images/exercises/frozen.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Fresh',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'fresher',
                                        'fresh',
                                        'freshest',
                                        'freshly',
                                    ],
                                    'sentence' => 'This bread is ____ than the one from yesterday.',
                                    'correct_answer' => 'fresher',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'need',
                                        'How',
                                        'many',
                                        'loaves',
                                        'do',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'How',
                                        'many',
                                        'loaves',
                                        'do',
                                        'you',
                                        'need',
                                    ],
                                    'target_sentence' => 'How many loaves do you need',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How much does this cheese cost?',
                                        'How many eggs do you need?',
                                        'Is the milk fresh?',
                                        'Where is the bakery?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-much-does-this-cheese-cost.mp3',
                                    'audio_text' => 'How much does this cheese cost?',
                                    'correct_answer' => 'How much does this cheese cost?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I bought two loaves of bread.',
                                        'I bought two loafs of bread.',
                                        'I bought two loaf of bread.',
                                        'I bought two loave of bread.',
                                    ],
                                    'question' => 'Which sentence uses a plural correctly?',
                                    'correct_answer' => 'I bought two loaves of bread.',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'freshest',
                                        'fresher',
                                        'fresh',
                                        'freshly',
                                    ],
                                    'sentence' => 'This is the ____ bread in the bakery.',
                                    'correct_answer' => 'freshest',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 5: Meat & Seafood',
                'order' => 5,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Types of Meat & Poultry',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Chicken',
                                    'options' => [
                                        [
                                            'text' => 'Chicken',
                                            'image' => '/images/exercises/chicken.png',
                                        ],
                                        [
                                            'text' => 'Beef',
                                            'image' => '/images/exercises/beef.png',
                                        ],
                                        [
                                            'text' => 'Pork',
                                            'image' => '/images/exercises/pork.png',
                                        ],
                                        [
                                            'text' => 'Lamb',
                                            'image' => '/images/exercises/lamb.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Chicken',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Turkey',
                                    'options' => [
                                        [
                                            'text' => 'Turkey',
                                            'image' => '/images/exercises/turkey.png',
                                        ],
                                        [
                                            'text' => 'Duck',
                                            'image' => '/images/exercises/duck.png',
                                        ],
                                        [
                                            'text' => 'Chicken',
                                            'image' => '/images/exercises/chicken.png',
                                        ],
                                        [
                                            'text' => 'Goose',
                                            'image' => '/images/exercises/goose.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Turkey',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'chicken',
                                        'chickens',
                                        'chicken\'s',
                                        'chickened',
                                    ],
                                    'sentence' => 'I\'d like a kilo of ____, please.',
                                    'correct_answer' => 'chicken',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'beef',
                                        'I',
                                        'want',
                                        'to',
                                        'buy',
                                        'some',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'want',
                                        'to',
                                        'buy',
                                        'some',
                                        'beef',
                                    ],
                                    'target_sentence' => 'I want to buy some beef',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have any lamb today?',
                                        'Is the fish fresh today?',
                                        'How much is the turkey?',
                                        'Can I have a chicken breast?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-any-lamb-today.mp3',
                                    'audio_text' => 'Do you have any lamb today?',
                                    'correct_answer' => 'Do you have any lamb today?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Pork',
                                        'Beef',
                                        'Chicken',
                                        'Lamb',
                                    ],
                                    'question' => 'What type of meat comes from a pig?',
                                    'correct_answer' => 'Pork',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Ordering Cuts from the Butcher',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Chop',
                                    'options' => [
                                        [
                                            'text' => 'Chop',
                                            'image' => '/images/exercises/chop.png',
                                        ],
                                        [
                                            'text' => 'Steak',
                                            'image' => '/images/exercises/steak.png',
                                        ],
                                        [
                                            'text' => 'Fillet',
                                            'image' => '/images/exercises/fillet.png',
                                        ],
                                        [
                                            'text' => 'Wing',
                                            'image' => '/images/exercises/wing.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Chop',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'slices',
                                        'slice',
                                        'slicing',
                                        'sliced',
                                    ],
                                    'sentence' => 'Could you cut this into thin ____ for me?',
                                    'correct_answer' => 'slices',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'pound',
                                        'pounds',
                                        'pounding',
                                        'pounded',
                                    ],
                                    'sentence' => 'Can I have a ____ of chicken breast?',
                                    'correct_answer' => 'pound',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'steaks',
                                        'Can',
                                        'you',
                                        'cut',
                                        'this',
                                        'into',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'you',
                                        'cut',
                                        'this',
                                        'into',
                                        'steaks',
                                    ],
                                    'target_sentence' => 'Can you cut this into steaks',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Could you trim the fat, please?',
                                        'Is this fish frozen?',
                                        'How many eggs do you need?',
                                        'Where is the bakery?',
                                    ],
                                    'audio_url' => '/audio/exercises/could-you-trim-the-fat-please.mp3',
                                    'audio_text' => 'Could you trim the fat, please?',
                                    'correct_answer' => 'Could you trim the fat, please?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could you trim the fat, please?',
                                        'Could you weigh the fruit, please?',
                                        'Is this on sale?',
                                        'Can I pay by card?',
                                    ],
                                    'question' => 'What do you say to ask the butcher to remove the fat?',
                                    'correct_answer' => 'Could you trim the fat, please?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Fish & Seafood Vocabulary',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Salmon',
                                    'options' => [
                                        [
                                            'text' => 'Salmon',
                                            'image' => '/images/exercises/salmon.png',
                                        ],
                                        [
                                            'text' => 'Tuna',
                                            'image' => '/images/exercises/tuna.png',
                                        ],
                                        [
                                            'text' => 'Shrimp',
                                            'image' => '/images/exercises/shrimp.png',
                                        ],
                                        [
                                            'text' => 'Crab',
                                            'image' => '/images/exercises/crab.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Salmon',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'fish',
                                        'fishes',
                                        'fished',
                                        'fishing',
                                    ],
                                    'sentence' => 'The fishmonger sells fresh ____ every morning.',
                                    'correct_answer' => 'fish',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'salmon',
                                        'I',
                                        'would',
                                        'like',
                                        'some',
                                        'fresh',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'some',
                                        'fresh',
                                        'salmon',
                                    ],
                                    'target_sentence' => 'I would like some fresh salmon',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'crab',
                                        'Do',
                                        'you',
                                        'sell',
                                        'fresh',
                                    ],
                                    'correct_order' => [
                                        'Do',
                                        'you',
                                        'sell',
                                        'fresh',
                                        'crab',
                                    ],
                                    'target_sentence' => 'Do you sell fresh crab',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Is the tuna fresh today?',
                                        'Can I have some chicken wings?',
                                        'How much is the beef?',
                                        'Where is the cash register?',
                                    ],
                                    'audio_url' => '/audio/exercises/is-the-tuna-fresh-today.mp3',
                                    'audio_text' => 'Is the tuna fresh today?',
                                    'correct_answer' => 'Is the tuna fresh today?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Shrimp',
                                        'Chicken',
                                        'Turkey',
                                        'Lamb',
                                    ],
                                    'question' => 'Which of these is a type of seafood?',
                                    'correct_answer' => 'Shrimp',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking the Fishmonger for Prices & Freshness',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Fishmonger',
                                    'options' => [
                                        [
                                            'text' => 'Fishmonger',
                                            'image' => '/images/exercises/fishmonger.png',
                                        ],
                                        [
                                            'text' => 'Butcher',
                                            'image' => '/images/exercises/butcher.png',
                                        ],
                                        [
                                            'text' => 'Baker',
                                            'image' => '/images/exercises/baker.png',
                                        ],
                                        [
                                            'text' => 'Cashier',
                                            'image' => '/images/exercises/cashier.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Fishmonger',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'per',
                                        'for',
                                        'at',
                                        'in',
                                    ],
                                    'sentence' => 'How much is the salmon ____ kilo?',
                                    'correct_answer' => 'per',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cost',
                                        'How',
                                        'much',
                                        'does',
                                        'this',
                                        'fish',
                                    ],
                                    'correct_order' => [
                                        'How',
                                        'much',
                                        'does',
                                        'this',
                                        'fish',
                                        'cost',
                                    ],
                                    'target_sentence' => 'How much does this fish cost',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How much is this per kilo?',
                                        'Do you have any lamb chops?',
                                        'Can I pay by card?',
                                        'Where is the meat counter?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-much-is-this-per-kilo.mp3',
                                    'audio_text' => 'How much is this per kilo?',
                                    'correct_answer' => 'How much is this per kilo?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Is this fish fresh or frozen?',
                                        'Can you clean the fish for me?',
                                        'How many shrimp do you want?',
                                        'Is the bread fresh today?',
                                    ],
                                    'audio_url' => '/audio/exercises/is-this-fish-fresh-or-frozen.mp3',
                                    'audio_text' => 'Is this fish fresh or frozen?',
                                    'correct_answer' => 'Is this fish fresh or frozen?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'How much is this per kilo?',
                                        'Where is the fish?',
                                        'Is this fresh?',
                                        'Can I have a bag?',
                                    ],
                                    'question' => 'What do you ask to find out the price per kilo?',
                                    'correct_answer' => 'How much is this per kilo?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Freshness & Quality',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Fresh',
                                    'options' => [
                                        [
                                            'text' => 'Fresh',
                                            'image' => '/images/exercises/fresh.png',
                                        ],
                                        [
                                            'text' => 'Frozen',
                                            'image' => '/images/exercises/frozen.png',
                                        ],
                                        [
                                            'text' => 'Raw',
                                            'image' => '/images/exercises/raw.png',
                                        ],
                                        [
                                            'text' => 'Cooked',
                                            'image' => '/images/exercises/cooked.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Fresh',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'fresher',
                                        'fresh',
                                        'freshest',
                                        'freshly',
                                    ],
                                    'sentence' => 'This salmon looks ____ than that one.',
                                    'correct_answer' => 'fresher',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'that',
                                        'This',
                                        'fish',
                                        'is',
                                        'fresher',
                                        'than',
                                        'one',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'fish',
                                        'is',
                                        'fresher',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This fish is fresher than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This meat smells fresh.',
                                        'This meat is frozen.',
                                        'This fish is raw.',
                                        'This chicken is cooked.',
                                    ],
                                    'audio_url' => '/audio/exercises/this-meat-smells-fresh.mp3',
                                    'audio_text' => 'This meat smells fresh.',
                                    'correct_answer' => 'This meat smells fresh.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Raw',
                                        'Fresh',
                                        'Frozen',
                                        'Grilled',
                                    ],
                                    'question' => 'Which word means "not cooked"?',
                                    'correct_answer' => 'Raw',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Fresh',
                                        'Raw',
                                        'Cooked',
                                        'Sliced',
                                    ],
                                    'question' => 'What is the opposite of "frozen"?',
                                    'correct_answer' => 'Fresh',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Weights & Quantities for Meat and Fish',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Kilogram',
                                    'options' => [
                                        [
                                            'text' => 'Kilogram',
                                            'image' => '/images/exercises/kilogram.png',
                                        ],
                                        [
                                            'text' => 'Gram',
                                            'image' => '/images/exercises/gram.png',
                                        ],
                                        [
                                            'text' => 'Pound',
                                            'image' => '/images/exercises/pound.png',
                                        ],
                                        [
                                            'text' => 'Ounce',
                                            'image' => '/images/exercises/ounce.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Kilogram',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Gram',
                                    'options' => [
                                        [
                                            'text' => 'Gram',
                                            'image' => '/images/exercises/gram.png',
                                        ],
                                        [
                                            'text' => 'Kilogram',
                                            'image' => '/images/exercises/kilogram.png',
                                        ],
                                        [
                                            'text' => 'Liter',
                                            'image' => '/images/exercises/liter.png',
                                        ],
                                        [
                                            'text' => 'Piece',
                                            'image' => '/images/exercises/piece.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Gram',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'much',
                                        'many',
                                        'few',
                                        'some',
                                    ],
                                    'sentence' => 'How ____ chicken do you need?',
                                    'correct_answer' => 'much',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'grams',
                                        'I',
                                        'need',
                                        'five',
                                        'hundred',
                                        'of',
                                        'beef',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'need',
                                        'five',
                                        'hundred',
                                        'grams',
                                        'of',
                                        'beef',
                                    ],
                                    'target_sentence' => 'I need five hundred grams of beef',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How many shrimp would you like?',
                                        'How much does the beef cost?',
                                        'Is the fish fresh?',
                                        'Can I have a bag?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-many-shrimp-would-you-like.mp3',
                                    'audio_text' => 'How many shrimp would you like?',
                                    'correct_answer' => 'How many shrimp would you like?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'How much beef do you need?',
                                        'How many beef do you need?',
                                        'How much beefs do you need?',
                                        'How many beefs do you need?',
                                    ],
                                    'question' => 'Which question is correct for meat (uncountable)?',
                                    'correct_answer' => 'How much beef do you need?',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 6: Household Items',
                'order' => 6,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Cleaning Supplies',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Broom',
                                    'options' => [
                                        [
                                            'text' => 'Broom',
                                            'image' => '/images/exercises/broom.png',
                                        ],
                                        [
                                            'text' => 'Mop',
                                            'image' => '/images/exercises/mop.png',
                                        ],
                                        [
                                            'text' => 'Sponge',
                                            'image' => '/images/exercises/sponge.png',
                                        ],
                                        [
                                            'text' => 'Bucket',
                                            'image' => '/images/exercises/bucket.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Broom',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'broom',
                                        'brooms',
                                        'brooming',
                                        'broomed',
                                    ],
                                    'sentence' => 'I need a ____ to sweep the floor.',
                                    'correct_answer' => 'broom',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'spray',
                                        'Where',
                                        'is',
                                        'the',
                                        'cleaning',
                                    ],
                                    'correct_order' => [
                                        'Where',
                                        'is',
                                        'the',
                                        'cleaning',
                                        'spray',
                                    ],
                                    'target_sentence' => 'Where is the cleaning spray',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This mop is very useful',
                                        'This broom is broken',
                                        'The bucket is empty',
                                        'The sponge is wet',
                                    ],
                                    'audio_url' => '/audio/exercises/this-mop-is-very-useful.mp3',
                                    'audio_text' => 'This mop is very useful',
                                    'correct_answer' => 'This mop is very useful',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'detergent',
                                    'options' => [
                                        'A substance used for cleaning',
                                        'A type of food',
                                        'A kitchen tool',
                                        'A soft cloth',
                                    ],
                                    'correct_answer' => 'A substance used for cleaning',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Glass cleaner',
                                        'Toothpaste',
                                        'Shampoo',
                                        'Toilet paper',
                                    ],
                                    'question' => 'Which item do you use to clean windows?',
                                    'correct_answer' => 'Glass cleaner',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Laundry Essentials',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Washing powder',
                                    'options' => [
                                        [
                                            'text' => 'Washing powder',
                                            'image' => '/images/exercises/washing-powder.png',
                                        ],
                                        [
                                            'text' => 'Fabric softener',
                                            'image' => '/images/exercises/fabric-softener.png',
                                        ],
                                        [
                                            'text' => 'Bleach',
                                            'image' => '/images/exercises/bleach.png',
                                        ],
                                        [
                                            'text' => 'Clothespin',
                                            'image' => '/images/exercises/clothespin.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Washing powder',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'detergent',
                                        'detergents',
                                        'detergenting',
                                        'detergented',
                                    ],
                                    'sentence' => 'Please add some ____ to the washing machine.',
                                    'correct_answer' => 'detergent',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'I',
                                        'am',
                                        'doing',
                                        'the',
                                        'laundry',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'am',
                                        'doing',
                                        'the',
                                        'laundry',
                                        'today',
                                    ],
                                    'target_sentence' => 'I am doing the laundry today',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have fabric softener?',
                                        'Is the bleach expensive?',
                                        'Where are the clothespins?',
                                        'I need a laundry basket',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-fabric-softener.mp3',
                                    'audio_text' => 'Do you have fabric softener?',
                                    'correct_answer' => 'Do you have fabric softener?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'bleach',
                                    'options' => [
                                        'A chemical that whitens clothes',
                                        'A soft fabric',
                                        'A type of soap',
                                        'A clothes hanger',
                                    ],
                                    'correct_answer' => 'A chemical that whitens clothes',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'wet',
                                        'wets',
                                        'wetting',
                                        'wetted',
                                    ],
                                    'sentence' => 'These clothes are still ____ from the wash.',
                                    'correct_answer' => 'wet',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Paper Products',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Paper towels',
                                    'options' => [
                                        [
                                            'text' => 'Paper towels',
                                            'image' => '/images/exercises/paper-towels.png',
                                        ],
                                        [
                                            'text' => 'Napkins',
                                            'image' => '/images/exercises/napkins.png',
                                        ],
                                        [
                                            'text' => 'Tissues',
                                            'image' => '/images/exercises/tissues.png',
                                        ],
                                        [
                                            'text' => 'Toilet paper',
                                            'image' => '/images/exercises/toilet-paper.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Paper towels',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'paper towels',
                                        'paper towel',
                                        'papering towels',
                                        'papered towels',
                                    ],
                                    'sentence' => 'We need more ____ for the kitchen.',
                                    'correct_answer' => 'paper towels',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'empty',
                                        'This',
                                        'tissue',
                                        'box',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'tissue',
                                        'box',
                                        'is',
                                        'empty',
                                    ],
                                    'target_sentence' => 'This tissue box is empty',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Please pass me a napkin',
                                        'Please pass me a spoon',
                                        'Please pass me a bag',
                                        'Please pass me a bottle',
                                    ],
                                    'audio_url' => '/audio/exercises/please-pass-me-a-napkin.mp3',
                                    'audio_text' => 'Please pass me a napkin',
                                    'correct_answer' => 'Please pass me a napkin',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Napkin',
                                        'Toilet paper',
                                        'Sponge',
                                        'Mop',
                                    ],
                                    'question' => 'Which item is used to wipe your mouth at the table?',
                                    'correct_answer' => 'Napkin',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'napkins',
                                        'I',
                                        'bought',
                                        'a',
                                        'pack',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'bought',
                                        'a',
                                        'pack',
                                        'of',
                                        'napkins',
                                    ],
                                    'target_sentence' => 'I bought a pack of napkins',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Toiletries & Personal Care',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Toothpaste',
                                    'options' => [
                                        [
                                            'text' => 'Toothpaste',
                                            'image' => '/images/exercises/toothpaste.png',
                                        ],
                                        [
                                            'text' => 'Shampoo',
                                            'image' => '/images/exercises/shampoo.png',
                                        ],
                                        [
                                            'text' => 'Soap',
                                            'image' => '/images/exercises/soap.png',
                                        ],
                                        [
                                            'text' => 'Razor',
                                            'image' => '/images/exercises/razor.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Toothpaste',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'toothpaste',
                                        'toothpastes',
                                        'toothpasting',
                                        'toothpasted',
                                    ],
                                    'sentence' => 'I brush my teeth with ____ every morning.',
                                    'correct_answer' => 'toothpaste',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'shampoo',
                                        'I',
                                        'forgot',
                                        'to',
                                        'buy',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'forgot',
                                        'to',
                                        'buy',
                                        'shampoo',
                                    ],
                                    'target_sentence' => 'I forgot to buy shampoo',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This soap smells very nice',
                                        'This razor is sharp',
                                        'This shampoo is expensive',
                                        'This towel is soft',
                                    ],
                                    'audio_url' => '/audio/exercises/this-soap-smells-very-nice.mp3',
                                    'audio_text' => 'This soap smells very nice',
                                    'correct_answer' => 'This soap smells very nice',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'toiletries',
                                    'options' => [
                                        'Personal hygiene products',
                                        'Kitchen tools',
                                        'Cleaning chemicals',
                                        'Paper products',
                                    ],
                                    'correct_answer' => 'Personal hygiene products',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I need a new toothbrush',
                                        'I need a new razor',
                                        'I need more shampoo',
                                        'I need some soap',
                                    ],
                                    'audio_url' => '/audio/exercises/i-need-a-new-toothbrush.mp3',
                                    'audio_text' => 'I need a new toothbrush',
                                    'correct_answer' => 'I need a new toothbrush',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Trash & Storage',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Trash bag',
                                    'options' => [
                                        [
                                            'text' => 'Trash bag',
                                            'image' => '/images/exercises/trash-bag.png',
                                        ],
                                        [
                                            'text' => 'Storage box',
                                            'image' => '/images/exercises/storage-box.png',
                                        ],
                                        [
                                            'text' => 'Plastic wrap',
                                            'image' => '/images/exercises/plastic-wrap.png',
                                        ],
                                        [
                                            'text' => 'Aluminum foil',
                                            'image' => '/images/exercises/aluminum-foil.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Trash bag',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'trash bag',
                                        'trash bags',
                                        'trashing bag',
                                        'trashed bag',
                                    ],
                                    'sentence' => 'Put the rubbish in the ____.',
                                    'correct_answer' => 'trash bag',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'useful',
                                        'These',
                                        'storage',
                                        'boxes',
                                        'are',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'These',
                                        'storage',
                                        'boxes',
                                        'are',
                                        'very',
                                        'useful',
                                    ],
                                    'target_sentence' => 'These storage boxes are very useful',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We are out of trash bags',
                                        'We need more napkins',
                                        'The bin is empty',
                                        'The boxes are heavy',
                                    ],
                                    'audio_url' => '/audio/exercises/we-are-out-of-trash-bags.mp3',
                                    'audio_text' => 'We are out of trash bags',
                                    'correct_answer' => 'We are out of trash bags',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'aluminum foil',
                                    'options' => [
                                        'A thin metal sheet used to wrap food',
                                        'A type of paper towel',
                                        'A cleaning spray',
                                        'A storage box',
                                    ],
                                    'correct_answer' => 'A thin metal sheet used to wrap food',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Plastic wrap',
                                    'options' => [
                                        [
                                            'text' => 'Plastic wrap',
                                            'image' => '/images/exercises/plastic-wrap.png',
                                        ],
                                        [
                                            'text' => 'Aluminum foil',
                                            'image' => '/images/exercises/aluminum-foil.png',
                                        ],
                                        [
                                            'text' => 'Storage box',
                                            'image' => '/images/exercises/storage-box.png',
                                        ],
                                        [
                                            'text' => 'Trash bag',
                                            'image' => '/images/exercises/trash-bag.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Plastic wrap',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Kitchen & Dishwashing',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Dish soap',
                                    'options' => [
                                        [
                                            'text' => 'Dish soap',
                                            'image' => '/images/exercises/dish-soap.png',
                                        ],
                                        [
                                            'text' => 'Sponge',
                                            'image' => '/images/exercises/sponge.png',
                                        ],
                                        [
                                            'text' => 'Dishcloth',
                                            'image' => '/images/exercises/dishcloth.png',
                                        ],
                                        [
                                            'text' => 'Scrub brush',
                                            'image' => '/images/exercises/scrub-brush.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Dish soap',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'dish soap',
                                        'dish soaps',
                                        'dishing soap',
                                        'dished soap',
                                    ],
                                    'sentence' => 'I use ____ to wash the dishes.',
                                    'correct_answer' => 'dish soap',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'one',
                                        'This',
                                        'sponge',
                                        'is',
                                        'more',
                                        'absorbent',
                                        'than',
                                        'that',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'sponge',
                                        'is',
                                        'more',
                                        'absorbent',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This sponge is more absorbent than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The dishcloth is on the counter',
                                        'The soap is under the sink',
                                        'The brush is in the drawer',
                                        'The sponge is by the sink',
                                    ],
                                    'audio_url' => '/audio/exercises/the-dishcloth-is-on-the-counter.mp3',
                                    'audio_text' => 'The dishcloth is on the counter',
                                    'correct_answer' => 'The dishcloth is on the counter',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Scrub brush',
                                        'Napkin',
                                        'Toothpaste',
                                        'Paper towel',
                                    ],
                                    'question' => 'Which item is best for scrubbing a dirty pot?',
                                    'correct_answer' => 'Scrub brush',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'absorbent',
                                    'options' => [
                                        'Able to soak up liquid',
                                        'Able to cut food',
                                        'Able to burn easily',
                                        'Able to shine',
                                    ],
                                    'correct_answer' => 'Able to soak up liquid',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 7: Quantities & Measurements',
                'order' => 7,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Weighing with Kilos',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Kilo',
                                    'options' => [
                                        [
                                            'text' => 'Kilo',
                                            'image' => '/images/exercises/kilo.png',
                                        ],
                                        [
                                            'text' => 'Liter',
                                            'image' => '/images/exercises/liter.png',
                                        ],
                                        [
                                            'text' => 'Dozen',
                                            'image' => '/images/exercises/dozen.png',
                                        ],
                                        [
                                            'text' => 'Bag',
                                            'image' => '/images/exercises/bag.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Kilo',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'kilos',
                                        'kilo',
                                        'kilogram',
                                        'kilograms of',
                                    ],
                                    'sentence' => 'I bought two ____ of rice.',
                                    'correct_answer' => 'kilos',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'kilo',
                                        'kilos',
                                        'liter',
                                        'dozen',
                                    ],
                                    'sentence' => 'Can I have a ____ of sugar?',
                                    'correct_answer' => 'kilo',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'kilo',
                                        'This',
                                        'bag',
                                        'weighs',
                                        'one',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'bag',
                                        'weighs',
                                        'one',
                                        'kilo',
                                    ],
                                    'target_sentence' => 'This bag weighs one kilo',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How many kilos do you want?',
                                        'How much does it cost?',
                                        'Where is the scale?',
                                        'Is this fresh?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-many-kilos-do-you-want.mp3',
                                    'audio_text' => 'How many kilos do you want?',
                                    'correct_answer' => 'How many kilos do you want?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'kilo',
                                    'options' => [
                                        'A unit of weight (1000 grams)',
                                        'A unit of volume',
                                        'A dozen items',
                                        'A type of bag',
                                    ],
                                    'correct_answer' => 'A unit of weight (1000 grams)',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Liters & Liquids',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Liter',
                                    'options' => [
                                        [
                                            'text' => 'Liter',
                                            'image' => '/images/exercises/liter.png',
                                        ],
                                        [
                                            'text' => 'Kilo',
                                            'image' => '/images/exercises/kilo.png',
                                        ],
                                        [
                                            'text' => 'Dozen',
                                            'image' => '/images/exercises/dozen.png',
                                        ],
                                        [
                                            'text' => 'Piece',
                                            'image' => '/images/exercises/piece.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Liter',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'liter',
                                        'liters',
                                        'litre of',
                                        'litering',
                                    ],
                                    'sentence' => 'I need a ____ of milk.',
                                    'correct_answer' => 'liter',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'juice',
                                        'She',
                                        'bought',
                                        'two',
                                        'liters',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'bought',
                                        'two',
                                        'liters',
                                        'of',
                                        'juice',
                                    ],
                                    'target_sentence' => 'She bought two liters of juice',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'need',
                                        'How',
                                        'many',
                                        'liters',
                                        'do',
                                        'we',
                                    ],
                                    'correct_order' => [
                                        'How',
                                        'many',
                                        'liters',
                                        'do',
                                        'we',
                                        'need',
                                    ],
                                    'target_sentence' => 'How many liters do we need',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This bottle holds one liter',
                                        'This bottle is empty',
                                        'The milk is fresh',
                                        'The juice is sweet',
                                    ],
                                    'audio_url' => '/audio/exercises/this-bottle-holds-one-liter.mp3',
                                    'audio_text' => 'This bottle holds one liter',
                                    'correct_answer' => 'This bottle holds one liter',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Liter',
                                        'Kilo',
                                        'Dozen',
                                        'Meter',
                                    ],
                                    'question' => 'Which is used to measure liquids?',
                                    'correct_answer' => 'Liter',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Counting by Dozens',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Dozen',
                                    'options' => [
                                        [
                                            'text' => 'Dozen',
                                            'image' => '/images/exercises/dozen.png',
                                        ],
                                        [
                                            'text' => 'Kilo',
                                            'image' => '/images/exercises/kilo.png',
                                        ],
                                        [
                                            'text' => 'Liter',
                                            'image' => '/images/exercises/liter.png',
                                        ],
                                        [
                                            'text' => 'Bottle',
                                            'image' => '/images/exercises/bottle.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Dozen',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Eggs',
                                    'options' => [
                                        [
                                            'text' => 'Eggs',
                                            'image' => '/images/exercises/eggs.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Rice',
                                            'image' => '/images/exercises/rice.png',
                                        ],
                                        [
                                            'text' => 'Oil',
                                            'image' => '/images/exercises/oil.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Eggs',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'dozen',
                                        'dozens',
                                        'kilo',
                                        'liter',
                                    ],
                                    'sentence' => 'I want to buy a ____ eggs.',
                                    'correct_answer' => 'dozen',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'dollars',
                                        'A',
                                        'dozen',
                                        'eggs',
                                        'costs',
                                        'three',
                                    ],
                                    'correct_order' => [
                                        'A',
                                        'dozen',
                                        'eggs',
                                        'costs',
                                        'three',
                                        'dollars',
                                    ],
                                    'target_sentence' => 'A dozen eggs costs three dollars',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I need half a dozen eggs',
                                        'I need a dozen apples',
                                        'I need one egg',
                                        'I need two dozen eggs',
                                    ],
                                    'audio_url' => '/audio/exercises/i-need-half-a-dozen-eggs.mp3',
                                    'audio_text' => 'I need half a dozen eggs',
                                    'correct_answer' => 'I need half a dozen eggs',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Twelve',
                                        'Ten',
                                        'Six',
                                        'Twenty',
                                    ],
                                    'question' => 'How many eggs are in a dozen?',
                                    'correct_answer' => 'Twelve',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: A Bag of...',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Bag',
                                    'options' => [
                                        [
                                            'text' => 'Bag',
                                            'image' => '/images/exercises/bag.png',
                                        ],
                                        [
                                            'text' => 'Bottle',
                                            'image' => '/images/exercises/bottle.png',
                                        ],
                                        [
                                            'text' => 'Box',
                                            'image' => '/images/exercises/box.png',
                                        ],
                                        [
                                            'text' => 'Can',
                                            'image' => '/images/exercises/can.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Bag',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bag',
                                        'bags',
                                        'bagging',
                                        'bagged',
                                    ],
                                    'sentence' => 'She carried a ____ of flour.',
                                    'correct_answer' => 'bag',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'potatoes',
                                        'I',
                                        'bought',
                                        'a',
                                        'bag',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'bought',
                                        'a',
                                        'bag',
                                        'of',
                                        'potatoes',
                                    ],
                                    'target_sentence' => 'I bought a bag of potatoes',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can you grab a bag of rice?',
                                        'Can you grab a liter of milk?',
                                        'Can you grab a dozen eggs?',
                                        'Can you grab a bottle of water?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-you-grab-a-bag-of-rice.mp3',
                                    'audio_text' => 'Can you grab a bag of rice?',
                                    'correct_answer' => 'Can you grab a bag of rice?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'There are three bags of sugar',
                                        'There are three kilos of sugar',
                                        'There is one bag of sugar',
                                        'There are three liters of oil',
                                    ],
                                    'audio_url' => '/audio/exercises/there-are-three-bags-of-sugar.mp3',
                                    'audio_text' => 'There are three bags of sugar',
                                    'correct_answer' => 'There are three bags of sugar',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Chips',
                                        'Milk',
                                        'Juice',
                                        'Water',
                                    ],
                                    'question' => 'Which item usually comes in a bag?',
                                    'correct_answer' => 'Chips',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: A Bottle of...',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Bottle',
                                    'options' => [
                                        [
                                            'text' => 'Bottle',
                                            'image' => '/images/exercises/bottle.png',
                                        ],
                                        [
                                            'text' => 'Bag',
                                            'image' => '/images/exercises/bag.png',
                                        ],
                                        [
                                            'text' => 'Box',
                                            'image' => '/images/exercises/box.png',
                                        ],
                                        [
                                            'text' => 'Jar',
                                            'image' => '/images/exercises/jar.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Bottle',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bottle',
                                        'bottles',
                                        'bottling',
                                        'bottled',
                                    ],
                                    'sentence' => 'He drank a ____ of water.',
                                    'correct_answer' => 'bottle',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'oil',
                                        'Please',
                                        'buy',
                                        'a',
                                        'bottle',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'Please',
                                        'buy',
                                        'a',
                                        'bottle',
                                        'of',
                                        'oil',
                                    ],
                                    'target_sentence' => 'Please buy a bottle of oil',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This bottle of juice is cold',
                                        'This bag of ice is cold',
                                        'This bottle of oil is warm',
                                        'This liter of milk is hot',
                                    ],
                                    'audio_url' => '/audio/exercises/this-bottle-of-juice-is-cold.mp3',
                                    'audio_text' => 'This bottle of juice is cold',
                                    'correct_answer' => 'This bottle of juice is cold',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Juice',
                                        'Eggs',
                                        'Bread',
                                        'Potatoes',
                                    ],
                                    'question' => 'What comes in a bottle?',
                                    'correct_answer' => 'Juice',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I need a bottle of water.',
                                        'I need a bottle water.',
                                        'I need bottle of water.',
                                        'I need a bottles of water.',
                                    ],
                                    'question' => 'Choose the correct sentence.',
                                    'correct_answer' => 'I need a bottle of water.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Mixed Quantities & Comparatives',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'How much',
                                    'options' => [
                                        [
                                            'text' => 'How much',
                                            'image' => '/images/exercises/how-much.png',
                                        ],
                                        [
                                            'text' => 'How many',
                                            'image' => '/images/exercises/how-many.png',
                                        ],
                                        [
                                            'text' => 'How far',
                                            'image' => '/images/exercises/how-far.png',
                                        ],
                                        [
                                            'text' => 'How long',
                                            'image' => '/images/exercises/how-long.png',
                                        ],
                                    ],
                                    'correct_answer' => 'How much',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'How much',
                                        'How many',
                                        'How far',
                                        'How long',
                                    ],
                                    'sentence' => '____ milk do you need?',
                                    'correct_answer' => 'How much',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'How many',
                                        'How much',
                                        'How far',
                                        'How long',
                                    ],
                                    'sentence' => '____ eggs do you need?',
                                    'correct_answer' => 'How many',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'you',
                                        'I',
                                        'need',
                                        'more',
                                        'kilos',
                                        'than',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'need',
                                        'more',
                                        'kilos',
                                        'than',
                                        'you',
                                    ],
                                    'target_sentence' => 'I need more kilos than you',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I need less sugar than before',
                                        'I need more sugar than before',
                                        'I need a kilo of sugar',
                                        'I need a liter of oil',
                                    ],
                                    'audio_url' => '/audio/exercises/i-need-less-sugar-than-before.mp3',
                                    'audio_text' => 'I need less sugar than before',
                                    'correct_answer' => 'I need less sugar than before',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Many',
                                        'Much',
                                        'Less',
                                        'Little',
                                    ],
                                    'question' => 'Which word is used with countable nouns like eggs?',
                                    'correct_answer' => 'Many',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 8: Comparing Products & Prices',
                'order' => 8,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Cheap vs Expensive',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cheap',
                                    'options' => [
                                        [
                                            'text' => 'Cheap',
                                            'image' => '/images/exercises/cheap.png',
                                        ],
                                        [
                                            'text' => 'Expensive',
                                            'image' => '/images/exercises/expensive.png',
                                        ],
                                        [
                                            'text' => 'Free',
                                            'image' => '/images/exercises/free.png',
                                        ],
                                        [
                                            'text' => 'Discounted',
                                            'image' => '/images/exercises/discounted.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cheap',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cheaper',
                                        'cheap',
                                        'cheaply',
                                        'cheapest',
                                    ],
                                    'sentence' => 'This bag is ____ than that one.',
                                    'correct_answer' => 'cheaper',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'expensive',
                                        'This',
                                        'phone',
                                        'is',
                                        'more',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'phone',
                                        'is',
                                        'more',
                                        'expensive',
                                    ],
                                    'target_sentence' => 'This phone is more expensive',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This one is cheaper',
                                        'This one is more expensive',
                                        'This one is the same price',
                                        'This one is free',
                                    ],
                                    'audio_url' => '/audio/exercises/this-one-is-cheaper.mp3',
                                    'audio_text' => 'This one is cheaper',
                                    'correct_answer' => 'This one is cheaper',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'expensive',
                                    'options' => [
                                        'Costs a lot of money',
                                        'Costs very little',
                                        'Very small',
                                        'Very large',
                                    ],
                                    'correct_answer' => 'Costs a lot of money',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'more expensive',
                                        'expensive',
                                        'expensively',
                                        'most expensive',
                                    ],
                                    'sentence' => 'The red shoes are ____ than the blue shoes.',
                                    'correct_answer' => 'more expensive',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Comparing Prices',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Price',
                                    'options' => [
                                        [
                                            'text' => 'Price',
                                            'image' => '/images/exercises/price.png',
                                        ],
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                        [
                                            'text' => 'Cost',
                                            'image' => '/images/exercises/cost.png',
                                        ],
                                        [
                                            'text' => 'Value',
                                            'image' => '/images/exercises/value.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Price',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'less',
                                        'few',
                                        'small',
                                        'short',
                                    ],
                                    'sentence' => 'This jacket costs ____ than the other one.',
                                    'correct_answer' => 'less',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'same',
                                        'These',
                                        'shoes',
                                        'cost',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'These',
                                        'shoes',
                                        'cost',
                                        'the',
                                        'same',
                                    ],
                                    'target_sentence' => 'These shoes cost the same',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It costs ten dollars more',
                                        'It costs ten dollars less',
                                        'It is the same price',
                                        'It is on sale',
                                    ],
                                    'audio_url' => '/audio/exercises/it-costs-ten-dollars-more.mp3',
                                    'audio_text' => 'It costs ten dollars more',
                                    'correct_answer' => 'It costs ten dollars more',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'the same price',
                                    'options' => [
                                        'Both cost equally',
                                        'One is cheaper',
                                        'One is free',
                                        'Prices are unknown',
                                    ],
                                    'correct_answer' => 'Both cost equally',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'pricier',
                                        'That',
                                        'brand',
                                        'is',
                                        'a',
                                        'bit',
                                    ],
                                    'correct_order' => [
                                        'That',
                                        'brand',
                                        'is',
                                        'a',
                                        'bit',
                                        'pricier',
                                    ],
                                    'target_sentence' => 'That brand is a bit pricier',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Comparing Brands',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Brand',
                                    'options' => [
                                        [
                                            'text' => 'Brand',
                                            'image' => '/images/exercises/brand.png',
                                        ],
                                        [
                                            'text' => 'Product',
                                            'image' => '/images/exercises/product.png',
                                        ],
                                        [
                                            'text' => 'Label',
                                            'image' => '/images/exercises/label.png',
                                        ],
                                        [
                                            'text' => 'Model',
                                            'image' => '/images/exercises/model.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Brand',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'better',
                                        'best',
                                        'good',
                                        'well',
                                    ],
                                    'sentence' => 'I think this brand is ____ than that one.',
                                    'correct_answer' => 'better',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'brand',
                                        'I',
                                        'prefer',
                                        'this',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'prefer',
                                        'this',
                                        'brand',
                                    ],
                                    'target_sentence' => 'I prefer this brand',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This brand is more popular',
                                        'This brand is less popular',
                                        'This brand is out of stock',
                                        'This brand is on sale',
                                    ],
                                    'audio_url' => '/audio/exercises/this-brand-is-more-popular.mp3',
                                    'audio_text' => 'This brand is more popular',
                                    'correct_answer' => 'This brand is more popular',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'prefer',
                                    'options' => [
                                        'Like one thing more than another',
                                        'Dislike something',
                                        'Buy something',
                                        'Sell something',
                                    ],
                                    'correct_answer' => 'Like one thing more than another',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'This brand is better than that one.',
                                        'This brand better than that one.',
                                        'This brand is gooder.',
                                        'This brand more good.',
                                    ],
                                    'question' => 'Which sentence compares two brands correctly?',
                                    'correct_answer' => 'This brand is better than that one.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Which One Is Better?',
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
                                            'text' => 'Same',
                                            'image' => '/images/exercises/same.png',
                                        ],
                                        [
                                            'text' => 'Equal',
                                            'image' => '/images/exercises/equal.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Better',
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
                                    'sentence' => '____ one is better, this or that?',
                                    'correct_answer' => 'Which',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'like',
                                        'Which',
                                        'one',
                                        'do',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'Which',
                                        'one',
                                        'do',
                                        'you',
                                        'like',
                                    ],
                                    'target_sentence' => 'Which one do you like',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Which one is better?',
                                        'How much is it?',
                                        'Where is it?',
                                        'What color is it?',
                                    ],
                                    'audio_url' => '/audio/exercises/which-one-is-better.mp3',
                                    'audio_text' => 'Which one is better?',
                                    'correct_answer' => 'Which one is better?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Which one is better?',
                                        'Where is it?',
                                        'How much is it?',
                                        'What time is it?',
                                    ],
                                    'question' => 'How do you ask someone to compare two things?',
                                    'correct_answer' => 'Which one is better?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I like this one better',
                                        'I like that one better',
                                        'I like both the same',
                                        'I don\'t like either',
                                    ],
                                    'audio_url' => '/audio/exercises/i-like-this-one-better.mp3',
                                    'audio_text' => 'I like this one better',
                                    'correct_answer' => 'I like this one better',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Size & Quality',
                        'order' => 5,
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
                                            'text' => 'Heavier',
                                            'image' => '/images/exercises/heavier.png',
                                        ],
                                        [
                                            'text' => 'Lighter',
                                            'image' => '/images/exercises/lighter.png',
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
                                    'sentence' => 'This box is ____ than that one.',
                                    'correct_answer' => 'bigger',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cheaper',
                                        'The',
                                        'small',
                                        'pack',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'small',
                                        'pack',
                                        'is',
                                        'cheaper',
                                    ],
                                    'target_sentence' => 'The small pack is cheaper',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This one is smaller but better',
                                        'This one is bigger but worse',
                                        'This one is the same size',
                                        'This one is broken',
                                    ],
                                    'audio_url' => '/audio/exercises/this-one-is-smaller-but-better.mp3',
                                    'audio_text' => 'This one is smaller but better',
                                    'correct_answer' => 'This one is smaller but better',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'quality',
                                    'options' => [
                                        'How good or bad something is',
                                        'The price of something',
                                        'The size of something',
                                        'The color of something',
                                    ],
                                    'correct_answer' => 'How good or bad something is',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Quality',
                                    'options' => [
                                        [
                                            'text' => 'Quality',
                                            'image' => '/images/exercises/quality.png',
                                        ],
                                        [
                                            'text' => 'Quantity',
                                            'image' => '/images/exercises/quantity.png',
                                        ],
                                        [
                                            'text' => 'Price',
                                            'image' => '/images/exercises/price.png',
                                        ],
                                        [
                                            'text' => 'Weight',
                                            'image' => '/images/exercises/weight.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Quality',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Best Deals & Superlatives',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cheapest',
                                    'options' => [
                                        [
                                            'text' => 'Cheapest',
                                            'image' => '/images/exercises/cheapest.png',
                                        ],
                                        [
                                            'text' => 'Most expensive',
                                            'image' => '/images/exercises/most-expensive.png',
                                        ],
                                        [
                                            'text' => 'Biggest',
                                            'image' => '/images/exercises/biggest.png',
                                        ],
                                        [
                                            'text' => 'Smallest',
                                            'image' => '/images/exercises/smallest.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cheapest',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'best',
                                        'good',
                                        'better',
                                        'goodest',
                                    ],
                                    'sentence' => 'This is the ____ price in the store.',
                                    'correct_answer' => 'best',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'option',
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
                                        'option',
                                    ],
                                    'target_sentence' => 'This is the cheapest option',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This is the best deal',
                                        'This is a bad deal',
                                        'This is the most expensive',
                                        'This is out of stock',
                                    ],
                                    'audio_url' => '/audio/exercises/this-is-the-best-deal.mp3',
                                    'audio_text' => 'This is the best deal',
                                    'correct_answer' => 'This is the best deal',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'the best deal',
                                    'options' => [
                                        'The best value for your money',
                                        'The most expensive item',
                                        'A free item',
                                        'A broken item',
                                    ],
                                    'correct_answer' => 'The best value for your money',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'most expensive',
                                        'expensive',
                                        'more expensive',
                                        'expensively',
                                    ],
                                    'sentence' => 'Of the three brands, this one is the ____.',
                                    'correct_answer' => 'most expensive',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 9: Frozen & Packaged Food',
                'order' => 9,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Frozen Vegetables & Fruits',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Frozen peas',
                                    'options' => [
                                        [
                                            'text' => 'Frozen peas',
                                            'image' => '/images/exercises/frozen-peas.png',
                                        ],
                                        [
                                            'text' => 'Frozen corn',
                                            'image' => '/images/exercises/frozen-corn.png',
                                        ],
                                        [
                                            'text' => 'Frozen spinach',
                                            'image' => '/images/exercises/frozen-spinach.png',
                                        ],
                                        [
                                            'text' => 'Frozen berries',
                                            'image' => '/images/exercises/frozen-berries.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Frozen peas',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'are kept',
                                        'is kept',
                                        'was kept',
                                        'were keep',
                                    ],
                                    'sentence' => 'These frozen vegetables ____ in the freezer.',
                                    'correct_answer' => 'are kept',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'yesterday',
                                        'I',
                                        'strawberries',
                                        'frozen',
                                        'bought',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'bought',
                                        'frozen',
                                        'strawberries',
                                        'yesterday',
                                    ],
                                    'target_sentence' => 'I bought frozen strawberries yesterday',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Put the frozen peas in the freezer',
                                        'Put the fresh peas in the basket',
                                        'Take the frozen corn to the counter',
                                        'Leave the frozen fruit on the shelf',
                                    ],
                                    'audio_url' => '/audio/exercises/put-the-frozen-peas-in-the-freezer.mp3',
                                    'audio_text' => 'Put the frozen peas in the freezer',
                                    'correct_answer' => 'Put the frozen peas in the freezer',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'frozen',
                                    'options' => [
                                        'Kept extremely cold to preserve it',
                                        'Cooked at high heat',
                                        'Fresh from the farm',
                                        'Left outside overnight',
                                    ],
                                    'correct_answer' => 'Kept extremely cold to preserve it',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'weighs',
                                        'weigh',
                                        'weighing',
                                        'weighed',
                                    ],
                                    'sentence' => 'This bag of frozen corn ____ two kilograms.',
                                    'correct_answer' => 'weighs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Frozen Meat & Fish',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Frozen chicken',
                                    'options' => [
                                        [
                                            'text' => 'Frozen chicken',
                                            'image' => '/images/exercises/frozen-chicken.png',
                                        ],
                                        [
                                            'text' => 'Frozen beef',
                                            'image' => '/images/exercises/frozen-beef.png',
                                        ],
                                        [
                                            'text' => 'Frozen shrimp',
                                            'image' => '/images/exercises/frozen-shrimp.png',
                                        ],
                                        [
                                            'text' => 'Frozen salmon',
                                            'image' => '/images/exercises/frozen-salmon.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Frozen chicken',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'defrost',
                                        'defrosts',
                                        'defrosting',
                                        'defrosted',
                                    ],
                                    'sentence' => 'You should ____ the frozen fish before cooking it.',
                                    'correct_answer' => 'defrost',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'today',
                                        'Please',
                                        'meat',
                                        'the',
                                        'freeze',
                                    ],
                                    'correct_order' => [
                                        'Please',
                                        'freeze',
                                        'the',
                                        'meat',
                                        'today',
                                    ],
                                    'target_sentence' => 'Please freeze the meat today',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'sale',
                                        'The',
                                        'on',
                                        'shrimp',
                                        'frozen',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'frozen',
                                        'shrimp',
                                        'is',
                                        'on',
                                        'sale',
                                    ],
                                    'target_sentence' => 'The frozen shrimp is on sale',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This frozen beef is on sale',
                                        'This frozen chicken is expensive',
                                        'This fresh fish is too small',
                                        'This canned meat is spicy',
                                    ],
                                    'audio_url' => '/audio/exercises/this-frozen-beef-is-on-sale.mp3',
                                    'audio_text' => 'This frozen beef is on sale',
                                    'correct_answer' => 'This frozen beef is on sale',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'To keep it fresh for longer',
                                        'To cook it faster',
                                        'To make it cheaper',
                                        'To change its color',
                                    ],
                                    'question' => 'Why do we freeze meat?',
                                    'correct_answer' => 'To keep it fresh for longer',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Canned Goods',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Canned beans',
                                    'options' => [
                                        [
                                            'text' => 'Canned beans',
                                            'image' => '/images/exercises/canned-beans.png',
                                        ],
                                        [
                                            'text' => 'Canned corn',
                                            'image' => '/images/exercises/canned-corn.png',
                                        ],
                                        [
                                            'text' => 'Canned tomatoes',
                                            'image' => '/images/exercises/canned-tomatoes.png',
                                        ],
                                        [
                                            'text' => 'Canned soup',
                                            'image' => '/images/exercises/canned-soup.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Canned beans',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'can opener',
                                        'can openers',
                                        'opening can',
                                        'opener can',
                                    ],
                                    'sentence' => 'Open the can with a ____.',
                                    'correct_answer' => 'can opener',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'great',
                                        'This',
                                        'tastes',
                                        'canned',
                                        'soup',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'canned',
                                        'soup',
                                        'tastes',
                                        'great',
                                    ],
                                    'target_sentence' => 'This canned soup tastes great',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'These canned tomatoes are cheaper than fresh ones',
                                        'These canned beans are more expensive than fresh ones',
                                        'These fresh tomatoes are cheaper than canned ones',
                                        'These canned tomatoes are heavier than fresh ones',
                                    ],
                                    'audio_url' => '/audio/exercises/these-canned-tomatoes-are-cheaper-than-fresh-ones.mp3',
                                    'audio_text' => 'These canned tomatoes are cheaper than fresh ones',
                                    'correct_answer' => 'These canned tomatoes are cheaper than fresh ones',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'canned',
                                    'options' => [
                                        'Sealed in a metal container for storage',
                                        'Cooked in oil',
                                        'Frozen solid',
                                        'Sold without packaging',
                                    ],
                                    'correct_answer' => 'Sealed in a metal container for storage',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Beans',
                                        'Fresh lettuce',
                                        'Ice cream',
                                        'Bread',
                                    ],
                                    'question' => 'Which food is usually sold in a can?',
                                    'correct_answer' => 'Beans',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Reading Expiry Dates',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Expiry date',
                                    'options' => [
                                        [
                                            'text' => 'Expiry date',
                                            'image' => '/images/exercises/expiry-date.png',
                                        ],
                                        [
                                            'text' => 'Best before',
                                            'image' => '/images/exercises/best-before.png',
                                        ],
                                        [
                                            'text' => 'Use by',
                                            'image' => '/images/exercises/use-by.png',
                                        ],
                                        [
                                            'text' => 'Production date',
                                            'image' => '/images/exercises/production-date.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Expiry date',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'before',
                                        'after',
                                        'during',
                                        'since',
                                    ],
                                    'sentence' => 'Always check the expiry date ____ you buy food.',
                                    'correct_answer' => 'before',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'label',
                                        'The',
                                        'on',
                                        'is',
                                        'date',
                                        'expiry',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'expiry',
                                        'date',
                                        'is',
                                        'on',
                                        'the',
                                        'label',
                                    ],
                                    'target_sentence' => 'The expiry date is on the label',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This milk expires next week',
                                        'This milk expired last month',
                                        'This bread expires today',
                                        'This juice never expires',
                                    ],
                                    'audio_url' => '/audio/exercises/this-milk-expires-next-week.mp3',
                                    'audio_text' => 'This milk expires next week',
                                    'correct_answer' => 'This milk expires next week',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do not eat food after the expiry date',
                                        'You can eat food after the expiry date',
                                        'Always eat food before you buy it',
                                        'Check the price before the expiry date',
                                    ],
                                    'audio_url' => '/audio/exercises/do-not-eat-food-after-the-expiry-date.mp3',
                                    'audio_text' => 'Do not eat food after the expiry date',
                                    'correct_answer' => 'Do not eat food after the expiry date',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'expiry date',
                                    'options' => [
                                        'The date after which food should not be used',
                                        'The date the food was made',
                                        'The price of the food',
                                        'The weight of the food',
                                    ],
                                    'correct_answer' => 'The date after which food should not be used',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Storing Frozen & Packaged Food',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Freezer',
                                    'options' => [
                                        [
                                            'text' => 'Freezer',
                                            'image' => '/images/exercises/freezer.png',
                                        ],
                                        [
                                            'text' => 'Fridge',
                                            'image' => '/images/exercises/fridge.png',
                                        ],
                                        [
                                            'text' => 'Pantry',
                                            'image' => '/images/exercises/pantry.png',
                                        ],
                                        [
                                            'text' => 'Cupboard',
                                            'image' => '/images/exercises/cupboard.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Freezer',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Airtight container',
                                    'options' => [
                                        [
                                            'text' => 'Airtight container',
                                            'image' => '/images/exercises/airtight-container.png',
                                        ],
                                        [
                                            'text' => 'Plastic bag',
                                            'image' => '/images/exercises/plastic-bag.png',
                                        ],
                                        [
                                            'text' => 'Paper box',
                                            'image' => '/images/exercises/paper-box.png',
                                        ],
                                        [
                                            'text' => 'Glass jar',
                                            'image' => '/images/exercises/glass-jar.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Airtight container',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'below',
                                        'above',
                                        'between',
                                        'beside',
                                    ],
                                    'sentence' => 'You must keep frozen food ____ minus eighteen degrees.',
                                    'correct_answer' => 'below',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'pantry',
                                        'Store',
                                        'cool',
                                        'a',
                                        'in',
                                        'cans',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Store',
                                        'the',
                                        'cans',
                                        'in',
                                        'a',
                                        'cool',
                                        'pantry',
                                    ],
                                    'target_sentence' => 'Store the cans in a cool pantry',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Keep the packaged food in a dry place',
                                        'Keep the packaged food in the sun',
                                        'Keep the frozen food out of the freezer',
                                        'Keep the canned food in water',
                                    ],
                                    'audio_url' => '/audio/exercises/keep-the-packaged-food-in-a-dry-place.mp3',
                                    'audio_text' => 'Keep the packaged food in a dry place',
                                    'correct_answer' => 'Keep the packaged food in a dry place',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'In the freezer',
                                        'In the pantry',
                                        'On the counter',
                                        'In a paper bag',
                                    ],
                                    'question' => 'Where should you store frozen food?',
                                    'correct_answer' => 'In the freezer',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Packaged Snacks & Ready Meals',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Ready meal',
                                    'options' => [
                                        [
                                            'text' => 'Ready meal',
                                            'image' => '/images/exercises/ready-meal.png',
                                        ],
                                        [
                                            'text' => 'Frozen pizza',
                                            'image' => '/images/exercises/frozen-pizza.png',
                                        ],
                                        [
                                            'text' => 'Instant noodles',
                                            'image' => '/images/exercises/instant-noodles.png',
                                        ],
                                        [
                                            'text' => 'Packaged chips',
                                            'image' => '/images/exercises/packaged-chips.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Ready meal',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'takes',
                                        'take',
                                        'taking',
                                        'took',
                                    ],
                                    'sentence' => 'This ready meal ____ only three minutes to cook.',
                                    'correct_answer' => 'takes',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'less healthy',
                                        'healthiest',
                                        'healthy',
                                        'health',
                                    ],
                                    'sentence' => 'These packaged snacks are ____ than homemade ones.',
                                    'correct_answer' => 'less healthy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'minutes',
                                        'Heat',
                                        'ten',
                                        'for',
                                        'pizza',
                                        'frozen',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Heat',
                                        'the',
                                        'frozen',
                                        'pizza',
                                        'for',
                                        'ten',
                                        'minutes',
                                    ],
                                    'target_sentence' => 'Heat the frozen pizza for ten minutes',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This instant noodle package is quick to prepare',
                                        'This fresh salad takes an hour to prepare',
                                        'This frozen pizza cannot be cooked',
                                        'This canned soup must be frozen first',
                                    ],
                                    'audio_url' => '/audio/exercises/this-instant-noodle-package-is-quick-to-prepare.mp3',
                                    'audio_text' => 'This instant noodle package is quick to prepare',
                                    'correct_answer' => 'This instant noodle package is quick to prepare',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'ready meal',
                                    'options' => [
                                        'A meal that is already prepared and needs little cooking',
                                        'A meal you cook from raw ingredients',
                                        'A meal eaten only at restaurants',
                                        'A drink',
                                    ],
                                    'correct_answer' => 'A meal that is already prepared and needs little cooking',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 10: Returns & Exchanges',
                'order' => 10,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Returning a Faulty Item',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Faulty',
                                    'options' => [
                                        [
                                            'text' => 'Faulty',
                                            'image' => '/images/exercises/faulty.png',
                                        ],
                                        [
                                            'text' => 'Perfect',
                                            'image' => '/images/exercises/perfect.png',
                                        ],
                                        [
                                            'text' => 'New',
                                            'image' => '/images/exercises/new.png',
                                        ],
                                        [
                                            'text' => 'Clean',
                                            'image' => '/images/exercises/clean.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Faulty',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'doesn\'t',
                                        'don\'t',
                                        'isn\'t',
                                        'not',
                                    ],
                                    'sentence' => 'This blender is broken. It ____ turn on.',
                                    'correct_answer' => 'doesn\'t',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'faulty',
                                        'item',
                                        'This',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'item',
                                        'is',
                                        'faulty',
                                    ],
                                    'target_sentence' => 'This item is faulty',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I want to return this because it is damaged',
                                        'I want to buy this today',
                                        'I love this product',
                                        'This is a great gift',
                                    ],
                                    'audio_url' => '/audio/exercises/i-want-to-return-this-because-it-is-damaged.mp3',
                                    'audio_text' => 'I want to return this because it is damaged',
                                    'correct_answer' => 'I want to return this because it is damaged',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Because it is faulty',
                                        'Because it is too big',
                                        'Because it is a gift',
                                        'Because he likes it',
                                    ],
                                    'question' => 'Why is the customer returning the toaster?',
                                    'correct_answer' => 'Because it is faulty',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Damaged',
                                    'options' => [
                                        [
                                            'text' => 'Damaged',
                                            'image' => '/images/exercises/damaged.png',
                                        ],
                                        [
                                            'text' => 'New',
                                            'image' => '/images/exercises/new.png',
                                        ],
                                        [
                                            'text' => 'Fresh',
                                            'image' => '/images/exercises/fresh.png',
                                        ],
                                        [
                                            'text' => 'Perfect',
                                            'image' => '/images/exercises/perfect.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Damaged',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Requesting a Refund',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Refund',
                                    'options' => [
                                        [
                                            'text' => 'Refund',
                                            'image' => '/images/exercises/refund.png',
                                        ],
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                        [
                                            'text' => 'Coupon',
                                            'image' => '/images/exercises/coupon.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Refund',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'refund',
                                        'refunds',
                                        'refunding',
                                        'refunded',
                                    ],
                                    'sentence' => 'I would like a ____, please.',
                                    'correct_answer' => 'refund',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'money',
                                        'Can',
                                        'back',
                                        'I',
                                        'get',
                                        'my',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'I',
                                        'get',
                                        'my',
                                        'money',
                                        'back',
                                    ],
                                    'target_sentence' => 'Can I get my money back',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I would like to request a refund',
                                        'I would like to buy this shirt',
                                        'I would like a bigger size',
                                        'I need a shopping bag',
                                    ],
                                    'audio_url' => '/audio/exercises/i-would-like-to-request-a-refund.mp3',
                                    'audio_text' => 'I would like to request a refund',
                                    'correct_answer' => 'I would like to request a refund',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'refund',
                                    'options' => [
                                        'Money given back to a customer',
                                        'A discount on a new item',
                                        'An exchange for another item',
                                        'A free gift',
                                    ],
                                    'correct_answer' => 'Money given back to a customer',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'refund',
                                        'discount',
                                        'coupon',
                                        'bag',
                                    ],
                                    'sentence' => 'I need my receipt to get a ____.',
                                    'correct_answer' => 'refund',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Exchanging for a Different Size',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Exchange',
                                    'options' => [
                                        [
                                            'text' => 'Exchange',
                                            'image' => '/images/exercises/exchange.png',
                                        ],
                                        [
                                            'text' => 'Refund',
                                            'image' => '/images/exercises/refund.png',
                                        ],
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Exchange',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bigger',
                                        'big',
                                        'biggest',
                                        'more big',
                                    ],
                                    'sentence' => 'This shirt is too small. I need a ____ size.',
                                    'correct_answer' => 'bigger',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'size',
                                        'I',
                                        'larger',
                                        'would',
                                        'like',
                                        'to',
                                        'exchange',
                                        'this',
                                        'for',
                                        'a',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'to',
                                        'exchange',
                                        'this',
                                        'for',
                                        'a',
                                        'larger',
                                        'size',
                                    ],
                                    'target_sentence' => 'I would like to exchange this for a larger size',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have this in a smaller size?',
                                        'Do you have a receipt?',
                                        'Do you want a refund?',
                                        'Do you like this color?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-this-in-a-smaller-size.mp3',
                                    'audio_text' => 'Do you have this in a smaller size?',
                                    'correct_answer' => 'Do you have this in a smaller size?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I would like to exchange these for a bigger size',
                                        'I would like to buy new shoes',
                                        'I would like a refund only',
                                        'I would like to keep these shoes',
                                    ],
                                    'question' => 'What should you say to exchange shoes for a bigger size?',
                                    'correct_answer' => 'I would like to exchange these for a bigger size',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'small',
                                        'These',
                                        'shoes',
                                        'are',
                                        'too',
                                        'for',
                                        'me',
                                    ],
                                    'correct_order' => [
                                        'These',
                                        'shoes',
                                        'are',
                                        'too',
                                        'small',
                                        'for',
                                        'me',
                                    ],
                                    'target_sentence' => 'These shoes are too small for me',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Receipts & Proof of Purchase',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Receipt',
                                    'options' => [
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                        [
                                            'text' => 'Warranty',
                                            'image' => '/images/exercises/warranty.png',
                                        ],
                                        [
                                            'text' => 'Coupon',
                                            'image' => '/images/exercises/coupon.png',
                                        ],
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Receipt',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bought',
                                        'buy',
                                        'buys',
                                        'buying',
                                    ],
                                    'sentence' => 'I ____ this jacket last week.',
                                    'correct_answer' => 'bought',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'receipt',
                                        'I',
                                        'have',
                                        'lost',
                                        'my',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'lost',
                                        'my',
                                        'receipt',
                                    ],
                                    'target_sentence' => 'I have lost my receipt',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have your proof of purchase?',
                                        'Do you have a shopping list?',
                                        'Do you have a discount card?',
                                        'Do you have a shopping bag?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-your-proof-of-purchase.mp3',
                                    'audio_text' => 'Do you have your proof of purchase?',
                                    'correct_answer' => 'Do you have your proof of purchase?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Something that shows you bought an item',
                                        'A type of discount',
                                        'A store membership card',
                                        'A shopping list',
                                    ],
                                    'question' => 'What is a "proof of purchase"?',
                                    'correct_answer' => 'Something that shows you bought an item',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I still have the original receipt',
                                        'I never got a receipt',
                                        'I want a new receipt',
                                        'I lost my shopping bag',
                                    ],
                                    'audio_url' => '/audio/exercises/i-still-have-the-original-receipt.mp3',
                                    'audio_text' => 'I still have the original receipt',
                                    'correct_answer' => 'I still have the original receipt',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Store Return Policies',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Policy',
                                    'options' => [
                                        [
                                            'text' => 'Policy',
                                            'image' => '/images/exercises/policy.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                        [
                                            'text' => 'Warranty',
                                            'image' => '/images/exercises/warranty.png',
                                        ],
                                        [
                                            'text' => 'Discount',
                                            'image' => '/images/exercises/discount.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Policy',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'within',
                                        'inside',
                                        'between',
                                        'at',
                                    ],
                                    'sentence' => 'You can return this item ____ 30 days.',
                                    'correct_answer' => 'within',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'days',
                                        'You',
                                        'must',
                                        'return',
                                        'it',
                                        'within',
                                        'thirty',
                                    ],
                                    'correct_order' => [
                                        'You',
                                        'must',
                                        'return',
                                        'it',
                                        'within',
                                        'thirty',
                                        'days',
                                    ],
                                    'target_sentence' => 'You must return it within thirty days',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'What is your return policy?',
                                        'What is your phone number?',
                                        'What is the price of this?',
                                        'What time do you open?',
                                    ],
                                    'audio_url' => '/audio/exercises/what-is-your-return-policy.mp3',
                                    'audio_text' => 'What is your return policy?',
                                    'correct_answer' => 'What is your return policy?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Within a certain number of days',
                                        'Only on the day you bought it',
                                        'Never',
                                        'Only with a manager present',
                                    ],
                                    'question' => 'According to most store policies, when can you return an item?',
                                    'correct_answer' => 'Within a certain number of days',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A receipt or proof of purchase',
                                        'A shopping cart',
                                        'A discount coupon',
                                        'A loyalty card',
                                    ],
                                    'question' => 'What do you need to return an item under most policies?',
                                    'correct_answer' => 'A receipt or proof of purchase',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Talking to Customer Service',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Manager',
                                    'options' => [
                                        [
                                            'text' => 'Manager',
                                            'image' => '/images/exercises/manager.png',
                                        ],
                                        [
                                            'text' => 'Cashier',
                                            'image' => '/images/exercises/cashier.png',
                                        ],
                                        [
                                            'text' => 'Customer',
                                            'image' => '/images/exercises/customer.png',
                                        ],
                                        [
                                            'text' => 'Stranger',
                                            'image' => '/images/exercises/stranger.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Manager',
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
                                    'sentence' => 'Could you ____ me with a return, please?',
                                    'correct_answer' => 'help',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'return',
                                        'Could',
                                        'you',
                                        'help',
                                        'me',
                                        'with',
                                        'this',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'you',
                                        'help',
                                        'me',
                                        'with',
                                        'this',
                                        'return',
                                    ],
                                    'target_sentence' => 'Could you help me with this return',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I would like to speak to the manager',
                                        'I would like to buy a gift',
                                        'I would like a discount',
                                        'I would like to pay in cash',
                                    ],
                                    'audio_url' => '/audio/exercises/i-would-like-to-speak-to-the-manager.mp3',
                                    'audio_text' => 'I would like to speak to the manager',
                                    'correct_answer' => 'I would like to speak to the manager',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could you help me with a return, please?',
                                        'Give me my money now!',
                                        'This store is terrible.',
                                        'I do not need help.',
                                    ],
                                    'question' => 'What can you say to ask for help politely at customer service?',
                                    'correct_answer' => 'Could you help me with a return, please?',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Complaint',
                                    'options' => [
                                        [
                                            'text' => 'Complaint',
                                            'image' => '/images/exercises/complaint.png',
                                        ],
                                        [
                                            'text' => 'Compliment',
                                            'image' => '/images/exercises/compliment.png',
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
                                    'correct_answer' => 'Complaint',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
