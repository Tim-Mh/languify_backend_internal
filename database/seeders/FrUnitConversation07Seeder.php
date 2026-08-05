<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation07Seeder extends Seeder
{
    private const PICTURES = [
        'Rue' => 'street', 'Gare' => 'station', 'Parc' => 'park',
        'Magasin' => 'shop', 'École' => 'school', 'Maison' => 'house',
    ];

    /**
     * French Chapter 2, Unit 7 — giving directions.
     *
     * Builds directly on Chapter 1 Unit 8, which already taught the places and
     * "à gauche / à droite". This unit adds the movement verbs (tourner,
     * traverser, continuer) and the positions (devant, derrière), so a learner
     * can string an actual direction together rather than name a landmark.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Giving Directions', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Straight & Turn', 1,
                pictures: [['fr' => 'Rue', 'img' => 'street'], ['fr' => 'Gare', 'img' => 'station']],
                plain: [['fr' => 'Tout droit'], ['fr' => 'Tourner']],
                phrases: [
                    'a' => [
                        'words' => ['tout droit', 'ici'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Straight ahead here', 'correct' => ['straight ahead', 'here'], 'extra' => ['to turn', 'street']],
                            'es' => ['sentence' => 'Todo recto aquí', 'correct' => ['todo recto', 'aquí'], 'extra' => ['girar', 'calle']],
                            'de' => ['sentence' => 'Geradeaus hier', 'correct' => ['geradeaus', 'hier'], 'extra' => ['abbiegen', 'Straße']],
                            'ja' => ['sentence' => 'ここでまっすぐ', 'correct' => ['ここ', 'で', 'まっすぐ'], 'extra' => ['曲がる', '通り']],
                            'ko' => ['sentence' => '여기서 직진', 'correct' => ['여기서', '직진'], 'extra' => ['돌다', '거리']],
                        ],
                    ],
                    'b' => [
                        'words' => ['tourner', 'à', 'gauche'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To turn to the left', 'correct' => ['to turn', 'to', 'left'], 'extra' => ['straight ahead']],
                            'es' => ['sentence' => 'Girar a la izquierda', 'correct' => ['girar', 'a', 'izquierda'], 'extra' => ['todo recto']],
                            'de' => ['sentence' => 'Nach links abbiegen', 'correct' => ['abbiegen', 'zu', 'links'], 'extra' => ['geradeaus']],
                            'ja' => ['sentence' => '左へ曲がる', 'correct' => ['左', 'へ', '曲がる'], 'extra' => ['まっすぐ']],
                            'ko' => ['sentence' => '왼쪽으로 돌다', 'correct' => ['왼쪽으로', '돌다'], 'extra' => ['직진']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'rue', 'et', 'la', 'gare'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The street and the station', 'correct' => ['the', 'street', 'and', 'the', 'station'], 'extra' => ['park']],
                            'es' => ['sentence' => 'La calle y la estación', 'correct' => ['la', 'calle', 'y', 'la', 'estación'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Die Straße und der Bahnhof', 'correct' => ['die', 'Straße', 'und', 'der', 'Bahnhof'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '通りと駅', 'correct' => ['通り', 'と', '駅'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '거리와 역', 'correct' => ['거리와', '역'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Cross & Continue', 2,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'Magasin', 'img' => 'shop']],
                plain: [['fr' => 'Traverser'], ['fr' => 'Continuer']],
                phrases: [
                    'a' => [
                        'words' => ['traverser', 'la', 'rue'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To cross the street', 'correct' => ['to cross', 'the', 'street'], 'extra' => ['to continue', 'park']],
                            'es' => ['sentence' => 'Cruzar la calle', 'correct' => ['cruzar', 'la', 'calle'], 'extra' => ['continuar', 'parque']],
                            'de' => ['sentence' => 'Die Straße überqueren', 'correct' => ['die', 'Straße', 'überqueren'], 'extra' => ['weitergehen']],
                            'ja' => ['sentence' => '通りを渡る', 'correct' => ['通り', 'を', '渡る'], 'extra' => ['続ける', '公園']],
                            'ko' => ['sentence' => '거리를 건너다', 'correct' => ['거리를', '건너다'], 'extra' => ['계속하다', '공원']],
                        ],
                    ],
                    'b' => [
                        'words' => ['continuer', 'tout droit'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To continue straight ahead', 'correct' => ['to continue', 'straight ahead'], 'extra' => ['to cross', 'shop']],
                            'es' => ['sentence' => 'Continuar todo recto', 'correct' => ['continuar', 'todo recto'], 'extra' => ['cruzar', 'tienda']],
                            'de' => ['sentence' => 'Geradeaus weitergehen', 'correct' => ['geradeaus', 'weitergehen'], 'extra' => ['überqueren']],
                            'ja' => ['sentence' => 'まっすぐ続ける', 'correct' => ['まっすぐ', '続ける'], 'extra' => ['渡る', '店']],
                            'ko' => ['sentence' => '직진 계속하다', 'correct' => ['직진', '계속하다'], 'extra' => ['건너다', '가게']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'parc', 'et', 'le', 'magasin'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The park and the shop', 'correct' => ['the', 'park', 'and', 'the', 'shop'], 'extra' => ['street']],
                            'es' => ['sentence' => 'El parque y la tienda', 'correct' => ['el', 'parque', 'y', 'la', 'tienda'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Der Park und das Geschäft', 'correct' => ['der', 'Park', 'und', 'das', 'Geschäft'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '公園と店', 'correct' => ['公園', 'と', '店'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '공원과 가게', 'correct' => ['공원과', '가게'], 'extra' => ['거리']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: In Front & Behind', 3,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Devant'], ['fr' => 'Derrière']],
                phrases: [
                    'a' => [
                        'words' => ['devant', 'une', 'école'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'In front of a school', 'correct' => ['in front of', 'a', 'school'], 'extra' => ['behind', 'house']],
                            'es' => ['sentence' => 'Delante de una escuela', 'correct' => ['delante de', 'una', 'escuela'], 'extra' => ['detrás de', 'casa']],
                            'de' => ['sentence' => 'Vor einer Schule', 'correct' => ['vor', 'einer', 'Schule'], 'extra' => ['hinter', 'Haus']],
                            'ja' => ['sentence' => '学校の前に', 'correct' => ['学校', 'の前に'], 'extra' => ['後ろに', '家']],
                            'ko' => ['sentence' => '학교 앞에', 'correct' => ['학교', '앞에'], 'extra' => ['뒤에', '집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['derrière', 'la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Behind the house', 'correct' => ['behind', 'the', 'house'], 'extra' => ['in front of', 'school']],
                            'es' => ['sentence' => 'Detrás de la casa', 'correct' => ['detrás de', 'la', 'casa'], 'extra' => ['delante de', 'escuela']],
                            'de' => ['sentence' => 'Hinter dem Haus', 'correct' => ['hinter', 'dem', 'Haus'], 'extra' => ['vor', 'Schule']],
                            'ja' => ['sentence' => '家の後ろに', 'correct' => ['家', 'の後ろに'], 'extra' => ['前に', '学校']],
                            'ko' => ['sentence' => '집 뒤에', 'correct' => ['집', '뒤에'], 'extra' => ['앞에', '학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['devant', 'et', 'derrière', 'la', 'maison'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'In front of and behind the house', 'correct' => ['in front of', 'and', 'behind', 'the', 'house'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Delante y detrás de la casa', 'correct' => ['delante de', 'y', 'detrás de', 'la', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Vor und hinter dem Haus', 'correct' => ['vor', 'und', 'hinter', 'dem', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '家の前と後ろに', 'correct' => ['家', 'の', '前', 'と', '後ろに'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '집 앞에 그리고 뒤에', 'correct' => ['집', '앞에', '그리고', '뒤에'], 'extra' => ['학교']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: North & South', 4,
                pictures: [['fr' => 'Gare', 'img' => 'station'], ['fr' => 'Rue', 'img' => 'street']],
                plain: [['fr' => 'Nord'], ['fr' => 'Sud']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'nord'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The north', 'correct' => ['the', 'north'], 'extra' => ['south', 'station']],
                            'es' => ['sentence' => 'El norte', 'correct' => ['el', 'norte'], 'extra' => ['sur', 'estación']],
                            'de' => ['sentence' => 'Der Norden', 'correct' => ['der', 'Norden'], 'extra' => ['Süden', 'Bahnhof']],
                            'ja' => ['sentence' => '北', 'correct' => ['北'], 'extra' => ['南', '駅']],
                            'ko' => ['sentence' => '북쪽', 'correct' => ['북쪽'], 'extra' => ['남쪽', '역']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'sud'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The south', 'correct' => ['the', 'south'], 'extra' => ['north', 'street']],
                            'es' => ['sentence' => 'El sur', 'correct' => ['el', 'sur'], 'extra' => ['norte', 'calle']],
                            'de' => ['sentence' => 'Der Süden', 'correct' => ['der', 'Süden'], 'extra' => ['Norden', 'Straße']],
                            'ja' => ['sentence' => '南', 'correct' => ['南'], 'extra' => ['北', '通り']],
                            'ko' => ['sentence' => '남쪽', 'correct' => ['남쪽'], 'extra' => ['북쪽', '거리']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'gare', 'et', 'la', 'rue'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The station and the street', 'correct' => ['the', 'station', 'and', 'the', 'street'], 'extra' => ['north']],
                            'es' => ['sentence' => 'La estación y la calle', 'correct' => ['la', 'estación', 'y', 'la', 'calle'], 'extra' => ['norte']],
                            'de' => ['sentence' => 'Der Bahnhof und die Straße', 'correct' => ['der', 'Bahnhof', 'und', 'die', 'Straße'], 'extra' => ['Norden']],
                            'ja' => ['sentence' => '駅と通り', 'correct' => ['駅', 'と', '通り'], 'extra' => ['北']],
                            'ko' => ['sentence' => '역과 거리', 'correct' => ['역과', '거리'], 'extra' => ['북쪽']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Turn Right', 5,
                pictures: [['fr' => 'Magasin', 'img' => 'shop'], ['fr' => 'Parc', 'img' => 'park']],
                plain: [['fr' => 'Tourner'], ['fr' => 'Tout droit']],
                phrases: [
                    'a' => [
                        'words' => ['tourner', 'à', 'droite'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To turn to the right', 'correct' => ['to turn', 'to', 'right'], 'extra' => ['straight ahead']],
                            'es' => ['sentence' => 'Girar a la derecha', 'correct' => ['girar', 'a', 'derecha'], 'extra' => ['todo recto']],
                            'de' => ['sentence' => 'Nach rechts abbiegen', 'correct' => ['abbiegen', 'zu', 'rechts'], 'extra' => ['geradeaus']],
                            'ja' => ['sentence' => '右へ曲がる', 'correct' => ['右', 'へ', '曲がる'], 'extra' => ['まっすぐ']],
                            'ko' => ['sentence' => '오른쪽으로 돌다', 'correct' => ['오른쪽으로', '돌다'], 'extra' => ['직진']],
                        ],
                    ],
                    'b' => [
                        'words' => ['tout droit', 'devant'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Straight ahead in front', 'correct' => ['straight ahead', 'in front of'], 'extra' => ['to turn', 'shop']],
                            'es' => ['sentence' => 'Todo recto delante', 'correct' => ['todo recto', 'delante de'], 'extra' => ['girar', 'tienda']],
                            'de' => ['sentence' => 'Geradeaus vor', 'correct' => ['geradeaus', 'vor'], 'extra' => ['abbiegen', 'Geschäft']],
                            'ja' => ['sentence' => 'まっすぐ前に', 'correct' => ['まっすぐ', '前に'], 'extra' => ['曲がる', '店']],
                            'ko' => ['sentence' => '직진 앞에', 'correct' => ['직진', '앞에'], 'extra' => ['돌다', '가게']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'magasin', 'et', 'le', 'parc'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The shop and the park', 'correct' => ['the', 'shop', 'and', 'the', 'park'], 'extra' => ['street']],
                            'es' => ['sentence' => 'La tienda y el parque', 'correct' => ['la', 'tienda', 'y', 'el', 'parque'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Das Geschäft und der Park', 'correct' => ['das', 'Geschäft', 'und', 'der', 'Park'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '店と公園', 'correct' => ['店', 'と', '公園'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '가게와 공원', 'correct' => ['가게와', '공원'], 'extra' => ['거리']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
