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

class EnglishUnitBeginner09Seeder extends Seeder
{
    /**
     * Seeds "Unit 9: Weather & Seasons" under the Beginner chapter for English,
     * with 6 lessons, each containing 6 exercises.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 9: Weather & Seasons'],
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
                'title' => 'Lesson 1: Weather Vocabulary Basics',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Sunny', ['Sunny', 'Rainy', 'Cloudy', 'Windy'], 'Sunny'),
                    $this->fillBlank('It is very ____ today, so bring an umbrella.', ['rainy', 'rain', 'rains', 'rained'], 'rainy'),
                    $this->tapWord('It is sunny today', ['today', 'It', 'is', 'sunny'], ['It', 'is', 'sunny', 'today']),
                    $this->listenSelect('Cloudy', ['Cloudy', 'Sunny', 'Snowy', 'Windy']),
                    $this->multipleChoice('What does "windy" mean?', ['There is a lot of wind', 'There is a lot of rain', 'It is very hot', 'It is very cold'], 'There is a lot of wind'),
                    $this->fillBlank('The wind is blowing hard; it is very ____.', ['windy', 'wind', 'winds', 'winded'], 'windy'),
                ],
            ],
            [
                'title' => 'Lesson 2: The Four Seasons',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Winter', ['Winter', 'Summer', 'Spring', 'Autumn'], 'Winter'),
                    $this->fillBlank('Leaves fall from the trees in ____.', ['autumn', 'autumns', 'autumnal', 'autumned'], 'autumn'),
                    $this->tapWord('Flowers bloom in spring', ['spring', 'Flowers', 'bloom', 'in'], ['Flowers', 'bloom', 'in', 'spring']),
                    $this->listenSelect('Summer', ['Summer', 'Winter', 'Spring', 'Autumn']),
                    $this->multipleChoice('Which season comes after winter?', ['Spring', 'Summer', 'Autumn', 'Winter'], 'Spring'),
                    $this->tapWord('Summer is the hottest season', ['season', 'Summer', 'is', 'the', 'hottest'], ['Summer', 'is', 'the', 'hottest', 'season']),
                ],
            ],
            [
                'title' => 'Lesson 3: "It Is" Weather Expressions',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Raining', ['Raining', 'Snowing', 'Shining', 'Freezing'], 'Raining'),
                    $this->fillBlank('It ____ raining outside, so take your umbrella.', ['is', 'are', 'am', 'be'], 'is'),
                    $this->tapWord('It is snowing outside', ['outside', 'It', 'is', 'snowing'], ['It', 'is', 'snowing', 'outside']),
                    $this->listenSelect('It is freezing today', ['It is freezing today', 'It is boiling today', 'It is calm today', 'It is dry today']),
                    $this->multipleChoice('Which sentence correctly describes the weather?', ['It is raining now.', 'It raining now.', 'It are raining now.', 'It rain now.'], 'It is raining now.'),
                    $this->multipleChoice('What does "It is freezing" mean?', ['It is extremely cold', 'It is extremely hot', 'It is windy', 'It is sunny'], 'It is extremely cold'),
                ],
            ],
            [
                'title' => "Lesson 4: Describing Today's Weather",
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Forecast', ['Forecast', 'Temperature', 'Umbrella', 'Thermometer'], 'Forecast'),
                    $this->fillBlank('____ is the weather like today?', ['What', 'Where', 'Who', 'Why'], 'What'),
                    $this->tapWord('What is the weather like today', ['today', 'What', 'is', 'the', 'weather', 'like'], ['What', 'is', 'the', 'weather', 'like', 'today']),
                    $this->listenSelect('The temperature is rising', ['The temperature is rising', 'The temperature is falling', 'The sky is clear', 'The wind is calm']),
                    $this->multipleChoice("How do you ask about today's weather?", ['What is the weather like today?', 'What are you doing today?', 'Where is the weather today?', 'Who is the weather today?'], 'What is the weather like today?'),
                    $this->listenSelect('It is a beautiful sunny day', ['It is a beautiful sunny day', 'It is a terrible rainy day', 'It is a cold winter night', 'It is a warm spring morning']),
                ],
            ],
            [
                'title' => 'Lesson 5: Seasonal Activities & Clothing',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Coat', ['Coat', 'Scarf', 'Swimsuit', 'Sunglasses'], 'Coat'),
                    $this->fillBlank('Summer is ____ than winter.', ['hotter', 'hot', 'hottest', 'hotly'], 'hotter'),
                    $this->tapWord('Wear a coat in winter', ['winter', 'Wear', 'a', 'coat', 'in'], ['Wear', 'a', 'coat', 'in', 'winter']),
                    $this->listenSelect('Sunglasses', ['Sunglasses', 'Scarf', 'Boots', 'Gloves']),
                    $this->multipleChoice('What should you wear on a cold winter day?', ['A warm coat and scarf', 'A swimsuit and sunglasses', 'Shorts and sandals', 'A light T-shirt'], 'A warm coat and scarf'),
                    $this->matchPairs('Boots', ['Boots', 'Sandals', 'Swimsuit', 'Sunglasses'], 'Boots'),
                ],
            ],
            [
                'title' => 'Lesson 6: Weather Forecast & Future',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Tomorrow', ['Tomorrow', 'Yesterday', 'Today', 'Tonight'], 'Tomorrow'),
                    $this->fillBlank('It ____ rain tomorrow, according to the forecast.', ['will', 'is', 'was', 'has'], 'will'),
                    $this->tapWord('It will be sunny tomorrow', ['tomorrow', 'It', 'will', 'be', 'sunny'], ['It', 'will', 'be', 'sunny', 'tomorrow']),
                    $this->listenSelect('It will snow this weekend', ['It will snow this weekend', 'It will rain this weekend', 'It snowed last weekend', 'It rained last weekend']),
                    $this->multipleChoice('Which sentence talks about the future weather?', ['It will be windy tomorrow.', 'It was windy yesterday.', 'It is windy now.', 'It has been windy.'], 'It will be windy tomorrow.'),
                    $this->tapWord('The forecast says it will rain', ['rain', 'The', 'forecast', 'says', 'it', 'will'], ['The', 'forecast', 'says', 'it', 'will', 'rain']),
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
