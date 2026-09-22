<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = [
        'escuela' => 'school',
        'parque' => 'park',
        'tienda' => 'shop',
        'calle' => 'street',
        'estación' => 'station',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 8, the Spanish twin of the
     * English "Unit 8: Places in Town" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unidad 8: Lugares en la ciudad', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Escuela y Tienda', 1,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ciudad',
                    ],
                    [
                        'es' => 'pueblo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'ciudad',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the town',
                                'correct' => [
                                    'the',
                                    'town',
                                ],
                                'extra' => [
                                    'village',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'qəsəbə', 'correct' => ['qəsəbə'], 'extra' => ['kənd', 'məktəb']],
                            'ar' => ['sentence' => 'بلدة', 'correct' => ['بلدة'], 'extra' => ['قرية', 'مدرسة']],
                            'ru' => ['sentence' => 'город', 'correct' => ['город'], 'extra' => ['деревня', 'школа']],
                            'de' => [
                                'sentence' => 'Die Stadt',
                                'correct' => [
                                    'die',
                                    'Stadt',
                                ],
                                'extra' => [
                                    'Dorf',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La ville',
                                'correct' => [
                                    'la',
                                    'ville',
                                ],
                                'extra' => [
                                    'village',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '町',
                                'correct' => [
                                    '町',
                                ],
                                'extra' => [
                                    '村',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '도시',
                                'correct' => [
                                    '도시',
                                ],
                                'extra' => [
                                    '마을',
                                ],
                            ],
                            'tr' => ['sentence' => 'şehir', 'correct' => ['şehir'], 'extra' => ['köy', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pueblo',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the village',
                                'correct' => [
                                    'the',
                                    'village',
                                ],
                                'extra' => [
                                    'town',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'kənd', 'correct' => ['kənd'], 'extra' => ['qəsəbə', 'mağaza']],
                            'ar' => ['sentence' => 'قرية', 'correct' => ['قرية'], 'extra' => ['بلدة', 'متجر']],
                            'ru' => ['sentence' => 'деревня', 'correct' => ['деревня'], 'extra' => ['город', 'магазин']],
                            'de' => [
                                'sentence' => 'Das Dorf',
                                'correct' => [
                                    'das',
                                    'Dorf',
                                ],
                                'extra' => [
                                    'Stadt',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le village',
                                'correct' => [
                                    'le',
                                    'village',
                                ],
                                'extra' => [
                                    'ville',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '村',
                                'correct' => [
                                    '村',
                                ],
                                'extra' => [
                                    '町',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '마을',
                                'correct' => [
                                    '마을',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                            'tr' => ['sentence' => 'köy', 'correct' => ['köy'], 'extra' => ['şehir', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'escuela',
                            'y',
                            'la',
                            'tienda',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school and the shop',
                                'correct' => [
                                    'the',
                                    'school',
                                    'and',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'town',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb və mağaza', 'correct' => ['məktəb', 'və', 'mağaza'], 'extra' => ['qəsəbə']],
                            'ar' => ['sentence' => 'مدرسة و متجر', 'correct' => ['مدرسة', 'و', 'متجر'], 'extra' => ['بلدة']],
                            'ru' => ['sentence' => 'школа и магазин', 'correct' => ['школа', 'и', 'магазин'], 'extra' => ['город']],
                            'de' => [
                                'sentence' => 'Die Schule und das Geschäft',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'und',
                                    'das',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'Stadt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école et le magasin',
                                'correct' => [
                                    'école',
                                    'et',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'ville',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校と店',
                                'correct' => [
                                    '学校',
                                    'と',
                                    '店',
                                ],
                                'extra' => [
                                    '町',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교와 가게',
                                'correct' => [
                                    '학교와',
                                    '가게',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul ve dükkan', 'correct' => ['okul', 've', 'dükkan'], 'extra' => ['şehir']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Escuela y Estación', 2,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cerca',
                    ],
                    [
                        'es' => 'lejos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'escuela',
                            'está',
                            'cerca',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is near',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'near',
                                ],
                                'extra' => [
                                    'far',
                                    'station',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb yaxın', 'correct' => ['məktəb', 'yaxın'], 'extra' => ['uzaq', 'stansiya']],
                            'ar' => ['sentence' => 'مدرسة قريب', 'correct' => ['مدرسة', 'قريب'], 'extra' => ['بعيد', 'محطة']],
                            'ru' => ['sentence' => 'школа близко', 'correct' => ['школа', 'близко'], 'extra' => ['далеко', 'станция']],
                            'de' => [
                                'sentence' => 'Die Schule ist nah',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'nah',
                                ],
                                'extra' => [
                                    'weit',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est près',
                                'correct' => [
                                    'école',
                                    'est',
                                    'près',
                                ],
                                'extra' => [
                                    'loin',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は近いです',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '近い',
                                    'です',
                                ],
                                'extra' => [
                                    '遠く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 가깝습니다',
                                'correct' => [
                                    '학교는',
                                    '가깝습니다',
                                ],
                                'extra' => [
                                    '멀리',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul yakın', 'correct' => ['okul', 'yakın'], 'extra' => ['uzak', 'istasyon']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'estación',
                            'está',
                            'lejos',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station is far',
                                'correct' => [
                                    'the',
                                    'station',
                                    'is',
                                    'far',
                                ],
                                'extra' => [
                                    'near',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'stansiya uzaq', 'correct' => ['stansiya', 'uzaq'], 'extra' => ['yaxın', 'məktəb']],
                            'ar' => ['sentence' => 'محطة بعيد', 'correct' => ['محطة', 'بعيد'], 'extra' => ['قريب', 'مدرسة']],
                            'ru' => ['sentence' => 'станция далеко', 'correct' => ['станция', 'далеко'], 'extra' => ['близко', 'школа']],
                            'de' => [
                                'sentence' => 'Der Bahnhof ist weit',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'ist',
                                    'weit',
                                ],
                                'extra' => [
                                    'nah',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare est loin',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'est',
                                    'loin',
                                ],
                                'extra' => [
                                    'près',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅は遠いです',
                                'correct' => [
                                    '駅',
                                    'は',
                                    '遠い',
                                    'です',
                                ],
                                'extra' => [
                                    '近く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역은 멉니다',
                                'correct' => [
                                    '역은',
                                    '멉니다',
                                ],
                                'extra' => [
                                    '가까이',
                                ],
                            ],
                            'tr' => ['sentence' => 'istasyon uzak', 'correct' => ['istasyon', 'uzak'], 'extra' => ['yakın', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Cerca',
                            'o',
                            'lejos',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'near or far',
                                'correct' => [
                                    'near',
                                    'or',
                                    'far',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'yaxın və ya uzaq', 'correct' => ['yaxın', 'və ya', 'uzaq'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'قريب أو بعيد', 'correct' => ['قريب', 'أو', 'بعيد'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'близко или далеко', 'correct' => ['близко', 'или', 'далеко'], 'extra' => ['школа']],
                            'de' => [
                                'sentence' => 'Nah oder weit',
                                'correct' => [
                                    'nah',
                                    'oder',
                                    'weit',
                                ],
                                'extra' => [
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Près ou loin',
                                'correct' => [
                                    'près',
                                    'ou',
                                    'loin',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '近くか遠く',
                                'correct' => [
                                    '近く',
                                    'か',
                                    '遠く',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가깝거나 멀리',
                                'correct' => [
                                    '가깝거나',
                                    '멀리',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                            'tr' => ['sentence' => 'yakın veya uzak', 'correct' => ['yakın', 'veya', 'uzak'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Parque y Tienda', 3,
                pictures: [
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ir',
                    ],
                    [
                        'es' => 'venir',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ir',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go to the park',
                                'correct' => [
                                    'go',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'come',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm park', 'correct' => ['gedirəm', 'park'], 'extra' => ['gəl', 'mağaza']],
                            'ar' => ['sentence' => 'أذهب إلى حديقة', 'correct' => ['أذهب', 'إلى', 'حديقة'], 'extra' => ['تعال', 'متجر']],
                            'ru' => ['sentence' => 'иду в парк', 'correct' => ['иду', 'в', 'парк'], 'extra' => ['приходи', 'магазин']],
                            'de' => [
                                'sentence' => 'Zum Park gehen',
                                'correct' => [
                                    'gehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'kommen',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aller au parc',
                                'correct' => [
                                    'aller',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'venir',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '公園へ行く',
                                'correct' => [
                                    '公園',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '来る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원으로 가다',
                                'correct' => [
                                    '공원으로',
                                    '가다',
                                ],
                                'extra' => [
                                    '오다',
                                ],
                            ],
                            'tr' => ['sentence' => 'parka git', 'correct' => ['parka', 'git'], 'extra' => ['gel', 'dükkan']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Venir',
                            'a',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'come to the shop',
                                'correct' => [
                                    'come',
                                    'to',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'go',
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'gəl mağaza', 'correct' => ['gəl', 'mağaza'], 'extra' => ['gedirəm', 'park']],
                            'ar' => ['sentence' => 'تعال إلى متجر', 'correct' => ['تعال', 'إلى', 'متجر'], 'extra' => ['أذهب', 'حديقة']],
                            'ru' => ['sentence' => 'приходи в магазин', 'correct' => ['приходи', 'в', 'магазин'], 'extra' => ['иду', 'парк']],
                            'de' => [
                                'sentence' => 'Zum Geschäft kommen',
                                'correct' => [
                                    'kommen',
                                    'zu',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'gehen',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Venir au magasin',
                                'correct' => [
                                    'venir',
                                    'à',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'aller',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店へ来る',
                                'correct' => [
                                    '店',
                                    'へ',
                                    '来る',
                                ],
                                'extra' => [
                                    '行く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게로 오다',
                                'correct' => [
                                    '가게로',
                                    '오다',
                                ],
                                'extra' => [
                                    '가다',
                                ],
                            ],
                            'tr' => ['sentence' => 'dükkana gel', 'correct' => ['dükkana', 'gel'], 'extra' => ['git', 'park']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ir',
                            'y',
                            'venir',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go and come',
                                'correct' => [
                                    'go',
                                    'and',
                                    'come',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm və gəl', 'correct' => ['gedirəm', 'və', 'gəl'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'أذهب و تعال', 'correct' => ['أذهب', 'و', 'تعال'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'иду и приходи', 'correct' => ['иду', 'и', 'приходи'], 'extra' => ['парк']],
                            'de' => [
                                'sentence' => 'Gehen und kommen',
                                'correct' => [
                                    'gehen',
                                    'und',
                                    'kommen',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aller et venir',
                                'correct' => [
                                    'aller',
                                    'et',
                                    'venir',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '行って来る',
                                'correct' => [
                                    '行って',
                                    '来る',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가고 오다',
                                'correct' => [
                                    '가고',
                                    '오다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                            'tr' => ['sentence' => 'git ve gel', 'correct' => ['git', 've', 'gel'], 'extra' => ['park']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Calle y Estación', 4,
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
                        'es' => 'izquierda',
                    ],
                    [
                        'es' => 'derecha',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'calle',
                            'a',
                            'la',
                            'izquierda',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the street on the left',
                                'correct' => [
                                    'the',
                                    'street',
                                    'on',
                                    'the',
                                    'left',
                                ],
                                'extra' => [
                                    'right',
                                ],
                            ],
                            'az' => ['sentence' => 'küçə üzərində sol', 'correct' => ['küçə', 'üzərində', 'sol'], 'extra' => ['sağ']],
                            'ar' => ['sentence' => 'شارع على يسار', 'correct' => ['شارع', 'على', 'يسار'], 'extra' => ['يمين']],
                            'ru' => ['sentence' => 'улица на левый', 'correct' => ['улица', 'на', 'левый'], 'extra' => ['правый']],
                            'de' => [
                                'sentence' => 'Die Straße links',
                                'correct' => [
                                    'die',
                                    'Straße',
                                    'auf',
                                    'der',
                                    'links',
                                ],
                                'extra' => [
                                    'rechts',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La rue à gauche',
                                'correct' => [
                                    'la',
                                    'rue',
                                    'sur',
                                    'la',
                                    'gauche',
                                ],
                                'extra' => [
                                    'droite',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '左の通り',
                                'correct' => [
                                    '左',
                                    'の',
                                    '通り',
                                ],
                                'extra' => [
                                    '右',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왼쪽의 거리',
                                'correct' => [
                                    '왼쪽의',
                                    '거리',
                                ],
                                'extra' => [
                                    '오른쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'solda cadde', 'correct' => ['solda', 'cadde'], 'extra' => ['sağ']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'estación',
                            'a',
                            'la',
                            'derecha',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station on the right',
                                'correct' => [
                                    'the',
                                    'station',
                                    'on',
                                    'the',
                                    'right',
                                ],
                                'extra' => [
                                    'left',
                                ],
                            ],
                            'az' => ['sentence' => 'stansiya üzərində sağ', 'correct' => ['stansiya', 'üzərində', 'sağ'], 'extra' => ['sol']],
                            'ar' => ['sentence' => 'محطة على يمين', 'correct' => ['محطة', 'على', 'يمين'], 'extra' => ['يسار']],
                            'ru' => ['sentence' => 'станция на правый', 'correct' => ['станция', 'на', 'правый'], 'extra' => ['левый']],
                            'de' => [
                                'sentence' => 'Der Bahnhof rechts',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'auf',
                                    'der',
                                    'rechts',
                                ],
                                'extra' => [
                                    'links',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare à droite',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'sur',
                                    'la',
                                    'droite',
                                ],
                                'extra' => [
                                    'gauche',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '右の駅',
                                'correct' => [
                                    '右',
                                    'の',
                                    '駅',
                                ],
                                'extra' => [
                                    '左',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오른쪽의 역',
                                'correct' => [
                                    '오른쪽의',
                                    '역',
                                ],
                                'extra' => [
                                    '왼쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'sağda istasyon', 'correct' => ['sağda', 'istasyon'], 'extra' => ['sol']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Izquierda',
                            'o',
                            'derecha',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'left or right',
                                'correct' => [
                                    'left',
                                    'or',
                                    'right',
                                ],
                                'extra' => [
                                    'street',
                                ],
                            ],
                            'az' => ['sentence' => 'sol və ya sağ', 'correct' => ['sol', 'və ya', 'sağ'], 'extra' => ['küçə']],
                            'ar' => ['sentence' => 'يسار أو يمين', 'correct' => ['يسار', 'أو', 'يمين'], 'extra' => ['شارع']],
                            'ru' => ['sentence' => 'левый или правый', 'correct' => ['левый', 'или', 'правый'], 'extra' => ['улица']],
                            'de' => [
                                'sentence' => 'Links oder rechts',
                                'correct' => [
                                    'links',
                                    'oder',
                                    'rechts',
                                ],
                                'extra' => [
                                    'Straße',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Gauche ou droite',
                                'correct' => [
                                    'gauche',
                                    'ou',
                                    'droite',
                                ],
                                'extra' => [
                                    'rue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '左か右',
                                'correct' => [
                                    '左',
                                    'か',
                                    '右',
                                ],
                                'extra' => [
                                    '通り',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왼쪽 또는 오른쪽',
                                'correct' => [
                                    '왼쪽',
                                    '또는',
                                    '오른쪽',
                                ],
                                'extra' => [
                                    '거리',
                                ],
                            ],
                            'tr' => ['sentence' => 'sol veya sağ', 'correct' => ['sol', 'veya', 'sağ'], 'extra' => ['cadde']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Tienda y Escuela', 5,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'abierto',
                    ],
                    [
                        'es' => 'cerrado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'tienda',
                            'está',
                            'abierta',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the shop is open',
                                'correct' => [
                                    'the',
                                    'shop',
                                    'is',
                                    'open',
                                ],
                                'extra' => [
                                    'closed',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'mağaza açıq', 'correct' => ['mağaza', 'açıq'], 'extra' => ['bağlı', 'məktəb']],
                            'ar' => ['sentence' => 'متجر مفتوح', 'correct' => ['متجر', 'مفتوح'], 'extra' => ['مغلق', 'مدرسة']],
                            'ru' => ['sentence' => 'магазин открыто', 'correct' => ['магазин', 'открыто'], 'extra' => ['закрыто', 'школа']],
                            'de' => [
                                'sentence' => 'Das Geschäft ist offen',
                                'correct' => [
                                    'das',
                                    'Geschäft',
                                    'ist',
                                    'offen',
                                ],
                                'extra' => [
                                    'geschlossen',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le magasin est ouvert',
                                'correct' => [
                                    'le',
                                    'magasin',
                                    'est',
                                    'ouvert',
                                ],
                                'extra' => [
                                    'fermé',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店は開いています',
                                'correct' => [
                                    '店',
                                    'は',
                                    '開いています',
                                ],
                                'extra' => [
                                    '閉じた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게는 열려 있습니다',
                                'correct' => [
                                    '가게는',
                                    '열려',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '닫힌',
                                ],
                            ],
                            'tr' => ['sentence' => 'dükkan açık', 'correct' => ['dükkan', 'açık'], 'extra' => ['kapalı', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'escuela',
                            'está',
                            'cerrada',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is closed',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'closed',
                                ],
                                'extra' => [
                                    'open',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb bağlı', 'correct' => ['məktəb', 'bağlı'], 'extra' => ['açıq', 'mağaza']],
                            'ar' => ['sentence' => 'مدرسة مغلق', 'correct' => ['مدرسة', 'مغلق'], 'extra' => ['مفتوح', 'متجر']],
                            'ru' => ['sentence' => 'школа закрыто', 'correct' => ['школа', 'закрыто'], 'extra' => ['открыто', 'магазин']],
                            'de' => [
                                'sentence' => 'Die Schule ist geschlossen',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'geschlossen',
                                ],
                                'extra' => [
                                    'offen',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est fermée',
                                'correct' => [
                                    'école',
                                    'est',
                                    'fermé',
                                ],
                                'extra' => [
                                    'ouvert',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は閉まっています',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '閉まっています',
                                ],
                                'extra' => [
                                    '開いた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 닫혔습니다',
                                'correct' => [
                                    '학교는',
                                    '닫혔습니다',
                                ],
                                'extra' => [
                                    '열린',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul kapalı', 'correct' => ['okul', 'kapalı'], 'extra' => ['açık', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Abierto',
                            'o',
                            'cerrado',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'open or closed',
                                'correct' => [
                                    'open',
                                    'or',
                                    'closed',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'açıq və ya bağlı', 'correct' => ['açıq', 'və ya', 'bağlı'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'مفتوح أو مغلق', 'correct' => ['مفتوح', 'أو', 'مغلق'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'открыто или закрыто', 'correct' => ['открыто', 'или', 'закрыто'], 'extra' => ['магазин']],
                            'de' => [
                                'sentence' => 'Offen oder geschlossen',
                                'correct' => [
                                    'offen',
                                    'oder',
                                    'geschlossen',
                                ],
                                'extra' => [
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ouvert ou fermé',
                                'correct' => [
                                    'ouvert',
                                    'ou',
                                    'fermé',
                                ],
                                'extra' => [
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '開いているか閉じている',
                                'correct' => [
                                    '開いて',
                                    'いる',
                                    'か',
                                    '閉じて',
                                    'いる',
                                ],
                                'extra' => [
                                    '店',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '열렸거나 닫힌',
                                'correct' => [
                                    '열렸거나',
                                    '닫힌',
                                ],
                                'extra' => [
                                    '가게',
                                ],
                            ],
                            'tr' => ['sentence' => 'açık veya kapalı', 'correct' => ['açık', 'veya', 'kapalı'], 'extra' => ['dükkan']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
