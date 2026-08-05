<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation09Seeder extends Seeder
{
    private const PICTURES = [
        'Book' => 'book', 'Coffee' => 'coffee', 'Tea' => 'tea', 'House' => 'house',
        'Friend' => 'friend', 'School' => 'school',
    ];

    /**
     * English Chapter 2, Unit 9 — expressing opinions.
     *
     * "I think", "I believe", true/false, "I prefer", better — the frames for
     * saying what you reckon, tried out on the everyday things the learner can
     * already name.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Expressing Opinions', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Think', 1,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Coffee', 'img' => 'coffee']],
                plain: [['en' => 'I think'], ['en' => 'Good']],
                phrases: [
                    'a' => [
                        'words' => ['I think', 'the', 'book', 'is', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que el libro es bueno', 'correct' => ['creo', 'el', 'libro', 'es', 'bueno'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich denke das Buch ist gut', 'correct' => ['ich denke', 'das', 'Buch', 'ist', 'gut'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '本は良いと思う', 'correct' => ['本', 'は', '良い', 'と', '思う'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '책이 좋다고 생각한다', 'correct' => ['책이', '좋다고', '생각한다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Je pense que le livre est bon', 'correct' => ['je pense', 'le', 'livre', 'est', 'bon'], 'extra' => ['café']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I think', 'the', 'coffee', 'is', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que el café es bueno', 'correct' => ['creo', 'el', 'café', 'es', 'bueno'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ich denke der Kaffee ist gut', 'correct' => ['ich denke', 'der', 'Kaffee', 'ist', 'gut'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'コーヒーは良いと思う', 'correct' => ['コーヒー', 'は', '良い', 'と', '思う'], 'extra' => ['本']],
                            'ko' => ['sentence' => '커피가 좋다고 생각한다', 'correct' => ['커피가', '좋다고', '생각한다'], 'extra' => ['책']],
                            'fr' => ['sentence' => 'Je pense que le café est bon', 'correct' => ['je pense', 'le', 'café', 'est', 'bon'], 'extra' => ['livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'book', 'and', 'the', 'coffee'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El libro y el café', 'correct' => ['el', 'libro', 'y', 'el', 'café'], 'extra' => ['creo']],
                            'de' => ['sentence' => 'Das Buch und der Kaffee', 'correct' => ['das', 'Buch', 'und', 'der', 'Kaffee'], 'extra' => ['ich denke']],
                            'ja' => ['sentence' => '本とコーヒー', 'correct' => ['本', 'と', 'コーヒー'], 'extra' => ['私は思う']],
                            'ko' => ['sentence' => '책과 커피', 'correct' => ['책과', '커피'], 'extra' => ['나는 생각한다']],
                            'fr' => ['sentence' => 'Le livre et le café', 'correct' => ['le', 'livre', 'et', 'le', 'café'], 'extra' => ['je pense']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Believe', 2,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Tea', 'img' => 'tea']],
                plain: [['en' => 'I believe'], ['en' => 'Better']],
                phrases: [
                    'a' => [
                        'words' => ['I believe', 'coffee', 'is', 'better'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que el café es mejor', 'correct' => ['creo que', 'café', 'es', 'mejor'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich glaube Kaffee ist besser', 'correct' => ['ich glaube', 'Kaffee', 'ist', 'besser'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーの方が良いと信じる', 'correct' => ['コーヒー', 'の', '方', 'が', '良い', 'と', '信じる'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피가 더 좋다고 믿는다', 'correct' => ['커피가', '더', '좋다고', '믿는다'], 'extra' => ['차']],
                            'fr' => ['sentence' => 'Je crois que le café est meilleur', 'correct' => ['je crois', 'café', 'est', 'meilleur'], 'extra' => ['thé']],
                        ],
                    ],
                    'b' => [
                        'words' => ['tea', 'is', 'better'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El té es mejor', 'correct' => ['té', 'es', 'mejor'], 'extra' => ['café', 'creo que']],
                            'de' => ['sentence' => 'Tee ist besser', 'correct' => ['Tee', 'ist', 'besser'], 'extra' => ['Kaffee', 'ich glaube']],
                            'ja' => ['sentence' => 'お茶の方が良い', 'correct' => ['お茶', 'の', '方', 'が', '良い'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차가 더 좋다', 'correct' => ['차가', '더', '좋다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Le thé est meilleur', 'correct' => ['thé', 'est', 'meilleur'], 'extra' => ['café']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I believe', 'tea', 'is', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que el té es bueno', 'correct' => ['creo que', 'té', 'es', 'bueno'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Ich glaube Tee ist gut', 'correct' => ['ich glaube', 'Tee', 'ist', 'gut'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'お茶は良いと信じる', 'correct' => ['お茶', 'は', '良い', 'と', '信じる'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '차가 좋다고 믿는다', 'correct' => ['차가', '좋다고', '믿는다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Je crois que le thé est bon', 'correct' => ['je crois', 'thé', 'est', 'bon'], 'extra' => ['meilleur']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: True & False', 3,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'True'], ['en' => 'False']],
                phrases: [
                    'a' => [
                        'words' => ['it', 'is', 'true'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Es verdadero', 'correct' => ['eso', 'es', 'verdadero'], 'extra' => ['falso', 'libro']],
                            'de' => ['sentence' => 'Es ist wahr', 'correct' => ['es', 'ist', 'wahr'], 'extra' => ['falsch', 'Buch']],
                            'ja' => ['sentence' => 'それは本当です', 'correct' => ['それ', 'は', '本当', 'です'], 'extra' => ['偽']],
                            'ko' => ['sentence' => '그것은 사실이다', 'correct' => ['그것은', '사실이다'], 'extra' => ['거짓']],
                            'fr' => ['sentence' => "C'est vrai", 'correct' => ['ce', 'est', 'vrai'], 'extra' => ['faux', 'livre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['it', 'is', 'false'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Es falso', 'correct' => ['eso', 'es', 'falso'], 'extra' => ['verdadero', 'casa']],
                            'de' => ['sentence' => 'Es ist falsch', 'correct' => ['es', 'ist', 'falsch'], 'extra' => ['wahr', 'Haus']],
                            'ja' => ['sentence' => 'それは偽です', 'correct' => ['それ', 'は', '偽', 'です'], 'extra' => ['本当']],
                            'ko' => ['sentence' => '그것은 거짓이다', 'correct' => ['그것은', '거짓이다'], 'extra' => ['사실']],
                            'fr' => ['sentence' => "C'est faux", 'correct' => ['ce', 'est', 'faux'], 'extra' => ['vrai', 'maison']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'book', 'or', 'the', 'house'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El libro o la casa', 'correct' => ['el', 'libro', 'o', 'la', 'casa'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Das Buch oder das Haus', 'correct' => ['das', 'Buch', 'oder', 'das', 'Haus'], 'extra' => ['wahr']],
                            'ja' => ['sentence' => '本か家', 'correct' => ['本', 'か', '家'], 'extra' => ['本当']],
                            'ko' => ['sentence' => '책 또는 집', 'correct' => ['책', '또는', '집'], 'extra' => ['사실']],
                            'fr' => ['sentence' => 'Le livre ou la maison', 'correct' => ['le', 'livre', 'ou', 'la', 'maison'], 'extra' => ['vrai']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Prefer & Better', 4,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Book', 'img' => 'book']],
                plain: [['en' => 'I prefer'], ['en' => 'Better']],
                phrases: [
                    'a' => [
                        'words' => ['I prefer', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Prefiero el café', 'correct' => ['prefiero', 'café'], 'extra' => ['mejor', 'libro']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich bevorzuge', 'Kaffee'], 'extra' => ['besser', 'Buch']],
                            'ja' => ['sentence' => '私はコーヒーを好む', 'correct' => ['私', 'は', 'コーヒー', 'を', '好む'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '나는 커피를 선호한다', 'correct' => ['나는', '커피를', '선호한다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Je préfère le café', 'correct' => ['je préfère', 'café'], 'extra' => ['meilleur', 'livre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['this', 'book', 'is', 'better'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['prefiero', 'café']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieser', 'Buch', 'ist', 'besser'], 'extra' => ['ich bevorzuge', 'Kaffee']],
                            'ja' => ['sentence' => 'この本の方が良い', 'correct' => ['この', '本', 'の', '方', 'が', '良い'], 'extra' => ['私は好む']],
                            'ko' => ['sentence' => '이 책이 더 좋다', 'correct' => ['이', '책이', '더', '좋다'], 'extra' => ['나는 선호한다']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['je préfère']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I prefer', 'this', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Prefiero este libro', 'correct' => ['prefiero', 'este', 'libro'], 'extra' => ['café', 'mejor']],
                            'de' => ['sentence' => 'Ich bevorzuge dieses Buch', 'correct' => ['ich bevorzuge', 'dieser', 'Buch'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私はこの本を好む', 'correct' => ['私', 'は', 'この', '本', 'を', '好む'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '나는 이 책을 선호한다', 'correct' => ['나는', '이', '책을', '선호한다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Je préfère ce livre', 'correct' => ['je préfère', 'ce', 'livre'], 'extra' => ['café']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Think It Is True', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'School', 'img' => 'school']],
                plain: [['en' => 'I think'], ['en' => 'True']],
                phrases: [
                    'a' => [
                        'words' => ['I think', 'it', 'is', 'true'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que es verdadero', 'correct' => ['creo', 'eso', 'es', 'verdadero'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich denke es ist wahr', 'correct' => ['ich denke', 'es', 'ist', 'wahr'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'それは本当だと思う', 'correct' => ['それ', 'は', '本当', 'だ', 'と', '思う'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '그것이 사실이라고 생각한다', 'correct' => ['그것이', '사실이라고', '생각한다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => "Je pense que c'est vrai", 'correct' => ['je pense', 'ce', 'est', 'vrai'], 'extra' => ['ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'and', 'the', 'school'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo y la escuela', 'correct' => ['mi', 'amigo', 'y', 'la', 'escuela'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Mein Freund und die Schule', 'correct' => ['mein', 'Freund', 'und', 'die', 'Schule'], 'extra' => ['wahr']],
                            'ja' => ['sentence' => '私の友達と学校', 'correct' => ['私の', '友達', 'と', '学校'], 'extra' => ['本当']],
                            'ko' => ['sentence' => '나의 친구와 학교', 'correct' => ['나의', '친구와', '학교'], 'extra' => ['사실']],
                            'fr' => ['sentence' => "Mon ami et l'école", 'correct' => ['mon', 'ami', 'et', 'école'], 'extra' => ['vrai']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I think', 'the', 'school', 'is', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Creo que la escuela es buena', 'correct' => ['creo', 'la', 'escuela', 'es', 'bueno'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Ich denke die Schule ist gut', 'correct' => ['ich denke', 'die', 'Schule', 'ist', 'gut'], 'extra' => ['wahr']],
                            'ja' => ['sentence' => '学校は良いと思う', 'correct' => ['学校', 'は', '良い', 'と', '思う'], 'extra' => ['本当']],
                            'ko' => ['sentence' => '학교가 좋다고 생각한다', 'correct' => ['학교가', '좋다고', '생각한다'], 'extra' => ['사실']],
                            'fr' => ['sentence' => "Je pense que l'école est bonne", 'correct' => ['je pense', 'école', 'est', 'bon'], 'extra' => ['vrai']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
