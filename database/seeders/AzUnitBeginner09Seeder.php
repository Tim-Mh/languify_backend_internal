<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitBeginner09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Günəş' => 'sun', 'Yağış' => 'rain', 'Qar' => 'snow', 'Külək' => 'wind',
        'Yay' => 'summer', 'Qış' => 'winter', 'Getmək' => 'park', 'Qəhvə' => 'coffee',
    ];

    /**
     * Azerbaijani Beginner Unit 9.
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
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Weather & Seasons', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Sun & Rain', 1,
                pictures: [['az' => 'Günəş', 'img' => 'sun'], ['az' => 'Yağış', 'img' => 'rain']],
                plain: [['az' => 'Bu gün'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['günəş', 'bu gün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The sun today', 'correct' => ['the sun', 'today'], 'extra' => ['rain']],
                            'fr' => ['sentence' => "Le soleil aujourd'hui", 'correct' => ["aujourd'hui", 'soleil'], 'extra' => ['pluie']],
                            'es' => ['sentence' => 'El sol hoy', 'correct' => ['el sol', 'hoy'], 'extra' => ['lluvia']],
                            'de' => ['sentence' => 'Die Sonne heute', 'correct' => ['die Sonne', 'heute'], 'extra' => ['Regen']],
                            'ja' => ['sentence' => '今日の太陽', 'correct' => ['今日', 'の', '太陽'], 'extra' => ['雨']],
                            'ko' => ['sentence' => '오늘 태양', 'correct' => ['오늘', '태양'], 'extra' => ['비']],
                            'tr' => ['sentence' => 'bugün güneş', 'correct' => ['bugün', 'güneş'], 'extra' => ['ve', 'yağmur']],
                            'ru' => ['sentence' => 'солнце сегодня', 'correct' => ['солнце', 'сегодня'], 'extra' => ['дождь']],
                            'ar' => ['sentence' => 'شمس اليوم', 'correct' => ['شمس', 'اليوم'], 'extra' => ['مطر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yağış', 'bu gün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Rain today', 'correct' => ['rain', 'today'], 'extra' => ['sun']],
                            'fr' => ['sentence' => "La pluie aujourd'hui", 'correct' => ["aujourd'hui", 'pluie'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Lluvia hoy', 'correct' => ['lluvia', 'hoy'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Regen heute', 'correct' => ['Regen', 'heute'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '今日は雨', 'correct' => ['今日', 'は', '雨'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '오늘 비', 'correct' => ['오늘', '비'], 'extra' => ['태양']],
                            'tr' => ['sentence' => 'bugün yağmur', 'correct' => ['bugün', 'yağmur'], 'extra' => ['ve', 'güneş']],
                            'ru' => ['sentence' => 'дождь сегодня', 'correct' => ['дождь', 'сегодня'], 'extra' => ['солнце']],
                            'ar' => ['sentence' => 'مطر اليوم', 'correct' => ['مطر', 'اليوم'], 'extra' => ['شمس']],
                        ],
                    ],
                    'c' => [
                        'words' => ['günəş', 'və', 'yağış'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Sun and rain', 'correct' => ['sun', 'and', 'rain'], 'extra' => ['snow']],
                            'fr' => ['sentence' => 'Soleil et pluie', 'correct' => ['soleil', 'et', 'pluie'], 'extra' => ['neige']],
                            'es' => ['sentence' => 'Sol y lluvia', 'correct' => ['sol', 'y', 'lluvia'], 'extra' => ['nieve']],
                            'de' => ['sentence' => 'Sonne und Regen', 'correct' => ['Sonne', 'und', 'Regen'], 'extra' => ['Schnee']],
                            'ja' => ['sentence' => '太陽と雨', 'correct' => ['太陽', 'と', '雨'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '태양과 비', 'correct' => ['태양과', '비'], 'extra' => ['눈']],
                            'tr' => ['sentence' => 'güneş ve yağmur', 'correct' => ['güneş', 've', 'yağmur'], 'extra' => ['bugün']],
                            'ru' => ['sentence' => 'солнце и дождь', 'correct' => ['солнце', 'и', 'дождь'], 'extra' => ['снег']],
                            'ar' => ['sentence' => 'شمس و مطر', 'correct' => ['شمس', 'و', 'مطر'], 'extra' => ['ثلج']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Snow & Wind', 2,
                pictures: [['az' => 'Qar', 'img' => 'snow'], ['az' => 'Külək', 'img' => 'wind']],
                plain: [['az' => 'Bu gün'], ['az' => 'Soyuq']],
                phrases: [
                    'a' => [
                        'words' => ['qar', 'bu gün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Snow today', 'correct' => ['snow', 'today'], 'extra' => ['wind']],
                            'fr' => ['sentence' => "La neige aujourd'hui", 'correct' => ["aujourd'hui", 'neige'], 'extra' => ['vent']],
                            'es' => ['sentence' => 'Nieve hoy', 'correct' => ['nieve', 'hoy'], 'extra' => ['viento']],
                            'de' => ['sentence' => 'Schnee heute', 'correct' => ['Schnee', 'heute'], 'extra' => ['Wind']],
                            'ja' => ['sentence' => '今日は雪', 'correct' => ['今日', 'は', '雪'], 'extra' => ['風']],
                            'ko' => ['sentence' => '오늘 눈', 'correct' => ['오늘', '눈'], 'extra' => ['바람']],
                            'tr' => ['sentence' => 'bugün kar', 'correct' => ['bugün', 'kar'], 'extra' => ['soğuk', 'rüzgâr']],
                            'ru' => ['sentence' => 'снег сегодня', 'correct' => ['снег', 'сегодня'], 'extra' => ['ветер']],
                            'ar' => ['sentence' => 'ثلج اليوم', 'correct' => ['ثلج', 'اليوم'], 'extra' => ['ريح']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu gün', 'soyuq'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today is cold', 'correct' => ['today is', 'cold'], 'extra' => ['hot']],
                            'fr' => ['sentence' => "Aujourd'hui il fait froid", 'correct' => ["aujourd'hui", 'froid'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'Hoy hace frío', 'correct' => ['hoy hace', 'frío'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Heute ist es kalt', 'correct' => ['heute ist es', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '今日は寒い', 'correct' => ['今日', 'は', '寒い'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '오늘은 춥다', 'correct' => ['오늘은', '춥다'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'bugün soğuk', 'correct' => ['bugün', 'soğuk'], 'extra' => ['kar', 'rüzgâr']],
                            'ru' => ['sentence' => 'сегодня холодный', 'correct' => ['сегодня', 'холодный'], 'extra' => ['горячий']],
                            'ar' => ['sentence' => 'اليوم بارد', 'correct' => ['اليوم', 'بارد'], 'extra' => ['ساخن']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qar', 'və', 'külək', 'bu gün'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Snow and wind today', 'correct' => ['snow', 'and', 'wind', 'today'], 'extra' => ['sun']],
                            'fr' => ['sentence' => "La neige et le vent aujourd'hui", 'correct' => ["aujourd'hui", 'neige', 'et', 'vent'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Nieve y viento hoy', 'correct' => ['nieve', 'y', 'viento', 'hoy'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Schnee und Wind heute', 'correct' => ['Schnee', 'und', 'Wind', 'heute'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '今日は雪と風', 'correct' => ['今日', 'は', '雪', 'と', '風'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '오늘 눈과 바람', 'correct' => ['오늘', '눈과', '바람'], 'extra' => ['태양']],
                            'tr' => ['sentence' => 'bugün kar ve rüzgâr', 'correct' => ['bugün', 'kar', 've', 'rüzgâr'], 'extra' => ['soğuk']],
                            'ru' => ['sentence' => 'снег и ветер сегодня', 'correct' => ['снег', 'и', 'ветер', 'сегодня'], 'extra' => ['солнце']],
                            'ar' => ['sentence' => 'ثلج و ريح اليوم', 'correct' => ['ثلج', 'و', 'ريح', 'اليوم'], 'extra' => ['شمس']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Summer & Winter', 3,
                pictures: [['az' => 'Yay', 'img' => 'summer'], ['az' => 'Qış', 'img' => 'winter']],
                plain: [['az' => 'İsti'], ['az' => 'Soyuq']],
                phrases: [
                    'a' => [
                        'words' => ['yay', 'isti'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Summer is hot', 'correct' => ['summer is', 'hot'], 'extra' => ['winter']],
                            'fr' => ['sentence' => "L'été est chaud", 'correct' => ['été', 'chaud'], 'extra' => ['hiver']],
                            'es' => ['sentence' => 'El verano es caliente', 'correct' => ['el verano es', 'caliente'], 'extra' => ['invierno']],
                            'de' => ['sentence' => 'Der Sommer ist heiß', 'correct' => ['Der Sommer ist', 'heiß'], 'extra' => ['Winter']],
                            'ja' => ['sentence' => '夏は暑い', 'correct' => ['夏', 'は', '暑い'], 'extra' => ['冬']],
                            'ko' => ['sentence' => '여름은 덥다', 'correct' => ['여름은', '덥다'], 'extra' => ['겨울']],
                            'tr' => ['sentence' => 'yaz sıcak', 'correct' => ['yaz', 'sıcak'], 'extra' => ['soğuk', 'kış']],
                            'ru' => ['sentence' => 'лето горячий', 'correct' => ['лето', 'горячий'], 'extra' => ['зима']],
                            'ar' => ['sentence' => 'صيف ساخن', 'correct' => ['صيف', 'ساخن'], 'extra' => ['شتاء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qış', 'soyuq'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Winter is cold', 'correct' => ['winter is', 'cold'], 'extra' => ['summer']],
                            'fr' => ['sentence' => "L'hiver est froid", 'correct' => ['hiver', 'froid'], 'extra' => ['été']],
                            'es' => ['sentence' => 'El invierno es frío', 'correct' => ['el invierno es', 'frío'], 'extra' => ['verano']],
                            'de' => ['sentence' => 'Der Winter ist kalt', 'correct' => ['Der Winter ist', 'kalt'], 'extra' => ['Sommer']],
                            'ja' => ['sentence' => '冬は寒い', 'correct' => ['冬', 'は', '寒い'], 'extra' => ['夏']],
                            'ko' => ['sentence' => '겨울은 춥다', 'correct' => ['겨울은', '춥다'], 'extra' => ['여름']],
                            'tr' => ['sentence' => 'kış soğuk', 'correct' => ['kış', 'soğuk'], 'extra' => ['sıcak', 'yaz']],
                            'ru' => ['sentence' => 'зима холодный', 'correct' => ['зима', 'холодный'], 'extra' => ['лето']],
                            'ar' => ['sentence' => 'شتاء بارد', 'correct' => ['شتاء', 'بارد'], 'extra' => ['صيف']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yay', 'isti', 'və', 'qış', 'soyuq'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'Summer is hot and winter is cold', 'correct' => ['summer is', 'hot', 'and', 'winter is', 'cold'], 'extra' => ['spring']],
                            'fr' => ['sentence' => "L'été est chaud et l'hiver est froid", 'correct' => ['été', 'chaud', 'et', 'hiver', 'froid'], 'extra' => ['printemps']],
                            'es' => ['sentence' => 'El verano es caliente y el invierno es frío', 'correct' => ['el verano es', 'caliente', 'y el', 'invierno es', 'frío'], 'extra' => ['primavera']],
                            'de' => ['sentence' => 'Der Sommer ist heiß und der Winter ist kalt', 'correct' => ['Der Sommer ist', 'heiß', 'und der', 'Winter ist', 'kalt'], 'extra' => ['Frühling']],
                            'ja' => ['sentence' => '夏は暑くて冬は寒い', 'correct' => ['夏', 'は', '暑くて', '冬', 'は', '寒い'], 'extra' => ['春']],
                            'ko' => ['sentence' => '여름은 덥고 겨울은 춥다', 'correct' => ['여름은', '덥고', '겨울은', '춥다'], 'extra' => ['봄']],
                            'tr' => ['sentence' => 'yaz sıcak ve kış soğuk', 'correct' => ['yaz', 'sıcak', 've', 'kış', 'soğuk'], 'extra' => []],
                            'ru' => ['sentence' => 'лето горячий и зима холодный', 'correct' => ['лето', 'горячий', 'и', 'зима', 'холодный'], 'extra' => ['весна']],
                            'ar' => ['sentence' => 'صيف ساخن و شتاء بارد', 'correct' => ['صيف', 'ساخن', 'و', 'شتاء', 'بارد'], 'extra' => ['ربيع']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Spring & Autumn', 4,
                pictures: [['az' => 'Yay', 'img' => 'summer'], ['az' => 'Yağış', 'img' => 'rain']],
                plain: [['az' => 'Yaz'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['yaz', 'və', 'yay'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Spring and summer', 'correct' => ['spring', 'and', 'summer'], 'extra' => ['autumn']],
                            'fr' => ['sentence' => "Le printemps et l'été", 'correct' => ['printemps', 'et', 'été'], 'extra' => ['automne']],
                            'es' => ['sentence' => 'Primavera y verano', 'correct' => ['primavera', 'y', 'verano'], 'extra' => ['otoño']],
                            'de' => ['sentence' => 'Frühling und Sommer', 'correct' => ['Frühling', 'und', 'Sommer'], 'extra' => ['Herbst']],
                            'ja' => ['sentence' => '春と夏', 'correct' => ['春', 'と', '夏'], 'extra' => ['秋']],
                            'ko' => ['sentence' => '봄과 여름', 'correct' => ['봄과', '여름'], 'extra' => ['가을']],
                            'tr' => ['sentence' => 'ilkbahar ve yaz', 'correct' => ['ilkbahar', 've', 'yaz'], 'extra' => ['yağmur', 'i̇lkbahar']],
                            'ru' => ['sentence' => 'весна и лето', 'correct' => ['весна', 'и', 'лето'], 'extra' => ['осень']],
                            'ar' => ['sentence' => 'ربيع و صيف', 'correct' => ['ربيع', 'و', 'صيف'], 'extra' => ['خريف']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yağış', 'içində', 'payız'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Rain in autumn', 'correct' => ['rain in', 'autumn'], 'extra' => ['spring']],
                            'fr' => ['sentence' => 'La pluie en automne', 'correct' => ['automne', 'pluie'], 'extra' => ['printemps']],
                            'es' => ['sentence' => 'Lluvia en otoño', 'correct' => ['lluvia en', 'otoño'], 'extra' => ['primavera']],
                            'de' => ['sentence' => 'Regen im Herbst', 'correct' => ['Regen im', 'Herbst'], 'extra' => ['Frühling']],
                            'ja' => ['sentence' => '秋の雨', 'correct' => ['秋', 'の', '雨'], 'extra' => ['春']],
                            'ko' => ['sentence' => '가을 비', 'correct' => ['가을', '비'], 'extra' => ['봄']],
                            'tr' => ['sentence' => 'sonbahar yağmur', 'correct' => ['sonbahar', 'yağmur'], 'extra' => ['ve', 'i̇lkbahar']],
                            'ru' => ['sentence' => 'дождь в осень', 'correct' => ['дождь', 'в', 'осень'], 'extra' => ['весна']],
                            'ar' => ['sentence' => 'مطر في خريف', 'correct' => ['مطر', 'في', 'خريف'], 'extra' => ['ربيع']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yaz', 'və', 'payız', 'bir', 'gün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Spring and autumn a day', 'correct' => ['spring', 'and', 'autumn', 'a', 'day'], 'extra' => ['week']],
                            'fr' => ['sentence' => "Le printemps et l'automne un jour", 'correct' => ['printemps', 'et', 'automne', 'un', 'jour'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Primavera y otoño un día', 'correct' => ['primavera', 'y', 'otoño', 'un', 'día'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Frühling und Herbst ein Tag', 'correct' => ['Frühling', 'und', 'Herbst', 'ein', 'Tag'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '春と秋、一日', 'correct' => ['春', 'と', '秋', '一', '日'], 'extra' => ['週']],
                            'ko' => ['sentence' => '봄과 가을 하루', 'correct' => ['봄과', '가을', '하루'], 'extra' => ['주']],
                            'tr' => ['sentence' => 'ilkbahar ve sonbahar bir gün', 'correct' => ['ilkbahar', 've', 'sonbahar', 'bir', 'gün'], 'extra' => ['yağmur', 'i̇lkbahar']],
                            'ru' => ['sentence' => 'весна и осень день', 'correct' => ['весна', 'и', 'осень', 'день'], 'extra' => ['неделя']],
                            'ar' => ['sentence' => 'ربيع و خريف يوم', 'correct' => ['ربيع', 'و', 'خريف', 'يوم'], 'extra' => ['أسبوع']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Weather', 5,
                pictures: [['az' => 'Getmək', 'img' => 'park'], ['az' => 'Günəş', 'img' => 'sun']],
                plain: [['az' => 'Bu gün'], ['az' => 'İsti']],
                phrases: [
                    'a' => [
                        'words' => ['bu gün', 'isti'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today is hot', 'correct' => ['today is', 'hot'], 'extra' => ['cold']],
                            'fr' => ['sentence' => "Aujourd'hui il fait chaud", 'correct' => ["aujourd'hui", 'chaud'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'Hoy hace calor', 'correct' => ['hoy hace', 'calor'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Heute ist es heiß', 'correct' => ['heute ist es', 'heiß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '今日は暑い', 'correct' => ['今日', 'は', '暑い'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '오늘은 덥다', 'correct' => ['오늘은', '덥다'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'bugün sıcak', 'correct' => ['bugün', 'sıcak'], 'extra' => ['yaz', 'yağmur']],
                            'ru' => ['sentence' => 'сегодня горячий', 'correct' => ['сегодня', 'горячий'], 'extra' => ['холодный']],
                            'ar' => ['sentence' => 'اليوم ساخن', 'correct' => ['اليوم', 'ساخن'], 'extra' => ['بارد']],
                        ],
                    ],
                    'b' => [
                        'words' => ['getmək', 'parkda', 'yayda'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park in summer', 'correct' => ['to go to', 'the park', 'in summer'], 'extra' => ['winter']],
                            'fr' => ['sentence' => 'Aller au parc en été', 'correct' => ['été', 'aller', 'au parc'], 'extra' => ['hiver']],
                            'es' => ['sentence' => 'Ir al parque en verano', 'correct' => ['ir al', 'parque en', 'verano'], 'extra' => ['invierno']],
                            'de' => ['sentence' => 'Im Sommer zum Park gehen', 'correct' => ['Im Sommer', 'zum Park', 'gehen'], 'extra' => ['Winter']],
                            'ja' => ['sentence' => '夏に公園へ行く', 'correct' => ['夏', 'に', '公園', 'へ', '行く'], 'extra' => ['冬']],
                            'ko' => ['sentence' => '여름에 공원에 가다', 'correct' => ['여름에', '공원에', '가다'], 'extra' => ['겨울']],
                            'tr' => ['sentence' => 'yaz parka gitmek', 'correct' => ['yaz', 'parka', 'gitmek'], 'extra' => ['sıcak', 'yağmur']],
                            'ru' => ['sentence' => 'идти в парк летом', 'correct' => ['идти', 'в', 'парк', 'летом'], 'extra' => ['зима']],
                            'ar' => ['sentence' => 'الذهاب إلى الحديقة صيفا', 'correct' => ['الذهاب', 'إلى', 'الحديقة', 'صيفا'], 'extra' => ['شتاء']],
                        ],
                    ],
                    'c' => [
                        'words' => ['günəş', 'bu gün', 'və', 'yağış', 'sabah'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Sun today and rain tomorrow', 'correct' => ['sun', 'today', 'and', 'rain', 'tomorrow'], 'extra' => ['snow']],
                            'fr' => ['sentence' => "Le soleil aujourd'hui et la pluie demain", 'correct' => ["aujourd'hui", 'soleil', 'et', 'demain', 'pluie'], 'extra' => ['neige']],
                            'es' => ['sentence' => 'Sol hoy y lluvia mañana', 'correct' => ['sol', 'hoy', 'y', 'lluvia', 'mañana'], 'extra' => ['nieve']],
                            'de' => ['sentence' => 'Sonne heute und Regen morgen', 'correct' => ['Sonne', 'heute', 'und', 'Regen', 'morgen'], 'extra' => ['Schnee']],
                            'ja' => ['sentence' => '今日は太陽、明日は雨', 'correct' => ['今日', 'は', '太陽', '明日', 'は', '雨'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '오늘 태양과 내일 비', 'correct' => ['오늘', '태양과', '내일', '비'], 'extra' => ['눈']],
                            'tr' => ['sentence' => 'bugün güneş ve yarın yağmur', 'correct' => ['bugün', 'güneş', 've', 'yarın', 'yağmur'], 'extra' => ['sıcak', 'yaz']],
                            'ru' => ['sentence' => 'солнце сегодня и дождь завтра', 'correct' => ['солнце', 'сегодня', 'и', 'дождь', 'завтра'], 'extra' => ['снег']],
                            'ar' => ['sentence' => 'شمس اليوم و مطر غدا', 'correct' => ['شمس', 'اليوم', 'و', 'مطر', 'غدا'], 'extra' => ['ثلج']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
