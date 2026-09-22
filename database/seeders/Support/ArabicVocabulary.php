<?php

namespace Database\Seeders\Support;

/**
 * Arabic word => its meaning in every native language the app supports.
 *
 * Exercise hints, prompts and word-bank tiles must appear in the LEARNER'S
 * native language, so nothing user-facing may be hardcoded to English. Seeders
 * pull from here and store the result as an ['i18n' => [...]] map, which
 * ExerciseContentService resolves per request.
 *
 * THREE THINGS ABOUT ARABIC CHANGE WHAT BELONGS IN HERE.
 *
 * 1. It is written right to left. That is a rendering concern, not a data one:
 *    the strings below are in logical order, which is the order a reader says
 *    them in, and the client is what decides which way to lay them out.
 *
 * 2. The definite article is written joined to its noun, so "the house" is one
 *    word, `البيت`, not two. A phrase that needs the definite form gets its own
 *    entry, the same way Turkish case forms and Russian prepositional forms do.
 *
 * 3. It is written here without tashkeel (the vowel marks), because that is how
 *    Arabic is really read and written. Adding them would make every tile look
 *    like a textbook drill rather than the language.
 *
 * There are no capital letters in Arabic, so the prompt builder's
 * first-letter upper-casing is simply a no-op on these values.
 *
 * Add a word here once and every unit can use it.
 */
