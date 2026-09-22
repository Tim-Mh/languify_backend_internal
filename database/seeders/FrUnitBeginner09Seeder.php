<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = [
        'Pluie' => 'rain', 'Neige' => 'snow', 'Vent' => 'wind', 'Soleil' => 'sun',
        'Printemps' => 'spring', 'Été' => 'summer', 'Automne' => 'autumn', 'Hiver' => 'winter',
    ];

    /** French Beginner Unit 9 — the weather and the seasons. */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Weather & Seasons', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Rain & Snow', 1,
                pictures: [['fr' => 'Pluie', 'img' => 'rain'], ['fr' => 'Neige', 'img' => 'snow']],
                plain: [['fr' => 'Temps'], ['fr' => 'Ciel']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'temps'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The weather', 'correct' => ['the', 'weather'], 'extra' => ['sky', 'rain']],
                            'az' => ['sentence' => 'hava', 'correct' => ['hava'], 'extra' => ['göy', 'yağış']],
                            'ar' => ['sentence' => 'طقس', 'correct' => ['طقس'], 'extra' => ['سماء', 'مطر']],
                            'ru' => ['sentence' => 'погода', 'correct' => ['погода'], 'extra' => ['небо', 'дождь']],
                            'es' => ['sentence' => 'El tiempo', 'correct' => ['el', 'tiempo'], 'extra' => ['cielo', 'lluvia']],
                            'de' => ['sentence' => 'Das Wetter', 'correct' => ['das', 'Wetter'], 'extra' => ['Himmel', 'Regen']],
                            'ja' => ['sentence' => '天気', 'correct' => ['天気'], 'extra' => ['空', '雨']],
                            'ko' => ['sentence' => '날씨', 'correct' => ['날씨'], 'extra' => ['하늘', '비']],
                            'tr' => ['sentence' => 'hava', 'correct' => ['hava'], 'extra' => ['gökyüzü', 'yağmur']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'ciel'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The sky', 'correct' => ['the', 'sky'], 'extra' => ['weather', 'snow']],
                            'az' => ['sentence' => 'göy', 'correct' => ['göy'], 'extra' => ['hava', 'qar']],
                            'ar' => ['sentence' => 'سماء', 'correct' => ['سماء'], 'extra' => ['طقس', 'ثلج']],
                            'ru' => ['sentence' => 'небо', 'correct' => ['небо'], 'extra' => ['погода', 'снег']],
                            'es' => ['sentence' => 'El cielo', 'correct' => ['el', 'cielo'], 'extra' => ['tiempo', 'nieve']],
                            'de' => ['sentence' => 'Der Himmel', 'correct' => ['der', 'Himmel'], 'extra' => ['Wetter', 'Schnee']],
                            'ja' => ['sentence' => '空', 'correct' => ['空'], 'extra' => ['天気', '雪']],
                            'ko' => ['sentence' => '하늘', 'correct' => ['하늘'], 'extra' => ['날씨', '눈']],
                            'tr' => ['sentence' => 'gökyüzü', 'correct' => ['gökyüzü'], 'extra' => ['hava', 'kar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'pluie', 'et', 'la', 'neige'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The rain and the snow', 'correct' => ['the', 'rain', 'and', 'the', 'snow'], 'extra' => ['sky']],
                            'az' => ['sentence' => 'yağış və qar', 'correct' => ['yağış', 'və', 'qar'], 'extra' => ['göy']],
                            'ar' => ['sentence' => 'مطر و ثلج', 'correct' => ['مطر', 'و', 'ثلج'], 'extra' => ['سماء']],
                            'ru' => ['sentence' => 'дождь и снег', 'correct' => ['дождь', 'и', 'снег'], 'extra' => ['небо']],
                            'es' => ['sentence' => 'La lluvia y la nieve', 'correct' => ['la', 'lluvia', 'y', 'la', 'nieve'], 'extra' => ['cielo']],
                            'de' => ['sentence' => 'Der Regen und der Schnee', 'correct' => ['der', 'Regen', 'und', 'der', 'Schnee'], 'extra' => ['Himmel']],
                            'ja' => ['sentence' => '雨と雪', 'correct' => ['雨', 'と', '雪'], 'extra' => ['空']],
                            'ko' => ['sentence' => '비와 눈', 'correct' => ['비와', '눈'], 'extra' => ['하늘']],
                            'tr' => ['sentence' => 'yağmur ve kar', 'correct' => ['yağmur', 've', 'kar'], 'extra' => ['gökyüzü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Wind & Sun', 2,
                pictures: [['fr' => 'Vent', 'img' => 'wind'], ['fr' => 'Soleil', 'img' => 'sun']],
                plain: [['fr' => 'Nuage'], ['fr' => 'Saison']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'nuage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A cloud', 'correct' => ['a', 'cloud'], 'extra' => ['season', 'wind']],
                            'az' => ['sentence' => 'bir bulud', 'correct' => ['bir', 'bulud'], 'extra' => ['mövsüm', 'külək']],
                            'ar' => ['sentence' => 'سحابة', 'correct' => ['سحابة'], 'extra' => ['موسم', 'ريح']],
                            'ru' => ['sentence' => 'облако', 'correct' => ['облако'], 'extra' => ['сезон', 'ветер']],
                            'es' => ['sentence' => 'Una nube', 'correct' => ['una', 'nube'], 'extra' => ['estación', 'viento']],
                            'de' => ['sentence' => 'Eine Wolke', 'correct' => ['eine', 'Wolke'], 'extra' => ['Jahreszeit', 'Wind']],
                            'ja' => ['sentence' => '雲', 'correct' => ['雲'], 'extra' => ['季節', '風']],
                            'ko' => ['sentence' => '구름', 'correct' => ['구름'], 'extra' => ['계절', '바람']],
                            'tr' => ['sentence' => 'bir bulut', 'correct' => ['bir', 'bulut'], 'extra' => ['mevsim', 'rüzgâr']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'saison'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A season', 'correct' => ['a', 'season'], 'extra' => ['cloud', 'sun']],
                            'az' => ['sentence' => 'bir mövsüm', 'correct' => ['bir', 'mövsüm'], 'extra' => ['bulud', 'günəş']],
                            'ar' => ['sentence' => 'موسم', 'correct' => ['موسم'], 'extra' => ['سحابة', 'شمس']],
                            'ru' => ['sentence' => 'сезон', 'correct' => ['сезон'], 'extra' => ['облако', 'солнце']],
                            'es' => ['sentence' => 'Una estación', 'correct' => ['una', 'estación'], 'extra' => ['nube', 'sol']],
                            'de' => ['sentence' => 'Eine Jahreszeit', 'correct' => ['eine', 'Jahreszeit'], 'extra' => ['Wolke', 'Sonne']],
                            'ja' => ['sentence' => '季節', 'correct' => ['季節'], 'extra' => ['雲', '太陽']],
                            'ko' => ['sentence' => '계절', 'correct' => ['계절'], 'extra' => ['구름', '태양']],
                            'tr' => ['sentence' => 'bir mevsim', 'correct' => ['bir', 'mevsim'], 'extra' => ['bulut', 'güneş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'soleil', 'et', 'le', 'vent'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The sun and the wind', 'correct' => ['the', 'sun', 'and', 'the', 'wind'], 'extra' => ['cloud']],
                            'az' => ['sentence' => 'günəş və külək', 'correct' => ['günəş', 'və', 'külək'], 'extra' => ['bulud']],
                            'ar' => ['sentence' => 'شمس و ريح', 'correct' => ['شمس', 'و', 'ريح'], 'extra' => ['سحابة']],
                            'ru' => ['sentence' => 'солнце и ветер', 'correct' => ['солнце', 'и', 'ветер'], 'extra' => ['облако']],
                            'es' => ['sentence' => 'El sol y el viento', 'correct' => ['el', 'sol', 'y', 'el', 'viento'], 'extra' => ['nube']],
                            'de' => ['sentence' => 'Die Sonne und der Wind', 'correct' => ['die', 'Sonne', 'und', 'der', 'Wind'], 'extra' => ['Wolke']],
                            'ja' => ['sentence' => '太陽と風', 'correct' => ['太陽', 'と', '風'], 'extra' => ['雲']],
                            'ko' => ['sentence' => '태양과 바람', 'correct' => ['태양과', '바람'], 'extra' => ['구름']],
                            'tr' => ['sentence' => 'güneş ve rüzgâr', 'correct' => ['güneş', 've', 'rüzgâr'], 'extra' => ['bulut']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Spring & Summer', 3,
                pictures: [['fr' => 'Printemps', 'img' => 'spring'], ['fr' => 'Été', 'img' => 'summer']],
                plain: [['fr' => 'Mois'], ['fr' => 'Année']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'mois'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A month', 'correct' => ['a', 'month'], 'extra' => ['year', 'spring']],
                            'az' => ['sentence' => 'bir ay', 'correct' => ['bir', 'ay'], 'extra' => ['il', 'yaz']],
                            'ar' => ['sentence' => 'شهر', 'correct' => ['شهر'], 'extra' => ['سنة', 'ربيع']],
                            'ru' => ['sentence' => 'месяц', 'correct' => ['месяц'], 'extra' => ['год', 'весна']],
                            'es' => ['sentence' => 'Un mes', 'correct' => ['un', 'mes'], 'extra' => ['año', 'primavera']],
                            'de' => ['sentence' => 'Ein Monat', 'correct' => ['ein', 'Monat'], 'extra' => ['Jahr', 'Frühling']],
                            'ja' => ['sentence' => '一か月', 'correct' => ['一', 'か', '月'], 'extra' => ['年', '春']],
                            'ko' => ['sentence' => '한 달', 'correct' => ['한', '달'], 'extra' => ['년', '봄']],
                            'tr' => ['sentence' => 'bir ay', 'correct' => ['bir', 'ay'], 'extra' => ['yıl', 'ilkbahar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'année'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A year', 'correct' => ['a', 'year'], 'extra' => ['month', 'summer']],
                            'az' => ['sentence' => 'bir il', 'correct' => ['bir', 'il'], 'extra' => ['ay', 'yay']],
                            'ar' => ['sentence' => 'سنة', 'correct' => ['سنة'], 'extra' => ['شهر', 'صيف']],
                            'ru' => ['sentence' => 'год', 'correct' => ['год'], 'extra' => ['месяц', 'лето']],
                            'es' => ['sentence' => 'Un año', 'correct' => ['un', 'año'], 'extra' => ['mes', 'verano']],
                            'de' => ['sentence' => 'Ein Jahr', 'correct' => ['ein', 'Jahr'], 'extra' => ['Monat', 'Sommer']],
                            'ja' => ['sentence' => '一年', 'correct' => ['一', '年'], 'extra' => ['月', '夏']],
                            'ko' => ['sentence' => '일 년', 'correct' => ['일', '년'], 'extra' => ['달', '여름']],
                            'tr' => ['sentence' => 'bir yıl', 'correct' => ['bir', 'yıl'], 'extra' => ['ay', 'yaz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['printemps', 'et', 'été'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Spring and summer', 'correct' => ['spring', 'and', 'summer'], 'extra' => ['autumn']],
                            'az' => ['sentence' => 'yaz və yay', 'correct' => ['yaz', 'və', 'yay'], 'extra' => ['payız']],
                            'ar' => ['sentence' => 'ربيع و صيف', 'correct' => ['ربيع', 'و', 'صيف'], 'extra' => ['خريف']],
                            'ru' => ['sentence' => 'весна и лето', 'correct' => ['весна', 'и', 'лето'], 'extra' => ['осень']],
                            'es' => ['sentence' => 'Primavera y verano', 'correct' => ['primavera', 'y', 'verano'], 'extra' => ['otoño']],
                            'de' => ['sentence' => 'Frühling und Sommer', 'correct' => ['Frühling', 'und', 'Sommer'], 'extra' => ['Herbst']],
                            'ja' => ['sentence' => '春と夏', 'correct' => ['春', 'と', '夏'], 'extra' => ['秋']],
                            'ko' => ['sentence' => '봄과 여름', 'correct' => ['봄과', '여름'], 'extra' => ['가을']],
                            'tr' => ['sentence' => 'ilkbahar ve yaz', 'correct' => ['ilkbahar', 've', 'yaz'], 'extra' => ['sonbahar']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Autumn & Winter', 4,
                pictures: [['fr' => 'Automne', 'img' => 'autumn'], ['fr' => 'Hiver', 'img' => 'winter']],
                plain: [['fr' => 'Parfois'], ['fr' => 'Encore']],
                phrases: [
                    'a' => [
                        'words' => ['parfois', 'la', 'pluie'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Sometimes the rain', 'correct' => ['sometimes', 'the', 'rain'], 'extra' => ['again', 'snow']],
                            'az' => ['sentence' => 'bəzən yağış', 'correct' => ['bəzən', 'yağış'], 'extra' => ['yenidən', 'qar']],
                            'ar' => ['sentence' => 'أحيانا مطر', 'correct' => ['أحيانا', 'مطر'], 'extra' => ['مرة أخرى', 'ثلج']],
                            'ru' => ['sentence' => 'иногда дождь', 'correct' => ['иногда', 'дождь'], 'extra' => ['снова', 'снег']],
                            'es' => ['sentence' => 'A veces la lluvia', 'correct' => ['a veces', 'la', 'lluvia'], 'extra' => ['otra vez', 'nieve']],
                            'de' => ['sentence' => 'Manchmal der Regen', 'correct' => ['manchmal', 'der', 'Regen'], 'extra' => ['wieder', 'Schnee']],
                            'ja' => ['sentence' => '時々雨', 'correct' => ['時々', '雨'], 'extra' => ['また', '雪']],
                            'ko' => ['sentence' => '가끔 비', 'correct' => ['가끔', '비'], 'extra' => ['다시', '눈']],
                            'tr' => ['sentence' => 'bazen yağmur', 'correct' => ['bazen', 'yağmur'], 'extra' => ['tekrar', 'kar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['encore', 'la', 'neige'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Again the snow', 'correct' => ['again', 'the', 'snow'], 'extra' => ['sometimes', 'rain']],
                            'az' => ['sentence' => 'yenidən qar', 'correct' => ['yenidən', 'qar'], 'extra' => ['bəzən', 'yağış']],
                            'ar' => ['sentence' => 'مرة أخرى ثلج', 'correct' => ['مرة أخرى', 'ثلج'], 'extra' => ['أحيانا', 'مطر']],
                            'ru' => ['sentence' => 'снова снег', 'correct' => ['снова', 'снег'], 'extra' => ['иногда', 'дождь']],
                            'es' => ['sentence' => 'Otra vez la nieve', 'correct' => ['otra vez', 'la', 'nieve'], 'extra' => ['a veces', 'lluvia']],
                            'de' => ['sentence' => 'Wieder der Schnee', 'correct' => ['wieder', 'der', 'Schnee'], 'extra' => ['manchmal', 'Regen']],
                            'ja' => ['sentence' => 'また雪', 'correct' => ['また', '雪'], 'extra' => ['時々', '雨']],
                            'ko' => ['sentence' => '다시 눈', 'correct' => ['다시', '눈'], 'extra' => ['가끔', '비']],
                            'tr' => ['sentence' => 'yine kar', 'correct' => ['yine', 'kar'], 'extra' => ['bazen', 'yağmur']],
                        ],
                    ],
                    'c' => [
                        'words' => ['automne', 'et', 'hiver'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Autumn and winter', 'correct' => ['autumn', 'and', 'winter'], 'extra' => ['spring']],
                            'az' => ['sentence' => 'payız və qış', 'correct' => ['payız', 'və', 'qış'], 'extra' => ['yaz']],
                            'ar' => ['sentence' => 'خريف و شتاء', 'correct' => ['خريف', 'و', 'شتاء'], 'extra' => ['ربيع']],
                            'ru' => ['sentence' => 'осень и зима', 'correct' => ['осень', 'и', 'зима'], 'extra' => ['весна']],
                            'es' => ['sentence' => 'Otoño e invierno', 'correct' => ['otoño', 'e', 'invierno'], 'extra' => ['primavera']],
                            'de' => ['sentence' => 'Herbst und Winter', 'correct' => ['Herbst', 'und', 'Winter'], 'extra' => ['Frühling']],
                            'ja' => ['sentence' => '秋と冬', 'correct' => ['秋', 'と', '冬'], 'extra' => ['春']],
                            'ko' => ['sentence' => '가을과 겨울', 'correct' => ['가을과', '겨울'], 'extra' => ['봄']],
                            'tr' => ['sentence' => 'sonbahar ve kış', 'correct' => ['sonbahar', 've', 'kış'], 'extra' => ['ilkbahar']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: The Weather Today', 5,
                pictures: [['fr' => 'Pluie', 'img' => 'rain'], ['fr' => 'Soleil', 'img' => 'sun']],
                plain: [['fr' => 'Temps'], ['fr' => 'Saison']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'temps', "aujourd'hui"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The weather today', 'correct' => ['the', 'weather', 'today'], 'extra' => ['season', 'sun']],
                            'az' => ['sentence' => 'hava bu gün', 'correct' => ['hava', 'bu gün'], 'extra' => ['mövsüm', 'günəş']],
                            'ar' => ['sentence' => 'طقس اليوم', 'correct' => ['طقس', 'اليوم'], 'extra' => ['موسم', 'شمس']],
                            'ru' => ['sentence' => 'погода сегодня', 'correct' => ['погода', 'сегодня'], 'extra' => ['сезон', 'солнце']],
                            'es' => ['sentence' => 'El tiempo hoy', 'correct' => ['el', 'tiempo', 'hoy'], 'extra' => ['estación', 'sol']],
                            'de' => ['sentence' => 'Das Wetter heute', 'correct' => ['das', 'Wetter', 'heute'], 'extra' => ['Jahreszeit', 'Sonne']],
                            'ja' => ['sentence' => '今日の天気', 'correct' => ['今日', 'の', '天気'], 'extra' => ['季節', '太陽']],
                            'ko' => ['sentence' => '오늘의 날씨', 'correct' => ['오늘의', '날씨'], 'extra' => ['계절', '태양']],
                            'tr' => ['sentence' => 'bugün hava', 'correct' => ['bugün', 'hava'], 'extra' => ['mevsim', 'güneş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'saison'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A season', 'correct' => ['a', 'season'], 'extra' => ['weather', 'rain']],
                            'az' => ['sentence' => 'bir mövsüm', 'correct' => ['bir', 'mövsüm'], 'extra' => ['hava', 'yağış']],
                            'ar' => ['sentence' => 'موسم', 'correct' => ['موسم'], 'extra' => ['طقس', 'مطر']],
                            'ru' => ['sentence' => 'сезон', 'correct' => ['сезон'], 'extra' => ['погода', 'дождь']],
                            'es' => ['sentence' => 'Una estación', 'correct' => ['una', 'estación'], 'extra' => ['tiempo', 'lluvia']],
                            'de' => ['sentence' => 'Eine Jahreszeit', 'correct' => ['eine', 'Jahreszeit'], 'extra' => ['Wetter', 'Regen']],
                            'ja' => ['sentence' => '季節', 'correct' => ['季節'], 'extra' => ['天気', '雨']],
                            'ko' => ['sentence' => '계절', 'correct' => ['계절'], 'extra' => ['날씨', '비']],
                            'tr' => ['sentence' => 'bir mevsim', 'correct' => ['bir', 'mevsim'], 'extra' => ['hava', 'yağmur']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'pluie', 'et', 'le', 'soleil'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The rain and the sun', 'correct' => ['the', 'rain', 'and', 'the', 'sun'], 'extra' => ['snow']],
                            'az' => ['sentence' => 'yağış və günəş', 'correct' => ['yağış', 'və', 'günəş'], 'extra' => ['qar']],
                            'ar' => ['sentence' => 'مطر و شمس', 'correct' => ['مطر', 'و', 'شمس'], 'extra' => ['ثلج']],
                            'ru' => ['sentence' => 'дождь и солнце', 'correct' => ['дождь', 'и', 'солнце'], 'extra' => ['снег']],
                            'es' => ['sentence' => 'La lluvia y el sol', 'correct' => ['la', 'lluvia', 'y', 'el', 'sol'], 'extra' => ['nieve']],
                            'de' => ['sentence' => 'Der Regen und die Sonne', 'correct' => ['der', 'Regen', 'und', 'die', 'Sonne'], 'extra' => ['Schnee']],
                            'ja' => ['sentence' => '雨と太陽', 'correct' => ['雨', 'と', '太陽'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '비와 태양', 'correct' => ['비와', '태양'], 'extra' => ['눈']],
                            'tr' => ['sentence' => 'yağmur ve güneş', 'correct' => ['yağmur', 've', 'güneş'], 'extra' => ['kar']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
