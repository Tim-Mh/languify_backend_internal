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
                            'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => ['dönüş']],
                            'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => ['منعطف']],
                            'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => ['поворот']],
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => ['dön']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오른쪽으로', '도세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'turn right', 'correct' => ['turn', 'right'], 'extra' => ['straight']],
                            'az' => ['sentence' => 'dönüş sağ', 'correct' => ['dönüş', 'sağ'], 'extra' => ['düz']],
                            'ar' => ['sentence' => 'منعطف يمين', 'correct' => ['منعطف', 'يمين'], 'extra' => ['مباشرة']],
                            'ru' => ['sentence' => 'поворот правый', 'correct' => ['поворот', 'правый'], 'extra' => ['прямо']],
                            'es' => ['sentence' => 'Gira a la derecha', 'correct' => ['girar', 'derecha'], 'extra' => ['recto', 'estación']],
                            'de' => ['sentence' => 'Biege rechts ab', 'correct' => ['abbiegen', 'rechts'], 'extra' => ['geradeaus', 'Bahnhof']],
                            'fr' => ['sentence' => 'Tourne à droite', 'correct' => ['tourner', 'droite'], 'extra' => ['tout droit', 'gare']],
                            'ja' => ['sentence' => '右に曲がる', 'correct' => ['右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                            'tr' => ['sentence' => 'sağa dön', 'correct' => ['sağa', 'dön'], 'extra' => ['düz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['역까지', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'go straight to the station', 'correct' => ['go', 'straight', 'to', 'the', 'station'], 'extra' => ['street']],
                            'az' => ['sentence' => 'gedirəm düz stansiya', 'correct' => ['gedirəm', 'düz', 'stansiya'], 'extra' => ['küçə']],
                            'ar' => ['sentence' => 'أذهب مباشرة إلى محطة', 'correct' => ['أذهب', 'مباشرة', 'إلى', 'محطة'], 'extra' => ['شارع']],
                            'ru' => ['sentence' => 'иду прямо в станция', 'correct' => ['иду', 'прямо', 'в', 'станция'], 'extra' => ['улица']],
                            'es' => ['sentence' => 'Ve recto a la estación', 'correct' => ['ir', 'recto', 'a', 'la', 'estación'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Geh geradeaus zum Bahnhof', 'correct' => ['gehen', 'geradeaus', 'zu', 'dem', 'Bahnhof'], 'extra' => ['Straße']],
                            'fr' => ['sentence' => 'Va tout droit jusqu\'à la gare', 'correct' => ['aller', 'tout droit', 'à', 'la', 'gare'], 'extra' => ['rue']],
                            'ja' => ['sentence' => '駅までまっすぐ行く', 'correct' => ['駅', 'まで', 'まっすぐ', '行く'], 'extra' => ['通り']],
                            'tr' => ['sentence' => 'istasyona düz git', 'correct' => ['istasyona', 'düz', 'git'], 'extra' => ['cadde']],
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
                            'az' => ['sentence' => 'keç küçə', 'correct' => ['keç', 'küçə'], 'extra' => ['davam et']],
                            'ar' => ['sentence' => 'اعبر شارع', 'correct' => ['اعبر', 'شارع'], 'extra' => ['تابع']],
                            'ru' => ['sentence' => 'перейди улица', 'correct' => ['перейди', 'улица'], 'extra' => ['продолжай']],
                            'es' => ['sentence' => 'Cruza la calle', 'correct' => ['cruzar', 'la', 'calle'], 'extra' => ['continuar', 'parque']],
                            'de' => ['sentence' => 'Überquere die Straße', 'correct' => ['überqueren', 'die', 'Straße'], 'extra' => ['weitergehen', 'Park']],
                            'fr' => ['sentence' => 'Traverse la rue', 'correct' => ['traverser', 'la', 'rue'], 'extra' => ['continuer', 'parc']],
                            'ja' => ['sentence' => '通りを渡る', 'correct' => ['通り', 'を', '渡る'], 'extra' => ['続ける']],
                            'tr' => ['sentence' => 'caddeyi geç', 'correct' => ['caddeyi', 'geç'], 'extra' => ['devam et']],
                        ],
                    ],
                    'b' => [
                        'words' => ['공원까지', '계속하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'continue to the park', 'correct' => ['continue', 'to', 'the', 'park'], 'extra' => ['cross']],
                            'az' => ['sentence' => 'davam et park', 'correct' => ['davam et', 'park'], 'extra' => ['keç']],
                            'ar' => ['sentence' => 'تابع إلى حديقة', 'correct' => ['تابع', 'إلى', 'حديقة'], 'extra' => ['اعبر']],
                            'ru' => ['sentence' => 'продолжай в парк', 'correct' => ['продолжай', 'в', 'парк'], 'extra' => ['перейди']],
                            'es' => ['sentence' => 'Continúa al parque', 'correct' => ['continuar', 'a', 'el', 'parque'], 'extra' => ['cruzar', 'calle']],
                            'de' => ['sentence' => 'Geh weiter zum Park', 'correct' => ['weitergehen', 'zu', 'dem', 'Park'], 'extra' => ['überqueren', 'Straße']],
                            'fr' => ['sentence' => 'Continue au parc', 'correct' => ['continuer', 'à', 'le', 'parc'], 'extra' => ['traverser', 'rue']],
                            'ja' => ['sentence' => '公園まで続ける', 'correct' => ['公園', 'まで', '続ける'], 'extra' => ['渡る']],
                            'tr' => ['sentence' => 'parka devam et', 'correct' => ['parka', 'devam', 'et'], 'extra' => ['geç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['건너서', '계속하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'cross and continue', 'correct' => ['cross', 'and', 'continue'], 'extra' => ['park']],
                            'az' => ['sentence' => 'keç və davam et', 'correct' => ['keç', 'və', 'davam et'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'اعبر و تابع', 'correct' => ['اعبر', 'و', 'تابع'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'перейди и продолжай', 'correct' => ['перейди', 'и', 'продолжай'], 'extra' => ['парк']],
                            'es' => ['sentence' => 'Cruza y continúa', 'correct' => ['cruzar', 'y', 'continuar'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Überquere und geh weiter', 'correct' => ['überqueren', 'und', 'weitergehen'], 'extra' => ['Park']],
                            'fr' => ['sentence' => 'Traverse et continue', 'correct' => ['traverser', 'et', 'continuer'], 'extra' => ['parc']],
                            'ja' => ['sentence' => '渡って続ける', 'correct' => ['渡って', '続ける'], 'extra' => ['公園']],
                            'tr' => ['sentence' => 'geç ve devam et', 'correct' => ['geç', 've', 'devam', 'et'], 'extra' => ['park']],
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
                            'az' => ['sentence' => 'qarşıda mağaza', 'correct' => ['qarşıda', 'mağaza'], 'extra' => ['arxada']],
                            'ar' => ['sentence' => 'أمام متجر', 'correct' => ['أمام', 'متجر'], 'extra' => ['خلف']],
                            'ru' => ['sentence' => 'впереди магазин', 'correct' => ['впереди', 'магазин'], 'extra' => ['сзади']],
                            'es' => ['sentence' => 'Delante de la tienda', 'correct' => ['delante', 'de', 'la', 'tienda'], 'extra' => ['detrás', 'casa']],
                            'de' => ['sentence' => 'Vor dem Geschäft', 'correct' => ['vorne', 'von', 'dem', 'Geschäft'], 'extra' => ['hinten', 'Haus']],
                            'fr' => ['sentence' => 'Devant le magasin', 'correct' => ['devant', 'de', 'le', 'magasin'], 'extra' => ['derrière', 'maison']],
                            'ja' => ['sentence' => '店の前に', 'correct' => ['店', 'の前に'], 'extra' => ['後ろに']],
                            'tr' => ['sentence' => 'dükkanın önünde', 'correct' => ['dükkanın', 'önünde'], 'extra' => ['arkasında']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집', '뒤에'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'behind the house', 'correct' => ['behind', 'the', 'house'], 'extra' => ['in front']],
                            'az' => ['sentence' => 'arxada ev', 'correct' => ['arxada', 'ev'], 'extra' => ['qarşıda']],
                            'ar' => ['sentence' => 'خلف بيت', 'correct' => ['خلف', 'بيت'], 'extra' => ['أمام']],
                            'ru' => ['sentence' => 'сзади дом', 'correct' => ['сзади', 'дом'], 'extra' => ['впереди']],
                            'es' => ['sentence' => 'Detrás de la casa', 'correct' => ['detrás', 'la', 'casa'], 'extra' => ['delante', 'tienda']],
                            'de' => ['sentence' => 'Hinter dem Haus', 'correct' => ['hinten', 'dem', 'Haus'], 'extra' => ['vorne', 'Geschäft']],
                            'fr' => ['sentence' => 'Derrière la maison', 'correct' => ['derrière', 'la', 'maison'], 'extra' => ['devant', 'magasin']],
                            'ja' => ['sentence' => '家の後ろに', 'correct' => ['家', 'の後ろに'], 'extra' => ['前に']],
                            'tr' => ['sentence' => 'evin arkasında', 'correct' => ['evin', 'arkasında'], 'extra' => ['önde']],
                        ],
                    ],
                    'c' => [
                        'words' => ['앞에', '또는', '뒤에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'in front or behind', 'correct' => ['in front', 'or', 'behind'], 'extra' => ['shop']],
                            'az' => ['sentence' => 'qarşıda və ya arxada', 'correct' => ['qarşıda', 'və ya', 'arxada'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'أمام أو خلف', 'correct' => ['أمام', 'أو', 'خلف'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'впереди или сзади', 'correct' => ['впереди', 'или', 'сзади'], 'extra' => ['магазин']],
                            'es' => ['sentence' => 'Delante o detrás', 'correct' => ['delante', 'o', 'detrás'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Vorne oder hinten', 'correct' => ['vorne', 'oder', 'hinten'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Devant ou derrière', 'correct' => ['devant', 'ou', 'derrière'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '前か後ろ', 'correct' => ['前', 'か', '後ろ'], 'extra' => ['店']],
                            'tr' => ['sentence' => 'önde veya arkada', 'correct' => ['önde', 'veya', 'arkada'], 'extra' => ['dükkan']],
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
                            'az' => ['sentence' => 'stansiya şimal', 'correct' => ['stansiya', 'şimal'], 'extra' => ['cənub']],
                            'ar' => ['sentence' => 'محطة شمال', 'correct' => ['محطة', 'شمال'], 'extra' => ['جنوب']],
                            'ru' => ['sentence' => 'станция север', 'correct' => ['станция', 'север'], 'extra' => ['юг']],
                            'es' => ['sentence' => 'La estación está al norte', 'correct' => ['la', 'estación', 'está', 'norte'], 'extra' => ['sur', 'escuela']],
                            'de' => ['sentence' => 'Der Bahnhof ist im Norden', 'correct' => ['der', 'Bahnhof', 'ist', 'Norden'], 'extra' => ['Süden', 'Schule']],
                            'fr' => ['sentence' => 'La gare est au nord', 'correct' => ['la', 'gare', 'est', 'nord'], 'extra' => ['sud', 'école']],
                            'ja' => ['sentence' => '駅は北にあります', 'correct' => ['駅', 'は', '北', 'に', 'あります'], 'extra' => ['南']],
                            'tr' => ['sentence' => 'istasyon kuzeyde', 'correct' => ['istasyon', 'kuzeyde'], 'extra' => ['güney']],
                        ],
                    ],
                    'b' => [
                        'words' => ['학교는', '남쪽에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the school is south', 'correct' => ['the', 'school', 'is', 'south'], 'extra' => ['north']],
                            'az' => ['sentence' => 'məktəb cənub', 'correct' => ['məktəb', 'cənub'], 'extra' => ['şimal']],
                            'ar' => ['sentence' => 'مدرسة جنوب', 'correct' => ['مدرسة', 'جنوب'], 'extra' => ['شمال']],
                            'ru' => ['sentence' => 'школа юг', 'correct' => ['школа', 'юг'], 'extra' => ['север']],
                            'es' => ['sentence' => 'La escuela está al sur', 'correct' => ['la', 'escuela', 'está', 'sur'], 'extra' => ['norte', 'estación']],
                            'de' => ['sentence' => 'Die Schule ist im Süden', 'correct' => ['die', 'Schule', 'ist', 'Süden'], 'extra' => ['Norden', 'Bahnhof']],
                            'fr' => ['sentence' => 'L\'école est au sud', 'correct' => ['le', 'école', 'est', 'sud'], 'extra' => ['nord', 'gare']],
                            'ja' => ['sentence' => '学校は南にあります', 'correct' => ['学校', 'は', '南', 'に', 'あります'], 'extra' => ['北']],
                            'tr' => ['sentence' => 'okul güneyde', 'correct' => ['okul', 'güneyde'], 'extra' => ['kuzey']],
                        ],
                    ],
                    'c' => [
                        'words' => ['북쪽', '또는', '남쪽'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'north or south', 'correct' => ['north', 'or', 'south'], 'extra' => ['school']],
                            'az' => ['sentence' => 'şimal və ya cənub', 'correct' => ['şimal', 'və ya', 'cənub'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'شمال أو جنوب', 'correct' => ['شمال', 'أو', 'جنوب'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'север или юг', 'correct' => ['север', 'или', 'юг'], 'extra' => ['школа']],
                            'es' => ['sentence' => 'Norte o sur', 'correct' => ['norte', 'o', 'sur'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Norden oder Süden', 'correct' => ['Norden', 'oder', 'Süden'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'Nord ou sud', 'correct' => ['nord', 'ou', 'sud'], 'extra' => ['école']],
                            'ja' => ['sentence' => '北か南', 'correct' => ['北', 'か', '南'], 'extra' => ['学校']],
                            'tr' => ['sentence' => 'kuzey veya güney', 'correct' => ['kuzey', 'veya', 'güney'], 'extra' => ['okul']],
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
                            'az' => ['sentence' => 'dönüş sağ yanında stansiya', 'correct' => ['dönüş', 'sağ', 'yanında', 'stansiya'], 'extra' => ['düz']],
                            'ar' => ['sentence' => 'منعطف يمين على محطة', 'correct' => ['منعطف', 'يمين', 'على', 'محطة'], 'extra' => ['مباشرة']],
                            'ru' => ['sentence' => 'поворот правый на станция', 'correct' => ['поворот', 'правый', 'на', 'станция'], 'extra' => ['прямо']],
                            'es' => ['sentence' => 'Gira a la derecha en la estación', 'correct' => ['girar', 'derecha', 'en', 'la', 'estación'], 'extra' => ['recto']],
                            'de' => ['sentence' => 'Biege am Bahnhof rechts ab', 'correct' => ['abbiegen', 'rechts', 'an', 'dem', 'Bahnhof'], 'extra' => ['geradeaus']],
                            'fr' => ['sentence' => 'Tourne à droite à la gare', 'correct' => ['tourner', 'droite', 'à', 'la', 'gare'], 'extra' => ['tout droit']],
                            'ja' => ['sentence' => '駅で右に曲がる', 'correct' => ['駅', 'で', '右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                            'tr' => ['sentence' => 'istasyonda sağa dön', 'correct' => ['istasyonda', 'sağa', 'dön'], 'extra' => ['düz']],
                        ],
                    ],
                    'b' => [
                        'words' => ['거리를', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'go straight on the street', 'correct' => ['go', 'straight', 'on', 'the', 'street'], 'extra' => ['turn']],
                            'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => ['dönüş']],
                            'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => ['منعطف']],
                            'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => ['поворот']],
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => ['dön']],
                        ],
                    ],
                    'c' => [
                        'words' => ['돌아서', '똑바로', '가세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'turn and go straight', 'correct' => ['turn', 'and', 'go', 'straight'], 'extra' => ['station']],
                            'az' => ['sentence' => 'dönüş və gedirəm düz', 'correct' => ['dönüş', 'və', 'gedirəm', 'düz'], 'extra' => ['stansiya']],
                            'ar' => ['sentence' => 'منعطف و أذهب مباشرة', 'correct' => ['منعطف', 'و', 'أذهب', 'مباشرة'], 'extra' => ['محطة']],
                            'ru' => ['sentence' => 'поворот и иду прямо', 'correct' => ['поворот', 'и', 'иду', 'прямо'], 'extra' => ['станция']],
                            'es' => ['sentence' => 'Gira y ve recto', 'correct' => ['girar', 'y', 'ir', 'recto'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Bieg ab und geh geradeaus', 'correct' => ['abbiegen', 'und', 'gehen', 'geradeaus'], 'extra' => ['Bahnhof']],
                            'fr' => ['sentence' => 'Tourne et va tout droit', 'correct' => ['tourner', 'et', 'aller', 'tout droit'], 'extra' => ['gare']],
                            'ja' => ['sentence' => '曲がってまっすぐ行く', 'correct' => ['曲がって', 'まっすぐ', '行く'], 'extra' => ['駅']],
                            'tr' => ['sentence' => 'dön ve düz git', 'correct' => ['dön', 've', 'düz', 'git'], 'extra' => ['istasyon']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
