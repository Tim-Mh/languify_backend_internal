<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'Bread' => 'bread', 'Apple' => 'apple', 'Coffee' => 'coffee', 'Water' => 'water',
        'Park' => 'park', 'House' => 'house', 'School' => 'school', 'Shop' => 'shop',
        'Friend' => 'friend',
    ];

    /**
     * English Chapter 2, Unit 5 — talking about the past.
     *
     * The first irregular past forms (I ate, I drank, I saw, I was, it was)
     * come in one at a time, always attached to a familiar noun so only the
     * verb form is new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Talking About The Past', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Yesterday I Ate', 1,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'Yesterday'], ['en' => 'I ate']],
                phrases: [
                    'a' => [
                        'words' => ['yesterday', 'I ate', 'bread'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ayer comí pan', 'correct' => ['ayer', 'comí', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Gestern aß ich Brot', 'correct' => ['gestern', 'ich aß', 'Brot'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '昨日パンを食べた', 'correct' => ['昨日', 'パン', 'を', '食べた'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '어제 빵을 먹었다', 'correct' => ['어제', '빵을', '먹었다'], 'extra' => ['사과']],
                            'fr' => ['sentence' => "Hier j'ai mangé du pain", 'correct' => ['hier', "j'ai mangé", 'pain'], 'extra' => ['pomme']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I ate', 'an', 'apple'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Comí una manzana', 'correct' => ['comí', 'una', 'manzana'], 'extra' => ['pan', 'ayer']],
                            'de' => ['sentence' => 'Ich aß einen Apfel', 'correct' => ['ich aß', 'einen', 'Apfel'], 'extra' => ['Brot', 'gestern']],
                            'ja' => ['sentence' => 'りんごを食べた', 'correct' => ['りんご', 'を', '食べた'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹었다', 'correct' => ['사과를', '먹었다'], 'extra' => ['빵']],
                            'fr' => ['sentence' => "J'ai mangé une pomme", 'correct' => ["j'ai mangé", 'une', 'pomme'], 'extra' => ['pain']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bread', 'and', 'an', 'apple'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Pan y una manzana', 'correct' => ['pan', 'y', 'una', 'manzana'], 'extra' => ['ayer']],
                            'de' => ['sentence' => 'Brot und ein Apfel', 'correct' => ['Brot', 'und', 'ein', 'Apfel'], 'extra' => ['gestern']],
                            'ja' => ['sentence' => 'パンとりんご', 'correct' => ['パン', 'と', 'りんご'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '빵과 사과', 'correct' => ['빵과', '사과'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Du pain et une pomme', 'correct' => ['pain', 'et', 'une', 'pomme'], 'extra' => ['hier']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Drank & It Was', 2,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Water', 'img' => 'water']],
                plain: [['en' => 'I drank'], ['en' => 'It was']],
                phrases: [
                    'a' => [
                        'words' => ['I drank', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Bebí café', 'correct' => ['bebí', 'café'], 'extra' => ['agua', 'fue']],
                            'de' => ['sentence' => 'Ich trank Kaffee', 'correct' => ['ich trank', 'Kaffee'], 'extra' => ['Wasser', 'es war']],
                            'ja' => ['sentence' => 'コーヒーを飲んだ', 'correct' => ['コーヒー', 'を', '飲んだ'], 'extra' => ['水']],
                            'ko' => ['sentence' => '커피를 마셨다', 'correct' => ['커피를', '마셨다'], 'extra' => ['물']],
                            'fr' => ['sentence' => "J'ai bu du café", 'correct' => ["j'ai bu", 'café'], 'extra' => ['eau', "c'était"]],
                        ],
                    ],
                    'b' => [
                        'words' => ['it was', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Fue bueno', 'correct' => ['fue', 'bueno'], 'extra' => ['bebí', 'agua']],
                            'de' => ['sentence' => 'Es war gut', 'correct' => ['es war', 'gut'], 'extra' => ['ich trank', 'Wasser']],
                            'ja' => ['sentence' => 'それは良かった', 'correct' => ['それ', 'は', '良かった'], 'extra' => ['私は飲んだ']],
                            'ko' => ['sentence' => '그것은 좋았다', 'correct' => ['그것은', '좋았다'], 'extra' => ['나는 마셨다']],
                            'fr' => ['sentence' => "C'était bon", 'correct' => ["c'était", 'bon'], 'extra' => ["j'ai bu", 'eau']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I drank', 'water'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Bebí agua', 'correct' => ['bebí', 'agua'], 'extra' => ['café', 'fue']],
                            'de' => ['sentence' => 'Ich trank Wasser', 'correct' => ['ich trank', 'Wasser'], 'extra' => ['Kaffee', 'es war']],
                            'ja' => ['sentence' => '水を飲んだ', 'correct' => ['水', 'を', '飲んだ'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '물을 마셨다', 'correct' => ['물을', '마셨다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => "J'ai bu de l'eau", 'correct' => ["j'ai bu", 'eau'], 'extra' => ['café']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: I Saw & Already', 3,
                pictures: [['en' => 'Park', 'img' => 'park'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'I saw'], ['en' => 'Already']],
                phrases: [
                    'a' => [
                        'words' => ['I saw', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Vi el parque', 'correct' => ['vi', 'el', 'parque'], 'extra' => ['ya', 'casa']],
                            'de' => ['sentence' => 'Ich sah den Park', 'correct' => ['ich sah', 'den', 'Park'], 'extra' => ['schon', 'Haus']],
                            'ja' => ['sentence' => '公園を見た', 'correct' => ['公園', 'を', '見た'], 'extra' => ['もう']],
                            'ko' => ['sentence' => '공원을 보았다', 'correct' => ['공원을', '보았다'], 'extra' => ['이미']],
                            'fr' => ['sentence' => "J'ai vu le parc", 'correct' => ["j'ai vu", 'le', 'parc'], 'extra' => ['déjà', 'maison']],
                        ],
                    ],
                    'b' => [
                        'words' => ['already', 'here'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ya aquí', 'correct' => ['ya', 'aquí'], 'extra' => ['vi', 'parque']],
                            'de' => ['sentence' => 'Schon hier', 'correct' => ['schon', 'hier'], 'extra' => ['ich sah', 'Park']],
                            'ja' => ['sentence' => 'もうここに', 'correct' => ['もう', 'ここ', 'に'], 'extra' => ['私は見た']],
                            'ko' => ['sentence' => '이미 여기에', 'correct' => ['이미', '여기에'], 'extra' => ['나는 보았다']],
                            'fr' => ['sentence' => 'Déjà ici', 'correct' => ['déjà', 'ici'], 'extra' => ["j'ai vu", 'parc']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I saw', 'the', 'house', 'already'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Ya vi la casa', 'correct' => ['ya', 'vi', 'la', 'casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich sah das Haus schon', 'correct' => ['ich sah', 'das', 'Haus', 'schon'], 'extra' => ['Park']],
                            'ja' => ['sentence' => 'もう家を見た', 'correct' => ['もう', '家', 'を', '見た'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '이미 집을 보았다', 'correct' => ['이미', '집을', '보았다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => "J'ai déjà vu la maison", 'correct' => ["j'ai vu", 'la', 'maison', 'déjà'], 'extra' => ['parc']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: I Was & Then', 4,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Shop', 'img' => 'shop']],
                plain: [['en' => 'I was'], ['en' => 'Then']],
                phrases: [
                    'a' => [
                        'words' => ['I was', 'in', 'the', 'school'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Estaba en la escuela', 'correct' => ['estaba', 'en', 'la', 'escuela'], 'extra' => ['entonces', 'tienda']],
                            'de' => ['sentence' => 'Ich war in der Schule', 'correct' => ['ich war', 'in', 'der', 'Schule'], 'extra' => ['dann', 'Geschäft']],
                            'ja' => ['sentence' => '私は学校にいた', 'correct' => ['私', 'は', '学校', 'に', 'いた'], 'extra' => ['それから']],
                            'ko' => ['sentence' => '나는 학교에 있었다', 'correct' => ['나는', '학교에', '있었다'], 'extra' => ['그러면']],
                            'fr' => ['sentence' => "J'étais à l'école", 'correct' => ["j'étais", 'dans', 'le', 'école'], 'extra' => ['ensuite', 'magasin']],
                        ],
                    ],
                    'b' => [
                        'words' => ['then', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Entonces la tienda', 'correct' => ['entonces', 'la', 'tienda'], 'extra' => ['estaba', 'escuela']],
                            'de' => ['sentence' => 'Dann das Geschäft', 'correct' => ['dann', 'das', 'Geschäft'], 'extra' => ['ich war', 'Schule']],
                            'ja' => ['sentence' => 'それから店', 'correct' => ['それから', '店'], 'extra' => ['でした']],
                            'ko' => ['sentence' => '그러면 가게', 'correct' => ['그러면', '가게'], 'extra' => ['였습니다']],
                            'fr' => ['sentence' => 'Ensuite le magasin', 'correct' => ['ensuite', 'le', 'magasin'], 'extra' => ["j'étais", 'école']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I was', 'here', 'then'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Estaba aquí entonces', 'correct' => ['estaba', 'aquí', 'entonces'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Ich war dann hier', 'correct' => ['ich war', 'dann', 'hier'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => 'その時私はここにいた', 'correct' => ['その時', '私', 'は', 'ここ', 'に', 'いた'], 'extra' => ['店']],
                            'ko' => ['sentence' => '그때 나는 여기 있었다', 'correct' => ['그때', '나는', '여기', '있었다'], 'extra' => ['가게']],
                            'fr' => ['sentence' => "J'étais ici ensuite", 'correct' => ["j'étais", 'ici', 'ensuite'], 'extra' => ['magasin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Yesterday Was Good', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Yesterday'], ['en' => 'Good']],
                phrases: [
                    'a' => [
                        'words' => ['yesterday', 'it was', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ayer fue bueno', 'correct' => ['ayer', 'fue', 'bueno'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Gestern war es gut', 'correct' => ['gestern', 'es war', 'gut'], 'extra' => ['Freund', 'Haus']],
                            'ja' => ['sentence' => '昨日は良かった', 'correct' => ['昨日', 'は', '良かった'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '어제는 좋았다', 'correct' => ['어제는', '좋았다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => "Hier c'était bon", 'correct' => ['hier', "c'était", 'bon'], 'extra' => ['ami', 'maison']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'is', 'good'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['ayer', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['gestern', 'Haus']],
                            'ja' => ['sentence' => '私の友達は良い', 'correct' => ['私の', '友達', 'は', '良い'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '나의 친구는 좋다', 'correct' => ['나의', '친구는', '좋다'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['hier']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'good', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa buena', 'correct' => ['una', 'bueno', 'casa'], 'extra' => ['ayer', 'amigo']],
                            'de' => ['sentence' => 'Ein gutes Haus', 'correct' => ['ein', 'gut', 'Haus'], 'extra' => ['gestern', 'Freund']],
                            'ja' => ['sentence' => '良い家', 'correct' => ['良い', '家'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '좋은 집', 'correct' => ['좋은', '집'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Une bonne maison', 'correct' => ['une', 'maison', 'bon'], 'extra' => ['hier']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
