<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation06Seeder extends Seeder
{
    private const PICTURES = [
        'Park' => 'park', 'School' => 'school', 'Shop' => 'shop', 'House' => 'house',
        'Friend' => 'friend', 'Book' => 'book',
    ];

    /**
     * English Chapter 2, Unit 6 — talking about the future.
     *
     * "I am going", want, can, ready, free, next week — the language of a plan
     * that has not happened yet, hung on the places from Chapter 1 the learner
     * might be going to.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Future Plans', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Am Going', 1,
                pictures: [['en' => 'Park', 'img' => 'park'], ['en' => 'School', 'img' => 'school']],
                plain: [['en' => 'I am going'], ['en' => 'Tomorrow']],
                phrases: [
                    'a' => [
                        'words' => ['I am going', 'to', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Voy al parque', 'correct' => ['voy', 'a', 'el', 'parque'], 'extra' => ['mañana', 'escuela']],
                            'de' => ['sentence' => 'Ich gehe zum Park', 'correct' => ['ich gehe', 'zu', 'dem', 'Park'], 'extra' => ['morgen', 'Schule']],
                            'ja' => ['sentence' => '私は公園へ行く', 'correct' => ['私', 'は', '公園', 'へ', '行く'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '나는 공원에 간다', 'correct' => ['나는', '공원에', '간다'], 'extra' => ['내일']],
                            'fr' => ['sentence' => 'Je vais au parc', 'correct' => ['je vais', 'à', 'le', 'parc'], 'extra' => ['demain', 'école']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I am going', 'tomorrow'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Voy mañana', 'correct' => ['voy', 'mañana'], 'extra' => ['parque', 'escuela']],
                            'de' => ['sentence' => 'Ich gehe morgen', 'correct' => ['ich gehe', 'morgen'], 'extra' => ['Park', 'Schule']],
                            'ja' => ['sentence' => '私は明日行く', 'correct' => ['私', 'は', '明日', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나는 내일 간다', 'correct' => ['나는', '내일', '간다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => 'Je vais demain', 'correct' => ['je vais', 'demain'], 'extra' => ['parc', 'école']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I am going', 'to', 'the', 'school', 'tomorrow'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Voy a la escuela mañana', 'correct' => ['voy', 'a', 'la', 'escuela', 'mañana'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich gehe morgen zur Schule', 'correct' => ['ich gehe', 'zu', 'der', 'Schule', 'morgen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '私は明日学校へ行く', 'correct' => ['私', 'は', '明日', '学校', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나는 내일 학교에 간다', 'correct' => ['나는', '내일', '학교에', '간다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => "Je vais à l'école demain", 'correct' => ['je vais', 'à', 'le', 'école', 'demain'], 'extra' => ['parc']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Before & After', 2,
                pictures: [['en' => 'Shop', 'img' => 'shop'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Before'], ['en' => 'After']],
                phrases: [
                    'a' => [
                        'words' => ['before', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Antes de la tienda', 'correct' => ['antes', 'la', 'tienda'], 'extra' => ['después', 'casa']],
                            'de' => ['sentence' => 'Vor dem Geschäft', 'correct' => ['vor', 'dem', 'Geschäft'], 'extra' => ['nach', 'Haus']],
                            'ja' => ['sentence' => '店の前に', 'correct' => ['店', 'の前に'], 'extra' => ['後に']],
                            'ko' => ['sentence' => '가게 전에', 'correct' => ['가게', '전에'], 'extra' => ['후에']],
                            'fr' => ['sentence' => 'Avant le magasin', 'correct' => ['avant', 'le', 'magasin'], 'extra' => ['après', 'maison']],
                        ],
                    ],
                    'b' => [
                        'words' => ['after', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Después de la casa', 'correct' => ['después', 'la', 'casa'], 'extra' => ['antes', 'tienda']],
                            'de' => ['sentence' => 'Nach dem Haus', 'correct' => ['nach', 'dem', 'Haus'], 'extra' => ['vor', 'Geschäft']],
                            'ja' => ['sentence' => '家の後に', 'correct' => ['家', 'の', '後に'], 'extra' => ['前に']],
                            'ko' => ['sentence' => '집 후에', 'correct' => ['집', '후에'], 'extra' => ['전에']],
                            'fr' => ['sentence' => 'Après la maison', 'correct' => ['après', 'la', 'maison'], 'extra' => ['avant', 'magasin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['before', 'or', 'after'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Antes o después', 'correct' => ['antes', 'o', 'después'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Vor oder nach', 'correct' => ['vor', 'oder', 'nach'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '前か後', 'correct' => ['前', 'か', '後'], 'extra' => ['家']],
                            'ko' => ['sentence' => '전에 또는 후에', 'correct' => ['전에', '또는', '후에'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Avant ou après', 'correct' => ['avant', 'ou', 'après'], 'extra' => ['maison']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Want & Can', 3,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'I want'], ['en' => 'I can']],
                phrases: [
                    'a' => [
                        'words' => ['I want', 'a', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quiero un libro', 'correct' => ['quiero', 'un', 'libro'], 'extra' => ['puedo', 'parque']],
                            'de' => ['sentence' => 'Ich will ein Buch', 'correct' => ['ich will', 'ein', 'Buch'], 'extra' => ['ich kann', 'Park']],
                            'ja' => ['sentence' => '私は本がほしい', 'correct' => ['私', 'は', '本', 'が', 'ほしい'], 'extra' => ['私はできる']],
                            'ko' => ['sentence' => '나는 책을 원한다', 'correct' => ['나는', '책을', '원한다'], 'extra' => ['나는 할 수 있다']],
                            'fr' => ['sentence' => 'Je veux un livre', 'correct' => ['je veux', 'un', 'livre'], 'extra' => ['je peux', 'parc']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I can', 'go'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Puedo ir', 'correct' => ['puedo', 'ir'], 'extra' => ['quiero', 'libro']],
                            'de' => ['sentence' => 'Ich kann gehen', 'correct' => ['ich kann', 'gehen'], 'extra' => ['ich will', 'Buch']],
                            'ja' => ['sentence' => '私は行ける', 'correct' => ['私', 'は', '行ける'], 'extra' => ['たいです']],
                            'ko' => ['sentence' => '나는 갈 수 있다', 'correct' => ['나는', '갈', '수', '있다'], 'extra' => ['나는 원한다']],
                            'fr' => ['sentence' => 'Je peux aller', 'correct' => ['je peux', 'aller'], 'extra' => ['je veux', 'livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I want', 'to', 'go', 'to', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quiero ir al parque', 'correct' => ['quiero', 'ir', 'a', 'el', 'parque'], 'extra' => ['puedo']],
                            'de' => ['sentence' => 'Ich will zum Park gehen', 'correct' => ['ich will', 'gehen', 'zu', 'dem', 'Park'], 'extra' => ['ich kann']],
                            'ja' => ['sentence' => '私は公園へ行きたい', 'correct' => ['私', 'は', '公園', 'へ', '行きたい'], 'extra' => ['私はできる']],
                            'ko' => ['sentence' => '나는 공원에 가고 싶다', 'correct' => ['나는', '공원에', '가고', '싶다'], 'extra' => ['나는 할 수 있다']],
                            'fr' => ['sentence' => 'Je veux aller au parc', 'correct' => ['je veux', 'aller', 'à', 'le', 'parc'], 'extra' => ['je peux']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Ready & Free', 4,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Ready'], ['en' => 'Free']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'ready'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy listo', 'correct' => ['soy', 'listo'], 'extra' => ['libre', 'amigo']],
                            'de' => ['sentence' => 'Ich bin bereit', 'correct' => ['ich bin', 'bereit'], 'extra' => ['frei', 'Freund']],
                            'ja' => ['sentence' => '私は準備ができた', 'correct' => ['私', 'は', '準備ができた'], 'extra' => ['暇']],
                            'ko' => ['sentence' => '저는 준비됐습니다', 'correct' => ['저는', '준비됐습니다'], 'extra' => ['한가한']],
                            'fr' => ['sentence' => 'Je suis prêt', 'correct' => ['je suis', 'prêt'], 'extra' => ['libre', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'is', 'free'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo está libre', 'correct' => ['mi', 'amigo', 'está', 'libre'], 'extra' => ['listo', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist frei', 'correct' => ['mein', 'Freund', 'ist', 'frei'], 'extra' => ['bereit', 'Haus']],
                            'ja' => ['sentence' => '私の友達は暇です', 'correct' => ['私の', '友達', 'は', '暇', 'です'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '나의 친구는 한가합니다', 'correct' => ['나의', '친구는', '한가합니다'], 'extra' => ['준비된']],
                            'fr' => ['sentence' => 'Mon ami est libre', 'correct' => ['mon', 'ami', 'est', 'libre'], 'extra' => ['prêt', 'maison']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ready', 'in', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Listo en la casa', 'correct' => ['listo', 'en', 'la', 'casa'], 'extra' => ['libre']],
                            'de' => ['sentence' => 'Bereit im Haus', 'correct' => ['bereit', 'in', 'dem', 'Haus'], 'extra' => ['frei']],
                            'ja' => ['sentence' => '家で準備ができた', 'correct' => ['家', 'で', '準備ができた'], 'extra' => ['暇']],
                            'ko' => ['sentence' => '집에서 준비된', 'correct' => ['집에서', '준비된'], 'extra' => ['한가한']],
                            'fr' => ['sentence' => 'Prêt dans la maison', 'correct' => ['prêt', 'dans', 'la', 'maison'], 'extra' => ['libre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Next Week', 5,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Next'], ['en' => 'Week']],
                phrases: [
                    'a' => [
                        'words' => ['next', 'week'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La próxima semana', 'correct' => ['próximo', 'semana'], 'extra' => ['escuela', 'amigo']],
                            'de' => ['sentence' => 'Nächste Woche', 'correct' => ['nächste', 'Woche'], 'extra' => ['Schule', 'Freund']],
                            'ja' => ['sentence' => '来週', 'correct' => ['来', '週'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '다음 주', 'correct' => ['다음', '주'], 'extra' => ['학교']],
                            'fr' => ['sentence' => 'La semaine prochaine', 'correct' => ['prochain', 'semaine'], 'extra' => ['école', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I am going', 'next', 'week'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Voy la próxima semana', 'correct' => ['voy', 'próximo', 'semana'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ich gehe nächste Woche', 'correct' => ['ich gehe', 'nächste', 'Woche'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私は来週行く', 'correct' => ['私', 'は', '来', '週', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '나는 다음 주에 간다', 'correct' => ['나는', '다음', '주에', '간다'], 'extra' => ['학교']],
                            'fr' => ['sentence' => 'Je vais la semaine prochaine', 'correct' => ['je vais', 'prochain', 'semaine'], 'extra' => ['école']],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'friend', 'and', 'the', 'school'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo y la escuela', 'correct' => ['mi', 'amigo', 'y', 'la', 'escuela'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Mein Freund und die Schule', 'correct' => ['mein', 'Freund', 'und', 'die', 'Schule'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '私の友達と学校', 'correct' => ['私の', '友達', 'と', '学校'], 'extra' => ['週']],
                            'ko' => ['sentence' => '나의 친구와 학교', 'correct' => ['나의', '친구와', '학교'], 'extra' => ['주']],
                            'fr' => ['sentence' => "Mon ami et l'école", 'correct' => ['mon', 'ami', 'et', 'école'], 'extra' => ['semaine']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
