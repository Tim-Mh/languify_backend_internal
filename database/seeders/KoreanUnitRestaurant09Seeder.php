<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = ['포크' => 'fork', '나이프' => 'knife', '숟가락' => 'spoon', '접시' => 'plate', '유리잔' => 'glass', '메뉴' => 'menu', '밥' => 'rice', '수프' => 'soup'];

    /**
     * Korean Restaurant, Unit 9, the Korean twin of the English "At the Table" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, '유닛 9: 식탁에서', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 포크 · 나이프', 1,
                pictures: [['ko' => '포크', 'img' => 'fork'], ['ko' => '나이프', 'img' => 'knife']],
                plain: [['ko' => '가져다주세요'], ['ko' => '냅킨']],
                phrases: [
                    'a' => [
                        'words' => ['포크를', '가져다주세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'bring me a fork', 'correct' => ['bring me', 'a', 'fork'], 'extra' => ['napkin']],
                            'az' => ['sentence' => 'mənə gətir bir çəngəl', 'correct' => ['mənə gətir', 'bir', 'çəngəl'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'أحضر لي شوكة', 'correct' => ['أحضر لي', 'شوكة'], 'extra' => ['منديل']],
                            'ru' => ['sentence' => 'принесите мне вилка', 'correct' => ['принесите мне', 'вилка'], 'extra' => ['салфетка']],
                            'es' => ['sentence' => 'Tráigame un tenedor', 'correct' => ['tráigame', 'un', 'tenedor'], 'extra' => ['servilleta', 'cuchillo']],
                            'de' => ['sentence' => 'Bringen Sie mir eine Gabel', 'correct' => ['bringen Sie mir', 'eine', 'Gabel'], 'extra' => ['Serviette', 'Messer']],
                            'fr' => ['sentence' => 'Apportez-moi une fourchette', 'correct' => ['apportez-moi', 'une', 'fourchette'], 'extra' => ['serviette', 'couteau']],
                            'ja' => ['sentence' => 'フォークを持ってきてください', 'correct' => ['フォーク', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'tr' => ['sentence' => 'bana bir çatal getirin', 'correct' => ['bana', 'bir', 'çatal', 'getirin'], 'extra' => ['peçete']],
                        ],
                    ],
                    'b' => [
                        'words' => ['나이프와', '냅킨'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a knife and a napkin', 'correct' => ['a', 'knife', 'and', 'a', 'napkin'], 'extra' => ['bring me']],
                            'az' => ['sentence' => 'bir bıçaq və bir salfet', 'correct' => ['bir', 'bıçaq', 'və', 'bir', 'salfet'], 'extra' => ['mənə gətir']],
                            'ar' => ['sentence' => 'سكين و منديل', 'correct' => ['سكين', 'و', 'منديل'], 'extra' => ['أحضر لي']],
                            'ru' => ['sentence' => 'нож и салфетка', 'correct' => ['нож', 'и', 'салфетка'], 'extra' => ['принесите мне']],
                            'es' => ['sentence' => 'Un cuchillo y una servilleta', 'correct' => ['un', 'cuchillo', 'y', 'una', 'servilleta'], 'extra' => ['tráigame']],
                            'de' => ['sentence' => 'Ein Messer und eine Serviette', 'correct' => ['ein', 'Messer', 'und', 'eine', 'Serviette'], 'extra' => ['bringen Sie mir']],
                            'fr' => ['sentence' => 'Un couteau et une serviette', 'correct' => ['un', 'couteau', 'et', 'une', 'serviette'], 'extra' => ['apportez-moi']],
                            'ja' => ['sentence' => 'ナイフとナプキン', 'correct' => ['ナイフ', 'と', 'ナプキン'], 'extra' => ['持ってきてください']],
                            'tr' => ['sentence' => 'bir bıçak ve bir peçete', 'correct' => ['bir', 'bıçak', 've', 'bir', 'peçete'], 'extra' => ['bana getirin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['깨끗한', '나이프를', '가져다주세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'bring me a clean knife', 'correct' => ['bring me', 'a', 'clean', 'knife'], 'extra' => ['napkin']],
                            'az' => ['sentence' => 'mənə gətir bir təmiz bıçaq', 'correct' => ['mənə gətir', 'bir', 'təmiz', 'bıçaq'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'أحضر لي نظيف سكين', 'correct' => ['أحضر لي', 'نظيف', 'سكين'], 'extra' => ['منديل']],
                            'ru' => ['sentence' => 'принесите мне чистый нож', 'correct' => ['принесите мне', 'чистый', 'нож'], 'extra' => ['салфетка']],
                            'es' => ['sentence' => 'Tráigame un cuchillo limpio', 'correct' => ['tráigame', 'un', 'cuchillo', 'limpio'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Bringen Sie mir ein sauberes Messer', 'correct' => ['bringen Sie mir', 'ein', 'sauber', 'Messer'], 'extra' => ['Serviette']],
                            'fr' => ['sentence' => 'Apportez-moi un couteau propre', 'correct' => ['apportez-moi', 'un', 'couteau', 'propre'], 'extra' => ['serviette']],
                            'ja' => ['sentence' => 'きれいなナイフを持ってきてください', 'correct' => ['きれいな', 'ナイフ', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'tr' => ['sentence' => 'bana temiz bir bıçak getirin', 'correct' => ['bana', 'temiz', 'bir', 'bıçak', 'getirin'], 'extra' => ['peçete']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 숟가락 · 접시', 2,
                pictures: [['ko' => '숟가락', 'img' => 'spoon'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '주시겠어요'], ['ko' => '가져오다']],
                phrases: [
                    'a' => [
                        'words' => ['숟가락을', '가져올', '수', '있나요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'can you bring a spoon', 'correct' => ['can you', 'bring', 'a', 'spoon'], 'extra' => ['plate']],
                            'az' => ['sentence' => 'bacarıram sən gətir bir qaşıq', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'qaşıq'], 'extra' => ['boşqab']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر ملعقة', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'ملعقة'], 'extra' => ['صحن']],
                            'ru' => ['sentence' => 'могу ты принеси ложка', 'correct' => ['могу', 'ты', 'принеси', 'ложка'], 'extra' => ['тарелка']],
                            'es' => ['sentence' => 'Puede traer una cuchara', 'correct' => ['puede usted', 'traer', 'una', 'cuchara'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Können Sie einen Löffel bringen', 'correct' => ['können Sie', 'einen', 'Löffel', 'bringen'], 'extra' => ['Teller']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une cuillère', 'correct' => ['pouvez-vous', 'apporter', 'une', 'cuillère'], 'extra' => ['assiette']],
                            'ja' => ['sentence' => 'スプーンを持ってきてもらえますか', 'correct' => ['スプーン', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['お皿']],
                            'tr' => ['sentence' => 'bir kaşık getirebilir misiniz', 'correct' => ['bir', 'kaşık', 'getirebilir', 'misiniz'], 'extra' => ['tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['탁자', '위의', '접시'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a plate on the table', 'correct' => ['a', 'plate', 'on', 'the', 'table'], 'extra' => ['spoon']],
                            'az' => ['sentence' => 'bir boşqab üzərində masa', 'correct' => ['bir', 'boşqab', 'üzərində', 'masa'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'صحن على طاولة', 'correct' => ['صحن', 'على', 'طاولة'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'тарелка на стол', 'correct' => ['тарелка', 'на', 'стол'], 'extra' => ['ложка']],
                            'es' => ['sentence' => 'Un plato en la mesa', 'correct' => ['un', 'plato', 'sobre', 'la', 'mesa'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein Teller auf dem Tisch', 'correct' => ['ein', 'Teller', 'auf', 'dem', 'Tisch'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Une assiette sur la table', 'correct' => ['une', 'assiette', 'sur', 'la', 'table'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'テーブルの上のお皿', 'correct' => ['テーブル', 'の', '上', 'の', 'お皿'], 'extra' => ['スプーン']],
                            'tr' => ['sentence' => 'masada bir tabak', 'correct' => ['masada', 'bir', 'tabak'], 'extra' => ['kaşık']],
                        ],
                    ],
                    'c' => [
                        'words' => ['깨끗한', '접시를', '가져올', '수', '있나요'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'can you bring a clean plate', 'correct' => ['can you', 'bring', 'a', 'clean', 'plate'], 'extra' => ['spoon']],
                            'az' => ['sentence' => 'bacarıram sən gətir bir təmiz boşqab', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'təmiz', 'boşqab'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر نظيف صحن', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'نظيف', 'صحن'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'могу ты принеси чистый тарелка', 'correct' => ['могу', 'ты', 'принеси', 'чистый', 'тарелка'], 'extra' => ['ложка']],
                            'es' => ['sentence' => 'Puede traer un plato limpio', 'correct' => ['puede usted', 'traer', 'un', 'limpio', 'plato'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Können Sie einen sauberen Teller bringen', 'correct' => ['können Sie', 'bringen', 'einen', 'sauber', 'Teller'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une assiette propre', 'correct' => ['pouvez-vous', 'apporter', 'une', 'assiette', 'propre'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'きれいなお皿を持ってきてもらえますか', 'correct' => ['きれいな', 'お皿', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['スプーン']],
                            'tr' => ['sentence' => 'temiz bir tabak getirebilir misiniz', 'correct' => ['temiz', 'bir', 'tabak', 'getirebilir', 'misiniz'], 'extra' => ['kaşık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 유리잔 · 메뉴', 3,
                pictures: [['ko' => '유리잔', 'img' => 'glass'], ['ko' => '메뉴', 'img' => 'menu']],
                plain: [['ko' => '나는 할 수 있다'], ['ko' => '여기']],
                phrases: [
                    'a' => [
                        'words' => ['유리잔을', '낼', '수', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can pay the glass', 'correct' => ['I can', 'pay', 'the', 'glass'], 'extra' => ['here is']],
                            'az' => ['sentence' => 'mən bacarıram ödə stəkan', 'correct' => ['mən', 'bacarıram', 'ödə', 'stəkan'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'أنا أستطيع ادفع كوب', 'correct' => ['أنا', 'أستطيع', 'ادفع', 'كوب'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'я могу плати стакан', 'correct' => ['я', 'могу', 'плати', 'стакан'], 'extra' => ['здесь']],
                            'es' => ['sentence' => 'Puedo pagar el vaso', 'correct' => ['puedo', 'pagar', 'el', 'vaso'], 'extra' => ['aquí está', 'menú']],
                            'de' => ['sentence' => 'Ich kann das Glas bezahlen', 'correct' => ['ich kann', 'das', 'Glas', 'bezahlen'], 'extra' => ['hier ist', 'Menü']],
                            'fr' => ['sentence' => 'Je peux payer le verre', 'correct' => ['je peux', 'payer', 'le', 'verre'], 'extra' => ['voici', 'menu']],
                            'ja' => ['sentence' => 'グラスを払えます', 'correct' => ['グラス', 'を', '払えます'], 'extra' => ['これが']],
                            'tr' => ['sentence' => 'bardağı ödeyebilirim', 'correct' => ['bardağı', 'ödeyebilirim'], 'extra' => ['işte']],
                        ],
                    ],
                    'b' => [
                        'words' => ['여기', '메뉴입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'here is the menu', 'correct' => ['here is', 'the', 'menu'], 'extra' => ['glass']],
                            'az' => ['sentence' => 'burada menyu', 'correct' => ['burada', 'menyu'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'هنا قائمة الطعام', 'correct' => ['هنا', 'قائمة الطعام'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'здесь меню', 'correct' => ['здесь', 'меню'], 'extra' => ['стакан']],
                            'es' => ['sentence' => 'Aquí está el menú', 'correct' => ['aquí está', 'el', 'menú'], 'extra' => ['puedo', 'vaso']],
                            'de' => ['sentence' => 'Hier ist das Menü', 'correct' => ['hier ist', 'das', 'Menü'], 'extra' => ['ich kann', 'Glas']],
                            'fr' => ['sentence' => 'Voici le menu', 'correct' => ['voici', 'le', 'menu'], 'extra' => ['verre']],
                            'ja' => ['sentence' => 'これがメニューです', 'correct' => ['これが', 'メニュー', 'です'], 'extra' => ['グラス']],
                            'tr' => ['sentence' => 'işte menü', 'correct' => ['işte', 'menü'], 'extra' => ['bardak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['메뉴를', '고를', '수', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can choose the menu', 'correct' => ['I can', 'choose', 'the', 'menu'], 'extra' => ['here is']],
                            'az' => ['sentence' => 'mən bacarıram seç menyu', 'correct' => ['mən', 'bacarıram', 'seç', 'menyu'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'أنا أستطيع اختر قائمة الطعام', 'correct' => ['أنا', 'أستطيع', 'اختر', 'قائمة الطعام'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'я могу выбери меню', 'correct' => ['я', 'могу', 'выбери', 'меню'], 'extra' => ['здесь']],
                            'es' => ['sentence' => 'Puedo elegir el menú', 'correct' => ['puedo', 'elegir', 'el', 'menú'], 'extra' => ['aquí está', 'vaso']],
                            'de' => ['sentence' => 'Ich kann das Menü wählen', 'correct' => ['ich kann', 'das', 'Menü', 'wählen'], 'extra' => ['hier ist', 'Glas']],
                            'fr' => ['sentence' => 'Je peux choisir le menu', 'correct' => ['je peux', 'choisir', 'le', 'menu'], 'extra' => ['voici']],
                            'ja' => ['sentence' => 'メニューを選べます', 'correct' => ['メニュー', 'を', '選べます'], 'extra' => ['これが']],
                            'tr' => ['sentence' => 'menüyü seçebilirim', 'correct' => ['menüyü', 'seçebilirim'], 'extra' => ['işte']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 숟가락 · 밥', 4,
                pictures: [['ko' => '숟가락', 'img' => 'spoon'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '조금'], ['ko' => '더']],
                phrases: [
                    'a' => [
                        'words' => ['약간의', '밥'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a little rice', 'correct' => ['a little', 'rice'], 'extra' => ['more']],
                            'az' => ['sentence' => 'az düyü', 'correct' => ['az', 'düyü'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'قليل أرز', 'correct' => ['قليل', 'أرز'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'немного рис', 'correct' => ['немного', 'рис'], 'extra' => ['больше']],
                            'es' => ['sentence' => 'Un poco de arroz', 'correct' => ['un poco', 'arroz'], 'extra' => ['más', 'cuchara']],
                            'de' => ['sentence' => 'Ein bisschen Reis', 'correct' => ['ein bisschen', 'Reis'], 'extra' => ['mehr', 'Löffel']],
                            'fr' => ['sentence' => 'Un peu de riz', 'correct' => ['un peu', 'riz'], 'extra' => ['plus', 'cuillère']],
                            'ja' => ['sentence' => '少しのご飯', 'correct' => ['少しの', 'ご飯'], 'extra' => ['もっと']],
                            'tr' => ['sentence' => 'az pirinç', 'correct' => ['az', 'pirinç'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => ['숟가락으로', '더'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'more with the spoon', 'correct' => ['more', 'with', 'the', 'spoon'], 'extra' => ['a little']],
                            'az' => ['sentence' => 'daha ilə qaşıq', 'correct' => ['daha', 'ilə', 'qaşıq'], 'extra' => ['az']],
                            'ar' => ['sentence' => 'أكثر مع ملعقة', 'correct' => ['أكثر', 'مع', 'ملعقة'], 'extra' => ['قليل']],
                            'ru' => ['sentence' => 'больше с ложка', 'correct' => ['больше', 'с', 'ложка'], 'extra' => ['немного']],
                            'es' => ['sentence' => 'Más con la cuchara', 'correct' => ['más', 'con', 'la', 'cuchara'], 'extra' => ['un poco', 'arroz']],
                            'de' => ['sentence' => 'Mehr mit dem Löffel', 'correct' => ['mehr', 'mit', 'dem', 'Löffel'], 'extra' => ['ein bisschen', 'Reis']],
                            'fr' => ['sentence' => 'Plus avec la cuillère', 'correct' => ['plus', 'avec', 'la', 'cuillère'], 'extra' => ['un peu']],
                            'ja' => ['sentence' => 'スプーンでもっと', 'correct' => ['スプーン', 'で', 'もっと'], 'extra' => ['少し']],
                            'tr' => ['sentence' => 'kaşıkla daha çok', 'correct' => ['kaşıkla', 'daha', 'çok'], 'extra' => ['biraz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['밥', '조금', '더'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a little more rice', 'correct' => ['a little', 'more', 'rice'], 'extra' => ['spoon']],
                            'az' => ['sentence' => 'az daha düyü', 'correct' => ['az', 'daha', 'düyü'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'قليل أكثر أرز', 'correct' => ['قليل', 'أكثر', 'أرز'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'немного больше рис', 'correct' => ['немного', 'больше', 'рис'], 'extra' => ['ложка']],
                            'es' => ['sentence' => 'Un poco más de arroz', 'correct' => ['un poco', 'más', 'arroz'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein bisschen mehr Reis', 'correct' => ['ein bisschen', 'mehr', 'Reis'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Un peu plus de riz', 'correct' => ['un peu', 'plus', 'riz'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'もう少しご飯', 'correct' => ['もう', '少し', 'ご飯'], 'extra' => ['スプーン']],
                            'tr' => ['sentence' => 'biraz daha pirinç', 'correct' => ['biraz', 'daha', 'pirinç'], 'extra' => ['kaşık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 접시 · 수프', 5,
                pictures: [['ko' => '접시', 'img' => 'plate'], ['ko' => '수프', 'img' => 'soup']],
                plain: [['ko' => '주문'], ['ko' => '준비된']],
                phrases: [
                    'a' => [
                        'words' => ['요리는', '준비되었습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the dish is ready', 'correct' => ['the', 'dish', 'is', 'ready'], 'extra' => ['order']],
                            'az' => ['sentence' => 'yemək hazır', 'correct' => ['yemək', 'hazır'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'طبق جاهز', 'correct' => ['طبق', 'جاهز'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'блюдо готов', 'correct' => ['блюдо', 'готов'], 'extra' => ['заказ']],
                            'es' => ['sentence' => 'El plato está listo', 'correct' => ['el', 'plato', 'está', 'listo'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Das Gericht ist fertig', 'correct' => ['das', 'Gericht', 'ist', 'bereit'], 'extra' => ['Bestellung']],
                            'fr' => ['sentence' => 'Le plat est prêt', 'correct' => ['le', 'plat', 'est', 'prêt'], 'extra' => ['commande']],
                            'ja' => ['sentence' => '料理は準備できています', 'correct' => ['料理', 'は', '準備', 'で', 'きて', 'います'], 'extra' => ['注文']],
                            'tr' => ['sentence' => 'yemek hazır', 'correct' => ['yemek', 'hazır'], 'extra' => ['sipariş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '주문', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my order please', 'correct' => ['my', 'order', 'please'], 'extra' => ['ready']],
                            'az' => ['sentence' => 'mənim sifariş zəhmət olmasa', 'correct' => ['mənim', 'sifariş', 'zəhmət olmasa'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'طلب من فضلك', 'correct' => ['طلب', 'من فضلك'], 'extra' => ['جاهز']],
                            'ru' => ['sentence' => 'мой заказ пожалуйста', 'correct' => ['мой', 'заказ', 'пожалуйста'], 'extra' => ['готов']],
                            'es' => ['sentence' => 'Mi pedido, por favor', 'correct' => ['mi', 'pedido', 'por favor'], 'extra' => ['listo', 'sopa']],
                            'de' => ['sentence' => 'Meine Bestellung, bitte', 'correct' => ['meine', 'Bestellung', 'bitte'], 'extra' => ['bereit', 'Suppe']],
                            'fr' => ['sentence' => 'Ma commande, s\'il vous plaît', 'correct' => ['ma', 'commande', 's\'il vous plaît'], 'extra' => ['prêt']],
                            'ja' => ['sentence' => '私の注文をお願いします', 'correct' => ['私の', '注文', 'を', 'お願いします'], 'extra' => ['準備ができた']],
                            'tr' => ['sentence' => 'siparişim lütfen', 'correct' => ['siparişim', 'lütfen'], 'extra' => ['hazır']],
                        ],
                    ],
                    'c' => [
                        'words' => ['접시와', '수프'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a plate and a soup', 'correct' => ['a', 'plate', 'and', 'a', 'soup'], 'extra' => ['order']],
                            'az' => ['sentence' => 'bir boşqab və bir şorba', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'şorba'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'صحن و حساء', 'correct' => ['صحن', 'و', 'حساء'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'тарелка и суп', 'correct' => ['тарелка', 'и', 'суп'], 'extra' => ['заказ']],
                            'es' => ['sentence' => 'Un plato y una sopa', 'correct' => ['un', 'plato', 'y', 'una', 'sopa'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Ein Teller und eine Suppe', 'correct' => ['ein', 'Teller', 'und', 'eine', 'Suppe'], 'extra' => ['Bestellung']],
                            'fr' => ['sentence' => 'Une assiette et une soupe', 'correct' => ['une', 'assiette', 'et', 'une', 'soupe'], 'extra' => ['commande']],
                            'ja' => ['sentence' => 'お皿とスープ', 'correct' => ['お皿', 'と', 'スープ'], 'extra' => ['注文']],
                            'tr' => ['sentence' => 'bir tabak ve bir çorba', 'correct' => ['bir', 'tabak', 've', 'bir', 'çorba'], 'extra' => ['sipariş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
