<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket01Seeder extends Seeder
{
    private const PICTURES = [
        'リスト' => 'list',
        'カート' => 'cart',
        '売り場' => 'shelf',
        'かご' => 'basket',
        'レジ' => 'checkout',
        '箱' => 'box',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 1, the Japanese twin of the
     * English "Unit 1: Finding Your Way" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'ユニット1: 道を見つける', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: リスト・カート', 1,
                pictures: [
                    [
                        'ja' => 'リスト',
                        'img' => 'list',
                    ],
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'スーパー',
                    ],
                    [
                        'ja' => '探す',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'スーパー',
                            'の',
                            'ため',
                            'の',
                            '私の',
                            'リスト',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my list for the supermarket',
                                'correct' => [
                                    'my',
                                    'list',
                                    'for',
                                    'the',
                                    'supermarket',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim siyahı üçün supermarket', 'correct' => ['mənim', 'siyahı', 'üçün', 'supermarket'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'قائمة لأجل سوبرماركت', 'correct' => ['قائمة', 'لأجل', 'سوبرماركت'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'мой список для супермаркет', 'correct' => ['мой', 'список', 'для', 'супермаркет'], 'extra' => ['тележка']],
                            'es' => [
                                'sentence' => 'Mi lista para el supermercado',
                                'correct' => [
                                    'mi',
                                    'lista',
                                    'para',
                                    'el',
                                    'supermercado',
                                ],
                                'extra' => [
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Liste für den Supermarkt',
                                'correct' => [
                                    'meine',
                                    'Liste',
                                    'für',
                                    'den',
                                    'Supermarkt',
                                ],
                                'extra' => [
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma liste pour le supermarché',
                                'correct' => [
                                    'ma',
                                    'liste',
                                    'pour',
                                    'le',
                                    'supermarché',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '슈퍼마켓을 위한 제 목록',
                                'correct' => [
                                    '슈퍼마켓을',
                                    '위한',
                                    '제',
                                    '목록',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                            'tr' => ['sentence' => 'market için listem', 'correct' => ['market', 'için', 'listem'], 'extra' => ['araba']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'カート',
                            'を',
                            '探す',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to look for a trolley',
                                'correct' => [
                                    'to look for',
                                    'a',
                                    'trolley',
                                ],
                                'extra' => [
                                    'list',
                                ],
                            ],
                            'az' => ['sentence' => 'axtarmaq bir araba', 'correct' => ['axtarmaq', 'bir', 'araba'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'البحث عربة', 'correct' => ['البحث', 'عربة'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'искать тележка', 'correct' => ['искать', 'тележка'], 'extra' => ['список']],
                            'es' => [
                                'sentence' => 'Buscar un carrito',
                                'correct' => [
                                    'buscar',
                                    'un',
                                    'carrito',
                                ],
                                'extra' => [
                                    'lista',
                                    'supermercado',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Einkaufswagen suchen',
                                'correct' => [
                                    'einen',
                                    'Einkaufswagen',
                                    'suchen',
                                ],
                                'extra' => [
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Chercher un chariot',
                                'correct' => [
                                    'chercher',
                                    'un',
                                    'chariot',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트를 찾다',
                                'correct' => [
                                    '카트를',
                                    '찾다',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir araba aramak', 'correct' => ['bir', 'araba', 'aramak'], 'extra' => ['liste']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'カート',
                            'と',
                            'リスト',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a trolley and a list',
                                'correct' => [
                                    'a',
                                    'trolley',
                                    'and',
                                    'a',
                                    'list',
                                ],
                                'extra' => [
                                    'supermarket',
                                ],
                            ],
                            'az' => ['sentence' => 'bir araba və bir siyahı', 'correct' => ['bir', 'araba', 'və', 'bir', 'siyahı'], 'extra' => ['supermarket']],
                            'ar' => ['sentence' => 'عربة و قائمة', 'correct' => ['عربة', 'و', 'قائمة'], 'extra' => ['سوبرماركت']],
                            'ru' => ['sentence' => 'тележка и список', 'correct' => ['тележка', 'и', 'список'], 'extra' => ['супермаркет']],
                            'es' => [
                                'sentence' => 'Un carrito y una lista',
                                'correct' => [
                                    'un',
                                    'carrito',
                                    'y',
                                    'una',
                                    'lista',
                                ],
                                'extra' => [
                                    'supermercado',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Einkaufswagen und eine Liste',
                                'correct' => [
                                    'ein',
                                    'Einkaufswagen',
                                    'und',
                                    'eine',
                                    'Liste',
                                ],
                                'extra' => [
                                    'Supermarkt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chariot et une liste',
                                'correct' => [
                                    'un',
                                    'chariot',
                                    'et',
                                    'une',
                                    'liste',
                                ],
                                'extra' => [
                                    'supermarché',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트와 목록',
                                'correct' => [
                                    '카트와',
                                    '목록',
                                ],
                                'extra' => [
                                    '슈퍼마켓',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir araba ve bir liste', 'correct' => ['bir', 'araba', 've', 'bir', 'liste'], 'extra' => ['market']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 売り場・かご', 2,
                pictures: [
                    [
                        'ja' => '売り場',
                        'img' => 'shelf',
                    ],
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'ja' => '見つける',
                    ],
                    [
                        'ja' => 'どこ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '売り場',
                            'は',
                            'どこですか',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the aisle',
                                'correct' => [
                                    'where',
                                    'is',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'to find',
                                ],
                            ],
                            'az' => ['sentence' => 'harada şöbə', 'correct' => ['harada', 'şöbə'], 'extra' => ['tapmaq']],
                            'ar' => ['sentence' => 'أين قسم', 'correct' => ['أين', 'قسم'], 'extra' => ['العثور']],
                            'ru' => ['sentence' => 'где отдел', 'correct' => ['где', 'отдел'], 'extra' => ['найти']],
                            'es' => [
                                'sentence' => 'Dónde está el pasillo',
                                'correct' => [
                                    'dónde',
                                    'está',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'encontrar',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wo ist das Regal',
                                'correct' => [
                                    'wo',
                                    'ist',
                                    'das',
                                    'Regal',
                                ],
                                'extra' => [
                                    'finden',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est le rayon',
                                'correct' => [
                                    'où',
                                    'est',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'trouver',
                                    'panier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대는 어디입니까',
                                'correct' => [
                                    '진열대는',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '발견하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'reyon nerede', 'correct' => ['reyon', 'nerede'], 'extra' => ['bulmak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'かご',
                            'を',
                            '見つける',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to find a basket',
                                'correct' => [
                                    'to find',
                                    'a',
                                    'basket',
                                ],
                                'extra' => [
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'tapmaq bir səbət', 'correct' => ['tapmaq', 'bir', 'səbət'], 'extra' => ['şöbə']],
                            'ar' => ['sentence' => 'العثور سلة', 'correct' => ['العثور', 'سلة'], 'extra' => ['قسم']],
                            'ru' => ['sentence' => 'найти корзина', 'correct' => ['найти', 'корзина'], 'extra' => ['отдел']],
                            'es' => [
                                'sentence' => 'Encontrar una cesta',
                                'correct' => [
                                    'encontrar',
                                    'una',
                                    'cesta',
                                ],
                                'extra' => [
                                    'dónde',
                                    'pasillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Korb finden',
                                'correct' => [
                                    'einen',
                                    'Korb',
                                    'finden',
                                ],
                                'extra' => [
                                    'wo',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trouver un panier',
                                'correct' => [
                                    'trouver',
                                    'un',
                                    'panier',
                                ],
                                'extra' => [
                                    'rayon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니를 발견하다',
                                'correct' => [
                                    '바구니를',
                                    '발견하다',
                                ],
                                'extra' => [
                                    '진열대',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir sepet bulmak', 'correct' => ['bir', 'sepet', 'bulmak'], 'extra' => ['reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '売り場',
                            'を',
                            '見つける',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to find the aisle',
                                'correct' => [
                                    'to find',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'tapmaq şöbə', 'correct' => ['tapmaq', 'şöbə'], 'extra' => ['səbət']],
                            'ar' => ['sentence' => 'العثور قسم', 'correct' => ['العثور', 'قسم'], 'extra' => ['سلة']],
                            'ru' => ['sentence' => 'найти отдел', 'correct' => ['найти', 'отдел'], 'extra' => ['корзина']],
                            'es' => [
                                'sentence' => 'Encontrar el pasillo',
                                'correct' => [
                                    'encontrar',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'dónde',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Regal finden',
                                'correct' => [
                                    'das',
                                    'Regal',
                                    'finden',
                                ],
                                'extra' => [
                                    'wo',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trouver le rayon',
                                'correct' => [
                                    'trouver',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'panier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대를 발견하다',
                                'correct' => [
                                    '진열대를',
                                    '발견하다',
                                ],
                                'extra' => [
                                    '바구니',
                                ],
                            ],
                            'tr' => ['sentence' => 'reyonu bulmak', 'correct' => ['reyonu', 'bulmak'], 'extra' => ['sepet']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: カート・レジ', 3,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'レジ',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'ja' => '買う',
                    ],
                    [
                        'ja' => 'ここ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ここ',
                            'で',
                            '買う',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy here',
                                'correct' => [
                                    'buy',
                                    'here',
                                ],
                                'extra' => [
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'al burada', 'correct' => ['al', 'burada'], 'extra' => ['kassa']],
                            'ar' => ['sentence' => 'اشتر هنا', 'correct' => ['اشتر', 'هنا'], 'extra' => ['صندوق الدفع']],
                            'ru' => ['sentence' => 'купи здесь', 'correct' => ['купи', 'здесь'], 'extra' => ['касса']],
                            'es' => [
                                'sentence' => 'Comprar aquí',
                                'correct' => [
                                    'comprar',
                                    'aquí',
                                ],
                                'extra' => [
                                    'caja',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hier kaufen',
                                'correct' => [
                                    'hier',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'Kasse',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter ici',
                                'correct' => [
                                    'acheter',
                                    'ici',
                                ],
                                'extra' => [
                                    'caisse',
                                    'chariot',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기서 사다',
                                'correct' => [
                                    '여기서',
                                    '사다',
                                ],
                                'extra' => [
                                    '계산대',
                                ],
                            ],
                            'tr' => ['sentence' => 'burada al', 'correct' => ['burada', 'al'], 'extra' => ['kasa']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'レジ',
                            'は',
                            'ここ',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the checkout is here',
                                'correct' => [
                                    'the',
                                    'checkout',
                                    'is',
                                    'here',
                                ],
                                'extra' => [
                                    'to buy',
                                ],
                            ],
                            'az' => ['sentence' => 'kassa burada', 'correct' => ['kassa', 'burada'], 'extra' => ['almaq']],
                            'ar' => ['sentence' => 'صندوق الدفع هنا', 'correct' => ['صندوق الدفع', 'هنا'], 'extra' => ['الشراء']],
                            'ru' => ['sentence' => 'касса здесь', 'correct' => ['касса', 'здесь'], 'extra' => ['купить']],
                            'es' => [
                                'sentence' => 'La caja está aquí',
                                'correct' => [
                                    'la',
                                    'caja',
                                    'está',
                                    'aquí',
                                ],
                                'extra' => [
                                    'comprar',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Kasse ist hier',
                                'correct' => [
                                    'die',
                                    'Kasse',
                                    'ist',
                                    'hier',
                                ],
                                'extra' => [
                                    'kaufen',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La caisse est ici',
                                'correct' => [
                                    'la',
                                    'caisse',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'acheter',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대는 여기입니다',
                                'correct' => [
                                    '계산대는',
                                    '여기입니다',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                            'tr' => ['sentence' => 'kasa burada', 'correct' => ['kasa', 'burada'], 'extra' => ['almak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'カート',
                            'で',
                            '買う',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy with a trolley',
                                'correct' => [
                                    'buy',
                                    'with',
                                    'a',
                                    'trolley',
                                ],
                                'extra' => [
                                    'here',
                                ],
                            ],
                            'az' => ['sentence' => 'al ilə bir araba', 'correct' => ['al', 'ilə', 'bir', 'araba'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'اشتر مع عربة', 'correct' => ['اشتر', 'مع', 'عربة'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'купи с тележка', 'correct' => ['купи', 'с', 'тележка'], 'extra' => ['здесь']],
                            'es' => [
                                'sentence' => 'Comprar con un carrito',
                                'correct' => [
                                    'comprar',
                                    'con',
                                    'un',
                                    'carrito',
                                ],
                                'extra' => [
                                    'aquí',
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mit einem Einkaufswagen kaufen',
                                'correct' => [
                                    'mit',
                                    'einem',
                                    'Einkaufswagen',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'hier',
                                    'Kasse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter avec un chariot',
                                'correct' => [
                                    'acheter',
                                    'avec',
                                    'un',
                                    'chariot',
                                ],
                                'extra' => [
                                    'ici',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트로 사다',
                                'correct' => [
                                    '카트로',
                                    '사다',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                            'tr' => ['sentence' => 'arabayla al', 'correct' => ['arabayla', 'al'], 'extra' => ['burada']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: リスト・かご', 4,
                pictures: [
                    [
                        'ja' => 'リスト',
                        'img' => 'list',
                    ],
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'ja' => '必要です',
                    ],
                    [
                        'ja' => '空',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'パン',
                            'が',
                            '必要です',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need bread',
                                'correct' => [
                                    'I need',
                                    'bread',
                                ],
                                'extra' => [
                                    'sky',
                                ],
                            ],
                            'az' => ['sentence' => 'lazımdır çörək', 'correct' => ['lazımdır', 'çörək'], 'extra' => ['göy']],
                            'ar' => ['sentence' => 'أحتاج خبز', 'correct' => ['أحتاج', 'خبز'], 'extra' => ['سماء']],
                            'ru' => ['sentence' => 'мне нужно хлеб', 'correct' => ['мне нужно', 'хлеб'], 'extra' => ['небо']],
                            'es' => [
                                'sentence' => 'Necesito pan',
                                'correct' => [
                                    'necesito',
                                    'pan',
                                ],
                                'extra' => [
                                    'vacío',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche Brot',
                                'correct' => [
                                    'ich brauche',
                                    'Brot',
                                ],
                                'extra' => [
                                    'leer',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de pain',
                                'correct' => [
                                    'j\'ai besoin',
                                    'pain',
                                ],
                                'extra' => [
                                    'vide',
                                    'panier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵이 필요합니다',
                                'correct' => [
                                    '빵이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '빈',
                                ],
                            ],
                            'tr' => ['sentence' => 'ekmeğe ihtiyacım var', 'correct' => ['ekmeğe', 'ihtiyacım', 'var'], 'extra' => ['gökyüzü']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            'かご',
                            'は',
                            '空',
                            'です',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my basket is empty',
                                'correct' => [
                                    'my',
                                    'basket',
                                    'is',
                                    'empty',
                                ],
                                'extra' => [],
                            ],
                            'az' => ['sentence' => 'mənim səbət boş', 'correct' => ['mənim', 'səbət', 'boş'], 'extra' => []],
                            'ar' => ['sentence' => 'سلة فارغ', 'correct' => ['سلة', 'فارغ'], 'extra' => []],
                            'ru' => ['sentence' => 'мой корзина пустой', 'correct' => ['мой', 'корзина', 'пустой'], 'extra' => []],
                            'es' => [
                                'sentence' => 'Mi cesta está vacía',
                                'correct' => [
                                    'mi',
                                    'cesta',
                                    'está',
                                    'vacío',
                                ],
                                'extra' => [
                                    'necesito',
                                    'lista',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Korb ist leer',
                                'correct' => [
                                    'mein',
                                    'Korb',
                                    'ist',
                                    'leer',
                                ],
                                'extra' => [
                                    'ich brauche',
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon panier est vide',
                                'correct' => [
                                    'mon',
                                    'panier',
                                    'est',
                                    'vide',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 바구니는 비었습니다',
                                'correct' => [
                                    '제',
                                    '바구니는',
                                    '비었습니다',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                            'tr' => ['sentence' => 'sepetim boş', 'correct' => ['sepetim', 'boş'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            'リスト',
                            'が',
                            '必要です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need my list',
                                'correct' => [
                                    'I need',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'sky',
                                ],
                            ],
                            'az' => ['sentence' => 'lazımdır mənim siyahı', 'correct' => ['lazımdır', 'mənim', 'siyahı'], 'extra' => ['göy']],
                            'ar' => ['sentence' => 'أحتاج قائمة', 'correct' => ['أحتاج', 'قائمة'], 'extra' => ['سماء']],
                            'ru' => ['sentence' => 'мне нужно мой список', 'correct' => ['мне нужно', 'мой', 'список'], 'extra' => ['небо']],
                            'es' => [
                                'sentence' => 'Necesito mi lista',
                                'correct' => [
                                    'necesito',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'vacío',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche meine Liste',
                                'correct' => [
                                    'ich brauche',
                                    'meine',
                                    'Liste',
                                ],
                                'extra' => [
                                    'leer',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de ma liste',
                                'correct' => [
                                    'j\'ai besoin',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'vide',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록이 필요합니다',
                                'correct' => [
                                    '제',
                                    '목록이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '빈',
                                ],
                            ],
                            'tr' => ['sentence' => 'listeme ihtiyacım var', 'correct' => ['listeme', 'ihtiyacım', 'var'], 'extra' => ['gökyüzü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: カート・かご', 5,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'いっぱい',
                    ],
                    [
                        'ja' => '重い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'カート',
                            'は',
                            'いっぱい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is full',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'full',
                                ],
                                'extra' => [
                                    'heavy',
                                ],
                            ],
                            'az' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['ağır']],
                            'ar' => ['sentence' => 'عربة ممتلئ', 'correct' => ['عربة', 'ممتلئ'], 'extra' => ['ثقيل']],
                            'ru' => ['sentence' => 'тележка полный', 'correct' => ['тележка', 'полный'], 'extra' => ['тяжёлый']],
                            'es' => [
                                'sentence' => 'El carrito está lleno',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'lleno',
                                ],
                                'extra' => [
                                    'pesado',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Einkaufswagen ist voll',
                                'correct' => [
                                    'der',
                                    'Einkaufswagen',
                                    'ist',
                                    'voll',
                                ],
                                'extra' => [
                                    'schwer',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est plein',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'plein',
                                ],
                                'extra' => [
                                    'lourd',
                                    'panier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 가득합니다',
                                'correct' => [
                                    '카트는',
                                    '가득합니다',
                                ],
                                'extra' => [
                                    '무거운',
                                ],
                            ],
                            'tr' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['ağır']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'かご',
                            'は',
                            '重い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the basket is heavy',
                                'correct' => [
                                    'the',
                                    'basket',
                                    'is',
                                    'heavy',
                                ],
                                'extra' => [
                                    'full',
                                ],
                            ],
                            'az' => ['sentence' => 'səbət ağır', 'correct' => ['səbət', 'ağır'], 'extra' => ['dolu']],
                            'ar' => ['sentence' => 'سلة ثقيل', 'correct' => ['سلة', 'ثقيل'], 'extra' => ['ممتلئ']],
                            'ru' => ['sentence' => 'корзина тяжёлый', 'correct' => ['корзина', 'тяжёлый'], 'extra' => ['полный']],
                            'es' => [
                                'sentence' => 'La cesta está pesada',
                                'correct' => [
                                    'la',
                                    'cesta',
                                    'está',
                                    'pesado',
                                ],
                                'extra' => [
                                    'lleno',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Korb ist schwer',
                                'correct' => [
                                    'der',
                                    'Korb',
                                    'ist',
                                    'schwer',
                                ],
                                'extra' => [
                                    'voll',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le panier est lourd',
                                'correct' => [
                                    'le',
                                    'panier',
                                    'est',
                                    'lourd',
                                ],
                                'extra' => [
                                    'plein',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니는 무겁습니다',
                                'correct' => [
                                    '바구니는',
                                    '무겁습니다',
                                ],
                                'extra' => [
                                    '가득한',
                                ],
                            ],
                            'tr' => ['sentence' => 'sepet ağır', 'correct' => ['sepet', 'ağır'], 'extra' => ['dolu']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'いっぱい',
                            'の',
                            'カート',
                            'と',
                            '重い',
                            'かご',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a full trolley and a heavy basket',
                                'correct' => [
                                    'a',
                                    'full',
                                    'trolley',
                                    'and',
                                    'a',
                                    'heavy',
                                    'basket',
                                ],
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'az' => ['sentence' => 'bir dolu araba və bir ağır səbət', 'correct' => ['bir', 'dolu', 'araba', 'və', 'bir', 'ağır', 'səbət'], 'extra' => []],
                            'ar' => ['sentence' => 'ممتلئ عربة و ثقيل سلة', 'correct' => ['ممتلئ', 'عربة', 'و', 'ثقيل', 'سلة'], 'extra' => []],
                            'ru' => ['sentence' => 'полный тележка и тяжёлый корзина', 'correct' => ['полный', 'тележка', 'и', 'тяжёлый', 'корзина'], 'extra' => []],
                            'es' => [
                                'sentence' => 'Un carrito lleno y una cesta pesada',
                                'correct' => [
                                    'un',
                                    'lleno',
                                    'carrito',
                                    'y',
                                    'una',
                                    'pesado',
                                    'cesta',
                                ],
                                'extra' => [
                                    'está',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein voller Einkaufswagen und ein schwerer Korb',
                                'correct' => [
                                    'ein',
                                    'voll',
                                    'Einkaufswagen',
                                    'und',
                                    'ein',
                                    'schwer',
                                    'Korb',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chariot plein et un panier lourd',
                                'correct' => [
                                    'un',
                                    'chariot',
                                    'plein',
                                    'et',
                                    'un',
                                    'panier',
                                    'lourd',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가득한 카트와 무거운 바구니',
                                'correct' => [
                                    '가득한',
                                    '카트와',
                                    '무거운',
                                    '바구니',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'dolu bir araba ve ağır bir sepet', 'correct' => ['dolu', 'bir', 'araba', 've', 'ağır', 'bir', 'sepet'], 'extra' => ['dır']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
