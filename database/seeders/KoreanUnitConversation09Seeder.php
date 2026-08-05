<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation09Seeder extends Seeder
{
    private const PICTURES = ['책' => 'book', '커피' => 'coffee', '차' => 'tea', '집' => 'house', '친구' => 'friend', '학교' => 'school'];

    /**
     * Korean Conversation, Unit 9, the Korean twin of the English "Expressing Opinions" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, '유닛 9: 의견 말하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 책 · 커피', 1,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '커피', 'img' => 'coffee']],
                plain: [['ko' => '나는 생각한다'], ['ko' => '좋은']],
                phrases: [
                    'a' => [
                        'words' => ['책이', '좋다고', '생각한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I think the book is good', 'correct' => ['I think', 'the', 'book', 'is', 'good'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Creo que el libro es bueno', 'correct' => ['creo', 'el', 'libro', 'es', 'bueno'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich denke das Buch ist gut', 'correct' => ['ich denke', 'das', 'Buch', 'ist', 'gut'], 'extra' => ['Kaffee']],
                            'fr' => ['sentence' => 'Je pense que le livre est bon', 'correct' => ['je pense', 'le', 'livre', 'est', 'bon'], 'extra' => ['café']],
                            'ja' => ['sentence' => '本は良いと思う', 'correct' => ['本', 'は', '良い', 'と', '思う'], 'extra' => ['コーヒー']],
                        ],
                    ],
                    'b' => [
                        'words' => ['커피가', '좋다고', '생각한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I think the coffee is good', 'correct' => ['I think', 'the', 'coffee', 'is', 'good'], 'extra' => ['book']],
                            'es' => ['sentence' => 'Creo que el café es bueno', 'correct' => ['creo', 'el', 'café', 'es', 'bueno'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ich denke der Kaffee ist gut', 'correct' => ['ich denke', 'der', 'Kaffee', 'ist', 'gut'], 'extra' => ['Buch']],
                            'fr' => ['sentence' => 'Je pense que le café est bon', 'correct' => ['je pense', 'le', 'café', 'est', 'bon'], 'extra' => ['livre']],
                            'ja' => ['sentence' => 'コーヒーは良いと思う', 'correct' => ['コーヒー', 'は', '良い', 'と', '思う'], 'extra' => ['本']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '커피'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the book and the coffee', 'correct' => ['the', 'book', 'and', 'the', 'coffee'], 'extra' => ['I think']],
                            'es' => ['sentence' => 'El libro y el café', 'correct' => ['el', 'libro', 'y', 'el', 'café'], 'extra' => ['creo']],
                            'de' => ['sentence' => 'Das Buch und der Kaffee', 'correct' => ['das', 'Buch', 'und', 'der', 'Kaffee'], 'extra' => ['ich denke']],
                            'fr' => ['sentence' => 'Le livre et le café', 'correct' => ['le', 'livre', 'et', 'le', 'café'], 'extra' => ['je pense']],
                            'ja' => ['sentence' => '本とコーヒー', 'correct' => ['本', 'と', 'コーヒー'], 'extra' => ['私は思う']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 커피 · 차', 2,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '차', 'img' => 'tea']],
                plain: [['ko' => '나는 믿는다'], ['ko' => '더 좋은']],
                phrases: [
                    'a' => [
                        'words' => ['커피가', '더', '좋다고', '믿는다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I believe coffee is better', 'correct' => ['I believe', 'coffee', 'is', 'better'], 'extra' => ['tea']],
                            'es' => ['sentence' => 'Creo que el café es mejor', 'correct' => ['creo que', 'café', 'es', 'mejor'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich glaube Kaffee ist besser', 'correct' => ['ich glaube', 'Kaffee', 'ist', 'besser'], 'extra' => ['Tee']],
                            'fr' => ['sentence' => 'Je crois que le café est meilleur', 'correct' => ['je crois', 'café', 'est', 'meilleur'], 'extra' => ['thé']],
                            'ja' => ['sentence' => 'コーヒーの方が良いと信じる', 'correct' => ['コーヒー', 'の', '方', 'が', '良い', 'と', '信じる'], 'extra' => ['お茶']],
                        ],
                    ],
                    'b' => [
                        'words' => ['차가', '더', '좋다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'tea is better', 'correct' => ['tea', 'is', 'better'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'El té es mejor', 'correct' => ['té', 'es', 'mejor'], 'extra' => ['café', 'creo que']],
                            'de' => ['sentence' => 'Tee ist besser', 'correct' => ['Tee', 'ist', 'besser'], 'extra' => ['Kaffee', 'ich glaube']],
                            'fr' => ['sentence' => 'Le thé est meilleur', 'correct' => ['thé', 'est', 'meilleur'], 'extra' => ['café']],
                            'ja' => ['sentence' => 'お茶の方が良い', 'correct' => ['お茶', 'の', '方', 'が', '良い'], 'extra' => ['コーヒー']],
                        ],
                    ],
                    'c' => [
                        'words' => ['차가', '좋다고', '믿는다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I believe tea is good', 'correct' => ['I believe', 'tea', 'is', 'good'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Creo que el té es bueno', 'correct' => ['creo que', 'té', 'es', 'bueno'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Ich glaube Tee ist gut', 'correct' => ['ich glaube', 'Tee', 'ist', 'gut'], 'extra' => ['besser']],
                            'fr' => ['sentence' => 'Je crois que le thé est bon', 'correct' => ['je crois', 'thé', 'est', 'bon'], 'extra' => ['meilleur']],
                            'ja' => ['sentence' => 'お茶は良いと信じる', 'correct' => ['お茶', 'は', '良い', 'と', '信じる'], 'extra' => ['もっと良い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 책 · 집', 3,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '사실'], ['ko' => '거짓']],
                phrases: [
                    'a' => [
                        'words' => ['그것은', '사실이다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'it is true', 'correct' => ['it', 'is', 'true'], 'extra' => ['false']],
                            'es' => ['sentence' => 'Es verdadero', 'correct' => ['eso', 'es', 'verdadero'], 'extra' => ['falso', 'libro']],
                            'de' => ['sentence' => 'Es ist wahr', 'correct' => ['es', 'ist', 'wahr'], 'extra' => ['falsch', 'Buch']],
                            'fr' => ['sentence' => 'C\'est vrai', 'correct' => ['ce', 'est', 'vrai'], 'extra' => ['faux', 'livre']],
                            'ja' => ['sentence' => 'それは本当です', 'correct' => ['それ', 'は', '本当', 'です'], 'extra' => ['偽']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그것은', '거짓이다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'it is false', 'correct' => ['it', 'is', 'false'], 'extra' => ['true']],
                            'es' => ['sentence' => 'Es falso', 'correct' => ['eso', 'es', 'falso'], 'extra' => ['verdadero', 'casa']],
                            'de' => ['sentence' => 'Es ist falsch', 'correct' => ['es', 'ist', 'falsch'], 'extra' => ['wahr', 'Haus']],
                            'fr' => ['sentence' => 'C\'est faux', 'correct' => ['ce', 'est', 'faux'], 'extra' => ['vrai', 'maison']],
                            'ja' => ['sentence' => 'それは偽です', 'correct' => ['それ', 'は', '偽', 'です'], 'extra' => ['本当']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책', '또는', '집'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the book or the house', 'correct' => ['the', 'book', 'or', 'the', 'house'], 'extra' => ['true']],
                            'es' => ['sentence' => 'El libro o la casa', 'correct' => ['el', 'libro', 'o', 'la', 'casa'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Das Buch oder das Haus', 'correct' => ['das', 'Buch', 'oder', 'das', 'Haus'], 'extra' => ['wahr']],
                            'fr' => ['sentence' => 'Le livre ou la maison', 'correct' => ['le', 'livre', 'ou', 'la', 'maison'], 'extra' => ['vrai']],
                            'ja' => ['sentence' => '本か家', 'correct' => ['本', 'か', '家'], 'extra' => ['本当']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 커피 · 책', 4,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '책', 'img' => 'book']],
                plain: [['ko' => '나는 선호한다'], ['ko' => '더 좋은']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '커피를', '선호한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I prefer coffee', 'correct' => ['I prefer', 'coffee'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Prefiero el café', 'correct' => ['prefiero', 'café'], 'extra' => ['mejor', 'libro']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich bevorzuge', 'Kaffee'], 'extra' => ['besser', 'Buch']],
                            'fr' => ['sentence' => 'Je préfère le café', 'correct' => ['je préfère', 'café'], 'extra' => ['meilleur', 'livre']],
                            'ja' => ['sentence' => '私はコーヒーを好む', 'correct' => ['私', 'は', 'コーヒー', 'を', '好む'], 'extra' => ['もっと良い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['이', '책이', '더', '좋다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'this book is better', 'correct' => ['this', 'book', 'is', 'better'], 'extra' => ['I prefer']],
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['prefiero', 'café']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieser', 'Buch', 'ist', 'besser'], 'extra' => ['ich bevorzuge', 'Kaffee']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['je préfère']],
                            'ja' => ['sentence' => 'この本の方が良い', 'correct' => ['この', '本', 'の', '方', 'が', '良い'], 'extra' => ['私は好む']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저는', '이', '책을', '선호한다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I prefer this book', 'correct' => ['I prefer', 'this', 'book'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Prefiero este libro', 'correct' => ['prefiero', 'este', 'libro'], 'extra' => ['café', 'mejor']],
                            'de' => ['sentence' => 'Ich bevorzuge dieses Buch', 'correct' => ['ich bevorzuge', 'dieser', 'Buch'], 'extra' => ['Kaffee']],
                            'fr' => ['sentence' => 'Je préfère ce livre', 'correct' => ['je préfère', 'ce', 'livre'], 'extra' => ['café']],
                            'ja' => ['sentence' => '私はこの本を好む', 'correct' => ['私', 'は', 'この', '本', 'を', '好む'], 'extra' => ['コーヒー']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 학교', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '학교', 'img' => 'school']],
                plain: [['ko' => '나는 생각한다'], ['ko' => '사실']],
                phrases: [
                    'a' => [
                        'words' => ['그것이', '사실이라고', '생각한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I think it is true', 'correct' => ['I think', 'it', 'is', 'true'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Creo que es verdadero', 'correct' => ['creo', 'eso', 'es', 'verdadero'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich denke es ist wahr', 'correct' => ['ich denke', 'es', 'ist', 'wahr'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Je pense que c\'est vrai', 'correct' => ['je pense', 'ce', 'est', 'vrai'], 'extra' => ['ami']],
                            'ja' => ['sentence' => 'それは本当だと思う', 'correct' => ['それ', 'は', '本当', 'だ', 'と', '思う'], 'extra' => ['友達']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '친구와', '학교'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend and the school', 'correct' => ['my', 'friend', 'and', 'the', 'school'], 'extra' => ['true']],
                            'es' => ['sentence' => 'Mi amigo y la escuela', 'correct' => ['mi', 'amigo', 'y', 'la', 'escuela'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Mein Freund und die Schule', 'correct' => ['mein', 'Freund', 'und', 'die', 'Schule'], 'extra' => ['wahr']],
                            'fr' => ['sentence' => 'Mon ami et l\'école', 'correct' => ['mon', 'ami', 'et', 'école'], 'extra' => ['vrai']],
                            'ja' => ['sentence' => '私の友達と学校', 'correct' => ['私の', '友達', 'と', '学校'], 'extra' => ['本当']],
                        ],
                    ],
                    'c' => [
                        'words' => ['학교가', '좋다고', '생각한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I think the school is good', 'correct' => ['I think', 'the', 'school', 'is', 'good'], 'extra' => ['true']],
                            'es' => ['sentence' => 'Creo que la escuela es buena', 'correct' => ['creo', 'la', 'escuela', 'es', 'bueno'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Ich denke die Schule ist gut', 'correct' => ['ich denke', 'die', 'Schule', 'ist', 'gut'], 'extra' => ['wahr']],
                            'fr' => ['sentence' => 'Je pense que l\'école est bonne', 'correct' => ['je pense', 'école', 'est', 'bon'], 'extra' => ['vrai']],
                            'ja' => ['sentence' => '学校は良いと思う', 'correct' => ['学校', 'は', '良い', 'と', '思う'], 'extra' => ['本当']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
