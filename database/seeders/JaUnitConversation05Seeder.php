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
                            'az' => ['sentence' => 'dünən yedim çörək', 'correct' => ['dünən', 'yedim', 'çörək'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'أمس أكلت خبز', 'correct' => ['أمس', 'أكلت', 'خبز'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'вчера я ел хлеб', 'correct' => ['вчера', 'я', 'ел', 'хлеб'], 'extra' => ['яблоко']],
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
                                    'aß ich',
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
                            'tr' => ['sentence' => 'dün ekmek yedim', 'correct' => ['dün', 'ekmek', 'yedim'], 'extra' => ['elma']],
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
                            'az' => ['sentence' => 'yedim bir alma', 'correct' => ['yedim', 'bir', 'alma'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'أكلت تفاحة', 'correct' => ['أكلت', 'تفاحة'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'я ел яблоко', 'correct' => ['я', 'ел', 'яблоко'], 'extra' => ['хлеб']],
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
                            'tr' => ['sentence' => 'bir elma yedim', 'correct' => ['bir', 'elma', 'yedim'], 'extra' => ['ekmek']],
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
                            'az' => ['sentence' => 'çörək və bir alma', 'correct' => ['çörək', 'və', 'bir', 'alma'], 'extra' => ['dünən']],
                            'ar' => ['sentence' => 'خبز و تفاحة', 'correct' => ['خبز', 'و', 'تفاحة'], 'extra' => ['أمس']],
                            'ru' => ['sentence' => 'хлеб и яблоко', 'correct' => ['хлеб', 'и', 'яблоко'], 'extra' => ['вчера']],
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
                            'tr' => ['sentence' => 'ekmek ve elma', 'correct' => ['ekmek', 've', 'elma'], 'extra' => ['dün']],
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
                            'az' => ['sentence' => 'içdim qəhvə', 'correct' => ['içdim', 'qəhvə'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'شربت قهوة', 'correct' => ['شربت', 'قهوة'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'я пил кофе', 'correct' => ['я', 'пил', 'кофе'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'kahve içtim', 'correct' => ['kahve', 'içtim'], 'extra' => ['su']],
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
                            'az' => ['sentence' => 'idi yaxşı', 'correct' => ['idi', 'yaxşı'], 'extra' => ['içdim']],
                            'ar' => ['sentence' => 'كان جيد', 'correct' => ['كان', 'جيد'], 'extra' => ['شربت']],
                            'ru' => ['sentence' => 'было хороший', 'correct' => ['было', 'хороший'], 'extra' => ['я', 'пил']],
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
                            'tr' => ['sentence' => 'o iyiydi', 'correct' => ['o', 'iyiydi'], 'extra' => ['içtim']],
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
                            'az' => ['sentence' => 'içdim su', 'correct' => ['içdim', 'su'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'شربت ماء', 'correct' => ['شربت', 'ماء'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я пил вода', 'correct' => ['я', 'пил', 'вода'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'su içtim', 'correct' => ['su', 'içtim'], 'extra' => ['kahve']],
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
                            'az' => ['sentence' => 'gördüm park', 'correct' => ['gördüm', 'park'], 'extra' => ['artıq']],
                            'ar' => ['sentence' => 'رأيت حديقة', 'correct' => ['رأيت', 'حديقة'], 'extra' => ['بالفعل']],
                            'ru' => ['sentence' => 'я видел парк', 'correct' => ['я', 'видел', 'парк'], 'extra' => ['уже']],
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
                            'tr' => ['sentence' => 'parkı gördüm', 'correct' => ['parkı', 'gördüm'], 'extra' => ['zaten']],
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
                            'az' => ['sentence' => 'artıq burada', 'correct' => ['artıq', 'burada'], 'extra' => ['gördüm']],
                            'ar' => ['sentence' => 'بالفعل هنا', 'correct' => ['بالفعل', 'هنا'], 'extra' => ['رأيت']],
                            'ru' => ['sentence' => 'уже здесь', 'correct' => ['уже', 'здесь'], 'extra' => ['я', 'видел']],
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
                            'tr' => ['sentence' => 'zaten burada', 'correct' => ['zaten', 'burada'], 'extra' => ['gördüm']],
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
                            'az' => ['sentence' => 'gördüm ev artıq', 'correct' => ['gördüm', 'ev', 'artıq'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'رأيت بيت بالفعل', 'correct' => ['رأيت', 'بيت', 'بالفعل'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'я видел дом уже', 'correct' => ['я', 'видел', 'дом', 'уже'], 'extra' => ['парк']],
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
                                    'j\'ai déjà',
                                    'vu',
                                    'la',
                                    'maison',
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
                            'tr' => ['sentence' => 'evi zaten gördüm', 'correct' => ['evi', 'zaten', 'gördüm'], 'extra' => ['park']],
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
                            'az' => ['sentence' => 'idim içində məktəb', 'correct' => ['idim', 'içində', 'məktəb'], 'extra' => ['sonra']],
                            'ar' => ['sentence' => 'كنت في مدرسة', 'correct' => ['كنت', 'في', 'مدرسة'], 'extra' => ['ثم']],
                            'ru' => ['sentence' => 'я был в школа', 'correct' => ['я', 'был', 'в', 'школа'], 'extra' => ['потом']],
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
                            'tr' => ['sentence' => 'ben okuldaydım', 'correct' => ['ben', 'okuldaydım'], 'extra' => ['sonra']],
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
                            'az' => ['sentence' => 'sonra mağaza', 'correct' => ['sonra', 'mağaza'], 'extra' => ['idim']],
                            'ar' => ['sentence' => 'ثم متجر', 'correct' => ['ثم', 'متجر'], 'extra' => ['كنت']],
                            'ru' => ['sentence' => 'потом магазин', 'correct' => ['потом', 'магазин'], 'extra' => ['я', 'был']],
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
                            'tr' => ['sentence' => 'sonra dükkan', 'correct' => ['sonra', 'dükkan'], 'extra' => ['idim']],
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
                            'az' => ['sentence' => 'idim burada sonra', 'correct' => ['idim', 'burada', 'sonra'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'كنت هنا ثم', 'correct' => ['كنت', 'هنا', 'ثم'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'я был здесь потом', 'correct' => ['я', 'был', 'здесь', 'потом'], 'extra' => ['магазин']],
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
                            'tr' => ['sentence' => 'sonra buradaydım', 'correct' => ['sonra', 'buradaydım'], 'extra' => ['dükkan']],
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
                            'az' => ['sentence' => 'dünən idi yaxşı', 'correct' => ['dünən', 'idi', 'yaxşı'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أمس كان جيد', 'correct' => ['أمس', 'كان', 'جيد'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'вчера было хороший', 'correct' => ['вчера', 'было', 'хороший'], 'extra' => ['друг']],
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
                                    'war es',
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
                            'tr' => ['sentence' => 'dün iyiydi', 'correct' => ['dün', 'iyiydi'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => ['dünən']],
                            'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => ['أمس']],
                            'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => ['вчера']],
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
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['dün']],
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
                            'az' => ['sentence' => 'bir yaxşı ev', 'correct' => ['bir', 'yaxşı', 'ev'], 'extra' => ['dünən']],
                            'ar' => ['sentence' => 'جيد بيت', 'correct' => ['جيد', 'بيت'], 'extra' => ['أمس']],
                            'ru' => ['sentence' => 'хороший дом', 'correct' => ['хороший', 'дом'], 'extra' => ['вчера']],
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
                            'tr' => ['sentence' => 'iyi bir ev', 'correct' => ['iyi', 'bir', 'ev'], 'extra' => ['dün']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
