<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket02Seeder extends Seeder
{
    private const PICTURES = [
        'Pomme' => 'apple', 'Banane' => 'banana', 'Orange' => 'orange', 'Raisin' => 'grapes',
        'Panier' => 'basket', 'Boîte' => 'box', 'Tomate' => 'tomato', 'Carotte' => 'carrot',
    ];

    /**
     * French Chapter 4, Unit 2 — fruit.
     *
     * Fruit names are the easiest new nouns in the chapter, so the abstract
     * half of each lesson does the heavier lifting: quantities (kilo, gramme),
     * choosing (choisir, préférer) and putting things in the basket (mettre).
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Fruit', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apples and Bananas', 1,
                pictures: [['fr' => 'Pomme', 'img' => 'apple'], ['fr' => 'Banane', 'img' => 'banana']],
                plain: [['fr' => 'Fruits'], ['fr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'kilo', 'de', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A kilo of fruits', 'correct' => ['a', 'kilo', 'of', 'fruits'], 'extra' => ['apple', 'banana']],
                            'es' => ['sentence' => 'Un kilo de frutas', 'correct' => ['un', 'kilo', 'de', 'frutas'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Ein Kilo Früchte', 'correct' => ['ein', 'Kilo', 'von', 'Früchte'], 'extra' => ['Apfel', 'Banane']],
                            'ja' => ['sentence' => '果物一キロ', 'correct' => ['果物', '一', 'キロ'], 'extra' => ['りんご', 'バナナ']],
                            'ko' => ['sentence' => '과일 일 킬로', 'correct' => ['과일', '일', '킬로'], 'extra' => ['사과', '바나나']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'pomme', 'et', 'une', 'banane'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'An apple and a banana', 'correct' => ['an', 'apple', 'and', 'a', 'banana'], 'extra' => ['kilo', 'fruits']],
                            'es' => ['sentence' => 'Una manzana y un plátano', 'correct' => ['una', 'manzana', 'y', 'un', 'plátano'], 'extra' => ['kilo', 'frutas']],
                            'de' => ['sentence' => 'Ein Apfel und eine Banane', 'correct' => ['ein', 'Apfel', 'und', 'eine', 'Banane'], 'extra' => ['Kilo', 'Früchte']],
                            'ja' => ['sentence' => 'りんごとバナナ', 'correct' => ['りんご', 'と', 'バナナ'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '사과와 바나나', 'correct' => ['사과와', '바나나'], 'extra' => ['킬로']],
                        ],
                    ],
                    'c' => [
                        'words' => ['des', 'fruits', 'dans', 'le', 'panier'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Some fruits in the basket', 'correct' => ['some', 'fruits', 'in', 'the', 'basket'], 'extra' => ['kilo', 'apple']],
                            'es' => ['sentence' => 'Unas frutas en la cesta', 'correct' => ['unas', 'frutas', 'en', 'la', 'cesta'], 'extra' => ['kilo', 'manzana']],
                            'de' => ['sentence' => 'Einige Früchte im Korb', 'correct' => ['einige', 'Früchte', 'in', 'dem', 'Korb'], 'extra' => ['Kilo', 'Apfel']],
                            'ja' => ['sentence' => 'かごの中の果物', 'correct' => ['かご', 'の', '中', 'の', '果物'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '바구니 안의 과일', 'correct' => ['바구니', '안의', '과일'], 'extra' => ['킬로']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Oranges and Grapes', 2,
                pictures: [['fr' => 'Orange', 'img' => 'orange'], ['fr' => 'Raisin', 'img' => 'grapes']],
                plain: [['fr' => 'Choisir'], ['fr' => 'Préférer']],
                phrases: [
                    'a' => [
                        'words' => ['choisir', 'une', 'orange'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To choose an orange', 'correct' => ['to choose', 'an', 'orange'], 'extra' => ['to prefer', 'grapes']],
                            'es' => ['sentence' => 'Elegir una naranja', 'correct' => ['elegir', 'una', 'naranja'], 'extra' => ['preferir', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange wählen', 'correct' => ['eine', 'Orange', 'wählen'], 'extra' => ['bevorzugen', 'Trauben']],
                            'ja' => ['sentence' => 'オレンジを選ぶ', 'correct' => ['オレンジ', 'を', '選ぶ'], 'extra' => ['ぶどう']],
                            'ko' => ['sentence' => '오렌지를 고르다', 'correct' => ['오렌지를', '고르다'], 'extra' => ['포도']],
                        ],
                    ],
                    'b' => [
                        'words' => ['préférer', 'le', 'raisin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To prefer the grapes', 'correct' => ['to prefer', 'the', 'grapes'], 'extra' => ['to choose', 'orange']],
                            'es' => ['sentence' => 'Preferir las uvas', 'correct' => ['preferir', 'las', 'uvas'], 'extra' => ['elegir', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben bevorzugen', 'correct' => ['die', 'Trauben', 'bevorzugen'], 'extra' => ['wählen', 'Orange']],
                            'ja' => ['sentence' => 'ぶどうを好む', 'correct' => ['ぶどう', 'を', '好む'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '포도를 선호하다', 'correct' => ['포도를', '선호하다'], 'extra' => ['오렌지']],
                        ],
                    ],
                    'c' => [
                        'words' => ['choisir', 'une', 'orange', 'ou', 'du', 'raisin'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To choose an orange or some grapes', 'correct' => ['to choose', 'an', 'orange', 'or', 'some', 'grapes'], 'extra' => ['to prefer']],
                            'es' => ['sentence' => 'Elegir una naranja o unas uvas', 'correct' => ['elegir', 'una', 'naranja', 'o', 'algo de', 'uvas'], 'extra' => ['preferir']],
                            'de' => ['sentence' => 'Eine Orange oder Trauben wählen', 'correct' => ['wählen', 'eine', 'Orange', 'oder', 'etwas', 'Trauben'], 'extra' => ['bevorzugen']],
                            'ja' => ['sentence' => 'オレンジかぶどうを選ぶ', 'correct' => ['オレンジ', 'か', 'ぶどう', 'を', '選ぶ'], 'extra' => ['好む']],
                            'ko' => ['sentence' => '오렌지 또는 포도를 고르다', 'correct' => ['오렌지', '또는', '포도를', '고르다'], 'extra' => ['선호하다']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Comparing Fruit', 3,
                pictures: [['fr' => 'Pomme', 'img' => 'apple'], ['fr' => 'Orange', 'img' => 'orange']],
                plain: [['fr' => 'Comparer'], ['fr' => 'Meilleur']],
                phrases: [
                    'a' => [
                        'words' => ['comparer', 'les', 'fruits'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To compare the fruits', 'correct' => ['to compare', 'the', 'fruits'], 'extra' => ['better', 'apple']],
                            'es' => ['sentence' => 'Comparar las frutas', 'correct' => ['comparar', 'las', 'frutas'], 'extra' => ['mejor', 'manzana']],
                            'de' => ['sentence' => 'Die Früchte vergleichen', 'correct' => ['die', 'Früchte', 'vergleichen'], 'extra' => ['besser', 'Apfel']],
                            'ja' => ['sentence' => '果物を比べる', 'correct' => ['果物', 'を', '比べる'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '과일을 비교하다', 'correct' => ['과일을', '비교하다'], 'extra' => ['더 잘']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'fruit', 'est', 'meilleur'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The fruit is better', 'correct' => ['the', 'fruit', 'is', 'better'], 'extra' => ['to compare', 'orange']],
                            'es' => ['sentence' => 'La fruta es mejor', 'correct' => ['la', 'fruta', 'es', 'mejor'], 'extra' => ['comparar', 'naranja']],
                            'de' => ['sentence' => 'Das Obst ist besser', 'correct' => ['das', 'Obst', 'ist', 'besser'], 'extra' => ['vergleichen', 'Orange']],
                            'ja' => ['sentence' => '果物はもっと良いです', 'correct' => ['果物', 'は', 'もっと良い', 'です'], 'extra' => ['比べる']],
                            'ko' => ['sentence' => '과일은 더 좋습니다', 'correct' => ['과일은', '더', '좋습니다'], 'extra' => ['비교하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['comparer', 'une', 'pomme', 'et', 'une', 'orange'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To compare an apple and an orange', 'correct' => ['to compare', 'an', 'apple', 'and', 'an', 'orange'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Comparar una manzana y una naranja', 'correct' => ['comparar', 'una', 'manzana', 'y', 'una', 'naranja'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Einen Apfel und eine Orange vergleichen', 'correct' => ['einen', 'Apfel', 'und', 'eine', 'Orange', 'vergleichen'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'りんごとオレンジを比べる', 'correct' => ['りんご', 'と', 'オレンジ', 'を', '比べる'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '사과와 오렌지를 비교하다', 'correct' => ['사과와', '오렌지를', '비교하다'], 'extra' => ['더 잘']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Weighing It', 4,
                pictures: [['fr' => 'Raisin', 'img' => 'grapes'], ['fr' => 'Banane', 'img' => 'banana']],
                plain: [['fr' => 'Gramme'], ['fr' => 'Léger']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'raisin', 'est', 'léger'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The grapes are light', 'correct' => ['the', 'grapes', 'is', 'light'], 'extra' => ['gram', 'banana']],
                            'es' => ['sentence' => 'Las uvas son ligeras', 'correct' => ['las', 'uvas', 'es', 'ligero'], 'extra' => ['gramo', 'plátano']],
                            'de' => ['sentence' => 'Die Trauben sind leicht', 'correct' => ['die', 'Trauben', 'ist', 'leicht'], 'extra' => ['Gramm', 'Banane']],
                            'ja' => ['sentence' => 'ぶどうは軽いです', 'correct' => ['ぶどう', 'は', '軽い', 'です'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '포도는 가볍습니다', 'correct' => ['포도는', '가볍습니다'], 'extra' => ['그램']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'gramme', 'de', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A gram of fruits', 'correct' => ['a', 'gram', 'of', 'fruits'], 'extra' => ['light', 'grapes']],
                            'es' => ['sentence' => 'Un gramo de frutas', 'correct' => ['un', 'gramo', 'de', 'frutas'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Früchte', 'correct' => ['ein', 'Gramm', 'von', 'Früchte'], 'extra' => ['leicht', 'Trauben']],
                            'ja' => ['sentence' => '果物一グラム', 'correct' => ['果物', '一', 'グラム'], 'extra' => ['軽い']],
                            'ko' => ['sentence' => '과일 일 그램', 'correct' => ['과일', '일', '그램'], 'extra' => ['가벼운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'gramme', 'de', 'banane'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A gram of banana', 'correct' => ['a', 'gram', 'of', 'banana'], 'extra' => ['light', 'grapes']],
                            'es' => ['sentence' => 'Un gramo de plátano', 'correct' => ['un', 'gramo', 'de', 'plátano'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Banane', 'correct' => ['ein', 'Gramm', 'von', 'Banane'], 'extra' => ['leicht', 'Trauben']],
                            'ja' => ['sentence' => 'バナナ一グラム', 'correct' => ['バナナ', '一', 'グラム'], 'extra' => ['軽い']],
                            'ko' => ['sentence' => '바나나 일 그램', 'correct' => ['바나나', '일', '그램'], 'extra' => ['가벼운']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Into the Basket', 5,
                pictures: [['fr' => 'Panier', 'img' => 'basket'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Mettre'], ['fr' => 'Beaucoup']],
                phrases: [
                    'a' => [
                        'words' => ['mettre', 'une', 'pomme', 'dans', 'le', 'panier'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To put an apple in the basket', 'correct' => ['to put', 'an', 'apple', 'in', 'the', 'basket'], 'extra' => ['a lot']],
                            'es' => ['sentence' => 'Poner una manzana en la cesta', 'correct' => ['poner', 'una', 'manzana', 'en', 'la', 'cesta'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Einen Apfel in den Korb legen', 'correct' => ['einen', 'Apfel', 'in', 'den', 'Korb', 'legen'], 'extra' => ['viel']],
                            'ja' => ['sentence' => 'りんごをかごに入れる', 'correct' => ['りんご', 'を', 'かご', 'に', '入れる'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '사과를 바구니에 넣다', 'correct' => ['사과를', '바구니에', '넣다'], 'extra' => ['많이']],
                        ],
                    ],
                    'b' => [
                        'words' => ['beaucoup', 'de', 'fruits'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A lot of fruits', 'correct' => ['a lot', 'of', 'fruits'], 'extra' => ['to put', 'basket']],
                            'es' => ['sentence' => 'Muchas frutas', 'correct' => ['mucho', 'de', 'frutas'], 'extra' => ['poner', 'cesta']],
                            'de' => ['sentence' => 'Viele Früchte', 'correct' => ['viel', 'von', 'Früchte'], 'extra' => ['legen', 'Korb']],
                            'ja' => ['sentence' => 'たくさんの果物', 'correct' => ['たくさん', 'の', '果物'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '많은 과일', 'correct' => ['많은', '과일'], 'extra' => ['넣다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'beaucoup', 'de', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To put a lot of fruits', 'correct' => ['to put', 'a lot', 'of', 'fruits'], 'extra' => ['apple', 'basket']],
                            'es' => ['sentence' => 'Poner muchas frutas', 'correct' => ['poner', 'mucho', 'de', 'frutas'], 'extra' => ['manzana', 'cesta']],
                            'de' => ['sentence' => 'Viele Früchte legen', 'correct' => ['legen', 'viel', 'von', 'Früchte'], 'extra' => ['Apfel', 'Korb']],
                            'ja' => ['sentence' => 'たくさんの果物を入れる', 'correct' => ['たくさん', 'の', '果物', 'を', '入れる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '많은 과일을 넣다', 'correct' => ['많은', '과일을', '넣다'], 'extra' => ['사과']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
