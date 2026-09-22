<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'Brot' => 'bread',
        'Apfel' => 'apple',
        'Kaffee' => 'coffee',
        'Wasser' => 'water',
        'Park' => 'park',
        'Haus' => 'house',
        'Schule' => 'school',
        'Geschäft' => 'shop',
        'Freund' => 'friend',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 5, the German twin of the
     * English "Unit 5: Talking About The Past" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Einheit 5: Über die Vergangenheit sprechen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Brot & Apfel', 1,
                pictures: [
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'gestern',
                    ],
                    [
                        'de' => 'ich aß',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Gestern',
                            'aß',
                            'ich',
                            'Brot',
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
                            'Ich',
                            'aß',
                            'einen',
                            'Apfel',
                        ],
                        'blank' => 3,
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
                            'Brot',
                            'und',
                            'ein',
                            'Apfel',
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
            $builder->lesson('Lektion 2: Kaffee & Wasser', 2,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Wasser',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich trank',
                    ],
                    [
                        'de' => 'es war',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'trank',
                            'Kaffee',
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
                                    'it was',
                                ],
                            ],
                            'az' => ['sentence' => 'içdim qəhvə', 'correct' => ['içdim', 'qəhvə'], 'extra' => ['su', 'idi']],
                            'ar' => ['sentence' => 'شربت قهوة', 'correct' => ['شربت', 'قهوة'], 'extra' => ['ماء', 'كان']],
                            'ru' => ['sentence' => 'я пил кофе', 'correct' => ['я', 'пил', 'кофе'], 'extra' => ['вода', 'было']],
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
                            'Es',
                            'war',
                            'gut',
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
                                    'water',
                                ],
                            ],
                            'az' => ['sentence' => 'idi yaxşı', 'correct' => ['idi', 'yaxşı'], 'extra' => ['içdim', 'su']],
                            'ar' => ['sentence' => 'كان جيد', 'correct' => ['كان', 'جيد'], 'extra' => ['شربت', 'ماء']],
                            'ru' => ['sentence' => 'было хороший', 'correct' => ['было', 'хороший'], 'extra' => ['я', 'пил', 'вода']],
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
                            'Ich',
                            'trank',
                            'Wasser',
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
                                    'it was',
                                ],
                            ],
                            'az' => ['sentence' => 'içdim su', 'correct' => ['içdim', 'su'], 'extra' => ['qəhvə', 'idi']],
                            'ar' => ['sentence' => 'شربت ماء', 'correct' => ['شربت', 'ماء'], 'extra' => ['قهوة', 'كان']],
                            'ru' => ['sentence' => 'я пил вода', 'correct' => ['я', 'пил', 'вода'], 'extra' => ['кофе', 'было']],
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
            $builder->lesson('Lektion 3: Park & Haus', 3,
                pictures: [
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich sah',
                    ],
                    [
                        'de' => 'schon',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'sah',
                            'den',
                            'Park',
                        ],
                        'blank' => 3,
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
                            'Schon',
                            'hier',
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
                            'Ich',
                            'sah',
                            'das',
                            'Haus',
                            'schon',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lektion 4: Schule & Geschäft', 4,
                pictures: [
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                    [
                        'de' => 'Geschäft',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich war',
                    ],
                    [
                        'de' => 'dann',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'war',
                            'in',
                            'der',
                            'Schule',
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
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'idim içində məktəb', 'correct' => ['idim', 'içində', 'məktəb'], 'extra' => ['sonra', 'mağaza']],
                            'ar' => ['sentence' => 'كنت في مدرسة', 'correct' => ['كنت', 'في', 'مدرسة'], 'extra' => ['ثم', 'متجر']],
                            'ru' => ['sentence' => 'я был в школа', 'correct' => ['я', 'был', 'в', 'школа'], 'extra' => ['потом', 'магазин']],
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
                            'Dann',
                            'das',
                            'Geschäft',
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
                            'Ich',
                            'war',
                            'dann',
                            'hier',
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
            $builder->lesson('Lektion 5: Freund & Haus', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'gestern',
                    ],
                    [
                        'de' => 'gut',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Gestern',
                            'war',
                            'es',
                            'gut',
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
                            'Mein',
                            'Freund',
                            'ist',
                            'gut',
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
                            'Ein',
                            'gutes',
                            'Haus',
                        ],
                        'blank' => 1,
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
