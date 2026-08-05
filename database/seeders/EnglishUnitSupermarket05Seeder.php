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

class EnglishUnitSupermarket05Seeder extends Seeder
{
    /**
     * Seeds "Unit 5: Meat & Seafood" under the existing Supermarket chapter,
     * with 6 lessons x 6 exercises covering meat/fish vocabulary and
     * asking the butcher/fishmonger for cuts.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 5: Meat & Seafood'],
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
                'title' => 'Lesson 1: Types of Meat & Poultry',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Chicken', ['Chicken', 'Beef', 'Pork', 'Lamb'], 'Chicken'),
                    $this->matchPairs('Turkey', ['Turkey', 'Duck', 'Chicken', 'Goose'], 'Turkey'),
                    $this->fillBlank("I'd like a kilo of ____, please.", ['chicken', 'chickens', "chicken's", 'chickened'], 'chicken'),
                    $this->tapWord('I want to buy some beef', ['beef', 'I', 'want', 'to', 'buy', 'some'], ['I', 'want', 'to', 'buy', 'some', 'beef']),
                    $this->listenSelect('Do you have any lamb today?', ['Do you have any lamb today?', 'Is the fish fresh today?', 'How much is the turkey?', 'Can I have a chicken breast?']),
                    $this->multipleChoice('What type of meat comes from a pig?', ['Pork', 'Beef', 'Chicken', 'Lamb'], 'Pork'),
                ],
            ],
            [
                'title' => 'Lesson 2: Ordering Cuts from the Butcher',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Chop', ['Chop', 'Steak', 'Fillet', 'Wing'], 'Chop'),
                    $this->fillBlank('Could you cut this into thin ____ for me?', ['slices', 'slice', 'slicing', 'sliced'], 'slices'),
                    $this->fillBlank('Can I have a ____ of chicken breast?', ['pound', 'pounds', 'pounding', 'pounded'], 'pound'),
                    $this->tapWord('Can you cut this into steaks', ['steaks', 'Can', 'you', 'cut', 'this', 'into'], ['Can', 'you', 'cut', 'this', 'into', 'steaks']),
                    $this->listenSelect('Could you trim the fat, please?', ['Could you trim the fat, please?', 'Is this fish frozen?', 'How many eggs do you need?', 'Where is the bakery?']),
                    $this->multipleChoice('What do you say to ask the butcher to remove the fat?', ['Could you trim the fat, please?', 'Could you weigh the fruit, please?', 'Is this on sale?', 'Can I pay by card?'], 'Could you trim the fat, please?'),
                ],
            ],
            [
                'title' => 'Lesson 3: Fish & Seafood Vocabulary',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Salmon', ['Salmon', 'Tuna', 'Shrimp', 'Crab'], 'Salmon'),
                    $this->fillBlank('The fishmonger sells fresh ____ every morning.', ['fish', 'fishes', 'fished', 'fishing'], 'fish'),
                    $this->tapWord('I would like some fresh salmon', ['salmon', 'I', 'would', 'like', 'some', 'fresh'], ['I', 'would', 'like', 'some', 'fresh', 'salmon']),
                    $this->tapWord('Do you sell fresh crab', ['crab', 'Do', 'you', 'sell', 'fresh'], ['Do', 'you', 'sell', 'fresh', 'crab']),
                    $this->listenSelect('Is the tuna fresh today?', ['Is the tuna fresh today?', 'Can I have some chicken wings?', 'How much is the beef?', 'Where is the cash register?']),
                    $this->multipleChoice('Which of these is a type of seafood?', ['Shrimp', 'Chicken', 'Turkey', 'Lamb'], 'Shrimp'),
                ],
            ],
            [
                'title' => 'Lesson 4: Asking the Fishmonger for Prices & Freshness',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Fishmonger', ['Fishmonger', 'Butcher', 'Baker', 'Cashier'], 'Fishmonger'),
                    $this->fillBlank('How much is the salmon ____ kilo?', ['per', 'for', 'at', 'in'], 'per'),
                    $this->tapWord('How much does this fish cost', ['cost', 'How', 'much', 'does', 'this', 'fish'], ['How', 'much', 'does', 'this', 'fish', 'cost']),
                    $this->listenSelect('How much is this per kilo?', ['How much is this per kilo?', 'Do you have any lamb chops?', 'Can I pay by card?', 'Where is the meat counter?']),
                    $this->listenSelect('Is this fish fresh or frozen?', ['Is this fish fresh or frozen?', 'Can you clean the fish for me?', 'How many shrimp do you want?', 'Is the bread fresh today?']),
                    $this->multipleChoice('What do you ask to find out the price per kilo?', ['How much is this per kilo?', 'Where is the fish?', 'Is this fresh?', 'Can I have a bag?'], 'How much is this per kilo?'),
                ],
            ],
            [
                'title' => 'Lesson 5: Freshness & Quality',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Fresh', ['Fresh', 'Frozen', 'Raw', 'Cooked'], 'Fresh'),
                    $this->fillBlank('This salmon looks ____ than that one.', ['fresher', 'fresh', 'freshest', 'freshly'], 'fresher'),
                    $this->tapWord('This fish is fresher than that one', ['that', 'This', 'fish', 'is', 'fresher', 'than', 'one'], ['This', 'fish', 'is', 'fresher', 'than', 'that', 'one']),
                    $this->listenSelect('This meat smells fresh.', ['This meat smells fresh.', 'This meat is frozen.', 'This fish is raw.', 'This chicken is cooked.']),
                    $this->multipleChoice('Which word means "not cooked"?', ['Raw', 'Fresh', 'Frozen', 'Grilled'], 'Raw'),
                    $this->multipleChoice('What is the opposite of "frozen"?', ['Fresh', 'Raw', 'Cooked', 'Sliced'], 'Fresh'),
                ],
            ],
            [
                'title' => 'Lesson 6: Weights & Quantities for Meat and Fish',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Kilogram', ['Kilogram', 'Gram', 'Pound', 'Ounce'], 'Kilogram'),
                    $this->matchPairs('Gram', ['Gram', 'Kilogram', 'Liter', 'Piece'], 'Gram'),
                    $this->fillBlank('How ____ chicken do you need?', ['much', 'many', 'few', 'some'], 'much'),
                    $this->tapWord('I need five hundred grams of beef', ['grams', 'I', 'need', 'five', 'hundred', 'of', 'beef'], ['I', 'need', 'five', 'hundred', 'grams', 'of', 'beef']),
                    $this->listenSelect('How many shrimp would you like?', ['How many shrimp would you like?', 'How much does the beef cost?', 'Is the fish fresh?', 'Can I have a bag?']),
                    $this->multipleChoice('Which question is correct for meat (uncountable)?', ['How much beef do you need?', 'How many beef do you need?', 'How much beefs do you need?', 'How many beefs do you need?'], 'How much beef do you need?'),
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
