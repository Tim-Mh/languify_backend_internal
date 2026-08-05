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

class EnglishUnitRestaurant06Seeder extends Seeder
{
    /**
     * Seeds "Unit 6: Dietary Restrictions & Allergies" under the existing
     * Restaurant chapter, with 6 lessons x 6 exercises each.
     */
    public function run(): void
    {
        $english = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $english->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 6: Dietary Restrictions & Allergies'],
            ['order_number' => 6]
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
                'title' => 'Lesson 1: Vegetarian & Vegan Basics',
                'order' => 1,
                'exercises' => [
                    $this->matchPairs('Vegetarian', ['Vegetarian', 'Vegan', 'Carnivore', 'Omnivore'], 'Vegetarian'),
                    $this->fillBlank("I am ____; I don't eat meat.", ['vegetarian', 'vegetarians', 'vegetarianism', 'vegetarianly'], 'vegetarian'),
                    $this->tapWord('I do not eat meat', ['meat', 'I', 'not', 'eat', 'do'], ['I', 'do', 'not', 'eat', 'meat']),
                    $this->listenSelect('I am vegan', ['I am vegan', 'I am vegetarian', 'I eat meat', 'I like fish']),
                    $this->multipleChoice('What does "vegan" mean?', ['Someone who eats no animal products at all', 'Someone who eats only fish', 'Someone who eats only meat', 'Someone who eats only bread'], 'Someone who eats no animal products at all'),
                    $this->matchPairs('Tofu', ['Tofu', 'Cheese', 'Butter', 'Milk'], 'Tofu'),
                ],
            ],
            [
                'title' => 'Lesson 2: Common Food Allergies',
                'order' => 2,
                'exercises' => [
                    $this->matchPairs('Peanuts', ['Peanuts', 'Shrimp', 'Cheese', 'Bread'], 'Peanuts'),
                    $this->fillBlank('She has a peanut ____.', ['allergy', 'allergic', 'allergies', 'allergen'], 'allergy'),
                    $this->tapWord('He is allergic to nuts', ['nuts', 'He', 'allergic', 'is', 'to'], ['He', 'is', 'allergic', 'to', 'nuts']),
                    $this->listenSelect('I have a gluten allergy', ['I have a gluten allergy', 'I have a headache', 'I like gluten bread', 'I am hungry']),
                    $this->multipleChoice('What does "allergic" mean?', ['Having a bad physical reaction to something', 'Liking something a lot', 'Being very hungry', 'Being very full'], 'Having a bad physical reaction to something'),
                    $this->fillBlank("This cake contains ____, so I can't eat it.", ['dairy', 'dairying', 'dairies', 'dairyless'], 'dairy'),
                ],
            ],
            [
                'title' => 'Lesson 3: Saying "I am allergic to..."',
                'order' => 3,
                'exercises' => [
                    $this->matchPairs('Shellfish', ['Shellfish', 'Chicken', 'Rice', 'Bread'], 'Shellfish'),
                    $this->fillBlank('I am allergic ____ shellfish.', ['to', 'for', 'with', 'at'], 'to'),
                    $this->tapWord('I cannot eat shellfish', ['shellfish', 'I', 'eat', 'cannot'], ['I', 'cannot', 'eat', 'shellfish']),
                    $this->listenSelect('I am allergic to eggs', ['I am allergic to eggs', 'I love eggs', 'I ate an egg', 'Eggs are cheap']),
                    $this->multipleChoice('Which sentence correctly says you have a nut allergy?', ['I am allergic to nuts', 'I am allergy to nuts', 'I allergic to nuts', 'I am allergics to nuts'], 'I am allergic to nuts'),
                    $this->tapWord('She is allergic to milk', ['milk', 'She', 'allergic', 'is', 'to'], ['She', 'is', 'allergic', 'to', 'milk']),
                ],
            ],
            [
                'title' => 'Lesson 4: Asking About Ingredients',
                'order' => 4,
                'exercises' => [
                    $this->matchPairs('Ingredients', ['Ingredients', 'Recipe', 'Portion', 'Flavor'], 'Ingredients'),
                    $this->fillBlank('Does this soup ____ dairy?', ['contain', 'contains', 'containing', 'contained'], 'contain'),
                    $this->tapWord('Does this dish contain nuts', ['nuts', 'Does', 'this', 'dish', 'contain'], ['Does', 'this', 'dish', 'contain', 'nuts']),
                    $this->listenSelect('Is this dish vegan?', ['Is this dish vegan?', 'Is this dish spicy?', 'Is this dish cold?', 'Is this dish ready?']),
                    $this->multipleChoice('How do you ask if a dish has meat in it?', ['Does this dish contain meat?', 'This dish contain meat?', 'Is contain meat this dish?', 'Meat this dish contains?'], 'Does this dish contain meat?'),
                    $this->listenSelect('What are the ingredients?', ['What are the ingredients?', 'What is the price?', 'Where is the kitchen?', 'Who is the chef?']),
                ],
            ],
            [
                'title' => 'Lesson 5: Ordering Safely — Special Requests',
                'order' => 5,
                'exercises' => [
                    $this->matchPairs('Without', ['Without', 'With', 'Inside', 'Instead'], 'Without'),
                    $this->fillBlank('Could you make this dish ____ cheese?', ['without', 'with', 'inside', 'instead'], 'without'),
                    $this->tapWord('Can you make it without nuts', ['nuts', 'Can', 'you', 'make', 'it', 'without'], ['Can', 'you', 'make', 'it', 'without', 'nuts']),
                    $this->listenSelect('Can I have that without dairy?', ['Can I have that without dairy?', 'Can I have more rice?', 'Can I have the bill?', 'Can I have a fork?']),
                    $this->multipleChoice('What does "instead of" mean?', ['In place of something else', 'In addition to something', 'At the same time as', 'Before something'], 'In place of something else'),
                    $this->multipleChoice('What is the best way to ask for a dish without nuts?', ['Could you make this without nuts, please?', 'Give me food now', 'I hate nuts', 'Nuts are bad'], 'Could you make this without nuts, please?'),
                ],
            ],
            [
                'title' => 'Lesson 6: Menu Labels & Alternatives',
                'order' => 6,
                'exercises' => [
                    $this->matchPairs('Gluten-free', ['Gluten-free', 'Sugar-free', 'Fat-free', 'Salt-free'], 'Gluten-free'),
                    $this->fillBlank('This bread is gluten-free, so it is ____ for you.', ['safe', 'safety', 'safely', 'saved'], 'safe'),
                    $this->tapWord('This meal is dairy free', ['free', 'This', 'meal', 'is', 'dairy'], ['This', 'meal', 'is', 'dairy', 'free']),
                    $this->listenSelect('This label says nut-free', ['This label says nut-free', 'This label says sugar-free', 'This label says gluten-free', 'This label says dairy-free']),
                    $this->multipleChoice('What does a "plant-based" label mean?', ['Made only from plants, no animal products', 'Made only from meat', 'Made with extra sugar', 'Made with dairy products'], 'Made only from plants, no animal products'),
                    $this->fillBlank('This salad is ____ than the burger.', ['healthier', 'healthiest', 'health', 'healthy'], 'healthier'),
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
