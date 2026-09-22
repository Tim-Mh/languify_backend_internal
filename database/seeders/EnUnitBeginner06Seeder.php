<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = [
        'Eat' => 'eat', 'Drink' => 'drink', 'Walk' => 'walk', 'Speak' => 'speak',
        'Sleep' => 'sleep', 'Water' => 'water',
    ];

    /**
     * English Chapter 1, Unit 6 — the first everyday verbs.
     *
     * Five of the six picture words are actions the learner can watch, so the
     * lessons put each verb straight into a one-clause sentence ("I eat bread",
     * "I walk slowly") and add the adverbs that colour it — slowly, now, too
     * much, together.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Everyday Verbs', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Eat & Drink', 1,
                pictures: [['en' => 'Eat', 'img' => 'eat'], ['en' => 'Drink', 'img' => 'drink']],
                plain: [['en' => 'Water'], ['en' => 'Together']],
                phrases: [
                    'a' => [
                        'words' => ['I', 'eat', 'bread'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Yo como pan', 'correct' => ['yo', 'comer', 'pan'], 'extra' => ['beber', 'agua']],
                            'de' => ['sentence' => 'Ich esse Brot', 'correct' => ['ich', 'essen', 'Brot'], 'extra' => ['trinken', 'Wasser']],
                            'ja' => ['sentence' => '私はパンを食べる', 'correct' => ['私', 'は', 'パン', 'を', '食べる'], 'extra' => ['飲む']],
                            'ko' => ['sentence' => '나는 빵을 먹는다', 'correct' => ['나는', '빵을', '먹는다'], 'extra' => ['마시다']],
                            'fr' => ['sentence' => 'Je mange du pain', 'correct' => ['je', 'manger', 'pain'], 'extra' => ['boire', 'eau']],
                            'tr' => ['sentence' => 'ekmek yiyorum', 'correct' => ['ekmek', 'yiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я ем хлеб', 'correct' => ['я', 'ем', 'хлеб'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا آكل خبز', 'correct' => ['أنا', 'آكل', 'خبز'], 'extra' => []],
                        'az' => ['sentence' => 'mən yeyirəm çörək', 'correct' => ['mən', 'yeyirəm', 'çörək'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I', 'drink', 'water'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Yo bebo agua', 'correct' => ['yo', 'beber', 'agua'], 'extra' => ['comer', 'pan']],
                            'de' => ['sentence' => 'Ich trinke Wasser', 'correct' => ['ich', 'trinken', 'Wasser'], 'extra' => ['essen', 'Brot']],
                            'ja' => ['sentence' => '私は水を飲む', 'correct' => ['私', 'は', '水', 'を', '飲む'], 'extra' => ['食べる']],
                            'ko' => ['sentence' => '나는 물을 마신다', 'correct' => ['나는', '물을', '마신다'], 'extra' => ['먹다']],
                            'fr' => ['sentence' => "Je bois de l'eau", 'correct' => ['je', 'boire', 'eau'], 'extra' => ['manger', 'pain']],
                            'tr' => ['sentence' => 'su içiyorum', 'correct' => ['su', 'içiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я напиток вода', 'correct' => ['я', 'напиток', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا مشروب ماء', 'correct' => ['أنا', 'مشروب', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'mən içki su', 'correct' => ['mən', 'içki', 'su'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['eat', 'and', 'drink', 'together'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Comer y beber juntos', 'correct' => ['comer', 'y', 'beber', 'juntos'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Zusammen essen und trinken', 'correct' => ['zusammen', 'essen', 'und', 'trinken'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '一緒に食べて飲む', 'correct' => ['一緒に', '食べて', '飲む'], 'extra' => ['水']],
                            'ko' => ['sentence' => '함께 먹고 마시다', 'correct' => ['함께', '먹고', '마시다'], 'extra' => ['물']],
                            'fr' => ['sentence' => 'Manger et boire ensemble', 'correct' => ['manger', 'et', 'boire', 'ensemble'], 'extra' => ['eau']],
                            'tr' => ['sentence' => 'birlikte ye ve iç', 'correct' => ['birlikte', 'ye', 've', 'iç'], 'extra' => []],
                        'ru' => ['sentence' => 'ем и напиток вместе', 'correct' => ['ем', 'и', 'напиток', 'вместе'], 'extra' => []],
                        'ar' => ['sentence' => 'آكل و مشروب معا', 'correct' => ['آكل', 'و', 'مشروب', 'معا'], 'extra' => []],
                        'az' => ['sentence' => 'yeyirəm və içki birlikdə', 'correct' => ['yeyirəm', 'və', 'içki', 'birlikdə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Walk & Speak', 2,
                pictures: [['en' => 'Walk', 'img' => 'walk'], ['en' => 'Speak', 'img' => 'speak']],
                plain: [['en' => 'Slowly'], ['en' => 'Now']],
                phrases: [
                    'a' => [
                        'words' => ['I', 'walk', 'slowly'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Yo camino despacio', 'correct' => ['yo', 'caminar', 'despacio'], 'extra' => ['hablar', 'ahora']],
                            'de' => ['sentence' => 'Ich gehe langsam', 'correct' => ['ich', 'gehen', 'langsam'], 'extra' => ['sprechen', 'jetzt']],
                            'ja' => ['sentence' => '私はゆっくり歩く', 'correct' => ['私', 'は', 'ゆっくり', '歩く'], 'extra' => ['話す']],
                            'ko' => ['sentence' => '나는 천천히 걷는다', 'correct' => ['나는', '천천히', '걷는다'], 'extra' => ['말하다']],
                            'fr' => ['sentence' => 'Je marche lentement', 'correct' => ['je', 'marcher', 'lentement'], 'extra' => ['parler', 'maintenant']],
                            'tr' => ['sentence' => 'ben yavaş yürüyorum', 'correct' => ['ben', 'yavaş', 'yürüyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я гуляю медленно', 'correct' => ['я', 'гуляю', 'медленно'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا أتمشى ببطء', 'correct' => ['أنا', 'أتمشى', 'ببطء'], 'extra' => []],
                        'az' => ['sentence' => 'mən gəzirəm yavaş', 'correct' => ['mən', 'gəzirəm', 'yavaş'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['speak', 'now'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Habla ahora', 'correct' => ['hablar', 'ahora'], 'extra' => ['caminar', 'despacio']],
                            'de' => ['sentence' => 'Sprich jetzt', 'correct' => ['sprechen', 'jetzt'], 'extra' => ['gehen', 'langsam']],
                            'ja' => ['sentence' => '今話す', 'correct' => ['今', '話す'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '지금 말하다', 'correct' => ['지금', '말하다'], 'extra' => ['걷다']],
                            'fr' => ['sentence' => 'Parle maintenant', 'correct' => ['parler', 'maintenant'], 'extra' => ['marcher', 'lentement']],
                            'tr' => ['sentence' => 'şimdi konuş', 'correct' => ['şimdi', 'konuş'], 'extra' => []],
                        'ru' => ['sentence' => 'говорю сейчас', 'correct' => ['говорю', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'أتكلم الآن', 'correct' => ['أتكلم', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'danışıram indi', 'correct' => ['danışıram', 'indi'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['walk', 'and', 'speak', 'slowly'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Camina y habla despacio', 'correct' => ['caminar', 'y', 'hablar', 'despacio'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Geh und sprich langsam', 'correct' => ['gehen', 'und', 'sprechen', 'langsam'], 'extra' => ['jetzt']],
                            'ja' => ['sentence' => 'ゆっくり歩いて話す', 'correct' => ['ゆっくり', '歩いて', '話す'], 'extra' => ['今']],
                            'ko' => ['sentence' => '천천히 걷고 말하다', 'correct' => ['천천히', '걷고', '말하다'], 'extra' => ['지금']],
                            'fr' => ['sentence' => 'Marche et parle lentement', 'correct' => ['marcher', 'et', 'parler', 'lentement'], 'extra' => ['maintenant']],
                            'tr' => ['sentence' => 'yavaş yürü ve konuş', 'correct' => ['yavaş', 'yürü', 've', 'konuş'], 'extra' => []],
                        'ru' => ['sentence' => 'гуляю и говорю медленно', 'correct' => ['гуляю', 'и', 'говорю', 'медленно'], 'extra' => []],
                        'ar' => ['sentence' => 'أتمشى و أتكلم ببطء', 'correct' => ['أتمشى', 'و', 'أتكلم', 'ببطء'], 'extra' => []],
                        'az' => ['sentence' => 'gəzirəm və danışıram yavaş', 'correct' => ['gəzirəm', 'və', 'danışıram', 'yavaş'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Sleep Well', 3,
                pictures: [['en' => 'Sleep', 'img' => 'sleep'], ['en' => 'Eat', 'img' => 'eat']],
                plain: [['en' => 'Well'], ['en' => 'Now']],
                phrases: [
                    'a' => [
                        'words' => ['I', 'sleep', 'well'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Yo duermo bien', 'correct' => ['yo', 'dormir', 'bien'], 'extra' => ['comer', 'ahora']],
                            'de' => ['sentence' => 'Ich schlafe gut', 'correct' => ['ich', 'schlafen', 'gut'], 'extra' => ['essen', 'jetzt']],
                            'ja' => ['sentence' => '私はよく眠る', 'correct' => ['私', 'は', 'よく', '眠る'], 'extra' => ['食べる']],
                            'ko' => ['sentence' => '나는 잘 잔다', 'correct' => ['나는', '잘', '잔다'], 'extra' => ['먹다']],
                            'fr' => ['sentence' => 'Je dors bien', 'correct' => ['je', 'dormir', 'bien'], 'extra' => ['manger', 'maintenant']],
                            'tr' => ['sentence' => 'ben iyi uyuyorum', 'correct' => ['ben', 'iyi', 'uyuyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я сплю хорошо', 'correct' => ['я', 'сплю', 'хорошо'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا أنام بخير', 'correct' => ['أنا', 'أنام', 'بخير'], 'extra' => []],
                        'az' => ['sentence' => 'mən yatıram yaxşıyam', 'correct' => ['mən', 'yatıram', 'yaxşıyam'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['eat', 'now'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Come ahora', 'correct' => ['comer', 'ahora'], 'extra' => ['dormir', 'bien']],
                            'de' => ['sentence' => 'Iss jetzt', 'correct' => ['essen', 'jetzt'], 'extra' => ['schlafen', 'gut']],
                            'ja' => ['sentence' => '今食べる', 'correct' => ['今', '食べる'], 'extra' => ['眠る']],
                            'ko' => ['sentence' => '지금 먹다', 'correct' => ['지금', '먹다'], 'extra' => ['자다']],
                            'fr' => ['sentence' => 'Mange maintenant', 'correct' => ['manger', 'maintenant'], 'extra' => ['dormir', 'bien']],
                            'tr' => ['sentence' => 'şimdi ye', 'correct' => ['şimdi', 'ye'], 'extra' => []],
                        'ru' => ['sentence' => 'ем сейчас', 'correct' => ['ем', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'آكل الآن', 'correct' => ['آكل', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'yeyirəm indi', 'correct' => ['yeyirəm', 'indi'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['sleep', 'and', 'eat', 'well'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Duerme y come bien', 'correct' => ['dormir', 'y', 'comer', 'bien'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Schlaf und iss gut', 'correct' => ['schlafen', 'und', 'essen', 'gut'], 'extra' => ['jetzt']],
                            'ja' => ['sentence' => 'よく眠って食べる', 'correct' => ['よく', '眠って', '食べる'], 'extra' => ['今']],
                            'ko' => ['sentence' => '잘 자고 먹다', 'correct' => ['잘', '자고', '먹다'], 'extra' => ['지금']],
                            'fr' => ['sentence' => 'Dors et mange bien', 'correct' => ['dormir', 'et', 'manger', 'bien'], 'extra' => ['maintenant']],
                            'tr' => ['sentence' => 'iyi uyu ve ye', 'correct' => ['iyi', 'uyu', 've', 'ye'], 'extra' => []],
                        'ru' => ['sentence' => 'сплю и ем хорошо', 'correct' => ['сплю', 'и', 'ем', 'хорошо'], 'extra' => []],
                        'ar' => ['sentence' => 'أنام و آكل بخير', 'correct' => ['أنام', 'و', 'آكل', 'بخير'], 'extra' => []],
                        'az' => ['sentence' => 'yatıram və yeyirəm yaxşıyam', 'correct' => ['yatıram', 'və', 'yeyirəm', 'yaxşıyam'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Too Much', 4,
                pictures: [['en' => 'Eat', 'img' => 'eat'], ['en' => 'Drink', 'img' => 'drink']],
                plain: [['en' => 'Too much'], ['en' => 'Read']],
                phrases: [
                    'a' => [
                        'words' => ['I', 'eat', 'too much'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Yo como demasiado', 'correct' => ['yo', 'comer', 'demasiado'], 'extra' => ['beber', 'leer']],
                            'de' => ['sentence' => 'Ich esse zu viel', 'correct' => ['ich', 'essen', 'zu viel'], 'extra' => ['trinken', 'lesen']],
                            'ja' => ['sentence' => '私は食べすぎる', 'correct' => ['私', 'は', '食べすぎる'], 'extra' => ['飲む']],
                            'ko' => ['sentence' => '나는 너무 많이 먹는다', 'correct' => ['나는', '너무', '많이', '먹는다'], 'extra' => ['마시다']],
                            'fr' => ['sentence' => 'Je mange trop', 'correct' => ['je', 'manger', 'trop'], 'extra' => ['boire', 'lire']],
                            'tr' => ['sentence' => 'çok fazla yiyorum', 'correct' => ['çok', 'fazla', 'yiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я ем слишком много', 'correct' => ['я', 'ем', 'слишком много'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا آكل كثير جدا', 'correct' => ['أنا', 'آكل', 'كثير جدا'], 'extra' => []],
                        'az' => ['sentence' => 'mən yeyirəm çox artıq', 'correct' => ['mən', 'yeyirəm', 'çox artıq'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I', 'read', 'now'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Yo leo ahora', 'correct' => ['yo', 'leer', 'ahora'], 'extra' => ['comer', 'demasiado']],
                            'de' => ['sentence' => 'Ich lese jetzt', 'correct' => ['ich', 'lesen', 'jetzt'], 'extra' => ['essen', 'zu viel']],
                            'ja' => ['sentence' => '私は今読む', 'correct' => ['私', 'は', '今', '読む'], 'extra' => ['食べる']],
                            'ko' => ['sentence' => '나는 지금 읽는다', 'correct' => ['나는', '지금', '읽는다'], 'extra' => ['먹다']],
                            'fr' => ['sentence' => 'Je lis maintenant', 'correct' => ['je', 'lire', 'maintenant'], 'extra' => ['manger', 'trop']],
                            'tr' => ['sentence' => 'şimdi okuyorum', 'correct' => ['şimdi', 'okuyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я читаю сейчас', 'correct' => ['я', 'читаю', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا أقرأ الآن', 'correct' => ['أنا', 'أقرأ', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'mən oxuyuram indi', 'correct' => ['mən', 'oxuyuram', 'indi'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['drink', 'and', 'read'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Beber y leer', 'correct' => ['beber', 'y', 'leer'], 'extra' => ['demasiado', 'comer']],
                            'de' => ['sentence' => 'Trinken und lesen', 'correct' => ['trinken', 'und', 'lesen'], 'extra' => ['zu viel', 'essen']],
                            'ja' => ['sentence' => '飲んで読む', 'correct' => ['飲んで', '読む'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '마시고 읽다', 'correct' => ['마시고', '읽다'], 'extra' => ['너무']],
                            'fr' => ['sentence' => 'Boire et lire', 'correct' => ['boire', 'et', 'lire'], 'extra' => ['trop', 'manger']],
                            'tr' => ['sentence' => 'iç ve oku', 'correct' => ['iç', 've', 'oku'], 'extra' => []],
                        'ru' => ['sentence' => 'напиток и читаю', 'correct' => ['напиток', 'и', 'читаю'], 'extra' => []],
                        'ar' => ['sentence' => 'مشروب و أقرأ', 'correct' => ['مشروب', 'و', 'أقرأ'], 'extra' => []],
                        'az' => ['sentence' => 'içki və oxuyuram', 'correct' => ['içki', 'və', 'oxuyuram'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Slowly & Now', 5,
                pictures: [['en' => 'Walk', 'img' => 'walk'], ['en' => 'Sleep', 'img' => 'sleep']],
                plain: [['en' => 'Slowly'], ['en' => 'Now']],
                phrases: [
                    'a' => [
                        'words' => ['walk', 'slowly'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Camina despacio', 'correct' => ['caminar', 'despacio'], 'extra' => ['dormir', 'ahora']],
                            'de' => ['sentence' => 'Geh langsam', 'correct' => ['gehen', 'langsam'], 'extra' => ['schlafen', 'jetzt']],
                            'ja' => ['sentence' => 'ゆっくり歩く', 'correct' => ['ゆっくり', '歩く'], 'extra' => ['眠る']],
                            'ko' => ['sentence' => '천천히 걷다', 'correct' => ['천천히', '걷다'], 'extra' => ['자다']],
                            'fr' => ['sentence' => 'Marche lentement', 'correct' => ['marcher', 'lentement'], 'extra' => ['dormir', 'maintenant']],
                            'tr' => ['sentence' => 'yavaş yürü', 'correct' => ['yavaş', 'yürü'], 'extra' => []],
                        'ru' => ['sentence' => 'гуляю медленно', 'correct' => ['гуляю', 'медленно'], 'extra' => []],
                        'ar' => ['sentence' => 'أتمشى ببطء', 'correct' => ['أتمشى', 'ببطء'], 'extra' => []],
                        'az' => ['sentence' => 'gəzirəm yavaş', 'correct' => ['gəzirəm', 'yavaş'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['sleep', 'now'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Duerme ahora', 'correct' => ['dormir', 'ahora'], 'extra' => ['caminar', 'despacio']],
                            'de' => ['sentence' => 'Schlaf jetzt', 'correct' => ['schlafen', 'jetzt'], 'extra' => ['gehen', 'langsam']],
                            'ja' => ['sentence' => '今眠る', 'correct' => ['今', '眠る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '지금 자다', 'correct' => ['지금', '자다'], 'extra' => ['걷다']],
                            'fr' => ['sentence' => 'Dors maintenant', 'correct' => ['dormir', 'maintenant'], 'extra' => ['marcher', 'lentement']],
                            'tr' => ['sentence' => 'şimdi uyu', 'correct' => ['şimdi', 'uyu'], 'extra' => []],
                        'ru' => ['sentence' => 'сплю сейчас', 'correct' => ['сплю', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'أنام الآن', 'correct' => ['أنام', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'yatıram indi', 'correct' => ['yatıram', 'indi'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I', 'walk', 'slowly', 'now'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Yo camino despacio ahora', 'correct' => ['yo', 'caminar', 'despacio', 'ahora'], 'extra' => ['dormir']],
                            'de' => ['sentence' => 'Ich gehe jetzt langsam', 'correct' => ['ich', 'gehen', 'langsam', 'jetzt'], 'extra' => ['schlafen']],
                            'ja' => ['sentence' => '私は今ゆっくり歩く', 'correct' => ['私', 'は', '今', 'ゆっくり', '歩く'], 'extra' => ['眠る']],
                            'ko' => ['sentence' => '나는 지금 천천히 걷는다', 'correct' => ['나는', '지금', '천천히', '걷는다'], 'extra' => ['자다']],
                            'fr' => ['sentence' => 'Je marche lentement maintenant', 'correct' => ['je', 'marcher', 'lentement', 'maintenant'], 'extra' => ['dormir']],
                            'tr' => ['sentence' => 'şimdi yavaş yürüyorum', 'correct' => ['şimdi', 'yavaş', 'yürüyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я гуляю медленно сейчас', 'correct' => ['я', 'гуляю', 'медленно', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا أتمشى ببطء الآن', 'correct' => ['أنا', 'أتمشى', 'ببطء', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'mən gəzirəm yavaş indi', 'correct' => ['mən', 'gəzirəm', 'yavaş', 'indi'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
