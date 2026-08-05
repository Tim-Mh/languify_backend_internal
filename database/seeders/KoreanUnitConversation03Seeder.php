<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation03Seeder extends Seeder
{
    private const PICTURES = ['공원' => 'park', '친구' => 'friend', '가게' => 'shop', '집' => 'house', '학교' => 'school'];

    /**
     * Korean Conversation, Unit 3, the Korean twin of the English "Making Plans" unit.
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

        $builder->seedUnit($chapter->id, 3, '유닛 3: 약속 잡기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 공원 · 친구', 1,
                pictures: [['ko' => '공원', 'img' => 'park'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '갑시다'], ['ko' => '함께']],
                phrases: [
                    'a' => [
                        'words' => ['공원에', '갑시다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go to the park', 'correct' => ['let\'s go', 'to', 'the', 'park'], 'extra' => ['together']],
                            'es' => ['sentence' => 'Vamos al parque', 'correct' => ['vamos', 'a', 'el', 'parque'], 'extra' => ['juntos', 'amigo']],
                            'de' => ['sentence' => 'Lass uns zum Park gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Park'], 'extra' => ['zusammen', 'Freund']],
                            'fr' => ['sentence' => 'Allons au parc', 'correct' => ['allons-y', 'à', 'le', 'parc'], 'extra' => ['ensemble', 'ami']],
                            'ja' => ['sentence' => '公園へ行きましょう', 'correct' => ['公園', 'へ', '行きましょう'], 'extra' => ['一緒に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['함께', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'together my friend', 'correct' => ['together', 'my', 'friend'], 'extra' => ['let\'s go']],
                            'es' => ['sentence' => 'Juntos, mi amigo', 'correct' => ['juntos', 'mi', 'amigo'], 'extra' => ['vamos']],
                            'de' => ['sentence' => 'Zusammen, mein Freund', 'correct' => ['zusammen', 'mein', 'Freund'], 'extra' => ['lass uns gehen']],
                            'fr' => ['sentence' => 'Ensemble, mon ami', 'correct' => ['ensemble', 'mon', 'ami'], 'extra' => ['allons-y']],
                            'ja' => ['sentence' => '一緒に、私の友達', 'correct' => ['一緒に', '私の', '友達'], 'extra' => ['行きましょう']],
                        ],
                    ],
                    'c' => [
                        'words' => ['갑시다', '함께'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go together', 'correct' => ['let\'s go', 'together'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Vamos juntos', 'correct' => ['vamos', 'juntos'], 'extra' => ['amigo', 'parque']],
                            'de' => ['sentence' => 'Lass uns zusammen gehen', 'correct' => ['lass uns gehen', 'zusammen'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Allons-y ensemble', 'correct' => ['allons-y', 'ensemble'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '一緒に行きましょう', 'correct' => ['一緒に', '行きましょう'], 'extra' => ['友達']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 가게 · 집', 2,
                pictures: [['ko' => '가게', 'img' => 'shop'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '곧'], ['ko' => '오늘 밤']],
                phrases: [
                    'a' => [
                        'words' => ['갑시다', '곧'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go soon', 'correct' => ['let\'s go', 'soon'], 'extra' => ['tonight']],
                            'es' => ['sentence' => 'Vamos pronto', 'correct' => ['vamos', 'pronto'], 'extra' => ['esta noche', 'tienda']],
                            'de' => ['sentence' => 'Lass uns bald gehen', 'correct' => ['lass uns gehen', 'bald'], 'extra' => ['heute Abend', 'Geschäft']],
                            'fr' => ['sentence' => 'Allons-y bientôt', 'correct' => ['allons-y', 'bientôt'], 'extra' => ['ce soir', 'magasin']],
                            'ja' => ['sentence' => 'すぐに行きましょう', 'correct' => ['すぐに', '行きましょう'], 'extra' => ['今夜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘', '밤', '가게'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the shop tonight', 'correct' => ['the', 'shop', 'tonight'], 'extra' => ['soon']],
                            'es' => ['sentence' => 'La tienda esta noche', 'correct' => ['la', 'tienda', 'esta noche'], 'extra' => ['pronto', 'casa']],
                            'de' => ['sentence' => 'Das Geschäft heute Abend', 'correct' => ['das', 'Geschäft', 'heute Abend'], 'extra' => ['bald', 'Haus']],
                            'fr' => ['sentence' => 'Le magasin ce soir', 'correct' => ['le', 'magasin', 'ce soir'], 'extra' => ['bientôt', 'maison']],
                            'ja' => ['sentence' => '今夜の店', 'correct' => ['今夜', 'の', '店'], 'extra' => ['すぐに']],
                        ],
                    ],
                    'c' => [
                        'words' => ['오늘', '밤', '집에', '갑시다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go to the house tonight', 'correct' => ['let\'s go', 'to', 'the', 'house', 'tonight'], 'extra' => ['soon']],
                            'es' => ['sentence' => 'Vamos a la casa esta noche', 'correct' => ['vamos', 'a', 'la', 'casa', 'esta noche'], 'extra' => ['pronto']],
                            'de' => ['sentence' => 'Lass uns heute Abend zum Haus gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Haus', 'heute Abend'], 'extra' => ['bald']],
                            'fr' => ['sentence' => 'Allons à la maison ce soir', 'correct' => ['allons-y', 'à', 'la', 'maison', 'ce soir'], 'extra' => ['bientôt']],
                            'ja' => ['sentence' => '今夜家へ行きましょう', 'correct' => ['今夜', '家', 'へ', '行きましょう'], 'extra' => ['すぐに']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 학교 · 공원', 3,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '좋아요'], ['ko' => '그러면']],
                phrases: [
                    'a' => [
                        'words' => ['좋아요', '학교'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'okay the school', 'correct' => ['okay', 'the', 'school'], 'extra' => ['then']],
                            'es' => ['sentence' => 'Vale, la escuela', 'correct' => ['vale', 'la', 'escuela'], 'extra' => ['entonces', 'parque']],
                            'de' => ['sentence' => 'Okay, die Schule', 'correct' => ['okay', 'die', 'Schule'], 'extra' => ['dann', 'Park']],
                            'fr' => ['sentence' => 'D\'accord, l\'école', 'correct' => ['d\'accord', 'école'], 'extra' => ['ensuite', 'parc']],
                            'ja' => ['sentence' => 'いいよ、学校', 'correct' => ['いいよ', '学校'], 'extra' => ['それから']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그러면', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'then the park', 'correct' => ['then', 'the', 'park'], 'extra' => ['okay']],
                            'es' => ['sentence' => 'Entonces el parque', 'correct' => ['entonces', 'el', 'parque'], 'extra' => ['vale', 'escuela']],
                            'de' => ['sentence' => 'Dann der Park', 'correct' => ['dann', 'der', 'Park'], 'extra' => ['okay', 'Schule']],
                            'fr' => ['sentence' => 'Ensuite le parc', 'correct' => ['ensuite', 'le', 'parc'], 'extra' => ['d\'accord', 'école']],
                            'ja' => ['sentence' => 'それから公園', 'correct' => ['それから', '公園'], 'extra' => ['いいよ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['좋아요', '그러면', '갑시다'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'okay then let\'s go', 'correct' => ['okay', 'then', 'let\'s go'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Vale, entonces vamos', 'correct' => ['vale', 'entonces', 'vamos'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Okay, dann lass uns gehen', 'correct' => ['okay', 'dann', 'lass uns gehen'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'D\'accord, alors allons-y', 'correct' => ['d\'accord', 'ensuite', 'allons-y'], 'extra' => ['école']],
                            'ja' => ['sentence' => 'いいよ、それから行きましょう', 'correct' => ['いいよ', 'それから', '行きましょう'], 'extra' => ['学校']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 친구 · 집', 4,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '나중에'], ['ko' => '정말']],
                phrases: [
                    'a' => [
                        'words' => ['나중에', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'later my friend', 'correct' => ['later', 'my', 'friend'], 'extra' => ['really']],
                            'es' => ['sentence' => 'Más tarde, mi amigo', 'correct' => ['más tarde', 'mi', 'amigo'], 'extra' => ['de verdad']],
                            'de' => ['sentence' => 'Später, mein Freund', 'correct' => ['später', 'mein', 'Freund'], 'extra' => ['wirklich']],
                            'fr' => ['sentence' => 'Plus tard, mon ami', 'correct' => ['plus tard', 'mon', 'ami'], 'extra' => ['vraiment']],
                            'ja' => ['sentence' => '後で、私の友達', 'correct' => ['後で', '私の', '友達'], 'extra' => ['本当に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['정말', '그', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'really the house', 'correct' => ['really', 'the', 'house'], 'extra' => ['later']],
                            'es' => ['sentence' => 'De verdad, la casa', 'correct' => ['de verdad', 'la', 'casa'], 'extra' => ['más tarde', 'amigo']],
                            'de' => ['sentence' => 'Wirklich, das Haus', 'correct' => ['wirklich', 'das', 'Haus'], 'extra' => ['später', 'Freund']],
                            'fr' => ['sentence' => 'Vraiment, la maison', 'correct' => ['vraiment', 'la', 'maison'], 'extra' => ['plus tard', 'ami']],
                            'ja' => ['sentence' => '本当に、家', 'correct' => ['本当に', '家'], 'extra' => ['後で']],
                        ],
                    ],
                    'c' => [
                        'words' => ['정말', '나중에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'really later', 'correct' => ['really', 'later'], 'extra' => ['house']],
                            'es' => ['sentence' => 'De verdad, más tarde', 'correct' => ['de verdad', 'más tarde'], 'extra' => ['casa', 'amigo']],
                            'de' => ['sentence' => 'Wirklich später', 'correct' => ['wirklich', 'später'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Vraiment plus tard', 'correct' => ['vraiment', 'plus tard'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '本当に後で', 'correct' => ['本当に', '後で'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 집 · 친구', 5,
                pictures: [['ko' => '집', 'img' => 'house'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '보다'], ['ko' => '영화']],
                phrases: [
                    'a' => [
                        'words' => ['영화를', '보세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'watch a film', 'correct' => ['watch', 'a', 'film'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Ver una película', 'correct' => ['mirar', 'una', 'película'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Einen Film schauen', 'correct' => ['einen', 'Film', 'schauen'], 'extra' => ['Freund', 'Haus']],
                            'fr' => ['sentence' => 'Regarder un film', 'correct' => ['regarder', 'un', 'film'], 'extra' => ['ami', 'maison']],
                            'ja' => ['sentence' => '映画を見る', 'correct' => ['映画', 'を', '見る'], 'extra' => ['友達']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집에서', '영화를', '보세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'watch a film in the house', 'correct' => ['watch', 'a', 'film', 'in', 'the', 'house'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Ver una película en la casa', 'correct' => ['mirar', 'una', 'película', 'en', 'la', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Einen Film im Haus schauen', 'correct' => ['schauen', 'einen', 'Film', 'in', 'dem', 'Haus'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Regarder un film dans la maison', 'correct' => ['regarder', 'un', 'film', 'dans', 'la', 'maison'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '家で映画を見る', 'correct' => ['家', 'で', '映画', 'を', '見る'], 'extra' => ['友達']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '친구와', '영화를', '보세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'watch a film with my friend', 'correct' => ['watch', 'a', 'film', 'with', 'my', 'friend'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Ver una película con mi amigo', 'correct' => ['mirar', 'una', 'película', 'con', 'mi', 'amigo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Einen Film mit meinem Freund schauen', 'correct' => ['schauen', 'einen', 'Film', 'mit', 'mein', 'Freund'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Regarder un film avec mon ami', 'correct' => ['regarder', 'un', 'film', 'avec', 'mon', 'ami'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '私の友達と映画を見る', 'correct' => ['私の', '友達', 'と', '映画', 'を', '見る'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
