<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'التمشي' => 'walk', 'حديقة' => 'park', 'النوم' => 'sleep', 'قهوة' => 'coffee',
        'التكلم' => 'speak', 'القراءة' => 'book', 'كتاب' => 'book', 'صديق' => 'friend',
    ];

    /**
     * Arabic Beginner Unit 7.
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

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Daily Actions', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Walking', 1,
                pictures: [['ar' => 'التمشي', 'img' => 'walk'], ['ar' => 'حديقة', 'img' => 'park']],
                plain: [['ar' => 'ببطء'], ['ar' => 'أنا']],
                phrases: [
                    'a' => [
                        'words' => ['التمشي', 'ببطء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To walk slowly', 'correct' => ['to walk', 'slowly'], 'extra' => ['to go']],
                            'az' => ['sentence' => 'gəzmək yavaş', 'correct' => ['gəzmək', 'yavaş'], 'extra' => ['getmək']],
                            'fr' => ['sentence' => 'Marcher lentement', 'correct' => ['marcher', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Caminar despacio', 'correct' => ['caminar', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Langsam gehen', 'correct' => ['langsam', 'gehen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'ゆっくり歩く', 'correct' => ['ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '천천히 걷다', 'correct' => ['천천히', '걷다'], 'extra' => ['가다']],
                            'tr' => ['sentence' => 'yavaş yürümek', 'correct' => ['yavaş', 'yürümek'], 'extra' => ['ben', 'gitmek']],
                            'ru' => ['sentence' => 'гулять медленно', 'correct' => ['гулять', 'медленно'], 'extra' => ['идти']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أنا', 'أتمشى', 'ببطء'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly', 'correct' => ['I', 'walk', 'slowly'], 'extra' => ['to go']],
                            'az' => ['sentence' => 'mən gəzirəm yavaş', 'correct' => ['mən', 'gəzirəm', 'yavaş'], 'extra' => ['getmək']],
                            'fr' => ['sentence' => 'Je marche lentement', 'correct' => ['je', 'marche', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Camino despacio', 'correct' => ['camino', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Ich gehe langsam', 'correct' => ['ich', 'gehe', 'langsam'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はゆっくり歩く', 'correct' => ['私', 'は', 'ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '나는 천천히 걷는다', 'correct' => ['나는', '천천히', '걷는다'], 'extra' => ['가다']],
                            'tr' => ['sentence' => 'ben yavaş yürüyorum', 'correct' => ['ben', 'yavaş', 'yürüyorum'], 'extra' => ['yürümek', 'gitmek']],
                            'ru' => ['sentence' => 'я гуляю медленно', 'correct' => ['я', 'гуляю', 'медленно'], 'extra' => ['идти']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أتمشى', 'ببطء', 'إلى', 'حديقة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly to the park', 'correct' => ['I walk', 'slowly to', 'the', 'park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'gəzirəm yavaş park', 'correct' => ['gəzirəm', 'yavaş', 'park'], 'extra' => ['ev']],
                            'fr' => ['sentence' => 'Je marche lentement au parc', 'correct' => ['je marche', 'lentement', 'au', 'parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Camino despacio al parque', 'correct' => ['camino', 'despacio', 'al', 'parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ich gehe langsam zum Park', 'correct' => ['ich gehe', 'langsam', 'zum', 'Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '私はゆっくり公園へ歩く', 'correct' => ['私', 'は', 'ゆっくり', '公園', 'へ', '歩く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '나는 천천히 공원에 걷는다', 'correct' => ['나는', '천천히', '공원에', '걷는다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'ben parka yavaş yürüyorum', 'correct' => ['ben', 'parka', 'yavaş', 'yürüyorum'], 'extra' => ['yürümek', 'gitmek']],
                            'ru' => ['sentence' => 'я гуляю медленно в парк', 'correct' => ['я', 'гуляю', 'медленно', 'в', 'парк'], 'extra' => ['дом']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Sleeping', 2,
                pictures: [['ar' => 'النوم', 'img' => 'sleep'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'بخير'], ['ar' => 'أنا']],
                phrases: [
                    'a' => [
                        'words' => ['النوم', 'بخير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To sleep well', 'correct' => ['to sleep', 'well'], 'extra' => ['to walk']],
                            'az' => ['sentence' => 'yatmaq yaxşıyam', 'correct' => ['yatmaq', 'yaxşıyam'], 'extra' => ['gəzmək']],
                            'fr' => ['sentence' => 'Bien dormir', 'correct' => ['bien', 'dormir'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Dormir bien', 'correct' => ['dormir', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Gut schlafen', 'correct' => ['gut', 'schlafen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'よく寝る', 'correct' => ['よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '잘 자다', 'correct' => ['잘', '자다'], 'extra' => ['걷다']],
                            'tr' => ['sentence' => 'iyi uyumak', 'correct' => ['iyi', 'uyumak'], 'extra' => ['i̇yi', 'uyuyorum']],
                            'ru' => ['sentence' => 'спать хорошо', 'correct' => ['спать', 'хорошо'], 'extra' => ['гулять']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أنا', 'أنام', 'بخير'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well', 'correct' => ['I', 'sleep', 'well'], 'extra' => ['to walk']],
                            'az' => ['sentence' => 'mən yatıram yaxşıyam', 'correct' => ['mən', 'yatıram', 'yaxşıyam'], 'extra' => ['gəzmək']],
                            'fr' => ['sentence' => 'Je dors bien', 'correct' => ['je', 'dors', 'bien'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Duermo bien', 'correct' => ['duermo', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Ich schlafe gut', 'correct' => ['ich', 'schlafe', 'gut'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はよく寝る', 'correct' => ['私', 'は', 'よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '나는 잘 잔다', 'correct' => ['나는', '잘', '잔다'], 'extra' => ['걷다']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum', 'correct' => ['ben', 'iyi', 'uyuyorum'], 'extra' => ['i̇yi', 'uyumak']],
                            'ru' => ['sentence' => 'я сплю хорошо', 'correct' => ['я', 'сплю', 'хорошо'], 'extra' => ['гулять']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أنام', 'بخير', 'و', 'أنا', 'أتمشى', 'ببطء'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well and I walk slowly', 'correct' => ['I sleep', 'well', 'and', 'I', 'walk', 'slowly'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'yatıram yaxşıyam və mən gəzirəm yavaş', 'correct' => ['yatıram', 'yaxşıyam', 'və', 'mən', 'gəzirəm', 'yavaş'], 'extra' => ['oxumaq']],
                            'fr' => ['sentence' => 'Je dors bien et je marche lentement', 'correct' => ['je dors', 'bien', 'et', 'je', 'marche', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Duermo bien y camino despacio', 'correct' => ['duermo', 'bien', 'y', 'camino', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich schlafe gut und ich gehe langsam', 'correct' => ['ich schlafe', 'gut', 'und', 'ich', 'gehe', 'langsam'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はよく寝てゆっくり歩く', 'correct' => ['私', 'は', 'よく', '寝て', 'ゆっくり', '歩く'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 잘 자고 천천히 걷는다', 'correct' => ['나는', '잘', '자고', '천천히', '걷는다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum ve yavaş yürüyorum', 'correct' => ['ben', 'iyi', 'uyuyorum', 've', 'yavaş', 'yürüyorum'], 'extra' => ['i̇yi', 'uyumak']],
                            'ru' => ['sentence' => 'я сплю хорошо и я гуляю медленно', 'correct' => ['я', 'сплю', 'хорошо', 'и', 'я', 'гуляю', 'медленно'], 'extra' => ['читать']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Speaking', 3,
                pictures: [['ar' => 'التكلم', 'img' => 'speak'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'ببطء'], ['ar' => 'أتكلم']],
                phrases: [
                    'a' => [
                        'words' => ['التكلم', 'ببطء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To speak slowly', 'correct' => ['to speak', 'slowly'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'danışmaq yavaş', 'correct' => ['danışmaq', 'yavaş'], 'extra' => ['oxumaq']],
                            'fr' => ['sentence' => 'Parler lentement', 'correct' => ['parler', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablar despacio', 'correct' => ['hablar', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Langsam sprechen', 'correct' => ['langsam', 'sprechen'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => 'ゆっくり話す', 'correct' => ['ゆっくり', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '천천히 말하다', 'correct' => ['천천히', '말하다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'yavaş konuşmak', 'correct' => ['yavaş', 'konuşmak'], 'extra' => ['çok', 'okumak']],
                            'ru' => ['sentence' => 'говорить медленно', 'correct' => ['говорить', 'медленно'], 'extra' => ['читать']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أتكلم', 'كثير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I speak a lot', 'correct' => ['I speak', 'a', 'lot'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'danışıram bir çoxlu', 'correct' => ['danışıram', 'bir', 'çoxlu'], 'extra' => ['oxumaq']],
                            'fr' => ['sentence' => 'Je parle beaucoup', 'correct' => ['je', 'parle', 'beaucoup'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablo mucho', 'correct' => ['hablo', 'mucho'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich spreche viel', 'correct' => ['ich', 'spreche', 'viel'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はたくさん話す', 'correct' => ['私', 'は', 'たくさん', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 많이 말한다', 'correct' => ['나는', '많이', '말한다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'ben çok konuşuyorum', 'correct' => ['ben', 'çok', 'konuşuyorum'], 'extra' => ['yavaş', 'konuşmak']],
                            'ru' => ['sentence' => 'я говорю много', 'correct' => ['я', 'говорю', 'много'], 'extra' => ['читать']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أتكلم', 'ببطء', 'و', 'أنا', 'أقرأ', 'كثير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I speak slowly and I read a lot', 'correct' => ['I speak', 'slowly and', 'I', 'read', 'a', 'lot'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'danışıram yavaş və mən oxuyuram bir çoxlu', 'correct' => ['danışıram', 'yavaş', 'və', 'mən', 'oxuyuram', 'bir', 'çoxlu'], 'extra' => ['yatmaq']],
                            'fr' => ['sentence' => 'Je parle lentement et je lis beaucoup', 'correct' => ['je parle', 'lentement', 'et', 'je', 'lis', 'beaucoup'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Hablo despacio y leo mucho', 'correct' => ['hablo', 'despacio', 'y', 'leo', 'mucho'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich spreche langsam und ich lese viel', 'correct' => ['ich spreche', 'langsam', 'und', 'ich', 'lese', 'viel'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私はゆっくり話してたくさん読む', 'correct' => ['私', 'は', 'ゆっくり', '話', 'して', 'たくさん', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 천천히 말하고 많이 읽는다', 'correct' => ['나는', '천천히', '말하고', '많이', '읽는다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'ben yavaş konuşuyorum ve çok okuyorum', 'correct' => ['ben', 'yavaş', 'konuşuyorum', 've', 'çok', 'okuyorum'], 'extra' => ['konuşmak', 'okumak']],
                            'ru' => ['sentence' => 'я говорю медленно и я читаю много', 'correct' => ['я', 'говорю', 'медленно', 'и', 'я', 'читаю', 'много'], 'extra' => ['спать']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Reading', 4,
                pictures: [['ar' => 'القراءة', 'img' => 'book'], ['ar' => 'كتاب', 'img' => 'book']],
                plain: [['ar' => 'أنا'], ['ar' => 'أقرأ']],
                phrases: [
                    'a' => [
                        'words' => ['القراءة', 'كتاب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To read a book', 'correct' => ['to read', 'a', 'book'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'oxumaq bir kitab', 'correct' => ['oxumaq', 'bir', 'kitab'], 'extra' => ['yatmaq']],
                            'fr' => ['sentence' => 'Lire un livre', 'correct' => ['lire', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leer un libro', 'correct' => ['leer', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ein Buch lesen', 'correct' => ['ein', 'Buch', 'lesen'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '本を読む', 'correct' => ['本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '책을 읽다', 'correct' => ['책을', '읽다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'bir kitap okumak', 'correct' => ['bir', 'kitap', 'okumak'], 'extra' => ['okuyorum', 'uyumak']],
                            'ru' => ['sentence' => 'читать книга', 'correct' => ['читать', 'книга'], 'extra' => ['спать']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أنا', 'أقرأ', 'كتاب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I read a book', 'correct' => ['I', 'read', 'a', 'book'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'mən oxuyuram bir kitab', 'correct' => ['mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['yatmaq']],
                            'fr' => ['sentence' => 'Je lis un livre', 'correct' => ['je', 'lis', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leo un libro', 'correct' => ['leo', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich lese ein Buch', 'correct' => ['ich', 'lese', 'ein', 'Buch'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私は本を読む', 'correct' => ['私', 'は', '本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 책을 읽는다', 'correct' => ['나는', '책을', '읽는다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'ben bir kitap okuyorum', 'correct' => ['ben', 'bir', 'kitap', 'okuyorum'], 'extra' => ['okumak', 'uyumak']],
                            'ru' => ['sentence' => 'я читаю книга', 'correct' => ['я', 'читаю', 'книга'], 'extra' => ['спать']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أقرأ', 'بخير', 'و', 'أنا', 'أنام', 'بخير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I read well and I sleep well', 'correct' => ['I read', 'well', 'and', 'I', 'sleep', 'well'], 'extra' => ['a lot']],
                            'az' => ['sentence' => 'oxuyuram yaxşıyam və mən yatıram yaxşıyam', 'correct' => ['oxuyuram', 'yaxşıyam', 'və', 'mən', 'yatıram', 'yaxşıyam'], 'extra' => ['çoxlu']],
                            'fr' => ['sentence' => 'Je lis bien et je dors bien', 'correct' => ['je lis', 'bien', 'et', 'je', 'dors', 'bien'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Leo bien y duermo bien', 'correct' => ['leo', 'bien', 'y', 'duermo', 'bien'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich lese gut und ich schlafe gut', 'correct' => ['ich lese', 'gut', 'und', 'ich', 'schlafe', 'gut'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私はよく読んでよく寝る', 'correct' => ['私', 'は', 'よく', '読んで', 'よく', '寝る'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 잘 읽고 잘 잔다', 'correct' => ['나는', '잘', '읽고', '잘', '잔다'], 'extra' => ['많이']],
                            'tr' => ['sentence' => 'ben iyi okuyorum ve iyi uyuyorum', 'correct' => ['ben', 'iyi', 'okuyorum', 've', 'iyi', 'uyuyorum'], 'extra' => ['kitap', 'okumak']],
                            'ru' => ['sentence' => 'я читаю хорошо и я сплю хорошо', 'correct' => ['я', 'читаю', 'хорошо', 'и', 'я', 'сплю', 'хорошо'], 'extra' => ['много']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Day', 5,
                pictures: [['ar' => 'صديق', 'img' => 'friend'], ['ar' => 'كتاب', 'img' => 'book']],
                plain: [['ar' => 'أتمشى'], ['ar' => 'كثير']],
                phrases: [
                    'a' => [
                        'words' => ['أتمشى', 'كثير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I walk a lot', 'correct' => ['I walk', 'a', 'lot'], 'extra' => ['well']],
                            'az' => ['sentence' => 'gəzirəm bir çoxlu', 'correct' => ['gəzirəm', 'bir', 'çoxlu'], 'extra' => ['yaxşıyam']],
                            'fr' => ['sentence' => 'Je marche beaucoup', 'correct' => ['je', 'marche', 'beaucoup'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Camino mucho', 'correct' => ['camino', 'mucho'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich gehe viel', 'correct' => ['ich', 'gehe', 'viel'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私はたくさん歩く', 'correct' => ['私', 'は', 'たくさん', '歩く'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 많이 걷는다', 'correct' => ['나는', '많이', '걷는다'], 'extra' => ['잘']],
                            'tr' => ['sentence' => 'ben çok yürüyorum', 'correct' => ['ben', 'çok', 'yürüyorum'], 'extra' => ['i̇yi', 'yürümek']],
                            'ru' => ['sentence' => 'я гуляю много', 'correct' => ['я', 'гуляю', 'много'], 'extra' => ['хорошо']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أنا', 'أتكلم', 'مع', 'صديق'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I speak with my friend', 'correct' => ['I', 'speak', 'with', 'my', 'friend'], 'extra' => ['well']],
                            'az' => ['sentence' => 'mən danışıram ilə mənim dost', 'correct' => ['mən', 'danışıram', 'ilə', 'mənim', 'dost'], 'extra' => ['yaxşıyam']],
                            'fr' => ['sentence' => 'Je parle avec mon ami', 'correct' => ['je', 'parle', 'avec', 'mon', 'ami'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Hablo con mi amigo', 'correct' => ['hablo', 'con', 'mi', 'amigo'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich spreche mit meinem Freund', 'correct' => ['ich', 'spreche', 'mit', 'meinem', 'Freund'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私は友達と話す', 'correct' => ['私', 'は', '友達', 'と', '話す'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 친구와 말한다', 'correct' => ['나는', '친구와', '말한다'], 'extra' => ['잘']],
                            'tr' => ['sentence' => 'ben arkadaşım ile konuşuyorum', 'correct' => ['ben', 'arkadaşım', 'ile', 'konuşuyorum'], 'extra' => ['çok', 'i̇yi']],
                            'ru' => ['sentence' => 'я говорю с мой друг', 'correct' => ['я', 'говорю', 'с', 'мой', 'друг'], 'extra' => ['хорошо']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أتمشى', 'إلى المدرسة', 'و', 'أنا', 'أقرأ', 'كتاب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk to school and I read a book', 'correct' => ['I walk', 'to school', 'and', 'I', 'read', 'a', 'book'], 'extra' => ['a lot']],
                            'az' => ['sentence' => 'gəzirəm məktəbə və mən oxuyuram bir kitab', 'correct' => ['gəzirəm', 'məktəbə', 'və', 'mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['çoxlu']],
                            'fr' => ['sentence' => "Je marche à l'école et je lis un livre", 'correct' => ['je', 'je marche', "à l'école", 'et', 'je lis', 'un', 'livre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Camino a la escuela y leo un libro', 'correct' => ['camino a', 'la', 'escuela', 'y', 'leo', 'un', 'libro'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich gehe zur Schule und ich lese ein Buch', 'correct' => ['ich gehe', 'zur Schule', 'und', 'ich', 'lese', 'ein', 'Buch'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私は学校へ歩いて本を読む', 'correct' => ['私', 'は', '学校', 'へ', '歩いて', '本', 'を', '読む'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 학교에 걷고 책을 읽는다', 'correct' => ['나는', '학교에', '걷고', '책을', '읽는다'], 'extra' => ['많이']],
                            'tr' => ['sentence' => 'ben okula yürüyorum ve bir kitap okuyorum', 'correct' => ['ben', 'okula', 'yürüyorum', 've', 'bir', 'kitap', 'okuyorum'], 'extra' => ['çok', 'i̇yi']],
                            'ru' => ['sentence' => 'я гуляю в школу и я читаю книга', 'correct' => ['я', 'гуляю', 'в', 'школу', 'и', 'я', 'читаю', 'книга'], 'extra' => ['много']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
