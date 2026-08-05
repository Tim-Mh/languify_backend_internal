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

class EnglishUnitBeginner06Seeder extends Seeder
{
    /**
     * Seeds "Unit 6: Adjectives & Descriptions" (Beginner chapter) with
     * 6 lessons x 6 exercises covering describing people/objects,
     * adjective order and opposites.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();
        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 6: Adjectives & Descriptions'],
            ['order_number' => 6]
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
                'title' => 'Lesson 1: Describing People\'s Appearance',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Tall', ['Tall', 'Short', 'Heavy', 'Thin'], 'Tall'),
                    $this->fillBlank('My grandfather is very ____.', ['old', 'older', 'oldest', 'olden'], 'old'),
                    $this->tapWord('She has curly hair', ['hair', 'She', 'has', 'curly'], ['She', 'has', 'curly', 'hair']),
                    $this->listenSelect('He is a tall man', ['He is a tall man', 'He is a short man', 'He is a young man', 'He is a thin man']),
                    $this->multipleChoice('What does "handsome" mean?', ['Attractive (for a man)', 'Very old', 'Very short', 'Very heavy'], 'Attractive (for a man)'),
                    $this->matchPairs('Young', ['Young', 'Old', 'Tall', 'Short'], 'Young'),
                ],
            ],
            [
                'title' => 'Lesson 2: Describing Objects (Size and Shape)',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Round', ['Round', 'Square', 'Big', 'Small'], 'Round'),
                    $this->fillBlank('This box is very ____.', ['heavy', 'heavier', 'heaviest', 'heaving'], 'heavy'),
                    $this->tapWord('The table is very wide', ['wide', 'The', 'table', 'is', 'very'], ['The', 'table', 'is', 'very', 'wide']),
                    $this->listenSelect('That is a small box', ['That is a small box', 'That is a big box', 'That is a round box', 'That is a heavy box']),
                    $this->multipleChoice('What does "narrow" mean?', ['Not wide', 'Very wide', 'Very tall', 'Very short'], 'Not wide'),
                    $this->fillBlank('The street is too ____ for two cars.', ['narrow', 'narrower', 'narrowest', 'narrowly'], 'narrow'),
                ],
            ],
            [
                'title' => 'Lesson 3: Opposites (Antonyms)',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Hot', ['Hot', 'Cold', 'Warm', 'Cool'], 'Hot'),
                    $this->fillBlank('The opposite of "fast" is ____.', ['slow', 'slower', 'slowest', 'slowly'], 'slow'),
                    $this->tapWord('The soup is very hot', ['hot', 'The', 'soup', 'is', 'very'], ['The', 'soup', 'is', 'very', 'hot']),
                    $this->listenSelect('This test is easy', ['This test is easy', 'This test is difficult', 'This test is long', 'This test is short']),
                    $this->multipleChoice('What is the opposite of "happy"?', ['Sad', 'Angry', 'Tired', 'Bored'], 'Sad'),
                    $this->tapWord('This exercise is not difficult', ['difficult', 'This', 'exercise', 'is', 'not'], ['This', 'exercise', 'is', 'not', 'difficult']),
                ],
            ],
            [
                'title' => 'Lesson 4: Adjective Order',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Old', ['Old', 'New', 'Wooden', 'Round'], 'Old'),
                    $this->fillBlank('I bought a nice ____ car.', ['red', 'reddish', 'redder', 'reddened'], 'red'),
                    $this->tapWord('She has a big black dog', ['dog', 'She', 'has', 'a', 'big', 'black'], ['She', 'has', 'a', 'big', 'black', 'dog']),
                    $this->listenSelect('He has a small brown bag', ['He has a small brown bag', 'He has a brown small bag', 'He has a bag, small and brown', 'He has small a brown bag']),
                    $this->multipleChoice('Which sentence has the correct adjective order?', ['A big old house', 'An old big house', 'A house big old', 'A house old big'], 'A big old house'),
                    $this->listenSelect('They live in a beautiful small white house', ['They live in a beautiful small white house', 'They live in a small beautiful white house', 'They live in a white small beautiful house', 'They live in a house beautiful small white']),
                ],
            ],
            [
                'title' => 'Lesson 5: Comparative Adjectives',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Taller', ['Taller', 'Shorter', 'Faster', 'Slower'], 'Taller'),
                    $this->fillBlank('My brother is ____ than me.', ['taller', 'tall', 'tallest', 'tallness'], 'taller'),
                    $this->tapWord('This car is faster than that one', ['one', 'This', 'car', 'is', 'faster', 'than', 'that'], ['This', 'car', 'is', 'faster', 'than', 'that', 'one']),
                    $this->listenSelect('Today is colder than yesterday', ['Today is colder than yesterday', 'Today is warmer than yesterday', 'Today is the coldest day', 'Yesterday was cold too']),
                    $this->multipleChoice('What is the comparative form of "good"?', ['Better', 'Gooder', 'Goodest', 'More good'], 'Better'),
                    $this->multipleChoice('What is the comparative form of "beautiful"?', ['More beautiful', 'Beautifuller', 'Beautifulest', 'Most beautiful'], 'More beautiful'),
                ],
            ],
            [
                'title' => 'Lesson 6: Personality and Character',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Kind', ['Kind', 'Rude', 'Lazy', 'Shy'], 'Kind'),
                    $this->fillBlank('My teacher is very ____ and helpful.', ['friendly', 'friendlier', 'friendliest', 'friendliness'], 'friendly'),
                    $this->tapWord('He is always honest with everyone', ['everyone', 'He', 'is', 'always', 'honest', 'with'], ['He', 'is', 'always', 'honest', 'with', 'everyone']),
                    $this->listenSelect('She is a very funny person', ['She is a very funny person', 'She is a very serious person', 'She is a very quiet person', 'She is a very lazy person']),
                    $this->multipleChoice('What does "lazy" mean?', ['Not willing to work or do things', 'Very hardworking', 'Very kind', 'Very smart'], 'Not willing to work or do things'),
                    $this->matchPairs('Smart', ['Smart', 'Lazy', 'Rude', 'Shy'], 'Smart'),
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
