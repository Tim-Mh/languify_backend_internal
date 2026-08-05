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

class EnglishUnitConversation10Seeder extends Seeder
{
    /**
     * Seeds "Unit 10: Comparisons & Preferences" under the Conversation
     * chapter with 6 lessons x 6 exercises covering comparative/superlative
     * adjectives, "I prefer...", and "better than" style comparisons.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 10: Comparisons & Preferences'],
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
                'title' => 'Lesson 1: Comparative Adjectives',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Bigger', ['Bigger', 'Smaller', 'Faster', 'Slower'], 'Bigger'),
                    $this->fillBlank('An elephant is ____ than a mouse.', ['bigger', 'big', 'biggest', 'bigly'], 'bigger'),
                    $this->tapWord('A car is faster than a bike', ['bike', 'than', 'A', 'faster', 'a', 'is', 'car'], ['A', 'car', 'is', 'faster', 'than', 'a', 'bike']),
                    $this->listenSelect('This bag is heavier than that one', ['This bag is heavier than that one', 'This bag is lighter than that one', 'This bag is the heaviest bag', 'This bag is as heavy as that one']),
                    $this->multipleChoice('Which word compares two things?', ['Bigger', 'Big', 'Biggest', 'Bigness'], 'Bigger'),
                    $this->fillBlank('My brother is ____ than me.', ['taller', 'tall', 'tallest', 'tallness'], 'taller'),
                ],
            ],
            [
                'title' => 'Lesson 2: Superlative Adjectives',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Biggest', ['Biggest', 'Bigger', 'Smallest', 'Smaller'], 'Biggest'),
                    $this->fillBlank('This is the ____ mountain in the world.', ['tallest', 'taller', 'tall', 'tallness'], 'tallest'),
                    $this->tapWord('She is the smartest student', ['student', 'She', 'is', 'the', 'smartest'], ['She', 'is', 'the', 'smartest', 'student']),
                    $this->listenSelect('This is the best restaurant in town', ['This is the best restaurant in town', 'This is a good restaurant', 'This is the worst restaurant in town', 'This restaurant is better than that one']),
                    $this->multipleChoice('Which word describes the highest degree?', ['Best', 'Better', 'Good', 'Well'], 'Best'),
                    $this->tapWord('This is the cheapest hotel', ['hotel', 'This', 'is', 'the', 'cheapest'], ['This', 'is', 'the', 'cheapest', 'hotel']),
                ],
            ],
            [
                'title' => 'Lesson 3: Saying What You Prefer',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Prefer', ['Prefer', 'Like', 'Dislike', 'Choose'], 'Prefer'),
                    $this->fillBlank('I ____ tea to coffee.', ['prefer', 'prefers', 'preferring', 'preferred'], 'prefer'),
                    $this->tapWord('I prefer tea to coffee', ['coffee', 'I', 'prefer', 'tea', 'to'], ['I', 'prefer', 'tea', 'to', 'coffee']),
                    $this->listenSelect('I would rather stay home', ['I would rather stay home', 'I want to go out', 'I prefer to travel', 'I need to work']),
                    $this->multipleChoice('Which sentence expresses a preference?', ['I prefer tea to coffee', 'I am from Pakistan', 'It is raining today', 'She is my sister'], 'I prefer tea to coffee'),
                    $this->multipleChoice('What does "I would rather" mean?', ['I prefer to', 'I must', 'I never', 'I forgot'], 'I prefer to'),
                ],
            ],
            [
                'title' => 'Lesson 4: Better Than and Worse Than',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Better', ['Better', 'Worse', 'Best', 'Worst'], 'Better'),
                    $this->fillBlank('This phone is ____ than my old one.', ['better', 'good', 'best', 'well'], 'better'),
                    $this->tapWord('This coffee is worse than that one', ['one', 'This', 'coffee', 'is', 'worse', 'than', 'that'], ['This', 'coffee', 'is', 'worse', 'than', 'that', 'one']),
                    $this->listenSelect('My new job is better than my old job', ['My new job is better than my old job', 'My new job is worse than my old job', 'My old job was the best job', 'My new job is the same as my old job']),
                    $this->multipleChoice('What is the comparative form of "bad"?', ['Worse', 'Worst', 'Badder', 'Baddest'], 'Worse'),
                    $this->listenSelect('This restaurant is worse than the last one', ['This restaurant is worse than the last one', 'This restaurant is better than the last one', 'This restaurant is the best in town', 'This restaurant is as good as the last one']),
                ],
            ],
            [
                'title' => 'Lesson 5: Comparing People and Things',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Taller', ['Taller', 'Shorter', 'Older', 'Younger'], 'Taller'),
                    $this->fillBlank('This laptop is more ____ than that one.', ['expensive', 'expense', 'expensively', 'expenses'], 'expensive'),
                    $this->tapWord('My sister is older than me', ['me', 'My', 'sister', 'is', 'older', 'than'], ['My', 'sister', 'is', 'older', 'than', 'me']),
                    $this->listenSelect('This dress is more beautiful than that one', ['This dress is more beautiful than that one', 'This dress is less beautiful than that one', 'This dress is the most beautiful dress', 'This dress is as beautiful as that one']),
                    $this->multipleChoice('How do we form comparatives for long adjectives?', ['more + adjective', 'adjective + er', 'the + adjective + est', 'most + adjective'], 'more + adjective'),
                    $this->matchPairs('Younger', ['Younger', 'Older', 'Taller', 'Shorter'], 'Younger'),
                ],
            ],
            [
                'title' => 'Lesson 6: Asking About Preferences',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Which', ['Which', 'What', 'Who', 'Where'], 'Which'),
                    $this->fillBlank('____ do you prefer, tea or coffee?', ['Which', 'What', 'Who', 'Where'], 'Which'),
                    $this->tapWord('Do you like tea better than coffee', ['coffee', 'Do', 'you', 'like', 'tea', 'better', 'than'], ['Do', 'you', 'like', 'tea', 'better', 'than', 'coffee']),
                    $this->listenSelect('I like summer better than winter', ['I like summer better than winter', 'I like winter better than summer', 'I like summer and winter equally', 'I dislike summer and winter']),
                    $this->multipleChoice('Which question asks about preference?', ['Which one do you like more?', 'What time is it?', 'Where do you live?', 'How old are you?'], 'Which one do you like more?'),
                    $this->fillBlank('I like dogs ____ than cats.', ['better', 'good', 'best', 'well'], 'better'),
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
