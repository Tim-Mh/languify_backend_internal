<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket02Seeder extends Seeder
{
    private const PICTURES = ['사과' => 'apple', '바나나' => 'banana', '오렌지' => 'orange', '포도' => 'grapes', '바구니' => 'basket'];

    /**
     * Korean Supermarket, Unit 2, the Korean twin of the English "Fruit" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, '유닛 2: 과일', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 사과 · 바나나', 1,
                pictures: [['ko' => '사과', 'img' => 'apple'], ['ko' => '바나나', 'img' => 'banana']],
                plain: [['ko' => '과일'], ['ko' => '킬로']],
                phrases: [
                    'a' => [
                        'words' => ['과일', '일', '킬로'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a kilo of fruits', 'correct' => ['a', 'kilo', 'of', 'fruits'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'Un kilo de frutas', 'correct' => ['un', 'kilo', 'de', 'frutas'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Ein Kilo Früchte', 'correct' => ['ein', 'Kilo', 'von', 'Früchte'], 'extra' => ['Apfel', 'Banane']],
                            'fr' => ['sentence' => 'Un kilo de fruits', 'correct' => ['un', 'kilo', 'de', 'fruits'], 'extra' => ['pomme', 'banane']],
                            'ja' => ['sentence' => '果物一キロ', 'correct' => ['果物', '一', 'キロ'], 'extra' => ['りんご']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과와', '바나나'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an apple and a banana', 'correct' => ['an', 'apple', 'and', 'a', 'banana'], 'extra' => ['kilo']],
                            'es' => ['sentence' => 'Una manzana y un plátano', 'correct' => ['una', 'manzana', 'y', 'un', 'plátano'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Ein Apfel und eine Banane', 'correct' => ['ein', 'Apfel', 'und', 'eine', 'Banane'], 'extra' => ['Kilo']],
                            'fr' => ['sentence' => 'Une pomme et une banane', 'correct' => ['une', 'pomme', 'et', 'une', 'banane'], 'extra' => ['kilo']],
                            'ja' => ['sentence' => 'りんごとバナナ', 'correct' => ['りんご', 'と', 'バナナ'], 'extra' => ['キロ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['바구니', '안의', '과일'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'some fruits in the basket', 'correct' => ['some', 'fruits', 'in', 'the', 'basket'], 'extra' => ['kilo']],
                            'es' => ['sentence' => 'Algo de frutas en la cesta', 'correct' => ['algo de', 'frutas', 'en', 'la', 'cesta'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Etwas Früchte im Korb', 'correct' => ['etwas', 'Früchte', 'in', 'dem', 'Korb'], 'extra' => ['Kilo']],
                            'fr' => ['sentence' => 'Des fruits dans le panier', 'correct' => ['du', 'fruits', 'dans', 'le', 'panier'], 'extra' => ['kilo']],
                            'ja' => ['sentence' => 'かごの中の果物', 'correct' => ['かご', 'の', '中', 'の', '果物'], 'extra' => ['キロ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 오렌지 · 포도', 2,
                pictures: [['ko' => '오렌지', 'img' => 'orange'], ['ko' => '포도', 'img' => 'grapes']],
                plain: [['ko' => '고르다'], ['ko' => '사다']],
                phrases: [
                    'a' => [
                        'words' => ['오렌지를', '고르세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to choose an orange', 'correct' => ['to choose', 'an', 'orange'], 'extra' => ['to buy']],
                            'es' => ['sentence' => 'Elegir una naranja', 'correct' => ['elegir', 'una', 'naranja'], 'extra' => ['comprar', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange wählen', 'correct' => ['eine', 'Orange', 'wählen'], 'extra' => ['kaufen', 'Trauben']],
                            'fr' => ['sentence' => 'Choisir une orange', 'correct' => ['choisir', 'une', 'orange'], 'extra' => ['acheter', 'raisin']],
                            'ja' => ['sentence' => 'オレンジを選ぶ', 'correct' => ['オレンジ', 'を', '選ぶ'], 'extra' => ['買う']],
                        ],
                    ],
                    'b' => [
                        'words' => ['포도를', '사세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to buy the grapes', 'correct' => ['to buy', 'the', 'grapes'], 'extra' => ['to choose']],
                            'es' => ['sentence' => 'Comprar las uvas', 'correct' => ['comprar', 'las', 'uvas'], 'extra' => ['elegir', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben kaufen', 'correct' => ['die', 'Trauben', 'kaufen'], 'extra' => ['wählen', 'Orange']],
                            'fr' => ['sentence' => 'Acheter le raisin', 'correct' => ['acheter', 'le', 'raisin'], 'extra' => ['choisir']],
                            'ja' => ['sentence' => 'ぶどうを買う', 'correct' => ['ぶどう', 'を', '買う'], 'extra' => ['選ぶ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['오렌지', '또는', '포도'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'an orange or grapes', 'correct' => ['an', 'orange', 'or', 'grapes'], 'extra' => ['to buy']],
                            'es' => ['sentence' => 'Una naranja o uvas', 'correct' => ['una', 'naranja', 'o', 'uvas'], 'extra' => ['comprar']],
                            'de' => ['sentence' => 'Eine Orange oder Trauben', 'correct' => ['eine', 'Orange', 'oder', 'Trauben'], 'extra' => ['kaufen']],
                            'fr' => ['sentence' => 'Une orange ou du raisin', 'correct' => ['une', 'orange', 'ou', 'raisin'], 'extra' => ['acheter']],
                            'ja' => ['sentence' => 'オレンジかぶどう', 'correct' => ['オレンジ', 'か', 'ぶどう'], 'extra' => ['買う']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 사과 · 오렌지', 3,
                pictures: [['ko' => '사과', 'img' => 'apple'], ['ko' => '오렌지', 'img' => 'orange']],
                plain: [['ko' => '비교하다'], ['ko' => '더 좋은']],
                phrases: [
                    'a' => [
                        'words' => ['과일을', '비교하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to compare the fruits', 'correct' => ['to compare', 'the', 'fruits'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Comparar las frutas', 'correct' => ['comparar', 'las', 'frutas'], 'extra' => ['mejor', 'manzana']],
                            'de' => ['sentence' => 'Die Früchte vergleichen', 'correct' => ['die', 'Früchte', 'vergleichen'], 'extra' => ['besser', 'Apfel']],
                            'fr' => ['sentence' => 'Comparer les fruits', 'correct' => ['comparer', 'les', 'fruits'], 'extra' => ['meilleur', 'pomme']],
                            'ja' => ['sentence' => '果物を比べる', 'correct' => ['果物', 'を', '比べる'], 'extra' => ['もっと良い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과가', '더', '좋다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the apple is better', 'correct' => ['the', 'apple', 'is', 'better'], 'extra' => ['to compare']],
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['comparar', 'naranja']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['vergleichen', 'Orange']],
                            'fr' => ['sentence' => 'La pomme est meilleure', 'correct' => ['la', 'pomme', 'est', 'meilleur'], 'extra' => ['comparer']],
                            'ja' => ['sentence' => 'りんごの方が良い', 'correct' => ['りんご', 'の', '方', 'が', '良い'], 'extra' => ['比べる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['사과와', '오렌지를', '비교하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to compare an apple and an orange', 'correct' => ['to compare', 'an', 'apple', 'and', 'an', 'orange'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Comparar una manzana y una naranja', 'correct' => ['comparar', 'una', 'manzana', 'y', 'una', 'naranja'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Einen Apfel und eine Orange vergleichen', 'correct' => ['einen', 'Apfel', 'und', 'eine', 'Orange', 'vergleichen'], 'extra' => ['besser']],
                            'fr' => ['sentence' => 'Comparer une pomme et une orange', 'correct' => ['comparer', 'une', 'pomme', 'et', 'une', 'orange'], 'extra' => ['meilleur']],
                            'ja' => ['sentence' => 'りんごとオレンジを比べる', 'correct' => ['りんご', 'と', 'オレンジ', 'を', '比べる'], 'extra' => ['もっと良い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 포도 · 바나나', 4,
                pictures: [['ko' => '포도', 'img' => 'grapes'], ['ko' => '바나나', 'img' => 'banana']],
                plain: [['ko' => '그램'], ['ko' => '가벼운']],
                phrases: [
                    'a' => [
                        'words' => ['포도는', '가볍습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the grapes are light', 'correct' => ['the', 'grapes', 'are', 'light'], 'extra' => ['gram']],
                            'es' => ['sentence' => 'Las uvas son ligeras', 'correct' => ['las', 'uvas', 'son', 'ligero'], 'extra' => ['gramo', 'plátano']],
                            'de' => ['sentence' => 'Die Trauben sind leicht', 'correct' => ['die', 'Trauben', 'sind', 'leicht'], 'extra' => ['Gramm', 'Banane']],
                            'fr' => ['sentence' => 'Le raisin est léger', 'correct' => ['le', 'raisin', 'est', 'léger'], 'extra' => ['gramme', 'banane']],
                            'ja' => ['sentence' => 'ぶどうは軽いです', 'correct' => ['ぶどう', 'は', '軽い', 'です'], 'extra' => ['グラム']],
                        ],
                    ],
                    'b' => [
                        'words' => ['과일', '일', '그램'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a gram of fruits', 'correct' => ['a', 'gram', 'of', 'fruits'], 'extra' => ['light']],
                            'es' => ['sentence' => 'Un gramo de frutas', 'correct' => ['un', 'gramo', 'de', 'frutas'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Früchte', 'correct' => ['ein', 'Gramm', 'von', 'Früchte'], 'extra' => ['leicht', 'Trauben']],
                            'fr' => ['sentence' => 'Un gramme de fruits', 'correct' => ['un', 'gramme', 'de', 'fruits'], 'extra' => ['léger']],
                            'ja' => ['sentence' => '果物一グラム', 'correct' => ['果物', '一', 'グラム'], 'extra' => ['軽い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['바나나', '일', '그램'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a gram of banana', 'correct' => ['a', 'gram', 'of', 'banana'], 'extra' => ['light']],
                            'es' => ['sentence' => 'Un gramo de plátano', 'correct' => ['un', 'gramo', 'de', 'plátano'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Banane', 'correct' => ['ein', 'Gramm', 'von', 'Banane'], 'extra' => ['leicht', 'Trauben']],
                            'fr' => ['sentence' => 'Un gramme de banane', 'correct' => ['un', 'gramme', 'de', 'banane'], 'extra' => ['léger']],
                            'ja' => ['sentence' => 'バナナ一グラム', 'correct' => ['バナナ', '一', 'グラム'], 'extra' => ['軽い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 바구니 · 사과', 5,
                pictures: [['ko' => '바구니', 'img' => 'basket'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '넣다'], ['ko' => '더']],
                phrases: [
                    'a' => [
                        'words' => ['사과를', '바구니에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put an apple in the basket', 'correct' => ['to put', 'an', 'apple', 'in', 'the', 'basket'], 'extra' => ['more']],
                            'es' => ['sentence' => 'Poner una manzana en la cesta', 'correct' => ['poner', 'una', 'manzana', 'en', 'la', 'cesta'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Einen Apfel in den Korb legen', 'correct' => ['einen', 'Apfel', 'in', 'den', 'Korb', 'legen'], 'extra' => ['mehr']],
                            'fr' => ['sentence' => 'Mettre une pomme dans le panier', 'correct' => ['mettre', 'une', 'pomme', 'dans', 'le', 'panier'], 'extra' => ['plus']],
                            'ja' => ['sentence' => 'りんごをかごに入れる', 'correct' => ['りんご', 'を', 'かご', 'に', '入れる'], 'extra' => ['もっと']],
                        ],
                    ],
                    'b' => [
                        'words' => ['더', '많은', '과일'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'more fruits', 'correct' => ['more', 'fruits'], 'extra' => ['to put']],
                            'es' => ['sentence' => 'Más frutas', 'correct' => ['más', 'frutas'], 'extra' => ['poner', 'cesta']],
                            'de' => ['sentence' => 'Mehr Früchte', 'correct' => ['mehr', 'Früchte'], 'extra' => ['legen', 'Korb']],
                            'fr' => ['sentence' => 'Plus de fruits', 'correct' => ['plus', 'fruits'], 'extra' => ['mettre']],
                            'ja' => ['sentence' => 'もっと果物', 'correct' => ['もっと', '果物'], 'extra' => ['入れる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['더', '많은', '과일을', '넣으세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'to put more fruits', 'correct' => ['to put', 'more', 'fruits'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'Poner más frutas', 'correct' => ['poner', 'más', 'frutas'], 'extra' => ['manzana', 'cesta']],
                            'de' => ['sentence' => 'Mehr Früchte legen', 'correct' => ['mehr', 'Früchte', 'legen'], 'extra' => ['Apfel', 'Korb']],
                            'fr' => ['sentence' => 'Mettre plus de fruits', 'correct' => ['mettre', 'plus', 'fruits'], 'extra' => ['pomme']],
                            'ja' => ['sentence' => 'もっと果物を入れる', 'correct' => ['もっと', '果物', 'を', '入れる'], 'extra' => ['りんご']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
