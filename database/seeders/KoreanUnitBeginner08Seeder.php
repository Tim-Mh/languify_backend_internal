<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = ['학교' => 'school', '가게' => 'shop', '역' => 'station', '공원' => 'park', '거리' => 'street'];

    /**
     * Korean Chapter 1 (Beginner), Unit 8, the Korean twin of the English
     * "Unit 8: Places in Town" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, '유닛 8: 동네 장소', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 학교 · 가게', 1,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '가게', 'img' => 'shop']],
                plain: [['ko' => '도시'], ['ko' => '마을']],
                phrases: [
                    'a' => [
                        'words' => ['도시'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the town', 'correct' => ['the', 'town'], 'extra' => ['village']],
                            'es' => ['sentence' => 'La ciudad', 'correct' => ['la', 'ciudad'], 'extra' => ['pueblo', 'escuela']],
                            'de' => ['sentence' => 'Die Stadt', 'correct' => ['die', 'Stadt'], 'extra' => ['Dorf', 'Schule']],
                            'fr' => ['sentence' => 'La ville', 'correct' => ['la', 'ville'], 'extra' => ['village', 'école']],
                            'ja' => ['sentence' => '町', 'correct' => ['町'], 'extra' => ['村']],
                        ],
                    ],
                    'b' => [
                        'words' => ['마을'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the village', 'correct' => ['the', 'village'], 'extra' => ['town']],
                            'es' => ['sentence' => 'El pueblo', 'correct' => ['el', 'pueblo'], 'extra' => ['ciudad', 'tienda']],
                            'de' => ['sentence' => 'Das Dorf', 'correct' => ['das', 'Dorf'], 'extra' => ['Stadt', 'Geschäft']],
                            'fr' => ['sentence' => 'Le village', 'correct' => ['le', 'village'], 'extra' => ['ville', 'magasin']],
                            'ja' => ['sentence' => '村', 'correct' => ['村'], 'extra' => ['町']],
                        ],
                    ],
                    'c' => [
                        'words' => ['학교와', '가게'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the school and the shop', 'correct' => ['the', 'school', 'and', 'the', 'shop'], 'extra' => ['town']],
                            'es' => ['sentence' => 'La escuela y la tienda', 'correct' => ['la', 'escuela', 'y', 'la', 'tienda'], 'extra' => ['ciudad']],
                            'de' => ['sentence' => 'Die Schule und das Geschäft', 'correct' => ['die', 'Schule', 'und', 'das', 'Geschäft'], 'extra' => ['Stadt']],
                            'fr' => ['sentence' => 'L\'école et le magasin', 'correct' => ['école', 'et', 'le', 'magasin'], 'extra' => ['ville']],
                            'ja' => ['sentence' => '学校と店', 'correct' => ['学校', 'と', '店'], 'extra' => ['町']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 학교 · 역', 2,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '역', 'img' => 'station']],
                plain: [['ko' => '가까이'], ['ko' => '멀리']],
                phrases: [
                    'a' => [
                        'words' => ['학교는', '가깝습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the school is near', 'correct' => ['the', 'school', 'is', 'near'], 'extra' => ['far']],
                            'es' => ['sentence' => 'La escuela está cerca', 'correct' => ['la', 'escuela', 'es', 'cerca'], 'extra' => ['lejos', 'estación']],
                            'de' => ['sentence' => 'Die Schule ist nah', 'correct' => ['die', 'Schule', 'ist', 'nah'], 'extra' => ['weit', 'Bahnhof']],
                            'fr' => ['sentence' => 'L\'école est près', 'correct' => ['école', 'est', 'près'], 'extra' => ['loin', 'gare']],
                            'ja' => ['sentence' => '学校は近いです', 'correct' => ['学校', 'は', '近い', 'です'], 'extra' => ['遠く']],
                        ],
                    ],
                    'b' => [
                        'words' => ['역은', '멉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the station is far', 'correct' => ['the', 'station', 'is', 'far'], 'extra' => ['near']],
                            'es' => ['sentence' => 'La estación está lejos', 'correct' => ['la', 'estación', 'es', 'lejos'], 'extra' => ['cerca', 'escuela']],
                            'de' => ['sentence' => 'Der Bahnhof ist weit', 'correct' => ['der', 'Bahnhof', 'ist', 'weit'], 'extra' => ['nah', 'Schule']],
                            'fr' => ['sentence' => 'La gare est loin', 'correct' => ['la', 'gare', 'est', 'loin'], 'extra' => ['près', 'école']],
                            'ja' => ['sentence' => '駅は遠いです', 'correct' => ['駅', 'は', '遠い', 'です'], 'extra' => ['近く']],
                        ],
                    ],
                    'c' => [
                        'words' => ['가깝거나', '멀리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'near or far', 'correct' => ['near', 'or', 'far'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Cerca o lejos', 'correct' => ['cerca', 'o', 'lejos'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Nah oder weit', 'correct' => ['nah', 'oder', 'weit'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'Près ou loin', 'correct' => ['près', 'ou', 'loin'], 'extra' => ['école']],
                            'ja' => ['sentence' => '近くか遠く', 'correct' => ['近く', 'か', '遠く'], 'extra' => ['学校']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 공원 · 가게', 3,
                pictures: [['ko' => '공원', 'img' => 'park'], ['ko' => '가게', 'img' => 'shop']],
                plain: [['ko' => '가다'], ['ko' => '오다']],
                phrases: [
                    'a' => [
                        'words' => ['공원으로', '가세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'go to the park', 'correct' => ['go', 'to', 'the', 'park'], 'extra' => ['come']],
                            'es' => ['sentence' => 'Ir al parque', 'correct' => ['ir', 'a', 'el', 'parque'], 'extra' => ['venir', 'tienda']],
                            'de' => ['sentence' => 'Zum Park gehen', 'correct' => ['gehen', 'zu', 'dem', 'Park'], 'extra' => ['kommen', 'Geschäft']],
                            'fr' => ['sentence' => 'Aller au parc', 'correct' => ['aller', 'à', 'le', 'parc'], 'extra' => ['venir', 'magasin']],
                            'ja' => ['sentence' => '公園へ行く', 'correct' => ['公園', 'へ', '行く'], 'extra' => ['来る']],
                        ],
                    ],
                    'b' => [
                        'words' => ['가게로', '오세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'come to the shop', 'correct' => ['come', 'to', 'the', 'shop'], 'extra' => ['go']],
                            'es' => ['sentence' => 'Venir a la tienda', 'correct' => ['venir', 'a', 'la', 'tienda'], 'extra' => ['ir', 'parque']],
                            'de' => ['sentence' => 'Zum Geschäft kommen', 'correct' => ['kommen', 'zu', 'dem', 'Geschäft'], 'extra' => ['gehen', 'Park']],
                            'fr' => ['sentence' => 'Venir au magasin', 'correct' => ['venir', 'à', 'le', 'magasin'], 'extra' => ['aller', 'parc']],
                            'ja' => ['sentence' => '店へ来る', 'correct' => ['店', 'へ', '来る'], 'extra' => ['行く']],
                        ],
                    ],
                    'c' => [
                        'words' => ['가고', '오세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'go and come', 'correct' => ['go', 'and', 'come'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Ir y venir', 'correct' => ['ir', 'y', 'venir'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Gehen und kommen', 'correct' => ['gehen', 'und', 'kommen'], 'extra' => ['Park']],
                            'fr' => ['sentence' => 'Aller et venir', 'correct' => ['aller', 'et', 'venir'], 'extra' => ['parc']],
                            'ja' => ['sentence' => '行って来る', 'correct' => ['行って', '来る'], 'extra' => ['公園']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 거리 · 역', 4,
                pictures: [['ko' => '거리', 'img' => 'street'], ['ko' => '역', 'img' => 'station']],
                plain: [['ko' => '왼쪽'], ['ko' => '오른쪽']],
                phrases: [
                    'a' => [
                        'words' => ['왼쪽의', '거리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the street on the left', 'correct' => ['the', 'street', 'on', 'the', 'left'], 'extra' => ['right']],
                            'es' => ['sentence' => 'La calle a la izquierda', 'correct' => ['la', 'calle', 'sobre', 'la', 'izquierda'], 'extra' => ['derecha']],
                            'de' => ['sentence' => 'Die Straße links', 'correct' => ['die', 'Straße', 'auf', 'der', 'links'], 'extra' => ['rechts']],
                            'fr' => ['sentence' => 'La rue à gauche', 'correct' => ['la', 'rue', 'sur', 'la', 'gauche'], 'extra' => ['droite']],
                            'ja' => ['sentence' => '左の通り', 'correct' => ['左', 'の', '通り'], 'extra' => ['右']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오른쪽의', '역'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the station on the right', 'correct' => ['the', 'station', 'on', 'the', 'right'], 'extra' => ['left']],
                            'es' => ['sentence' => 'La estación a la derecha', 'correct' => ['la', 'estación', 'sobre', 'la', 'derecha'], 'extra' => ['izquierda']],
                            'de' => ['sentence' => 'Der Bahnhof rechts', 'correct' => ['der', 'Bahnhof', 'auf', 'der', 'rechts'], 'extra' => ['links']],
                            'fr' => ['sentence' => 'La gare à droite', 'correct' => ['la', 'gare', 'sur', 'la', 'droite'], 'extra' => ['gauche']],
                            'ja' => ['sentence' => '右の駅', 'correct' => ['右', 'の', '駅'], 'extra' => ['左']],
                        ],
                    ],
                    'c' => [
                        'words' => ['왼쪽', '또는', '오른쪽'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'left or right', 'correct' => ['left', 'or', 'right'], 'extra' => ['street']],
                            'es' => ['sentence' => 'Izquierda o derecha', 'correct' => ['izquierda', 'o', 'derecha'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Links oder rechts', 'correct' => ['links', 'oder', 'rechts'], 'extra' => ['Straße']],
                            'fr' => ['sentence' => 'Gauche ou droite', 'correct' => ['gauche', 'ou', 'droite'], 'extra' => ['rue']],
                            'ja' => ['sentence' => '左か右', 'correct' => ['左', 'か', '右'], 'extra' => ['通り']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 가게 · 학교', 5,
                pictures: [['ko' => '가게', 'img' => 'shop'], ['ko' => '학교', 'img' => 'school']],
                plain: [['ko' => '열린'], ['ko' => '닫힌']],
                phrases: [
                    'a' => [
                        'words' => ['가게는', '열려', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the shop is open', 'correct' => ['the', 'shop', 'is', 'open'], 'extra' => ['closed']],
                            'es' => ['sentence' => 'La tienda está abierta', 'correct' => ['la', 'tienda', 'es', 'abierto'], 'extra' => ['cerrado', 'escuela']],
                            'de' => ['sentence' => 'Das Geschäft ist offen', 'correct' => ['das', 'Geschäft', 'ist', 'offen'], 'extra' => ['geschlossen', 'Schule']],
                            'fr' => ['sentence' => 'Le magasin est ouvert', 'correct' => ['le', 'magasin', 'est', 'ouvert'], 'extra' => ['fermé', 'école']],
                            'ja' => ['sentence' => '店は開いています', 'correct' => ['店', 'は', '開いています'], 'extra' => ['閉じた']],
                        ],
                    ],
                    'b' => [
                        'words' => ['학교는', '닫혔습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the school is closed', 'correct' => ['the', 'school', 'is', 'closed'], 'extra' => ['open']],
                            'es' => ['sentence' => 'La escuela está cerrada', 'correct' => ['la', 'escuela', 'es', 'cerrado'], 'extra' => ['abierto', 'tienda']],
                            'de' => ['sentence' => 'Die Schule ist geschlossen', 'correct' => ['die', 'Schule', 'ist', 'geschlossen'], 'extra' => ['offen', 'Geschäft']],
                            'fr' => ['sentence' => 'L\'école est fermée', 'correct' => ['école', 'est', 'fermé'], 'extra' => ['ouvert', 'magasin']],
                            'ja' => ['sentence' => '学校は閉まっています', 'correct' => ['学校', 'は', '閉まっています'], 'extra' => ['開いた']],
                        ],
                    ],
                    'c' => [
                        'words' => ['열렸거나', '닫힌'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'open or closed', 'correct' => ['open', 'or', 'closed'], 'extra' => ['shop']],
                            'es' => ['sentence' => 'Abierto o cerrado', 'correct' => ['abierto', 'o', 'cerrado'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Offen oder geschlossen', 'correct' => ['offen', 'oder', 'geschlossen'], 'extra' => ['Geschäft']],
                            'fr' => ['sentence' => 'Ouvert ou fermé', 'correct' => ['ouvert', 'ou', 'fermé'], 'extra' => ['magasin']],
                            'ja' => ['sentence' => '開いているか閉じている', 'correct' => ['開いて', 'いる', 'か', '閉じて', 'いる'], 'extra' => ['店']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
