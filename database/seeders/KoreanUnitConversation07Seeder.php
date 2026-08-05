<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation07Seeder extends Seeder
{
    private const PICTURES = ['거리' => 'street', '역' => 'station', '공원' => 'park', '가게' => 'shop', '집' => 'house', '학교' => 'school'];

    /**
     * Korean Conversation, Unit 7, the Korean twin of the English "Giving Directions" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, '유닛 7: 길 안내하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 거리 · 역', 1,
                pictures: [['ko' => '거리', 'img' => 'street'], ['ko' => '역', 'img' => 'station']],
                plain: [['ko' => '똑바로'], ['ko' => '돌다']],
                phrases: [
                    'a' => [
                        'words' => ['거리를', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'go straight on the street', 'correct' => ['go', 'straight', 'on', 'the', 'street'], 'extra' => ['turn']],
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오른쪽으로', '도세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'turn right', 'correct' => ['turn', 'right'], 'extra' => ['straight']],
                            'es' => ['sentence' => 'Gira a la derecha', 'correct' => ['girar', 'derecha'], 'extra' => ['recto', 'estación']],
                            'de' => ['sentence' => 'Biege rechts ab', 'correct' => ['abbiegen', 'rechts'], 'extra' => ['geradeaus', 'Bahnhof']],
                            'fr' => ['sentence' => 'Tourne à droite', 'correct' => ['tourner', 'droite'], 'extra' => ['tout droit', 'gare']],
                            'ja' => ['sentence' => '右に曲がる', 'correct' => ['右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['역까지', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'go straight to the station', 'correct' => ['go', 'straight', 'to', 'the', 'station'], 'extra' => ['street']],
                            'es' => ['sentence' => 'Ve recto a la estación', 'correct' => ['ir', 'recto', 'a', 'la', 'estación'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Geh geradeaus zum Bahnhof', 'correct' => ['gehen', 'geradeaus', 'zu', 'dem', 'Bahnhof'], 'extra' => ['Straße']],
                            'fr' => ['sentence' => 'Va tout droit jusqu\'à la gare', 'correct' => ['aller', 'tout droit', 'à', 'la', 'gare'], 'extra' => ['rue']],
                            'ja' => ['sentence' => '駅までまっすぐ行く', 'correct' => ['駅', 'まで', 'まっすぐ', '行く'], 'extra' => ['通り']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 거리 · 공원', 2,
                pictures: [['ko' => '거리', 'img' => 'street'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '건너다'], ['ko' => '계속하다']],
                phrases: [
                    'a' => [
                        'words' => ['거리를', '건너세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'cross the street', 'correct' => ['cross', 'the', 'street'], 'extra' => ['continue']],
                            'es' => ['sentence' => 'Cruza la calle', 'correct' => ['cruzar', 'la', 'calle'], 'extra' => ['continuar', 'parque']],
                            'de' => ['sentence' => 'Überquere die Straße', 'correct' => ['überqueren', 'die', 'Straße'], 'extra' => ['weitergehen', 'Park']],
                            'fr' => ['sentence' => 'Traverse la rue', 'correct' => ['traverser', 'la', 'rue'], 'extra' => ['continuer', 'parc']],
                            'ja' => ['sentence' => '通りを渡る', 'correct' => ['通り', 'を', '渡る'], 'extra' => ['続ける']],
                        ],
                    ],
                    'b' => [
                        'words' => ['공원까지', '계속하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'continue to the park', 'correct' => ['continue', 'to', 'the', 'park'], 'extra' => ['cross']],
                            'es' => ['sentence' => 'Continúa al parque', 'correct' => ['continuar', 'a', 'el', 'parque'], 'extra' => ['cruzar', 'calle']],
                            'de' => ['sentence' => 'Geh weiter zum Park', 'correct' => ['weitergehen', 'zu', 'dem', 'Park'], 'extra' => ['überqueren', 'Straße']],
                            'fr' => ['sentence' => 'Continue au parc', 'correct' => ['continuer', 'à', 'le', 'parc'], 'extra' => ['traverser', 'rue']],
                            'ja' => ['sentence' => '公園まで続ける', 'correct' => ['公園', 'まで', '続ける'], 'extra' => ['渡る']],
                        ],
                    ],
                    'c' => [
                        'words' => ['건너서', '계속하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'cross and continue', 'correct' => ['cross', 'and', 'continue'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Cruza y continúa', 'correct' => ['cruzar', 'y', 'continuar'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Überquere und geh weiter', 'correct' => ['überqueren', 'und', 'weitergehen'], 'extra' => ['Park']],
                            'fr' => ['sentence' => 'Traverse et continue', 'correct' => ['traverser', 'et', 'continuer'], 'extra' => ['parc']],
                            'ja' => ['sentence' => '渡って続ける', 'correct' => ['渡って', '続ける'], 'extra' => ['公園']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 가게 · 집', 3,
                pictures: [['ko' => '가게', 'img' => 'shop'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '앞에'], ['ko' => '뒤에']],
                phrases: [
                    'a' => [
                        'words' => ['가게', '앞에'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'in front of the shop', 'correct' => ['in front', 'of', 'the', 'shop'], 'extra' => ['behind']],
                            'es' => ['sentence' => 'Delante de la tienda', 'correct' => ['delante', 'de', 'la', 'tienda'], 'extra' => ['detrás', 'casa']],
                            'de' => ['sentence' => 'Vor dem Geschäft', 'correct' => ['vorne', 'von', 'dem', 'Geschäft'], 'extra' => ['hinten', 'Haus']],
                            'fr' => ['sentence' => 'Devant le magasin', 'correct' => ['devant', 'de', 'le', 'magasin'], 'extra' => ['derrière', 'maison']],
                            'ja' => ['sentence' => '店の前に', 'correct' => ['店', 'の前に'], 'extra' => ['後ろに']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집', '뒤에'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'behind the house', 'correct' => ['behind', 'the', 'house'], 'extra' => ['in front']],
                            'es' => ['sentence' => 'Detrás de la casa', 'correct' => ['detrás', 'la', 'casa'], 'extra' => ['delante', 'tienda']],
                            'de' => ['sentence' => 'Hinter dem Haus', 'correct' => ['hinten', 'dem', 'Haus'], 'extra' => ['vorne', 'Geschäft']],
                            'fr' => ['sentence' => 'Derrière la maison', 'correct' => ['derrière', 'la', 'maison'], 'extra' => ['devant', 'magasin']],
                            'ja' => ['sentence' => '家の後ろに', 'correct' => ['家', 'の後ろに'], 'extra' => ['前に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['앞에', '또는', '뒤에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'in front or behind', 'correct' => ['in front', 'or', 'behind'], 'extra' => ['shop']],
                            'es' => ['sentence' => 'Delante o detrás', 'correct' => ['delante', 'o', 'detrás'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Vorne oder hinten', 'correct' => ['vorne', 'oder', 'hinten'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Devant ou derrière', 'correct' => ['devant', 'ou', 'derrière'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '前か後ろ', 'correct' => ['前', 'か', '後ろ'], 'extra' => ['店']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 역 · 학교', 4,
                pictures: [['ko' => '역', 'img' => 'station'], ['ko' => '학교', 'img' => 'school']],
                plain: [['ko' => '북쪽'], ['ko' => '남쪽']],
                phrases: [
                    'a' => [
                        'words' => ['역은', '북쪽에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the station is north', 'correct' => ['the', 'station', 'is', 'north'], 'extra' => ['south']],
                            'es' => ['sentence' => 'La estación está al norte', 'correct' => ['la', 'estación', 'está', 'norte'], 'extra' => ['sur', 'escuela']],
                            'de' => ['sentence' => 'Der Bahnhof ist im Norden', 'correct' => ['der', 'Bahnhof', 'ist', 'Norden'], 'extra' => ['Süden', 'Schule']],
                            'fr' => ['sentence' => 'La gare est au nord', 'correct' => ['la', 'gare', 'est', 'nord'], 'extra' => ['sud', 'école']],
                            'ja' => ['sentence' => '駅は北にあります', 'correct' => ['駅', 'は', '北', 'に', 'あります'], 'extra' => ['南']],
                        ],
                    ],
                    'b' => [
                        'words' => ['학교는', '남쪽에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the school is south', 'correct' => ['the', 'school', 'is', 'south'], 'extra' => ['north']],
                            'es' => ['sentence' => 'La escuela está al sur', 'correct' => ['la', 'escuela', 'está', 'sur'], 'extra' => ['norte', 'estación']],
                            'de' => ['sentence' => 'Die Schule ist im Süden', 'correct' => ['die', 'Schule', 'ist', 'Süden'], 'extra' => ['Norden', 'Bahnhof']],
                            'fr' => ['sentence' => 'L\'école est au sud', 'correct' => ['le', 'école', 'est', 'sud'], 'extra' => ['nord', 'gare']],
                            'ja' => ['sentence' => '学校は南にあります', 'correct' => ['学校', 'は', '南', 'に', 'あります'], 'extra' => ['北']],
                        ],
                    ],
                    'c' => [
                        'words' => ['북쪽', '또는', '남쪽'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'north or south', 'correct' => ['north', 'or', 'south'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Norte o sur', 'correct' => ['norte', 'o', 'sur'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Norden oder Süden', 'correct' => ['Norden', 'oder', 'Süden'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'Nord ou sud', 'correct' => ['nord', 'ou', 'sud'], 'extra' => ['école']],
                            'ja' => ['sentence' => '北か南', 'correct' => ['北', 'か', '南'], 'extra' => ['学校']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 역 · 거리', 5,
                pictures: [['ko' => '역', 'img' => 'station'], ['ko' => '거리', 'img' => 'street']],
                plain: [['ko' => '돌다'], ['ko' => '똑바로']],
                phrases: [
                    'a' => [
                        'words' => ['역에서', '오른쪽으로', '도세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'turn right at the station', 'correct' => ['turn', 'right', 'at', 'the', 'station'], 'extra' => ['straight']],
                            'es' => ['sentence' => 'Gira a la derecha en la estación', 'correct' => ['girar', 'derecha', 'en', 'la', 'estación'], 'extra' => ['recto']],
                            'de' => ['sentence' => 'Biege am Bahnhof rechts ab', 'correct' => ['abbiegen', 'rechts', 'an', 'dem', 'Bahnhof'], 'extra' => ['geradeaus']],
                            'fr' => ['sentence' => 'Tourne à droite à la gare', 'correct' => ['tourner', 'droite', 'à', 'la', 'gare'], 'extra' => ['tout droit']],
                            'ja' => ['sentence' => '駅で右に曲がる', 'correct' => ['駅', 'で', '右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['거리를', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'go straight on the street', 'correct' => ['go', 'straight', 'on', 'the', 'street'], 'extra' => ['turn']],
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['돌아서', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'turn and go straight', 'correct' => ['turn', 'and', 'go', 'straight'], 'extra' => ['station']],
                            'es' => ['sentence' => 'Gira y ve recto', 'correct' => ['girar', 'y', 'ir', 'recto'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Bieg ab und geh geradeaus', 'correct' => ['abbiegen', 'und', 'gehen', 'geradeaus'], 'extra' => ['Bahnhof']],
                            'fr' => ['sentence' => 'Tourne et va tout droit', 'correct' => ['tourner', 'et', 'aller', 'tout droit'], 'extra' => ['gare']],
                            'ja' => ['sentence' => '曲がってまっすぐ行く', 'correct' => ['曲がって', 'まっすぐ', '行く'], 'extra' => ['駅']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
