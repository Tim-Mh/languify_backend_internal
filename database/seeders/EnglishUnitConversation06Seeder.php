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

class EnglishUnitConversation06Seeder extends Seeder
{
    /**
     * Seeds "Unit 6: Future Plans & Intentions" under the Conversation chapter:
     * 6 lessons covering "going to" / "will" and talking about tomorrow / next week,
     * each with 6 exercises across all 5 exercise types.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 6: Future Plans & Intentions'],
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
                'title' => 'Lesson 1: Making Plans with "Going To"',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Trip', ['Trip', 'Meeting', 'Party', 'Vacation'], 'Trip'),
                    $this->fillBlank('I ____ going to visit my grandmother next week.', ['am', 'is', 'are', 'be'], 'am'),
                    $this->tapWord('I am going to travel next month', ['travel', 'I', 'am', 'going', 'to', 'next', 'month'], ['I', 'am', 'going', 'to', 'travel', 'next', 'month']),
                    $this->listenSelect('We are going to have a party', ['We are going to have a party', 'We had a party yesterday', 'We like big parties', 'We are at a party now']),
                    $this->multipleChoice('Which sentence shows a plan that is already decided?', ['I am going to study medicine.', 'I study medicine.', 'I studied medicine.', 'I sometimes study medicine.'], 'I am going to study medicine.'),
                    $this->fillBlank('She ____ going to start a new job tomorrow.', ['is', 'am', 'are', 'be'], 'is'),
                ],
            ],
            [
                'title' => 'Lesson 2: Sudden Decisions with "Will"',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Promise', ['Promise', 'Decision', 'Offer', 'Plan'], 'Promise'),
                    $this->fillBlank("It's raining! I ____ close the window.", ['will', 'wills', 'willing', 'willed'], 'will'),
                    $this->tapWord('I will help you with your bags', ['help', 'I', 'will', 'you', 'with', 'your', 'bags'], ['I', 'will', 'help', 'you', 'with', 'your', 'bags']),
                    $this->tapWord('She will call you later', ['call', 'She', 'will', 'you', 'later'], ['She', 'will', 'call', 'you', 'later']),
                    $this->listenSelect('I will answer the phone', ['I will answer the phone', 'I am going to answer the phone tomorrow', 'I answered the phone already', 'I never answer the phone']),
                    $this->multipleChoice('Which sentence is a decision made at the moment of speaking?', ['I will get that for you now.', 'I am going to get that next week.', 'I got that yesterday.', 'I get that every day.'], 'I will get that for you now.'),
                ],
            ],
            [
                'title' => 'Lesson 3: Talking About Tomorrow and Next Week',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Tomorrow', ['Tomorrow', 'Yesterday', 'Today', 'Tonight'], 'Tomorrow'),
                    $this->fillBlank('We are going to travel next ____.', ['week', 'weeks', 'weekly', 'weeked'], 'week'),
                    $this->tapWord('The concert is next Friday', ['Friday', 'The', 'concert', 'is', 'next'], ['The', 'concert', 'is', 'next', 'Friday']),
                    $this->listenSelect('See you next week', ['See you next week', 'See you tomorrow', 'See you tonight', 'See you later today']),
                    $this->multipleChoice('Which word means the day after today?', ['Tomorrow', 'Yesterday', 'Today', 'Tonight'], 'Tomorrow'),
                    $this->multipleChoice('Which phrase talks about a future time?', ['Next month', 'Last month', 'This morning', 'Yesterday'], 'Next month'),
                ],
            ],
            [
                'title' => 'Lesson 4: Asking About Future Plans',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Question', ['Question', 'Answer', 'Plan', 'Idea'], 'Question'),
                    $this->fillBlank('____ you going to join us tomorrow?', ['Are', 'Is', 'Am', 'Be'], 'Are'),
                    $this->tapWord('What are you going to do tomorrow', ['do', 'What', 'are', 'you', 'going', 'to', 'tomorrow'], ['What', 'are', 'you', 'going', 'to', 'do', 'tomorrow']),
                    $this->listenSelect('Will you come to the meeting?', ['Will you come to the meeting?', 'Did you come to the meeting?', 'Are you at the meeting?', 'You came to the meeting.']),
                    $this->multipleChoice("How do you ask about someone's future plan?", ['What are you going to do next week?', 'What did you do last week?', 'What do you do every week?', 'What were you doing?'], 'What are you going to do next week?'),
                    $this->listenSelect('Are you going to the party tomorrow?', ['Are you going to the party tomorrow?', 'Were you at the party yesterday?', 'Do you like parties?', 'I went to the party.']),
                ],
            ],
            [
                'title' => 'Lesson 5: Weather and Predictions',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Forecast', ['Forecast', 'Season', 'Climate', 'Storm'], 'Forecast'),
                    $this->fillBlank('I think it ____ rain tomorrow.', ['will', 'wills', 'willed', 'willing'], 'will'),
                    $this->tapWord('It will be sunny next week', ['sunny', 'It', 'will', 'be', 'next', 'week'], ['It', 'will', 'be', 'sunny', 'next', 'week']),
                    $this->listenSelect('It will probably snow tonight', ['It will probably snow tonight', 'It snowed last night', 'It is snowing now', 'It never snows here']),
                    $this->multipleChoice('Which sentence makes a prediction about the future?', ['The weather will be cold next week.', 'The weather was cold last week.', 'The weather is cold today.', 'The weather is never cold here.'], 'The weather will be cold next week.'),
                    $this->matchPairs('Temperature', ['Temperature', 'Umbrella', 'Cloud', 'Rainbow'], 'Temperature'),
                ],
            ],
            [
                'title' => 'Lesson 6: Making Arrangements for Next Week',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Appointment', ['Appointment', 'Reminder', 'Schedule', 'Calendar'], 'Appointment'),
                    $this->fillBlank('I have ____ appointment with the dentist next Monday.', ['an', 'a', 'the', 'some'], 'an'),
                    $this->tapWord('We are going to meet next Tuesday', ['meet', 'We', 'are', 'going', 'to', 'next', 'Tuesday'], ['We', 'are', 'going', 'to', 'meet', 'next', 'Tuesday']),
                    $this->listenSelect("Let's schedule the meeting for next week", ["Let's schedule the meeting for next week", 'We had the meeting last week', 'The meeting is happening now', 'I forgot about the meeting']),
                    $this->multipleChoice("What does 'reschedule' mean?", ['To change the time of a plan', 'To cancel a plan completely', 'To forget a plan', "To repeat yesterday's plan"], 'To change the time of a plan'),
                    $this->fillBlank('They ____ going to visit us next weekend.', ['are', 'is', 'am', 'be'], 'are'),
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
