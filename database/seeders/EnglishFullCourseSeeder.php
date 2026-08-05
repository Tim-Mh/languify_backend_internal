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

class EnglishFullCourseSeeder extends Seeder
{
    /**
     * Seeds all 4 chapters for English with units, lessons and exercises.
     * Beginner's "Unit 1: Greetings & Basics" is left untouched (seeded by
     * EnglishBeginnerContentSeeder) — this only adds the remaining units.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        foreach ($this->courseData() as $chapterKey => $chapterDef) {
            $chapter = Chapter::firstOrCreate(
                ['language_id' => $english->id, 'chapter_key' => $chapterKey],
                ['title' => $chapterDef['title'], 'order_number' => $chapterDef['order']]
            );

            foreach ($chapterDef['units'] as $unitDef) {
                $unit = Unit::firstOrCreate(
                    ['chapter_id' => $chapter->id, 'title' => $unitDef['title']],
                    ['order_number' => $unitDef['order']]
                );

                foreach ($unitDef['lessons'] as $lessonDef) {
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
        }
    }

    private function courseData(): array
    {
        return [
            ChapterKey::Beginner->value => [
                'title' => 'Beginner',
                'order' => 1,
                'units' => [
                    [
                        'title' => 'Unit 2: Numbers & Colors',
                        'order' => 2,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Counting Basics',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Red', ['Red', 'Blue', 'Green', 'Yellow'], 'Red'),
                                    $this->fillBlank('I have ____ apples.', ['three', 'third', 'threes', 'tree'], 'three'),
                                    $this->tapWord('I have two cats', ['cats', 'I', 'two', 'have'], ['I', 'have', 'two', 'cats']),
                                    $this->listenSelect('Blue', ['Blue', 'Red', 'Green', 'Yellow']),
                                    $this->multipleChoice('What does "five" mean?', ['The number 5', 'The number 4', 'A color', 'A fruit'], 'The number 5'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Shapes & Colors',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Green', ['Green', 'Red', 'Black', 'White'], 'Green'),
                                    $this->fillBlank('The sky is ____.', ['blue', 'blues', 'blueing', 'blued'], 'blue'),
                                    $this->tapWord('This is a big circle', ['circle', 'This', 'big', 'is', 'a'], ['This', 'is', 'a', 'big', 'circle']),
                                    $this->listenSelect('Yellow', ['Yellow', 'Purple', 'Orange', 'Pink']),
                                    $this->multipleChoice('What does "black" mean?', ['A dark color', 'A number', 'A shape', 'A fruit'], 'A dark color'),
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Unit 3: Family & People',
                        'order' => 3,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Family Members',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Mother', ['Mother', 'Father', 'Sister', 'Brother'], 'Mother'),
                                    $this->fillBlank('This is my ____.', ['father', 'fathers', 'fathering', 'fathered'], 'father'),
                                    $this->tapWord('She is my sister', ['sister', 'She', 'my', 'is'], ['She', 'is', 'my', 'sister']),
                                    $this->listenSelect('Brother', ['Brother', 'Sister', 'Mother', 'Father']),
                                    $this->multipleChoice('What does "family" mean?', ['A group of related people', 'A type of food', 'A color', 'A number'], 'A group of related people'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: People Around Us',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Friend', ['Friend', 'Teacher', 'Doctor', 'Neighbor'], 'Friend'),
                                    $this->fillBlank('He is my best ____.', ['friend', 'friends', 'friending', 'friended'], 'friend'),
                                    $this->tapWord('My teacher is kind', ['kind', 'My', 'teacher', 'is'], ['My', 'teacher', 'is', 'kind']),
                                    $this->listenSelect('Doctor', ['Doctor', 'Teacher', 'Friend', 'Neighbor']),
                                    $this->multipleChoice('What does "neighbor" mean?', ['Someone who lives near you', 'A type of food', 'A number', 'A color'], 'Someone who lives near you'),
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            ChapterKey::Conversation->value => [
                'title' => 'Conversation',
                'order' => 2,
                'units' => [
                    [
                        'title' => 'Unit 1: Introducing Yourself',
                        'order' => 1,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Basic Introductions',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Name', ['Name', 'Age', 'City', 'Country'], 'Name'),
                                    $this->fillBlank('My name ____ Ali.', ['is', 'are', 'am', 'be'], 'is'),
                                    $this->tapWord('My name is Sara', ['Sara', 'My', 'name', 'is'], ['My', 'name', 'is', 'Sara']),
                                    $this->listenSelect('Nice to meet you', ['Nice to meet you', 'Good morning', 'See you later', 'Thank you']),
                                    $this->multipleChoice('What does "nice to meet you" mean?', ['A greeting when you meet someone', 'A goodbye phrase', 'A question', 'A number'], 'A greeting when you meet someone'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Talking About Yourself',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Age', ['Age', 'Job', 'Hobby', 'Home'], 'Age'),
                                    $this->fillBlank('I ____ from Pakistan.', ['am', 'is', 'are', 'be'], 'am'),
                                    $this->tapWord('I am twenty years old', ['old', 'I', 'am', 'twenty', 'years'], ['I', 'am', 'twenty', 'years', 'old']),
                                    $this->listenSelect('I am a student', ['I am a student', 'I am a teacher', 'I am a doctor', 'I am a driver']),
                                    $this->multipleChoice('What does "hobby" mean?', ['An activity you enjoy', 'A type of job', 'A place', 'A number'], 'An activity you enjoy'),
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Unit 2: Asking Questions',
                        'order' => 2,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Simple Questions',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Where', ['Where', 'When', 'Who', 'What'], 'Where'),
                                    $this->fillBlank('____ are you from?', ['Where', 'What', 'Who', 'Why'], 'Where'),
                                    $this->tapWord('What is your name', ['name', 'What', 'your', 'is'], ['What', 'is', 'your', 'name']),
                                    $this->listenSelect('How are you?', ['How are you?', 'What is this?', 'Where are you?', 'Who are you?']),
                                    $this->multipleChoice('What does "how" ask about?', ['Manner or condition', 'A place', 'A time', 'A person'], 'Manner or condition'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Answering Questions',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Yes', ['Yes', 'No', 'Maybe', 'Sure'], 'Yes'),
                                    $this->fillBlank('____ I am fine.', ['Yes', 'No', 'Not', 'Never'], 'Yes'),
                                    $this->tapWord('I am doing well', ['well', 'I', 'am', 'doing'], ['I', 'am', 'doing', 'well']),
                                    $this->listenSelect("I don't know", ["I don't know", 'I am here', 'I like it', 'I am busy']),
                                    $this->multipleChoice('What does "maybe" mean?', ['Possibly', 'Definitely', 'Never', 'Always'], 'Possibly'),
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Unit 3: Making Plans',
                        'order' => 3,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Suggesting Activities',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Movie', ['Movie', 'Park', 'Cafe', 'Gym'], 'Movie'),
                                    $this->fillBlank("Let's go to the ____.", ['park', 'parks', 'parking', 'parked'], 'park'),
                                    $this->tapWord("Let's watch a movie", ['movie', "Let's", 'a', 'watch'], ["Let's", 'watch', 'a', 'movie']),
                                    $this->listenSelect('Do you want to come?', ['Do you want to come?', 'I am busy today', 'See you tomorrow', 'Thank you']),
                                    $this->multipleChoice('What does "let\'s" mean?', ['Let us (a suggestion)', 'A question', 'A goodbye', 'A name'], 'Let us (a suggestion)'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Confirming Plans',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Tomorrow', ['Tomorrow', 'Today', 'Yesterday', 'Tonight'], 'Tomorrow'),
                                    $this->fillBlank('See you ____.', ['tomorrow', 'tomorrows', 'tomorrowing', 'tomorrowed'], 'tomorrow'),
                                    $this->tapWord('I will see you soon', ['soon', 'I', 'will', 'see', 'you'], ['I', 'will', 'see', 'you', 'soon']),
                                    $this->listenSelect('That sounds great', ['That sounds great', 'I am not sure', 'Maybe later', 'No thanks']),
                                    $this->multipleChoice('What does "sounds great" mean?', ['That seems like a good idea', 'That is loud', 'That is a song', 'That is wrong'], 'That seems like a good idea'),
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            ChapterKey::Restaurant->value => [
                'title' => 'Restaurant',
                'order' => 3,
                'units' => [
                    [
                        'title' => 'Unit 1: Ordering Food',
                        'order' => 1,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: At the Table',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Menu', ['Menu', 'Plate', 'Fork', 'Spoon'], 'Menu'),
                                    $this->fillBlank('Can I see the ____?', ['menu', 'menus', 'menuing', 'menued'], 'menu'),
                                    $this->tapWord('I would like a pizza', ['pizza', 'I', 'would', 'like', 'a'], ['I', 'would', 'like', 'a', 'pizza']),
                                    $this->listenSelect('I am ready to order', ['I am ready to order', 'The food is cold', 'I want water', 'Thank you']),
                                    $this->multipleChoice('What does "menu" mean?', ['A list of food you can order', 'A type of plate', 'A drink', 'A table'], 'A list of food you can order'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Choosing a Dish',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Chicken', ['Chicken', 'Beef', 'Fish', 'Rice'], 'Chicken'),
                                    $this->fillBlank('I will have the ____ soup.', ['chicken', 'chickens', 'chickening', 'chickened'], 'chicken'),
                                    $this->tapWord('This soup is delicious', ['delicious', 'This', 'soup', 'is'], ['This', 'soup', 'is', 'delicious']),
                                    $this->listenSelect('What do you recommend?', ['What do you recommend?', 'The bill please', 'I am full', 'Water please']),
                                    $this->multipleChoice('What does "delicious" mean?', ['Very tasty', 'Very cold', 'Very expensive', 'Very small'], 'Very tasty'),
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
                                    $this->matchPairs('Price', ['Price', 'Dessert', 'Drink', 'Starter'], 'Price'),
                                    $this->fillBlank('How much does this ____?', ['cost', 'costs', 'costing', 'costed'], 'cost'),
                                    $this->tapWord('This dish is very cheap', ['cheap', 'This', 'dish', 'is', 'very'], ['This', 'dish', 'is', 'very', 'cheap']),
                                    $this->listenSelect('It is on the house', ['It is on the house', 'It is very expensive', 'It is not available', 'It is spicy']),
                                    $this->multipleChoice('What does "expensive" mean?', ['Costs a lot of money', 'Costs very little', 'Tastes bad', 'Tastes good'], 'Costs a lot of money'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Special Requests',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Spicy', ['Spicy', 'Sweet', 'Sour', 'Salty'], 'Spicy'),
                                    $this->fillBlank("I don't want it too ____.", ['spicy', 'spicier', 'spiciest', 'spiciness'], 'spicy'),
                                    $this->tapWord('Please make it less sweet', ['sweet', 'Please', 'make', 'it', 'less'], ['Please', 'make', 'it', 'less', 'sweet']),
                                    $this->listenSelect('No onions please', ['No onions please', 'Extra cheese please', 'More rice please', 'Less salt please']),
                                    $this->multipleChoice('What does "without" mean?', ['Not including', 'Including extra', 'Very much', 'A little'], 'Not including'),
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
                                    $this->matchPairs('Bill', ['Bill', 'Cash', 'Card', 'Tip'], 'Bill'),
                                    $this->fillBlank('Can we get the ____, please?', ['bill', 'bills', 'billing', 'billed'], 'bill'),
                                    $this->tapWord('Can I pay by card', ['card', 'Can', 'I', 'pay', 'by'], ['Can', 'I', 'pay', 'by', 'card']),
                                    $this->listenSelect('Keep the change', ['Keep the change', 'Where is the exit?', 'This is cold', 'I need a fork']),
                                    $this->multipleChoice('What does "tip" mean?', ['Extra money for good service', 'The total bill', 'A discount', 'A type of food'], 'Extra money for good service'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Splitting the Bill',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Split', ['Split', 'Share', 'Pay', 'Divide'], 'Split'),
                                    $this->fillBlank("Let's ____ the bill.", ['split', 'splits', 'splitting', 'splitted'], 'split'),
                                    $this->tapWord('We will pay separately', ['separately', 'We', 'will', 'pay'], ['We', 'will', 'pay', 'separately']),
                                    $this->listenSelect('I will pay for everyone', ['I will pay for everyone', "Let's split it", 'I forgot my wallet', 'Thank you for dinner']),
                                    $this->multipleChoice('What does "separately" mean?', ['Each person pays their own part', 'Everyone pays the same', 'One person pays all', 'No one pays'], 'Each person pays their own part'),
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            ChapterKey::Supermarket->value => [
                'title' => 'Supermarket',
                'order' => 4,
                'units' => [
                    [
                        'title' => 'Unit 1: Finding Items',
                        'order' => 1,
                        'lessons' => [
                            [
                                'title' => 'Lesson 1: Asking for Help',
                                'order' => 1,
                                'exercises' => [
                                    $this->matchPairs('Aisle', ['Aisle', 'Shelf', 'Basket', 'Cart'], 'Aisle'),
                                    $this->fillBlank('Where can I find the ____?', ['milk', 'milks', 'milking', 'milked'], 'milk'),
                                    $this->tapWord('Excuse me, where is the bread', ['bread', 'Excuse', 'me', 'where', 'is', 'the'], ['Excuse', 'me', 'where', 'is', 'the', 'bread']),
                                    $this->listenSelect("It's in aisle three", ["It's in aisle three", "We don't have that", "It's over there", 'Check the shelf']),
                                    $this->multipleChoice('What does "aisle" mean?', ['A passage between shelves in a store', 'A type of food', 'A cash register', 'A shopping bag'], 'A passage between shelves in a store'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Shopping List',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('List', ['List', 'Cart', 'Receipt', 'Coupon'], 'List'),
                                    $this->fillBlank('I need to buy some ____.', ['eggs', 'egg', 'eggses', 'egged'], 'eggs'),
                                    $this->tapWord('I forgot my shopping list', ['list', 'I', 'forgot', 'my', 'shopping'], ['I', 'forgot', 'my', 'shopping', 'list']),
                                    $this->listenSelect('Do you have a cart?', ['Do you have a cart?', 'This is expensive', 'I need a bag', 'Where is the exit?']),
                                    $this->multipleChoice('What does "shopping list" mean?', ['A list of things to buy', 'A list of prices', 'A type of basket', 'A store name'], 'A list of things to buy'),
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
                                    $this->matchPairs('Apple', ['Apple', 'Banana', 'Orange', 'Grapes'], 'Apple'),
                                    $this->fillBlank('I would like two ____.', ['apples', 'apple', 'applies', 'appled'], 'apples'),
                                    $this->tapWord('These bananas look fresh', ['fresh', 'These', 'bananas', 'look'], ['These', 'bananas', 'look', 'fresh']),
                                    $this->listenSelect('Are these oranges sweet?', ['Are these oranges sweet?', 'How much is this bag?', 'I need a basket', 'Where is the exit?']),
                                    $this->multipleChoice('What does "fresh" mean?', ['Recently picked, not old', 'Very old', 'Very cheap', 'Very expensive'], 'Recently picked, not old'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Common Vegetables',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Carrot', ['Carrot', 'Potato', 'Onion', 'Tomato'], 'Carrot'),
                                    $this->fillBlank('Can I have a kilo of ____?', ['potatoes', 'potato', 'potatos', 'potatoed'], 'potatoes'),
                                    $this->tapWord('I need some fresh tomatoes', ['tomatoes', 'I', 'need', 'some', 'fresh'], ['I', 'need', 'some', 'fresh', 'tomatoes']),
                                    $this->listenSelect('These onions are cheap', ['These onions are cheap', 'This is too spicy', 'I want a receipt', 'Where is the milk?']),
                                    $this->multipleChoice('What does "vegetable" mean?', ['A plant food like carrot or potato', 'A type of meat', 'A type of fruit', 'A drink'], 'A plant food like carrot or potato'),
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
                                    $this->matchPairs('Cashier', ['Cashier', 'Receipt', 'Bag', 'Trolley'], 'Cashier'),
                                    $this->fillBlank('Please put it in a ____.', ['bag', 'bags', 'bagging', 'bagged'], 'bag'),
                                    $this->tapWord('Do you accept credit cards', ['cards', 'Do', 'you', 'accept', 'credit'], ['Do', 'you', 'accept', 'credit', 'cards']),
                                    $this->listenSelect('That will be ten dollars', ['That will be ten dollars', 'Do you have a bag?', 'Thank you, come again', 'Here is your receipt']),
                                    $this->multipleChoice('What does "cashier" mean?', ['The person who takes your payment', 'The person who packs bags', 'A type of trolley', 'A type of coupon'], 'The person who takes your payment'),
                                ],
                            ],
                            [
                                'title' => 'Lesson 2: Using Discounts',
                                'order' => 2,
                                'exercises' => [
                                    $this->matchPairs('Discount', ['Discount', 'Coupon', 'Sale', 'Receipt'], 'Discount'),
                                    $this->fillBlank('This item is on ____.', ['sale', 'sales', 'saling', 'saled'], 'sale'),
                                    $this->tapWord('I have a discount coupon', ['coupon', 'I', 'have', 'a', 'discount'], ['I', 'have', 'a', 'discount', 'coupon']),
                                    $this->listenSelect('This is fifty percent off', ['This is fifty percent off', 'This is the full price', "I don't have a coupon", 'The store is closed']),
                                    $this->multipleChoice('What does "discount" mean?', ['A reduction in price', 'An increase in price', 'A type of bag', 'A type of card'], 'A reduction in price'),
                                ],
                            ],
                        ],
                    ],
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
