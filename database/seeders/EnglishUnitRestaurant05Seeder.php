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

class EnglishUnitRestaurant05Seeder extends Seeder
{
    /**
     * Seeds "Unit 5: Complaints & Compliments" under the existing Restaurant
     * chapter, with 6 lessons x 6 exercises covering polite complaints about
     * food/service and giving compliments to staff.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 5: Complaints & Compliments'],
            ['order_number' => 5]
        );

        foreach ($this->lessonData() as $lessonDef) {
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

    private function lessonData(): array
    {
        return [
            [
                'title' => 'Lesson 1: Complaining About Food Quality',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Cold', ['Cold', 'Hot', 'Fresh', 'Spicy'], 'Cold'),
                    $this->fillBlank('This soup is ____.', ['cold', 'colder', 'coldest', 'coldly'], 'cold'),
                    $this->tapWord('My food is cold', ['cold', 'food', 'My', 'is'], ['My', 'food', 'is', 'cold']),
                    $this->listenSelect('Excuse me, this steak is undercooked', ['Excuse me, this steak is undercooked', 'This steak is perfectly cooked', 'Can I get some more bread?', 'The music is too loud']),
                    $this->multipleChoice('What does "undercooked" mean?', ['Not cooked enough', 'Cooked too much', 'Very tasty', 'Very cold'], 'Not cooked enough'),
                    $this->fillBlank('The chicken is ____, could you cook it a bit longer?', ['undercooked', 'undercook', 'undercooking', 'undercooks'], 'undercooked'),
                ],
            ],
            [
                'title' => 'Lesson 2: Complaining About Slow or Wrong Service',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Waiter', ['Waiter', 'Chef', 'Manager', 'Customer'], 'Waiter'),
                    $this->fillBlank('We have been ____ for twenty minutes.', ['waiting', 'wait', 'waited', 'waits'], 'waiting'),
                    $this->tapWord('This is not what I ordered', ['ordered', 'not', 'This', 'I', 'what', 'is'], ['This', 'is', 'not', 'what', 'I', 'ordered']),
                    $this->listenSelect('Excuse me, we have been waiting a long time', ['Excuse me, we have been waiting a long time', 'The food arrived quickly', 'This tastes wonderful', 'Can we get the bill, please?']),
                    $this->multipleChoice('What should you say if the waiter brings the wrong dish?', ['This is not what I ordered', 'This tastes great', 'Can I have the bill?', 'Thank you very much'], 'This is not what I ordered'),
                    $this->tapWord('Could you check our order please', ['order', 'Could', 'please', 'check', 'you', 'our'], ['Could', 'you', 'check', 'our', 'order', 'please']),
                ],
            ],
            [
                'title' => 'Lesson 3: Polite Complaint Phrases & Requests',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Please', ['Please', 'Sorry', 'Thanks', 'Excuse'], 'Please'),
                    $this->fillBlank('____ you please take this back to the kitchen?', ['Could', 'Does', 'Is', 'Has'], 'Could'),
                    $this->tapWord('Could you please bring the bill', ['bring', 'Could', 'bill', 'the', 'please', 'you'], ['Could', 'you', 'please', 'bring', 'the', 'bill']),
                    $this->listenSelect("I'm afraid this isn't right", ["I'm afraid this isn't right", 'Everything is perfect, thank you', 'I would like to pay in cash', 'This is my first time here']),
                    $this->multipleChoice('Which phrase is the most polite way to complain?', ['Could you please check this again?', 'This food is terrible!', 'I want my money back now!', 'Hey, this is wrong!'], 'Could you please check this again?'),
                    $this->multipleChoice('What does "I\'m afraid" mean in this sentence?', ['I am sorry to say', 'I am scared of something', 'I am very happy', 'I am confused'], 'I am sorry to say'),
                ],
            ],
            [
                'title' => 'Lesson 4: Complimenting the Food',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Delicious', ['Delicious', 'Awful', 'Bland', 'Stale'], 'Delicious'),
                    $this->fillBlank('This is the ____ meal I have ever had.', ['best', 'good', 'better', 'goodest'], 'best'),
                    $this->tapWord('This cake tastes amazing', ['amazing', 'This', 'tastes', 'cake'], ['This', 'cake', 'tastes', 'amazing']),
                    $this->listenSelect('The soup was absolutely delicious', ['The soup was absolutely delicious', 'The soup was too salty', 'The soup arrived cold', 'I did not order any soup']),
                    $this->multipleChoice('What does "tasty" mean?', ['Having a pleasant flavor', 'Having no flavor at all', 'Very cold', 'Very expensive'], 'Having a pleasant flavor'),
                    $this->matchPairs('Fresh', ['Fresh', 'Stale', 'Rotten', 'Frozen'], 'Fresh'),
                ],
            ],
            [
                'title' => 'Lesson 5: Complimenting the Staff & Service',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Friendly', ['Friendly', 'Rude', 'Slow', 'Lazy'], 'Friendly'),
                    $this->fillBlank('The waiter was very ____ and helpful.', ['friendly', 'friend', 'friends', 'friendliness'], 'friendly'),
                    $this->tapWord('Our server was extremely attentive', ['attentive', 'Our', 'extremely', 'was', 'server'], ['Our', 'server', 'was', 'extremely', 'attentive']),
                    $this->listenSelect('The staff here are always so polite', ['The staff here are always so polite', 'The staff here are quite rude', 'We waited a long time for service', 'The restaurant was closed today']),
                    $this->multipleChoice('What does "attentive" mean?', ["Paying close attention to someone's needs", 'Being lazy at work', 'Being loud and rude', 'Arriving late'], "Paying close attention to someone's needs"),
                    $this->listenSelect('Thank you for the wonderful service', ['Thank you for the wonderful service', 'The service was disappointing', 'Please bring the check', 'We would like a table for two']),
                ],
            ],
            [
                'title' => 'Lesson 6: Resolving Issues & Thanking Staff',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Replace', ['Replace', 'Break', 'Order', 'Pay'], 'Replace'),
                    $this->fillBlank('The manager offered to ____ our meal for free.', ['replace', 'replaced', 'replacing', 'replaces'], 'replace'),
                    $this->tapWord('I will bring you a new plate', ['new', 'I', 'plate', 'bring', 'you', 'a', 'will'], ['I', 'will', 'bring', 'you', 'a', 'new', 'plate']),
                    $this->listenSelect('We are sorry for the inconvenience', ['We are sorry for the inconvenience', 'Everything was perfect tonight', 'Please come again soon', 'The kitchen is closed now']),
                    $this->multipleChoice('What should a waiter say after fixing a mistake?', ['We apologize for the mistake', 'That is your problem', 'We do not care about that', 'Pay the bill now'], 'We apologize for the mistake'),
                    $this->fillBlank('Thank you for ____ the problem so quickly.', ['fixing', 'fix', 'fixed', 'fixes'], 'fixing'),
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
