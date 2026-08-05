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

class EnglishUnitConversation08Seeder extends Seeder
{
    /**
     * Seeds "Unit 8: Phone Conversations" under the Conversation chapter:
     * answering calls, leaving messages, and phone etiquette phrases.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 8: Phone Conversations'],
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
                'title' => 'Lesson 1: Answering Calls Politely',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Hello', ['Hello', 'Goodbye', 'Sorry', 'Please'], 'Hello'),
                    $this->fillBlank('____ is Sarah speaking.', ['This', 'That', 'These', 'Those'], 'This'),
                    $this->tapWord('This is Ali speaking', ['speaking', 'This', 'is', 'Ali'], ['This', 'is', 'Ali', 'speaking']),
                    $this->listenSelect('How can I help you?', ['How can I help you?', 'I am busy now', 'Please call later', 'Who is this?']),
                    $this->multipleChoice('What do you say when you answer the phone?', ['Hello, this is Sarah speaking', 'Goodbye, see you soon', 'I am not home', 'Please wait outside'], 'Hello, this is Sarah speaking'),
                    $this->fillBlank('Good morning, ABC Company. How can I ____ you?', ['help', 'helps', 'helping', 'helped'], 'help'),
                ],
            ],
            [
                'title' => 'Lesson 2: Asking Who Is Calling',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Calling', ['Calling', 'Speaking', 'Waiting', 'Holding'], 'Calling'),
                    $this->fillBlank('____ I ask who is calling?', ['May', 'Do', 'Am', 'Is'], 'May'),
                    $this->tapWord('Who is calling please', ['please', 'Who', 'is', 'calling'], ['Who', 'is', 'calling', 'please']),
                    $this->listenSelect('May I ask who is calling?', ['May I ask who is calling?', 'Please leave a message', 'I will call you back', 'The line is busy']),
                    $this->multipleChoice('What does "May I ask who is calling?" mean?', ['A polite way to ask the caller\'s name', 'A way to end the call', 'A greeting', 'An apology'], 'A polite way to ask the caller\'s name'),
                    $this->multipleChoice('Which sentence correctly asks about the caller\'s identity?', ['Who am I speaking to?', 'Who I am speaking to?', 'Who speaking am I to?', 'Am who I speaking to?'], 'Who am I speaking to?'),
                ],
            ],
            [
                'title' => 'Lesson 3: Leaving a Voicemail Message',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Voicemail', ['Voicemail', 'Text message', 'Email', 'Letter'], 'Voicemail'),
                    $this->fillBlank('Please leave a message ____ the beep.', ['after', 'before', 'under', 'between'], 'after'),
                    $this->tapWord('I will call you back', ['back', 'I', 'will', 'call', 'you'], ['I', 'will', 'call', 'you', 'back']),
                    $this->listenSelect('Please leave a message after the beep', ['Please leave a message after the beep', 'The number you dialed is busy', 'Your call is important to us', 'Please hold the line']),
                    $this->multipleChoice('What should you do when you hear "the beep" on voicemail?', ['Start speaking your message', 'Hang up immediately', 'Dial another number', 'Wait silently'], 'Start speaking your message'),
                    $this->tapWord('Sorry I missed your call', ['call', 'Sorry', 'I', 'missed', 'your'], ['Sorry', 'I', 'missed', 'your', 'call']),
                ],
            ],
            [
                'title' => 'Lesson 4: Taking a Message for Someone Else',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Message', ['Message', 'Number', 'Address', 'Name'], 'Message'),
                    $this->fillBlank('Could I take a ____ for him?', ['message', 'messages', 'messaging', 'messaged'], 'message'),
                    $this->tapWord('He is not available right now', ['now', 'He', 'is', 'not', 'available', 'right'], ['He', 'is', 'not', 'available', 'right', 'now']),
                    $this->listenSelect('Can I take a message?', ['Can I take a message?', 'He is on another call', 'Please hold the line', 'She left already']),
                    $this->multipleChoice('What does "get back to you" mean?', ['To contact you again later', 'To hang up now', 'To repeat the message', 'To transfer the call'], 'To contact you again later'),
                    $this->matchPairs('Unavailable', ['Unavailable', 'Available', 'Busy', 'Free'], 'Unavailable'),
                ],
            ],
            [
                'title' => 'Lesson 5: Ending a Phone Call Politely',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Goodbye', ['Goodbye', 'Hello', 'Sorry', 'Please'], 'Goodbye'),
                    $this->fillBlank('Thanks for ____, goodbye!', ['calling', 'call', 'calls', 'called'], 'calling'),
                    $this->tapWord('I have to go now', ['now', 'I', 'have', 'to', 'go'], ['I', 'have', 'to', 'go', 'now']),
                    $this->listenSelect('Talk to you soon, bye!', ['Talk to you soon, bye!', 'Who is calling please?', 'Please hold the line', 'Can you repeat that?']),
                    $this->multipleChoice('Which phrase politely ends a phone call?', ['Thanks for calling, take care!', 'Who is this?', 'Please wait a moment', 'I cannot hear you'], 'Thanks for calling, take care!'),
                    $this->listenSelect('It was nice talking to you', ['It was nice talking to you', 'Please leave a message', 'The line is busy', 'Can I ask who is calling?']),
                ],
            ],
            [
                'title' => 'Lesson 6: Phone Etiquette: Repeating & Holding',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Repeat', ['Repeat', 'Listen', 'Hold', 'Speak'], 'Repeat'),
                    $this->fillBlank('Could you please ____ that?', ['repeat', 'repeats', 'repeating', 'repeated'], 'repeat'),
                    $this->tapWord('Can you speak more slowly', ['slowly', 'Can', 'you', 'speak', 'more'], ['Can', 'you', 'speak', 'more', 'slowly']),
                    $this->listenSelect('Sorry, could you repeat that?', ['Sorry, could you repeat that?', 'Please hold the line', 'I will call you back', 'Thanks for calling']),
                    $this->multipleChoice('What should you say if the connection is bad?', ["I can't hear you very well", 'Nice to meet you', 'See you later', 'Thanks for holding'], "I can't hear you very well"),
                    $this->fillBlank('Please ____ on, I will transfer your call.', ['hold', 'holds', 'holding', 'held'], 'hold'),
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
