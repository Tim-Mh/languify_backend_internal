<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Elma' => 'apple', 'Balık' => 'fish', 'Çorba' => 'soup', 'Salata' => 'salad',
        'Pirinç' => 'rice', 'Et' => 'meat', 'Ekmek' => 'bread', 'Su' => 'water',
    ];

    /**
     * Turkish Beginner Unit 4 — eating, drinking, and the accusative.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * THIS IS THE UNIT WHERE GRAMMAR STARTS, AND IT IS DELIBERATELY LATE.
     *
     * Turkish marks a *definite* direct object with an accusative suffix and
     * leaves an *indefinite* one bare:
     *
     *     elma yemek      eat an apple   (bare)
     *     elmayı yemek    eat the apple  (accusative)
     *
     * Units 1-3 stayed on the bare form on purpose, so the learner met three
     * units of real sentences before meeting a case. Here both forms appear
     * side by side, which is the only way the contrast is visible: teaching
     * `elmayı` alone would look like an arbitrary longer word for "apple".
     *
     * The suffix cannot be a tile of its own. It harmonises with the stem
     * vowel, takes a buffer -y- after a vowel, and softens a preceding
     * consonant — `elmayı`, `çorbayı`, `balığı`, `suyu` share no common ending.
     * Every accusative form is therefore its own vocabulary entry and its own
     * tile, and the learner assembles words, never morphemes.
     *
     * Word order is SOV: the verb goes last, always.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Eating & Drinking', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apple & Bread', 1,
                pictures: [['tr' => 'Elma', 'img' => 'apple'], ['tr' => 'Ekmek', 'img' => 'bread']],
                plain: [['tr' => 'Yemek'], ['tr' => 'Bir']],
                phrases: [
                    'a' => [
                        // Bare object: "an apple", no case marking.
                        'words' => ['bir', 'elma', 'yemek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple', 'correct' => ['to eat', 'an', 'apple'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Manger une pomme', 'correct' => ['manger', 'une', 'pomme'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Comer una manzana', 'correct' => ['comer', 'una', 'manzana'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Einen Apfel essen', 'correct' => ['einen', 'Apfel', 'essen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['빵']],
                        ],
                    ],
                    'b' => [
                        // Definite object: "the apple", accusative.
                        'words' => ['elmayı', 'yemek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the apple', 'correct' => ['to eat', 'the apple'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Manger la pomme', 'correct' => ['manger', 'la pomme'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Comer la manzana', 'correct' => ['comer', 'la manzana'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Den Apfel essen', 'correct' => ['den Apfel', 'essen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['빵']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'elma', 've', 'bir', 'ekmek', 'yemek'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple and a bread', 'correct' => ['to eat', 'an', 'apple', 'and', 'a', 'bread'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Manger une pomme et un pain', 'correct' => ['manger', 'une', 'pomme', 'et', 'un', 'pain'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Comer una manzana y un pan', 'correct' => ['comer', 'una', 'manzana', 'y', 'un', 'pan'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Einen Apfel und ein Brot essen', 'correct' => ['einen', 'Apfel', 'und', 'ein', 'Brot', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'りんごとパンを食べる', 'correct' => ['りんご', 'と', 'パン', 'を', '食べる'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '사과와 빵을 먹다', 'correct' => ['사과와', '빵을', '먹다'], 'extra' => ['생선']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Fish & Meat', 2,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Yemek'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'balık', 'yemek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To eat a fish', 'correct' => ['to eat', 'a', 'fish'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Manger un poisson', 'correct' => ['manger', 'un', 'poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Comer un pescado', 'correct' => ['comer', 'un', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Einen Fisch essen', 'correct' => ['einen', 'Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べる', 'correct' => ['魚', 'を', '食べる'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹다', 'correct' => ['생선을', '먹다'], 'extra' => ['고기']],
                        ],
                    ],
                    'b' => [
                        // balığı, not balıkı: final k softens to ğ before a vowel.
                        'words' => ['balığı', 'yemek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the fish', 'correct' => ['to eat', 'the fish'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Manger le poisson', 'correct' => ['manger', 'le poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Comer el pescado', 'correct' => ['comer', 'el pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Den Fisch essen', 'correct' => ['den Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べる', 'correct' => ['魚', 'を', '食べる'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹다', 'correct' => ['생선을', '먹다'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['balık', 've', 'et', 'yemek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'To eat fish and meat', 'correct' => ['to eat', 'fish', 'and', 'meat'], 'extra' => ['rice']],
                            'fr' => ['sentence' => 'Manger du poisson et de la viande', 'correct' => ['manger', 'poisson', 'et', 'viande'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Comer pescado y carne', 'correct' => ['comer', 'pescado', 'y', 'carne'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Fisch und Fleisch essen', 'correct' => ['Fisch', 'und', 'Fleisch', 'essen'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => '魚と肉を食べる', 'correct' => ['魚', 'と', '肉', 'を', '食べる'], 'extra' => ['米']],
                            'ko' => ['sentence' => '생선과 고기를 먹다', 'correct' => ['생선과', '고기를', '먹다'], 'extra' => ['쌀']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Soup & Salad', 3,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Salata', 'img' => 'salad']],
                plain: [['tr' => 'Yemek'], ['tr' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'çorba', 'yemek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To eat a soup', 'correct' => ['to eat', 'a', 'soup'], 'extra' => ['salad']],
                            'fr' => ['sentence' => 'Manger une soupe', 'correct' => ['manger', 'une', 'soupe'], 'extra' => ['salade']],
                            'es' => ['sentence' => 'Comer una sopa', 'correct' => ['comer', 'una', 'sopa'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Eine Suppe essen', 'correct' => ['eine', 'Suppe', 'essen'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => 'スープを食べる', 'correct' => ['スープ', 'を', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '수프를 먹다', 'correct' => ['수프를', '먹다'], 'extra' => ['샐러드']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çorbayı', 'yemek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the soup', 'correct' => ['to eat', 'the soup'], 'extra' => ['salad']],
                            'fr' => ['sentence' => 'Manger la soupe', 'correct' => ['manger', 'la soupe'], 'extra' => ['salade']],
                            'es' => ['sentence' => 'Comer la sopa', 'correct' => ['comer', 'la sopa'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Die Suppe essen', 'correct' => ['die Suppe', 'essen'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => 'スープを食べる', 'correct' => ['スープ', 'を', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '수프를 먹다', 'correct' => ['수프를', '먹다'], 'extra' => ['샐러드']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'çorba', 've', 'bir', 'salata'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A soup and a salad', 'correct' => ['a', 'soup', 'and', 'a', 'salad'], 'extra' => ['rice']],
                            'fr' => ['sentence' => 'Une soupe et une salade', 'correct' => ['une', 'soupe', 'et', 'une', 'salade'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Una sopa y una ensalada', 'correct' => ['una', 'sopa', 'y', 'una', 'ensalada'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Eine Suppe und ein Salat', 'correct' => ['eine', 'Suppe', 'und', 'ein', 'Salat'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'スープとサラダ', 'correct' => ['スープ', 'と', 'サラダ'], 'extra' => ['米']],
                            'ko' => ['sentence' => '수프와 샐러드', 'correct' => ['수프와', '샐러드'], 'extra' => ['쌀']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Drinking', 4,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Çay', 'img' => 'tea']],
                plain: [['tr' => 'İçmek'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'su', 'içmek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To drink a water', 'correct' => ['to drink', 'a', 'water'], 'extra' => ['tea']],
                            'fr' => ['sentence' => 'Boire une eau', 'correct' => ['boire', 'une', 'eau'], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Beber un agua', 'correct' => ['beber', 'un', 'agua'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ein Wasser trinken', 'correct' => ['ein', 'Wasser', 'trinken'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '水を飲む', 'correct' => ['水', 'を', '飲む'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '물을 마시다', 'correct' => ['물을', '마시다'], 'extra' => ['차']],
                        ],
                    ],
                    'b' => [
                        // suyu: the buffer -y- appears because `su` ends in a vowel.
                        'words' => ['suyu', 'içmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink the water', 'correct' => ['to drink', 'the water'], 'extra' => ['tea']],
                            'fr' => ['sentence' => "Boire l'eau", 'correct' => ['boire', "l'eau"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Beber el agua', 'correct' => ['beber', 'el agua'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Das Wasser trinken', 'correct' => ['das Wasser', 'trinken'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '水を飲む', 'correct' => ['水', 'を', '飲む'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '물을 마시다', 'correct' => ['물을', '마시다'], 'extra' => ['차']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'çay', 've', 'bir', 'su', 'içmek'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'To drink a tea and a water', 'correct' => ['to drink', 'a', 'tea', 'and', 'a', 'water'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Boire un thé et une eau', 'correct' => ['boire', 'un', 'thé', 'et', 'une', 'eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Beber un té y un agua', 'correct' => ['beber', 'un', 'té', 'y', 'un', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Tee und ein Wasser trinken', 'correct' => ['einen', 'Tee', 'und', 'ein', 'Wasser', 'trinken'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'お茶と水を飲む', 'correct' => ['お茶', 'と', '水', 'を', '飲む'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '차와 물을 마시다', 'correct' => ['차와', '물을', '마시다'], 'extra' => ['우유']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A Meal', 5,
                pictures: [['tr' => 'Pirinç', 'img' => 'rice'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Yemek'], ['tr' => 'İçmek']],
                phrases: [
                    'a' => [
                        'words' => ['pirinç', 've', 'et', 'yemek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'To eat rice and meat', 'correct' => ['to eat', 'rice', 'and', 'meat'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Manger du riz et de la viande', 'correct' => ['manger', 'riz', 'et', 'viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Comer arroz y carne', 'correct' => ['comer', 'arroz', 'y', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Reis und Fleisch essen', 'correct' => ['Reis', 'und', 'Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '米と肉を食べる', 'correct' => ['米', 'と', '肉', 'を', '食べる'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '쌀과 고기를 먹다', 'correct' => ['쌀과', '고기를', '먹다'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'salata', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a salad', 'correct' => ['I would like', 'a', 'salad'], 'extra' => ['soup']],
                            'fr' => ['sentence' => 'Je voudrais une salade', 'correct' => ['je voudrais', 'une', 'salade'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Quisiera una ensalada', 'correct' => ['quisiera', 'una', 'ensalada'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte einen Salat', 'correct' => ['ich möchte', 'einen', 'Salat'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'サラダをください', 'correct' => ['サラダ', 'を', 'ください'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '샐러드를 주세요', 'correct' => ['샐러드를', '주세요'], 'extra' => ['수프']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'çorba', 'istiyorum', 've', 'su', 'içmek'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I would like a soup and to drink water', 'correct' => ['I would like', 'a', 'soup', 'and', 'to drink', 'water'], 'extra' => ['meat']],
                            'fr' => ['sentence' => "Je voudrais une soupe et boire de l'eau", 'correct' => ['je voudrais', 'une', 'soupe', 'et', 'boire', 'eau'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Quisiera una sopa y beber agua', 'correct' => ['quisiera', 'una', 'sopa', 'y', 'beber', 'agua'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich möchte eine Suppe und Wasser trinken', 'correct' => ['ich möchte', 'eine', 'Suppe', 'und', 'Wasser', 'trinken'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'スープをください、そして水を飲む', 'correct' => ['スープ', 'を', 'ください', 'そして', '水', 'を', '飲む'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '수프를 주세요 그리고 물을 마시다', 'correct' => ['수프를', '주세요', '그리고', '물을', '마시다'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
