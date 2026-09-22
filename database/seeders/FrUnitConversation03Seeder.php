<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation03Seeder extends Seeder
{
    private const PICTURES = [
        'Parc' => 'park', 'Magasin' => 'shop', 'Café' => 'coffee', 'Maison' => 'house',
        'École' => 'school', 'Gare' => 'station',
    ];

    /**
     * French Chapter 2, Unit 3 — making plans.
     *
     * Plans need a place and a time, so each lesson pairs a place the learner
     * already knows with a new planning word: allons/ensemble, bientôt/ce soir,
     * d'accord/ensuite, plus tard/vraiment, and finally film/regarder for
     * suggesting something to do.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Making Plans', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson("Lesson 1: Let's Go", 1,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'Magasin', 'img' => 'shop']],
                plain: [['fr' => 'Allons'], ['fr' => 'Ensemble']],
                phrases: [
                    'a' => [
                        'words' => ['allons', 'ensemble'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => "Let's go together", 'correct' => ["let's go", 'together'], 'extra' => ['park', 'shop']],
                            'az' => ['sentence' => 'gedək birlikdə', 'correct' => ['gedək', 'birlikdə'], 'extra' => ['park', 'mağaza']],
                            'ar' => ['sentence' => 'هيا بنا معا', 'correct' => ['هيا بنا', 'معا'], 'extra' => ['حديقة', 'متجر']],
                            'ru' => ['sentence' => 'пойдём вместе', 'correct' => ['пойдём', 'вместе'], 'extra' => ['парк', 'магазин']],
                            'es' => ['sentence' => 'Vamos juntos', 'correct' => ['vamos', 'juntos'], 'extra' => ['parque', 'tienda']],
                            'de' => ['sentence' => 'Lass uns zusammen gehen', 'correct' => ['lass uns zusammen', 'gehen'], 'extra' => ['Park', 'Geschäft']],
                            'ja' => ['sentence' => '一緒に行きましょう', 'correct' => ['一緒に', '行きましょう'], 'extra' => ['公園', '店']],
                            'ko' => ['sentence' => '함께 갑시다', 'correct' => ['함께', '갑시다'], 'extra' => ['공원', '가게']],
                            'tr' => ['sentence' => 'birlikte gidelim', 'correct' => ['birlikte', 'gidelim'], 'extra' => ['park', 'dükkan']],
                        ],
                    ],
                    'b' => [
                        'words' => ['allons', 'dans', 'le', 'parc'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => "Let's go in the park", 'correct' => ["let's go", 'in', 'the', 'park'], 'extra' => ['shop']],
                            'az' => ['sentence' => 'gedək içində park', 'correct' => ['gedək', 'içində', 'park'], 'extra' => ['mağaza']],
                            'ar' => ['sentence' => 'هيا بنا في حديقة', 'correct' => ['هيا بنا', 'في', 'حديقة'], 'extra' => ['متجر']],
                            'ru' => ['sentence' => 'пойдём в парк', 'correct' => ['пойдём', 'в', 'парк'], 'extra' => ['магазин']],
                            'es' => ['sentence' => 'Vamos en el parque', 'correct' => ['vamos', 'en', 'el', 'parque'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Lass uns in den Park gehen', 'correct' => ['lass uns in', 'den', 'Park', 'gehen'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '公園に行きましょう', 'correct' => ['公園', 'に', '行きましょう'], 'extra' => ['店']],
                            'ko' => ['sentence' => '공원에 갑시다', 'correct' => ['공원에', '갑시다'], 'extra' => ['가게']],
                            'tr' => ['sentence' => 'parka gidelim', 'correct' => ['parka', 'gidelim'], 'extra' => ['dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => ['allons', 'ensemble', 'dans', 'le', 'magasin'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => "Let's go together in the shop", 'correct' => ["let's go", 'together', 'in', 'the', 'shop'], 'extra' => ['park']],
                            'az' => ['sentence' => 'gedək birlikdə içində mağaza', 'correct' => ['gedək', 'birlikdə', 'içində', 'mağaza'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'هيا بنا معا في متجر', 'correct' => ['هيا بنا', 'معا', 'في', 'متجر'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'пойдём вместе в магазин', 'correct' => ['пойдём', 'вместе', 'в', 'магазин'], 'extra' => ['парк']],
                            'es' => ['sentence' => 'Vamos juntos en la tienda', 'correct' => ['vamos', 'juntos', 'en', 'la', 'tienda'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Lass uns zusammen ins Geschäft gehen', 'correct' => ['lass uns gehen', 'zusammen', 'in', 'das', 'Geschäft'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '一緒に店に行きましょう', 'correct' => ['一緒に', '店', 'に', '行きましょう'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '함께 가게에 갑시다', 'correct' => ['함께', '가게에', '갑시다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'birlikte dükkana gidelim', 'correct' => ['birlikte', 'dükkana', 'gidelim'], 'extra' => ['park']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Soon & Tonight', 2,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Bientôt'], ['fr' => 'Ce soir']],
                phrases: [
                    'a' => [
                        'words' => ['à', 'bientôt'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'See you soon', 'correct' => ['see you', 'soon'], 'extra' => ['this evening', 'house']],
                            'az' => ['sentence' => 'görüşərik tezliklə', 'correct' => ['görüşərik', 'tezliklə'], 'extra' => ['bu', 'axşam', 'ev']],
                            'ar' => ['sentence' => 'إلى اللقاء قريبا', 'correct' => ['إلى اللقاء', 'قريبا'], 'extra' => ['هذا', 'مساء', 'بيت']],
                            'ru' => ['sentence' => 'до встречи скоро', 'correct' => ['до встречи', 'скоро'], 'extra' => ['это', 'вечер', 'дом']],
                            'es' => ['sentence' => 'Hasta pronto', 'correct' => ['hasta', 'pronto'], 'extra' => ['esta tarde', 'casa']],
                            'de' => ['sentence' => 'Bis bald', 'correct' => ['bis', 'bald'], 'extra' => ['heute Abend', 'Haus']],
                            'ja' => ['sentence' => 'またすぐに', 'correct' => ['また', 'すぐに'], 'extra' => ['今晩', '家']],
                            'ko' => ['sentence' => '곧 만나요', 'correct' => ['곧', '만나요'], 'extra' => ['오늘 저녁', '집']],
                            'tr' => ['sentence' => 'görüşürüz', 'correct' => ['görüşürüz'], 'extra' => ['bu akşam', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ce soir', 'dans', 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'This evening in a coffee shop', 'correct' => ['this evening', 'in', 'a', 'coffee'], 'extra' => ['soon']],
                            'az' => ['sentence' => 'bu axşam içində bir qəhvə', 'correct' => ['bu', 'axşam', 'içində', 'bir', 'qəhvə'], 'extra' => ['tezliklə']],
                            'ar' => ['sentence' => 'هذا مساء في قهوة', 'correct' => ['هذا', 'مساء', 'في', 'قهوة'], 'extra' => ['قريبا']],
                            'ru' => ['sentence' => 'это вечер в кофе', 'correct' => ['это', 'вечер', 'в', 'кофе'], 'extra' => ['скоро']],
                            'es' => ['sentence' => 'Esta tarde en un café', 'correct' => ['esta tarde', 'en', 'un', 'café'], 'extra' => ['pronto']],
                            'de' => ['sentence' => 'Heute Abend in einem Kaffee', 'correct' => ['heute Abend', 'in', 'einem', 'Kaffee'], 'extra' => ['bald']],
                            'ja' => ['sentence' => '今晩コーヒーで', 'correct' => ['今', '晩', 'コーヒー', 'で'], 'extra' => ['すぐに']],
                            'ko' => ['sentence' => '오늘 저녁 커피에서', 'correct' => ['오늘', '저녁', '커피에서'], 'extra' => ['곧']],
                            'tr' => ['sentence' => 'bu akşam bir kafede', 'correct' => ['bu', 'akşam', 'bir', 'kafede'], 'extra' => ['yakında']],
                        ],
                    ],
                    'c' => [
                        'words' => ['à', 'bientôt', 'dans', 'ma', 'maison'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'See you soon in my house', 'correct' => ['see you', 'soon', 'in', 'my', 'house'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'görüşərik tezliklə içində mənim ev', 'correct' => ['görüşərik', 'tezliklə', 'içində', 'mənim', 'ev'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'إلى اللقاء قريبا في بيت', 'correct' => ['إلى اللقاء', 'قريبا', 'في', 'بيت'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'до встречи скоро в мой дом', 'correct' => ['до встречи', 'скоро', 'в', 'мой', 'дом'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Hasta pronto en mi casa', 'correct' => ['hasta', 'pronto', 'en', 'mi', 'casa'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Bis bald in meinem Haus', 'correct' => ['bis', 'bald', 'in', 'meinem', 'Haus'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'また私の家ですぐに', 'correct' => ['また', '私の', '家', 'で', 'すぐに'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '곧 나의 집에서 만나요', 'correct' => ['곧', '나의', '집에서', '만나요'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'evimde görüşürüz', 'correct' => ['evimde', 'görüşürüz'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Okay & Then', 3,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Gare', 'img' => 'station']],
                plain: [['fr' => "D'accord"], ['fr' => 'Ensuite']],
                phrases: [
                    'a' => [
                        'words' => ["d'accord", 'à', 'bientôt'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Okay, see you soon', 'correct' => ['okay', 'see you', 'soon'], 'extra' => ['then']],
                            'az' => ['sentence' => 'yaxşı görüşərik tezliklə', 'correct' => ['yaxşı', 'görüşərik', 'tezliklə'], 'extra' => ['sonra']],
                            'ar' => ['sentence' => 'حسنا إلى اللقاء قريبا', 'correct' => ['حسنا', 'إلى اللقاء', 'قريبا'], 'extra' => ['ثم']],
                            'ru' => ['sentence' => 'хорошо до встречи скоро', 'correct' => ['хорошо', 'до встречи', 'скоро'], 'extra' => ['потом']],
                            'es' => ['sentence' => 'De acuerdo, hasta pronto', 'correct' => ['de acuerdo', 'hasta', 'pronto'], 'extra' => ['luego']],
                            'de' => ['sentence' => 'Einverstanden, bis bald', 'correct' => ['einverstanden', 'bis', 'bald'], 'extra' => ['dann']],
                            'ja' => ['sentence' => 'わかりました、またすぐに', 'correct' => ['わかりました', 'また', 'すぐに'], 'extra' => ['それから']],
                            'ko' => ['sentence' => '알겠습니다, 곧 만나요', 'correct' => ['알겠습니다', '곧', '만나요'], 'extra' => ['그다음에']],
                            'tr' => ['sentence' => 'tamam görüşürüz', 'correct' => ['tamam', 'görüşürüz'], 'extra' => ['sonra']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ensuite', 'une', 'école'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Then a school', 'correct' => ['then', 'a', 'school'], 'extra' => ['okay', 'station']],
                            'az' => ['sentence' => 'sonra bir məktəb', 'correct' => ['sonra', 'bir', 'məktəb'], 'extra' => ['yaxşı', 'stansiya']],
                            'ar' => ['sentence' => 'ثم مدرسة', 'correct' => ['ثم', 'مدرسة'], 'extra' => ['حسنا', 'محطة']],
                            'ru' => ['sentence' => 'потом школа', 'correct' => ['потом', 'школа'], 'extra' => ['хорошо', 'станция']],
                            'es' => ['sentence' => 'Luego una escuela', 'correct' => ['luego', 'una', 'escuela'], 'extra' => ['de acuerdo', 'estación']],
                            'de' => ['sentence' => 'Dann eine Schule', 'correct' => ['dann', 'eine', 'Schule'], 'extra' => ['einverstanden', 'Bahnhof']],
                            'ja' => ['sentence' => 'それから学校', 'correct' => ['それから', '学校'], 'extra' => ['わかりました', '駅']],
                            'ko' => ['sentence' => '그다음에 학교', 'correct' => ['그다음에', '학교'], 'extra' => ['알겠습니다', '역']],
                            'tr' => ['sentence' => 'sonra bir okul', 'correct' => ['sonra', 'bir', 'okul'], 'extra' => ['tamam', 'istasyon']],
                        ],
                    ],
                    'c' => [
                        'words' => ["d'accord", 'ensuite', 'la', 'gare'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Okay, then the station', 'correct' => ['okay', 'then', 'the', 'station'], 'extra' => ['school']],
                            'az' => ['sentence' => 'yaxşı sonra stansiya', 'correct' => ['yaxşı', 'sonra', 'stansiya'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'حسنا ثم محطة', 'correct' => ['حسنا', 'ثم', 'محطة'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'хорошо потом станция', 'correct' => ['хорошо', 'потом', 'станция'], 'extra' => ['школа']],
                            'es' => ['sentence' => 'De acuerdo, luego la estación', 'correct' => ['de acuerdo', 'luego', 'la', 'estación'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Einverstanden, dann der Bahnhof', 'correct' => ['einverstanden', 'dann', 'der', 'Bahnhof'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'わかりました、それから駅', 'correct' => ['わかりました', 'それから', '駅'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '알겠습니다, 그다음에 역', 'correct' => ['알겠습니다', '그다음에', '역'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'tamam sonra istasyon', 'correct' => ['tamam', 'sonra', 'istasyon'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Later & Really', 4,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Plus tard'], ['fr' => 'Vraiment']],
                phrases: [
                    'a' => [
                        'words' => ['plus tard', 'dans', 'le', 'parc'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Later in the park', 'correct' => ['later', 'in', 'the', 'park'], 'extra' => ['really']],
                            'az' => ['sentence' => 'sonradan içində park', 'correct' => ['sonradan', 'içində', 'park'], 'extra' => ['həqiqətən']],
                            'ar' => ['sentence' => 'لاحقا في حديقة', 'correct' => ['لاحقا', 'في', 'حديقة'], 'extra' => ['حقا']],
                            'ru' => ['sentence' => 'позже в парк', 'correct' => ['позже', 'в', 'парк'], 'extra' => ['действительно']],
                            'es' => ['sentence' => 'Más tarde en el parque', 'correct' => ['más tarde', 'en', 'el', 'parque'], 'extra' => ['realmente']],
                            'de' => ['sentence' => 'Später im Park', 'correct' => ['später', 'in', 'dem', 'Park'], 'extra' => ['wirklich']],
                            'ja' => ['sentence' => '後で公園で', 'correct' => ['後で', '公園', 'で'], 'extra' => ['本当に']],
                            'ko' => ['sentence' => '나중에 공원에서', 'correct' => ['나중에', '공원에서'], 'extra' => ['정말']],
                            'tr' => ['sentence' => 'sonra parkta', 'correct' => ['sonra', 'parkta'], 'extra' => ['gerçekten']],
                        ],
                    ],
                    'b' => [
                        'words' => ['vraiment', 'bien'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Really well', 'correct' => ['really', 'well'], 'extra' => ['later', 'park']],
                            'az' => ['sentence' => 'həqiqətən yaxşıyam', 'correct' => ['həqiqətən', 'yaxşıyam'], 'extra' => ['sonradan', 'park']],
                            'ar' => ['sentence' => 'حقا بخير', 'correct' => ['حقا', 'بخير'], 'extra' => ['لاحقا', 'حديقة']],
                            'ru' => ['sentence' => 'действительно хорошо', 'correct' => ['действительно', 'хорошо'], 'extra' => ['позже', 'парк']],
                            'es' => ['sentence' => 'Realmente bien', 'correct' => ['realmente', 'bien'], 'extra' => ['más tarde', 'parque']],
                            'de' => ['sentence' => 'Wirklich gut', 'correct' => ['wirklich', 'gut'], 'extra' => ['später', 'Park']],
                            'ja' => ['sentence' => '本当によく', 'correct' => ['本当に', 'よく'], 'extra' => ['後で', '公園']],
                            'ko' => ['sentence' => '정말 잘', 'correct' => ['정말', '잘'], 'extra' => ['나중에', '공원']],
                            'tr' => ['sentence' => 'gerçekten iyi', 'correct' => ['gerçekten', 'iyi'], 'extra' => ['sonra', 'park']],
                        ],
                    ],
                    'c' => [
                        'words' => ['plus tard', 'dans', 'un', 'café'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Later in a coffee shop', 'correct' => ['later', 'in', 'a', 'coffee'], 'extra' => ['park']],
                            'az' => ['sentence' => 'sonradan içində bir qəhvə', 'correct' => ['sonradan', 'içində', 'bir', 'qəhvə'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'لاحقا في قهوة', 'correct' => ['لاحقا', 'في', 'قهوة'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'позже в кофе', 'correct' => ['позже', 'в', 'кофе'], 'extra' => ['парк']],
                            'es' => ['sentence' => 'Más tarde en un café', 'correct' => ['más tarde', 'en', 'un', 'café'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Später in einem Kaffee', 'correct' => ['später', 'in', 'einem', 'Kaffee'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '後でコーヒーで', 'correct' => ['後で', 'コーヒー', 'で'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나중에 커피에서', 'correct' => ['나중에', '커피에서'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'sonra bir kafede', 'correct' => ['sonra', 'bir', 'kafede'], 'extra' => ['park']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Watch A Film', 5,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Film'], ['fr' => 'Regarder']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'film'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A film', 'correct' => ['a', 'film'], 'extra' => ['to watch', 'house']],
                            'az' => ['sentence' => 'bir film', 'correct' => ['bir', 'film'], 'extra' => ['izləmək', 'ev']],
                            'ar' => ['sentence' => 'فيلم', 'correct' => ['فيلم'], 'extra' => ['المشاهدة', 'بيت']],
                            'ru' => ['sentence' => 'фильм', 'correct' => ['фильм'], 'extra' => ['смотреть', 'дом']],
                            'es' => ['sentence' => 'Una película', 'correct' => ['una', 'película'], 'extra' => ['mirar', 'casa']],
                            'de' => ['sentence' => 'Ein Film', 'correct' => ['ein', 'Film'], 'extra' => ['schauen', 'Haus']],
                            'ja' => ['sentence' => '映画', 'correct' => ['映画'], 'extra' => ['見る', '家']],
                            'ko' => ['sentence' => '영화', 'correct' => ['영화'], 'extra' => ['보다', '집']],
                            'tr' => ['sentence' => 'bir film', 'correct' => ['bir', 'film'], 'extra' => ['izlemek', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['regarder', 'un', 'film', 'dans', 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To watch a film in a coffee shop', 'correct' => ['to watch', 'a', 'film', 'in', 'a', 'coffee'], 'extra' => ['house']],
                            'az' => ['sentence' => 'izləmək bir film içində bir qəhvə', 'correct' => ['izləmək', 'bir', 'film', 'içində', 'bir', 'qəhvə'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'المشاهدة فيلم في قهوة', 'correct' => ['المشاهدة', 'فيلم', 'في', 'قهوة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'смотреть фильм в кофе', 'correct' => ['смотреть', 'фильм', 'в', 'кофе'], 'extra' => ['дом']],
                            'es' => ['sentence' => 'Mirar una película en un café', 'correct' => ['mirar', 'una', 'película', 'en', 'un', 'café'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Einen Film in einem Kaffee schauen', 'correct' => ['einen', 'Film', 'in', 'einem', 'Kaffee', 'schauen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'コーヒーで映画を見る', 'correct' => ['コーヒー', 'で', '映画', 'を', '見る'], 'extra' => ['家']],
                            'ko' => ['sentence' => '커피에서 영화를 보다', 'correct' => ['커피에서', '영화를', '보다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bir kafede film izlemek', 'correct' => ['bir', 'kafede', 'film', 'izlemek'], 'extra' => ['ev']],
                        ],
                    ],
                    'c' => [
                        'words' => ['regarder', 'un', 'film', 'dans', 'ma', 'maison'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'To watch a film in my house', 'correct' => ['to watch', 'a', 'film', 'in', 'my', 'house'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'izləmək bir film içində mənim ev', 'correct' => ['izləmək', 'bir', 'film', 'içində', 'mənim', 'ev'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'المشاهدة فيلم في بيت', 'correct' => ['المشاهدة', 'فيلم', 'في', 'بيت'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'смотреть фильм в мой дом', 'correct' => ['смотреть', 'фильм', 'в', 'мой', 'дом'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Mirar una película en mi casa', 'correct' => ['mirar', 'una', 'película', 'en', 'mi', 'casa'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Einen Film in meinem Haus schauen', 'correct' => ['einen', 'Film', 'in', 'meinem', 'Haus', 'schauen'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私の家で映画を見る', 'correct' => ['私の', '家', 'で', '映画', 'を', '見る'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '나의 집에서 영화를 보다', 'correct' => ['나의', '집에서', '영화를', '보다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'evimde film izlemek', 'correct' => ['evimde', 'film', 'izlemek'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
