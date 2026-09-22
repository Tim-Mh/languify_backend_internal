<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation03Seeder extends Seeder
{
    private const PICTURES = [
        'Park' => 'park', 'Friend' => 'friend', 'Shop' => 'shop', 'School' => 'school',
        'House' => 'house', 'Book' => 'book',
    ];

    /**
     * English Chapter 2, Unit 3 — making plans with someone.
     *
     * Everything here is about agreeing to do something together — let's go,
     * soon, tonight, okay, then, later, watch a film — hung on the places from
     * Chapter 1 the learner might actually go to.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Making Plans', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson("Lesson 1: Let's Go", 1,
                pictures: [['en' => 'Park', 'img' => 'park'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => "Let's go"], ['en' => 'Together']],
                phrases: [
                    'a' => [
                        'words' => ["let's go", 'to', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Vamos al parque', 'correct' => ['vamos', 'a', 'el', 'parque'], 'extra' => ['juntos', 'amigo']],
                            'de' => ['sentence' => 'Lass uns zum Park gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Park'], 'extra' => ['zusammen', 'Freund']],
                            'ja' => ['sentence' => '公園へ行きましょう', 'correct' => ['公園', 'へ', '行きましょう'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '공원에 갑시다', 'correct' => ['공원에', '갑시다'], 'extra' => ['함께']],
                            'fr' => ['sentence' => 'Allons au parc', 'correct' => ['allons-y', 'à', 'le', 'parc'], 'extra' => ['ensemble', 'ami']],
                            'tr' => ['sentence' => 'parka gidelim', 'correct' => ['parka', 'gidelim'], 'extra' => []],
                        'ru' => ['sentence' => 'пойдём в парк', 'correct' => ['пойдём', 'в', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'هيا بنا إلى حديقة', 'correct' => ['هيا بنا', 'إلى', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'gedək park', 'correct' => ['gedək', 'park'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['together', 'my', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Juntos, mi amigo', 'correct' => ['juntos', 'mi', 'amigo'], 'extra' => ['vamos']],
                            'de' => ['sentence' => 'Zusammen, mein Freund', 'correct' => ['zusammen', 'mein', 'Freund'], 'extra' => ['lass uns gehen']],
                            'ja' => ['sentence' => '一緒に、私の友達', 'correct' => ['一緒に', '私の', '友達'], 'extra' => ['行きましょう']],
                            'ko' => ['sentence' => '함께, 나의 친구', 'correct' => ['함께', '나의', '친구'], 'extra' => ['갑시다']],
                            'fr' => ['sentence' => 'Ensemble, mon ami', 'correct' => ['ensemble', 'mon', 'ami'], 'extra' => ['allons-y']],
                            'tr' => ['sentence' => 'birlikte arkadaşım', 'correct' => ['birlikte', 'arkadaşım'], 'extra' => []],
                        'ru' => ['sentence' => 'вместе мой друг', 'correct' => ['вместе', 'мой', 'друг'], 'extra' => []],
                        'ar' => ['sentence' => 'معا صديق', 'correct' => ['معا', 'صديق'], 'extra' => []],
                        'az' => ['sentence' => 'birlikdə mənim dost', 'correct' => ['birlikdə', 'mənim', 'dost'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ["let's go", 'together'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Vamos juntos', 'correct' => ['vamos', 'juntos'], 'extra' => ['amigo', 'parque']],
                            'de' => ['sentence' => 'Lass uns zusammen gehen', 'correct' => ['lass uns zusammen', 'gehen'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '一緒に行きましょう', 'correct' => ['一緒に', '行きましょう'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '함께 갑시다', 'correct' => ['함께', '갑시다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Allons-y ensemble', 'correct' => ['allons-y', 'ensemble'], 'extra' => ['ami']],
                            'tr' => ['sentence' => 'birlikte gidelim', 'correct' => ['birlikte', 'gidelim'], 'extra' => []],
                        'ru' => ['sentence' => 'пойдём вместе', 'correct' => ['пойдём', 'вместе'], 'extra' => []],
                        'ar' => ['sentence' => 'هيا بنا معا', 'correct' => ['هيا بنا', 'معا'], 'extra' => []],
                        'az' => ['sentence' => 'gedək birlikdə', 'correct' => ['gedək', 'birlikdə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Soon & Tonight', 2,
                pictures: [['en' => 'Shop', 'img' => 'shop'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Soon'], ['en' => 'Tonight']],
                phrases: [
                    'a' => [
                        'words' => ["let's go", 'soon'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Vamos pronto', 'correct' => ['vamos', 'pronto'], 'extra' => ['esta noche', 'tienda']],
                            'de' => ['sentence' => 'Lass uns bald gehen', 'correct' => ['lass uns bald', 'gehen'], 'extra' => ['heute Abend', 'Geschäft']],
                            'ja' => ['sentence' => 'すぐに行きましょう', 'correct' => ['すぐに', '行きましょう'], 'extra' => ['今夜']],
                            'ko' => ['sentence' => '곧 갑시다', 'correct' => ['곧', '갑시다'], 'extra' => ['오늘 밤']],
                            'fr' => ['sentence' => 'Allons-y bientôt', 'correct' => ['allons-y', 'bientôt'], 'extra' => ['ce soir', 'magasin']],
                            'tr' => ['sentence' => 'yakında gidelim', 'correct' => ['yakında', 'gidelim'], 'extra' => []],
                        'ru' => ['sentence' => 'пойдём скоро', 'correct' => ['пойдём', 'скоро'], 'extra' => []],
                        'ar' => ['sentence' => 'هيا بنا قريبا', 'correct' => ['هيا بنا', 'قريبا'], 'extra' => []],
                        'az' => ['sentence' => 'gedək tezliklə', 'correct' => ['gedək', 'tezliklə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'shop', 'tonight'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'La tienda esta noche', 'correct' => ['la', 'tienda', 'esta noche'], 'extra' => ['pronto', 'casa']],
                            'de' => ['sentence' => 'Das Geschäft heute Abend', 'correct' => ['das', 'Geschäft', 'heute Abend'], 'extra' => ['bald', 'Haus']],
                            'ja' => ['sentence' => '今夜の店', 'correct' => ['今夜', 'の', '店'], 'extra' => ['すぐに']],
                            'ko' => ['sentence' => '오늘 밤 가게', 'correct' => ['오늘', '밤', '가게'], 'extra' => ['곧']],
                            'fr' => ['sentence' => 'Le magasin ce soir', 'correct' => ['le', 'magasin', 'ce soir'], 'extra' => ['bientôt', 'maison']],
                            'tr' => ['sentence' => 'bu akşam dükkan', 'correct' => ['bu', 'akşam', 'dükkan'], 'extra' => []],
                        'ru' => ['sentence' => 'магазин сегодня вечером', 'correct' => ['магазин', 'сегодня вечером'], 'extra' => []],
                        'ar' => ['sentence' => 'متجر الليلة', 'correct' => ['متجر', 'الليلة'], 'extra' => []],
                        'az' => ['sentence' => 'mağaza bu axşam', 'correct' => ['mağaza', 'bu axşam'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ["let's go", 'to', 'the', 'house', 'tonight'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Vamos a la casa esta noche', 'correct' => ['vamos', 'a', 'la', 'casa', 'esta noche'], 'extra' => ['pronto']],
                            'de' => ['sentence' => 'Lass uns heute Abend zum Haus gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Haus', 'heute Abend'], 'extra' => ['bald']],
                            'ja' => ['sentence' => '今夜家へ行きましょう', 'correct' => ['今夜', '家', 'へ', '行きましょう'], 'extra' => ['すぐに']],
                            'ko' => ['sentence' => '오늘 밤 집에 갑시다', 'correct' => ['오늘', '밤', '집에', '갑시다'], 'extra' => ['곧']],
                            'fr' => ['sentence' => 'Allons à la maison ce soir', 'correct' => ['allons-y', 'à', 'la', 'maison', 'ce soir'], 'extra' => ['bientôt']],
                            'tr' => ['sentence' => 'bu akşam eve gidelim', 'correct' => ['bu', 'akşam', 'eve', 'gidelim'], 'extra' => []],
                        'ru' => ['sentence' => 'пойдём в дом сегодня вечером', 'correct' => ['пойдём', 'в', 'дом', 'сегодня вечером'], 'extra' => []],
                        'ar' => ['sentence' => 'هيا بنا إلى بيت الليلة', 'correct' => ['هيا بنا', 'إلى', 'بيت', 'الليلة'], 'extra' => []],
                        'az' => ['sentence' => 'gedək ev bu axşam', 'correct' => ['gedək', 'ev', 'bu axşam'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Okay & Then', 3,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'Okay'], ['en' => 'Then']],
                phrases: [
                    'a' => [
                        'words' => ['okay', 'the', 'school'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Vale, la escuela', 'correct' => ['vale', 'la', 'escuela'], 'extra' => ['entonces', 'parque']],
                            'de' => ['sentence' => 'Okay, die Schule', 'correct' => ['okay', 'die', 'Schule'], 'extra' => ['dann', 'Park']],
                            'ja' => ['sentence' => 'いいよ、学校', 'correct' => ['いいよ', '学校'], 'extra' => ['それから']],
                            'ko' => ['sentence' => '좋아요, 학교', 'correct' => ['좋아요', '학교'], 'extra' => ['그러면']],
                            'fr' => ['sentence' => "D'accord, l'école", 'correct' => ["d'accord", 'école'], 'extra' => ['ensuite', 'parc']],
                            'tr' => ['sentence' => 'tamam okul', 'correct' => ['tamam', 'okul'], 'extra' => []],
                        'ru' => ['sentence' => 'хорошо школа', 'correct' => ['хорошо', 'школа'], 'extra' => []],
                        'ar' => ['sentence' => 'حسنا مدرسة', 'correct' => ['حسنا', 'مدرسة'], 'extra' => []],
                        'az' => ['sentence' => 'yaxşı məktəb', 'correct' => ['yaxşı', 'məktəb'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['then', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Entonces el parque', 'correct' => ['entonces', 'el', 'parque'], 'extra' => ['vale', 'escuela']],
                            'de' => ['sentence' => 'Dann der Park', 'correct' => ['dann', 'der', 'Park'], 'extra' => ['okay', 'Schule']],
                            'ja' => ['sentence' => 'それから公園', 'correct' => ['それから', '公園'], 'extra' => ['いいよ']],
                            'ko' => ['sentence' => '그러면 공원', 'correct' => ['그러면', '공원'], 'extra' => ['좋아요']],
                            'fr' => ['sentence' => 'Ensuite le parc', 'correct' => ['ensuite', 'le', 'parc'], 'extra' => ["d'accord", 'école']],
                            'tr' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => []],
                        'ru' => ['sentence' => 'потом парк', 'correct' => ['потом', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'ثم حديقة', 'correct' => ['ثم', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['okay', 'then', "let's go"], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Vale, entonces vamos', 'correct' => ['vale', 'entonces', 'vamos'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Okay, dann lass uns gehen', 'correct' => ['okay', 'dann', 'lass uns gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'いいよ、それから行きましょう', 'correct' => ['いいよ', 'それから', '行きましょう'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '좋아요, 그러면 갑시다', 'correct' => ['좋아요', '그러면', '갑시다'], 'extra' => ['학교']],
                            'fr' => ['sentence' => "D'accord, alors allons-y", 'correct' => ["d'accord", 'ensuite', 'allons-y'], 'extra' => ['école']],
                            'tr' => ['sentence' => 'tamam o zaman gidelim', 'correct' => ['tamam', 'o', 'zaman', 'gidelim'], 'extra' => []],
                        'ru' => ['sentence' => 'хорошо потом пойдём', 'correct' => ['хорошо', 'потом', 'пойдём'], 'extra' => []],
                        'ar' => ['sentence' => 'حسنا ثم هيا بنا', 'correct' => ['حسنا', 'ثم', 'هيا بنا'], 'extra' => []],
                        'az' => ['sentence' => 'yaxşı sonra gedək', 'correct' => ['yaxşı', 'sonra', 'gedək'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Later & Really', 4,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Later'], ['en' => 'Really']],
                phrases: [
                    'a' => [
                        'words' => ['later', 'my', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más tarde, mi amigo', 'correct' => ['más tarde', 'mi', 'amigo'], 'extra' => ['de verdad']],
                            'de' => ['sentence' => 'Später, mein Freund', 'correct' => ['später', 'mein', 'Freund'], 'extra' => ['wirklich']],
                            'ja' => ['sentence' => '後で、私の友達', 'correct' => ['後で', '私の', '友達'], 'extra' => ['本当に']],
                            'ko' => ['sentence' => '나중에, 나의 친구', 'correct' => ['나중에', '나의', '친구'], 'extra' => ['정말']],
                            'fr' => ['sentence' => 'Plus tard, mon ami', 'correct' => ['plus tard', 'mon', 'ami'], 'extra' => ['vraiment']],
                            'tr' => ['sentence' => 'sonra arkadaşım', 'correct' => ['sonra', 'arkadaşım'], 'extra' => []],
                        'ru' => ['sentence' => 'позже мой друг', 'correct' => ['позже', 'мой', 'друг'], 'extra' => []],
                        'ar' => ['sentence' => 'لاحقا صديق', 'correct' => ['لاحقا', 'صديق'], 'extra' => []],
                        'az' => ['sentence' => 'sonradan mənim dost', 'correct' => ['sonradan', 'mənim', 'dost'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['really', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'De verdad, la casa', 'correct' => ['de verdad', 'la', 'casa'], 'extra' => ['más tarde', 'amigo']],
                            'de' => ['sentence' => 'Wirklich, das Haus', 'correct' => ['wirklich', 'das', 'Haus'], 'extra' => ['später', 'Freund']],
                            'ja' => ['sentence' => '本当に、家', 'correct' => ['本当に', '家'], 'extra' => ['後で']],
                            'ko' => ['sentence' => '정말, 그 집', 'correct' => ['정말', '그', '집'], 'extra' => ['나중에']],
                            'fr' => ['sentence' => 'Vraiment, la maison', 'correct' => ['vraiment', 'la', 'maison'], 'extra' => ['plus tard', 'ami']],
                            'tr' => ['sentence' => 'gerçekten ev', 'correct' => ['gerçekten', 'ev'], 'extra' => []],
                        'ru' => ['sentence' => 'действительно дом', 'correct' => ['действительно', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'حقا بيت', 'correct' => ['حقا', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'həqiqətən ev', 'correct' => ['həqiqətən', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['really', 'later'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'De verdad, más tarde', 'correct' => ['de verdad', 'más tarde'], 'extra' => ['casa', 'amigo']],
                            'de' => ['sentence' => 'Wirklich später', 'correct' => ['wirklich', 'später'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '本当に後で', 'correct' => ['本当に', '後で'], 'extra' => ['家']],
                            'ko' => ['sentence' => '정말 나중에', 'correct' => ['정말', '나중에'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Vraiment plus tard', 'correct' => ['vraiment', 'plus tard'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'gerçekten sonra', 'correct' => ['gerçekten', 'sonra'], 'extra' => []],
                        'ru' => ['sentence' => 'действительно позже', 'correct' => ['действительно', 'позже'], 'extra' => []],
                        'ar' => ['sentence' => 'حقا لاحقا', 'correct' => ['حقا', 'لاحقا'], 'extra' => []],
                        'az' => ['sentence' => 'həqiqətən sonradan', 'correct' => ['həqiqətən', 'sonradan'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Watch A Film', 5,
                pictures: [['en' => 'House', 'img' => 'house'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Watch'], ['en' => 'Film']],
                phrases: [
                    'a' => [
                        'words' => ['watch', 'a', 'film'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ver una película', 'correct' => ['mirar', 'una', 'película'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Einen Film schauen', 'correct' => ['einen', 'Film', 'schauen'], 'extra' => ['Freund', 'Haus']],
                            'ja' => ['sentence' => '映画を見る', 'correct' => ['映画', 'を', '見る'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '영화를 보다', 'correct' => ['영화를', '보다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Regarder un film', 'correct' => ['regarder', 'un', 'film'], 'extra' => ['ami', 'maison']],
                            'tr' => ['sentence' => 'film izle', 'correct' => ['film', 'izle'], 'extra' => []],
                        'ru' => ['sentence' => 'смотри фильм', 'correct' => ['смотри', 'фильм'], 'extra' => []],
                        'ar' => ['sentence' => 'شاهد فيلم', 'correct' => ['شاهد', 'فيلم'], 'extra' => []],
                        'az' => ['sentence' => 'izlə bir film', 'correct' => ['izlə', 'bir', 'film'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['watch', 'a', 'film', 'in', 'the', 'house'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Ver una película en la casa', 'correct' => ['mirar', 'una', 'película', 'en', 'la', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Einen Film im Haus schauen', 'correct' => ['schauen', 'einen', 'Film', 'in', 'dem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '家で映画を見る', 'correct' => ['家', 'で', '映画', 'を', '見る'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '집에서 영화를 보다', 'correct' => ['집에서', '영화를', '보다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Regarder un film dans la maison', 'correct' => ['regarder', 'un', 'film', 'dans', 'la', 'maison'], 'extra' => ['ami']],
                            'tr' => ['sentence' => 'evde film izle', 'correct' => ['evde', 'film', 'izle'], 'extra' => []],
                        'ru' => ['sentence' => 'смотри фильм в дом', 'correct' => ['смотри', 'фильм', 'в', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'شاهد فيلم في بيت', 'correct' => ['شاهد', 'فيلم', 'في', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'izlə bir film içində ev', 'correct' => ['izlə', 'bir', 'film', 'içində', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['watch', 'a', 'film', 'with', 'my', 'friend'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Ver una película con mi amigo', 'correct' => ['mirar', 'una', 'película', 'con', 'mi', 'amigo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Einen Film mit meinem Freund schauen', 'correct' => ['schauen', 'einen', 'Film', 'mit', 'mein', 'Freund'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '私の友達と映画を見る', 'correct' => ['私の', '友達', 'と', '映画', 'を', '見る'], 'extra' => ['家']],
                            'ko' => ['sentence' => '나의 친구와 영화를 보다', 'correct' => ['나의', '친구와', '영화를', '보다'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Regarder un film avec mon ami', 'correct' => ['regarder', 'un', 'film', 'avec', 'mon', 'ami'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'arkadaşımla film izle', 'correct' => ['arkadaşımla', 'film', 'izle'], 'extra' => []],
                        'ru' => ['sentence' => 'смотри фильм с мой друг', 'correct' => ['смотри', 'фильм', 'с', 'мой', 'друг'], 'extra' => []],
                        'ar' => ['sentence' => 'شاهد فيلم مع صديق', 'correct' => ['شاهد', 'فيلم', 'مع', 'صديق'], 'extra' => []],
                        'az' => ['sentence' => 'izlə bir film ilə mənim dost', 'correct' => ['izlə', 'bir', 'film', 'ilə', 'mənim', 'dost'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
