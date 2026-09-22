<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Dost' => 'friend', 'Qonşu' => 'neighbor', 'Qəhvə' => 'coffee', 'Çay' => 'tea',
        'Ev' => 'house', 'Su' => 'water', 'Süd' => 'milk', 'Çörək' => 'bread',
    ];

    /**
     * Azerbaijani Conversation Unit 1.
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
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Meeting People', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello & Goodbye', 1,
                pictures: [['az' => 'Dost', 'img' => 'friend'], ['az' => 'Qonşu', 'img' => 'neighbor']],
                plain: [['az' => 'Salam'], ['az' => 'Mənim']],
                phrases: [
                    'a' => [
                        'words' => ['salam', 'mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['goodbye']],
                            'fr' => ['sentence' => 'Bonjour mon ami', 'correct' => ['bonjour', 'mon', 'ami'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi amigo', 'correct' => ['hola', 'mi', 'amigo'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の友達', 'correct' => ['こんにちは', '私の', '友達'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 친구', 'correct' => ['안녕하세요', '내', '친구'], 'extra' => ['안녕히 가세요']],
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['hoşça kal', 'arkadaş']],
                            'ru' => ['sentence' => 'привет мой друг', 'correct' => ['привет', 'мой', 'друг'], 'extra' => ['до свидания']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['مع السلامة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sağ ol', 'qonşu'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Goodbye neighbour', 'correct' => ['goodbye', 'neighbour'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Au revoir voisin', 'correct' => ['au revoir', 'voisin'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Adiós vecino', 'correct' => ['adiós', 'vecino'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Auf Wiedersehen Nachbar', 'correct' => ['auf Wiedersehen', 'Nachbar'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'さようなら、隣人', 'correct' => ['さようなら', '隣人'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '안녕히 가세요 이웃', 'correct' => ['안녕히', '가세요', '이웃'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'hoşça kal komşu', 'correct' => ['hoşça kal', 'komşu'], 'extra' => ['merhaba', 'arkadaş']],
                            'ru' => ['sentence' => 'до свидания сосед', 'correct' => ['до свидания', 'сосед'], 'extra' => ['привет']],
                            'ar' => ['sentence' => 'مع السلامة جار', 'correct' => ['مع السلامة', 'جار'], 'extra' => ['مرحبا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['salam', 'mənim', 'dost', 'və', 'sağ ol'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend and goodbye', 'correct' => ['hello', 'my', 'friend', 'and', 'goodbye'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Bonjour mon ami et au revoir', 'correct' => ['bonjour', 'mon', 'ami', 'et', 'au revoir'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Hola mi amigo y adiós', 'correct' => ['hola', 'mi', 'amigo', 'y', 'adiós'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Hallo mein Freund und auf Wiedersehen', 'correct' => ['hallo', 'mein', 'Freund', 'und', 'auf Wiedersehen'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => 'こんにちは私の友達、さようなら', 'correct' => ['こんにちは', '私の', '友達', 'さようなら'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '안녕하세요 내 친구 그리고 안녕히 가세요', 'correct' => ['안녕하세요', '내', '친구', '그리고', '안녕히', '가세요'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'merhaba arkadaşım ve hoşça kal', 'correct' => ['merhaba', 'arkadaşım', 've', 'hoşça kal'], 'extra' => ['arkadaş', 'komşu']],
                            'ru' => ['sentence' => 'привет мой друг и до свидания', 'correct' => ['привет', 'мой', 'друг', 'и', 'до свидания'], 'extra' => ['сосед']],
                            'ar' => ['sentence' => 'مرحبا صديق و مع السلامة', 'correct' => ['مرحبا', 'صديق', 'و', 'مع السلامة'], 'extra' => ['جار']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: How Are You', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Salam'], ['az' => 'Necəsən']],
                phrases: [
                    'a' => [
                        'words' => ['salam', 'necəsən'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello how are you', 'correct' => ['hello', 'how are you'], 'extra' => ['I am well']],
                            'fr' => ['sentence' => 'Bonjour comment vas-tu', 'correct' => ['bonjour', 'comment vas-tu'], 'extra' => ['je vais bien']],
                            'es' => ['sentence' => 'Hola cómo estás', 'correct' => ['hola', 'cómo estás'], 'extra' => ['estoy bien']],
                            'de' => ['sentence' => 'Hallo wie geht es dir', 'correct' => ['hallo', 'wie geht es dir'], 'extra' => ['mir geht es gut']],
                            'ja' => ['sentence' => 'こんにちは、元気ですか', 'correct' => ['こんにちは', '元気', 'です', 'か'], 'extra' => ['元気です']],
                            'ko' => ['sentence' => '안녕하세요 어떻게 지내', 'correct' => ['안녕하세요', '어떻게', '지내'], 'extra' => ['잘 지내요']],
                            'tr' => ['sentence' => 'merhaba nasılsın', 'correct' => ['merhaba', 'nasılsın'], 'extra' => ['i̇yiyim', 'arkadaş']],
                            'ru' => ['sentence' => 'привет как дела', 'correct' => ['привет', 'как дела'], 'extra' => ['я', 'хорошо']],
                            'ar' => ['sentence' => 'مرحبا كيف حالك', 'correct' => ['مرحبا', 'كيف حالك'], 'extra' => ['بخير']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mən', 'yaxşıyam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am well', 'correct' => ['I am', 'well'], 'extra' => ['how are you']],
                            'fr' => ['sentence' => 'Je vais bien', 'correct' => ['je vais', 'bien'], 'extra' => ['comment vas-tu']],
                            'es' => ['sentence' => 'Estoy bien', 'correct' => ['estoy', 'bien'], 'extra' => ['cómo estás']],
                            'de' => ['sentence' => 'Mir geht es gut', 'correct' => ['mir geht', 'es gut'], 'extra' => ['wie geht es dir']],
                            'ja' => ['sentence' => '私は元気です', 'correct' => ['私', 'は', '元気', 'です'], 'extra' => ['元気ですか']],
                            'ko' => ['sentence' => '나는 잘 지내요', 'correct' => ['나는', '잘', '지내요'], 'extra' => ['어떻게 지내']],
                            'tr' => ['sentence' => 'ben iyiyim', 'correct' => ['ben', 'iyiyim'], 'extra' => ['nasılsın', 'i̇yiyim']],
                            'ru' => ['sentence' => 'я хорошо', 'correct' => ['я', 'хорошо'], 'extra' => ['как дела']],
                            'ar' => ['sentence' => 'أنا بخير', 'correct' => ['أنا', 'بخير'], 'extra' => ['كيف حالك']],
                        ],
                    ],
                    'c' => [
                        'words' => ['necə', 'sən', 'mən', 'yaxşıyam', 'təşəkkür'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'How are you I am well thank you', 'correct' => ['how are', 'you I', 'am well', 'thank you'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Comment vas-tu je vais bien merci', 'correct' => ['comment vas', 'tu je', 'vais bien', 'merci'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Cómo estás estoy bien gracias', 'correct' => ['cómo estás', 'estoy', 'bien', 'gracias'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Wie geht es dir mir geht es gut danke', 'correct' => ['wie geht es', 'dir mir', 'geht es', 'gut danke'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => '元気ですか、私は元気です、ありがとう', 'correct' => ['元気', 'です', 'か', '私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '어떻게 지내 나는 잘 지내요 감사합니다', 'correct' => ['어떻게', '지내', '나는', '잘', '지내요', '감사합니다'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'nasılsın ben iyiyim teşekkürler', 'correct' => ['nasılsın', 'ben', 'iyiyim', 'teşekkürler'], 'extra' => ['i̇yiyim', 'arkadaş']],
                            'ru' => ['sentence' => 'как ты я хорошо спасибо', 'correct' => ['как', 'ты', 'я', 'хорошо', 'спасибо'], 'extra' => ['привет']],
                            'ar' => ['sentence' => 'كيف أنت أنا بخير شكرا', 'correct' => ['كيف', 'أنت', 'أنا', 'بخير', 'شكرا'], 'extra' => ['مرحبا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: My Name', 3,
                pictures: [['az' => 'Dost', 'img' => 'friend'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Mənim'], ['az' => 'Ad']],
                phrases: [
                    'a' => [
                        'words' => ['mənim', 'ad'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My name', 'correct' => ['my', 'name'], 'extra' => ['your name']],
                            'fr' => ['sentence' => 'Mon nom', 'correct' => ['mon', 'nom'], 'extra' => ['ton nom']],
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'nombre'], 'extra' => ['tu nombre']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'Name'], 'extra' => ['dein Name']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['あなたの名前']],
                            'ko' => ['sentence' => '내 이름', 'correct' => ['내', '이름'], 'extra' => ['너의 이름']],
                            'tr' => ['sentence' => 'benim adım', 'correct' => ['benim', 'adım'], 'extra' => ['memnun oldum', 'öğretmen']],
                            'ru' => ['sentence' => 'мой имя', 'correct' => ['мой', 'имя'], 'extra' => ['твоё имя']],
                            'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => ['اسمك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['tanış olmağa şadam', 'mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you my friend', 'correct' => ['nice to meet you', 'my', 'friend'], 'extra' => ['my name']],
                            'fr' => ['sentence' => 'Enchanté mon ami', 'correct' => ['enchanté', 'mon', 'ami'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Mucho gusto mi amigo', 'correct' => ['mucho gusto', 'mi', 'amigo'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Freut mich mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '만나서 반갑습니다 내 친구', 'correct' => ['만나서', '반갑습니다', '내', '친구'], 'extra' => ['내 이름']],
                            'tr' => ['sentence' => 'memnun oldum arkadaşım', 'correct' => ['memnun oldum', 'arkadaşım'], 'extra' => ['adım', 'öğretmen']],
                            'ru' => ['sentence' => 'приятно познакомиться мой друг', 'correct' => ['приятно познакомиться', 'мой', 'друг'], 'extra' => ['моё имя']],
                            'ar' => ['sentence' => 'تشرفنا صديق', 'correct' => ['تشرفنا', 'صديق'], 'extra' => ['اسمي']],
                        ],
                    ],
                    'c' => [
                        'words' => ['salam', 'mənim', 'ad', 'və', 'xoş', 'tanış olmaq', 'sən'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'Hello my name and nice to meet you', 'correct' => ['hello my', 'name and', 'nice to', 'meet', 'you'], 'extra' => ['goodbye']],
                            'fr' => ['sentence' => 'Bonjour mon nom et enchanté', 'correct' => ['bonjour', 'mon', 'nom', 'et', 'enchanté'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi nombre y mucho gusto', 'correct' => ['hola mi', 'nombre', 'y', 'mucho', 'gusto'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Name und freut mich', 'correct' => ['hallo mein', 'Name', 'und', 'freut', 'mich'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の名前、はじめまして', 'correct' => ['こんにちは', '私の', '名前', 'はじめまして'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 이름 그리고 만나서 반갑습니다', 'correct' => ['안녕하세요', '내', '이름', '그리고', '만나서', '반갑습니다'], 'extra' => ['안녕히 가세요']],
                            'tr' => ['sentence' => 'merhaba benim adım ve memnun oldum', 'correct' => ['merhaba', 'benim', 'adım', 've', 'memnun oldum'], 'extra' => ['öğretmen', 'doktor']],
                            'ru' => ['sentence' => 'привет мой имя и приятно познакомиться ты', 'correct' => ['привет', 'мой', 'имя', 'и', 'приятно', 'познакомиться', 'ты'], 'extra' => ['до свидания']],
                            'ar' => ['sentence' => 'مرحبا اسم و لطيف التعرف أنت', 'correct' => ['مرحبا', 'اسم', 'و', 'لطيف', 'التعرف', 'أنت'], 'extra' => ['مع السلامة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Welcome', 4,
                pictures: [['az' => 'Dost', 'img' => 'friend'], ['az' => 'Ev', 'img' => 'house']],
                plain: [['az' => 'Xoş gəlmisiniz'], ['az' => 'Mənim']],
                phrases: [
                    'a' => [
                        'words' => ['xoş gəlmisiniz', 'mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome my friend', 'correct' => ['welcome', 'my', 'friend'], 'extra' => ['you']],
                            'fr' => ['sentence' => 'Bienvenue mon ami', 'correct' => ['bienvenue', 'mon', 'ami'], 'extra' => ['tu']],
                            'es' => ['sentence' => 'Bienvenido mi amigo', 'correct' => ['bienvenido', 'mi', 'amigo'], 'extra' => ['tú']],
                            'de' => ['sentence' => 'Willkommen mein Freund', 'correct' => ['willkommen', 'mein', 'Freund'], 'extra' => ['du']],
                            'ja' => ['sentence' => 'ようこそ、私の友達', 'correct' => ['ようこそ', '私の', '友達'], 'extra' => ['あなた']],
                            'ko' => ['sentence' => '환영합니다 내 친구', 'correct' => ['환영합니다', '내', '친구'], 'extra' => ['너']],
                            'tr' => ['sentence' => 'hoş geldin arkadaşım', 'correct' => ['hoş geldin', 'arkadaşım'], 'extra' => ['sen', 'ev']],
                            'ru' => ['sentence' => 'добро пожаловать мой друг', 'correct' => ['добро пожаловать', 'мой', 'друг'], 'extra' => ['ты']],
                            'ar' => ['sentence' => 'أهلا وسهلا صديق', 'correct' => ['أهلا وسهلا', 'صديق'], 'extra' => ['أنت']],
                        ],
                    ],
                    'b' => [
                        'words' => ['xoş gəlmisiniz', 'mənim', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome to my house', 'correct' => ['welcome to', 'my', 'house'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Bienvenue dans ma maison', 'correct' => ['bienvenue dans', 'ma', 'maison'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido a', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 집에 환영합니다', 'correct' => ['내', '집에', '환영합니다'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'hoş geldin evim', 'correct' => ['hoş geldin', 'evim'], 'extra' => ['sen', 'ev']],
                            'ru' => ['sentence' => 'добро пожаловать в мой дом', 'correct' => ['добро пожаловать', 'в', 'мой', 'дом'], 'extra' => ['друг']],
                            'ar' => ['sentence' => 'أهلا وسهلا إلى بيت', 'correct' => ['أهلا وسهلا', 'إلى', 'بيت'], 'extra' => ['صديق']],
                        ],
                    ],
                    'c' => [
                        'words' => ['xoş gəlmisiniz', 'necə', 'sən'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome how are you', 'correct' => ['welcome how', 'are', 'you'], 'extra' => ['my name']],
                            'fr' => ['sentence' => 'Bienvenue comment vas-tu', 'correct' => ['bienvenue comment', 'vas', 'tu'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Bienvenido cómo estás', 'correct' => ['bienvenido', 'cómo', 'estás'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Willkommen wie geht es dir', 'correct' => ['willkommen wie', 'geht es', 'dir'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'ようこそ、元気ですか', 'correct' => ['ようこそ', '元気', 'です', 'か'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '환영합니다 어떻게 지내', 'correct' => ['환영합니다', '어떻게', '지내'], 'extra' => ['내 이름']],
                            'tr' => ['sentence' => 'hoş geldin sen nasılsın', 'correct' => ['hoş geldin', 'sen', 'nasılsın'], 'extra' => ['ev', 'arkadaş']],
                            'ru' => ['sentence' => 'добро пожаловать как ты', 'correct' => ['добро пожаловать', 'как', 'ты'], 'extra' => ['моё имя']],
                            'ar' => ['sentence' => 'أهلا وسهلا كيف أنت', 'correct' => ['أهلا وسهلا', 'كيف', 'أنت'], 'extra' => ['اسمي']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A First Conversation', 5,
                pictures: [['az' => 'Qonşu', 'img' => 'neighbor'], ['az' => 'Dost', 'img' => 'friend']],
                plain: [['az' => 'Salam'], ['az' => 'Necəsən']],
                phrases: [
                    'a' => [
                        'words' => ['salam', 'qonşu', 'necəsən'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Hello neighbour how are you', 'correct' => ['hello', 'neighbour', 'how are you'], 'extra' => ['teacher']],
                            'fr' => ['sentence' => 'Bonjour voisin comment vas-tu', 'correct' => ['bonjour', 'voisin', 'comment vas-tu'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Hola vecino cómo estás', 'correct' => ['hola', 'vecino', 'cómo estás'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Hallo Nachbar wie geht es dir', 'correct' => ['hallo', 'Nachbar', 'wie geht es dir'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'こんにちは隣人、元気ですか', 'correct' => ['こんにちは', '隣人', '元気', 'です', 'か'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '안녕하세요 이웃 어떻게 지내', 'correct' => ['안녕하세요', '이웃', '어떻게', '지내'], 'extra' => ['선생님']],
                            'tr' => ['sentence' => 'merhaba komşu nasılsın', 'correct' => ['merhaba', 'komşu', 'nasılsın'], 'extra' => ['memnun oldum', 'i̇yiyim']],
                            'ru' => ['sentence' => 'привет сосед как дела', 'correct' => ['привет', 'сосед', 'как дела'], 'extra' => ['учитель']],
                            'ar' => ['sentence' => 'مرحبا جار كيف حالك', 'correct' => ['مرحبا', 'جار', 'كيف حالك'], 'extra' => ['معلم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mən', 'yaxşıyam', 'təşəkkür', 'sən'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am well thank you', 'correct' => ['I am', 'well thank', 'you'], 'extra' => ['welcome']],
                            'fr' => ['sentence' => 'Je vais bien merci', 'correct' => ['je vais', 'bien', 'merci'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Estoy bien gracias', 'correct' => ['estoy', 'bien', 'gracias'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Mir geht es gut danke', 'correct' => ['mir geht', 'es gut', 'danke'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => '私は元気です、ありがとう', 'correct' => ['私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '나는 잘 지내요 감사합니다', 'correct' => ['나는', '잘', '지내요', '감사합니다'], 'extra' => ['환영합니다']],
                            'tr' => ['sentence' => 'ben iyiyim teşekkürler', 'correct' => ['ben', 'iyiyim', 'teşekkürler'], 'extra' => ['memnun oldum', 'i̇yiyim']],
                            'ru' => ['sentence' => 'я хорошо спасибо ты', 'correct' => ['я', 'хорошо', 'спасибо', 'ты'], 'extra' => ['добро пожаловать']],
                            'ar' => ['sentence' => 'أنا بخير شكرا أنت', 'correct' => ['أنا', 'بخير', 'شكرا', 'أنت'], 'extra' => ['أهلا وسهلا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['tanış olmağa şadam', 'və', 'sağ ol', 'mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you and goodbye my friend', 'correct' => ['nice to meet you', 'and', 'goodbye', 'my', 'friend'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Enchanté et au revoir mon ami', 'correct' => ['enchanté', 'et', 'au revoir', 'mon', 'ami'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Mucho gusto y adiós mi amigo', 'correct' => ['mucho gusto', 'y', 'adiós', 'mi', 'amigo'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Freut mich und auf Wiedersehen mein Freund', 'correct' => ['freut mich', 'und', 'auf Wiedersehen', 'mein', 'Freund'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'はじめまして、さようなら私の友達', 'correct' => ['はじめまして', 'さようなら', '私の', '友達'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '만나서 반갑습니다 그리고 안녕히 가세요 내 친구', 'correct' => ['만나서', '반갑습니다', '그리고', '안녕히', '가세요', '내', '친구'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'memnun oldum ve hoşça kal arkadaşım', 'correct' => ['memnun oldum', 've', 'hoşça kal', 'arkadaşım'], 'extra' => ['i̇yiyim', 'komşu']],
                            'ru' => ['sentence' => 'приятно познакомиться и до свидания мой друг', 'correct' => ['приятно познакомиться', 'и', 'до свидания', 'мой', 'друг'], 'extra' => ['привет']],
                            'ar' => ['sentence' => 'تشرفنا و مع السلامة صديق', 'correct' => ['تشرفنا', 'و', 'مع السلامة', 'صديق'], 'extra' => ['مرحبا']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
