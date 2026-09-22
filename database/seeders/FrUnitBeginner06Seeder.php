<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = [
        'Manger' => 'eat', 'Boire' => 'drink', 'Marcher' => 'walk',
        'Parler' => 'speak', 'Dormir' => 'sleep', 'Maison' => 'house',
    ];

    /**
     * French Beginner Unit 6 — the first verbs.
     *
     * Verbs stay in the infinitive and are used after "je voudrais" (Chapter 1
     * Unit 1), which lets the learner express a real intention before meeting
     * conjugation. The abstract word of each lesson is an ADVERB rather than a
     * pronoun: "tu/nous/il/elle" are useless without conjugated verbs, so the
     * earlier version taught them and then never used them once.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Everyday Verbs', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Eat & Drink', 1,
                pictures: [['fr' => 'Manger', 'img' => 'eat'], ['fr' => 'Boire', 'img' => 'drink']],
                plain: [['fr' => 'Beaucoup'], ['fr' => 'Vite']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'manger'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to eat', 'correct' => ['I would like', 'to eat'], 'extra' => ['to drink', 'a lot']],
                            'az' => ['sentence' => 'istəyirəm yemək yemək', 'correct' => ['istəyirəm', 'yemək yemək'], 'extra' => ['içmək', 'çoxlu']],
                            'ar' => ['sentence' => 'أريد الأكل', 'correct' => ['أريد', 'الأكل'], 'extra' => ['الشرب', 'كثير']],
                            'ru' => ['sentence' => 'я хочу кушать', 'correct' => ['я', 'хочу', 'кушать'], 'extra' => ['пить', 'много']],
                            'es' => ['sentence' => 'Quisiera comer', 'correct' => ['quisiera', 'comer'], 'extra' => ['beber', 'mucho']],
                            'de' => ['sentence' => 'Ich möchte essen', 'correct' => ['ich möchte', 'essen'], 'extra' => ['trinken', 'viel']],
                            'ja' => ['sentence' => '食べたいです', 'correct' => ['食べたい', 'です'], 'extra' => ['飲む', 'たくさん']],
                            'ko' => ['sentence' => '먹고 싶어요', 'correct' => ['먹고', '싶어요'], 'extra' => ['마시다', '많이']],
                            'tr' => ['sentence' => 'yemek istiyorum', 'correct' => ['yemek', 'istiyorum'], 'extra' => ['içmek', 'çok']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'boire'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to drink', 'correct' => ['I would like', 'to drink'], 'extra' => ['to eat', 'fast']],
                            'az' => ['sentence' => 'istəyirəm içmək', 'correct' => ['istəyirəm', 'içmək'], 'extra' => ['yemək yemək', 'sürətli']],
                            'ar' => ['sentence' => 'أريد الشرب', 'correct' => ['أريد', 'الشرب'], 'extra' => ['الأكل', 'بسرعة']],
                            'ru' => ['sentence' => 'я хочу пить', 'correct' => ['я', 'хочу', 'пить'], 'extra' => ['кушать', 'быстро']],
                            'es' => ['sentence' => 'Quisiera beber', 'correct' => ['quisiera', 'beber'], 'extra' => ['comer', 'rápido']],
                            'de' => ['sentence' => 'Ich möchte trinken', 'correct' => ['ich möchte', 'trinken'], 'extra' => ['essen', 'schnell']],
                            'ja' => ['sentence' => '飲みたいです', 'correct' => ['飲み', 'たいです'], 'extra' => ['食べる', '速く']],
                            'ko' => ['sentence' => '마시고 싶어요', 'correct' => ['마시고', '싶어요'], 'extra' => ['먹다', '빨리']],
                            'tr' => ['sentence' => 'içmek istiyorum', 'correct' => ['içmek', 'istiyorum'], 'extra' => ['yemek', 'hızlı']],
                        ],
                    ],
                    'c' => [
                        'words' => ['manger', 'beaucoup', 'et', 'vite'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To eat a lot and fast', 'correct' => ['to eat', 'a lot', 'and', 'fast'], 'extra' => ['to drink']],
                            'az' => ['sentence' => 'yemək yemək çoxlu və sürətli', 'correct' => ['yemək yemək', 'çoxlu', 'və', 'sürətli'], 'extra' => ['içmək']],
                            'ar' => ['sentence' => 'الأكل كثير و بسرعة', 'correct' => ['الأكل', 'كثير', 'و', 'بسرعة'], 'extra' => ['الشرب']],
                            'ru' => ['sentence' => 'кушать много и быстро', 'correct' => ['кушать', 'много', 'и', 'быстро'], 'extra' => ['пить']],
                            'es' => ['sentence' => 'Comer mucho y rápido', 'correct' => ['comer', 'mucho', 'y', 'rápido'], 'extra' => ['beber']],
                            'de' => ['sentence' => 'Viel und schnell essen', 'correct' => ['viel', 'und', 'schnell', 'essen'], 'extra' => ['trinken']],
                            'ja' => ['sentence' => 'たくさん速く食べる', 'correct' => ['たくさん', '速く', '食べる'], 'extra' => ['飲む']],
                            'ko' => ['sentence' => '많이 그리고 빨리 먹다', 'correct' => ['많이', '그리고', '빨리', '먹다'], 'extra' => ['마시다']],
                            'tr' => ['sentence' => 'çok ve hızlı yemek', 'correct' => ['çok', 've', 'hızlı', 'yemek'], 'extra' => ['içmek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Walk & Speak', 2,
                pictures: [['fr' => 'Marcher', 'img' => 'walk'], ['fr' => 'Parler', 'img' => 'speak']],
                plain: [['fr' => 'Souvent'], ['fr' => 'Toujours']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'marcher'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to walk', 'correct' => ['I would like', 'to walk'], 'extra' => ['to speak', 'often']],
                            'az' => ['sentence' => 'istəyirəm gəzmək', 'correct' => ['istəyirəm', 'gəzmək'], 'extra' => ['danışmaq', 'tez-tez']],
                            'ar' => ['sentence' => 'أريد التمشي', 'correct' => ['أريد', 'التمشي'], 'extra' => ['التكلم', 'غالبا']],
                            'ru' => ['sentence' => 'я хочу гулять', 'correct' => ['я', 'хочу', 'гулять'], 'extra' => ['говорить', 'часто']],
                            'es' => ['sentence' => 'Quisiera caminar', 'correct' => ['quisiera', 'caminar'], 'extra' => ['hablar', 'a menudo']],
                            'de' => ['sentence' => 'Ich möchte gehen', 'correct' => ['ich möchte', 'gehen'], 'extra' => ['sprechen', 'oft']],
                            'ja' => ['sentence' => '歩きたいです', 'correct' => ['歩き', 'たいです'], 'extra' => ['話す', 'しばしば']],
                            'ko' => ['sentence' => '걷고 싶어요', 'correct' => ['걷고', '싶어요'], 'extra' => ['말하다', '자주']],
                            'tr' => ['sentence' => 'yürümek istiyorum', 'correct' => ['yürümek', 'istiyorum'], 'extra' => ['konuşmak', 'sık sık']],
                        ],
                    ],
                    'b' => [
                        'words' => ['parler', 'souvent'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To speak often', 'correct' => ['to speak', 'often'], 'extra' => ['to walk', 'always']],
                            'az' => ['sentence' => 'danışmaq tez-tez', 'correct' => ['danışmaq', 'tez-tez'], 'extra' => ['gəzmək', 'həmişə']],
                            'ar' => ['sentence' => 'التكلم غالبا', 'correct' => ['التكلم', 'غالبا'], 'extra' => ['التمشي', 'دائما']],
                            'ru' => ['sentence' => 'говорить часто', 'correct' => ['говорить', 'часто'], 'extra' => ['гулять', 'всегда']],
                            'es' => ['sentence' => 'Hablar a menudo', 'correct' => ['hablar', 'a menudo'], 'extra' => ['caminar', 'siempre']],
                            'de' => ['sentence' => 'Oft sprechen', 'correct' => ['oft', 'sprechen'], 'extra' => ['gehen', 'immer']],
                            'ja' => ['sentence' => 'しばしば話す', 'correct' => ['しばしば', '話す'], 'extra' => ['歩く', 'いつも']],
                            'ko' => ['sentence' => '자주 말하다', 'correct' => ['자주', '말하다'], 'extra' => ['걷다', '항상']],
                            'tr' => ['sentence' => 'sık sık konuşmak', 'correct' => ['sık', 'sık', 'konuşmak'], 'extra' => ['yürümek', 'her zaman']],
                        ],
                    ],
                    'c' => [
                        'words' => ['marcher', 'toujours', 'et', 'parler'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To always walk and speak', 'correct' => ['to walk', 'always', 'and', 'to speak'], 'extra' => ['often']],
                            'az' => ['sentence' => 'gəzmək həmişə və danışmaq', 'correct' => ['gəzmək', 'həmişə', 'və', 'danışmaq'], 'extra' => ['tez-tez']],
                            'ar' => ['sentence' => 'التمشي دائما و التكلم', 'correct' => ['التمشي', 'دائما', 'و', 'التكلم'], 'extra' => ['غالبا']],
                            'ru' => ['sentence' => 'гулять всегда и говорить', 'correct' => ['гулять', 'всегда', 'и', 'говорить'], 'extra' => ['часто']],
                            'es' => ['sentence' => 'Caminar siempre y hablar', 'correct' => ['caminar', 'siempre', 'y', 'hablar'], 'extra' => ['a menudo']],
                            'de' => ['sentence' => 'Immer gehen und sprechen', 'correct' => ['immer', 'gehen', 'und', 'sprechen'], 'extra' => ['oft']],
                            'ja' => ['sentence' => 'いつも歩いて話す', 'correct' => ['いつ', 'も', '歩いて', '話す'], 'extra' => ['しばしば']],
                            'ko' => ['sentence' => '항상 걷고 말하다', 'correct' => ['항상', '걷고', '말하다'], 'extra' => ['자주']],
                            'tr' => ['sentence' => 'her zaman yürümek ve konuşmak', 'correct' => ['her', 'zaman', 'yürümek', 've', 'konuşmak'], 'extra' => ['sık sık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Sleep Well', 3,
                pictures: [['fr' => 'Dormir', 'img' => 'sleep'], ['fr' => 'Manger', 'img' => 'eat']],
                plain: [['fr' => 'Bien'], ['fr' => 'Encore']],
                phrases: [
                    'a' => [
                        'words' => ['dormir', 'bien'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To sleep well', 'correct' => ['to sleep', 'well'], 'extra' => ['to eat', 'again']],
                            'az' => ['sentence' => 'yatmaq yaxşıyam', 'correct' => ['yatmaq', 'yaxşıyam'], 'extra' => ['yemək yemək', 'yenidən']],
                            'ar' => ['sentence' => 'النوم بخير', 'correct' => ['النوم', 'بخير'], 'extra' => ['الأكل', 'مرة أخرى']],
                            'ru' => ['sentence' => 'спать хорошо', 'correct' => ['спать', 'хорошо'], 'extra' => ['кушать', 'снова']],
                            'es' => ['sentence' => 'Dormir bien', 'correct' => ['dormir', 'bien'], 'extra' => ['comer', 'otra vez']],
                            'de' => ['sentence' => 'Gut schlafen', 'correct' => ['gut', 'schlafen'], 'extra' => ['essen', 'wieder']],
                            'ja' => ['sentence' => 'よく寝る', 'correct' => ['よく', '寝る'], 'extra' => ['食べる', 'また']],
                            'ko' => ['sentence' => '잘 자다', 'correct' => ['잘', '자다'], 'extra' => ['먹다', '다시']],
                            'tr' => ['sentence' => 'iyi uyumak', 'correct' => ['iyi', 'uyumak'], 'extra' => ['yemek', 'tekrar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['manger', 'encore'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To eat again', 'correct' => ['to eat', 'again'], 'extra' => ['to sleep', 'well']],
                            'az' => ['sentence' => 'yemək yemək yenidən', 'correct' => ['yemək yemək', 'yenidən'], 'extra' => ['yatmaq', 'yaxşıyam']],
                            'ar' => ['sentence' => 'الأكل مرة أخرى', 'correct' => ['الأكل', 'مرة أخرى'], 'extra' => ['النوم', 'بخير']],
                            'ru' => ['sentence' => 'кушать снова', 'correct' => ['кушать', 'снова'], 'extra' => ['спать', 'хорошо']],
                            'es' => ['sentence' => 'Comer otra vez', 'correct' => ['comer', 'otra vez'], 'extra' => ['dormir', 'bien']],
                            'de' => ['sentence' => 'Wieder essen', 'correct' => ['wieder', 'essen'], 'extra' => ['schlafen', 'gut']],
                            'ja' => ['sentence' => 'また食べる', 'correct' => ['また', '食べる'], 'extra' => ['寝る', 'よく']],
                            'ko' => ['sentence' => '다시 먹다', 'correct' => ['다시', '먹다'], 'extra' => ['자다', '잘']],
                            'tr' => ['sentence' => 'tekrar yemek', 'correct' => ['tekrar', 'yemek'], 'extra' => ['uyumak', 'iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['dormir', 'bien', 'et', 'manger', 'encore'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To sleep well and eat again', 'correct' => ['to sleep', 'well', 'and', 'to eat', 'again'], 'extra' => ['to drink']],
                            'az' => ['sentence' => 'yatmaq yaxşıyam və yemək yemək yenidən', 'correct' => ['yatmaq', 'yaxşıyam', 'və', 'yemək yemək', 'yenidən'], 'extra' => ['içmək']],
                            'ar' => ['sentence' => 'النوم بخير و الأكل مرة أخرى', 'correct' => ['النوم', 'بخير', 'و', 'الأكل', 'مرة أخرى'], 'extra' => ['الشرب']],
                            'ru' => ['sentence' => 'спать хорошо и кушать снова', 'correct' => ['спать', 'хорошо', 'и', 'кушать', 'снова'], 'extra' => ['пить']],
                            'es' => ['sentence' => 'Dormir bien y comer otra vez', 'correct' => ['dormir', 'bien', 'y', 'comer', 'otra vez'], 'extra' => ['beber']],
                            'de' => ['sentence' => 'Gut schlafen und wieder essen', 'correct' => ['gut', 'schlafen', 'und', 'wieder', 'essen'], 'extra' => ['trinken']],
                            'ja' => ['sentence' => 'よく寝てまた食べる', 'correct' => ['よく', '寝て', 'また', '食べる'], 'extra' => ['飲む']],
                            'ko' => ['sentence' => '잘 자고 다시 먹다', 'correct' => ['잘', '자고', '다시', '먹다'], 'extra' => ['마시다']],
                            'tr' => ['sentence' => 'iyi uyumak ve tekrar yemek', 'correct' => ['iyi', 'uyumak', 've', 'tekrar', 'yemek'], 'extra' => ['içmek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Too Much', 4,
                pictures: [['fr' => 'Boire', 'img' => 'drink'], ['fr' => 'Marcher', 'img' => 'walk']],
                plain: [['fr' => 'Trop'], ['fr' => 'Assez']],
                phrases: [
                    'a' => [
                        'words' => ['boire', 'trop'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To drink too much', 'correct' => ['to drink', 'too much'], 'extra' => ['to walk', 'quite']],
                            'az' => ['sentence' => 'içmək çox artıq', 'correct' => ['içmək', 'çox artıq'], 'extra' => ['gəzmək', 'kifayət qədər']],
                            'ar' => ['sentence' => 'الشرب كثير جدا', 'correct' => ['الشرب', 'كثير جدا'], 'extra' => ['التمشي', 'تماما']],
                            'ru' => ['sentence' => 'пить слишком много', 'correct' => ['пить', 'слишком много'], 'extra' => ['гулять', 'довольно']],
                            'es' => ['sentence' => 'Beber demasiado', 'correct' => ['beber', 'demasiado'], 'extra' => ['caminar', 'bastante']],
                            'de' => ['sentence' => 'Zu viel trinken', 'correct' => ['zu viel', 'trinken'], 'extra' => ['gehen', 'ziemlich']],
                            'ja' => ['sentence' => '飲みすぎる', 'correct' => ['飲み', 'すぎる'], 'extra' => ['歩く', 'かなり']],
                            'ko' => ['sentence' => '너무 많이 마시다', 'correct' => ['너무', '많이', '마시다'], 'extra' => ['걷다', '꽤']],
                            'tr' => ['sentence' => 'çok fazla içmek', 'correct' => ['çok', 'fazla', 'içmek'], 'extra' => ['yürümek', 'oldukça']],
                        ],
                    ],
                    'b' => [
                        'words' => ['marcher', 'assez'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To walk quite a bit', 'correct' => ['to walk', 'quite'], 'extra' => ['to drink', 'too much']],
                            'az' => ['sentence' => 'gəzmək kifayət qədər', 'correct' => ['gəzmək', 'kifayət qədər'], 'extra' => ['içmək', 'çox artıq']],
                            'ar' => ['sentence' => 'التمشي تماما', 'correct' => ['التمشي', 'تماما'], 'extra' => ['الشرب', 'كثير جدا']],
                            'ru' => ['sentence' => 'гулять довольно', 'correct' => ['гулять', 'довольно'], 'extra' => ['пить', 'слишком много']],
                            'es' => ['sentence' => 'Caminar bastante', 'correct' => ['caminar', 'bastante'], 'extra' => ['beber', 'demasiado']],
                            'de' => ['sentence' => 'Ziemlich gehen', 'correct' => ['ziemlich', 'gehen'], 'extra' => ['trinken', 'zu viel']],
                            'ja' => ['sentence' => 'かなり歩く', 'correct' => ['か', 'なり', '歩く'], 'extra' => ['飲む', '多すぎる']],
                            'ko' => ['sentence' => '꽤 걷다', 'correct' => ['꽤', '걷다'], 'extra' => ['마시다', '너무']],
                            'tr' => ['sentence' => 'oldukça yürümek', 'correct' => ['oldukça', 'yürümek'], 'extra' => ['içmek', 'çok fazla']],
                        ],
                    ],
                    'c' => [
                        'words' => ['boire', 'trop', 'et', 'marcher', 'assez'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'To drink too much and walk quite a bit', 'correct' => ['to drink', 'too much', 'and', 'to walk', 'quite'], 'extra' => ['to eat']],
                            'az' => ['sentence' => 'içmək çox artıq və gəzmək kifayət qədər', 'correct' => ['içmək', 'çox artıq', 'və', 'gəzmək', 'kifayət qədər'], 'extra' => ['yemək yemək']],
                            'ar' => ['sentence' => 'الشرب كثير جدا و التمشي تماما', 'correct' => ['الشرب', 'كثير جدا', 'و', 'التمشي', 'تماما'], 'extra' => ['الأكل']],
                            'ru' => ['sentence' => 'пить слишком много и гулять довольно', 'correct' => ['пить', 'слишком много', 'и', 'гулять', 'довольно'], 'extra' => ['кушать']],
                            'es' => ['sentence' => 'Beber demasiado y caminar bastante', 'correct' => ['beber', 'demasiado', 'y', 'caminar', 'bastante'], 'extra' => ['comer']],
                            'de' => ['sentence' => 'Zu viel trinken und ziemlich gehen', 'correct' => ['zu viel', 'trinken', 'und', 'ziemlich', 'gehen'], 'extra' => ['essen']],
                            'ja' => ['sentence' => '飲みすぎてかなり歩く', 'correct' => ['飲み', 'すぎて', 'か', 'なり', '歩く'], 'extra' => ['食べる']],
                            'ko' => ['sentence' => '너무 마시고 꽤 걷다', 'correct' => ['너무', '마시고', '꽤', '걷다'], 'extra' => ['먹다']],
                            'tr' => ['sentence' => 'çok fazla içmek ve oldukça yürümek', 'correct' => ['çok', 'fazla', 'içmek', 've', 'oldukça', 'yürümek'], 'extra' => ['yemek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Slowly & Now', 5,
                pictures: [['fr' => 'Parler', 'img' => 'speak'], ['fr' => 'Dormir', 'img' => 'sleep']],
                plain: [['fr' => 'Lentement'], ['fr' => 'Maintenant']],
                phrases: [
                    'a' => [
                        'words' => ['parler', 'lentement'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To speak slowly', 'correct' => ['to speak', 'slowly'], 'extra' => ['to sleep', 'now']],
                            'az' => ['sentence' => 'danışmaq yavaş', 'correct' => ['danışmaq', 'yavaş'], 'extra' => ['yatmaq', 'indi']],
                            'ar' => ['sentence' => 'التكلم ببطء', 'correct' => ['التكلم', 'ببطء'], 'extra' => ['النوم', 'الآن']],
                            'ru' => ['sentence' => 'говорить медленно', 'correct' => ['говорить', 'медленно'], 'extra' => ['спать', 'сейчас']],
                            'es' => ['sentence' => 'Hablar despacio', 'correct' => ['hablar', 'despacio'], 'extra' => ['dormir', 'ahora']],
                            'de' => ['sentence' => 'Langsam sprechen', 'correct' => ['langsam', 'sprechen'], 'extra' => ['schlafen', 'jetzt']],
                            'ja' => ['sentence' => 'ゆっくり話す', 'correct' => ['ゆっくり', '話す'], 'extra' => ['寝る', '今']],
                            'ko' => ['sentence' => '천천히 말하다', 'correct' => ['천천히', '말하다'], 'extra' => ['자다', '지금']],
                            'tr' => ['sentence' => 'yavaş konuşmak', 'correct' => ['yavaş', 'konuşmak'], 'extra' => ['uyumak', 'şimdi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dormir', 'maintenant'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To sleep now', 'correct' => ['to sleep', 'now'], 'extra' => ['to speak', 'slowly']],
                            'az' => ['sentence' => 'yatmaq indi', 'correct' => ['yatmaq', 'indi'], 'extra' => ['danışmaq', 'yavaş']],
                            'ar' => ['sentence' => 'النوم الآن', 'correct' => ['النوم', 'الآن'], 'extra' => ['التكلم', 'ببطء']],
                            'ru' => ['sentence' => 'спать сейчас', 'correct' => ['спать', 'сейчас'], 'extra' => ['говорить', 'медленно']],
                            'es' => ['sentence' => 'Dormir ahora', 'correct' => ['dormir', 'ahora'], 'extra' => ['hablar', 'despacio']],
                            'de' => ['sentence' => 'Jetzt schlafen', 'correct' => ['jetzt', 'schlafen'], 'extra' => ['sprechen', 'langsam']],
                            'ja' => ['sentence' => '今寝る', 'correct' => ['今', '寝る'], 'extra' => ['話す', 'ゆっくり']],
                            'ko' => ['sentence' => '지금 자다', 'correct' => ['지금', '자다'], 'extra' => ['말하다', '천천히']],
                            'tr' => ['sentence' => 'şimdi uyumak', 'correct' => ['şimdi', 'uyumak'], 'extra' => ['konuşmak', 'yavaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['parler', 'lentement', 'et', 'dormir', 'maintenant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To speak slowly and sleep now', 'correct' => ['to speak', 'slowly', 'and', 'to sleep', 'now'], 'extra' => ['to walk']],
                            'az' => ['sentence' => 'danışmaq yavaş və yatmaq indi', 'correct' => ['danışmaq', 'yavaş', 'və', 'yatmaq', 'indi'], 'extra' => ['gəzmək']],
                            'ar' => ['sentence' => 'التكلم ببطء و النوم الآن', 'correct' => ['التكلم', 'ببطء', 'و', 'النوم', 'الآن'], 'extra' => ['التمشي']],
                            'ru' => ['sentence' => 'говорить медленно и спать сейчас', 'correct' => ['говорить', 'медленно', 'и', 'спать', 'сейчас'], 'extra' => ['гулять']],
                            'es' => ['sentence' => 'Hablar despacio y dormir ahora', 'correct' => ['hablar', 'despacio', 'y', 'dormir', 'ahora'], 'extra' => ['caminar']],
                            'de' => ['sentence' => 'Langsam sprechen und jetzt schlafen', 'correct' => ['langsam', 'sprechen', 'und', 'jetzt', 'schlafen'], 'extra' => ['gehen']],
                            'ja' => ['sentence' => 'ゆっくり話して今寝る', 'correct' => ['ゆっくり', '話', 'して', '今', '寝る'], 'extra' => ['歩く']],
                            'ko' => ['sentence' => '천천히 말하고 지금 자다', 'correct' => ['천천히', '말하고', '지금', '자다'], 'extra' => ['걷다']],
                            'tr' => ['sentence' => 'yavaş konuşmak ve şimdi uyumak', 'correct' => ['yavaş', 'konuşmak', 've', 'şimdi', 'uyumak'], 'extra' => ['yürümek']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
