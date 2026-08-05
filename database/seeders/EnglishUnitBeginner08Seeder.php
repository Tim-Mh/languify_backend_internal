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

class EnglishUnitBeginner08Seeder extends Seeder
{
    /**
     * Seeds "Unit 8: Daily Routine" into the existing Beginner chapter:
     * morning/evening routines and frequency adverbs (always, usually, never).
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 8: Daily Routine'],
            ['order_number' => 8]
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
                'title' => 'Lesson 1: Morning Routine Basics',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Wake up', ['Wake up', 'Go to bed', 'Have dinner', 'Take a shower'], 'Wake up'),
                    $this->fillBlank("I ____ up at seven o'clock every morning.", ['wake', 'wakes', 'waking', 'woke'], 'wake'),
                    $this->tapWord('I brush my teeth every morning', ['teeth', 'I', 'brush', 'my', 'every', 'morning'], ['I', 'brush', 'my', 'teeth', 'every', 'morning']),
                    $this->listenSelect('I take a shower every morning', ['I take a shower every morning', 'I eat breakfast every morning', 'I go to bed every morning', 'I wash the dishes every morning']),
                    $this->multipleChoice('What do most people do first in the morning?', ['Wake up', 'Go to sleep', 'Have dinner', 'Watch TV'], 'Wake up'),
                    $this->matchPairs('Get dressed', ['Get dressed', 'Go to bed', 'Have lunch', 'Take a shower'], 'Get dressed'),
                ],
            ],
            [
                'title' => 'Lesson 2: Frequency Adverbs: Always, Usually, Never',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Always', ['Always', 'Usually', 'Never', 'Rarely'], 'Always'),
                    $this->fillBlank('I ____ go to bed before 10 PM because it is part of my daily routine.', ['usually', 'usual', 'user', 'use'], 'usually'),
                    $this->tapWord('I always brush my teeth at night', ['night', 'I', 'always', 'brush', 'teeth', 'my', 'at'], ['I', 'always', 'brush', 'my', 'teeth', 'at', 'night']),
                    $this->listenSelect('I never skip breakfast', ['I never skip breakfast', 'I always skip breakfast', 'I usually eat breakfast', 'I sometimes skip lunch']),
                    $this->multipleChoice('Which word means "not ever"?', ['Never', 'Always', 'Usually', 'Often'], 'Never'),
                    $this->fillBlank('She ____ wakes up early, but today she woke up late.', ['usually', 'use', 'usual', 'user'], 'usually'),
                ],
            ],
            [
                'title' => 'Lesson 3: Evening Routine & Bedtime',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Have dinner', ['Have dinner', 'Wake up', 'Take a shower', 'Get dressed'], 'Have dinner'),
                    $this->fillBlank("We ____ dinner at eight o'clock every evening.", ['have', 'has', 'having', 'had'], 'have'),
                    $this->tapWord('I watch TV before going to bed', ['bed', 'I', 'watch', 'TV', 'before', 'going', 'to'], ['I', 'watch', 'TV', 'before', 'going', 'to', 'bed']),
                    $this->listenSelect("I go to bed at ten o'clock", ["I go to bed at ten o'clock", "I wake up at ten o'clock", "I eat lunch at ten o'clock", "I leave home at ten o'clock"]),
                    $this->multipleChoice('What do you usually do right before sleeping?', ['Go to bed', 'Wake up', 'Have breakfast', 'Go to school'], 'Go to bed'),
                    $this->tapWord('She brushes her teeth before bed', ['bed', 'She', 'brushes', 'her', 'teeth', 'before'], ['She', 'brushes', 'her', 'teeth', 'before', 'bed']),
                ],
            ],
            [
                'title' => 'Lesson 4: Present Simple Habits',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Brushes', ['Brushes', 'Brush', 'Brushing', 'Brushed'], 'Brushes'),
                    $this->fillBlank('He ____ up at six every morning.', ['wakes', 'wake', 'waking', 'woke'], 'wakes'),
                    $this->tapWord('She always makes her bed', ['bed', 'She', 'always', 'makes', 'her'], ['She', 'always', 'makes', 'her', 'bed']),
                    $this->listenSelect('He usually takes a shower at night', ['He usually takes a shower at night', 'He usually take a shower at night', 'He usual takes a shower at night', 'He usually taking a shower at night']),
                    $this->multipleChoice('Which sentence is correct?', ['She brushes her teeth every night.', 'She brush her teeth every night.', 'She brushing her teeth every night.', 'She brushed her teeth every night now.'], 'She brushes her teeth every night.'),
                    $this->listenSelect('He never eats breakfast', ['He never eats breakfast', 'He never eat breakfast', 'He never eating breakfast', 'He never ate breakfast now']),
                ],
            ],
            [
                'title' => 'Lesson 5: Daily Schedule & Time Expressions',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('In the morning', ['In the morning', 'In the evening', 'At night', 'At noon'], 'In the morning'),
                    $this->fillBlank('I get dressed ____ I take a shower.', ['after', 'before', 'during', 'between'], 'after'),
                    $this->tapWord('I go for a walk in the evening', ['evening', 'I', 'go', 'for', 'a', 'walk', 'in', 'the'], ['I', 'go', 'for', 'a', 'walk', 'in', 'the', 'evening']),
                    $this->listenSelect('I eat dinner at seven in the evening', ['I eat dinner at seven in the evening', 'I eat breakfast at seven in the evening', 'I wake up at seven in the evening', 'I go to school at seven in the evening']),
                    $this->multipleChoice('Which time expression means "during the night"?', ['At night', 'In the morning', 'In the afternoon', 'At noon'], 'At night'),
                    $this->multipleChoice('What do you usually do in the evening?', ['Have dinner and relax', 'Wake up and get dressed', 'Go to school', 'Eat breakfast'], 'Have dinner and relax'),
                ],
            ],
            [
                'title' => 'Lesson 6: Asking About Routines',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Question', ['Question', 'Answer', 'Statement', 'Command'], 'Question'),
                    $this->fillBlank('____ you usually wake up early?', ['Do', 'Does', 'Are', 'Is'], 'Do'),
                    $this->tapWord('What time do you go to bed', ['bed', 'What', 'time', 'do', 'you', 'go', 'to'], ['What', 'time', 'do', 'you', 'go', 'to', 'bed']),
                    $this->listenSelect('Does she usually eat breakfast?', ['Does she usually eat breakfast?', 'Do she usually eat breakfast?', 'Is she usually eat breakfast?', 'Does she usually eating breakfast?']),
                    $this->multipleChoice('Which question is correct?', ['Does he always brush his teeth?', 'Does he always brushes his teeth?', 'Do he always brush his teeth?', 'Is he always brush his teeth?'], 'Does he always brush his teeth?'),
                    $this->fillBlank('____ your sister usually go to bed early?', ['Does', 'Do', 'Is', 'Are'], 'Does'),
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
