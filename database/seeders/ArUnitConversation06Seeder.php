<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitConversation06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'سينما' => 'cinema', 'حديقة' => 'park', 'قهوة' => 'coffee', 'شاي' => 'tea',
        'ماء' => 'water', 'حليب' => 'milk', 'خبز' => 'bread', 'جبن' => 'cheese',
    ];

    /**
     * Arabic Conversation Unit 6.
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
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Future Plans', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Tomorrow & I Will Go', 1,
                pictures: [['ar' => 'سينما', 'img' => 'cinema'], ['ar' => 'حديقة', 'img' => 'park']],
                plain: [['ar' => 'غدا'], ['ar' => 'سأذهب']],
                phrases: [
                    'a' => [
                        'words' => ['غدا', 'سأذهب', 'إلى', 'السينما'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Tomorrow I will go to the cinema', 'correct' => ['tomorrow', 'I will go', 'to the cinema'], 'extra' => ['to the park']],
                            'az' => ['sentence' => 'sabah gedəcəyəm kinoteatra', 'correct' => ['sabah', 'gedəcəyəm', 'kinoteatra'], 'extra' => ['parka']],
                            'fr' => ['sentence' => "Demain j'irai au cinéma", 'correct' => ['demain', "j'irai", 'au cinéma'], 'extra' => ['au parc']],
                            'es' => ['sentence' => 'Mañana iré al cine', 'correct' => ['mañana', 'iré', 'al cine'], 'extra' => ['al parque']],
                            'de' => ['sentence' => 'Morgen werde ich ins Kino gehen', 'correct' => ['morgen', 'werde ich', 'ins Kino', 'gehen'], 'extra' => ['in den Park']],
                            'ja' => ['sentence' => '明日映画館へ行きます', 'correct' => ['明日', '映画館へ', '行きます'], 'extra' => ['公園へ']],
                            'ko' => ['sentence' => '내일 영화관에 갈 거예요', 'correct' => ['내일', '영화관에', '갈 거예요'], 'extra' => ['공원에']],
                            'tr' => ['sentence' => 'yarın sinemaya gideceğim', 'correct' => ['yarın', 'sinemaya', 'gideceğim'], 'extra' => ['sinema', 'park']],
                            'ru' => ['sentence' => 'завтра я пойду в кино', 'correct' => ['завтра', 'я', 'пойду', 'в', 'кино'], 'extra' => ['парк']],
                        ],
                    ],
                    'b' => [
                        'words' => ['سأذهب', 'إلى', 'الحديقة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I will go to the park', 'correct' => ['I will go', 'to the park'], 'extra' => ['to the cinema', 'tomorrow']],
                            'az' => ['sentence' => 'gedəcəyəm parka', 'correct' => ['gedəcəyəm', 'parka'], 'extra' => ['kinoteatra', 'sabah']],
                            'fr' => ['sentence' => "J'irai au parc", 'correct' => ["j'irai", 'au parc'], 'extra' => ['au cinéma', 'demain']],
                            'es' => ['sentence' => 'Iré al parque', 'correct' => ['iré', 'al parque'], 'extra' => ['al cine', 'mañana']],
                            'de' => ['sentence' => 'Ich werde in den Park gehen', 'correct' => ['ich werde', 'in den Park', 'gehen'], 'extra' => ['ins Kino', 'morgen']],
                            'ja' => ['sentence' => '公園へ行きます', 'correct' => ['公園へ', '行きます'], 'extra' => ['映画館へ', '明日']],
                            'ko' => ['sentence' => '공원에 갈 거예요', 'correct' => ['공원에', '갈 거예요'], 'extra' => ['영화관에', '내일']],
                            'tr' => ['sentence' => 'parka gideceğim', 'correct' => ['parka', 'gideceğim'], 'extra' => ['yarın', 'sinema']],
                            'ru' => ['sentence' => 'я пойду в парк', 'correct' => ['я', 'пойду', 'в', 'парк'], 'extra' => ['кино', 'завтра']],
                        ],
                    ],
                    'c' => [
                        'words' => ['سينما', 'و', 'حديقة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A cinema and a park', 'correct' => ['a', 'cinema', 'and', 'a', 'park'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'bir kinoteatr və bir park', 'correct' => ['bir', 'kinoteatr', 'və', 'bir', 'park'], 'extra' => ['sabah']],
                            'fr' => ['sentence' => 'Un cinéma et un parc', 'correct' => ['un', 'cinéma', 'et', 'un', 'parc'], 'extra' => ['demain']],
                            'es' => ['sentence' => 'Un cine y un parque', 'correct' => ['un', 'cine', 'y', 'un', 'parque'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Ein Kino und ein Park', 'correct' => ['ein', 'Kino', 'und', 'ein', 'Park'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '映画館と公園', 'correct' => ['映画館', 'と', '公園'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '영화관과 공원', 'correct' => ['영화관과', '공원'], 'extra' => ['내일']],
                            'tr' => ['sentence' => 'sinema ve park', 'correct' => ['sinema', 've', 'park'], 'extra' => ['yarın', 'gideceğim']],
                            'ru' => ['sentence' => 'кино и парк', 'correct' => ['кино', 'и', 'парк'], 'extra' => ['завтра']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Will Come & Next Week', 2,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'الأسبوع القادم'], ['ar' => 'سآتي']],
                phrases: [
                    'a' => [
                        'words' => ['الأسبوع القادم', 'سآتي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Next week I will come', 'correct' => ['next week', 'I will come'], 'extra' => ['I will go', 'tomorrow']],
                            'az' => ['sentence' => 'gələn həftə gələcəyəm', 'correct' => ['gələn həftə', 'gələcəyəm'], 'extra' => ['gedəcəyəm', 'sabah']],
                            'fr' => ['sentence' => 'La semaine prochaine je viendrai', 'correct' => ['la semaine prochaine', 'je viendrai'], 'extra' => ["j'irai", 'demain']],
                            'es' => ['sentence' => 'La próxima semana vendré', 'correct' => ['la próxima semana', 'vendré'], 'extra' => ['iré', 'mañana']],
                            'de' => ['sentence' => 'Nächste Woche werde ich kommen', 'correct' => ['nächste Woche', 'werde ich', 'kommen'], 'extra' => ['gehen', 'morgen']],
                            'ja' => ['sentence' => '来週来ます', 'correct' => ['来週', '来ます'], 'extra' => ['行きます', '明日']],
                            'ko' => ['sentence' => '다음 주에 올 거예요', 'correct' => ['다음 주에', '올 거예요'], 'extra' => ['갈 거예요', '내일']],
                            'tr' => ['sentence' => 'haftaya geleceğim', 'correct' => ['haftaya', 'geleceğim'], 'extra' => ['ev', 'okul']],
                            'ru' => ['sentence' => 'на следующей неделе я приду', 'correct' => ['на следующей неделе', 'я', 'приду'], 'extra' => ['пойду', 'завтра']],
                        ],
                    ],
                    'b' => [
                        'words' => ['سآتي', 'في البيت'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will come home', 'correct' => ['I will come', 'home'], 'extra' => ['to school', 'next week']],
                            'az' => ['sentence' => 'gələcəyəm evdəyəm', 'correct' => ['gələcəyəm', 'evdəyəm'], 'extra' => ['məktəbə', 'gələn həftə']],
                            'fr' => ['sentence' => 'Je viendrai à la maison', 'correct' => ['je viendrai', 'à la maison'], 'extra' => ["à l'école", 'la semaine prochaine']],
                            'es' => ['sentence' => 'Vendré a casa', 'correct' => ['vendré', 'a casa'], 'extra' => ['a la escuela', 'la próxima semana']],
                            'de' => ['sentence' => 'Ich werde nach Hause kommen', 'correct' => ['ich werde', 'nach Hause', 'kommen'], 'extra' => ['zur Schule', 'nächste Woche']],
                            'ja' => ['sentence' => '家へ来ます', 'correct' => ['家へ', '来ます'], 'extra' => ['学校へ', '来週']],
                            'ko' => ['sentence' => '집에 올 거예요', 'correct' => ['집에', '올 거예요'], 'extra' => ['학교에', '다음 주에']],
                            'tr' => ['sentence' => 'eve geleceğim', 'correct' => ['eve', 'geleceğim'], 'extra' => ['haftaya', 'ev']],
                            'ru' => ['sentence' => 'я приду дома', 'correct' => ['я', 'приду', 'дома'], 'extra' => ['в', 'школу', 'на следующей неделе']],
                        ],
                    ],
                    'c' => [
                        'words' => ['سأذهب', 'إلى المدرسة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will go to school', 'correct' => ['I will go', 'to school'], 'extra' => ['home', 'next week']],
                            'az' => ['sentence' => 'gedəcəyəm məktəbə', 'correct' => ['gedəcəyəm', 'məktəbə'], 'extra' => ['evdəyəm', 'gələn həftə']],
                            'fr' => ['sentence' => "J'irai à l'école", 'correct' => ["j'irai", "à l'école"], 'extra' => ['à la maison', 'la semaine prochaine']],
                            'es' => ['sentence' => 'Iré a la escuela', 'correct' => ['iré', 'a la escuela'], 'extra' => ['a casa', 'la próxima semana']],
                            'de' => ['sentence' => 'Ich werde zur Schule gehen', 'correct' => ['ich werde', 'zur Schule', 'gehen'], 'extra' => ['nach Hause', 'nächste Woche']],
                            'ja' => ['sentence' => '学校へ行きます', 'correct' => ['学校へ', '行きます'], 'extra' => ['家へ', '来週']],
                            'ko' => ['sentence' => '학교에 갈 거예요', 'correct' => ['학교에', '갈 거예요'], 'extra' => ['집에', '다음 주에']],
                            'tr' => ['sentence' => 'okula gideceğim', 'correct' => ['okula', 'gideceğim'], 'extra' => ['geleceğim', 'haftaya']],
                            'ru' => ['sentence' => 'я пойду в школу', 'correct' => ['я', 'пойду', 'в', 'школу'], 'extra' => ['дома', 'на следующей неделе']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Together & With My Friend', 3,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'سأذهب'], ['ar' => 'مع صديقي']],
                phrases: [
                    'a' => [
                        'words' => ['سأذهب', 'مع صديقي'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will go with my friend', 'correct' => ['I will go', 'with my friend'], 'extra' => ['together', 'tomorrow']],
                            'az' => ['sentence' => 'gedəcəyəm dostumla', 'correct' => ['gedəcəyəm', 'dostumla'], 'extra' => ['birlikdə', 'sabah']],
                            'fr' => ['sentence' => "J'irai avec mon ami", 'correct' => ["j'irai", 'avec mon ami'], 'extra' => ['ensemble', 'demain']],
                            'es' => ['sentence' => 'Iré con mi amigo', 'correct' => ['iré', 'con mi amigo'], 'extra' => ['juntos', 'mañana']],
                            'de' => ['sentence' => 'Ich werde mit meinem Freund gehen', 'correct' => ['ich werde', 'mit meinem Freund', 'gehen'], 'extra' => ['zusammen', 'morgen']],
                            'ja' => ['sentence' => '私の友達と行きます', 'correct' => ['私の友達と', '行きます'], 'extra' => ['一緒に', '明日']],
                            'ko' => ['sentence' => '제 친구와 갈 거예요', 'correct' => ['제 친구와', '갈 거예요'], 'extra' => ['함께', '내일']],
                            'tr' => ['sentence' => 'arkadaşımla gideceğim', 'correct' => ['arkadaşımla', 'gideceğim'], 'extra' => ['birlikte', 'arkadaş']],
                            'ru' => ['sentence' => 'я пойду с другом', 'correct' => ['я', 'пойду', 'с', 'другом'], 'extra' => ['вместе', 'завтра']],
                        ],
                    ],
                    'b' => [
                        'words' => ['معا', 'سنذهب', 'إلى', 'السينما'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Together we will go to the cinema', 'correct' => ['together', 'we will go', 'to the cinema'], 'extra' => ['with my friend']],
                            'az' => ['sentence' => 'birlikdə gedəcəyik kinoteatra', 'correct' => ['birlikdə', 'gedəcəyik', 'kinoteatra'], 'extra' => ['dostumla']],
                            'fr' => ['sentence' => 'Ensemble nous irons au cinéma', 'correct' => ['ensemble', 'nous irons', 'au cinéma'], 'extra' => ['avec mon ami']],
                            'es' => ['sentence' => 'Juntos iremos al cine', 'correct' => ['juntos', 'iremos', 'al cine'], 'extra' => ['con mi amigo']],
                            'de' => ['sentence' => 'Zusammen werden wir ins Kino gehen', 'correct' => ['zusammen', 'werden wir', 'ins Kino', 'gehen'], 'extra' => ['mit meinem Freund']],
                            'ja' => ['sentence' => '一緒に映画館へ行きます', 'correct' => ['一緒に', '映画館へ', '行きます'], 'extra' => ['私の友達と']],
                            'ko' => ['sentence' => '함께 영화관에 갈 거예요', 'correct' => ['함께', '영화관에', '갈 거예요'], 'extra' => ['제 친구와']],
                            'tr' => ['sentence' => 'birlikte sinemaya gideceğim', 'correct' => ['birlikte', 'sinemaya', 'gideceğim'], 'extra' => ['arkadaşımla', 'arkadaş']],
                            'ru' => ['sentence' => 'вместе мы пойдём в кино', 'correct' => ['вместе', 'мы', 'пойдём', 'в', 'кино'], 'extra' => ['с', 'другом']],
                        ],
                    ],
                    'c' => [
                        'words' => ['معا', 'مع صديقي'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Together with my friend', 'correct' => ['together', 'with my friend'], 'extra' => ['I will go', 'tomorrow']],
                            'az' => ['sentence' => 'birlikdə dostumla', 'correct' => ['birlikdə', 'dostumla'], 'extra' => ['gedəcəyəm', 'sabah']],
                            'fr' => ['sentence' => 'Ensemble avec mon ami', 'correct' => ['ensemble', 'avec mon ami'], 'extra' => ["j'irai", 'demain']],
                            'es' => ['sentence' => 'Juntos con mi amigo', 'correct' => ['juntos', 'con mi amigo'], 'extra' => ['iré', 'mañana']],
                            'de' => ['sentence' => 'Zusammen mit meinem Freund', 'correct' => ['zusammen', 'mit meinem Freund'], 'extra' => ['gehen', 'morgen']],
                            'ja' => ['sentence' => '私の友達と一緒に', 'correct' => ['私の友達と', '一緒に'], 'extra' => ['行きます', '明日']],
                            'ko' => ['sentence' => '제 친구와 함께', 'correct' => ['제 친구와', '함께'], 'extra' => ['갈 거예요', '내일']],
                            'tr' => ['sentence' => 'arkadaşımla birlikte', 'correct' => ['arkadaşımla', 'birlikte'], 'extra' => ['arkadaş', 'sinema']],
                            'ru' => ['sentence' => 'вместе с другом', 'correct' => ['вместе', 'с', 'другом'], 'extra' => ['я', 'пойду', 'завтра']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: I Will Do & I Will See', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'غدا'], ['ar' => 'سأفعل']],
                phrases: [
                    'a' => [
                        'words' => ['غدا', 'سأفعل', 'هو'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tomorrow I will do it', 'correct' => ['tomorrow', 'I will do', 'it'], 'extra' => ['I will see']],
                            'az' => ['sentence' => 'sabah edəcəyəm o', 'correct' => ['sabah', 'edəcəyəm', 'o'], 'extra' => ['görəcəyəm']],
                            'fr' => ['sentence' => 'Demain je le ferai', 'correct' => ['demain', 'je', 'le ferai'], 'extra' => ['je verrai']],
                            'es' => ['sentence' => 'Mañana lo haré', 'correct' => ['mañana', 'lo', 'haré'], 'extra' => ['veré']],
                            'de' => ['sentence' => 'Morgen werde ich es machen', 'correct' => ['morgen', 'werde ich', 'es', 'machen'], 'extra' => ['sehen']],
                            'ja' => ['sentence' => '明日します', 'correct' => ['明日', 'します'], 'extra' => ['見ます']],
                            'ko' => ['sentence' => '내일 할 거예요', 'correct' => ['내일', '할 거예요'], 'extra' => ['볼 거예요']],
                            'tr' => ['sentence' => 'yarın yapacağım', 'correct' => ['yarın', 'yapacağım'], 'extra' => ['göreceğim', 'kitap']],
                            'ru' => ['sentence' => 'завтра я сделаю оно', 'correct' => ['завтра', 'я', 'сделаю', 'оно'], 'extra' => ['увижу']],
                        ],
                    ],
                    'b' => [
                        'words' => ['سأرى', 'البيت'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will see the house', 'correct' => ['I will see', 'the house'], 'extra' => ['I will do', 'the park']],
                            'az' => ['sentence' => 'görəcəyəm evdə', 'correct' => ['görəcəyəm', 'evdə'], 'extra' => ['edəcəyəm', 'parkda']],
                            'fr' => ['sentence' => 'Je verrai la maison', 'correct' => ['je verrai', 'la maison'], 'extra' => ['je ferai', 'le parc']],
                            'es' => ['sentence' => 'Veré la casa', 'correct' => ['veré', 'la casa'], 'extra' => ['haré', 'el parque']],
                            'de' => ['sentence' => 'Ich werde das Haus sehen', 'correct' => ['ich werde', 'das Haus', 'sehen'], 'extra' => ['machen', 'den Park']],
                            'ja' => ['sentence' => '家を見ます', 'correct' => ['家を', '見ます'], 'extra' => ['します', '公園を']],
                            'ko' => ['sentence' => '집을 볼 거예요', 'correct' => ['집을', '볼 거예요'], 'extra' => ['할 거예요', '공원을']],
                            'tr' => ['sentence' => 'evi göreceğim', 'correct' => ['evi', 'göreceğim'], 'extra' => ['yapacağım', 'kitap']],
                            'ru' => ['sentence' => 'я увижу доме', 'correct' => ['я', 'увижу', 'доме'], 'extra' => ['сделаю', 'парк']],
                        ],
                    ],
                    'c' => [
                        'words' => ['سأرى', 'الحديقة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I will see the park', 'correct' => ['I will see', 'the park'], 'extra' => ['the house', 'I will do']],
                            'az' => ['sentence' => 'görəcəyəm parkda', 'correct' => ['görəcəyəm', 'parkda'], 'extra' => ['evdə', 'edəcəyəm']],
                            'fr' => ['sentence' => 'Je verrai le parc', 'correct' => ['je verrai', 'le parc'], 'extra' => ['la maison', 'je ferai']],
                            'es' => ['sentence' => 'Veré el parque', 'correct' => ['veré', 'el parque'], 'extra' => ['la casa', 'haré']],
                            'de' => ['sentence' => 'Ich werde den Park sehen', 'correct' => ['ich werde', 'den Park', 'sehen'], 'extra' => ['das Haus', 'machen']],
                            'ja' => ['sentence' => '公園を見ます', 'correct' => ['公園を', '見ます'], 'extra' => ['家を', 'します']],
                            'ko' => ['sentence' => '공원을 볼 거예요', 'correct' => ['공원을', '볼 거예요'], 'extra' => ['집을', '할 거예요']],
                            'tr' => ['sentence' => 'parkı göreceğim', 'correct' => ['parkı', 'göreceğim'], 'extra' => ['yapacağım', 'kitap']],
                            'ru' => ['sentence' => 'я увижу парк', 'correct' => ['я', 'увижу', 'парк'], 'extra' => ['доме', 'сделаю']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Making a Plan', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'ماذا'], ['ar' => 'سأفعل']],
                phrases: [
                    'a' => [
                        'words' => ['ماذا', 'سأفعل', 'غدا'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What will I do tomorrow', 'correct' => ['what', 'will I do', 'tomorrow'], 'extra' => ['plan']],
                            'az' => ['sentence' => 'nə edəcəyəm sabah', 'correct' => ['nə', 'edəcəyəm', 'sabah'], 'extra' => ['plan']],
                            'fr' => ['sentence' => 'Que ferai-je demain', 'correct' => ['que', 'ferai-je', 'demain'], 'extra' => ['plan']],
                            'es' => ['sentence' => 'Qué haré mañana', 'correct' => ['qué', 'haré', 'mañana'], 'extra' => ['plan']],
                            'de' => ['sentence' => 'Was werde ich morgen machen', 'correct' => ['was', 'werde ich', 'morgen', 'machen'], 'extra' => ['Plan']],
                            'ja' => ['sentence' => '明日何をしますか', 'correct' => ['明日', '何を', 'しますか'], 'extra' => ['予定']],
                            'ko' => ['sentence' => '내일 무엇을 할 거예요', 'correct' => ['내일', '무엇을', '할 거예요'], 'extra' => ['계획']],
                            'tr' => ['sentence' => 'yarın ne yapacağım', 'correct' => ['yarın', 'ne', 'yapacağım'], 'extra' => ['plan', 'sinema']],
                            'ru' => ['sentence' => 'что я сделаю завтра', 'correct' => ['что', 'я', 'сделаю', 'завтра'], 'extra' => ['план']],
                        ],
                    ],
                    'b' => [
                        'words' => ['سأفعل', 'خطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I will make a plan', 'correct' => ['I will make', 'a', 'plan'], 'extra' => ['what', 'tomorrow']],
                            'az' => ['sentence' => 'edəcəyəm bir plan', 'correct' => ['edəcəyəm', 'bir', 'plan'], 'extra' => ['nə', 'sabah']],
                            'fr' => ['sentence' => 'Je ferai un plan', 'correct' => ['je ferai', 'un', 'plan'], 'extra' => ['que', 'demain']],
                            'es' => ['sentence' => 'Haré un plan', 'correct' => ['haré', 'un', 'plan'], 'extra' => ['qué', 'mañana']],
                            'de' => ['sentence' => 'Ich werde einen Plan machen', 'correct' => ['ich werde', 'einen', 'Plan', 'machen'], 'extra' => ['was', 'morgen']],
                            'ja' => ['sentence' => '予定を立てます', 'correct' => ['予定を', '立てます'], 'extra' => ['何を', '明日']],
                            'ko' => ['sentence' => '계획을 세울 거예요', 'correct' => ['계획을', '세울 거예요'], 'extra' => ['무엇을', '내일']],
                            'tr' => ['sentence' => 'bir plan yapacağım', 'correct' => ['bir', 'plan', 'yapacağım'], 'extra' => ['ne', 'sinema']],
                            'ru' => ['sentence' => 'я сделаю план', 'correct' => ['я', 'сделаю', 'план'], 'extra' => ['что', 'завтра']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الأسبوع القادم', 'سأذهب', 'إلى', 'السينما', 'مع صديقي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Next week I will go to the cinema with my friend', 'correct' => ['next week', 'I will go', 'to the cinema', 'with my friend'], 'extra' => ['plan']],
                            'az' => ['sentence' => 'gələn həftə gedəcəyəm kinoteatra dostumla', 'correct' => ['gələn həftə', 'gedəcəyəm', 'kinoteatra', 'dostumla'], 'extra' => ['plan']],
                            'fr' => ['sentence' => "La semaine prochaine j'irai au cinéma avec mon ami", 'correct' => ['la semaine prochaine', "j'irai", 'au cinéma', 'avec mon ami'], 'extra' => ['plan']],
                            'es' => ['sentence' => 'La próxima semana iré al cine con mi amigo', 'correct' => ['la próxima semana', 'iré', 'al cine', 'con mi amigo'], 'extra' => ['plan']],
                            'de' => ['sentence' => 'Nächste Woche werde ich mit meinem Freund ins Kino gehen', 'correct' => ['nächste Woche', 'werde ich', 'mit meinem Freund', 'ins Kino', 'gehen'], 'extra' => ['Plan']],
                            'ja' => ['sentence' => '来週私の友達と映画館へ行きます', 'correct' => ['来週', '私の友達と', '映画館へ', '行きます'], 'extra' => ['予定']],
                            'ko' => ['sentence' => '다음 주에 제 친구와 영화관에 갈 거예요', 'correct' => ['다음 주에', '제 친구와', '영화관에', '갈 거예요'], 'extra' => ['계획']],
                            'tr' => ['sentence' => 'haftaya arkadaşımla sinemaya gideceğim', 'correct' => ['haftaya', 'arkadaşımla', 'sinemaya', 'gideceğim'], 'extra' => ['plan', 'ne']],
                            'ru' => ['sentence' => 'на следующей неделе я пойду в кино с другом', 'correct' => ['на следующей неделе', 'я', 'пойду', 'в', 'кино', 'с', 'другом'], 'extra' => ['план']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
