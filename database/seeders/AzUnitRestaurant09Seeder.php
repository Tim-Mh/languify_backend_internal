<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Masa' => 'table', 'Su' => 'water',
        'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Restaurant Unit 9.
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
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: At the Table', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fork & Knife', 1,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Yoxdur'], ['az' => 'Çəngəl']],
                phrases: [
                    'a' => [
                        'words' => ['yoxdur', 'çəngəl'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no fork', 'correct' => ['there is no', 'fork'], 'extra' => ['knife']],
                            'fr' => ['sentence' => 'Il n’y a pas de fourchette', 'correct' => ['il n’y a pas', 'de fourchette'], 'extra' => ['couteau']],
                            'es' => ['sentence' => 'No hay tenedor', 'correct' => ['no hay', 'tenedor'], 'extra' => ['cuchillo']],
                            'de' => ['sentence' => 'Es gibt keine Gabel', 'correct' => ['es gibt keine', 'Gabel'], 'extra' => ['Messer']],
                            'ja' => ['sentence' => 'フォークがありません', 'correct' => ['フォークが', 'ありません'], 'extra' => ['ナイフ']],
                            'ko' => ['sentence' => '포크가 없어요', 'correct' => ['포크가', '없어요'], 'extra' => ['나이프']],
                            'tr' => ['sentence' => 'çatal yok', 'correct' => ['çatal', 'yok'], 'extra' => ['bıçak', 'masa']],
                            'ru' => ['sentence' => 'нету вилка', 'correct' => ['нету', 'вилка'], 'extra' => ['нож']],
                            'ar' => ['sentence' => 'لا يوجد شوكة', 'correct' => ['لا يوجد', 'شوكة'], 'extra' => ['سكين']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'çəngəl', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A fork please', 'correct' => ['a', 'fork', 'please'], 'extra' => ['knife']],
                            'fr' => ['sentence' => 'Une fourchette s’il vous plaît', 'correct' => ['une', 'fourchette', 's’il vous plaît'], 'extra' => ['couteau']],
                            'es' => ['sentence' => 'Un tenedor por favor', 'correct' => ['un', 'tenedor', 'por favor'], 'extra' => ['cuchillo']],
                            'de' => ['sentence' => 'Eine Gabel bitte', 'correct' => ['eine', 'Gabel', 'bitte'], 'extra' => ['Messer']],
                            'ja' => ['sentence' => 'フォークを一つお願いします', 'correct' => ['フォークを', '一つ', 'お願いします'], 'extra' => ['ナイフ']],
                            'ko' => ['sentence' => '포크 하나 부탁합니다', 'correct' => ['포크', '하나', '부탁합니다'], 'extra' => ['나이프']],
                            'tr' => ['sentence' => 'bir çatal lütfen', 'correct' => ['bir', 'çatal', 'lütfen'], 'extra' => ['bıçak', 'masa']],
                            'ru' => ['sentence' => 'вилка пожалуйста', 'correct' => ['вилка', 'пожалуйста'], 'extra' => ['нож']],
                            'ar' => ['sentence' => 'شوكة من فضلك', 'correct' => ['شوكة', 'من فضلك'], 'extra' => ['سكين']],
                        ],
                    ],
                    'c' => [
                        'words' => ['var', 'bir', 'bıçaq'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a knife', 'correct' => ['there is', 'a', 'knife'], 'extra' => ['fork']],
                            'fr' => ['sentence' => 'Il y a un couteau', 'correct' => ['il y a', 'un', 'couteau'], 'extra' => ['fourchette']],
                            'es' => ['sentence' => 'Hay un cuchillo', 'correct' => ['hay', 'un', 'cuchillo'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Es gibt ein Messer', 'correct' => ['es gibt', 'ein', 'Messer'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'ナイフがあります', 'correct' => ['ナイフが', 'あります'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '나이프가 있어요', 'correct' => ['나이프가', '있어요'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'bıçak var', 'correct' => ['bıçak', 'var'], 'extra' => ['çatal', 'masa']],
                            'ru' => ['sentence' => 'есть нож', 'correct' => ['есть', 'нож'], 'extra' => ['вилка']],
                            'ar' => ['sentence' => 'يوجد سكين', 'correct' => ['يوجد', 'سكين'], 'extra' => ['شوكة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Spoon & Plate', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Yoxdur'], ['az' => 'Qaşıq']],
                phrases: [
                    'a' => [
                        'words' => ['yoxdur', 'qaşıq'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no spoon', 'correct' => ['there is no', 'spoon'], 'extra' => ['plate']],
                            'fr' => ['sentence' => 'Il n’y a pas de cuillère', 'correct' => ['il n’y a pas', 'de cuillère'], 'extra' => ['assiette']],
                            'es' => ['sentence' => 'No hay cuchara', 'correct' => ['no hay', 'cuchara'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Es gibt keinen Löffel', 'correct' => ['es gibt keinen', 'Löffel'], 'extra' => ['Teller']],
                            'ja' => ['sentence' => 'スプーンがありません', 'correct' => ['スプーンが', 'ありません'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '숟가락이 없어요', 'correct' => ['숟가락이', '없어요'], 'extra' => ['접시']],
                            'tr' => ['sentence' => 'kaşık yok', 'correct' => ['kaşık', 'yok'], 'extra' => ['tabak', 'çorba']],
                            'ru' => ['sentence' => 'нету ложка', 'correct' => ['нету', 'ложка'], 'extra' => ['тарелка']],
                            'ar' => ['sentence' => 'لا يوجد ملعقة', 'correct' => ['لا يوجد', 'ملعقة'], 'extra' => ['صحن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'qaşıq', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A spoon please', 'correct' => ['a', 'spoon', 'please'], 'extra' => ['plate']],
                            'fr' => ['sentence' => 'Une cuillère s’il vous plaît', 'correct' => ['une', 'cuillère', 's’il vous plaît'], 'extra' => ['assiette']],
                            'es' => ['sentence' => 'Una cuchara por favor', 'correct' => ['una', 'cuchara', 'por favor'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Einen Löffel bitte', 'correct' => ['einen', 'Löffel', 'bitte'], 'extra' => ['Teller']],
                            'ja' => ['sentence' => 'スプーンを一つお願いします', 'correct' => ['スプーンを', '一つ', 'お願いします'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '숟가락 하나 부탁합니다', 'correct' => ['숟가락', '하나', '부탁합니다'], 'extra' => ['접시']],
                            'tr' => ['sentence' => 'bir kaşık lütfen', 'correct' => ['bir', 'kaşık', 'lütfen'], 'extra' => ['tabak', 'çorba']],
                            'ru' => ['sentence' => 'ложка пожалуйста', 'correct' => ['ложка', 'пожалуйста'], 'extra' => ['тарелка']],
                            'ar' => ['sentence' => 'ملعقة من فضلك', 'correct' => ['ملعقة', 'من فضلك'], 'extra' => ['صحن']],
                        ],
                    ],
                    'c' => [
                        'words' => ['boşqab', 'təmiz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The plate is clean', 'correct' => ['the plate', 'is', 'clean'], 'extra' => ['spoon']],
                            'fr' => ['sentence' => 'L’assiette est propre', 'correct' => ['l’assiette', 'est', 'propre'], 'extra' => ['cuillère']],
                            'es' => ['sentence' => 'El plato está limpio', 'correct' => ['el plato', 'está', 'limpio'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Der Teller ist sauber', 'correct' => ['der Teller', 'ist', 'sauber'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'お皿はきれいです', 'correct' => ['お皿は', 'きれいです'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '접시는 깨끗해요', 'correct' => ['접시는', '깨끗해요'], 'extra' => ['숟가락']],
                            'tr' => ['sentence' => 'tabak temiz', 'correct' => ['tabak', 'temiz'], 'extra' => ['kaşık', 'çorba']],
                            'ru' => ['sentence' => 'тарелка чистый', 'correct' => ['тарелка', 'чистый'], 'extra' => ['ложка']],
                            'ar' => ['sentence' => 'صحن نظيف', 'correct' => ['صحن', 'نظيف'], 'extra' => ['ملعقة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Glass & Napkin', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Bir'], ['az' => 'Stəkan']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'stəkan', 'suyun'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A glass of water', 'correct' => ['a', 'glass', 'of water'], 'extra' => ['napkin']],
                            'fr' => ['sentence' => 'Un verre d’eau', 'correct' => ['un', 'verre', 'd’eau'], 'extra' => ['serviette']],
                            'es' => ['sentence' => 'Un vaso de agua', 'correct' => ['un', 'vaso', 'de agua'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Ein Glas Wasser', 'correct' => ['ein', 'Glas', 'Wasser'], 'extra' => ['Serviette']],
                            'ja' => ['sentence' => '水を一杯', 'correct' => ['水を', '一杯'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '물 한 잔', 'correct' => ['물', '한', '잔'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bir bardak su', 'correct' => ['bir', 'bardak', 'su'], 'extra' => ['peçete', 'masa']],
                            'ru' => ['sentence' => 'стакан воды', 'correct' => ['стакан', 'воды'], 'extra' => ['салфетка']],
                            'ar' => ['sentence' => 'كوب الماء', 'correct' => ['كوب', 'الماء'], 'extra' => ['منديل']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'salfet'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no napkin', 'correct' => ['there is no', 'napkin'], 'extra' => ['glass']],
                            'fr' => ['sentence' => 'Il n’y a pas de serviette', 'correct' => ['il n’y a pas', 'de serviette'], 'extra' => ['verre']],
                            'es' => ['sentence' => 'No hay servilleta', 'correct' => ['no hay', 'servilleta'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Es gibt keine Serviette', 'correct' => ['es gibt keine', 'Serviette'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => 'ナプキンがありません', 'correct' => ['ナプキンが', 'ありません'], 'extra' => ['コップ']],
                            'ko' => ['sentence' => '냅킨이 없어요', 'correct' => ['냅킨이', '없어요'], 'extra' => ['컵']],
                            'tr' => ['sentence' => 'peçete yok', 'correct' => ['peçete', 'yok'], 'extra' => ['bardak', 'su']],
                            'ru' => ['sentence' => 'нету салфетка', 'correct' => ['нету', 'салфетка'], 'extra' => ['стакан']],
                            'ar' => ['sentence' => 'لا يوجد منديل', 'correct' => ['لا يوجد', 'منديل'], 'extra' => ['كوب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'salfet', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A napkin please', 'correct' => ['a', 'napkin', 'please'], 'extra' => ['glass']],
                            'fr' => ['sentence' => 'Une serviette s’il vous plaît', 'correct' => ['une', 'serviette', 's’il vous plaît'], 'extra' => ['verre']],
                            'es' => ['sentence' => 'Una servilleta por favor', 'correct' => ['una', 'servilleta', 'por favor'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Eine Serviette bitte', 'correct' => ['eine', 'Serviette', 'bitte'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => 'ナプキンをお願いします', 'correct' => ['ナプキンを', 'お願いします'], 'extra' => ['コップ']],
                            'ko' => ['sentence' => '냅킨 부탁합니다', 'correct' => ['냅킨', '부탁합니다'], 'extra' => ['컵']],
                            'tr' => ['sentence' => 'peçete lütfen', 'correct' => ['peçete', 'lütfen'], 'extra' => ['bardak', 'su']],
                            'ru' => ['sentence' => 'салфетка пожалуйста', 'correct' => ['салфетка', 'пожалуйста'], 'extra' => ['стакан']],
                            'ar' => ['sentence' => 'منديل من فضلك', 'correct' => ['منديل', 'من فضلك'], 'extra' => ['كوب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: The Table Is Ready', 4,
                pictures: [['az' => 'Masa', 'img' => 'table'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Hazır'], ['az' => 'Deyil']],
                phrases: [
                    'a' => [
                        'words' => ['masa', 'hazır'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The table is ready', 'correct' => ['the table', 'is', 'ready'], 'extra' => ['clean']],
                            'fr' => ['sentence' => 'La table est prête', 'correct' => ['la table', 'est', 'prête'], 'extra' => ['propre']],
                            'es' => ['sentence' => 'La mesa está lista', 'correct' => ['la mesa', 'está', 'lista'], 'extra' => ['limpio']],
                            'de' => ['sentence' => 'Der Tisch ist fertig', 'correct' => ['der Tisch', 'ist', 'fertig'], 'extra' => ['sauber']],
                            'ja' => ['sentence' => 'テーブルは準備できています', 'correct' => ['テーブルは', '準備できています'], 'extra' => ['きれい']],
                            'ko' => ['sentence' => '테이블은 준비됐어요', 'correct' => ['테이블은', '준비됐어요'], 'extra' => ['깨끗한']],
                            'tr' => ['sentence' => 'masa hazır', 'correct' => ['masa', 'hazır'], 'extra' => ['temiz', 'menü']],
                            'ru' => ['sentence' => 'стол готов', 'correct' => ['стол', 'готов'], 'extra' => ['чистый']],
                            'ar' => ['sentence' => 'طاولة جاهز', 'correct' => ['طاولة', 'جاهز'], 'extra' => ['نظيف']],
                        ],
                    ],
                    'b' => [
                        'words' => ['masa', 'deyil', 'təmiz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The table is not clean', 'correct' => ['the table', 'is not', 'clean'], 'extra' => ['ready']],
                            'fr' => ['sentence' => 'La table n’est pas propre', 'correct' => ['la table', 'n’est pas', 'propre'], 'extra' => ['prêt']],
                            'es' => ['sentence' => 'La mesa no está limpia', 'correct' => ['la mesa', 'no está', 'limpia'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Der Tisch ist nicht sauber', 'correct' => ['der Tisch', 'ist nicht', 'sauber'], 'extra' => ['fertig']],
                            'ja' => ['sentence' => 'テーブルはきれいではありません', 'correct' => ['テーブルは', 'きれいでは', 'ありません'], 'extra' => ['準備できた']],
                            'ko' => ['sentence' => '테이블은 깨끗하지 않아요', 'correct' => ['테이블은', '깨끗하지 않아요'], 'extra' => ['준비된']],
                            'tr' => ['sentence' => 'masa temiz değil', 'correct' => ['masa', 'temiz', 'değil'], 'extra' => ['menü']],
                            'ru' => ['sentence' => 'стол не чистый', 'correct' => ['стол', 'не', 'чистый'], 'extra' => ['готов']],
                            'ar' => ['sentence' => 'طاولة ليس نظيف', 'correct' => ['طاولة', 'ليس', 'نظيف'], 'extra' => ['جاهز']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bağışlayın', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me please', 'correct' => ['excuse me', 'please'], 'extra' => ['please']],
                            'fr' => ['sentence' => "Excusez-moi s'il vous plaît", 'correct' => ['excusez-moi', "s'il vous plaît"], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Perdón por favor', 'correct' => ['perdón', 'por favor'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Entschuldigung bitte', 'correct' => ['Entschuldigung', 'bitte'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'すみませんお願いします', 'correct' => ['すみません', 'お願いします'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '실례합니다 부탁합니다', 'correct' => ['실례합니다', '부탁합니다'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'affedersiniz', 'correct' => ['affedersiniz'], 'extra' => ['masa', 'temiz']],
                            'ru' => ['sentence' => 'извините', 'correct' => ['извините'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'عفوا', 'correct' => ['عفوا'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Everything We Need', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Bir'], ['az' => 'Çəngəl']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'çəngəl', 'və', 'bir', 'bıçaq'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fork and a knife', 'correct' => ['a', 'fork', 'and', 'a', 'knife'], 'extra' => ['spoon']],
                            'fr' => ['sentence' => 'Une fourchette et un couteau', 'correct' => ['une', 'fourchette', 'et', 'un', 'couteau'], 'extra' => ['cuillère']],
                            'es' => ['sentence' => 'Un tenedor y un cuchillo', 'correct' => ['un', 'tenedor', 'y', 'un', 'cuchillo'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Eine Gabel und ein Messer', 'correct' => ['eine', 'Gabel', 'und', 'ein', 'Messer'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'フォークとナイフ', 'correct' => ['フォーク', 'と', 'ナイフ'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '포크와 나이프', 'correct' => ['포크와', '나이프'], 'extra' => ['숟가락']],
                            'tr' => ['sentence' => 'bir çatal ve bir bıçak', 'correct' => ['bir', 'çatal', 've', 'bir', 'bıçak'], 'extra' => ['bardak', 'su']],
                            'ru' => ['sentence' => 'вилка и нож', 'correct' => ['вилка', 'и', 'нож'], 'extra' => ['ложка']],
                            'ar' => ['sentence' => 'شوكة و سكين', 'correct' => ['شوكة', 'و', 'سكين'], 'extra' => ['ملعقة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'stəkan'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no glass', 'correct' => ['there is no', 'glass'], 'extra' => ['napkin']],
                            'fr' => ['sentence' => 'Il n’y a pas de verre', 'correct' => ['il n’y a pas', 'de verre'], 'extra' => ['serviette']],
                            'es' => ['sentence' => 'No hay vaso', 'correct' => ['no hay', 'vaso'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Es gibt kein Glas', 'correct' => ['es gibt kein', 'Glas'], 'extra' => ['Serviette']],
                            'ja' => ['sentence' => 'コップがありません', 'correct' => ['コップが', 'ありません'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '컵이 없어요', 'correct' => ['컵이', '없어요'], 'extra' => ['냅킨']],
                            'tr' => ['sentence' => 'bardak yok', 'correct' => ['bardak', 'yok'], 'extra' => ['çatal', 'su']],
                            'ru' => ['sentence' => 'нету стакан', 'correct' => ['нету', 'стакан'], 'extra' => ['салфетка']],
                            'ar' => ['sentence' => 'لا يوجد كوب', 'correct' => ['لا يوجد', 'كوب'], 'extra' => ['منديل']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'boşqab', 'və', 'bir', 'qaşıq', 'zəhmət olmasa'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'A plate and a spoon please', 'correct' => ['a', 'plate', 'and', 'a', 'spoon', 'please'], 'extra' => ['fork']],
                            'fr' => ['sentence' => 'Une assiette et une cuillère s’il vous plaît', 'correct' => ['une', 'assiette', 'et', 'une', 'cuillère', 's’il vous plaît'], 'extra' => ['fourchette']],
                            'es' => ['sentence' => 'Un plato y una cuchara por favor', 'correct' => ['un', 'plato', 'y', 'una', 'cuchara', 'por favor'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Einen Teller und einen Löffel bitte', 'correct' => ['einen', 'Teller', 'und', 'einen', 'Löffel', 'bitte'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'お皿とスプーンをお願いします', 'correct' => ['お皿', 'と', 'スプーンを', 'お願いします'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '접시와 숟가락 부탁합니다', 'correct' => ['접시와', '숟가락', '부탁합니다'], 'extra' => ['포크']],
                            'tr' => ['sentence' => 'tabak ve kaşık lütfen', 'correct' => ['tabak', 've', 'kaşık', 'lütfen'], 'extra' => ['çatal', 'bardak']],
                            'ru' => ['sentence' => 'тарелка и ложка пожалуйста', 'correct' => ['тарелка', 'и', 'ложка', 'пожалуйста'], 'extra' => ['вилка']],
                            'ar' => ['sentence' => 'صحن و ملعقة من فضلك', 'correct' => ['صحن', 'و', 'ملعقة', 'من فضلك'], 'extra' => ['شوكة']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
