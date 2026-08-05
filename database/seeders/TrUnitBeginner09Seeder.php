<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Güneş' => 'sun', 'Yağmur' => 'rain', 'Kar' => 'snow', 'Rüzgâr' => 'wind',
        'Yaz' => 'summer', 'Kış' => 'winter', 'İlkbahar' => 'spring', 'Sonbahar' => 'autumn',
    ];

    /**
     * Turkish Beginner Unit 9 — weather and seasons.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * STILL NO COPULA, AND THAT IS THE POINT.
     *
     * "Today is hot" is `bugün sıcak` — literally "today hot". Turkish has no
     * verb there, and after nine units the learner should find that ordinary
     * rather than strange. The translations supply "is" only because English,
     * French, Spanish and German cannot do without it.
     *
     * This is also the last unit before the review, so the phrases deliberately
     * pull vocabulary from across the whole chapter: seasons combine with the
     * colours of Unit 5, the places of Unit 6 and the verbs of Unit 7.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Weather & Seasons', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Sun & Rain', 1,
                pictures: [['tr' => 'Güneş', 'img' => 'sun'], ['tr' => 'Yağmur', 'img' => 'rain']],
                plain: [['tr' => 'Bugün'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bugün', 'güneş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The sun today', 'correct' => ['today', 'sun'], 'extra' => ['rain']],
                            'fr' => ['sentence' => "Le soleil aujourd'hui", 'correct' => ["aujourd'hui", 'soleil'], 'extra' => ['pluie']],
                            'es' => ['sentence' => 'El sol hoy', 'correct' => ['hoy', 'sol'], 'extra' => ['lluvia']],
                            'de' => ['sentence' => 'Die Sonne heute', 'correct' => ['heute', 'Sonne'], 'extra' => ['Regen']],
                            'ja' => ['sentence' => '今日の太陽', 'correct' => ['今日', 'の', '太陽'], 'extra' => ['雨']],
                            'ko' => ['sentence' => '오늘 태양', 'correct' => ['오늘', '태양'], 'extra' => ['비']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bugün', 'yağmur'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Rain today', 'correct' => ['rain', 'today'], 'extra' => ['sun']],
                            'fr' => ['sentence' => "La pluie aujourd'hui", 'correct' => ["aujourd'hui", 'pluie'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Lluvia hoy', 'correct' => ['lluvia', 'hoy'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Regen heute', 'correct' => ['Regen', 'heute'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '今日は雨', 'correct' => ['今日', 'は', '雨'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '오늘 비', 'correct' => ['오늘', '비'], 'extra' => ['태양']],
                        ],
                    ],
                    'c' => [
                        'words' => ['güneş', 've', 'yağmur'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Sun and rain', 'correct' => ['sun', 'and', 'rain'], 'extra' => ['snow']],
                            'fr' => ['sentence' => 'Soleil et pluie', 'correct' => ['soleil', 'et', 'pluie'], 'extra' => ['neige']],
                            'es' => ['sentence' => 'Sol y lluvia', 'correct' => ['sol', 'y', 'lluvia'], 'extra' => ['nieve']],
                            'de' => ['sentence' => 'Sonne und Regen', 'correct' => ['Sonne', 'und', 'Regen'], 'extra' => ['Schnee']],
                            'ja' => ['sentence' => '太陽と雨', 'correct' => ['太陽', 'と', '雨'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '태양과 비', 'correct' => ['태양과', '비'], 'extra' => ['눈']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Snow & Wind', 2,
                pictures: [['tr' => 'Kar', 'img' => 'snow'], ['tr' => 'Rüzgâr', 'img' => 'wind']],
                plain: [['tr' => 'Soğuk'], ['tr' => 'Bugün']],
                phrases: [
                    'a' => [
                        'words' => ['bugün', 'kar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Snow today', 'correct' => ['snow', 'today'], 'extra' => ['wind']],
                            'fr' => ['sentence' => "La neige aujourd'hui", 'correct' => ["aujourd'hui", 'neige'], 'extra' => ['vent']],
                            'es' => ['sentence' => 'Nieve hoy', 'correct' => ['nieve', 'hoy'], 'extra' => ['viento']],
                            'de' => ['sentence' => 'Schnee heute', 'correct' => ['Schnee', 'heute'], 'extra' => ['Wind']],
                            'ja' => ['sentence' => '今日は雪', 'correct' => ['今日', 'は', '雪'], 'extra' => ['風']],
                            'ko' => ['sentence' => '오늘 눈', 'correct' => ['오늘', '눈'], 'extra' => ['바람']],
                        ],
                    ],
                    'b' => [
                        // No copula: "today cold" is a complete Turkish sentence.
                        'words' => ['bugün', 'soğuk'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Today is cold', 'correct' => ['today', 'cold'], 'extra' => ['hot']],
                            'fr' => ['sentence' => "Aujourd'hui il fait froid", 'correct' => ["aujourd'hui", 'froid'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'Hoy hace frío', 'correct' => ['hoy', 'frío'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Heute ist es kalt', 'correct' => ['heute', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '今日は寒い', 'correct' => ['今日', 'は', '寒い'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '오늘은 춥다', 'correct' => ['오늘은', '춥다'], 'extra' => ['더운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'kar', 've', 'rüzgâr'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Snow and wind today', 'correct' => ['snow', 'and', 'wind', 'today'], 'extra' => ['sun']],
                            'fr' => ['sentence' => "La neige et le vent aujourd'hui", 'correct' => ["aujourd'hui", 'neige', 'et', 'vent'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Nieve y viento hoy', 'correct' => ['nieve', 'y', 'viento', 'hoy'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Schnee und Wind heute', 'correct' => ['Schnee', 'und', 'Wind', 'heute'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '今日は雪と風', 'correct' => ['今日', 'は', '雪', 'と', '風'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '오늘 눈과 바람', 'correct' => ['오늘', '눈과', '바람'], 'extra' => ['태양']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Summer & Winter', 3,
                pictures: [['tr' => 'Yaz', 'img' => 'summer'], ['tr' => 'Kış', 'img' => 'winter']],
                plain: [['tr' => 'Sıcak'], ['tr' => 'Soğuk']],
                phrases: [
                    'a' => [
                        'words' => ['yaz', 'sıcak'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Summer is hot', 'correct' => ['summer', 'hot'], 'extra' => ['winter']],
                            'fr' => ['sentence' => "L'été est chaud", 'correct' => ['été', 'chaud'], 'extra' => ['hiver']],
                            'es' => ['sentence' => 'El verano es caliente', 'correct' => ['verano', 'caliente'], 'extra' => ['invierno']],
                            'de' => ['sentence' => 'Der Sommer ist heiß', 'correct' => ['Sommer', 'heiß'], 'extra' => ['Winter']],
                            'ja' => ['sentence' => '夏は暑い', 'correct' => ['夏', 'は', '暑い'], 'extra' => ['冬']],
                            'ko' => ['sentence' => '여름은 덥다', 'correct' => ['여름은', '덥다'], 'extra' => ['겨울']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kış', 'soğuk'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Winter is cold', 'correct' => ['winter', 'cold'], 'extra' => ['summer']],
                            'fr' => ['sentence' => "L'hiver est froid", 'correct' => ['hiver', 'froid'], 'extra' => ['été']],
                            'es' => ['sentence' => 'El invierno es frío', 'correct' => ['invierno', 'frío'], 'extra' => ['verano']],
                            'de' => ['sentence' => 'Der Winter ist kalt', 'correct' => ['Winter', 'kalt'], 'extra' => ['Sommer']],
                            'ja' => ['sentence' => '冬は寒い', 'correct' => ['冬', 'は', '寒い'], 'extra' => ['夏']],
                            'ko' => ['sentence' => '겨울은 춥다', 'correct' => ['겨울은', '춥다'], 'extra' => ['여름']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yaz', 'sıcak', 've', 'kış', 'soğuk'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Summer is hot and winter is cold', 'correct' => ['summer', 'hot', 'and', 'winter', 'cold'], 'extra' => ['spring']],
                            'fr' => ['sentence' => "L'été est chaud et l'hiver est froid", 'correct' => ['été', 'chaud', 'et', 'hiver', 'froid'], 'extra' => ['printemps']],
                            'es' => ['sentence' => 'El verano es caliente y el invierno es frío', 'correct' => ['verano', 'caliente', 'y', 'invierno', 'frío'], 'extra' => ['primavera']],
                            'de' => ['sentence' => 'Der Sommer ist heiß und der Winter ist kalt', 'correct' => ['Sommer', 'heiß', 'und', 'Winter', 'kalt'], 'extra' => ['Frühling']],
                            'ja' => ['sentence' => '夏は暑くて冬は寒い', 'correct' => ['夏', 'は', '暑くて', '冬', 'は', '寒い'], 'extra' => ['春']],
                            'ko' => ['sentence' => '여름은 덥고 겨울은 춥다', 'correct' => ['여름은', '덥고', '겨울은', '춥다'], 'extra' => ['봄']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Spring & Autumn', 4,
                pictures: [['tr' => 'İlkbahar', 'img' => 'spring'], ['tr' => 'Sonbahar', 'img' => 'autumn']],
                plain: [['tr' => 'Ve'], ['tr' => 'Yağmur']],
                phrases: [
                    'a' => [
                        'words' => ['ilkbahar', 've', 'yaz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Spring and summer', 'correct' => ['spring', 'and', 'summer'], 'extra' => ['autumn']],
                            'fr' => ['sentence' => "Le printemps et l'été", 'correct' => ['printemps', 'et', 'été'], 'extra' => ['automne']],
                            'es' => ['sentence' => 'Primavera y verano', 'correct' => ['primavera', 'y', 'verano'], 'extra' => ['otoño']],
                            'de' => ['sentence' => 'Frühling und Sommer', 'correct' => ['Frühling', 'und', 'Sommer'], 'extra' => ['Herbst']],
                            'ja' => ['sentence' => '春と夏', 'correct' => ['春', 'と', '夏'], 'extra' => ['秋']],
                            'ko' => ['sentence' => '봄과 여름', 'correct' => ['봄과', '여름'], 'extra' => ['가을']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sonbahar', 'yağmur'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Rain in autumn', 'correct' => ['autumn', 'rain'], 'extra' => ['spring']],
                            'fr' => ['sentence' => "La pluie en automne", 'correct' => ['automne', 'pluie'], 'extra' => ['printemps']],
                            'es' => ['sentence' => 'Lluvia en otoño', 'correct' => ['otoño', 'lluvia'], 'extra' => ['primavera']],
                            'de' => ['sentence' => 'Regen im Herbst', 'correct' => ['Herbst', 'Regen'], 'extra' => ['Frühling']],
                            'ja' => ['sentence' => '秋の雨', 'correct' => ['秋', 'の', '雨'], 'extra' => ['春']],
                            'ko' => ['sentence' => '가을 비', 'correct' => ['가을', '비'], 'extra' => ['봄']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ilkbahar', 've', 'sonbahar', 'bir', 'gün'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Spring and autumn a day', 'correct' => ['spring', 'and', 'autumn', 'a', 'day'], 'extra' => ['week']],
                            'fr' => ['sentence' => "Le printemps et l'automne un jour", 'correct' => ['printemps', 'et', 'automne', 'un', 'jour'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Primavera y otoño un día', 'correct' => ['primavera', 'y', 'otoño', 'un', 'día'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Frühling und Herbst ein Tag', 'correct' => ['Frühling', 'und', 'Herbst', 'ein', 'Tag'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '春と秋、一日', 'correct' => ['春', 'と', '秋', '一', '日'], 'extra' => ['週']],
                            'ko' => ['sentence' => '봄과 가을 하루', 'correct' => ['봄과', '가을', '하루'], 'extra' => ['주']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Weather', 5,
                pictures: [['tr' => 'Yağmur', 'img' => 'rain'], ['tr' => 'Güneş', 'img' => 'sun']],
                plain: [['tr' => 'Sıcak'], ['tr' => 'Yaz']],
                phrases: [
                    'a' => [
                        'words' => ['bugün', 'sıcak'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Today is hot', 'correct' => ['today', 'hot'], 'extra' => ['cold']],
                            'fr' => ['sentence' => "Aujourd'hui il fait chaud", 'correct' => ["aujourd'hui", 'chaud'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'Hoy hace calor', 'correct' => ['hoy', 'caliente'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Heute ist es heiß', 'correct' => ['heute', 'heiß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '今日は暑い', 'correct' => ['今日', 'は', '暑い'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '오늘은 덥다', 'correct' => ['오늘은', '덥다'], 'extra' => ['추운']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yaz', 'parka', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park in summer', 'correct' => ['summer', 'to go', 'to the park'], 'extra' => ['winter']],
                            'fr' => ['sentence' => "Aller au parc en été", 'correct' => ['été', 'aller', 'au parc'], 'extra' => ['hiver']],
                            'es' => ['sentence' => 'Ir al parque en verano', 'correct' => ['verano', 'ir', 'al parque'], 'extra' => ['invierno']],
                            'de' => ['sentence' => 'Im Sommer zum Park gehen', 'correct' => ['Sommer', 'zum Park', 'gehen'], 'extra' => ['Winter']],
                            'ja' => ['sentence' => '夏に公園へ行く', 'correct' => ['夏', 'に', '公園', 'へ', '行く'], 'extra' => ['冬']],
                            'ko' => ['sentence' => '여름에 공원에 가다', 'correct' => ['여름에', '공원에', '가다'], 'extra' => ['겨울']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'güneş', 've', 'yarın', 'yağmur'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Sun today and rain tomorrow', 'correct' => ['sun', 'today', 'and', 'rain', 'tomorrow'], 'extra' => ['snow']],
                            'fr' => ['sentence' => "Le soleil aujourd'hui et la pluie demain", 'correct' => ["aujourd'hui", 'soleil', 'et', 'demain', 'pluie'], 'extra' => ['neige']],
                            'es' => ['sentence' => 'Sol hoy y lluvia mañana', 'correct' => ['sol', 'hoy', 'y', 'lluvia', 'mañana'], 'extra' => ['nieve']],
                            'de' => ['sentence' => 'Sonne heute und Regen morgen', 'correct' => ['Sonne', 'heute', 'und', 'Regen', 'morgen'], 'extra' => ['Schnee']],
                            'ja' => ['sentence' => '今日は太陽、明日は雨', 'correct' => ['今日', 'は', '太陽', '明日', 'は', '雨'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '오늘 태양과 내일 비', 'correct' => ['오늘', '태양과', '내일', '비'], 'extra' => ['눈']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
