<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation04Seeder extends Seeder
{
    private const PICTURES = [
        'Ami' => 'friend', 'Mère' => 'mother', 'Père' => 'father', 'Frère' => 'brother',
        'Sœur' => 'sister', 'Professeur' => 'teacher', 'Médecin' => 'doctor', 'Maison' => 'house',
    ];

    /**
     * French Chapter 2, Unit 4 — talking about feelings.
     *
     * Feelings can't be drawn, so the picture questions use the people the
     * feelings are about (learned in Chapter 1 Unit 3) and every adjective is
     * attached to a person: "mon père est malade", "ma sœur est calme".
     * Masculine forms are used throughout so the learner isn't hit with
     * adjective agreement before it has been taught.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Talking About Feelings', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Happy & Sad', 1,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Mère', 'img' => 'mother']],
                plain: [['fr' => 'Content'], ['fr' => 'Triste']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'content'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am happy', 'correct' => ['I am', 'happy'], 'extra' => ['sad', 'friend']],
                            'es' => ['sentence' => 'Soy contento', 'correct' => ['soy', 'contento'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich bin zufrieden', 'correct' => ['ich bin', 'zufrieden'], 'extra' => ['traurig', 'Freund']],
                            'ja' => ['sentence' => '私は満足しています', 'correct' => ['私', 'は', '満足して', 'います'], 'extra' => ['悲しい', '友達']],
                            'ko' => ['sentence' => '저는 만족합니다', 'correct' => ['저는', '만족합니다'], 'extra' => ['슬픈', '친구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je suis', 'triste'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am sad', 'correct' => ['I am', 'sad'], 'extra' => ['happy', 'mother']],
                            'es' => ['sentence' => 'Soy triste', 'correct' => ['soy', 'triste'], 'extra' => ['contento', 'madre']],
                            'de' => ['sentence' => 'Ich bin traurig', 'correct' => ['ich bin', 'traurig'], 'extra' => ['zufrieden', 'Mutter']],
                            'ja' => ['sentence' => '私は悲しいです', 'correct' => ['私', 'は', '悲しい', 'です'], 'extra' => ['満足した', '母']],
                            'ko' => ['sentence' => '저는 슬픕니다', 'correct' => ['저는', '슬픕니다'], 'extra' => ['만족한', '어머니']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'ami', 'est', 'content', 'et', 'ma', 'mère', 'est', 'triste'], 'blank' => 6,
                        'tr' => [
                            'en' => ['sentence' => 'My friend is happy and my mother is sad', 'correct' => ['my', 'friend', 'is', 'happy', 'and', 'my', 'mother', 'is', 'sad'], 'extra' => ['tired']],
                            'es' => ['sentence' => 'Mi amigo es contento y mi madre es triste', 'correct' => ['mi', 'amigo', 'es', 'contento', 'y', 'mi', 'madre', 'es', 'triste'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Mein Freund ist zufrieden und meine Mutter ist traurig', 'correct' => ['mein', 'Freund', 'ist', 'zufrieden', 'und', 'meine', 'Mutter', 'ist', 'traurig'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私の友達は満足していて母は悲しいです', 'correct' => ['私の', '友達', 'は', '満足して', 'いて', '母', 'は', '悲しい', 'です'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '나의 친구는 만족하고 어머니는 슬픕니다', 'correct' => ['나의', '친구는', '만족하고', '어머니는', '슬픕니다'], 'extra' => ['피곤한']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Tired & Sick', 2,
                pictures: [['fr' => 'Père', 'img' => 'father'], ['fr' => 'Frère', 'img' => 'brother']],
                plain: [['fr' => 'Fatigué'], ['fr' => 'Malade']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'fatigué'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am tired', 'correct' => ['I am', 'tired'], 'extra' => ['sick', 'father']],
                            'es' => ['sentence' => 'Soy cansado', 'correct' => ['soy', 'cansado'], 'extra' => ['enfermo', 'padre']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank', 'Vater']],
                            'ja' => ['sentence' => '私は疲れています', 'correct' => ['私', 'は', '疲れて', 'います'], 'extra' => ['病気の', '父']],
                            'ko' => ['sentence' => '저는 피곤합니다', 'correct' => ['저는', '피곤합니다'], 'extra' => ['아픈', '아버지']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mon', 'père', 'est', 'malade'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My father is sick', 'correct' => ['my', 'father', 'is', 'sick'], 'extra' => ['tired']],
                            'es' => ['sentence' => 'Mi padre es enfermo', 'correct' => ['mi', 'padre', 'es', 'enfermo'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Mein Vater ist krank', 'correct' => ['mein', 'Vater', 'ist', 'krank'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私の父は病気です', 'correct' => ['私の', '父', 'は', '病気', 'です'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '나의 아버지는 아픕니다', 'correct' => ['나의', '아버지는', '아픕니다'], 'extra' => ['피곤한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'frère', 'est', 'fatigué'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My brother is tired', 'correct' => ['my', 'brother', 'is', 'tired'], 'extra' => ['sick']],
                            'es' => ['sentence' => 'Mi hermano es cansado', 'correct' => ['mi', 'hermano', 'es', 'cansado'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Mein Bruder ist müde', 'correct' => ['mein', 'Bruder', 'ist', 'müde'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '私の兄弟は疲れています', 'correct' => ['私の', '兄弟', 'は', '疲れて', 'います'], 'extra' => ['病気の']],
                            'ko' => ['sentence' => '나의 형제는 피곤합니다', 'correct' => ['나의', '형제는', '피곤합니다'], 'extra' => ['아픈']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Glad & Calm', 3,
                pictures: [['fr' => 'Sœur', 'img' => 'sister'], ['fr' => 'Professeur', 'img' => 'teacher']],
                plain: [['fr' => 'Heureux'], ['fr' => 'Calme']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'heureux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am glad', 'correct' => ['I am', 'glad'], 'extra' => ['calm', 'sister']],
                            'es' => ['sentence' => 'Soy feliz', 'correct' => ['soy', 'feliz'], 'extra' => ['tranquilo', 'hermana']],
                            'de' => ['sentence' => 'Ich bin glücklich', 'correct' => ['ich bin', 'glücklich'], 'extra' => ['ruhig', 'Schwester']],
                            'ja' => ['sentence' => '私は嬉しいです', 'correct' => ['私', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた', '姉妹']],
                            'ko' => ['sentence' => '저는 기쁩니다', 'correct' => ['저는', '기쁩니다'], 'extra' => ['차분한', '자매']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'sœur', 'est', 'calme'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My sister is calm', 'correct' => ['my', 'sister', 'is', 'calm'], 'extra' => ['glad']],
                            'es' => ['sentence' => 'Mi hermana es tranquila', 'correct' => ['mi', 'hermana', 'es', 'tranquilo'], 'extra' => ['feliz']],
                            'de' => ['sentence' => 'Meine Schwester ist ruhig', 'correct' => ['meine', 'Schwester', 'ist', 'ruhig'], 'extra' => ['glücklich']],
                            'ja' => ['sentence' => '私の姉妹は落ち着いています', 'correct' => ['私の', '姉妹', 'は', '落ち着いて', 'います'], 'extra' => ['嬉しい']],
                            'ko' => ['sentence' => '나의 자매는 차분합니다', 'correct' => ['나의', '자매는', '차분합니다'], 'extra' => ['기쁜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'professeur', 'est', 'heureux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The teacher is glad', 'correct' => ['the', 'teacher', 'is', 'glad'], 'extra' => ['calm']],
                            'es' => ['sentence' => 'El profesor es feliz', 'correct' => ['el', 'profesor', 'es', 'feliz'], 'extra' => ['tranquilo']],
                            'de' => ['sentence' => 'Der Lehrer ist glücklich', 'correct' => ['der', 'Lehrer', 'ist', 'glücklich'], 'extra' => ['ruhig']],
                            'ja' => ['sentence' => '先生は嬉しいです', 'correct' => ['先生', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた']],
                            'ko' => ['sentence' => '선생님은 기쁩니다', 'correct' => ['선생님은', '기쁩니다'], 'extra' => ['차분한']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: A Little & Because', 4,
                pictures: [['fr' => 'Médecin', 'img' => 'doctor'], ['fr' => 'Ami', 'img' => 'friend']],
                plain: [['fr' => 'Un peu'], ['fr' => 'Parce que']],
                phrases: [
                    'a' => [
                        'words' => ['un peu', 'fatigué'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A little tired', 'correct' => ['a little', 'tired'], 'extra' => ['because', 'doctor']],
                            'es' => ['sentence' => 'Un poco cansado', 'correct' => ['un poco', 'cansado'], 'extra' => ['porque', 'médico']],
                            'de' => ['sentence' => 'Ein wenig müde', 'correct' => ['ein wenig', 'müde'], 'extra' => ['weil', 'Arzt']],
                            'ja' => ['sentence' => '少し疲れた', 'correct' => ['少し', '疲れた'], 'extra' => ['なぜなら', '医者']],
                            'ko' => ['sentence' => '조금 피곤한', 'correct' => ['조금', '피곤한'], 'extra' => ['왜냐하면', '의사']],
                        ],
                    ],
                    'b' => [
                        'words' => ['parce que', 'je suis', 'malade'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Because I am sick', 'correct' => ['because', 'I am', 'sick'], 'extra' => ['a little']],
                            'es' => ['sentence' => 'Porque soy enfermo', 'correct' => ['porque', 'soy', 'enfermo'], 'extra' => ['un poco']],
                            'de' => ['sentence' => 'Weil ich krank bin', 'correct' => ['weil', 'ich bin', 'krank'], 'extra' => ['ein wenig']],
                            'ja' => ['sentence' => 'なぜなら私は病気です', 'correct' => ['なぜなら', '私', 'は', '病気', 'です'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '왜냐하면 저는 아픕니다', 'correct' => ['왜냐하면', '저는', '아픕니다'], 'extra' => ['조금']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'médecin', 'et', 'mon', 'ami'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The doctor and my friend', 'correct' => ['the', 'doctor', 'and', 'my', 'friend'], 'extra' => ['sick']],
                            'es' => ['sentence' => 'El médico y mi amigo', 'correct' => ['el', 'médico', 'y', 'mi', 'amigo'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Der Arzt und mein Freund', 'correct' => ['der', 'Arzt', 'und', 'mein', 'Freund'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '医者と私の友達', 'correct' => ['医者', 'と', '私の', '友達'], 'extra' => ['病気の']],
                            'ko' => ['sentence' => '의사와 나의 친구', 'correct' => ['의사와', '나의', '친구'], 'extra' => ['아픈']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How I Feel Today', 5,
                pictures: [['fr' => 'Mère', 'img' => 'mother'], ['fr' => 'Père', 'img' => 'father']],
                plain: [['fr' => 'Content'], ['fr' => 'Fatigué']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'content', "aujourd'hui"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am happy today', 'correct' => ['I am', 'happy', 'today'], 'extra' => ['tired']],
                            'es' => ['sentence' => 'Soy contento hoy', 'correct' => ['soy', 'contento', 'hoy'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Ich bin heute zufrieden', 'correct' => ['ich bin', 'heute', 'zufrieden'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私は今日満足しています', 'correct' => ['私', 'は', '今日', '満足して', 'います'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '저는 오늘 만족합니다', 'correct' => ['저는', '오늘', '만족합니다'], 'extra' => ['피곤한']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mon', 'père', 'est', 'fatigué'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My father is tired', 'correct' => ['my', 'father', 'is', 'tired'], 'extra' => ['happy']],
                            'es' => ['sentence' => 'Mi padre es cansado', 'correct' => ['mi', 'padre', 'es', 'cansado'], 'extra' => ['contento']],
                            'de' => ['sentence' => 'Mein Vater ist müde', 'correct' => ['mein', 'Vater', 'ist', 'müde'], 'extra' => ['zufrieden']],
                            'ja' => ['sentence' => '私の父は疲れています', 'correct' => ['私の', '父', 'は', '疲れて', 'います'], 'extra' => ['満足した']],
                            'ko' => ['sentence' => '나의 아버지는 피곤합니다', 'correct' => ['나의', '아버지는', '피곤합니다'], 'extra' => ['만족한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ma', 'mère', 'et', 'mon', 'père'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['happy']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['contento']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['zufrieden']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['満足した']],
                            'ko' => ['sentence' => '어머니와 아버지', 'correct' => ['어머니와', '아버지'], 'extra' => ['만족한']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
