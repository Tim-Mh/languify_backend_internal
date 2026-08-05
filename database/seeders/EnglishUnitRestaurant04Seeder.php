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

class EnglishUnitRestaurant04Seeder extends Seeder
{
    /**
     * Seeds "Unit 4: Making Reservations" under the Restaurant chapter,
     * with 6 lessons x 6 exercises covering booking a table, party size,
     * choosing a time, confirming, changing/cancelling, and arriving.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 4: Making Reservations'],
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
                'title' => 'Lesson 1: Booking a Table by Phone',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Reservation', ['Reservation', 'Order', 'Bill', 'Menu'], 'Reservation'),
                    $this->fillBlank('I would like to ____ a table for tonight.', ['book', 'books', 'booking', 'booked'], 'book'),
                    $this->tapWord('I would like to book a table', ['table', 'I', 'would', 'like', 'to', 'book', 'a'], ['I', 'would', 'like', 'to', 'book', 'a', 'table']),
                    $this->listenSelect('I would like to make a reservation', ['I would like to make a reservation', 'Can I see the menu?', 'The food is delicious', 'Can I pay by card?']),
                    $this->multipleChoice('What does "reservation" mean?', ['A table booked in advance', 'A type of food', 'A discount', 'A waiter'], 'A table booked in advance'),
                    $this->fillBlank('I would like to ____ a reservation for two.', ['make', 'makes', 'making', 'made'], 'make'),
                ],
            ],
            [
                'title' => 'Lesson 2: Choosing Your Party Size',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Two', ['Two', 'Four', 'Six', 'Eight'], 'Two'),
                    $this->fillBlank('A table for ____ people, please.', ['four', 'fourth', 'fours', 'forth'], 'four'),
                    $this->tapWord('A table for two people, please', ['please', 'A', 'table', 'for', 'two', 'people'], ['A', 'table', 'for', 'two', 'people', 'please']),
                    $this->listenSelect('How many people are in your party?', ['How many people are in your party?', 'What time is it?', 'Where is the restroom?', 'Can I see the menu?']),
                    $this->multipleChoice('What does "party of four" mean?', ['A group of four people', 'A celebration', 'A type of table', 'A discount for four'], 'A group of four people'),
                    $this->tapWord('There will be six of us', ['us', 'There', 'will', 'be', 'six', 'of'], ['There', 'will', 'be', 'six', 'of', 'us']),
                ],
            ],
            [
                'title' => 'Lesson 3: Choosing a Time',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Evening', ['Evening', 'Morning', 'Afternoon', 'Midnight'], 'Evening'),
                    $this->fillBlank("We would like a table ____ seven o'clock.", ['at', 'in', 'on', 'to'], 'at'),
                    $this->tapWord('Can we book a table for eight', ['eight', 'Can', 'we', 'book', 'a', 'table', 'for'], ['Can', 'we', 'book', 'a', 'table', 'for', 'eight']),
                    $this->listenSelect('Is seven thirty okay for you?', ['Is seven thirty okay for you?', 'Is the food spicy?', 'Do you have a menu?', 'Can I pay now?']),
                    $this->multipleChoice('Which sentence correctly uses a time preposition?', ['We will arrive at six.', 'We will arrive in six.', 'We will arrive on six.', 'We will arrive for six.'], 'We will arrive at six.'),
                    $this->multipleChoice('Which phrase best completes: "Our table is booked for ___"?', ['seven in the evening', 'seven of the evening', 'seven at evening', 'seven the evening'], 'seven in the evening'),
                ],
            ],
            [
                'title' => 'Lesson 4: Confirming a Reservation',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Confirm', ['Confirm', 'Cancel', 'Change', 'Forget'], 'Confirm'),
                    $this->fillBlank('We ____ confirm your reservation by email.', ['will', 'would', 'are', 'do'], 'will'),
                    $this->tapWord('Your table is confirmed for eight', ['eight', 'Your', 'table', 'is', 'confirmed', 'for'], ['Your', 'table', 'is', 'confirmed', 'for', 'eight']),
                    $this->listenSelect('Your reservation is confirmed', ['Your reservation is confirmed', 'Your table is not ready', 'The restaurant is closed', 'Please wait outside']),
                    $this->multipleChoice('What does "confirmed" mean?', ['Officially agreed and certain', 'Cancelled', 'Delayed', 'Unavailable'], 'Officially agreed and certain'),
                    $this->matchPairs('Confirmed', ['Confirmed', 'Pending', 'Cancelled', 'Delayed'], 'Confirmed'),
                ],
            ],
            [
                'title' => 'Lesson 5: Changing or Cancelling a Reservation',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Cancel', ['Cancel', 'Confirm', 'Book', 'Pay'], 'Cancel'),
                    $this->fillBlank('I need to ____ my reservation for tonight.', ['cancel', 'cancels', 'cancelling', 'cancelled'], 'cancel'),
                    $this->tapWord('Could I change my reservation time', ['time', 'Could', 'I', 'change', 'my', 'reservation'], ['Could', 'I', 'change', 'my', 'reservation', 'time']),
                    $this->listenSelect('I would like to cancel my booking', ['I would like to cancel my booking', 'I would like to order dessert', 'The bill is ready', 'Table for two, please']),
                    $this->multipleChoice('Which sentence politely asks to change a reservation?', ['Could I move my reservation to nine?', 'Move my reservation now.', 'Change it.', 'I want a change now.'], 'Could I move my reservation to nine?'),
                    $this->listenSelect('Can we reschedule for tomorrow?', ['Can we reschedule for tomorrow?', 'Can we order more bread?', 'Is the table ready?', 'Can I get the bill?']),
                ],
            ],
            [
                'title' => 'Lesson 6: Arriving at the Restaurant',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Host', ['Host', 'Chef', 'Waiter', 'Guest'], 'Host'),
                    $this->fillBlank('I have a reservation ____ the name Khan.', ['under', 'on', 'at', 'in'], 'under'),
                    $this->tapWord('I have a reservation under Khan', ['Khan', 'I', 'have', 'a', 'reservation', 'under'], ['I', 'have', 'a', 'reservation', 'under', 'Khan']),
                    $this->listenSelect("I have a reservation for seven o'clock", ["I have a reservation for seven o'clock", 'I would like the menu', 'Can I pay in cash?', 'Is this seat taken?']),
                    $this->multipleChoice('What should you say when you arrive with a reservation?', ['I have a reservation under Smith.', 'I want a menu now.', 'Where is the bathroom?', 'I am very hungry.'], 'I have a reservation under Smith.'),
                    $this->fillBlank('Please follow me, your table is ____.', ['ready', 'readying', 'readily', 'readiness'], 'ready'),
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
