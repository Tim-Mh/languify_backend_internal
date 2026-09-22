<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'pan' => 'bread',
        'manzana' => 'apple',
        'café' => 'coffee',
        'agua' => 'water',
        'parque' => 'park',
        'casa' => 'house',
        'escuela' => 'school',
        'tienda' => 'shop',
        'amigo' => 'friend',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 5, the Spanish twin of the
     * English "Unit 5: Talking About The Past" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unidad 5: Hablar del pasado', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Pan y Manzana', 1,
                pictures: [
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ayer',
                    ],
                    [
                        'es' => 'comí',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ayer',
                            'comí',
                            'pan',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '昨日パンを食べた',
                                'correct' => [
                                    '昨日',
                                    'パン',
                                    'を',
                                    '食べた',
                                ],
                                'extra' => [
                                    'りんご',
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
                            'Comí',
                            'una',
                            'manzana',
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
                                    'yesterday',
                                ],
                            ],
                            'az' => ['sentence' => 'yedim bir alma', 'correct' => ['yedim', 'bir', 'alma'], 'extra' => ['çörək', 'dünən']],
                            'ar' => ['sentence' => 'أكلت تفاحة', 'correct' => ['أكلت', 'تفاحة'], 'extra' => ['خبز', 'أمس']],
                            'ru' => ['sentence' => 'я ел яблоко', 'correct' => ['я', 'ел', 'яблоко'], 'extra' => ['хлеб', 'вчера']],
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
                            'ja' => [
                                'sentence' => 'りんごを食べた',
                                'correct' => [
                                    'りんご',
                                    'を',
                                    '食べた',
                                ],
                                'extra' => [
                                    'パン',
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
                            'tr' => ['sentence' => 'bir elma yedim', 'correct' => ['bir', 'elma', 'yedim'], 'extra' => ['ekmek', 'dün']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pan',
                            'y',
                            'una',
                            'manzana',
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
                            'ja' => [
                                'sentence' => 'パンとりんご',
                                'correct' => [
                                    'パン',
                                    'と',
                                    'りんご',
                                ],
                                'extra' => [
                                    '昨日',
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
            $builder->lesson('Lección 2: Café y Agua', 2,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'agua',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bebí',
                    ],
                    [
                        'es' => 'fue',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Bebí',
                            'café',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I drank coffee',
                                'correct' => [
                                    'I drank',
                                    'coffee',
                                ],
                                'extra' => [
                                    'water',
                                    'it was',
                                ],
                            ],
                            'az' => ['sentence' => 'içdim qəhvə', 'correct' => ['içdim', 'qəhvə'], 'extra' => ['su', 'idi']],
                            'ar' => ['sentence' => 'شربت قهوة', 'correct' => ['شربت', 'قهوة'], 'extra' => ['ماء', 'كان']],
                            'ru' => ['sentence' => 'я пил кофе', 'correct' => ['я', 'пил', 'кофе'], 'extra' => ['вода', 'было']],
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
                            'ja' => [
                                'sentence' => 'コーヒーを飲んだ',
                                'correct' => [
                                    'コーヒー',
                                    'を',
                                    '飲んだ',
                                ],
                                'extra' => [
                                    '水',
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
                            'tr' => ['sentence' => 'kahve içtim', 'correct' => ['kahve', 'içtim'], 'extra' => ['su', 'idi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Fue',
                            'bueno',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'it was good',
                                'correct' => [
                                    'it was',
                                    'good',
                                ],
                                'extra' => [
                                    'I drank',
                                    'water',
                                ],
                            ],
                            'az' => ['sentence' => 'idi yaxşı', 'correct' => ['idi', 'yaxşı'], 'extra' => ['içdim', 'su']],
                            'ar' => ['sentence' => 'كان جيد', 'correct' => ['كان', 'جيد'], 'extra' => ['شربت', 'ماء']],
                            'ru' => ['sentence' => 'было хороший', 'correct' => ['было', 'хороший'], 'extra' => ['я', 'пил', 'вода']],
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
                            'ja' => [
                                'sentence' => 'それは良かった',
                                'correct' => [
                                    'それ',
                                    'は',
                                    '良かった',
                                ],
                                'extra' => [
                                    '私は飲んだ',
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
                            'tr' => ['sentence' => 'o iyiydi', 'correct' => ['o', 'iyiydi'], 'extra' => ['içtim', 'su']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Bebí',
                            'agua',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I drank water',
                                'correct' => [
                                    'I drank',
                                    'water',
                                ],
                                'extra' => [
                                    'coffee',
                                    'it was',
                                ],
                            ],
                            'az' => ['sentence' => 'içdim su', 'correct' => ['içdim', 'su'], 'extra' => ['qəhvə', 'idi']],
                            'ar' => ['sentence' => 'شربت ماء', 'correct' => ['شربت', 'ماء'], 'extra' => ['قهوة', 'كان']],
                            'ru' => ['sentence' => 'я пил вода', 'correct' => ['я', 'пил', 'вода'], 'extra' => ['кофе', 'было']],
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
                            'ja' => [
                                'sentence' => '水を飲んだ',
                                'correct' => [
                                    '水',
                                    'を',
                                    '飲んだ',
                                ],
                                'extra' => [
                                    'コーヒー',
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
                            'tr' => ['sentence' => 'su içtim', 'correct' => ['su', 'içtim'], 'extra' => ['kahve', 'idi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Parque y Casa', 3,
                pictures: [
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vi',
                    ],
                    [
                        'es' => 'ya',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vi',
                            'el',
                            'parque',
                        ],
                        'blank' => 0,
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'gördüm park', 'correct' => ['gördüm', 'park'], 'extra' => ['artıq', 'ev']],
                            'ar' => ['sentence' => 'رأيت حديقة', 'correct' => ['رأيت', 'حديقة'], 'extra' => ['بالفعل', 'بيت']],
                            'ru' => ['sentence' => 'я видел парк', 'correct' => ['я', 'видел', 'парк'], 'extra' => ['уже', 'дом']],
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
                            'ja' => [
                                'sentence' => '公園を見た',
                                'correct' => [
                                    '公園',
                                    'を',
                                    '見た',
                                ],
                                'extra' => [
                                    'もう',
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
                            'tr' => ['sentence' => 'parkı gördüm', 'correct' => ['parkı', 'gördüm'], 'extra' => ['zaten', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ya',
                            'aquí',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'already here',
                                'correct' => [
                                    'already',
                                    'here',
                                ],
                                'extra' => [
                                    'I saw',
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'artıq burada', 'correct' => ['artıq', 'burada'], 'extra' => ['gördüm', 'park']],
                            'ar' => ['sentence' => 'بالفعل هنا', 'correct' => ['بالفعل', 'هنا'], 'extra' => ['رأيت', 'حديقة']],
                            'ru' => ['sentence' => 'уже здесь', 'correct' => ['уже', 'здесь'], 'extra' => ['я', 'видел', 'парк']],
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
                            'ja' => [
                                'sentence' => 'もうここに',
                                'correct' => [
                                    'もう',
                                    'ここ',
                                    'に',
                                ],
                                'extra' => [
                                    '私は見た',
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
                            'tr' => ['sentence' => 'zaten burada', 'correct' => ['zaten', 'burada'], 'extra' => ['gördüm', 'park']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ya',
                            'vi',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'もう家を見た',
                                'correct' => [
                                    'もう',
                                    '家',
                                    'を',
                                    '見た',
                                ],
                                'extra' => [
                                    '公園',
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
            $builder->lesson('Lección 4: Escuela y Tienda', 4,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'es' => 'estaba',
                    ],
                    [
                        'es' => 'entonces',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estaba',
                            'en',
                            'la',
                            'escuela',
                        ],
                        'blank' => 0,
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
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'idim içində məktəb', 'correct' => ['idim', 'içində', 'məktəb'], 'extra' => ['sonra', 'mağaza']],
                            'ar' => ['sentence' => 'كنت في مدرسة', 'correct' => ['كنت', 'في', 'مدرسة'], 'extra' => ['ثم', 'متجر']],
                            'ru' => ['sentence' => 'я был в школа', 'correct' => ['я', 'был', 'в', 'школа'], 'extra' => ['потом', 'магазин']],
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
                            'ja' => [
                                'sentence' => '私は学校にいた',
                                'correct' => [
                                    '私',
                                    'は',
                                    '学校',
                                    'に',
                                    'いた',
                                ],
                                'extra' => [
                                    'それから',
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
                            'tr' => ['sentence' => 'ben okuldaydım', 'correct' => ['ben', 'okuldaydım'], 'extra' => ['sonra', 'dükkan']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Entonces',
                            'la',
                            'tienda',
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
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'sonra mağaza', 'correct' => ['sonra', 'mağaza'], 'extra' => ['idim', 'məktəb']],
                            'ar' => ['sentence' => 'ثم متجر', 'correct' => ['ثم', 'متجر'], 'extra' => ['كنت', 'مدرسة']],
                            'ru' => ['sentence' => 'потом магазин', 'correct' => ['потом', 'магазин'], 'extra' => ['я', 'был', 'школа']],
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
                            'ja' => [
                                'sentence' => 'それから店',
                                'correct' => [
                                    'それから',
                                    '店',
                                ],
                                'extra' => [
                                    'でした',
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
                            'tr' => ['sentence' => 'sonra dükkan', 'correct' => ['sonra', 'dükkan'], 'extra' => ['idim', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Estaba',
                            'aquí',
                            'entonces',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => 'その時私はここにいた',
                                'correct' => [
                                    'その時',
                                    '私',
                                    'は',
                                    'ここ',
                                    'に',
                                    'いた',
                                ],
                                'extra' => [
                                    '店',
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
            $builder->lesson('Lección 5: Amigo y Casa', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ayer',
                    ],
                    [
                        'es' => 'bueno',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ayer',
                            'fue',
                            'bueno',
                        ],
                        'blank' => 0,
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'dünən idi yaxşı', 'correct' => ['dünən', 'idi', 'yaxşı'], 'extra' => ['dost', 'ev']],
                            'ar' => ['sentence' => 'أمس كان جيد', 'correct' => ['أمس', 'كان', 'جيد'], 'extra' => ['صديق', 'بيت']],
                            'ru' => ['sentence' => 'вчера было хороший', 'correct' => ['вчера', 'было', 'хороший'], 'extra' => ['друг', 'дом']],
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
                            'ja' => [
                                'sentence' => '昨日は良かった',
                                'correct' => [
                                    '昨日',
                                    'は',
                                    '良かった',
                                ],
                                'extra' => [
                                    '友達',
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
                            'tr' => ['sentence' => 'dün iyiydi', 'correct' => ['dün', 'iyiydi'], 'extra' => ['arkadaş', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'es',
                            'bueno',
                        ],
                        'blank' => 3,
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => ['dünən', 'ev']],
                            'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => ['أمس', 'بيت']],
                            'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => ['вчера', 'дом']],
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
                            'ja' => [
                                'sentence' => '私の友達は良い',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '良い',
                                ],
                                'extra' => [
                                    '昨日',
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
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['dün', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Una',
                            'casa',
                            'buena',
                        ],
                        'blank' => 2,
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
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yaxşı ev', 'correct' => ['bir', 'yaxşı', 'ev'], 'extra' => ['dünən', 'dost']],
                            'ar' => ['sentence' => 'جيد بيت', 'correct' => ['جيد', 'بيت'], 'extra' => ['أمس', 'صديق']],
                            'ru' => ['sentence' => 'хороший дом', 'correct' => ['хороший', 'дом'], 'extra' => ['вчера', 'друг']],
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
                            'ja' => [
                                'sentence' => '良い家',
                                'correct' => [
                                    '良い',
                                    '家',
                                ],
                                'extra' => [
                                    '昨日',
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
                            'tr' => ['sentence' => 'iyi bir ev', 'correct' => ['iyi', 'bir', 'ev'], 'extra' => ['dün', 'arkadaş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
