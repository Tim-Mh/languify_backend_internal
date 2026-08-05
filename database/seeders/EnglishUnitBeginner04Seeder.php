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

class EnglishUnitBeginner04Seeder extends Seeder
{
    /**
     * Seeds "Unit 4: Days & Time" under the Beginner chapter for English:
     * days of the week, months, telling time, and "when" questions.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();
        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 4: Days & Time'],
            ['order_number' => 4]
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
                'title' => 'Lesson 1: Days of the Week',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Monday', ['Monday', 'Tuesday', 'Wednesday', 'Thursday'], 'Monday'),
                    $this->fillBlank('The day after Sunday is ____.', ['Monday', 'Tuesday', 'Saturday', 'Friday'], 'Monday'),
                    $this->tapWord(
                        'Monday is the first day of the week',
                        ['the', 'week', 'Monday', 'first', 'is', 'of', 'the', 'day'],
                        ['Monday', 'is', 'the', 'first', 'day', 'of', 'the', 'week']
                    ),
                    $this->listenSelect('Saturday', ['Saturday', 'Sunday', 'Monday', 'Thursday']),
                    $this->multipleChoice('Which day comes before Wednesday?', ['Tuesday', 'Thursday', 'Monday', 'Friday'], 'Tuesday'),
                    $this->fillBlank('We go to school on ____.', ['weekdays', 'weekday', 'weekending', 'weekly'], 'weekdays'),
                ],
            ],
            [
                'title' => 'Lesson 2: Months of the Year',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('January', ['January', 'February', 'March', 'April'], 'January'),
                    $this->fillBlank('The first month of the year is ____.', ['January', 'December', 'June', 'March'], 'January'),
                    $this->tapWord(
                        'December is the last month of the year',
                        ['year', 'the', 'December', 'of', 'last', 'is', 'the', 'month'],
                        ['December', 'is', 'the', 'last', 'month', 'of', 'the', 'year']
                    ),
                    $this->listenSelect('September', ['September', 'October', 'November', 'August']),
                    $this->multipleChoice('How many months are there in a year?', ['Twelve', 'Ten', 'Seven', 'Fifty-two'], 'Twelve'),
                    $this->multipleChoice('Which month comes after June?', ['July', 'May', 'August', 'September'], 'July'),
                ],
            ],
            [
                'title' => 'Lesson 3: Telling Time',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Clock', ['Clock', 'Watch', 'Calendar', 'Alarm'], 'Clock'),
                    $this->fillBlank('It is three ____.', ["o'clock", 'oclock', 'o clocks', "o'clocks"], "o'clock"),
                    $this->tapWord(
                        'It is half past seven',
                        ['seven', 'It', 'past', 'is', 'half'],
                        ['It', 'is', 'half', 'past', 'seven']
                    ),
                    $this->listenSelect('It is a quarter to five', ['It is a quarter to five', 'It is a quarter past five', 'It is half past five', "It is five o'clock"]),
                    $this->multipleChoice('What time is 6:30?', ['Half past six', 'Quarter past six', 'Six o\'clock', 'Quarter to six'], 'Half past six'),
                    $this->tapWord(
                        'What time is it now',
                        ['now', 'What', 'is', 'time', 'it'],
                        ['What', 'time', 'is', 'it', 'now']
                    ),
                ],
            ],
            [
                'title' => 'Lesson 4: Asking and Answering "When" Questions',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('When', ['When', 'Where', 'Who', 'Why'], 'When'),
                    $this->fillBlank('____ does the movie start?', ['When', 'What', 'Who', 'Whose'], 'When'),
                    $this->tapWord(
                        'When do you wake up',
                        ['up', 'When', 'wake', 'do', 'you'],
                        ['When', 'do', 'you', 'wake', 'up']
                    ),
                    $this->listenSelect("The train leaves at nine o'clock", ["The train leaves at nine o'clock", 'The train leaves at nine dollars', 'The train leaves in nine days', 'The train leaves nine kilometers']),
                    $this->multipleChoice('When is your birthday?', ['In July', 'At the park', 'Because I am happy', 'With my friends'], 'In July'),
                    $this->listenSelect('I usually have lunch at noon', ['I usually have lunch at noon', 'I usually have lunch at night', 'I usually have breakfast at noon', 'I never have lunch']),
                ],
            ],
            [
                'title' => 'Lesson 5: Prepositions of Time (in, on, at)',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('At', ['At', 'On', 'In', 'By'], 'At'),
                    $this->fillBlank('The meeting is ____ Monday.', ['on', 'in', 'at', 'to'], 'on'),
                    $this->tapWord(
                        'School starts at eight in the morning',
                        ['morning', 'School', 'in', 'at', 'starts', 'the', 'eight'],
                        ['School', 'starts', 'at', 'eight', 'in', 'the', 'morning']
                    ),
                    $this->listenSelect('I was born in March', ['I was born in March', 'I was born on March', 'I was born at March', 'I was born by March']),
                    $this->multipleChoice('Which preposition goes with a clock time, like "5 o\'clock"?', ['at', 'on', 'in', 'to'], 'at'),
                    $this->matchPairs('In', ['In', 'On', 'At', 'For'], 'In'),
                ],
            ],
            [
                'title' => 'Lesson 6: Ordinal Numbers & Dates',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('First', ['First', 'Second', 'Third', 'Fourth'], 'First'),
                    $this->fillBlank('Today is the ____ of May.', ['fifth', 'five', 'fiveth', 'fives'], 'fifth'),
                    $this->tapWord(
                        'My birthday is on the tenth of June',
                        ['June', 'My', 'of', 'is', 'tenth', 'birthday', 'on', 'the'],
                        ['My', 'birthday', 'is', 'on', 'the', 'tenth', 'of', 'June']
                    ),
                    $this->listenSelect('The third of April', ['The third of April', 'The three of April', 'The third on April', 'The third at April']),
                    $this->multipleChoice('How do you write the ordinal number for 2?', ['2nd', '2th', '2rd', '2st'], '2nd'),
                    $this->fillBlank('We celebrate New Year on the ____ of January.', ['first', 'one', 'oneth', 'ones'], 'first'),
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
