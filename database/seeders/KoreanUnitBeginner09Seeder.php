<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = ['비' => 'rain', '눈' => 'snow', '바람' => 'wind', '해' => 'sun', '봄' => 'spring', '여름' => 'summer', '가을' => 'autumn', '겨울' => 'winter'];

    /**
     * Korean Chapter 1 (Beginner), Unit 9, the Korean twin of the English
     * "Unit 9: Weather & Seasons" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, '유닛 9: 날씨와 계절', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 비 · 눈', 1,
                pictures: [['ko' => '비', 'img' => 'rain'], ['ko' => '눈', 'img' => 'snow']],
                plain: [['ko' => '차가운'], ['ko' => '오늘']],
                phrases: [
                    'a' => [
                        'words' => ['차가운', '비'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'cold rain', 'correct' => ['cold', 'rain'], 'extra' => ['snow']],
                            'az' => ['sentence' => 'soyuq yağış', 'correct' => ['soyuq', 'yağış'], 'extra' => ['qar']],
                            'ar' => ['sentence' => 'بارد مطر', 'correct' => ['بارد', 'مطر'], 'extra' => ['ثلج']],
                            'ru' => ['sentence' => 'холодный дождь', 'correct' => ['холодный', 'дождь'], 'extra' => ['снег']],
                            'es' => ['sentence' => 'Lluvia fría', 'correct' => ['frío', 'lluvia'], 'extra' => ['nieve', 'hoy']],
                            'de' => ['sentence' => 'Kalter Regen', 'correct' => ['kalt', 'Regen'], 'extra' => ['Schnee', 'heute']],
                            'fr' => ['sentence' => 'Une pluie froide', 'correct' => ['froid', 'pluie'], 'extra' => ['neige', 'aujourd\'hui']],
                            'ja' => ['sentence' => '冷たい雨', 'correct' => ['冷たい', '雨'], 'extra' => ['雪']],
                            'tr' => ['sentence' => 'soğuk yağmur', 'correct' => ['soğuk', 'yağmur'], 'extra' => ['kar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘의', '눈'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the snow today', 'correct' => ['the', 'snow', 'today'], 'extra' => ['rain']],
                            'az' => ['sentence' => 'qar bu gün', 'correct' => ['qar', 'bu gün'], 'extra' => ['yağış']],
                            'ar' => ['sentence' => 'ثلج اليوم', 'correct' => ['ثلج', 'اليوم'], 'extra' => ['مطر']],
                            'ru' => ['sentence' => 'снег сегодня', 'correct' => ['снег', 'сегодня'], 'extra' => ['дождь']],
                            'es' => ['sentence' => 'La nieve hoy', 'correct' => ['la', 'nieve', 'hoy'], 'extra' => ['lluvia', 'frío']],
                            'de' => ['sentence' => 'Der Schnee heute', 'correct' => ['der', 'Schnee', 'heute'], 'extra' => ['Regen', 'kalt']],
                            'fr' => ['sentence' => 'La neige aujourd\'hui', 'correct' => ['la', 'neige', 'aujourd\'hui'], 'extra' => ['pluie', 'froid']],
                            'ja' => ['sentence' => '今日の雪', 'correct' => ['今日', 'の', '雪'], 'extra' => ['雨']],
                            'tr' => ['sentence' => 'bugün kar', 'correct' => ['bugün', 'kar'], 'extra' => ['yağmur']],
                        ],
                    ],
                    'c' => [
                        'words' => ['비와', '눈'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'rain and snow', 'correct' => ['rain', 'and', 'snow'], 'extra' => ['today']],
                            'az' => ['sentence' => 'yağış və qar', 'correct' => ['yağış', 'və', 'qar'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'مطر و ثلج', 'correct' => ['مطر', 'و', 'ثلج'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'дождь и снег', 'correct' => ['дождь', 'и', 'снег'], 'extra' => ['сегодня']],
                            'es' => ['sentence' => 'Lluvia y nieve', 'correct' => ['lluvia', 'y', 'nieve'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Regen und Schnee', 'correct' => ['Regen', 'und', 'Schnee'], 'extra' => ['heute']],
                            'fr' => ['sentence' => 'Pluie et neige', 'correct' => ['pluie', 'et', 'neige'], 'extra' => ['aujourd\'hui']],
                            'ja' => ['sentence' => '雨と雪', 'correct' => ['雨', 'と', '雪'], 'extra' => ['今日']],
                            'tr' => ['sentence' => 'yağmur ve kar', 'correct' => ['yağmur', 've', 'kar'], 'extra' => ['bugün']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 바람 · 해', 2,
                pictures: [['ko' => '바람', 'img' => 'wind'], ['ko' => '해', 'img' => 'sun']],
                plain: [['ko' => '따뜻한'], ['ko' => '하늘']],
                phrases: [
                    'a' => [
                        'words' => ['따뜻한', '해'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the warm sun', 'correct' => ['the', 'warm', 'sun'], 'extra' => ['sky']],
                            'az' => ['sentence' => 'isti günəş', 'correct' => ['isti', 'günəş'], 'extra' => ['göy']],
                            'ar' => ['sentence' => 'دافئ شمس', 'correct' => ['دافئ', 'شمس'], 'extra' => ['سماء']],
                            'ru' => ['sentence' => 'тёплый солнце', 'correct' => ['тёплый', 'солнце'], 'extra' => ['небо']],
                            'es' => ['sentence' => 'El sol cálido', 'correct' => ['el', 'sol', 'cálido'], 'extra' => ['cielo', 'viento']],
                            'de' => ['sentence' => 'Die warme Sonne', 'correct' => ['die', 'warm', 'Sonne'], 'extra' => ['Himmel', 'Wind']],
                            'fr' => ['sentence' => 'Le soleil doux', 'correct' => ['le', 'soleil', 'doux'], 'extra' => ['ciel', 'vent']],
                            'ja' => ['sentence' => '暖かい太陽', 'correct' => ['暖かい', '太陽'], 'extra' => ['空']],
                            'tr' => ['sentence' => 'sıcak güneş', 'correct' => ['sıcak', 'güneş'], 'extra' => ['gökyüzü']],
                        ],
                    ],
                    'b' => [
                        'words' => ['하늘의', '바람'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the wind in the sky', 'correct' => ['the', 'wind', 'in', 'the', 'sky'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'külək içində göy', 'correct' => ['külək', 'içində', 'göy'], 'extra' => ['günəş']],
                            'ar' => ['sentence' => 'ريح في سماء', 'correct' => ['ريح', 'في', 'سماء'], 'extra' => ['شمس']],
                            'ru' => ['sentence' => 'ветер в небо', 'correct' => ['ветер', 'в', 'небо'], 'extra' => ['солнце']],
                            'es' => ['sentence' => 'El viento en el cielo', 'correct' => ['el', 'viento', 'en', 'el', 'cielo'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Der Wind im Himmel', 'correct' => ['der', 'Wind', 'in', 'dem', 'Himmel'], 'extra' => ['Sonne']],
                            'fr' => ['sentence' => 'Le vent dans le ciel', 'correct' => ['le', 'vent', 'dans', 'le', 'ciel'], 'extra' => ['soleil']],
                            'ja' => ['sentence' => '空の風', 'correct' => ['空', 'の', '風'], 'extra' => ['太陽']],
                            'tr' => ['sentence' => 'gökyüzünde rüzgâr', 'correct' => ['gökyüzünde', 'rüzgâr'], 'extra' => ['güneş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['해와', '바람'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the sun and the wind', 'correct' => ['the', 'sun', 'and', 'the', 'wind'], 'extra' => ['sky']],
                            'az' => ['sentence' => 'günəş və külək', 'correct' => ['günəş', 'və', 'külək'], 'extra' => ['göy']],
                            'ar' => ['sentence' => 'شمس و ريح', 'correct' => ['شمس', 'و', 'ريح'], 'extra' => ['سماء']],
                            'ru' => ['sentence' => 'солнце и ветер', 'correct' => ['солнце', 'и', 'ветер'], 'extra' => ['небо']],
                            'es' => ['sentence' => 'El sol y el viento', 'correct' => ['el', 'sol', 'y', 'el', 'viento'], 'extra' => ['cielo']],
                            'de' => ['sentence' => 'Die Sonne und der Wind', 'correct' => ['die', 'Sonne', 'und', 'der', 'Wind'], 'extra' => ['Himmel']],
                            'fr' => ['sentence' => 'Le soleil et le vent', 'correct' => ['le', 'soleil', 'et', 'le', 'vent'], 'extra' => ['ciel']],
                            'ja' => ['sentence' => '太陽と風', 'correct' => ['太陽', 'と', '風'], 'extra' => ['空']],
                            'tr' => ['sentence' => 'güneş ve rüzgâr', 'correct' => ['güneş', 've', 'rüzgâr'], 'extra' => ['gökyüzü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 봄 · 여름', 3,
                pictures: [['ko' => '봄', 'img' => 'spring'], ['ko' => '여름', 'img' => 'summer']],
                plain: [['ko' => '계절'], ['ko' => '따뜻한']],
                phrases: [
                    'a' => [
                        'words' => ['봄은', '계절입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'spring is a season', 'correct' => ['spring', 'is', 'a', 'season'], 'extra' => ['summer']],
                            'az' => ['sentence' => 'yaz bir mövsüm', 'correct' => ['yaz', 'bir', 'mövsüm'], 'extra' => ['yay']],
                            'ar' => ['sentence' => 'ربيع موسم', 'correct' => ['ربيع', 'موسم'], 'extra' => ['صيف']],
                            'ru' => ['sentence' => 'весна сезон', 'correct' => ['весна', 'сезон'], 'extra' => ['лето']],
                            'es' => ['sentence' => 'La primavera es una estación', 'correct' => ['primavera', 'es', 'una', 'estación'], 'extra' => ['verano', 'cálido']],
                            'de' => ['sentence' => 'Frühling ist eine Jahreszeit', 'correct' => ['Frühling', 'ist', 'eine', 'Jahreszeit'], 'extra' => ['Sommer', 'warm']],
                            'fr' => ['sentence' => 'Le printemps est une saison', 'correct' => ['printemps', 'est', 'une', 'saison'], 'extra' => ['été', 'doux']],
                            'ja' => ['sentence' => '春は季節です', 'correct' => ['春', 'は', '季節', 'です'], 'extra' => ['夏']],
                            'tr' => ['sentence' => 'ilkbahar bir mevsim', 'correct' => ['ilkbahar', 'bir', 'mevsim'], 'extra' => ['yaz']],
                        ],
                    ],
                    'b' => [
                        'words' => ['여름은', '따뜻합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'summer is warm', 'correct' => ['summer', 'is', 'warm'], 'extra' => ['spring']],
                            'az' => ['sentence' => 'yay isti', 'correct' => ['yay', 'isti'], 'extra' => ['yaz']],
                            'ar' => ['sentence' => 'صيف دافئ', 'correct' => ['صيف', 'دافئ'], 'extra' => ['ربيع']],
                            'ru' => ['sentence' => 'лето тёплый', 'correct' => ['лето', 'тёплый'], 'extra' => ['весна']],
                            'es' => ['sentence' => 'El verano es cálido', 'correct' => ['verano', 'es', 'cálido'], 'extra' => ['primavera', 'estación']],
                            'de' => ['sentence' => 'Sommer ist warm', 'correct' => ['Sommer', 'ist', 'warm'], 'extra' => ['Frühling', 'Jahreszeit']],
                            'fr' => ['sentence' => 'L\'été est doux', 'correct' => ['été', 'est', 'doux'], 'extra' => ['printemps', 'saison']],
                            'ja' => ['sentence' => '夏は暖かいです', 'correct' => ['夏', 'は', '暖かい', 'です'], 'extra' => ['春']],
                            'tr' => ['sentence' => 'yaz sıcak', 'correct' => ['yaz', 'sıcak'], 'extra' => ['ilkbahar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['봄과', '여름'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'spring and summer', 'correct' => ['spring', 'and', 'summer'], 'extra' => ['season']],
                            'az' => ['sentence' => 'yaz və yay', 'correct' => ['yaz', 'və', 'yay'], 'extra' => ['mövsüm']],
                            'ar' => ['sentence' => 'ربيع و صيف', 'correct' => ['ربيع', 'و', 'صيف'], 'extra' => ['موسم']],
                            'ru' => ['sentence' => 'весна и лето', 'correct' => ['весна', 'и', 'лето'], 'extra' => ['сезон']],
                            'es' => ['sentence' => 'Primavera y verano', 'correct' => ['primavera', 'y', 'verano'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Frühling und Sommer', 'correct' => ['Frühling', 'und', 'Sommer'], 'extra' => ['Jahreszeit']],
                            'fr' => ['sentence' => 'Printemps et été', 'correct' => ['printemps', 'et', 'été'], 'extra' => ['saison']],
                            'ja' => ['sentence' => '春と夏', 'correct' => ['春', 'と', '夏'], 'extra' => ['季節']],
                            'tr' => ['sentence' => 'ilkbahar ve yaz', 'correct' => ['ilkbahar', 've', 'yaz'], 'extra' => ['mevsim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 가을 · 겨울', 4,
                pictures: [['ko' => '가을', 'img' => 'autumn'], ['ko' => '겨울', 'img' => 'winter']],
                plain: [['ko' => '계절'], ['ko' => '차가운']],
                phrases: [
                    'a' => [
                        'words' => ['가을은', '계절입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'autumn is a season', 'correct' => ['autumn', 'is', 'a', 'season'], 'extra' => ['winter']],
                            'az' => ['sentence' => 'payız bir mövsüm', 'correct' => ['payız', 'bir', 'mövsüm'], 'extra' => ['qış']],
                            'ar' => ['sentence' => 'خريف موسم', 'correct' => ['خريف', 'موسم'], 'extra' => ['شتاء']],
                            'ru' => ['sentence' => 'осень сезон', 'correct' => ['осень', 'сезон'], 'extra' => ['зима']],
                            'es' => ['sentence' => 'El otoño es una estación', 'correct' => ['otoño', 'es', 'una', 'estación'], 'extra' => ['invierno', 'frío']],
                            'de' => ['sentence' => 'Herbst ist eine Jahreszeit', 'correct' => ['Herbst', 'ist', 'eine', 'Jahreszeit'], 'extra' => ['Winter', 'kalt']],
                            'fr' => ['sentence' => 'L\'automne est une saison', 'correct' => ['automne', 'est', 'une', 'saison'], 'extra' => ['hiver', 'froid']],
                            'ja' => ['sentence' => '秋は季節です', 'correct' => ['秋', 'は', '季節', 'です'], 'extra' => ['冬']],
                            'tr' => ['sentence' => 'sonbahar bir mevsim', 'correct' => ['sonbahar', 'bir', 'mevsim'], 'extra' => ['kış']],
                        ],
                    ],
                    'b' => [
                        'words' => ['겨울은', '춥습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'winter is cold', 'correct' => ['winter', 'is', 'cold'], 'extra' => ['autumn']],
                            'az' => ['sentence' => 'qış soyuq', 'correct' => ['qış', 'soyuq'], 'extra' => ['payız']],
                            'ar' => ['sentence' => 'شتاء بارد', 'correct' => ['شتاء', 'بارد'], 'extra' => ['خريف']],
                            'ru' => ['sentence' => 'зима холодный', 'correct' => ['зима', 'холодный'], 'extra' => ['осень']],
                            'es' => ['sentence' => 'El invierno es frío', 'correct' => ['invierno', 'es', 'frío'], 'extra' => ['otoño', 'estación']],
                            'de' => ['sentence' => 'Winter ist kalt', 'correct' => ['Winter', 'ist', 'kalt'], 'extra' => ['Herbst', 'Jahreszeit']],
                            'fr' => ['sentence' => 'L\'hiver est froid', 'correct' => ['hiver', 'est', 'froid'], 'extra' => ['automne', 'saison']],
                            'ja' => ['sentence' => '冬は寒いです', 'correct' => ['冬', 'は', '寒い', 'です'], 'extra' => ['秋']],
                            'tr' => ['sentence' => 'kış soğuk', 'correct' => ['kış', 'soğuk'], 'extra' => ['sonbahar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['가을과', '겨울'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'autumn and winter', 'correct' => ['autumn', 'and', 'winter'], 'extra' => ['season']],
                            'az' => ['sentence' => 'payız və qış', 'correct' => ['payız', 'və', 'qış'], 'extra' => ['mövsüm']],
                            'ar' => ['sentence' => 'خريف و شتاء', 'correct' => ['خريف', 'و', 'شتاء'], 'extra' => ['موسم']],
                            'ru' => ['sentence' => 'осень и зима', 'correct' => ['осень', 'и', 'зима'], 'extra' => ['сезон']],
                            'es' => ['sentence' => 'Otoño e invierno', 'correct' => ['otoño', 'y', 'invierno'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Herbst und Winter', 'correct' => ['Herbst', 'und', 'Winter'], 'extra' => ['Jahreszeit']],
                            'fr' => ['sentence' => 'Automne et hiver', 'correct' => ['automne', 'et', 'hiver'], 'extra' => ['saison']],
                            'ja' => ['sentence' => '秋と冬', 'correct' => ['秋', 'と', '冬'], 'extra' => ['季節']],
                            'tr' => ['sentence' => 'sonbahar ve kış', 'correct' => ['sonbahar', 've', 'kış'], 'extra' => ['mevsim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 비 · 해', 5,
                pictures: [['ko' => '비', 'img' => 'rain'], ['ko' => '해', 'img' => 'sun']],
                plain: [['ko' => '날씨'], ['ko' => '오늘']],
                phrases: [
                    'a' => [
                        'words' => ['오늘의', '날씨'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the weather today', 'correct' => ['the', 'weather', 'today'], 'extra' => ['rain']],
                            'az' => ['sentence' => 'hava bu gün', 'correct' => ['hava', 'bu gün'], 'extra' => ['yağış']],
                            'ar' => ['sentence' => 'طقس اليوم', 'correct' => ['طقس', 'اليوم'], 'extra' => ['مطر']],
                            'ru' => ['sentence' => 'погода сегодня', 'correct' => ['погода', 'сегодня'], 'extra' => ['дождь']],
                            'es' => ['sentence' => 'El tiempo hoy', 'correct' => ['el', 'tiempo', 'hoy'], 'extra' => ['lluvia', 'sol']],
                            'de' => ['sentence' => 'Das Wetter heute', 'correct' => ['das', 'Wetter', 'heute'], 'extra' => ['Regen', 'Sonne']],
                            'fr' => ['sentence' => 'Le temps aujourd\'hui', 'correct' => ['le', 'temps', 'aujourd\'hui'], 'extra' => ['pluie', 'soleil']],
                            'ja' => ['sentence' => '今日の天気', 'correct' => ['今日', 'の', '天気'], 'extra' => ['雨']],
                            'tr' => ['sentence' => 'bugün hava', 'correct' => ['bugün', 'hava'], 'extra' => ['yağmur']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘은', '비'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'rain today', 'correct' => ['rain', 'today'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'yağış bu gün', 'correct' => ['yağış', 'bu gün'], 'extra' => ['günəş']],
                            'ar' => ['sentence' => 'مطر اليوم', 'correct' => ['مطر', 'اليوم'], 'extra' => ['شمس']],
                            'ru' => ['sentence' => 'дождь сегодня', 'correct' => ['дождь', 'сегодня'], 'extra' => ['солнце']],
                            'es' => ['sentence' => 'Lluvia hoy', 'correct' => ['lluvia', 'hoy'], 'extra' => ['sol', 'tiempo']],
                            'de' => ['sentence' => 'Regen heute', 'correct' => ['Regen', 'heute'], 'extra' => ['Sonne', 'Wetter']],
                            'fr' => ['sentence' => 'De la pluie aujourd\'hui', 'correct' => ['pluie', 'aujourd\'hui'], 'extra' => ['soleil', 'temps']],
                            'ja' => ['sentence' => '今日は雨', 'correct' => ['今日', 'は', '雨'], 'extra' => ['太陽']],
                            'tr' => ['sentence' => 'bugün yağmur', 'correct' => ['bugün', 'yağmur'], 'extra' => ['güneş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['해', '또는', '비'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'sun or rain', 'correct' => ['sun', 'or', 'rain'], 'extra' => ['weather']],
                            'az' => ['sentence' => 'günəş və ya yağış', 'correct' => ['günəş', 'və ya', 'yağış'], 'extra' => ['hava']],
                            'ar' => ['sentence' => 'شمس أو مطر', 'correct' => ['شمس', 'أو', 'مطر'], 'extra' => ['طقس']],
                            'ru' => ['sentence' => 'солнце или дождь', 'correct' => ['солнце', 'или', 'дождь'], 'extra' => ['погода']],
                            'es' => ['sentence' => 'Sol o lluvia', 'correct' => ['sol', 'o', 'lluvia'], 'extra' => ['tiempo']],
                            'de' => ['sentence' => 'Sonne oder Regen', 'correct' => ['Sonne', 'oder', 'Regen'], 'extra' => ['Wetter']],
                            'fr' => ['sentence' => 'Soleil ou pluie', 'correct' => ['soleil', 'ou', 'pluie'], 'extra' => ['temps']],
                            'ja' => ['sentence' => '太陽か雨', 'correct' => ['太陽', 'か', '雨'], 'extra' => ['天気']],
                            'tr' => ['sentence' => 'güneş veya yağmur', 'correct' => ['güneş', 'veya', 'yağmur'], 'extra' => ['hava']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
