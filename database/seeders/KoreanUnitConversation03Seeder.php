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
                            'az' => ['sentence' => 'gedək park', 'correct' => ['gedək', 'park'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'هيا بنا إلى حديقة', 'correct' => ['هيا بنا', 'إلى', 'حديقة'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'пойдём в парк', 'correct' => ['пойдём', 'в', 'парк'], 'extra' => ['вместе']],
                            'es' => ['sentence' => 'Vamos al parque', 'correct' => ['vamos', 'a', 'el', 'parque'], 'extra' => ['juntos', 'amigo']],
                            'de' => ['sentence' => 'Lass uns zum Park gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Park'], 'extra' => ['zusammen', 'Freund']],
                            'fr' => ['sentence' => 'Allons au parc', 'correct' => ['allons-y', 'à', 'le', 'parc'], 'extra' => ['ensemble', 'ami']],
                            'ja' => ['sentence' => '公園へ行きましょう', 'correct' => ['公園', 'へ', '行きましょう'], 'extra' => ['一緒に']],
                            'tr' => ['sentence' => 'parka gidelim', 'correct' => ['parka', 'gidelim'], 'extra' => ['birlikte']],
                        ],
                    ],
                    'b' => [
                        'words' => ['함께', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'together my friend', 'correct' => ['together', 'my', 'friend'], 'extra' => ['let\'s go']],
                            'az' => ['sentence' => 'birlikdə mənim dost', 'correct' => ['birlikdə', 'mənim', 'dost'], 'extra' => ['gedək']],
                            'ar' => ['sentence' => 'معا صديق', 'correct' => ['معا', 'صديق'], 'extra' => ['هيا بنا']],
                            'ru' => ['sentence' => 'вместе мой друг', 'correct' => ['вместе', 'мой', 'друг'], 'extra' => ['пойдём']],
                            'es' => ['sentence' => 'Juntos, mi amigo', 'correct' => ['juntos', 'mi', 'amigo'], 'extra' => ['vamos']],
                            'de' => ['sentence' => 'Zusammen, mein Freund', 'correct' => ['zusammen', 'mein', 'Freund'], 'extra' => ['lass uns gehen']],
                            'fr' => ['sentence' => 'Ensemble, mon ami', 'correct' => ['ensemble', 'mon', 'ami'], 'extra' => ['allons-y']],
                            'ja' => ['sentence' => '一緒に、私の友達', 'correct' => ['一緒に', '私の', '友達'], 'extra' => ['行きましょう']],
                            'tr' => ['sentence' => 'birlikte arkadaşım', 'correct' => ['birlikte', 'arkadaşım'], 'extra' => ['gidelim']],
                        ],
                    ],
                    'c' => [
                        'words' => ['갑시다', '함께'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go together', 'correct' => ['let\'s go', 'together'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'gedək birlikdə', 'correct' => ['gedək', 'birlikdə'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'هيا بنا معا', 'correct' => ['هيا بنا', 'معا'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'пойдём вместе', 'correct' => ['пойдём', 'вместе'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Vamos juntos', 'correct' => ['vamos', 'juntos'], 'extra' => ['amigo', 'parque']],
                            'de' => ['sentence' => 'Lass uns zusammen gehen', 'correct' => ['lass uns zusammen', 'gehen'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Allons-y ensemble', 'correct' => ['allons-y', 'ensemble'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '一緒に行きましょう', 'correct' => ['一緒に', '行きましょう'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'birlikte gidelim', 'correct' => ['birlikte', 'gidelim'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'gedək tezliklə', 'correct' => ['gedək', 'tezliklə'], 'extra' => ['bu axşam']],
                            'ar' => ['sentence' => 'هيا بنا قريبا', 'correct' => ['هيا بنا', 'قريبا'], 'extra' => ['الليلة']],
                            'ru' => ['sentence' => 'пойдём скоро', 'correct' => ['пойдём', 'скоро'], 'extra' => ['сегодня вечером']],
                            'es' => ['sentence' => 'Vamos pronto', 'correct' => ['vamos', 'pronto'], 'extra' => ['esta noche', 'tienda']],
                            'de' => ['sentence' => 'Lass uns bald gehen', 'correct' => ['lass uns bald', 'gehen'], 'extra' => ['heute Abend', 'Geschäft']],
                            'fr' => ['sentence' => 'Allons-y bientôt', 'correct' => ['allons-y', 'bientôt'], 'extra' => ['ce soir', 'magasin']],
                            'ja' => ['sentence' => 'すぐに行きましょう', 'correct' => ['すぐに', '行きましょう'], 'extra' => ['今夜']],
                            'tr' => ['sentence' => 'yakında gidelim', 'correct' => ['yakında', 'gidelim'], 'extra' => ['bu akşam']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘', '밤', '가게'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the shop tonight', 'correct' => ['the', 'shop', 'tonight'], 'extra' => ['soon']],
                            'az' => ['sentence' => 'mağaza bu axşam', 'correct' => ['mağaza', 'bu axşam'], 'extra' => ['tezliklə']],
                            'ar' => ['sentence' => 'متجر الليلة', 'correct' => ['متجر', 'الليلة'], 'extra' => ['قريبا']],
                            'ru' => ['sentence' => 'магазин сегодня вечером', 'correct' => ['магазин', 'сегодня вечером'], 'extra' => ['скоро']],
                            'es' => ['sentence' => 'La tienda esta noche', 'correct' => ['la', 'tienda', 'esta noche'], 'extra' => ['pronto', 'casa']],
                            'de' => ['sentence' => 'Das Geschäft heute Abend', 'correct' => ['das', 'Geschäft', 'heute Abend'], 'extra' => ['bald', 'Haus']],
                            'fr' => ['sentence' => 'Le magasin ce soir', 'correct' => ['le', 'magasin', 'ce soir'], 'extra' => ['bientôt', 'maison']],
                            'ja' => ['sentence' => '今夜の店', 'correct' => ['今夜', 'の', '店'], 'extra' => ['すぐに']],
                            'tr' => ['sentence' => 'bu akşam dükkan', 'correct' => ['bu', 'akşam', 'dükkan'], 'extra' => ['yakında']],
                        ],
                    ],
                    'c' => [
                        'words' => ['오늘', '밤', '집에', '갑시다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'let\'s go to the house tonight', 'correct' => ['let\'s go', 'to', 'the', 'house', 'tonight'], 'extra' => ['soon']],
                            'az' => ['sentence' => 'gedək ev bu axşam', 'correct' => ['gedək', 'ev', 'bu axşam'], 'extra' => ['tezliklə']],
                            'ar' => ['sentence' => 'هيا بنا إلى بيت الليلة', 'correct' => ['هيا بنا', 'إلى', 'بيت', 'الليلة'], 'extra' => ['قريبا']],
                            'ru' => ['sentence' => 'пойдём в дом сегодня вечером', 'correct' => ['пойдём', 'в', 'дом', 'сегодня вечером'], 'extra' => ['скоро']],
                            'es' => ['sentence' => 'Vamos a la casa esta noche', 'correct' => ['vamos', 'a', 'la', 'casa', 'esta noche'], 'extra' => ['pronto']],
                            'de' => ['sentence' => 'Lass uns heute Abend zum Haus gehen', 'correct' => ['lass uns gehen', 'zu', 'dem', 'Haus', 'heute Abend'], 'extra' => ['bald']],
                            'fr' => ['sentence' => 'Allons à la maison ce soir', 'correct' => ['allons-y', 'à', 'la', 'maison', 'ce soir'], 'extra' => ['bientôt']],
                            'ja' => ['sentence' => '今夜家へ行きましょう', 'correct' => ['今夜', '家', 'へ', '行きましょう'], 'extra' => ['すぐに']],
                            'tr' => ['sentence' => 'bu akşam eve gidelim', 'correct' => ['bu', 'akşam', 'eve', 'gidelim'], 'extra' => ['yakında']],
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
                            'az' => ['sentence' => 'yaxşı məktəb', 'correct' => ['yaxşı', 'məktəb'], 'extra' => ['sonra']],
                            'ar' => ['sentence' => 'حسنا مدرسة', 'correct' => ['حسنا', 'مدرسة'], 'extra' => ['ثم']],
                            'ru' => ['sentence' => 'хорошо школа', 'correct' => ['хорошо', 'школа'], 'extra' => ['потом']],
                            'es' => ['sentence' => 'Vale, la escuela', 'correct' => ['vale', 'la', 'escuela'], 'extra' => ['entonces', 'parque']],
                            'de' => ['sentence' => 'Okay, die Schule', 'correct' => ['okay', 'die', 'Schule'], 'extra' => ['dann', 'Park']],
                            'fr' => ['sentence' => 'D\'accord, l\'école', 'correct' => ['d\'accord', 'école'], 'extra' => ['ensuite', 'parc']],
                            'ja' => ['sentence' => 'いいよ、学校', 'correct' => ['いいよ', '学校'], 'extra' => ['それから']],
                            'tr' => ['sentence' => 'tamam okul', 'correct' => ['tamam', 'okul'], 'extra' => ['sonra']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그러면', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'then the park', 'correct' => ['then', 'the', 'park'], 'extra' => ['okay']],
                            'az' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['yaxşı']],
                            'ar' => ['sentence' => 'ثم حديقة', 'correct' => ['ثم', 'حديقة'], 'extra' => ['حسنا']],
                            'ru' => ['sentence' => 'потом парк', 'correct' => ['потом', 'парк'], 'extra' => ['хорошо']],
                            'es' => ['sentence' => 'Entonces el parque', 'correct' => ['entonces', 'el', 'parque'], 'extra' => ['vale', 'escuela']],
                            'de' => ['sentence' => 'Dann der Park', 'correct' => ['dann', 'der', 'Park'], 'extra' => ['okay', 'Schule']],
                            'fr' => ['sentence' => 'Ensuite le parc', 'correct' => ['ensuite', 'le', 'parc'], 'extra' => ['d\'accord', 'école']],
                            'ja' => ['sentence' => 'それから公園', 'correct' => ['それから', '公園'], 'extra' => ['いいよ']],
                            'tr' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['tamam']],
                        ],
                    ],
                    'c' => [
                        'words' => ['좋아요', '그러면', '갑시다'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'okay then let\'s go', 'correct' => ['okay', 'then', 'let\'s go'], 'extra' => ['school']],
                            'az' => ['sentence' => 'yaxşı sonra gedək', 'correct' => ['yaxşı', 'sonra', 'gedək'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'حسنا ثم هيا بنا', 'correct' => ['حسنا', 'ثم', 'هيا بنا'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'хорошо потом пойдём', 'correct' => ['хорошо', 'потом', 'пойдём'], 'extra' => ['школа']],
                            'es' => ['sentence' => 'Vale, entonces vamos', 'correct' => ['vale', 'entonces', 'vamos'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Okay, dann lass uns gehen', 'correct' => ['okay', 'dann', 'lass uns gehen'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'D\'accord, alors allons-y', 'correct' => ['d\'accord', 'ensuite', 'allons-y'], 'extra' => ['école']],
                            'ja' => ['sentence' => 'いいよ、それから行きましょう', 'correct' => ['いいよ', 'それから', '行きましょう'], 'extra' => ['学校']],
                            'tr' => ['sentence' => 'tamam o zaman gidelim', 'correct' => ['tamam', 'o', 'zaman', 'gidelim'], 'extra' => ['okul']],
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
                            'az' => ['sentence' => 'sonradan mənim dost', 'correct' => ['sonradan', 'mənim', 'dost'], 'extra' => ['həqiqətən']],
                            'ar' => ['sentence' => 'لاحقا صديق', 'correct' => ['لاحقا', 'صديق'], 'extra' => ['حقا']],
                            'ru' => ['sentence' => 'позже мой друг', 'correct' => ['позже', 'мой', 'друг'], 'extra' => ['действительно']],
                            'es' => ['sentence' => 'Más tarde, mi amigo', 'correct' => ['más tarde', 'mi', 'amigo'], 'extra' => ['de verdad']],
                            'de' => ['sentence' => 'Später, mein Freund', 'correct' => ['später', 'mein', 'Freund'], 'extra' => ['wirklich']],
                            'fr' => ['sentence' => 'Plus tard, mon ami', 'correct' => ['plus tard', 'mon', 'ami'], 'extra' => ['vraiment']],
                            'ja' => ['sentence' => '後で、私の友達', 'correct' => ['後で', '私の', '友達'], 'extra' => ['本当に']],
                            'tr' => ['sentence' => 'sonra arkadaşım', 'correct' => ['sonra', 'arkadaşım'], 'extra' => ['gerçekten']],
                        ],
                    ],
                    'b' => [
                        'words' => ['정말', '그', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'really the house', 'correct' => ['really', 'the', 'house'], 'extra' => ['later']],
                            'az' => ['sentence' => 'həqiqətən ev', 'correct' => ['həqiqətən', 'ev'], 'extra' => ['sonradan']],
                            'ar' => ['sentence' => 'حقا بيت', 'correct' => ['حقا', 'بيت'], 'extra' => ['لاحقا']],
                            'ru' => ['sentence' => 'действительно дом', 'correct' => ['действительно', 'дом'], 'extra' => ['позже']],
                            'es' => ['sentence' => 'De verdad, la casa', 'correct' => ['de verdad', 'la', 'casa'], 'extra' => ['más tarde', 'amigo']],
                            'de' => ['sentence' => 'Wirklich, das Haus', 'correct' => ['wirklich', 'das', 'Haus'], 'extra' => ['später', 'Freund']],
                            'fr' => ['sentence' => 'Vraiment, la maison', 'correct' => ['vraiment', 'la', 'maison'], 'extra' => ['plus tard', 'ami']],
                            'ja' => ['sentence' => '本当に、家', 'correct' => ['本当に', '家'], 'extra' => ['後で']],
                            'tr' => ['sentence' => 'gerçekten ev', 'correct' => ['gerçekten', 'ev'], 'extra' => ['sonra']],
                        ],
                    ],
                    'c' => [
                        'words' => ['정말', '나중에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'really later', 'correct' => ['really', 'later'], 'extra' => ['house']],
                            'az' => ['sentence' => 'həqiqətən sonradan', 'correct' => ['həqiqətən', 'sonradan'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'حقا لاحقا', 'correct' => ['حقا', 'لاحقا'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'действительно позже', 'correct' => ['действительно', 'позже'], 'extra' => ['дом']],
                            'es' => ['sentence' => 'De verdad, más tarde', 'correct' => ['de verdad', 'más tarde'], 'extra' => ['casa', 'amigo']],
                            'de' => ['sentence' => 'Wirklich später', 'correct' => ['wirklich', 'später'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Vraiment plus tard', 'correct' => ['vraiment', 'plus tard'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '本当に後で', 'correct' => ['本当に', '後で'], 'extra' => ['家']],
                            'tr' => ['sentence' => 'gerçekten sonra', 'correct' => ['gerçekten', 'sonra'], 'extra' => ['ev']],
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
                            'az' => ['sentence' => 'izlə bir film', 'correct' => ['izlə', 'bir', 'film'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'شاهد فيلم', 'correct' => ['شاهد', 'فيلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'смотри фильм', 'correct' => ['смотри', 'фильм'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Ver una película', 'correct' => ['mirar', 'una', 'película'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Einen Film schauen', 'correct' => ['einen', 'Film', 'schauen'], 'extra' => ['Freund', 'Haus']],
                            'fr' => ['sentence' => 'Regarder un film', 'correct' => ['regarder', 'un', 'film'], 'extra' => ['ami', 'maison']],
                            'ja' => ['sentence' => '映画を見る', 'correct' => ['映画', 'を', '見る'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'film izle', 'correct' => ['film', 'izle'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집에서', '영화를', '보세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'watch a film in the house', 'correct' => ['watch', 'a', 'film', 'in', 'the', 'house'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'izlə bir film içində ev', 'correct' => ['izlə', 'bir', 'film', 'içində', 'ev'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'شاهد فيلم في بيت', 'correct' => ['شاهد', 'فيلم', 'في', 'بيت'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'смотри фильм в дом', 'correct' => ['смотри', 'фильм', 'в', 'дом'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Ver una película en la casa', 'correct' => ['mirar', 'una', 'película', 'en', 'la', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Einen Film im Haus schauen', 'correct' => ['schauen', 'einen', 'Film', 'in', 'dem', 'Haus'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Regarder un film dans la maison', 'correct' => ['regarder', 'un', 'film', 'dans', 'la', 'maison'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '家で映画を見る', 'correct' => ['家', 'で', '映画', 'を', '見る'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'evde film izle', 'correct' => ['evde', 'film', 'izle'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '친구와', '영화를', '보세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'watch a film with my friend', 'correct' => ['watch', 'a', 'film', 'with', 'my', 'friend'], 'extra' => ['house']],
                            'az' => ['sentence' => 'izlə bir film ilə mənim dost', 'correct' => ['izlə', 'bir', 'film', 'ilə', 'mənim', 'dost'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'شاهد فيلم مع صديق', 'correct' => ['شاهد', 'فيلم', 'مع', 'صديق'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'смотри фильм с мой друг', 'correct' => ['смотри', 'фильм', 'с', 'мой', 'друг'], 'extra' => ['дом']],
                            'es' => ['sentence' => 'Ver una película con mi amigo', 'correct' => ['mirar', 'una', 'película', 'con', 'mi', 'amigo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Einen Film mit meinem Freund schauen', 'correct' => ['schauen', 'einen', 'Film', 'mit', 'mein', 'Freund'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Regarder un film avec mon ami', 'correct' => ['regarder', 'un', 'film', 'avec', 'mon', 'ami'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '私の友達と映画を見る', 'correct' => ['私の', '友達', 'と', '映画', 'を', '見る'], 'extra' => ['家']],
                            'tr' => ['sentence' => 'arkadaşımla film izle', 'correct' => ['arkadaşımla', 'film', 'izle'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