class ArabicVocabulary
{
    private const WORDS = [
        // --- Unit 1: at the cafe ---------------------------------------
        'قهوة' => ['en' => 'coffee', 'fr' => 'café', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'tr' => 'kahve', 'ru' => 'кофе', 'az' => 'qəhvə'],
        'شاي' => ['en' => 'tea', 'fr' => 'thé', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'tr' => 'çay', 'ru' => 'чай', 'az' => 'çay'],
        'ماء' => ['en' => 'water', 'fr' => 'eau', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'tr' => 'su', 'ru' => 'вода', 'az' => 'su'],
        'حليب' => ['en' => 'milk', 'fr' => 'lait', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'tr' => 'süt', 'ru' => 'молоко', 'az' => 'süd'],
        'خبز' => ['en' => 'bread', 'fr' => 'pain', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'tr' => 'ekmek', 'ru' => 'хлеб', 'az' => 'çörək'],
        'سكر' => ['en' => 'sugar', 'fr' => 'sucre', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'tr' => 'şeker', 'ru' => 'сахар', 'az' => 'şəkər'],
        'جبن' => ['en' => 'cheese', 'fr' => 'fromage', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'tr' => 'peynir', 'ru' => 'сыр', 'az' => 'pendir'],
        'كعكة' => ['en' => 'cake', 'fr' => 'gâteau', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'tr' => 'pasta', 'ru' => 'торт', 'az' => 'tort'],
        // --- Unit 1: the glue words ------------------------------------
        'و' => ['en' => 'and', 'fr' => 'et', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'tr' => 've', 'ru' => 'и', 'az' => 'və'],
        'من فضلك' => ['en' => 'please', 'fr' => "s'il vous plaît", 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'tr' => 'lütfen', 'ru' => 'пожалуйста', 'az' => 'zəhmət olmasa'],
        'مرحبا' => ['en' => 'hello', 'fr' => 'bonjour', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'tr' => 'merhaba', 'ru' => 'привет', 'az' => 'salam'],
        // --- Unit 2: greetings and courtesy ----------------------------
        'شكرا' => ['en' => 'thank you', 'fr' => 'merci', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'tr' => 'teşekkürler', 'ru' => 'спасибо', 'az' => 'təşəkkür'],
        'نعم' => ['en' => 'yes', 'fr' => 'oui', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'tr' => 'evet', 'ru' => 'да', 'az' => 'bəli'],
        'لا' => ['en' => 'no', 'fr' => 'non', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'tr' => 'hayır', 'ru' => 'нет', 'az' => 'xeyr'],
        'مع السلامة' => ['en' => 'goodbye', 'fr' => 'au revoir', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'tr' => 'hoşça kal', 'ru' => 'до свидания', 'az' => 'sağ ol'],
        'صباح الخير' => ['en' => 'good morning', 'fr' => 'bonjour', 'es' => 'buenos días', 'de' => 'guten Morgen', 'ja' => 'おはよう', 'ko' => '좋은 아침', 'tr' => 'günaydın', 'ru' => 'доброе утро', 'az' => 'sabahınız xeyir'],
        'عفوا' => ['en' => 'excuse me', 'fr' => 'excusez-moi', 'es' => 'perdón', 'de' => 'Entschuldigung', 'ja' => 'すみません', 'ko' => '실례합니다', 'tr' => 'affedersiniz', 'ru' => 'извините', 'az' => 'bağışlayın'],
        'أريد' => ['en' => 'I would like', 'fr' => 'je voudrais', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'tr' => 'istiyorum', 'ru' => 'хочу', 'az' => 'istəyirəm'],
        'الحساب' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'tr' => 'hesap', 'ru' => 'счёт', 'az' => 'hesab'],
        'أهلا وسهلا' => ['en' => 'welcome', 'fr' => 'bienvenue', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'tr' => 'hoş geldiniz', 'ru' => 'добро пожаловать', 'az' => 'xoş gəlmisiniz'],
        'تشرفنا' => ['en' => 'nice to meet you', 'fr' => 'enchanté', 'es' => 'mucho gusto', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '만나서 반갑습니다', 'tr' => 'memnun oldum', 'ru' => 'приятно познакомиться', 'az' => 'tanış olmağa şadam'],
        'كيف حالك' => ['en' => 'how are you', 'fr' => 'comment ça va', 'es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => 'お元気ですか', 'ko' => '잘 지내세요', 'tr' => 'nasılsın', 'ru' => 'как дела', 'az' => 'necəsən'],
        // --- Unit 2: people and home -----------------------------------
        'كتاب' => ['en' => 'book', 'fr' => 'livre', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'tr' => 'kitap', 'ru' => 'книга', 'az' => 'kitab'],
        'كتب' => ['en' => 'books', 'fr' => 'livres', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'tr' => 'kitaplar', 'ru' => 'книги', 'az' => 'kitablar'],
        'بيت' => ['en' => 'house', 'fr' => 'maison', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'ev', 'ru' => 'дом', 'az' => 'ev'],
        'البيت' => ['en' => 'the house', 'fr' => 'la maison', 'es' => 'la casa', 'de' => 'dem Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'evde', 'ru' => 'доме', 'az' => 'evdə'],
        'قط' => ['en' => 'cat', 'fr' => 'chat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kedi', 'ru' => 'кот', 'az' => 'pişik'],
        'كلب' => ['en' => 'dog', 'fr' => 'chien', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpek', 'ru' => 'собака', 'az' => 'it'],
        'طاولة' => ['en' => 'table', 'fr' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '테이블', 'tr' => 'masa', 'ru' => 'стол', 'az' => 'masa'],
        'كرسي' => ['en' => 'chair', 'fr' => 'chaise', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'tr' => 'sandalye', 'ru' => 'стул', 'az' => 'stul'],
        'صديق' => ['en' => 'friend', 'fr' => 'ami', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'tr' => 'arkadaş', 'ru' => 'друг', 'az' => 'dost'],
        'مع صديقي' => ['en' => 'with my friend', 'fr' => 'avec mon ami', 'es' => 'con mi amigo', 'de' => 'mit meinem Freund', 'ja' => '友達と', 'ko' => '친구와', 'tr' => 'arkadaşımla', 'ru' => 'другом', 'az' => 'dostumla'],
        'أم' => ['en' => 'mother', 'fr' => 'mère', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'tr' => 'anne', 'ru' => 'мама', 'az' => 'ana'],
        'أب' => ['en' => 'father', 'fr' => 'père', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'tr' => 'baba', 'ru' => 'папа', 'az' => 'ata'],
        'أخت' => ['en' => 'sister', 'fr' => 'soeur', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매', 'tr' => 'kız kardeş', 'ru' => 'сестра', 'az' => 'bacı'],
        'أخ' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'tr' => 'erkek kardeş', 'ru' => 'брат', 'az' => 'qardaş'],
        'مدرسة' => ['en' => 'school', 'fr' => 'école', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'tr' => 'okul', 'ru' => 'школа', 'az' => 'məktəb'],
        'في المدرسة' => ['en' => 'at school', 'fr' => "à l'école", 'es' => 'en la escuela', 'de' => 'in der Schule', 'ja' => '学校で', 'ko' => '학교에서', 'tr' => 'okulda', 'ru' => 'школе', 'az' => 'məktəbdə'],
        'إلى المدرسة' => ['en' => 'to school', 'fr' => "à l'école", 'es' => 'a la escuela', 'de' => 'zur Schule', 'ja' => '学校へ', 'ko' => '학교로', 'tr' => 'okula', 'ru' => 'школу', 'az' => 'məktəbə'],
        'معلم' => ['en' => 'teacher', 'fr' => 'professeur', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'tr' => 'öğretmen', 'ru' => 'учитель', 'az' => 'müəllim'],
        'طبيب' => ['en' => 'doctor', 'fr' => 'médecin', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'tr' => 'doktor', 'ru' => 'врач', 'az' => 'həkim'],
        'شخص' => ['en' => 'person', 'fr' => 'personne', 'es' => 'persona', 'de' => 'Person', 'ja' => '人', 'ko' => '사람', 'tr' => 'kişi', 'ru' => 'человек', 'az' => 'adam'],
        'جار' => ['en' => 'neighbour', 'fr' => 'voisin', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'tr' => 'komşu', 'ru' => 'сосед', 'az' => 'qonşu'],
        'نادل' => ['en' => 'waiter', 'fr' => 'serveur', 'es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'tr' => 'garson', 'ru' => 'официант', 'az' => 'ofisiant'],
        // --- Unit 3: pronouns and possessives --------------------------
        'أنا' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '저', 'tr' => 'ben', 'ru' => 'я', 'az' => 'mən'],
        'أنت' => ['en' => 'you', 'fr' => 'tu', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '당신', 'tr' => 'sen', 'ru' => 'ты', 'az' => 'sən'],
        'هذا' => ['en' => 'this', 'fr' => 'ce', 'es' => 'esto', 'de' => 'das', 'ja' => 'これ', 'ko' => '이것', 'tr' => 'bu', 'ru' => 'это', 'az' => 'bu'],
        'كتابي' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '제 책', 'tr' => 'kitabım', 'ru' => 'моя книга', 'az' => 'kitabım'],
        'بيتي' => ['en' => 'my house', 'fr' => 'ma maison', 'es' => 'mi casa', 'de' => 'mein Haus', 'ja' => '私の家', 'ko' => '제 집', 'tr' => 'evim', 'ru' => 'мой дом', 'az' => 'evim'],
        'أمي' => ['en' => 'my mother', 'fr' => 'ma mère', 'es' => 'mi madre', 'de' => 'meine Mutter', 'ja' => '私の母', 'ko' => '제 어머니', 'tr' => 'annem', 'ru' => 'моя мама', 'az' => 'anam'],
        'أبي' => ['en' => 'my father', 'fr' => 'mon père', 'es' => 'mi padre', 'de' => 'mein Vater', 'ja' => '私の父', 'ko' => '제 아버지', 'tr' => 'babam', 'ru' => 'мой папа', 'az' => 'atam'],
        'أختي' => ['en' => 'my sister', 'fr' => 'ma soeur', 'es' => 'mi hermana', 'de' => 'meine Schwester', 'ja' => '私の姉妹', 'ko' => '제 자매', 'tr' => 'kız kardeşim', 'ru' => 'моя сестра', 'az' => 'bacım'],
        'صديقي' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'mi amigo', 'de' => 'mein Freund', 'ja' => '私の友達', 'ko' => '제 친구', 'tr' => 'arkadaşım', 'ru' => 'мой друг', 'az' => 'dostum'],
        'مدرستي' => ['en' => 'my school', 'fr' => 'mon école', 'es' => 'mi escuela', 'de' => 'meine Schule', 'ja' => '私の学校', 'ko' => '제 학교', 'tr' => 'okulum', 'ru' => 'моя школа', 'az' => 'məktəbim'],
        'اسمي' => ['en' => 'my name', 'fr' => 'mon nom', 'es' => 'mi nombre', 'de' => 'mein Name', 'ja' => '私の名前', 'ko' => '제 이름', 'tr' => 'adım', 'ru' => 'моё имя', 'az' => 'adım'],
        'اسمك' => ['en' => 'your name', 'fr' => 'ton nom', 'es' => 'tu nombre', 'de' => 'dein Name', 'ja' => 'あなたの名前', 'ko' => '당신의 이름', 'tr' => 'adın', 'ru' => 'твоё имя', 'az' => 'adın'],
        // --- Unit 4: colours -------------------------------------------
        'أحمر' => ['en' => 'red', 'fr' => 'rouge', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤い', 'ko' => '빨간', 'tr' => 'kırmızı', 'ru' => 'красный', 'az' => 'qırmızı'],
        'أزرق' => ['en' => 'blue', 'fr' => 'bleu', 'es' => 'azul', 'de' => 'blau', 'ja' => '青い', 'ko' => '파란', 'tr' => 'mavi', 'ru' => 'синий', 'az' => 'mavi'],
        'أخضر' => ['en' => 'green', 'fr' => 'vert', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑の', 'ko' => '초록', 'tr' => 'yeşil', 'ru' => 'зелёный', 'az' => 'yaşıl'],
        'أصفر' => ['en' => 'yellow', 'fr' => 'jaune', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色い', 'ko' => '노란', 'tr' => 'sarı', 'ru' => 'жёлтый', 'az' => 'sarı'],
        'أسود' => ['en' => 'black', 'fr' => 'noir', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒い', 'ko' => '검은', 'tr' => 'siyah', 'ru' => 'чёрный', 'az' => 'qara'],
        'أبيض' => ['en' => 'white', 'fr' => 'blanc', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白い', 'ko' => '하얀', 'tr' => 'beyaz', 'ru' => 'белый', 'az' => 'ağ'],
        // --- Unit 4: numbers -------------------------------------------
        'اثنان' => ['en' => 'two', 'fr' => 'deux', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'tr' => 'iki', 'ru' => 'два', 'az' => 'iki'],
        'ثلاثة' => ['en' => 'three', 'fr' => 'trois', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'tr' => 'üç', 'ru' => 'три', 'az' => 'üç'],
        'أربعة' => ['en' => 'four', 'fr' => 'quatre', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'tr' => 'dört', 'ru' => 'четыре', 'az' => 'dörd'],
        'خمسة' => ['en' => 'five', 'fr' => 'cinq', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'tr' => 'beş', 'ru' => 'пять', 'az' => 'beş'],
        'عشرة' => ['en' => 'ten', 'fr' => 'dix', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'tr' => 'on', 'ru' => 'десять', 'az' => 'on'],
        'عشرون' => ['en' => 'twenty', 'fr' => 'vingt', 'es' => 'veinte', 'de' => 'zwanzig', 'ja' => '二十', 'ko' => '스물', 'tr' => 'yirmi', 'ru' => 'двадцать', 'az' => 'iyirmi'],
        'رقم' => ['en' => 'number', 'fr' => 'numéro', 'es' => 'número', 'de' => 'Nummer', 'ja' => '番号', 'ko' => '번호', 'tr' => 'numara', 'ru' => 'номер', 'az' => 'nömrə'],
        'كم' => ['en' => 'how many', 'fr' => 'combien', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇', 'tr' => 'kaç', 'ru' => 'сколько', 'az' => 'neçə'],
        // --- Unit 5: describing things ---------------------------------
        'كبير' => ['en' => 'big', 'fr' => 'grand', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'tr' => 'büyük', 'ru' => 'большой', 'az' => 'böyük'],
        'صغير' => ['en' => 'small', 'fr' => 'petit', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'tr' => 'küçük', 'ru' => 'маленький', 'az' => 'kiçik'],
        'جديد' => ['en' => 'new', 'fr' => 'nouveau', 'es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새', 'tr' => 'yeni', 'ru' => 'новый', 'az' => 'yeni'],
        'قديم' => ['en' => 'old', 'fr' => 'vieux', 'es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'tr' => 'eski', 'ru' => 'старый', 'az' => 'köhnə'],
        'جيد' => ['en' => 'good', 'fr' => 'bon', 'es' => 'bueno', 'de' => 'gut', 'ja' => 'いい', 'ko' => '좋은', 'tr' => 'iyi', 'ru' => 'хороший', 'az' => 'yaxşı'],
        'سيء' => ['en' => 'bad', 'fr' => 'mauvais', 'es' => 'malo', 'de' => 'schlecht', 'ja' => '悪い', 'ko' => '나쁜', 'tr' => 'kötü', 'ru' => 'плохой', 'az' => 'pis'],
        'غالي' => ['en' => 'expensive', 'fr' => 'cher', 'es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'tr' => 'pahalı', 'ru' => 'дорогой', 'az' => 'bahalı'],
        'رخيص' => ['en' => 'cheap', 'fr' => 'bon marché', 'es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'tr' => 'ucuz', 'ru' => 'дешёвый', 'az' => 'ucuz'],
        'نظيف' => ['en' => 'clean', 'fr' => 'propre', 'es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれいな', 'ko' => '깨끗한', 'tr' => 'temiz', 'ru' => 'чистый', 'az' => 'təmiz'],
        'طازج' => ['en' => 'fresh', 'fr' => 'frais', 'es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮な', 'ko' => '신선한', 'tr' => 'taze', 'ru' => 'свежий', 'az' => 'təzə'],
        'ساخن' => ['en' => 'hot', 'fr' => 'chaud', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운', 'tr' => 'sıcak', 'ru' => 'горячий', 'az' => 'isti'],
        'بارد' => ['en' => 'cold', 'fr' => 'froid', 'es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운', 'tr' => 'soğuk', 'ru' => 'холодный', 'az' => 'soyuq'],
        'لذيذ' => ['en' => 'delicious', 'fr' => 'délicieux', 'es' => 'delicioso', 'de' => 'lecker', 'ja' => 'おいしい', 'ko' => '맛있는', 'tr' => 'lezzetli', 'ru' => 'вкусный', 'az' => 'dadlı'],
        'لذيذ جدا' => ['en' => 'very delicious', 'fr' => 'très délicieux', 'es' => 'muy delicioso', 'de' => 'sehr lecker', 'ja' => 'とてもおいしい', 'ko' => '아주 맛있는', 'tr' => 'çok lezzetli', 'ru' => 'очень вкусный', 'az' => 'çox dadlı'],
        'مالح' => ['en' => 'salty', 'fr' => 'salé', 'es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠', 'tr' => 'tuzlu', 'ru' => 'солёный', 'az' => 'duzlu'],
        'مشغول' => ['en' => 'busy', 'fr' => 'occupé', 'es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'tr' => 'meşgul', 'ru' => 'занят', 'az' => 'məşğul'],
        'هادئ' => ['en' => 'calm', 'fr' => 'calme', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '静かな', 'ko' => '조용한', 'tr' => 'sakin', 'ru' => 'спокойный', 'az' => 'sakit'],
        'جاهز' => ['en' => 'ready', 'fr' => 'prêt', 'es' => 'listo', 'de' => 'fertig', 'ja' => '準備できた', 'ko' => '준비된', 'tr' => 'hazır', 'ru' => 'готов', 'az' => 'hazır'],
        'صحيح' => ['en' => 'true', 'fr' => 'vrai', 'es' => 'verdadero', 'de' => 'richtig', 'ja' => '正しい', 'ko' => '맞아요', 'tr' => 'doğru', 'ru' => 'правильно', 'az' => 'düzgün'],
        'خطأ' => ['en' => 'wrong', 'fr' => 'faux', 'es' => 'incorrecto', 'de' => 'falsch', 'ja' => '間違い', 'ko' => '틀려요', 'tr' => 'yanlış', 'ru' => 'неправильно', 'az' => 'səhv'],
        'بسرعة' => ['en' => 'fast', 'fr' => 'vite', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速く', 'ko' => '빨리', 'tr' => 'hızlı', 'ru' => 'быстро', 'az' => 'sürətli'],
        'ببطء' => ['en' => 'slowly', 'fr' => 'lentement', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'tr' => 'yavaşça', 'ru' => 'медленно', 'az' => 'yavaş'],
        // --- Unit 6: time ----------------------------------------------
        'يوم' => ['en' => 'day', 'fr' => 'jour', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'tr' => 'gün', 'ru' => 'день', 'az' => 'gün'],
        'صباح' => ['en' => 'morning', 'fr' => 'matin', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'tr' => 'sabah', 'ru' => 'утро', 'az' => 'səhər'],
        'مساء' => ['en' => 'evening', 'fr' => 'soir', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'tr' => 'akşam', 'ru' => 'вечер', 'az' => 'axşam'],
        'ليل' => ['en' => 'night', 'fr' => 'nuit', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'tr' => 'gece', 'ru' => 'ночь', 'az' => 'gecə'],
        'اليوم' => ['en' => 'today', 'fr' => "aujourd'hui", 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'tr' => 'bugün', 'ru' => 'сегодня', 'az' => 'bu gün'],
        'غدا' => ['en' => 'tomorrow', 'fr' => 'demain', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'tr' => 'yarın', 'ru' => 'завтра', 'az' => 'sabah'],
        'أمس' => ['en' => 'yesterday', 'fr' => 'hier', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'tr' => 'dün', 'ru' => 'вчера', 'az' => 'dünən'],
        'الآن' => ['en' => 'now', 'fr' => 'maintenant', 'es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'tr' => 'şimdi', 'ru' => 'сейчас', 'az' => 'indi'],
        'أسبوع' => ['en' => 'week', 'fr' => 'semaine', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'tr' => 'hafta', 'ru' => 'неделя', 'az' => 'həftə'],
        'الأسبوع القادم' => ['en' => 'next week', 'fr' => 'la semaine prochaine', 'es' => 'la próxima semana', 'de' => 'nächste Woche', 'ja' => '来週', 'ko' => '다음 주', 'tr' => 'gelecek hafta', 'ru' => 'на следующей неделе', 'az' => 'gələn həftə'],
        'وقت' => ['en' => 'time', 'fr' => 'temps', 'es' => 'tiempo', 'de' => 'Zeit', 'ja' => '時間', 'ko' => '시간', 'tr' => 'zaman', 'ru' => 'время', 'az' => 'vaxt'],
        'وقتي' => ['en' => 'my time', 'fr' => 'mon temps', 'es' => 'mi tiempo', 'de' => 'meine Zeit', 'ja' => '私の時間', 'ko' => '제 시간', 'tr' => 'zamanım', 'ru' => 'моё время', 'az' => 'vaxtım'],
        'بالفعل' => ['en' => 'already', 'fr' => 'déjà', 'es' => 'ya', 'de' => 'schon', 'ja' => 'もう', 'ko' => '이미', 'tr' => 'zaten', 'ru' => 'уже', 'az' => 'artıq'],
        'ثم' => ['en' => 'then', 'fr' => 'ensuite', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그다음', 'tr' => 'sonra', 'ru' => 'потом', 'az' => 'sonra'],
        'كل' => ['en' => 'every', 'fr' => 'chaque', 'es' => 'cada', 'de' => 'jeder', 'ja' => '毎', 'ko' => '매', 'tr' => 'her', 'ru' => 'каждый', 'az' => 'hər'],
        'معا' => ['en' => 'together', 'fr' => 'ensemble', 'es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '같이', 'tr' => 'birlikte', 'ru' => 'вместе', 'az' => 'birlikdə'],
        'أيضا' => ['en' => 'too', 'fr' => 'aussi', 'es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한', 'tr' => 'de', 'ru' => 'тоже', 'az' => 'də'],
        'عمر' => ['en' => 'age', 'fr' => 'âge', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'tr' => 'yaş', 'ru' => 'возраст', 'az' => 'yaş'],
        'عمري' => ['en' => 'my age', 'fr' => 'mon âge', 'es' => 'mi edad', 'de' => 'mein Alter', 'ja' => '私の年齢', 'ko' => '제 나이', 'tr' => 'yaşım', 'ru' => 'мой возраст', 'az' => 'yaşım'],
        'عمري سنة' => ['en' => 'I am years old', 'fr' => "j'ai ans", 'es' => 'tengo años', 'de' => 'ich bin Jahre alt', 'ja' => '私は歳です', 'ko' => '저는 살이에요', 'tr' => 'yaşındayım', 'ru' => 'мне лет', 'az' => 'yaşındayam'],
        // --- Unit 7: weather and seasons -------------------------------
        'شمس' => ['en' => 'sun', 'fr' => 'soleil', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '해', 'tr' => 'güneş', 'ru' => 'солнце', 'az' => 'günəş'],
        'مطر' => ['en' => 'rain', 'fr' => 'pluie', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'tr' => 'yağmur', 'ru' => 'дождь', 'az' => 'yağış'],
        'ثلج' => ['en' => 'snow', 'fr' => 'neige', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'tr' => 'kar', 'ru' => 'снег', 'az' => 'qar'],
        'ريح' => ['en' => 'wind', 'fr' => 'vent', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'tr' => 'rüzgar', 'ru' => 'ветер', 'az' => 'külək'],
        'ربيع' => ['en' => 'spring', 'fr' => 'printemps', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'tr' => 'ilkbahar', 'ru' => 'весна', 'az' => 'yaz'],
        'صيف' => ['en' => 'summer', 'fr' => 'été', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'tr' => 'yaz', 'ru' => 'лето', 'az' => 'yay'],
        'خريف' => ['en' => 'autumn', 'fr' => 'automne', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'tr' => 'sonbahar', 'ru' => 'осень', 'az' => 'payız'],
        'شتاء' => ['en' => 'winter', 'fr' => 'hiver', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'tr' => 'kış', 'ru' => 'зима', 'az' => 'qış'],
        // --- Unit 8: the city ------------------------------------------
        'مدينة' => ['en' => 'city', 'fr' => 'ville', 'es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'tr' => 'şehir', 'ru' => 'город', 'az' => 'şəhər'],
        'حديقة' => ['en' => 'park', 'fr' => 'parc', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'park', 'ru' => 'парк', 'az' => 'park'],
        'الحديقة' => ['en' => 'the park', 'fr' => 'le parc', 'es' => 'el parque', 'de' => 'dem Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'parkta', 'ru' => 'парке', 'az' => 'parkda'],
        'متجر' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'tr' => 'dükkan', 'ru' => 'магазин', 'az' => 'mağaza'],
        'سينما' => ['en' => 'cinema', 'fr' => 'cinéma', 'es' => 'cine', 'de' => 'Kino', 'ja' => '映画館', 'ko' => '영화관', 'tr' => 'sinema', 'ru' => 'кино', 'az' => 'kinoteatr'],
        'محطة' => ['en' => 'station', 'fr' => 'gare', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'tr' => 'istasyon', 'ru' => 'станция', 'az' => 'stansiya'],
        'شارع' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'tr' => 'sokak', 'ru' => 'улица', 'az' => 'küçə'],
        'زاوية' => ['en' => 'corner', 'fr' => 'coin', 'es' => 'esquina', 'de' => 'Ecke', 'ja' => '角', 'ko' => '모퉁이', 'tr' => 'köşe', 'ru' => 'угол', 'az' => 'künc'],
        'في الزاوية' => ['en' => 'at the corner', 'fr' => 'au coin', 'es' => 'en la esquina', 'de' => 'an der Ecke', 'ja' => '角で', 'ko' => '모퉁이에서', 'tr' => 'köşede', 'ru' => 'углу', 'az' => 'küncdə'],
        'سيارة' => ['en' => 'car', 'fr' => 'voiture', 'es' => 'coche', 'de' => 'Auto', 'ja' => '車', 'ko' => '자동차', 'tr' => 'araba', 'ru' => 'машина', 'az' => 'maşın'],
        'هاتف' => ['en' => 'telephone', 'fr' => 'téléphone', 'es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'tr' => 'telefon', 'ru' => 'телефон', 'az' => 'telefon'],
        'فيلم' => ['en' => 'film', 'fr' => 'film', 'es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'tr' => 'film', 'ru' => 'фильм', 'az' => 'film'],
        'قلم' => ['en' => 'pen', 'fr' => 'stylo', 'es' => 'bolígrafo', 'de' => 'Stift', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalem', 'ru' => 'ручка', 'az' => 'qələm'],
        // --- Unit 9: directions ----------------------------------------
        'يسارا' => ['en' => 'to the left', 'fr' => 'à gauche', 'es' => 'a la izquierda', 'de' => 'nach links', 'ja' => '左へ', 'ko' => '왼쪽으로', 'tr' => 'sola', 'ru' => 'налево', 'az' => 'sola'],
        'يمينا' => ['en' => 'to the right', 'fr' => 'à droite', 'es' => 'a la derecha', 'de' => 'nach rechts', 'ja' => '右へ', 'ko' => '오른쪽으로', 'tr' => 'sağa', 'ru' => 'направо', 'az' => 'sağa'],
        'على اليسار' => ['en' => 'on the left', 'fr' => 'sur la gauche', 'es' => 'a la izquierda', 'de' => 'links', 'ja' => '左に', 'ko' => '왼쪽에', 'tr' => 'solda', 'ru' => 'слева', 'az' => 'solda'],
        'على اليمين' => ['en' => 'on the right', 'fr' => 'sur la droite', 'es' => 'a la derecha', 'de' => 'rechts', 'ja' => '右に', 'ko' => '오른쪽에', 'tr' => 'sağda', 'ru' => 'справа', 'az' => 'sağda'],
        'يسار' => ['en' => 'left', 'fr' => 'gauche', 'es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'tr' => 'sol', 'ru' => 'левый', 'az' => 'sol'],
        'يمين' => ['en' => 'right', 'fr' => 'droite', 'es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'tr' => 'sağ', 'ru' => 'правый', 'az' => 'sağ'],
        'مباشرة' => ['en' => 'straight', 'fr' => 'tout droit', 'es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '직진', 'tr' => 'düz', 'ru' => 'прямо', 'az' => 'düz'],
        'منعطف' => ['en' => 'turn', 'fr' => 'tournant', 'es' => 'giro', 'de' => 'Abbiegung', 'ja' => '曲がり角', 'ko' => '회전', 'tr' => 'dönüş', 'ru' => 'поворот', 'az' => 'dönüş'],
        'أين' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'tr' => 'nerede', 'ru' => 'где', 'az' => 'harada'],
        'هنا' => ['en' => 'here', 'fr' => 'ici', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기', 'tr' => 'burada', 'ru' => 'здесь', 'az' => 'burada'],
        'هناك' => ['en' => 'there', 'fr' => 'là', 'es' => 'allí', 'de' => 'dort', 'ja' => 'そこ', 'ko' => '거기', 'tr' => 'orada', 'ru' => 'там', 'az' => 'orada'],
        'بعيد' => ['en' => 'far', 'fr' => 'loin', 'es' => 'lejos', 'de' => 'weit', 'ja' => '遠い', 'ko' => '멀어요', 'tr' => 'uzak', 'ru' => 'далеко', 'az' => 'uzaq'],
        'قريب' => ['en' => 'near', 'fr' => 'près', 'es' => 'cerca', 'de' => 'nah', 'ja' => '近い', 'ko' => '가까워요', 'tr' => 'yakın', 'ru' => 'близко', 'az' => 'yaxın'],
        // --- Unit 10: question words -----------------------------------
        'ماذا' => ['en' => 'what', 'fr' => 'quoi', 'es' => 'qué', 'de' => 'was', 'ja' => '何', 'ko' => '무엇', 'tr' => 'ne', 'ru' => 'что', 'az' => 'nə'],
        'مَن' => ['en' => 'who', 'fr' => 'qui', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'tr' => 'kim', 'ru' => 'кто', 'az' => 'kim'],
        'متى' => ['en' => 'when', 'fr' => 'quand', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'tr' => 'ne zaman', 'ru' => 'когда', 'az' => 'nə vaxt'],
        'لماذا' => ['en' => 'why', 'fr' => 'pourquoi', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'tr' => 'neden', 'ru' => 'почему', 'az' => 'niyə'],
        'كيف' => ['en' => 'how', 'fr' => 'comment', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게', 'tr' => 'nasıl', 'ru' => 'как', 'az' => 'necə'],
        // --- Conversation: verbs in the first person -------------------
        'أذهب' => ['en' => 'I am going', 'fr' => 'je vais', 'es' => 'voy', 'de' => 'ich gehe', 'ja' => '行きます', 'ko' => '가요', 'tr' => 'gidiyorum', 'ru' => 'иду', 'az' => 'gedirəm'],
        'أقرأ' => ['en' => 'I read', 'fr' => 'je lis', 'es' => 'leo', 'de' => 'ich lese', 'ja' => '読みます', 'ko' => '읽어요', 'tr' => 'okuyorum', 'ru' => 'читаю', 'az' => 'oxuyuram'],
        'أنام' => ['en' => 'I sleep', 'fr' => 'je dors', 'es' => 'duermo', 'de' => 'ich schlafe', 'ja' => '寝ます', 'ko' => '자요', 'tr' => 'uyuyorum', 'ru' => 'сплю', 'az' => 'yatıram'],
        'أتكلم' => ['en' => 'I speak', 'fr' => 'je parle', 'es' => 'hablo', 'de' => 'ich spreche', 'ja' => '話します', 'ko' => '말해요', 'tr' => 'konuşuyorum', 'ru' => 'говорю', 'az' => 'danışıram'],
        'أفكر' => ['en' => 'I think', 'fr' => 'je pense', 'es' => 'pienso', 'de' => 'ich denke', 'ja' => '思います', 'ko' => '생각해요', 'tr' => 'düşünüyorum', 'ru' => 'думаю', 'az' => 'düşünürəm'],
        'أتمشى' => ['en' => 'I walk', 'fr' => 'je me promène', 'es' => 'camino', 'de' => 'ich spaziere', 'ja' => '散歩します', 'ko' => '산책해요', 'tr' => 'yürüyorum', 'ru' => 'гуляю', 'az' => 'gəzirəm'],
        'أشعر' => ['en' => 'I feel', 'fr' => 'je sens', 'es' => 'siento', 'de' => 'ich fühle', 'ja' => '感じます', 'ko' => '느껴요', 'tr' => 'hissediyorum', 'ru' => 'чувствую', 'az' => 'hiss edirəm'],
        'أفضل' => ['en' => 'I prefer', 'fr' => 'je préfère', 'es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '好みます', 'ko' => '선호해요', 'tr' => 'tercih ediyorum', 'ru' => 'предпочитаю', 'az' => 'üstünlük verirəm'],
        'أشتري' => ['en' => 'I am buying', 'fr' => "j'achète", 'es' => 'compro', 'de' => 'ich kaufe', 'ja' => '買います', 'ko' => '삽니다', 'tr' => 'alıyorum', 'ru' => 'покупаю', 'az' => 'alıram'],
        'أدفع' => ['en' => 'I am paying', 'fr' => 'je paie', 'es' => 'pago', 'de' => 'ich zahle', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyorum', 'ru' => 'плачу', 'az' => 'ödəyirəm'],
        'ندفع' => ['en' => 'we are paying', 'fr' => 'nous payons', 'es' => 'pagamos', 'de' => 'wir zahlen', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyoruz', 'ru' => 'платим', 'az' => 'ödəyirik'],
        'أتصل' => ['en' => 'I am calling', 'fr' => "j'appelle", 'es' => 'llamo', 'de' => 'ich rufe an', 'ja' => '電話します', 'ko' => '전화해요', 'tr' => 'arıyorum', 'ru' => 'звоню', 'az' => 'zəng edirəm'],
        'آكل' => ['en' => 'I eat', 'fr' => 'je mange', 'es' => 'como', 'de' => 'ich esse', 'ja' => '食べます', 'ko' => '먹어요', 'tr' => 'yiyorum', 'ru' => 'ем', 'az' => 'yeyirəm'],
        'لا آكل' => ['en' => 'I do not eat', 'fr' => 'je ne mange pas', 'es' => 'no como', 'de' => 'ich esse nicht', 'ja' => '食べません', 'ko' => '먹지 않아요', 'tr' => 'yemiyorum', 'ru' => 'не ем', 'az' => 'yemirəm'],
        // --- Conversation: the past ------------------------------------
        'رأيت' => ['en' => 'I saw', 'fr' => "j'ai vu", 'es' => 'vi', 'de' => 'ich sah', 'ja' => '見ました', 'ko' => '봤어요', 'tr' => 'gördüm', 'ru' => 'видел', 'az' => 'gördüm'],
        'أكلت' => ['en' => 'I ate', 'fr' => "j'ai mangé", 'es' => 'comí', 'de' => 'ich aß', 'ja' => '食べました', 'ko' => '먹었어요', 'tr' => 'yedim', 'ru' => 'ел', 'az' => 'yedim'],
        'شربت' => ['en' => 'I drank', 'fr' => "j'ai bu", 'es' => 'bebí', 'de' => 'ich trank', 'ja' => '飲みました', 'ko' => '마셨어요', 'tr' => 'içtim', 'ru' => 'пил', 'az' => 'içdim'],
        'كنت هنا' => ['en' => 'I was here', 'fr' => "j'étais ici", 'es' => 'estuve aquí', 'de' => 'ich war hier', 'ja' => 'ここにいました', 'ko' => '여기 있었어요', 'tr' => 'buradaydım', 'ru' => 'был здесь', 'az' => 'burada idim'],
        'كنت في المدرسة' => ['en' => 'I was in the school', 'fr' => "j'étais à l'école", 'es' => 'estuve en la escuela', 'de' => 'ich war in der Schule', 'ja' => '学校にいました', 'ko' => '학교에 있었어요', 'tr' => 'okuldaydım', 'ru' => 'был в школе', 'az' => 'məktəbdə idim'],
        'كان جيدا' => ['en' => 'it was good', 'fr' => "c'était bien", 'es' => 'estuvo bien', 'de' => 'es war gut', 'ja' => 'よかったです', 'ko' => '좋았어요', 'tr' => 'iyiydi', 'ru' => 'было хорошо', 'az' => 'yaxşı idi'],
        'رأى' => ['en' => 'saw', 'fr' => 'a vu', 'es' => 'vio', 'de' => 'sah', 'ja' => '見た', 'ko' => '봤다', 'tr' => 'gördü', 'ru' => 'видела', 'az' => 'gördü'],
        // --- Conversation: the future ----------------------------------
        'سأتصل' => ['en' => 'I will call', 'fr' => "j'appellerai", 'es' => 'llamaré', 'de' => 'ich werde anrufen', 'ja' => '電話します', 'ko' => '전화할게요', 'tr' => 'arayacağım', 'ru' => 'позвоню', 'az' => 'zəng edəcəyəm'],
        'سآتي' => ['en' => 'I will come', 'fr' => 'je viendrai', 'es' => 'vendré', 'de' => 'ich werde kommen', 'ja' => '来ます', 'ko' => '올게요', 'tr' => 'geleceğim', 'ru' => 'приду', 'az' => 'gələcəyəm'],
        'سأفعل' => ['en' => 'I will do', 'fr' => 'je ferai', 'es' => 'haré', 'de' => 'ich werde machen', 'ja' => 'します', 'ko' => '할게요', 'tr' => 'yapacağım', 'ru' => 'сделаю', 'az' => 'edəcəyəm'],
        'سأذهب' => ['en' => 'I will go', 'fr' => "j'irai", 'es' => 'iré', 'de' => 'ich werde gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğim', 'ru' => 'пойду', 'az' => 'gedəcəyəm'],
        'سأرى' => ['en' => 'I will see', 'fr' => 'je verrai', 'es' => 'veré', 'de' => 'ich werde sehen', 'ja' => '見ます', 'ko' => '볼게요', 'tr' => 'göreceğim', 'ru' => 'увижу', 'az' => 'görəcəyəm'],
        // --- Conversation: infinitives ---------------------------------
        'الذهاب' => ['en' => 'to go', 'fr' => 'aller', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'tr' => 'gitmek', 'ru' => 'идти', 'az' => 'getmək'],
        'القراءة' => ['en' => 'to read', 'fr' => 'lire', 'es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'tr' => 'okumak', 'ru' => 'читать', 'az' => 'oxumaq'],
        'النوم' => ['en' => 'to sleep', 'fr' => 'dormir', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다', 'tr' => 'uyumak', 'ru' => 'спать', 'az' => 'yatmaq'],
        'التكلم' => ['en' => 'to speak', 'fr' => 'parler', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'tr' => 'konuşmak', 'ru' => 'говорить', 'az' => 'danışmaq'],
        'الشرب' => ['en' => 'to drink', 'fr' => 'boire', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'tr' => 'içmek', 'ru' => 'пить', 'az' => 'içmək'],
        'التمشي' => ['en' => 'to walk', 'fr' => 'se promener', 'es' => 'caminar', 'de' => 'spazieren', 'ja' => '散歩する', 'ko' => '걷다', 'tr' => 'yürümek', 'ru' => 'гулять', 'az' => 'gəzmək'],
        // --- Conversation: how you feel --------------------------------
        'أنا سعيد' => ['en' => 'I am glad', 'fr' => 'je suis content', 'es' => 'estoy contento', 'de' => 'ich freue mich', 'ja' => 'うれしいです', 'ko' => '기뻐요', 'tr' => 'memnunum', 'ru' => 'рад', 'az' => 'şadam'],
        'أنا فرح' => ['en' => 'I am happy', 'fr' => 'je suis heureux', 'es' => 'estoy feliz', 'de' => 'ich bin glücklich', 'ja' => '幸せです', 'ko' => '행복해요', 'tr' => 'mutluyum', 'ru' => 'счастлив', 'az' => 'xoşbəxtəm'],
        'أنا حزين' => ['en' => 'I am sad', 'fr' => 'je suis triste', 'es' => 'estoy triste', 'de' => 'ich bin traurig', 'ja' => '悲しいです', 'ko' => '슬퍼요', 'tr' => 'üzgünüm', 'ru' => 'грустно', 'az' => 'kədərliyəm'],
        'أنا مريض' => ['en' => 'I am sick', 'fr' => 'je suis malade', 'es' => 'estoy enfermo', 'de' => 'ich bin krank', 'ja' => '病気です', 'ko' => '아파요', 'tr' => 'hastayım', 'ru' => 'болен', 'az' => 'xəstəyəm'],
        'أنا متعب' => ['en' => 'I am tired', 'fr' => 'je suis fatigué', 'es' => 'estoy cansado', 'de' => 'ich bin müde', 'ja' => '疲れました', 'ko' => '피곤해요', 'tr' => 'yorgunum', 'ru' => 'устал', 'az' => 'yorğunam'],
        'بخير' => ['en' => 'well', 'fr' => 'bien', 'es' => 'bien', 'de' => 'gut', 'ja' => '元気', 'ko' => '잘', 'tr' => 'iyi', 'ru' => 'хорошо', 'az' => 'yaxşıyam'],
        'سعيد' => ['en' => 'glad', 'fr' => 'content', 'es' => 'contento', 'de' => 'froh', 'ja' => 'うれしい', 'ko' => '기쁜', 'tr' => 'memnun', 'ru' => 'рада', 'az' => 'şad'],
        'حزين' => ['en' => 'sad', 'fr' => 'triste', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'tr' => 'üzgün', 'ru' => 'грустный', 'az' => 'kədərli'],
        'مريض' => ['en' => 'sick', 'fr' => 'malade', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気の', 'ko' => '아픈', 'tr' => 'hasta', 'ru' => 'больной', 'az' => 'xəstə'],
        'متعب' => ['en' => 'tired', 'fr' => 'fatigué', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'tr' => 'yorgun', 'ru' => 'усталый', 'az' => 'yorğun'],
        'فرح' => ['en' => 'happy', 'fr' => 'heureux', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せな', 'ko' => '행복한', 'tr' => 'mutlu', 'ru' => 'счастливый', 'az' => 'xoşbəxt'],
        // --- Conversation: opinions ------------------------------------
        'أوافق' => ['en' => 'I agree', 'fr' => "je suis d'accord", 'es' => 'estoy de acuerdo', 'de' => 'ich stimme zu', 'ja' => '賛成です', 'ko' => '동의해요', 'tr' => 'katılıyorum', 'ru' => 'согласен', 'az' => 'razıyam'],
        'لا أوافق' => ['en' => 'I do not agree', 'fr' => "je ne suis pas d'accord", 'es' => 'no estoy de acuerdo', 'de' => 'ich stimme nicht zu', 'ja' => '反対です', 'ko' => '동의하지 않아요', 'tr' => 'katılmıyorum', 'ru' => 'не согласен', 'az' => 'razı deyiləm'],
        'برأيي' => ['en' => 'in my opinion', 'fr' => 'à mon avis', 'es' => 'en mi opinión', 'de' => 'meiner Meinung nach', 'ja' => '私の意見では', 'ko' => '제 생각에는', 'tr' => 'bence', 'ru' => 'по-моему', 'az' => 'məncə'],
        'ربما' => ['en' => 'maybe', 'fr' => 'peut-être', 'es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도', 'tr' => 'belki', 'ru' => 'может быть', 'az' => 'bəlkə'],
        'لأن' => ['en' => 'because', 'fr' => 'parce que', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'tr' => 'çünkü', 'ru' => 'потому что', 'az' => 'çünki'],
        'رسالة' => ['en' => 'message', 'fr' => 'message', 'es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'tr' => 'mesaj', 'ru' => 'сообщение', 'az' => 'mesaj'],
        'خطة' => ['en' => 'plan', 'fr' => 'plan', 'es' => 'plan', 'de' => 'Plan', 'ja' => '計画', 'ko' => '계획', 'tr' => 'plan', 'ru' => 'план', 'az' => 'plan'],
        'شيء' => ['en' => 'thing', 'fr' => 'chose', 'es' => 'cosa', 'de' => 'Ding', 'ja' => 'もの', 'ko' => '것', 'tr' => 'şey', 'ru' => 'вещь', 'az' => 'şey'],
        // --- Conversation: existence and negation ----------------------
        'يوجد' => ['en' => 'there is', 'fr' => 'il y a', 'es' => 'hay', 'de' => 'es gibt', 'ja' => 'あります', 'ko' => '있어요', 'tr' => 'var', 'ru' => 'есть', 'az' => 'var'],
        'لا يوجد' => ['en' => 'there is not', 'fr' => "il n'y a pas", 'es' => 'no hay', 'de' => 'es gibt nicht', 'ja' => 'ありません', 'ko' => '없어요', 'tr' => 'yok', 'ru' => 'нету', 'az' => 'yoxdur'],
        'ليس' => ['en' => 'is not', 'fr' => "n'est pas", 'es' => 'no es', 'de' => 'ist nicht', 'ja' => 'ではない', 'ko' => '아니에요', 'tr' => 'değil', 'ru' => 'не', 'az' => 'deyil'],
        'هل' => ['en' => 'is there', 'fr' => 'est-ce que', 'es' => 'acaso', 'de' => 'ob', 'ja' => 'か', 'ko' => '요', 'tr' => 'mı', 'ru' => 'ли', 'az' => 'mı'],
        // --- Restaurant: the menu --------------------------------------
        'قائمة الطعام' => ['en' => 'menu', 'fr' => 'menu', 'es' => 'menú', 'de' => 'Speisekarte', 'ja' => 'メニュー', 'ko' => '메뉴', 'tr' => 'menü', 'ru' => 'меню', 'az' => 'menyu'],
        'طلب' => ['en' => 'order', 'fr' => 'commande', 'es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'tr' => 'sipariş', 'ru' => 'заказ', 'az' => 'sifariş'],
        'حصة' => ['en' => 'portion', 'fr' => 'portion', 'es' => 'porción', 'de' => 'Portion', 'ja' => '一人前', 'ko' => '인분', 'tr' => 'porsiyon', 'ru' => 'порция', 'az' => 'porsiya'],
        'حجز' => ['en' => 'reservation', 'fr' => 'réservation', 'es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'tr' => 'rezervasyon', 'ru' => 'бронь', 'az' => 'rezervasiya'],
        'شكوى' => ['en' => 'complaint', 'fr' => 'réclamation', 'es' => 'queja', 'de' => 'Beschwerde', 'ja' => '苦情', 'ko' => '불만', 'tr' => 'şikayet', 'ru' => 'жалоба', 'az' => 'şikayət'],
        'حساسية' => ['en' => 'allergy', 'fr' => 'allergie', 'es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'tr' => 'alerji', 'ru' => 'аллергия', 'az' => 'allergiya'],
        'حساسيتي' => ['en' => 'my allergy', 'fr' => 'mon allergie', 'es' => 'mi alergia', 'de' => 'meine Allergie', 'ja' => '私のアレルギー', 'ko' => '제 알레르기', 'tr' => 'alerjim', 'ru' => 'моя аллергия', 'az' => 'allergiyam'],
        'نباتي' => ['en' => 'vegetarian', 'fr' => 'végétarien', 'es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'tr' => 'vejetaryen', 'ru' => 'вегетарианец', 'az' => 'vegetarian'],
        'أنا نباتي' => ['en' => 'I am vegetarian', 'fr' => 'je suis végétarien', 'es' => 'soy vegetariano', 'de' => 'ich bin vegetarisch', 'ja' => '私はベジタリアンです', 'ko' => '저는 채식주의자예요', 'tr' => 'vejetaryenim', 'ru' => 'я вегетарианец', 'az' => 'vegetarianam'],
        'لا أستطيع الأكل' => ['en' => 'I cannot eat', 'fr' => 'je ne peux pas manger', 'es' => 'no puedo comer', 'de' => 'ich kann nicht essen', 'ja' => '食べられません', 'ko' => '먹을 수 없어요', 'tr' => 'yiyemem', 'ru' => 'не могу есть', 'az' => 'yeyə bilmirəm'],
        // --- Restaurant: dishes ----------------------------------------
        'حساء' => ['en' => 'soup', 'fr' => 'soupe', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'tr' => 'çorba', 'ru' => 'суп', 'az' => 'şorba'],
        'سمك' => ['en' => 'fish', 'fr' => 'poisson', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'tr' => 'balık', 'ru' => 'рыба', 'az' => 'balıq'],
        'لحم' => ['en' => 'meat', 'fr' => 'viande', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'tr' => 'et', 'ru' => 'мясо', 'az' => 'ət'],
        'أرز' => ['en' => 'rice', 'fr' => 'riz', 'es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥', 'tr' => 'pirinç', 'ru' => 'рис', 'az' => 'düyü'],
        'سلطة' => ['en' => 'salad', 'fr' => 'salade', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'tr' => 'salata', 'ru' => 'салат', 'az' => 'salat'],
        'بطاطا' => ['en' => 'potato', 'fr' => 'pomme de terre', 'es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'tr' => 'patates', 'ru' => 'картофель', 'az' => 'kartof'],
        'دجاج' => ['en' => 'chicken', 'fr' => 'poulet', 'es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'tr' => 'tavuk', 'ru' => 'курица', 'az' => 'toyuq'],
        'طعام' => ['en' => 'food', 'fr' => 'nourriture', 'es' => 'comida', 'de' => 'Essen', 'ja' => '食べ物', 'ko' => '음식', 'tr' => 'yemek', 'ru' => 'еда', 'az' => 'yemək'],
        // --- Restaurant: drinks and sweets -----------------------------
        'مشروب' => ['en' => 'drink', 'fr' => 'boisson', 'es' => 'bebida', 'de' => 'Getränk', 'ja' => '飲み物', 'ko' => '음료', 'tr' => 'içecek', 'ru' => 'напиток', 'az' => 'içki'],
        'نبيذ' => ['en' => 'wine', 'fr' => 'vin', 'es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'tr' => 'şarap', 'ru' => 'вино', 'az' => 'şərab'],
        'بيرة' => ['en' => 'beer', 'fr' => 'bière', 'es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'tr' => 'bira', 'ru' => 'пиво', 'az' => 'pivə'],
        'الثلج' => ['en' => 'ice', 'fr' => 'glace', 'es' => 'hielo', 'de' => 'Eis', 'ja' => '氷', 'ko' => '얼음', 'tr' => 'buz', 'ru' => 'лёд', 'az' => 'buz'],
        'حلوى' => ['en' => 'dessert', 'fr' => 'dessert', 'es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'tr' => 'tatlı', 'ru' => 'десерт', 'az' => 'şirniyyat'],
        'آيس كريم' => ['en' => 'ice cream', 'fr' => 'glace', 'es' => 'helado', 'de' => 'Eiscreme', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'tr' => 'dondurma', 'ru' => 'мороженое', 'az' => 'dondurma'],
        'شوكولاتة' => ['en' => 'chocolate', 'fr' => 'chocolat', 'es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'tr' => 'çikolata', 'ru' => 'шоколад', 'az' => 'şokolad'],
        // --- Restaurant: the table -------------------------------------
        'شوكة' => ['en' => 'fork', 'fr' => 'fourchette', 'es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'tr' => 'çatal', 'ru' => 'вилка', 'az' => 'çəngəl'],
        'سكين' => ['en' => 'knife', 'fr' => 'couteau', 'es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'tr' => 'bıçak', 'ru' => 'нож', 'az' => 'bıçaq'],
        'ملعقة' => ['en' => 'spoon', 'fr' => 'cuillère', 'es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'tr' => 'kaşık', 'ru' => 'ложка', 'az' => 'qaşıq'],
        'صحن' => ['en' => 'plate', 'fr' => 'assiette', 'es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'tr' => 'tabak', 'ru' => 'тарелка', 'az' => 'boşqab'],
        'منديل' => ['en' => 'napkin', 'fr' => 'serviette', 'es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'tr' => 'peçete', 'ru' => 'салфетка', 'az' => 'salfet'],
        'كوب' => ['en' => 'glass', 'fr' => 'verre', 'es' => 'vaso', 'de' => 'Glas', 'ja' => 'コップ', 'ko' => '컵', 'tr' => 'bardak', 'ru' => 'стакан', 'az' => 'stəkan'],
        'للخارج' => ['en' => 'takeaway', 'fr' => 'à emporter', 'es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'tr' => 'paket', 'ru' => 'с собой', 'az' => 'özümlə'],
        // --- Restaurant: paying ----------------------------------------
        'سعر' => ['en' => 'price', 'fr' => 'prix', 'es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'tr' => 'fiyat', 'ru' => 'цена', 'az' => 'qiymət'],
        'نقود' => ['en' => 'money', 'fr' => 'argent', 'es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'tr' => 'para', 'ru' => 'деньги', 'az' => 'pul'],
        'نقودي' => ['en' => 'my money', 'fr' => 'mon argent', 'es' => 'mi dinero', 'de' => 'mein Geld', 'ja' => '私のお金', 'ko' => '제 돈', 'tr' => 'param', 'ru' => 'мои деньги', 'az' => 'pulum'],
        'بطاقة' => ['en' => 'card', 'fr' => 'carte', 'es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'tr' => 'kart', 'ru' => 'карта', 'az' => 'kart'],
        'كاش' => ['en' => 'cash', 'fr' => 'espèces', 'es' => 'efectivo', 'de' => 'Bargeld', 'ja' => '現金', 'ko' => '현금', 'tr' => 'nakit', 'ru' => 'наличные', 'az' => 'nağd'],
        'ريال' => ['en' => 'lira', 'fr' => 'rouble', 'es' => 'rublo', 'de' => 'Rubel', 'ja' => 'ルーブル', 'ko' => '루블', 'tr' => 'lira', 'ru' => 'рубль', 'az' => 'manat'],
        'المجموع' => ['en' => 'total', 'fr' => 'total', 'es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '합계', 'tr' => 'toplam', 'ru' => 'итого', 'az' => 'cəmi'],
        // --- Supermarket: the shop -------------------------------------
        'سوبرماركت' => ['en' => 'supermarket', 'fr' => 'supermarché', 'es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'tr' => 'market', 'ru' => 'супермаркет', 'az' => 'supermarket'],
        'في السوبرماركت' => ['en' => 'in the supermarket', 'fr' => 'au supermarché', 'es' => 'en el supermercado', 'de' => 'im Supermarkt', 'ja' => 'スーパーで', 'ko' => '슈퍼마켓에서', 'tr' => 'markette', 'ru' => 'супермаркете', 'az' => 'supermarketdə'],
        'قسم' => ['en' => 'aisle', 'fr' => 'rayon', 'es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '코너', 'tr' => 'reyon', 'ru' => 'отдел', 'az' => 'şöbə'],
        'في القسم' => ['en' => 'in the aisle', 'fr' => 'au rayon', 'es' => 'en el pasillo', 'de' => 'im Regal', 'ja' => '売り場で', 'ko' => '코너에서', 'tr' => 'reyonda', 'ru' => 'отделе', 'az' => 'şöbədə'],
        'سلة' => ['en' => 'basket', 'fr' => 'panier', 'es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'tr' => 'sepet', 'ru' => 'корзина', 'az' => 'səbət'],
        'صندوق الدفع' => ['en' => 'checkout', 'fr' => 'caisse', 'es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'tr' => 'kasa', 'ru' => 'касса', 'az' => 'kassa'],
        'قائمة' => ['en' => 'list', 'fr' => 'liste', 'es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'tr' => 'liste', 'ru' => 'список', 'az' => 'siyahı'],
        'في القائمة' => ['en' => 'on the list', 'fr' => 'sur la liste', 'es' => 'en la lista', 'de' => 'auf der Liste', 'ja' => 'リストに', 'ko' => '목록에', 'tr' => 'listede', 'ru' => 'списке', 'az' => 'siyahıda'],
        'خصم' => ['en' => 'discount', 'fr' => 'réduction', 'es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'tr' => 'indirim', 'ru' => 'скидка', 'az' => 'endirim'],
        'بخصم' => ['en' => 'on discount', 'fr' => 'en réduction', 'es' => 'en descuento', 'de' => 'im Rabatt', 'ja' => '割引で', 'ko' => '할인이에요', 'tr' => 'indirimde', 'ru' => 'со скидкой', 'az' => 'endirimdə'],
        'كيس' => ['en' => 'bag', 'fr' => 'sac', 'es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'tr' => 'poşet', 'ru' => 'пакет', 'az' => 'torba'],
        // --- Supermarket: fruit and vegetables -------------------------
        'فاكهة' => ['en' => 'fruit', 'fr' => 'fruit', 'es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'tr' => 'meyve', 'ru' => 'фрукт', 'az' => 'meyvə'],
        'خضار' => ['en' => 'vegetable', 'fr' => 'légume', 'es' => 'verdura', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebze', 'ru' => 'овощ', 'az' => 'tərəvəz'],
        'تفاحة' => ['en' => 'apple', 'fr' => 'pomme', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elma', 'ru' => 'яблоко', 'az' => 'alma'],
        'تفاح' => ['en' => 'apples', 'fr' => 'pommes', 'es' => 'manzanas', 'de' => 'Äpfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elmalar', 'ru' => 'яблоки', 'az' => 'almalar'],
        'موزة' => ['en' => 'banana', 'fr' => 'banane', 'es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muz', 'ru' => 'банан', 'az' => 'banan'],
        'برتقالة' => ['en' => 'orange', 'fr' => 'orange', 'es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakal', 'ru' => 'апельсин', 'az' => 'portağal'],
        'عنب' => ['en' => 'grape', 'fr' => 'raisin', 'es' => 'uva', 'de' => 'Traube', 'ja' => 'ぶどう', 'ko' => '포도', 'tr' => 'üzüm', 'ru' => 'виноград', 'az' => 'üzüm'],
        'طماطم' => ['en' => 'tomato', 'fr' => 'tomate', 'es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'tr' => 'domates', 'ru' => 'помидор', 'az' => 'pomidor'],
        'خيار' => ['en' => 'cucumber', 'fr' => 'concombre', 'es' => 'pepino', 'de' => 'Gurke', 'ja' => 'きゅうり', 'ko' => '오이', 'tr' => 'salatalık', 'ru' => 'огурец', 'az' => 'xiyar'],
        'بصل' => ['en' => 'onion', 'fr' => 'oignon', 'es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => 'たまねぎ', 'ko' => '양파', 'tr' => 'soğan', 'ru' => 'лук', 'az' => 'soğan'],
        'جزر' => ['en' => 'carrot', 'fr' => 'carotte', 'es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'tr' => 'havuç', 'ru' => 'морковь', 'az' => 'yerkökü'],
        // --- Supermarket: dairy and staples ----------------------------
        'لبن' => ['en' => 'yoghurt', 'fr' => 'yaourt', 'es' => 'yogur', 'de' => 'Joghurt', 'ja' => 'ヨーグルト', 'ko' => '요구르트', 'tr' => 'yoğurt', 'ru' => 'йогурт', 'az' => 'qatıq'],
        'زبدة' => ['en' => 'butter', 'fr' => 'beurre', 'es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'tr' => 'tereyağı', 'ru' => 'масло', 'az' => 'kərə yağı'],
        'بيضة' => ['en' => 'egg', 'fr' => 'oeuf', 'es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurta', 'ru' => 'яйцо', 'az' => 'yumurta'],
        'كيلو' => ['en' => 'kilo', 'fr' => 'kilo', 'es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'tr' => 'kilo', 'ru' => 'кило', 'az' => 'kilo'],
        'زجاجة' => ['en' => 'bottle', 'fr' => 'bouteille', 'es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişe', 'ru' => 'бутылка', 'az' => 'şüşə'],
        'علبة' => ['en' => 'box', 'fr' => 'boîte', 'es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutu', 'ru' => 'коробка', 'az' => 'qutu'],
        // --- Prepositions and the forms they govern --------------------
        'في' => ['en' => 'in', 'fr' => 'dans', 'es' => 'en', 'de' => 'in', 'ja' => 'に', 'ko' => '에', 'tr' => 'içinde', 'ru' => 'в', 'az' => 'içində'],
        'على' => ['en' => 'at', 'fr' => 'à', 'es' => 'en', 'de' => 'an', 'ja' => 'に', 'ko' => '에', 'tr' => 'de', 'ru' => 'на', 'az' => 'yanında'],
        'مع' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와', 'tr' => 'ile', 'ru' => 'с', 'az' => 'ilə'],
        'بدون' => ['en' => 'without', 'fr' => 'sans', 'es' => 'sin', 'de' => 'ohne', 'ja' => 'なしで', 'ko' => '없이', 'tr' => 'olmadan', 'ru' => 'без', 'az' => 'olmadan'],
        'لأجل' => ['en' => 'for', 'fr' => 'pour', 'es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'tr' => 'için', 'ru' => 'для', 'az' => 'üçün'],
        'من' => ['en' => 'than', 'fr' => 'que', 'es' => 'que', 'de' => 'als', 'ja' => 'より', 'ko' => '보다', 'tr' => 'den', 'ru' => 'чем', 'az' => 'dan'],
        'مع الحليب' => ['en' => 'with milk', 'fr' => 'avec du lait', 'es' => 'con leche', 'de' => 'mit Milch', 'ja' => '牛乳入りの', 'ko' => '우유 있는', 'tr' => 'sütlü', 'ru' => 'молоком', 'az' => 'südlü'],
        'مع السكر' => ['en' => 'with sugar', 'fr' => 'avec du sucre', 'es' => 'con azúcar', 'de' => 'mit Zucker', 'ja' => '砂糖入りの', 'ko' => '설탕 있는', 'tr' => 'şekerli', 'ru' => 'сахаром', 'az' => 'şəkərli'],
        'مع الثلج' => ['en' => 'with ice', 'fr' => 'avec des glaçons', 'es' => 'con hielo', 'de' => 'mit Eis', 'ja' => '氷入りの', 'ko' => '얼음 있는', 'tr' => 'buzlu', 'ru' => 'льдом', 'az' => 'buzlu'],
        'مع الشوكولاتة' => ['en' => 'with chocolate', 'fr' => 'avec du chocolat', 'es' => 'con chocolate', 'de' => 'mit Schokolade', 'ja' => 'チョコ入りの', 'ko' => '초콜릿 있는', 'tr' => 'çikolatalı', 'ru' => 'шоколадом', 'az' => 'şokoladlı'],
        'مع الزبدة' => ['en' => 'with butter', 'fr' => 'avec du beurre', 'es' => 'con mantequilla', 'de' => 'mit Butter', 'ja' => 'バター入りの', 'ko' => '버터 있는', 'tr' => 'tereyağlı', 'ru' => 'маслом', 'az' => 'yağlı'],
        'بدون حليب' => ['en' => 'without milk', 'fr' => 'sans lait', 'es' => 'sin leche', 'de' => 'ohne Milch', 'ja' => '牛乳なしの', 'ko' => '우유 없는', 'tr' => 'sütsüz', 'ru' => 'молока', 'az' => 'südsüz'],
        'بدون سكر' => ['en' => 'without sugar', 'fr' => 'sans sucre', 'es' => 'sin azúcar', 'de' => 'ohne Zucker', 'ja' => '砂糖なしの', 'ko' => '설탕 없는', 'tr' => 'şekersiz', 'ru' => 'сахара', 'az' => 'şəkərsiz'],
        'بدون ثلج' => ['en' => 'without ice', 'fr' => 'sans glaçons', 'es' => 'sin hielo', 'de' => 'ohne Eis', 'ja' => '氷なしの', 'ko' => '얼음 없는', 'tr' => 'buzsuz', 'ru' => 'льда', 'az' => 'buzsuz'],
        'في هذا' => ['en' => 'in this', 'fr' => 'dedans', 'es' => 'en esto', 'de' => 'darin', 'ja' => 'これに', 'ko' => '이것에', 'tr' => 'bunda', 'ru' => 'этом', 'az' => 'bunda'],
        // --- Accusative forms the phrases need as whole tiles ----------
        'الماء' => ['en' => 'the water', 'fr' => "l'eau", 'es' => 'el agua', 'de' => 'das Wasser', 'ja' => '水を', 'ko' => '물을', 'tr' => 'suyu', 'ru' => 'воду', 'az' => 'suyu'],
        'السمك' => ['en' => 'the fish', 'fr' => 'le poisson', 'es' => 'el pescado', 'de' => 'den Fisch', 'ja' => '魚を', 'ko' => '생선을', 'tr' => 'balığı', 'ru' => 'рыбу', 'az' => 'balığı'],
        'الجريدة' => ['en' => 'the newspaper', 'fr' => 'le journal', 'es' => 'el periódico', 'de' => 'die Zeitung', 'ja' => '新聞を', 'ko' => '신문을', 'tr' => 'gazeteyi', 'ru' => 'газету', 'az' => 'qəzeti'],
        // --- Plurals the phrases ask for as whole tiles ----------------
        'قطط' => ['en' => 'cats', 'fr' => 'chats', 'es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kediler', 'ru' => 'коты', 'az' => 'pişiklər'],
        'كلاب' => ['en' => 'dogs', 'fr' => 'chiens', 'es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpekler', 'ru' => 'собаки', 'az' => 'itlər'],
        'ناس' => ['en' => 'people', 'fr' => 'gens', 'es' => 'gente', 'de' => 'Leute', 'ja' => '人々', 'ko' => '사람들', 'tr' => 'insanlar', 'ru' => 'люди', 'az' => 'insanlar'],
        'أقلام' => ['en' => 'pens', 'fr' => 'stylos', 'es' => 'bolígrafos', 'de' => 'Stifte', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalemler', 'ru' => 'ручки', 'az' => 'qələmlər'],
        'خضروات' => ['en' => 'vegetables', 'fr' => 'légumes', 'es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebzeler', 'ru' => 'овощи', 'az' => 'tərəvəzlər'],
        'بيض' => ['en' => 'eggs', 'fr' => 'oeufs', 'es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurtalar', 'ru' => 'яйца', 'az' => 'yumurtalar'],
        'موز' => ['en' => 'bananas', 'fr' => 'bananes', 'es' => 'plátanos', 'de' => 'Bananen', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muzlar', 'ru' => 'бананы', 'az' => 'bananlar'],
        'برتقال' => ['en' => 'oranges', 'fr' => 'oranges', 'es' => 'naranjas', 'de' => 'Orangen', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakallar', 'ru' => 'апельсины', 'az' => 'portağallar'],
        'زجاجات' => ['en' => 'bottles', 'fr' => 'bouteilles', 'es' => 'botellas', 'de' => 'Flaschen', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişeler', 'ru' => 'бутылки', 'az' => 'şüşələr'],
        'علب' => ['en' => 'boxes', 'fr' => 'boîtes', 'es' => 'cajas', 'de' => 'Schachteln', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutular', 'ru' => 'коробки', 'az' => 'qutular'],
        'ساعة' => ['en' => 'clock', 'fr' => 'horloge', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'tr' => 'saat', 'ru' => 'часы', 'az' => 'saat'],
        'سنوات' => ['en' => 'years', 'fr' => 'ans', 'es' => 'años', 'de' => 'Jahre', 'ja' => '歳', 'ko' => '살', 'tr' => 'yaşında', 'ru' => 'лет', 'az' => 'yaşında'],
        // --- Comparatives and superlatives -----------------------------
        'أحسن' => ['en' => 'better', 'fr' => 'mieux', 'es' => 'mejor', 'de' => 'besser', 'ja' => 'もっといい', 'ko' => '더 좋은', 'tr' => 'daha iyi', 'ru' => 'лучше', 'az' => 'daha yaxşı'],
        'أصغر' => ['en' => 'smaller', 'fr' => 'plus petit', 'es' => 'más pequeño', 'de' => 'kleiner', 'ja' => 'もっと小さい', 'ko' => '더 작은', 'tr' => 'daha küçük', 'ru' => 'меньше', 'az' => 'daha kiçik'],
        'أكبر سنا' => ['en' => 'older', 'fr' => 'plus vieux', 'es' => 'mayor', 'de' => 'älter', 'ja' => 'もっと年上', 'ko' => '더 나이 든', 'tr' => 'daha yaşlı', 'ru' => 'старше', 'az' => 'daha yaşlı'],
        'أغلى' => ['en' => 'more expensive', 'fr' => 'plus cher', 'es' => 'más caro', 'de' => 'teurer', 'ja' => 'もっと高い', 'ko' => '더 비싼', 'tr' => 'daha pahalı', 'ru' => 'дороже', 'az' => 'daha bahalı'],
        'أرخص' => ['en' => 'cheaper', 'fr' => 'moins cher', 'es' => 'más barato', 'de' => 'billiger', 'ja' => 'もっと安い', 'ko' => '더 싼', 'tr' => 'daha ucuz', 'ru' => 'дешевле', 'az' => 'daha ucuz'],
        'الأفضل' => ['en' => 'best', 'fr' => 'meilleur', 'es' => 'mejor', 'de' => 'beste', 'ja' => '最高の', 'ko' => '최고의', 'tr' => 'en iyi', 'ru' => 'лучший', 'az' => 'ən yaxşı'],
        // --- Words the phrases need that the core list missed ----------
        'جدا' => ['en' => 'very', 'fr' => 'très', 'es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '아주', 'tr' => 'çok', 'ru' => 'очень', 'az' => 'çox'],
        'كل شيء' => ['en' => 'everything', 'fr' => 'tout', 'es' => 'todo', 'de' => 'alles', 'ja' => '全部', 'ko' => '모두', 'tr' => 'her şey', 'ru' => 'всё', 'az' => 'hər şey'],
        'هو' => ['en' => 'he', 'fr' => 'il', 'es' => 'él', 'de' => 'er', 'ja' => '彼', 'ko' => '그', 'tr' => 'o', 'ru' => 'он', 'az' => 'o kişi'],
        'نحن' => ['en' => 'we', 'fr' => 'nous', 'es' => 'nosotros', 'de' => 'wir', 'ja' => '私たち', 'ko' => '우리', 'tr' => 'biz', 'ru' => 'мы', 'az' => 'biz'],
        'واحد' => ['en' => 'one', 'fr' => 'un', 'es' => 'uno', 'de' => 'eins', 'ja' => '一', 'ko' => '하나', 'tr' => 'bir', 'ru' => 'один', 'az' => 'bir'],
        'اسم' => ['en' => 'name', 'fr' => 'nom', 'es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름', 'tr' => 'isim', 'ru' => 'имя', 'az' => 'ad'],
        'في البيت' => ['en' => 'home', 'fr' => 'à la maison', 'es' => 'en casa', 'de' => 'zu Hause', 'ja' => '家で', 'ko' => '집에', 'tr' => 'evde', 'ru' => 'дома', 'az' => 'evdəyəm'],
        'حلو' => ['en' => 'sweet', 'fr' => 'sucré', 'es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '달콤한', 'tr' => 'tatlı', 'ru' => 'сладкий', 'az' => 'şirin'],
        'لاحقا' => ['en' => 'later', 'fr' => 'plus tard', 'es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에', 'tr' => 'sonra', 'ru' => 'позже', 'az' => 'sonradan'],
        'إذن' => ['en' => 'so', 'fr' => 'donc', 'es' => 'así', 'de' => 'so', 'ja' => 'そう', 'ko' => '그래서', 'tr' => 'öyle', 'ru' => 'так', 'az' => 'belə'],
        'ليلا' => ['en' => 'at night', 'fr' => 'la nuit', 'es' => 'por la noche', 'de' => 'nachts', 'ja' => '夜に', 'ko' => '밤에', 'tr' => 'geceleyin', 'ru' => 'ночью', 'az' => 'gecələr'],
        'صيفا' => ['en' => 'in summer', 'fr' => 'en été', 'es' => 'en verano', 'de' => 'im Sommer', 'ja' => '夏に', 'ko' => '여름에', 'tr' => 'yazın', 'ru' => 'летом', 'az' => 'yayda'],
        'الطلب' => ['en' => 'to order', 'fr' => 'commander', 'es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다', 'tr' => 'sipariş vermek', 'ru' => 'заказать', 'az' => 'sifariş vermək'],
        'أستطيع' => ['en' => 'can', 'fr' => 'peux', 'es' => 'puedo', 'de' => 'kann', 'ja' => 'できます', 'ko' => '할 수 있어요', 'tr' => 'yapabilirim', 'ru' => 'могу', 'az' => 'bacarıram'],
        'عند' => ['en' => 'at', 'fr' => 'chez', 'es' => 'en', 'de' => 'bei', 'ja' => 'に', 'ko' => '에게', 'tr' => 'de', 'ru' => 'у', 'az' => 'yanında'],
        'لي' => ['en' => 'me', 'fr' => 'moi', 'es' => 'mí', 'de' => 'mich', 'ja' => '私に', 'ko' => '저에게', 'tr' => 'bana', 'ru' => 'меня', 'az' => 'mənə'],
        'سنذهب' => ['en' => 'we will go', 'fr' => 'nous irons', 'es' => 'iremos', 'de' => 'wir gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğiz', 'ru' => 'пойдём', 'az' => 'gedəcəyik'],
        'التعرف' => ['en' => 'to meet', 'fr' => 'faire connaissance', 'es' => 'conocerse', 'de' => 'kennenlernen', 'ja' => '知り合う', 'ko' => '만나다', 'tr' => 'tanışmak', 'ru' => 'познакомиться', 'az' => 'tanış olmaq'],
        'لطيف' => ['en' => 'nice', 'fr' => 'agréable', 'es' => 'agradable', 'de' => 'angenehm', 'ja' => 'うれしい', 'ko' => '반가워요', 'tr' => 'memnun', 'ru' => 'приятно', 'az' => 'xoş'],
        'البيض' => ['en' => 'of eggs', 'fr' => "d'oeufs", 'es' => 'de huevos', 'de' => 'Eier', 'ja' => '卵の', 'ko' => '달걀의', 'tr' => 'yumurtanın', 'ru' => 'яиц', 'az' => 'yumurtanın'],
        'الأكل' => ['en' => 'to eat', 'fr' => 'manger', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'tr' => 'yemek yemek', 'ru' => 'кушать', 'az' => 'yemək yemək'],
        'كنت' => ['en' => 'I was', 'fr' => "j'étais", 'es' => 'estuve', 'de' => 'ich war', 'ja' => 'いました', 'ko' => '있었어요', 'tr' => 'idim', 'ru' => 'был', 'az' => 'idim'],
        'كان' => ['en' => 'it was', 'fr' => "c'était", 'es' => 'fue', 'de' => 'es war', 'ja' => 'でした', 'ko' => '이었어요', 'tr' => 'idi', 'ru' => 'было', 'az' => 'idi'],
        'عشر سنوات' => ['en' => 'ten years', 'fr' => 'dix ans', 'es' => 'diez años', 'de' => 'zehn Jahre', 'ja' => '十歳', 'ko' => '열 살', 'tr' => 'on yaşında', 'ru' => 'десять лет', 'az' => 'on yaşında'],
        'اللقاء' => ['en' => 'seeing you', 'fr' => 'au revoir', 'es' => 'hasta la vista', 'de' => 'Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕', 'tr' => 'görüşmek', 'ru' => 'свидания', 'az' => 'görüşmək'],
        'جزيلا' => ['en' => 'very much', 'fr' => 'beaucoup', 'es' => 'muchas', 'de' => 'vielen', 'ja' => 'どうも', 'ko' => '정말', 'tr' => 'çok', 'ru' => 'большое', 'az' => 'çox sağ ol'],
        // --- Quantity and comparison -----------------------------------
        'قليل' => ['en' => 'a little', 'fr' => 'un peu', 'es' => 'un poco', 'de' => 'wenig', 'ja' => '少し', 'ko' => '조금', 'tr' => 'az', 'ru' => 'немного', 'az' => 'az'],
        'كثير' => ['en' => 'a lot', 'fr' => 'beaucoup', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이', 'tr' => 'çok', 'ru' => 'много', 'az' => 'çoxlu'],
        'أكثر' => ['en' => 'more', 'fr' => 'plus', 'es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'tr' => 'daha', 'ru' => 'больше', 'az' => 'daha'],
        'الأكثر' => ['en' => 'most', 'fr' => 'le plus', 'es' => 'el más', 'de' => 'am meisten', 'ja' => '最も', 'ko' => '가장', 'tr' => 'en', 'ru' => 'самый', 'az' => 'ən'],
        'نصف' => ['en' => 'half', 'fr' => 'demi', 'es' => 'medio', 'de' => 'halb', 'ja' => '半', 'ko' => '반', 'tr' => 'yarım', 'ru' => 'половина', 'az' => 'yarım'],
        'نفسه' => ['en' => 'the same', 'fr' => 'le même', 'es' => 'el mismo', 'de' => 'derselbe', 'ja' => '同じ', 'ko' => '같은', 'tr' => 'aynı', 'ru' => 'такой же', 'az' => 'eyni'],
        // --- Arabic-only headwords -------------------------------------
        'إلى' => ['en' => 'to', 'fr' => 'à', 'es' => 'a', 'de' => 'zu', 'ja' => 'へ', 'ko' => '로', 'tr' => 'e', 'ru' => 'в', 'az' => 'doğru'],
        'عندي' => ['en' => 'I have', 'fr' => "j'ai", 'es' => 'tengo', 'de' => 'ich habe', 'ja' => 'あります', 'ko' => '있어요', 'tr' => 'var', 'ru' => 'у меня', 'az' => 'məndə var'],
        'ليس عندي' => ['en' => 'I do not have', 'fr' => "je n'ai pas", 'es' => 'no tengo', 'de' => 'ich habe nicht', 'ja' => 'ありません', 'ko' => '없어요', 'tr' => 'yok', 'ru' => 'у меня нету', 'az' => 'məndə yoxdur'],
        'أسكن' => ['en' => 'I live', 'fr' => "j'habite", 'es' => 'vivo', 'de' => 'ich wohne', 'ja' => '住みます', 'ko' => '살아요', 'tr' => 'yaşıyorum', 'ru' => 'я живу', 'az' => 'yaşayıram'],
        'المتجر' => ['en' => 'the shop', 'fr' => 'le magasin', 'es' => 'la tienda', 'de' => 'das Geschäft', 'ja' => '店', 'ko' => '가게', 'tr' => 'dükkan', 'ru' => 'магазин', 'az' => 'mağaza'],
        'السينما' => ['en' => 'the cinema', 'fr' => 'le cinéma', 'es' => 'el cine', 'de' => 'das Kino', 'ja' => '映画館', 'ko' => '영화관', 'tr' => 'sinema', 'ru' => 'кино', 'az' => 'kinoteatr'],
        'السوبرماركت' => ['en' => 'the supermarket', 'fr' => 'le supermarché', 'es' => 'el supermercado', 'de' => 'der Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'tr' => 'market', 'ru' => 'супермаркет', 'az' => 'supermarket'],
        'الأرخص' => ['en' => 'the cheapest', 'fr' => 'le moins cher', 'es' => 'el más barato', 'de' => 'am billigsten', 'ja' => '最も安い', 'ko' => '가장 싼', 'tr' => 'en ucuz', 'ru' => 'самый дешёвый', 'az' => 'ən ucuz'],
        'الأكبر' => ['en' => 'the biggest', 'fr' => 'le plus grand', 'es' => 'el más grande', 'de' => 'am größten', 'ja' => '最も大きい', 'ko' => '가장 큰', 'tr' => 'en büyük', 'ru' => 'самый большой', 'az' => 'ən böyük'],
        'الأصغر' => ['en' => 'the smallest', 'fr' => 'le plus petit', 'es' => 'el más pequeño', 'de' => 'am kleinsten', 'ja' => '最も小さい', 'ko' => '가장 작은', 'tr' => 'en küçük', 'ru' => 'самый маленький', 'az' => 'ən kiçik'],
        'أكبر' => ['en' => 'bigger', 'fr' => 'plus grand', 'es' => 'más grande', 'de' => 'größer', 'ja' => 'もっと大きい', 'ko' => '더 큰', 'tr' => 'daha büyük', 'ru' => 'больше', 'az' => 'daha böyük'],
        'شكرا جزيلا' => ['en' => 'thank you very much', 'fr' => 'merci beaucoup', 'es' => 'muchas gracias', 'de' => 'vielen Dank', 'ja' => 'どうもありがとう', 'ko' => '정말 감사합니다', 'tr' => 'çok teşekkürler', 'ru' => 'большое спасибо', 'az' => 'çox sağ ol'],
    ];

    /** A word's meaning in every language, as an i18n map ready to store. */
    public static function hint(string $arabic): array
    {
        return ['i18n' => self::meanings($arabic)];
    }

    /** A word's meanings, keyed by language code. */
    public static function meanings(string $arabic): array
    {
        return self::WORDS[self::key($arabic)] ?? ['en' => $arabic];
    }

    /** @return array<int, string> */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $arabic): bool
    {
        return isset(self::WORDS[self::key($arabic)]);
    }

    /**
     * Normalised lookup key.
     *
     * A plain trim. Arabic has no letter case, so there is nothing to fold, and
     * deliberately nothing here strips hamza or normalises alif variants:
     * `أسد` (lion) and `اسد` are not the same string, and quietly treating them
     * as one would let a typo in a seeder resolve to the wrong word.
     */
    public static function key(string $arabic): string
    {
        return trim($arabic);
    }
}
