<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation06Seeder extends Seeder
{
    private const PICTURES = [
        'Parc' => 'park', 'Gare' => 'station', 'École' => 'school',
        'Magasin' => 'shop', 'Maison' => 'house', 'Café' => 'coffee',
    ];

    /**
     * French Chapter 2, Unit 6 — future plans and intentions.
     *
     * "je vais" is taught as a whole phrase (same approach as the past tense in
     * Unit 5), and the places are all Chapter 1 vocabulary so the learner can
     * say where they are going without meeting anything new at the same time.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Future Plans', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Am Going', 1,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'Gare', 'img' => 'station']],
                plain: [['fr' => 'Je vais'], ['fr' => 'Prochain']],
                phrases: [
                    'a' => [
                        'words' => ['je vais', 'dans', 'le', 'parc'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I am going in the park', 'correct' => ['I am going', 'in', 'the', 'park'], 'extra' => ['station']],
                            'es' => ['sentence' => 'Voy en el parque', 'correct' => ['voy', 'en', 'el', 'parque'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Ich gehe in den Park', 'correct' => ['ich gehe', 'in', 'den', 'Park'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '私は公園に行く', 'correct' => ['私', 'は', '公園', 'に', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '나는 공원에 간다', 'correct' => ['나는', '공원에', '간다'], 'extra' => ['역']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'semaine', 'prochain'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The next week', 'correct' => ['the', 'next', 'week'], 'extra' => ['park']],
                            'es' => ['sentence' => 'La próxima semana', 'correct' => ['la', 'próximo', 'semana'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Die nächste Woche', 'correct' => ['die', 'nächste', 'Woche'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '次の週', 'correct' => ['次の', '週'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '다음 주', 'correct' => ['다음', '주'], 'extra' => ['공원']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je vais', 'à', 'la', 'gare', 'demain'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am going to the station tomorrow', 'correct' => ['I am going', 'to', 'the', 'station', 'tomorrow'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Voy a la estación mañana', 'correct' => ['voy', 'a', 'la', 'estación', 'mañana'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich gehe morgen zum Bahnhof', 'correct' => ['ich gehe', 'zu', 'dem', 'Bahnhof', 'morgen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '私は明日駅に行く', 'correct' => ['私', 'は', '明日', '駅', 'に', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나는 내일 역에 간다', 'correct' => ['나는', '내일', '역에', '간다'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Before & After', 2,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Magasin', 'img' => 'shop']],
                plain: [['fr' => 'Après'], ['fr' => 'Avant']],
                phrases: [
                    'a' => [
                        'words' => ['après', 'le', 'magasin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'After the shop', 'correct' => ['after', 'the', 'shop'], 'extra' => ['before', 'school']],
                            'es' => ['sentence' => 'Después de la tienda', 'correct' => ['después de', 'la', 'tienda'], 'extra' => ['antes de', 'escuela']],
                            'de' => ['sentence' => 'Nach dem Geschäft', 'correct' => ['nach', 'dem', 'Geschäft'], 'extra' => ['vor', 'Schule']],
                            'ja' => ['sentence' => '店の後', 'correct' => ['店', 'の', '後'], 'extra' => ['前', '学校']],
                            'ko' => ['sentence' => '가게 후에', 'correct' => ['가게', '후에'], 'extra' => ['전에', '학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['avant', 'une', 'école'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Before a school', 'correct' => ['before', 'a', 'school'], 'extra' => ['after', 'shop']],
                            'es' => ['sentence' => 'Antes de una escuela', 'correct' => ['antes de', 'una', 'escuela'], 'extra' => ['después de']],
                            'de' => ['sentence' => 'Vor einer Schule', 'correct' => ['vor', 'einer', 'Schule'], 'extra' => ['nach', 'Geschäft']],
                            'ja' => ['sentence' => '学校の前', 'correct' => ['学校', 'の', '前'], 'extra' => ['後', '店']],
                            'ko' => ['sentence' => '학교 전에', 'correct' => ['학교', '전에'], 'extra' => ['후에', '가게']],
                        ],
                    ],
                    'c' => [
                        'words' => ['avant', 'et', 'après', 'le', 'magasin'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Before and after the shop', 'correct' => ['before', 'and', 'after', 'the', 'shop'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Antes y después de la tienda', 'correct' => ['antes de', 'y', 'después de', 'la', 'tienda'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Vor und nach dem Geschäft', 'correct' => ['vor', 'und', 'nach', 'dem', 'Geschäft'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '店の前と後', 'correct' => ['店', 'の', '前', 'と', '後'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '가게 전에 그리고 후에', 'correct' => ['가게', '전에', '그리고', '후에'], 'extra' => ['학교']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Want & Can', 3,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Vouloir'], ['fr' => 'Pouvoir']],
                phrases: [
                    'a' => [
                        'words' => ['vouloir', 'aller'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To want to go', 'correct' => ['to want', 'to go'], 'extra' => ['to be able', 'house']],
                            'es' => ['sentence' => 'Querer ir', 'correct' => ['querer', 'ir'], 'extra' => ['poder', 'casa']],
                            'de' => ['sentence' => 'Gehen wollen', 'correct' => ['gehen', 'wollen'], 'extra' => ['können', 'Haus']],
                            'ja' => ['sentence' => '行きたい', 'correct' => ['行きたい'], 'extra' => ['できる', '家']],
                            'ko' => ['sentence' => '가기를 원하다', 'correct' => ['가기를', '원하다'], 'extra' => ['할 수 있다', '집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['pouvoir', 'venir', 'dans', 'ma', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To be able to come in my house', 'correct' => ['to be able', 'to come', 'in', 'my', 'house'], 'extra' => ['to want']],
                            'es' => ['sentence' => 'Poder venir en mi casa', 'correct' => ['poder', 'venir', 'en', 'mi', 'casa'], 'extra' => ['querer']],
                            'de' => ['sentence' => 'In mein Haus kommen können', 'correct' => ['in', 'mein', 'Haus', 'kommen', 'können'], 'extra' => ['wollen']],
                            'ja' => ['sentence' => '私の家に来ることができる', 'correct' => ['私の', '家', 'に', '来る', 'こと', 'ができる'], 'extra' => ['欲しい']],
                            'ko' => ['sentence' => '나의 집에 올 수 있다', 'correct' => ['나의', '집에', '올', '수', '있다'], 'extra' => ['원하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['vouloir', 'aller', 'dans', 'un', 'café'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'To want to go in a coffee shop', 'correct' => ['to want', 'to go', 'in', 'a', 'coffee'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Querer ir en un café', 'correct' => ['querer', 'ir', 'en', 'un', 'café'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'In einen Kaffee gehen wollen', 'correct' => ['in', 'einen', 'Kaffee', 'gehen', 'wollen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'コーヒーに行きたい', 'correct' => ['コーヒー', 'に', '行きたい'], 'extra' => ['家']],
                            'ko' => ['sentence' => '커피에 가기를 원하다', 'correct' => ['커피에', '가기를', '원하다'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Ready & Free', 4,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => 'Prêt'], ['fr' => 'Libre']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'prêt'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am ready', 'correct' => ['I am', 'ready'], 'extra' => ['free', 'park']],
                            'es' => ['sentence' => 'Soy listo', 'correct' => ['soy', 'listo'], 'extra' => ['libre', 'parque']],
                            'de' => ['sentence' => 'Ich bin bereit', 'correct' => ['ich bin', 'bereit'], 'extra' => ['frei', 'Park']],
                            'ja' => ['sentence' => '私は準備ができた', 'correct' => ['私', 'は', '準備ができた'], 'extra' => ['自由な', '公園']],
                            'ko' => ['sentence' => '저는 준비되었습니다', 'correct' => ['저는', '준비되었습니다'], 'extra' => ['자유로운', '공원']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je suis', 'libre', 'demain'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am free tomorrow', 'correct' => ['I am', 'free', 'tomorrow'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'Soy libre mañana', 'correct' => ['soy', 'libre', 'mañana'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Ich bin morgen frei', 'correct' => ['ich bin', 'morgen', 'frei'], 'extra' => ['bereit']],
                            'ja' => ['sentence' => '私は明日自由です', 'correct' => ['私', 'は', '明日', '自由', 'です'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '저는 내일 자유롭습니다', 'correct' => ['저는', '내일', '자유롭습니다'], 'extra' => ['준비된']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'parc', 'et', 'une', 'école'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The park and a school', 'correct' => ['the', 'park', 'and', 'a', 'school'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'El parque y una escuela', 'correct' => ['el', 'parque', 'y', 'una', 'escuela'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Der Park und eine Schule', 'correct' => ['der', 'Park', 'und', 'eine', 'Schule'], 'extra' => ['bereit']],
                            'ja' => ['sentence' => '公園と学校', 'correct' => ['公園', 'と', '学校'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '공원과 학교', 'correct' => ['공원과', '학교'], 'extra' => ['준비된']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Next Week', 5,
                pictures: [['fr' => 'Gare', 'img' => 'station'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Je vais'], ['fr' => 'Prochain']],
                phrases: [
                    'a' => [
                        'words' => ['je vais', 'à', 'la', 'gare'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am going to the station', 'correct' => ['I am going', 'to', 'the', 'station'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Voy a la estación', 'correct' => ['voy', 'a', 'la', 'estación'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich gehe zum Bahnhof', 'correct' => ['ich gehe', 'zu', 'dem', 'Bahnhof'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私は駅に行く', 'correct' => ['私', 'は', '駅', 'に', '行く'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '나는 역에 간다', 'correct' => ['나는', '역에', '간다'], 'extra' => ['커피']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'semaine', 'prochain'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The next week', 'correct' => ['the', 'next', 'week'], 'extra' => ['station']],
                            'es' => ['sentence' => 'La próxima semana', 'correct' => ['la', 'próximo', 'semana'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Die nächste Woche', 'correct' => ['die', 'nächste', 'Woche'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '次の週', 'correct' => ['次の', '週'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '다음 주', 'correct' => ['다음', '주'], 'extra' => ['역']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je vais', 'dans', 'un', 'café', 'demain'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am going in a coffee shop tomorrow', 'correct' => ['I am going', 'in', 'a', 'coffee', 'tomorrow'], 'extra' => ['station']],
                            'es' => ['sentence' => 'Voy en un café mañana', 'correct' => ['voy', 'en', 'un', 'café', 'mañana'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Ich gehe morgen in einen Kaffee', 'correct' => ['ich gehe', 'morgen', 'in', 'einen', 'Kaffee'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '私は明日コーヒーに行く', 'correct' => ['私', 'は', '明日', 'コーヒー', 'に', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '나는 내일 커피에 간다', 'correct' => ['나는', '내일', '커피에', '간다'], 'extra' => ['역']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
