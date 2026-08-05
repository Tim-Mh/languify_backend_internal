<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Arkadaş' => 'friend', 'Öğretmen' => 'teacher', 'Komşu' => 'neighbor', 'Doktor' => 'doctor',
        'Anne' => 'mother', 'Baba' => 'father', 'Kitap' => 'book', 'Ev' => 'house',
    ];

    /**
     * Turkish Conversation Unit 1 — meeting someone.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * WHAT CHANGES IN CHAPTER 2.
     *
     * Chapter 1 taught the learner to name things. This chapter teaches them to
     * exchange things — greet, ask, answer. The grammar load stays low on
     * purpose because the sentences get longer.
     *
     * `Nasılsın` is a single tile even though it is transparently `nasıl` +
     * `sın`. Splitting it would ask the learner to conjugate `to be` in the
     * second person before they have met it in the first, and nobody learns
     * "how are you" as a construction — it is a fixed phrase in every language.
     * `Memnun oldum` (literally "I became pleased") is the same case: the parts
     * do not help.
     *
     * `İyiyim` — "I am well" — is the same personal ending Unit 10 of Chapter 1
     * introduced on `mutluyum`, so this is a callback rather than a new idea.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Meeting People', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello & Goodbye', 1,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Komşu', 'img' => 'neighbor']],
                plain: [['tr' => 'Merhaba'], ['tr' => 'Hoşça kal']],
                phrases: [
                    'a' => [
                        'words' => ['merhaba', 'arkadaşım'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['goodbye']],
                            'fr' => ['sentence' => 'Bonjour mon ami', 'correct' => ['bonjour', 'mon', 'ami'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi amigo', 'correct' => ['hola', 'mi', 'amigo'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の友達', 'correct' => ['こんにちは', '私の', '友達'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 친구', 'correct' => ['안녕하세요', '내', '친구'], 'extra' => ['안녕히 가세요']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hoşça kal', 'komşu'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Goodbye neighbour', 'correct' => ['goodbye', 'neighbour'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Au revoir voisin', 'correct' => ['au revoir', 'voisin'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Adiós vecino', 'correct' => ['adiós', 'vecino'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Auf Wiedersehen Nachbar', 'correct' => ['auf Wiedersehen', 'Nachbar'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'さようなら、隣人', 'correct' => ['さようなら', '隣人'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '안녕히 가세요 이웃', 'correct' => ['안녕히', '가세요', '이웃'], 'extra' => ['안녕하세요']],
                        ],
                    ],
                    'c' => [
                        'words' => ['merhaba', 'arkadaşım', 've', 'hoşça kal'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Hello my friend and goodbye', 'correct' => ['hello', 'my', 'friend', 'and', 'goodbye'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Bonjour mon ami et au revoir', 'correct' => ['bonjour', 'mon', 'ami', 'et', 'au revoir'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Hola mi amigo y adiós', 'correct' => ['hola', 'mi', 'amigo', 'y', 'adiós'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Hallo mein Freund und auf Wiedersehen', 'correct' => ['hallo', 'mein', 'Freund', 'und', 'auf Wiedersehen'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => 'こんにちは私の友達、さようなら', 'correct' => ['こんにちは', '私の', '友達', 'さようなら'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '안녕하세요 내 친구 그리고 안녕히 가세요', 'correct' => ['안녕하세요', '내', '친구', '그리고', '안녕히', '가세요'], 'extra' => ['이웃']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: How Are You', 2,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Anne', 'img' => 'mother']],
                plain: [['tr' => 'Nasılsın'], ['tr' => 'İyiyim']],
                phrases: [
                    'a' => [
                        // A fixed phrase, taught whole. The parts do not help.
                        'words' => ['merhaba', 'nasılsın'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello how are you', 'correct' => ['hello', 'how are you'], 'extra' => ['I am well']],
                            'fr' => ['sentence' => 'Bonjour comment vas-tu', 'correct' => ['bonjour', 'comment vas-tu'], 'extra' => ['je vais bien']],
                            'es' => ['sentence' => 'Hola cómo estás', 'correct' => ['hola', 'cómo estás'], 'extra' => ['estoy bien']],
                            'de' => ['sentence' => 'Hallo wie geht es dir', 'correct' => ['hallo', 'wie geht es dir'], 'extra' => ['mir geht es gut']],
                            'ja' => ['sentence' => 'こんにちは、元気ですか', 'correct' => ['こんにちは', '元気', 'です', 'か'], 'extra' => ['元気です']],
                            'ko' => ['sentence' => '안녕하세요 어떻게 지내', 'correct' => ['안녕하세요', '어떻게', '지내'], 'extra' => ['잘 지내요']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'iyiyim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am well', 'correct' => ['I', 'I am well'], 'extra' => ['how are you']],
                            'fr' => ['sentence' => 'Je vais bien', 'correct' => ['je', 'je vais bien'], 'extra' => ['comment vas-tu']],
                            'es' => ['sentence' => 'Estoy bien', 'correct' => ['yo', 'estoy bien'], 'extra' => ['cómo estás']],
                            'de' => ['sentence' => 'Mir geht es gut', 'correct' => ['ich', 'mir geht es gut'], 'extra' => ['wie geht es dir']],
                            'ja' => ['sentence' => '私は元気です', 'correct' => ['私', 'は', '元気', 'です'], 'extra' => ['元気ですか']],
                            'ko' => ['sentence' => '나는 잘 지내요', 'correct' => ['나는', '잘', '지내요'], 'extra' => ['어떻게 지내']],
                        ],
                    ],
                    'c' => [
                        'words' => ['nasılsın', 'ben', 'iyiyim', 'teşekkürler'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'How are you I am well thank you', 'correct' => ['how are you', 'I', 'I am well', 'thank you'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Comment vas-tu je vais bien merci', 'correct' => ['comment vas-tu', 'je', 'je vais bien', 'merci'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Cómo estás estoy bien gracias', 'correct' => ['cómo estás', 'yo', 'estoy bien', 'gracias'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Wie geht es dir mir geht es gut danke', 'correct' => ['wie geht es dir', 'ich', 'mir geht es gut', 'danke'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => '元気ですか、私は元気です、ありがとう', 'correct' => ['元気', 'です', 'か', '私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '어떻게 지내 나는 잘 지내요 감사합니다', 'correct' => ['어떻게', '지내', '나는', '잘', '지내요', '감사합니다'], 'extra' => ['안녕하세요']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: My Name', 3,
                pictures: [['tr' => 'Öğretmen', 'img' => 'teacher'], ['tr' => 'Doktor', 'img' => 'doctor']],
                plain: [['tr' => 'Adım'], ['tr' => 'Memnun oldum']],
                phrases: [
                    'a' => [
                        'words' => ['benim', 'adım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My name', 'correct' => ['my', 'my name'], 'extra' => ['your name']],
                            'fr' => ['sentence' => 'Mon nom', 'correct' => ['mon', 'mon nom'], 'extra' => ['ton nom']],
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'mi nombre'], 'extra' => ['tu nombre']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'mein Name'], 'extra' => ['dein Name']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['あなたの名前']],
                            'ko' => ['sentence' => '내 이름', 'correct' => ['내', '이름'], 'extra' => ['너의 이름']],
                        ],
                    ],
                    'b' => [
                        'words' => ['memnun oldum', 'arkadaşım'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you my friend', 'correct' => ['nice to meet you', 'my', 'friend'], 'extra' => ['my name']],
                            'fr' => ['sentence' => 'Enchanté mon ami', 'correct' => ['enchanté', 'mon', 'ami'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Mucho gusto mi amigo', 'correct' => ['mucho gusto', 'mi', 'amigo'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Freut mich mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '만나서 반갑습니다 내 친구', 'correct' => ['만나서', '반갑습니다', '내', '친구'], 'extra' => ['내 이름']],
                        ],
                    ],
                    'c' => [
                        'words' => ['merhaba', 'benim', 'adım', 've', 'memnun oldum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Hello my name and nice to meet you', 'correct' => ['hello', 'my', 'my name', 'and', 'nice to meet you'], 'extra' => ['goodbye']],
                            'fr' => ['sentence' => 'Bonjour mon nom et enchanté', 'correct' => ['bonjour', 'mon', 'mon nom', 'et', 'enchanté'], 'extra' => ['au revoir']],
                            'es' => ['sentence' => 'Hola mi nombre y mucho gusto', 'correct' => ['hola', 'mi', 'mi nombre', 'y', 'mucho gusto'], 'extra' => ['adiós']],
                            'de' => ['sentence' => 'Hallo mein Name und freut mich', 'correct' => ['hallo', 'mein', 'mein Name', 'und', 'freut mich'], 'extra' => ['auf Wiedersehen']],
                            'ja' => ['sentence' => 'こんにちは、私の名前、はじめまして', 'correct' => ['こんにちは', '私の', '名前', 'はじめまして'], 'extra' => ['さようなら']],
                            'ko' => ['sentence' => '안녕하세요 내 이름 그리고 만나서 반갑습니다', 'correct' => ['안녕하세요', '내', '이름', '그리고', '만나서', '반갑습니다'], 'extra' => ['안녕히 가세요']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Welcome', 4,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Hoş geldin'], ['tr' => 'Sen']],
                phrases: [
                    'a' => [
                        'words' => ['hoş geldin', 'arkadaşım'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Welcome my friend', 'correct' => ['welcome', 'my', 'friend'], 'extra' => ['you']],
                            'fr' => ['sentence' => 'Bienvenue mon ami', 'correct' => ['bienvenue', 'mon', 'ami'], 'extra' => ['tu']],
                            'es' => ['sentence' => 'Bienvenido mi amigo', 'correct' => ['bienvenido', 'mi', 'amigo'], 'extra' => ['tú']],
                            'de' => ['sentence' => 'Willkommen mein Freund', 'correct' => ['willkommen', 'mein', 'Freund'], 'extra' => ['du']],
                            'ja' => ['sentence' => 'ようこそ、私の友達', 'correct' => ['ようこそ', '私の', '友達'], 'extra' => ['あなた']],
                            'ko' => ['sentence' => '환영합니다 내 친구', 'correct' => ['환영합니다', '내', '친구'], 'extra' => ['너']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hoş geldin', 'evim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Welcome to my house', 'correct' => ['welcome', 'my', 'house'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Bienvenue dans ma maison', 'correct' => ['bienvenue', 'ma', 'maison'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen', 'mein', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 집에 환영합니다', 'correct' => ['내', '집에', '환영합니다'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hoş geldin', 'sen', 'nasılsın'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Welcome how are you', 'correct' => ['welcome', 'you', 'how are you'], 'extra' => ['my name']],
                            'fr' => ['sentence' => 'Bienvenue comment vas-tu', 'correct' => ['bienvenue', 'tu', 'comment vas-tu'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Bienvenido cómo estás', 'correct' => ['bienvenido', 'tú', 'cómo estás'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Willkommen wie geht es dir', 'correct' => ['willkommen', 'du', 'wie geht es dir'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'ようこそ、元気ですか', 'correct' => ['ようこそ', '元気', 'です', 'か'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '환영합니다 어떻게 지내', 'correct' => ['환영합니다', '어떻게', '지내'], 'extra' => ['내 이름']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A First Conversation', 5,
                pictures: [['tr' => 'Komşu', 'img' => 'neighbor'], ['tr' => 'Öğretmen', 'img' => 'teacher']],
                plain: [['tr' => 'Memnun oldum'], ['tr' => 'İyiyim']],
                phrases: [
                    'a' => [
                        'words' => ['merhaba', 'komşu', 'nasılsın'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello neighbour how are you', 'correct' => ['hello', 'neighbour', 'how are you'], 'extra' => ['teacher']],
                            'fr' => ['sentence' => 'Bonjour voisin comment vas-tu', 'correct' => ['bonjour', 'voisin', 'comment vas-tu'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Hola vecino cómo estás', 'correct' => ['hola', 'vecino', 'cómo estás'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Hallo Nachbar wie geht es dir', 'correct' => ['hallo', 'Nachbar', 'wie geht es dir'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'こんにちは隣人、元気ですか', 'correct' => ['こんにちは', '隣人', '元気', 'です', 'か'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '안녕하세요 이웃 어떻게 지내', 'correct' => ['안녕하세요', '이웃', '어떻게', '지내'], 'extra' => ['선생님']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ben', 'iyiyim', 'teşekkürler'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am well thank you', 'correct' => ['I', 'I am well', 'thank you'], 'extra' => ['welcome']],
                            'fr' => ['sentence' => 'Je vais bien merci', 'correct' => ['je', 'je vais bien', 'merci'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Estoy bien gracias', 'correct' => ['yo', 'estoy bien', 'gracias'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Mir geht es gut danke', 'correct' => ['ich', 'mir geht es gut', 'danke'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => '私は元気です、ありがとう', 'correct' => ['私', 'は', '元気', 'です', 'ありがとう'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '나는 잘 지내요 감사합니다', 'correct' => ['나는', '잘', '지내요', '감사합니다'], 'extra' => ['환영합니다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['memnun oldum', 've', 'hoşça kal', 'arkadaşım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Nice to meet you and goodbye my friend', 'correct' => ['nice to meet you', 'and', 'goodbye', 'my', 'friend'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Enchanté et au revoir mon ami', 'correct' => ['enchanté', 'et', 'au revoir', 'mon', 'ami'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Mucho gusto y adiós mi amigo', 'correct' => ['mucho gusto', 'y', 'adiós', 'mi', 'amigo'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Freut mich und auf Wiedersehen mein Freund', 'correct' => ['freut mich', 'und', 'auf Wiedersehen', 'mein', 'Freund'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'はじめまして、さようなら私の友達', 'correct' => ['はじめまして', 'さようなら', '私の', '友達'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '만나서 반갑습니다 그리고 안녕히 가세요 내 친구', 'correct' => ['만나서', '반갑습니다', '그리고', '안녕히', '가세요', '내', '친구'], 'extra' => ['안녕하세요']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
