<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'صديق' => 'friend', 'أم' => 'mother', 'أب' => 'father', 'قهوة' => 'coffee',
        'حساء' => 'soup', 'تفاحة' => 'apple', 'مدرسة' => 'school', 'الذهاب' => 'park',
        'صغير' => 'small', 'بيت' => 'house',
    ];

    /**
     * Arabic Beginner Unit 10.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Feelings & Review', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Happy & Sad', 1,
                pictures: [['ar' => 'صديق', 'img' => 'friend'], ['ar' => 'أم', 'img' => 'mother']],
                plain: [['ar' => 'فرح'], ['ar' => 'حزين']],
                phrases: [
                    'a' => [
                        'words' => ['صديق', 'فرح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My friend is happy', 'correct' => ['my', 'friend is', 'happy'], 'extra' => ['sad']],
                            'az' => ['sentence' => 'mənim dost xoşbəxt', 'correct' => ['mənim', 'dost', 'xoşbəxt'], 'extra' => ['kədərli']],
                            'fr' => ['sentence' => 'Mon ami est heureux', 'correct' => ['mon', 'ami est', 'heureux'], 'extra' => ['triste']],
                            'es' => ['sentence' => 'Mi amigo está feliz', 'correct' => ['mi', 'amigo está', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Mein Freund ist glücklich', 'correct' => ['mein', 'Freund ist', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私の友達は幸せです', 'correct' => ['私の', '友達', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '내 친구는 행복하다', 'correct' => ['내', '친구는', '행복하다'], 'extra' => ['슬픈']],
                            'tr' => ['sentence' => 'arkadaşım mutlu', 'correct' => ['arkadaşım', 'mutlu'], 'extra' => ['üzgün', 'arkadaş']],
                            'ru' => ['sentence' => 'мой друг счастливый', 'correct' => ['мой', 'друг', 'счастливый'], 'extra' => ['грустный']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أم', 'حزين'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother is sad', 'correct' => ['my', 'mother is', 'sad'], 'extra' => ['happy']],
                            'az' => ['sentence' => 'mənim ana kədərli', 'correct' => ['mənim', 'ana', 'kədərli'], 'extra' => ['xoşbəxt']],
                            'fr' => ['sentence' => 'Ma mère est triste', 'correct' => ['ma', 'mère est', 'triste'], 'extra' => ['heureux']],
                            'es' => ['sentence' => 'Mi madre está triste', 'correct' => ['mi', 'madre está', 'triste'], 'extra' => ['feliz']],
                            'de' => ['sentence' => 'Meine Mutter ist traurig', 'correct' => ['meine', 'Mutter ist', 'traurig'], 'extra' => ['glücklich']],
                            'ja' => ['sentence' => '私の母は悲しいです', 'correct' => ['私の', '母', 'は', '悲しい', 'です'], 'extra' => ['幸せ']],
                            'ko' => ['sentence' => '내 어머니는 슬프다', 'correct' => ['내', '어머니는', '슬프다'], 'extra' => ['행복한']],
                            'tr' => ['sentence' => 'annem üzgün', 'correct' => ['annem', 'üzgün'], 'extra' => ['mutlu', 'arkadaş']],
                            'ru' => ['sentence' => 'мой мама грустный', 'correct' => ['мой', 'мама', 'грустный'], 'extra' => ['счастливый']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أنا', 'فرح', 'اليوم'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am happy today', 'correct' => ['I am', 'happy', 'today'], 'extra' => ['sad']],
                            'az' => ['sentence' => 'mən xoşbəxt bu gün', 'correct' => ['mən', 'xoşbəxt', 'bu gün'], 'extra' => ['kədərli']],
                            'fr' => ['sentence' => "Je suis heureux aujourd'hui", 'correct' => ['je', "aujourd'hui", 'je suis heureux'], 'extra' => ['triste']],
                            'es' => ['sentence' => 'Hoy estoy feliz', 'correct' => ['hoy', 'estoy', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Ich bin heute glücklich', 'correct' => ['ich bin', 'heute', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私は今日幸せです', 'correct' => ['私', 'は', '今日', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '나는 오늘 행복하다', 'correct' => ['나는', '오늘', '행복하다'], 'extra' => ['슬픈']],
                            'tr' => ['sentence' => 'ben bugün mutluyum', 'correct' => ['ben', 'bugün', 'mutluyum'], 'extra' => ['mutlu', 'üzgün']],
                            'ru' => ['sentence' => 'я счастливый сегодня', 'correct' => ['я', 'счастливый', 'сегодня'], 'extra' => ['грустный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Tired & Sick', 2,
                pictures: [['ar' => 'أب', 'img' => 'father'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أنا'], ['ar' => 'متعب']],
                phrases: [
                    'a' => [
                        'words' => ['أنا', 'متعب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am tired', 'correct' => ['I am', 'tired'], 'extra' => ['sick']],
                            'az' => ['sentence' => 'mən yorğun', 'correct' => ['mən', 'yorğun'], 'extra' => ['xəstə']],
                            'fr' => ['sentence' => 'Je suis fatigué', 'correct' => ['je suis', 'fatigué'], 'extra' => ['malade']],
                            'es' => ['sentence' => 'Estoy cansado', 'correct' => ['estoy', 'cansado'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '私は疲れた', 'correct' => ['私', 'は', '疲れた'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '나는 피곤하다', 'correct' => ['나는', '피곤하다'], 'extra' => ['아픈']],
                            'tr' => ['sentence' => 'ben yorgunum', 'correct' => ['ben', 'yorgunum'], 'extra' => ['yorgun', 'hasta']],
                            'ru' => ['sentence' => 'я усталый', 'correct' => ['я', 'усталый'], 'extra' => ['больной']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أب', 'مريض'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My father is sick', 'correct' => ['my', 'father is', 'sick'], 'extra' => ['tired']],
                            'az' => ['sentence' => 'mənim ata xəstə', 'correct' => ['mənim', 'ata', 'xəstə'], 'extra' => ['yorğun']],
                            'fr' => ['sentence' => 'Mon père est malade', 'correct' => ['mon', 'père est', 'malade'], 'extra' => ['fatigué']],
                            'es' => ['sentence' => 'Mi padre está enfermo', 'correct' => ['mi', 'padre está', 'enfermo'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Mein Vater ist krank', 'correct' => ['mein', 'Vater ist', 'krank'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私の父は病気です', 'correct' => ['私の', '父', 'は', '病気', 'です'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '내 아버지는 아프다', 'correct' => ['내', '아버지는', '아프다'], 'extra' => ['피곤한']],
                            'tr' => ['sentence' => 'babam hasta', 'correct' => ['babam', 'hasta'], 'extra' => ['yorgun', 'doktor']],
                            'ru' => ['sentence' => 'мой папа больной', 'correct' => ['мой', 'папа', 'больной'], 'extra' => ['усталый']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أنا', 'متعب', 'و', 'إلى', 'أذهب', 'في البيت'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'I am tired and to go home', 'correct' => ['I am', 'tired and', 'to', 'go', 'home'], 'extra' => ['sick']],
                            'az' => ['sentence' => 'mən yorğun və gedirəm evdəyəm', 'correct' => ['mən', 'yorğun', 'və', 'gedirəm', 'evdəyəm'], 'extra' => ['xəstə']],
                            'fr' => ['sentence' => 'Je suis fatigué et aller à la maison', 'correct' => ['je suis', 'fatigué et', 'aller à', 'la', 'maison'], 'extra' => ['malade']],
                            'es' => ['sentence' => 'Estoy cansado y ir a casa', 'correct' => ['estoy cansado', 'y', 'ir', 'a', 'casa'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Ich bin müde und nach Hause gehen', 'correct' => ['ich bin', 'müde und', 'nach', 'Hause', 'gehen'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '私は疲れて家へ行く', 'correct' => ['私', 'は', '疲れて', '家', 'へ', '行く'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '나는 피곤하고 집에 가다', 'correct' => ['나는', '피곤하고', '집에', '가다'], 'extra' => ['아픈']],
                            'tr' => ['sentence' => 'ben yorgunum ve eve gitmek', 'correct' => ['ben', 'yorgunum', 've', 'eve', 'gitmek'], 'extra' => ['yorgun', 'hasta']],
                            'ru' => ['sentence' => 'я усталый и в иду дома', 'correct' => ['я', 'усталый', 'и', 'в', 'иду', 'дома'], 'extra' => ['больной']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Review — Eating', 3,
                pictures: [['ar' => 'حساء', 'img' => 'soup'], ['ar' => 'تفاحة', 'img' => 'apple']],
                plain: [['ar' => 'الشرب'], ['ar' => 'الأكل']],
                phrases: [
                    'a' => [
                        'words' => ['الشرب', 'حساء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink the soup', 'correct' => ['to drink', 'the soup'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'içmək şorba', 'correct' => ['içmək', 'şorba'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Boire la soupe', 'correct' => ['boire', 'la soupe'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Beber la sopa', 'correct' => ['beber', 'la sopa'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Suppe trinken', 'correct' => ['die Suppe', 'trinken'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'スープを飲む', 'correct' => ['スープ', 'を', '飲む'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '수프를 마시다', 'correct' => ['수프를', '마시다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'çorbayı içmek', 'correct' => ['çorbayı', 'içmek'], 'extra' => ['i̇çmek', 'kitap']],
                            'ru' => ['sentence' => 'пить суп', 'correct' => ['пить', 'суп'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الأكل', 'تفاحة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple', 'correct' => ['to eat', 'an', 'apple'], 'extra' => ['soup']],
                            'az' => ['sentence' => 'yemək yemək bir alma', 'correct' => ['yemək yemək', 'bir', 'alma'], 'extra' => ['şorba']],
                            'fr' => ['sentence' => 'Manger une pomme', 'correct' => ['manger', 'une', 'pomme'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Comer una manzana', 'correct' => ['comer', 'una', 'manzana'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Einen Apfel essen', 'correct' => ['einen', 'Apfel', 'essen'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['수프']],
                            'tr' => ['sentence' => 'bir elma yemek', 'correct' => ['bir', 'elma', 'yemek'], 'extra' => ['çorbayı', 'i̇çmek']],
                            'ru' => ['sentence' => 'кушать яблоко', 'correct' => ['кушать', 'яблоко'], 'extra' => ['суп']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'إلى', 'مشروب', 'حساء', 'و', 'آكل', 'خبز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today to drink the soup and eat bread', 'correct' => ['today to', 'drink the', 'soup', 'and', 'eat', 'bread'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'bu gün içki şorba və yeyirəm çörək', 'correct' => ['bu gün', 'içki', 'şorba', 'və', 'yeyirəm', 'çörək'], 'extra' => ['alma']],
                            'fr' => ['sentence' => "Aujourd'hui boire la soupe et manger du pain", 'correct' => ["aujourd'hui", 'boire', 'la soupe', 'et', 'pain', 'manger'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Hoy beber la sopa y comer pan', 'correct' => ['hoy', 'beber', 'la sopa', 'y', 'comer', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Heute die Suppe trinken und Brot essen', 'correct' => ['heute', 'die Suppe', 'trinken', 'und', 'Brot', 'essen'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '今日スープを飲んでパンを食べる', 'correct' => ['今日', 'スープ', 'を', '飲んで', 'パン', 'を', '食べる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오늘 수프를 마시고 빵을 먹다', 'correct' => ['오늘', '수프를', '마시고', '빵을', '먹다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'bugün çorbayı içmek ve ekmek yemek', 'correct' => ['bugün', 'çorbayı', 'içmek', 've', 'ekmek', 'yemek'], 'extra' => ['i̇çmek', 'kitap']],
                            'ru' => ['sentence' => 'сегодня в напиток суп и ем хлеб', 'correct' => ['сегодня', 'в', 'напиток', 'суп', 'и', 'ем', 'хлеб'], 'extra' => ['яблоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Review — Going', 4,
                pictures: [['ar' => 'مدرسة', 'img' => 'school'], ['ar' => 'الذهاب', 'img' => 'park']],
                plain: [['ar' => 'أتمشى'], ['ar' => 'إلى']],
                phrases: [
                    'a' => [
                        'words' => ['أتمشى', 'إلى', 'مدرسة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I walk to school', 'correct' => ['I walk', 'to', 'school'], 'extra' => ['park']],
                            'az' => ['sentence' => 'gəzirəm məktəb', 'correct' => ['gəzirəm', 'məktəb'], 'extra' => ['park']],
                            'fr' => ['sentence' => "Je marche à l'école", 'correct' => ['je', 'je marche', "à l'école"], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Camino a la escuela', 'correct' => ['camino a', 'la', 'escuela'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich gehe zur Schule', 'correct' => ['ich gehe', 'zur', 'Schule'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '私は学校へ歩く', 'correct' => ['私', 'は', '学校', 'へ', '歩く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '나는 학교에 걷는다', 'correct' => ['나는', '학교에', '걷는다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'ben okula yürüyorum', 'correct' => ['ben', 'okula', 'yürüyorum'], 'extra' => ['yarın', 'park']],
                            'ru' => ['sentence' => 'я гуляю в школа', 'correct' => ['я', 'гуляю', 'в', 'школа'], 'extra' => ['парк']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الذهاب', 'إلى', 'الحديقة', 'غدا'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park tomorrow', 'correct' => ['to go', 'to the park', 'tomorrow'], 'extra' => ['school']],
                            'az' => ['sentence' => 'getmək parka sabah', 'correct' => ['getmək', 'parka', 'sabah'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => 'Aller au parc demain', 'correct' => ['aller', 'au parc', 'demain'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir al parque mañana', 'correct' => ['ir', 'al parque', 'mañana'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Morgen zum Park gehen', 'correct' => ['morgen', 'zum Park', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '明日公園へ行く', 'correct' => ['明日', '公園', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '내일 공원에 가다', 'correct' => ['내일', '공원에', '가다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'yarın parka gitmek', 'correct' => ['yarın', 'parka', 'gitmek'], 'extra' => ['yürüyorum', 'park']],
                            'ru' => ['sentence' => 'идти в парк завтра', 'correct' => ['идти', 'в', 'парк', 'завтра'], 'extra' => ['школа']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'أنا', 'أتمشى', 'إلى', 'مدرسة', 'و', 'غدا', 'إلى', 'حديقة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today I walk to school and tomorrow to the park', 'correct' => ['today I', 'walk to', 'school and', 'tomorrow', 'to', 'the', 'park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bu gün mən gəzirəm məktəb və sabah park', 'correct' => ['bu gün', 'mən', 'gəzirəm', 'məktəb', 'və', 'sabah', 'park'], 'extra' => ['ev']],
                            'fr' => ['sentence' => "Aujourd'hui je marche à l'école et demain au parc", 'correct' => ["aujourd'hui", 'je', 'je marche', "à l'école", 'et', 'demain', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Hoy camino a la escuela y mañana al parque', 'correct' => ['hoy camino', 'a la', 'escuela', 'y', 'mañana', 'al', 'parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Heute gehe ich zur Schule und morgen zum Park', 'correct' => ['heute gehe', 'ich zur', 'Schule', 'und', 'morgen', 'zum', 'Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '今日私は学校へ歩いて明日公園へ', 'correct' => ['今日', '私', 'は', '学校', 'へ', '歩いて', '明日', '公園', 'へ'], 'extra' => ['家']],
                            'ko' => ['sentence' => '오늘 나는 학교에 걷고 내일 공원에', 'correct' => ['오늘', '나는', '학교에', '걷고', '내일', '공원에'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bugün ben okula yürüyorum ve yarın parka', 'correct' => ['bugün', 'ben', 'okula', 'yürüyorum', 've', 'yarın', 'parka'], 'extra' => ['park', 'okul']],
                            'ru' => ['sentence' => 'сегодня я гуляю в школа и завтра в парк', 'correct' => ['сегодня', 'я', 'гуляю', 'в', 'школа', 'и', 'завтра', 'в', 'парк'], 'extra' => ['дом']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Review — Everything', 5,
                pictures: [['ar' => 'صغير', 'img' => 'small'], ['ar' => 'بيت', 'img' => 'house']],
                plain: [['ar' => 'أم'], ['ar' => 'معلم']],
                phrases: [
                    'a' => [
                        'words' => ['صغير', 'بيت'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small house', 'correct' => ['a', 'small', 'house'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik ev', 'correct' => ['bir', 'kiçik', 'ev'], 'extra' => ['böyük']],
                            'fr' => ['sentence' => 'Une petite maison', 'correct' => ['une', 'petite', 'maison'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Una casa pequeña', 'correct' => ['una', 'casa', 'pequeña'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Ein kleines Haus', 'correct' => ['ein', 'kleines', 'Haus'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '小さい家', 'correct' => ['小さい', '家'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 집', 'correct' => ['작은', '집'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'küçük bir ev', 'correct' => ['küçük', 'bir', 'ev'], 'extra' => ['mutluyum', 'anne']],
                            'ru' => ['sentence' => 'маленький дом', 'correct' => ['маленький', 'дом'], 'extra' => ['большой']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أم', 'معلم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother is a teacher', 'correct' => ['my', 'mother is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'mənim ana bir müəllim', 'correct' => ['mənim', 'ana', 'bir', 'müəllim'], 'extra' => ['həkim']],
                            'fr' => ['sentence' => 'Ma mère est professeur', 'correct' => ['ma', 'mère est', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Mi madre es profesora', 'correct' => ['mi', 'madre es', 'profesora'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Meine Mutter ist Lehrerin', 'correct' => ['meine', 'Mutter ist', 'Lehrerin'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '私の母は先生です', 'correct' => ['私の', '母', 'は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '내 어머니는 선생님입니다', 'correct' => ['내', '어머니는', '선생님입니다'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'annem bir öğretmen', 'correct' => ['annem', 'bir', 'öğretmen'], 'extra' => ['mutluyum', 'küçük']],
                            'ru' => ['sentence' => 'мой мама учитель', 'correct' => ['мой', 'мама', 'учитель'], 'extra' => ['врач']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أنا', 'فرح', 'و', 'أنا', 'أقرأ', 'كتاب'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I am happy and I read a book', 'correct' => ['I am', 'happy and', 'I', 'read', 'a', 'book'], 'extra' => ['tired']],
                            'az' => ['sentence' => 'mən xoşbəxt və mən oxuyuram bir kitab', 'correct' => ['mən', 'xoşbəxt', 'və', 'mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['yorğun']],
                            'fr' => ['sentence' => 'Je suis heureux et je lis un livre', 'correct' => ['je suis', 'heureux et', 'je', 'lis', 'un', 'livre'], 'extra' => ['fatigué']],
                            'es' => ['sentence' => 'Estoy feliz y leo un libro', 'correct' => ['estoy', 'feliz', 'y', 'leo', 'un', 'libro'], 'extra' => ['cansado']],
                            'de' => ['sentence' => 'Ich bin glücklich und ich lese ein Buch', 'correct' => ['ich bin', 'glücklich und', 'ich', 'lese', 'ein', 'Buch'], 'extra' => ['müde']],
                            'ja' => ['sentence' => '私は幸せで本を読む', 'correct' => ['私', 'は', '幸せ', 'で', '本', 'を', '読む'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '나는 행복하고 책을 읽는다', 'correct' => ['나는', '행복하고', '책을', '읽는다'], 'extra' => ['피곤한']],
                            'tr' => ['sentence' => 'ben mutluyum ve bir kitap okuyorum', 'correct' => ['ben', 'mutluyum', 've', 'bir', 'kitap', 'okuyorum'], 'extra' => ['küçük', 'anne']],
                            'ru' => ['sentence' => 'я счастливый и я читаю книга', 'correct' => ['я', 'счастливый', 'и', 'я', 'читаю', 'книга'], 'extra' => ['усталый']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
