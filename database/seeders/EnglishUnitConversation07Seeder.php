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

class EnglishUnitConversation07Seeder extends Seeder
{
    /**
     * Seeds "Unit 7: Giving Directions" into the existing Conversation chapter
     * with 6 lessons, each containing 6 exercises.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 7: Giving Directions'],
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
                'title' => 'Lesson 1: Turning Left and Right',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Left', ['Left', 'Right', 'Straight', 'Back'], 'Left'),
                    $this->fillBlank('Turn ____ at the corner.', ['left', 'lefts', 'lefting', 'lefted'], 'left'),
                    $this->tapWord('Turn right at the light', ['light', 'Turn', 'right', 'at', 'the'], ['Turn', 'right', 'at', 'the', 'light']),
                    $this->listenSelect('Turn left here', ['Turn left here', 'Turn right here', 'Go straight ahead', 'Stop at the corner']),
                    $this->multipleChoice('Which word means the opposite of "left"?', ['Right', 'Straight', 'Near', 'Far'], 'Right'),
                    $this->multipleChoice('What should you do at a red traffic light before turning?', ['Stop and check for cars', 'Speed up', 'Close your eyes', 'Turn off the engine'], 'Stop and check for cars'),
                ],
            ],
            [
                'title' => 'Lesson 2: Going Straight Ahead',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Straight', ['Straight', 'Left', 'Right', 'Around'], 'Straight'),
                    $this->fillBlank('Go ____ for two blocks.', ['straight', 'straighter', 'straightest', 'straightened'], 'straight'),
                    $this->fillBlank('The bank is ____ ahead of you.', ['straight', 'left', 'right', 'behind'], 'straight'),
                    $this->tapWord('Go straight ahead until the bridge', ['bridge', 'Go', 'straight', 'ahead', 'until', 'the'], ['Go', 'straight', 'ahead', 'until', 'the', 'bridge']),
                    $this->listenSelect('Keep going straight', ['Keep going straight', 'Turn left now', 'Turn right now', 'Stop right here']),
                    $this->multipleChoice('What does "straight ahead" mean?', ['Directly in front of you', 'Behind you', 'To the side', 'Underneath'], 'Directly in front of you'),
                ],
            ],
            [
                'title' => 'Lesson 3: Near and Far',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Near', ['Near', 'Far', 'Left', 'Right'], 'Near'),
                    $this->fillBlank('The station is very ____ from here.', ['far', 'farther', 'farthest', 'farness'], 'far'),
                    $this->tapWord('The park is near my house', ['house', 'The', 'park', 'is', 'near', 'my'], ['The', 'park', 'is', 'near', 'my', 'house']),
                    $this->tapWord('The airport is far from the city', ['city', 'The', 'airport', 'is', 'far', 'from', 'the'], ['The', 'airport', 'is', 'far', 'from', 'the', 'city']),
                    $this->listenSelect('It is not far from here', ['It is not far from here', 'It is very far away', 'It is right next to you', 'It is closed today']),
                    $this->multipleChoice('Which word means "a short distance away"?', ['Near', 'Far', 'Straight', 'Around'], 'Near'),
                ],
            ],
            [
                'title' => 'Lesson 4: Asking for Directions',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Excuse me', ['Excuse me', 'Thank you', 'Goodbye', 'Please'], 'Excuse me'),
                    $this->fillBlank('____ me, how do I get to the museum?', ['Excuse', 'Sorry', 'Please', 'Thanks'], 'Excuse'),
                    $this->tapWord('Excuse me, where is the bank', ['bank', 'Excuse', 'me', 'where', 'is', 'the'], ['Excuse', 'me', 'where', 'is', 'the', 'bank']),
                    $this->listenSelect('Could you tell me the way to the station?', ['Could you tell me the way to the station?', 'Where were you yesterday?', 'What time is it now?', 'How much does this cost?']),
                    $this->listenSelect('How do I get to the library?', ['How do I get to the library?', 'What is your name?', 'Where do you live?', 'Can I help you?']),
                    $this->multipleChoice('What is the best way to ask a stranger for directions?', ['Excuse me, could you help me?', 'Hey, where is it?', 'Tell me now.', 'I need it.'], 'Excuse me, could you help me?'),
                ],
            ],
            [
                'title' => 'Lesson 5: Landmarks and Locations',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Bridge', ['Bridge', 'River', 'Church', 'Corner'], 'Bridge'),
                    $this->matchPairs('Corner', ['Corner', 'Bridge', 'Square', 'Tower'], 'Corner'),
                    $this->fillBlank('Turn left at the ____.', ['corner', 'corners', 'cornering', 'cornered'], 'corner'),
                    $this->tapWord('The hotel is next to the church', ['church', 'The', 'hotel', 'is', 'next', 'to', 'the'], ['The', 'hotel', 'is', 'next', 'to', 'the', 'church']),
                    $this->listenSelect('It is across from the park', ['It is across from the park', 'It is inside the mall', 'It is under the bridge', 'It is behind the school']),
                    $this->multipleChoice('What does "next to" mean?', ['Beside something', 'Far from something', 'Above something', 'Inside something'], 'Beside something'),
                ],
            ],
            [
                'title' => 'Lesson 6: Giving Step-by-Step Directions',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('First', ['First', 'Then', 'Finally', 'Next'], 'First'),
                    $this->fillBlank('____, turn left, then go straight.', ['First', 'Never', 'Ever', 'Fast'], 'First'),
                    $this->tapWord('First turn left then go straight', ['straight', 'First', 'turn', 'left', 'then', 'go'], ['First', 'turn', 'left', 'then', 'go', 'straight']),
                    $this->listenSelect('Finally, you will see the store on your right', ['Finally, you will see the store on your right', 'First, turn around and leave', 'Never go that way', 'Stop before the bridge']),
                    $this->multipleChoice('Which word signals the last step in directions?', ['Finally', 'First', 'Next', 'Then'], 'Finally'),
                    $this->multipleChoice('Which word means "after that"?', ['Then', 'First', 'Finally', 'Never'], 'Then'),
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
