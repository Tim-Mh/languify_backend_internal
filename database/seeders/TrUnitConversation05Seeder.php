<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Ekmek' => 'bread', 'Elma' => 'apple', 'Kahve' => 'coffee',
        'Su' => 'water', 'Park' => 'park', 'Ev' => 'house',
        'Okul' => 'school', 'Arkadaş' => 'friend',
    ];

    /**
     * Turkish Conversation Unit 5 — talking about the past.
     *
     * THE RULE THIS UNIT TEACHES: THE PAST IS A SUFFIX, AND IT HARMONISES.
     *
     * Turkish marks the past with -dı/-di/-du/-dü, and which one you get is
     * decided by the last vowel of the stem, not by choice:
     *
     *     ye- + -di + -m   ->  yedim     I ate
     *     iç- + -ti + -m   ->  içtim     I drank    (voiceless ç hardens d to t)
     *     gör- + -dü + -m  ->  gördüm    I saw      (rounded ö pulls ü)
     *
     * All three mean "I <verb>ed" and none of them is a separate word, so each
     * is one tile with its own dictionary entry. A learner is never asked to
     * assemble a stem and a suffix, because choosing between dı/di/du/dü is a
     * later lesson than this one.
     *
     * "I was" works the same way but attaches to a PLACE, not a verb:
     * `okuldaydım` is okul + -da (in) + -ydı (was) + -m (I). Again one tile.
     *
     * The direct object also takes a suffix once it is definite: `parkı`
     * gördüm, `evi` gördüm. Bare `park` would be "a park", so the accusative
     * is what makes it "the park". That contrast is why lesson 3 uses `parkı`
     * and `evi` rather than the bare nouns the picture steps show.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Talking About the Past', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Yesterday & I Ate', 1,
                pictures: [['tr' => 'Ekmek', 'img' => 'bread'], ['tr' => 'Elma', 'img' => 'apple']],
                plain: [['tr' => 'Dün'], ['tr' => 'Yedim']],
                phrases: [
                    'a' => [
                        // Verb last, as always in Turkish.
                        'words' => ['dün', 'ekmek', 'yedim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Yesterday I ate bread', 'correct' => ['yesterday', 'I ate', 'bread'], 'extra' => ['apple']],
                            'fr' => ['sentence' => "Hier j'ai mangé du pain", 'correct' => ['hier', "j'ai mangé", 'pain'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Ayer comí pan', 'correct' => ['ayer', 'comí', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Gestern aß ich Brot', 'correct' => ['gestern', 'ich aß', 'Brot'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '昨日パンを食べました', 'correct' => ['昨日', 'パン', 'を', '食べました'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '어제 빵을 먹었습니다', 'correct' => ['어제', '빵을', '먹었습니다'], 'extra' => ['사과']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'elma', 'yedim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I ate an apple', 'correct' => ['I ate', 'an', 'apple'], 'extra' => ['bread', 'yesterday']],
                            'fr' => ['sentence' => "J'ai mangé une pomme", 'correct' => ["j'ai mangé", 'une', 'pomme'], 'extra' => ['pain', 'hier']],
                            'es' => ['sentence' => 'Comí una manzana', 'correct' => ['comí', 'una', 'manzana'], 'extra' => ['pan', 'ayer']],
                            'de' => ['sentence' => 'Ich aß einen Apfel', 'correct' => ['ich aß', 'einen', 'Apfel'], 'extra' => ['Brot', 'gestern']],
                            'ja' => ['sentence' => 'りんごを食べました', 'correct' => ['りんご', 'を', '食べました'], 'extra' => ['パン', '昨日']],
                            'ko' => ['sentence' => '사과를 먹었습니다', 'correct' => ['사과를', '먹었습니다'], 'extra' => ['빵', '어제']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ekmek', 've', 'elma'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Bread and an apple', 'correct' => ['bread', 'and', 'an', 'apple'], 'extra' => ['yesterday']],
                            'fr' => ['sentence' => 'Du pain et une pomme', 'correct' => ['pain', 'et', 'une', 'pomme'], 'extra' => ['hier']],
                            'es' => ['sentence' => 'Pan y una manzana', 'correct' => ['pan', 'y', 'una', 'manzana'], 'extra' => ['ayer']],
                            'de' => ['sentence' => 'Brot und ein Apfel', 'correct' => ['Brot', 'und', 'ein', 'Apfel'], 'extra' => ['gestern']],
                            'ja' => ['sentence' => 'パンとりんご', 'correct' => ['パン', 'と', 'りんご'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '빵과 사과', 'correct' => ['빵과', '사과'], 'extra' => ['어제']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Drank & It Was', 2,
                pictures: [['tr' => 'Kahve', 'img' => 'coffee'], ['tr' => 'Su', 'img' => 'water']],
                plain: [['tr' => 'İçtim'], ['tr' => 'İyiydi']],
                phrases: [
                    'a' => [
                        // iç- ends voiceless, so the suffix hardens: -ti, not -di.
                        'words' => ['kahve', 'içtim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I drank coffee', 'correct' => ['I drank', 'coffee'], 'extra' => ['water', 'it was']],
                            'fr' => ['sentence' => "J'ai bu du café", 'correct' => ["j'ai bu", 'café'], 'extra' => ['eau', "c'était"]],
                            'es' => ['sentence' => 'Bebí café', 'correct' => ['bebí', 'café'], 'extra' => ['agua', 'fue']],
                            'de' => ['sentence' => 'Ich trank Kaffee', 'correct' => ['ich trank', 'Kaffee'], 'extra' => ['Wasser', 'es war']],
                            'ja' => ['sentence' => 'コーヒーを飲みました', 'correct' => ['コーヒー', 'を', '飲みました'], 'extra' => ['水', 'でした']],
                            'ko' => ['sentence' => '커피를 마셨습니다', 'correct' => ['커피를', '마셨습니다'], 'extra' => ['물', '였습니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['o', 'iyiydi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'It was good', 'correct' => ['it was', 'good'], 'extra' => ['I drank', 'water']],
                            'fr' => ['sentence' => "C'était bon", 'correct' => ["c'était", 'bon'], 'extra' => ["j'ai bu", 'eau']],
                            'es' => ['sentence' => 'Fue bueno', 'correct' => ['fue', 'bueno'], 'extra' => ['bebí', 'agua']],
                            'de' => ['sentence' => 'Es war gut', 'correct' => ['es war', 'gut'], 'extra' => ['ich trank', 'Wasser']],
                            'ja' => ['sentence' => '良かったです', 'correct' => ['良かった', 'です'], 'extra' => ['飲みました', '水']],
                            'ko' => ['sentence' => '좋았습니다', 'correct' => ['좋았습니다'], 'extra' => ['마셨습니다', '물']],
                        ],
                    ],
                    'c' => [
                        'words' => ['su', 'içtim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I drank water', 'correct' => ['I drank', 'water'], 'extra' => ['coffee', 'it was']],
                            'fr' => ['sentence' => "J'ai bu de l'eau", 'correct' => ["j'ai bu", 'eau'], 'extra' => ['café', "c'était"]],
                            'es' => ['sentence' => 'Bebí agua', 'correct' => ['bebí', 'agua'], 'extra' => ['café', 'fue']],
                            'de' => ['sentence' => 'Ich trank Wasser', 'correct' => ['ich trank', 'Wasser'], 'extra' => ['Kaffee', 'es war']],
                            'ja' => ['sentence' => '水を飲みました', 'correct' => ['水', 'を', '飲みました'], 'extra' => ['コーヒー', 'でした']],
                            'ko' => ['sentence' => '물을 마셨습니다', 'correct' => ['물을', '마셨습니다'], 'extra' => ['커피', '였습니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: I Saw & Already', 3,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Gördüm'], ['tr' => 'Zaten']],
                phrases: [
                    'a' => [
                        // parkı, not park: the accusative is what makes it "the".
                        'words' => ['parkı', 'gördüm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I saw the park', 'correct' => ['I saw', 'the', 'park'], 'extra' => ['already', 'house']],
                            'fr' => ['sentence' => "J'ai vu le parc", 'correct' => ["j'ai vu", 'le', 'parc'], 'extra' => ['déjà', 'maison']],
                            'es' => ['sentence' => 'Vi el parque', 'correct' => ['vi', 'el', 'parque'], 'extra' => ['ya', 'casa']],
                            'de' => ['sentence' => 'Ich sah den Park', 'correct' => ['ich sah', 'den', 'Park'], 'extra' => ['schon', 'Haus']],
                            'ja' => ['sentence' => '公園を見ました', 'correct' => ['公園', 'を', '見ました'], 'extra' => ['もう', '家']],
                            'ko' => ['sentence' => '공원을 보았습니다', 'correct' => ['공원을', '보았습니다'], 'extra' => ['이미', '집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['zaten', 'burada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Already here', 'correct' => ['already', 'here'], 'extra' => ['I saw', 'park']],
                            'fr' => ['sentence' => 'Déjà ici', 'correct' => ['déjà', 'ici'], 'extra' => ["j'ai vu", 'parc']],
                            'es' => ['sentence' => 'Ya aquí', 'correct' => ['ya', 'aquí'], 'extra' => ['vi', 'parque']],
                            'de' => ['sentence' => 'Schon hier', 'correct' => ['schon', 'hier'], 'extra' => ['ich sah', 'Park']],
                            'ja' => ['sentence' => 'もうここに', 'correct' => ['もう', 'ここ', 'に'], 'extra' => ['見ました', '公園']],
                            'ko' => ['sentence' => '이미 여기에', 'correct' => ['이미', '여기에'], 'extra' => ['보았습니다', '공원']],
                        ],
                    ],
                    'c' => [
                        'words' => ['evi', 'zaten', 'gördüm'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I saw the house already', 'correct' => ['I saw', 'the', 'house', 'already'], 'extra' => ['park']],
                            'fr' => ['sentence' => "J'ai déjà vu la maison", 'correct' => ["j'ai vu", 'la', 'maison', 'déjà'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ya vi la casa', 'correct' => ['vi', 'la', 'casa', 'ya'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich sah das Haus schon', 'correct' => ['ich sah', 'das', 'Haus', 'schon'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '家をもう見ました', 'correct' => ['家', 'を', 'もう', '見ました'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '집을 이미 보았습니다', 'correct' => ['집을', '이미', '보았습니다'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: I Was & Then', 4,
                pictures: [['tr' => 'Okul', 'img' => 'school'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Okuldaydım'], ['tr' => 'Sonra']],
                phrases: [
                    'a' => [
                        // okul + -da (in) + -ydı (was) + -m (I), all one tile.
                        'words' => ['ben', 'okuldaydım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I was in the school', 'correct' => ['I was', 'in', 'the', 'school'], 'extra' => ['then', 'shop']],
                            'fr' => ['sentence' => "J'étais à l'école", 'correct' => ["j'étais", 'à', "l'école"], 'extra' => ['ensuite', 'magasin']],
                            'es' => ['sentence' => 'Estaba en la escuela', 'correct' => ['estaba', 'en', 'la', 'escuela'], 'extra' => ['entonces', 'tienda']],
                            'de' => ['sentence' => 'Ich war in der Schule', 'correct' => ['ich war', 'in', 'der', 'Schule'], 'extra' => ['dann', 'Geschäft']],
                            'ja' => ['sentence' => '私は学校にいました', 'correct' => ['私', 'は', '学校', 'に', 'いました'], 'extra' => ['それから', '店']],
                            'ko' => ['sentence' => '저는 학교에 있었습니다', 'correct' => ['저는', '학교에', '있었습니다'], 'extra' => ['그러면', '가게']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sonra', 'dükkan'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Then the shop', 'correct' => ['then', 'the', 'shop'], 'extra' => ['I was', 'school']],
                            'fr' => ['sentence' => 'Ensuite le magasin', 'correct' => ['ensuite', 'le', 'magasin'], 'extra' => ["j'étais", 'école']],
                            'es' => ['sentence' => 'Entonces la tienda', 'correct' => ['entonces', 'la', 'tienda'], 'extra' => ['estaba', 'escuela']],
                            'de' => ['sentence' => 'Dann das Geschäft', 'correct' => ['dann', 'das', 'Geschäft'], 'extra' => ['ich war', 'Schule']],
                            'ja' => ['sentence' => 'それから店', 'correct' => ['それから', '店'], 'extra' => ['いました', '学校']],
                            'ko' => ['sentence' => '그러면 가게', 'correct' => ['그러면', '가게'], 'extra' => ['있었습니다', '학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sonra', 'buradaydım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I was here then', 'correct' => ['I was', 'here', 'then'], 'extra' => ['shop']],
                            'fr' => ['sentence' => "J'étais ici ensuite", 'correct' => ["j'étais", 'ici', 'ensuite'], 'extra' => ['magasin']],
                            'es' => ['sentence' => 'Estaba aquí entonces', 'correct' => ['estaba', 'aquí', 'entonces'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Ich war dann hier', 'correct' => ['ich war', 'hier', 'dann'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => 'それから私はここにいました', 'correct' => ['それから', '私', 'は', 'ここ', 'に', 'いました'], 'extra' => ['店']],
                            'ko' => ['sentence' => '그러면 저는 여기에 있었습니다', 'correct' => ['그러면', '저는', '여기에', '있었습니다'], 'extra' => ['가게']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Yesterday & Good', 5,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Dün'], ['tr' => 'İyi']],
                phrases: [
                    'a' => [
                        'words' => ['dün', 'iyiydi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Yesterday it was good', 'correct' => ['yesterday', 'it was', 'good'], 'extra' => ['friend', 'house']],
                            'fr' => ['sentence' => "Hier c'était bon", 'correct' => ['hier', "c'était", 'bon'], 'extra' => ['ami', 'maison']],
                            'es' => ['sentence' => 'Ayer fue bueno', 'correct' => ['ayer', 'fue', 'bueno'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Gestern war es gut', 'correct' => ['gestern', 'es war', 'gut'], 'extra' => ['Freund', 'Haus']],
                            'ja' => ['sentence' => '昨日は良かったです', 'correct' => ['昨日', 'は', '良かった', 'です'], 'extra' => ['友達', '家']],
                            'ko' => ['sentence' => '어제 좋았습니다', 'correct' => ['어제', '좋았습니다'], 'extra' => ['친구', '집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['arkadaşım', 'iyi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My friend is good', 'correct' => ['my', 'friend', 'is', 'good'], 'extra' => ['yesterday', 'house']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['hier', 'maison']],
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['ayer', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['gestern', 'Haus']],
                            'ja' => ['sentence' => '私の友達は良いです', 'correct' => ['私の', '友達', 'は', '良い', 'です'], 'extra' => ['昨日', '家']],
                            'ko' => ['sentence' => '제 친구는 좋습니다', 'correct' => ['제', '친구는', '좋습니다'], 'extra' => ['어제', '집']],
                        ],
                    ],
                    'c' => [
                        // Adjective before the noun, and bir sits between them.
                        'words' => ['iyi', 'bir', 'ev'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A good house', 'correct' => ['a', 'good', 'house'], 'extra' => ['yesterday', 'friend']],
                            'fr' => ['sentence' => 'Une bonne maison', 'correct' => ['une', 'bonne', 'maison'], 'extra' => ['hier', 'ami']],
                            'es' => ['sentence' => 'Una casa buena', 'correct' => ['una', 'casa', 'buena'], 'extra' => ['ayer', 'amigo']],
                            'de' => ['sentence' => 'Ein gutes Haus', 'correct' => ['ein', 'gutes', 'Haus'], 'extra' => ['gestern', 'Freund']],
                            'ja' => ['sentence' => '良い家', 'correct' => ['良い', '家'], 'extra' => ['昨日', '友達']],
                            'ko' => ['sentence' => '좋은 집', 'correct' => ['좋은', '집'], 'extra' => ['어제', '친구']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
