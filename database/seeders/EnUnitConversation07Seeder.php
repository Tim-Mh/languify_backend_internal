<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation07Seeder extends Seeder
{
    private const PICTURES = [
        'Street' => 'street', 'Station' => 'station', 'Shop' => 'shop', 'Park' => 'park',
        'School' => 'school', 'House' => 'house',
    ];

    /**
     * English Chapter 2, Unit 7 — giving directions.
     *
     * The street and the station anchor the lessons while the direction words
     * (straight, turn, cross, continue, in front, behind, north, south) come in
     * pairs, closing on a full "turn right at the station".
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Giving Directions', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Straight & Turn', 1,
                pictures: [['en' => 'Street', 'img' => 'street'], ['en' => 'Station', 'img' => 'station']],
                plain: [['en' => 'Straight'], ['en' => 'Turn']],
                phrases: [
                    'a' => [
                        'words' => ['go', 'straight', 'on', 'the', 'street'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                            'ko' => ['sentence' => '거리를 똑바로 가다', 'correct' => ['거리를', '똑바로', '가다'], 'extra' => ['돌다']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => []],
                        'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => []],
                        'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => []],
                        'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['turn', 'right'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Gira a la derecha', 'correct' => ['girar', 'derecha'], 'extra' => ['recto', 'estación']],
                            'de' => ['sentence' => 'Biege rechts ab', 'correct' => ['abbiegen', 'rechts'], 'extra' => ['geradeaus', 'Bahnhof']],
                            'ja' => ['sentence' => '右に曲がる', 'correct' => ['右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                            'ko' => ['sentence' => '오른쪽으로 돌다', 'correct' => ['오른쪽으로', '돌다'], 'extra' => ['똑바로']],
                            'fr' => ['sentence' => 'Tourne à droite', 'correct' => ['tourner', 'droite'], 'extra' => ['tout droit', 'gare']],
                            'tr' => ['sentence' => 'sağa dön', 'correct' => ['sağa', 'dön'], 'extra' => []],
                        'ru' => ['sentence' => 'поворот правый', 'correct' => ['поворот', 'правый'], 'extra' => []],
                        'ar' => ['sentence' => 'منعطف يمين', 'correct' => ['منعطف', 'يمين'], 'extra' => []],
                        'az' => ['sentence' => 'dönüş sağ', 'correct' => ['dönüş', 'sağ'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['go', 'straight', 'to', 'the', 'station'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Ve recto a la estación', 'correct' => ['ir', 'recto', 'a', 'la', 'estación'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Geh geradeaus zum Bahnhof', 'correct' => ['gehen', 'geradeaus', 'zu', 'dem', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '駅までまっすぐ行く', 'correct' => ['駅', 'まで', 'まっすぐ', '行く'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '역까지 똑바로 가다', 'correct' => ['역까지', '똑바로', '가다'], 'extra' => ['거리']],
                            'fr' => ['sentence' => "Va tout droit jusqu'à la gare", 'correct' => ['aller', 'tout droit', 'à', 'la', 'gare'], 'extra' => ['rue']],
                            'tr' => ['sentence' => 'istasyona düz git', 'correct' => ['istasyona', 'düz', 'git'], 'extra' => []],
                        'ru' => ['sentence' => 'иду прямо в станция', 'correct' => ['иду', 'прямо', 'в', 'станция'], 'extra' => []],
                        'ar' => ['sentence' => 'أذهب مباشرة إلى محطة', 'correct' => ['أذهب', 'مباشرة', 'إلى', 'محطة'], 'extra' => []],
                        'az' => ['sentence' => 'gedirəm düz stansiya', 'correct' => ['gedirəm', 'düz', 'stansiya'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Cross & Continue', 2,
                pictures: [['en' => 'Street', 'img' => 'street'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'Cross'], ['en' => 'Continue']],
                phrases: [
                    'a' => [
                        'words' => ['cross', 'the', 'street'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cruza la calle', 'correct' => ['cruzar', 'la', 'calle'], 'extra' => ['continuar', 'parque']],
                            'de' => ['sentence' => 'Überquere die Straße', 'correct' => ['überqueren', 'die', 'Straße'], 'extra' => ['weitergehen', 'Park']],
                            'ja' => ['sentence' => '通りを渡る', 'correct' => ['通り', 'を', '渡る'], 'extra' => ['続ける']],
                            'ko' => ['sentence' => '거리를 건너다', 'correct' => ['거리를', '건너다'], 'extra' => ['계속하다']],
                            'fr' => ['sentence' => 'Traverse la rue', 'correct' => ['traverser', 'la', 'rue'], 'extra' => ['continuer', 'parc']],
                            'tr' => ['sentence' => 'caddeyi geç', 'correct' => ['caddeyi', 'geç'], 'extra' => []],
                        'ru' => ['sentence' => 'перейди улица', 'correct' => ['перейди', 'улица'], 'extra' => []],
                        'ar' => ['sentence' => 'اعبر شارع', 'correct' => ['اعبر', 'شارع'], 'extra' => []],
                        'az' => ['sentence' => 'keç küçə', 'correct' => ['keç', 'küçə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['continue', 'to', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Continúa al parque', 'correct' => ['continuar', 'a', 'el', 'parque'], 'extra' => ['cruzar', 'calle']],
                            'de' => ['sentence' => 'Geh weiter zum Park', 'correct' => ['weitergehen', 'zu', 'dem', 'Park'], 'extra' => ['überqueren', 'Straße']],
                            'ja' => ['sentence' => '公園まで続ける', 'correct' => ['公園', 'まで', '続ける'], 'extra' => ['渡る']],
                            'ko' => ['sentence' => '공원까지 계속하다', 'correct' => ['공원까지', '계속하다'], 'extra' => ['건너다']],
                            'fr' => ['sentence' => 'Continue au parc', 'correct' => ['continuer', 'à', 'le', 'parc'], 'extra' => ['traverser', 'rue']],
                            'tr' => ['sentence' => 'parka devam et', 'correct' => ['parka', 'devam', 'et'], 'extra' => []],
                        'ru' => ['sentence' => 'продолжай в парк', 'correct' => ['продолжай', 'в', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'تابع إلى حديقة', 'correct' => ['تابع', 'إلى', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'davam et park', 'correct' => ['davam et', 'park'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['cross', 'and', 'continue'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Cruza y continúa', 'correct' => ['cruzar', 'y', 'continuar'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Überquere und geh weiter', 'correct' => ['überqueren', 'und', 'weitergehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '渡って続ける', 'correct' => ['渡って', '続ける'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '건너서 계속하다', 'correct' => ['건너서', '계속하다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => 'Traverse et continue', 'correct' => ['traverser', 'et', 'continuer'], 'extra' => ['parc']],
                            'tr' => ['sentence' => 'geç ve devam et', 'correct' => ['geç', 've', 'devam', 'et'], 'extra' => []],
                        'ru' => ['sentence' => 'перейди и продолжай', 'correct' => ['перейди', 'и', 'продолжай'], 'extra' => []],
                        'ar' => ['sentence' => 'اعبر و تابع', 'correct' => ['اعبر', 'و', 'تابع'], 'extra' => []],
                        'az' => ['sentence' => 'keç və davam et', 'correct' => ['keç', 'və', 'davam et'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: In Front & Behind', 3,
                pictures: [['en' => 'Shop', 'img' => 'shop'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'In front'], ['en' => 'Behind']],
                phrases: [
                    'a' => [
                        'words' => ['in front', 'of', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Delante de la tienda', 'correct' => ['delante', 'de', 'la', 'tienda'], 'extra' => ['detrás', 'casa']],
                            'de' => ['sentence' => 'Vor dem Geschäft', 'correct' => ['vorne', 'von', 'dem', 'Geschäft'], 'extra' => ['hinten', 'Haus']],
                            'ja' => ['sentence' => '店の前に', 'correct' => ['店', 'の前に'], 'extra' => ['後ろに']],
                            'ko' => ['sentence' => '가게 앞에', 'correct' => ['가게', '앞에'], 'extra' => ['뒤에']],
                            'fr' => ['sentence' => 'Devant le magasin', 'correct' => ['devant', 'de', 'le', 'magasin'], 'extra' => ['derrière', 'maison']],
                            'tr' => ['sentence' => 'dükkanın önünde', 'correct' => ['dükkanın', 'önünde'], 'extra' => []],
                        'ru' => ['sentence' => 'впереди магазин', 'correct' => ['впереди', 'магазин'], 'extra' => []],
                        'ar' => ['sentence' => 'أمام متجر', 'correct' => ['أمام', 'متجر'], 'extra' => []],
                        'az' => ['sentence' => 'qarşıda mağaza', 'correct' => ['qarşıda', 'mağaza'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['behind', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Detrás de la casa', 'correct' => ['detrás', 'la', 'casa'], 'extra' => ['delante', 'tienda']],
                            'de' => ['sentence' => 'Hinter dem Haus', 'correct' => ['hinten', 'dem', 'Haus'], 'extra' => ['vorne', 'Geschäft']],
                            'ja' => ['sentence' => '家の後ろに', 'correct' => ['家', 'の後ろに'], 'extra' => ['前に']],
                            'ko' => ['sentence' => '집 뒤에', 'correct' => ['집', '뒤에'], 'extra' => ['앞에']],
                            'fr' => ['sentence' => 'Derrière la maison', 'correct' => ['derrière', 'la', 'maison'], 'extra' => ['devant', 'magasin']],
                            'tr' => ['sentence' => 'evin arkasında', 'correct' => ['evin', 'arkasında'], 'extra' => []],
                        'ru' => ['sentence' => 'сзади дом', 'correct' => ['сзади', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'خلف بيت', 'correct' => ['خلف', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'arxada ev', 'correct' => ['arxada', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['in front', 'or', 'behind'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Delante o detrás', 'correct' => ['delante', 'o', 'detrás'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Vorne oder hinten', 'correct' => ['vorne', 'oder', 'hinten'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '前か後ろ', 'correct' => ['前', 'か', '後ろ'], 'extra' => ['店']],
                            'ko' => ['sentence' => '앞에 또는 뒤에', 'correct' => ['앞에', '또는', '뒤에'], 'extra' => ['가게']],
                            'fr' => ['sentence' => 'Devant ou derrière', 'correct' => ['devant', 'ou', 'derrière'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'önde veya arkada', 'correct' => ['önde', 'veya', 'arkada'], 'extra' => []],
                        'ru' => ['sentence' => 'впереди или сзади', 'correct' => ['впереди', 'или', 'сзади'], 'extra' => []],
                        'ar' => ['sentence' => 'أمام أو خلف', 'correct' => ['أمام', 'أو', 'خلف'], 'extra' => []],
                        'az' => ['sentence' => 'qarşıda və ya arxada', 'correct' => ['qarşıda', 'və ya', 'arxada'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: North & South', 4,
                pictures: [['en' => 'Station', 'img' => 'station'], ['en' => 'School', 'img' => 'school']],
                plain: [['en' => 'North'], ['en' => 'South']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'station', 'is', 'north'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La estación está al norte', 'correct' => ['la', 'estación', 'está', 'norte'], 'extra' => ['sur', 'escuela']],
                            'de' => ['sentence' => 'Der Bahnhof ist im Norden', 'correct' => ['der', 'Bahnhof', 'ist', 'Norden'], 'extra' => ['Süden', 'Schule']],
                            'ja' => ['sentence' => '駅は北にあります', 'correct' => ['駅', 'は', '北', 'に', 'あります'], 'extra' => ['南']],
                            'ko' => ['sentence' => '역은 북쪽에 있습니다', 'correct' => ['역은', '북쪽에', '있습니다'], 'extra' => ['남쪽']],
                            'fr' => ['sentence' => 'La gare est au nord', 'correct' => ['la', 'gare', 'est', 'nord'], 'extra' => ['sud', 'école']],
                            'tr' => ['sentence' => 'istasyon kuzeyde', 'correct' => ['istasyon', 'kuzeyde'], 'extra' => []],
                        'ru' => ['sentence' => 'станция север', 'correct' => ['станция', 'север'], 'extra' => []],
                        'ar' => ['sentence' => 'محطة شمال', 'correct' => ['محطة', 'شمال'], 'extra' => []],
                        'az' => ['sentence' => 'stansiya şimal', 'correct' => ['stansiya', 'şimal'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'school', 'is', 'south'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La escuela está al sur', 'correct' => ['la', 'escuela', 'está', 'sur'], 'extra' => ['norte', 'estación']],
                            'de' => ['sentence' => 'Die Schule ist im Süden', 'correct' => ['die', 'Schule', 'ist', 'Süden'], 'extra' => ['Norden', 'Bahnhof']],
                            'ja' => ['sentence' => '学校は南にあります', 'correct' => ['学校', 'は', '南', 'に', 'あります'], 'extra' => ['北']],
                            'ko' => ['sentence' => '학교는 남쪽에 있습니다', 'correct' => ['학교는', '남쪽에', '있습니다'], 'extra' => ['북쪽']],
                            'fr' => ['sentence' => "L'école est au sud", 'correct' => ['le', 'école', 'est', 'sud'], 'extra' => ['nord', 'gare']],
                            'tr' => ['sentence' => 'okul güneyde', 'correct' => ['okul', 'güneyde'], 'extra' => []],
                        'ru' => ['sentence' => 'школа юг', 'correct' => ['школа', 'юг'], 'extra' => []],
                        'ar' => ['sentence' => 'مدرسة جنوب', 'correct' => ['مدرسة', 'جنوب'], 'extra' => []],
                        'az' => ['sentence' => 'məktəb cənub', 'correct' => ['məktəb', 'cənub'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['north', 'or', 'south'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Norte o sur', 'correct' => ['norte', 'o', 'sur'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Norden oder Süden', 'correct' => ['Norden', 'oder', 'Süden'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '北か南', 'correct' => ['北', 'か', '南'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '북쪽 또는 남쪽', 'correct' => ['북쪽', '또는', '남쪽'], 'extra' => ['학교']],
                            'fr' => ['sentence' => 'Nord ou sud', 'correct' => ['nord', 'ou', 'sud'], 'extra' => ['école']],
                            'tr' => ['sentence' => 'kuzey veya güney', 'correct' => ['kuzey', 'veya', 'güney'], 'extra' => []],
                        'ru' => ['sentence' => 'север или юг', 'correct' => ['север', 'или', 'юг'], 'extra' => []],
                        'ar' => ['sentence' => 'شمال أو جنوب', 'correct' => ['شمال', 'أو', 'جنوب'], 'extra' => []],
                        'az' => ['sentence' => 'şimal və ya cənub', 'correct' => ['şimal', 'və ya', 'cənub'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Turn Right', 5,
                pictures: [['en' => 'Station', 'img' => 'station'], ['en' => 'Street', 'img' => 'street']],
                plain: [['en' => 'Turn'], ['en' => 'Straight']],
                phrases: [
                    'a' => [
                        'words' => ['turn', 'right', 'at', 'the', 'station'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Gira a la derecha en la estación', 'correct' => ['girar', 'derecha', 'en', 'la', 'estación'], 'extra' => ['recto']],
                            'de' => ['sentence' => 'Biege am Bahnhof rechts ab', 'correct' => ['abbiegen', 'rechts', 'an', 'dem', 'Bahnhof'], 'extra' => ['geradeaus']],
                            'ja' => ['sentence' => '駅で右に曲がる', 'correct' => ['駅', 'で', '右', 'に', '曲がる'], 'extra' => ['まっすぐ']],
                            'ko' => ['sentence' => '역에서 오른쪽으로 돌다', 'correct' => ['역에서', '오른쪽으로', '돌다'], 'extra' => ['똑바로']],
                            'fr' => ['sentence' => 'Tourne à droite à la gare', 'correct' => ['tourner', 'droite', 'à', 'la', 'gare'], 'extra' => ['tout droit']],
                            'tr' => ['sentence' => 'istasyonda sağa dön', 'correct' => ['istasyonda', 'sağa', 'dön'], 'extra' => []],
                        'ru' => ['sentence' => 'поворот правый на станция', 'correct' => ['поворот', 'правый', 'на', 'станция'], 'extra' => []],
                        'ar' => ['sentence' => 'منعطف يمين على محطة', 'correct' => ['منعطف', 'يمين', 'على', 'محطة'], 'extra' => []],
                        'az' => ['sentence' => 'dönüş sağ yanında stansiya', 'correct' => ['dönüş', 'sağ', 'yanında', 'stansiya'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['go', 'straight', 'on', 'the', 'street'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Ve recto por la calle', 'correct' => ['ir', 'recto', 'sobre', 'la', 'calle'], 'extra' => ['girar']],
                            'de' => ['sentence' => 'Geh geradeaus auf der Straße', 'correct' => ['gehen', 'geradeaus', 'auf', 'der', 'Straße'], 'extra' => ['abbiegen']],
                            'ja' => ['sentence' => '通りをまっすぐ行く', 'correct' => ['通り', 'を', 'まっすぐ', '行く'], 'extra' => ['曲がる']],
                            'ko' => ['sentence' => '거리를 똑바로 가다', 'correct' => ['거리를', '똑바로', '가다'], 'extra' => ['돌다']],
                            'fr' => ['sentence' => 'Va tout droit sur la rue', 'correct' => ['aller', 'tout droit', 'sur', 'la', 'rue'], 'extra' => ['tourner']],
                            'tr' => ['sentence' => 'caddede düz git', 'correct' => ['caddede', 'düz', 'git'], 'extra' => []],
                        'ru' => ['sentence' => 'иду прямо на улица', 'correct' => ['иду', 'прямо', 'на', 'улица'], 'extra' => []],
                        'ar' => ['sentence' => 'أذهب مباشرة على شارع', 'correct' => ['أذهب', 'مباشرة', 'على', 'شارع'], 'extra' => []],
                        'az' => ['sentence' => 'gedirəm düz üzərində küçə', 'correct' => ['gedirəm', 'düz', 'üzərində', 'küçə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['turn', 'and', 'go', 'straight'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Gira y ve recto', 'correct' => ['girar', 'y', 'ir', 'recto'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Bieg ab und geh geradeaus', 'correct' => ['abbiegen', 'und', 'gehen', 'geradeaus'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '曲がってまっすぐ行く', 'correct' => ['曲がって', 'まっすぐ', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '돌아서 똑바로 가다', 'correct' => ['돌아서', '똑바로', '가다'], 'extra' => ['역']],
                            'fr' => ['sentence' => 'Tourne et va tout droit', 'correct' => ['tourner', 'et', 'aller', 'tout droit'], 'extra' => ['gare']],
                            'tr' => ['sentence' => 'dön ve düz git', 'correct' => ['dön', 've', 'düz', 'git'], 'extra' => []],
                        'ru' => ['sentence' => 'поворот и иду прямо', 'correct' => ['поворот', 'и', 'иду', 'прямо'], 'extra' => []],
                        'ar' => ['sentence' => 'منعطف و أذهب مباشرة', 'correct' => ['منعطف', 'و', 'أذهب', 'مباشرة'], 'extra' => []],
                        'az' => ['sentence' => 'dönüş və gedirəm düz', 'correct' => ['dönüş', 'və', 'gedirəm', 'düz'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
