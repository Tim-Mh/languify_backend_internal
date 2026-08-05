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

class EnglishUnitBeginner07Seeder extends Seeder
{
    /**
     * Seeds Beginner "Unit 7: Prepositions & Locations" with 6 lessons,
     * each containing 6 exercises covering prepositions of place
     * (in/on/at/under/next to) and asking/giving simple locations.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 7: Prepositions & Locations'],
            ['order_number' => 7]
        );

        foreach ($this->lessonData() as $lessonDef) {
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

    private function lessonData(): array
    {
        return [
            [
                'title' => 'Lesson 1: In, On, At',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('In', ['In', 'On', 'At', 'Under'], 'In'),
                    $this->fillBlank('The book is ____ the box.', ['in', 'on', 'at', 'under'], 'in'),
                    $this->fillBlank('The cup is ____ the table.', ['on', 'in', 'at', 'next to'], 'on'),
                    $this->tapWord('The keys are on the table', ['table', 'The', 'keys', 'are', 'on', 'the'], ['The', 'keys', 'are', 'on', 'the', 'table']),
                    $this->listenSelect('She is at school', ['She is at school', 'She is on school', 'She is in school bag', 'She is under school']),
                    $this->multipleChoice('Which preposition do we use with "school" to say where someone is right now?', ['at', 'on', 'under', 'next to'], 'at'),
                ],
            ],
            [
                'title' => 'Lesson 2: Under, Next To, Between',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Under', ['Under', 'Next to', 'Between', 'On'], 'Under'),
                    $this->fillBlank('The cat is ____ the chair.', ['under', 'at', 'in', 'between'], 'under'),
                    $this->tapWord('The dog is next to the door', ['door', 'The', 'dog', 'is', 'next', 'to', 'the'], ['The', 'dog', 'is', 'next', 'to', 'the', 'door']),
                    $this->tapWord('The lamp is between the sofa and the wall', ['wall', 'The', 'lamp', 'is', 'between', 'the', 'sofa', 'and', 'the'], ['The', 'lamp', 'is', 'between', 'the', 'sofa', 'and', 'the', 'wall']),
                    $this->listenSelect('The ball is under the bed', ['The ball is under the bed', 'The ball is on the bed', 'The ball is next to the bed', 'The ball is in the bed']),
                    $this->multipleChoice('What does "next to" mean?', ['Beside something', 'Above something', 'Inside something', 'Far from something'], 'Beside something'),
                ],
            ],
            [
                'title' => 'Lesson 3: Rooms in a House',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Kitchen', ['Kitchen', 'Bedroom', 'Bathroom', 'Living room'], 'Kitchen'),
                    $this->matchPairs('Living room', ['Living room', 'Kitchen', 'Bedroom', 'Bathroom'], 'Living room'),
                    $this->fillBlank('The food is in the ____.', ['kitchen', 'bedroom', 'garden', 'garage'], 'kitchen'),
                    $this->tapWord('My bed is in the bedroom', ['bedroom', 'My', 'bed', 'is', 'in', 'the'], ['My', 'bed', 'is', 'in', 'the', 'bedroom']),
                    $this->listenSelect('The bathroom is next to the bedroom', ['The bathroom is next to the bedroom', 'The kitchen is under the bedroom', 'The garden is in the kitchen', 'The bedroom is at the door']),
                    $this->multipleChoice('Where do you usually cook food?', ['In the kitchen', 'In the bedroom', 'In the bathroom', 'In the garden'], 'In the kitchen'),
                ],
            ],
            [
                'title' => "Lesson 4: Asking 'Where is...?'",
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Where', ['Where', 'When', 'Who', 'What'], 'Where'),
                    $this->fillBlank('____ is the bank?', ['Where', 'What', 'Who', 'When'], 'Where'),
                    $this->tapWord('Where is the bus stop', ['stop', 'Where', 'is', 'the', 'bus'], ['Where', 'is', 'the', 'bus', 'stop']),
                    $this->listenSelect('Where is the hospital?', ['Where is the hospital?', 'When is the hospital?', 'What is the hospital?', 'Who is the hospital?']),
                    $this->listenSelect('Where is the nearest park?', ['Where is the nearest park?', 'When is the nearest park?', 'What is the nearest park?', 'Who is the nearest park?']),
                    $this->multipleChoice('What question do you ask to find a place?', ['Where is...?', 'When is...?', 'Who is...?', 'What is...?'], 'Where is...?'),
                ],
            ],
            [
                'title' => 'Lesson 5: Giving Directions',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Straight', ['Straight', 'Left', 'Right', 'Behind'], 'Straight'),
                    $this->fillBlank('Turn ____ at the corner.', ['left', 'lefts', 'lefting', 'lefted'], 'left'),
                    $this->tapWord('The bank is behind the shop', ['shop', 'The', 'bank', 'is', 'behind', 'the'], ['The', 'bank', 'is', 'behind', 'the', 'shop']),
                    $this->listenSelect('Turn right at the traffic light', ['Turn right at the traffic light', 'Turn left at the corner', 'Go straight ahead', 'Stop near the bank']),
                    $this->multipleChoice('What does "behind" mean?', ['At the back of something', 'In front of something', 'Above something', 'Inside something'], 'At the back of something'),
                    $this->multipleChoice('Which word means to go without turning?', ['Straight', 'Left', 'Right', 'Behind'], 'Straight'),
                ],
            ],
            [
                'title' => 'Lesson 6: Places in the City',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Hospital', ['Hospital', 'Library', 'Market', 'Station'], 'Hospital'),
                    $this->fillBlank('The library is ____ the market.', ['near', 'nears', 'nearing', 'neared'], 'near'),
                    $this->fillBlank('There is a bookstore ____ the corner.', ['on', 'in', 'at', 'under'], 'on'),
                    $this->tapWord('The station is far from here', ['here', 'The', 'station', 'is', 'far', 'from'], ['The', 'station', 'is', 'far', 'from', 'here']),
                    $this->listenSelect('The market is close to my house', ['The market is close to my house', 'The market is far from my house', 'The market is under my house', 'The market is inside my house']),
                    $this->multipleChoice('What is the opposite of "near"?', ['Far', 'Close', 'Next', 'Behind'], 'Far'),
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
