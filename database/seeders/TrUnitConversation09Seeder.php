<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitap' => 'book', 'Ev' => 'house', 'Park' => 'park',
        'Sinema' => 'cinema', 'Okul' => 'school',
    ];

    /**
     * Turkish Conversation Unit 9 — saying what you think.
     *
     * THE RULE THIS UNIT TEACHES: `bence` IS ONE WORD, NOT THREE.
     *
     * English needs "in my opinion"; Turkish needs `bence`, which is `ben`
     * (me) plus -ce (according to). It is never split across tiles, because
     * neither half means anything useful alone, and a learner given `ben` and
     * a bare suffix would be assembling grammar nobody has taught them.
     *
     * The same shape appears in `sence` (according to you), which is not in
     * this unit but becomes obvious the moment `bence` is solid.
     *
     * NEGATION STILL USES A SEPARATE WORD. `doğru değil` is "true not". Unlike
     * tense and possession, which glue on, negating an adjective keeps `değil`
     * standing on its own, so it stays its own tile. That contrast, suffix for
     * verbs and separate word for adjectives, is the thing worth noticing here.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Expressing Opinions', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: In My Opinion', 1,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Sinema', 'img' => 'cinema']],
                plain: [['tr' => 'Bence'], ['tr' => 'Güzel']],
                phrases: [
                    'a' => [
                        'words' => ['bence', 'güzel'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion it is nice', 'correct' => ['in my opinion', 'it is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'məncə bu xoş', 'correct' => ['məncə', 'bu', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'برأيي هذا لطيف', 'correct' => ['برأيي', 'هذا', 'لطيف'], 'extra' => ['سيء']],
                            'ru' => ['sentence' => 'по-моему это приятно', 'correct' => ['по-моему', 'это', 'приятно'], 'extra' => ['плохой']],
                            'fr' => ['sentence' => "À mon avis c'est beau", 'correct' => ['à mon avis', "c'est", 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'En mi opinión es bonito', 'correct' => ['en mi opinión', 'es', 'bonito'], 'extra' => ['malo']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist es schön', 'correct' => ['meiner Meinung nach', 'ist es', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では素敵です', 'correct' => ['私の意見では', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 멋져요', 'correct' => ['제 생각에는', '멋져요'], 'extra' => ['나쁜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'film', 'güzel'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This film is nice', 'correct' => ['this', 'film', 'is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'bu film xoş', 'correct' => ['bu', 'film', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'هذا فيلم لطيف', 'correct' => ['هذا', 'فيلم', 'لطيف'], 'extra' => ['سيء']],
                            'ru' => ['sentence' => 'это фильм приятно', 'correct' => ['это', 'фильм', 'приятно'], 'extra' => ['плохой']],
                            'fr' => ['sentence' => 'Ce film est beau', 'correct' => ['ce', 'film', 'est', 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'Esta película es bonita', 'correct' => ['esta', 'película', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Dieser Film ist schön', 'correct' => ['dieser', 'Film', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この映画は素敵です', 'correct' => ['この', '映画は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 영화는 멋져요', 'correct' => ['이', '영화는', '멋져요'], 'extra' => ['나쁜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'kitap', 'kötü'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This book is bad', 'correct' => ['this', 'book', 'is', 'bad'], 'extra' => ['nice']],
                            'az' => ['sentence' => 'bu kitab pis', 'correct' => ['bu', 'kitab', 'pis'], 'extra' => ['xoş']],
                            'ar' => ['sentence' => 'هذا كتاب سيء', 'correct' => ['هذا', 'كتاب', 'سيء'], 'extra' => ['لطيف']],
                            'ru' => ['sentence' => 'это книга плохой', 'correct' => ['это', 'книга', 'плохой'], 'extra' => ['приятно']],
                            'fr' => ['sentence' => 'Ce livre est mauvais', 'correct' => ['ce', 'livre', 'est', 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'Este libro es malo', 'correct' => ['este', 'libro', 'es', 'malo'], 'extra' => ['bonito']],
                            'de' => ['sentence' => 'Dieses Buch ist schlecht', 'correct' => ['dieses', 'Buch', 'ist', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => 'この本は悪いです', 'correct' => ['この', '本は', '悪いです'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '이 책은 나빠요', 'correct' => ['이', '책은', '나빠요'], 'extra' => ['멋진']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Think', 2,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Park', 'img' => 'park']],
                plain: [['tr' => 'Düşünüyorum'], ['tr' => 'Doğru']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'de', 'düşünüyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I think so too', 'correct' => ['I think', 'so', 'too'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'düşünürəm belə də', 'correct' => ['düşünürəm', 'belə', 'də'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'أفكر إذن أيضا', 'correct' => ['أفكر', 'إذن', 'أيضا'], 'extra' => ['ربما']],
                            'ru' => ['sentence' => 'я думаю так тоже', 'correct' => ['я', 'думаю', 'так', 'тоже'], 'extra' => ['может быть']],
                            'fr' => ['sentence' => 'Je pense aussi', 'correct' => ['je pense', 'aussi'], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Yo también creo', 'correct' => ['yo', 'también', 'creo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ich denke auch', 'correct' => ['ich denke', 'auch'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => '私もそう思います', 'correct' => ['私も', 'そう', '思います'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '저도 그렇게 생각해요', 'correct' => ['저도', '그렇게', '생각해요'], 'extra' => ['아마']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'doğru'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is true', 'correct' => ['this', 'is', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bu düzgün', 'correct' => ['bu', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هذا صحيح', 'correct' => ['هذا', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'это правильно', 'correct' => ['это', 'правильно'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => 'Ceci est vrai', 'correct' => ['ceci', 'est', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto es verdadero', 'correct' => ['esto', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist richtig', 'correct' => ['das', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しいです', 'correct' => ['これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞아요', 'correct' => ['이것은', '맞아요'], 'extra' => ['틀린']],
                        ],
                    ],
                    'c' => [
                        // Adjective negation keeps `değil` as its own word.
                        'words' => ['bu', 'doğru', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bu deyil düzgün', 'correct' => ['bu', 'deyil', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => "Ceci n'est pas vrai", 'correct' => ['ceci', "n'est pas", 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['틀린']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: I Agree', 3,
                pictures: [['tr' => 'Okul', 'img' => 'school'], ['tr' => 'Kitap', 'img' => 'book']],
                plain: [['tr' => 'Katılıyorum'], ['tr' => 'Belki']],
                phrases: [
                    'a' => [
                        'words' => ['evet', 'katılıyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Yes I agree', 'correct' => ['yes', 'I agree'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'bəli razıyam', 'correct' => ['bəli', 'razıyam'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'نعم أوافق', 'correct' => ['نعم', 'أوافق'], 'extra' => ['ربما']],
                            'ru' => ['sentence' => 'да я согласен', 'correct' => ['да', 'я', 'согласен'], 'extra' => ['может быть']],
                            'fr' => ['sentence' => "Oui je suis d'accord", 'correct' => ['oui', "je suis d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Sí estoy de acuerdo', 'correct' => ['sí', 'estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ja ich stimme zu', 'correct' => ['ja', 'ich stimme zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'はい賛成です', 'correct' => ['はい', '賛成です'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '네 동의해요', 'correct' => ['네', '동의해요'], 'extra' => ['아마']],
                        ],
                    ],
                    'b' => [
                        'words' => ['belki', 'doğru'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Maybe it is true', 'correct' => ['maybe', 'it is', 'true'], 'extra' => ['I agree']],
                            'az' => ['sentence' => 'bəlkə bu düzgün', 'correct' => ['bəlkə', 'bu', 'düzgün'], 'extra' => ['razıyam']],
                            'ar' => ['sentence' => 'ربما هذا صحيح', 'correct' => ['ربما', 'هذا', 'صحيح'], 'extra' => ['أوافق']],
                            'ru' => ['sentence' => 'может быть это правильно', 'correct' => ['может быть', 'это', 'правильно'], 'extra' => ['я', 'согласен']],
                            'fr' => ['sentence' => "Peut-être c'est vrai", 'correct' => ['peut-être', "c'est", 'vrai'], 'extra' => ["je suis d'accord"]],
                            'es' => ['sentence' => 'Quizás es verdadero', 'correct' => ['quizás', 'es', 'verdadero'], 'extra' => ['estoy de acuerdo']],
                            'de' => ['sentence' => 'Vielleicht ist es richtig', 'correct' => ['vielleicht', 'ist es', 'richtig'], 'extra' => ['ich stimme zu']],
                            'ja' => ['sentence' => 'たぶん正しいです', 'correct' => ['たぶん', '正しいです'], 'extra' => ['賛成です']],
                            'ko' => ['sentence' => '아마 맞아요', 'correct' => ['아마', '맞아요'], 'extra' => ['동의해요']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hayır', 'katılmıyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'No I do not agree', 'correct' => ['no', 'I do not agree'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'xeyr razı deyiləm', 'correct' => ['xeyr', 'razı deyiləm'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'لا لا أوافق', 'correct' => ['لا', 'لا أوافق'], 'extra' => ['ربما']],
                            'ru' => ['sentence' => 'нет не согласен', 'correct' => ['нет', 'не', 'согласен'], 'extra' => ['может быть']],
                            'fr' => ['sentence' => "Non je ne suis pas d'accord", 'correct' => ['non', "je ne suis pas d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'No no estoy de acuerdo', 'correct' => ['no', 'no estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Nein ich stimme nicht zu', 'correct' => ['nein', 'ich stimme nicht zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'いいえ賛成しません', 'correct' => ['いいえ', '賛成しません'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '아니요 동의하지 않아요', 'correct' => ['아니요', '동의하지 않아요'], 'extra' => ['아마']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: About the City', 4,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Şehir'], ['tr' => 'Kötü']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'şehir', 'güzel'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This city is nice', 'correct' => ['this', 'city', 'is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'bu şəhər xoş', 'correct' => ['bu', 'şəhər', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'هذا مدينة لطيف', 'correct' => ['هذا', 'مدينة', 'لطيف'], 'extra' => ['سيء']],
                            'ru' => ['sentence' => 'это город приятно', 'correct' => ['это', 'город', 'приятно'], 'extra' => ['плохой']],
                            'fr' => ['sentence' => 'Cette ville est belle', 'correct' => ['cette', 'ville', 'est', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'Esta ciudad es bonita', 'correct' => ['esta', 'ciudad', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Diese Stadt ist schön', 'correct' => ['diese', 'Stadt', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この町は素敵です', 'correct' => ['この', '町は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 도시는 멋져요', 'correct' => ['이', '도시는', '멋져요'], 'extra' => ['나쁜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bence', 'şehir', 'çok', 'güzel'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion the city is very nice', 'correct' => ['in my opinion', 'the city', 'is', 'very', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'məncə şəhər çox xoş', 'correct' => ['məncə', 'şəhər', 'çox', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'برأيي مدينة جدا لطيف', 'correct' => ['برأيي', 'مدينة', 'جدا', 'لطيف'], 'extra' => ['سيء']],
                            'ru' => ['sentence' => 'по-моему город очень приятно', 'correct' => ['по-моему', 'город', 'очень', 'приятно'], 'extra' => ['плохой']],
                            'fr' => ['sentence' => 'À mon avis la ville est très belle', 'correct' => ['à mon avis', 'la ville', 'est', 'très', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'En mi opinión la ciudad es muy bonita', 'correct' => ['en mi opinión', 'la ciudad', 'es', 'muy', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist die Stadt sehr schön', 'correct' => ['meiner Meinung nach', 'ist', 'die Stadt', 'sehr', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では町はとても素敵です', 'correct' => ['私の意見では', '町は', 'とても', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 도시가 아주 멋져요', 'correct' => ['제 생각에는', '도시가', '아주', '멋져요'], 'extra' => ['나쁜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['şehir', 'çok', 'büyük'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The city is very big', 'correct' => ['the city', 'is', 'very', 'big'], 'extra' => ['small']],
                            'az' => ['sentence' => 'şəhər çox böyük', 'correct' => ['şəhər', 'çox', 'böyük'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'مدينة جدا كبير', 'correct' => ['مدينة', 'جدا', 'كبير'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'город очень большой', 'correct' => ['город', 'очень', 'большой'], 'extra' => ['маленький']],
                            'fr' => ['sentence' => 'La ville est très grande', 'correct' => ['la ville', 'est', 'très', 'grande'], 'extra' => ['petite']],
                            'es' => ['sentence' => 'La ciudad es muy grande', 'correct' => ['la ciudad', 'es', 'muy', 'grande'], 'extra' => ['pequeña']],
                            'de' => ['sentence' => 'Die Stadt ist sehr groß', 'correct' => ['die Stadt', 'ist', 'sehr', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '町はとても大きいです', 'correct' => ['町は', 'とても', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '도시는 아주 커요', 'correct' => ['도시는', '아주', '커요'], 'extra' => ['작은']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Saying It Together', 5,
                pictures: [['tr' => 'Sinema', 'img' => 'cinema'], ['tr' => 'Kitap', 'img' => 'book']],
                plain: [['tr' => 'Yanlış'], ['tr' => 'Doğru']],
                phrases: [
                    'a' => [
                        'words' => ['bence', 'bu', 'yanlış'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion this is wrong', 'correct' => ['in my opinion', 'this', 'is', 'wrong'], 'extra' => ['true']],
                            'az' => ['sentence' => 'məncə bu səhv', 'correct' => ['məncə', 'bu', 'səhv'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'برأيي هذا خطأ', 'correct' => ['برأيي', 'هذا', 'خطأ'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'по-моему это неправильно', 'correct' => ['по-моему', 'это', 'неправильно'], 'extra' => ['правильно']],
                            'fr' => ['sentence' => 'À mon avis ceci est faux', 'correct' => ['à mon avis', 'ceci', 'est', 'faux'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'En mi opinión esto es falso', 'correct' => ['en mi opinión', 'esto', 'es', 'falso'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist das falsch', 'correct' => ['meiner Meinung nach', 'ist', 'das', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => '私の意見ではこれは間違いです', 'correct' => ['私の意見では', 'これは', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '제 생각에는 이것은 틀려요', 'correct' => ['제 생각에는', '이것은', '틀려요'], 'extra' => ['맞는']],
                        ],
                    ],
                    'b' => [
                        'words' => ['film', 'kötü', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The film is not bad', 'correct' => ['the film', 'is not', 'bad'], 'extra' => ['nice']],
                            'az' => ['sentence' => 'film deyil pis', 'correct' => ['film', 'deyil', 'pis'], 'extra' => ['xoş']],
                            'ar' => ['sentence' => 'فيلم ليس سيء', 'correct' => ['فيلم', 'ليس', 'سيء'], 'extra' => ['لطيف']],
                            'ru' => ['sentence' => 'фильм не плохой', 'correct' => ['фильм', 'не', 'плохой'], 'extra' => ['приятно']],
                            'fr' => ['sentence' => "Le film n'est pas mauvais", 'correct' => ['le film', "n'est pas", 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'La película no es mala', 'correct' => ['la película', 'no es', 'mala'], 'extra' => ['bonita']],
                            'de' => ['sentence' => 'Der Film ist nicht schlecht', 'correct' => ['der Film', 'ist nicht', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => '映画は悪くありません', 'correct' => ['映画は', '悪く', 'ありません'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '영화는 나쁘지 않아요', 'correct' => ['영화는', '나쁘지 않아요'], 'extra' => ['멋진']],
                        ],
                    ],
                    'c' => [
                        'words' => ['evet', 'bence', 'de', 'doğru'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Yes in my opinion it is true too', 'correct' => ['yes', 'in my opinion', 'it is', 'true', 'too'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bəli məncə bu düzgün də', 'correct' => ['bəli', 'məncə', 'bu', 'düzgün', 'də'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'نعم برأيي هذا صحيح أيضا', 'correct' => ['نعم', 'برأيي', 'هذا', 'صحيح', 'أيضا'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'да по-моему это правильно тоже', 'correct' => ['да', 'по-моему', 'это', 'правильно', 'тоже'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => "Oui à mon avis c'est vrai aussi", 'correct' => ['oui', 'à mon avis', "c'est", 'vrai', 'aussi'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Sí en mi opinión también es verdadero', 'correct' => ['sí', 'en mi opinión', 'también', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Ja meiner Meinung nach ist es auch richtig', 'correct' => ['ja', 'meiner Meinung nach', 'ist es', 'auch', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'はい私の意見でもこれは正しいです', 'correct' => ['はい', '私の意見でも', 'これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '네 제 생각에도 맞아요', 'correct' => ['네', '제 생각에도', '맞아요'], 'extra' => ['틀린']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
