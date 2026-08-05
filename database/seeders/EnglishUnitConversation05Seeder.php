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

class EnglishUnitConversation05Seeder extends Seeder
{
    /**
     * Seeds "Unit 5: Past Tense Conversations" under the Conversation chapter
     * with 6 lessons x 6 exercises covering simple past tense vocabulary and
     * grammar (regular/irregular verbs, questions, negatives, time
     * expressions and storytelling sequencing).
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 5: Past Tense Conversations'],
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
                'title' => 'Lesson 1: Talking About Yesterday',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Yesterday', ['Yesterday', 'Today', 'Tomorrow', 'Now'], 'Yesterday'),
                    $this->fillBlank('I ____ my homework yesterday.', ['finished', 'finish', 'finishing', 'finishes'], 'finished'),
                    $this->tapWord('She cooked dinner yesterday', ['dinner', 'She', 'yesterday', 'cooked'], ['She', 'cooked', 'dinner', 'yesterday']),
                    $this->listenSelect('I walked to school yesterday', ['I walked to school yesterday', 'I walk to school today', 'I will walk to school tomorrow', 'I am walking to school now']),
                    $this->multipleChoice('Which sentence is in the simple past tense?', ['We watched a movie last night', 'We watch a movie every night', 'We will watch a movie tonight', 'We are watching a movie now'], 'We watched a movie last night'),
                    $this->fillBlank('They ____ the game yesterday afternoon.', ['played', 'play', 'plays', 'playing'], 'played'),
                ],
            ],
            [
                'title' => 'Lesson 2: Irregular Past Tense Verbs',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Went', ['Went', 'Ate', 'Saw', 'Had'], 'Went'),
                    $this->fillBlank('Yesterday, I ____ to the market.', ['went', 'goed', 'go', 'going'], 'went'),
                    $this->tapWord('We ate pizza last night', ['pizza', 'We', 'last', 'night', 'ate'], ['We', 'ate', 'pizza', 'last', 'night']),
                    $this->listenSelect('She saw a movie last week', ['She saw a movie last week', 'She sees a movie every week', 'She will see a movie next week', 'She is seeing a movie now']),
                    $this->multipleChoice('What is the past tense of "eat"?', ['Ate', 'Eated', 'Eaten', 'Eating'], 'Ate'),
                    $this->tapWord('He had breakfast at seven', ['breakfast', 'He', 'at', 'seven', 'had'], ['He', 'had', 'breakfast', 'at', 'seven']),
                ],
            ],
            [
                'title' => 'Lesson 3: Asking Questions About the Past',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Did', ['Did', 'Do', 'Does', 'Doing'], 'Did'),
                    $this->fillBlank('____ you call me last night?', ['Did', 'Do', 'Does', 'Done'], 'Did'),
                    $this->tapWord('Did you finish your homework', ['homework', 'Did', 'you', 'finish', 'your'], ['Did', 'you', 'finish', 'your', 'homework']),
                    $this->listenSelect('Did you sleep well last night?', ['Did you sleep well last night?', 'Do you sleep well every night?', 'Will you sleep well tonight?', 'Are you sleeping well now?']),
                    $this->multipleChoice('Which question asks about the past?', ['Did she visit her parents?', 'Does she visit her parents?', 'Will she visit her parents?', 'Is she visiting her parents?'], 'Did she visit her parents?'),
                    $this->multipleChoice('How do we form a yes/no question in the simple past?', ['Did + subject + base verb', 'Do + subject + base verb', 'Subject + verb + ed', 'Will + subject + verb'], 'Did + subject + base verb'),
                ],
            ],
            [
                'title' => 'Lesson 4: Negative Past Tense Sentences',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs("Didn't", ["Didn't", 'Do not', 'Does not', "Won't"], "Didn't"),
                    $this->fillBlank('I ____ go to work yesterday because I was sick.', ["didn't", 'not', 'no', 'never'], "didn't"),
                    $this->tapWord('She did not call me', ['call', 'She', 'not', 'did', 'me'], ['She', 'did', 'not', 'call', 'me']),
                    $this->listenSelect("We didn't watch TV last night", ["We didn't watch TV last night", 'We watch TV every night', 'We will watch TV tonight', "We aren't watching TV now"]),
                    $this->multipleChoice('What is the negative form of "He played football"?', ["He didn't play football", 'He not played football', "He doesn't play football", "He isn't playing football"], "He didn't play football"),
                    $this->listenSelect("They didn't finish the project on time", ["They didn't finish the project on time", 'They finish the project on time', 'They will finish the project on time', "They aren't finishing the project"]),
                ],
            ],
            [
                'title' => 'Lesson 5: Time Expressions: Last Week and Ago',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Ago', ['Ago', 'Last', 'Next', 'Every'], 'Ago'),
                    $this->fillBlank('I visited my grandmother two days ____.', ['ago', 'before', 'last', 'past'], 'ago'),
                    $this->tapWord('We traveled to Lahore last month', ['Lahore', 'We', 'last', 'month', 'traveled', 'to'], ['We', 'traveled', 'to', 'Lahore', 'last', 'month']),
                    $this->listenSelect('I met him last week', ['I met him last week', 'I meet him every week', 'I will meet him next week', 'I am meeting him now']),
                    $this->multipleChoice('Which phrase refers to a time before now?', ['Last week', 'Next week', 'Every week', 'This week'], 'Last week'),
                    $this->matchPairs('Last month', ['Last month', 'Next month', 'Every month', 'This month'], 'Last month'),
                ],
            ],
            [
                'title' => 'Lesson 6: Telling a Story in the Past',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('First', ['First', 'Then', 'Finally', 'Next'], 'First'),
                    $this->fillBlank('First, I woke up. ____, I ate breakfast.', ['Then', 'First', 'Ago', 'Yesterday'], 'Then'),
                    $this->tapWord('After that we went home', ['home', 'After', 'we', 'that', 'went'], ['After', 'that', 'we', 'went', 'home']),
                    $this->listenSelect('Finally, we arrived at the airport', ['Finally, we arrived at the airport', 'Finally, we arrive at the airport', 'Finally, we will arrive at the airport', 'Finally, we are arriving at the airport']),
                    $this->multipleChoice('Which word helps you tell events in order in a past story?', ['Then', 'Never', 'Always', 'Often'], 'Then'),
                    $this->fillBlank('We visited the museum first, and ____ we had lunch.', ['then', 'ago', 'never', 'soon'], 'then'),
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
