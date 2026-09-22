<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = [
        'ケーキ' => 'cake',
        'アイスクリーム' => 'icecream',
        'チーズ' => 'cheese',
        'りんご' => 'apple',
        'コーヒー' => 'coffee',
        'パン' => 'bread',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 8, the Japanese twin of the
     * English "Unit 8: Desserts and Sweets" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'ユニット8: デザートと甘いもの', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: ケーキ・アイスクリーム', 1,
                pictures: [
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                    [
                        'ja' => 'アイスクリーム',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'チョコレート',
                    ],
                    [
                        'ja' => '一切れ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チョコレート',
                            'ケーキ',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir şokolad tort', 'correct' => ['bir', 'şokolad', 'tort'], 'extra' => ['dilim']],
                            'ar' => ['sentence' => 'شوكولاتة كعكة', 'correct' => ['شوكولاتة', 'كعكة'], 'extra' => ['شريحة']],
                            'ru' => ['sentence' => 'шоколад торт', 'correct' => ['шоколад', 'торт'], 'extra' => ['кусок']],
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
                            'tr' => ['sentence' => 'çikolatalı bir pasta', 'correct' => ['çikolatalı', 'bir', 'pasta'], 'extra' => ['dilim']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ケーキ',
                            '一切れ',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir dilim tort', 'correct' => ['bir', 'dilim', 'tort'], 'extra' => ['şokolad']],
                            'ar' => ['sentence' => 'شريحة كعكة', 'correct' => ['شريحة', 'كعكة'], 'extra' => ['شوكولاتة']],
                            'ru' => ['sentence' => 'кусок торт', 'correct' => ['кусок', 'торт'], 'extra' => ['шоколад']],
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
                            'tr' => ['sentence' => 'bir dilim pasta', 'correct' => ['bir', 'dilim', 'pasta'], 'extra' => ['çikolata']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'チョコレート',
                            'アイスクリーム',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir şokolad dondurma', 'correct' => ['bir', 'şokolad', 'dondurma'], 'extra' => ['dilim']],
                            'ar' => ['sentence' => 'شوكولاتة آيس كريم', 'correct' => ['شوكولاتة', 'آيس كريم'], 'extra' => ['شريحة']],
                            'ru' => ['sentence' => 'шоколад мороженое', 'correct' => ['шоколад', 'мороженое'], 'extra' => ['кусок']],
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
                            'tr' => ['sentence' => 'çikolatalı bir dondurma', 'correct' => ['çikolatalı', 'bir', 'dondurma'], 'extra' => ['dilim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: ケーキ・パン', 2,
                pictures: [
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'ja' => '分ける',
                    ],
                    [
                        'ja' => 'クリーム',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ケーキ',
                            'を',
                            '分ける',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bölüşmək bir tort', 'correct' => ['bölüşmək', 'bir', 'tort'], 'extra' => ['qaymaq']],
                            'ar' => ['sentence' => 'المشاركة كعكة', 'correct' => ['المشاركة', 'كعكة'], 'extra' => ['كريمة']],
                            'ru' => ['sentence' => 'разделить торт', 'correct' => ['разделить', 'торт'], 'extra' => ['сливки']],
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
                            'tr' => ['sentence' => 'bir pasta paylaşmak', 'correct' => ['bir', 'pasta', 'paylaşmak'], 'extra' => ['krema']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'クリーム',
                            '付き',
                            'の',
                            'パン',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'çörək ilə qaymaq', 'correct' => ['çörək', 'ilə', 'qaymaq'], 'extra' => ['bölüşmək']],
                            'ar' => ['sentence' => 'خبز مع كريمة', 'correct' => ['خبز', 'مع', 'كريمة'], 'extra' => ['المشاركة']],
                            'ru' => ['sentence' => 'хлеб с сливки', 'correct' => ['хлеб', 'с', 'сливки'], 'extra' => ['разделить']],
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
                            'tr' => ['sentence' => 'kremalı ekmek', 'correct' => ['kremalı', 'ekmek'], 'extra' => ['paylaşmak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ケーキ',
                            'と',
                            '少しの',
                            'パン',
                            'を',
                            '分ける',
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
            $builder->lesson('レッスン3: アイスクリーム・りんご', 3,
                pictures: [
                    [
                        'ja' => 'アイスクリーム',
                        'img' => 'icecream',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'バニラ',
                    ],
                    [
                        'ja' => 'いちご',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'バニラ',
                            'アイスクリーム',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir vanil dondurma', 'correct' => ['bir', 'vanil', 'dondurma'], 'extra' => ['çiyələk']],
                            'ar' => ['sentence' => 'فانيليا آيس كريم', 'correct' => ['فانيليا', 'آيس كريم'], 'extra' => ['فراولة']],
                            'ru' => ['sentence' => 'ванильный мороженое', 'correct' => ['ванильный', 'мороженое'], 'extra' => ['клубничный']],
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
                            'tr' => ['sentence' => 'vanilyalı bir dondurma', 'correct' => ['vanilyalı', 'bir', 'dondurma'], 'extra' => ['çilek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
                            'か',
                            'いちご',
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
                            'バニラ',
                            'と',
                            'いちご',
                        ],
                        'blank' => 2,
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
            $builder->lesson('レッスン4: りんご・ケーキ', 4,
                pictures: [
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'タルト',
                    ],
                    [
                        'ja' => '果物',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'りんご',
                            'タルト',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir alma tart', 'correct' => ['bir', 'alma', 'tart'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'تفاحة فطيرة', 'correct' => ['تفاحة', 'فطيرة'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'яблоко тарт', 'correct' => ['яблоко', 'тарт'], 'extra' => ['фрукт']],
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
                            'tr' => ['sentence' => 'elmalı bir turta', 'correct' => ['elmalı', 'bir', 'turta'], 'extra' => ['meyve']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '新鮮な',
                            '果物',
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir təzə meyvə', 'correct' => ['bir', 'təzə', 'meyvə'], 'extra' => ['tart']],
                            'ar' => ['sentence' => 'طازج فاكهة', 'correct' => ['طازج', 'فاكهة'], 'extra' => ['فطيرة']],
                            'ru' => ['sentence' => 'свежий фрукт', 'correct' => ['свежий', 'фрукт'], 'extra' => ['тарт']],
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
                            'tr' => ['sentence' => 'taze bir meyve', 'correct' => ['taze', 'bir', 'meyve'], 'extra' => ['turta']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'タルト',
                            'と',
                            'ケーキ',
                        ],
                        'blank' => 2,
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
            $builder->lesson('レッスン5: ケーキ・アイスクリーム', 5,
                pictures: [
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                    [
                        'ja' => 'アイスクリーム',
                        'img' => 'icecream',
                    ],
                ],
                plain: [
                    [
                        'ja' => '甘い',
                    ],
                    [
                        'ja' => 'すぎます',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '甘い',
                            'ケーキ',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir şirin tort', 'correct' => ['bir', 'şirin', 'tort'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'حلو كعكة', 'correct' => ['حلو', 'كعكة'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'сладкий торт', 'correct' => ['сладкий', 'торт'], 'extra' => ['слишком много']],
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
                            'tr' => ['sentence' => 'tatlı bir pasta', 'correct' => ['tatlı', 'bir', 'pasta'], 'extra' => ['çok fazla']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'アイスクリーム',
                            'は',
                            '甘すぎる',
                        ],
                        'blank' => 2,
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
                            '甘い',
                            'ケーキ',
                            'と',
                            '甘い',
                            'アイスクリーム',
                        ],
                        'blank' => 4,
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
