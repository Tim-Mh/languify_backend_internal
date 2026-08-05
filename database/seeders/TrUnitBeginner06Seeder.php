<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Park' => 'park', 'Dükkân' => 'shop', 'Sokak' => 'street', 'İstasyon' => 'station',
        'Okul' => 'school', 'Ev' => 'house', 'Masa' => 'table', 'Kitap' => 'book',
    ];

    /**
     * Turkish Beginner Unit 6 — places, and going to them.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * THE SECOND CASE: DATIVE (movement towards).
     *
     * Unit 4 taught the accusative for definite objects. This unit adds the
     * dative, which answers "to where":
     *
     *     park        park            (bare)
     *     parka       to the park     (dative)
     *
     * The two cases are introduced two units apart on purpose. Presenting them
     * together invites the learner to memorise "-ı means object, -a means
     * direction" as a pair of rules, when what they actually need is to hear
     * each ending enough times in isolation to stop noticing it.
     *
     * VOWEL HARMONY IS THE WHOLE LESSON HERE. The dative is -a after a back
     * vowel and -e after a front one:
     *
     *     park  -> parka     (a is back)
     *     okul  -> okula     (u is back)
     *     ev    -> eve       (e is front)
     *
     * Nothing in the app teaches that rule as a rule. The learner meets
     * `parka` and `eve` as ordinary words, dozens of times, and the pattern
     * arrives on its own — which is how a native speaker acquires it too. That
     * is also why the suffix is never a separate tile: a `-a` tile would be
     * wrong half the time it was offered.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Places', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Park & Shop', 1,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Dükkân', 'img' => 'shop']],
                plain: [['tr' => 'Bir'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'park'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A park', 'correct' => ['a', 'park'], 'extra' => ['shop', 'and']],
                            'fr' => ['sentence' => 'Un parc', 'correct' => ['un', 'parc'], 'extra' => ['magasin', 'et']],
                            'es' => ['sentence' => 'Un parque', 'correct' => ['un', 'parque'], 'extra' => ['tienda', 'y']],
                            'de' => ['sentence' => 'Ein Park', 'correct' => ['ein', 'Park'], 'extra' => ['Geschäft', 'und']],
                            'ja' => ['sentence' => '公園', 'correct' => ['公園'], 'extra' => ['店', 'と']],
                            'ko' => ['sentence' => '공원', 'correct' => ['공원'], 'extra' => ['가게', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'dükkân'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A shop', 'correct' => ['a', 'shop'], 'extra' => ['park', 'and']],
                            'fr' => ['sentence' => 'Un magasin', 'correct' => ['un', 'magasin'], 'extra' => ['parc', 'et']],
                            'es' => ['sentence' => 'Una tienda', 'correct' => ['una', 'tienda'], 'extra' => ['parque', 'y']],
                            'de' => ['sentence' => 'Ein Geschäft', 'correct' => ['ein', 'Geschäft'], 'extra' => ['Park', 'und']],
                            'ja' => ['sentence' => '店', 'correct' => ['店'], 'extra' => ['公園', 'と']],
                            'ko' => ['sentence' => '가게', 'correct' => ['가게'], 'extra' => ['공원', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'park', 've', 'bir', 'dükkân'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A park and a shop', 'correct' => ['a', 'park', 'and', 'a', 'shop'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Un parc et un magasin', 'correct' => ['un', 'parc', 'et', 'un', 'magasin'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Un parque y una tienda', 'correct' => ['un', 'parque', 'y', 'una', 'tienda'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein Park und ein Geschäft', 'correct' => ['ein', 'Park', 'und', 'ein', 'Geschäft'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '公園と店', 'correct' => ['公園', 'と', '店'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '공원과 가게', 'correct' => ['공원과', '가게'], 'extra' => ['거리']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Street & Station', 2,
                pictures: [['tr' => 'Sokak', 'img' => 'street'], ['tr' => 'İstasyon', 'img' => 'station']],
                plain: [['tr' => 'Büyük'], ['tr' => 'Küçük']],
                phrases: [
                    'a' => [
                        'words' => ['büyük', 'bir', 'sokak'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big street', 'correct' => ['a', 'big', 'street'], 'extra' => ['station']],
                            'fr' => ['sentence' => 'Une grande rue', 'correct' => ['une', 'rue', 'grand'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Una calle grande', 'correct' => ['una', 'calle', 'grande'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Eine große Straße', 'correct' => ['eine', 'groß', 'Straße'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '大きい通り', 'correct' => ['大きい', '通り'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '큰 거리', 'correct' => ['큰', '거리'], 'extra' => ['역']],
                        ],
                    ],
                    'b' => [
                        'words' => ['küçük', 'bir', 'istasyon'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small station', 'correct' => ['a', 'small', 'station'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Une petite gare', 'correct' => ['une', 'petite', 'gare'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación pequeña', 'correct' => ['una', 'estación', 'pequeño'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein kleiner Bahnhof', 'correct' => ['ein', 'klein', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '小さい駅', 'correct' => ['小さい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '작은 역', 'correct' => ['작은', '역'], 'extra' => ['거리']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'sokak', 've', 'bir', 'istasyon'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station', 'correct' => ['a', 'street', 'and', 'a', 'station'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Une rue et une gare', 'correct' => ['une', 'rue', 'et', 'une', 'gare'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Una calle y una estación', 'correct' => ['una', 'calle', 'y', 'una', 'estación'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '通りと駅', 'correct' => ['通り', 'と', '駅'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '거리와 역', 'correct' => ['거리와', '역'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Going to the Park', 3,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Gitmek'], ['tr' => 'Parka']],
                phrases: [
                    'a' => [
                        // parka: back vowel, so -a. The learner meets it as a word.
                        'words' => ['parka', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park', 'correct' => ['to go', 'to the park'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Aller au parc', 'correct' => ['aller', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Ir al parque', 'correct' => ['ir', 'al parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Zum Park gehen', 'correct' => ['zum Park', 'gehen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '公園へ行く', 'correct' => ['公園', 'へ', '行く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '공원에 가다', 'correct' => ['공원에', '가다'], 'extra' => ['집']],
                        ],
                    ],
                    'b' => [
                        // eve: front vowel, so -e. Same idea, different shape.
                        'words' => ['eve', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go home', 'correct' => ['to go', 'to the house'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Aller à la maison', 'correct' => ['aller', 'à la maison'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a casa', 'correct' => ['ir', 'a casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Nach Hause gehen', 'correct' => ['nach Hause', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '家へ行く', 'correct' => ['家', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '집에 가다', 'correct' => ['집에', '가다'], 'extra' => ['공원']],
                        ],
                    ],
                    'c' => [
                        'words' => ['parka', 've', 'eve', 'gitmek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park and home', 'correct' => ['to go', 'to the park', 'and', 'to the house'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Aller au parc et à la maison', 'correct' => ['aller', 'au parc', 'et', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir al parque y a casa', 'correct' => ['ir', 'al parque', 'y', 'a casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Park und nach Hause gehen', 'correct' => ['zum Park', 'und', 'nach Hause', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '公園と家へ行く', 'correct' => ['公園', 'と', '家', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '공원과 집에 가다', 'correct' => ['공원과', '집에', '가다'], 'extra' => ['학교']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Going to School', 4,
                pictures: [['tr' => 'Okul', 'img' => 'school'], ['tr' => 'Dükkân', 'img' => 'shop']],
                plain: [['tr' => 'Okula'], ['tr' => 'Gitmek']],
                phrases: [
                    'a' => [
                        'words' => ['okula', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to school', 'correct' => ['to go', 'to school'], 'extra' => ['shop']],
                            'fr' => ['sentence' => "Aller à l'école", 'correct' => ['aller', "à l'école"], 'extra' => ['magasin']],
                            'es' => ['sentence' => 'Ir a la escuela', 'correct' => ['ir', 'a la escuela'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Zur Schule gehen', 'correct' => ['zur Schule', 'gehen'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '学校へ行く', 'correct' => ['学校', 'へ', '行く'], 'extra' => ['店']],
                            'ko' => ['sentence' => '학교에 가다', 'correct' => ['학교에', '가다'], 'extra' => ['가게']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dükkâna', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the shop', 'correct' => ['to go', 'to the shop'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Aller au magasin', 'correct' => ['aller', 'au magasin'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir a la tienda', 'correct' => ['ir', 'a la tienda'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Geschäft gehen', 'correct' => ['zum Geschäft', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '店へ行く', 'correct' => ['店', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '가게에 가다', 'correct' => ['가게에', '가다'], 'extra' => ['학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['okula', 've', 'dükkâna', 'gitmek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to school and to the shop', 'correct' => ['to go', 'to school', 'and', 'to the shop'], 'extra' => ['park']],
                            'fr' => ['sentence' => "Aller à l'école et au magasin", 'correct' => ['aller', "à l'école", 'et', 'au magasin'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a la escuela y a la tienda', 'correct' => ['ir', 'a la escuela', 'y', 'a la tienda'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Zur Schule und zum Geschäft gehen', 'correct' => ['zur Schule', 'und', 'zum Geschäft', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '学校と店へ行く', 'correct' => ['学校', 'と', '店', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '학교와 가게에 가다', 'correct' => ['학교와', '가게에', '가다'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Around Town', 5,
                pictures: [['tr' => 'İstasyon', 'img' => 'station'], ['tr' => 'Sokak', 'img' => 'street']],
                plain: [['tr' => 'Gitmek'], ['tr' => 'Büyük']],
                phrases: [
                    'a' => [
                        'words' => ['büyük', 'bir', 'istasyon'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big station', 'correct' => ['a', 'big', 'station'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Une grande gare', 'correct' => ['une', 'gare', 'grand'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación grande', 'correct' => ['una', 'estación', 'grande'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein großer Bahnhof', 'correct' => ['ein', 'groß', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '大きい駅', 'correct' => ['大きい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '큰 역', 'correct' => ['큰', '역'], 'extra' => ['거리']],
                        ],
                    ],
                    'b' => [
                        'words' => ['benim', 'arkadaşım', 'parka', 'gitmek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My friend to go to the park', 'correct' => ['my', 'friend', 'to go', 'to the park'], 'extra' => ['station']],
                            'fr' => ['sentence' => 'Mon ami aller au parc', 'correct' => ['mon', 'ami', 'aller', 'au parc'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Mi amigo ir al parque', 'correct' => ['mi', 'amigo', 'ir', 'al parque'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Mein Freund zum Park gehen', 'correct' => ['mein', 'Freund', 'zum Park', 'gehen'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '私の友達が公園へ行く', 'correct' => ['私の', '友達', 'が', '公園', 'へ', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '내 친구가 공원에 가다', 'correct' => ['내', '친구가', '공원에', '가다'], 'extra' => ['역']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'sokak', 've', 'bir', 'istasyon', 'büyük'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station are big', 'correct' => ['a', 'street', 'and', 'a', 'station', 'big'], 'extra' => ['small']],
                            'fr' => ['sentence' => 'Une rue et une gare sont grandes', 'correct' => ['une', 'rue', 'et', 'une', 'gare', 'grand'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Una calle y una estación son grandes', 'correct' => ['una', 'calle', 'y', 'una', 'estación', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof sind groß', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '通りと駅は大きい', 'correct' => ['通り', 'と', '駅', 'は', '大きい'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '거리와 역은 큽니다', 'correct' => ['거리와', '역은', '큽니다'], 'extra' => ['작은']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
