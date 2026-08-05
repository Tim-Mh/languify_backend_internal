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

class EnglishUnitConversation09Seeder extends Seeder
{
    /**
     * Seeds "Unit 9: Expressing Opinions" under the Conversation chapter,
     * with 6 lessons x 6 exercises covering "I think", "in my opinion",
     * and agreeing/disagreeing politely.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 9: Expressing Opinions'],
            ['order_number' => 9]
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
                'title' => 'Lesson 1: Sharing Your Opinion',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Think', ['Think', 'Know', 'Feel', 'Believe'], 'Think'),
                    $this->fillBlank('I ____ that English is fun.', ['think', 'thinks', 'thinking', 'thought'], 'think'),
                    $this->tapWord('I think this book is interesting', ['interesting', 'book', 'I', 'is', 'this', 'think'], ['I', 'think', 'this', 'book', 'is', 'interesting']),
                    $this->listenSelect("I think it's a good idea", ["I think it's a good idea", "I don't like it", 'That is not possible', 'I have no idea']),
                    $this->multipleChoice('What does "I think" introduce?', ['A personal opinion', 'A fact', 'A command', 'A question'], 'A personal opinion'),
                    $this->fillBlank('She ____ that the movie was great.', ['thinks', 'think', 'thinking', 'thought'], 'thinks'),
                ],
            ],
            [
                'title' => 'Lesson 2: Using "In My Opinion"',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Opinion', ['Opinion', 'Fact', 'Question', 'Answer'], 'Opinion'),
                    $this->fillBlank('____ my opinion, the food here is excellent.', ['In', 'On', 'At', 'For'], 'In'),
                    $this->tapWord('In my opinion, this plan is good', ['plan', 'In', 'this', 'opinion', 'my', 'is', 'good'], ['In', 'my', 'opinion', 'this', 'plan', 'is', 'good']),
                    $this->listenSelect('Personally, I prefer tea to coffee', ['Personally, I prefer tea to coffee', 'I never drink tea', 'Coffee is not a drink', "I don't like drinks"]),
                    $this->multipleChoice('Which phrase means "in my opinion"?', ['From my point of view', 'From your point of view', 'At any point', 'On the point'], 'From my point of view'),
                    $this->matchPairs('Personally', ['Personally', 'Publicly', 'Politely', 'Partly'], 'Personally'),
                ],
            ],
            [
                'title' => 'Lesson 3: Agreeing Politely',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Agree', ['Agree', 'Disagree', 'Argue', 'Refuse'], 'Agree'),
                    $this->fillBlank('I ____ with you completely.', ['agree', 'agrees', 'agreeing', 'agreed'], 'agree'),
                    $this->tapWord('I completely agree with you', ['with', 'I', 'agree', 'completely', 'you'], ['I', 'completely', 'agree', 'with', 'you']),
                    $this->listenSelect("That's a good point", ["That's a good point", "That's not true", 'I disagree completely', "Let's stop talking"]),
                    $this->multipleChoice('Which phrase shows agreement?', ["You're absolutely right", "I don't think so", "I'm not sure about that", "That's not true"], "You're absolutely right"),
                    $this->tapWord('You are right about that', ['about', 'You', 'right', 'are', 'that'], ['You', 'are', 'right', 'about', 'that']),
                ],
            ],
            [
                'title' => 'Lesson 4: Disagreeing Politely',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Disagree', ['Disagree', 'Agree', 'Accept', 'Support'], 'Disagree'),
                    $this->fillBlank('I see it ____ from you.', ['differently', 'different', 'difference', 'differ'], 'differently'),
                    $this->tapWord("I don't think that is right", ["don't", 'that', 'I', 'think', 'is', 'right'], ['I', "don't", 'think', 'that', 'is', 'right']),
                    $this->listenSelect("I'm afraid I disagree", ["I'm afraid I disagree", 'I completely agree', "That's exactly right", 'Sounds perfect to me']),
                    $this->multipleChoice('Which is a polite way to disagree?', ['I see it a bit differently', 'You are completely wrong', "That's stupid", 'No way'], 'I see it a bit differently'),
                    $this->listenSelect("I'm not sure that's correct", ["I'm not sure that's correct", "That's absolutely true", 'I agree completely', 'Well done']),
                ],
            ],
            [
                'title' => "Lesson 5: Asking for Others' Opinions",
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Question', ['Question', 'Answer', 'Statement', 'Opinion'], 'Question'),
                    $this->fillBlank('What do you ____ about this movie?', ['think', 'thinks', 'thinking', 'thought'], 'think'),
                    $this->tapWord('What do you think about it', ['about', 'What', 'do', 'you', 'think', 'it'], ['What', 'do', 'you', 'think', 'about', 'it']),
                    $this->listenSelect('How about you? What do you think?', ['How about you? What do you think?', "I think it's great.", "That's not true.", 'See you later.']),
                    $this->multipleChoice("Which question asks for someone's opinion?", ["What's your opinion on this?", "What's your name?", 'Where do you live?', 'How old are you?'], "What's your opinion on this?"),
                    $this->multipleChoice("How do you politely ask someone's view?", ['Do you have any thoughts on this?', 'Give me your money.', 'Close the door please.', 'What time is it?'], 'Do you have any thoughts on this?'),
                ],
            ],
            [
                'title' => 'Lesson 6: Comparing Opinions',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Better', ['Better', 'Best', 'Good', 'Well'], 'Better'),
                    $this->fillBlank('I think tea is ____ than coffee.', ['better', 'best', 'more good', 'gooder'], 'better'),
                    $this->tapWord('This book is more interesting', ['interesting', 'This', 'book', 'is', 'more'], ['This', 'book', 'is', 'more', 'interesting']),
                    $this->listenSelect('In my opinion, this is the best option', ['In my opinion, this is the best option', "I don't like it at all", 'This is the worst choice', 'I have no opinion']),
                    $this->multipleChoice('Which sentence correctly compares two things?', ['I think dogs are smarter than cats.', 'I think dogs are smart than cats.', 'I think dogs are more smarter than cats.', 'I think dogs is smarter than cats.'], 'I think dogs are smarter than cats.'),
                    $this->fillBlank('In my opinion, this is the ____ restaurant in town.', ['best', 'better', 'goodest', 'more best'], 'best'),
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
