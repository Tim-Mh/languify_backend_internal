<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitab' => 'book', 'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Böyük' => 'big',
        'Su' => 'water', 'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese',
    ];

    /**
     * Azerbaijani Conversation Unit 9.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Expressing Opinions', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: In My Opinion', 1,
                pictures: [['az' => 'Kitab', 'img' => 'book'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Məncə'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['məncə', 'bu', 'xoş'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion it is nice', 'correct' => ['in my opinion', 'it is', 'nice'], 'extra' => ['bad']],
                            'fr' => ['sentence' => "À mon avis c'est beau", 'correct' => ['à mon avis', "c'est", 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'En mi opinión es bonito', 'correct' => ['en mi opinión', 'es', 'bonito'], 'extra' => ['malo']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist es schön', 'correct' => ['meiner Meinung nach', 'ist es', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では素敵です', 'correct' => ['私の意見では', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 멋져요', 'correct' => ['제 생각에는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bence güzel', 'correct' => ['bence', 'güzel'], 'extra' => ['kitap', 'sinema']],
                            'ru' => ['sentence' => 'по-моему это приятно', 'correct' => ['по-моему', 'это', 'приятно'], 'extra' => ['плохой']],
                            'ar' => ['sentence' => 'برأيي هذا لطيف', 'correct' => ['برأيي', 'هذا', 'لطيف'], 'extra' => ['سيء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'film', 'xoş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This film is nice', 'correct' => ['this', 'film', 'is', 'nice'], 'extra' => ['bad']],
                            'fr' => ['sentence' => 'Ce film est beau', 'correct' => ['ce', 'film', 'est', 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'Esta película es bonita', 'correct' => ['esta', 'película', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Dieser Film ist schön', 'correct' => ['dieser', 'Film', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この映画は素敵です', 'correct' => ['この', '映画は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 영화는 멋져요', 'correct' => ['이', '영화는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bu film güzel', 'correct' => ['bu', 'film', 'güzel'], 'extra' => ['bence', 'kitap']],
                            'ru' => ['sentence' => 'это фильм приятно', 'correct' => ['это', 'фильм', 'приятно'], 'extra' => ['плохой']],
                            'ar' => ['sentence' => 'هذا فيلم لطيف', 'correct' => ['هذا', 'فيلم', 'لطيف'], 'extra' => ['سيء']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'kitab', 'pis'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This book is bad', 'correct' => ['this', 'book', 'is', 'bad'], 'extra' => ['nice']],
                            'fr' => ['sentence' => 'Ce livre est mauvais', 'correct' => ['ce', 'livre', 'est', 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'Este libro es malo', 'correct' => ['este', 'libro', 'es', 'malo'], 'extra' => ['bonito']],
                            'de' => ['sentence' => 'Dieses Buch ist schlecht', 'correct' => ['dieses', 'Buch', 'ist', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => 'この本は悪いです', 'correct' => ['この', '本は', '悪いです'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '이 책은 나빠요', 'correct' => ['이', '책은', '나빠요'], 'extra' => ['멋진']],
                            'tr' => ['sentence' => 'bu kitap kötü', 'correct' => ['bu', 'kitap', 'kötü'], 'extra' => ['bence', 'güzel']],
                            'ru' => ['sentence' => 'это книга плохой', 'correct' => ['это', 'книга', 'плохой'], 'extra' => ['приятно']],
                            'ar' => ['sentence' => 'هذا كتاب سيء', 'correct' => ['هذا', 'كتاب', 'سيء'], 'extra' => ['لطيف']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Think', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Düşünürəm'], ['az' => 'Belə']],
                phrases: [
                    'a' => [
                        'words' => ['düşünürəm', 'belə', 'də'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I think so too', 'correct' => ['I think', 'so', 'too'], 'extra' => ['maybe']],
                            'fr' => ['sentence' => 'Je pense aussi', 'correct' => ['je pense', 'aussi'], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Yo también creo', 'correct' => ['yo', 'también', 'creo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ich denke auch', 'correct' => ['ich denke', 'auch'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => '私もそう思います', 'correct' => ['私も', 'そう', '思います'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '저도 그렇게 생각해요', 'correct' => ['저도', '그렇게', '생각해요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'ben de düşünüyorum', 'correct' => ['ben', 'de', 'düşünüyorum'], 'extra' => ['doğru', 'ev']],
                            'ru' => ['sentence' => 'я думаю так тоже', 'correct' => ['я', 'думаю', 'так', 'тоже'], 'extra' => ['может быть']],
                            'ar' => ['sentence' => 'أفكر إذن أيضا', 'correct' => ['أفكر', 'إذن', 'أيضا'], 'extra' => ['ربما']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'düzgün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is true', 'correct' => ['this', 'is', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => 'Ceci est vrai', 'correct' => ['ceci', 'est', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto es verdadero', 'correct' => ['esto', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist richtig', 'correct' => ['das', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しいです', 'correct' => ['これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞아요', 'correct' => ['이것은', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'bu doğru', 'correct' => ['bu', 'doğru'], 'extra' => ['düşünüyorum', 'ev']],
                            'ru' => ['sentence' => 'это правильно', 'correct' => ['это', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'هذا صحيح', 'correct' => ['هذا', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'deyil', 'düzgün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => "Ceci n'est pas vrai", 'correct' => ['ceci', "n'est pas", 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'bu doğru değil', 'correct' => ['bu', 'doğru', 'değil'], 'extra' => ['düşünüyorum', 'ev']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: I Agree', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Bəli'], ['az' => 'Razıyam']],
                phrases: [
                    'a' => [
                        'words' => ['bəli', 'razıyam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Yes I agree', 'correct' => ['yes', 'I agree'], 'extra' => ['maybe']],
                            'fr' => ['sentence' => "Oui je suis d'accord", 'correct' => ['oui', "je suis d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Sí estoy de acuerdo', 'correct' => ['sí', 'estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ja ich stimme zu', 'correct' => ['ja', 'ich stimme zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'はい賛成です', 'correct' => ['はい', '賛成です'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '네 동의해요', 'correct' => ['네', '동의해요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'evet katılıyorum', 'correct' => ['evet', 'katılıyorum'], 'extra' => ['belki', 'okul']],
                            'ru' => ['sentence' => 'да я согласен', 'correct' => ['да', 'я', 'согласен'], 'extra' => ['может быть']],
                            'ar' => ['sentence' => 'نعم أوافق', 'correct' => ['نعم', 'أوافق'], 'extra' => ['ربما']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bəlkə', 'bu', 'düzgün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Maybe it is true', 'correct' => ['maybe', 'it is', 'true'], 'extra' => ['I agree']],
                            'fr' => ['sentence' => "Peut-être c'est vrai", 'correct' => ['peut-être', "c'est", 'vrai'], 'extra' => ["je suis d'accord"]],
                            'es' => ['sentence' => 'Quizás es verdadero', 'correct' => ['quizás', 'es', 'verdadero'], 'extra' => ['estoy de acuerdo']],
                            'de' => ['sentence' => 'Vielleicht ist es richtig', 'correct' => ['vielleicht', 'ist es', 'richtig'], 'extra' => ['ich stimme zu']],
                            'ja' => ['sentence' => 'たぶん正しいです', 'correct' => ['たぶん', '正しいです'], 'extra' => ['賛成です']],
                            'ko' => ['sentence' => '아마 맞아요', 'correct' => ['아마', '맞아요'], 'extra' => ['동의해요']],
                            'tr' => ['sentence' => 'belki doğru', 'correct' => ['belki', 'doğru'], 'extra' => ['katılıyorum', 'okul']],
                            'ru' => ['sentence' => 'может быть это правильно', 'correct' => ['может быть', 'это', 'правильно'], 'extra' => ['я', 'согласен']],
                            'ar' => ['sentence' => 'ربما هذا صحيح', 'correct' => ['ربما', 'هذا', 'صحيح'], 'extra' => ['أوافق']],
                        ],
                    ],
                    'c' => [
                        'words' => ['xeyr', 'razı deyiləm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'No I do not agree', 'correct' => ['no', 'I do not agree'], 'extra' => ['maybe']],
                            'fr' => ['sentence' => "Non je ne suis pas d'accord", 'correct' => ['non', "je ne suis pas d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'No no estoy de acuerdo', 'correct' => ['no', 'no estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Nein ich stimme nicht zu', 'correct' => ['nein', 'ich stimme nicht zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'いいえ賛成しません', 'correct' => ['いいえ', '賛成しません'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '아니요 동의하지 않아요', 'correct' => ['아니요', '동의하지 않아요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'hayır katılmıyorum', 'correct' => ['hayır', 'katılmıyorum'], 'extra' => ['katılıyorum', 'belki']],
                            'ru' => ['sentence' => 'нет не согласен', 'correct' => ['нет', 'не', 'согласен'], 'extra' => ['может быть']],
                            'ar' => ['sentence' => 'لا لا أوافق', 'correct' => ['لا', 'لا أوافق'], 'extra' => ['ربما']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: About the City', 4,
                pictures: [['az' => 'Böyük', 'img' => 'big'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Bu'], ['az' => 'Şəhər']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'şəhər', 'xoş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This city is nice', 'correct' => ['this', 'city', 'is', 'nice'], 'extra' => ['bad']],
                            'fr' => ['sentence' => 'Cette ville est belle', 'correct' => ['cette', 'ville', 'est', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'Esta ciudad es bonita', 'correct' => ['esta', 'ciudad', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Diese Stadt ist schön', 'correct' => ['diese', 'Stadt', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この町は素敵です', 'correct' => ['この', '町は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 도시는 멋져요', 'correct' => ['이', '도시는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bu şehir güzel', 'correct' => ['bu', 'şehir', 'güzel'], 'extra' => ['kötü', 'park']],
                            'ru' => ['sentence' => 'это город приятно', 'correct' => ['это', 'город', 'приятно'], 'extra' => ['плохой']],
                            'ar' => ['sentence' => 'هذا مدينة لطيف', 'correct' => ['هذا', 'مدينة', 'لطيف'], 'extra' => ['سيء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['məncə', 'şəhər', 'çox', 'xoş'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion the city is very nice', 'correct' => ['in my opinion', 'the city', 'is', 'very', 'nice'], 'extra' => ['bad']],
                            'fr' => ['sentence' => 'À mon avis la ville est très belle', 'correct' => ['à mon avis', 'la ville', 'est', 'très', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'En mi opinión la ciudad es muy bonita', 'correct' => ['en mi opinión', 'la ciudad', 'es', 'muy', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist die Stadt sehr schön', 'correct' => ['meiner Meinung nach', 'ist', 'die Stadt', 'sehr', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では町はとても素敵です', 'correct' => ['私の意見では', '町は', 'とても', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 도시가 아주 멋져요', 'correct' => ['제 생각에는', '도시가', '아주', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bence şehir çok güzel', 'correct' => ['bence', 'şehir', 'çok', 'güzel'], 'extra' => ['kötü', 'park']],
                            'ru' => ['sentence' => 'по-моему город очень приятно', 'correct' => ['по-моему', 'город', 'очень', 'приятно'], 'extra' => ['плохой']],
                            'ar' => ['sentence' => 'برأيي مدينة جدا لطيف', 'correct' => ['برأيي', 'مدينة', 'جدا', 'لطيف'], 'extra' => ['سيء']],
                        ],
                    ],
                    'c' => [
                        'words' => ['şəhər', 'çox', 'böyük'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The city is very big', 'correct' => ['the city', 'is', 'very', 'big'], 'extra' => ['small']],
                            'fr' => ['sentence' => 'La ville est très grande', 'correct' => ['la ville', 'est', 'très', 'grande'], 'extra' => ['petite']],
                            'es' => ['sentence' => 'La ciudad es muy grande', 'correct' => ['la ciudad', 'es', 'muy', 'grande'], 'extra' => ['pequeña']],
                            'de' => ['sentence' => 'Die Stadt ist sehr groß', 'correct' => ['die Stadt', 'ist', 'sehr', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '町はとても大きいです', 'correct' => ['町は', 'とても', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '도시는 아주 커요', 'correct' => ['도시는', '아주', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'şehir çok büyük', 'correct' => ['şehir', 'çok', 'büyük'], 'extra' => ['kötü', 'park']],
                            'ru' => ['sentence' => 'город очень большой', 'correct' => ['город', 'очень', 'большой'], 'extra' => ['маленький']],
                            'ar' => ['sentence' => 'مدينة جدا كبير', 'correct' => ['مدينة', 'جدا', 'كبير'], 'extra' => ['صغير']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Saying It Together', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Məncə'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['məncə', 'bu', 'səhv'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion this is wrong', 'correct' => ['in my opinion', 'this', 'is', 'wrong'], 'extra' => ['true']],
                            'fr' => ['sentence' => 'À mon avis ceci est faux', 'correct' => ['à mon avis', 'ceci', 'est', 'faux'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'En mi opinión esto es falso', 'correct' => ['en mi opinión', 'esto', 'es', 'falso'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist das falsch', 'correct' => ['meiner Meinung nach', 'ist', 'das', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => '私の意見ではこれは間違いです', 'correct' => ['私の意見では', 'これは', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '제 생각에는 이것은 틀려요', 'correct' => ['제 생각에는', '이것은', '틀려요'], 'extra' => ['맞는']],
                            'tr' => ['sentence' => 'bence bu yanlış', 'correct' => ['bence', 'bu', 'yanlış'], 'extra' => ['doğru', 'sinema']],
                            'ru' => ['sentence' => 'по-моему это неправильно', 'correct' => ['по-моему', 'это', 'неправильно'], 'extra' => ['правильно']],
                            'ar' => ['sentence' => 'برأيي هذا خطأ', 'correct' => ['برأيي', 'هذا', 'خطأ'], 'extra' => ['صحيح']],
                        ],
                    ],
                    'b' => [
                        'words' => ['film', 'deyil', 'pis'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The film is not bad', 'correct' => ['the film', 'is not', 'bad'], 'extra' => ['nice']],
                            'fr' => ['sentence' => "Le film n'est pas mauvais", 'correct' => ['le film', "n'est pas", 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'La película no es mala', 'correct' => ['la película', 'no es', 'mala'], 'extra' => ['bonita']],
                            'de' => ['sentence' => 'Der Film ist nicht schlecht', 'correct' => ['der Film', 'ist nicht', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => '映画は悪くありません', 'correct' => ['映画は', '悪く', 'ありません'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '영화는 나쁘지 않아요', 'correct' => ['영화는', '나쁘지 않아요'], 'extra' => ['멋진']],
                            'tr' => ['sentence' => 'film kötü değil', 'correct' => ['film', 'kötü', 'değil'], 'extra' => ['yanlış', 'doğru']],
                            'ru' => ['sentence' => 'фильм не плохой', 'correct' => ['фильм', 'не', 'плохой'], 'extra' => ['приятно']],
                            'ar' => ['sentence' => 'فيلم ليس سيء', 'correct' => ['فيلم', 'ليس', 'سيء'], 'extra' => ['لطيف']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bəli', 'məncə', 'bu', 'düzgün', 'də'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Yes in my opinion it is true too', 'correct' => ['yes', 'in my opinion', 'it is', 'true', 'too'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => "Oui à mon avis c'est vrai aussi", 'correct' => ['oui', 'à mon avis', "c'est", 'vrai', 'aussi'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Sí en mi opinión también es verdadero', 'correct' => ['sí', 'en mi opinión', 'también', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Ja meiner Meinung nach ist es auch richtig', 'correct' => ['ja', 'meiner Meinung nach', 'ist es', 'auch', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'はい私の意見でもこれは正しいです', 'correct' => ['はい', '私の意見でも', 'これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '네 제 생각에도 맞아요', 'correct' => ['네', '제 생각에도', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'evet bence de doğru', 'correct' => ['evet', 'bence', 'de', 'doğru'], 'extra' => ['yanlış', 'sinema']],
                            'ru' => ['sentence' => 'да по-моему это правильно тоже', 'correct' => ['да', 'по-моему', 'это', 'правильно', 'тоже'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'نعم برأيي هذا صحيح أيضا', 'correct' => ['نعم', 'برأيي', 'هذا', 'صحيح', 'أيضا'], 'extra' => ['خطأ']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
