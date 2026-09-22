<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = [
        'School' => 'school', 'Park' => 'park', 'Shop' => 'shop', 'Street' => 'street',
        'Station' => 'station', 'House' => 'house',
    ];

    /**
     * English Chapter 1, Unit 8 — getting around town.
     *
     * Five of the places are picturable; the abstract half teaches the words
     * that place them and move you between them — near, far, go, come, left,
     * right, open, closed — the language a learner needs to actually find their
     * way somewhere.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Places in Town', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Town & Village', 1,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Shop', 'img' => 'shop']],
                plain: [['en' => 'Town'], ['en' => 'Village']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'town'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La ciudad', 'correct' => ['la', 'ciudad'], 'extra' => ['pueblo', 'escuela']],
                            'de' => ['sentence' => 'Die Stadt', 'correct' => ['die', 'Stadt'], 'extra' => ['Dorf', 'Schule']],
                            'ja' => ['sentence' => '町', 'correct' => ['町'], 'extra' => ['村']],
                            'ko' => ['sentence' => '도시', 'correct' => ['도시'], 'extra' => ['마을']],
                            'fr' => ['sentence' => 'La ville', 'correct' => ['la', 'ville'], 'extra' => ['village', 'école']],
                            'tr' => ['sentence' => 'şehir', 'correct' => ['şehir'], 'extra' => []],
                        'ru' => ['sentence' => 'город', 'correct' => ['город'], 'extra' => []],
                        'ar' => ['sentence' => 'بلدة', 'correct' => ['بلدة'], 'extra' => []],
                        'az' => ['sentence' => 'qəsəbə', 'correct' => ['qəsəbə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'village'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El pueblo', 'correct' => ['el', 'pueblo'], 'extra' => ['ciudad', 'tienda']],
                            'de' => ['sentence' => 'Das Dorf', 'correct' => ['das', 'Dorf'], 'extra' => ['Stadt', 'Geschäft']],
                            'ja' => ['sentence' => '村', 'correct' => ['村'], 'extra' => ['町']],
                            'ko' => ['sentence' => '마을', 'correct' => ['마을'], 'extra' => ['도시']],
                            'fr' => ['sentence' => 'Le village', 'correct' => ['le', 'village'], 'extra' => ['ville', 'magasin']],
                            'tr' => ['sentence' => 'köy', 'correct' => ['köy'], 'extra' => []],
                        'ru' => ['sentence' => 'деревня', 'correct' => ['деревня'], 'extra' => []],
                        'ar' => ['sentence' => 'قرية', 'correct' => ['قرية'], 'extra' => []],
                        'az' => ['sentence' => 'kənd', 'correct' => ['kənd'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'school', 'and', 'the', 'shop'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La escuela y la tienda', 'correct' => ['la', 'escuela', 'y', 'la', 'tienda'], 'extra' => ['ciudad']],
                            'de' => ['sentence' => 'Die Schule und das Geschäft', 'correct' => ['die', 'Schule', 'und', 'das', 'Geschäft'], 'extra' => ['Stadt']],
                            'ja' => ['sentence' => '学校と店', 'correct' => ['学校', 'と', '店'], 'extra' => ['町']],
                            'ko' => ['sentence' => '학교와 가게', 'correct' => ['학교와', '가게'], 'extra' => ['도시']],
                            'fr' => ['sentence' => "L'école et le magasin", 'correct' => ['école', 'et', 'le', 'magasin'], 'extra' => ['ville']],
                            'tr' => ['sentence' => 'okul ve dükkan', 'correct' => ['okul', 've', 'dükkan'], 'extra' => []],
                        'ru' => ['sentence' => 'школа и магазин', 'correct' => ['школа', 'и', 'магазин'], 'extra' => []],
                        'ar' => ['sentence' => 'مدرسة و متجر', 'correct' => ['مدرسة', 'و', 'متجر'], 'extra' => []],
                        'az' => ['sentence' => 'məktəb və mağaza', 'correct' => ['məktəb', 'və', 'mağaza'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Near & Far', 2,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Station', 'img' => 'station']],
                plain: [['en' => 'Near'], ['en' => 'Far']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'school', 'is', 'near'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La escuela está cerca', 'correct' => ['la', 'escuela', 'es', 'cerca'], 'extra' => ['lejos', 'estación']],
                            'de' => ['sentence' => 'Die Schule ist nah', 'correct' => ['die', 'Schule', 'ist', 'nah'], 'extra' => ['weit', 'Bahnhof']],
                            'ja' => ['sentence' => '学校は近いです', 'correct' => ['学校', 'は', '近い', 'です'], 'extra' => ['遠く']],
                            'ko' => ['sentence' => '학교는 가깝습니다', 'correct' => ['학교는', '가깝습니다'], 'extra' => ['멀리']],
                            'fr' => ['sentence' => "L'école est près", 'correct' => ['école', 'est', 'près'], 'extra' => ['loin', 'gare']],
                            'tr' => ['sentence' => 'okul yakın', 'correct' => ['okul', 'yakın'], 'extra' => []],
                        'ru' => ['sentence' => 'школа близко', 'correct' => ['школа', 'близко'], 'extra' => []],
                        'ar' => ['sentence' => 'مدرسة قريب', 'correct' => ['مدرسة', 'قريب'], 'extra' => []],
                        'az' => ['sentence' => 'məktəb yaxın', 'correct' => ['məktəb', 'yaxın'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'station', 'is', 'far'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La estación está lejos', 'correct' => ['la', 'estación', 'es', 'lejos'], 'extra' => ['cerca', 'escuela']],
                            'de' => ['sentence' => 'Der Bahnhof ist weit', 'correct' => ['der', 'Bahnhof', 'ist', 'weit'], 'extra' => ['nah', 'Schule']],
                            'ja' => ['sentence' => '駅は遠いです', 'correct' => ['駅', 'は', '遠い', 'です'], 'extra' => ['近く']],
                            'ko' => ['sentence' => '역은 멉니다', 'correct' => ['역은', '멉니다'], 'extra' => ['가까이']],
                            'fr' => ['sentence' => 'La gare est loin', 'correct' => ['la', 'gare', 'est', 'loin'], 'extra' => ['près', 'école']],
                            'tr' => ['sentence' => 'istasyon uzak', 'correct' => ['istasyon', 'uzak'], 'extra' => []],
                        'ru' => ['sentence' => 'станция далеко', 'correct' => ['станция', 'далеко'], 'extra' => []],
                        'ar' => ['sentence' => 'محطة بعيد', 'correct' => ['محطة', 'بعيد'], 'extra' => []],
                        'az' => ['sentence' => 'stansiya uzaq', 'correct' => ['stansiya', 'uzaq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['near', 'or', 'far'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Cerca o lejos', 'correct' => ['cerca', 'o', 'lejos'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Nah oder weit', 'correct' => ['nah', 'oder', 'weit'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '近くか遠く', 'correct' => ['近く', 'か', '遠く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '가깝거나 멀리', 'correct' => ['가깝거나', '멀리'], 'extra' => ['학교']],
                            'fr' => ['sentence' => 'Près ou loin', 'correct' => ['près', 'ou', 'loin'], 'extra' => ['école']],
                            'tr' => ['sentence' => 'yakın veya uzak', 'correct' => ['yakın', 'veya', 'uzak'], 'extra' => []],
                        'ru' => ['sentence' => 'близко или далеко', 'correct' => ['близко', 'или', 'далеко'], 'extra' => []],
                        'ar' => ['sentence' => 'قريب أو بعيد', 'correct' => ['قريب', 'أو', 'بعيد'], 'extra' => []],
                        'az' => ['sentence' => 'yaxın və ya uzaq', 'correct' => ['yaxın', 'və ya', 'uzaq'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Go & Come', 3,
                pictures: [['en' => 'Park', 'img' => 'park'], ['en' => 'Shop', 'img' => 'shop']],
                plain: [['en' => 'Go'], ['en' => 'Come']],
                phrases: [
                    'a' => [
                        'words' => ['go', 'to', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ir al parque', 'correct' => ['ir', 'a', 'el', 'parque'], 'extra' => ['venir', 'tienda']],
                            'de' => ['sentence' => 'Zum Park gehen', 'correct' => ['gehen', 'zu', 'dem', 'Park'], 'extra' => ['kommen', 'Geschäft']],
                            'ja' => ['sentence' => '公園へ行く', 'correct' => ['公園', 'へ', '行く'], 'extra' => ['来る']],
                            'ko' => ['sentence' => '공원으로 가다', 'correct' => ['공원으로', '가다'], 'extra' => ['오다']],
                            'fr' => ['sentence' => 'Aller au parc', 'correct' => ['aller', 'à', 'le', 'parc'], 'extra' => ['venir', 'magasin']],
                            'tr' => ['sentence' => 'parka git', 'correct' => ['parka', 'git'], 'extra' => []],
                        'ru' => ['sentence' => 'иду в парк', 'correct' => ['иду', 'в', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'أذهب إلى حديقة', 'correct' => ['أذهب', 'إلى', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'gedirəm park', 'correct' => ['gedirəm', 'park'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['come', 'to', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Venir a la tienda', 'correct' => ['venir', 'a', 'la', 'tienda'], 'extra' => ['ir', 'parque']],
                            'de' => ['sentence' => 'Zum Geschäft kommen', 'correct' => ['kommen', 'zu', 'dem', 'Geschäft'], 'extra' => ['gehen', 'Park']],
                            'ja' => ['sentence' => '店へ来る', 'correct' => ['店', 'へ', '来る'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '가게로 오다', 'correct' => ['가게로', '오다'], 'extra' => ['가다']],
                            'fr' => ['sentence' => 'Venir au magasin', 'correct' => ['venir', 'à', 'le', 'magasin'], 'extra' => ['aller', 'parc']],
                            'tr' => ['sentence' => 'dükkana gel', 'correct' => ['dükkana', 'gel'], 'extra' => []],
                        'ru' => ['sentence' => 'приходи в магазин', 'correct' => ['приходи', 'в', 'магазин'], 'extra' => []],
                        'ar' => ['sentence' => 'تعال إلى متجر', 'correct' => ['تعال', 'إلى', 'متجر'], 'extra' => []],
                        'az' => ['sentence' => 'gəl mağaza', 'correct' => ['gəl', 'mağaza'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['go', 'and', 'come'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Ir y venir', 'correct' => ['ir', 'y', 'venir'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Gehen und kommen', 'correct' => ['gehen', 'und', 'kommen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '行って来る', 'correct' => ['行って', '来る'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '가고 오다', 'correct' => ['가고', '오다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => 'Aller et venir', 'correct' => ['aller', 'et', 'venir'], 'extra' => ['parc']],
                            'tr' => ['sentence' => 'git ve gel', 'correct' => ['git', 've', 'gel'], 'extra' => []],
                        'ru' => ['sentence' => 'иду и приходи', 'correct' => ['иду', 'и', 'приходи'], 'extra' => []],
                        'ar' => ['sentence' => 'أذهب و تعال', 'correct' => ['أذهب', 'و', 'تعال'], 'extra' => []],
                        'az' => ['sentence' => 'gedirəm və gəl', 'correct' => ['gedirəm', 'və', 'gəl'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Left & Right', 4,
                pictures: [['en' => 'Street', 'img' => 'street'], ['en' => 'Station', 'img' => 'station']],
                plain: [['en' => 'Left'], ['en' => 'Right']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'street', 'on', 'the', 'left'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'La calle a la izquierda', 'correct' => ['la', 'calle', 'sobre', 'la', 'izquierda'], 'extra' => ['derecha']],
                            'de' => ['sentence' => 'Die Straße links', 'correct' => ['die', 'Straße', 'auf', 'der', 'links'], 'extra' => ['rechts']],
                            'ja' => ['sentence' => '左の通り', 'correct' => ['左', 'の', '通り'], 'extra' => ['右']],
                            'ko' => ['sentence' => '왼쪽의 거리', 'correct' => ['왼쪽의', '거리'], 'extra' => ['오른쪽']],
                            'fr' => ['sentence' => 'La rue à gauche', 'correct' => ['la', 'rue', 'sur', 'la', 'gauche'], 'extra' => ['droite']],
                            'tr' => ['sentence' => 'solda cadde', 'correct' => ['solda', 'cadde'], 'extra' => []],
                        'ru' => ['sentence' => 'улица на левый', 'correct' => ['улица', 'на', 'левый'], 'extra' => []],
                        'ar' => ['sentence' => 'شارع على يسار', 'correct' => ['شارع', 'على', 'يسار'], 'extra' => []],
                        'az' => ['sentence' => 'küçə üzərində sol', 'correct' => ['küçə', 'üzərində', 'sol'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'station', 'on', 'the', 'right'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'La estación a la derecha', 'correct' => ['la', 'estación', 'sobre', 'la', 'derecha'], 'extra' => ['izquierda']],
                            'de' => ['sentence' => 'Der Bahnhof rechts', 'correct' => ['der', 'Bahnhof', 'auf', 'der', 'rechts'], 'extra' => ['links']],
                            'ja' => ['sentence' => '右の駅', 'correct' => ['右', 'の', '駅'], 'extra' => ['左']],
                            'ko' => ['sentence' => '오른쪽의 역', 'correct' => ['오른쪽의', '역'], 'extra' => ['왼쪽']],
                            'fr' => ['sentence' => 'La gare à droite', 'correct' => ['la', 'gare', 'sur', 'la', 'droite'], 'extra' => ['gauche']],
                            'tr' => ['sentence' => 'sağda istasyon', 'correct' => ['sağda', 'istasyon'], 'extra' => []],
                        'ru' => ['sentence' => 'станция на правый', 'correct' => ['станция', 'на', 'правый'], 'extra' => []],
                        'ar' => ['sentence' => 'محطة على يمين', 'correct' => ['محطة', 'على', 'يمين'], 'extra' => []],
                        'az' => ['sentence' => 'stansiya üzərində sağ', 'correct' => ['stansiya', 'üzərində', 'sağ'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['left', 'or', 'right'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Izquierda o derecha', 'correct' => ['izquierda', 'o', 'derecha'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Links oder rechts', 'correct' => ['links', 'oder', 'rechts'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '左か右', 'correct' => ['左', 'か', '右'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '왼쪽 또는 오른쪽', 'correct' => ['왼쪽', '또는', '오른쪽'], 'extra' => ['거리']],
                            'fr' => ['sentence' => 'Gauche ou droite', 'correct' => ['gauche', 'ou', 'droite'], 'extra' => ['rue']],
                            'tr' => ['sentence' => 'sol veya sağ', 'correct' => ['sol', 'veya', 'sağ'], 'extra' => []],
                        'ru' => ['sentence' => 'левый или правый', 'correct' => ['левый', 'или', 'правый'], 'extra' => []],
                        'ar' => ['sentence' => 'يسار أو يمين', 'correct' => ['يسار', 'أو', 'يمين'], 'extra' => []],
                        'az' => ['sentence' => 'sol və ya sağ', 'correct' => ['sol', 'və ya', 'sağ'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Open & Closed', 5,
                pictures: [['en' => 'Shop', 'img' => 'shop'], ['en' => 'School', 'img' => 'school']],
                plain: [['en' => 'Open'], ['en' => 'Closed']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'shop', 'is', 'open'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La tienda está abierta', 'correct' => ['la', 'tienda', 'es', 'abierto'], 'extra' => ['cerrado', 'escuela']],
                            'de' => ['sentence' => 'Das Geschäft ist offen', 'correct' => ['das', 'Geschäft', 'ist', 'offen'], 'extra' => ['geschlossen', 'Schule']],
                            'ja' => ['sentence' => '店は開いています', 'correct' => ['店', 'は', '開いています'], 'extra' => ['閉じた']],
                            'ko' => ['sentence' => '가게는 열려 있습니다', 'correct' => ['가게는', '열려', '있습니다'], 'extra' => ['닫힌']],
                            'fr' => ['sentence' => 'Le magasin est ouvert', 'correct' => ['le', 'magasin', 'est', 'ouvert'], 'extra' => ['fermé', 'école']],
                            'tr' => ['sentence' => 'dükkan açık', 'correct' => ['dükkan', 'açık'], 'extra' => []],
                        'ru' => ['sentence' => 'магазин открыто', 'correct' => ['магазин', 'открыто'], 'extra' => []],
                        'ar' => ['sentence' => 'متجر مفتوح', 'correct' => ['متجر', 'مفتوح'], 'extra' => []],
                        'az' => ['sentence' => 'mağaza açıq', 'correct' => ['mağaza', 'açıq'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'school', 'is', 'closed'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La escuela está cerrada', 'correct' => ['la', 'escuela', 'es', 'cerrado'], 'extra' => ['abierto', 'tienda']],
                            'de' => ['sentence' => 'Die Schule ist geschlossen', 'correct' => ['die', 'Schule', 'ist', 'geschlossen'], 'extra' => ['offen', 'Geschäft']],
                            'ja' => ['sentence' => '学校は閉まっています', 'correct' => ['学校', 'は', '閉まっています'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '학교는 닫혔습니다', 'correct' => ['학교는', '닫혔습니다'], 'extra' => ['열린']],
                            'fr' => ['sentence' => "L'école est fermée", 'correct' => ['école', 'est', 'fermé'], 'extra' => ['ouvert', 'magasin']],
                            'tr' => ['sentence' => 'okul kapalı', 'correct' => ['okul', 'kapalı'], 'extra' => []],
                        'ru' => ['sentence' => 'школа закрыто', 'correct' => ['школа', 'закрыто'], 'extra' => []],
                        'ar' => ['sentence' => 'مدرسة مغلق', 'correct' => ['مدرسة', 'مغلق'], 'extra' => []],
                        'az' => ['sentence' => 'məktəb bağlı', 'correct' => ['məktəb', 'bağlı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['open', 'or', 'closed'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Abierto o cerrado', 'correct' => ['abierto', 'o', 'cerrado'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Offen oder geschlossen', 'correct' => ['offen', 'oder', 'geschlossen'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '開いているか閉じている', 'correct' => ['開いて', 'いる', 'か', '閉じて', 'いる'], 'extra' => ['店']],
                            'ko' => ['sentence' => '열렸거나 닫힌', 'correct' => ['열렸거나', '닫힌'], 'extra' => ['가게']],
                            'fr' => ['sentence' => 'Ouvert ou fermé', 'correct' => ['ouvert', 'ou', 'fermé'], 'extra' => ['magasin']],
                            'tr' => ['sentence' => 'açık veya kapalı', 'correct' => ['açık', 'veya', 'kapalı'], 'extra' => []],
                        'ru' => ['sentence' => 'открыто или закрыто', 'correct' => ['открыто', 'или', 'закрыто'], 'extra' => []],
                        'ar' => ['sentence' => 'مفتوح أو مغلق', 'correct' => ['مفتوح', 'أو', 'مغلق'], 'extra' => []],
                        'az' => ['sentence' => 'açıq və ya bağlı', 'correct' => ['açıq', 'və ya', 'bağlı'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
