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

class EnglishUnitBeginner05Seeder extends Seeder
{
    /**
     * Seeds "Unit 5: Common Verbs (Present Tense)" into the existing
     * Beginner chapter: 6 lessons x 6 exercises covering present simple,
     * present continuous, subject-verb agreement and everyday action verbs.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 5: Common Verbs (Present Tense)'],
            ['order_number' => 5]
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
                'title' => 'Lesson 1: Present Simple with I, You, We, They',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Eat', ['Eat', 'Sleep', 'Run', 'Read'], 'Eat'),
                    $this->fillBlank('I ____ breakfast every morning.', ['eat', 'eats', 'eating', 'ate'], 'eat'),
                    $this->tapWord('They play football on weekends', ['football', 'They', 'on', 'play', 'weekends'], ['They', 'play', 'football', 'on', 'weekends']),
                    $this->listenSelect('We walk to school every day', ['We walk to school every day', 'We walked to school yesterday', 'She walks to school every day', 'He is walking to school']),
                    $this->multipleChoice('Which sentence is correct for "I"?', ['I read books.', 'I reads books.', 'I reading books.', 'I readed books.'], 'I read books.'),
                    $this->matchPairs('Drink', ['Drink', 'Eat', 'Sleep', 'Write'], 'Drink'),
                ],
            ],
            [
                'title' => 'Lesson 2: Present Simple with He, She, It (-s Ending)',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Works', ['Works', 'Work', 'Working', 'Worked'], 'Works'),
                    $this->fillBlank('She ____ to the market every Friday.', ['goes', 'go', 'going', 'went'], 'goes'),
                    $this->tapWord('He watches TV in the evening', ['TV', 'He', 'the', 'in', 'watches', 'evening'], ['He', 'watches', 'TV', 'in', 'the', 'evening']),
                    $this->listenSelect('My brother studies English at night', ['My brother studies English at night', 'My brother study English at night', 'My brothers studies English at night', 'My brother studying English at night']),
                    $this->multipleChoice('Which verb form matches "It"?', ['It runs fast.', 'It run fast.', 'It running fast.', 'It ran fast.'], 'It runs fast.'),
                    $this->tapWord('She plays the piano well', ['piano', 'She', 'the', 'plays', 'well'], ['She', 'plays', 'the', 'piano', 'well']),
                ],
            ],
            [
                'title' => 'Lesson 3: Present Continuous - Actions Happening Now',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Running', ['Running', 'Runs', 'Ran', 'Run'], 'Running'),
                    $this->fillBlank('I ____ eating dinner right now.', ['am', 'is', 'are', 'be'], 'am'),
                    $this->tapWord('She is reading a book now', ['book', 'She', 'a', 'is', 'reading', 'now'], ['She', 'is', 'reading', 'a', 'book', 'now']),
                    $this->listenSelect('They are playing football now', ['They are playing football now', 'They play football every day', 'He is playing football now', 'She plays football now']),
                    $this->multipleChoice('Which sentence describes an action happening right now?', ['We are cooking dinner.', 'We cook dinner every day.', 'We cooked dinner yesterday.', 'We cook dinner.'], 'We are cooking dinner.'),
                    $this->multipleChoice('What is the correct form: "He ____ a letter now."', ['is writing', 'writes', 'write', 'wrote'], 'is writing'),
                ],
            ],
            [
                'title' => 'Lesson 4: Everyday Action Verbs and Daily Routines',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Cook', ['Cook', 'Clean', 'Drive', 'Brush'], 'Cook'),
                    $this->fillBlank('He ____ his teeth twice a day.', ['brushes', 'brush', 'brushing', 'brushed'], 'brushes'),
                    $this->tapWord('I wake up early every morning', ['early', 'I', 'up', 'wake', 'every', 'morning'], ['I', 'wake', 'up', 'early', 'every', 'morning']),
                    $this->listenSelect('She cleans her room on Sundays', ['She cleans her room on Sundays', 'She clean her room on Sundays', 'She is cleaning her room now', 'She cleaned her room yesterday']),
                    $this->multipleChoice('What does "drive" mean?', ['To operate a car', 'To cook food', 'To clean a house', 'To wash clothes'], 'To operate a car'),
                    $this->matchPairs('Wake up', ['Wake up', 'Sleep', 'Cook', 'Drive'], 'Wake up'),
                ],
            ],
            [
                'title' => 'Lesson 5: Present Simple vs Present Continuous',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Always', ['Always', 'Now', 'Yesterday', 'Tomorrow'], 'Always'),
                    $this->fillBlank('I usually ____ coffee, but right now I am drinking tea.', ['drink', 'am drinking', 'drinks', 'drank'], 'drink'),
                    $this->tapWord('He usually walks but today he is driving', ['driving', 'He', 'usually', 'walks', 'but', 'today', 'is', 'he'], ['He', 'usually', 'walks', 'but', 'today', 'he', 'is', 'driving']),
                    $this->listenSelect('Look, it is raining outside', ['Look, it is raining outside', 'It rains every winter', 'It rained yesterday', 'It will rain tomorrow']),
                    $this->multipleChoice('Which sentence describes a habit?', ['I go to the gym every Monday.', 'I am going to the gym now.', 'I am going to the gym.', 'I went to the gym.'], 'I go to the gym every Monday.'),
                    $this->listenSelect('We usually eat dinner at eight', ['We usually eat dinner at eight', 'We are eating dinner now', 'We ate dinner at eight', 'We will eat dinner at eight']),
                ],
            ],
            [
                'title' => 'Lesson 6: Negative and Question Forms in Present Tenses',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs("Doesn't", ["Doesn't", "Don't", "Isn't", "Aren't"], "Doesn't"),
                    $this->fillBlank('She ____ like coffee.', ["doesn't", "don't", "isn't", "aren't"], "doesn't"),
                    $this->tapWord('Do you play tennis', ['tennis', 'Do', 'you', 'play'], ['Do', 'you', 'play', 'tennis']),
                    $this->listenSelect('Does he work on Sundays?', ['Does he work on Sundays?', 'Do he works on Sundays?', 'Is he working on Sundays?', 'Did he work on Sundays?']),
                    $this->multipleChoice('Which is the correct negative form?', ["I don't like tea.", "I doesn't like tea.", 'I not like tea.', "I isn't like tea."], "I don't like tea."),
                    $this->fillBlank('____ they live in London?', ['Do', 'Does', 'Is', 'Are'], 'Do'),
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
