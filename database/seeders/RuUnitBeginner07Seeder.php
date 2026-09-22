<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitBeginner07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Гулять' => 'walk', 'Парк' => 'park', 'Спать' => 'sleep', 'Кофе' => 'coffee',
        'Говорить' => 'speak', 'Читать' => 'book', 'Книга' => 'book', 'Друг' => 'friend',
    ];

    /**
     * Russian Beginner Unit 7.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Russian sentences are built from the shared plan tile by tile, and
     * every tile is a RussianVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Daily Actions', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Walking', 1,
                pictures: [['ru' => 'Гулять', 'img' => 'walk'], ['ru' => 'Парк', 'img' => 'park']],
                plain: [['ru' => 'Медленно'], ['ru' => 'Гуляю']],
                phrases: [
                    'a' => [
                        'words' => ['гулять', 'медленно'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To walk slowly', 'correct' => ['to walk', 'slowly'], 'extra' => ['to go']],
                            'az' => ['sentence' => 'gəzmək yavaş', 'correct' => ['gəzmək', 'yavaş'], 'extra' => ['getmək']],
                            'ar' => ['sentence' => 'التمشي ببطء', 'correct' => ['التمشي', 'ببطء'], 'extra' => ['الذهاب']],
                            'fr' => ['sentence' => 'Marcher lentement', 'correct' => ['marcher', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Caminar despacio', 'correct' => ['caminar', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Langsam gehen', 'correct' => ['langsam', 'gehen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'ゆっくり歩く', 'correct' => ['ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '천천히 걷다', 'correct' => ['천천히', '걷다'], 'extra' => ['가다']],
                            'tr' => ['sentence' => 'yavaş yürümek', 'correct' => ['yavaş', 'yürümek'], 'extra' => ['ben', 'gitmek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'гуляю', 'медленно'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly', 'correct' => ['I', 'walk', 'slowly'], 'extra' => ['to go']],
                            'az' => ['sentence' => 'mən gəzirəm yavaş', 'correct' => ['mən', 'gəzirəm', 'yavaş'], 'extra' => ['getmək']],
                            'ar' => ['sentence' => 'أنا أتمشى ببطء', 'correct' => ['أنا', 'أتمشى', 'ببطء'], 'extra' => ['الذهاب']],
                            'fr' => ['sentence' => 'Je marche lentement', 'correct' => ['je', 'marche', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Camino despacio', 'correct' => ['camino', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Ich gehe langsam', 'correct' => ['ich', 'gehe', 'langsam'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はゆっくり歩く', 'correct' => ['私', 'は', 'ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '나는 천천히 걷는다', 'correct' => ['나는', '천천히', '걷는다'], 'extra' => ['가다']],
                            'tr' => ['sentence' => 'ben yavaş yürüyorum', 'correct' => ['ben', 'yavaş', 'yürüyorum'], 'extra' => ['yürümek', 'gitmek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'гуляю', 'медленно', 'в', 'парк'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly to the park', 'correct' => ['I walk', 'slowly to', 'the', 'park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'gəzirəm yavaş park', 'correct' => ['gəzirəm', 'yavaş', 'park'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'أتمشى ببطء إلى حديقة', 'correct' => ['أتمشى', 'ببطء', 'إلى', 'حديقة'], 'extra' => ['بيت']],
                            'fr' => ['sentence' => 'Je marche lentement au parc', 'correct' => ['je marche', 'lentement', 'au', 'parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Camino despacio al parque', 'correct' => ['camino', 'despacio', 'al', 'parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ich gehe langsam zum Park', 'correct' => ['ich gehe', 'langsam', 'zum', 'Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '私はゆっくり公園へ歩く', 'correct' => ['私', 'は', 'ゆっくり', '公園', 'へ', '歩く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '나는 천천히 공원에 걷는다', 'correct' => ['나는', '천천히', '공원에', '걷는다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'ben parka yavaş yürüyorum', 'correct' => ['ben', 'parka', 'yavaş', 'yürüyorum'], 'extra' => ['yürümek', 'gitmek']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Sleeping', 2,
                pictures: [['ru' => 'Спать', 'img' => 'sleep'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Хорошо'], ['ru' => 'Сплю']],
                phrases: [
                    'a' => [
                        'words' => ['спать', 'хорошо'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To sleep well', 'correct' => ['to sleep', 'well'], 'extra' => ['to walk']],
                            'az' => ['sentence' => 'yatmaq yaxşıyam', 'correct' => ['yatmaq', 'yaxşıyam'], 'extra' => ['gəzmək']],
                            'ar' => ['sentence' => 'النوم بخير', 'correct' => ['النوم', 'بخير'], 'extra' => ['التمشي']],
                            'fr' => ['sentence' => 'Bien dormir', 'correct' => ['bien', 'dormir'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Dormir bien', 'correct' => ['dormir', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Gut schlafen', 'correct' => ['gut', 'schlafen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'よく寝る', 'correct' => ['よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '잘 자다', 'correct' => ['잘', '자다'], 'extra' => ['걷다']],
                            'tr' => ['sentence' => 'iyi uyumak', 'correct' => ['iyi', 'uyumak'], 'extra' => ['i̇yi', 'uyuyorum']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'сплю', 'хорошо'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well', 'correct' => ['I', 'sleep', 'well'], 'extra' => ['to walk']],
                            'az' => ['sentence' => 'mən yatıram yaxşıyam', 'correct' => ['mən', 'yatıram', 'yaxşıyam'], 'extra' => ['gəzmək']],
                            'ar' => ['sentence' => 'أنا أنام بخير', 'correct' => ['أنا', 'أنام', 'بخير'], 'extra' => ['التمشي']],
                            'fr' => ['sentence' => 'Je dors bien', 'correct' => ['je', 'dors', 'bien'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Duermo bien', 'correct' => ['duermo', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Ich schlafe gut', 'correct' => ['ich', 'schlafe', 'gut'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はよく寝る', 'correct' => ['私', 'は', 'よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '나는 잘 잔다', 'correct' => ['나는', '잘', '잔다'], 'extra' => ['걷다']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum', 'correct' => ['ben', 'iyi', 'uyuyorum'], 'extra' => ['i̇yi', 'uyumak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'сплю', 'хорошо', 'и', 'я', 'гуляю', 'медленно'], 'blank' => 6,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well and I walk slowly', 'correct' => ['I sleep', 'well', 'and', 'I', 'walk', 'slowly'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'yatıram yaxşıyam və mən gəzirəm yavaş', 'correct' => ['yatıram', 'yaxşıyam', 'və', 'mən', 'gəzirəm', 'yavaş'], 'extra' => ['oxumaq']],
                            'ar' => ['sentence' => 'أنام بخير و أنا أتمشى ببطء', 'correct' => ['أنام', 'بخير', 'و', 'أنا', 'أتمشى', 'ببطء'], 'extra' => ['القراءة']],
                            'fr' => ['sentence' => 'Je dors bien et je marche lentement', 'correct' => ['je dors', 'bien', 'et', 'je', 'marche', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Duermo bien y camino despacio', 'correct' => ['duermo', 'bien', 'y', 'camino', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich schlafe gut und ich gehe langsam', 'correct' => ['ich schlafe', 'gut', 'und', 'ich', 'gehe', 'langsam'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はよく寝てゆっくり歩く', 'correct' => ['私', 'は', 'よく', '寝て', 'ゆっくり', '歩く'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 잘 자고 천천히 걷는다', 'correct' => ['나는', '잘', '자고', '천천히', '걷는다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum ve yavaş yürüyorum', 'correct' => ['ben', 'iyi', 'uyuyorum', 've', 'yavaş', 'yürüyorum'], 'extra' => ['i̇yi', 'uyumak']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Speaking', 3,
                pictures: [['ru' => 'Говорить', 'img' => 'speak'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Медленно'], ['ru' => 'Говорю']],
                phrases: [
                    'a' => [
                        'words' => ['говорить', 'медленно'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To speak slowly', 'correct' => ['to speak', 'slowly'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'danışmaq yavaş', 'correct' => ['danışmaq', 'yavaş'], 'extra' => ['oxumaq']],
                            'ar' => ['sentence' => 'التكلم ببطء', 'correct' => ['التكلم', 'ببطء'], 'extra' => ['القراءة']],
                            'fr' => ['sentence' => 'Parler lentement', 'correct' => ['parler', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablar despacio', 'correct' => ['hablar', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Langsam sprechen', 'correct' => ['langsam', 'sprechen'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => 'ゆっくり話す', 'correct' => ['ゆっくり', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '천천히 말하다', 'correct' => ['천천히', '말하다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'yavaş konuşmak', 'correct' => ['yavaş', 'konuşmak'], 'extra' => ['çok', 'okumak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'говорю', 'много'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I speak a lot', 'correct' => ['I speak', 'a', 'lot'], 'extra' => ['to read']],
                            'az' => ['sentence' => 'danışıram bir çoxlu', 'correct' => ['danışıram', 'bir', 'çoxlu'], 'extra' => ['oxumaq']],
                            'ar' => ['sentence' => 'أتكلم كثير', 'correct' => ['أتكلم', 'كثير'], 'extra' => ['القراءة']],
                            'fr' => ['sentence' => 'Je parle beaucoup', 'correct' => ['je', 'parle', 'beaucoup'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablo mucho', 'correct' => ['hablo', 'mucho'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich spreche viel', 'correct' => ['ich', 'spreche', 'viel'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はたくさん話す', 'correct' => ['私', 'は', 'たくさん', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 많이 말한다', 'correct' => ['나는', '많이', '말한다'], 'extra' => ['읽다']],
                            'tr' => ['sentence' => 'ben çok konuşuyorum', 'correct' => ['ben', 'çok', 'konuşuyorum'], 'extra' => ['yavaş', 'konuşmak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'говорю', 'медленно', 'и', 'я', 'читаю', 'много'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I speak slowly and I read a lot', 'correct' => ['I speak', 'slowly and', 'I', 'read', 'a', 'lot'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'danışıram yavaş və mən oxuyuram bir çoxlu', 'correct' => ['danışıram', 'yavaş', 'və', 'mən', 'oxuyuram', 'bir', 'çoxlu'], 'extra' => ['yatmaq']],
                            'ar' => ['sentence' => 'أتكلم ببطء و أنا أقرأ كثير', 'correct' => ['أتكلم', 'ببطء', 'و', 'أنا', 'أقرأ', 'كثير'], 'extra' => ['النوم']],
                            'fr' => ['sentence' => 'Je parle lentement et je lis beaucoup', 'correct' => ['je parle', 'lentement', 'et', 'je', 'lis', 'beaucoup'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Hablo despacio y leo mucho', 'correct' => ['hablo', 'despacio', 'y', 'leo', 'mucho'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich spreche langsam und ich lese viel', 'correct' => ['ich spreche', 'langsam', 'und', 'ich', 'lese', 'viel'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私はゆっくり話してたくさん読む', 'correct' => ['私', 'は', 'ゆっくり', '話', 'して', 'たくさん', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 천천히 말하고 많이 읽는다', 'correct' => ['나는', '천천히', '말하고', '많이', '읽는다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'ben yavaş konuşuyorum ve çok okuyorum', 'correct' => ['ben', 'yavaş', 'konuşuyorum', 've', 'çok', 'okuyorum'], 'extra' => ['konuşmak', 'okumak']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Reading', 4,
                pictures: [['ru' => 'Читать', 'img' => 'book'], ['ru' => 'Книга', 'img' => 'book']],
                plain: [['ru' => 'Читаю'], ['ru' => 'Хорошо']],
                phrases: [
                    'a' => [
                        'words' => ['читать', 'книга'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To read a book', 'correct' => ['to read', 'a', 'book'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'oxumaq bir kitab', 'correct' => ['oxumaq', 'bir', 'kitab'], 'extra' => ['yatmaq']],
                            'ar' => ['sentence' => 'القراءة كتاب', 'correct' => ['القراءة', 'كتاب'], 'extra' => ['النوم']],
                            'fr' => ['sentence' => 'Lire un livre', 'correct' => ['lire', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leer un libro', 'correct' => ['leer', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ein Buch lesen', 'correct' => ['ein', 'Buch', 'lesen'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '本を読む', 'correct' => ['本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '책을 읽다', 'correct' => ['책을', '읽다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'bir kitap okumak', 'correct' => ['bir', 'kitap', 'okumak'], 'extra' => ['okuyorum', 'uyumak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'читаю', 'книга'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I read a book', 'correct' => ['I', 'read', 'a', 'book'], 'extra' => ['to sleep']],
                            'az' => ['sentence' => 'mən oxuyuram bir kitab', 'correct' => ['mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['yatmaq']],
                            'ar' => ['sentence' => 'أنا أقرأ كتاب', 'correct' => ['أنا', 'أقرأ', 'كتاب'], 'extra' => ['النوم']],
                            'fr' => ['sentence' => 'Je lis un livre', 'correct' => ['je', 'lis', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leo un libro', 'correct' => ['leo', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich lese ein Buch', 'correct' => ['ich', 'lese', 'ein', 'Buch'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私は本を読む', 'correct' => ['私', 'は', '本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 책을 읽는다', 'correct' => ['나는', '책을', '읽는다'], 'extra' => ['자다']],
                            'tr' => ['sentence' => 'ben bir kitap okuyorum', 'correct' => ['ben', 'bir', 'kitap', 'okuyorum'], 'extra' => ['okumak', 'uyumak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'читаю', 'хорошо', 'и', 'я', 'сплю', 'хорошо'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I read well and I sleep well', 'correct' => ['I read', 'well', 'and', 'I', 'sleep', 'well'], 'extra' => ['a lot']],
                            'az' => ['sentence' => 'oxuyuram yaxşıyam və mən yatıram yaxşıyam', 'correct' => ['oxuyuram', 'yaxşıyam', 'və', 'mən', 'yatıram', 'yaxşıyam'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'أقرأ بخير و أنا أنام بخير', 'correct' => ['أقرأ', 'بخير', 'و', 'أنا', 'أنام', 'بخير'], 'extra' => ['كثير']],
                            'fr' => ['sentence' => 'Je lis bien et je dors bien', 'correct' => ['je lis', 'bien', 'et', 'je', 'dors', 'bien'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Leo bien y duermo bien', 'correct' => ['leo', 'bien', 'y', 'duermo', 'bien'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich lese gut und ich schlafe gut', 'correct' => ['ich lese', 'gut', 'und', 'ich', 'schlafe', 'gut'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私はよく読んでよく寝る', 'correct' => ['私', 'は', 'よく', '読んで', 'よく', '寝る'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 잘 읽고 잘 잔다', 'correct' => ['나는', '잘', '읽고', '잘', '잔다'], 'extra' => ['많이']],
                            'tr' => ['sentence' => 'ben iyi okuyorum ve iyi uyuyorum', 'correct' => ['ben', 'iyi', 'okuyorum', 've', 'iyi', 'uyuyorum'], 'extra' => ['kitap', 'okumak']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Day', 5,
                pictures: [['ru' => 'Друг', 'img' => 'friend'], ['ru' => 'Книга', 'img' => 'book']],
                plain: [['ru' => 'Гуляю'], ['ru' => 'Много']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'гуляю', 'много'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk a lot', 'correct' => ['I walk', 'a', 'lot'], 'extra' => ['well']],
                            'az' => ['sentence' => 'gəzirəm bir çoxlu', 'correct' => ['gəzirəm', 'bir', 'çoxlu'], 'extra' => ['yaxşıyam']],
                            'ar' => ['sentence' => 'أتمشى كثير', 'correct' => ['أتمشى', 'كثير'], 'extra' => ['بخير']],
                            'fr' => ['sentence' => 'Je marche beaucoup', 'correct' => ['je', 'marche', 'beaucoup'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Camino mucho', 'correct' => ['camino', 'mucho'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich gehe viel', 'correct' => ['ich', 'gehe', 'viel'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私はたくさん歩く', 'correct' => ['私', 'は', 'たくさん', '歩く'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 많이 걷는다', 'correct' => ['나는', '많이', '걷는다'], 'extra' => ['잘']],
                            'tr' => ['sentence' => 'ben çok yürüyorum', 'correct' => ['ben', 'çok', 'yürüyorum'], 'extra' => ['i̇yi', 'yürümek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'говорю', 'с', 'мой', 'друг'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I speak with my friend', 'correct' => ['I', 'speak', 'with', 'my', 'friend'], 'extra' => ['well']],
                            'az' => ['sentence' => 'mən danışıram ilə mənim dost', 'correct' => ['mən', 'danışıram', 'ilə', 'mənim', 'dost'], 'extra' => ['yaxşıyam']],
                            'ar' => ['sentence' => 'أنا أتكلم مع صديق', 'correct' => ['أنا', 'أتكلم', 'مع', 'صديق'], 'extra' => ['بخير']],
                            'fr' => ['sentence' => 'Je parle avec mon ami', 'correct' => ['je', 'parle', 'avec', 'mon', 'ami'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Hablo con mi amigo', 'correct' => ['hablo', 'con', 'mi', 'amigo'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich spreche mit meinem Freund', 'correct' => ['ich', 'spreche', 'mit', 'meinem', 'Freund'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私は友達と話す', 'correct' => ['私', 'は', '友達', 'と', '話す'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 친구와 말한다', 'correct' => ['나는', '친구와', '말한다'], 'extra' => ['잘']],
                            'tr' => ['sentence' => 'ben arkadaşım ile konuşuyorum', 'correct' => ['ben', 'arkadaşım', 'ile', 'konuşuyorum'], 'extra' => ['çok', 'i̇yi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'гуляю', 'в', 'школу', 'и', 'я', 'читаю', 'книга'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk to school and I read a book', 'correct' => ['I walk', 'to school', 'and', 'I', 'read', 'a', 'book'], 'extra' => ['a lot']],
                            'az' => ['sentence' => 'gəzirəm məktəbə və mən oxuyuram bir kitab', 'correct' => ['gəzirəm', 'məktəbə', 'və', 'mən', 'oxuyuram', 'bir', 'kitab'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'أتمشى إلى المدرسة و أنا أقرأ كتاب', 'correct' => ['أتمشى', 'إلى المدرسة', 'و', 'أنا', 'أقرأ', 'كتاب'], 'extra' => ['كثير']],
                            'fr' => ['sentence' => "Je marche à l'école et je lis un livre", 'correct' => ['je', 'je marche', "à l'école", 'et', 'je lis', 'un', 'livre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Camino a la escuela y leo un libro', 'correct' => ['camino a', 'la', 'escuela', 'y', 'leo', 'un', 'libro'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich gehe zur Schule und ich lese ein Buch', 'correct' => ['ich gehe', 'zur Schule', 'und', 'ich', 'lese', 'ein', 'Buch'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私は学校へ歩いて本を読む', 'correct' => ['私', 'は', '学校', 'へ', '歩いて', '本', 'を', '読む'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 학교에 걷고 책을 읽는다', 'correct' => ['나는', '학교에', '걷고', '책을', '읽는다'], 'extra' => ['많이']],
                            'tr' => ['sentence' => 'ben okula yürüyorum ve bir kitap okuyorum', 'correct' => ['ben', 'okula', 'yürüyorum', 've', 'bir', 'kitap', 'okuyorum'], 'extra' => ['çok', 'i̇yi']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
