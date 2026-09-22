<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Sinema' => 'cinema', 'Park' => 'park', 'Ev' => 'house',
        'Okul' => 'school', 'Arkadaş' => 'friend', 'Kitap' => 'book',
    ];

    /**
     * Turkish Conversation Unit 6 — future plans.
     *
     * THE RULE THIS UNIT TEACHES: THE FUTURE IS A SUFFIX, AND IT SOFTENS.
     *
     * Turkish marks the future with -acak/-ecek, chosen by vowel harmony, and
     * then the final -k softens to -ğ once a personal ending follows:
     *
     *     git- + -ecek + -im  ->  gideceğim   I will go   (t also softens to d)
     *     gel- + -ecek + -im  ->  geleceğim   I will come
     *     yap- + -acak + -ım  ->  yapacağım   I will do
     *
     * Two sound changes at once, neither of them optional. That is why each
     * form is a single tile with its own dictionary entry: a learner asked to
     * build `gideceğim` from `git` and a suffix would have to know both rules
     * before anyone has taught them either.
     *
     * WHERE YOU ARE GOING TAKES -a/-e, NOT A PREPOSITION. English needs "to";
     * Turkish glues the dative on: `sinema` is a cinema, `sinemaya` is to the
     * cinema. Both are listed, and the unit deliberately shows the pair so the
     * difference is visible rather than asserted.
     *
     * Word order is unchanged from Unit 5: time first, place next, verb last.
     * `Yarın sinemaya gideceğim` is literally "tomorrow to-the-cinema I-will-go",
     * and the English word bank has to be reordered to match English, which is
     * exactly the skill being drilled.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Future Plans', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Tomorrow & I Will Go', 1,
                pictures: [['tr' => 'Sinema', 'img' => 'cinema'], ['tr' => 'Park', 'img' => 'park']],
                plain: [['tr' => 'Yarın'], ['tr' => 'Gideceğim']],
                phrases: [
                    'a' => [
                        // Time, then place, then verb. The verb is always last.
                        'words' => ['yarın', 'sinemaya', 'gideceğim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Tomorrow I will go to the cinema', 'correct' => ['tomorrow', 'I will go', 'to the cinema'], 'extra' => ['to the park']],
                            'az' => ['sentence' => 'sabah gedəcəyəm kinoteatra', 'correct' => ['sabah', 'gedəcəyəm', 'kinoteatra'], 'extra' => ['parka']],
                            'ar' => ['sentence' => 'غدا سأذهب إلى السينما', 'correct' => ['غدا', 'سأذهب', 'إلى', 'السينما'], 'extra' => ['الحديقة']],
                            'ru' => ['sentence' => 'завтра я пойду в кино', 'correct' => ['завтра', 'я', 'пойду', 'в', 'кино'], 'extra' => ['парк']],
                            'fr' => ['sentence' => "Demain j'irai au cinéma", 'correct' => ['demain', "j'irai", 'au cinéma'], 'extra' => ['au parc']],
                            'es' => ['sentence' => 'Mañana iré al cine', 'correct' => ['mañana', 'iré', 'al cine'], 'extra' => ['al parque']],
                            'de' => ['sentence' => 'Morgen werde ich ins Kino gehen', 'correct' => ['morgen', 'werde ich', 'ins Kino', 'gehen'], 'extra' => ['in den Park']],
                            'ja' => ['sentence' => '明日映画館へ行きます', 'correct' => ['明日', '映画館へ', '行きます'], 'extra' => ['公園へ']],
                            'ko' => ['sentence' => '내일 영화관에 갈 거예요', 'correct' => ['내일', '영화관에', '갈 거예요'], 'extra' => ['공원에']],
                        ],
                    ],
                    'b' => [
                        'words' => ['parka', 'gideceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will go to the park', 'correct' => ['I will go', 'to the park'], 'extra' => ['to the cinema', 'tomorrow']],
                            'az' => ['sentence' => 'gedəcəyəm parka', 'correct' => ['gedəcəyəm', 'parka'], 'extra' => ['kinoteatra', 'sabah']],
                            'ar' => ['sentence' => 'سأذهب إلى الحديقة', 'correct' => ['سأذهب', 'إلى', 'الحديقة'], 'extra' => ['السينما', 'غدا']],
                            'ru' => ['sentence' => 'я пойду в парк', 'correct' => ['я', 'пойду', 'в', 'парк'], 'extra' => ['кино', 'завтра']],
                            'fr' => ['sentence' => "J'irai au parc", 'correct' => ["j'irai", 'au parc'], 'extra' => ['au cinéma', 'demain']],
                            'es' => ['sentence' => 'Iré al parque', 'correct' => ['iré', 'al parque'], 'extra' => ['al cine', 'mañana']],
                            'de' => ['sentence' => 'Ich werde in den Park gehen', 'correct' => ['ich werde', 'in den Park', 'gehen'], 'extra' => ['ins Kino', 'morgen']],
                            'ja' => ['sentence' => '公園へ行きます', 'correct' => ['公園へ', '行きます'], 'extra' => ['映画館へ', '明日']],
                            'ko' => ['sentence' => '공원에 갈 거예요', 'correct' => ['공원에', '갈 거예요'], 'extra' => ['영화관에', '내일']],
                        ],
                    ],
                    'c' => [
                        // The bare noun beside its dative, so the -ya is visible.
                        'words' => ['sinema', 've', 'park'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cinema and a park', 'correct' => ['a', 'cinema', 'and', 'a', 'park'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'bir kinoteatr və bir park', 'correct' => ['bir', 'kinoteatr', 'və', 'bir', 'park'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'سينما و حديقة', 'correct' => ['سينما', 'و', 'حديقة'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'кино и парк', 'correct' => ['кино', 'и', 'парк'], 'extra' => ['завтра']],
                            'fr' => ['sentence' => 'Un cinéma et un parc', 'correct' => ['un', 'cinéma', 'et', 'un', 'parc'], 'extra' => ['demain']],
                            'es' => ['sentence' => 'Un cine y un parque', 'correct' => ['un', 'cine', 'y', 'un', 'parque'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Ein Kino und ein Park', 'correct' => ['ein', 'Kino', 'und', 'ein', 'Park'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '映画館と公園', 'correct' => ['映画館', 'と', '公園'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '영화관과 공원', 'correct' => ['영화관과', '공원'], 'extra' => ['내일']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Will Come & Next Week', 2,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Okul', 'img' => 'school']],
                plain: [['tr' => 'Geleceğim'], ['tr' => 'Haftaya']],
                phrases: [
                    'a' => [
                        'words' => ['haftaya', 'geleceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Next week I will come', 'correct' => ['next week', 'I will come'], 'extra' => ['I will go', 'tomorrow']],
                            'az' => ['sentence' => 'gələn həftə gələcəyəm', 'correct' => ['gələn həftə', 'gələcəyəm'], 'extra' => ['gedəcəyəm', 'sabah']],
                            'ar' => ['sentence' => 'الأسبوع القادم سآتي', 'correct' => ['الأسبوع القادم', 'سآتي'], 'extra' => ['سأذهب', 'غدا']],
                            'ru' => ['sentence' => 'на следующей неделе я приду', 'correct' => ['на следующей неделе', 'я', 'приду'], 'extra' => ['пойду', 'завтра']],
                            'fr' => ['sentence' => 'La semaine prochaine je viendrai', 'correct' => ['la semaine prochaine', 'je viendrai'], 'extra' => ["j'irai", 'demain']],
                            'es' => ['sentence' => 'La próxima semana vendré', 'correct' => ['la próxima semana', 'vendré'], 'extra' => ['iré', 'mañana']],
                            'de' => ['sentence' => 'Nächste Woche werde ich kommen', 'correct' => ['nächste Woche', 'werde ich', 'kommen'], 'extra' => ['gehen', 'morgen']],
                            'ja' => ['sentence' => '来週来ます', 'correct' => ['来週', '来ます'], 'extra' => ['行きます', '明日']],
                            'ko' => ['sentence' => '다음 주에 올 거예요', 'correct' => ['다음 주에', '올 거예요'], 'extra' => ['갈 거예요', '내일']],
                        ],
                    ],
                    'b' => [
                        'words' => ['eve', 'geleceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will come home', 'correct' => ['I will come', 'home'], 'extra' => ['to school', 'next week']],
                            'az' => ['sentence' => 'gələcəyəm evdəyəm', 'correct' => ['gələcəyəm', 'evdəyəm'], 'extra' => ['məktəbə', 'gələn həftə']],
                            'ar' => ['sentence' => 'سآتي في البيت', 'correct' => ['سآتي', 'في البيت'], 'extra' => ['إلى المدرسة', 'الأسبوع القادم']],
                            'ru' => ['sentence' => 'я приду дома', 'correct' => ['я', 'приду', 'дома'], 'extra' => ['в', 'школу', 'на следующей неделе']],
                            'fr' => ['sentence' => 'Je viendrai à la maison', 'correct' => ['je viendrai', 'à la maison'], 'extra' => ["à l'école", 'la semaine prochaine']],
                            'es' => ['sentence' => 'Vendré a casa', 'correct' => ['vendré', 'a casa'], 'extra' => ['a la escuela', 'la próxima semana']],
                            'de' => ['sentence' => 'Ich werde nach Hause kommen', 'correct' => ['ich werde', 'nach Hause', 'kommen'], 'extra' => ['zur Schule', 'nächste Woche']],
                            'ja' => ['sentence' => '家へ来ます', 'correct' => ['家へ', '来ます'], 'extra' => ['学校へ', '来週']],
                            'ko' => ['sentence' => '집에 올 거예요', 'correct' => ['집에', '올 거예요'], 'extra' => ['학교에', '다음 주에']],
                        ],
                    ],
                    'c' => [
                        'words' => ['okula', 'gideceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will go to school', 'correct' => ['I will go', 'to school'], 'extra' => ['home', 'next week']],
                            'az' => ['sentence' => 'gedəcəyəm məktəbə', 'correct' => ['gedəcəyəm', 'məktəbə'], 'extra' => ['evdəyəm', 'gələn həftə']],
                            'ar' => ['sentence' => 'سأذهب إلى المدرسة', 'correct' => ['سأذهب', 'إلى المدرسة'], 'extra' => ['في البيت', 'الأسبوع القادم']],
                            'ru' => ['sentence' => 'я пойду в школу', 'correct' => ['я', 'пойду', 'в', 'школу'], 'extra' => ['дома', 'на следующей неделе']],
                            'fr' => ['sentence' => "J'irai à l'école", 'correct' => ["j'irai", "à l'école"], 'extra' => ['à la maison', 'la semaine prochaine']],
                            'es' => ['sentence' => 'Iré a la escuela', 'correct' => ['iré', 'a la escuela'], 'extra' => ['a casa', 'la próxima semana']],
                            'de' => ['sentence' => 'Ich werde zur Schule gehen', 'correct' => ['ich werde', 'zur Schule', 'gehen'], 'extra' => ['nach Hause', 'nächste Woche']],
                            'ja' => ['sentence' => '学校へ行きます', 'correct' => ['学校へ', '行きます'], 'extra' => ['家へ', '来週']],
                            'ko' => ['sentence' => '학교에 갈 거예요', 'correct' => ['학교에', '갈 거예요'], 'extra' => ['집에', '다음 주에']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Together & With My Friend', 3,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Sinema', 'img' => 'cinema']],
                plain: [['tr' => 'Birlikte'], ['tr' => 'Arkadaşımla']],
                phrases: [
                    'a' => [
                        'words' => ['arkadaşımla', 'gideceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will go with my friend', 'correct' => ['I will go', 'with my friend'], 'extra' => ['together', 'tomorrow']],
                            'az' => ['sentence' => 'gedəcəyəm dostumla', 'correct' => ['gedəcəyəm', 'dostumla'], 'extra' => ['birlikdə', 'sabah']],
                            'ar' => ['sentence' => 'سأذهب مع صديقي', 'correct' => ['سأذهب', 'مع صديقي'], 'extra' => ['معا', 'غدا']],
                            'ru' => ['sentence' => 'я пойду с другом', 'correct' => ['я', 'пойду', 'с', 'другом'], 'extra' => ['вместе', 'завтра']],
                            'fr' => ['sentence' => "J'irai avec mon ami", 'correct' => ["j'irai", 'avec mon ami'], 'extra' => ['ensemble', 'demain']],
                            'es' => ['sentence' => 'Iré con mi amigo', 'correct' => ['iré', 'con mi amigo'], 'extra' => ['juntos', 'mañana']],
                            'de' => ['sentence' => 'Ich werde mit meinem Freund gehen', 'correct' => ['ich werde', 'mit meinem Freund', 'gehen'], 'extra' => ['zusammen', 'morgen']],
                            'ja' => ['sentence' => '私の友達と行きます', 'correct' => ['私の友達と', '行きます'], 'extra' => ['一緒に', '明日']],
                            'ko' => ['sentence' => '제 친구와 갈 거예요', 'correct' => ['제 친구와', '갈 거예요'], 'extra' => ['함께', '내일']],
                        ],
                    ],
                    'b' => [
                        'words' => ['birlikte', 'sinemaya', 'gideceğim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Together we will go to the cinema', 'correct' => ['together', 'we will go', 'to the cinema'], 'extra' => ['with my friend']],
                            'az' => ['sentence' => 'birlikdə gedəcəyik kinoteatra', 'correct' => ['birlikdə', 'gedəcəyik', 'kinoteatra'], 'extra' => ['dostumla']],
                            'ar' => ['sentence' => 'معا سنذهب إلى السينما', 'correct' => ['معا', 'سنذهب', 'إلى', 'السينما'], 'extra' => ['مع صديقي']],
                            'ru' => ['sentence' => 'вместе мы пойдём в кино', 'correct' => ['вместе', 'мы', 'пойдём', 'в', 'кино'], 'extra' => ['с', 'другом']],
                            'fr' => ['sentence' => 'Ensemble nous irons au cinéma', 'correct' => ['ensemble', 'nous irons', 'au cinéma'], 'extra' => ['avec mon ami']],
                            'es' => ['sentence' => 'Juntos iremos al cine', 'correct' => ['juntos', 'iremos', 'al cine'], 'extra' => ['con mi amigo']],
                            'de' => ['sentence' => 'Zusammen werden wir ins Kino gehen', 'correct' => ['zusammen', 'werden wir', 'ins Kino', 'gehen'], 'extra' => ['mit meinem Freund']],
                            'ja' => ['sentence' => '一緒に映画館へ行きます', 'correct' => ['一緒に', '映画館へ', '行きます'], 'extra' => ['私の友達と']],
                            'ko' => ['sentence' => '함께 영화관에 갈 거예요', 'correct' => ['함께', '영화관에', '갈 거예요'], 'extra' => ['제 친구와']],
                        ],
                    ],
                    'c' => [
                        'words' => ['arkadaşımla', 'birlikte'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Together with my friend', 'correct' => ['together', 'with my friend'], 'extra' => ['I will go', 'tomorrow']],
                            'az' => ['sentence' => 'birlikdə dostumla', 'correct' => ['birlikdə', 'dostumla'], 'extra' => ['gedəcəyəm', 'sabah']],
                            'ar' => ['sentence' => 'معا مع صديقي', 'correct' => ['معا', 'مع صديقي'], 'extra' => ['سأذهب', 'غدا']],
                            'ru' => ['sentence' => 'вместе с другом', 'correct' => ['вместе', 'с', 'другом'], 'extra' => ['я', 'пойду', 'завтра']],
                            'fr' => ['sentence' => 'Ensemble avec mon ami', 'correct' => ['ensemble', 'avec mon ami'], 'extra' => ["j'irai", 'demain']],
                            'es' => ['sentence' => 'Juntos con mi amigo', 'correct' => ['juntos', 'con mi amigo'], 'extra' => ['iré', 'mañana']],
                            'de' => ['sentence' => 'Zusammen mit meinem Freund', 'correct' => ['zusammen', 'mit meinem Freund'], 'extra' => ['gehen', 'morgen']],
                            'ja' => ['sentence' => '私の友達と一緒に', 'correct' => ['私の友達と', '一緒に'], 'extra' => ['行きます', '明日']],
                            'ko' => ['sentence' => '제 친구와 함께', 'correct' => ['제 친구와', '함께'], 'extra' => ['갈 거예요', '내일']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: I Will Do & I Will See', 4,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Yapacağım'], ['tr' => 'Göreceğim']],
                phrases: [
                    'a' => [
                        'words' => ['yarın', 'yapacağım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tomorrow I will do it', 'correct' => ['tomorrow', 'I will do', 'it'], 'extra' => ['I will see']],
                            'az' => ['sentence' => 'sabah edəcəyəm o', 'correct' => ['sabah', 'edəcəyəm', 'o'], 'extra' => ['görəcəyəm']],
                            'ar' => ['sentence' => 'غدا سأفعل هو', 'correct' => ['غدا', 'سأفعل', 'هو'], 'extra' => ['سأرى']],
                            'ru' => ['sentence' => 'завтра я сделаю оно', 'correct' => ['завтра', 'я', 'сделаю', 'оно'], 'extra' => ['увижу']],
                            'fr' => ['sentence' => 'Demain je le ferai', 'correct' => ['demain', 'je', 'le ferai'], 'extra' => ['je verrai']],
                            'es' => ['sentence' => 'Mañana lo haré', 'correct' => ['mañana', 'lo', 'haré'], 'extra' => ['veré']],
                            'de' => ['sentence' => 'Morgen werde ich es machen', 'correct' => ['morgen', 'werde ich', 'es', 'machen'], 'extra' => ['sehen']],
                            'ja' => ['sentence' => '明日します', 'correct' => ['明日', 'します'], 'extra' => ['見ます']],
                            'ko' => ['sentence' => '내일 할 거예요', 'correct' => ['내일', '할 거예요'], 'extra' => ['볼 거예요']],
                        ],
                    ],
                    'b' => [
                        'words' => ['evi', 'göreceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will see the house', 'correct' => ['I will see', 'the house'], 'extra' => ['I will do', 'the park']],
                            'az' => ['sentence' => 'görəcəyəm evdə', 'correct' => ['görəcəyəm', 'evdə'], 'extra' => ['edəcəyəm', 'parkda']],
                            'ar' => ['sentence' => 'سأرى البيت', 'correct' => ['سأرى', 'البيت'], 'extra' => ['سأفعل', 'الحديقة']],
                            'ru' => ['sentence' => 'я увижу доме', 'correct' => ['я', 'увижу', 'доме'], 'extra' => ['сделаю', 'парк']],
                            'fr' => ['sentence' => 'Je verrai la maison', 'correct' => ['je verrai', 'la maison'], 'extra' => ['je ferai', 'le parc']],
                            'es' => ['sentence' => 'Veré la casa', 'correct' => ['veré', 'la casa'], 'extra' => ['haré', 'el parque']],
                            'de' => ['sentence' => 'Ich werde das Haus sehen', 'correct' => ['ich werde', 'das Haus', 'sehen'], 'extra' => ['machen', 'den Park']],
                            'ja' => ['sentence' => '家を見ます', 'correct' => ['家を', '見ます'], 'extra' => ['します', '公園を']],
                            'ko' => ['sentence' => '집을 볼 거예요', 'correct' => ['집을', '볼 거예요'], 'extra' => ['할 거예요', '공원을']],
                        ],
                    ],
                    'c' => [
                        'words' => ['parkı', 'göreceğim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will see the park', 'correct' => ['I will see', 'the park'], 'extra' => ['the house', 'I will do']],
                            'az' => ['sentence' => 'görəcəyəm parkda', 'correct' => ['görəcəyəm', 'parkda'], 'extra' => ['evdə', 'edəcəyəm']],
                            'ar' => ['sentence' => 'سأرى الحديقة', 'correct' => ['سأرى', 'الحديقة'], 'extra' => ['البيت', 'سأفعل']],
                            'ru' => ['sentence' => 'я увижу парк', 'correct' => ['я', 'увижу', 'парк'], 'extra' => ['доме', 'сделаю']],
                            'fr' => ['sentence' => 'Je verrai le parc', 'correct' => ['je verrai', 'le parc'], 'extra' => ['la maison', 'je ferai']],
                            'es' => ['sentence' => 'Veré el parque', 'correct' => ['veré', 'el parque'], 'extra' => ['la casa', 'haré']],
                            'de' => ['sentence' => 'Ich werde den Park sehen', 'correct' => ['ich werde', 'den Park', 'sehen'], 'extra' => ['das Haus', 'machen']],
                            'ja' => ['sentence' => '公園を見ます', 'correct' => ['公園を', '見ます'], 'extra' => ['家を', 'します']],
                            'ko' => ['sentence' => '공원을 볼 거예요', 'correct' => ['공원을', '볼 거예요'], 'extra' => ['집을', '할 거예요']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Making a Plan', 5,
                pictures: [['tr' => 'Sinema', 'img' => 'cinema'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Plan'], ['tr' => 'Ne']],
                phrases: [
                    'a' => [
                        'words' => ['yarın', 'ne', 'yapacağım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What will I do tomorrow', 'correct' => ['what', 'will I do', 'tomorrow'], 'extra' => ['plan']],
                            'az' => ['sentence' => 'nə edəcəyəm sabah', 'correct' => ['nə', 'edəcəyəm', 'sabah'], 'extra' => ['plan']],
                            'ar' => ['sentence' => 'ماذا سأفعل غدا', 'correct' => ['ماذا', 'سأفعل', 'غدا'], 'extra' => ['خطة']],
                            'ru' => ['sentence' => 'что я сделаю завтра', 'correct' => ['что', 'я', 'сделаю', 'завтра'], 'extra' => ['план']],
                            'fr' => ['sentence' => 'Que ferai-je demain', 'correct' => ['que', 'ferai-je', 'demain'], 'extra' => ['plan']],
                            'es' => ['sentence' => 'Qué haré mañana', 'correct' => ['qué', 'haré', 'mañana'], 'extra' => ['plan']],
                            'de' => ['sentence' => 'Was werde ich morgen machen', 'correct' => ['was', 'werde ich', 'morgen', 'machen'], 'extra' => ['Plan']],
                            'ja' => ['sentence' => '明日何をしますか', 'correct' => ['明日', '何を', 'しますか'], 'extra' => ['予定']],
                            'ko' => ['sentence' => '내일 무엇을 할 거예요', 'correct' => ['내일', '무엇을', '할 거예요'], 'extra' => ['계획']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'plan', 'yapacağım'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I will make a plan', 'correct' => ['I will make', 'a', 'plan'], 'extra' => ['what', 'tomorrow']],
                            'az' => ['sentence' => 'edəcəyəm bir plan', 'correct' => ['edəcəyəm', 'bir', 'plan'], 'extra' => ['nə', 'sabah']],
                            'ar' => ['sentence' => 'سأفعل خطة', 'correct' => ['سأفعل', 'خطة'], 'extra' => ['ماذا', 'غدا']],
                            'ru' => ['sentence' => 'я сделаю план', 'correct' => ['я', 'сделаю', 'план'], 'extra' => ['что', 'завтра']],
                            'fr' => ['sentence' => 'Je ferai un plan', 'correct' => ['je ferai', 'un', 'plan'], 'extra' => ['que', 'demain']],
                            'es' => ['sentence' => 'Haré un plan', 'correct' => ['haré', 'un', 'plan'], 'extra' => ['qué', 'mañana']],
                            'de' => ['sentence' => 'Ich werde einen Plan machen', 'correct' => ['ich werde', 'einen', 'Plan', 'machen'], 'extra' => ['was', 'morgen']],
                            'ja' => ['sentence' => '予定を立てます', 'correct' => ['予定を', '立てます'], 'extra' => ['何を', '明日']],
                            'ko' => ['sentence' => '계획을 세울 거예요', 'correct' => ['계획을', '세울 거예요'], 'extra' => ['무엇을', '내일']],
                        ],
                    ],
                    'c' => [
                        'words' => ['haftaya', 'arkadaşımla', 'sinemaya', 'gideceğim'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Next week I will go to the cinema with my friend', 'correct' => ['next week', 'I will go', 'to the cinema', 'with my friend'], 'extra' => ['plan']],
                            'az' => ['sentence' => 'gələn həftə gedəcəyəm kinoteatra dostumla', 'correct' => ['gələn həftə', 'gedəcəyəm', 'kinoteatra', 'dostumla'], 'extra' => ['plan']],
                            'ar' => ['sentence' => 'الأسبوع القادم سأذهب إلى السينما مع صديقي', 'correct' => ['الأسبوع القادم', 'سأذهب', 'إلى', 'السينما', 'مع صديقي'], 'extra' => ['خطة']],
                            'ru' => ['sentence' => 'на следующей неделе я пойду в кино с другом', 'correct' => ['на следующей неделе', 'я', 'пойду', 'в', 'кино', 'с', 'другом'], 'extra' => ['план']],
                            'fr' => ['sentence' => "La semaine prochaine j'irai au cinéma avec mon ami", 'correct' => ['la semaine prochaine', "j'irai", 'au cinéma', 'avec mon ami'], 'extra' => ['plan']],
                            'es' => ['sentence' => 'La próxima semana iré al cine con mi amigo', 'correct' => ['la próxima semana', 'iré', 'al cine', 'con mi amigo'], 'extra' => ['plan']],
                            'de' => ['sentence' => 'Nächste Woche werde ich mit meinem Freund ins Kino gehen', 'correct' => ['nächste Woche', 'werde ich', 'mit meinem Freund', 'ins Kino', 'gehen'], 'extra' => ['Plan']],
                            'ja' => ['sentence' => '来週私の友達と映画館へ行きます', 'correct' => ['来週', '私の友達と', '映画館へ', '行きます'], 'extra' => ['予定']],
                            'ko' => ['sentence' => '다음 주에 제 친구와 영화관에 갈 거예요', 'correct' => ['다음 주에', '제 친구와', '영화관에', '갈 거예요'], 'extra' => ['계획']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
