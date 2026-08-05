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
 * TRANSLATION TEMPLATE — full English "Restaurant" chapter
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
class EnglishRestaurantFullSeeder extends Seeder
{
    private const LANGUAGE_CODE = 'en';

    public function run(): void
    {
        $language = Language::where('code', self::LANGUAGE_CODE)->firstOrFail();

        $chapter = Chapter::firstOrCreate(
            ['language_id' => $language->id, 'chapter_key' => ChapterKey::Restaurant],
            ['title' => 'Restaurant', 'order_number' => 3]
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
                'title' => 'Unit 1: Ordering Food',
                'order' => 1,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: At the Table',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Menu',
                                    'options' => [
                                        [
                                            'text' => 'Menu',
                                            'image' => '/images/exercises/menu.png',
                                        ],
                                        [
                                            'text' => 'Plate',
                                            'image' => '/images/exercises/plate.png',
                                        ],
                                        [
                                            'text' => 'Fork',
                                            'image' => '/images/exercises/fork.png',
                                        ],
                                        [
                                            'text' => 'Spoon',
                                            'image' => '/images/exercises/spoon.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Menu',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'menu',
                                        'menus',
                                        'menuing',
                                        'menued',
                                    ],
                                    'sentence' => 'Can I see the ____?',
                                    'correct_answer' => 'menu',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'pizza',
                                        'I',
                                        'would',
                                        'like',
                                        'a',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'a',
                                        'pizza',
                                    ],
                                    'target_sentence' => 'I would like a pizza',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I am ready to order',
                                        'The food is cold',
                                        'I want water',
                                        'Thank you',
                                    ],
                                    'audio_url' => '/audio/exercises/i-am-ready-to-order.mp3',
                                    'audio_text' => 'I am ready to order',
                                    'correct_answer' => 'I am ready to order',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'menu',
                                    'options' => [
                                        'A list of food you can order',
                                        'A type of plate',
                                        'A drink',
                                        'A table',
                                    ],
                                    'correct_answer' => 'A list of food you can order',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Choosing a Dish',
                        'order' => 2,
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
                                            'text' => 'Fish',
                                            'image' => '/images/exercises/fish.png',
                                        ],
                                        [
                                            'text' => 'Rice',
                                            'image' => '/images/exercises/rice.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Chicken',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'chicken',
                                        'chickens',
                                        'chickening',
                                        'chickened',
                                    ],
                                    'sentence' => 'I will have the ____ soup.',
                                    'correct_answer' => 'chicken',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'delicious',
                                        'This',
                                        'soup',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'soup',
                                        'is',
                                        'delicious',
                                    ],
                                    'target_sentence' => 'This soup is delicious',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'What do you recommend?',
                                        'The bill please',
                                        'I am full',
                                        'Water please',
                                    ],
                                    'audio_url' => '/audio/exercises/what-do-you-recommend.mp3',
                                    'audio_text' => 'What do you recommend?',
                                    'correct_answer' => 'What do you recommend?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'delicious',
                                    'options' => [
                                        'Very tasty',
                                        'Very cold',
                                        'Very expensive',
                                        'Very small',
                                    ],
                                    'correct_answer' => 'Very tasty',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 2: Menu & Prices',
                'order' => 2,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Understanding the Menu',
                        'order' => 1,
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
                                            'text' => 'Dessert',
                                            'image' => '/images/exercises/dessert.png',
                                        ],
                                        [
                                            'text' => 'Drink',
                                            'image' => '/images/exercises/drink.png',
                                        ],
                                        [
                                            'text' => 'Starter',
                                            'image' => '/images/exercises/starter.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Price',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cost',
                                        'costs',
                                        'costing',
                                        'costed',
                                    ],
                                    'sentence' => 'How much does this ____?',
                                    'correct_answer' => 'cost',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cheap',
                                        'This',
                                        'dish',
                                        'is',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'dish',
                                        'is',
                                        'very',
                                        'cheap',
                                    ],
                                    'target_sentence' => 'This dish is very cheap',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'It is on the house',
                                        'It is very expensive',
                                        'It is not available',
                                        'It is spicy',
                                    ],
                                    'audio_url' => '/audio/exercises/it-is-on-the-house.mp3',
                                    'audio_text' => 'It is on the house',
                                    'correct_answer' => 'It is on the house',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'expensive',
                                    'options' => [
                                        'Costs a lot of money',
                                        'Costs very little',
                                        'Tastes bad',
                                        'Tastes good',
                                    ],
                                    'correct_answer' => 'Costs a lot of money',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Special Requests',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Spicy',
                                    'options' => [
                                        [
                                            'text' => 'Spicy',
                                            'image' => '/images/exercises/spicy.png',
                                        ],
                                        [
                                            'text' => 'Sweet',
                                            'image' => '/images/exercises/sweet.png',
                                        ],
                                        [
                                            'text' => 'Sour',
                                            'image' => '/images/exercises/sour.png',
                                        ],
                                        [
                                            'text' => 'Salty',
                                            'image' => '/images/exercises/salty.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Spicy',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'spicy',
                                        'spicier',
                                        'spiciest',
                                        'spiciness',
                                    ],
                                    'sentence' => 'I don\'t want it too ____.',
                                    'correct_answer' => 'spicy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'sweet',
                                        'Please',
                                        'make',
                                        'it',
                                        'less',
                                    ],
                                    'correct_order' => [
                                        'Please',
                                        'make',
                                        'it',
                                        'less',
                                        'sweet',
                                    ],
                                    'target_sentence' => 'Please make it less sweet',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'No onions please',
                                        'Extra cheese please',
                                        'More rice please',
                                        'Less salt please',
                                    ],
                                    'audio_url' => '/audio/exercises/no-onions-please.mp3',
                                    'audio_text' => 'No onions please',
                                    'correct_answer' => 'No onions please',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'without',
                                    'options' => [
                                        'Not including',
                                        'Including extra',
                                        'Very much',
                                        'A little',
                                    ],
                                    'correct_answer' => 'Not including',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 3: Paying the Bill',
                'order' => 3,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Asking for the Bill',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Bill',
                                    'options' => [
                                        [
                                            'text' => 'Bill',
                                            'image' => '/images/exercises/bill.png',
                                        ],
                                        [
                                            'text' => 'Cash',
                                            'image' => '/images/exercises/cash.png',
                                        ],
                                        [
                                            'text' => 'Card',
                                            'image' => '/images/exercises/card.png',
                                        ],
                                        [
                                            'text' => 'Tip',
                                            'image' => '/images/exercises/tip.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Bill',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bill',
                                        'bills',
                                        'billing',
                                        'billed',
                                    ],
                                    'sentence' => 'Can we get the ____, please?',
                                    'correct_answer' => 'bill',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'card',
                                        'Can',
                                        'I',
                                        'pay',
                                        'by',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'I',
                                        'pay',
                                        'by',
                                        'card',
                                    ],
                                    'target_sentence' => 'Can I pay by card',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Keep the change',
                                        'Where is the exit?',
                                        'This is cold',
                                        'I need a fork',
                                    ],
                                    'audio_url' => '/audio/exercises/keep-the-change.mp3',
                                    'audio_text' => 'Keep the change',
                                    'correct_answer' => 'Keep the change',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'tip',
                                    'options' => [
                                        'Extra money for good service',
                                        'The total bill',
                                        'A discount',
                                        'A type of food',
                                    ],
                                    'correct_answer' => 'Extra money for good service',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Splitting the Bill',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Split',
                                    'options' => [
                                        [
                                            'text' => 'Split',
                                            'image' => '/images/exercises/split.png',
                                        ],
                                        [
                                            'text' => 'Share',
                                            'image' => '/images/exercises/share.png',
                                        ],
                                        [
                                            'text' => 'Pay',
                                            'image' => '/images/exercises/pay.png',
                                        ],
                                        [
                                            'text' => 'Divide',
                                            'image' => '/images/exercises/divide.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Split',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'split',
                                        'splits',
                                        'splitting',
                                        'splitted',
                                    ],
                                    'sentence' => 'Let\'s ____ the bill.',
                                    'correct_answer' => 'split',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'separately',
                                        'We',
                                        'will',
                                        'pay',
                                    ],
                                    'correct_order' => [
                                        'We',
                                        'will',
                                        'pay',
                                        'separately',
                                    ],
                                    'target_sentence' => 'We will pay separately',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I will pay for everyone',
                                        'Let\'s split it',
                                        'I forgot my wallet',
                                        'Thank you for dinner',
                                    ],
                                    'audio_url' => '/audio/exercises/i-will-pay-for-everyone.mp3',
                                    'audio_text' => 'I will pay for everyone',
                                    'correct_answer' => 'I will pay for everyone',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'separately',
                                    'options' => [
                                        'Each person pays their own part',
                                        'Everyone pays the same',
                                        'One person pays all',
                                        'No one pays',
                                    ],
                                    'correct_answer' => 'Each person pays their own part',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 4: Making Reservations',
                'order' => 4,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Booking a Table by Phone',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Reservation',
                                    'options' => [
                                        [
                                            'text' => 'Reservation',
                                            'image' => '/images/exercises/reservation.png',
                                        ],
                                        [
                                            'text' => 'Order',
                                            'image' => '/images/exercises/order.png',
                                        ],
                                        [
                                            'text' => 'Bill',
                                            'image' => '/images/exercises/bill.png',
                                        ],
                                        [
                                            'text' => 'Menu',
                                            'image' => '/images/exercises/menu.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Reservation',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'book',
                                        'books',
                                        'booking',
                                        'booked',
                                    ],
                                    'sentence' => 'I would like to ____ a table for tonight.',
                                    'correct_answer' => 'book',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'table',
                                        'I',
                                        'would',
                                        'like',
                                        'to',
                                        'book',
                                        'a',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'to',
                                        'book',
                                        'a',
                                        'table',
                                    ],
                                    'target_sentence' => 'I would like to book a table',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I would like to make a reservation',
                                        'Can I see the menu?',
                                        'The food is delicious',
                                        'Can I pay by card?',
                                    ],
                                    'audio_url' => '/audio/exercises/i-would-like-to-make-a-reservation.mp3',
                                    'audio_text' => 'I would like to make a reservation',
                                    'correct_answer' => 'I would like to make a reservation',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'reservation',
                                    'options' => [
                                        'A table booked in advance',
                                        'A type of food',
                                        'A discount',
                                        'A waiter',
                                    ],
                                    'correct_answer' => 'A table booked in advance',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'make',
                                        'makes',
                                        'making',
                                        'made',
                                    ],
                                    'sentence' => 'I would like to ____ a reservation for two.',
                                    'correct_answer' => 'make',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Choosing Your Party Size',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Two',
                                    'options' => [
                                        [
                                            'text' => 'Two',
                                            'image' => '/images/exercises/two.png',
                                        ],
                                        [
                                            'text' => 'Four',
                                            'image' => '/images/exercises/four.png',
                                        ],
                                        [
                                            'text' => 'Six',
                                            'image' => '/images/exercises/six.png',
                                        ],
                                        [
                                            'text' => 'Eight',
                                            'image' => '/images/exercises/eight.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Two',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'four',
                                        'fourth',
                                        'fours',
                                        'forth',
                                    ],
                                    'sentence' => 'A table for ____ people, please.',
                                    'correct_answer' => 'four',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'please',
                                        'A',
                                        'table',
                                        'for',
                                        'two',
                                        'people',
                                    ],
                                    'correct_order' => [
                                        'A',
                                        'table',
                                        'for',
                                        'two',
                                        'people',
                                        'please',
                                    ],
                                    'target_sentence' => 'A table for two people, please',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'How many people are in your party?',
                                        'What time is it?',
                                        'Where is the restroom?',
                                        'Can I see the menu?',
                                    ],
                                    'audio_url' => '/audio/exercises/how-many-people-are-in-your-party.mp3',
                                    'audio_text' => 'How many people are in your party?',
                                    'correct_answer' => 'How many people are in your party?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'party of four',
                                    'options' => [
                                        'A group of four people',
                                        'A celebration',
                                        'A type of table',
                                        'A discount for four',
                                    ],
                                    'correct_answer' => 'A group of four people',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'us',
                                        'There',
                                        'will',
                                        'be',
                                        'six',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'There',
                                        'will',
                                        'be',
                                        'six',
                                        'of',
                                        'us',
                                    ],
                                    'target_sentence' => 'There will be six of us',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Choosing a Time',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Evening',
                                    'options' => [
                                        [
                                            'text' => 'Evening',
                                            'image' => '/images/exercises/evening.png',
                                        ],
                                        [
                                            'text' => 'Morning',
                                            'image' => '/images/exercises/morning.png',
                                        ],
                                        [
                                            'text' => 'Afternoon',
                                            'image' => '/images/exercises/afternoon.png',
                                        ],
                                        [
                                            'text' => 'Midnight',
                                            'image' => '/images/exercises/midnight.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Evening',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'at',
                                        'in',
                                        'on',
                                        'to',
                                    ],
                                    'sentence' => 'We would like a table ____ seven o\'clock.',
                                    'correct_answer' => 'at',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'eight',
                                        'Can',
                                        'we',
                                        'book',
                                        'a',
                                        'table',
                                        'for',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'we',
                                        'book',
                                        'a',
                                        'table',
                                        'for',
                                        'eight',
                                    ],
                                    'target_sentence' => 'Can we book a table for eight',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Is seven thirty okay for you?',
                                        'Is the food spicy?',
                                        'Do you have a menu?',
                                        'Can I pay now?',
                                    ],
                                    'audio_url' => '/audio/exercises/is-seven-thirty-okay-for-you.mp3',
                                    'audio_text' => 'Is seven thirty okay for you?',
                                    'correct_answer' => 'Is seven thirty okay for you?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'We will arrive at six.',
                                        'We will arrive in six.',
                                        'We will arrive on six.',
                                        'We will arrive for six.',
                                    ],
                                    'question' => 'Which sentence correctly uses a time preposition?',
                                    'correct_answer' => 'We will arrive at six.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'seven in the evening',
                                        'seven of the evening',
                                        'seven at evening',
                                        'seven the evening',
                                    ],
                                    'question' => 'Which phrase best completes: "Our table is booked for ___"?',
                                    'correct_answer' => 'seven in the evening',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Confirming a Reservation',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Confirm',
                                    'options' => [
                                        [
                                            'text' => 'Confirm',
                                            'image' => '/images/exercises/confirm.png',
                                        ],
                                        [
                                            'text' => 'Cancel',
                                            'image' => '/images/exercises/cancel.png',
                                        ],
                                        [
                                            'text' => 'Change',
                                            'image' => '/images/exercises/change.png',
                                        ],
                                        [
                                            'text' => 'Forget',
                                            'image' => '/images/exercises/forget.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Confirm',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'will',
                                        'would',
                                        'are',
                                        'do',
                                    ],
                                    'sentence' => 'We ____ confirm your reservation by email.',
                                    'correct_answer' => 'will',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'eight',
                                        'Your',
                                        'table',
                                        'is',
                                        'confirmed',
                                        'for',
                                    ],
                                    'correct_order' => [
                                        'Your',
                                        'table',
                                        'is',
                                        'confirmed',
                                        'for',
                                        'eight',
                                    ],
                                    'target_sentence' => 'Your table is confirmed for eight',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Your reservation is confirmed',
                                        'Your table is not ready',
                                        'The restaurant is closed',
                                        'Please wait outside',
                                    ],
                                    'audio_url' => '/audio/exercises/your-reservation-is-confirmed.mp3',
                                    'audio_text' => 'Your reservation is confirmed',
                                    'correct_answer' => 'Your reservation is confirmed',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'confirmed',
                                    'options' => [
                                        'Officially agreed and certain',
                                        'Cancelled',
                                        'Delayed',
                                        'Unavailable',
                                    ],
                                    'correct_answer' => 'Officially agreed and certain',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Confirmed',
                                    'options' => [
                                        [
                                            'text' => 'Confirmed',
                                            'image' => '/images/exercises/confirmed.png',
                                        ],
                                        [
                                            'text' => 'Pending',
                                            'image' => '/images/exercises/pending.png',
                                        ],
                                        [
                                            'text' => 'Cancelled',
                                            'image' => '/images/exercises/cancelled.png',
                                        ],
                                        [
                                            'text' => 'Delayed',
                                            'image' => '/images/exercises/delayed.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Confirmed',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Changing or Cancelling a Reservation',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cancel',
                                    'options' => [
                                        [
                                            'text' => 'Cancel',
                                            'image' => '/images/exercises/cancel.png',
                                        ],
                                        [
                                            'text' => 'Confirm',
                                            'image' => '/images/exercises/confirm.png',
                                        ],
                                        [
                                            'text' => 'Book',
                                            'image' => '/images/exercises/book.png',
                                        ],
                                        [
                                            'text' => 'Pay',
                                            'image' => '/images/exercises/pay.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cancel',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cancel',
                                        'cancels',
                                        'cancelling',
                                        'cancelled',
                                    ],
                                    'sentence' => 'I need to ____ my reservation for tonight.',
                                    'correct_answer' => 'cancel',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'time',
                                        'Could',
                                        'I',
                                        'change',
                                        'my',
                                        'reservation',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'I',
                                        'change',
                                        'my',
                                        'reservation',
                                        'time',
                                    ],
                                    'target_sentence' => 'Could I change my reservation time',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I would like to cancel my booking',
                                        'I would like to order dessert',
                                        'The bill is ready',
                                        'Table for two, please',
                                    ],
                                    'audio_url' => '/audio/exercises/i-would-like-to-cancel-my-booking.mp3',
                                    'audio_text' => 'I would like to cancel my booking',
                                    'correct_answer' => 'I would like to cancel my booking',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could I move my reservation to nine?',
                                        'Move my reservation now.',
                                        'Change it.',
                                        'I want a change now.',
                                    ],
                                    'question' => 'Which sentence politely asks to change a reservation?',
                                    'correct_answer' => 'Could I move my reservation to nine?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can we reschedule for tomorrow?',
                                        'Can we order more bread?',
                                        'Is the table ready?',
                                        'Can I get the bill?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-we-reschedule-for-tomorrow.mp3',
                                    'audio_text' => 'Can we reschedule for tomorrow?',
                                    'correct_answer' => 'Can we reschedule for tomorrow?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Arriving at the Restaurant',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Host',
                                    'options' => [
                                        [
                                            'text' => 'Host',
                                            'image' => '/images/exercises/host.png',
                                        ],
                                        [
                                            'text' => 'Chef',
                                            'image' => '/images/exercises/chef.png',
                                        ],
                                        [
                                            'text' => 'Waiter',
                                            'image' => '/images/exercises/waiter.png',
                                        ],
                                        [
                                            'text' => 'Guest',
                                            'image' => '/images/exercises/guest.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Host',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'under',
                                        'on',
                                        'at',
                                        'in',
                                    ],
                                    'sentence' => 'I have a reservation ____ the name Khan.',
                                    'correct_answer' => 'under',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'Khan',
                                        'I',
                                        'have',
                                        'a',
                                        'reservation',
                                        'under',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'have',
                                        'a',
                                        'reservation',
                                        'under',
                                        'Khan',
                                    ],
                                    'target_sentence' => 'I have a reservation under Khan',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I have a reservation for seven o\'clock',
                                        'I would like the menu',
                                        'Can I pay in cash?',
                                        'Is this seat taken?',
                                    ],
                                    'audio_url' => '/audio/exercises/i-have-a-reservation-for-seven-oclock.mp3',
                                    'audio_text' => 'I have a reservation for seven o\'clock',
                                    'correct_answer' => 'I have a reservation for seven o\'clock',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I have a reservation under Smith.',
                                        'I want a menu now.',
                                        'Where is the bathroom?',
                                        'I am very hungry.',
                                    ],
                                    'question' => 'What should you say when you arrive with a reservation?',
                                    'correct_answer' => 'I have a reservation under Smith.',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'ready',
                                        'readying',
                                        'readily',
                                        'readiness',
                                    ],
                                    'sentence' => 'Please follow me, your table is ____.',
                                    'correct_answer' => 'ready',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 5: Complaints & Compliments',
                'order' => 5,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Complaining About Food Quality',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cold',
                                    'options' => [
                                        [
                                            'text' => 'Cold',
                                            'image' => '/images/exercises/cold.png',
                                        ],
                                        [
                                            'text' => 'Hot',
                                            'image' => '/images/exercises/hot.png',
                                        ],
                                        [
                                            'text' => 'Fresh',
                                            'image' => '/images/exercises/fresh.png',
                                        ],
                                        [
                                            'text' => 'Spicy',
                                            'image' => '/images/exercises/spicy.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cold',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cold',
                                        'colder',
                                        'coldest',
                                        'coldly',
                                    ],
                                    'sentence' => 'This soup is ____.',
                                    'correct_answer' => 'cold',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'cold',
                                        'food',
                                        'My',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'My',
                                        'food',
                                        'is',
                                        'cold',
                                    ],
                                    'target_sentence' => 'My food is cold',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Excuse me, this steak is undercooked',
                                        'This steak is perfectly cooked',
                                        'Can I get some more bread?',
                                        'The music is too loud',
                                    ],
                                    'audio_url' => '/audio/exercises/excuse-me-this-steak-is-undercooked.mp3',
                                    'audio_text' => 'Excuse me, this steak is undercooked',
                                    'correct_answer' => 'Excuse me, this steak is undercooked',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'undercooked',
                                    'options' => [
                                        'Not cooked enough',
                                        'Cooked too much',
                                        'Very tasty',
                                        'Very cold',
                                    ],
                                    'correct_answer' => 'Not cooked enough',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'undercooked',
                                        'undercook',
                                        'undercooking',
                                        'undercooks',
                                    ],
                                    'sentence' => 'The chicken is ____, could you cook it a bit longer?',
                                    'correct_answer' => 'undercooked',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Complaining About Slow or Wrong Service',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Waiter',
                                    'options' => [
                                        [
                                            'text' => 'Waiter',
                                            'image' => '/images/exercises/waiter.png',
                                        ],
                                        [
                                            'text' => 'Chef',
                                            'image' => '/images/exercises/chef.png',
                                        ],
                                        [
                                            'text' => 'Manager',
                                            'image' => '/images/exercises/manager.png',
                                        ],
                                        [
                                            'text' => 'Customer',
                                            'image' => '/images/exercises/customer.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Waiter',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'waiting',
                                        'wait',
                                        'waited',
                                        'waits',
                                    ],
                                    'sentence' => 'We have been ____ for twenty minutes.',
                                    'correct_answer' => 'waiting',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'ordered',
                                        'not',
                                        'This',
                                        'I',
                                        'what',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'is',
                                        'not',
                                        'what',
                                        'I',
                                        'ordered',
                                    ],
                                    'target_sentence' => 'This is not what I ordered',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Excuse me, we have been waiting a long time',
                                        'The food arrived quickly',
                                        'This tastes wonderful',
                                        'Can we get the bill, please?',
                                    ],
                                    'audio_url' => '/audio/exercises/excuse-me-we-have-been-waiting-a-long-time.mp3',
                                    'audio_text' => 'Excuse me, we have been waiting a long time',
                                    'correct_answer' => 'Excuse me, we have been waiting a long time',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'This is not what I ordered',
                                        'This tastes great',
                                        'Can I have the bill?',
                                        'Thank you very much',
                                    ],
                                    'question' => 'What should you say if the waiter brings the wrong dish?',
                                    'correct_answer' => 'This is not what I ordered',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'order',
                                        'Could',
                                        'please',
                                        'check',
                                        'you',
                                        'our',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'you',
                                        'check',
                                        'our',
                                        'order',
                                        'please',
                                    ],
                                    'target_sentence' => 'Could you check our order please',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Polite Complaint Phrases & Requests',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Please',
                                    'options' => [
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Thanks',
                                            'image' => '/images/exercises/thanks.png',
                                        ],
                                        [
                                            'text' => 'Excuse',
                                            'image' => '/images/exercises/excuse.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Please',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Could',
                                        'Does',
                                        'Is',
                                        'Has',
                                    ],
                                    'sentence' => '____ you please take this back to the kitchen?',
                                    'correct_answer' => 'Could',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bring',
                                        'Could',
                                        'bill',
                                        'the',
                                        'please',
                                        'you',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'you',
                                        'please',
                                        'bring',
                                        'the',
                                        'bill',
                                    ],
                                    'target_sentence' => 'Could you please bring the bill',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I\'m afraid this isn\'t right',
                                        'Everything is perfect, thank you',
                                        'I would like to pay in cash',
                                        'This is my first time here',
                                    ],
                                    'audio_url' => '/audio/exercises/im-afraid-this-isnt-right.mp3',
                                    'audio_text' => 'I\'m afraid this isn\'t right',
                                    'correct_answer' => 'I\'m afraid this isn\'t right',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could you please check this again?',
                                        'This food is terrible!',
                                        'I want my money back now!',
                                        'Hey, this is wrong!',
                                    ],
                                    'question' => 'Which phrase is the most polite way to complain?',
                                    'correct_answer' => 'Could you please check this again?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I am sorry to say',
                                        'I am scared of something',
                                        'I am very happy',
                                        'I am confused',
                                    ],
                                    'question' => 'What does "I\'m afraid" mean in this sentence?',
                                    'correct_answer' => 'I am sorry to say',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Complimenting the Food',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Delicious',
                                    'options' => [
                                        [
                                            'text' => 'Delicious',
                                            'image' => '/images/exercises/delicious.png',
                                        ],
                                        [
                                            'text' => 'Awful',
                                            'image' => '/images/exercises/awful.png',
                                        ],
                                        [
                                            'text' => 'Bland',
                                            'image' => '/images/exercises/bland.png',
                                        ],
                                        [
                                            'text' => 'Stale',
                                            'image' => '/images/exercises/stale.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Delicious',
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
                                    'sentence' => 'This is the ____ meal I have ever had.',
                                    'correct_answer' => 'best',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'amazing',
                                        'This',
                                        'tastes',
                                        'cake',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'cake',
                                        'tastes',
                                        'amazing',
                                    ],
                                    'target_sentence' => 'This cake tastes amazing',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The soup was absolutely delicious',
                                        'The soup was too salty',
                                        'The soup arrived cold',
                                        'I did not order any soup',
                                    ],
                                    'audio_url' => '/audio/exercises/the-soup-was-absolutely-delicious.mp3',
                                    'audio_text' => 'The soup was absolutely delicious',
                                    'correct_answer' => 'The soup was absolutely delicious',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'tasty',
                                    'options' => [
                                        'Having a pleasant flavor',
                                        'Having no flavor at all',
                                        'Very cold',
                                        'Very expensive',
                                    ],
                                    'correct_answer' => 'Having a pleasant flavor',
                                ],
                            ],
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
                                            'text' => 'Rotten',
                                            'image' => '/images/exercises/rotten.png',
                                        ],
                                        [
                                            'text' => 'Frozen',
                                            'image' => '/images/exercises/frozen.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Fresh',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Complimenting the Staff & Service',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Friendly',
                                    'options' => [
                                        [
                                            'text' => 'Friendly',
                                            'image' => '/images/exercises/friendly.png',
                                        ],
                                        [
                                            'text' => 'Rude',
                                            'image' => '/images/exercises/rude.png',
                                        ],
                                        [
                                            'text' => 'Slow',
                                            'image' => '/images/exercises/slow.png',
                                        ],
                                        [
                                            'text' => 'Lazy',
                                            'image' => '/images/exercises/lazy.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Friendly',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'friendly',
                                        'friend',
                                        'friends',
                                        'friendliness',
                                    ],
                                    'sentence' => 'The waiter was very ____ and helpful.',
                                    'correct_answer' => 'friendly',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'attentive',
                                        'Our',
                                        'extremely',
                                        'was',
                                        'server',
                                    ],
                                    'correct_order' => [
                                        'Our',
                                        'server',
                                        'was',
                                        'extremely',
                                        'attentive',
                                    ],
                                    'target_sentence' => 'Our server was extremely attentive',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'The staff here are always so polite',
                                        'The staff here are quite rude',
                                        'We waited a long time for service',
                                        'The restaurant was closed today',
                                    ],
                                    'audio_url' => '/audio/exercises/the-staff-here-are-always-so-polite.mp3',
                                    'audio_text' => 'The staff here are always so polite',
                                    'correct_answer' => 'The staff here are always so polite',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'attentive',
                                    'options' => [
                                        'Paying close attention to someone\'s needs',
                                        'Being lazy at work',
                                        'Being loud and rude',
                                        'Arriving late',
                                    ],
                                    'correct_answer' => 'Paying close attention to someone\'s needs',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Thank you for the wonderful service',
                                        'The service was disappointing',
                                        'Please bring the check',
                                        'We would like a table for two',
                                    ],
                                    'audio_url' => '/audio/exercises/thank-you-for-the-wonderful-service.mp3',
                                    'audio_text' => 'Thank you for the wonderful service',
                                    'correct_answer' => 'Thank you for the wonderful service',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Resolving Issues & Thanking Staff',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Replace',
                                    'options' => [
                                        [
                                            'text' => 'Replace',
                                            'image' => '/images/exercises/replace.png',
                                        ],
                                        [
                                            'text' => 'Break',
                                            'image' => '/images/exercises/break.png',
                                        ],
                                        [
                                            'text' => 'Order',
                                            'image' => '/images/exercises/order.png',
                                        ],
                                        [
                                            'text' => 'Pay',
                                            'image' => '/images/exercises/pay.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Replace',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'replace',
                                        'replaced',
                                        'replacing',
                                        'replaces',
                                    ],
                                    'sentence' => 'The manager offered to ____ our meal for free.',
                                    'correct_answer' => 'replace',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'new',
                                        'I',
                                        'plate',
                                        'bring',
                                        'you',
                                        'a',
                                        'will',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'will',
                                        'bring',
                                        'you',
                                        'a',
                                        'new',
                                        'plate',
                                    ],
                                    'target_sentence' => 'I will bring you a new plate',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'We are sorry for the inconvenience',
                                        'Everything was perfect tonight',
                                        'Please come again soon',
                                        'The kitchen is closed now',
                                    ],
                                    'audio_url' => '/audio/exercises/we-are-sorry-for-the-inconvenience.mp3',
                                    'audio_text' => 'We are sorry for the inconvenience',
                                    'correct_answer' => 'We are sorry for the inconvenience',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'We apologize for the mistake',
                                        'That is your problem',
                                        'We do not care about that',
                                        'Pay the bill now',
                                    ],
                                    'question' => 'What should a waiter say after fixing a mistake?',
                                    'correct_answer' => 'We apologize for the mistake',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'fixing',
                                        'fix',
                                        'fixed',
                                        'fixes',
                                    ],
                                    'sentence' => 'Thank you for ____ the problem so quickly.',
                                    'correct_answer' => 'fixing',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 6: Dietary Restrictions & Allergies',
                'order' => 6,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Vegetarian & Vegan Basics',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Vegetarian',
                                    'options' => [
                                        [
                                            'text' => 'Vegetarian',
                                            'image' => '/images/exercises/vegetarian.png',
                                        ],
                                        [
                                            'text' => 'Vegan',
                                            'image' => '/images/exercises/vegan.png',
                                        ],
                                        [
                                            'text' => 'Carnivore',
                                            'image' => '/images/exercises/carnivore.png',
                                        ],
                                        [
                                            'text' => 'Omnivore',
                                            'image' => '/images/exercises/omnivore.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Vegetarian',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'vegetarian',
                                        'vegetarians',
                                        'vegetarianism',
                                        'vegetarianly',
                                    ],
                                    'sentence' => 'I am ____; I don\'t eat meat.',
                                    'correct_answer' => 'vegetarian',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'meat',
                                        'I',
                                        'not',
                                        'eat',
                                        'do',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'do',
                                        'not',
                                        'eat',
                                        'meat',
                                    ],
                                    'target_sentence' => 'I do not eat meat',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I am vegan',
                                        'I am vegetarian',
                                        'I eat meat',
                                        'I like fish',
                                    ],
                                    'audio_url' => '/audio/exercises/i-am-vegan.mp3',
                                    'audio_text' => 'I am vegan',
                                    'correct_answer' => 'I am vegan',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'vegan',
                                    'options' => [
                                        'Someone who eats no animal products at all',
                                        'Someone who eats only fish',
                                        'Someone who eats only meat',
                                        'Someone who eats only bread',
                                    ],
                                    'correct_answer' => 'Someone who eats no animal products at all',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Tofu',
                                    'options' => [
                                        [
                                            'text' => 'Tofu',
                                            'image' => '/images/exercises/tofu.png',
                                        ],
                                        [
                                            'text' => 'Cheese',
                                            'image' => '/images/exercises/cheese.png',
                                        ],
                                        [
                                            'text' => 'Butter',
                                            'image' => '/images/exercises/butter.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Tofu',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Common Food Allergies',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Peanuts',
                                    'options' => [
                                        [
                                            'text' => 'Peanuts',
                                            'image' => '/images/exercises/peanuts.png',
                                        ],
                                        [
                                            'text' => 'Shrimp',
                                            'image' => '/images/exercises/shrimp.png',
                                        ],
                                        [
                                            'text' => 'Cheese',
                                            'image' => '/images/exercises/cheese.png',
                                        ],
                                        [
                                            'text' => 'Bread',
                                            'image' => '/images/exercises/bread.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Peanuts',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'allergy',
                                        'allergic',
                                        'allergies',
                                        'allergen',
                                    ],
                                    'sentence' => 'She has a peanut ____.',
                                    'correct_answer' => 'allergy',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'nuts',
                                        'He',
                                        'allergic',
                                        'is',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'He',
                                        'is',
                                        'allergic',
                                        'to',
                                        'nuts',
                                    ],
                                    'target_sentence' => 'He is allergic to nuts',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I have a gluten allergy',
                                        'I have a headache',
                                        'I like gluten bread',
                                        'I am hungry',
                                    ],
                                    'audio_url' => '/audio/exercises/i-have-a-gluten-allergy.mp3',
                                    'audio_text' => 'I have a gluten allergy',
                                    'correct_answer' => 'I have a gluten allergy',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'allergic',
                                    'options' => [
                                        'Having a bad physical reaction to something',
                                        'Liking something a lot',
                                        'Being very hungry',
                                        'Being very full',
                                    ],
                                    'correct_answer' => 'Having a bad physical reaction to something',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'dairy',
                                        'dairying',
                                        'dairies',
                                        'dairyless',
                                    ],
                                    'sentence' => 'This cake contains ____, so I can\'t eat it.',
                                    'correct_answer' => 'dairy',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Saying "I am allergic to..."',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Shellfish',
                                    'options' => [
                                        [
                                            'text' => 'Shellfish',
                                            'image' => '/images/exercises/shellfish.png',
                                        ],
                                        [
                                            'text' => 'Chicken',
                                            'image' => '/images/exercises/chicken.png',
                                        ],
                                        [
                                            'text' => 'Rice',
                                            'image' => '/images/exercises/rice.png',
                                        ],
                                        [
                                            'text' => 'Bread',
                                            'image' => '/images/exercises/bread.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Shellfish',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'to',
                                        'for',
                                        'with',
                                        'at',
                                    ],
                                    'sentence' => 'I am allergic ____ shellfish.',
                                    'correct_answer' => 'to',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'shellfish',
                                        'I',
                                        'eat',
                                        'cannot',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'cannot',
                                        'eat',
                                        'shellfish',
                                    ],
                                    'target_sentence' => 'I cannot eat shellfish',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I am allergic to eggs',
                                        'I love eggs',
                                        'I ate an egg',
                                        'Eggs are cheap',
                                    ],
                                    'audio_url' => '/audio/exercises/i-am-allergic-to-eggs.mp3',
                                    'audio_text' => 'I am allergic to eggs',
                                    'correct_answer' => 'I am allergic to eggs',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I am allergic to nuts',
                                        'I am allergy to nuts',
                                        'I allergic to nuts',
                                        'I am allergics to nuts',
                                    ],
                                    'question' => 'Which sentence correctly says you have a nut allergy?',
                                    'correct_answer' => 'I am allergic to nuts',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'milk',
                                        'She',
                                        'allergic',
                                        'is',
                                        'to',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'is',
                                        'allergic',
                                        'to',
                                        'milk',
                                    ],
                                    'target_sentence' => 'She is allergic to milk',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Asking About Ingredients',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Ingredients',
                                    'options' => [
                                        [
                                            'text' => 'Ingredients',
                                            'image' => '/images/exercises/ingredients.png',
                                        ],
                                        [
                                            'text' => 'Recipe',
                                            'image' => '/images/exercises/recipe.png',
                                        ],
                                        [
                                            'text' => 'Portion',
                                            'image' => '/images/exercises/portion.png',
                                        ],
                                        [
                                            'text' => 'Flavor',
                                            'image' => '/images/exercises/flavor.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Ingredients',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'contain',
                                        'contains',
                                        'containing',
                                        'contained',
                                    ],
                                    'sentence' => 'Does this soup ____ dairy?',
                                    'correct_answer' => 'contain',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'nuts',
                                        'Does',
                                        'this',
                                        'dish',
                                        'contain',
                                    ],
                                    'correct_order' => [
                                        'Does',
                                        'this',
                                        'dish',
                                        'contain',
                                        'nuts',
                                    ],
                                    'target_sentence' => 'Does this dish contain nuts',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Is this dish vegan?',
                                        'Is this dish spicy?',
                                        'Is this dish cold?',
                                        'Is this dish ready?',
                                    ],
                                    'audio_url' => '/audio/exercises/is-this-dish-vegan.mp3',
                                    'audio_text' => 'Is this dish vegan?',
                                    'correct_answer' => 'Is this dish vegan?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Does this dish contain meat?',
                                        'This dish contain meat?',
                                        'Is contain meat this dish?',
                                        'Meat this dish contains?',
                                    ],
                                    'question' => 'How do you ask if a dish has meat in it?',
                                    'correct_answer' => 'Does this dish contain meat?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'What are the ingredients?',
                                        'What is the price?',
                                        'Where is the kitchen?',
                                        'Who is the chef?',
                                    ],
                                    'audio_url' => '/audio/exercises/what-are-the-ingredients.mp3',
                                    'audio_text' => 'What are the ingredients?',
                                    'correct_answer' => 'What are the ingredients?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Ordering Safely — Special Requests',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Without',
                                    'options' => [
                                        [
                                            'text' => 'Without',
                                            'image' => '/images/exercises/without.png',
                                        ],
                                        [
                                            'text' => 'With',
                                            'image' => '/images/exercises/with.png',
                                        ],
                                        [
                                            'text' => 'Inside',
                                            'image' => '/images/exercises/inside.png',
                                        ],
                                        [
                                            'text' => 'Instead',
                                            'image' => '/images/exercises/instead.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Without',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'without',
                                        'with',
                                        'inside',
                                        'instead',
                                    ],
                                    'sentence' => 'Could you make this dish ____ cheese?',
                                    'correct_answer' => 'without',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'nuts',
                                        'Can',
                                        'you',
                                        'make',
                                        'it',
                                        'without',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'you',
                                        'make',
                                        'it',
                                        'without',
                                        'nuts',
                                    ],
                                    'target_sentence' => 'Can you make it without nuts',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can I have that without dairy?',
                                        'Can I have more rice?',
                                        'Can I have the bill?',
                                        'Can I have a fork?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-i-have-that-without-dairy.mp3',
                                    'audio_text' => 'Can I have that without dairy?',
                                    'correct_answer' => 'Can I have that without dairy?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'instead of',
                                    'options' => [
                                        'In place of something else',
                                        'In addition to something',
                                        'At the same time as',
                                        'Before something',
                                    ],
                                    'correct_answer' => 'In place of something else',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could you make this without nuts, please?',
                                        'Give me food now',
                                        'I hate nuts',
                                        'Nuts are bad',
                                    ],
                                    'question' => 'What is the best way to ask for a dish without nuts?',
                                    'correct_answer' => 'Could you make this without nuts, please?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Menu Labels & Alternatives',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Gluten-free',
                                    'options' => [
                                        [
                                            'text' => 'Gluten-free',
                                            'image' => '/images/exercises/gluten-free.png',
                                        ],
                                        [
                                            'text' => 'Sugar-free',
                                            'image' => '/images/exercises/sugar-free.png',
                                        ],
                                        [
                                            'text' => 'Fat-free',
                                            'image' => '/images/exercises/fat-free.png',
                                        ],
                                        [
                                            'text' => 'Salt-free',
                                            'image' => '/images/exercises/salt-free.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Gluten-free',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'safe',
                                        'safety',
                                        'safely',
                                        'saved',
                                    ],
                                    'sentence' => 'This bread is gluten-free, so it is ____ for you.',
                                    'correct_answer' => 'safe',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'free',
                                        'This',
                                        'meal',
                                        'is',
                                        'dairy',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'meal',
                                        'is',
                                        'dairy',
                                        'free',
                                    ],
                                    'target_sentence' => 'This meal is dairy free',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This label says nut-free',
                                        'This label says sugar-free',
                                        'This label says gluten-free',
                                        'This label says dairy-free',
                                    ],
                                    'audio_url' => '/audio/exercises/this-label-says-nut-free.mp3',
                                    'audio_text' => 'This label says nut-free',
                                    'correct_answer' => 'This label says nut-free',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Made only from plants, no animal products',
                                        'Made only from meat',
                                        'Made with extra sugar',
                                        'Made with dairy products',
                                    ],
                                    'question' => 'What does a "plant-based" label mean?',
                                    'correct_answer' => 'Made only from plants, no animal products',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'healthier',
                                        'healthiest',
                                        'health',
                                        'healthy',
                                    ],
                                    'sentence' => 'This salad is ____ than the burger.',
                                    'correct_answer' => 'healthier',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 7: Drinks & Beverages',
                'order' => 7,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Hot Beverages',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Coffee',
                                    'options' => [
                                        [
                                            'text' => 'Coffee',
                                            'image' => '/images/exercises/coffee.png',
                                        ],
                                        [
                                            'text' => 'Tea',
                                            'image' => '/images/exercises/tea.png',
                                        ],
                                        [
                                            'text' => 'Juice',
                                            'image' => '/images/exercises/juice.png',
                                        ],
                                        [
                                            'text' => 'Water',
                                            'image' => '/images/exercises/water.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Coffee',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'tea',
                                        'teas',
                                        'teaing',
                                        'teach',
                                    ],
                                    'sentence' => 'Can I have a cup of ____, please?',
                                    'correct_answer' => 'tea',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'hot',
                                        'The',
                                        'coffee',
                                        'is',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'coffee',
                                        'is',
                                        'very',
                                        'hot',
                                    ],
                                    'target_sentence' => 'The coffee is very hot',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Hot chocolate',
                                        'Iced tea',
                                        'Orange juice',
                                        'Sparkling water',
                                    ],
                                    'audio_url' => '/audio/exercises/hot-chocolate.mp3',
                                    'audio_text' => 'Hot chocolate',
                                    'correct_answer' => 'Hot chocolate',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A warm sweet drink made with cocoa',
                                        'A cold fruit drink',
                                        'A type of tea',
                                        'A fizzy drink',
                                    ],
                                    'question' => 'What is "hot chocolate"?',
                                    'correct_answer' => 'A warm sweet drink made with cocoa',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Tea',
                                    'options' => [
                                        [
                                            'text' => 'Tea',
                                            'image' => '/images/exercises/tea.png',
                                        ],
                                        [
                                            'text' => 'Coffee',
                                            'image' => '/images/exercises/coffee.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Cocoa',
                                            'image' => '/images/exercises/cocoa.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Tea',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Cold Beverages',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Juice',
                                    'options' => [
                                        [
                                            'text' => 'Juice',
                                            'image' => '/images/exercises/juice.png',
                                        ],
                                        [
                                            'text' => 'Soda',
                                            'image' => '/images/exercises/soda.png',
                                        ],
                                        [
                                            'text' => 'Milk',
                                            'image' => '/images/exercises/milk.png',
                                        ],
                                        [
                                            'text' => 'Coffee',
                                            'image' => '/images/exercises/coffee.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Juice',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cold',
                                        'colder',
                                        'coldest',
                                        'coldly',
                                    ],
                                    'sentence' => 'This lemonade is very ____.',
                                    'correct_answer' => 'cold',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'juice',
                                        'I',
                                        'cold',
                                        'like',
                                        'orange',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'like',
                                        'cold',
                                        'orange',
                                        'juice',
                                    ],
                                    'target_sentence' => 'I like cold orange juice',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Iced tea',
                                        'Hot tea',
                                        'Coffee',
                                        'Milk',
                                    ],
                                    'audio_url' => '/audio/exercises/iced-tea.mp3',
                                    'audio_text' => 'Iced tea',
                                    'correct_answer' => 'Iced tea',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Lemonade',
                                        'Hot chocolate',
                                        'Hot coffee',
                                        'Hot tea',
                                    ],
                                    'question' => 'Which drink is usually served cold?',
                                    'correct_answer' => 'Lemonade',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'cold',
                                        'colds',
                                        'colding',
                                        'coldness',
                                    ],
                                    'sentence' => 'Can I have a glass of ____ water, please?',
                                    'correct_answer' => 'cold',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Still or Sparkling Water',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sparkling',
                                    'options' => [
                                        [
                                            'text' => 'Sparkling',
                                            'image' => '/images/exercises/sparkling.png',
                                        ],
                                        [
                                            'text' => 'Still',
                                            'image' => '/images/exercises/still.png',
                                        ],
                                        [
                                            'text' => 'Warm',
                                            'image' => '/images/exercises/warm.png',
                                        ],
                                        [
                                            'text' => 'Sweet',
                                            'image' => '/images/exercises/sweet.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sparkling',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'sparkling',
                                        'sparkle',
                                        'sparkles',
                                        'sparkly',
                                    ],
                                    'sentence' => 'Would you like still or ____ water?',
                                    'correct_answer' => 'sparkling',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'water',
                                        'Still',
                                        'sparkling',
                                        'or',
                                    ],
                                    'correct_order' => [
                                        'Still',
                                        'or',
                                        'sparkling',
                                        'water',
                                    ],
                                    'target_sentence' => 'Still or sparkling water',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Still water, please',
                                        'Sparkling water, please',
                                        'Hot tea, please',
                                        'Orange juice, please',
                                    ],
                                    'audio_url' => '/audio/exercises/still-water-please.mp3',
                                    'audio_text' => 'Still water, please',
                                    'correct_answer' => 'Still water, please',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'sparkling water',
                                    'options' => [
                                        'Water with bubbles',
                                        'Water that is very cold',
                                        'Water with sugar',
                                        'Water with milk',
                                    ],
                                    'correct_answer' => 'Water with bubbles',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'want',
                                        'Do',
                                        'still',
                                        'you',
                                        'water',
                                    ],
                                    'correct_order' => [
                                        'Do',
                                        'you',
                                        'want',
                                        'still',
                                        'water',
                                    ],
                                    'target_sentence' => 'Do you want still water',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Ordering Drinks at a Cafe',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Menu',
                                    'options' => [
                                        [
                                            'text' => 'Menu',
                                            'image' => '/images/exercises/menu.png',
                                        ],
                                        [
                                            'text' => 'Bill',
                                            'image' => '/images/exercises/bill.png',
                                        ],
                                        [
                                            'text' => 'Waiter',
                                            'image' => '/images/exercises/waiter.png',
                                        ],
                                        [
                                            'text' => 'Table',
                                            'image' => '/images/exercises/table.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Menu',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'a',
                                        'an',
                                        'some',
                                        'many',
                                    ],
                                    'sentence' => 'I\'d like ____ coffee, please.',
                                    'correct_answer' => 'a',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'water',
                                        'Could',
                                        'I',
                                        'have',
                                        'a',
                                        'glass',
                                        'of',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'I',
                                        'have',
                                        'a',
                                        'glass',
                                        'of',
                                        'water',
                                    ],
                                    'target_sentence' => 'Could I have a glass of water',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Could I have the menu, please?',
                                        'Could I have the bill, please?',
                                        'Where is the toilet?',
                                        'What time is it?',
                                    ],
                                    'audio_url' => '/audio/exercises/could-i-have-the-menu-please.mp3',
                                    'audio_text' => 'Could I have the menu, please?',
                                    'correct_answer' => 'Could I have the menu, please?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I\'d like a cup of tea, please.',
                                        'Give me tea.',
                                        'Tea now.',
                                        'I want tea now.',
                                    ],
                                    'question' => 'Which sentence is a polite way to order a drink?',
                                    'correct_answer' => 'I\'d like a cup of tea, please.',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I\'d like an orange juice, please',
                                        'I\'d like a hot tea, please',
                                        'I\'d like the bill, please',
                                        'I\'d like a table, please',
                                    ],
                                    'audio_url' => '/audio/exercises/id-like-an-orange-juice-please.mp3',
                                    'audio_text' => 'I\'d like an orange juice, please',
                                    'correct_answer' => 'I\'d like an orange juice, please',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Drink Sizes & Quantities',
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
                                            'text' => 'Cup',
                                            'image' => '/images/exercises/cup.png',
                                        ],
                                        [
                                            'text' => 'Glass',
                                            'image' => '/images/exercises/glass.png',
                                        ],
                                        [
                                            'text' => 'Jug',
                                            'image' => '/images/exercises/jug.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Bottle',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'large',
                                        'larger',
                                        'largest',
                                        'largely',
                                    ],
                                    'sentence' => 'I would like a ____ coffee, not a small one.',
                                    'correct_answer' => 'large',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'juice',
                                        'She',
                                        'a',
                                        'ordered',
                                        'large',
                                        'orange',
                                    ],
                                    'correct_order' => [
                                        'She',
                                        'ordered',
                                        'a',
                                        'large',
                                        'orange',
                                        'juice',
                                    ],
                                    'target_sentence' => 'She ordered a large orange juice',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'A bottle of sparkling water',
                                        'A cup of hot tea',
                                        'A glass of milk',
                                        'A can of soda',
                                    ],
                                    'audio_url' => '/audio/exercises/a-bottle-of-sparkling-water.mp3',
                                    'audio_text' => 'A bottle of sparkling water',
                                    'correct_answer' => 'A bottle of sparkling water',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'large',
                                        'larger',
                                        'largest',
                                        'more large',
                                    ],
                                    'question' => 'Which is the correct order: small, medium, ____?',
                                    'correct_answer' => 'large',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A cup',
                                        'A bottle',
                                        'A can',
                                        'A jug',
                                    ],
                                    'question' => 'What container do we usually use for tea?',
                                    'correct_answer' => 'A cup',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Asking About Drinks & Making Choices',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sweet',
                                    'options' => [
                                        [
                                            'text' => 'Sweet',
                                            'image' => '/images/exercises/sweet.png',
                                        ],
                                        [
                                            'text' => 'Sour',
                                            'image' => '/images/exercises/sour.png',
                                        ],
                                        [
                                            'text' => 'Bitter',
                                            'image' => '/images/exercises/bitter.png',
                                        ],
                                        [
                                            'text' => 'Fresh',
                                            'image' => '/images/exercises/fresh.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sweet',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'sweeter',
                                        'sweetest',
                                        'sweet',
                                        'sweetly',
                                    ],
                                    'sentence' => 'Which drink is ____, the lemonade or the orange juice?',
                                    'correct_answer' => 'sweeter',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'than',
                                        'Is',
                                        'this',
                                        'juice',
                                        'sweeter',
                                        'one',
                                        'that',
                                    ],
                                    'correct_order' => [
                                        'Is',
                                        'this',
                                        'juice',
                                        'sweeter',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'Is this juice sweeter than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Which one do you prefer?',
                                        'How much is it?',
                                        'Where is the cafe?',
                                        'What time is it?',
                                    ],
                                    'audio_url' => '/audio/exercises/which-one-do-you-prefer.mp3',
                                    'audio_text' => 'Which one do you prefer?',
                                    'correct_answer' => 'Which one do you prefer?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'prefer',
                                    'options' => [
                                        'To like one thing more than another',
                                        'To dislike something',
                                        'To drink quickly',
                                        'To pay for something',
                                    ],
                                    'correct_answer' => 'To like one thing more than another',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'sweetest',
                                        'sweeter',
                                        'sweet',
                                        'sweetness',
                                    ],
                                    'sentence' => 'This tea is the ____ drink on the menu.',
                                    'correct_answer' => 'sweetest',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 8: Desserts & Sweets',
                'order' => 8,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Dessert Menu Vocabulary',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Cake',
                                    'options' => [
                                        [
                                            'text' => 'Cake',
                                            'image' => '/images/exercises/cake.png',
                                        ],
                                        [
                                            'text' => 'Pie',
                                            'image' => '/images/exercises/pie.png',
                                        ],
                                        [
                                            'text' => 'Cookie',
                                            'image' => '/images/exercises/cookie.png',
                                        ],
                                        [
                                            'text' => 'Pudding',
                                            'image' => '/images/exercises/pudding.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Cake',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Ice Cream',
                                    'options' => [
                                        [
                                            'text' => 'Ice Cream',
                                            'image' => '/images/exercises/ice-cream.png',
                                        ],
                                        [
                                            'text' => 'Pastry',
                                            'image' => '/images/exercises/pastry.png',
                                        ],
                                        [
                                            'text' => 'Pie',
                                            'image' => '/images/exercises/pie.png',
                                        ],
                                        [
                                            'text' => 'Cookie',
                                            'image' => '/images/exercises/cookie.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Ice Cream',
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
                                    'sentence' => 'I would like a slice of ____ for dessert.',
                                    'correct_answer' => 'cake',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'ice',
                                        'I',
                                        'would',
                                        'cream',
                                        'like',
                                        'some',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'some',
                                        'ice',
                                        'cream',
                                    ],
                                    'target_sentence' => 'I would like some ice cream',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have any pudding?',
                                        'Can I pay by card?',
                                        'Where is the restroom?',
                                        'Is the soup hot?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-any-pudding.mp3',
                                    'audio_text' => 'Do you have any pudding?',
                                    'correct_answer' => 'Do you have any pudding?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'pastry',
                                    'options' => [
                                        'A baked dough dessert',
                                        'A cold drink',
                                        'A type of meat',
                                        'A vegetable',
                                    ],
                                    'correct_answer' => 'A baked dough dessert',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Ordering Dessert',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Waiter',
                                    'options' => [
                                        [
                                            'text' => 'Waiter',
                                            'image' => '/images/exercises/waiter.png',
                                        ],
                                        [
                                            'text' => 'Chef',
                                            'image' => '/images/exercises/chef.png',
                                        ],
                                        [
                                            'text' => 'Customer',
                                            'image' => '/images/exercises/customer.png',
                                        ],
                                        [
                                            'text' => 'Cashier',
                                            'image' => '/images/exercises/cashier.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Waiter',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'order',
                                        'orders',
                                        'ordering',
                                        'ordered',
                                    ],
                                    'sentence' => 'I would like to ____ the chocolate cake.',
                                    'correct_answer' => 'order',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'have',
                                        'has',
                                        'having',
                                        'had',
                                    ],
                                    'sentence' => 'Could I ____ a slice of pie, please?',
                                    'correct_answer' => 'have',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'have',
                                        'Could',
                                        'I',
                                        'the',
                                        'apple',
                                        'pie',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'I',
                                        'have',
                                        'the',
                                        'apple',
                                        'pie',
                                    ],
                                    'target_sentence' => 'Could I have the apple pie',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I\'ll have the cheesecake, please',
                                        'The bill, please',
                                        'I am not hungry',
                                        'Do you have a menu?',
                                    ],
                                    'audio_url' => '/audio/exercises/ill-have-the-cheesecake-please.mp3',
                                    'audio_text' => 'I\'ll have the cheesecake, please',
                                    'correct_answer' => 'I\'ll have the cheesecake, please',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could I have the ice cream, please?',
                                        'Give me ice cream now',
                                        'I want ice cream',
                                        'Ice cream now',
                                    ],
                                    'question' => 'What do you say to order dessert politely?',
                                    'correct_answer' => 'Could I have the ice cream, please?',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Ice Cream Flavors & Preferences',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Vanilla',
                                    'options' => [
                                        [
                                            'text' => 'Vanilla',
                                            'image' => '/images/exercises/vanilla.png',
                                        ],
                                        [
                                            'text' => 'Chocolate',
                                            'image' => '/images/exercises/chocolate.png',
                                        ],
                                        [
                                            'text' => 'Strawberry',
                                            'image' => '/images/exercises/strawberry.png',
                                        ],
                                        [
                                            'text' => 'Mango',
                                            'image' => '/images/exercises/mango.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Vanilla',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'sweeter',
                                        'sweet',
                                        'sweetest',
                                        'sweetness',
                                    ],
                                    'sentence' => 'Chocolate ice cream is ____ than vanilla.',
                                    'correct_answer' => 'sweeter',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'sweeter',
                                        'This',
                                        'flavor',
                                        'is',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'flavor',
                                        'is',
                                        'sweeter',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This flavor is sweeter than that one',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'flavor',
                                        'Strawberry',
                                        'is',
                                        'my',
                                        'favorite',
                                    ],
                                    'correct_order' => [
                                        'Strawberry',
                                        'is',
                                        'my',
                                        'favorite',
                                        'flavor',
                                    ],
                                    'target_sentence' => 'Strawberry is my favorite flavor',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Which flavor do you like best?',
                                        'How much does it cost?',
                                        'Is this table free?',
                                        'Can I have the bill?',
                                    ],
                                    'audio_url' => '/audio/exercises/which-flavor-do-you-like-best.mp3',
                                    'audio_text' => 'Which flavor do you like best?',
                                    'correct_answer' => 'Which flavor do you like best?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'This cake is sweeter than that pie.',
                                        'This cake is sweet than that pie.',
                                        'This cake more sweet that pie.',
                                        'This cake sweetest than pie.',
                                    ],
                                    'question' => 'Which sentence uses a comparative correctly?',
                                    'correct_answer' => 'This cake is sweeter than that pie.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Sharing Dessert with Others',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Spoon',
                                    'options' => [
                                        [
                                            'text' => 'Spoon',
                                            'image' => '/images/exercises/spoon.png',
                                        ],
                                        [
                                            'text' => 'Fork',
                                            'image' => '/images/exercises/fork.png',
                                        ],
                                        [
                                            'text' => 'Knife',
                                            'image' => '/images/exercises/knife.png',
                                        ],
                                        [
                                            'text' => 'Plate',
                                            'image' => '/images/exercises/plate.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Spoon',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'slice',
                                        'slices',
                                        'slicing',
                                        'sliced',
                                    ],
                                    'sentence' => 'Let\'s share this ____ of cake.',
                                    'correct_answer' => 'slice',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'dessert',
                                        'Let',
                                        'us',
                                        'share',
                                        'this',
                                        'together',
                                    ],
                                    'correct_order' => [
                                        'Let',
                                        'us',
                                        'share',
                                        'this',
                                        'dessert',
                                        'together',
                                    ],
                                    'target_sentence' => 'Let us share this dessert together',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Would you like to share a dessert?',
                                        'Are you ready to pay?',
                                        'Is the food fresh?',
                                        'Do you need a napkin?',
                                    ],
                                    'audio_url' => '/audio/exercises/would-you-like-to-share-a-dessert.mp3',
                                    'audio_text' => 'Would you like to share a dessert?',
                                    'correct_answer' => 'Would you like to share a dessert?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can I have a bite of your cake?',
                                        'Can I have the whole cake?',
                                        'Is this cake fresh?',
                                        'Where is the cake?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-i-have-a-bite-of-your-cake.mp3',
                                    'audio_text' => 'Can I have a bite of your cake?',
                                    'correct_answer' => 'Can I have a bite of your cake?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'a bite',
                                    'options' => [
                                        'A small taste of food',
                                        'A full meal',
                                        'A type of dessert',
                                        'A type of drink',
                                    ],
                                    'correct_answer' => 'A small taste of food',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Describing Taste & Texture',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Creamy',
                                    'options' => [
                                        [
                                            'text' => 'Creamy',
                                            'image' => '/images/exercises/creamy.png',
                                        ],
                                        [
                                            'text' => 'Crunchy',
                                            'image' => '/images/exercises/crunchy.png',
                                        ],
                                        [
                                            'text' => 'Sour',
                                            'image' => '/images/exercises/sour.png',
                                        ],
                                        [
                                            'text' => 'Bitter',
                                            'image' => '/images/exercises/bitter.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Creamy',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'rich',
                                        'riches',
                                        'richer',
                                        'riched',
                                    ],
                                    'sentence' => 'This chocolate cake is very ____.',
                                    'correct_answer' => 'rich',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'creamy',
                                        'This',
                                        'pudding',
                                        'tastes',
                                        'very',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'pudding',
                                        'tastes',
                                        'very',
                                        'creamy',
                                    ],
                                    'target_sentence' => 'This pudding tastes very creamy',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'This pie tastes a little sour',
                                        'This pie tastes very sweet',
                                        'This pie is too hot',
                                        'This pie has no sugar',
                                    ],
                                    'audio_url' => '/audio/exercises/this-pie-tastes-a-little-sour.mp3',
                                    'audio_text' => 'This pie tastes a little sour',
                                    'correct_answer' => 'This pie tastes a little sour',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A texture that makes a crisp sound when bitten',
                                        'A very sweet taste',
                                        'A cold temperature',
                                        'A liquid food',
                                    ],
                                    'question' => 'What does "crunchy" describe?',
                                    'correct_answer' => 'A texture that makes a crisp sound when bitten',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Sweet',
                                        'Sour',
                                        'Bitter',
                                        'Salty',
                                    ],
                                    'question' => 'Which word means "having a lot of sugar"?',
                                    'correct_answer' => 'Sweet',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Asking for Recommendations',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Recommend',
                                    'options' => [
                                        [
                                            'text' => 'Recommend',
                                            'image' => '/images/exercises/recommend.png',
                                        ],
                                        [
                                            'text' => 'Suggest',
                                            'image' => '/images/exercises/suggest.png',
                                        ],
                                        [
                                            'text' => 'Order',
                                            'image' => '/images/exercises/order.png',
                                        ],
                                        [
                                            'text' => 'Choose',
                                            'image' => '/images/exercises/choose.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Recommend',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'do',
                                        'does',
                                        'did',
                                        'done',
                                    ],
                                    'sentence' => 'What ____ you recommend for dessert?',
                                    'correct_answer' => 'do',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'recommend',
                                        'What',
                                        'would',
                                        'you',
                                        'for',
                                        'dessert',
                                    ],
                                    'correct_order' => [
                                        'What',
                                        'would',
                                        'you',
                                        'recommend',
                                        'for',
                                        'dessert',
                                    ],
                                    'target_sentence' => 'What would you recommend for dessert',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Do you have any sugar-free desserts?',
                                        'Is the restaurant open now?',
                                        'Can I get a table for two?',
                                        'Where is the restroom?',
                                    ],
                                    'audio_url' => '/audio/exercises/do-you-have-any-sugar-free-desserts.mp3',
                                    'audio_text' => 'Do you have any sugar-free desserts?',
                                    'correct_answer' => 'Do you have any sugar-free desserts?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'What would you recommend?',
                                        'Where is the kitchen?',
                                        'How much is the bill?',
                                        'Is this seat taken?',
                                    ],
                                    'question' => 'Which question asks for a dessert suggestion?',
                                    'correct_answer' => 'What would you recommend?',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Menu',
                                    'options' => [
                                        [
                                            'text' => 'Menu',
                                            'image' => '/images/exercises/menu.png',
                                        ],
                                        [
                                            'text' => 'Bill',
                                            'image' => '/images/exercises/bill.png',
                                        ],
                                        [
                                            'text' => 'Receipt',
                                            'image' => '/images/exercises/receipt.png',
                                        ],
                                        [
                                            'text' => 'Napkin',
                                            'image' => '/images/exercises/napkin.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Menu',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 9: Table Manners & Requests',
                'order' => 9,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Excuse Me, Getting Attention',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Waiter',
                                    'options' => [
                                        [
                                            'text' => 'Waiter',
                                            'image' => '/images/exercises/waiter.png',
                                        ],
                                        [
                                            'text' => 'Napkin',
                                            'image' => '/images/exercises/napkin.png',
                                        ],
                                        [
                                            'text' => 'Fork',
                                            'image' => '/images/exercises/fork.png',
                                        ],
                                        [
                                            'text' => 'Plate',
                                            'image' => '/images/exercises/plate.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Waiter',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Excuse',
                                        'Excuses',
                                        'Excusing',
                                        'Excused',
                                    ],
                                    'sentence' => '____ me, could you help us?',
                                    'correct_answer' => 'Excuse',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'bother',
                                        'bothers',
                                        'bothering',
                                        'bothered',
                                    ],
                                    'sentence' => 'Sorry to ____ you, but may I ask something?',
                                    'correct_answer' => 'bother',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'waiter',
                                        'Excuse',
                                        'me',
                                    ],
                                    'correct_order' => [
                                        'Excuse',
                                        'me',
                                        'waiter',
                                    ],
                                    'target_sentence' => 'Excuse me, waiter',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Excuse me, sir',
                                        'Thank you very much',
                                        'See you later',
                                        'I am hungry',
                                    ],
                                    'audio_url' => '/audio/exercises/excuse-me-sir.mp3',
                                    'audio_text' => 'Excuse me, sir',
                                    'correct_answer' => 'Excuse me, sir',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Excuse me',
                                        'Goodbye',
                                        'I am full',
                                        'No thanks',
                                    ],
                                    'question' => 'What do you say to politely get a waiter\'s attention?',
                                    'correct_answer' => 'Excuse me',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: Asking for Napkins & Cutlery',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Napkin',
                                    'options' => [
                                        [
                                            'text' => 'Napkin',
                                            'image' => '/images/exercises/napkin.png',
                                        ],
                                        [
                                            'text' => 'Spoon',
                                            'image' => '/images/exercises/spoon.png',
                                        ],
                                        [
                                            'text' => 'Knife',
                                            'image' => '/images/exercises/knife.png',
                                        ],
                                        [
                                            'text' => 'Fork',
                                            'image' => '/images/exercises/fork.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Napkin',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'napkin',
                                        'napkins',
                                        'napkining',
                                        'napkined',
                                    ],
                                    'sentence' => 'Could I have a ____, please?',
                                    'correct_answer' => 'napkin',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'fork',
                                        'Could',
                                        'I',
                                        'have',
                                        'a',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'I',
                                        'have',
                                        'a',
                                        'fork',
                                    ],
                                    'target_sentence' => 'Could I have a fork',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'spoon',
                                        'May',
                                        'I',
                                        'have',
                                        'a',
                                        'clean',
                                    ],
                                    'correct_order' => [
                                        'May',
                                        'I',
                                        'have',
                                        'a',
                                        'clean',
                                        'spoon',
                                    ],
                                    'target_sentence' => 'May I have a clean spoon',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'I need a clean knife',
                                        'This soup is cold',
                                        'Where is the bathroom',
                                        'I am finished eating',
                                    ],
                                    'audio_url' => '/audio/exercises/i-need-a-clean-knife.mp3',
                                    'audio_text' => 'I need a clean knife',
                                    'correct_answer' => 'I need a clean knife',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'A knife',
                                        'A napkin',
                                        'A spoon',
                                        'A cup',
                                    ],
                                    'question' => 'What do you use to cut your food?',
                                    'correct_answer' => 'A knife',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Requesting More Food or Drink',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Water',
                                    'options' => [
                                        [
                                            'text' => 'Water',
                                            'image' => '/images/exercises/water.png',
                                        ],
                                        [
                                            'text' => 'Bread',
                                            'image' => '/images/exercises/bread.png',
                                        ],
                                        [
                                            'text' => 'Salt',
                                            'image' => '/images/exercises/salt.png',
                                        ],
                                        [
                                            'text' => 'Sugar',
                                            'image' => '/images/exercises/sugar.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Water',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'more',
                                        'most',
                                        'many',
                                        'much',
                                    ],
                                    'sentence' => 'Could I have some ____ water, please?',
                                    'correct_answer' => 'more',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'napkin',
                                        'Can',
                                        'I',
                                        'have',
                                        'another',
                                    ],
                                    'correct_order' => [
                                        'Can',
                                        'I',
                                        'have',
                                        'another',
                                        'napkin',
                                    ],
                                    'target_sentence' => 'Can I have another napkin',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Could I have more bread, please?',
                                        'The food is delicious',
                                        'I am not hungry',
                                        'This is too spicy',
                                    ],
                                    'audio_url' => '/audio/exercises/could-i-have-more-bread-please.mp3',
                                    'audio_text' => 'Could I have more bread, please?',
                                    'correct_answer' => 'Could I have more bread, please?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'One more glass of water, please',
                                        'I have finished my meal',
                                        'Where is the restroom',
                                        'The bill, please',
                                    ],
                                    'audio_url' => '/audio/exercises/one-more-glass-of-water-please.mp3',
                                    'audio_text' => 'One more glass of water, please',
                                    'correct_answer' => 'One more glass of water, please',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Another',
                                        'Less',
                                        'Some',
                                        'Never',
                                    ],
                                    'question' => 'Which word means "one additional" item?',
                                    'correct_answer' => 'Another',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Polite Requests with Could, Would & May',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Please',
                                    'options' => [
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                        [
                                            'text' => 'Thanks',
                                            'image' => '/images/exercises/thanks.png',
                                        ],
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Excuse',
                                            'image' => '/images/exercises/excuse.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Please',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Would',
                                        'Do',
                                        'Are',
                                        'Is',
                                    ],
                                    'sentence' => '____ you pass the salt, please?',
                                    'correct_answer' => 'Would',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'pepper',
                                        'Could',
                                        'you',
                                        'pass',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'Could',
                                        'you',
                                        'pass',
                                        'the',
                                        'pepper',
                                    ],
                                    'target_sentence' => 'Could you pass the pepper',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Would you mind passing the salt?',
                                        'I do not like salt',
                                        'The salt is empty',
                                        'Please sit down',
                                    ],
                                    'audio_url' => '/audio/exercises/would-you-mind-passing-the-salt.mp3',
                                    'audio_text' => 'Would you mind passing the salt?',
                                    'correct_answer' => 'Would you mind passing the salt?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Could you pass the salt, please?',
                                        'Give me salt',
                                        'Salt now',
                                        'I want salt',
                                    ],
                                    'question' => 'Which is the most polite way to ask for something?',
                                    'correct_answer' => 'Could you pass the salt, please?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'word' => 'would you mind',
                                    'options' => [
                                        'A polite way to ask someone to do something',
                                        'A way to say no',
                                        'A way to say goodbye',
                                        'A question about time',
                                    ],
                                    'correct_answer' => 'A polite way to ask someone to do something',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Apologizing & Excusing Yourself from the Table',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Sorry',
                                    'options' => [
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                        [
                                            'text' => 'Thanks',
                                            'image' => '/images/exercises/thanks.png',
                                        ],
                                        [
                                            'text' => 'Excuse',
                                            'image' => '/images/exercises/excuse.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Sorry',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Restroom',
                                    'options' => [
                                        [
                                            'text' => 'Restroom',
                                            'image' => '/images/exercises/restroom.png',
                                        ],
                                        [
                                            'text' => 'Kitchen',
                                            'image' => '/images/exercises/kitchen.png',
                                        ],
                                        [
                                            'text' => 'Menu',
                                            'image' => '/images/exercises/menu.png',
                                        ],
                                        [
                                            'text' => 'Bill',
                                            'image' => '/images/exercises/bill.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Restroom',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'May',
                                        'Do',
                                        'Are',
                                        'Is',
                                    ],
                                    'sentence' => '____ I be excused for a moment?',
                                    'correct_answer' => 'May',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'back',
                                        'Excuse',
                                        'me',
                                        'I',
                                        'will',
                                        'be',
                                        'right',
                                    ],
                                    'correct_order' => [
                                        'Excuse',
                                        'me',
                                        'I',
                                        'will',
                                        'be',
                                        'right',
                                        'back',
                                    ],
                                    'target_sentence' => 'Excuse me, I will be right back',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Sorry, may I leave the table?',
                                        'I love this restaurant',
                                        'The food is ready',
                                        'Please sit here',
                                    ],
                                    'audio_url' => '/audio/exercises/sorry-may-i-leave-the-table.mp3',
                                    'audio_text' => 'Sorry, may I leave the table?',
                                    'correct_answer' => 'Sorry, may I leave the table?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Excuse me, I will be right back',
                                        'Goodbye forever',
                                        'I am not coming back',
                                        'Give me the bill',
                                    ],
                                    'question' => 'What should you say before leaving the table for a moment?',
                                    'correct_answer' => 'Excuse me, I will be right back',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Please, Thank You & Table Prepositions',
                        'order' => 6,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Thank you',
                                    'options' => [
                                        [
                                            'text' => 'Thank you',
                                            'image' => '/images/exercises/thank-you.png',
                                        ],
                                        [
                                            'text' => 'Sorry',
                                            'image' => '/images/exercises/sorry.png',
                                        ],
                                        [
                                            'text' => 'Please',
                                            'image' => '/images/exercises/please.png',
                                        ],
                                        [
                                            'text' => 'Excuse me',
                                            'image' => '/images/exercises/excuse-me.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Thank you',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'on',
                                        'in',
                                        'at',
                                        'under',
                                    ],
                                    'sentence' => 'Please put the napkin ____ your lap.',
                                    'correct_answer' => 'on',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'meal',
                                        'Thank',
                                        'you',
                                        'for',
                                        'the',
                                        'delicious',
                                    ],
                                    'correct_order' => [
                                        'Thank',
                                        'you',
                                        'for',
                                        'the',
                                        'delicious',
                                        'meal',
                                    ],
                                    'target_sentence' => 'Thank you for the delicious meal',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'table',
                                        'The',
                                        'fork',
                                        'is',
                                        'on',
                                        'the',
                                    ],
                                    'correct_order' => [
                                        'The',
                                        'fork',
                                        'is',
                                        'on',
                                        'the',
                                        'table',
                                    ],
                                    'target_sentence' => 'The fork is on the table',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Thank you very much for your help',
                                        'I am still hungry',
                                        'This is not what I ordered',
                                        'Please bring the menu',
                                    ],
                                    'audio_url' => '/audio/exercises/thank-you-very-much-for-your-help.mp3',
                                    'audio_text' => 'Thank you very much for your help',
                                    'correct_answer' => 'Thank you very much for your help',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'at',
                                        'on',
                                        'in',
                                        'under',
                                    ],
                                    'question' => 'Which preposition completes: "Please sit ____ the table"?',
                                    'correct_answer' => 'at',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Unit 10: Fast Food & Takeaway',
                'order' => 10,
                'lessons' => [
                    [
                        'title' => 'Lesson 1: Ordering at the Counter',
                        'order' => 1,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Burger',
                                    'options' => [
                                        [
                                            'text' => 'Burger',
                                            'image' => '/images/exercises/burger.png',
                                        ],
                                        [
                                            'text' => 'Fries',
                                            'image' => '/images/exercises/fries.png',
                                        ],
                                        [
                                            'text' => 'Milkshake',
                                            'image' => '/images/exercises/milkshake.png',
                                        ],
                                        [
                                            'text' => 'Salad',
                                            'image' => '/images/exercises/salad.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Burger',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'like',
                                        'likes',
                                        'liking',
                                        'liked',
                                    ],
                                    'sentence' => 'I would ____ a cheeseburger, please.',
                                    'correct_answer' => 'like',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'burger',
                                        'would',
                                        'I',
                                        'a',
                                        'like',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'a',
                                        'burger',
                                    ],
                                    'target_sentence' => 'I would like a burger',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Can I take your order?',
                                        'Where is the bathroom?',
                                        'What time is it?',
                                        'How much is this shirt?',
                                    ],
                                    'audio_url' => '/audio/exercises/can-i-take-your-order.mp3',
                                    'audio_text' => 'Can I take your order?',
                                    'correct_answer' => 'Can I take your order?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'I would like a burger, please.',
                                        'Give me burger now.',
                                        'Burger give me.',
                                        'I want it fast.',
                                    ],
                                    'question' => 'What is the polite way to order food?',
                                    'correct_answer' => 'I would like a burger, please.',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Fries',
                                    'options' => [
                                        [
                                            'text' => 'Fries',
                                            'image' => '/images/exercises/fries.png',
                                        ],
                                        [
                                            'text' => 'Napkin',
                                            'image' => '/images/exercises/napkin.png',
                                        ],
                                        [
                                            'text' => 'Straw',
                                            'image' => '/images/exercises/straw.png',
                                        ],
                                        [
                                            'text' => 'Tray',
                                            'image' => '/images/exercises/tray.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Fries',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 2: For Here or To Go',
                        'order' => 2,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'To go',
                                    'options' => [
                                        [
                                            'text' => 'To go',
                                            'image' => '/images/exercises/to-go.png',
                                        ],
                                        [
                                            'text' => 'For here',
                                            'image' => '/images/exercises/for-here.png',
                                        ],
                                        [
                                            'text' => 'Delivery',
                                            'image' => '/images/exercises/delivery.png',
                                        ],
                                        [
                                            'text' => 'Drive-thru',
                                            'image' => '/images/exercises/drive-thru.png',
                                        ],
                                    ],
                                    'correct_answer' => 'To go',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'for',
                                        'to',
                                        'at',
                                        'in',
                                    ],
                                    'sentence' => 'Is this ____ here or to go?',
                                    'correct_answer' => 'for',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'here',
                                        'this',
                                        'for',
                                        'Is',
                                        'to',
                                        'or',
                                        'go',
                                    ],
                                    'correct_order' => [
                                        'Is',
                                        'this',
                                        'for',
                                        'here',
                                        'or',
                                        'to',
                                        'go',
                                    ],
                                    'target_sentence' => 'Is this for here or to go',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'For here, please.',
                                        'To go, please.',
                                        'I want a refund.',
                                        'Where is the exit?',
                                    ],
                                    'audio_url' => '/audio/exercises/for-here-please.mp3',
                                    'audio_text' => 'For here, please.',
                                    'correct_answer' => 'For here, please.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Take the food with you',
                                        'Eat inside the restaurant',
                                        'Order online',
                                        'Pay by card',
                                    ],
                                    'question' => 'What does "to go" mean at a fast food restaurant?',
                                    'correct_answer' => 'Take the food with you',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'here',
                                        'to go',
                                        'away',
                                        'out',
                                    ],
                                    'sentence' => 'We are eating ____ today, not taking it home.',
                                    'correct_answer' => 'here',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 3: Combo Meals & Sizes',
                        'order' => 3,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Medium',
                                    'options' => [
                                        [
                                            'text' => 'Medium',
                                            'image' => '/images/exercises/medium.png',
                                        ],
                                        [
                                            'text' => 'Small',
                                            'image' => '/images/exercises/small.png',
                                        ],
                                        [
                                            'text' => 'Large',
                                            'image' => '/images/exercises/large.png',
                                        ],
                                        [
                                            'text' => 'Extra Large',
                                            'image' => '/images/exercises/extra-large.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Medium',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'large',
                                        'larger',
                                        'largest',
                                        'largely',
                                    ],
                                    'sentence' => 'Can I have a ____ combo meal, please?',
                                    'correct_answer' => 'large',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'bigger',
                                        'This',
                                        'than',
                                        'size',
                                        'is',
                                        'that',
                                        'one',
                                    ],
                                    'correct_order' => [
                                        'This',
                                        'size',
                                        'is',
                                        'bigger',
                                        'than',
                                        'that',
                                        'one',
                                    ],
                                    'target_sentence' => 'This size is bigger than that one',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Which size would you like?',
                                        'What time do you close?',
                                        'How was your day?',
                                        'Is it raining outside?',
                                    ],
                                    'audio_url' => '/audio/exercises/which-size-would-you-like.mp3',
                                    'audio_text' => 'Which size would you like?',
                                    'correct_answer' => 'Which size would you like?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Large',
                                        'Medium',
                                        'They are the same',
                                        'Small',
                                    ],
                                    'question' => 'Which size is bigger, medium or large?',
                                    'correct_answer' => 'Large',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'combo',
                                        'I',
                                        'medium',
                                        'want',
                                        'the',
                                        'meal',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'want',
                                        'the',
                                        'medium',
                                        'combo',
                                        'meal',
                                    ],
                                    'target_sentence' => 'I want the medium combo meal',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 4: Customizing Your Order',
                        'order' => 4,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Onions',
                                    'options' => [
                                        [
                                            'text' => 'Onions',
                                            'image' => '/images/exercises/onions.png',
                                        ],
                                        [
                                            'text' => 'Pickles',
                                            'image' => '/images/exercises/pickles.png',
                                        ],
                                        [
                                            'text' => 'Ketchup',
                                            'image' => '/images/exercises/ketchup.png',
                                        ],
                                        [
                                            'text' => 'Mustard',
                                            'image' => '/images/exercises/mustard.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Onions',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'on',
                                        'in',
                                        'at',
                                        'for',
                                    ],
                                    'sentence' => 'Can I have extra cheese ____ my burger?',
                                    'correct_answer' => 'on',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'onions',
                                        'I',
                                        'want',
                                        'no',
                                        'on',
                                        'burger',
                                        'my',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'want',
                                        'no',
                                        'onions',
                                        'on',
                                        'my',
                                        'burger',
                                    ],
                                    'target_sentence' => 'I want no onions on my burger',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'No pickles, please.',
                                        'Extra cheese, please.',
                                        'For here, please.',
                                        'One moment, please.',
                                    ],
                                    'audio_url' => '/audio/exercises/no-pickles-please.mp3',
                                    'audio_text' => 'No pickles, please.',
                                    'correct_answer' => 'No pickles, please.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Can I have extra cheese, please?',
                                        'Give cheese now.',
                                        'Cheese I want.',
                                        'No cheese for me.',
                                    ],
                                    'question' => 'How do you ask for extra cheese?',
                                    'correct_answer' => 'Can I have extra cheese, please?',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Extra cheese, please.',
                                        'No onions, please.',
                                        'For here, please.',
                                        'To go, please.',
                                    ],
                                    'audio_url' => '/audio/exercises/extra-cheese-please.mp3',
                                    'audio_text' => 'Extra cheese, please.',
                                    'correct_answer' => 'Extra cheese, please.',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 5: Drinks & Sides',
                        'order' => 5,
                        'exercises' => [
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Milkshake',
                                    'options' => [
                                        [
                                            'text' => 'Milkshake',
                                            'image' => '/images/exercises/milkshake.png',
                                        ],
                                        [
                                            'text' => 'Soda',
                                            'image' => '/images/exercises/soda.png',
                                        ],
                                        [
                                            'text' => 'Water',
                                            'image' => '/images/exercises/water.png',
                                        ],
                                        [
                                            'text' => 'Juice',
                                            'image' => '/images/exercises/juice.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Milkshake',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'many',
                                        'much',
                                        'few',
                                        'little',
                                    ],
                                    'sentence' => 'How ____ fries would you like?',
                                    'correct_answer' => 'many',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'soda',
                                        'I',
                                        'large',
                                        'would',
                                        'a',
                                        'like',
                                    ],
                                    'correct_order' => [
                                        'I',
                                        'would',
                                        'like',
                                        'a',
                                        'large',
                                        'soda',
                                    ],
                                    'target_sentence' => 'I would like a large soda',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'Would you like a drink with that?',
                                        'What is your name?',
                                        'Where do you live?',
                                        'How old are you?',
                                    ],
                                    'audio_url' => '/audio/exercises/would-you-like-a-drink-with-that.mp3',
                                    'audio_text' => 'Would you like a drink with that?',
                                    'correct_answer' => 'Would you like a drink with that?',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'much',
                                        'many',
                                        'a',
                                        'two',
                                    ],
                                    'question' => 'Which word do we use with "water" because it\'s uncountable?',
                                    'correct_answer' => 'much',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Fries',
                                        'A car',
                                        'A book',
                                        'A shirt',
                                    ],
                                    'question' => 'What can you order as a side dish?',
                                    'correct_answer' => 'Fries',
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Lesson 6: Paying & Getting Your Order',
                        'order' => 6,
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
                                            'text' => 'Tray',
                                            'image' => '/images/exercises/tray.png',
                                        ],
                                        [
                                            'text' => 'Straw',
                                            'image' => '/images/exercises/straw.png',
                                        ],
                                        [
                                            'text' => 'Napkin',
                                            'image' => '/images/exercises/napkin.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Receipt',
                                ],
                            ],
                            [
                                'type' => 'fill_blank',
                                'data' => [
                                    'options' => [
                                        'Would',
                                        'Is',
                                        'Do',
                                        'Are',
                                    ],
                                    'sentence' => '____ you like anything else?',
                                    'correct_answer' => 'Would',
                                ],
                            ],
                            [
                                'type' => 'tap_word',
                                'data' => [
                                    'words' => [
                                        'order',
                                        'Here',
                                        'your',
                                        'is',
                                    ],
                                    'correct_order' => [
                                        'Here',
                                        'is',
                                        'your',
                                        'order',
                                    ],
                                    'target_sentence' => 'Here is your order',
                                ],
                            ],
                            [
                                'type' => 'listen_select',
                                'data' => [
                                    'options' => [
                                        'That will be five dollars.',
                                        'Here is your order.',
                                        'Would you like anything else?',
                                        'Enjoy your meal!',
                                    ],
                                    'audio_url' => '/audio/exercises/that-will-be-five-dollars.mp3',
                                    'audio_text' => 'That will be five dollars.',
                                    'correct_answer' => 'That will be five dollars.',
                                ],
                            ],
                            [
                                'type' => 'multiple_choice',
                                'data' => [
                                    'options' => [
                                        'Here you go!',
                                        'Give me that.',
                                        'I am hungry.',
                                        'Where is it?',
                                    ],
                                    'question' => 'What do you say when you give someone their food?',
                                    'correct_answer' => 'Here you go!',
                                ],
                            ],
                            [
                                'type' => 'match_pairs',
                                'data' => [
                                    'word' => 'Tray',
                                    'options' => [
                                        [
                                            'text' => 'Tray',
                                            'image' => '/images/exercises/tray.png',
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
                                            'text' => 'Cup',
                                            'image' => '/images/exercises/cup.png',
                                        ],
                                    ],
                                    'correct_answer' => 'Tray',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
