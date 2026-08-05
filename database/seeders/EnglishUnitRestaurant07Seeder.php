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

class EnglishUnitRestaurant07Seeder extends Seeder
{
    /**
     * Seeds "Unit 7: Drinks & Beverages" under the existing Restaurant chapter,
     * with 6 lessons x 6 exercises covering ordering drinks, hot/cold beverages
     * and still-vs-sparkling water.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 7: Drinks & Beverages'],
            ['order_number' => 7]
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
                'title' => 'Lesson 1: Hot Beverages',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Coffee', ['Coffee', 'Tea', 'Juice', 'Water'], 'Coffee'),
                    $this->fillBlank('Can I have a cup of ____, please?', ['tea', 'teas', 'teaing', 'teach'], 'tea'),
                    $this->tapWord('The coffee is very hot', ['hot', 'The', 'coffee', 'is', 'very'], ['The', 'coffee', 'is', 'very', 'hot']),
                    $this->listenSelect('Hot chocolate', ['Hot chocolate', 'Iced tea', 'Orange juice', 'Sparkling water']),
                    $this->multipleChoice('What is "hot chocolate"?', ['A warm sweet drink made with cocoa', 'A cold fruit drink', 'A type of tea', 'A fizzy drink'], 'A warm sweet drink made with cocoa'),
                    $this->matchPairs('Tea', ['Tea', 'Coffee', 'Milk', 'Cocoa'], 'Tea'),
                ],
            ],
            [
                'title' => 'Lesson 2: Cold Beverages',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Juice', ['Juice', 'Soda', 'Milk', 'Coffee'], 'Juice'),
                    $this->fillBlank('This lemonade is very ____.', ['cold', 'colder', 'coldest', 'coldly'], 'cold'),
                    $this->tapWord('I like cold orange juice', ['juice', 'I', 'cold', 'like', 'orange'], ['I', 'like', 'cold', 'orange', 'juice']),
                    $this->listenSelect('Iced tea', ['Iced tea', 'Hot tea', 'Coffee', 'Milk']),
                    $this->multipleChoice('Which drink is usually served cold?', ['Lemonade', 'Hot chocolate', 'Hot coffee', 'Hot tea'], 'Lemonade'),
                    $this->fillBlank('Can I have a glass of ____ water, please?', ['cold', 'colds', 'colding', 'coldness'], 'cold'),
                ],
            ],
            [
                'title' => 'Lesson 3: Still or Sparkling Water',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Sparkling', ['Sparkling', 'Still', 'Warm', 'Sweet'], 'Sparkling'),
                    $this->fillBlank('Would you like still or ____ water?', ['sparkling', 'sparkle', 'sparkles', 'sparkly'], 'sparkling'),
                    $this->tapWord('Still or sparkling water', ['water', 'Still', 'sparkling', 'or'], ['Still', 'or', 'sparkling', 'water']),
                    $this->listenSelect('Still water, please', ['Still water, please', 'Sparkling water, please', 'Hot tea, please', 'Orange juice, please']),
                    $this->multipleChoice('What does "sparkling water" mean?', ['Water with bubbles', 'Water that is very cold', 'Water with sugar', 'Water with milk'], 'Water with bubbles'),
                    $this->tapWord('Do you want still water', ['want', 'Do', 'still', 'you', 'water'], ['Do', 'you', 'want', 'still', 'water']),
                ],
            ],
            [
                'title' => 'Lesson 4: Ordering Drinks at a Cafe',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Menu', ['Menu', 'Bill', 'Waiter', 'Table'], 'Menu'),
                    $this->fillBlank("I'd like ____ coffee, please.", ['a', 'an', 'some', 'many'], 'a'),
                    $this->tapWord('Could I have a glass of water', ['water', 'Could', 'I', 'have', 'a', 'glass', 'of'], ['Could', 'I', 'have', 'a', 'glass', 'of', 'water']),
                    $this->listenSelect('Could I have the menu, please?', ['Could I have the menu, please?', 'Could I have the bill, please?', 'Where is the toilet?', 'What time is it?']),
                    $this->multipleChoice('Which sentence is a polite way to order a drink?', ["I'd like a cup of tea, please.", 'Give me tea.', 'Tea now.', 'I want tea now.'], "I'd like a cup of tea, please."),
                    $this->listenSelect("I'd like an orange juice, please", ["I'd like an orange juice, please", "I'd like a hot tea, please", "I'd like the bill, please", "I'd like a table, please"]),
                ],
            ],
            [
                'title' => 'Lesson 5: Drink Sizes & Quantities',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Bottle', ['Bottle', 'Cup', 'Glass', 'Jug'], 'Bottle'),
                    $this->fillBlank('I would like a ____ coffee, not a small one.', ['large', 'larger', 'largest', 'largely'], 'large'),
                    $this->tapWord('She ordered a large orange juice', ['juice', 'She', 'a', 'ordered', 'large', 'orange'], ['She', 'ordered', 'a', 'large', 'orange', 'juice']),
                    $this->listenSelect('A bottle of sparkling water', ['A bottle of sparkling water', 'A cup of hot tea', 'A glass of milk', 'A can of soda']),
                    $this->multipleChoice('Which is the correct order: small, medium, ____?', ['large', 'larger', 'largest', 'more large'], 'large'),
                    $this->multipleChoice('What container do we usually use for tea?', ['A cup', 'A bottle', 'A can', 'A jug'], 'A cup'),
                ],
            ],
            [
                'title' => 'Lesson 6: Asking About Drinks & Making Choices',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Sweet', ['Sweet', 'Sour', 'Bitter', 'Fresh'], 'Sweet'),
                    $this->fillBlank('Which drink is ____, the lemonade or the orange juice?', ['sweeter', 'sweetest', 'sweet', 'sweetly'], 'sweeter'),
                    $this->tapWord('Is this juice sweeter than that one', ['than', 'Is', 'this', 'juice', 'sweeter', 'one', 'that'], ['Is', 'this', 'juice', 'sweeter', 'than', 'that', 'one']),
                    $this->listenSelect('Which one do you prefer?', ['Which one do you prefer?', 'How much is it?', 'Where is the cafe?', 'What time is it?']),
                    $this->multipleChoice('What does "prefer" mean?', ['To like one thing more than another', 'To dislike something', 'To drink quickly', 'To pay for something'], 'To like one thing more than another'),
                    $this->fillBlank('This tea is the ____ drink on the menu.', ['sweetest', 'sweeter', 'sweet', 'sweetness'], 'sweetest'),
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
