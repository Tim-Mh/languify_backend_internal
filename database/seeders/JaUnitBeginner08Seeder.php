<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = [
        '学校' => 'school',
        '公園' => 'park',
        '店' => 'shop',
        '通り' => 'street',
        '駅' => 'station',
        '家' => 'house',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 8, the Japanese twin of the
     * English "Unit 8: Places in Town" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'ユニット8: 町の場所', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 学校・店', 1,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'ja' => '町',
                    ],
                    [
                        'ja' => '村',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '町',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the town',
                                'correct' => [
                                    'the',
                                    'town',
                                ],
                                'extra' => [
                                    'village',
                                ],
                            ],
                            'az' => ['sentence' => 'qəsəbə', 'correct' => ['qəsəbə'], 'extra' => ['kənd']],
                            'ar' => ['sentence' => 'بلدة', 'correct' => ['بلدة'], 'extra' => ['قرية']],
                            'ru' => ['sentence' => 'город', 'correct' => ['город'], 'extra' => ['деревня']],
                            'es' => [
                                'sentence' => 'La ciudad',
                                'correct' => [
                                    'la',
                                    'ciudad',
                                ],
                                'extra' => [
                                    'pueblo',
                                    'escuela',
                                ],
                            ],
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
                            'ko' => [
                                'sentence' => '도시',
                                'correct' => [
                                    '도시',
                                ],
                                'extra' => [
                                    '마을',
                                ],
                            ],
                            'tr' => ['sentence' => 'şehir', 'correct' => ['şehir'], 'extra' => ['köy']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '村',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the village',
                                'correct' => [
                                    'the',
                                    'village',
                                ],
                                'extra' => [
                                    'town',
                                ],
                            ],
                            'az' => ['sentence' => 'kənd', 'correct' => ['kənd'], 'extra' => ['qəsəbə']],
                            'ar' => ['sentence' => 'قرية', 'correct' => ['قرية'], 'extra' => ['بلدة']],
                            'ru' => ['sentence' => 'деревня', 'correct' => ['деревня'], 'extra' => ['город']],
                            'es' => [
                                'sentence' => 'El pueblo',
                                'correct' => [
                                    'el',
                                    'pueblo',
                                ],
                                'extra' => [
                                    'ciudad',
                                    'tienda',
                                ],
                            ],
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
                            'ko' => [
                                'sentence' => '마을',
                                'correct' => [
                                    '마을',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                            'tr' => ['sentence' => 'köy', 'correct' => ['köy'], 'extra' => ['şehir']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '学校',
                            'と',
                            '店',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'La escuela y la tienda',
                                'correct' => [
                                    'la',
                                    'escuela',
                                    'y',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'ciudad',
                                ],
                            ],
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
            $builder->lesson('レッスン2: 学校・駅', 2,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '駅',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'ja' => '近く',
                    ],
                    [
                        'ja' => '遠く',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '学校',
                            'は',
                            '近い',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb yaxın', 'correct' => ['məktəb', 'yaxın'], 'extra' => ['uzaq']],
                            'ar' => ['sentence' => 'مدرسة قريب', 'correct' => ['مدرسة', 'قريب'], 'extra' => ['بعيد']],
                            'ru' => ['sentence' => 'школа близко', 'correct' => ['школа', 'близко'], 'extra' => ['далеко']],
                            'es' => [
                                'sentence' => 'La escuela está cerca',
                                'correct' => [
                                    'la',
                                    'escuela',
                                    'es',
                                    'cerca',
                                ],
                                'extra' => [
                                    'lejos',
                                    'estación',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'okul yakın', 'correct' => ['okul', 'yakın'], 'extra' => ['uzak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '駅',
                            'は',
                            '遠い',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'stansiya uzaq', 'correct' => ['stansiya', 'uzaq'], 'extra' => ['yaxın']],
                            'ar' => ['sentence' => 'محطة بعيد', 'correct' => ['محطة', 'بعيد'], 'extra' => ['قريب']],
                            'ru' => ['sentence' => 'станция далеко', 'correct' => ['станция', 'далеко'], 'extra' => ['близко']],
                            'es' => [
                                'sentence' => 'La estación está lejos',
                                'correct' => [
                                    'la',
                                    'estación',
                                    'es',
                                    'lejos',
                                ],
                                'extra' => [
                                    'cerca',
                                    'escuela',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'istasyon uzak', 'correct' => ['istasyon', 'uzak'], 'extra' => ['yakın']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '近く',
                            'か',
                            '遠く',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Cerca o lejos',
                                'correct' => [
                                    'cerca',
                                    'o',
                                    'lejos',
                                ],
                                'extra' => [
                                    'escuela',
                                ],
                            ],
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
            $builder->lesson('レッスン3: 公園・店', 3,
                pictures: [
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'ja' => '行く',
                    ],
                    [
                        'ja' => '来る',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '公園',
                            'へ',
                            '行く',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm park', 'correct' => ['gedirəm', 'park'], 'extra' => ['gəl']],
                            'ar' => ['sentence' => 'أذهب إلى حديقة', 'correct' => ['أذهب', 'إلى', 'حديقة'], 'extra' => ['تعال']],
                            'ru' => ['sentence' => 'иду в парк', 'correct' => ['иду', 'в', 'парк'], 'extra' => ['приходи']],
                            'es' => [
                                'sentence' => 'Ir al parque',
                                'correct' => [
                                    'ir',
                                    'a',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'venir',
                                    'tienda',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'parka git', 'correct' => ['parka', 'git'], 'extra' => ['gel']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '店',
                            'へ',
                            '来る',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'gəl mağaza', 'correct' => ['gəl', 'mağaza'], 'extra' => ['gedirəm']],
                            'ar' => ['sentence' => 'تعال إلى متجر', 'correct' => ['تعال', 'إلى', 'متجر'], 'extra' => ['أذهب']],
                            'ru' => ['sentence' => 'приходи в магазин', 'correct' => ['приходи', 'в', 'магазин'], 'extra' => ['иду']],
                            'es' => [
                                'sentence' => 'Venir a la tienda',
                                'correct' => [
                                    'venir',
                                    'a',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'ir',
                                    'parque',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'dükkana gel', 'correct' => ['dükkana', 'gel'], 'extra' => ['git']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '行って',
                            '来る',
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
                            'es' => [
                                'sentence' => 'Ir y venir',
                                'correct' => [
                                    'ir',
                                    'y',
                                    'venir',
                                ],
                                'extra' => [
                                    'parque',
                                ],
                            ],
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
            $builder->lesson('レッスン4: 通り・駅', 4,
                pictures: [
                    [
                        'ja' => '通り',
                        'img' => 'street',
                    ],
                    [
                        'ja' => '駅',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'ja' => '左',
                    ],
                    [
                        'ja' => '右',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '左',
                            'の',
                            '通り',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'La calle a la izquierda',
                                'correct' => [
                                    'la',
                                    'calle',
                                    'sobre',
                                    'la',
                                    'izquierda',
                                ],
                                'extra' => [
                                    'derecha',
                                ],
                            ],
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
                            '右',
                            'の',
                            '駅',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'La estación a la derecha',
                                'correct' => [
                                    'la',
                                    'estación',
                                    'sobre',
                                    'la',
                                    'derecha',
                                ],
                                'extra' => [
                                    'izquierda',
                                ],
                            ],
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
                            '左',
                            'か',
                            '右',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'Izquierda o derecha',
                                'correct' => [
                                    'izquierda',
                                    'o',
                                    'derecha',
                                ],
                                'extra' => [
                                    'calle',
                                ],
                            ],
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
            $builder->lesson('レッスン5: 店・学校', 5,
                pictures: [
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'ja' => '開いた',
                    ],
                    [
                        'ja' => '閉じた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '店',
                            'は',
                            '開いています',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'mağaza açıq', 'correct' => ['mağaza', 'açıq'], 'extra' => ['bağlı']],
                            'ar' => ['sentence' => 'متجر مفتوح', 'correct' => ['متجر', 'مفتوح'], 'extra' => ['مغلق']],
                            'ru' => ['sentence' => 'магазин открыто', 'correct' => ['магазин', 'открыто'], 'extra' => ['закрыто']],
                            'es' => [
                                'sentence' => 'La tienda está abierta',
                                'correct' => [
                                    'la',
                                    'tienda',
                                    'es',
                                    'abierto',
                                ],
                                'extra' => [
                                    'cerrado',
                                    'escuela',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'dükkan açık', 'correct' => ['dükkan', 'açık'], 'extra' => ['kapalı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '学校',
                            'は',
                            '閉まっています',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb bağlı', 'correct' => ['məktəb', 'bağlı'], 'extra' => ['açıq']],
                            'ar' => ['sentence' => 'مدرسة مغلق', 'correct' => ['مدرسة', 'مغلق'], 'extra' => ['مفتوح']],
                            'ru' => ['sentence' => 'школа закрыто', 'correct' => ['школа', 'закрыто'], 'extra' => ['открыто']],
                            'es' => [
                                'sentence' => 'La escuela está cerrada',
                                'correct' => [
                                    'la',
                                    'escuela',
                                    'es',
                                    'cerrado',
                                ],
                                'extra' => [
                                    'abierto',
                                    'tienda',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'okul kapalı', 'correct' => ['okul', 'kapalı'], 'extra' => ['açık']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '開いて',
                            'いる',
                            'か',
                            '閉じて',
                            'いる',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Abierto o cerrado',
                                'correct' => [
                                    'abierto',
                                    'o',
                                    'cerrado',
                                ],
                                'extra' => [
                                    'tienda',
                                ],
                            ],
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
