<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation04Seeder extends Seeder
{
    private const PICTURES = [
        '友達' => 'friend',
        '母' => 'mother',
        '兄弟' => 'brother',
        '姉妹' => 'sister',
        '医者' => 'doctor',
        '家' => 'house',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 4, the Japanese twin of the
     * English "Unit 4: Talking About Feelings" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'ユニット4: 気持ちを話す', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 友達・母', 1,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'ja' => '幸せ',
                    ],
                    [
                        'ja' => '悲しい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '幸せ',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am happy',
                                'correct' => [
                                    'I am',
                                    'happy',
                                ],
                                'extra' => [
                                    'sad',
                                ],
                            ],
                            'az' => ['sentence' => 'mən xoşbəxt', 'correct' => ['mən', 'xoşbəxt'], 'extra' => ['kədərli']],
                            'ar' => ['sentence' => 'أنا فرح', 'correct' => ['أنا', 'فرح'], 'extra' => ['حزين']],
                            'ru' => ['sentence' => 'я счастливый', 'correct' => ['я', 'счастливый'], 'extra' => ['грустный']],
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
                            'tr' => ['sentence' => 'ben mutluyum', 'correct' => ['ben', 'mutluyum'], 'extra' => ['üzgün']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '友達',
                            'は',
                            '悲しい',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'mənim dost kədərli', 'correct' => ['mənim', 'dost', 'kədərli'], 'extra' => ['xoşbəxt']],
                            'ar' => ['sentence' => 'صديق حزين', 'correct' => ['صديق', 'حزين'], 'extra' => ['فرح']],
                            'ru' => ['sentence' => 'мой друг грустный', 'correct' => ['мой', 'друг', 'грустный'], 'extra' => ['счастливый']],
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
                            'tr' => ['sentence' => 'arkadaşım üzgün', 'correct' => ['arkadaşım', 'üzgün'], 'extra' => ['mutlu']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            '母',
                            'は',
                            '幸せ',
                            'です',
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
                            'az' => ['sentence' => 'mənim ana xoşbəxt', 'correct' => ['mənim', 'ana', 'xoşbəxt'], 'extra' => ['kədərli']],
                            'ar' => ['sentence' => 'أم فرح', 'correct' => ['أم', 'فرح'], 'extra' => ['حزين']],
                            'ru' => ['sentence' => 'мой мама счастливый', 'correct' => ['мой', 'мама', 'счастливый'], 'extra' => ['грустный']],
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
                            'tr' => ['sentence' => 'annem mutlu', 'correct' => ['annem', 'mutlu'], 'extra' => ['üzgün']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 兄弟・医者', 2,
                pictures: [
                    [
                        'ja' => '兄弟',
                        'img' => 'brother',
                    ],
                    [
                        'ja' => '医者',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'ja' => '疲れた',
                    ],
                    [
                        'ja' => '病気',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '疲れて',
                            'います',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am tired',
                                'correct' => [
                                    'I am',
                                    'tired',
                                ],
                                'extra' => [
                                    'sick',
                                ],
                            ],
                            'az' => ['sentence' => 'mən yorğun', 'correct' => ['mən', 'yorğun'], 'extra' => ['xəstə']],
                            'ar' => ['sentence' => 'أنا متعب', 'correct' => ['أنا', 'متعب'], 'extra' => ['مريض']],
                            'ru' => ['sentence' => 'я усталый', 'correct' => ['я', 'усталый'], 'extra' => ['больной']],
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
                            'tr' => ['sentence' => 'ben yorgunum', 'correct' => ['ben', 'yorgunum'], 'extra' => ['hasta']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '兄弟',
                            'は',
                            '病気',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'mənim qardaş xəstə', 'correct' => ['mənim', 'qardaş', 'xəstə'], 'extra' => ['yorğun']],
                            'ar' => ['sentence' => 'أخ مريض', 'correct' => ['أخ', 'مريض'], 'extra' => ['متعب']],
                            'ru' => ['sentence' => 'мой брат больной', 'correct' => ['мой', 'брат', 'больной'], 'extra' => ['усталый']],
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
                            'tr' => ['sentence' => 'kardeşim hasta', 'correct' => ['kardeşim', 'hasta'], 'extra' => ['yorgun']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '医者',
                            'と',
                            '私の',
                            '兄弟',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'həkim və mənim qardaş', 'correct' => ['həkim', 'və', 'mənim', 'qardaş'], 'extra' => ['xəstə']],
                            'ar' => ['sentence' => 'طبيب و أخ', 'correct' => ['طبيب', 'و', 'أخ'], 'extra' => ['مريض']],
                            'ru' => ['sentence' => 'врач и мой брат', 'correct' => ['врач', 'и', 'мой', 'брат'], 'extra' => ['больной']],
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
                            'tr' => ['sentence' => 'doktor ve kardeşim', 'correct' => ['doktor', 've', 'kardeşim'], 'extra' => ['hasta']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 姉妹・友達', 3,
                pictures: [
                    [
                        'ja' => '姉妹',
                        'img' => 'sister',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '嬉しい',
                    ],
                    [
                        'ja' => '落ち着いた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '嬉しい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am glad',
                                'correct' => [
                                    'I am',
                                    'glad',
                                ],
                                'extra' => [
                                    'calm',
                                ],
                            ],
                            'az' => ['sentence' => 'mən şad', 'correct' => ['mən', 'şad'], 'extra' => ['sakit']],
                            'ar' => ['sentence' => 'أنا سعيد', 'correct' => ['أنا', 'سعيد'], 'extra' => ['هادئ']],
                            'ru' => ['sentence' => 'я рада', 'correct' => ['я', 'рада'], 'extra' => ['спокойный']],
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
                            'tr' => ['sentence' => 'ben memnunum', 'correct' => ['ben', 'memnunum'], 'extra' => ['sakin']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '姉妹',
                            'は',
                            '落ち着いて',
                            'います',
                        ],
                        'blank' => 4,
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
                                ],
                            ],
                            'az' => ['sentence' => 'mənim bacı sakit', 'correct' => ['mənim', 'bacı', 'sakit'], 'extra' => ['şad']],
                            'ar' => ['sentence' => 'أخت هادئ', 'correct' => ['أخت', 'هادئ'], 'extra' => ['سعيد']],
                            'ru' => ['sentence' => 'мой сестра спокойный', 'correct' => ['мой', 'сестра', 'спокойный'], 'extra' => ['рада']],
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
                            'tr' => ['sentence' => 'kız kardeşim sakin', 'correct' => ['kız', 'kardeşim', 'sakin'], 'extra' => ['memnun']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            '友達',
                            'は',
                            '嬉しい',
                            'です',
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
                            'az' => ['sentence' => 'mənim dost şad', 'correct' => ['mənim', 'dost', 'şad'], 'extra' => ['sakit']],
                            'ar' => ['sentence' => 'صديق سعيد', 'correct' => ['صديق', 'سعيد'], 'extra' => ['هادئ']],
                            'ru' => ['sentence' => 'мой друг рада', 'correct' => ['мой', 'друг', 'рада'], 'extra' => ['спокойный']],
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
                            'tr' => ['sentence' => 'arkadaşım memnun', 'correct' => ['arkadaşım', 'memnun'], 'extra' => ['sakin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 母・家', 4,
                pictures: [
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '少し',
                    ],
                    [
                        'ja' => 'なぜなら',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '少し',
                            '疲れて',
                            'います',
                        ],
                        'blank' => 4,
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
                                ],
                            ],
                            'az' => ['sentence' => 'mən az yorğun', 'correct' => ['mən', 'az', 'yorğun'], 'extra' => ['çünki']],
                            'ar' => ['sentence' => 'أنا قليل متعب', 'correct' => ['أنا', 'قليل', 'متعب'], 'extra' => ['لأن']],
                            'ru' => ['sentence' => 'я немного усталый', 'correct' => ['я', 'немного', 'усталый'], 'extra' => ['потому что']],
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
                            'tr' => ['sentence' => 'ben biraz yorgunum', 'correct' => ['ben', 'biraz', 'yorgunum'], 'extra' => ['çünkü']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '母',
                            'が',
                            'いる',
                            'から',
                            '幸せ',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'xoşbəxt çünki mənim ana', 'correct' => ['xoşbəxt', 'çünki', 'mənim', 'ana'], 'extra' => ['az']],
                            'ar' => ['sentence' => 'فرح لأن أم', 'correct' => ['فرح', 'لأن', 'أم'], 'extra' => ['قليل']],
                            'ru' => ['sentence' => 'счастливый потому что мой мама', 'correct' => ['счастливый', 'потому что', 'мой', 'мама'], 'extra' => ['немного']],
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
                            'tr' => ['sentence' => 'mutlu çünkü annem', 'correct' => ['mutlu', 'çünkü', 'annem'], 'extra' => ['biraz']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '家',
                            'で',
                            '少し',
                            '悲しい',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'az kədərli içində ev', 'correct' => ['az', 'kədərli', 'içində', 'ev'], 'extra' => ['çünki']],
                            'ar' => ['sentence' => 'قليل حزين في بيت', 'correct' => ['قليل', 'حزين', 'في', 'بيت'], 'extra' => ['لأن']],
                            'ru' => ['sentence' => 'немного грустный в дом', 'correct' => ['немного', 'грустный', 'в', 'дом'], 'extra' => ['потому что']],
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
                            'tr' => ['sentence' => 'evde biraz üzgün', 'correct' => ['evde', 'biraz', 'üzgün'], 'extra' => ['çünkü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 友達・姉妹', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '姉妹',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は感じる',
                    ],
                    [
                        'ja' => '今日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '今日',
                            'は',
                            '幸せ',
                            'に',
                            '感じる',
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
                                ],
                            ],
                            'az' => ['sentence' => 'hiss edirəm xoşbəxt bu gün', 'correct' => ['hiss edirəm', 'xoşbəxt', 'bu gün'], 'extra' => ['kədərli']],
                            'ar' => ['sentence' => 'أشعر فرح اليوم', 'correct' => ['أشعر', 'فرح', 'اليوم'], 'extra' => ['حزين']],
                            'ru' => ['sentence' => 'я чувствую счастливый сегодня', 'correct' => ['я', 'чувствую', 'счастливый', 'сегодня'], 'extra' => ['грустный']],
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
                            'tr' => ['sentence' => 'bugün mutlu hissediyorum', 'correct' => ['bugün', 'mutlu', 'hissediyorum'], 'extra' => ['üzgün']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '姉妹',
                            'は',
                            '今日',
                            '嬉しい',
                            'です',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'mənim bacı şad bu gün', 'correct' => ['mənim', 'bacı', 'şad', 'bu gün'], 'extra' => ['hiss edirəm']],
                            'ar' => ['sentence' => 'أخت سعيد اليوم', 'correct' => ['أخت', 'سعيد', 'اليوم'], 'extra' => ['أشعر']],
                            'ru' => ['sentence' => 'мой сестра рада сегодня', 'correct' => ['мой', 'сестра', 'рада', 'сегодня'], 'extra' => ['я', 'чувствую']],
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
                            'tr' => ['sentence' => 'kız kardeşim bugün memnun', 'correct' => ['kız', 'kardeşim', 'bugün', 'memnun'], 'extra' => ['hissediyorum']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '友達',
                            'と',
                            'いる',
                            'と',
                            '落ち着いて',
                            '感じる',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'hiss edirəm sakit ilə mənim dost', 'correct' => ['hiss edirəm', 'sakit', 'ilə', 'mənim', 'dost'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'أشعر هادئ مع صديق', 'correct' => ['أشعر', 'هادئ', 'مع', 'صديق'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'я чувствую спокойный с мой друг', 'correct' => ['я', 'чувствую', 'спокойный', 'с', 'мой', 'друг'], 'extra' => ['сегодня']],
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
                            'tr' => ['sentence' => 'arkadaşımla sakin hissediyorum', 'correct' => ['arkadaşımla', 'sakin', 'hissediyorum'], 'extra' => ['bugün']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
