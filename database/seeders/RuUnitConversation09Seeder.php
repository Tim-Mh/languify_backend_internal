<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitConversation09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Книга' => 'book', 'Кофе' => 'coffee', 'Чай' => 'tea', 'Большой' => 'big',
        'Вода' => 'water', 'Молоко' => 'milk', 'Хлеб' => 'bread', 'Сыр' => 'cheese',
    ];

    /**
     * Russian Conversation Unit 9.
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
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Expressing Opinions', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: In My Opinion', 1,
                pictures: [['ru' => 'Книга', 'img' => 'book'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'По-моему'], ['ru' => 'Это']],
                phrases: [
                    'a' => [
                        'words' => ['по-моему', 'это', 'приятно'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion it is nice', 'correct' => ['in my opinion', 'it is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'məncə bu xoş', 'correct' => ['məncə', 'bu', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'برأيي هذا لطيف', 'correct' => ['برأيي', 'هذا', 'لطيف'], 'extra' => ['سيء']],
                            'fr' => ['sentence' => "À mon avis c'est beau", 'correct' => ['à mon avis', "c'est", 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'En mi opinión es bonito', 'correct' => ['en mi opinión', 'es', 'bonito'], 'extra' => ['malo']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist es schön', 'correct' => ['meiner Meinung nach', 'ist es', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では素敵です', 'correct' => ['私の意見では', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 멋져요', 'correct' => ['제 생각에는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bence güzel', 'correct' => ['bence', 'güzel'], 'extra' => ['kitap', 'sinema']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'фильм', 'приятно'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This film is nice', 'correct' => ['this', 'film', 'is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'bu film xoş', 'correct' => ['bu', 'film', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'هذا فيلم لطيف', 'correct' => ['هذا', 'فيلم', 'لطيف'], 'extra' => ['سيء']],
                            'fr' => ['sentence' => 'Ce film est beau', 'correct' => ['ce', 'film', 'est', 'beau'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'Esta película es bonita', 'correct' => ['esta', 'película', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Dieser Film ist schön', 'correct' => ['dieser', 'Film', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この映画は素敵です', 'correct' => ['この', '映画は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 영화는 멋져요', 'correct' => ['이', '영화는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bu film güzel', 'correct' => ['bu', 'film', 'güzel'], 'extra' => ['bence', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['это', 'книга', 'плохой'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This book is bad', 'correct' => ['this', 'book', 'is', 'bad'], 'extra' => ['nice']],
                            'az' => ['sentence' => 'bu kitab pis', 'correct' => ['bu', 'kitab', 'pis'], 'extra' => ['xoş']],
                            'ar' => ['sentence' => 'هذا كتاب سيء', 'correct' => ['هذا', 'كتاب', 'سيء'], 'extra' => ['لطيف']],
                            'fr' => ['sentence' => 'Ce livre est mauvais', 'correct' => ['ce', 'livre', 'est', 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'Este libro es malo', 'correct' => ['este', 'libro', 'es', 'malo'], 'extra' => ['bonito']],
                            'de' => ['sentence' => 'Dieses Buch ist schlecht', 'correct' => ['dieses', 'Buch', 'ist', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => 'この本は悪いです', 'correct' => ['この', '本は', '悪いです'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '이 책은 나빠요', 'correct' => ['이', '책은', '나빠요'], 'extra' => ['멋진']],
                            'tr' => ['sentence' => 'bu kitap kötü', 'correct' => ['bu', 'kitap', 'kötü'], 'extra' => ['bence', 'güzel']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Think', 2,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Думаю'], ['ru' => 'Так']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'думаю', 'так', 'тоже'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I think so too', 'correct' => ['I think', 'so', 'too'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'düşünürəm belə də', 'correct' => ['düşünürəm', 'belə', 'də'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'أفكر إذن أيضا', 'correct' => ['أفكر', 'إذن', 'أيضا'], 'extra' => ['ربما']],
                            'fr' => ['sentence' => 'Je pense aussi', 'correct' => ['je pense', 'aussi'], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Yo también creo', 'correct' => ['yo', 'también', 'creo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ich denke auch', 'correct' => ['ich denke', 'auch'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => '私もそう思います', 'correct' => ['私も', 'そう', '思います'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '저도 그렇게 생각해요', 'correct' => ['저도', '그렇게', '생각해요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'ben de düşünüyorum', 'correct' => ['ben', 'de', 'düşünüyorum'], 'extra' => ['doğru', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'правильно'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is true', 'correct' => ['this', 'is', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bu düzgün', 'correct' => ['bu', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هذا صحيح', 'correct' => ['هذا', 'صحيح'], 'extra' => ['خطأ']],
                            'fr' => ['sentence' => 'Ceci est vrai', 'correct' => ['ceci', 'est', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto es verdadero', 'correct' => ['esto', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist richtig', 'correct' => ['das', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しいです', 'correct' => ['これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞아요', 'correct' => ['이것은', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'bu doğru', 'correct' => ['bu', 'doğru'], 'extra' => ['düşünüyorum', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => ['это', 'не', 'правильно'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bu deyil düzgün', 'correct' => ['bu', 'deyil', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['خطأ']],
                            'fr' => ['sentence' => "Ceci n'est pas vrai", 'correct' => ['ceci', "n'est pas", 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'bu doğru değil', 'correct' => ['bu', 'doğru', 'değil'], 'extra' => ['düşünüyorum', 'ev']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: I Agree', 3,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Да'], ['ru' => 'Согласен']],
                phrases: [
                    'a' => [
                        'words' => ['да', 'я', 'согласен'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Yes I agree', 'correct' => ['yes', 'I agree'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'bəli razıyam', 'correct' => ['bəli', 'razıyam'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'نعم أوافق', 'correct' => ['نعم', 'أوافق'], 'extra' => ['ربما']],
                            'fr' => ['sentence' => "Oui je suis d'accord", 'correct' => ['oui', "je suis d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'Sí estoy de acuerdo', 'correct' => ['sí', 'estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Ja ich stimme zu', 'correct' => ['ja', 'ich stimme zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'はい賛成です', 'correct' => ['はい', '賛成です'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '네 동의해요', 'correct' => ['네', '동의해요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'evet katılıyorum', 'correct' => ['evet', 'katılıyorum'], 'extra' => ['belki', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => ['может быть', 'это', 'правильно'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Maybe it is true', 'correct' => ['maybe', 'it is', 'true'], 'extra' => ['I agree']],
                            'az' => ['sentence' => 'bəlkə bu düzgün', 'correct' => ['bəlkə', 'bu', 'düzgün'], 'extra' => ['razıyam']],
                            'ar' => ['sentence' => 'ربما هذا صحيح', 'correct' => ['ربما', 'هذا', 'صحيح'], 'extra' => ['أوافق']],
                            'fr' => ['sentence' => "Peut-être c'est vrai", 'correct' => ['peut-être', "c'est", 'vrai'], 'extra' => ["je suis d'accord"]],
                            'es' => ['sentence' => 'Quizás es verdadero', 'correct' => ['quizás', 'es', 'verdadero'], 'extra' => ['estoy de acuerdo']],
                            'de' => ['sentence' => 'Vielleicht ist es richtig', 'correct' => ['vielleicht', 'ist es', 'richtig'], 'extra' => ['ich stimme zu']],
                            'ja' => ['sentence' => 'たぶん正しいです', 'correct' => ['たぶん', '正しいです'], 'extra' => ['賛成です']],
                            'ko' => ['sentence' => '아마 맞아요', 'correct' => ['아마', '맞아요'], 'extra' => ['동의해요']],
                            'tr' => ['sentence' => 'belki doğru', 'correct' => ['belki', 'doğru'], 'extra' => ['katılıyorum', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => ['нет', 'не', 'согласен'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'No I do not agree', 'correct' => ['no', 'I do not agree'], 'extra' => ['maybe']],
                            'az' => ['sentence' => 'xeyr razı deyiləm', 'correct' => ['xeyr', 'razı deyiləm'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'لا لا أوافق', 'correct' => ['لا', 'لا أوافق'], 'extra' => ['ربما']],
                            'fr' => ['sentence' => "Non je ne suis pas d'accord", 'correct' => ['non', "je ne suis pas d'accord"], 'extra' => ['peut-être']],
                            'es' => ['sentence' => 'No no estoy de acuerdo', 'correct' => ['no', 'no estoy de acuerdo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Nein ich stimme nicht zu', 'correct' => ['nein', 'ich stimme nicht zu'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'いいえ賛成しません', 'correct' => ['いいえ', '賛成しません'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '아니요 동의하지 않아요', 'correct' => ['아니요', '동의하지 않아요'], 'extra' => ['아마']],
                            'tr' => ['sentence' => 'hayır katılmıyorum', 'correct' => ['hayır', 'katılmıyorum'], 'extra' => ['katılıyorum', 'belki']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: About the City', 4,
                pictures: [['ru' => 'Большой', 'img' => 'big'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Это'], ['ru' => 'Город']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'город', 'приятно'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This city is nice', 'correct' => ['this', 'city', 'is', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'bu şəhər xoş', 'correct' => ['bu', 'şəhər', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'هذا مدينة لطيف', 'correct' => ['هذا', 'مدينة', 'لطيف'], 'extra' => ['سيء']],
                            'fr' => ['sentence' => 'Cette ville est belle', 'correct' => ['cette', 'ville', 'est', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'Esta ciudad es bonita', 'correct' => ['esta', 'ciudad', 'es', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Diese Stadt ist schön', 'correct' => ['diese', 'Stadt', 'ist', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'この町は素敵です', 'correct' => ['この', '町は', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '이 도시는 멋져요', 'correct' => ['이', '도시는', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bu şehir güzel', 'correct' => ['bu', 'şehir', 'güzel'], 'extra' => ['kötü', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => ['по-моему', 'город', 'очень', 'приятно'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion the city is very nice', 'correct' => ['in my opinion', 'the city', 'is', 'very', 'nice'], 'extra' => ['bad']],
                            'az' => ['sentence' => 'məncə şəhər çox xoş', 'correct' => ['məncə', 'şəhər', 'çox', 'xoş'], 'extra' => ['pis']],
                            'ar' => ['sentence' => 'برأيي مدينة جدا لطيف', 'correct' => ['برأيي', 'مدينة', 'جدا', 'لطيف'], 'extra' => ['سيء']],
                            'fr' => ['sentence' => 'À mon avis la ville est très belle', 'correct' => ['à mon avis', 'la ville', 'est', 'très', 'belle'], 'extra' => ['mauvaise']],
                            'es' => ['sentence' => 'En mi opinión la ciudad es muy bonita', 'correct' => ['en mi opinión', 'la ciudad', 'es', 'muy', 'bonita'], 'extra' => ['mala']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist die Stadt sehr schön', 'correct' => ['meiner Meinung nach', 'ist', 'die Stadt', 'sehr', 'schön'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => '私の意見では町はとても素敵です', 'correct' => ['私の意見では', '町は', 'とても', '素敵です'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '제 생각에는 도시가 아주 멋져요', 'correct' => ['제 생각에는', '도시가', '아주', '멋져요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'bence şehir çok güzel', 'correct' => ['bence', 'şehir', 'çok', 'güzel'], 'extra' => ['kötü', 'park']],
                        ],
                    ],
                    'c' => [
                        'words' => ['город', 'очень', 'большой'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The city is very big', 'correct' => ['the city', 'is', 'very', 'big'], 'extra' => ['small']],
                            'az' => ['sentence' => 'şəhər çox böyük', 'correct' => ['şəhər', 'çox', 'böyük'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'مدينة جدا كبير', 'correct' => ['مدينة', 'جدا', 'كبير'], 'extra' => ['صغير']],
                            'fr' => ['sentence' => 'La ville est très grande', 'correct' => ['la ville', 'est', 'très', 'grande'], 'extra' => ['petite']],
                            'es' => ['sentence' => 'La ciudad es muy grande', 'correct' => ['la ciudad', 'es', 'muy', 'grande'], 'extra' => ['pequeña']],
                            'de' => ['sentence' => 'Die Stadt ist sehr groß', 'correct' => ['die Stadt', 'ist', 'sehr', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '町はとても大きいです', 'correct' => ['町は', 'とても', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '도시는 아주 커요', 'correct' => ['도시는', '아주', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'şehir çok büyük', 'correct' => ['şehir', 'çok', 'büyük'], 'extra' => ['kötü', 'park']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Saying It Together', 5,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'По-моему'], ['ru' => 'Это']],
                phrases: [
                    'a' => [
                        'words' => ['по-моему', 'это', 'неправильно'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion this is wrong', 'correct' => ['in my opinion', 'this', 'is', 'wrong'], 'extra' => ['true']],
                            'az' => ['sentence' => 'məncə bu səhv', 'correct' => ['məncə', 'bu', 'səhv'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'برأيي هذا خطأ', 'correct' => ['برأيي', 'هذا', 'خطأ'], 'extra' => ['صحيح']],
                            'fr' => ['sentence' => 'À mon avis ceci est faux', 'correct' => ['à mon avis', 'ceci', 'est', 'faux'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'En mi opinión esto es falso', 'correct' => ['en mi opinión', 'esto', 'es', 'falso'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist das falsch', 'correct' => ['meiner Meinung nach', 'ist', 'das', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => '私の意見ではこれは間違いです', 'correct' => ['私の意見では', 'これは', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '제 생각에는 이것은 틀려요', 'correct' => ['제 생각에는', '이것은', '틀려요'], 'extra' => ['맞는']],
                            'tr' => ['sentence' => 'bence bu yanlış', 'correct' => ['bence', 'bu', 'yanlış'], 'extra' => ['doğru', 'sinema']],
                        ],
                    ],
                    'b' => [
                        'words' => ['фильм', 'не', 'плохой'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The film is not bad', 'correct' => ['the film', 'is not', 'bad'], 'extra' => ['nice']],
                            'az' => ['sentence' => 'film deyil pis', 'correct' => ['film', 'deyil', 'pis'], 'extra' => ['xoş']],
                            'ar' => ['sentence' => 'فيلم ليس سيء', 'correct' => ['فيلم', 'ليس', 'سيء'], 'extra' => ['لطيف']],
                            'fr' => ['sentence' => "Le film n'est pas mauvais", 'correct' => ['le film', "n'est pas", 'mauvais'], 'extra' => ['beau']],
                            'es' => ['sentence' => 'La película no es mala', 'correct' => ['la película', 'no es', 'mala'], 'extra' => ['bonita']],
                            'de' => ['sentence' => 'Der Film ist nicht schlecht', 'correct' => ['der Film', 'ist nicht', 'schlecht'], 'extra' => ['schön']],
                            'ja' => ['sentence' => '映画は悪くありません', 'correct' => ['映画は', '悪く', 'ありません'], 'extra' => ['素敵']],
                            'ko' => ['sentence' => '영화는 나쁘지 않아요', 'correct' => ['영화는', '나쁘지 않아요'], 'extra' => ['멋진']],
                            'tr' => ['sentence' => 'film kötü değil', 'correct' => ['film', 'kötü', 'değil'], 'extra' => ['yanlış', 'doğru']],
                        ],
                    ],
                    'c' => [
                        'words' => ['да', 'по-моему', 'это', 'правильно', 'тоже'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Yes in my opinion it is true too', 'correct' => ['yes', 'in my opinion', 'it is', 'true', 'too'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bəli məncə bu düzgün də', 'correct' => ['bəli', 'məncə', 'bu', 'düzgün', 'də'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'نعم برأيي هذا صحيح أيضا', 'correct' => ['نعم', 'برأيي', 'هذا', 'صحيح', 'أيضا'], 'extra' => ['خطأ']],
                            'fr' => ['sentence' => "Oui à mon avis c'est vrai aussi", 'correct' => ['oui', 'à mon avis', "c'est", 'vrai', 'aussi'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Sí en mi opinión también es verdadero', 'correct' => ['sí', 'en mi opinión', 'también', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Ja meiner Meinung nach ist es auch richtig', 'correct' => ['ja', 'meiner Meinung nach', 'ist es', 'auch', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'はい私の意見でもこれは正しいです', 'correct' => ['はい', '私の意見でも', 'これは', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '네 제 생각에도 맞아요', 'correct' => ['네', '제 생각에도', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'evet bence de doğru', 'correct' => ['evet', 'bence', 'de', 'doğru'], 'extra' => ['yanlış', 'sinema']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
