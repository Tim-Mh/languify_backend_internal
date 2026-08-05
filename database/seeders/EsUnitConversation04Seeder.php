<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation04Seeder extends Seeder
{
    private const PICTURES = [
        'amigo' => 'friend',
        'madre' => 'mother',
        'hermano' => 'brother',
        'hermana' => 'sister',
        'médico' => 'doctor',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 4, the Spanish twin of the
     * English "Unit 4: Talking About Feelings" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unidad 4: Hablar de sentimientos', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Amigo y Madre', 1,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'es' => 'feliz',
                    ],
                    [
                        'es' => 'triste',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'feliz',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am happy',
                                'correct' => [
                                    'I am',
                                    'happy',
                                ],
                                'extra' => [
                                    'sad',
                                    'friend',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bin glücklich',
                                'correct' => [
                                    'ich bin',
                                    'glücklich',
                                ],
                                'extra' => [
                                    'traurig',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis heureux',
                                'correct' => [
                                    'je suis',
                                    'heureux',
                                ],
                                'extra' => [
                                    'triste',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は幸せです',
                                'correct' => [
                                    '私',
                                    'は',
                                    '幸せ',
                                    'です',
                                ],
                                'extra' => [
                                    '悲しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 행복합니다',
                                'correct' => [
                                    '저는',
                                    '행복합니다',
                                ],
                                'extra' => [
                                    '슬픈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'está',
                            'triste',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is sad',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'sad',
                                ],
                                'extra' => [
                                    'happy',
                                    'mother',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Freund ist traurig',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'traurig',
                                ],
                                'extra' => [
                                    'glücklich',
                                    'Mutter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est triste',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'triste',
                                ],
                                'extra' => [
                                    'heureux',
                                    'mère',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は悲しいです',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '悲しい',
                                    'です',
                                ],
                                'extra' => [
                                    '幸せ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 슬픕니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '슬픕니다',
                                ],
                                'extra' => [
                                    '행복한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'madre',
                            'está',
                            'feliz',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother is happy',
                                'correct' => [
                                    'my',
                                    'mother',
                                    'is',
                                    'happy',
                                ],
                                'extra' => [
                                    'sad',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Mutter ist glücklich',
                                'correct' => [
                                    'meine',
                                    'Mutter',
                                    'ist',
                                    'glücklich',
                                ],
                                'extra' => [
                                    'traurig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma mère est heureuse',
                                'correct' => [
                                    'ma',
                                    'mère',
                                    'est',
                                    'heureux',
                                ],
                                'extra' => [
                                    'triste',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の母は幸せです',
                                'correct' => [
                                    '私の',
                                    '母',
                                    'は',
                                    '幸せ',
                                    'です',
                                ],
                                'extra' => [
                                    '悲しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 어머니는 행복합니다',
                                'correct' => [
                                    '나의',
                                    '어머니는',
                                    '행복합니다',
                                ],
                                'extra' => [
                                    '슬픈',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Hermano y Médico', 2,
                pictures: [
                    [
                        'es' => 'hermano',
                        'img' => 'brother',
                    ],
                    [
                        'es' => 'médico',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cansado',
                    ],
                    [
                        'es' => 'enfermo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'cansado',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am tired',
                                'correct' => [
                                    'I am',
                                    'tired',
                                ],
                                'extra' => [
                                    'sick',
                                    'brother',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bin müde',
                                'correct' => [
                                    'ich bin',
                                    'müde',
                                ],
                                'extra' => [
                                    'krank',
                                    'Bruder',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis fatigué',
                                'correct' => [
                                    'je suis',
                                    'fatigué',
                                ],
                                'extra' => [
                                    'malade',
                                    'frère',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は疲れています',
                                'correct' => [
                                    '私',
                                    'は',
                                    '疲れて',
                                    'います',
                                ],
                                'extra' => [
                                    '病気',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 피곤합니다',
                                'correct' => [
                                    '저는',
                                    '피곤합니다',
                                ],
                                'extra' => [
                                    '아픈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'hermano',
                            'está',
                            'enfermo',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my brother is sick',
                                'correct' => [
                                    'my',
                                    'brother',
                                    'is',
                                    'sick',
                                ],
                                'extra' => [
                                    'tired',
                                    'doctor',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Bruder ist krank',
                                'correct' => [
                                    'mein',
                                    'Bruder',
                                    'ist',
                                    'krank',
                                ],
                                'extra' => [
                                    'müde',
                                    'Arzt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon frère est malade',
                                'correct' => [
                                    'mon',
                                    'frère',
                                    'est',
                                    'malade',
                                ],
                                'extra' => [
                                    'fatigué',
                                    'médecin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の兄弟は病気です',
                                'correct' => [
                                    '私の',
                                    '兄弟',
                                    'は',
                                    '病気',
                                    'です',
                                ],
                                'extra' => [
                                    '疲れた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 형제는 아픕니다',
                                'correct' => [
                                    '나의',
                                    '형제는',
                                    '아픕니다',
                                ],
                                'extra' => [
                                    '피곤한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'médico',
                            'y',
                            'mi',
                            'hermano',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the doctor and my brother',
                                'correct' => [
                                    'the',
                                    'doctor',
                                    'and',
                                    'my',
                                    'brother',
                                ],
                                'extra' => [
                                    'sick',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Arzt und mein Bruder',
                                'correct' => [
                                    'der',
                                    'Arzt',
                                    'und',
                                    'mein',
                                    'Bruder',
                                ],
                                'extra' => [
                                    'krank',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le médecin et mon frère',
                                'correct' => [
                                    'le',
                                    'médecin',
                                    'et',
                                    'mon',
                                    'frère',
                                ],
                                'extra' => [
                                    'malade',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '医者と私の兄弟',
                                'correct' => [
                                    '医者',
                                    'と',
                                    '私の',
                                    '兄弟',
                                ],
                                'extra' => [
                                    '病気',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '의사와 나의 형제',
                                'correct' => [
                                    '의사와',
                                    '나의',
                                    '형제',
                                ],
                                'extra' => [
                                    '아픈',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Hermana y Amigo', 3,
                pictures: [
                    [
                        'es' => 'hermana',
                        'img' => 'sister',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'contento',
                    ],
                    [
                        'es' => 'tranquilo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'contento',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am glad',
                                'correct' => [
                                    'I am',
                                    'glad',
                                ],
                                'extra' => [
                                    'calm',
                                    'sister',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bin froh',
                                'correct' => [
                                    'ich bin',
                                    'froh',
                                ],
                                'extra' => [
                                    'ruhig',
                                    'Schwester',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis content',
                                'correct' => [
                                    'je suis',
                                    'content',
                                ],
                                'extra' => [
                                    'calme',
                                    'sœur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は嬉しいです',
                                'correct' => [
                                    '私',
                                    'は',
                                    '嬉しい',
                                    'です',
                                ],
                                'extra' => [
                                    '落ち着いた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 기쁩니다',
                                'correct' => [
                                    '저는',
                                    '기쁩니다',
                                ],
                                'extra' => [
                                    '차분한',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'hermana',
                            'está',
                            'tranquila',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my sister is calm',
                                'correct' => [
                                    'my',
                                    'sister',
                                    'is',
                                    'calm',
                                ],
                                'extra' => [
                                    'glad',
                                    'friend',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Schwester ist ruhig',
                                'correct' => [
                                    'meine',
                                    'Schwester',
                                    'ist',
                                    'ruhig',
                                ],
                                'extra' => [
                                    'froh',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma sœur est calme',
                                'correct' => [
                                    'ma',
                                    'sœur',
                                    'est',
                                    'calme',
                                ],
                                'extra' => [
                                    'content',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の姉妹は落ち着いています',
                                'correct' => [
                                    '私の',
                                    '姉妹',
                                    'は',
                                    '落ち着いて',
                                    'います',
                                ],
                                'extra' => [
                                    '嬉しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 자매는 차분합니다',
                                'correct' => [
                                    '나의',
                                    '자매는',
                                    '차분합니다',
                                ],
                                'extra' => [
                                    '기쁜',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'está',
                            'contento',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is glad',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'glad',
                                ],
                                'extra' => [
                                    'calm',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Freund ist froh',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'froh',
                                ],
                                'extra' => [
                                    'ruhig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est content',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'content',
                                ],
                                'extra' => [
                                    'calme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は嬉しいです',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '嬉しい',
                                    'です',
                                ],
                                'extra' => [
                                    '落ち着いた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 기쁩니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '기쁩니다',
                                ],
                                'extra' => [
                                    '차분한',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Madre y Casa', 4,
                pictures: [
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'un poco',
                    ],
                    [
                        'es' => 'porque',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'un',
                            'poco',
                            'cansado',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am a little tired',
                                'correct' => [
                                    'I am',
                                    'a little',
                                    'tired',
                                ],
                                'extra' => [
                                    'because',
                                    'mother',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bin ein bisschen müde',
                                'correct' => [
                                    'ich bin',
                                    'ein bisschen',
                                    'müde',
                                ],
                                'extra' => [
                                    'weil',
                                    'Mutter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis un peu fatigué',
                                'correct' => [
                                    'je suis',
                                    'un peu',
                                    'fatigué',
                                ],
                                'extra' => [
                                    'parce que',
                                    'mère',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は少し疲れています',
                                'correct' => [
                                    '私',
                                    'は',
                                    '少し',
                                    '疲れて',
                                    'います',
                                ],
                                'extra' => [
                                    'なぜなら',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 조금 피곤합니다',
                                'correct' => [
                                    '저는',
                                    '조금',
                                    '피곤합니다',
                                ],
                                'extra' => [
                                    '왜냐하면',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Feliz',
                            'porque',
                            'mi',
                            'madre',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'happy because my mother',
                                'correct' => [
                                    'happy',
                                    'because',
                                    'my',
                                    'mother',
                                ],
                                'extra' => [
                                    'a little',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Glücklich weil meine Mutter',
                                'correct' => [
                                    'glücklich',
                                    'weil',
                                    'meine',
                                    'Mutter',
                                ],
                                'extra' => [
                                    'ein bisschen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Heureux parce que ma mère',
                                'correct' => [
                                    'heureux',
                                    'parce que',
                                    'ma',
                                    'mère',
                                ],
                                'extra' => [
                                    'un peu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '母がいるから幸せ',
                                'correct' => [
                                    '母',
                                    'が',
                                    'いる',
                                    'から',
                                    '幸せ',
                                ],
                                'extra' => [
                                    '少し',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어머니 때문에 행복한',
                                'correct' => [
                                    '어머니',
                                    '때문에',
                                    '행복한',
                                ],
                                'extra' => [
                                    '조금',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'poco',
                            'triste',
                            'en',
                            'la',
                            'casa',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a little sad in the house',
                                'correct' => [
                                    'a little',
                                    'sad',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'because',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein bisschen traurig im Haus',
                                'correct' => [
                                    'ein bisschen',
                                    'traurig',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'weil',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un peu triste dans la maison',
                                'correct' => [
                                    'un peu',
                                    'triste',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'parce que',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家で少し悲しい',
                                'correct' => [
                                    '家',
                                    'で',
                                    '少し',
                                    '悲しい',
                                ],
                                'extra' => [
                                    'なぜなら',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집에서 조금 슬픈',
                                'correct' => [
                                    '집에서',
                                    '조금',
                                    '슬픈',
                                ],
                                'extra' => [
                                    '왜냐하면',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Amigo y Hermana', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'hermana',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'es' => 'me siento',
                    ],
                    [
                        'es' => 'hoy',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hoy',
                            'me',
                            'siento',
                            'feliz',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I feel happy today',
                                'correct' => [
                                    'I feel',
                                    'happy',
                                    'today',
                                ],
                                'extra' => [
                                    'sad',
                                    'friend',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich fühle mich heute glücklich',
                                'correct' => [
                                    'ich fühle mich',
                                    'heute',
                                    'glücklich',
                                ],
                                'extra' => [
                                    'traurig',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aujourd\'hui je me sens heureux',
                                'correct' => [
                                    'aujourd\'hui',
                                    'je me sens',
                                    'heureux',
                                ],
                                'extra' => [
                                    'triste',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日は幸せに感じる',
                                'correct' => [
                                    '今日',
                                    'は',
                                    '幸せ',
                                    'に',
                                    '感じる',
                                ],
                                'extra' => [
                                    '悲しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘 행복하게 느낍니다',
                                'correct' => [
                                    '오늘',
                                    '행복하게',
                                    '느낍니다',
                                ],
                                'extra' => [
                                    '슬픈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'hermana',
                            'está',
                            'contenta',
                            'hoy',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my sister is glad today',
                                'correct' => [
                                    'my',
                                    'sister',
                                    'is',
                                    'glad',
                                    'today',
                                ],
                                'extra' => [
                                    'I feel',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Schwester ist heute froh',
                                'correct' => [
                                    'meine',
                                    'Schwester',
                                    'ist',
                                    'heute',
                                    'froh',
                                ],
                                'extra' => [
                                    'ich fühle mich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma sœur est contente aujourd\'hui',
                                'correct' => [
                                    'ma',
                                    'sœur',
                                    'est',
                                    'content',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'je me sens',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の姉妹は今日嬉しいです',
                                'correct' => [
                                    '私の',
                                    '姉妹',
                                    'は',
                                    '今日',
                                    '嬉しい',
                                    'です',
                                ],
                                'extra' => [
                                    '私は感じる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 자매는 오늘 기쁩니다',
                                'correct' => [
                                    '나의',
                                    '자매는',
                                    '오늘',
                                    '기쁩니다',
                                ],
                                'extra' => [
                                    '나는 느낍니다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Me',
                            'siento',
                            'tranquilo',
                            'con',
                            'mi',
                            'amigo',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I feel calm with my friend',
                                'correct' => [
                                    'I feel',
                                    'calm',
                                    'with',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'today',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich fühle mich ruhig mit meinem Freund',
                                'correct' => [
                                    'ich fühle mich',
                                    'ruhig',
                                    'mit',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'heute',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je me sens calme avec mon ami',
                                'correct' => [
                                    'je me sens',
                                    'calme',
                                    'avec',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'aujourd\'hui',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '友達といると落ち着いて感じる',
                                'correct' => [
                                    '友達',
                                    'と',
                                    'いる',
                                    'と',
                                    '落ち着いて',
                                    '感じる',
                                ],
                                'extra' => [
                                    '今日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '친구와 있으면 차분하게 느낍니다',
                                'correct' => [
                                    '친구와',
                                    '있으면',
                                    '차분하게',
                                    '느낍니다',
                                ],
                                'extra' => [
                                    '오늘',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
