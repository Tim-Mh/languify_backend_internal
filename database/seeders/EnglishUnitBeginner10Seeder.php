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

class EnglishUnitBeginner10Seeder extends Seeder
{
    /**
     * Seeds "Unit 10: Basic Grammar: Plurals & Articles" into the existing
     * English Beginner chapter — 6 lessons x 6 exercises covering
     * singular/plural nouns, a/an/the, and this/that/these/those.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 10: Basic Grammar: Plurals & Articles'],
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
                'title' => 'Lesson 1: One Book, Two Books (Regular Plurals)',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Books', ['Books', 'Pens', 'Cups', 'Bags'], 'Books'),
                    $this->fillBlank('I have two ____.', ['books', 'book', 'bookes', 'booking'], 'books'),
                    $this->fillBlank('She has three ____.', ['boxes', 'box', 'boxs', 'boxies'], 'boxes'),
                    $this->tapWord('I have two books', ['books', 'I', 'two', 'have'], ['I', 'have', 'two', 'books']),
                    $this->listenSelect('The boxes are heavy', ['The boxes are heavy', 'The box is heavy', 'The boxes is heavy', 'The box are heavy']),
                    $this->multipleChoice('How do you make "bus" plural?', ['buses', 'bus', 'buss', 'busies'], 'buses'),
                ],
            ],
            [
                'title' => 'Lesson 2: Irregular Plural Nouns',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Children', ['Children', 'Men', 'Women', 'People'], 'Children'),
                    $this->fillBlank('Three ____ are playing in the park.', ['children', 'childs', 'childrens', 'child'], 'children'),
                    $this->tapWord('The men are working', ['working', 'The', 'men', 'are'], ['The', 'men', 'are', 'working']),
                    $this->tapWord('Two women are talking', ['talking', 'Two', 'women', 'are'], ['Two', 'women', 'are', 'talking']),
                    $this->listenSelect('The children are happy', ['The children are happy', 'The childs are happy', 'The child are happy', 'The children is happy']),
                    $this->multipleChoice('What is the plural of "mouse"?', ['mice', 'mouses', 'mices', 'mouse'], 'mice'),
                ],
            ],
            [
                'title' => 'Lesson 3: Using A and An',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Egg', ['Egg', 'Ball', 'Cup', 'Dog'], 'Egg'),
                    $this->fillBlank('I saw ____ elephant at the zoo.', ['an', 'a', 'the', 'some'], 'an'),
                    $this->tapWord('She has an umbrella', ['umbrella', 'She', 'an', 'has'], ['She', 'has', 'an', 'umbrella']),
                    $this->listenSelect('He is an honest man', ['He is an honest man', 'He is a honest man', 'He is an honesty man', 'He is the honest man']),
                    $this->multipleChoice('Which article goes before "hour"?', ['an', 'a', 'the', 'no article'], 'an'),
                    $this->multipleChoice('Which article goes before "book"?', ['a', 'an', 'the', 'no article'], 'a'),
                ],
            ],
            [
                'title' => 'Lesson 4: Using The (Definite Article)',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Sun', ['Sun', 'Moon', 'Star', 'Sky'], 'Sun'),
                    $this->matchPairs('Moon', ['Moon', 'Sun', 'Cloud', 'Star'], 'Moon'),
                    $this->fillBlank('____ sun is very bright today.', ['The', 'A', 'An', 'Some'], 'The'),
                    $this->tapWord('The moon is bright tonight', ['bright', 'The', 'moon', 'is', 'tonight'], ['The', 'moon', 'is', 'bright', 'tonight']),
                    $this->listenSelect('Please close the door', ['Please close the door', 'Please close a door', 'Please close an door', 'Please close doors']),
                    $this->multipleChoice('When do we use "the"?', ['When we talk about a specific thing', 'When we talk about any one thing', 'Before plural nouns only', 'Before names only'], 'When we talk about a specific thing'),
                ],
            ],
            [
                'title' => 'Lesson 5: This and That (Singular Demonstratives)',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('This', ['This', 'That', 'These', 'Those'], 'This'),
                    $this->fillBlank('____ is my book.', ['This', 'That', 'These', 'Those'], 'This'),
                    $this->tapWord('That is your car', ['car', 'That', 'is', 'your'], ['That', 'is', 'your', 'car']),
                    $this->listenSelect('This is my phone', ['This is my phone', 'That is my phone', 'These are my phones', 'Those are my phones']),
                    $this->listenSelect('That is her house', ['That is her house', 'This is her house', 'Those are her houses', 'These are her houses']),
                    $this->multipleChoice('Which word do we use for something far away (singular)?', ['That', 'This', 'These', 'Those'], 'That'),
                ],
            ],
            [
                'title' => 'Lesson 6: These and Those (Plural Demonstratives)',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('These', ['These', 'Those', 'This', 'That'], 'These'),
                    $this->fillBlank('____ are my shoes.', ['These', 'Those', 'This', 'That'], 'These'),
                    $this->tapWord('These are my friends', ['friends', 'These', 'are', 'my'], ['These', 'are', 'my', 'friends']),
                    $this->tapWord('Those are their cars', ['cars', 'Those', 'are', 'their'], ['Those', 'are', 'their', 'cars']),
                    $this->listenSelect('Those are beautiful flowers', ['Those are beautiful flowers', 'These are beautiful flowers', 'That is a beautiful flower', 'This is a beautiful flower']),
                    $this->multipleChoice('Which word do we use for things far away (plural)?', ['Those', 'These', 'That', 'This'], 'Those'),
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
