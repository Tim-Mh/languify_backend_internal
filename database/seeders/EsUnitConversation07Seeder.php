<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation07Seeder extends Seeder
{
    private const PICTURES = [
        'calle' => 'street',
        'estación' => 'station',
        'tienda' => 'shop',
        'parque' => 'park',
        'escuela' => 'school',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 7, the Spanish twin of the
     * English "Unit 7: Giving Directions" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unidad 7: Dar direcciones', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Calle y Estación', 1,
                pictures: [
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'es' => 'recto',
                    ],
                    [
                        'es' => 'girar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'por',
                            'la',
                            'calle',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight on the street',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'on',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'turn',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => ['dönüş']],
                            'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => ['منعطف']],
                            'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => ['поворот']],
                            'de' => [
                                'sentence' => 'Geh geradeaus auf der Straße',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'auf',
                                    'der',
                                    'Straße',
                                ],
                                'extra' => [
                                    'abbiegen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit sur la rue',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'sur',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'tourner',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りをまっすぐ行く',
                                'correct' => [
                                    '通り',
                                    'を',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '曲がる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 똑바로 가다',
                                'correct' => [
                                    '거리를',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '돌다',
                                ],
                            ],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => ['dön']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Gira',
                            'a',
                            'la',
                            'derecha',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn right',
                                'correct' => [
                                    'turn',
                                    'right',
                                ],
                                'extra' => [
                                    'straight',
                                    'station',
                                ],
                            ],
                            'az' => ['sentence' => 'dönüş sağ', 'correct' => ['dönüş', 'sağ'], 'extra' => ['düz', 'stansiya']],
                            'ar' => ['sentence' => 'منعطف يمين', 'correct' => ['منعطف', 'يمين'], 'extra' => ['مباشرة', 'محطة']],
                            'ru' => ['sentence' => 'поворот правый', 'correct' => ['поворот', 'правый'], 'extra' => ['прямо', 'станция']],
                            'de' => [
                                'sentence' => 'Biege rechts ab',
                                'correct' => [
                                    'abbiegen',
                                    'rechts',
                                ],
                                'extra' => [
                                    'geradeaus',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne à droite',
                                'correct' => [
                                    'tourner',
                                    'droite',
                                ],
                                'extra' => [
                                    'tout droit',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '右に曲がる',
                                'correct' => [
                                    '右',
                                    'に',
                                    '曲がる',
                                ],
                                'extra' => [
                                    'まっすぐ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오른쪽으로 돌다',
                                'correct' => [
                                    '오른쪽으로',
                                    '돌다',
                                ],
                                'extra' => [
                                    '똑바로',
                                ],
                            ],
                            'tr' => ['sentence' => 'sağa dön', 'correct' => ['sağa', 'dön'], 'extra' => ['düz', 'istasyon']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'a',
                            'la',
                            'estación',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight to the station',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'to',
                                    'the',
                                    'station',
                                ],
                                'extra' => [
                                    'street',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm düz stansiya', 'correct' => ['gedirəm', 'düz', 'stansiya'], 'extra' => ['küçə']],
                            'ar' => ['sentence' => 'أذهب مباشرة إلى محطة', 'correct' => ['أذهب', 'مباشرة', 'إلى', 'محطة'], 'extra' => ['شارع']],
                            'ru' => ['sentence' => 'иду прямо в станция', 'correct' => ['иду', 'прямо', 'в', 'станция'], 'extra' => ['улица']],
                            'de' => [
                                'sentence' => 'Geh geradeaus zum Bahnhof',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'zu',
                                    'dem',
                                    'Bahnhof',
                                ],
                                'extra' => [
                                    'Straße',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit jusqu\'à la gare',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'à',
                                    'la',
                                    'gare',
                                ],
                                'extra' => [
                                    'rue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅までまっすぐ行く',
                                'correct' => [
                                    '駅',
                                    'まで',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '通り',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역까지 똑바로 가다',
                                'correct' => [
                                    '역까지',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '거리',
                                ],
                            ],
                            'tr' => ['sentence' => 'istasyona düz git', 'correct' => ['istasyona', 'düz', 'git'], 'extra' => ['cadde']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Calle y Parque', 2,
                pictures: [
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cruzar',
                    ],
                    [
                        'es' => 'continuar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cruza',
                            'la',
                            'calle',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cross the street',
                                'correct' => [
                                    'cross',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'continue',
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'keç küçə', 'correct' => ['keç', 'küçə'], 'extra' => ['davam et', 'park']],
                            'ar' => ['sentence' => 'اعبر شارع', 'correct' => ['اعبر', 'شارع'], 'extra' => ['تابع', 'حديقة']],
                            'ru' => ['sentence' => 'перейди улица', 'correct' => ['перейди', 'улица'], 'extra' => ['продолжай', 'парк']],
                            'de' => [
                                'sentence' => 'Überquere die Straße',
                                'correct' => [
                                    'überqueren',
                                    'die',
                                    'Straße',
                                ],
                                'extra' => [
                                    'weitergehen',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Traverse la rue',
                                'correct' => [
                                    'traverser',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'continuer',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りを渡る',
                                'correct' => [
                                    '通り',
                                    'を',
                                    '渡る',
                                ],
                                'extra' => [
                                    '続ける',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 건너다',
                                'correct' => [
                                    '거리를',
                                    '건너다',
                                ],
                                'extra' => [
                                    '계속하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'caddeyi geç', 'correct' => ['caddeyi', 'geç'], 'extra' => ['devam et', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Continúa',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'continue to the park',
                                'correct' => [
                                    'continue',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'cross',
                                    'street',
                                ],
                            ],
                            'az' => ['sentence' => 'davam et park', 'correct' => ['davam et', 'park'], 'extra' => ['keç', 'küçə']],
                            'ar' => ['sentence' => 'تابع إلى حديقة', 'correct' => ['تابع', 'إلى', 'حديقة'], 'extra' => ['اعبر', 'شارع']],
                            'ru' => ['sentence' => 'продолжай в парк', 'correct' => ['продолжай', 'в', 'парк'], 'extra' => ['перейди', 'улица']],
                            'de' => [
                                'sentence' => 'Geh weiter zum Park',
                                'correct' => [
                                    'weitergehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'überqueren',
                                    'Straße',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Continue au parc',
                                'correct' => [
                                    'continuer',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'traverser',
                                    'rue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '公園まで続ける',
                                'correct' => [
                                    '公園',
                                    'まで',
                                    '続ける',
                                ],
                                'extra' => [
                                    '渡る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원까지 계속하다',
                                'correct' => [
                                    '공원까지',
                                    '계속하다',
                                ],
                                'extra' => [
                                    '건너다',
                                ],
                            ],
                            'tr' => ['sentence' => 'parka devam et', 'correct' => ['parka', 'devam', 'et'], 'extra' => ['geç', 'cadde']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Cruza',
                            'y',
                            'continúa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cross and continue',
                                'correct' => [
                                    'cross',
                                    'and',
                                    'continue',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'keç və davam et', 'correct' => ['keç', 'və', 'davam et'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'اعبر و تابع', 'correct' => ['اعبر', 'و', 'تابع'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'перейди и продолжай', 'correct' => ['перейди', 'и', 'продолжай'], 'extra' => ['парк']],
                            'de' => [
                                'sentence' => 'Überquere und geh weiter',
                                'correct' => [
                                    'überqueren',
                                    'und',
                                    'weitergehen',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Traverse et continue',
                                'correct' => [
                                    'traverser',
                                    'et',
                                    'continuer',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '渡って続ける',
                                'correct' => [
                                    '渡って',
                                    '続ける',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '건너서 계속하다',
                                'correct' => [
                                    '건너서',
                                    '계속하다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                            'tr' => ['sentence' => 'geç ve devam et', 'correct' => ['geç', 've', 'devam', 'et'], 'extra' => ['park']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Tienda y Casa', 3,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'delante',
                    ],
                    [
                        'es' => 'detrás',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Delante',
                            'de',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'in front of the shop',
                                'correct' => [
                                    'in front',
                                    'of',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'behind',
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'qarşıda mağaza', 'correct' => ['qarşıda', 'mağaza'], 'extra' => ['arxada', 'ev']],
                            'ar' => ['sentence' => 'أمام متجر', 'correct' => ['أمام', 'متجر'], 'extra' => ['خلف', 'بيت']],
                            'ru' => ['sentence' => 'впереди магазин', 'correct' => ['впереди', 'магазин'], 'extra' => ['сзади', 'дом']],
                            'de' => [
                                'sentence' => 'Vor dem Geschäft',
                                'correct' => [
                                    'vorne',
                                    'von',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'hinten',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Devant le magasin',
                                'correct' => [
                                    'devant',
                                    'de',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'derrière',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店の前に',
                                'correct' => [
                                    '店',
                                    'の前に',
                                ],
                                'extra' => [
                                    '後ろに',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게 앞에',
                                'correct' => [
                                    '가게',
                                    '앞에',
                                ],
                                'extra' => [
                                    '뒤에',
                                ],
                            ],
                            'tr' => ['sentence' => 'dükkanın önünde', 'correct' => ['dükkanın', 'önünde'], 'extra' => ['arkasında', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Detrás',
                            'de',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'behind the house',
                                'correct' => [
                                    'behind',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'in front',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'arxada ev', 'correct' => ['arxada', 'ev'], 'extra' => ['qarşıda', 'mağaza']],
                            'ar' => ['sentence' => 'خلف بيت', 'correct' => ['خلف', 'بيت'], 'extra' => ['أمام', 'متجر']],
                            'ru' => ['sentence' => 'сзади дом', 'correct' => ['сзади', 'дом'], 'extra' => ['впереди', 'магазин']],
                            'de' => [
                                'sentence' => 'Hinter dem Haus',
                                'correct' => [
                                    'hinten',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'vorne',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Derrière la maison',
                                'correct' => [
                                    'derrière',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'devant',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家の後ろに',
                                'correct' => [
                                    '家',
                                    'の後ろに',
                                ],
                                'extra' => [
                                    '前に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집 뒤에',
                                'correct' => [
                                    '집',
                                    '뒤에',
                                ],
                                'extra' => [
                                    '앞에',
                                ],
                            ],
                            'tr' => ['sentence' => 'evin arkasında', 'correct' => ['evin', 'arkasında'], 'extra' => ['önde', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Delante',
                            'o',
                            'detrás',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'in front or behind',
                                'correct' => [
                                    'in front',
                                    'or',
                                    'behind',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'qarşıda və ya arxada', 'correct' => ['qarşıda', 'və ya', 'arxada'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'أمام أو خلف', 'correct' => ['أمام', 'أو', 'خلف'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'впереди или сзади', 'correct' => ['впереди', 'или', 'сзади'], 'extra' => ['магазин']],
                            'de' => [
                                'sentence' => 'Vorne oder hinten',
                                'correct' => [
                                    'vorne',
                                    'oder',
                                    'hinten',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Devant ou derrière',
                                'correct' => [
                                    'devant',
                                    'ou',
                                    'derrière',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '前か後ろ',
                                'correct' => [
                                    '前',
                                    'か',
                                    '後ろ',
                                ],
                                'extra' => [
                                    '店',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '앞에 또는 뒤에',
                                'correct' => [
                                    '앞에',
                                    '또는',
                                    '뒤에',
                                ],
                                'extra' => [
                                    '가게',
                                ],
                            ],
                            'tr' => ['sentence' => 'önde veya arkada', 'correct' => ['önde', 'veya', 'arkada'], 'extra' => ['dükkan']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Estación y Escuela', 4,
                pictures: [
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'norte',
                    ],
                    [
                        'es' => 'sur',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'estación',
                            'está',
                            'al',
                            'norte',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station is north',
                                'correct' => [
                                    'the',
                                    'station',
                                    'is',
                                    'north',
                                ],
                                'extra' => [
                                    'south',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'stansiya şimal', 'correct' => ['stansiya', 'şimal'], 'extra' => ['cənub', 'məktəb']],
                            'ar' => ['sentence' => 'محطة شمال', 'correct' => ['محطة', 'شمال'], 'extra' => ['جنوب', 'مدرسة']],
                            'ru' => ['sentence' => 'станция север', 'correct' => ['станция', 'север'], 'extra' => ['юг', 'школа']],
                            'de' => [
                                'sentence' => 'Der Bahnhof ist im Norden',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'ist',
                                    'Norden',
                                ],
                                'extra' => [
                                    'Süden',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare est au nord',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'est',
                                    'nord',
                                ],
                                'extra' => [
                                    'sud',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅は北にあります',
                                'correct' => [
                                    '駅',
                                    'は',
                                    '北',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '南',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역은 북쪽에 있습니다',
                                'correct' => [
                                    '역은',
                                    '북쪽에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '남쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'istasyon kuzeyde', 'correct' => ['istasyon', 'kuzeyde'], 'extra' => ['güney', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'escuela',
                            'está',
                            'al',
                            'sur',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is south',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'south',
                                ],
                                'extra' => [
                                    'north',
                                    'station',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb cənub', 'correct' => ['məktəb', 'cənub'], 'extra' => ['şimal', 'stansiya']],
                            'ar' => ['sentence' => 'مدرسة جنوب', 'correct' => ['مدرسة', 'جنوب'], 'extra' => ['شمال', 'محطة']],
                            'ru' => ['sentence' => 'школа юг', 'correct' => ['школа', 'юг'], 'extra' => ['север', 'станция']],
                            'de' => [
                                'sentence' => 'Die Schule ist im Süden',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'Süden',
                                ],
                                'extra' => [
                                    'Norden',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est au sud',
                                'correct' => [
                                    'le',
                                    'école',
                                    'est',
                                    'sud',
                                ],
                                'extra' => [
                                    'nord',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は南にあります',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '南',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '北',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 남쪽에 있습니다',
                                'correct' => [
                                    '학교는',
                                    '남쪽에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '북쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul güneyde', 'correct' => ['okul', 'güneyde'], 'extra' => ['kuzey', 'istasyon']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Norte',
                            'o',
                            'sur',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'north or south',
                                'correct' => [
                                    'north',
                                    'or',
                                    'south',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'şimal və ya cənub', 'correct' => ['şimal', 'və ya', 'cənub'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'شمال أو جنوب', 'correct' => ['شمال', 'أو', 'جنوب'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'север или юг', 'correct' => ['север', 'или', 'юг'], 'extra' => ['школа']],
                            'de' => [
                                'sentence' => 'Norden oder Süden',
                                'correct' => [
                                    'Norden',
                                    'oder',
                                    'Süden',
                                ],
                                'extra' => [
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Nord ou sud',
                                'correct' => [
                                    'nord',
                                    'ou',
                                    'sud',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '北か南',
                                'correct' => [
                                    '北',
                                    'か',
                                    '南',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '북쪽 또는 남쪽',
                                'correct' => [
                                    '북쪽',
                                    '또는',
                                    '남쪽',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                            'tr' => ['sentence' => 'kuzey veya güney', 'correct' => ['kuzey', 'veya', 'güney'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Estación y Calle', 5,
                pictures: [
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                ],
                plain: [
                    [
                        'es' => 'girar',
                    ],
                    [
                        'es' => 'recto',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Gira',
                            'a',
                            'la',
                            'derecha',
                            'en',
                            'la',
                            'estación',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn right at the station',
                                'correct' => [
                                    'turn',
                                    'right',
                                    'at',
                                    'the',
                                    'station',
                                ],
                                'extra' => [
                                    'straight',
                                ],
                            ],
                            'az' => ['sentence' => 'dönüş sağ yanında stansiya', 'correct' => ['dönüş', 'sağ', 'yanında', 'stansiya'], 'extra' => ['düz']],
                            'ar' => ['sentence' => 'منعطف يمين على محطة', 'correct' => ['منعطف', 'يمين', 'على', 'محطة'], 'extra' => ['مباشرة']],
                            'ru' => ['sentence' => 'поворот правый на станция', 'correct' => ['поворот', 'правый', 'на', 'станция'], 'extra' => ['прямо']],
                            'de' => [
                                'sentence' => 'Biege am Bahnhof rechts ab',
                                'correct' => [
                                    'abbiegen',
                                    'rechts',
                                    'an',
                                    'dem',
                                    'Bahnhof',
                                ],
                                'extra' => [
                                    'geradeaus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne à droite à la gare',
                                'correct' => [
                                    'tourner',
                                    'droite',
                                    'à',
                                    'la',
                                    'gare',
                                ],
                                'extra' => [
                                    'tout droit',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅で右に曲がる',
                                'correct' => [
                                    '駅',
                                    'で',
                                    '右',
                                    'に',
                                    '曲がる',
                                ],
                                'extra' => [
                                    'まっすぐ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역에서 오른쪽으로 돌다',
                                'correct' => [
                                    '역에서',
                                    '오른쪽으로',
                                    '돌다',
                                ],
                                'extra' => [
                                    '똑바로',
                                ],
                            ],
                            'tr' => ['sentence' => 'istasyonda sağa dön', 'correct' => ['istasyonda', 'sağa', 'dön'], 'extra' => ['düz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'por',
                            'la',
                            'calle',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight on the street',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'on',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'turn',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => ['dönüş']],
                            'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => ['منعطف']],
                            'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => ['поворот']],
                            'de' => [
                                'sentence' => 'Geh geradeaus auf der Straße',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'auf',
                                    'der',
                                    'Straße',
                                ],
                                'extra' => [
                                    'abbiegen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit sur la rue',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'sur',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'tourner',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りをまっすぐ行く',
                                'correct' => [
                                    '通り',
                                    'を',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '曲がる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 똑바로 가다',
                                'correct' => [
                                    '거리를',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '돌다',
                                ],
                            ],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => ['dön']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Gira',
                            'y',
                            've',
                            'recto',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn and go straight',
                                'correct' => [
                                    'turn',
                                    'and',
                                    'go',
                                    'straight',
                                ],
                                'extra' => [
                                    'station',
                                ],
                            ],
                            'az' => ['sentence' => 'dönüş və gedirəm düz', 'correct' => ['dönüş', 'və', 'gedirəm', 'düz'], 'extra' => ['stansiya']],
                            'ar' => ['sentence' => 'منعطف و أذهب مباشرة', 'correct' => ['منعطف', 'و', 'أذهب', 'مباشرة'], 'extra' => ['محطة']],
                            'ru' => ['sentence' => 'поворот и иду прямо', 'correct' => ['поворот', 'и', 'иду', 'прямо'], 'extra' => ['станция']],
                            'de' => [
                                'sentence' => 'Bieg ab und geh geradeaus',
                                'correct' => [
                                    'abbiegen',
                                    'und',
                                    'gehen',
                                    'geradeaus',
                                ],
                                'extra' => [
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne et va tout droit',
                                'correct' => [
                                    'tourner',
                                    'et',
                                    'aller',
                                    'tout droit',
                                ],
                                'extra' => [
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '曲がってまっすぐ行く',
                                'correct' => [
                                    '曲がって',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '駅',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '돌아서 똑바로 가다',
                                'correct' => [
                                    '돌아서',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '역',
                                ],
                            ],
                            'tr' => ['sentence' => 'dön ve düz git', 'correct' => ['dön', 've', 'düz', 'git'], 'extra' => ['istasyon']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
