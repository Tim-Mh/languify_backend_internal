<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Yürümek' => 'walk', 'Uyumak' => 'sleep', 'Konuşmak' => 'speak', 'Okumak' => 'book',
        'Yemek' => 'eat', 'İçmek' => 'drink', 'Gitmek' => 'park', 'Kitap' => 'book',
    ];

    /**
     * Turkish Beginner Unit 7 — daily actions, and the first conjugation.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * THE PRESENT TENSE, INTRODUCED AS VOCABULARY RATHER THAN AS A RULE.
     *
     * Turkish has no separate pronoun requirement: the verb ending already
     * says who is doing it. `Yürüyorum` on its own is a complete sentence,
     * "I walk". `Ben` is optional emphasis, exactly like Spanish `yo`.
     *
     * The endings do not reduce to one pattern:
     *
     *     yürümek  -> yürüyorum     (front vowel, buffer -y-)
     *     uyumak   -> uyuyorum      (stem ends in a vowel)
     *     okumak   -> okuyorum
     *     konuşmak -> konuşuyorum   (consonant stem, harmony vowel first)
     *
     * Only the `-yor-` in the middle is constant. Everything around it shifts
     * with the stem, which is why each conjugated form is its own dictionary
     * entry and its own tile. A learner assembling `yürü` + `yorum` would be
     * doing morphology; a learner placing `yürüyorum` is doing Turkish.
     *
     * The infinitive is taught alongside so both forms are recognisable — the
     * infinitive is what a dictionary lists, the conjugated form is what people
     * actually say.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Daily Actions', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Walking', 1,
                pictures: [['tr' => 'Yürümek', 'img' => 'walk'], ['tr' => 'Gitmek', 'img' => 'park']],
                plain: [['tr' => 'Yavaş'], ['tr' => 'Ben']],
                phrases: [
                    'a' => [
                        'words' => ['yavaş', 'yürümek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To walk slowly', 'correct' => ['to walk', 'slowly'], 'extra' => ['to go']],
                            'fr' => ['sentence' => 'Marcher lentement', 'correct' => ['marcher', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Caminar despacio', 'correct' => ['caminar', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Langsam gehen', 'correct' => ['langsam', 'gehen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'ゆっくり歩く', 'correct' => ['ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '천천히 걷다', 'correct' => ['천천히', '걷다'], 'extra' => ['가다']],
                        ],
                    ],
                    'b' => [
                        // The verb ending already says "I"; ben is optional.
                        'words' => ['ben', 'yavaş', 'yürüyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly', 'correct' => ['I', 'I walk', 'slowly'], 'extra' => ['to go']],
                            'fr' => ['sentence' => 'Je marche lentement', 'correct' => ['je', 'je marche', 'lentement'], 'extra' => ['aller']],
                            'es' => ['sentence' => 'Camino despacio', 'correct' => ['yo', 'camino', 'despacio'], 'extra' => ['ir']],
                            'de' => ['sentence' => 'Ich gehe langsam', 'correct' => ['ich', 'ich gehe', 'langsam'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はゆっくり歩く', 'correct' => ['私', 'は', 'ゆっくり', '歩く'], 'extra' => ['行く']],
                            'ko' => ['sentence' => '나는 천천히 걷는다', 'correct' => ['나는', '천천히', '걷는다'], 'extra' => ['가다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'parka', 'yavaş', 'yürüyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I walk slowly to the park', 'correct' => ['I', 'I walk', 'slowly', 'to the park'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Je marche lentement au parc', 'correct' => ['je', 'je marche', 'lentement', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Camino despacio al parque', 'correct' => ['yo', 'camino', 'despacio', 'al parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ich gehe langsam zum Park', 'correct' => ['ich', 'ich gehe', 'langsam', 'zum Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '私はゆっくり公園へ歩く', 'correct' => ['私', 'は', 'ゆっくり', '公園', 'へ', '歩く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '나는 천천히 공원에 걷는다', 'correct' => ['나는', '천천히', '공원에', '걷는다'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Sleeping', 2,
                pictures: [['tr' => 'Uyumak', 'img' => 'sleep'], ['tr' => 'Yürümek', 'img' => 'walk']],
                plain: [['tr' => 'İyi'], ['tr' => 'Uyuyorum']],
                phrases: [
                    'a' => [
                        'words' => ['iyi', 'uyumak'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To sleep well', 'correct' => ['to sleep', 'well'], 'extra' => ['to walk']],
                            'fr' => ['sentence' => 'Bien dormir', 'correct' => ['bien', 'dormir'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Dormir bien', 'correct' => ['dormir', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Gut schlafen', 'correct' => ['gut', 'schlafen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'よく寝る', 'correct' => ['よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '잘 자다', 'correct' => ['잘', '자다'], 'extra' => ['걷다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'iyi', 'uyuyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well', 'correct' => ['I', 'I sleep', 'well'], 'extra' => ['to walk']],
                            'fr' => ['sentence' => 'Je dors bien', 'correct' => ['je', 'je dors', 'bien'], 'extra' => ['marcher']],
                            'es' => ['sentence' => 'Duermo bien', 'correct' => ['yo', 'duermo', 'bien'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Ich schlafe gut', 'correct' => ['ich', 'ich schlafe', 'gut'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => '私はよく寝る', 'correct' => ['私', 'は', 'よく', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '나는 잘 잔다', 'correct' => ['나는', '잘', '잔다'], 'extra' => ['걷다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'iyi', 'uyuyorum', 've', 'yavaş', 'yürüyorum'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I sleep well and I walk slowly', 'correct' => ['I', 'I sleep', 'well', 'and', 'I walk', 'slowly'], 'extra' => ['to read']],
                            'fr' => ['sentence' => 'Je dors bien et je marche lentement', 'correct' => ['je', 'je dors', 'bien', 'et', 'je marche', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Duermo bien y camino despacio', 'correct' => ['yo', 'duermo', 'bien', 'y', 'camino', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich schlafe gut und ich gehe langsam', 'correct' => ['ich', 'ich schlafe', 'gut', 'und', 'ich gehe', 'langsam'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はよく寝てゆっくり歩く', 'correct' => ['私', 'は', 'よく', '寝て', 'ゆっくり', '歩く'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 잘 자고 천천히 걷는다', 'correct' => ['나는', '잘', '자고', '천천히', '걷는다'], 'extra' => ['읽다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Speaking', 3,
                pictures: [['tr' => 'Konuşmak', 'img' => 'speak'], ['tr' => 'Okumak', 'img' => 'book']],
                plain: [['tr' => 'Yavaş'], ['tr' => 'Çok']],
                phrases: [
                    'a' => [
                        'words' => ['yavaş', 'konuşmak'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To speak slowly', 'correct' => ['to speak', 'slowly'], 'extra' => ['to read']],
                            'fr' => ['sentence' => 'Parler lentement', 'correct' => ['parler', 'lentement'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablar despacio', 'correct' => ['hablar', 'despacio'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Langsam sprechen', 'correct' => ['langsam', 'sprechen'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => 'ゆっくり話す', 'correct' => ['ゆっくり', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '천천히 말하다', 'correct' => ['천천히', '말하다'], 'extra' => ['읽다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'çok', 'konuşuyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I speak a lot', 'correct' => ['I', 'I speak', 'a lot'], 'extra' => ['to read']],
                            'fr' => ['sentence' => 'Je parle beaucoup', 'correct' => ['je', 'je parle', 'beaucoup'], 'extra' => ['lire']],
                            'es' => ['sentence' => 'Hablo mucho', 'correct' => ['yo', 'hablo', 'mucho'], 'extra' => ['leer']],
                            'de' => ['sentence' => 'Ich spreche viel', 'correct' => ['ich', 'ich spreche', 'viel'], 'extra' => ['lesen']],
                            'ja' => ['sentence' => '私はたくさん話す', 'correct' => ['私', 'は', 'たくさん', '話す'], 'extra' => ['読む']],
                            'ko' => ['sentence' => '나는 많이 말한다', 'correct' => ['나는', '많이', '말한다'], 'extra' => ['읽다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'yavaş', 'konuşuyorum', 've', 'çok', 'okuyorum'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I speak slowly and I read a lot', 'correct' => ['I', 'I speak', 'slowly', 'and', 'I read', 'a lot'], 'extra' => ['to sleep']],
                            'fr' => ['sentence' => 'Je parle lentement et je lis beaucoup', 'correct' => ['je', 'je parle', 'lentement', 'et', 'je lis', 'beaucoup'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Hablo despacio y leo mucho', 'correct' => ['yo', 'hablo', 'despacio', 'y', 'leo', 'mucho'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich spreche langsam und ich lese viel', 'correct' => ['ich', 'ich spreche', 'langsam', 'und', 'ich lese', 'viel'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私はゆっくり話してたくさん読む', 'correct' => ['私', 'は', 'ゆっくり', '話', 'して', 'たくさん', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 천천히 말하고 많이 읽는다', 'correct' => ['나는', '천천히', '말하고', '많이', '읽는다'], 'extra' => ['자다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Reading', 4,
                pictures: [['tr' => 'Okumak', 'img' => 'book'], ['tr' => 'Uyumak', 'img' => 'sleep']],
                plain: [['tr' => 'Kitap'], ['tr' => 'Okuyorum']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kitap', 'okumak'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To read a book', 'correct' => ['to read', 'a', 'book'], 'extra' => ['to sleep']],
                            'fr' => ['sentence' => 'Lire un livre', 'correct' => ['lire', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leer un libro', 'correct' => ['leer', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ein Buch lesen', 'correct' => ['ein', 'Buch', 'lesen'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '本を読む', 'correct' => ['本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '책을 읽다', 'correct' => ['책을', '읽다'], 'extra' => ['자다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'bir', 'kitap', 'okuyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I read a book', 'correct' => ['I', 'I read', 'a', 'book'], 'extra' => ['to sleep']],
                            'fr' => ['sentence' => 'Je lis un livre', 'correct' => ['je', 'je lis', 'un', 'livre'], 'extra' => ['dormir']],
                            'es' => ['sentence' => 'Leo un libro', 'correct' => ['yo', 'leo', 'un', 'libro'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich lese ein Buch', 'correct' => ['ich', 'ich lese', 'ein', 'Buch'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私は本を読む', 'correct' => ['私', 'は', '本', 'を', '読む'], 'extra' => ['寝る']],
                            'ko' => ['sentence' => '나는 책을 읽는다', 'correct' => ['나는', '책을', '읽는다'], 'extra' => ['자다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'iyi', 'okuyorum', 've', 'iyi', 'uyuyorum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I read well and I sleep well', 'correct' => ['I', 'I read', 'well', 'and', 'I sleep', 'well'], 'extra' => ['a lot']],
                            'fr' => ['sentence' => 'Je lis bien et je dors bien', 'correct' => ['je', 'je lis', 'bien', 'et', 'je dors', 'bien'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Leo bien y duermo bien', 'correct' => ['yo', 'leo', 'bien', 'y', 'duermo', 'bien'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich lese gut und ich schlafe gut', 'correct' => ['ich', 'ich lese', 'gut', 'und', 'ich schlafe', 'gut'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私はよく読んでよく寝る', 'correct' => ['私', 'は', 'よく', '読んで', 'よく', '寝る'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 잘 읽고 잘 잔다', 'correct' => ['나는', '잘', '읽고', '잘', '잔다'], 'extra' => ['많이']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Day', 5,
                pictures: [['tr' => 'Yürümek', 'img' => 'walk'], ['tr' => 'Konuşmak', 'img' => 'speak']],
                plain: [['tr' => 'Çok'], ['tr' => 'İyi']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'çok', 'yürüyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I walk a lot', 'correct' => ['I', 'I walk', 'a lot'], 'extra' => ['well']],
                            'fr' => ['sentence' => 'Je marche beaucoup', 'correct' => ['je', 'je marche', 'beaucoup'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Camino mucho', 'correct' => ['yo', 'camino', 'mucho'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich gehe viel', 'correct' => ['ich', 'ich gehe', 'viel'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私はたくさん歩く', 'correct' => ['私', 'は', 'たくさん', '歩く'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 많이 걷는다', 'correct' => ['나는', '많이', '걷는다'], 'extra' => ['잘']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'arkadaşım', 'ile', 'konuşuyorum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I speak with my friend', 'correct' => ['I', 'my', 'friend', 'with', 'I speak'], 'extra' => ['well']],
                            'fr' => ['sentence' => 'Je parle avec mon ami', 'correct' => ['je', 'mon', 'ami', 'avec', 'je parle'], 'extra' => ['bien']],
                            'es' => ['sentence' => 'Hablo con mi amigo', 'correct' => ['yo', 'mi', 'amigo', 'con', 'hablo'], 'extra' => ['bien']],
                            'de' => ['sentence' => 'Ich spreche mit meinem Freund', 'correct' => ['ich', 'mein', 'Freund', 'mit', 'ich spreche'], 'extra' => ['gut']],
                            'ja' => ['sentence' => '私は友達と話す', 'correct' => ['私', 'は', '友達', 'と', '話す'], 'extra' => ['よく']],
                            'ko' => ['sentence' => '나는 친구와 말한다', 'correct' => ['나는', '친구와', '말한다'], 'extra' => ['잘']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'okula', 'yürüyorum', 've', 'bir', 'kitap', 'okuyorum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I walk to school and I read a book', 'correct' => ['I', 'I walk', 'to school', 'and', 'I read', 'a', 'book'], 'extra' => ['a lot']],
                            'fr' => ['sentence' => "Je marche à l'école et je lis un livre", 'correct' => ['je', 'je marche', "à l'école", 'et', 'je lis', 'un', 'livre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Camino a la escuela y leo un libro', 'correct' => ['yo', 'camino', 'a la escuela', 'y', 'leo', 'un', 'libro'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Ich gehe zur Schule und ich lese ein Buch', 'correct' => ['ich', 'ich gehe', 'zur Schule', 'und', 'ich lese', 'ein', 'Buch'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '私は学校へ歩いて本を読む', 'correct' => ['私', 'は', '学校', 'へ', '歩いて', '本', 'を', '読む'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '나는 학교에 걷고 책을 읽는다', 'correct' => ['나는', '학교에', '걷고', '책을', '읽는다'], 'extra' => ['많이']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
