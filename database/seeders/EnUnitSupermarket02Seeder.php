<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket02Seeder extends Seeder
{
    private const PICTURES = [
        'Apple' => 'apple', 'Banana' => 'banana', 'Orange' => 'orange', 'Grapes' => 'grapes',
        'Basket' => 'basket', 'Box' => 'box', 'Tomato' => 'tomato', 'Carrot' => 'carrot',
    ];

    /**
     * English Chapter 4, Unit 2 — fruit.
     *
     * Fruit names are the easiest new nouns, so the abstract half does the
     * heavier lifting: quantities (kilo, gram), choosing, and putting things in
     * the basket.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Fruit', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apples and Bananas', 1,
                pictures: [['en' => 'Apple', 'img' => 'apple'], ['en' => 'Banana', 'img' => 'banana']],
                plain: [['en' => 'Fruits'], ['en' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'kilo', 'of', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un kilo de frutas', 'correct' => ['un', 'kilo', 'de', 'frutas'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Ein Kilo Früchte', 'correct' => ['ein', 'Kilo', 'von', 'Früchte'], 'extra' => ['Apfel', 'Banane']],
                            'ja' => ['sentence' => '果物一キロ', 'correct' => ['果物', '一', 'キロ'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '과일 일 킬로', 'correct' => ['과일', '일', '킬로'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'Un kilo de fruits', 'correct' => ['un', 'kilo', 'de', 'fruits'], 'extra' => ['pomme', 'banane']],
                            'tr' => ['sentence' => 'bir kilo meyve', 'correct' => ['bir', 'kilo', 'meyve'], 'extra' => []],
                        'ru' => ['sentence' => 'кило фрукты', 'correct' => ['кило', 'фрукты'], 'extra' => []],
                        'ar' => ['sentence' => 'كيلو فواكه', 'correct' => ['كيلو', 'فواكه'], 'extra' => []],
                        'az' => ['sentence' => 'bir kilo meyvələr', 'correct' => ['bir', 'kilo', 'meyvələr'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'apple', 'and', 'a', 'banana'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una manzana y un plátano', 'correct' => ['una', 'manzana', 'y', 'un', 'plátano'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Ein Apfel und eine Banane', 'correct' => ['ein', 'Apfel', 'und', 'eine', 'Banane'], 'extra' => ['Kilo']],
                            'ja' => ['sentence' => 'りんごとバナナ', 'correct' => ['りんご', 'と', 'バナナ'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '사과와 바나나', 'correct' => ['사과와', '바나나'], 'extra' => ['킬로']],
                            'fr' => ['sentence' => 'Une pomme et une banane', 'correct' => ['une', 'pomme', 'et', 'une', 'banane'], 'extra' => ['kilo']],
                            'tr' => ['sentence' => 'bir elma ve bir muz', 'correct' => ['bir', 'elma', 've', 'bir', 'muz'], 'extra' => []],
                        'ru' => ['sentence' => 'яблоко и банан', 'correct' => ['яблоко', 'и', 'банан'], 'extra' => []],
                        'ar' => ['sentence' => 'تفاحة و موزة', 'correct' => ['تفاحة', 'و', 'موزة'], 'extra' => []],
                        'az' => ['sentence' => 'bir alma və bir banan', 'correct' => ['bir', 'alma', 'və', 'bir', 'banan'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['some', 'fruits', 'in', 'the', 'basket'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de frutas en la cesta', 'correct' => ['algo de', 'frutas', 'en', 'la', 'cesta'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Etwas Früchte im Korb', 'correct' => ['etwas', 'Früchte', 'in', 'dem', 'Korb'], 'extra' => ['Kilo']],
                            'ja' => ['sentence' => 'かごの中の果物', 'correct' => ['かご', 'の', '中', 'の', '果物'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '바구니 안의 과일', 'correct' => ['바구니', '안의', '과일'], 'extra' => ['킬로']],
                            'fr' => ['sentence' => 'Des fruits dans le panier', 'correct' => ['du', 'fruits', 'dans', 'le', 'panier'], 'extra' => ['kilo']],
                            'tr' => ['sentence' => 'sepette biraz meyve', 'correct' => ['sepette', 'biraz', 'meyve'], 'extra' => []],
                        'ru' => ['sentence' => 'немного фрукты в корзина', 'correct' => ['немного', 'фрукты', 'в', 'корзина'], 'extra' => []],
                        'ar' => ['sentence' => 'بعض فواكه في سلة', 'correct' => ['بعض', 'فواكه', 'في', 'سلة'], 'extra' => []],
                        'az' => ['sentence' => 'bir az meyvələr içində səbət', 'correct' => ['bir az', 'meyvələr', 'içində', 'səbət'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Oranges and Grapes', 2,
                pictures: [['en' => 'Orange', 'img' => 'orange'], ['en' => 'Grapes', 'img' => 'grapes']],
                plain: [['en' => 'To choose'], ['en' => 'To buy']],
                phrases: [
                    'a' => [
                        'words' => ['to choose', 'an', 'orange'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Elegir una naranja', 'correct' => ['elegir', 'una', 'naranja'], 'extra' => ['comprar', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange wählen', 'correct' => ['eine', 'Orange', 'wählen'], 'extra' => ['kaufen', 'Trauben']],
                            'ja' => ['sentence' => 'オレンジを選ぶ', 'correct' => ['オレンジ', 'を', '選ぶ'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '오렌지를 고르다', 'correct' => ['오렌지를', '고르다'], 'extra' => ['사다']],
                            'fr' => ['sentence' => 'Choisir une orange', 'correct' => ['choisir', 'une', 'orange'], 'extra' => ['acheter', 'raisin']],
                            'tr' => ['sentence' => 'bir portakal seçmek', 'correct' => ['bir', 'portakal', 'seçmek'], 'extra' => []],
                        'ru' => ['sentence' => 'выбрать апельсин', 'correct' => ['выбрать', 'апельсин'], 'extra' => []],
                        'ar' => ['sentence' => 'الاختيار برتقالة', 'correct' => ['الاختيار', 'برتقالة'], 'extra' => []],
                        'az' => ['sentence' => 'seçmək bir portağal', 'correct' => ['seçmək', 'bir', 'portağal'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['to buy', 'the', 'grapes'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar las uvas', 'correct' => ['comprar', 'las', 'uvas'], 'extra' => ['elegir', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben kaufen', 'correct' => ['die', 'Trauben', 'kaufen'], 'extra' => ['wählen', 'Orange']],
                            'ja' => ['sentence' => 'ぶどうを買う', 'correct' => ['ぶどう', 'を', '買う'], 'extra' => ['選ぶ']],
                            'ko' => ['sentence' => '포도를 사다', 'correct' => ['포도를', '사다'], 'extra' => ['고르다']],
                            'fr' => ['sentence' => 'Acheter le raisin', 'correct' => ['acheter', 'le', 'raisin'], 'extra' => ['choisir']],
                            'tr' => ['sentence' => 'üzümü almak', 'correct' => ['üzümü', 'almak'], 'extra' => []],
                        'ru' => ['sentence' => 'купить виноград', 'correct' => ['купить', 'виноград'], 'extra' => []],
                        'ar' => ['sentence' => 'الشراء عنب', 'correct' => ['الشراء', 'عنب'], 'extra' => []],
                        'az' => ['sentence' => 'almaq üzüm', 'correct' => ['almaq', 'üzüm'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['an', 'orange', 'or', 'grapes'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Una naranja o uvas', 'correct' => ['una', 'naranja', 'o', 'uvas'], 'extra' => ['comprar']],
                            'de' => ['sentence' => 'Eine Orange oder Trauben', 'correct' => ['eine', 'Orange', 'oder', 'Trauben'], 'extra' => ['kaufen']],
                            'ja' => ['sentence' => 'オレンジかぶどう', 'correct' => ['オレンジ', 'か', 'ぶどう'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '오렌지 또는 포도', 'correct' => ['오렌지', '또는', '포도'], 'extra' => ['사다']],
                            'fr' => ['sentence' => 'Une orange ou du raisin', 'correct' => ['une', 'orange', 'ou', 'raisin'], 'extra' => ['acheter']],
                            'tr' => ['sentence' => 'bir portakal veya üzüm', 'correct' => ['bir', 'portakal', 'veya', 'üzüm'], 'extra' => []],
                        'ru' => ['sentence' => 'апельсин или виноград', 'correct' => ['апельсин', 'или', 'виноград'], 'extra' => []],
                        'ar' => ['sentence' => 'برتقالة أو عنب', 'correct' => ['برتقالة', 'أو', 'عنب'], 'extra' => []],
                        'az' => ['sentence' => 'bir portağal və ya üzüm', 'correct' => ['bir', 'portağal', 'və ya', 'üzüm'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Comparing Fruit', 3,
                pictures: [['en' => 'Apple', 'img' => 'apple'], ['en' => 'Orange', 'img' => 'orange']],
                plain: [['en' => 'To compare'], ['en' => 'Better']],
                phrases: [
                    'a' => [
                        'words' => ['to compare', 'the', 'fruits'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comparar las frutas', 'correct' => ['comparar', 'las', 'frutas'], 'extra' => ['mejor', 'manzana']],
                            'de' => ['sentence' => 'Die Früchte vergleichen', 'correct' => ['die', 'Früchte', 'vergleichen'], 'extra' => ['besser', 'Apfel']],
                            'ja' => ['sentence' => '果物を比べる', 'correct' => ['果物', 'を', '比べる'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '과일을 비교하다', 'correct' => ['과일을', '비교하다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Comparer les fruits', 'correct' => ['comparer', 'les', 'fruits'], 'extra' => ['meilleur', 'pomme']],
                            'tr' => ['sentence' => 'meyveleri karşılaştırmak', 'correct' => ['meyveleri', 'karşılaştırmak'], 'extra' => []],
                        'ru' => ['sentence' => 'сравнить фрукты', 'correct' => ['сравнить', 'фрукты'], 'extra' => []],
                        'ar' => ['sentence' => 'المقارنة فواكه', 'correct' => ['المقارنة', 'فواكه'], 'extra' => []],
                        'az' => ['sentence' => 'müqayisə etmək meyvələr', 'correct' => ['müqayisə etmək', 'meyvələr'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'apple', 'is', 'better'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['comparar', 'naranja']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['vergleichen', 'Orange']],
                            'ja' => ['sentence' => 'りんごの方が良い', 'correct' => ['りんご', 'の', '方', 'が', '良い'], 'extra' => ['比べる']],
                            'ko' => ['sentence' => '사과가 더 좋다', 'correct' => ['사과가', '더', '좋다'], 'extra' => ['비교하다']],
                            'fr' => ['sentence' => 'La pomme est meilleure', 'correct' => ['la', 'pomme', 'est', 'meilleur'], 'extra' => ['comparer']],
                            'tr' => ['sentence' => 'elma daha iyi', 'correct' => ['elma', 'daha', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'яблоко лучше', 'correct' => ['яблоко', 'лучше'], 'extra' => []],
                        'ar' => ['sentence' => 'تفاحة أحسن', 'correct' => ['تفاحة', 'أحسن'], 'extra' => []],
                        'az' => ['sentence' => 'alma daha yaxşı', 'correct' => ['alma', 'daha yaxşı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to compare', 'an', 'apple', 'and', 'an', 'orange'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Comparar una manzana y una naranja', 'correct' => ['comparar', 'una', 'manzana', 'y', 'una', 'naranja'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Einen Apfel und eine Orange vergleichen', 'correct' => ['einen', 'Apfel', 'und', 'eine', 'Orange', 'vergleichen'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'りんごとオレンジを比べる', 'correct' => ['りんご', 'と', 'オレンジ', 'を', '比べる'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '사과와 오렌지를 비교하다', 'correct' => ['사과와', '오렌지를', '비교하다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Comparer une pomme et une orange', 'correct' => ['comparer', 'une', 'pomme', 'et', 'une', 'orange'], 'extra' => ['meilleur']],
                            'tr' => ['sentence' => 'bir elma ve bir portakal karşılaştırmak', 'correct' => ['bir', 'elma', 've', 'bir', 'portakal', 'karşılaştırmak'], 'extra' => []],
                        'ru' => ['sentence' => 'сравнить яблоко и апельсин', 'correct' => ['сравнить', 'яблоко', 'и', 'апельсин'], 'extra' => []],
                        'ar' => ['sentence' => 'المقارنة تفاحة و برتقالة', 'correct' => ['المقارنة', 'تفاحة', 'و', 'برتقالة'], 'extra' => []],
                        'az' => ['sentence' => 'müqayisə etmək bir alma və bir portağal', 'correct' => ['müqayisə etmək', 'bir', 'alma', 'və', 'bir', 'portağal'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Weighing It', 4,
                pictures: [['en' => 'Grapes', 'img' => 'grapes'], ['en' => 'Banana', 'img' => 'banana']],
                plain: [['en' => 'Gram'], ['en' => 'Light']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'grapes', 'are', 'light'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Las uvas son ligeras', 'correct' => ['las', 'uvas', 'son', 'ligero'], 'extra' => ['gramo', 'plátano']],
                            'de' => ['sentence' => 'Die Trauben sind leicht', 'correct' => ['die', 'Trauben', 'sind', 'leicht'], 'extra' => ['Gramm', 'Banane']],
                            'ja' => ['sentence' => 'ぶどうは軽いです', 'correct' => ['ぶどう', 'は', '軽い', 'です'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '포도는 가볍습니다', 'correct' => ['포도는', '가볍습니다'], 'extra' => ['그램']],
                            'fr' => ['sentence' => 'Le raisin est léger', 'correct' => ['le', 'raisin', 'est', 'léger'], 'extra' => ['gramme', 'banane']],
                            'tr' => ['sentence' => 'üzüm hafif', 'correct' => ['üzüm', 'hafif'], 'extra' => []],
                        'ru' => ['sentence' => 'виноград лёгкий', 'correct' => ['виноград', 'лёгкий'], 'extra' => []],
                        'ar' => ['sentence' => 'عنب خفيف', 'correct' => ['عنب', 'خفيف'], 'extra' => []],
                        'az' => ['sentence' => 'üzüm yüngül', 'correct' => ['üzüm', 'yüngül'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'gram', 'of', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un gramo de frutas', 'correct' => ['un', 'gramo', 'de', 'frutas'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Früchte', 'correct' => ['ein', 'Gramm', 'von', 'Früchte'], 'extra' => ['leicht', 'Trauben']],
                            'ja' => ['sentence' => '果物一グラム', 'correct' => ['果物', '一', 'グラム'], 'extra' => ['軽い']],
                            'ko' => ['sentence' => '과일 일 그램', 'correct' => ['과일', '일', '그램'], 'extra' => ['가벼운']],
                            'fr' => ['sentence' => 'Un gramme de fruits', 'correct' => ['un', 'gramme', 'de', 'fruits'], 'extra' => ['léger']],
                            'tr' => ['sentence' => 'bir gram meyve', 'correct' => ['bir', 'gram', 'meyve'], 'extra' => []],
                        'ru' => ['sentence' => 'грамм фрукты', 'correct' => ['грамм', 'фрукты'], 'extra' => []],
                        'ar' => ['sentence' => 'غرام فواكه', 'correct' => ['غرام', 'فواكه'], 'extra' => []],
                        'az' => ['sentence' => 'bir qram meyvələr', 'correct' => ['bir', 'qram', 'meyvələr'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'gram', 'of', 'banana'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un gramo de plátano', 'correct' => ['un', 'gramo', 'de', 'plátano'], 'extra' => ['ligero', 'uvas']],
                            'de' => ['sentence' => 'Ein Gramm Banane', 'correct' => ['ein', 'Gramm', 'von', 'Banane'], 'extra' => ['leicht', 'Trauben']],
                            'ja' => ['sentence' => 'バナナ一グラム', 'correct' => ['バナナ', '一', 'グラム'], 'extra' => ['軽い']],
                            'ko' => ['sentence' => '바나나 일 그램', 'correct' => ['바나나', '일', '그램'], 'extra' => ['가벼운']],
                            'fr' => ['sentence' => 'Un gramme de banane', 'correct' => ['un', 'gramme', 'de', 'banane'], 'extra' => ['léger']],
                            'tr' => ['sentence' => 'bir gram muz', 'correct' => ['bir', 'gram', 'muz'], 'extra' => []],
                        'ru' => ['sentence' => 'грамм банан', 'correct' => ['грамм', 'банан'], 'extra' => []],
                        'ar' => ['sentence' => 'غرام موزة', 'correct' => ['غرام', 'موزة'], 'extra' => []],
                        'az' => ['sentence' => 'bir qram banan', 'correct' => ['bir', 'qram', 'banan'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Into the Basket', 5,
                pictures: [['en' => 'Basket', 'img' => 'basket'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'To put'], ['en' => 'More']],
                phrases: [
                    'a' => [
                        'words' => ['to put', 'an', 'apple', 'in', 'the', 'basket'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Poner una manzana en la cesta', 'correct' => ['poner', 'una', 'manzana', 'en', 'la', 'cesta'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Einen Apfel in den Korb legen', 'correct' => ['einen', 'Apfel', 'in', 'den', 'Korb', 'legen'], 'extra' => ['mehr']],
                            'ja' => ['sentence' => 'りんごをかごに入れる', 'correct' => ['りんご', 'を', 'かご', 'に', '入れる'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '사과를 바구니에 넣다', 'correct' => ['사과를', '바구니에', '넣다'], 'extra' => ['더']],
                            'fr' => ['sentence' => 'Mettre une pomme dans le panier', 'correct' => ['mettre', 'une', 'pomme', 'dans', 'le', 'panier'], 'extra' => ['plus']],
                            'tr' => ['sentence' => 'sepete bir elma koymak', 'correct' => ['sepete', 'bir', 'elma', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить яблоко в корзина', 'correct' => ['положить', 'яблоко', 'в', 'корзина'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع تفاحة في سلة', 'correct' => ['وضع', 'تفاحة', 'في', 'سلة'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq bir alma içində səbət', 'correct' => ['qoymaq', 'bir', 'alma', 'içində', 'səbət'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['more', 'fruits'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más frutas', 'correct' => ['más', 'frutas'], 'extra' => ['poner', 'cesta']],
                            'de' => ['sentence' => 'Mehr Früchte', 'correct' => ['mehr', 'Früchte'], 'extra' => ['legen', 'Korb']],
                            'ja' => ['sentence' => 'もっと果物', 'correct' => ['もっと', '果物'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '더 많은 과일', 'correct' => ['더', '많은', '과일'], 'extra' => ['넣다']],
                            'fr' => ['sentence' => 'Plus de fruits', 'correct' => ['plus', 'fruits'], 'extra' => ['mettre']],
                            'tr' => ['sentence' => 'daha çok meyve', 'correct' => ['daha', 'çok', 'meyve'], 'extra' => []],
                        'ru' => ['sentence' => 'больше фрукты', 'correct' => ['больше', 'фрукты'], 'extra' => []],
                        'ar' => ['sentence' => 'أكثر فواكه', 'correct' => ['أكثر', 'فواكه'], 'extra' => []],
                        'az' => ['sentence' => 'daha meyvələr', 'correct' => ['daha', 'meyvələr'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to put', 'more', 'fruits'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Poner más frutas', 'correct' => ['poner', 'más', 'frutas'], 'extra' => ['manzana', 'cesta']],
                            'de' => ['sentence' => 'Mehr Früchte legen', 'correct' => ['mehr', 'Früchte', 'legen'], 'extra' => ['Apfel', 'Korb']],
                            'ja' => ['sentence' => 'もっと果物を入れる', 'correct' => ['もっと', '果物', 'を', '入れる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '더 많은 과일을 넣다', 'correct' => ['더', '많은', '과일을', '넣다'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'Mettre plus de fruits', 'correct' => ['mettre', 'plus', 'fruits'], 'extra' => ['pomme']],
                            'tr' => ['sentence' => 'daha çok meyve koymak', 'correct' => ['daha', 'çok', 'meyve', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить больше фрукты', 'correct' => ['положить', 'больше', 'фрукты'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع أكثر فواكه', 'correct' => ['وضع', 'أكثر', 'فواكه'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq daha meyvələr', 'correct' => ['qoymaq', 'daha', 'meyvələr'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
