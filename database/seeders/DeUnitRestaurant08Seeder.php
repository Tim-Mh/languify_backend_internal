<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = [
        'Kuchen' => 'cake',
        'Eis' => 'icecream',
        'Käse' => 'cheese',
        'Apfel' => 'apple',
        'Kaffee' => 'coffee',
        'Brot' => 'bread',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 8, the German twin of the
     * English "Unit 8: Desserts and Sweets" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Einheit 8: Nachtisch & Süßes', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Kuchen & Eis', 1,
                pictures: [
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                    [
                        'de' => 'Eis',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Schokolade',
                    ],
                    [
                        'de' => 'Stück',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Schokoladenkuchen',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir şokolad tort', 'correct' => ['bir', 'şokolad', 'tort'], 'extra' => ['dilim', 'dondurma']],
                            'ar' => ['sentence' => 'شوكولاتة كعكة', 'correct' => ['شوكولاتة', 'كعكة'], 'extra' => ['شريحة', 'آيس كريم']],
                            'ru' => ['sentence' => 'шоколад торт', 'correct' => ['шоколад', 'торт'], 'extra' => ['кусок', 'мороженое']],
                            'es' => [
                                'sentence' => 'Un pastel de chocolate',
                                'correct' => [
                                    'un',
                                    'chocolate',
                                    'pastel',
                                ],
                                'extra' => [
                                    'trozo',
                                    'helado',
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
                            'tr' => ['sentence' => 'çikolatalı bir pasta', 'correct' => ['çikolatalı', 'bir', 'pasta'], 'extra' => ['dilim', 'dondurma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Stück',
                            'Kuchen',
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
                            'az' => ['sentence' => 'bir dilim tort', 'correct' => ['bir', 'dilim', 'tort'], 'extra' => ['şokolad', 'dondurma']],
                            'ar' => ['sentence' => 'شريحة كعكة', 'correct' => ['شريحة', 'كعكة'], 'extra' => ['شوكولاتة', 'آيس كريم']],
                            'ru' => ['sentence' => 'кусок торт', 'correct' => ['кусок', 'торт'], 'extra' => ['шоколад', 'мороженое']],
                            'es' => [
                                'sentence' => 'Un trozo de pastel',
                                'correct' => [
                                    'un',
                                    'trozo',
                                    'de',
                                    'pastel',
                                ],
                                'extra' => [
                                    'chocolate',
                                    'helado',
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
                            'tr' => ['sentence' => 'bir dilim pasta', 'correct' => ['bir', 'dilim', 'pasta'], 'extra' => ['çikolata', 'dondurma']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Schokoladeneis',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir şokolad dondurma', 'correct' => ['bir', 'şokolad', 'dondurma'], 'extra' => ['dilim', 'tort']],
                            'ar' => ['sentence' => 'شوكولاتة آيس كريم', 'correct' => ['شوكولاتة', 'آيس كريم'], 'extra' => ['شريحة', 'كعكة']],
                            'ru' => ['sentence' => 'шоколад мороженое', 'correct' => ['шоколад', 'мороженое'], 'extra' => ['кусок', 'торт']],
                            'es' => [
                                'sentence' => 'Un helado de chocolate',
                                'correct' => [
                                    'un',
                                    'chocolate',
                                    'helado',
                                ],
                                'extra' => [
                                    'trozo',
                                    'pastel',
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
                            'tr' => ['sentence' => 'çikolatalı bir dondurma', 'correct' => ['çikolatalı', 'bir', 'dondurma'], 'extra' => ['dilim', 'pasta']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Kuchen & Brot', 2,
                pictures: [
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'de' => 'teilen',
                    ],
                    [
                        'de' => 'Sahne',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Einen',
                            'Kuchen',
                            'teilen',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'bölüşmək bir tort', 'correct' => ['bölüşmək', 'bir', 'tort'], 'extra' => ['qaymaq', 'çörək']],
                            'ar' => ['sentence' => 'المشاركة كعكة', 'correct' => ['المشاركة', 'كعكة'], 'extra' => ['كريمة', 'خبز']],
                            'ru' => ['sentence' => 'разделить торт', 'correct' => ['разделить', 'торт'], 'extra' => ['сливки', 'хлеб']],
                            'es' => [
                                'sentence' => 'Compartir un pastel',
                                'correct' => [
                                    'compartir',
                                    'un',
                                    'pastel',
                                ],
                                'extra' => [
                                    'nata',
                                    'pan',
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
                            'tr' => ['sentence' => 'bir pasta paylaşmak', 'correct' => ['bir', 'pasta', 'paylaşmak'], 'extra' => ['krema', 'ekmek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Brot',
                            'mit',
                            'Sahne',
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
                            'az' => ['sentence' => 'çörək ilə qaymaq', 'correct' => ['çörək', 'ilə', 'qaymaq'], 'extra' => ['bölüşmək', 'tort']],
                            'ar' => ['sentence' => 'خبز مع كريمة', 'correct' => ['خبز', 'مع', 'كريمة'], 'extra' => ['المشاركة', 'كعكة']],
                            'ru' => ['sentence' => 'хлеб с сливки', 'correct' => ['хлеб', 'с', 'сливки'], 'extra' => ['разделить', 'торт']],
                            'es' => [
                                'sentence' => 'Pan con nata',
                                'correct' => [
                                    'pan',
                                    'con',
                                    'nata',
                                ],
                                'extra' => [
                                    'compartir',
                                    'pastel',
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
                            'tr' => ['sentence' => 'kremalı ekmek', 'correct' => ['kremalı', 'ekmek'], 'extra' => ['paylaşmak', 'pasta']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Einen',
                            'Kuchen',
                            'und',
                            'etwas',
                            'Brot',
                            'teilen',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'bölüşmək bir tort və bir az çörək', 'correct' => ['bölüşmək', 'bir', 'tort', 'və', 'bir az', 'çörək'], 'extra' => ['qaymaq']],
                            'ar' => ['sentence' => 'المشاركة كعكة و بعض خبز', 'correct' => ['المشاركة', 'كعكة', 'و', 'بعض', 'خبز'], 'extra' => ['كريمة']],
                            'ru' => ['sentence' => 'разделить торт и немного хлеб', 'correct' => ['разделить', 'торт', 'и', 'немного', 'хлеб'], 'extra' => ['сливки']],
                            'es' => [
                                'sentence' => 'Compartir un pastel y algo de pan',
                                'correct' => [
                                    'compartir',
                                    'un',
                                    'pastel',
                                    'y',
                                    'algo de',
                                    'pan',
                                ],
                                'extra' => [
                                    'nata',
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
                            'tr' => ['sentence' => 'bir pasta ve biraz ekmek paylaşmak', 'correct' => ['bir', 'pasta', 've', 'biraz', 'ekmek', 'paylaşmak'], 'extra' => ['krema']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Eis & Apfel', 3,
                pictures: [
                    [
                        'de' => 'Eis',
                        'img' => 'icecream',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Vanille',
                    ],
                    [
                        'de' => 'Erdbeere',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Vanilleeis',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir vanil dondurma', 'correct' => ['bir', 'vanil', 'dondurma'], 'extra' => ['çiyələk', 'alma']],
                            'ar' => ['sentence' => 'فانيليا آيس كريم', 'correct' => ['فانيليا', 'آيس كريم'], 'extra' => ['فراولة', 'تفاحة']],
                            'ru' => ['sentence' => 'ванильный мороженое', 'correct' => ['ванильный', 'мороженое'], 'extra' => ['клубничный', 'яблоко']],
                            'es' => [
                                'sentence' => 'Un helado de vainilla',
                                'correct' => [
                                    'un',
                                    'vainilla',
                                    'helado',
                                ],
                                'extra' => [
                                    'fresa',
                                    'manzana',
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
                            'tr' => ['sentence' => 'vanilyalı bir dondurma', 'correct' => ['vanilyalı', 'bir', 'dondurma'], 'extra' => ['çilek', 'elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Apfel',
                            'oder',
                            'eine',
                            'Erdbeere',
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
                            'az' => ['sentence' => 'bir alma və ya bir çiyələk', 'correct' => ['bir', 'alma', 'və ya', 'bir', 'çiyələk'], 'extra' => ['vanil']],
                            'ar' => ['sentence' => 'تفاحة أو فراولة', 'correct' => ['تفاحة', 'أو', 'فراولة'], 'extra' => ['فانيليا']],
                            'ru' => ['sentence' => 'яблоко или клубничный', 'correct' => ['яблоко', 'или', 'клубничный'], 'extra' => ['ванильный']],
                            'es' => [
                                'sentence' => 'Una manzana o una fresa',
                                'correct' => [
                                    'una',
                                    'manzana',
                                    'o',
                                    'una',
                                    'fresa',
                                ],
                                'extra' => [
                                    'vainilla',
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
                            'tr' => ['sentence' => 'bir elma veya bir çilek', 'correct' => ['bir', 'elma', 'veya', 'bir', 'çilek'], 'extra' => ['vanilya']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Vanille',
                            'und',
                            'die',
                            'Erdbeere',
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
                            'az' => ['sentence' => 'vanil və çiyələk', 'correct' => ['vanil', 'və', 'çiyələk'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'فانيليا و فراولة', 'correct' => ['فانيليا', 'و', 'فراولة'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'ванильный и клубничный', 'correct' => ['ванильный', 'и', 'клубничный'], 'extra' => ['яблоко']],
                            'es' => [
                                'sentence' => 'La vainilla y la fresa',
                                'correct' => [
                                    'la',
                                    'vainilla',
                                    'y',
                                    'la',
                                    'fresa',
                                ],
                                'extra' => [
                                    'manzana',
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
                            'tr' => ['sentence' => 'vanilya ve çilek', 'correct' => ['vanilya', 've', 'çilek'], 'extra' => ['elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Apfel & Kuchen', 4,
                pictures: [
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Torte',
                    ],
                    [
                        'de' => 'Obst',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Apfeltorte',
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
                            'az' => ['sentence' => 'bir alma tart', 'correct' => ['bir', 'alma', 'tart'], 'extra' => ['meyvə', 'tort']],
                            'ar' => ['sentence' => 'تفاحة فطيرة', 'correct' => ['تفاحة', 'فطيرة'], 'extra' => ['فاكهة', 'كعكة']],
                            'ru' => ['sentence' => 'яблоко тарт', 'correct' => ['яблоко', 'тарт'], 'extra' => ['фрукт', 'торт']],
                            'es' => [
                                'sentence' => 'Una tarta de manzana',
                                'correct' => [
                                    'una',
                                    'manzana',
                                    'tarta',
                                ],
                                'extra' => [
                                    'fruta',
                                    'pastel',
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
                            'tr' => ['sentence' => 'elmalı bir turta', 'correct' => ['elmalı', 'bir', 'turta'], 'extra' => ['meyve', 'pasta']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'frisches',
                            'Obst',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir təzə meyvə', 'correct' => ['bir', 'təzə', 'meyvə'], 'extra' => ['tart', 'alma']],
                            'ar' => ['sentence' => 'طازج فاكهة', 'correct' => ['طازج', 'فاكهة'], 'extra' => ['فطيرة', 'تفاحة']],
                            'ru' => ['sentence' => 'свежий фрукт', 'correct' => ['свежий', 'фрукт'], 'extra' => ['тарт', 'яблоко']],
                            'es' => [
                                'sentence' => 'Una fruta fresca',
                                'correct' => [
                                    'una',
                                    'fresco',
                                    'fruta',
                                ],
                                'extra' => [
                                    'tarta',
                                    'manzana',
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
                            'tr' => ['sentence' => 'taze bir meyve', 'correct' => ['taze', 'bir', 'meyve'], 'extra' => ['turta', 'elma']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'Torte',
                            'und',
                            'ein',
                            'Kuchen',
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
                            'az' => ['sentence' => 'bir tart və bir tort', 'correct' => ['bir', 'tart', 'və', 'bir', 'tort'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'فطيرة و كعكة', 'correct' => ['فطيرة', 'و', 'كعكة'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'тарт и торт', 'correct' => ['тарт', 'и', 'торт'], 'extra' => ['фрукт']],
                            'es' => [
                                'sentence' => 'Una tarta y un pastel',
                                'correct' => [
                                    'una',
                                    'tarta',
                                    'y',
                                    'un',
                                    'pastel',
                                ],
                                'extra' => [
                                    'fruta',
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
                            'tr' => ['sentence' => 'bir turta ve bir pasta', 'correct' => ['bir', 'turta', 've', 'bir', 'pasta'], 'extra' => ['meyve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Kuchen & Eis', 5,
                pictures: [
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                    [
                        'de' => 'Eis',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'de' => 'süß',
                    ],
                    [
                        'de' => 'zu viel',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'süßer',
                            'Kuchen',
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
                            'az' => ['sentence' => 'bir şirin tort', 'correct' => ['bir', 'şirin', 'tort'], 'extra' => ['çox artıq', 'dondurma']],
                            'ar' => ['sentence' => 'حلو كعكة', 'correct' => ['حلو', 'كعكة'], 'extra' => ['كثير جدا', 'آيس كريم']],
                            'ru' => ['sentence' => 'сладкий торт', 'correct' => ['сладкий', 'торт'], 'extra' => ['слишком много', 'мороженое']],
                            'es' => [
                                'sentence' => 'Un pastel dulce',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'dulce',
                                ],
                                'extra' => [
                                    'demasiado',
                                    'helado',
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
                            'tr' => ['sentence' => 'tatlı bir pasta', 'correct' => ['tatlı', 'bir', 'pasta'], 'extra' => ['çok fazla', 'dondurma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Eis',
                            'ist',
                            'zu',
                            'süß',
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
                            'az' => ['sentence' => 'dondurma çox artıq şirin', 'correct' => ['dondurma', 'çox artıq', 'şirin'], 'extra' => ['tort']],
                            'ar' => ['sentence' => 'آيس كريم كثير جدا حلو', 'correct' => ['آيس كريم', 'كثير جدا', 'حلو'], 'extra' => ['كعكة']],
                            'ru' => ['sentence' => 'мороженое слишком много сладкий', 'correct' => ['мороженое', 'слишком много', 'сладкий'], 'extra' => ['торт']],
                            'es' => [
                                'sentence' => 'El helado es demasiado dulce',
                                'correct' => [
                                    'el',
                                    'helado',
                                    'es',
                                    'demasiado',
                                    'dulce',
                                ],
                                'extra' => [
                                    'pastel',
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
                            'tr' => ['sentence' => 'dondurma çok tatlı', 'correct' => ['dondurma', 'çok', 'tatlı'], 'extra' => ['pasta']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'süßer',
                            'Kuchen',
                            'und',
                            'ein',
                            'süßes',
                            'Eis',
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
                            'az' => ['sentence' => 'bir şirin tort və bir şirin dondurma', 'correct' => ['bir', 'şirin', 'tort', 'və', 'bir', 'şirin', 'dondurma'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'حلو كعكة و حلو آيس كريم', 'correct' => ['حلو', 'كعكة', 'و', 'حلو', 'آيس كريم'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'сладкий торт и сладкий мороженое', 'correct' => ['сладкий', 'торт', 'и', 'сладкий', 'мороженое'], 'extra' => ['слишком много']],
                            'es' => [
                                'sentence' => 'Un pastel dulce y un helado dulce',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'dulce',
                                    'y',
                                    'un',
                                    'helado',
                                    'dulce',
                                ],
                                'extra' => [
                                    'demasiado',
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
                            'tr' => ['sentence' => 'tatlı bir pasta ve tatlı bir dondurma', 'correct' => ['tatlı', 'bir', 'pasta', 've', 'tatlı', 'bir', 'dondurma'], 'extra' => ['çok fazla']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
