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
                            'en' => ['sentence' => 'What is this', 'correct' => ['what is', 'this'], 'extra' => ['who']],
                            'az' => ['sentence' => 'nə bu', 'correct' => ['nə', 'bu'], 'extra' => ['kim']],
                            'ar' => ['sentence' => 'ماذا هذا', 'correct' => ['ماذا', 'هذا'], 'extra' => ['مَن']],
                            'ru' => ['sentence' => 'что это', 'correct' => ['что', 'это'], 'extra' => ['кто']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est", 'correct' => ['ceci', 'quoi'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Qué es esto', 'correct' => ['qué es', 'esto'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Was ist das', 'correct' => ['was ist', 'das'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'これは何ですか', 'correct' => ['これは', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '이것은 무엇입니까', 'correct' => ['이것은', '무엇입니까'], 'extra' => ['누구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'kim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Who is this', 'correct' => ['who is', 'this'], 'extra' => ['what']],
                            'az' => ['sentence' => 'kim bu', 'correct' => ['kim', 'bu'], 'extra' => ['nə']],
                            'ar' => ['sentence' => 'مَن هذا', 'correct' => ['مَن', 'هذا'], 'extra' => ['ماذا']],
                            'ru' => ['sentence' => 'кто это', 'correct' => ['кто', 'это'], 'extra' => ['что']],
                            'fr' => ['sentence' => 'Qui est-ce', 'correct' => ['qui est', 'ce'], 'extra' => ['quoi']],
                            'es' => ['sentence' => 'Quién es este', 'correct' => ['quién es', 'este'], 'extra' => ['qué']],
                            'de' => ['sentence' => 'Wer ist das', 'correct' => ['wer ist', 'das'], 'extra' => ['was']],
                            'ja' => ['sentence' => 'これは誰ですか', 'correct' => ['これは', '誰', 'です', 'か'], 'extra' => ['何']],
                            'ko' => ['sentence' => '이것은 누구입니까', 'correct' => ['이것은', '누구입니까'], 'extra' => ['무엇']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'ne', 've', 'bu', 'kim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'What is this and who is this', 'correct' => ['what is', 'this and', 'who', 'is', 'this'], 'extra' => ['where']],
                            'az' => ['sentence' => 'nə bu və kim bu', 'correct' => ['nə', 'bu', 'və', 'kim', 'bu'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'ماذا هذا و مَن هذا', 'correct' => ['ماذا', 'هذا', 'و', 'مَن', 'هذا'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'что это и кто это', 'correct' => ['что', 'это', 'и', 'кто', 'это'], 'extra' => ['где']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est et qui est-ce", 'correct' => ['ceci', 'quoi', 'et', 'ceci', 'qui'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Qué es esto y quién es este', 'correct' => ['qué es', 'esto y', 'quién', 'es', 'este'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Was ist das und wer ist das', 'correct' => ['was ist', 'das und', 'wer', 'ist', 'das'], 'extra' => ['wo']],
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
                            'en' => ['sentence' => 'Where is the house', 'correct' => ['where is', 'the house'], 'extra' => ['school']],
                            'az' => ['sentence' => 'harada evdə', 'correct' => ['harada', 'evdə'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'أين البيت', 'correct' => ['أين', 'البيت'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'где доме', 'correct' => ['где', 'доме'], 'extra' => ['школа']],
                            'fr' => ['sentence' => 'Où est la maison', 'correct' => ['où est', 'la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['dónde está', 'la casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['Wo ist', 'das Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '집은 어디입니까', 'correct' => ['집은', '어디입니까'], 'extra' => ['학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['okul', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the school', 'correct' => ['where is', 'the school'], 'extra' => ['house']],
                            'az' => ['sentence' => 'harada məktəb', 'correct' => ['harada', 'məktəb'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'أين مدرسة', 'correct' => ['أين', 'مدرسة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'где школа', 'correct' => ['где', 'школа'], 'extra' => ['дом']],
                            'fr' => ['sentence' => "Où est l'école", 'correct' => ['école', 'où'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Dónde está la escuela', 'correct' => ['dónde está', 'la escuela'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Wo ist die Schule', 'correct' => ['Wo ist', 'die Schule'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '学校はどこですか', 'correct' => ['学校', 'は', 'どこですか'], 'extra' => ['家']],
                            'ko' => ['sentence' => '학교는 어디입니까', 'correct' => ['학교는', '어디입니까'], 'extra' => ['집']],
                        ],
                    ],
                    'c' => [
                        'words' => ['benim', 'kitabım', 'nerede'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Where is my book', 'correct' => ['where is', 'my', 'book'], 'extra' => ['school']],
                            'az' => ['sentence' => 'harada mənim kitab', 'correct' => ['harada', 'mənim', 'kitab'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'أين كتاب', 'correct' => ['أين', 'كتاب'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'где мой книга', 'correct' => ['где', 'мой', 'книга'], 'extra' => ['школа']],
                            'fr' => ['sentence' => 'Où est mon livre', 'correct' => ['où est', 'mon', 'livre'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está mi libro', 'correct' => ['dónde está', 'mi', 'libro'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist mein Buch', 'correct' => ['wo ist', 'mein', 'Buch'], 'extra' => ['Schule']],
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
                            'en' => ['sentence' => 'What is your name', 'correct' => ['what is', 'your name'], 'extra' => ['who']],
                            'az' => ['sentence' => 'nə adın', 'correct' => ['nə', 'adın'], 'extra' => ['kim']],
                            'ar' => ['sentence' => 'ماذا اسمك', 'correct' => ['ماذا', 'اسمك'], 'extra' => ['مَن']],
                            'ru' => ['sentence' => 'что твоё имя', 'correct' => ['что', 'твоё имя'], 'extra' => ['кто']],
                            'fr' => ['sentence' => 'Quel est ton nom', 'correct' => ['quel est', 'ton nom'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Cuál es tu nombre', 'correct' => ['cuál es', 'tu nombre'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Wie ist dein Name', 'correct' => ['wie ist', 'dein Name'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'あなたの名前は何ですか', 'correct' => ['あなたの', '名前', 'は', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '너의 이름은 무엇입니까', 'correct' => ['너의', '이름은', '무엇입니까'], 'extra' => ['누구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['senin', 'adın'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Your name', 'correct' => ['your', 'name'], 'extra' => ['my name']],
                            'az' => ['sentence' => 'sənin ad', 'correct' => ['sənin', 'ad'], 'extra' => ['adım']],
                            'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => ['اسمي']],
                            'ru' => ['sentence' => 'твой имя', 'correct' => ['твой', 'имя'], 'extra' => ['моё имя']],
                            'fr' => ['sentence' => 'Ton nom', 'correct' => ['ton', 'nom'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Tu nombre', 'correct' => ['tu', 'nombre'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Dein Name', 'correct' => ['dein', 'Name'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'あなたの名前', 'correct' => ['あなたの', '名前'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '너의 이름', 'correct' => ['너의', '이름'], 'extra' => ['내 이름']],
                        ],
                    ],
                    'c' => [
                        'words' => ['merhaba', 'adın', 'ne'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello what is your name', 'correct' => ['hello what', 'is your', 'name'], 'extra' => ['welcome']],
                            'az' => ['sentence' => 'salam nə sənin ad', 'correct' => ['salam', 'nə', 'sənin', 'ad'], 'extra' => ['xoş gəlmisiniz']],
                            'ar' => ['sentence' => 'مرحبا ماذا اسم', 'correct' => ['مرحبا', 'ماذا', 'اسم'], 'extra' => ['أهلا وسهلا']],
                            'ru' => ['sentence' => 'привет что твой имя', 'correct' => ['привет', 'что', 'твой', 'имя'], 'extra' => ['добро пожаловать']],
                            'fr' => ['sentence' => 'Bonjour quel est ton nom', 'correct' => ['bonjour quel', 'est ton', 'nom'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Hola cuál es tu nombre', 'correct' => ['hola cuál', 'es tu', 'nombre'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Hallo wie ist dein Name', 'correct' => ['hallo wie', 'ist dein', 'Name'], 'extra' => ['willkommen']],
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
                            'az' => ['sentence' => 'nə vaxt parka', 'correct' => ['nə vaxt', 'parka'], 'extra' => ['niyə']],
                            'ar' => ['sentence' => 'متى إلى الحديقة', 'correct' => ['متى', 'إلى', 'الحديقة'], 'extra' => ['لماذا']],
                            'ru' => ['sentence' => 'когда в парк', 'correct' => ['когда', 'в', 'парк'], 'extra' => ['почему']],
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
                            'az' => ['sentence' => 'niyə məktəbə', 'correct' => ['niyə', 'məktəbə'], 'extra' => ['nə vaxt']],
                            'ar' => ['sentence' => 'لماذا إلى المدرسة', 'correct' => ['لماذا', 'إلى المدرسة'], 'extra' => ['متى']],
                            'ru' => ['sentence' => 'почему в школу', 'correct' => ['почему', 'в', 'школу'], 'extra' => ['когда']],
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
                            'en' => ['sentence' => 'When do you go to the park', 'correct' => ['when do', 'you go', 'to the', 'park'], 'extra' => ['why']],
                            'az' => ['sentence' => 'nə vaxt sən gedirəm park', 'correct' => ['nə vaxt', 'sən', 'gedirəm', 'park'], 'extra' => ['niyə']],
                            'ar' => ['sentence' => 'متى أنت أذهب إلى حديقة', 'correct' => ['متى', 'أنت', 'أذهب', 'إلى', 'حديقة'], 'extra' => ['لماذا']],
                            'ru' => ['sentence' => 'когда ты иду в парк', 'correct' => ['когда', 'ты', 'иду', 'в', 'парк'], 'extra' => ['почему']],
                            'fr' => ['sentence' => 'Quand vas-tu au parc', 'correct' => ['quand vas', 'tu', 'au', 'parc'], 'extra' => ['pourquoi']],
                            'es' => ['sentence' => 'Cuándo vas al parque', 'correct' => ['cuándo', 'vas', 'al', 'parque'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann gehst du zum Park', 'correct' => ['wann gehst', 'du', 'zum', 'Park'], 'extra' => ['warum']],
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
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'books'], 'extra' => ['how']],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => ['necə']],
                            'ar' => ['sentence' => 'كم كتب', 'correct' => ['كم', 'كتب'], 'extra' => ['كيف']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => ['как']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien de', 'livres'], 'extra' => ['comment']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['cómo']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['wie']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どう']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['어떻게']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kaç', 'kedi'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many cats', 'correct' => ['how many', 'cats'], 'extra' => ['book']],
                            'az' => ['sentence' => 'neçə pişiklər', 'correct' => ['neçə', 'pişiklər'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'كم قطط', 'correct' => ['كم', 'قطط'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'сколько коты', 'correct' => ['сколько', 'коты'], 'extra' => ['книга']],
                            'fr' => ['sentence' => 'Combien de chats', 'correct' => ['combien de', 'chats'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Cuántos gatos', 'correct' => ['cuántos', 'gatos'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Wie viele Katzen', 'correct' => ['wie viele', 'Katzen'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '猫はいくつですか', 'correct' => ['猫', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 몇 마리', 'correct' => ['고양이', '몇', '마리'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sen', 'nasılsın', 've', 'kaç', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'How are you and how many books', 'correct' => ['how are', 'you and', 'how', 'many', 'books'], 'extra' => ['where']],
                            'az' => ['sentence' => 'necə sən və necə çoxlu kitablar', 'correct' => ['necə', 'sən', 'və', 'necə', 'çoxlu', 'kitablar'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'كيف أنت و كيف كثير كتب', 'correct' => ['كيف', 'أنت', 'و', 'كيف', 'كثير', 'كتب'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'как ты и как много книги', 'correct' => ['как', 'ты', 'и', 'как', 'много', 'книги'], 'extra' => ['где']],
                            'fr' => ['sentence' => 'Comment vas-tu et combien de livres', 'correct' => ['comment vas', 'tu et', 'combien', 'de', 'livres'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Cómo estás y cuántos libros', 'correct' => ['cómo', 'estás', 'y', 'cuántos', 'libros'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Wie geht es dir und wie viele Bücher', 'correct' => ['wie geht', 'es dir', 'und wie', 'viele', 'Bücher'], 'extra' => ['wo']],
                            'ja' => ['sentence' => '元気ですか、本はいくつですか', 'correct' => ['元気', 'です', 'か', '本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '어떻게 지내 그리고 책 몇 권', 'correct' => ['어떻게', '지내', '그리고', '책', '몇', '권'], 'extra' => ['어디']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
