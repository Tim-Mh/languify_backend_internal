<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'パン' => 'bread',
        'りんご' => 'apple',
        'コーヒー' => 'coffee',
        '水' => 'water',
        '公園' => 'park',
        '家' => 'house',
        '学校' => 'school',
        '店' => 'shop',
        '友達' => 'friend',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 5, the Japanese twin of the
     * English "Unit 5: Talking About The Past" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'ユニット5: 過去を話す', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: パン・りんご', 1,
                pictures: [
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => '昨日',
                    ],
                    [
                        'ja' => '私は食べた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '昨日',
                            'パン',
                            'を',
                            '食べた',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'yesterday I ate bread',
                                'correct' => [
                                    'yesterday',
                                    'I ate',
                                    'bread',
                                ],
                                'extra' => [
                                    'apple',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Ayer comí pan',
                                'correct' => [
                                    'ayer',
                                    'comí',
                                    'pan',
                                ],
                                'extra' => [
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Gestern aß ich Brot',
                                'correct' => [
                                    'gestern',
                                    'ich aß',
                                    'Brot',
                                ],
                                'extra' => [
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Hier j\'ai mangé du pain',
                                'correct' => [
                                    'hier',
                                    'j\'ai mangé',
                                    'pain',
                                ],
                                'extra' => [
                                    'pomme',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어제 빵을 먹었다',
                                'correct' => [
                                    '어제',
                                    '빵을',
                                    '먹었다',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
                            'を',
                            '食べた',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I ate an apple',
                                'correct' => [
                                    'I ate',
                                    'an',
                                    'apple',
                                ],
                                'extra' => [
                                    'bread',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comí una manzana',
                                'correct' => [
                                    'comí',
                                    'una',
                                    'manzana',
                                ],
                                'extra' => [
                                    'pan',
                                    'ayer',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich aß einen Apfel',
                                'correct' => [
                                    'ich aß',
                                    'einen',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'Brot',
                                    'gestern',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai mangé une pomme',
                                'correct' => [
                                    'j\'ai mangé',
                                    'une',
                                    'pomme',
                                ],
                                'extra' => [
                                    'pain',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과를 먹었다',
                                'correct' => [
                                    '사과를',
                                    '먹었다',
                                ],
                                'extra' => [
                                    '빵',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'パン',
                            'と',
                            'りんご',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bread and an apple',
                                'correct' => [
                                    'bread',
                                    'and',
                                    'an',
                                    'apple',
                                ],
                                'extra' => [
                                    'yesterday',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pan y una manzana',
                                'correct' => [
                                    'pan',
                                    'y',
                                    'una',
                                    'manzana',
                                ],
                                'extra' => [
                                    'ayer',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Brot und ein Apfel',
                                'correct' => [
                                    'Brot',
                                    'und',
                                    'ein',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'gestern',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain et une pomme',
                                'correct' => [
                                    'pain',
                                    'et',
                                    'une',
                                    'pomme',
                                ],
                                'extra' => [
                                    'hier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵과 사과',
                                'correct' => [
                                    '빵과',
                                    '사과',
                                ],
                                'extra' => [
                                    '어제',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: コーヒー・水', 2,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => '水',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は飲んだ',
                    ],
                    [
                        'ja' => 'でした',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'コーヒー',
                            'を',
                            '飲んだ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I drank coffee',
                                'correct' => [
                                    'I drank',
                                    'coffee',
                                ],
                                'extra' => [
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Bebí café',
                                'correct' => [
                                    'bebí',
                                    'café',
                                ],
                                'extra' => [
                                    'agua',
                                    'fue',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich trank Kaffee',
                                'correct' => [
                                    'ich trank',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'Wasser',
                                    'es war',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai bu du café',
                                'correct' => [
                                    'j\'ai bu',
                                    'café',
                                ],
                                'extra' => [
                                    'eau',
                                    'c\'était',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피를 마셨다',
                                'correct' => [
                                    '커피를',
                                    '마셨다',
                                ],
                                'extra' => [
                                    '물',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '良かった',
                            'です',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'it was good',
                                'correct' => [
                                    'it was',
                                    'good',
                                ],
                                'extra' => [
                                    'I drank',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Fue bueno',
                                'correct' => [
                                    'fue',
                                    'bueno',
                                ],
                                'extra' => [
                                    'bebí',
                                    'agua',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Es war gut',
                                'correct' => [
                                    'es war',
                                    'gut',
                                ],
                                'extra' => [
                                    'ich trank',
                                    'Wasser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'C\'était bon',
                                'correct' => [
                                    'c\'était',
                                    'bon',
                                ],
                                'extra' => [
                                    'j\'ai bu',
                                    'eau',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그것은 좋았다',
                                'correct' => [
                                    '그것은',
                                    '좋았다',
                                ],
                                'extra' => [
                                    '나는 마셨다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '水',
                            'を',
                            '飲んだ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I drank water',
                                'correct' => [
                                    'I drank',
                                    'water',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Bebí agua',
                                'correct' => [
                                    'bebí',
                                    'agua',
                                ],
                                'extra' => [
                                    'café',
                                    'fue',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich trank Wasser',
                                'correct' => [
                                    'ich trank',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'Kaffee',
                                    'es war',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai bu de l\'eau',
                                'correct' => [
                                    'j\'ai bu',
                                    'eau',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물을 마셨다',
                                'correct' => [
                                    '물을',
                                    '마셨다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 公園・家', 3,
                pictures: [
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は見た',
                    ],
                    [
                        'ja' => 'もう',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '公園',
                            'を',
                            '見た',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I saw the park',
                                'correct' => [
                                    'I saw',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'already',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Vi el parque',
                                'correct' => [
                                    'vi',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'ya',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich sah den Park',
                                'correct' => [
                                    'ich sah',
                                    'den',
                                    'Park',
                                ],
                                'extra' => [
                                    'schon',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai vu le parc',
                                'correct' => [
                                    'j\'ai vu',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'déjà',
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원을 보았다',
                                'correct' => [
                                    '공원을',
                                    '보았다',
                                ],
                                'extra' => [
                                    '이미',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'もう',
                            'ここ',
                            'に',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'already here',
                                'correct' => [
                                    'already',
                                    'here',
                                ],
                                'extra' => [
                                    'I saw',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Ya aquí',
                                'correct' => [
                                    'ya',
                                    'aquí',
                                ],
                                'extra' => [
                                    'vi',
                                    'parque',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Schon hier',
                                'correct' => [
                                    'schon',
                                    'hier',
                                ],
                                'extra' => [
                                    'ich sah',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Déjà ici',
                                'correct' => [
                                    'déjà',
                                    'ici',
                                ],
                                'extra' => [
                                    'j\'ai vu',
                                    'parc',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이미 여기에',
                                'correct' => [
                                    '이미',
                                    '여기에',
                                ],
                                'extra' => [
                                    '나는 보았다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'もう',
                            '家',
                            'を',
                            '見た',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I saw the house already',
                                'correct' => [
                                    'I saw',
                                    'the',
                                    'house',
                                    'already',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Ya vi la casa',
                                'correct' => [
                                    'ya',
                                    'vi',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'parque',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich sah das Haus schon',
                                'correct' => [
                                    'ich sah',
                                    'das',
                                    'Haus',
                                    'schon',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai déjà vu la maison',
                                'correct' => [
                                    'j\'ai vu',
                                    'la',
                                    'maison',
                                    'déjà',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이미 집을 보았다',
                                'correct' => [
                                    '이미',
                                    '집을',
                                    '보았다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 学校・店', 4,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'でした',
                    ],
                    [
                        'ja' => 'それから',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '学校',
                            'に',
                            'いました',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I was in the school',
                                'correct' => [
                                    'I was',
                                    'in',
                                    'the',
                                    'school',
                                ],
                                'extra' => [
                                    'then',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Estaba en la escuela',
                                'correct' => [
                                    'estaba',
                                    'en',
                                    'la',
                                    'escuela',
                                ],
                                'extra' => [
                                    'entonces',
                                    'tienda',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich war in der Schule',
                                'correct' => [
                                    'ich war',
                                    'in',
                                    'der',
                                    'Schule',
                                ],
                                'extra' => [
                                    'dann',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'étais à l\'école',
                                'correct' => [
                                    'j\'étais',
                                    'dans',
                                    'le',
                                    'école',
                                ],
                                'extra' => [
                                    'ensuite',
                                    'magasin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 학교에 있었다',
                                'correct' => [
                                    '나는',
                                    '학교에',
                                    '있었다',
                                ],
                                'extra' => [
                                    '그러면',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'それから',
                            '店',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'then the shop',
                                'correct' => [
                                    'then',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'I was',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Entonces la tienda',
                                'correct' => [
                                    'entonces',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'estaba',
                                    'escuela',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Dann das Geschäft',
                                'correct' => [
                                    'dann',
                                    'das',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'ich war',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ensuite le magasin',
                                'correct' => [
                                    'ensuite',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'j\'étais',
                                    'école',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그러면 가게',
                                'correct' => [
                                    '그러면',
                                    '가게',
                                ],
                                'extra' => [
                                    '였습니다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私',
                            'は',
                            'その時',
                            'ここ',
                            'に',
                            'いました',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I was here then',
                                'correct' => [
                                    'I was',
                                    'here',
                                    'then',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Estaba aquí entonces',
                                'correct' => [
                                    'estaba',
                                    'aquí',
                                    'entonces',
                                ],
                                'extra' => [
                                    'tienda',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich war dann hier',
                                'correct' => [
                                    'ich war',
                                    'dann',
                                    'hier',
                                ],
                                'extra' => [
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'étais ici ensuite',
                                'correct' => [
                                    'j\'étais',
                                    'ici',
                                    'ensuite',
                                ],
                                'extra' => [
                                    'magasin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그때 나는 여기 있었다',
                                'correct' => [
                                    '그때',
                                    '나는',
                                    '여기',
                                    '있었다',
                                ],
                                'extra' => [
                                    '가게',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 友達・家', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '昨日',
                    ],
                    [
                        'ja' => '良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '昨日',
                            'は',
                            '良かった',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'yesterday it was good',
                                'correct' => [
                                    'yesterday',
                                    'it was',
                                    'good',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Ayer fue bueno',
                                'correct' => [
                                    'ayer',
                                    'fue',
                                    'bueno',
                                ],
                                'extra' => [
                                    'amigo',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Gestern war es gut',
                                'correct' => [
                                    'gestern',
                                    'es war',
                                    'gut',
                                ],
                                'extra' => [
                                    'Freund',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Hier c\'était bon',
                                'correct' => [
                                    'hier',
                                    'c\'était',
                                    'bon',
                                ],
                                'extra' => [
                                    'ami',
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어제는 좋았다',
                                'correct' => [
                                    '어제는',
                                    '좋았다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '友達',
                            'は',
                            '良い',
                            'です',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is good',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'yesterday',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo es bueno',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'ayer',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Freund ist gut',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'gestern',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est bon',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'hier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 좋다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '좋다',
                                ],
                                'extra' => [
                                    '어제',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '良い',
                            '家',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a good house',
                                'correct' => [
                                    'a',
                                    'good',
                                    'house',
                                ],
                                'extra' => [
                                    'yesterday',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una casa buena',
                                'correct' => [
                                    'una',
                                    'bueno',
                                    'casa',
                                ],
                                'extra' => [
                                    'ayer',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein gutes Haus',
                                'correct' => [
                                    'ein',
                                    'gut',
                                    'Haus',
                                ],
                                'extra' => [
                                    'gestern',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une bonne maison',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'bon',
                                ],
                                'extra' => [
                                    'hier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋은 집',
                                'correct' => [
                                    '좋은',
                                    '집',
                                ],
                                'extra' => [
                                    '어제',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
