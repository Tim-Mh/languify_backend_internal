<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitConversation02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'قهوة' => 'coffee', 'شاي' => 'tea', 'مدرسة' => 'school', 'كتاب' => 'book',
        'حديقة' => 'park', 'ماء' => 'water', 'حليب' => 'milk', 'خبز' => 'bread',
    ];

    /**
     * Arabic Conversation Unit 2.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Asking Questions', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What & Who', 1,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'ماذا'], ['ar' => 'هذا']],
                phrases: [
                    'a' => [
                        'words' => ['ماذا', 'هذا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'What is this', 'correct' => ['what is', 'this'], 'extra' => ['who']],
                            'az' => ['sentence' => 'nə bu', 'correct' => ['nə', 'bu'], 'extra' => ['kim']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est", 'correct' => ['ceci', 'quoi'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Qué es esto', 'correct' => ['qué es', 'esto'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Was ist das', 'correct' => ['was ist', 'das'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'これは何ですか', 'correct' => ['これは', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '이것은 무엇입니까', 'correct' => ['이것은', '무엇입니까'], 'extra' => ['누구']],
                            'tr' => ['sentence' => 'bu ne', 'correct' => ['bu', 'ne'], 'extra' => ['kim', 'kitap']],
                            'ru' => ['sentence' => 'что это', 'correct' => ['что', 'это'], 'extra' => ['кто']],
                        ],
                    ],
                    'b' => [
                        'words' => ['مَن', 'هذا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Who is this', 'correct' => ['who is', 'this'], 'extra' => ['what']],
                            'az' => ['sentence' => 'kim bu', 'correct' => ['kim', 'bu'], 'extra' => ['nə']],
                            'fr' => ['sentence' => 'Qui est-ce', 'correct' => ['qui est', 'ce'], 'extra' => ['quoi']],
                            'es' => ['sentence' => 'Quién es este', 'correct' => ['quién es', 'este'], 'extra' => ['qué']],
                            'de' => ['sentence' => 'Wer ist das', 'correct' => ['wer ist', 'das'], 'extra' => ['was']],
                            'ja' => ['sentence' => 'これは誰ですか', 'correct' => ['これは', '誰', 'です', 'か'], 'extra' => ['何']],
                            'ko' => ['sentence' => '이것은 누구입니까', 'correct' => ['이것은', '누구입니까'], 'extra' => ['무엇']],
                            'tr' => ['sentence' => 'bu kim', 'correct' => ['bu', 'kim'], 'extra' => ['ne', 'kitap']],
                            'ru' => ['sentence' => 'кто это', 'correct' => ['кто', 'это'], 'extra' => ['что']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ماذا', 'هذا', 'و', 'مَن', 'هذا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'What is this and who is this', 'correct' => ['what is', 'this and', 'who', 'is', 'this'], 'extra' => ['where']],
                            'az' => ['sentence' => 'nə bu və kim bu', 'correct' => ['nə', 'bu', 'və', 'kim', 'bu'], 'extra' => ['harada']],
                            'fr' => ['sentence' => "Qu'est-ce que c'est et qui est-ce", 'correct' => ['ceci', 'quoi', 'et', 'ceci', 'qui'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Qué es esto y quién es este', 'correct' => ['qué es', 'esto y', 'quién', 'es', 'este'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Was ist das und wer ist das', 'correct' => ['was ist', 'das und', 'wer', 'ist', 'das'], 'extra' => ['wo']],
                            'ja' => ['sentence' => 'これは何で、これは誰ですか', 'correct' => ['これは', '何', 'で', 'これは', '誰', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '이것은 무엇이고 이것은 누구입니까', 'correct' => ['이것은', '무엇이고', '이것은', '누구입니까'], 'extra' => ['어디']],
                            'tr' => ['sentence' => 'bu ne ve bu kim', 'correct' => ['bu', 'ne', 've', 'bu', 'kim'], 'extra' => ['kitap', 'arkadaş']],
                            'ru' => ['sentence' => 'что это и кто это', 'correct' => ['что', 'это', 'и', 'кто', 'это'], 'extra' => ['где']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Where', 2,
                pictures: [['ar' => 'مدرسة', 'img' => 'school'], ['ar' => 'كتاب', 'img' => 'book']],
                plain: [['ar' => 'أين'], ['ar' => 'البيت']],
                phrases: [
                    'a' => [
                        'words' => ['أين', 'البيت'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the house', 'correct' => ['where is', 'the house'], 'extra' => ['school']],
                            'az' => ['sentence' => 'harada evdə', 'correct' => ['harada', 'evdə'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => 'Où est la maison', 'correct' => ['où est', 'la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['dónde está', 'la casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['Wo ist', 'das Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '집은 어디입니까', 'correct' => ['집은', '어디입니까'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'ev nerede', 'correct' => ['ev', 'nerede'], 'extra' => ['kitap', 'okul']],
                            'ru' => ['sentence' => 'где доме', 'correct' => ['где', 'доме'], 'extra' => ['школа']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أين', 'مدرسة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the school', 'correct' => ['where is', 'the school'], 'extra' => ['house']],
                            'az' => ['sentence' => 'harada məktəb', 'correct' => ['harada', 'məktəb'], 'extra' => ['ev']],
                            'fr' => ['sentence' => "Où est l'école", 'correct' => ['école', 'où'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Dónde está la escuela', 'correct' => ['dónde está', 'la escuela'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Wo ist die Schule', 'correct' => ['Wo ist', 'die Schule'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '学校はどこですか', 'correct' => ['学校', 'は', 'どこですか'], 'extra' => ['家']],
                            'ko' => ['sentence' => '학교는 어디입니까', 'correct' => ['학교는', '어디입니까'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'okul nerede', 'correct' => ['okul', 'nerede'], 'extra' => ['kitap', 'ev']],
                            'ru' => ['sentence' => 'где школа', 'correct' => ['где', 'школа'], 'extra' => ['дом']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أين', 'كتاب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is my book', 'correct' => ['where is', 'my', 'book'], 'extra' => ['school']],
                            'az' => ['sentence' => 'harada mənim kitab', 'correct' => ['harada', 'mənim', 'kitab'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => 'Où est mon livre', 'correct' => ['où est', 'mon', 'livre'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Dónde está mi libro', 'correct' => ['dónde está', 'mi', 'libro'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist mein Buch', 'correct' => ['wo ist', 'mein', 'Buch'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私の本はどこですか', 'correct' => ['私の', '本', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '내 책은 어디입니까', 'correct' => ['내', '책은', '어디입니까'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'benim kitabım nerede', 'correct' => ['benim', 'kitabım', 'nerede'], 'extra' => ['kitap', 'ev']],
                            'ru' => ['sentence' => 'где мой книга', 'correct' => ['где', 'мой', 'книга'], 'extra' => ['школа']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Your Name', 3,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'ماذا'], ['ar' => 'اسمك']],
                phrases: [
                    'a' => [
                        'words' => ['ماذا', 'اسمك'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'What is your name', 'correct' => ['what is', 'your name'], 'extra' => ['who']],
                            'az' => ['sentence' => 'nə adın', 'correct' => ['nə', 'adın'], 'extra' => ['kim']],
                            'fr' => ['sentence' => 'Quel est ton nom', 'correct' => ['quel est', 'ton nom'], 'extra' => ['qui']],
                            'es' => ['sentence' => 'Cuál es tu nombre', 'correct' => ['cuál es', 'tu nombre'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Wie ist dein Name', 'correct' => ['wie ist', 'dein Name'], 'extra' => ['wer']],
                            'ja' => ['sentence' => 'あなたの名前は何ですか', 'correct' => ['あなたの', '名前', 'は', '何', 'です', 'か'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '너의 이름은 무엇입니까', 'correct' => ['너의', '이름은', '무엇입니까'], 'extra' => ['누구']],
                            'tr' => ['sentence' => 'adın ne', 'correct' => ['adın', 'ne'], 'extra' => ['öğretmen', 'arkadaş']],
                            'ru' => ['sentence' => 'что твоё имя', 'correct' => ['что', 'твоё имя'], 'extra' => ['кто']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'اسم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is Your name', 'correct' => ['this is', 'your', 'name'], 'extra' => ['my name']],
                            'az' => ['sentence' => 'bu sənin ad', 'correct' => ['bu', 'sənin', 'ad'], 'extra' => ['adım']],
                            'fr' => ['sentence' => "C'est Ton nom", 'correct' => ["c'est", 'ton', 'nom'], 'extra' => ['mon nom']],
                            'es' => ['sentence' => 'Esto es Tu nombre', 'correct' => ['esto es', 'tu', 'nombre'], 'extra' => ['mi nombre']],
                            'de' => ['sentence' => 'Das ist Dein Name', 'correct' => ['das ist', 'dein', 'Name'], 'extra' => ['mein Name']],
                            'ja' => ['sentence' => 'これはあなたの名前です', 'correct' => ['これは', 'あなたの', '名前'], 'extra' => ['私の名前']],
                            'ko' => ['sentence' => '이것은 너의 이름입니다', 'correct' => ['이것은', '너의', '이름'], 'extra' => ['내 이름']],
                            'tr' => ['sentence' => 'senin adın', 'correct' => ['senin', 'adın'], 'extra' => ['ne', 'öğretmen']],
                            'ru' => ['sentence' => 'Это твой имя', 'correct' => ['это', 'твой', 'имя'], 'extra' => ['моё имя']],
                        ],
                    ],
                    'c' => [
                        'words' => ['مرحبا', 'ماذا', 'اسم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello what is your name', 'correct' => ['hello what', 'is your', 'name'], 'extra' => ['welcome']],
                            'az' => ['sentence' => 'salam nə sənin ad', 'correct' => ['salam', 'nə', 'sənin', 'ad'], 'extra' => ['xoş gəlmisiniz']],
                            'fr' => ['sentence' => 'Bonjour quel est ton nom', 'correct' => ['bonjour quel', 'est ton', 'nom'], 'extra' => ['bienvenue']],
                            'es' => ['sentence' => 'Hola cuál es tu nombre', 'correct' => ['hola cuál', 'es tu', 'nombre'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Hallo wie ist dein Name', 'correct' => ['hallo wie', 'ist dein', 'Name'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'こんにちは、あなたの名前は何ですか', 'correct' => ['こんにちは', 'あなたの', '名前', 'は', '何', 'です', 'か'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '안녕하세요 너의 이름은 무엇입니까', 'correct' => ['안녕하세요', '너의', '이름은', '무엇입니까'], 'extra' => ['환영합니다']],
                            'tr' => ['sentence' => 'merhaba adın ne', 'correct' => ['merhaba', 'adın', 'ne'], 'extra' => ['öğretmen', 'arkadaş']],
                            'ru' => ['sentence' => 'привет что твой имя', 'correct' => ['привет', 'что', 'твой', 'имя'], 'extra' => ['добро пожаловать']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: When & Why', 4,
                pictures: [['ar' => 'حديقة', 'img' => 'park'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'متى'], ['ar' => 'إلى']],
                phrases: [
                    'a' => [
                        'words' => ['متى', 'إلى', 'الحديقة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'When to the park', 'correct' => ['when', 'to the park'], 'extra' => ['why']],
                            'az' => ['sentence' => 'nə vaxt parka', 'correct' => ['nə vaxt', 'parka'], 'extra' => ['niyə']],
                            'fr' => ['sentence' => 'Quand au parc', 'correct' => ['quand', 'au parc'], 'extra' => ['pourquoi']],
                            'es' => ['sentence' => 'Cuándo al parque', 'correct' => ['cuándo', 'al parque'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann zum Park', 'correct' => ['wann', 'zum Park'], 'extra' => ['warum']],
                            'ja' => ['sentence' => 'いつ公園へ', 'correct' => ['いつ', '公園', 'へ'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '언제 공원에', 'correct' => ['언제', '공원에'], 'extra' => ['왜']],
                            'tr' => ['sentence' => 'parka ne zaman', 'correct' => ['parka', 'ne zaman'], 'extra' => ['neden', 'park']],
                            'ru' => ['sentence' => 'когда в парк', 'correct' => ['когда', 'в', 'парк'], 'extra' => ['почему']],
                        ],
                    ],
                    'b' => [
                        'words' => ['لماذا', 'إلى المدرسة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Why to school', 'correct' => ['why', 'to school'], 'extra' => ['when']],
                            'az' => ['sentence' => 'niyə məktəbə', 'correct' => ['niyə', 'məktəbə'], 'extra' => ['nə vaxt']],
                            'fr' => ['sentence' => "Pourquoi à l'école", 'correct' => ["à l'école", 'pourquoi'], 'extra' => ['quand']],
                            'es' => ['sentence' => 'Por qué a la escuela', 'correct' => ['por qué', 'a la escuela'], 'extra' => ['cuándo']],
                            'de' => ['sentence' => 'Warum zur Schule', 'correct' => ['warum', 'zur Schule'], 'extra' => ['wann']],
                            'ja' => ['sentence' => 'なぜ学校へ', 'correct' => ['なぜ', '学校', 'へ'], 'extra' => ['いつ']],
                            'ko' => ['sentence' => '왜 학교에', 'correct' => ['왜', '학교에'], 'extra' => ['언제']],
                            'tr' => ['sentence' => 'okula neden', 'correct' => ['okula', 'neden'], 'extra' => ['ne zaman', 'park']],
                            'ru' => ['sentence' => 'почему в школу', 'correct' => ['почему', 'в', 'школу'], 'extra' => ['когда']],
                        ],
                    ],
                    'c' => [
                        'words' => ['متى', 'أنت', 'أذهب', 'إلى', 'حديقة'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'When do you go to the park', 'correct' => ['when do', 'you go', 'to the', 'park'], 'extra' => ['why']],
                            'az' => ['sentence' => 'nə vaxt sən gedirəm park', 'correct' => ['nə vaxt', 'sən', 'gedirəm', 'park'], 'extra' => ['niyə']],
                            'fr' => ['sentence' => 'Quand vas-tu au parc', 'correct' => ['quand vas', 'tu', 'au', 'parc'], 'extra' => ['pourquoi']],
                            'es' => ['sentence' => 'Cuándo vas al parque', 'correct' => ['cuándo', 'vas', 'al', 'parque'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann gehst du zum Park', 'correct' => ['wann gehst', 'du', 'zum', 'Park'], 'extra' => ['warum']],
                            'ja' => ['sentence' => 'あなたはいつ公園へ行きますか', 'correct' => ['あなた', 'は', 'いつ', '公園', 'へ', '行きます', 'か'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '너는 언제 공원에 가니', 'correct' => ['너는', '언제', '공원에', '가니'], 'extra' => ['왜']],
                            'tr' => ['sentence' => 'sen parka ne zaman gitmek', 'correct' => ['sen', 'parka', 'ne zaman', 'gitmek'], 'extra' => ['neden', 'park']],
                            'ru' => ['sentence' => 'когда ты иду в парк', 'correct' => ['когда', 'ты', 'иду', 'в', 'парк'], 'extra' => ['почему']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: How & How Many', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'كم'], ['ar' => 'كتب']],
                phrases: [
                    'a' => [
                        'words' => ['كم', 'كتب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'books'], 'extra' => ['how']],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => ['necə']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien de', 'livres'], 'extra' => ['comment']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['cómo']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['wie']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どう']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['어떻게']],
                            'tr' => ['sentence' => 'kaç kitap', 'correct' => ['kaç', 'kitap'], 'extra' => ['nasıl', 'kedi']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => ['как']],
                        ],
                    ],
                    'b' => [
                        'words' => ['كم', 'قطط'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many cats', 'correct' => ['how many', 'cats'], 'extra' => ['book']],
                            'az' => ['sentence' => 'neçə pişiklər', 'correct' => ['neçə', 'pişiklər'], 'extra' => ['kitab']],
                            'fr' => ['sentence' => 'Combien de chats', 'correct' => ['combien de', 'chats'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Cuántos gatos', 'correct' => ['cuántos', 'gatos'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Wie viele Katzen', 'correct' => ['wie viele', 'Katzen'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '猫はいくつですか', 'correct' => ['猫', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 몇 마리', 'correct' => ['고양이', '몇', '마리'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'kaç kedi', 'correct' => ['kaç', 'kedi'], 'extra' => ['nasıl', 'kitap']],
                            'ru' => ['sentence' => 'сколько коты', 'correct' => ['сколько', 'коты'], 'extra' => ['книга']],
                        ],
                    ],
                    'c' => [
                        'words' => ['كيف', 'أنت', 'و', 'كيف', 'كثير', 'كتب'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'How are you and how many books', 'correct' => ['how are', 'you and', 'how', 'many', 'books'], 'extra' => ['where']],
                            'az' => ['sentence' => 'necə sən və necə çoxlu kitablar', 'correct' => ['necə', 'sən', 'və', 'necə', 'çoxlu', 'kitablar'], 'extra' => ['harada']],
                            'fr' => ['sentence' => 'Comment vas-tu et combien de livres', 'correct' => ['comment vas', 'tu et', 'combien', 'de', 'livres'], 'extra' => ['où']],
                            'es' => ['sentence' => 'Cómo estás y cuántos libros', 'correct' => ['cómo', 'estás', 'y', 'cuántos', 'libros'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Wie geht es dir und wie viele Bücher', 'correct' => ['wie geht', 'es dir', 'und wie', 'viele', 'Bücher'], 'extra' => ['wo']],
                            'ja' => ['sentence' => '元気ですか、本はいくつですか', 'correct' => ['元気', 'です', 'か', '本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '어떻게 지내 그리고 책 몇 권', 'correct' => ['어떻게', '지내', '그리고', '책', '몇', '권'], 'extra' => ['어디']],
                            'tr' => ['sentence' => 'sen nasılsın ve kaç kitap', 'correct' => ['sen', 'nasılsın', 've', 'kaç', 'kitap'], 'extra' => ['nasıl', 'kedi']],
                            'ru' => ['sentence' => 'как ты и как много книги', 'correct' => ['как', 'ты', 'и', 'как', 'много', 'книги'], 'extra' => ['где']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
