<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation06Seeder extends Seeder
{
    private const PICTURES = ['공원' => 'park', '학교' => 'school', '가게' => 'shop', '집' => 'house', '책' => 'book', '친구' => 'friend'];

    /**
     * Korean Conversation, Unit 6, the Korean twin of the English "Future Plans" unit.
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

        $builder->seedUnit($chapter->id, 6, '유닛 6: 미래 계획', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 공원 · 학교', 1,
                pictures: [['ko' => '공원', 'img' => 'park'], ['ko' => '학교', 'img' => 'school']],
                plain: [['ko' => '나는 갈 것이다'], ['ko' => '내일']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '공원에', '간다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I am going to the park', 'correct' => ['I am going', 'to', 'the', 'park'], 'extra' => ['tomorrow']],
                            'es' => ['sentence' => 'Voy al parque', 'correct' => ['voy', 'a', 'el', 'parque'], 'extra' => ['mañana', 'escuela']],
                            'de' => ['sentence' => 'Ich gehe zum Park', 'correct' => ['ich gehe', 'zu', 'dem', 'Park'], 'extra' => ['morgen', 'Schule']],
                            'fr' => ['sentence' => 'Je vais au parc', 'correct' => ['je vais', 'à', 'le', 'parc'], 'extra' => ['demain', 'école']],
                            'ja' => ['sentence' => '私は公園へ行く', 'correct' => ['私', 'は', '公園', 'へ', '行く'], 'extra' => ['明日']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '내일', '간다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I am going tomorrow', 'correct' => ['I am going', 'tomorrow'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Voy mañana', 'correct' => ['voy', 'mañana'], 'extra' => ['parque', 'escuela']],
                            'de' => ['sentence' => 'Ich gehe morgen', 'correct' => ['ich gehe', 'morgen'], 'extra' => ['Park', 'Schule']],
                            'fr' => ['sentence' => 'Je vais demain', 'correct' => ['je vais', 'demain'], 'extra' => ['parc', 'école']],
                            'ja' => ['sentence' => '私は明日行く', 'correct' => ['私', 'は', '明日', '行く'], 'extra' => ['公園']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저는', '내일', '학교에', '간다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am going to the school tomorrow', 'correct' => ['I am going', 'to', 'the', 'school', 'tomorrow'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Voy a la escuela mañana', 'correct' => ['voy', 'a', 'la', 'escuela', 'mañana'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich gehe morgen zur Schule', 'correct' => ['ich gehe', 'zu', 'der', 'Schule', 'morgen'], 'extra' => ['Park']],
                            'fr' => ['sentence' => 'Je vais à l\'école demain', 'correct' => ['je vais', 'à', 'le', 'école', 'demain'], 'extra' => ['parc']],
                            'ja' => ['sentence' => '私は明日学校へ行く', 'correct' => ['私', 'は', '明日', '学校', 'へ', '行く'], 'extra' => ['公園']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 가게 · 집', 2,
                pictures: [['ko' => '가게', 'img' => 'shop'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '전에'], ['ko' => '후에']],
                phrases: [
                    'a' => [
                        'words' => ['가게', '전에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'before the shop', 'correct' => ['before', 'the', 'shop'], 'extra' => ['after']],
                            'es' => ['sentence' => 'Antes de la tienda', 'correct' => ['antes', 'la', 'tienda'], 'extra' => ['después', 'casa']],
                            'de' => ['sentence' => 'Vor dem Geschäft', 'correct' => ['vor', 'dem', 'Geschäft'], 'extra' => ['nach', 'Haus']],
                            'fr' => ['sentence' => 'Avant le magasin', 'correct' => ['avant', 'le', 'magasin'], 'extra' => ['après', 'maison']],
                            'ja' => ['sentence' => '店の前に', 'correct' => ['店', 'の前に'], 'extra' => ['後に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집', '후에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'after the house', 'correct' => ['after', 'the', 'house'], 'extra' => ['before']],
                            'es' => ['sentence' => 'Después de la casa', 'correct' => ['después', 'la', 'casa'], 'extra' => ['antes', 'tienda']],
                            'de' => ['sentence' => 'Nach dem Haus', 'correct' => ['nach', 'dem', 'Haus'], 'extra' => ['vor', 'Geschäft']],
                            'fr' => ['sentence' => 'Après la maison', 'correct' => ['après', 'la', 'maison'], 'extra' => ['avant', 'magasin']],
                            'ja' => ['sentence' => '家の後に', 'correct' => ['家', 'の', '後に'], 'extra' => ['前に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['전에', '또는', '후에'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'before or after', 'correct' => ['before', 'or', 'after'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Antes o después', 'correct' => ['antes', 'o', 'después'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Vor oder nach', 'correct' => ['vor', 'oder', 'nach'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Avant ou après', 'correct' => ['avant', 'ou', 'après'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '前か後', 'correct' => ['前', 'か', '後'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 책 · 공원', 3,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '나는 원한다'], ['ko' => '나는 할 수 있다']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '책을', '원한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I want a book', 'correct' => ['I want', 'a', 'book'], 'extra' => ['I can']],
                            'es' => ['sentence' => 'Quiero un libro', 'correct' => ['quiero', 'un', 'libro'], 'extra' => ['puedo', 'parque']],
                            'de' => ['sentence' => 'Ich will ein Buch', 'correct' => ['ich will', 'ein', 'Buch'], 'extra' => ['ich kann', 'Park']],
                            'fr' => ['sentence' => 'Je veux un livre', 'correct' => ['je veux', 'un', 'livre'], 'extra' => ['je peux', 'parc']],
                            'ja' => ['sentence' => '私は本がほしい', 'correct' => ['私', 'は', '本', 'が', 'ほしい'], 'extra' => ['私はできる']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '갈', '수', '있다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can go', 'correct' => ['I can', 'go'], 'extra' => ['I want']],
                            'es' => ['sentence' => 'Puedo ir', 'correct' => ['puedo', 'ir'], 'extra' => ['quiero', 'libro']],
                            'de' => ['sentence' => 'Ich kann gehen', 'correct' => ['ich kann', 'gehen'], 'extra' => ['ich will', 'Buch']],
                            'fr' => ['sentence' => 'Je peux aller', 'correct' => ['je peux', 'aller'], 'extra' => ['je veux', 'livre']],
                            'ja' => ['sentence' => '私は行ける', 'correct' => ['私', 'は', '行ける'], 'extra' => ['たいです']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저는', '공원에', '가고', '싶다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I want to go to the park', 'correct' => ['I want', 'to', 'go', 'to', 'the', 'park'], 'extra' => ['I can']],
                            'es' => ['sentence' => 'Quiero ir al parque', 'correct' => ['quiero', 'ir', 'a', 'el', 'parque'], 'extra' => ['puedo']],
                            'de' => ['sentence' => 'Ich will zum Park gehen', 'correct' => ['ich will', 'gehen', 'zu', 'dem', 'Park'], 'extra' => ['ich kann']],
                            'fr' => ['sentence' => 'Je veux aller au parc', 'correct' => ['je veux', 'aller', 'à', 'le', 'parc'], 'extra' => ['je peux']],
                            'ja' => ['sentence' => '私は公園へ行きたい', 'correct' => ['私', 'は', '公園', 'へ', '行きたい'], 'extra' => ['私はできる']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 친구 · 집', 4,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '준비된'], ['ko' => '한가한']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '준비됐습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am ready', 'correct' => ['I am', 'ready'], 'extra' => ['free']],
                            'es' => ['sentence' => 'Estoy listo', 'correct' => ['soy', 'listo'], 'extra' => ['libre', 'amigo']],
                            'de' => ['sentence' => 'Ich bin bereit', 'correct' => ['ich bin', 'bereit'], 'extra' => ['frei', 'Freund']],
                            'fr' => ['sentence' => 'Je suis prêt', 'correct' => ['je suis', 'prêt'], 'extra' => ['libre', 'ami']],
                            'ja' => ['sentence' => '私は準備ができた', 'correct' => ['私', 'は', '準備ができた'], 'extra' => ['暇']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '친구는', '한가합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is free', 'correct' => ['my', 'friend', 'is', 'free'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'Mi amigo está libre', 'correct' => ['mi', 'amigo', 'está', 'libre'], 'extra' => ['listo', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist frei', 'correct' => ['mein', 'Freund', 'ist', 'frei'], 'extra' => ['bereit', 'Haus']],
                            'fr' => ['sentence' => 'Mon ami est libre', 'correct' => ['mon', 'ami', 'est', 'libre'], 'extra' => ['prêt', 'maison']],
                            'ja' => ['sentence' => '私の友達は暇です', 'correct' => ['私の', '友達', 'は', '暇', 'です'], 'extra' => ['準備ができた']],
                        ],
                    ],
                    'c' => [
                        'words' => ['집에서', '준비된'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'ready in the house', 'correct' => ['ready', 'in', 'the', 'house'], 'extra' => ['free']],
                            'es' => ['sentence' => 'Listo en la casa', 'correct' => ['listo', 'en', 'la', 'casa'], 'extra' => ['libre']],
                            'de' => ['sentence' => 'Bereit im Haus', 'correct' => ['bereit', 'in', 'dem', 'Haus'], 'extra' => ['frei']],
                            'fr' => ['sentence' => 'Prêt dans la maison', 'correct' => ['prêt', 'dans', 'la', 'maison'], 'extra' => ['libre']],
                            'ja' => ['sentence' => '家で準備ができた', 'correct' => ['家', 'で', '準備ができた'], 'extra' => ['暇']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 학교 · 친구', 5,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '다음'], ['ko' => '주']],
                phrases: [
                    'a' => [
                        'words' => ['다음', '주'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'next week', 'correct' => ['next', 'week'], 'extra' => ['school']],
                            'es' => ['sentence' => 'La próxima semana', 'correct' => ['próximo', 'semana'], 'extra' => ['escuela', 'amigo']],
                            'de' => ['sentence' => 'Nächste Woche', 'correct' => ['nächste', 'Woche'], 'extra' => ['Schule', 'Freund']],
                            'fr' => ['sentence' => 'La semaine prochaine', 'correct' => ['prochain', 'semaine'], 'extra' => ['école', 'ami']],
                            'ja' => ['sentence' => '来週', 'correct' => ['来', '週'], 'extra' => ['学校']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '다음', '주에', '간다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am going next week', 'correct' => ['I am going', 'next', 'week'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Voy la próxima semana', 'correct' => ['voy', 'próximo', 'semana'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ich gehe nächste Woche', 'correct' => ['ich gehe', 'nächste', 'Woche'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'Je vais la semaine prochaine', 'correct' => ['je vais', 'prochain', 'semaine'], 'extra' => ['école']],
                            'ja' => ['sentence' => '私は来週行く', 'correct' => ['私', 'は', '来', '週', '行く'], 'extra' => ['学校']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '친구와', '학교'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend and the school', 'correct' => ['my', 'friend', 'and', 'the', 'school'], 'extra' => ['week']],
                            'es' => ['sentence' => 'Mi amigo y la escuela', 'correct' => ['mi', 'amigo', 'y', 'la', 'escuela'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Mein Freund und die Schule', 'correct' => ['mein', 'Freund', 'und', 'die', 'Schule'], 'extra' => ['Woche']],
                            'fr' => ['sentence' => 'Mon ami et l\'école', 'correct' => ['mon', 'ami', 'et', 'école'], 'extra' => ['semaine']],
                            'ja' => ['sentence' => '私の友達と学校', 'correct' => ['私の', '友達', 'と', '学校'], 'extra' => ['週']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
