<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = ['먹다' => 'eat', '마시다' => 'drink', '걷다' => 'walk', '말하다' => 'speak', '자다' => 'sleep'];

    /**
     * Korean Chapter 1 (Beginner), Unit 6, the Korean twin of the English
     * "Unit 6: Everyday Verbs" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, '유닛 6: 일상 동사', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 먹다 · 마시다', 1,
                pictures: [['ko' => '먹다', 'img' => 'eat'], ['ko' => '마시다', 'img' => 'drink']],
                plain: [['ko' => '물'], ['ko' => '함께']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '빵을', '먹는다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I eat bread', 'correct' => ['I', 'eat', 'bread'], 'extra' => ['drink']],
                            'az' => ['sentence' => 'mən yeyirəm çörək', 'correct' => ['mən', 'yeyirəm', 'çörək'], 'extra' => ['içki']],
                            'ar' => ['sentence' => 'أنا آكل خبز', 'correct' => ['أنا', 'آكل', 'خبز'], 'extra' => ['مشروب']],
                            'ru' => ['sentence' => 'я ем хлеб', 'correct' => ['я', 'ем', 'хлеб'], 'extra' => ['напиток']],
                            'es' => ['sentence' => 'Yo como pan', 'correct' => ['yo', 'comer', 'pan'], 'extra' => ['beber', 'agua']],
                            'de' => ['sentence' => 'Ich esse Brot', 'correct' => ['ich', 'essen', 'Brot'], 'extra' => ['trinken', 'Wasser']],
                            'fr' => ['sentence' => 'Je mange du pain', 'correct' => ['je', 'manger', 'pain'], 'extra' => ['boire', 'eau']],
                            'ja' => ['sentence' => '私はパンを食べる', 'correct' => ['私', 'は', 'パン', 'を', '食べる'], 'extra' => ['飲む']],
                            'tr' => ['sentence' => 'ekmek yiyorum', 'correct' => ['ekmek', 'yiyorum'], 'extra' => ['iç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '물을', '마신다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I drink water', 'correct' => ['I', 'drink', 'water'], 'extra' => ['eat']],
                            'az' => ['sentence' => 'mən içki su', 'correct' => ['mən', 'içki', 'su'], 'extra' => ['yeyirəm']],
                            'ar' => ['sentence' => 'أنا مشروب ماء', 'correct' => ['أنا', 'مشروب', 'ماء'], 'extra' => ['آكل']],
                            'ru' => ['sentence' => 'я напиток вода', 'correct' => ['я', 'напиток', 'вода'], 'extra' => ['ем']],
                            'es' => ['sentence' => 'Yo bebo agua', 'correct' => ['yo', 'beber', 'agua'], 'extra' => ['comer', 'pan']],
                            'de' => ['sentence' => 'Ich trinke Wasser', 'correct' => ['ich', 'trinken', 'Wasser'], 'extra' => ['essen', 'Brot']],
                            'fr' => ['sentence' => 'Je bois de l\'eau', 'correct' => ['je', 'boire', 'eau'], 'extra' => ['manger', 'pain']],
                            'ja' => ['sentence' => '私は水を飲む', 'correct' => ['私', 'は', '水', 'を', '飲む'], 'extra' => ['食べる']],
                            'tr' => ['sentence' => 'su içiyorum', 'correct' => ['su', 'içiyorum'], 'extra' => ['ye']],
                        ],
                    ],
                    'c' => [
                        'words' => ['함께', '먹고', '마시세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'eat and drink together', 'correct' => ['eat', 'and', 'drink', 'together'], 'extra' => ['water']],
                            'az' => ['sentence' => 'yeyirəm və içki birlikdə', 'correct' => ['yeyirəm', 'və', 'içki', 'birlikdə'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'آكل و مشروب معا', 'correct' => ['آكل', 'و', 'مشروب', 'معا'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'ем и напиток вместе', 'correct' => ['ем', 'и', 'напиток', 'вместе'], 'extra' => ['вода']],
                            'es' => ['sentence' => 'Comer y beber juntos', 'correct' => ['comer', 'y', 'beber', 'juntos'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Zusammen essen und trinken', 'correct' => ['zusammen', 'essen', 'und', 'trinken'], 'extra' => ['Wasser']],
                            'fr' => ['sentence' => 'Manger et boire ensemble', 'correct' => ['manger', 'et', 'boire', 'ensemble'], 'extra' => ['eau']],
                            'ja' => ['sentence' => '一緒に食べて飲む', 'correct' => ['一緒に', '食べて', '飲む'], 'extra' => ['水']],
                            'tr' => ['sentence' => 'birlikte ye ve iç', 'correct' => ['birlikte', 'ye', 've', 'iç'], 'extra' => ['su']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 걷다 · 말하다', 2,
                pictures: [['ko' => '걷다', 'img' => 'walk'], ['ko' => '말하다', 'img' => 'speak']],
                plain: [['ko' => '천천히'], ['ko' => '지금']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '천천히', '걷는다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I walk slowly', 'correct' => ['I', 'walk', 'slowly'], 'extra' => ['speak']],
                            'az' => ['sentence' => 'mən gəzirəm yavaş', 'correct' => ['mən', 'gəzirəm', 'yavaş'], 'extra' => ['danışıram']],
                            'ar' => ['sentence' => 'أنا أتمشى ببطء', 'correct' => ['أنا', 'أتمشى', 'ببطء'], 'extra' => ['أتكلم']],
                            'ru' => ['sentence' => 'я гуляю медленно', 'correct' => ['я', 'гуляю', 'медленно'], 'extra' => ['говорю']],
                            'es' => ['sentence' => 'Yo camino despacio', 'correct' => ['yo', 'caminar', 'despacio'], 'extra' => ['hablar', 'ahora']],
                            'de' => ['sentence' => 'Ich gehe langsam', 'correct' => ['ich', 'gehen', 'langsam'], 'extra' => ['sprechen', 'jetzt']],
                            'fr' => ['sentence' => 'Je marche lentement', 'correct' => ['je', 'marcher', 'lentement'], 'extra' => ['parler', 'maintenant']],
                            'ja' => ['sentence' => '私はゆっくり歩く', 'correct' => ['私', 'は', 'ゆっくり', '歩く'], 'extra' => ['話す']],
                            'tr' => ['sentence' => 'ben yavaş yürüyorum', 'correct' => ['ben', 'yavaş', 'yürüyorum'], 'extra' => ['konuş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['지금', '말하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'speak now', 'correct' => ['speak', 'now'], 'extra' => ['walk']],
                            'az' => ['sentence' => 'danışıram indi', 'correct' => ['danışıram', 'indi'], 'extra' => ['gəzirəm']],
                            'ar' => ['sentence' => 'أتكلم الآن', 'correct' => ['أتكلم', 'الآن'], 'extra' => ['أتمشى']],
                            'ru' => ['sentence' => 'говорю сейчас', 'correct' => ['говорю', 'сейчас'], 'extra' => ['гуляю']],
                            'es' => ['sentence' => 'Habla ahora', 'correct' => ['hablar', 'ahora'], 'extra' => ['caminar', 'despacio']],
                            'de' => ['sentence' => 'Sprich jetzt', 'correct' => ['sprechen', 'jetzt'], 'extra' => ['gehen', 'langsam']],
                            'fr' => ['sentence' => 'Parle maintenant', 'correct' => ['parler', 'maintenant'], 'extra' => ['marcher', 'lentement']],
                            'ja' => ['sentence' => '今話す', 'correct' => ['今', '話す'], 'extra' => ['歩く']],
                            'tr' => ['sentence' => 'şimdi konuş', 'correct' => ['şimdi', 'konuş'], 'extra' => ['yürü']],
                        ],
                    ],
                    'c' => [
                        'words' => ['천천히', '걷고', '말하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'walk and speak slowly', 'correct' => ['walk', 'and', 'speak', 'slowly'], 'extra' => ['now']],
                            'az' => ['sentence' => 'gəzirəm və danışıram yavaş', 'correct' => ['gəzirəm', 'və', 'danışıram', 'yavaş'], 'extra' => ['indi']],
                            'ar' => ['sentence' => 'أتمشى و أتكلم ببطء', 'correct' => ['أتمشى', 'و', 'أتكلم', 'ببطء'], 'extra' => ['الآن']],
                            'ru' => ['sentence' => 'гуляю и говорю медленно', 'correct' => ['гуляю', 'и', 'говорю', 'медленно'], 'extra' => ['сейчас']],
                            'es' => ['sentence' => 'Camina y habla despacio', 'correct' => ['caminar', 'y', 'hablar', 'despacio'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Geh und sprich langsam', 'correct' => ['gehen', 'und', 'sprechen', 'langsam'], 'extra' => ['jetzt']],
                            'fr' => ['sentence' => 'Marche et parle lentement', 'correct' => ['marcher', 'et', 'parler', 'lentement'], 'extra' => ['maintenant']],
                            'ja' => ['sentence' => 'ゆっくり歩いて話す', 'correct' => ['ゆっくり', '歩いて', '話す'], 'extra' => ['今']],
                            'tr' => ['sentence' => 'yavaş yürü ve konuş', 'correct' => ['yavaş', 'yürü', 've', 'konuş'], 'extra' => ['şimdi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 자다 · 먹다', 3,
                pictures: [['ko' => '자다', 'img' => 'sleep'], ['ko' => '먹다', 'img' => 'eat']],
                plain: [['ko' => '잘'], ['ko' => '지금']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '잘', '잔다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I sleep well', 'correct' => ['I', 'sleep', 'well'], 'extra' => ['eat']],
                            'az' => ['sentence' => 'mən yatıram yaxşıyam', 'correct' => ['mən', 'yatıram', 'yaxşıyam'], 'extra' => ['yeyirəm']],
                            'ar' => ['sentence' => 'أنا أنام بخير', 'correct' => ['أنا', 'أنام', 'بخير'], 'extra' => ['آكل']],
                            'ru' => ['sentence' => 'я сплю хорошо', 'correct' => ['я', 'сплю', 'хорошо'], 'extra' => ['ем']],
                            'es' => ['sentence' => 'Yo duermo bien', 'correct' => ['yo', 'dormir', 'bien'], 'extra' => ['comer', 'ahora']],
                            'de' => ['sentence' => 'Ich schlafe gut', 'correct' => ['ich', 'schlafen', 'gut'], 'extra' => ['essen', 'jetzt']],
                            'fr' => ['sentence' => 'Je dors bien', 'correct' => ['je', 'dormir', 'bien'], 'extra' => ['manger', 'maintenant']],
                            'ja' => ['sentence' => '私はよく眠る', 'correct' => ['私', 'は', 'よく', '眠る'], 'extra' => ['食べる']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum', 'correct' => ['ben', 'iyi', 'uyuyorum'], 'extra' => ['ye']],
                        ],
                    ],
                    'b' => [
                        'words' => ['지금', '드세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'eat now', 'correct' => ['eat', 'now'], 'extra' => ['sleep']],
                            'az' => ['sentence' => 'yeyirəm indi', 'correct' => ['yeyirəm', 'indi'], 'extra' => ['yatıram']],
                            'ar' => ['sentence' => 'آكل الآن', 'correct' => ['آكل', 'الآن'], 'extra' => ['أنام']],
                            'ru' => ['sentence' => 'ем сейчас', 'correct' => ['ем', 'сейчас'], 'extra' => ['сплю']],
                            'es' => ['sentence' => 'Come ahora', 'correct' => ['comer', 'ahora'], 'extra' => ['dormir', 'bien']],
                            'de' => ['sentence' => 'Iss jetzt', 'correct' => ['essen', 'jetzt'], 'extra' => ['schlafen', 'gut']],
                            'fr' => ['sentence' => 'Mange maintenant', 'correct' => ['manger', 'maintenant'], 'extra' => ['dormir', 'bien']],
                            'ja' => ['sentence' => '今食べる', 'correct' => ['今', '食べる'], 'extra' => ['眠る']],
                            'tr' => ['sentence' => 'şimdi ye', 'correct' => ['şimdi', 'ye'], 'extra' => ['uyu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['잘', '자고', '드세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'sleep and eat well', 'correct' => ['sleep', 'and', 'eat', 'well'], 'extra' => ['now']],
                            'az' => ['sentence' => 'yatıram və yeyirəm yaxşıyam', 'correct' => ['yatıram', 'və', 'yeyirəm', 'yaxşıyam'], 'extra' => ['indi']],
                            'ar' => ['sentence' => 'أنام و آكل بخير', 'correct' => ['أنام', 'و', 'آكل', 'بخير'], 'extra' => ['الآن']],
                            'ru' => ['sentence' => 'сплю и ем хорошо', 'correct' => ['сплю', 'и', 'ем', 'хорошо'], 'extra' => ['сейчас']],
                            'es' => ['sentence' => 'Duerme y come bien', 'correct' => ['dormir', 'y', 'comer', 'bien'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Schlaf und iss gut', 'correct' => ['schlafen', 'und', 'essen', 'gut'], 'extra' => ['jetzt']],
                            'fr' => ['sentence' => 'Dors et mange bien', 'correct' => ['dormir', 'et', 'manger', 'bien'], 'extra' => ['maintenant']],
                            'ja' => ['sentence' => 'よく眠って食べる', 'correct' => ['よく', '眠って', '食べる'], 'extra' => ['今']],
                            'tr' => ['sentence' => 'iyi uyu ve ye', 'correct' => ['iyi', 'uyu', 've', 'ye'], 'extra' => ['şimdi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 먹다 · 마시다', 4,
                pictures: [['ko' => '먹다', 'img' => 'eat'], ['ko' => '마시다', 'img' => 'drink']],
                plain: [['ko' => '너무'], ['ko' => '읽다']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '너무', '많이', '먹는다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I eat too much', 'correct' => ['I', 'eat', 'too much'], 'extra' => ['drink']],
                            'az' => ['sentence' => 'mən yeyirəm çox artıq', 'correct' => ['mən', 'yeyirəm', 'çox artıq'], 'extra' => ['içki']],
                            'ar' => ['sentence' => 'أنا آكل كثير جدا', 'correct' => ['أنا', 'آكل', 'كثير جدا'], 'extra' => ['مشروب']],
                            'ru' => ['sentence' => 'я ем слишком много', 'correct' => ['я', 'ем', 'слишком много'], 'extra' => ['напиток']],
                            'es' => ['sentence' => 'Yo como demasiado', 'correct' => ['yo', 'comer', 'demasiado'], 'extra' => ['beber', 'leer']],
                            'de' => ['sentence' => 'Ich esse zu viel', 'correct' => ['ich', 'essen', 'zu viel'], 'extra' => ['trinken', 'lesen']],
                            'fr' => ['sentence' => 'Je mange trop', 'correct' => ['je', 'manger', 'trop'], 'extra' => ['boire', 'lire']],
                            'ja' => ['sentence' => '私は食べすぎる', 'correct' => ['私', 'は', '食べすぎる'], 'extra' => ['飲む']],
                            'tr' => ['sentence' => 'çok fazla yiyorum', 'correct' => ['çok', 'fazla', 'yiyorum'], 'extra' => ['iç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '지금', '읽는다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I read now', 'correct' => ['I', 'read', 'now'], 'extra' => ['eat']],
                            'az' => ['sentence' => 'mən oxuyuram indi', 'correct' => ['mən', 'oxuyuram', 'indi'], 'extra' => ['yeyirəm']],
                            'ar' => ['sentence' => 'أنا أقرأ الآن', 'correct' => ['أنا', 'أقرأ', 'الآن'], 'extra' => ['آكل']],
                            'ru' => ['sentence' => 'я читаю сейчас', 'correct' => ['я', 'читаю', 'сейчас'], 'extra' => ['ем']],
                            'es' => ['sentence' => 'Yo leo ahora', 'correct' => ['yo', 'leer', 'ahora'], 'extra' => ['comer', 'demasiado']],
                            'de' => ['sentence' => 'Ich lese jetzt', 'correct' => ['ich', 'lesen', 'jetzt'], 'extra' => ['essen', 'zu viel']],
                            'fr' => ['sentence' => 'Je lis maintenant', 'correct' => ['je', 'lire', 'maintenant'], 'extra' => ['manger', 'trop']],
                            'ja' => ['sentence' => '私は今読む', 'correct' => ['私', 'は', '今', '読む'], 'extra' => ['食べる']],
                            'tr' => ['sentence' => 'şimdi okuyorum', 'correct' => ['şimdi', 'okuyorum'], 'extra' => ['ye']],
                        ],
                    ],
                    'c' => [
                        'words' => ['마시고', '읽으세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'drink and read', 'correct' => ['drink', 'and', 'read'], 'extra' => ['too much']],
                            'az' => ['sentence' => 'içki və oxuyuram', 'correct' => ['içki', 'və', 'oxuyuram'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'مشروب و أقرأ', 'correct' => ['مشروب', 'و', 'أقرأ'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'напиток и читаю', 'correct' => ['напиток', 'и', 'читаю'], 'extra' => ['слишком много']],
                            'es' => ['sentence' => 'Beber y leer', 'correct' => ['beber', 'y', 'leer'], 'extra' => ['demasiado', 'comer']],
                            'de' => ['sentence' => 'Trinken und lesen', 'correct' => ['trinken', 'und', 'lesen'], 'extra' => ['zu viel', 'essen']],
                            'fr' => ['sentence' => 'Boire et lire', 'correct' => ['boire', 'et', 'lire'], 'extra' => ['trop', 'manger']],
                            'ja' => ['sentence' => '飲んで読む', 'correct' => ['飲んで', '読む'], 'extra' => ['すぎます']],
                            'tr' => ['sentence' => 'iç ve oku', 'correct' => ['iç', 've', 'oku'], 'extra' => ['çok fazla']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 걷다 · 자다', 5,
                pictures: [['ko' => '걷다', 'img' => 'walk'], ['ko' => '자다', 'img' => 'sleep']],
                plain: [['ko' => '천천히'], ['ko' => '지금']],
                phrases: [
                    'a' => [
                        'words' => ['천천히', '걸으세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'walk slowly', 'correct' => ['walk', 'slowly'], 'extra' => ['sleep']],
                            'az' => ['sentence' => 'gəzirəm yavaş', 'correct' => ['gəzirəm', 'yavaş'], 'extra' => ['yatıram']],
                            'ar' => ['sentence' => 'أتمشى ببطء', 'correct' => ['أتمشى', 'ببطء'], 'extra' => ['أنام']],
                            'ru' => ['sentence' => 'гуляю медленно', 'correct' => ['гуляю', 'медленно'], 'extra' => ['сплю']],
                            'es' => ['sentence' => 'Camina despacio', 'correct' => ['caminar', 'despacio'], 'extra' => ['dormir', 'ahora']],
                            'de' => ['sentence' => 'Geh langsam', 'correct' => ['gehen', 'langsam'], 'extra' => ['schlafen', 'jetzt']],
                            'fr' => ['sentence' => 'Marche lentement', 'correct' => ['marcher', 'lentement'], 'extra' => ['dormir', 'maintenant']],
                            'ja' => ['sentence' => 'ゆっくり歩く', 'correct' => ['ゆっくり', '歩く'], 'extra' => ['眠る']],
                            'tr' => ['sentence' => 'yavaş yürü', 'correct' => ['yavaş', 'yürü'], 'extra' => ['uyu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['지금', '주무세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'sleep now', 'correct' => ['sleep', 'now'], 'extra' => ['walk']],
                            'az' => ['sentence' => 'yatıram indi', 'correct' => ['yatıram', 'indi'], 'extra' => ['gəzirəm']],
                            'ar' => ['sentence' => 'أنام الآن', 'correct' => ['أنام', 'الآن'], 'extra' => ['أتمشى']],
                            'ru' => ['sentence' => 'сплю сейчас', 'correct' => ['сплю', 'сейчас'], 'extra' => ['гуляю']],
                            'es' => ['sentence' => 'Duerme ahora', 'correct' => ['dormir', 'ahora'], 'extra' => ['caminar', 'despacio']],
                            'de' => ['sentence' => 'Schlaf jetzt', 'correct' => ['schlafen', 'jetzt'], 'extra' => ['gehen', 'langsam']],
                            'fr' => ['sentence' => 'Dors maintenant', 'correct' => ['dormir', 'maintenant'], 'extra' => ['marcher', 'lentement']],
                            'ja' => ['sentence' => '今眠る', 'correct' => ['今', '眠る'], 'extra' => ['歩く']],
                            'tr' => ['sentence' => 'şimdi uyu', 'correct' => ['şimdi', 'uyu'], 'extra' => ['yürü']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저는', '지금', '천천히', '걷는다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I walk slowly now', 'correct' => ['I', 'walk', 'slowly', 'now'], 'extra' => ['sleep']],
                            'az' => ['sentence' => 'mən gəzirəm yavaş indi', 'correct' => ['mən', 'gəzirəm', 'yavaş', 'indi'], 'extra' => ['yatıram']],
                            'ar' => ['sentence' => 'أنا أتمشى ببطء الآن', 'correct' => ['أنا', 'أتمشى', 'ببطء', 'الآن'], 'extra' => ['أنام']],
                            'ru' => ['sentence' => 'я гуляю медленно сейчас', 'correct' => ['я', 'гуляю', 'медленно', 'сейчас'], 'extra' => ['сплю']],
                            'es' => ['sentence' => 'Yo camino despacio ahora', 'correct' => ['yo', 'caminar', 'despacio', 'ahora'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich gehe jetzt langsam', 'correct' => ['ich', 'gehen', 'langsam', 'jetzt'], 'extra' => ['schlafen']],
                            'fr' => ['sentence' => 'Je marche lentement maintenant', 'correct' => ['je', 'marcher', 'lentement', 'maintenant'], 'extra' => ['dormir']],
                            'ja' => ['sentence' => '私は今ゆっくり歩く', 'correct' => ['私', 'は', '今', 'ゆっくり', '歩く'], 'extra' => ['眠る']],
                            'tr' => ['sentence' => 'şimdi yavaş yürüyorum', 'correct' => ['şimdi', 'yavaş', 'yürüyorum'], 'extra' => ['uyu']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
