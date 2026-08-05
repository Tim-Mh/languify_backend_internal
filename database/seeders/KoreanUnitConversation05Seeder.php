<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation05Seeder extends Seeder
{
    private const PICTURES = ['빵' => 'bread', '사과' => 'apple', '커피' => 'coffee', '물' => 'water', '공원' => 'park', '집' => 'house', '학교' => 'school', '가게' => 'shop', '친구' => 'friend'];

    /**
     * Korean Conversation, Unit 5, the Korean twin of the English "Talking About The Past" unit.
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

        $builder->seedUnit($chapter->id, 5, '유닛 5: 과거 이야기하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 빵 · 사과', 1,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '어제'], ['ko' => '나는 먹었다']],
                phrases: [
                    'a' => [
                        'words' => ['어제', '빵을', '먹었다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'yesterday I ate bread', 'correct' => ['yesterday', 'I ate', 'bread'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'Ayer comí pan', 'correct' => ['ayer', 'comí', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Gestern aß ich Brot', 'correct' => ['gestern', 'ich aß', 'Brot'], 'extra' => ['Apfel']],
                            'fr' => ['sentence' => 'Hier j\'ai mangé du pain', 'correct' => ['hier', 'j\'ai mangé', 'pain'], 'extra' => ['pomme']],
                            'ja' => ['sentence' => '昨日パンを食べた', 'correct' => ['昨日', 'パン', 'を', '食べた'], 'extra' => ['りんご']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과를', '먹었다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I ate an apple', 'correct' => ['I ate', 'an', 'apple'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'Comí una manzana', 'correct' => ['comí', 'una', 'manzana'], 'extra' => ['pan', 'ayer']],
                            'de' => ['sentence' => 'Ich aß einen Apfel', 'correct' => ['ich aß', 'einen', 'Apfel'], 'extra' => ['Brot', 'gestern']],
                            'fr' => ['sentence' => 'J\'ai mangé une pomme', 'correct' => ['j\'ai mangé', 'une', 'pomme'], 'extra' => ['pain']],
                            'ja' => ['sentence' => 'りんごを食べた', 'correct' => ['りんご', 'を', '食べた'], 'extra' => ['パン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵과', '사과'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'bread and an apple', 'correct' => ['bread', 'and', 'an', 'apple'], 'extra' => ['yesterday']],
                            'es' => ['sentence' => 'Pan y una manzana', 'correct' => ['pan', 'y', 'una', 'manzana'], 'extra' => ['ayer']],
                            'de' => ['sentence' => 'Brot und ein Apfel', 'correct' => ['Brot', 'und', 'ein', 'Apfel'], 'extra' => ['gestern']],
                            'fr' => ['sentence' => 'Du pain et une pomme', 'correct' => ['pain', 'et', 'une', 'pomme'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'パンとりんご', 'correct' => ['パン', 'と', 'りんご'], 'extra' => ['昨日']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 커피 · 물', 2,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '물', 'img' => 'water']],
                plain: [['ko' => '나는 마셨다'], ['ko' => '였습니다']],
                phrases: [
                    'a' => [
                        'words' => ['커피를', '마셨다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I drank coffee', 'correct' => ['I drank', 'coffee'], 'extra' => ['water']],
                            'es' => ['sentence' => 'Bebí café', 'correct' => ['bebí', 'café'], 'extra' => ['agua', 'fue']],
                            'de' => ['sentence' => 'Ich trank Kaffee', 'correct' => ['ich trank', 'Kaffee'], 'extra' => ['Wasser', 'es war']],
                            'fr' => ['sentence' => 'J\'ai bu du café', 'correct' => ['j\'ai bu', 'café'], 'extra' => ['eau', 'c\'était']],
                            'ja' => ['sentence' => 'コーヒーを飲んだ', 'correct' => ['コーヒー', 'を', '飲んだ'], 'extra' => ['水']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그것은', '좋았다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'it was good', 'correct' => ['it was', 'good'], 'extra' => ['I drank']],
                            'es' => ['sentence' => 'Fue bueno', 'correct' => ['fue', 'bueno'], 'extra' => ['bebí', 'agua']],
                            'de' => ['sentence' => 'Es war gut', 'correct' => ['es war', 'gut'], 'extra' => ['ich trank', 'Wasser']],
                            'fr' => ['sentence' => 'C\'était bon', 'correct' => ['c\'était', 'bon'], 'extra' => ['j\'ai bu', 'eau']],
                            'ja' => ['sentence' => 'それは良かった', 'correct' => ['それ', 'は', '良かった'], 'extra' => ['私は飲んだ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['물을', '마셨다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I drank water', 'correct' => ['I drank', 'water'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Bebí agua', 'correct' => ['bebí', 'agua'], 'extra' => ['café', 'fue']],
                            'de' => ['sentence' => 'Ich trank Wasser', 'correct' => ['ich trank', 'Wasser'], 'extra' => ['Kaffee', 'es war']],
                            'fr' => ['sentence' => 'J\'ai bu de l\'eau', 'correct' => ['j\'ai bu', 'eau'], 'extra' => ['café']],
                            'ja' => ['sentence' => '水を飲んだ', 'correct' => ['水', 'を', '飲んだ'], 'extra' => ['コーヒー']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 공원 · 집', 3,
                pictures: [['ko' => '공원', 'img' => 'park'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '나는 보았다'], ['ko' => '이미']],
                phrases: [
                    'a' => [
                        'words' => ['공원을', '보았다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I saw the park', 'correct' => ['I saw', 'the', 'park'], 'extra' => ['already']],
                            'es' => ['sentence' => 'Vi el parque', 'correct' => ['vi', 'el', 'parque'], 'extra' => ['ya', 'casa']],
                            'de' => ['sentence' => 'Ich sah den Park', 'correct' => ['ich sah', 'den', 'Park'], 'extra' => ['schon', 'Haus']],
                            'fr' => ['sentence' => 'J\'ai vu le parc', 'correct' => ['j\'ai vu', 'le', 'parc'], 'extra' => ['déjà', 'maison']],
                            'ja' => ['sentence' => '公園を見た', 'correct' => ['公園', 'を', '見た'], 'extra' => ['もう']],
                        ],
                    ],
                    'b' => [
                        'words' => ['이미', '여기에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'already here', 'correct' => ['already', 'here'], 'extra' => ['I saw']],
                            'es' => ['sentence' => 'Ya aquí', 'correct' => ['ya', 'aquí'], 'extra' => ['vi', 'parque']],
                            'de' => ['sentence' => 'Schon hier', 'correct' => ['schon', 'hier'], 'extra' => ['ich sah', 'Park']],
                            'fr' => ['sentence' => 'Déjà ici', 'correct' => ['déjà', 'ici'], 'extra' => ['j\'ai vu', 'parc']],
                            'ja' => ['sentence' => 'もうここに', 'correct' => ['もう', 'ここ', 'に'], 'extra' => ['私は見た']],
                        ],
                    ],
                    'c' => [
                        'words' => ['이미', '집을', '보았다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I saw the house already', 'correct' => ['I saw', 'the', 'house', 'already'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Ya vi la casa', 'correct' => ['ya', 'vi', 'la', 'casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich sah das Haus schon', 'correct' => ['ich sah', 'das', 'Haus', 'schon'], 'extra' => ['Park']],
                            'fr' => ['sentence' => 'J\'ai déjà vu la maison', 'correct' => ['j\'ai vu', 'la', 'maison', 'déjà'], 'extra' => ['parc']],
                            'ja' => ['sentence' => 'もう家を見た', 'correct' => ['もう', '家', 'を', '見た'], 'extra' => ['公園']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 학교 · 가게', 4,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '가게', 'img' => 'shop']],
                plain: [['ko' => '였습니다'], ['ko' => '그러면']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '학교에', '있었다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I was in the school', 'correct' => ['I was', 'in', 'the', 'school'], 'extra' => ['then']],
                            'es' => ['sentence' => 'Estaba en la escuela', 'correct' => ['estaba', 'en', 'la', 'escuela'], 'extra' => ['entonces', 'tienda']],
                            'de' => ['sentence' => 'Ich war in der Schule', 'correct' => ['ich war', 'in', 'der', 'Schule'], 'extra' => ['dann', 'Geschäft']],
                            'fr' => ['sentence' => 'J\'étais à l\'école', 'correct' => ['j\'étais', 'dans', 'le', 'école'], 'extra' => ['ensuite', 'magasin']],
                            'ja' => ['sentence' => '私は学校にいた', 'correct' => ['私', 'は', '学校', 'に', 'いた'], 'extra' => ['それから']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그러면', '가게'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'then the shop', 'correct' => ['then', 'the', 'shop'], 'extra' => ['I was']],
                            'es' => ['sentence' => 'Entonces la tienda', 'correct' => ['entonces', 'la', 'tienda'], 'extra' => ['estaba', 'escuela']],
                            'de' => ['sentence' => 'Dann das Geschäft', 'correct' => ['dann', 'das', 'Geschäft'], 'extra' => ['ich war', 'Schule']],
                            'fr' => ['sentence' => 'Ensuite le magasin', 'correct' => ['ensuite', 'le', 'magasin'], 'extra' => ['j\'étais', 'école']],
                            'ja' => ['sentence' => 'それから店', 'correct' => ['それから', '店'], 'extra' => ['でした']],
                        ],
                    ],
                    'c' => [
                        'words' => ['그때', '저는', '여기', '있었다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I was here then', 'correct' => ['I was', 'here', 'then'], 'extra' => ['shop']],
                            'es' => ['sentence' => 'Estaba aquí entonces', 'correct' => ['estaba', 'aquí', 'entonces'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Ich war dann hier', 'correct' => ['ich war', 'dann', 'hier'], 'extra' => ['Geschäft']],
                            'fr' => ['sentence' => 'J\'étais ici ensuite', 'correct' => ['j\'étais', 'ici', 'ensuite'], 'extra' => ['magasin']],
                            'ja' => ['sentence' => 'その時私はここにいた', 'correct' => ['その時', '私', 'は', 'ここ', 'に', 'いた'], 'extra' => ['店']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 집', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '어제'], ['ko' => '좋은']],
                phrases: [
                    'a' => [
                        'words' => ['어제는', '좋았다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'yesterday it was good', 'correct' => ['yesterday', 'it was', 'good'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Ayer fue bueno', 'correct' => ['ayer', 'fue', 'bueno'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Gestern war es gut', 'correct' => ['gestern', 'es war', 'gut'], 'extra' => ['Freund', 'Haus']],
                            'fr' => ['sentence' => 'Hier c\'était bon', 'correct' => ['hier', 'c\'était', 'bon'], 'extra' => ['ami', 'maison']],
                            'ja' => ['sentence' => '昨日は良かった', 'correct' => ['昨日', 'は', '良かった'], 'extra' => ['友達']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '친구는', '좋습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is good', 'correct' => ['my', 'friend', 'is', 'good'], 'extra' => ['yesterday']],
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['ayer', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['gestern', 'Haus']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '私の友達は良い', 'correct' => ['私の', '友達', 'は', '良い'], 'extra' => ['昨日']],
                        ],
                    ],
                    'c' => [
                        'words' => ['좋은', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a good house', 'correct' => ['a', 'good', 'house'], 'extra' => ['yesterday']],
                            'es' => ['sentence' => 'Una casa buena', 'correct' => ['una', 'bueno', 'casa'], 'extra' => ['ayer', 'amigo']],
                            'de' => ['sentence' => 'Ein gutes Haus', 'correct' => ['ein', 'gut', 'Haus'], 'extra' => ['gestern', 'Freund']],
                            'fr' => ['sentence' => 'Une bonne maison', 'correct' => ['une', 'maison', 'bon'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '良い家', 'correct' => ['良い', '家'], 'extra' => ['昨日']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
