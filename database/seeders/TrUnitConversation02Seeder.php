<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitap' => 'book', 'Ev' => 'house', 'Okul' => 'school', 'Park' => 'park',
        'Arkadaş' => 'friend', 'Öğretmen' => 'teacher', 'Kedi' => 'cat', 'Masa' => 'table',
    ];

    /**
     * Turkish Conversation Unit 2 — asking questions.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * TURKISH QUESTION WORDS DO NOT MOVE TO THE FRONT.
     *
     * English hauls the question word to the start: "WHERE is the book?".
     * Turkish leaves it exactly where the answer would sit:
     *
     *     kitap nerede      book where      (where is the book)
     *     adın ne           your-name what  (what is your name)
     *     bu kim            this who        (who is this)
     *
     * That is the single idea of this unit, and it is taught by exposure rather
     * than explanation — every phrase here puts the question word last, so the
     * shape becomes familiar before anyone names the rule.
     *
     * It also means the English translations read oddly if taken word by word,
     * which is precisely why each phrase carries a full `sentence` for the
     * build step: without it a learner would try to assemble the English order
     * and be marked wrong for a reason they could not see.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Asking Questions', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What & Who', 1,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Ne'], ['tr' => 'Kim']],
                phrases: [
                    'a' => [
                        // Question word last, where the answer would go.
                        'words' => ['bu', 'ne'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is this', 'correct' => ['this', 'what'], 'extra' => ['who']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est", 'correct' => ['ceci', 'quoi'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Qué es esto', 'correct' => ['este', 'qué'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Was ist das', 'correct' => ['dies', 'was'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'これは何ですか', 'correct' => ['これは', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '이것은 무엇입니까', 'correct' => ['이것은', '무엇입니까'], 'extra' => ['누구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'kim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Who is this', 'correct' => ['this', 'who'], 'extra' => ['what']],
                            'fr' => ['sentence' => 'Qui est-ce', 'correct' => ['ceci', 'qui'], 'extra' => ['quoi']],
                            'es' => ['sentence' => 'Quién es este', 'correct' => ['este', 'quién'], 'extra' => ['qué']],
                            'de' => ['sentence' => 'Wer ist das', 'correct' => ['dies', 'wer'], 'extra' => ['was']],
                            'ja' => ['sentence' => 'これは誰ですか', 'correct' => ['これは', '誰', 'です', 'か'], 'extra' => ['何']],
                            'ko' => ['sentence' => '이것은 누구입니까', 'correct' => ['이것은', '누구입니까'], 'extra' => ['무엇']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'ne', 've', 'bu', 'kim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'What is this and who is this', 'correct' => ['this', 'what', 'and', 'this', 'who'], 'extra' => ['where']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est et qui est-ce", 'correct' => ['ceci', 'quoi', 'et', 'ceci', 'qui'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Qué es esto y quién es este', 'correct' => ['este', 'qué', 'y', 'este', 'quién'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Was ist das und wer ist das', 'correct' => ['dies', 'was', 'und', 'dies', 'wer'], 'extra' => ['wo']],
                            'ja' => ['sentence' => 'これは何で、これは誰ですか', 'correct' => ['これは', '何', 'で', 'これは', '誰', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '이것은 무엇이고 이것은 누구입니까', 'correct' => ['이것은', '무엇이고', '이것은', '누구입니까'], 'extra' => ['어디']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Where', 2,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Okul', 'img' => 'school']],
                plain: [['tr' => 'Nerede'], ['tr' => 'Kitap']],
                phrases: [
                    'a' => [
                        'words' => ['ev', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the house', 'correct' => ['house', 'where'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Où est la maison', 'correct' => ['maison', 'où'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['casa', 'dónde'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['Haus', 'wo'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '집은 어디입니까', 'correct' => ['집은', '어디입니까'], 'extra' => ['학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['okul', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the school', 'correct' => ['school', 'where'], 'extra' => ['house']],
                            'fr' => ['sentence' => "Où est l'école", 'correct' => ['école', 'où'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Dónde está la escuela', 'correct' => ['escuela', 'dónde'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Wo ist die Schule', 'correct' => ['Schule', 'wo'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '学校はどこですか', 'correct' => ['学校', 'は', 'どこですか'], 'extra' => ['家']],
                            'ko' => ['sentence' => '학교는 어디입니까', 'correct' => ['학교는', '어디입니까'], 'extra' => ['집']],
                        ],
                    ],
                    'c' => [
                        'words' => ['benim', 'kitabım', 'nerede'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Where is my book', 'correct' => ['my', 'book', 'where'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Où est mon livre', 'correct' => ['mon', 'livre', 'où'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está mi libro', 'correct' => ['mi', 'libro', 'dónde'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist mein Buch', 'correct' => ['mein', 'Buch', 'wo'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私の本はどこですか', 'correct' => ['私の', '本', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '내 책은 어디입니까', 'correct' => ['내', '책은', '어디입니까'], 'extra' => ['학교']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Your Name', 3,
                pictures: [['tr' => 'Öğretmen', 'img' => 'teacher'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Adın'], ['tr' => 'Ne']],
                phrases: [
                    'a' => [
                        'words' => ['adın', 'ne'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is your name', 'correct' => ['your name', 'what'], 'extra' => ['who']],
                            'fr' => ['sentence' => 'Quel est ton nom', 'correct' => ['ton nom', 'quoi'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Cuál es tu nombre', 'correct' => ['tu nombre', 'qué'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Wie ist dein Name', 'correct' => ['dein Name', 'was'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'あなたの名前は何ですか', 'correct' => ['あなたの', '名前', 'は', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '너의 이름은 무엇입니까', 'correct' => ['너의', '이름은', '무엇입니까'], 'extra' => ['누구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['senin', 'adın'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Your name', 'correct' => ['your', 'your name'], 'extra' => ['my name']],
                            'fr' => ['sentence' => 'Ton nom', 'correct' => ['ton', 'ton nom'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Tu nombre', 'correct' => ['tu', 'tu nombre'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Dein Name', 'correct' => ['dein', 'dein Name'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'あなたの名前', 'correct' => ['あなたの', '名前'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '너의 이름', 'correct' => ['너의', '이름'], 'extra' => ['내 이름']],
                        ],
                    ],
                    'c' => [
                        'words' => ['merhaba', 'adın', 'ne'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello what is your name', 'correct' => ['hello', 'your name', 'what'], 'extra' => ['welcome']],
                            'fr' => ['sentence' => 'Bonjour quel est ton nom', 'correct' => ['bonjour', 'ton nom', 'quoi'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Hola cuál es tu nombre', 'correct' => ['hola', 'tu nombre', 'qué'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Hallo wie ist dein Name', 'correct' => ['hallo', 'dein Name', 'was'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'こんにちは、あなたの名前は何ですか', 'correct' => ['こんにちは', 'あなたの', '名前', 'は', '何', 'です', 'か'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '안녕하세요 너의 이름은 무엇입니까', 'correct' => ['안녕하세요', '너의', '이름은', '무엇입니까'], 'extra' => ['환영합니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: When & Why', 4,
                pictures: [['tr' => 'Park', 'img' => 'park'], ['tr' => 'Okul', 'img' => 'school']],
                plain: [['tr' => 'Ne zaman'], ['tr' => 'Neden']],
                phrases: [
                    'a' => [
                        'words' => ['parka', 'ne zaman'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'When to the park', 'correct' => ['when', 'to the park'], 'extra' => ['why']],
                            'fr' => ['sentence' => 'Quand au parc', 'correct' => ['quand', 'au parc'], 'extra' => ['pourquoi']],
                            'es' => ['sentence' => 'Cuándo al parque', 'correct' => ['cuándo', 'al parque'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann zum Park', 'correct' => ['wann', 'zum Park'], 'extra' => ['warum']],
                            'ja' => ['sentence' => 'いつ公園へ', 'correct' => ['いつ', '公園', 'へ'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '언제 공원에', 'correct' => ['언제', '공원에'], 'extra' => ['왜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['okula', 'neden'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Why to school', 'correct' => ['why', 'to school'], 'extra' => ['when']],
                            'fr' => ['sentence' => "Pourquoi à l'école", 'correct' => ["à l'école", 'pourquoi'], 'extra' => ['quand']],
                            'es' => ['sentence' => 'Por qué a la escuela', 'correct' => ['por qué', 'a la escuela'], 'extra' => ['cuándo']],
                            'de' => ['sentence' => 'Warum zur Schule', 'correct' => ['warum', 'zur Schule'], 'extra' => ['wann']],
                            'ja' => ['sentence' => 'なぜ学校へ', 'correct' => ['なぜ', '学校', 'へ'], 'extra' => ['いつ']],
                            'ko' => ['sentence' => '왜 학교에', 'correct' => ['왜', '학교에'], 'extra' => ['언제']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sen', 'parka', 'ne zaman', 'gitmek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'When do you go to the park', 'correct' => ['you', 'to the park', 'when', 'to go'], 'extra' => ['why']],
                            'fr' => ['sentence' => 'Quand vas-tu au parc', 'correct' => ['tu', 'au parc', 'quand', 'aller'], 'extra' => ['pourquoi']],
                            'es' => ['sentence' => 'Cuándo vas al parque', 'correct' => ['tú', 'al parque', 'cuándo', 'ir'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann gehst du zum Park', 'correct' => ['du', 'zum Park', 'wann', 'gehen'], 'extra' => ['warum']],
                            'ja' => ['sentence' => 'あなたはいつ公園へ行きますか', 'correct' => ['あなた', 'は', 'いつ', '公園', 'へ', '行きます', 'か'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '너는 언제 공원에 가니', 'correct' => ['너는', '언제', '공원에', '가니'], 'extra' => ['왜']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: How & How Many', 5,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Kedi', 'img' => 'cat']],
                plain: [['tr' => 'Nasıl'], ['tr' => 'Kaç']],
                phrases: [
                    'a' => [
                        'words' => ['kaç', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'book'], 'extra' => ['how']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien', 'livre'], 'extra' => ['comment']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libro'], 'extra' => ['cómo']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Buch'], 'extra' => ['wie']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どう']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['어떻게']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kaç', 'kedi'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many cats', 'correct' => ['how many', 'cat'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Combien de chats', 'correct' => ['combien', 'chat'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Cuántos gatos', 'correct' => ['cuántos', 'gato'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Wie viele Katzen', 'correct' => ['wie viele', 'Katze'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '猫はいくつですか', 'correct' => ['猫', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 몇 마리', 'correct' => ['고양이', '몇', '마리'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sen', 'nasılsın', 've', 'kaç', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'How are you and how many books', 'correct' => ['you', 'how are you', 'and', 'how many', 'book'], 'extra' => ['where']],
                            'fr' => ['sentence' => 'Comment vas-tu et combien de livres', 'correct' => ['tu', 'comment vas-tu', 'et', 'combien', 'livre'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Cómo estás y cuántos libros', 'correct' => ['tú', 'cómo estás', 'y', 'cuántos', 'libro'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Wie geht es dir und wie viele Bücher', 'correct' => ['du', 'wie geht es dir', 'und', 'wie viele', 'Buch'], 'extra' => ['wo']],
                            'ja' => ['sentence' => '元気ですか、本はいくつですか', 'correct' => ['元気', 'です', 'か', '本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '어떻게 지내 그리고 책 몇 권', 'correct' => ['어떻게', '지내', '그리고', '책', '몇', '권'], 'extra' => ['어디']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
