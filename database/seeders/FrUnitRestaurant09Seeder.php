<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'Fourchette' => 'fork', 'Couteau' => 'knife', 'Cuillère' => 'spoon',
        'Assiette' => 'plate', 'Verre' => 'glass', 'Menu' => 'menu',
        'Riz' => 'rice', 'Soupe' => 'soup',
    ];

    /**
     * French Chapter 3, Unit 9 — asking for things at the table.
     *
     * Everything a learner might need to ask for mid-meal, wrapped in the two
     * polite frames that work for all of it: "apportez-moi ..." and
     * "pouvez-vous ...". The cutlery words are the only genuinely new nouns, so
     * most of the effort lands on the request itself.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: At the Table', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fork and Knife', 1,
                pictures: [['fr' => 'Fourchette', 'img' => 'fork'], ['fr' => 'Couteau', 'img' => 'knife']],
                plain: [['fr' => 'Apportez-moi'], ['fr' => 'Serviette']],
                phrases: [
                    'a' => [
                        'words' => ['apportez-moi', 'une', 'fourchette'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Bring me a fork', 'correct' => ['bring me', 'a', 'fork'], 'extra' => ['napkin', 'knife']],
                            'az' => ['sentence' => 'mənə gətir bir çəngəl', 'correct' => ['mənə gətir', 'bir', 'çəngəl'], 'extra' => ['salfet', 'bıçaq']],
                            'ar' => ['sentence' => 'أحضر لي شوكة', 'correct' => ['أحضر لي', 'شوكة'], 'extra' => ['منديل', 'سكين']],
                            'ru' => ['sentence' => 'принесите мне вилка', 'correct' => ['принесите мне', 'вилка'], 'extra' => ['салфетка', 'нож']],
                            'es' => ['sentence' => 'Tráigame un tenedor', 'correct' => ['tráigame', 'un', 'tenedor'], 'extra' => ['servilleta', 'cuchillo']],
                            'de' => ['sentence' => 'Bringen Sie mir eine Gabel', 'correct' => ['bringen Sie mir', 'eine', 'Gabel'], 'extra' => ['Serviette', 'Messer']],
                            'ja' => ['sentence' => 'フォークを持ってきてください', 'correct' => ['フォーク', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '포크를 가져다주세요', 'correct' => ['포크를', '가져다주세요'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bana bir çatal getirin', 'correct' => ['bana', 'bir', 'çatal', 'getirin'], 'extra' => ['peçete', 'bıçak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'couteau', 'et', 'une', 'serviette'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A knife and a napkin', 'correct' => ['a', 'knife', 'and', 'a', 'napkin'], 'extra' => ['bring me', 'fork']],
                            'az' => ['sentence' => 'bir bıçaq və bir salfet', 'correct' => ['bir', 'bıçaq', 'və', 'bir', 'salfet'], 'extra' => ['mənə gətir', 'çəngəl']],
                            'ar' => ['sentence' => 'سكين و منديل', 'correct' => ['سكين', 'و', 'منديل'], 'extra' => ['أحضر لي', 'شوكة']],
                            'ru' => ['sentence' => 'нож и салфетка', 'correct' => ['нож', 'и', 'салфетка'], 'extra' => ['принесите мне', 'вилка']],
                            'es' => ['sentence' => 'Un cuchillo y una servilleta', 'correct' => ['un', 'cuchillo', 'y', 'una', 'servilleta'], 'extra' => ['tráigame', 'tenedor']],
                            'de' => ['sentence' => 'Ein Messer und eine Serviette', 'correct' => ['ein', 'Messer', 'und', 'eine', 'Serviette'], 'extra' => ['bringen Sie mir', 'Gabel']],
                            'ja' => ['sentence' => 'ナイフとナプキン', 'correct' => ['ナイフ', 'と', 'ナプキン'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '나이프와 냅킨', 'correct' => ['나이프와', '냅킨'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'bir bıçak ve bir peçete', 'correct' => ['bir', 'bıçak', 've', 'bir', 'peçete'], 'extra' => ['bana getirin', 'çatal']],
                        ],
                    ],
                    'c' => [
                        'words' => ['apportez-moi', 'un', 'couteau', 'propre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Bring me a clean knife', 'correct' => ['bring me', 'a', 'clean', 'knife'], 'extra' => ['napkin', 'fork']],
                            'az' => ['sentence' => 'mənə gətir bir təmiz bıçaq', 'correct' => ['mənə gətir', 'bir', 'təmiz', 'bıçaq'], 'extra' => ['salfet', 'çəngəl']],
                            'ar' => ['sentence' => 'أحضر لي نظيف سكين', 'correct' => ['أحضر لي', 'نظيف', 'سكين'], 'extra' => ['منديل', 'شوكة']],
                            'ru' => ['sentence' => 'принесите мне чистый нож', 'correct' => ['принесите мне', 'чистый', 'нож'], 'extra' => ['салфетка', 'вилка']],
                            'es' => ['sentence' => 'Tráigame un cuchillo limpio', 'correct' => ['tráigame', 'un', 'cuchillo', 'limpio'], 'extra' => ['servilleta', 'tenedor']],
                            'de' => ['sentence' => 'Bringen Sie mir ein sauberes Messer', 'correct' => ['bringen Sie mir', 'ein', 'sauber', 'Messer'], 'extra' => ['Serviette', 'Gabel']],
                            'ja' => ['sentence' => 'きれいなナイフを持ってきてください', 'correct' => ['きれいな', 'ナイフ', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '깨끗한 나이프를 가져다주세요', 'correct' => ['깨끗한', '나이프를', '가져다주세요'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bana temiz bir bıçak getirin', 'correct' => ['bana', 'temiz', 'bir', 'bıçak', 'getirin'], 'extra' => ['peçete', 'çatal']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Spoon and Plate', 2,
                pictures: [['fr' => 'Cuillère', 'img' => 'spoon'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Pouvez-vous'], ['fr' => 'Nappe']],
                phrases: [
                    'a' => [
                        'words' => ['pouvez-vous', 'apporter', 'une', 'cuillère'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Can you bring a spoon', 'correct' => ['can you', 'bring', 'a', 'spoon'], 'extra' => ['tablecloth', 'plate']],
                            'az' => ['sentence' => 'bacarıram sən gətir bir qaşıq', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'qaşıq'], 'extra' => ['süfrə', 'boşqab']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر ملعقة', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'ملعقة'], 'extra' => ['مفرش', 'صحن']],
                            'ru' => ['sentence' => 'могу ты принеси ложка', 'correct' => ['могу', 'ты', 'принеси', 'ложка'], 'extra' => ['скатерть', 'тарелка']],
                            'es' => ['sentence' => 'Puede usted traer una cuchara', 'correct' => ['puede usted', 'traer', 'una', 'cuchara'], 'extra' => ['mantel', 'plato']],
                            'de' => ['sentence' => 'Können Sie einen Löffel bringen', 'correct' => ['können Sie', 'einen', 'Löffel', 'bringen'], 'extra' => ['Tischdecke', 'Teller']],
                            'ja' => ['sentence' => 'スプーンを持ってきてもらえますか', 'correct' => ['スプーン', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['テーブルクロス']],
                            'ko' => ['sentence' => '숟가락을 가져올 수 있나요', 'correct' => ['숟가락을', '가져올', '수', '있나요'], 'extra' => ['식탁보']],
                            'tr' => ['sentence' => 'bir kaşık getirebilir misiniz', 'correct' => ['bir', 'kaşık', 'getirebilir', 'misiniz'], 'extra' => ['masa örtüsü', 'tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'assiette', 'sur', 'la', 'nappe'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A plate on the tablecloth', 'correct' => ['a', 'plate', 'on', 'the', 'tablecloth'], 'extra' => ['can you', 'spoon']],
                            'az' => ['sentence' => 'bir boşqab üzərində süfrə', 'correct' => ['bir', 'boşqab', 'üzərində', 'süfrə'], 'extra' => ['bacarıram', 'sən', 'qaşıq']],
                            'ar' => ['sentence' => 'صحن على مفرش', 'correct' => ['صحن', 'على', 'مفرش'], 'extra' => ['أستطيع', 'أنت', 'ملعقة']],
                            'ru' => ['sentence' => 'тарелка на скатерть', 'correct' => ['тарелка', 'на', 'скатерть'], 'extra' => ['могу', 'ты', 'ложка']],
                            'es' => ['sentence' => 'Un plato sobre el mantel', 'correct' => ['un', 'plato', 'sobre', 'el', 'mantel'], 'extra' => ['puede usted', 'cuchara']],
                            'de' => ['sentence' => 'Ein Teller auf der Tischdecke', 'correct' => ['ein', 'Teller', 'auf', 'der', 'Tischdecke'], 'extra' => ['können Sie', 'Löffel']],
                            'ja' => ['sentence' => 'テーブルクロスの上のお皿', 'correct' => ['テーブルクロス', 'の', '上', 'の', 'お皿'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '식탁보 위의 접시', 'correct' => ['식탁보', '위의', '접시'], 'extra' => ['숟가락']],
                            'tr' => ['sentence' => 'masa örtüsünde bir tabak', 'correct' => ['masa', 'örtüsünde', 'bir', 'tabak'], 'extra' => ['yapabilir misiniz', 'kaşık']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pouvez-vous', 'apporter', 'une', 'assiette', 'propre'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Can you bring a clean plate', 'correct' => ['can you', 'bring', 'a', 'clean', 'plate'], 'extra' => ['tablecloth']],
                            'az' => ['sentence' => 'bacarıram sən gətir bir təmiz boşqab', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'təmiz', 'boşqab'], 'extra' => ['süfrə']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر نظيف صحن', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'نظيف', 'صحن'], 'extra' => ['مفرش']],
                            'ru' => ['sentence' => 'могу ты принеси чистый тарелка', 'correct' => ['могу', 'ты', 'принеси', 'чистый', 'тарелка'], 'extra' => ['скатерть']],
                            'es' => ['sentence' => 'Puede usted traer un plato limpio', 'correct' => ['puede usted', 'traer', 'un', 'plato', 'limpio'], 'extra' => ['mantel']],
                            'de' => ['sentence' => 'Können Sie einen sauberen Teller bringen', 'correct' => ['können Sie', 'bringen', 'einen', 'sauber', 'Teller'], 'extra' => ['Tischdecke']],
                            'ja' => ['sentence' => 'きれいなお皿を持ってきてもらえますか', 'correct' => ['きれいな', 'お皿', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['テーブルクロス']],
                            'ko' => ['sentence' => '깨끗한 접시를 가져올 수 있나요', 'correct' => ['깨끗한', '접시를', '가져올', '수', '있나요'], 'extra' => ['식탁보']],
                            'tr' => ['sentence' => 'temiz bir tabak getirebilir misiniz', 'correct' => ['temiz', 'bir', 'tabak', 'getirebilir', 'misiniz'], 'extra' => ['masa örtüsü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Here It Is', 3,
                pictures: [['fr' => 'Verre', 'img' => 'glass'], ['fr' => 'Menu', 'img' => 'menu']],
                plain: [['fr' => 'Je peux'], ['fr' => 'Voici']],
                phrases: [
                    'a' => [
                        'words' => ['je peux', 'payer', 'le', 'verre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I can pay for the glass', 'correct' => ['I can', 'to pay', 'the', 'glass'], 'extra' => ['here is', 'menu']],
                            'az' => ['sentence' => 'mən bacarıram ödəmək stəkan', 'correct' => ['mən', 'bacarıram', 'ödəmək', 'stəkan'], 'extra' => ['burada', 'menyu']],
                            'ar' => ['sentence' => 'أنا أستطيع الدفع كوب', 'correct' => ['أنا', 'أستطيع', 'الدفع', 'كوب'], 'extra' => ['هنا', 'قائمة الطعام']],
                            'ru' => ['sentence' => 'я могу платить стакан', 'correct' => ['я', 'могу', 'платить', 'стакан'], 'extra' => ['здесь', 'меню']],
                            'es' => ['sentence' => 'Puedo pagar el vaso', 'correct' => ['puedo', 'pagar', 'el', 'vaso'], 'extra' => ['aquí está', 'menú']],
                            'de' => ['sentence' => 'Ich kann das Glas bezahlen', 'correct' => ['ich kann', 'das', 'Glas', 'bezahlen'], 'extra' => ['hier ist', 'Menü']],
                            'ja' => ['sentence' => 'グラスを払えます', 'correct' => ['グラス', 'を', '払えます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '유리잔을 낼 수 있습니다', 'correct' => ['유리잔을', '낼', '수', '있습니다'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'bardağı ödeyebilirim', 'correct' => ['bardağı', 'ödeyebilirim'], 'extra' => ['işte', 'menü']],
                        ],
                    ],
                    'b' => [
                        'words' => ['voici', 'le', 'menu'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Here is the menu', 'correct' => ['here is', 'the', 'menu'], 'extra' => ['I can', 'glass']],
                            'az' => ['sentence' => 'burada menyu', 'correct' => ['burada', 'menyu'], 'extra' => ['mən', 'bacarıram', 'stəkan']],
                            'ar' => ['sentence' => 'هنا قائمة الطعام', 'correct' => ['هنا', 'قائمة الطعام'], 'extra' => ['أنا', 'أستطيع', 'كوب']],
                            'ru' => ['sentence' => 'здесь меню', 'correct' => ['здесь', 'меню'], 'extra' => ['я', 'могу', 'стакан']],
                            'es' => ['sentence' => 'Aquí está el menú', 'correct' => ['aquí está', 'el', 'menú'], 'extra' => ['puedo', 'vaso']],
                            'de' => ['sentence' => 'Hier ist das Menü', 'correct' => ['hier ist', 'das', 'Menü'], 'extra' => ['ich kann', 'Glas']],
                            'ja' => ['sentence' => 'これがメニューです', 'correct' => ['これが', 'メニュー', 'です'], 'extra' => ['グラス']],
                            'ko' => ['sentence' => '여기 메뉴입니다', 'correct' => ['여기', '메뉴입니다'], 'extra' => ['유리잔']],
                            'tr' => ['sentence' => 'işte menü', 'correct' => ['işte', 'menü'], 'extra' => ['yapabilirim', 'bardak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je peux', 'choisir', 'le', 'menu'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can choose the menu', 'correct' => ['I can', 'to choose', 'the', 'menu'], 'extra' => ['here is', 'glass']],
                            'az' => ['sentence' => 'mən bacarıram seçmək menyu', 'correct' => ['mən', 'bacarıram', 'seçmək', 'menyu'], 'extra' => ['burada', 'stəkan']],
                            'ar' => ['sentence' => 'أنا أستطيع الاختيار قائمة الطعام', 'correct' => ['أنا', 'أستطيع', 'الاختيار', 'قائمة الطعام'], 'extra' => ['هنا', 'كوب']],
                            'ru' => ['sentence' => 'я могу выбрать меню', 'correct' => ['я', 'могу', 'выбрать', 'меню'], 'extra' => ['здесь', 'стакан']],
                            'es' => ['sentence' => 'Puedo elegir el menú', 'correct' => ['puedo', 'elegir', 'el', 'menú'], 'extra' => ['aquí está', 'vaso']],
                            'de' => ['sentence' => 'Ich kann das Menü wählen', 'correct' => ['ich kann', 'das', 'Menü', 'wählen'], 'extra' => ['hier ist', 'Glas']],
                            'ja' => ['sentence' => 'メニューを選べます', 'correct' => ['メニュー', 'を', '選べます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '메뉴를 고를 수 있습니다', 'correct' => ['메뉴를', '고를', '수', '있습니다'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'menüyü seçebilirim', 'correct' => ['menüyü', 'seçebilirim'], 'extra' => ['işte', 'bardak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: A Little More', 4,
                pictures: [['fr' => 'Cuillère', 'img' => 'spoon'], ['fr' => 'Fourchette', 'img' => 'fork']],
                plain: [['fr' => 'Un peu'], ['fr' => 'Prendre']],
                phrases: [
                    'a' => [
                        'words' => ['un peu', 'de', 'riz'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A little rice', 'correct' => ['a little', 'of', 'rice'], 'extra' => ['to have', 'fork']],
                            'az' => ['sentence' => 'az düyü', 'correct' => ['az', 'düyü'], 'extra' => ['sahib olmaq', 'çəngəl']],
                            'ar' => ['sentence' => 'قليل أرز', 'correct' => ['قليل', 'أرز'], 'extra' => ['امتلاك', 'شوكة']],
                            'ru' => ['sentence' => 'немного рис', 'correct' => ['немного', 'рис'], 'extra' => ['иметь', 'вилка']],
                            'es' => ['sentence' => 'Un poco de arroz', 'correct' => ['un poco', 'de', 'arroz'], 'extra' => ['tomar', 'tenedor']],
                            'de' => ['sentence' => 'Ein bisschen Reis', 'correct' => ['ein bisschen', 'von', 'Reis'], 'extra' => ['nehmen', 'Gabel']],
                            'ja' => ['sentence' => '少しのご飯', 'correct' => ['少しの', 'ご飯'], 'extra' => ['取る']],
                            'ko' => ['sentence' => '약간의 밥', 'correct' => ['약간의', '밥'], 'extra' => ['먹다']],
                            'tr' => ['sentence' => 'az pirinç', 'correct' => ['az', 'pirinç'], 'extra' => ['almak', 'çatal']],
                        ],
                    ],
                    'b' => [
                        'words' => ['prendre', 'une', 'fourchette'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To take a fork', 'correct' => ['to have', 'a', 'fork'], 'extra' => ['a little', 'spoon']],
                            'az' => ['sentence' => 'sahib olmaq bir çəngəl', 'correct' => ['sahib olmaq', 'bir', 'çəngəl'], 'extra' => ['az', 'qaşıq']],
                            'ar' => ['sentence' => 'امتلاك شوكة', 'correct' => ['امتلاك', 'شوكة'], 'extra' => ['قليل', 'ملعقة']],
                            'ru' => ['sentence' => 'иметь вилка', 'correct' => ['иметь', 'вилка'], 'extra' => ['немного', 'ложка']],
                            'es' => ['sentence' => 'Tomar un tenedor', 'correct' => ['tomar', 'un', 'tenedor'], 'extra' => ['un poco', 'cuchara']],
                            'de' => ['sentence' => 'Eine Gabel nehmen', 'correct' => ['eine', 'Gabel', 'nehmen'], 'extra' => ['ein bisschen', 'Löffel']],
                            'ja' => ['sentence' => 'フォークを取る', 'correct' => ['フォーク', 'を', '取る'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '포크를 잡다', 'correct' => ['포크를', '잡다'], 'extra' => ['조금']],
                            'tr' => ['sentence' => 'bir çatal almak', 'correct' => ['bir', 'çatal', 'almak'], 'extra' => ['biraz', 'kaşık']],
                        ],
                    ],
                    'c' => [
                        'words' => ['prendre', 'un peu', 'avec', 'la', 'cuillère'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To take a little with the spoon', 'correct' => ['to have', 'a little', 'with', 'the', 'spoon'], 'extra' => ['fork']],
                            'az' => ['sentence' => 'sahib olmaq az ilə qaşıq', 'correct' => ['sahib olmaq', 'az', 'ilə', 'qaşıq'], 'extra' => ['çəngəl']],
                            'ar' => ['sentence' => 'امتلاك قليل مع ملعقة', 'correct' => ['امتلاك', 'قليل', 'مع', 'ملعقة'], 'extra' => ['شوكة']],
                            'ru' => ['sentence' => 'иметь немного с ложка', 'correct' => ['иметь', 'немного', 'с', 'ложка'], 'extra' => ['вилка']],
                            'es' => ['sentence' => 'Tomar un poco con la cuchara', 'correct' => ['tomar', 'un poco', 'con', 'la', 'cuchara'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Ein bisschen mit dem Löffel nehmen', 'correct' => ['ein bisschen', 'mit', 'dem', 'Löffel', 'nehmen'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'スプーンで少し取る', 'correct' => ['スプーン', 'で', '少し', '取る'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '숟가락으로 조금 먹다', 'correct' => ['숟가락으로', '조금', '먹다'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'kaşıkla biraz almak', 'correct' => ['kaşıkla', 'biraz', 'almak'], 'extra' => ['çatal']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: My Order Is Ready', 5,
                pictures: [['fr' => 'Assiette', 'img' => 'plate'], ['fr' => 'Couteau', 'img' => 'knife']],
                plain: [['fr' => 'Commande'], ['fr' => 'Prêt']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'plat', 'est', 'prêt'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The dish is ready', 'correct' => ['the', 'dish', 'is', 'ready'], 'extra' => ['order', 'plate']],
                            'az' => ['sentence' => 'yemək hazır', 'correct' => ['yemək', 'hazır'], 'extra' => ['sifariş', 'boşqab']],
                            'ar' => ['sentence' => 'طبق جاهز', 'correct' => ['طبق', 'جاهز'], 'extra' => ['طلب', 'صحن']],
                            'ru' => ['sentence' => 'блюдо готов', 'correct' => ['блюдо', 'готов'], 'extra' => ['заказ', 'тарелка']],
                            'es' => ['sentence' => 'El plato está listo', 'correct' => ['el', 'plato', 'está', 'listo'], 'extra' => ['pedido', 'plato']],
                            'de' => ['sentence' => 'Das Gericht ist fertig', 'correct' => ['das', 'Gericht', 'ist', 'fertig'], 'extra' => ['Bestellung', 'Teller']],
                            'ja' => ['sentence' => '料理は準備できています', 'correct' => ['料理', 'は', '準備', 'で', 'きて', 'います'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '요리는 준비되었습니다', 'correct' => ['요리는', '준비되었습니다'], 'extra' => ['주문']],
                            'tr' => ['sentence' => 'yemek hazır', 'correct' => ['yemek', 'hazır'], 'extra' => ['sipariş', 'tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'commande', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My order, please', 'correct' => ['my', 'order', 'please'], 'extra' => ['ready', 'knife']],
                            'az' => ['sentence' => 'mənim sifariş zəhmət olmasa', 'correct' => ['mənim', 'sifariş', 'zəhmət olmasa'], 'extra' => ['hazır', 'bıçaq']],
                            'ar' => ['sentence' => 'طلب من فضلك', 'correct' => ['طلب', 'من فضلك'], 'extra' => ['جاهز', 'سكين']],
                            'ru' => ['sentence' => 'мой заказ пожалуйста', 'correct' => ['мой', 'заказ', 'пожалуйста'], 'extra' => ['готов', 'нож']],
                            'es' => ['sentence' => 'Mi pedido, por favor', 'correct' => ['mi', 'pedido', 'por favor'], 'extra' => ['listo', 'cuchillo']],
                            'de' => ['sentence' => 'Meine Bestellung, bitte', 'correct' => ['meine', 'Bestellung', 'bitte'], 'extra' => ['fertig', 'Messer']],
                            'ja' => ['sentence' => '私の注文をお願いします', 'correct' => ['私の', '注文', 'を', 'お願いします'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '제 주문 부탁합니다', 'correct' => ['제', '주문', '부탁합니다'], 'extra' => ['준비된']],
                            'tr' => ['sentence' => 'siparişim lütfen', 'correct' => ['siparişim', 'lütfen'], 'extra' => ['hazır', 'bıçak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'et', 'un', 'couteau'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate and a knife', 'correct' => ['a', 'plate', 'and', 'a', 'knife'], 'extra' => ['order', 'ready']],
                            'az' => ['sentence' => 'bir boşqab və bir bıçaq', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'bıçaq'], 'extra' => ['sifariş', 'hazır']],
                            'ar' => ['sentence' => 'صحن و سكين', 'correct' => ['صحن', 'و', 'سكين'], 'extra' => ['طلب', 'جاهز']],
                            'ru' => ['sentence' => 'тарелка и нож', 'correct' => ['тарелка', 'и', 'нож'], 'extra' => ['заказ', 'готов']],
                            'es' => ['sentence' => 'Un plato y un cuchillo', 'correct' => ['un', 'plato', 'y', 'un', 'cuchillo'], 'extra' => ['pedido', 'listo']],
                            'de' => ['sentence' => 'Ein Teller und ein Messer', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Messer'], 'extra' => ['Bestellung', 'fertig']],
                            'ja' => ['sentence' => 'お皿とナイフ', 'correct' => ['お皿', 'と', 'ナイフ'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '접시와 나이프', 'correct' => ['접시와', '나이프'], 'extra' => ['주문']],
                            'tr' => ['sentence' => 'bir tabak ve bir bıçak', 'correct' => ['bir', 'tabak', 've', 'bir', 'bıçak'], 'extra' => ['sipariş', 'hazır']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
