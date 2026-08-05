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

class EnglishUnitConversation04Seeder extends Seeder
{
    /**
     * Seeds "Unit 4: Talking About Feelings" under the existing Conversation
     * chapter, with 6 lessons x 6 exercises each covering emotions
     * vocabulary, "I feel...", and asking how someone feels.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 4: Talking About Feelings'],
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
                'title' => 'Lesson 1: Basic Emotions Vocabulary',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Happy', ['Happy', 'Sad', 'Angry', 'Tired'], 'Happy'),
                    $this->matchPairs('Sad', ['Sad', 'Happy', 'Excited', 'Scared'], 'Sad'),
                    $this->fillBlank('I am very ____ today.', ['happy', 'happiness', 'happily', 'happier'], 'happy'),
                    $this->tapWord('I feel happy today', ['today', 'I', 'happy', 'feel'], ['I', 'feel', 'happy', 'today']),
                    $this->listenSelect('Angry', ['Angry', 'Happy', 'Sad', 'Tired']),
                    $this->multipleChoice('What does "tired" mean?', ['Needing rest', 'Feeling joyful', 'Feeling scared', 'Feeling angry'], 'Needing rest'),
                ],
            ],
            [
                'title' => 'Lesson 2: Saying How You Feel',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Excited', ['Excited', 'Bored', 'Nervous', 'Calm'], 'Excited'),
                    $this->fillBlank('I ____ excited about the trip.', ['feel', 'feels', 'feeling', 'felt'], 'feel'),
                    $this->fillBlank('She ____ happy today.', ['is', 'am', 'are', 'be'], 'is'),
                    $this->tapWord('I feel nervous about the exam', ['exam', 'I', 'feel', 'the', 'nervous', 'about'], ['I', 'feel', 'nervous', 'about', 'the', 'exam']),
                    $this->listenSelect('I am feeling great', ['I am feeling great', 'I am feeling sick', 'I am feeling bored', 'I am feeling scared']),
                    $this->multipleChoice('Which sentence correctly says how you feel?', ['I feel calm.', 'I feels calm.', 'I am feel calm.', 'I calm feel.'], 'I feel calm.'),
                ],
            ],
            [
                'title' => 'Lesson 3: Asking How Someone Feels',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Worried', ['Worried', 'Relaxed', 'Proud', 'Jealous'], 'Worried'),
                    $this->fillBlank('____ are you feeling today?', ['How', 'What', 'Who', 'Why'], 'How'),
                    $this->tapWord('How are you feeling today', ['today', 'How', 'feeling', 'are', 'you'], ['How', 'are', 'you', 'feeling', 'today']),
                    $this->tapWord('Is everything all right', ['all', 'Is', 'right', 'everything'], ['Is', 'everything', 'all', 'right']),
                    $this->listenSelect("What's wrong?", ["What's wrong?", "I'm fine, thanks.", 'See you later.', 'Good morning.']),
                    $this->multipleChoice("What is a polite way to ask about someone's feelings?", ['How are you feeling?', 'Where are you going?', 'What is your name?', 'How old are you?'], 'How are you feeling?'),
                ],
            ],
            [
                'title' => 'Lesson 4: Explaining Why You Feel That Way',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Proud', ['Proud', 'Ashamed', 'Grateful', 'Jealous'], 'Proud'),
                    $this->fillBlank('I feel proud ____ I passed the test.', ['because', 'but', 'so', 'or'], 'because'),
                    $this->tapWord('I feel tired because of work', ['work', 'I', 'feel', 'tired', 'because', 'of'], ['I', 'feel', 'tired', 'because', 'of', 'work']),
                    $this->listenSelect('I feel happy because it is sunny', ['I feel happy because it is sunny', 'I feel sad because it is raining', 'I feel tired because of work', 'I feel proud because I passed'], 'I feel happy because it is sunny'),
                    $this->listenSelect('She feels sad because she lost her keys', ['She feels sad because she lost her keys', 'She feels happy because she found her keys', 'She feels angry because she is late', 'She feels calm because she is resting'], 'She feels sad because she lost her keys'),
                    $this->multipleChoice('Which word means "for this reason"?', ['because', 'however', 'although', 'maybe'], 'because'),
                ],
            ],
            [
                'title' => 'Lesson 5: Describing the Strength of a Feeling',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Furious', ['Furious', 'Annoyed', 'Content', 'Relieved'], 'Furious'),
                    $this->fillBlank('I am a ____ nervous about the interview.', ['little', 'lot', 'many', 'much'], 'little'),
                    $this->tapWord('I am much happier now', ['now', 'I', 'am', 'much', 'happier'], ['I', 'am', 'much', 'happier', 'now']),
                    $this->listenSelect('I feel a bit anxious', ['I feel a bit anxious', 'I feel extremely calm', 'I feel very excited', 'I feel completely relaxed']),
                    $this->multipleChoice('What is the comparative form of "happy"?', ['happier', 'happyer', 'more happy', 'happiest'], 'happier'),
                    $this->multipleChoice('Which sentence shows a stronger feeling?', ['I am extremely excited.', 'I am a little excited.', 'I am somewhat excited.', 'I am slightly excited.'], 'I am extremely excited.'),
                ],
            ],
            [
                'title' => 'Lesson 6: Talking About Past Feelings',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Relieved', ['Relieved', 'Disappointed', 'Embarrassed', 'Confused'], 'Relieved'),
                    $this->matchPairs('Disappointed', ['Disappointed', 'Relieved', 'Proud', 'Grateful'], 'Disappointed'),
                    $this->fillBlank('Yesterday, I ____ very tired after work.', ['felt', 'feel', 'feeling', 'feels'], 'felt'),
                    $this->tapWord('She was nervous before the test', ['test', 'She', 'was', 'nervous', 'before', 'the'], ['She', 'was', 'nervous', 'before', 'the', 'test']),
                    $this->listenSelect('We were excited about the trip', ['We were excited about the trip', 'We are excited about the trip', 'We will be excited about the trip', 'We excited about the trip']),
                    $this->multipleChoice('What is the past tense of "feel"?', ['felt', 'feeled', 'feels', 'feeling'], 'felt'),
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
