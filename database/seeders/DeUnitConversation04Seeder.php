<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation04Seeder extends Seeder
{
    private const PICTURES = [
        'Freund' => 'friend',
        'Mutter' => 'mother',
        'Bruder' => 'brother',
        'Schwester' => 'sister',
        'Arzt' => 'doctor',
        'Haus' => 'house',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 4, the German twin of the
     * English "Unit 4: Talking About Feelings" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Einheit 4: Über Gefühle sprechen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Freund & Mutter', 1,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'de' => 'glücklich',
                    ],
                    [
                        'de' => 'traurig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'glücklich',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Estoy feliz',
                                'correct' => [
                                    'soy',
                                    'feliz',
                                ],
                                'extra' => [
                                    'triste',
                                    'amigo',
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
                            'Mein',
                            'Freund',
                            'ist',
                            'traurig',
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
                            'es' => [
                                'sentence' => 'Mi amigo está triste',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'está',
                                    'triste',
                                ],
                                'extra' => [
                                    'feliz',
                                    'madre',
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
                            'Meine',
                            'Mutter',
                            'ist',
                            'glücklich',
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
                            'es' => [
                                'sentence' => 'Mi madre está feliz',
                                'correct' => [
                                    'mi',
                                    'madre',
                                    'está',
                                    'feliz',
                                ],
                                'extra' => [
                                    'triste',
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
            $builder->lesson('Lektion 2: Bruder & Arzt', 2,
                pictures: [
                    [
                        'de' => 'Bruder',
                        'img' => 'brother',
                    ],
                    [
                        'de' => 'Arzt',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'de' => 'müde',
                    ],
                    [
                        'de' => 'krank',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'müde',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Estoy cansado',
                                'correct' => [
                                    'soy',
                                    'cansado',
                                ],
                                'extra' => [
                                    'enfermo',
                                    'hermano',
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
                            'Mein',
                            'Bruder',
                            'ist',
                            'krank',
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
                            'es' => [
                                'sentence' => 'Mi hermano está enfermo',
                                'correct' => [
                                    'mi',
                                    'hermano',
                                    'está',
                                    'enfermo',
                                ],
                                'extra' => [
                                    'cansado',
                                    'médico',
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
                            'Der',
                            'Arzt',
                            'und',
                            'mein',
                            'Bruder',
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
                            'es' => [
                                'sentence' => 'El médico y mi hermano',
                                'correct' => [
                                    'el',
                                    'médico',
                                    'y',
                                    'mi',
                                    'hermano',
                                ],
                                'extra' => [
                                    'enfermo',
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
            $builder->lesson('Lektion 3: Schwester & Freund', 3,
                pictures: [
                    [
                        'de' => 'Schwester',
                        'img' => 'sister',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'froh',
                    ],
                    [
                        'de' => 'ruhig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'froh',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Estoy contento',
                                'correct' => [
                                    'soy',
                                    'contento',
                                ],
                                'extra' => [
                                    'tranquilo',
                                    'hermana',
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
                            'Meine',
                            'Schwester',
                            'ist',
                            'ruhig',
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
                            'es' => [
                                'sentence' => 'Mi hermana está tranquila',
                                'correct' => [
                                    'mi',
                                    'hermana',
                                    'está',
                                    'tranquilo',
                                ],
                                'extra' => [
                                    'contento',
                                    'amigo',
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
                            'Mein',
                            'Freund',
                            'ist',
                            'froh',
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
                            'es' => [
                                'sentence' => 'Mi amigo está contento',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'está',
                                    'contento',
                                ],
                                'extra' => [
                                    'tranquilo',
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
            $builder->lesson('Lektion 4: Mutter & Haus', 4,
                pictures: [
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ein bisschen',
                    ],
                    [
                        'de' => 'weil',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'ein',
                            'bisschen',
                            'müde',
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
                            'es' => [
                                'sentence' => 'Estoy un poco cansado',
                                'correct' => [
                                    'soy',
                                    'un poco',
                                    'cansado',
                                ],
                                'extra' => [
                                    'porque',
                                    'madre',
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
                            'Glücklich',
                            'weil',
                            'meine',
                            'Mutter',
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
                            'es' => [
                                'sentence' => 'Feliz porque mi madre',
                                'correct' => [
                                    'feliz',
                                    'porque',
                                    'mi',
                                    'madre',
                                ],
                                'extra' => [
                                    'un poco',
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
                            'Ein',
                            'bisschen',
                            'traurig',
                            'im',
                            'Haus',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Un poco triste en la casa',
                                'correct' => [
                                    'un poco',
                                    'triste',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'porque',
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
            $builder->lesson('Lektion 5: Freund & Schwester', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Schwester',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich fühle mich',
                    ],
                    [
                        'de' => 'heute',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'fühle',
                            'mich',
                            'heute',
                            'glücklich',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Hoy me siento feliz',
                                'correct' => [
                                    'hoy',
                                    'me siento',
                                    'feliz',
                                ],
                                'extra' => [
                                    'triste',
                                    'amigo',
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
                            'Meine',
                            'Schwester',
                            'ist',
                            'heute',
                            'froh',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Mi hermana está contenta hoy',
                                'correct' => [
                                    'mi',
                                    'hermana',
                                    'está',
                                    'contento',
                                    'hoy',
                                ],
                                'extra' => [
                                    'me siento',
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
                            'Ich',
                            'fühle',
                            'mich',
                            'ruhig',
                            'mit',
                            'meinem',
                            'Freund',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Me siento tranquilo con mi amigo',
                                'correct' => [
                                    'me siento',
                                    'tranquilo',
                                    'con',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'hoy',
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
