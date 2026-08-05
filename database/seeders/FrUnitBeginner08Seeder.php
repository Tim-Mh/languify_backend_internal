<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = [
        'École' => 'school', 'Magasin' => 'shop', 'Parc' => 'park',
        'Rue' => 'street', 'Gare' => 'station', 'Maison' => 'house',
    ];

    /** French Beginner Unit 8 — getting around town. */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Places in Town', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Town & Village', 1,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Magasin', 'img' => 'shop']],
                plain: [['fr' => 'Ville'], ['fr' => 'Village']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'ville'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A city', 'correct' => ['a', 'city'], 'extra' => ['village', 'school']],
                            'es' => ['sentence' => 'Una ciudad', 'correct' => ['una', 'ciudad'], 'extra' => ['pueblo', 'escuela']],
                            'de' => ['sentence' => 'Eine Stadt', 'correct' => ['eine', 'Stadt'], 'extra' => ['Dorf', 'Schule']],
                            'ja' => ['sentence' => '町', 'correct' => ['町'], 'extra' => ['村', '学校']],
                            'ko' => ['sentence' => '도시', 'correct' => ['도시'], 'extra' => ['마을', '학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'magasin', 'dans', 'une', 'ville'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A shop in a city', 'correct' => ['a', 'shop', 'in', 'a', 'city'], 'extra' => ['village']],
                            'es' => ['sentence' => 'Una tienda en una ciudad', 'correct' => ['una', 'tienda', 'en', 'una', 'ciudad'], 'extra' => ['pueblo']],
                            'de' => ['sentence' => 'Ein Geschäft in einer Stadt', 'correct' => ['ein', 'Geschäft', 'in', 'einer', 'Stadt'], 'extra' => ['Dorf']],
                            'ja' => ['sentence' => '町の店', 'correct' => ['町', 'の', '店'], 'extra' => ['村']],
                            'ko' => ['sentence' => '도시의 가게', 'correct' => ['도시의', '가게'], 'extra' => ['마을']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'école', 'et', 'un', 'village'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A school and a village', 'correct' => ['a', 'school', 'and', 'a', 'village'], 'extra' => ['shop']],
                            'es' => ['sentence' => 'Una escuela y un pueblo', 'correct' => ['una', 'escuela', 'y', 'un', 'pueblo'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Eine Schule und ein Dorf', 'correct' => ['eine', 'Schule', 'und', 'ein', 'Dorf'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '学校と村', 'correct' => ['学校', 'と', '村'], 'extra' => ['店']],
                            'ko' => ['sentence' => '학교와 마을', 'correct' => ['학교와', '마을'], 'extra' => ['가게']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Near & Far', 2,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'Rue', 'img' => 'street']],
                plain: [['fr' => 'Près'], ['fr' => 'Loin']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'parc', 'est', 'près'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The park is near', 'correct' => ['the', 'park', 'is', 'near'], 'extra' => ['far']],
                            'es' => ['sentence' => 'El parque está cerca', 'correct' => ['el', 'parque', 'está', 'cerca'], 'extra' => ['lejos']],
                            'de' => ['sentence' => 'Der Park ist nah', 'correct' => ['der', 'Park', 'ist', 'nah'], 'extra' => ['weit']],
                            'ja' => ['sentence' => '公園は近い', 'correct' => ['公園', 'は', '近い'], 'extra' => ['遠い']],
                            'ko' => ['sentence' => '공원은 가깝다', 'correct' => ['공원은', '가깝다'], 'extra' => ['먼']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'rue', 'est', 'loin'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The street is far', 'correct' => ['the', 'street', 'is', 'far'], 'extra' => ['near']],
                            'es' => ['sentence' => 'La calle está lejos', 'correct' => ['la', 'calle', 'está', 'lejos'], 'extra' => ['cerca']],
                            'de' => ['sentence' => 'Die Straße ist weit', 'correct' => ['die', 'Straße', 'ist', 'weit'], 'extra' => ['nah']],
                            'ja' => ['sentence' => '通りは遠い', 'correct' => ['通り', 'は', '遠い'], 'extra' => ['近い']],
                            'ko' => ['sentence' => '거리는 멀다', 'correct' => ['거리는', '멀다'], 'extra' => ['가까운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'parc', 'est', 'près', 'et', 'la', 'rue', 'est', 'loin'], 'blank' => 6,
                        'tr' => [
                            'en' => ['sentence' => 'The park is near and the street is far', 'correct' => ['the', 'park', 'is', 'near', 'and', 'the', 'street', 'is', 'far'], 'extra' => ['shop']],
                            'es' => ['sentence' => 'El parque está cerca y la calle está lejos', 'correct' => ['el', 'parque', 'está', 'cerca', 'y', 'la', 'calle', 'está', 'lejos'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Der Park ist nah und die Straße ist weit', 'correct' => ['der', 'Park', 'ist', 'nah', 'und', 'die', 'Straße', 'ist', 'weit'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '公園は近くて通りは遠い', 'correct' => ['公園', 'は', '近くて', '通り', 'は', '遠い'], 'extra' => ['店']],
                            'ko' => ['sentence' => '공원은 가깝고 거리는 멀다', 'correct' => ['공원은', '가깝고', '거리는', '멀다'], 'extra' => ['가게']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Go & Come', 3,
                pictures: [['fr' => 'Gare', 'img' => 'station'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => 'Aller'], ['fr' => 'Venir']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'aller'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to go', 'correct' => ['I would like', 'to go'], 'extra' => ['to come', 'station']],
                            'es' => ['sentence' => 'Quisiera ir', 'correct' => ['quisiera', 'ir'], 'extra' => ['venir', 'estación']],
                            'de' => ['sentence' => 'Ich möchte gehen', 'correct' => ['ich möchte', 'gehen'], 'extra' => ['kommen', 'Bahnhof']],
                            'ja' => ['sentence' => '行きたいです', 'correct' => ['行きたい', 'です'], 'extra' => ['来る', '駅']],
                            'ko' => ['sentence' => '가고 싶어요', 'correct' => ['가고', '싶어요'], 'extra' => ['오다', '역']],
                        ],
                    ],
                    'b' => [
                        'words' => ['venir', 'ici'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To come here', 'correct' => ['to come', 'here'], 'extra' => ['to go', 'school']],
                            'es' => ['sentence' => 'Venir aquí', 'correct' => ['venir', 'aquí'], 'extra' => ['ir', 'escuela']],
                            'de' => ['sentence' => 'Hierher kommen', 'correct' => ['hier', 'kommen'], 'extra' => ['gehen', 'Schule']],
                            'ja' => ['sentence' => 'ここに来る', 'correct' => ['ここ', 'に', '来る'], 'extra' => ['行く', '学校']],
                            'ko' => ['sentence' => '여기에 오다', 'correct' => ['여기에', '오다'], 'extra' => ['가다', '학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'gare', 'et', 'une', 'école'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A station and a school', 'correct' => ['a', 'station', 'and', 'a', 'school'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Una estación y una escuela', 'correct' => ['una', 'estación', 'y', 'una', 'escuela'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ein Bahnhof und eine Schule', 'correct' => ['ein', 'Bahnhof', 'und', 'eine', 'Schule'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '駅と学校', 'correct' => ['駅', 'と', '学校'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '역과 학교', 'correct' => ['역과', '학교'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Left & Right', 4,
                pictures: [['fr' => 'Magasin', 'img' => 'shop'], ['fr' => 'Parc', 'img' => 'park']],
                plain: [['fr' => 'Gauche'], ['fr' => 'Droite']],
                phrases: [
                    'a' => [
                        'words' => ['à', 'gauche'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To the left', 'correct' => ['to the', 'left'], 'extra' => ['right', 'shop']],
                            'es' => ['sentence' => 'A la izquierda', 'correct' => ['a la', 'izquierda'], 'extra' => ['derecha', 'tienda']],
                            'de' => ['sentence' => 'Nach links', 'correct' => ['nach', 'links'], 'extra' => ['rechts', 'Geschäft']],
                            'ja' => ['sentence' => '左へ', 'correct' => ['左', 'へ'], 'extra' => ['右', '店']],
                            'ko' => ['sentence' => '왼쪽에', 'correct' => ['왼쪽에'], 'extra' => ['오른쪽', '가게']],
                        ],
                    ],
                    'b' => [
                        'words' => ['à', 'droite'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To the right', 'correct' => ['to the', 'right'], 'extra' => ['left', 'park']],
                            'es' => ['sentence' => 'A la derecha', 'correct' => ['a la', 'derecha'], 'extra' => ['izquierda', 'parque']],
                            'de' => ['sentence' => 'Nach rechts', 'correct' => ['nach', 'rechts'], 'extra' => ['links', 'Park']],
                            'ja' => ['sentence' => '右へ', 'correct' => ['右', 'へ'], 'extra' => ['左', '公園']],
                            'ko' => ['sentence' => '오른쪽에', 'correct' => ['오른쪽에'], 'extra' => ['왼쪽', '공원']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'magasin', 'à', 'gauche', 'et', 'le', 'parc', 'à', 'droite'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The shop to the left and the park to the right', 'correct' => ['the', 'shop', 'to the', 'left', 'and', 'the', 'park', 'to the', 'right'], 'extra' => ['street']],
                            'es' => ['sentence' => 'La tienda a la izquierda y el parque a la derecha', 'correct' => ['la', 'tienda', 'a la', 'izquierda', 'y', 'el', 'parque', 'a la', 'derecha'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Das Geschäft nach links und der Park nach rechts', 'correct' => ['das', 'Geschäft', 'nach', 'links', 'und', 'der', 'Park', 'nach', 'rechts'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '左に店と右に公園', 'correct' => ['左', 'に', '店', 'と', '右', 'に', '公園'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '왼쪽에 가게와 오른쪽에 공원', 'correct' => ['왼쪽에', '가게와', '오른쪽에', '공원'], 'extra' => ['거리']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Open & Closed', 5,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Gare', 'img' => 'station']],
                plain: [['fr' => 'Ouvert'], ['fr' => 'Fermé']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'magasin', 'ouvert'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'An open shop', 'correct' => ['an', 'open', 'shop'], 'extra' => ['closed', 'school']],
                            'es' => ['sentence' => 'Una tienda abierta', 'correct' => ['una', 'tienda', 'abierta'], 'extra' => ['cerrado', 'escuela']],
                            'de' => ['sentence' => 'Ein offenes Geschäft', 'correct' => ['ein', 'offenes', 'Geschäft'], 'extra' => ['geschlossen', 'Schule']],
                            'ja' => ['sentence' => '開いている店', 'correct' => ['開いて', 'いる', '店'], 'extra' => ['閉まっている', '学校']],
                            'ko' => ['sentence' => '열린 가게', 'correct' => ['열린', '가게'], 'extra' => ['닫힌', '학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'magasin', 'fermé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A closed shop', 'correct' => ['a', 'closed', 'shop'], 'extra' => ['open', 'station']],
                            'es' => ['sentence' => 'Una tienda cerrada', 'correct' => ['una', 'tienda', 'cerrada'], 'extra' => ['abierto', 'estación']],
                            'de' => ['sentence' => 'Ein geschlossenes Geschäft', 'correct' => ['ein', 'geschlossenes', 'Geschäft'], 'extra' => ['offen', 'Bahnhof']],
                            'ja' => ['sentence' => '閉まっている店', 'correct' => ['閉まって', 'いる', '店'], 'extra' => ['開いている', '駅']],
                            'ko' => ['sentence' => '닫힌 가게', 'correct' => ['닫힌', '가게'], 'extra' => ['열린', '역']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'école', 'et', 'une', 'gare'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A school and a station', 'correct' => ['a', 'school', 'and', 'a', 'station'], 'extra' => ['open']],
                            'es' => ['sentence' => 'Una escuela y una estación', 'correct' => ['una', 'escuela', 'y', 'una', 'estación'], 'extra' => ['abierto']],
                            'de' => ['sentence' => 'Eine Schule und ein Bahnhof', 'correct' => ['eine', 'Schule', 'und', 'ein', 'Bahnhof'], 'extra' => ['offen']],
                            'ja' => ['sentence' => '学校と駅', 'correct' => ['学校', 'と', '駅'], 'extra' => ['開いている']],
                            'ko' => ['sentence' => '학교와 역', 'correct' => ['학교와', '역'], 'extra' => ['열린']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
