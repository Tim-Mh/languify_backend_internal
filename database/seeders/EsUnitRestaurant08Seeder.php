<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = [
        'pastel' => 'cake',
        'helado' => 'icecream',
        'queso' => 'cheese',
        'manzana' => 'apple',
        'café' => 'coffee',
        'pan' => 'bread',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 8, the Spanish twin of the
     * English "Unit 8: Desserts and Sweets" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unidad 8: Postres y dulces', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Pastel y Helado', 1,
                pictures: [
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                    [
                        'es' => 'helado',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'es' => 'chocolate',
                    ],
                    [
                        'es' => 'trozo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'pastel',
                            'de',
                            'chocolate',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a chocolate cake',
                                'correct' => [
                                    'a',
                                    'chocolate',
                                    'cake',
                                ],
                                'extra' => [
                                    'slice',
                                    'ice cream',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Schokoladenkuchen',
                                'correct' => [
                                    'ein',
                                    'Schokolade',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Stück',
                                    'Eis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau au chocolat',
                                'correct' => [
                                    'un',
                                    'chocolat',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'part',
                                    'glace',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'チョコレートケーキ',
                                'correct' => [
                                    'チョコレート',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    '一切れ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '초콜릿 케이크',
                                'correct' => [
                                    '초콜릿',
                                    '케이크',
                                ],
                                'extra' => [
                                    '한 조각',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'trozo',
                            'de',
                            'pastel',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a slice of cake',
                                'correct' => [
                                    'a',
                                    'slice',
                                    'of',
                                    'cake',
                                ],
                                'extra' => [
                                    'chocolate',
                                    'ice cream',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Stück Kuchen',
                                'correct' => [
                                    'ein',
                                    'Stück',
                                    'von',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Schokolade',
                                    'Eis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une part de gâteau',
                                'correct' => [
                                    'une',
                                    'part',
                                    'de',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'chocolat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキ一切れ',
                                'correct' => [
                                    'ケーキ',
                                    '一切れ',
                                ],
                                'extra' => [
                                    'チョコレート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크 한 조각',
                                'correct' => [
                                    '케이크',
                                    '한',
                                    '조각',
                                ],
                                'extra' => [
                                    '초콜릿',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'helado',
                            'de',
                            'chocolate',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a chocolate ice cream',
                                'correct' => [
                                    'a',
                                    'chocolate',
                                    'ice cream',
                                ],
                                'extra' => [
                                    'slice',
                                    'cake',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Schokoladeneis',
                                'correct' => [
                                    'ein',
                                    'Schokolade',
                                    'Eis',
                                ],
                                'extra' => [
                                    'Stück',
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une glace au chocolat',
                                'correct' => [
                                    'une',
                                    'chocolat',
                                    'glace',
                                ],
                                'extra' => [
                                    'part',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'チョコレートアイスクリーム',
                                'correct' => [
                                    'チョコレート',
                                    'アイスクリーム',
                                ],
                                'extra' => [
                                    '一切れ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '초콜릿 아이스크림',
                                'correct' => [
                                    '초콜릿',
                                    '아이스크림',
                                ],
                                'extra' => [
                                    '한 조각',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Pastel y Pan', 2,
                pictures: [
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'es' => 'compartir',
                    ],
                    [
                        'es' => 'nata',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Compartir',
                            'un',
                            'pastel',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to share a cake',
                                'correct' => [
                                    'to share',
                                    'a',
                                    'cake',
                                ],
                                'extra' => [
                                    'cream',
                                    'bread',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Kuchen teilen',
                                'correct' => [
                                    'einen',
                                    'Kuchen',
                                    'teilen',
                                ],
                                'extra' => [
                                    'Sahne',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Partager un gâteau',
                                'correct' => [
                                    'partager',
                                    'un',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'crème',
                                    'pain',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキを分ける',
                                'correct' => [
                                    'ケーキ',
                                    'を',
                                    '分ける',
                                ],
                                'extra' => [
                                    'クリーム',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크를 나누다',
                                'correct' => [
                                    '케이크를',
                                    '나누다',
                                ],
                                'extra' => [
                                    '크림',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Pan',
                            'con',
                            'nata',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bread with cream',
                                'correct' => [
                                    'bread',
                                    'with',
                                    'cream',
                                ],
                                'extra' => [
                                    'to share',
                                    'cake',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Brot mit Sahne',
                                'correct' => [
                                    'Brot',
                                    'mit',
                                    'Sahne',
                                ],
                                'extra' => [
                                    'teilen',
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain avec de la crème',
                                'correct' => [
                                    'pain',
                                    'avec',
                                    'crème',
                                ],
                                'extra' => [
                                    'partager',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'クリーム付きのパン',
                                'correct' => [
                                    'クリーム',
                                    '付き',
                                    'の',
                                    'パン',
                                ],
                                'extra' => [
                                    '分ける',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '크림을 바른 빵',
                                'correct' => [
                                    '크림을',
                                    '바른',
                                    '빵',
                                ],
                                'extra' => [
                                    '나누다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Compartir',
                            'un',
                            'pastel',
                            'y',
                            'algo',
                            'de',
                            'pan',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to share a cake and some bread',
                                'correct' => [
                                    'to share',
                                    'a',
                                    'cake',
                                    'and',
                                    'some',
                                    'bread',
                                ],
                                'extra' => [
                                    'cream',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Kuchen und etwas Brot teilen',
                                'correct' => [
                                    'einen',
                                    'Kuchen',
                                    'und',
                                    'etwas',
                                    'Brot',
                                    'teilen',
                                ],
                                'extra' => [
                                    'Sahne',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Partager un gâteau et du pain',
                                'correct' => [
                                    'partager',
                                    'un',
                                    'gâteau',
                                    'et',
                                    'du',
                                    'pain',
                                ],
                                'extra' => [
                                    'crème',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキと少しのパンを分ける',
                                'correct' => [
                                    'ケーキ',
                                    'と',
                                    '少しの',
                                    'パン',
                                    'を',
                                    '分ける',
                                ],
                                'extra' => [
                                    'クリーム',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크와 약간의 빵을 나누다',
                                'correct' => [
                                    '케이크와',
                                    '약간의',
                                    '빵을',
                                    '나누다',
                                ],
                                'extra' => [
                                    '크림',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Helado y Manzana', 3,
                pictures: [
                    [
                        'es' => 'helado',
                        'img' => 'icecream',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vainilla',
                    ],
                    [
                        'es' => 'fresa',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'helado',
                            'de',
                            'vainilla',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a vanilla ice cream',
                                'correct' => [
                                    'a',
                                    'vanilla',
                                    'ice cream',
                                ],
                                'extra' => [
                                    'strawberry',
                                    'apple',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Vanilleeis',
                                'correct' => [
                                    'ein',
                                    'Vanille',
                                    'Eis',
                                ],
                                'extra' => [
                                    'Erdbeere',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une glace à la vanille',
                                'correct' => [
                                    'une',
                                    'vanille',
                                    'glace',
                                ],
                                'extra' => [
                                    'fraise',
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'バニラアイスクリーム',
                                'correct' => [
                                    'バニラ',
                                    'アイスクリーム',
                                ],
                                'extra' => [
                                    'いちご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바닐라 아이스크림',
                                'correct' => [
                                    '바닐라',
                                    '아이스크림',
                                ],
                                'extra' => [
                                    '딸기',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'manzana',
                            'o',
                            'una',
                            'fresa',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an apple or a strawberry',
                                'correct' => [
                                    'an',
                                    'apple',
                                    'or',
                                    'a',
                                    'strawberry',
                                ],
                                'extra' => [
                                    'vanilla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Apfel oder eine Erdbeere',
                                'correct' => [
                                    'ein',
                                    'Apfel',
                                    'oder',
                                    'eine',
                                    'Erdbeere',
                                ],
                                'extra' => [
                                    'Vanille',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une pomme ou une fraise',
                                'correct' => [
                                    'une',
                                    'pomme',
                                    'ou',
                                    'une',
                                    'fraise',
                                ],
                                'extra' => [
                                    'vanille',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごかいちご',
                                'correct' => [
                                    'りんご',
                                    'か',
                                    'いちご',
                                ],
                                'extra' => [
                                    'バニラ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과 또는 딸기',
                                'correct' => [
                                    '사과',
                                    '또는',
                                    '딸기',
                                ],
                                'extra' => [
                                    '바닐라',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'vainilla',
                            'y',
                            'la',
                            'fresa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the vanilla and the strawberry',
                                'correct' => [
                                    'the',
                                    'vanilla',
                                    'and',
                                    'the',
                                    'strawberry',
                                ],
                                'extra' => [
                                    'apple',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Vanille und die Erdbeere',
                                'correct' => [
                                    'die',
                                    'Vanille',
                                    'und',
                                    'die',
                                    'Erdbeere',
                                ],
                                'extra' => [
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La vanille et la fraise',
                                'correct' => [
                                    'la',
                                    'vanille',
                                    'et',
                                    'la',
                                    'fraise',
                                ],
                                'extra' => [
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'バニラといちご',
                                'correct' => [
                                    'バニラ',
                                    'と',
                                    'いちご',
                                ],
                                'extra' => [
                                    'りんご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바닐라와 딸기',
                                'correct' => [
                                    '바닐라와',
                                    '딸기',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Manzana y Pastel', 4,
                pictures: [
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tarta',
                    ],
                    [
                        'es' => 'fruta',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'tarta',
                            'de',
                            'manzana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an apple tart',
                                'correct' => [
                                    'an',
                                    'apple',
                                    'tart',
                                ],
                                'extra' => [
                                    'fruit',
                                    'cake',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Apfeltorte',
                                'correct' => [
                                    'eine',
                                    'Apfel',
                                    'Torte',
                                ],
                                'extra' => [
                                    'Obst',
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une tarte à la pomme',
                                'correct' => [
                                    'une',
                                    'pomme',
                                    'tarte',
                                ],
                                'extra' => [
                                    'fruit',
                                    'gâteau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごタルト',
                                'correct' => [
                                    'りんご',
                                    'タルト',
                                ],
                                'extra' => [
                                    '果物',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과 타르트',
                                'correct' => [
                                    '사과',
                                    '타르트',
                                ],
                                'extra' => [
                                    '과일',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'fruta',
                            'fresca',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a fresh fruit',
                                'correct' => [
                                    'a',
                                    'fresh',
                                    'fruit',
                                ],
                                'extra' => [
                                    'tart',
                                    'apple',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Frisches Obst',
                                'correct' => [
                                    'ein',
                                    'frisch',
                                    'Obst',
                                ],
                                'extra' => [
                                    'Torte',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un fruit frais',
                                'correct' => [
                                    'un',
                                    'fruit',
                                    'frais',
                                ],
                                'extra' => [
                                    'tarte',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '新鮮な果物',
                                'correct' => [
                                    '新鮮な',
                                    '果物',
                                ],
                                'extra' => [
                                    'タルト',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '신선한 과일',
                                'correct' => [
                                    '신선한',
                                    '과일',
                                ],
                                'extra' => [
                                    '타르트',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Una',
                            'tarta',
                            'y',
                            'un',
                            'pastel',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a tart and a cake',
                                'correct' => [
                                    'a',
                                    'tart',
                                    'and',
                                    'a',
                                    'cake',
                                ],
                                'extra' => [
                                    'fruit',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Torte und ein Kuchen',
                                'correct' => [
                                    'eine',
                                    'Torte',
                                    'und',
                                    'ein',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Obst',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une tarte et un gâteau',
                                'correct' => [
                                    'une',
                                    'tarte',
                                    'et',
                                    'un',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'fruit',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'タルトとケーキ',
                                'correct' => [
                                    'タルト',
                                    'と',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    '果物',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '타르트와 케이크',
                                'correct' => [
                                    '타르트와',
                                    '케이크',
                                ],
                                'extra' => [
                                    '과일',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Pastel y Helado', 5,
                pictures: [
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                    [
                        'es' => 'helado',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'es' => 'dulce',
                    ],
                    [
                        'es' => 'demasiado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'pastel',
                            'dulce',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a sweet cake',
                                'correct' => [
                                    'a',
                                    'sweet',
                                    'cake',
                                ],
                                'extra' => [
                                    'too much',
                                    'ice cream',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein süßer Kuchen',
                                'correct' => [
                                    'ein',
                                    'süß',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'zu viel',
                                    'Eis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau sucré',
                                'correct' => [
                                    'un',
                                    'gâteau',
                                    'sucré',
                                ],
                                'extra' => [
                                    'trop',
                                    'glace',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '甘いケーキ',
                                'correct' => [
                                    '甘い',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    'すぎます',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '단 케이크',
                                'correct' => [
                                    '단',
                                    '케이크',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'helado',
                            'es',
                            'demasiado',
                            'dulce',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the ice cream is too sweet',
                                'correct' => [
                                    'the',
                                    'ice cream',
                                    'is',
                                    'too much',
                                    'sweet',
                                ],
                                'extra' => [
                                    'cake',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Eis ist zu süß',
                                'correct' => [
                                    'das',
                                    'Eis',
                                    'ist',
                                    'zu viel',
                                    'süß',
                                ],
                                'extra' => [
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La glace est trop sucrée',
                                'correct' => [
                                    'la',
                                    'glace',
                                    'est',
                                    'trop',
                                    'sucré',
                                ],
                                'extra' => [
                                    'gâteau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'アイスクリームは甘すぎます',
                                'correct' => [
                                    'アイスクリーム',
                                    'は',
                                    '甘すぎます',
                                ],
                                'extra' => [
                                    'ケーキ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아이스크림은 너무 답니다',
                                'correct' => [
                                    '아이스크림은',
                                    '너무',
                                    '답니다',
                                ],
                                'extra' => [
                                    '케이크',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'pastel',
                            'dulce',
                            'y',
                            'un',
                            'helado',
                            'dulce',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a sweet cake and a sweet ice cream',
                                'correct' => [
                                    'a',
                                    'sweet',
                                    'cake',
                                    'and',
                                    'a',
                                    'sweet',
                                    'ice cream',
                                ],
                                'extra' => [
                                    'too much',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein süßer Kuchen und ein süßes Eis',
                                'correct' => [
                                    'ein',
                                    'süß',
                                    'Kuchen',
                                    'und',
                                    'ein',
                                    'süß',
                                    'Eis',
                                ],
                                'extra' => [
                                    'zu viel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau sucré et une glace sucrée',
                                'correct' => [
                                    'un',
                                    'sucré',
                                    'gâteau',
                                    'et',
                                    'un',
                                    'sucré',
                                    'glace',
                                ],
                                'extra' => [
                                    'trop',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '甘いケーキと甘いアイスクリーム',
                                'correct' => [
                                    '甘い',
                                    'ケーキ',
                                    'と',
                                    '甘い',
                                    'アイスクリーム',
                                ],
                                'extra' => [
                                    'すぎます',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '단 케이크와 단 아이스크림',
                                'correct' => [
                                    '단',
                                    '케이크와',
                                    '단',
                                    '아이스크림',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
