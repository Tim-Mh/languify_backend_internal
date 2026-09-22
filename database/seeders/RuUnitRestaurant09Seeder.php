<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitRestaurant09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Кофе' => 'coffee', 'Чай' => 'tea', 'Стол' => 'table', 'Вода' => 'water',
        'Молоко' => 'milk', 'Хлеб' => 'bread', 'Сыр' => 'cheese', 'Торт' => 'cake',
    ];

    /**
     * Russian Restaurant Unit 9.
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
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: At the Table', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fork & Knife', 1,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Нету'], ['ru' => 'Вилка']],
                phrases: [
                    'a' => [
                        'words' => ['нету', 'вилка'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no fork', 'correct' => ['there is no', 'fork'], 'extra' => ['knife']],
                            'az' => ['sentence' => 'yoxdur çəngəl', 'correct' => ['yoxdur', 'çəngəl'], 'extra' => ['bıçaq']],
                            'ar' => ['sentence' => 'لا يوجد شوكة', 'correct' => ['لا يوجد', 'شوكة'], 'extra' => ['سكين']],
                            'fr' => ['sentence' => 'Il n’y a pas de fourchette', 'correct' => ['il n’y a pas', 'de fourchette'], 'extra' => ['couteau']],
                            'es' => ['sentence' => 'No hay tenedor', 'correct' => ['no hay', 'tenedor'], 'extra' => ['cuchillo']],
                            'de' => ['sentence' => 'Es gibt keine Gabel', 'correct' => ['es gibt keine', 'Gabel'], 'extra' => ['Messer']],
                            'ja' => ['sentence' => 'フォークがありません', 'correct' => ['フォークが', 'ありません'], 'extra' => ['ナイフ']],
                            'ko' => ['sentence' => '포크가 없어요', 'correct' => ['포크가', '없어요'], 'extra' => ['나이프']],
                            'tr' => ['sentence' => 'çatal yok', 'correct' => ['çatal', 'yok'], 'extra' => ['bıçak', 'masa']],
                        ],
                    ],
                    'b' => [
                        'words' => ['вилка', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fork please', 'correct' => ['a', 'fork', 'please'], 'extra' => ['knife']],
                            'az' => ['sentence' => 'bir çəngəl zəhmət olmasa', 'correct' => ['bir', 'çəngəl', 'zəhmət olmasa'], 'extra' => ['bıçaq']],
                            'ar' => ['sentence' => 'شوكة من فضلك', 'correct' => ['شوكة', 'من فضلك'], 'extra' => ['سكين']],
                            'fr' => ['sentence' => 'Une fourchette s’il vous plaît', 'correct' => ['une', 'fourchette', 's’il vous plaît'], 'extra' => ['couteau']],
                            'es' => ['sentence' => 'Un tenedor por favor', 'correct' => ['un', 'tenedor', 'por favor'], 'extra' => ['cuchillo']],
                            'de' => ['sentence' => 'Eine Gabel bitte', 'correct' => ['eine', 'Gabel', 'bitte'], 'extra' => ['Messer']],
                            'ja' => ['sentence' => 'フォークを一つお願いします', 'correct' => ['フォークを', '一つ', 'お願いします'], 'extra' => ['ナイフ']],
                            'ko' => ['sentence' => '포크 하나 부탁합니다', 'correct' => ['포크', '하나', '부탁합니다'], 'extra' => ['나이프']],
                            'tr' => ['sentence' => 'bir çatal lütfen', 'correct' => ['bir', 'çatal', 'lütfen'], 'extra' => ['bıçak', 'masa']],
                        ],
                    ],
                    'c' => [
                        'words' => ['есть', 'нож'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is a knife', 'correct' => ['there is', 'a', 'knife'], 'extra' => ['fork']],
                            'az' => ['sentence' => 'var bir bıçaq', 'correct' => ['var', 'bir', 'bıçaq'], 'extra' => ['çəngəl']],
                            'ar' => ['sentence' => 'يوجد سكين', 'correct' => ['يوجد', 'سكين'], 'extra' => ['شوكة']],
                            'fr' => ['sentence' => 'Il y a un couteau', 'correct' => ['il y a', 'un', 'couteau'], 'extra' => ['fourchette']],
                            'es' => ['sentence' => 'Hay un cuchillo', 'correct' => ['hay', 'un', 'cuchillo'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Es gibt ein Messer', 'correct' => ['es gibt', 'ein', 'Messer'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'ナイフがあります', 'correct' => ['ナイフが', 'あります'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '나이프가 있어요', 'correct' => ['나이프가', '있어요'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'bıçak var', 'correct' => ['bıçak', 'var'], 'extra' => ['çatal', 'masa']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Spoon & Plate', 2,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Нету'], ['ru' => 'Ложка']],
                phrases: [
                    'a' => [
                        'words' => ['нету', 'ложка'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no spoon', 'correct' => ['there is no', 'spoon'], 'extra' => ['plate']],
                            'az' => ['sentence' => 'yoxdur qaşıq', 'correct' => ['yoxdur', 'qaşıq'], 'extra' => ['boşqab']],
                            'ar' => ['sentence' => 'لا يوجد ملعقة', 'correct' => ['لا يوجد', 'ملعقة'], 'extra' => ['صحن']],
                            'fr' => ['sentence' => 'Il n’y a pas de cuillère', 'correct' => ['il n’y a pas', 'de cuillère'], 'extra' => ['assiette']],
                            'es' => ['sentence' => 'No hay cuchara', 'correct' => ['no hay', 'cuchara'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Es gibt keinen Löffel', 'correct' => ['es gibt keinen', 'Löffel'], 'extra' => ['Teller']],
                            'ja' => ['sentence' => 'スプーンがありません', 'correct' => ['スプーンが', 'ありません'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '숟가락이 없어요', 'correct' => ['숟가락이', '없어요'], 'extra' => ['접시']],
                            'tr' => ['sentence' => 'kaşık yok', 'correct' => ['kaşık', 'yok'], 'extra' => ['tabak', 'çorba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ложка', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A spoon please', 'correct' => ['a', 'spoon', 'please'], 'extra' => ['plate']],
                            'az' => ['sentence' => 'bir qaşıq zəhmət olmasa', 'correct' => ['bir', 'qaşıq', 'zəhmət olmasa'], 'extra' => ['boşqab']],
                            'ar' => ['sentence' => 'ملعقة من فضلك', 'correct' => ['ملعقة', 'من فضلك'], 'extra' => ['صحن']],
                            'fr' => ['sentence' => 'Une cuillère s’il vous plaît', 'correct' => ['une', 'cuillère', 's’il vous plaît'], 'extra' => ['assiette']],
                            'es' => ['sentence' => 'Una cuchara por favor', 'correct' => ['una', 'cuchara', 'por favor'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Einen Löffel bitte', 'correct' => ['einen', 'Löffel', 'bitte'], 'extra' => ['Teller']],
                            'ja' => ['sentence' => 'スプーンを一つお願いします', 'correct' => ['スプーンを', '一つ', 'お願いします'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '숟가락 하나 부탁합니다', 'correct' => ['숟가락', '하나', '부탁합니다'], 'extra' => ['접시']],
                            'tr' => ['sentence' => 'bir kaşık lütfen', 'correct' => ['bir', 'kaşık', 'lütfen'], 'extra' => ['tabak', 'çorba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['тарелка', 'чистый'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The plate is clean', 'correct' => ['the plate', 'is', 'clean'], 'extra' => ['spoon']],
                            'az' => ['sentence' => 'boşqab təmiz', 'correct' => ['boşqab', 'təmiz'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'صحن نظيف', 'correct' => ['صحن', 'نظيف'], 'extra' => ['ملعقة']],
                            'fr' => ['sentence' => 'L’assiette est propre', 'correct' => ['l’assiette', 'est', 'propre'], 'extra' => ['cuillère']],
                            'es' => ['sentence' => 'El plato está limpio', 'correct' => ['el plato', 'está', 'limpio'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Der Teller ist sauber', 'correct' => ['der Teller', 'ist', 'sauber'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'お皿はきれいです', 'correct' => ['お皿は', 'きれいです'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '접시는 깨끗해요', 'correct' => ['접시는', '깨끗해요'], 'extra' => ['숟가락']],
                            'tr' => ['sentence' => 'tabak temiz', 'correct' => ['tabak', 'temiz'], 'extra' => ['kaşık', 'çorba']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Glass & Napkin', 3,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Стакан'], ['ru' => 'Воды']],
                phrases: [
                    'a' => [
                        'words' => ['стакан', 'воды'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A glass of water', 'correct' => ['a', 'glass', 'of water'], 'extra' => ['napkin']],
                            'az' => ['sentence' => 'bir stəkan suyun', 'correct' => ['bir', 'stəkan', 'suyun'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'كوب الماء', 'correct' => ['كوب', 'الماء'], 'extra' => ['منديل']],
                            'fr' => ['sentence' => 'Un verre d’eau', 'correct' => ['un', 'verre', 'd’eau'], 'extra' => ['serviette']],
                            'es' => ['sentence' => 'Un vaso de agua', 'correct' => ['un', 'vaso', 'de agua'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Ein Glas Wasser', 'correct' => ['ein', 'Glas', 'Wasser'], 'extra' => ['Serviette']],
                            'ja' => ['sentence' => '水を一杯', 'correct' => ['水を', '一杯'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '물 한 잔', 'correct' => ['물', '한', '잔'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bir bardak su', 'correct' => ['bir', 'bardak', 'su'], 'extra' => ['peçete', 'masa']],
                        ],
                    ],
                    'b' => [
                        'words' => ['нету', 'салфетка'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no napkin', 'correct' => ['there is no', 'napkin'], 'extra' => ['glass']],
                            'az' => ['sentence' => 'yoxdur salfet', 'correct' => ['yoxdur', 'salfet'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'لا يوجد منديل', 'correct' => ['لا يوجد', 'منديل'], 'extra' => ['كوب']],
                            'fr' => ['sentence' => 'Il n’y a pas de serviette', 'correct' => ['il n’y a pas', 'de serviette'], 'extra' => ['verre']],
                            'es' => ['sentence' => 'No hay servilleta', 'correct' => ['no hay', 'servilleta'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Es gibt keine Serviette', 'correct' => ['es gibt keine', 'Serviette'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => 'ナプキンがありません', 'correct' => ['ナプキンが', 'ありません'], 'extra' => ['コップ']],
                            'ko' => ['sentence' => '냅킨이 없어요', 'correct' => ['냅킨이', '없어요'], 'extra' => ['컵']],
                            'tr' => ['sentence' => 'peçete yok', 'correct' => ['peçete', 'yok'], 'extra' => ['bardak', 'su']],
                        ],
                    ],
                    'c' => [
                        'words' => ['салфетка', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A napkin please', 'correct' => ['a', 'napkin', 'please'], 'extra' => ['glass']],
                            'az' => ['sentence' => 'bir salfet zəhmət olmasa', 'correct' => ['bir', 'salfet', 'zəhmət olmasa'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'منديل من فضلك', 'correct' => ['منديل', 'من فضلك'], 'extra' => ['كوب']],
                            'fr' => ['sentence' => 'Une serviette s’il vous plaît', 'correct' => ['une', 'serviette', 's’il vous plaît'], 'extra' => ['verre']],
                            'es' => ['sentence' => 'Una servilleta por favor', 'correct' => ['una', 'servilleta', 'por favor'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Eine Serviette bitte', 'correct' => ['eine', 'Serviette', 'bitte'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => 'ナプキンをお願いします', 'correct' => ['ナプキンを', 'お願いします'], 'extra' => ['コップ']],
                            'ko' => ['sentence' => '냅킨 부탁합니다', 'correct' => ['냅킨', '부탁합니다'], 'extra' => ['컵']],
                            'tr' => ['sentence' => 'peçete lütfen', 'correct' => ['peçete', 'lütfen'], 'extra' => ['bardak', 'su']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: The Table Is Ready', 4,
                pictures: [['ru' => 'Стол', 'img' => 'table'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Готов'], ['ru' => 'Не']],
                phrases: [
                    'a' => [
                        'words' => ['стол', 'готов'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The table is ready', 'correct' => ['the table', 'is', 'ready'], 'extra' => ['clean']],
                            'az' => ['sentence' => 'masa hazır', 'correct' => ['masa', 'hazır'], 'extra' => ['təmiz']],
                            'ar' => ['sentence' => 'طاولة جاهز', 'correct' => ['طاولة', 'جاهز'], 'extra' => ['نظيف']],
                            'fr' => ['sentence' => 'La table est prête', 'correct' => ['la table', 'est', 'prête'], 'extra' => ['propre']],
                            'es' => ['sentence' => 'La mesa está lista', 'correct' => ['la mesa', 'está', 'lista'], 'extra' => ['limpio']],
                            'de' => ['sentence' => 'Der Tisch ist fertig', 'correct' => ['der Tisch', 'ist', 'fertig'], 'extra' => ['sauber']],
                            'ja' => ['sentence' => 'テーブルは準備できています', 'correct' => ['テーブルは', '準備できています'], 'extra' => ['きれい']],
                            'ko' => ['sentence' => '테이블은 준비됐어요', 'correct' => ['테이블은', '준비됐어요'], 'extra' => ['깨끗한']],
                            'tr' => ['sentence' => 'masa hazır', 'correct' => ['masa', 'hazır'], 'extra' => ['temiz', 'menü']],
                        ],
                    ],
                    'b' => [
                        'words' => ['стол', 'не', 'чистый'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The table is not clean', 'correct' => ['the table', 'is not', 'clean'], 'extra' => ['ready']],
                            'az' => ['sentence' => 'masa deyil təmiz', 'correct' => ['masa', 'deyil', 'təmiz'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'طاولة ليس نظيف', 'correct' => ['طاولة', 'ليس', 'نظيف'], 'extra' => ['جاهز']],
                            'fr' => ['sentence' => 'La table n’est pas propre', 'correct' => ['la table', 'n’est pas', 'propre'], 'extra' => ['prêt']],
                            'es' => ['sentence' => 'La mesa no está limpia', 'correct' => ['la mesa', 'no está', 'limpia'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Der Tisch ist nicht sauber', 'correct' => ['der Tisch', 'ist nicht', 'sauber'], 'extra' => ['fertig']],
                            'ja' => ['sentence' => 'テーブルはきれいではありません', 'correct' => ['テーブルは', 'きれいでは', 'ありません'], 'extra' => ['準備できた']],
                            'ko' => ['sentence' => '테이블은 깨끗하지 않아요', 'correct' => ['테이블은', '깨끗하지 않아요'], 'extra' => ['준비된']],
                            'tr' => ['sentence' => 'masa temiz değil', 'correct' => ['masa', 'temiz', 'değil'], 'extra' => ['menü']],
                        ],
                    ],
                    'c' => [
                        'words' => ['извините', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me please', 'correct' => ['excuse me', 'please'], 'extra' => ['please']],
                            'az' => ['sentence' => 'bağışlayın zəhmət olmasa', 'correct' => ['bağışlayın', 'zəhmət olmasa'], 'extra' => []],
                            'ar' => ['sentence' => 'عفوا من فضلك', 'correct' => ['عفوا', 'من فضلك'], 'extra' => []],
                            'fr' => ['sentence' => "Excusez-moi s'il vous plaît", 'correct' => ['excusez-moi', "s'il vous plaît"], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Perdón por favor', 'correct' => ['perdón', 'por favor'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Entschuldigung bitte', 'correct' => ['Entschuldigung', 'bitte'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'すみませんお願いします', 'correct' => ['すみません', 'お願いします'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '실례합니다 부탁합니다', 'correct' => ['실례합니다', '부탁합니다'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'affedersiniz', 'correct' => ['affedersiniz'], 'extra' => ['masa', 'temiz']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Everything We Need', 5,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Вилка'], ['ru' => 'Нож']],
                phrases: [
                    'a' => [
                        'words' => ['вилка', 'и', 'нож'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A fork and a knife', 'correct' => ['a', 'fork', 'and', 'a', 'knife'], 'extra' => ['spoon']],
                            'az' => ['sentence' => 'bir çəngəl və bir bıçaq', 'correct' => ['bir', 'çəngəl', 'və', 'bir', 'bıçaq'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'شوكة و سكين', 'correct' => ['شوكة', 'و', 'سكين'], 'extra' => ['ملعقة']],
                            'fr' => ['sentence' => 'Une fourchette et un couteau', 'correct' => ['une', 'fourchette', 'et', 'un', 'couteau'], 'extra' => ['cuillère']],
                            'es' => ['sentence' => 'Un tenedor y un cuchillo', 'correct' => ['un', 'tenedor', 'y', 'un', 'cuchillo'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Eine Gabel und ein Messer', 'correct' => ['eine', 'Gabel', 'und', 'ein', 'Messer'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'フォークとナイフ', 'correct' => ['フォーク', 'と', 'ナイフ'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '포크와 나이프', 'correct' => ['포크와', '나이프'], 'extra' => ['숟가락']],
                            'tr' => ['sentence' => 'bir çatal ve bir bıçak', 'correct' => ['bir', 'çatal', 've', 'bir', 'bıçak'], 'extra' => ['bardak', 'su']],
                        ],
                    ],
                    'b' => [
                        'words' => ['нету', 'стакан'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no glass', 'correct' => ['there is no', 'glass'], 'extra' => ['napkin']],
                            'az' => ['sentence' => 'yoxdur stəkan', 'correct' => ['yoxdur', 'stəkan'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'لا يوجد كوب', 'correct' => ['لا يوجد', 'كوب'], 'extra' => ['منديل']],
                            'fr' => ['sentence' => 'Il n’y a pas de verre', 'correct' => ['il n’y a pas', 'de verre'], 'extra' => ['serviette']],
                            'es' => ['sentence' => 'No hay vaso', 'correct' => ['no hay', 'vaso'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Es gibt kein Glas', 'correct' => ['es gibt kein', 'Glas'], 'extra' => ['Serviette']],
                            'ja' => ['sentence' => 'コップがありません', 'correct' => ['コップが', 'ありません'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '컵이 없어요', 'correct' => ['컵이', '없어요'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bardak yok', 'correct' => ['bardak', 'yok'], 'extra' => ['çatal', 'su']],
                        ],
                    ],
                    'c' => [
                        'words' => ['тарелка', 'и', 'ложка', 'пожалуйста'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A plate and a spoon please', 'correct' => ['a', 'plate', 'and', 'a', 'spoon', 'please'], 'extra' => ['fork']],
                            'az' => ['sentence' => 'bir boşqab və bir qaşıq zəhmət olmasa', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'qaşıq', 'zəhmət olmasa'], 'extra' => ['çəngəl']],
                            'ar' => ['sentence' => 'صحن و ملعقة من فضلك', 'correct' => ['صحن', 'و', 'ملعقة', 'من فضلك'], 'extra' => ['شوكة']],
                            'fr' => ['sentence' => 'Une assiette et une cuillère s’il vous plaît', 'correct' => ['une', 'assiette', 'et', 'une', 'cuillère', 's’il vous plaît'], 'extra' => ['fourchette']],
                            'es' => ['sentence' => 'Un plato y una cuchara por favor', 'correct' => ['un', 'plato', 'y', 'una', 'cuchara', 'por favor'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Einen Teller und einen Löffel bitte', 'correct' => ['einen', 'Teller', 'und', 'einen', 'Löffel', 'bitte'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'お皿とスプーンをお願いします', 'correct' => ['お皿', 'と', 'スプーンを', 'お願いします'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '접시와 숟가락 부탁합니다', 'correct' => ['접시와', '숟가락', '부탁합니다'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'tabak ve kaşık lütfen', 'correct' => ['tabak', 've', 'kaşık', 'lütfen'], 'extra' => ['çatal', 'bardak']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
