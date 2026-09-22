<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitConversation01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Друг' => 'friend', 'Сосед' => 'neighbor', 'Кофе' => 'coffee', 'Чай' => 'tea',
        'Дом' => 'house', 'Вода' => 'water', 'Молоко' => 'milk', 'Хлеб' => 'bread',
    ];

    /**
     * Russian Conversation Unit 1.
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
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Meeting People', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello & Goodbye', 1,
                pictures: [['ru' => 'Друг', 'img' => 'friend'], ['ru' => 'Сосед', 'img' => 'neighbor']],
                plain: [['ru' => 'Привет'], ['ru' => 'Мой']],
                phrases: [
                    'a' => [
                        'words' => ['привет', 'мой', 'друг'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['goodbye']],
                            'az' => ['sentence' => 'salam mənim dost', 'correct' => ['salam', 'mənim', 'dost'], 'extra' => ['sağ ol']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['مع السلامة']],
                            'fr' => ['sentence' => 'Bonjour mon ami', 'correct' => ['bonjour', 'mon', 'ami'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi amigo', 'correct' => ['hola', 'mi', 'amigo'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の友達', 'correct' => ['こんにちは', '私の', '友達'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 친구', 'correct' => ['안녕하세요', '내', '친구'], 'extra' => ['안녕히 가세요']],
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['hoşça kal', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['до свидания', 'сосед'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Goodbye neighbour', 'correct' => ['goodbye', 'neighbour'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'sağ ol qonşu', 'correct' => ['sağ ol', 'qonşu'], 'extra' => ['salam']],
                            'ar' => ['sentence' => 'مع السلامة جار', 'correct' => ['مع السلامة', 'جار'], 'extra' => ['مرحبا']],
                            'fr' => ['sentence' => 'Au revoir voisin', 'correct' => ['au revoir', 'voisin'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Adiós vecino', 'correct' => ['adiós', 'vecino'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Auf Wiedersehen Nachbar', 'correct' => ['auf Wiedersehen', 'Nachbar'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'さようなら、隣人', 'correct' => ['さようなら', '隣人'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '안녕히 가세요 이웃', 'correct' => ['안녕히', '가세요', '이웃'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'hoşça kal komşu', 'correct' => ['hoşça kal', 'komşu'], 'extra' => ['merhaba', 'arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['привет', 'мой', 'друг', 'и', 'до свидания'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend and goodbye', 'correct' => ['hello', 'my', 'friend', 'and', 'goodbye'], 'extra' => ['neighbour']],
                            'az' => ['sentence' => 'salam mənim dost və sağ ol', 'correct' => ['salam', 'mənim', 'dost', 'və', 'sağ ol'], 'extra' => ['qonşu']],
                            'ar' => ['sentence' => 'مرحبا صديق و مع السلامة', 'correct' => ['مرحبا', 'صديق', 'و', 'مع السلامة'], 'extra' => ['جار']],
                            'fr' => ['sentence' => 'Bonjour mon ami et au revoir', 'correct' => ['bonjour', 'mon', 'ami', 'et', 'au revoir'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Hola mi amigo y adiós', 'correct' => ['hola', 'mi', 'amigo', 'y', 'adiós'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Hallo mein Freund und auf Wiedersehen', 'correct' => ['hallo', 'mein', 'Freund', 'und', 'auf Wiedersehen'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => 'こんにちは私の友達、さようなら', 'correct' => ['こんにちは', '私の', '友達', 'さようなら'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '안녕하세요 내 친구 그리고 안녕히 가세요', 'correct' => ['안녕하세요', '내', '친구', '그리고', '안녕히', '가세요'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'merhaba arkadaşım ve hoşça kal', 'correct' => ['merhaba', 'arkadaşım', 've', 'hoşça kal'], 'extra' => ['arkadaş', 'komşu']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: How Are You', 2,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Привет'], ['ru' => 'Как дела']],
                phrases: [
                    'a' => [
                        'words' => ['привет', 'как дела'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello how are you', 'correct' => ['hello', 'how are you'], 'extra' => ['I am well']],
                            'az' => ['sentence' => 'salam necəsən', 'correct' => ['salam', 'necəsən'], 'extra' => ['yaxşıyam']],
                            'ar' => ['sentence' => 'مرحبا كيف حالك', 'correct' => ['مرحبا', 'كيف حالك'], 'extra' => ['بخير']],
                            'fr' => ['sentence' => 'Bonjour comment vas-tu', 'correct' => ['bonjour', 'comment vas-tu'], 'extra' => ['je vais bien']],
                            'es' => ['sentence' => 'Hola cómo estás', 'correct' => ['hola', 'cómo estás'], 'extra' => ['estoy bien']],
                            'de' => ['sentence' => 'Hallo wie geht es dir', 'correct' => ['hallo', 'wie geht es dir'], 'extra' => ['mir geht es gut']],
                            'ja' => ['sentence' => 'こんにちは、元気ですか', 'correct' => ['こんにちは', '元気', 'です', 'か'], 'extra' => ['元気です']],
                            'ko' => ['sentence' => '안녕하세요 어떻게 지내', 'correct' => ['안녕하세요', '어떻게', '지내'], 'extra' => ['잘 지내요']],
                            'tr' => ['sentence' => 'merhaba nasılsın', 'correct' => ['merhaba', 'nasılsın'], 'extra' => ['i̇yiyim', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'хорошо'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am well', 'correct' => ['I am', 'well'], 'extra' => ['how are you']],
                            'az' => ['sentence' => 'mən yaxşıyam', 'correct' => ['mən', 'yaxşıyam'], 'extra' => ['necəsən']],
                            'ar' => ['sentence' => 'أنا بخير', 'correct' => ['أنا', 'بخير'], 'extra' => ['كيف حالك']],
                            'fr' => ['sentence' => 'Je vais bien', 'correct' => ['je vais', 'bien'], 'extra' => ['comment vas-tu']],
                            'es' => ['sentence' => 'Estoy bien', 'correct' => ['estoy', 'bien'], 'extra' => ['cómo estás']],
                            'de' => ['sentence' => 'Mir geht es gut', 'correct' => ['mir geht', 'es gut'], 'extra' => ['wie geht es dir']],
                            'ja' => ['sentence' => '私は元気です', 'correct' => ['私', 'は', '元気', 'です'], 'extra' => ['元気ですか']],
                            'ko' => ['sentence' => '나는 잘 지내요', 'correct' => ['나는', '잘', '지내요'], 'extra' => ['어떻게 지내']],
                            'tr' => ['sentence' => 'ben iyiyim', 'correct' => ['ben', 'iyiyim'], 'extra' => ['nasılsın', 'i̇yiyim']],
                        ],
                    ],
                    'c' => [
                        'words' => ['как', 'ты', 'я', 'хорошо', 'спасибо'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'How are you I am well thank you', 'correct' => ['how are', 'you I', 'am well', 'thank you'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'necə sən mən yaxşıyam təşəkkür', 'correct' => ['necə', 'sən', 'mən', 'yaxşıyam', 'təşəkkür'], 'extra' => ['salam']],
                            'ar' => ['sentence' => 'كيف أنت أنا بخير شكرا', 'correct' => ['كيف', 'أنت', 'أنا', 'بخير', 'شكرا'], 'extra' => ['مرحبا']],
                            'fr' => ['sentence' => 'Comment vas-tu je vais bien merci', 'correct' => ['comment vas', 'tu je', 'vais bien', 'merci'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Cómo estás estoy bien gracias', 'correct' => ['cómo estás', 'estoy', 'bien', 'gracias'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Wie geht es dir mir geht es gut danke', 'correct' => ['wie geht es', 'dir mir', 'geht es', 'gut danke'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => '元気ですか、私は元気です、ありがとう', 'correct' => ['元気', 'です', 'か', '私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '어떻게 지내 나는 잘 지내요 감사합니다', 'correct' => ['어떻게', '지내', '나는', '잘', '지내요', '감사합니다'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'nasılsın ben iyiyim teşekkürler', 'correct' => ['nasılsın', 'ben', 'iyiyim', 'teşekkürler'], 'extra' => ['i̇yiyim', 'arkadaş']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: My Name', 3,
                pictures: [['ru' => 'Друг', 'img' => 'friend'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Мой'], ['ru' => 'Имя']],
                phrases: [
                    'a' => [
                        'words' => ['мой', 'имя'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My name', 'correct' => ['my', 'name'], 'extra' => ['your name']],
                            'az' => ['sentence' => 'mənim ad', 'correct' => ['mənim', 'ad'], 'extra' => ['adın']],
                            'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => ['اسمك']],
                            'fr' => ['sentence' => 'Mon nom', 'correct' => ['mon', 'nom'], 'extra' => ['ton nom']],
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'nombre'], 'extra' => ['tu nombre']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'Name'], 'extra' => ['dein Name']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['あなたの名前']],
                            'ko' => ['sentence' => '내 이름', 'correct' => ['내', '이름'], 'extra' => ['너의 이름']],
                            'tr' => ['sentence' => 'benim adım', 'correct' => ['benim', 'adım'], 'extra' => ['memnun oldum', 'öğretmen']],
                        ],
                    ],
                    'b' => [
                        'words' => ['приятно познакомиться', 'мой', 'друг'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you my friend', 'correct' => ['nice to meet you', 'my', 'friend'], 'extra' => ['my name']],
                            'az' => ['sentence' => 'tanış olmağa şadam mənim dost', 'correct' => ['tanış olmağa şadam', 'mənim', 'dost'], 'extra' => ['adım']],
                            'ar' => ['sentence' => 'تشرفنا صديق', 'correct' => ['تشرفنا', 'صديق'], 'extra' => ['اسمي']],
                            'fr' => ['sentence' => 'Enchanté mon ami', 'correct' => ['enchanté', 'mon', 'ami'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Mucho gusto mi amigo', 'correct' => ['mucho gusto', 'mi', 'amigo'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Freut mich mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '만나서 반갑습니다 내 친구', 'correct' => ['만나서', '반갑습니다', '내', '친구'], 'extra' => ['내 이름']],
                            'tr' => ['sentence' => 'memnun oldum arkadaşım', 'correct' => ['memnun oldum', 'arkadaşım'], 'extra' => ['adım', 'öğretmen']],
                        ],
                    ],
                    'c' => [
                        'words' => ['привет', 'мой', 'имя', 'и', 'приятно', 'познакомиться', 'ты'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'Hello my name and nice to meet you', 'correct' => ['hello my', 'name and', 'nice to', 'meet', 'you'], 'extra' => ['goodbye']],
                            'az' => ['sentence' => 'salam mənim ad və xoş tanış olmaq sən', 'correct' => ['salam', 'mənim', 'ad', 'və', 'xoş', 'tanış olmaq', 'sən'], 'extra' => ['sağ ol']],
                            'ar' => ['sentence' => 'مرحبا اسم و لطيف التعرف أنت', 'correct' => ['مرحبا', 'اسم', 'و', 'لطيف', 'التعرف', 'أنت'], 'extra' => ['مع السلامة']],
                            'fr' => ['sentence' => 'Bonjour mon nom et enchanté', 'correct' => ['bonjour', 'mon', 'nom', 'et', 'enchanté'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi nombre y mucho gusto', 'correct' => ['hola mi', 'nombre', 'y', 'mucho', 'gusto'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Name und freut mich', 'correct' => ['hallo mein', 'Name', 'und', 'freut', 'mich'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の名前、はじめまして', 'correct' => ['こんにちは', '私の', '名前', 'はじめまして'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 이름 그리고 만나서 반갑습니다', 'correct' => ['안녕하세요', '내', '이름', '그리고', '만나서', '반갑습니다'], 'extra' => ['안녕히 가세요']],
                            'tr' => ['sentence' => 'merhaba benim adım ve memnun oldum', 'correct' => ['merhaba', 'benim', 'adım', 've', 'memnun oldum'], 'extra' => ['öğretmen', 'doktor']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Welcome', 4,
                pictures: [['ru' => 'Друг', 'img' => 'friend'], ['ru' => 'Дом', 'img' => 'house']],
                plain: [['ru' => 'Добро пожаловать'], ['ru' => 'Мой']],
                phrases: [
                    'a' => [
                        'words' => ['добро пожаловать', 'мой', 'друг'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome my friend', 'correct' => ['welcome', 'my', 'friend'], 'extra' => ['you']],
                            'az' => ['sentence' => 'xoş gəlmisiniz mənim dost', 'correct' => ['xoş gəlmisiniz', 'mənim', 'dost'], 'extra' => ['sən']],
                            'ar' => ['sentence' => 'أهلا وسهلا صديق', 'correct' => ['أهلا وسهلا', 'صديق'], 'extra' => ['أنت']],
                            'fr' => ['sentence' => 'Bienvenue mon ami', 'correct' => ['bienvenue', 'mon', 'ami'], 'extra' => ['tu']],
                            'es' => ['sentence' => 'Bienvenido mi amigo', 'correct' => ['bienvenido', 'mi', 'amigo'], 'extra' => ['tú']],
                            'de' => ['sentence' => 'Willkommen mein Freund', 'correct' => ['willkommen', 'mein', 'Freund'], 'extra' => ['du']],
                            'ja' => ['sentence' => 'ようこそ、私の友達', 'correct' => ['ようこそ', '私の', '友達'], 'extra' => ['あなた']],
                            'ko' => ['sentence' => '환영합니다 내 친구', 'correct' => ['환영합니다', '내', '친구'], 'extra' => ['너']],
                            'tr' => ['sentence' => 'hoş geldin arkadaşım', 'correct' => ['hoş geldin', 'arkadaşım'], 'extra' => ['sen', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['добро пожаловать', 'в', 'мой', 'дом'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome to my house', 'correct' => ['welcome to', 'my', 'house'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'xoş gəlmisiniz mənim ev', 'correct' => ['xoş gəlmisiniz', 'mənim', 'ev'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أهلا وسهلا إلى بيت', 'correct' => ['أهلا وسهلا', 'إلى', 'بيت'], 'extra' => ['صديق']],
                            'fr' => ['sentence' => 'Bienvenue dans ma maison', 'correct' => ['bienvenue dans', 'ma', 'maison'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido a', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 집에 환영합니다', 'correct' => ['내', '집에', '환영합니다'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'hoş geldin evim', 'correct' => ['hoş geldin', 'evim'], 'extra' => ['sen', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => ['добро пожаловать', 'как', 'ты'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome how are you', 'correct' => ['welcome how', 'are', 'you'], 'extra' => ['my name']],
                            'az' => ['sentence' => 'xoş gəlmisiniz necə sən', 'correct' => ['xoş gəlmisiniz', 'necə', 'sən'], 'extra' => ['adım']],
                            'ar' => ['sentence' => 'أهلا وسهلا كيف أنت', 'correct' => ['أهلا وسهلا', 'كيف', 'أنت'], 'extra' => ['اسمي']],
                            'fr' => ['sentence' => 'Bienvenue comment vas-tu', 'correct' => ['bienvenue comment', 'vas', 'tu'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Bienvenido cómo estás', 'correct' => ['bienvenido', 'cómo', 'estás'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Willkommen wie geht es dir', 'correct' => ['willkommen wie', 'geht es', 'dir'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'ようこそ、元気ですか', 'correct' => ['ようこそ', '元気', 'です', 'か'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '환영합니다 어떻게 지내', 'correct' => ['환영합니다', '어떻게', '지내'], 'extra' => ['내 이름']],
                            'tr' => ['sentence' => 'hoş geldin sen nasılsın', 'correct' => ['hoş geldin', 'sen', 'nasılsın'], 'extra' => ['ev', 'arkadaş']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A First Conversation', 5,
                pictures: [['ru' => 'Сосед', 'img' => 'neighbor'], ['ru' => 'Друг', 'img' => 'friend']],
                plain: [['ru' => 'Привет'], ['ru' => 'Как дела']],
                phrases: [
                    'a' => [
                        'words' => ['привет', 'сосед', 'как дела'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Hello neighbour how are you', 'correct' => ['hello', 'neighbour', 'how are you'], 'extra' => ['teacher']],
                            'az' => ['sentence' => 'salam qonşu necəsən', 'correct' => ['salam', 'qonşu', 'necəsən'], 'extra' => ['müəllim']],
                            'ar' => ['sentence' => 'مرحبا جار كيف حالك', 'correct' => ['مرحبا', 'جار', 'كيف حالك'], 'extra' => ['معلم']],
                            'fr' => ['sentence' => 'Bonjour voisin comment vas-tu', 'correct' => ['bonjour', 'voisin', 'comment vas-tu'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Hola vecino cómo estás', 'correct' => ['hola', 'vecino', 'cómo estás'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Hallo Nachbar wie geht es dir', 'correct' => ['hallo', 'Nachbar', 'wie geht es dir'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'こんにちは隣人、元気ですか', 'correct' => ['こんにちは', '隣人', '元気', 'です', 'か'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '안녕하세요 이웃 어떻게 지내', 'correct' => ['안녕하세요', '이웃', '어떻게', '지내'], 'extra' => ['선생님']],
                            'tr' => ['sentence' => 'merhaba komşu nasılsın', 'correct' => ['merhaba', 'komşu', 'nasılsın'], 'extra' => ['memnun oldum', 'i̇yiyim']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'хорошо', 'спасибо', 'ты'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am well thank you', 'correct' => ['I am', 'well thank', 'you'], 'extra' => ['welcome']],
                            'az' => ['sentence' => 'mən yaxşıyam təşəkkür sən', 'correct' => ['mən', 'yaxşıyam', 'təşəkkür', 'sən'], 'extra' => ['xoş gəlmisiniz']],
                            'ar' => ['sentence' => 'أنا بخير شكرا أنت', 'correct' => ['أنا', 'بخير', 'شكرا', 'أنت'], 'extra' => ['أهلا وسهلا']],
                            'fr' => ['sentence' => 'Je vais bien merci', 'correct' => ['je vais', 'bien', 'merci'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Estoy bien gracias', 'correct' => ['estoy', 'bien', 'gracias'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Mir geht es gut danke', 'correct' => ['mir geht', 'es gut', 'danke'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => '私は元気です、ありがとう', 'correct' => ['私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '나는 잘 지내요 감사합니다', 'correct' => ['나는', '잘', '지내요', '감사합니다'], 'extra' => ['환영합니다']],
                            'tr' => ['sentence' => 'ben iyiyim teşekkürler', 'correct' => ['ben', 'iyiyim', 'teşekkürler'], 'extra' => ['memnun oldum', 'i̇yiyim']],
                        ],
                    ],
                    'c' => [
                        'words' => ['приятно познакомиться', 'и', 'до свидания', 'мой', 'друг'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you and goodbye my friend', 'correct' => ['nice to meet you', 'and', 'goodbye', 'my', 'friend'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'tanış olmağa şadam və sağ ol mənim dost', 'correct' => ['tanış olmağa şadam', 'və', 'sağ ol', 'mənim', 'dost'], 'extra' => ['salam']],
                            'ar' => ['sentence' => 'تشرفنا و مع السلامة صديق', 'correct' => ['تشرفنا', 'و', 'مع السلامة', 'صديق'], 'extra' => ['مرحبا']],
                            'fr' => ['sentence' => 'Enchanté et au revoir mon ami', 'correct' => ['enchanté', 'et', 'au revoir', 'mon', 'ami'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Mucho gusto y adiós mi amigo', 'correct' => ['mucho gusto', 'y', 'adiós', 'mi', 'amigo'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Freut mich und auf Wiedersehen mein Freund', 'correct' => ['freut mich', 'und', 'auf Wiedersehen', 'mein', 'Freund'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'はじめまして、さようなら私の友達', 'correct' => ['はじめまして', 'さようなら', '私の', '友達'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '만나서 반갑습니다 그리고 안녕히 가세요 내 친구', 'correct' => ['만나서', '반갑습니다', '그리고', '안녕히', '가세요', '내', '친구'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'memnun oldum ve hoşça kal arkadaşım', 'correct' => ['memnun oldum', 've', 'hoşça kal', 'arkadaşım'], 'extra' => ['i̇yiyim', 'komşu']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
