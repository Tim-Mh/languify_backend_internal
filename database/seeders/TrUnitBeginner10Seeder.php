<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Arkadaş' => 'friend', 'Anne' => 'mother', 'Doktor' => 'doctor', 'Öğretmen' => 'teacher',
        'Ev' => 'house', 'Okul' => 'school', 'Kitap' => 'book', 'Park' => 'park',
    ];

    /**
     * Turkish Beginner Unit 10 — feelings, and everything so far.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * THE REVIEW UNIT. Its job is not to add much but to make the chapter add
     * up, so the phrases here deliberately re-use every idea in turn:
     *
     *   - the accusative from Unit 4  (`çorbayı içmek`)
     *   - the dative from Unit 6      (`eve gitmek`)
     *   - conjugation from Unit 7     (`yürüyorum`, `okuyorum`)
     *   - adjectives from Unit 5      (`küçük bir ev`)
     *   - time words from Unit 8      (`bugün`, `yarın`)
     *
     * The one new idea is the personal ending on an adjective: `mutluyum`,
     * "I am happy". It is the same suffix logic the verbs already use, met one
     * last time on a word the learner already knows — `mutlu` was not taught
     * as a separate item first, it appears here alongside its own inflected
     * form so the pair is visible in a single lesson.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Feelings & Review', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Happy & Sad', 1,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Anne', 'img' => 'mother']],
                plain: [['tr' => 'Mutlu'], ['tr' => 'Üzgün']],
                phrases: [
                    'a' => [
                        'words' => ['arkadaşım', 'mutlu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My friend is happy', 'correct' => ['my', 'friend is', 'happy'], 'extra' => ['sad']],
                            'az' => ['sentence' => 'mənim dost xoşbəxt', 'correct' => ['mənim', 'dost', 'xoşbəxt'], 'extra' => ['kədərli']],
                            'ar' => ['sentence' => 'صديق فرح', 'correct' => ['صديق', 'فرح'], 'extra' => ['حزين']],
                            'ru' => ['sentence' => 'мой друг счастливый', 'correct' => ['мой', 'друг', 'счастливый'], 'extra' => ['грустный']],
                            'fr' => ['sentence' => 'Mon ami est heureux', 'correct' => ['mon', 'ami est', 'heureux'], 'extra' => ['triste']],
                            'es' => ['sentence' => 'Mi amigo está feliz', 'correct' => ['mi', 'amigo está', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Mein Freund ist glücklich', 'correct' => ['mein', 'Freund ist', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私の友達は幸せです', 'correct' => ['私の', '友達', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '내 친구는 행복하다', 'correct' => ['내', '친구는', '행복하다'], 'extra' => ['슬픈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['annem', 'üzgün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother is sad', 'correct' => ['my', 'mother is', 'sad'], 'extra' => ['happy']],
                            'az' => ['sentence' => 'mənim ana kədərli', 'correct' => ['mənim', 'ana', 'kədərli'], 'extra' => ['xoşbəxt']],
                            'ar' => ['sentence' => 'أم حزين', 'correct' => ['أم', 'حزين'], 'extra' => ['فرح']],
                            'ru' => ['sentence' => 'мой мама грустный', 'correct' => ['мой', 'мама', 'грустный'], 'extra' => ['счастливый']],
                            'fr' => ['sentence' => 'Ma mère est triste', 'correct' => ['ma', 'mère est', 'triste'], 'extra' => ['heureux']],
                            'es' => ['sentence' => 'Mi madre está triste', 'correct' => ['mi', 'madre está', 'triste'], 'extra' => ['feliz']],
                            'de' => ['sentence' => 'Meine Mutter ist traurig', 'correct' => ['meine', 'Mutter ist', 'traurig'], 'extra' => ['glücklich']],
                            'ja' => ['sentence' => '私の母は悲しいです', 'correct' => ['私の', '母', 'は', '悲しい', 'です'], 'extra' => ['幸せ']],
                            'ko' => ['sentence' => '내 어머니는 슬프다', 'correct' => ['내', '어머니는', '슬프다'], 'extra' => ['행복한']],
                        ],
                    ],
                    'c' => [
                        // The one new idea: the personal ending on an adjective.
                        'words' => ['ben', 'bugün', 'mutluyum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am happy today', 'correct' => ['I am', 'happy', 'today'], 'extra' => ['sad']],
                            'az' => ['sentence' => 'mən xoşbəxt bu gün', 'correct' => ['mən', 'xoşbəxt', 'bu gün'], 'extra' => ['kədərli']],
                            'ar' => ['sentence' => 'أنا فرح اليوم', 'correct' => ['أنا', 'فرح', 'اليوم'], 'extra' => ['حزين']],
                            'ru' => ['sentence' => 'я счастливый сегодня', 'correct' => ['я', 'счастливый', 'сегодня'], 'extra' => ['грустный']],
                            'fr' => ['sentence' => "Je suis heureux aujourd'hui", 'correct' => ['je', "aujourd'hui", 'je suis heureux'], 'extra' => ['triste']],
                            'es' => ['sentence' => 'Hoy estoy feliz', 'correct' => ['hoy', 'estoy', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Ich bin heute glücklich', 'correct' => ['ich bin', 'heute', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私は今日幸せです', 'correct' => ['私', 'は', '今日', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '나는 오늘 행복하다', 'correct' => ['나는', '오늘', '행복하다'], 'extra' => ['슬픈']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Tired & Sick', 2,
                pictures: [['tr' => 'Doktor', 'img' => 'doctor'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Yorgun'], ['tr' => 'Hasta']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'yorgunum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am tired', 'correct' => ['I am', 'tired'], 'extra' => ['sick']],
                            'az' => ['sentence' => 'mən yorğun', 'correct' => ['mən', 'yorğun'], 'extra' => ['xəstə']],
                            'ar' => ['sentence' => 'أنا متعب', 'correct' => ['أنا', 'متعب'], 'extra' => ['مريض']],
                            'ru' => ['sentence' => 'я усталый', 'correct' => ['я', 'усталый'], 'extra' => ['больной']],
                            'fr' => ['sentence' => 'Je suis fatigué', 'correct' => ['je suis', 'fatigué'], 'extra' => ['malade']],
                            'es' => ['sentence' => 'Estoy cansado', 'correct' => ['estoy', 'cansado'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '私は疲れた', 'correct' => ['私', 'は', '疲れた'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '나는 피곤하다', 'correct' => ['나는', '피곤하다'], 'extra' => ['아픈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['babam', 'hasta'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My father is sick', 'correct' => ['my', 'father is', 'sick'], 'extra' => ['tired']],
                            'az' => ['sentence' => 'mənim ata xəstə', 'correct' => ['mənim', 'ata', 'xəstə'], 'extra' => ['yorğun']],
                            'ar' => ['sentence' => 'أب مريض', 'correct' => ['أب', 'مريض'], 'extra' => ['متعب']],
                            'ru' => ['sentence' => 'мой папа больной', 'correct' => ['мой', 'папа', 'больной'], 'extra' => ['усталый']],
                            'fr' => ['sentence' => 'Mon père est malade', 'correct' => ['mon', 'père est', 'malade'], 'extra' => ['fatigué']],
                            'es' => ['sentence' => 'Mi padre está enfermo', 'correct' => ['mi', 'padre está', 'enfermo'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Mein Vater ist krank', 'correct' => ['mein', 'Vater ist', 'krank'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私の父は病気です', 'correct' => ['私の', '父', 'は', '病気', 'です'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '내 아버지는 아프다', 'correct' => ['내', '아버지는', '아프다'], 'extra' => ['피곤한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'yorgunum', 've', 'eve', 'gitmek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am tired and to go home', 'correct' => ['I am', 'tired and', 'to', 'go', 'home'], 'extra' => ['sick']],
                            'az' => ['sentence' => 'mən yorğun və gedirəm evdəyəm', 'correct' => ['mən', 'yorğun', 'və', 'gedirəm', 'evdəyəm'], 'extra' => ['xəstə']],
                            'ar' => ['sentence' => 'أنا متعب و إلى أذهب في البيت', 'correct' => ['أنا', 'متعب', 'و', 'إلى', 'أذهب', 'في البيت'], 'extra' => ['مريض']],
                            'ru' => ['sentence' => 'я усталый и в иду дома', 'correct' => ['я', 'усталый', 'и', 'в', 'иду', 'дома'], 'extra' => ['больной']],
                            'fr' => ['sentence' => 'Je suis fatigué et aller à la maison', 'correct' => ['je suis', 'fatigué et', 'aller à', 'la', 'maison'], 'extra' => ['malade']],
                            'es' => ['sentence' => 'Estoy cansado y ir a casa', 'correct' => ['estoy cansado', 'y', 'ir', 'a', 'casa'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Ich bin müde und nach Hause gehen', 'correct' => ['ich bin', 'müde und', 'nach', 'Hause', 'gehen'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '私は疲れて家へ行く', 'correct' => ['私', 'は', '疲れて', '家', 'へ', '行く'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '나는 피곤하고 집에 가다', 'correct' => ['나는', '피곤하고', '집에', '가다'], 'extra' => ['아픈']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Review — Eating', 3,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Çorbayı'], ['tr' => 'İçmek']],
                phrases: [
                    'a' => [
                        // Accusative from Unit 4, met again in a new sentence.
                        'words' => ['çorbayı', 'içmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink the soup', 'correct' => ['to drink', 'the soup'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'içmək şorba', 'correct' => ['içmək', 'şorba'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'الشرب حساء', 'correct' => ['الشرب', 'حساء'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'пить суп', 'correct' => ['пить', 'суп'], 'extra' => ['хлеб']],
                            'fr' => ['sentence' => 'Boire la soupe', 'correct' => ['boire', 'la soupe'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Beber la sopa', 'correct' => ['beber', 'la sopa'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Suppe trinken', 'correct' => ['die Suppe', 'trinken'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'スープを飲む', 'correct' => ['スープ', 'を', '飲む'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '수프를 마시다', 'correct' => ['수프를', '마시다'], 'extra' => ['빵']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'elma', 'yemek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple', 'correct' => ['to eat', 'an', 'apple'], 'extra' => ['soup']],
                            'az' => ['sentence' => 'yemək yemək bir alma', 'correct' => ['yemək yemək', 'bir', 'alma'], 'extra' => ['şorba']],
                            'ar' => ['sentence' => 'الأكل تفاحة', 'correct' => ['الأكل', 'تفاحة'], 'extra' => ['حساء']],
                            'ru' => ['sentence' => 'кушать яблоко', 'correct' => ['кушать', 'яблоко'], 'extra' => ['суп']],
                            'fr' => ['sentence' => 'Manger une pomme', 'correct' => ['manger', 'une', 'pomme'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Comer una manzana', 'correct' => ['comer', 'una', 'manzana'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Einen Apfel essen', 'correct' => ['einen', 'Apfel', 'essen'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['수프']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'çorbayı', 'içmek', 've', 'ekmek', 'yemek'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today to drink the soup and eat bread', 'correct' => ['today to', 'drink the', 'soup', 'and', 'eat', 'bread'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'bu gün içki şorba və yeyirəm çörək', 'correct' => ['bu gün', 'içki', 'şorba', 'və', 'yeyirəm', 'çörək'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'اليوم إلى مشروب حساء و آكل خبز', 'correct' => ['اليوم', 'إلى', 'مشروب', 'حساء', 'و', 'آكل', 'خبز'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'сегодня в напиток суп и ем хлеб', 'correct' => ['сегодня', 'в', 'напиток', 'суп', 'и', 'ем', 'хлеб'], 'extra' => ['яблоко']],
                            'fr' => ['sentence' => "Aujourd'hui boire la soupe et manger du pain", 'correct' => ["aujourd'hui", 'boire', 'la soupe', 'et', 'pain', 'manger'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Hoy beber la sopa y comer pan', 'correct' => ['hoy', 'beber', 'la sopa', 'y', 'comer', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Heute die Suppe trinken und Brot essen', 'correct' => ['heute', 'die Suppe', 'trinken', 'und', 'Brot', 'essen'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '今日スープを飲んでパンを食べる', 'correct' => ['今日', 'スープ', 'を', '飲んで', 'パン', 'を', '食べる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오늘 수프를 마시고 빵을 먹다', 'correct' => ['오늘', '수프를', '마시고', '빵을', '먹다'], 'extra' => ['사과']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Review — Going', 4,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Okul', 'img' => 'school']],
                plain: [['tr' => 'Yürüyorum'], ['tr' => 'Yarın']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'okula', 'yürüyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk to school', 'correct' => ['I walk', 'to', 'school'], 'extra' => ['park']],
                            'az' => ['sentence' => 'gəzirəm məktəb', 'correct' => ['gəzirəm', 'məktəb'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'أتمشى إلى مدرسة', 'correct' => ['أتمشى', 'إلى', 'مدرسة'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'я гуляю в школа', 'correct' => ['я', 'гуляю', 'в', 'школа'], 'extra' => ['парк']],
                            'fr' => ['sentence' => "Je marche à l'école", 'correct' => ['je', 'je marche', "à l'école"], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Camino a la escuela', 'correct' => ['camino a', 'la', 'escuela'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich gehe zur Schule', 'correct' => ['ich gehe', 'zur', 'Schule'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '私は学校へ歩く', 'correct' => ['私', 'は', '学校', 'へ', '歩く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나는 학교에 걷는다', 'correct' => ['나는', '학교에', '걷는다'], 'extra' => ['공원']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yarın', 'parka', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park tomorrow', 'correct' => ['to go', 'to the park', 'tomorrow'], 'extra' => ['school']],
                            'az' => ['sentence' => 'getmək parka sabah', 'correct' => ['getmək', 'parka', 'sabah'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'الذهاب إلى الحديقة غدا', 'correct' => ['الذهاب', 'إلى', 'الحديقة', 'غدا'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'идти в парк завтра', 'correct' => ['идти', 'в', 'парк', 'завтра'], 'extra' => ['школа']],
                            'fr' => ['sentence' => 'Aller au parc demain', 'correct' => ['aller', 'au parc', 'demain'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir al parque mañana', 'correct' => ['ir', 'al parque', 'mañana'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Morgen zum Park gehen', 'correct' => ['morgen', 'zum Park', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '明日公園へ行く', 'correct' => ['明日', '公園', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '내일 공원에 가다', 'correct' => ['내일', '공원에', '가다'], 'extra' => ['학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'ben', 'okula', 'yürüyorum', 've', 'yarın', 'parka'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'Today I walk to school and tomorrow to the park', 'correct' => ['today I', 'walk to', 'school and', 'tomorrow', 'to', 'the', 'park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bu gün mən gəzirəm məktəb və sabah park', 'correct' => ['bu gün', 'mən', 'gəzirəm', 'məktəb', 'və', 'sabah', 'park'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'اليوم أنا أتمشى إلى مدرسة و غدا إلى حديقة', 'correct' => ['اليوم', 'أنا', 'أتمشى', 'إلى', 'مدرسة', 'و', 'غدا', 'إلى', 'حديقة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'сегодня я гуляю в школа и завтра в парк', 'correct' => ['сегодня', 'я', 'гуляю', 'в', 'школа', 'и', 'завтра', 'в', 'парк'], 'extra' => ['дом']],
                            'fr' => ['sentence' => "Aujourd'hui je marche à l'école et demain au parc", 'correct' => ["aujourd'hui", 'je', 'je marche', "à l'école", 'et', 'demain', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Hoy camino a la escuela y mañana al parque', 'correct' => ['hoy camino', 'a la', 'escuela', 'y', 'mañana', 'al', 'parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Heute gehe ich zur Schule und morgen zum Park', 'correct' => ['heute gehe', 'ich zur', 'Schule', 'und', 'morgen', 'zum', 'Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '今日私は学校へ歩いて明日公園へ', 'correct' => ['今日', '私', 'は', '学校', 'へ', '歩いて', '明日', '公園', 'へ'], 'extra' => ['家']],
                            'ko' => ['sentence' => '오늘 나는 학교에 걷고 내일 공원에', 'correct' => ['오늘', '나는', '학교에', '걷고', '내일', '공원에'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Review — Everything', 5,
                pictures: [['tr' => 'Anne', 'img' => 'mother'], ['tr' => 'Öğretmen', 'img' => 'teacher']],
                plain: [['tr' => 'Mutluyum'], ['tr' => 'Küçük']],
                phrases: [
                    'a' => [
                        'words' => ['küçük', 'bir', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small house', 'correct' => ['a', 'small', 'house'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik ev', 'correct' => ['bir', 'kiçik', 'ev'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'صغير بيت', 'correct' => ['صغير', 'بيت'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'маленький дом', 'correct' => ['маленький', 'дом'], 'extra' => ['большой']],
                            'fr' => ['sentence' => 'Une petite maison', 'correct' => ['une', 'petite', 'maison'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Una casa pequeña', 'correct' => ['una', 'casa', 'pequeña'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Ein kleines Haus', 'correct' => ['ein', 'kleines', 'Haus'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '小さい家', 'correct' => ['小さい', '家'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 집', 'correct' => ['작은', '집'], 'extra' => ['큰']],
                        ],
                    ],
                    'b' => [
                        'words' => ['annem', 'bir', 'öğretmen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother is a teacher', 'correct' => ['my', 'mother is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'mənim ana bir müəllim', 'correct' => ['mənim', 'ana', 'bir', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'أم معلم', 'correct' => ['أم', 'معلم'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'мой мама учитель', 'correct' => ['мой', 'мама', 'учитель'], 'extra' => ['врач']],
                            'fr' => ['sentence' => 'Ma mère est professeur', 'correct' => ['ma', 'mère est', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Mi madre es profesora', 'correct' => ['mi', 'madre es', 'profesora'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Meine Mutter ist Lehrerin', 'correct' => ['meine', 'Mutter ist', 'Lehrerin'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '私の母は先生です', 'correct' => ['私の', '母', 'は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '내 어머니는 선생님입니다', 'correct' => ['내', '어머니는', '선생님입니다'], 'extra' => ['의사']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'mutluyum', 've', 'bir', 'kitap', 'okuyorum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I am happy and I read a book', 'correct' => ['I am', 'happy and', 'I', 'read', 'a', 'book'], 'extra' => ['tired']],
                            'az' => ['sentence' => 'mən xoşbəxt və mən oxuyuram bir kitab', 'correct' => ['mən', 'xoşbəxt', 'və', 'mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['yorğun']],
                            'ar' => ['sentence' => 'أنا فرح و أنا أقرأ كتاب', 'correct' => ['أنا', 'فرح', 'و', 'أنا', 'أقرأ', 'كتاب'], 'extra' => ['متعب']],
                            'ru' => ['sentence' => 'я счастливый и я читаю книга', 'correct' => ['я', 'счастливый', 'и', 'я', 'читаю', 'книга'], 'extra' => ['усталый']],
                            'fr' => ['sentence' => 'Je suis heureux et je lis un livre', 'correct' => ['je suis', 'heureux et', 'je', 'lis', 'un', 'livre'], 'extra' => ['fatigué']],
                            'es' => ['sentence' => 'Estoy feliz y leo un libro', 'correct' => ['estoy', 'feliz', 'y', 'leo', 'un', 'libro'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Ich bin glücklich und ich lese ein Buch', 'correct' => ['ich bin', 'glücklich und', 'ich', 'lese', 'ein', 'Buch'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私は幸せで本を読む', 'correct' => ['私', 'は', '幸せ', 'で', '本', 'を', '読む'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '나는 행복하고 책을 읽는다', 'correct' => ['나는', '행복하고', '책을', '읽는다'], 'extra' => ['피곤한']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
