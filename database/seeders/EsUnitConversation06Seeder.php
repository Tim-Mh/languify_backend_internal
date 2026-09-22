<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation06Seeder extends Seeder
{
    private const PICTURES = [
        'parque' => 'park',
        'escuela' => 'school',
        'tienda' => 'shop',
        'casa' => 'house',
        'amigo' => 'friend',
        'libro' => 'book',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 6, the Spanish twin of the
     * English "Unit 6: Future Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unidad 6: Planes futuros', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Parque y Escuela', 1,
                pictures: [
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'voy',
                    ],
                    [
                        'es' => 'mañana',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Voy',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going to the park',
                                'correct' => [
                                    'I am going',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'morning',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm park', 'correct' => ['gedirəm', 'park'], 'extra' => ['səhər', 'məktəb']],
                            'ar' => ['sentence' => 'أذهب إلى حديقة', 'correct' => ['أذهب', 'إلى', 'حديقة'], 'extra' => ['صباح', 'مدرسة']],
                            'ru' => ['sentence' => 'я иду в парк', 'correct' => ['я', 'иду', 'в', 'парк'], 'extra' => ['утро', 'школа']],
                            'de' => [
                                'sentence' => 'Ich gehe zum Park',
                                'correct' => [
                                    'ich gehe',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'morgen',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais au parc',
                                'correct' => [
                                    'je vais',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'demain',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は公園へ行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '公園',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '明日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 공원에 간다',
                                'correct' => [
                                    '나는',
                                    '공원에',
                                    '간다',
                                ],
                                'extra' => [
                                    '내일',
                                ],
                            ],
                            'tr' => ['sentence' => 'parka gidiyorum', 'correct' => ['parka', 'gidiyorum'], 'extra' => ['sabah', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Voy',
                            'mañana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going tomorrow',
                                'correct' => [
                                    'I am going',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'park',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm sabah', 'correct' => ['gedirəm', 'sabah'], 'extra' => ['park', 'məktəb']],
                            'ar' => ['sentence' => 'أذهب غدا', 'correct' => ['أذهب', 'غدا'], 'extra' => ['حديقة', 'مدرسة']],
                            'ru' => ['sentence' => 'я иду завтра', 'correct' => ['я', 'иду', 'завтра'], 'extra' => ['парк', 'школа']],
                            'de' => [
                                'sentence' => 'Ich gehe morgen',
                                'correct' => [
                                    'ich gehe',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Park',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais demain',
                                'correct' => [
                                    'je vais',
                                    'demain',
                                ],
                                'extra' => [
                                    'parc',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は明日行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '明日',
                                    '行く',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 내일 간다',
                                'correct' => [
                                    '나는',
                                    '내일',
                                    '간다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                            'tr' => ['sentence' => 'yarın gidiyorum', 'correct' => ['yarın', 'gidiyorum'], 'extra' => ['park', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Voy',
                            'a',
                            'la',
                            'escuela',
                            'mañana',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going to the school tomorrow',
                                'correct' => [
                                    'I am going',
                                    'to',
                                    'the',
                                    'school',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm məktəb sabah', 'correct' => ['gedirəm', 'məktəb', 'sabah'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'أذهب إلى مدرسة غدا', 'correct' => ['أذهب', 'إلى', 'مدرسة', 'غدا'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'я иду в школа завтра', 'correct' => ['я', 'иду', 'в', 'школа', 'завтра'], 'extra' => ['парк']],
                            'de' => [
                                'sentence' => 'Ich gehe morgen zur Schule',
                                'correct' => [
                                    'ich gehe',
                                    'zu',
                                    'der',
                                    'Schule',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais à l\'école demain',
                                'correct' => [
                                    'je vais',
                                    'à',
                                    'le',
                                    'école',
                                    'demain',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は明日学校へ行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '明日',
                                    '学校',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 내일 학교에 간다',
                                'correct' => [
                                    '나는',
                                    '내일',
                                    '학교에',
                                    '간다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                            'tr' => ['sentence' => 'yarın okula gidiyorum', 'correct' => ['yarın', 'okula', 'gidiyorum'], 'extra' => ['park']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Tienda y Casa', 2,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'antes',
                    ],
                    [
                        'es' => 'después',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Antes',
                            'de',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'before the shop',
                                'correct' => [
                                    'before',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'after',
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'əvvəl mağaza', 'correct' => ['əvvəl', 'mağaza'], 'extra' => ['sonra', 'ev']],
                            'ar' => ['sentence' => 'قبل متجر', 'correct' => ['قبل', 'متجر'], 'extra' => ['بعد', 'بيت']],
                            'ru' => ['sentence' => 'до магазин', 'correct' => ['до', 'магазин'], 'extra' => ['после', 'дом']],
                            'de' => [
                                'sentence' => 'Vor dem Geschäft',
                                'correct' => [
                                    'vor',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'nach',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Avant le magasin',
                                'correct' => [
                                    'avant',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'après',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店の前に',
                                'correct' => [
                                    '店',
                                    'の前に',
                                ],
                                'extra' => [
                                    '後に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게 전에',
                                'correct' => [
                                    '가게',
                                    '전에',
                                ],
                                'extra' => [
                                    '후에',
                                ],
                            ],
                            'tr' => ['sentence' => 'dükkandan önce', 'correct' => ['dükkandan', 'önce'], 'extra' => ['sonra', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Después',
                            'de',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'after the house',
                                'correct' => [
                                    'after',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'before',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'sonra ev', 'correct' => ['sonra', 'ev'], 'extra' => ['əvvəl', 'mağaza']],
                            'ar' => ['sentence' => 'بعد بيت', 'correct' => ['بعد', 'بيت'], 'extra' => ['قبل', 'متجر']],
                            'ru' => ['sentence' => 'после дом', 'correct' => ['после', 'дом'], 'extra' => ['до', 'магазин']],
                            'de' => [
                                'sentence' => 'Nach dem Haus',
                                'correct' => [
                                    'nach',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'vor',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Après la maison',
                                'correct' => [
                                    'après',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'avant',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家の後に',
                                'correct' => [
                                    '家',
                                    'の',
                                    '後に',
                                ],
                                'extra' => [
                                    '前に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집 후에',
                                'correct' => [
                                    '집',
                                    '후에',
                                ],
                                'extra' => [
                                    '전에',
                                ],
                            ],
                            'tr' => ['sentence' => 'evden sonra', 'correct' => ['evden', 'sonra'], 'extra' => ['önce', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Antes',
                            'o',
                            'después',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'before or after',
                                'correct' => [
                                    'before',
                                    'or',
                                    'after',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'əvvəl və ya sonra', 'correct' => ['əvvəl', 'və ya', 'sonra'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'قبل أو بعد', 'correct' => ['قبل', 'أو', 'بعد'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'до или после', 'correct' => ['до', 'или', 'после'], 'extra' => ['магазин']],
                            'de' => [
                                'sentence' => 'Vor oder nach',
                                'correct' => [
                                    'vor',
                                    'oder',
                                    'nach',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Avant ou après',
                                'correct' => [
                                    'avant',
                                    'ou',
                                    'après',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '前か後',
                                'correct' => [
                                    '前',
                                    'か',
                                    '後',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '전에 또는 후에',
                                'correct' => [
                                    '전에',
                                    '또는',
                                    '후에',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                            'tr' => ['sentence' => 'önce veya sonra', 'correct' => ['önce', 'veya', 'sonra'], 'extra' => ['dükkan']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Libro y Parque', 3,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'quiero',
                    ],
                    [
                        'es' => 'puedo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quiero',
                            'un',
                            'libro',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I want a book',
                                'correct' => [
                                    'I want',
                                    'a',
                                    'book',
                                ],
                                'extra' => [
                                    'I can',
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm bir kitab', 'correct' => ['istəyirəm', 'bir', 'kitab'], 'extra' => ['mən', 'bacarıram', 'park']],
                            'ar' => ['sentence' => 'أريد كتاب', 'correct' => ['أريد', 'كتاب'], 'extra' => ['أنا', 'أستطيع', 'حديقة']],
                            'ru' => ['sentence' => 'я хочу книга', 'correct' => ['я хочу', 'книга'], 'extra' => ['я', 'могу', 'парк']],
                            'de' => [
                                'sentence' => 'Ich will ein Buch',
                                'correct' => [
                                    'ich will',
                                    'ein',
                                    'Buch',
                                ],
                                'extra' => [
                                    'ich kann',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je veux un livre',
                                'correct' => [
                                    'je veux',
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'je peux',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は本がほしい',
                                'correct' => [
                                    '私',
                                    'は',
                                    '本',
                                    'が',
                                    'ほしい',
                                ],
                                'extra' => [
                                    '私はできる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 책을 원한다',
                                'correct' => [
                                    '나는',
                                    '책을',
                                    '원한다',
                                ],
                                'extra' => [
                                    '나는 할 수 있다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kitap istiyorum', 'correct' => ['bir', 'kitap', 'istiyorum'], 'extra' => ['yapabilirim', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Puedo',
                            'ir',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I can go',
                                'correct' => [
                                    'I can',
                                    'go',
                                ],
                                'extra' => [
                                    'I want',
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'mən bacarıram gedirəm', 'correct' => ['mən', 'bacarıram', 'gedirəm'], 'extra' => ['istəyirəm', 'kitab']],
                            'ar' => ['sentence' => 'أنا أستطيع أذهب', 'correct' => ['أنا', 'أستطيع', 'أذهب'], 'extra' => ['أريد', 'كتاب']],
                            'ru' => ['sentence' => 'я могу иду', 'correct' => ['я', 'могу', 'иду'], 'extra' => ['я хочу', 'книга']],
                            'de' => [
                                'sentence' => 'Ich kann gehen',
                                'correct' => [
                                    'ich kann',
                                    'gehen',
                                ],
                                'extra' => [
                                    'ich will',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je peux aller',
                                'correct' => [
                                    'je peux',
                                    'aller',
                                ],
                                'extra' => [
                                    'je veux',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は行ける',
                                'correct' => [
                                    '私',
                                    'は',
                                    '行ける',
                                ],
                                'extra' => [
                                    'たいです',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 갈 수 있다',
                                'correct' => [
                                    '나는',
                                    '갈',
                                    '수',
                                    '있다',
                                ],
                                'extra' => [
                                    '나는 원한다',
                                ],
                            ],
                            'tr' => ['sentence' => 'gidebilirim', 'correct' => ['gidebilirim'], 'extra' => ['istiyorum', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Quiero',
                            'ir',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I want to go to the park',
                                'correct' => [
                                    'I want',
                                    'to',
                                    'go',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'I can',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm gedirəm park', 'correct' => ['istəyirəm', 'gedirəm', 'park'], 'extra' => ['mən', 'bacarıram']],
                            'ar' => ['sentence' => 'أريد إلى أذهب إلى حديقة', 'correct' => ['أريد', 'إلى', 'أذهب', 'إلى', 'حديقة'], 'extra' => ['أنا', 'أستطيع']],
                            'ru' => ['sentence' => 'я хочу в иду в парк', 'correct' => ['я хочу', 'в', 'иду', 'в', 'парк'], 'extra' => ['я', 'могу']],
                            'de' => [
                                'sentence' => 'Ich will zum Park gehen',
                                'correct' => [
                                    'ich will',
                                    'gehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'ich kann',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je veux aller au parc',
                                'correct' => [
                                    'je veux',
                                    'aller',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'je peux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は公園へ行きたい',
                                'correct' => [
                                    '私',
                                    'は',
                                    '公園',
                                    'へ',
                                    '行きたい',
                                ],
                                'extra' => [
                                    '私はできる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 공원에 가고 싶다',
                                'correct' => [
                                    '나는',
                                    '공원에',
                                    '가고',
                                    '싶다',
                                ],
                                'extra' => [
                                    '나는 할 수 있다',
                                ],
                            ],
                            'tr' => ['sentence' => 'parka gitmek istiyorum', 'correct' => ['parka', 'gitmek', 'istiyorum'], 'extra' => ['yapabilirim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Amigo y Casa', 4,
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
                        'es' => 'listo',
                    ],
                    [
                        'es' => 'libre',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'listo',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am ready',
                                'correct' => [
                                    'I am',
                                    'ready',
                                ],
                                'extra' => [
                                    'free',
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'mən hazır', 'correct' => ['mən', 'hazır'], 'extra' => ['pulsuz', 'dost']],
                            'ar' => ['sentence' => 'أنا جاهز', 'correct' => ['أنا', 'جاهز'], 'extra' => ['مجاني', 'صديق']],
                            'ru' => ['sentence' => 'я готов', 'correct' => ['я', 'готов'], 'extra' => ['бесплатно', 'друг']],
                            'de' => [
                                'sentence' => 'Ich bin bereit',
                                'correct' => [
                                    'ich bin',
                                    'bereit',
                                ],
                                'extra' => [
                                    'frei',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis prêt',
                                'correct' => [
                                    'je suis',
                                    'prêt',
                                ],
                                'extra' => [
                                    'libre',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は準備ができた',
                                'correct' => [
                                    '私',
                                    'は',
                                    '準備ができた',
                                ],
                                'extra' => [
                                    '暇',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 준비됐습니다',
                                'correct' => [
                                    '저는',
                                    '준비됐습니다',
                                ],
                                'extra' => [
                                    '한가한',
                                ],
                            ],
                            'tr' => ['sentence' => 'hazırım', 'correct' => ['hazırım'], 'extra' => ['boş', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'está',
                            'libre',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is free',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'free',
                                ],
                                'extra' => [
                                    'ready',
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim dost pulsuz', 'correct' => ['mənim', 'dost', 'pulsuz'], 'extra' => ['hazır', 'ev']],
                            'ar' => ['sentence' => 'صديق مجاني', 'correct' => ['صديق', 'مجاني'], 'extra' => ['جاهز', 'بيت']],
                            'ru' => ['sentence' => 'мой друг бесплатно', 'correct' => ['мой', 'друг', 'бесплатно'], 'extra' => ['готов', 'дом']],
                            'de' => [
                                'sentence' => 'Mein Freund ist frei',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'frei',
                                ],
                                'extra' => [
                                    'bereit',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est libre',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'libre',
                                ],
                                'extra' => [
                                    'prêt',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は暇です',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '暇',
                                    'です',
                                ],
                                'extra' => [
                                    '準備ができた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 한가합니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '한가합니다',
                                ],
                                'extra' => [
                                    '준비된',
                                ],
                            ],
                            'tr' => ['sentence' => 'arkadaşım müsait', 'correct' => ['arkadaşım', 'müsait'], 'extra' => ['hazır', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Listo',
                            'en',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'ready in the house',
                                'correct' => [
                                    'ready',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'free',
                                ],
                            ],
                            'az' => ['sentence' => 'hazır içində ev', 'correct' => ['hazır', 'içində', 'ev'], 'extra' => ['pulsuz']],
                            'ar' => ['sentence' => 'جاهز في بيت', 'correct' => ['جاهز', 'في', 'بيت'], 'extra' => ['مجاني']],
                            'ru' => ['sentence' => 'готов в дом', 'correct' => ['готов', 'в', 'дом'], 'extra' => ['бесплатно']],
                            'de' => [
                                'sentence' => 'Bereit im Haus',
                                'correct' => [
                                    'bereit',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'frei',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Prêt dans la maison',
                                'correct' => [
                                    'prêt',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'libre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家で準備ができた',
                                'correct' => [
                                    '家',
                                    'で',
                                    '準備ができた',
                                ],
                                'extra' => [
                                    '暇',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집에서 준비된',
                                'correct' => [
                                    '집에서',
                                    '준비된',
                                ],
                                'extra' => [
                                    '한가한',
                                ],
                            ],
                            'tr' => ['sentence' => 'evde hazır', 'correct' => ['evde', 'hazır'], 'extra' => ['boş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Escuela y Amigo', 5,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'próximo',
                    ],
                    [
                        'es' => 'semana',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'próxima',
                            'semana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'next week',
                                'correct' => [
                                    'next',
                                    'week',
                                ],
                                'extra' => [
                                    'school',
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'növbəti həftə', 'correct' => ['növbəti', 'həftə'], 'extra' => ['məktəb', 'dost']],
                            'ar' => ['sentence' => 'التالي أسبوع', 'correct' => ['التالي', 'أسبوع'], 'extra' => ['مدرسة', 'صديق']],
                            'ru' => ['sentence' => 'следующий неделя', 'correct' => ['следующий', 'неделя'], 'extra' => ['школа', 'друг']],
                            'de' => [
                                'sentence' => 'Nächste Woche',
                                'correct' => [
                                    'nächste',
                                    'Woche',
                                ],
                                'extra' => [
                                    'Schule',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La semaine prochaine',
                                'correct' => [
                                    'prochain',
                                    'semaine',
                                ],
                                'extra' => [
                                    'école',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '来週',
                                'correct' => [
                                    '来',
                                    '週',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '다음 주',
                                'correct' => [
                                    '다음',
                                    '주',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                            'tr' => ['sentence' => 'gelecek hafta', 'correct' => ['gelecek', 'hafta'], 'extra' => ['okul', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Voy',
                            'la',
                            'próxima',
                            'semana',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going next week',
                                'correct' => [
                                    'I am going',
                                    'next',
                                    'week',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'gedirəm növbəti həftə', 'correct' => ['gedirəm', 'növbəti', 'həftə'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'أذهب التالي أسبوع', 'correct' => ['أذهب', 'التالي', 'أسبوع'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'я иду следующий неделя', 'correct' => ['я', 'иду', 'следующий', 'неделя'], 'extra' => ['школа']],
                            'de' => [
                                'sentence' => 'Ich gehe nächste Woche',
                                'correct' => [
                                    'ich gehe',
                                    'nächste',
                                    'Woche',
                                ],
                                'extra' => [
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais la semaine prochaine',
                                'correct' => [
                                    'je vais',
                                    'prochain',
                                    'semaine',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は来週行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '来',
                                    '週',
                                    '行く',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 다음 주에 간다',
                                'correct' => [
                                    '나는',
                                    '다음',
                                    '주에',
                                    '간다',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                            'tr' => ['sentence' => 'haftaya gidiyorum', 'correct' => ['haftaya', 'gidiyorum'], 'extra' => ['okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'y',
                            'la',
                            'escuela',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend and the school',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'and',
                                    'the',
                                    'school',
                                ],
                                'extra' => [
                                    'week',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim dost və məktəb', 'correct' => ['mənim', 'dost', 'və', 'məktəb'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'صديق و مدرسة', 'correct' => ['صديق', 'و', 'مدرسة'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'мой друг и школа', 'correct' => ['мой', 'друг', 'и', 'школа'], 'extra' => ['неделя']],
                            'de' => [
                                'sentence' => 'Mein Freund und die Schule',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'und',
                                    'die',
                                    'Schule',
                                ],
                                'extra' => [
                                    'Woche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami et l\'école',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'et',
                                    'école',
                                ],
                                'extra' => [
                                    'semaine',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達と学校',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'と',
                                    '学校',
                                ],
                                'extra' => [
                                    '週',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구와 학교',
                                'correct' => [
                                    '나의',
                                    '친구와',
                                    '학교',
                                ],
                                'extra' => [
                                    '주',
                                ],
                            ],
                            'tr' => ['sentence' => 'arkadaşım ve okul', 'correct' => ['arkadaşım', 've', 'okul'], 'extra' => ['hafta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
