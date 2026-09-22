<?php

namespace Database\Seeders\Support;

/**
 * Azerbaijani word => its meaning in every native language the app supports.
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
 *    Azerbaijani is really read and written. Adding them would make every tile look
 *    like a textbook drill rather than the language.
 *
 * There are no capital letters in Azerbaijani, so the prompt builder's
 * first-letter upper-casing is simply a no-op on these values.
 *
 * Add a word here once and every unit can use it.
 */
class AzerbaijaniVocabulary
{
    private const WORDS = [
        // --- Unit 1: at the cafe ---------------------------------------
        'qəhvə' => ['en' => 'coffee', 'fr' => 'café', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'tr' => 'kahve', 'ru' => 'кофе', 'ar' => 'قهوة'],
        'çay' => ['en' => 'tea', 'fr' => 'thé', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'tr' => 'çay', 'ru' => 'чай', 'ar' => 'شاي'],
        'su' => ['en' => 'water', 'fr' => 'eau', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'tr' => 'su', 'ru' => 'вода', 'ar' => 'ماء'],
        'süd' => ['en' => 'milk', 'fr' => 'lait', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'tr' => 'süt', 'ru' => 'молоко', 'ar' => 'حليب'],
        'çörək' => ['en' => 'bread', 'fr' => 'pain', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'tr' => 'ekmek', 'ru' => 'хлеб', 'ar' => 'خبز'],
        'şəkər' => ['en' => 'sugar', 'fr' => 'sucre', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'tr' => 'şeker', 'ru' => 'сахар', 'ar' => 'سكر'],
        'pendir' => ['en' => 'cheese', 'fr' => 'fromage', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'tr' => 'peynir', 'ru' => 'сыр', 'ar' => 'جبن'],
        'tort' => ['en' => 'cake', 'fr' => 'gâteau', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'tr' => 'pasta', 'ru' => 'торт', 'ar' => 'كعكة'],

        // --- Unit 1: the glue words ------------------------------------
        'və' => ['en' => 'and', 'fr' => 'et', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'tr' => 've', 'ru' => 'и', 'ar' => 'و'],
        'zəhmət olmasa' => ['en' => 'please', 'fr' => "s'il vous plaît", 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'tr' => 'lütfen', 'ru' => 'пожалуйста', 'ar' => 'من فضلك'],
        'salam' => ['en' => 'hello', 'fr' => 'bonjour', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'tr' => 'merhaba', 'ru' => 'привет', 'ar' => 'مرحبا'],

        // --- Unit 2: greetings and courtesy ----------------------------
        'təşəkkür' => ['en' => 'thank you', 'fr' => 'merci', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'tr' => 'teşekkürler', 'ru' => 'спасибо', 'ar' => 'شكرا'],
        'bəli' => ['en' => 'yes', 'fr' => 'oui', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'tr' => 'evet', 'ru' => 'да', 'ar' => 'نعم'],
        'xeyr' => ['en' => 'no', 'fr' => 'non', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'tr' => 'hayır', 'ru' => 'нет', 'ar' => 'لا'],
        'sağ ol' => ['en' => 'goodbye', 'fr' => 'au revoir', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'tr' => 'hoşça kal', 'ru' => 'до свидания', 'ar' => 'مع السلامة'],
        'sabahınız xeyir' => ['en' => 'good morning', 'fr' => 'bonjour', 'es' => 'buenos días', 'de' => 'guten Morgen', 'ja' => 'おはよう', 'ko' => '좋은 아침', 'tr' => 'günaydın', 'ru' => 'доброе утро', 'ar' => 'صباح الخير'],
        'bağışlayın' => ['en' => 'excuse me', 'fr' => 'excusez-moi', 'es' => 'perdón', 'de' => 'Entschuldigung', 'ja' => 'すみません', 'ko' => '실례합니다', 'tr' => 'affedersiniz', 'ru' => 'извините', 'ar' => 'عفوا'],
        'istəyirəm' => ['en' => 'I would like', 'fr' => 'je voudrais', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'tr' => 'istiyorum', 'ru' => 'хочу', 'ar' => 'أريد'],
        'hesab' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'tr' => 'hesap', 'ru' => 'счёт', 'ar' => 'الحساب'],
        'xoş gəlmisiniz' => ['en' => 'welcome', 'fr' => 'bienvenue', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'tr' => 'hoş geldiniz', 'ru' => 'добро пожаловать', 'ar' => 'أهلا وسهلا'],
        'tanış olmağa şadam' => ['en' => 'nice to meet you', 'fr' => 'enchanté', 'es' => 'mucho gusto', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '만나서 반갑습니다', 'tr' => 'memnun oldum', 'ru' => 'приятно познакомиться', 'ar' => 'تشرفنا'],
        'necəsən' => ['en' => 'how are you', 'fr' => 'comment ça va', 'es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => 'お元気ですか', 'ko' => '잘 지내세요', 'tr' => 'nasılsın', 'ru' => 'как дела', 'ar' => 'كيف حالك'],

        // --- Unit 2: people and home -----------------------------------
        'kitab' => ['en' => 'book', 'fr' => 'livre', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'tr' => 'kitap', 'ru' => 'книга', 'ar' => 'كتاب'],
        'kitablar' => ['en' => 'books', 'fr' => 'livres', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'tr' => 'kitaplar', 'ru' => 'книги', 'ar' => 'كتب'],
        'ev' => ['en' => 'house', 'fr' => 'maison', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'ev', 'ru' => 'дом', 'ar' => 'بيت'],
        'evdə' => ['en' => 'the house', 'fr' => 'la maison', 'es' => 'la casa', 'de' => 'dem Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'evde', 'ru' => 'доме', 'ar' => 'البيت'],
        'pişik' => ['en' => 'cat', 'fr' => 'chat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kedi', 'ru' => 'кот', 'ar' => 'قط'],
        'it' => ['en' => 'dog', 'fr' => 'chien', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpek', 'ru' => 'собака', 'ar' => 'كلب'],
        'masa' => ['en' => 'table', 'fr' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '테이블', 'tr' => 'masa', 'ru' => 'стол', 'ar' => 'طاولة'],
        'stul' => ['en' => 'chair', 'fr' => 'chaise', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'tr' => 'sandalye', 'ru' => 'стул', 'ar' => 'كرسي'],
        'dost' => ['en' => 'friend', 'fr' => 'ami', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'tr' => 'arkadaş', 'ru' => 'друг', 'ar' => 'صديق'],
        'dostumla' => ['en' => 'with my friend', 'fr' => 'avec mon ami', 'es' => 'con mi amigo', 'de' => 'mit meinem Freund', 'ja' => '友達と', 'ko' => '친구와', 'tr' => 'arkadaşımla', 'ru' => 'другом', 'ar' => 'مع صديقي'],
        'ana' => ['en' => 'mother', 'fr' => 'mère', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'tr' => 'anne', 'ru' => 'мама', 'ar' => 'أم'],
        'ata' => ['en' => 'father', 'fr' => 'père', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'tr' => 'baba', 'ru' => 'папа', 'ar' => 'أب'],
        'bacı' => ['en' => 'sister', 'fr' => 'soeur', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매', 'tr' => 'kız kardeş', 'ru' => 'сестра', 'ar' => 'أخت'],
        'qardaş' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'tr' => 'erkek kardeş', 'ru' => 'брат', 'ar' => 'أخ'],
        'məktəb' => ['en' => 'school', 'fr' => 'école', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'tr' => 'okul', 'ru' => 'школа', 'ar' => 'مدرسة'],
        'məktəbdə' => ['en' => 'at school', 'fr' => "à l'école", 'es' => 'en la escuela', 'de' => 'in der Schule', 'ja' => '学校で', 'ko' => '학교에서', 'tr' => 'okulda', 'ru' => 'школе', 'ar' => 'في المدرسة'],
        'məktəbə' => ['en' => 'to school', 'fr' => "à l'école", 'es' => 'a la escuela', 'de' => 'zur Schule', 'ja' => '学校へ', 'ko' => '학교로', 'tr' => 'okula', 'ru' => 'школу', 'ar' => 'إلى المدرسة'],
        'müəllim' => ['en' => 'teacher', 'fr' => 'professeur', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'tr' => 'öğretmen', 'ru' => 'учитель', 'ar' => 'معلم'],
        'həkim' => ['en' => 'doctor', 'fr' => 'médecin', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'tr' => 'doktor', 'ru' => 'врач', 'ar' => 'طبيب'],
        'adam' => ['en' => 'person', 'fr' => 'personne', 'es' => 'persona', 'de' => 'Person', 'ja' => '人', 'ko' => '사람', 'tr' => 'kişi', 'ru' => 'человек', 'ar' => 'شخص'],
        'qonşu' => ['en' => 'neighbour', 'fr' => 'voisin', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'tr' => 'komşu', 'ru' => 'сосед', 'ar' => 'جار'],
        'ofisiant' => ['en' => 'waiter', 'fr' => 'serveur', 'es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'tr' => 'garson', 'ru' => 'официант', 'ar' => 'نادل'],

        // --- Unit 3: pronouns and possessives --------------------------
        'mən' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '저', 'tr' => 'ben', 'ru' => 'я', 'ar' => 'أنا'],
        'sən' => ['en' => 'you', 'fr' => 'tu', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '당신', 'tr' => 'sen', 'ru' => 'ты', 'ar' => 'أنت'],
        'bu' => ['en' => 'this', 'fr' => 'ce', 'es' => 'esto', 'de' => 'das', 'ja' => 'これ', 'ko' => '이것', 'tr' => 'bu', 'ru' => 'это', 'ar' => 'هذا'],
        'o' => ['en' => 'it', 'fr' => 'il', 'es' => 'ello', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것', 'tr' => 'o', 'ru' => 'оно', 'ar' => 'هو'],
        'mənim' => ['en' => 'my', 'fr' => 'mon', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '제', 'tr' => 'benim', 'ru' => 'мой', 'ar' => 'خاصتي'],
        'sənin' => ['en' => 'your', 'fr' => 'ton', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의', 'tr' => 'senin', 'ru' => 'твой', 'ar' => 'خاصتك'],
        'kitabım' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '제 책', 'tr' => 'kitabım', 'ru' => 'моя книга', 'ar' => 'كتابي'],
        'evim' => ['en' => 'my house', 'fr' => 'ma maison', 'es' => 'mi casa', 'de' => 'mein Haus', 'ja' => '私の家', 'ko' => '제 집', 'tr' => 'evim', 'ru' => 'мой дом', 'ar' => 'بيتي'],
        'anam' => ['en' => 'my mother', 'fr' => 'ma mère', 'es' => 'mi madre', 'de' => 'meine Mutter', 'ja' => '私の母', 'ko' => '제 어머니', 'tr' => 'annem', 'ru' => 'моя мама', 'ar' => 'أمي'],
        'atam' => ['en' => 'my father', 'fr' => 'mon père', 'es' => 'mi padre', 'de' => 'mein Vater', 'ja' => '私の父', 'ko' => '제 아버지', 'tr' => 'babam', 'ru' => 'мой папа', 'ar' => 'أبي'],
        'bacım' => ['en' => 'my sister', 'fr' => 'ma soeur', 'es' => 'mi hermana', 'de' => 'meine Schwester', 'ja' => '私の姉妹', 'ko' => '제 자매', 'tr' => 'kız kardeşim', 'ru' => 'моя сестра', 'ar' => 'أختي'],
        'dostum' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'mi amigo', 'de' => 'mein Freund', 'ja' => '私の友達', 'ko' => '제 친구', 'tr' => 'arkadaşım', 'ru' => 'мой друг', 'ar' => 'صديقي'],
        'məktəbim' => ['en' => 'my school', 'fr' => 'mon école', 'es' => 'mi escuela', 'de' => 'meine Schule', 'ja' => '私の学校', 'ko' => '제 학교', 'tr' => 'okulum', 'ru' => 'моя школа', 'ar' => 'مدرستي'],
        'adım' => ['en' => 'my name', 'fr' => 'mon nom', 'es' => 'mi nombre', 'de' => 'mein Name', 'ja' => '私の名前', 'ko' => '제 이름', 'tr' => 'adım', 'ru' => 'моё имя', 'ar' => 'اسمي'],
        'adın' => ['en' => 'your name', 'fr' => 'ton nom', 'es' => 'tu nombre', 'de' => 'dein Name', 'ja' => 'あなたの名前', 'ko' => '당신의 이름', 'tr' => 'adın', 'ru' => 'твоё имя', 'ar' => 'اسمك'],

        // --- Unit 4: colours -------------------------------------------
        'qırmızı' => ['en' => 'red', 'fr' => 'rouge', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤い', 'ko' => '빨간', 'tr' => 'kırmızı', 'ru' => 'красный', 'ar' => 'أحمر'],
        'mavi' => ['en' => 'blue', 'fr' => 'bleu', 'es' => 'azul', 'de' => 'blau', 'ja' => '青い', 'ko' => '파란', 'tr' => 'mavi', 'ru' => 'синий', 'ar' => 'أزرق'],
        'yaşıl' => ['en' => 'green', 'fr' => 'vert', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑の', 'ko' => '초록', 'tr' => 'yeşil', 'ru' => 'зелёный', 'ar' => 'أخضر'],
        'sarı' => ['en' => 'yellow', 'fr' => 'jaune', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色い', 'ko' => '노란', 'tr' => 'sarı', 'ru' => 'жёлтый', 'ar' => 'أصفر'],
        'qara' => ['en' => 'black', 'fr' => 'noir', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒い', 'ko' => '검은', 'tr' => 'siyah', 'ru' => 'чёрный', 'ar' => 'أسود'],
        'ağ' => ['en' => 'white', 'fr' => 'blanc', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白い', 'ko' => '하얀', 'tr' => 'beyaz', 'ru' => 'белый', 'ar' => 'أبيض'],

        // --- Unit 4: numbers -------------------------------------------
        'iki' => ['en' => 'two', 'fr' => 'deux', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'tr' => 'iki', 'ru' => 'два', 'ar' => 'اثنان'],
        'üç' => ['en' => 'three', 'fr' => 'trois', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'tr' => 'üç', 'ru' => 'три', 'ar' => 'ثلاثة'],
        'dörd' => ['en' => 'four', 'fr' => 'quatre', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'tr' => 'dört', 'ru' => 'четыре', 'ar' => 'أربعة'],
        'beş' => ['en' => 'five', 'fr' => 'cinq', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'tr' => 'beş', 'ru' => 'пять', 'ar' => 'خمسة'],
        'on' => ['en' => 'ten', 'fr' => 'dix', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'tr' => 'on', 'ru' => 'десять', 'ar' => 'عشرة'],
        'iyirmi' => ['en' => 'twenty', 'fr' => 'vingt', 'es' => 'veinte', 'de' => 'zwanzig', 'ja' => '二十', 'ko' => '스물', 'tr' => 'yirmi', 'ru' => 'двадцать', 'ar' => 'عشرون'],
        'nömrə' => ['en' => 'number', 'fr' => 'numéro', 'es' => 'número', 'de' => 'Nummer', 'ja' => '番号', 'ko' => '번호', 'tr' => 'numara', 'ru' => 'номер', 'ar' => 'رقم'],
        'neçə' => ['en' => 'how many', 'fr' => 'combien', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇', 'tr' => 'kaç', 'ru' => 'сколько', 'ar' => 'كم'],

        // --- Unit 5: describing things ---------------------------------
        'böyük' => ['en' => 'big', 'fr' => 'grand', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'tr' => 'büyük', 'ru' => 'большой', 'ar' => 'كبير'],
        'kiçik' => ['en' => 'small', 'fr' => 'petit', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'tr' => 'küçük', 'ru' => 'маленький', 'ar' => 'صغير'],
        'yeni' => ['en' => 'new', 'fr' => 'nouveau', 'es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새', 'tr' => 'yeni', 'ru' => 'новый', 'ar' => 'جديد'],
        'köhnə' => ['en' => 'old', 'fr' => 'vieux', 'es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'tr' => 'eski', 'ru' => 'старый', 'ar' => 'قديم'],
        'yaxşı' => ['en' => 'good', 'fr' => 'bon', 'es' => 'bueno', 'de' => 'gut', 'ja' => 'いい', 'ko' => '좋은', 'tr' => 'iyi', 'ru' => 'хороший', 'ar' => 'جيد'],
        'pis' => ['en' => 'bad', 'fr' => 'mauvais', 'es' => 'malo', 'de' => 'schlecht', 'ja' => '悪い', 'ko' => '나쁜', 'tr' => 'kötü', 'ru' => 'плохой', 'ar' => 'سيء'],
        'bahalı' => ['en' => 'expensive', 'fr' => 'cher', 'es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'tr' => 'pahalı', 'ru' => 'дорогой', 'ar' => 'غالي'],
        'ucuz' => ['en' => 'cheap', 'fr' => 'bon marché', 'es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'tr' => 'ucuz', 'ru' => 'дешёвый', 'ar' => 'رخيص'],
        'təmiz' => ['en' => 'clean', 'fr' => 'propre', 'es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれいな', 'ko' => '깨끗한', 'tr' => 'temiz', 'ru' => 'чистый', 'ar' => 'نظيف'],
        'təzə' => ['en' => 'fresh', 'fr' => 'frais', 'es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮な', 'ko' => '신선한', 'tr' => 'taze', 'ru' => 'свежий', 'ar' => 'طازج'],
        'isti' => ['en' => 'hot', 'fr' => 'chaud', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운', 'tr' => 'sıcak', 'ru' => 'горячий', 'ar' => 'ساخن'],
        'soyuq' => ['en' => 'cold', 'fr' => 'froid', 'es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운', 'tr' => 'soğuk', 'ru' => 'холодный', 'ar' => 'بارد'],
        'dadlı' => ['en' => 'delicious', 'fr' => 'délicieux', 'es' => 'delicioso', 'de' => 'lecker', 'ja' => 'おいしい', 'ko' => '맛있는', 'tr' => 'lezzetli', 'ru' => 'вкусный', 'ar' => 'لذيذ'],
        'çox dadlı' => ['en' => 'very delicious', 'fr' => 'très délicieux', 'es' => 'muy delicioso', 'de' => 'sehr lecker', 'ja' => 'とてもおいしい', 'ko' => '아주 맛있는', 'tr' => 'çok lezzetli', 'ru' => 'очень вкусный', 'ar' => 'لذيذ جدا'],
        'duzlu' => ['en' => 'salty', 'fr' => 'salé', 'es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠', 'tr' => 'tuzlu', 'ru' => 'солёный', 'ar' => 'مالح'],
        'məşğul' => ['en' => 'busy', 'fr' => 'occupé', 'es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'tr' => 'meşgul', 'ru' => 'занят', 'ar' => 'مشغول'],
        'sakit' => ['en' => 'calm', 'fr' => 'calme', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '静かな', 'ko' => '조용한', 'tr' => 'sakin', 'ru' => 'спокойный', 'ar' => 'هادئ'],
        'hazır' => ['en' => 'ready', 'fr' => 'prêt', 'es' => 'listo', 'de' => 'fertig', 'ja' => '準備できた', 'ko' => '준비된', 'tr' => 'hazır', 'ru' => 'готов', 'ar' => 'جاهز'],
        'düzgün' => ['en' => 'true', 'fr' => 'vrai', 'es' => 'verdadero', 'de' => 'richtig', 'ja' => '正しい', 'ko' => '맞아요', 'tr' => 'doğru', 'ru' => 'правильно', 'ar' => 'صحيح'],
        'səhv' => ['en' => 'wrong', 'fr' => 'faux', 'es' => 'incorrecto', 'de' => 'falsch', 'ja' => '間違い', 'ko' => '틀려요', 'tr' => 'yanlış', 'ru' => 'неправильно', 'ar' => 'خطأ'],
        'sürətli' => ['en' => 'fast', 'fr' => 'vite', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速く', 'ko' => '빨리', 'tr' => 'hızlı', 'ru' => 'быстро', 'ar' => 'بسرعة'],
        'yavaş' => ['en' => 'slowly', 'fr' => 'lentement', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'tr' => 'yavaşça', 'ru' => 'медленно', 'ar' => 'ببطء'],

        // --- Unit 6: time ----------------------------------------------
        'gün' => ['en' => 'day', 'fr' => 'jour', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'tr' => 'gün', 'ru' => 'день', 'ar' => 'يوم'],
        'səhər' => ['en' => 'morning', 'fr' => 'matin', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'tr' => 'sabah', 'ru' => 'утро', 'ar' => 'صباح'],
        'axşam' => ['en' => 'evening', 'fr' => 'soir', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'tr' => 'akşam', 'ru' => 'вечер', 'ar' => 'مساء'],
        'gecə' => ['en' => 'night', 'fr' => 'nuit', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'tr' => 'gece', 'ru' => 'ночь', 'ar' => 'ليل'],
        'bu gün' => ['en' => 'today', 'fr' => "aujourd'hui", 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'tr' => 'bugün', 'ru' => 'сегодня', 'ar' => 'اليوم'],
        'sabah' => ['en' => 'tomorrow', 'fr' => 'demain', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'tr' => 'yarın', 'ru' => 'завтра', 'ar' => 'غدا'],
        'dünən' => ['en' => 'yesterday', 'fr' => 'hier', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'tr' => 'dün', 'ru' => 'вчера', 'ar' => 'أمس'],
        'indi' => ['en' => 'now', 'fr' => 'maintenant', 'es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'tr' => 'şimdi', 'ru' => 'сейчас', 'ar' => 'الآن'],
        'həftə' => ['en' => 'week', 'fr' => 'semaine', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'tr' => 'hafta', 'ru' => 'неделя', 'ar' => 'أسبوع'],
        'gələn həftə' => ['en' => 'next week', 'fr' => 'la semaine prochaine', 'es' => 'la próxima semana', 'de' => 'nächste Woche', 'ja' => '来週', 'ko' => '다음 주', 'tr' => 'gelecek hafta', 'ru' => 'на следующей неделе', 'ar' => 'الأسبوع القادم'],
        'vaxt' => ['en' => 'time', 'fr' => 'temps', 'es' => 'tiempo', 'de' => 'Zeit', 'ja' => '時間', 'ko' => '시간', 'tr' => 'zaman', 'ru' => 'время', 'ar' => 'وقت'],
        'vaxtım' => ['en' => 'my time', 'fr' => 'mon temps', 'es' => 'mi tiempo', 'de' => 'meine Zeit', 'ja' => '私の時間', 'ko' => '제 시간', 'tr' => 'zamanım', 'ru' => 'моё время', 'ar' => 'وقتي'],
        'artıq' => ['en' => 'already', 'fr' => 'déjà', 'es' => 'ya', 'de' => 'schon', 'ja' => 'もう', 'ko' => '이미', 'tr' => 'zaten', 'ru' => 'уже', 'ar' => 'بالفعل'],
        'sonra' => ['en' => 'then', 'fr' => 'ensuite', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그다음', 'tr' => 'sonra', 'ru' => 'потом', 'ar' => 'ثم'],
        'hər' => ['en' => 'every', 'fr' => 'chaque', 'es' => 'cada', 'de' => 'jeder', 'ja' => '毎', 'ko' => '매', 'tr' => 'her', 'ru' => 'каждый', 'ar' => 'كل'],
        'birlikdə' => ['en' => 'together', 'fr' => 'ensemble', 'es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '같이', 'tr' => 'birlikte', 'ru' => 'вместе', 'ar' => 'معا'],
        'də' => ['en' => 'too', 'fr' => 'aussi', 'es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한', 'tr' => 'de', 'ru' => 'тоже', 'ar' => 'أيضا'],
        'yaş' => ['en' => 'age', 'fr' => 'âge', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'tr' => 'yaş', 'ru' => 'возраст', 'ar' => 'عمر'],
        'yaşım' => ['en' => 'my age', 'fr' => 'mon âge', 'es' => 'mi edad', 'de' => 'mein Alter', 'ja' => '私の年齢', 'ko' => '제 나이', 'tr' => 'yaşım', 'ru' => 'мой возраст', 'ar' => 'عمري'],
        'yaşındayam' => ['en' => 'I am years old', 'fr' => "j'ai ans", 'es' => 'tengo años', 'de' => 'ich bin Jahre alt', 'ja' => '私は歳です', 'ko' => '저는 살이에요', 'tr' => 'yaşındayım', 'ru' => 'мне лет', 'ar' => 'عمري سنة'],

        // --- Unit 7: weather and seasons -------------------------------
        'günəş' => ['en' => 'sun', 'fr' => 'soleil', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '해', 'tr' => 'güneş', 'ru' => 'солнце', 'ar' => 'شمس'],
        'yağış' => ['en' => 'rain', 'fr' => 'pluie', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'tr' => 'yağmur', 'ru' => 'дождь', 'ar' => 'مطر'],
        'qar' => ['en' => 'snow', 'fr' => 'neige', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'tr' => 'kar', 'ru' => 'снег', 'ar' => 'ثلج'],
        'külək' => ['en' => 'wind', 'fr' => 'vent', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'tr' => 'rüzgar', 'ru' => 'ветер', 'ar' => 'ريح'],
        'yaz' => ['en' => 'spring', 'fr' => 'printemps', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'tr' => 'ilkbahar', 'ru' => 'весна', 'ar' => 'ربيع'],
        'yay' => ['en' => 'summer', 'fr' => 'été', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'tr' => 'yaz', 'ru' => 'лето', 'ar' => 'صيف'],
        'payız' => ['en' => 'autumn', 'fr' => 'automne', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'tr' => 'sonbahar', 'ru' => 'осень', 'ar' => 'خريف'],
        'qış' => ['en' => 'winter', 'fr' => 'hiver', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'tr' => 'kış', 'ru' => 'зима', 'ar' => 'شتاء'],

        // --- Unit 8: the city ------------------------------------------
        'şəhər' => ['en' => 'city', 'fr' => 'ville', 'es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'tr' => 'şehir', 'ru' => 'город', 'ar' => 'مدينة'],
        'park' => ['en' => 'park', 'fr' => 'parc', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'park', 'ru' => 'парк', 'ar' => 'حديقة'],
        'parkda' => ['en' => 'the park', 'fr' => 'le parc', 'es' => 'el parque', 'de' => 'dem Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'parkta', 'ru' => 'парке', 'ar' => 'الحديقة'],
        'mağaza' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'tr' => 'dükkan', 'ru' => 'магазин', 'ar' => 'متجر'],
        'kinoteatr' => ['en' => 'cinema', 'fr' => 'cinéma', 'es' => 'cine', 'de' => 'Kino', 'ja' => '映画館', 'ko' => '영화관', 'tr' => 'sinema', 'ru' => 'кино', 'ar' => 'سينما'],
        'stansiya' => ['en' => 'station', 'fr' => 'gare', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'tr' => 'istasyon', 'ru' => 'станция', 'ar' => 'محطة'],
        'küçə' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'tr' => 'sokak', 'ru' => 'улица', 'ar' => 'شارع'],
        'künc' => ['en' => 'corner', 'fr' => 'coin', 'es' => 'esquina', 'de' => 'Ecke', 'ja' => '角', 'ko' => '모퉁이', 'tr' => 'köşe', 'ru' => 'угол', 'ar' => 'زاوية'],
        'küncdə' => ['en' => 'at the corner', 'fr' => 'au coin', 'es' => 'en la esquina', 'de' => 'an der Ecke', 'ja' => '角で', 'ko' => '모퉁이에서', 'tr' => 'köşede', 'ru' => 'углу', 'ar' => 'في الزاوية'],
        'maşın' => ['en' => 'car', 'fr' => 'voiture', 'es' => 'coche', 'de' => 'Auto', 'ja' => '車', 'ko' => '자동차', 'tr' => 'araba', 'ru' => 'машина', 'ar' => 'سيارة'],
        'telefon' => ['en' => 'telephone', 'fr' => 'téléphone', 'es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'tr' => 'telefon', 'ru' => 'телефон', 'ar' => 'هاتف'],
        'film' => ['en' => 'film', 'fr' => 'film', 'es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'tr' => 'film', 'ru' => 'фильм', 'ar' => 'فيلم'],
        'qələm' => ['en' => 'pen', 'fr' => 'stylo', 'es' => 'bolígrafo', 'de' => 'Stift', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalem', 'ru' => 'ручка', 'ar' => 'قلم'],

        // --- Unit 9: directions ----------------------------------------
        'sola' => ['en' => 'to the left', 'fr' => 'à gauche', 'es' => 'a la izquierda', 'de' => 'nach links', 'ja' => '左へ', 'ko' => '왼쪽으로', 'tr' => 'sola', 'ru' => 'налево', 'ar' => 'يسارا'],
        'sağa' => ['en' => 'to the right', 'fr' => 'à droite', 'es' => 'a la derecha', 'de' => 'nach rechts', 'ja' => '右へ', 'ko' => '오른쪽으로', 'tr' => 'sağa', 'ru' => 'направо', 'ar' => 'يمينا'],
        'solda' => ['en' => 'on the left', 'fr' => 'sur la gauche', 'es' => 'a la izquierda', 'de' => 'links', 'ja' => '左に', 'ko' => '왼쪽에', 'tr' => 'solda', 'ru' => 'слева', 'ar' => 'على اليسار'],
        'sağda' => ['en' => 'on the right', 'fr' => 'sur la droite', 'es' => 'a la derecha', 'de' => 'rechts', 'ja' => '右に', 'ko' => '오른쪽에', 'tr' => 'sağda', 'ru' => 'справа', 'ar' => 'على اليمين'],
        'sol' => ['en' => 'left', 'fr' => 'gauche', 'es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'tr' => 'sol', 'ru' => 'левый', 'ar' => 'يسار'],
        'sağ' => ['en' => 'right', 'fr' => 'droite', 'es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'tr' => 'sağ', 'ru' => 'правый', 'ar' => 'يمين'],
        'düz' => ['en' => 'straight', 'fr' => 'tout droit', 'es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '직진', 'tr' => 'düz', 'ru' => 'прямо', 'ar' => 'مباشرة'],
        'dönüş' => ['en' => 'turn', 'fr' => 'tournant', 'es' => 'giro', 'de' => 'Abbiegung', 'ja' => '曲がり角', 'ko' => '회전', 'tr' => 'dönüş', 'ru' => 'поворот', 'ar' => 'منعطف'],
        'harada' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'tr' => 'nerede', 'ru' => 'где', 'ar' => 'أين'],
        'burada' => ['en' => 'here', 'fr' => 'ici', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기', 'tr' => 'burada', 'ru' => 'здесь', 'ar' => 'هنا'],
        'orada' => ['en' => 'there', 'fr' => 'là', 'es' => 'allí', 'de' => 'dort', 'ja' => 'そこ', 'ko' => '거기', 'tr' => 'orada', 'ru' => 'там', 'ar' => 'هناك'],
        'uzaq' => ['en' => 'far', 'fr' => 'loin', 'es' => 'lejos', 'de' => 'weit', 'ja' => '遠い', 'ko' => '멀어요', 'tr' => 'uzak', 'ru' => 'далеко', 'ar' => 'بعيد'],
        'yaxın' => ['en' => 'near', 'fr' => 'près', 'es' => 'cerca', 'de' => 'nah', 'ja' => '近い', 'ko' => '가까워요', 'tr' => 'yakın', 'ru' => 'близко', 'ar' => 'قريب'],

        // --- Unit 10: question words -----------------------------------
        'nə' => ['en' => 'what', 'fr' => 'quoi', 'es' => 'qué', 'de' => 'was', 'ja' => '何', 'ko' => '무엇', 'tr' => 'ne', 'ru' => 'что', 'ar' => 'ماذا'],
        'kim' => ['en' => 'who', 'fr' => 'qui', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'tr' => 'kim', 'ru' => 'кто', 'ar' => 'مَن'],
        'nə vaxt' => ['en' => 'when', 'fr' => 'quand', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'tr' => 'ne zaman', 'ru' => 'когда', 'ar' => 'متى'],
        'niyə' => ['en' => 'why', 'fr' => 'pourquoi', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'tr' => 'neden', 'ru' => 'почему', 'ar' => 'لماذا'],
        'necə' => ['en' => 'how', 'fr' => 'comment', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게', 'tr' => 'nasıl', 'ru' => 'как', 'ar' => 'كيف'],

        // --- Conversation: verbs in the first person -------------------
        'gedirəm' => ['en' => 'I am going', 'fr' => 'je vais', 'es' => 'voy', 'de' => 'ich gehe', 'ja' => '行きます', 'ko' => '가요', 'tr' => 'gidiyorum', 'ru' => 'иду', 'ar' => 'أذهب'],
        'oxuyuram' => ['en' => 'I read', 'fr' => 'je lis', 'es' => 'leo', 'de' => 'ich lese', 'ja' => '読みます', 'ko' => '읽어요', 'tr' => 'okuyorum', 'ru' => 'читаю', 'ar' => 'أقرأ'],
        'yatıram' => ['en' => 'I sleep', 'fr' => 'je dors', 'es' => 'duermo', 'de' => 'ich schlafe', 'ja' => '寝ます', 'ko' => '자요', 'tr' => 'uyuyorum', 'ru' => 'сплю', 'ar' => 'أنام'],
        'danışıram' => ['en' => 'I speak', 'fr' => 'je parle', 'es' => 'hablo', 'de' => 'ich spreche', 'ja' => '話します', 'ko' => '말해요', 'tr' => 'konuşuyorum', 'ru' => 'говорю', 'ar' => 'أتكلم'],
        'düşünürəm' => ['en' => 'I think', 'fr' => 'je pense', 'es' => 'pienso', 'de' => 'ich denke', 'ja' => '思います', 'ko' => '생각해요', 'tr' => 'düşünüyorum', 'ru' => 'думаю', 'ar' => 'أفكر'],
        'gəzirəm' => ['en' => 'I walk', 'fr' => 'je me promène', 'es' => 'camino', 'de' => 'ich spaziere', 'ja' => '散歩します', 'ko' => '산책해요', 'tr' => 'yürüyorum', 'ru' => 'гуляю', 'ar' => 'أتمشى'],
        'hiss edirəm' => ['en' => 'I feel', 'fr' => 'je sens', 'es' => 'siento', 'de' => 'ich fühle', 'ja' => '感じます', 'ko' => '느껴요', 'tr' => 'hissediyorum', 'ru' => 'чувствую', 'ar' => 'أشعر'],
        'üstünlük verirəm' => ['en' => 'I prefer', 'fr' => 'je préfère', 'es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '好みます', 'ko' => '선호해요', 'tr' => 'tercih ediyorum', 'ru' => 'предпочитаю', 'ar' => 'أفضل'],
        'alıram' => ['en' => 'I am buying', 'fr' => "j'achète", 'es' => 'compro', 'de' => 'ich kaufe', 'ja' => '買います', 'ko' => '삽니다', 'tr' => 'alıyorum', 'ru' => 'покупаю', 'ar' => 'أشتري'],
        'ödəyirəm' => ['en' => 'I am paying', 'fr' => 'je paie', 'es' => 'pago', 'de' => 'ich zahle', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyorum', 'ru' => 'плачу', 'ar' => 'أدفع'],
        'ödəyirik' => ['en' => 'we are paying', 'fr' => 'nous payons', 'es' => 'pagamos', 'de' => 'wir zahlen', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyoruz', 'ru' => 'платим', 'ar' => 'ندفع'],
        'zəng edirəm' => ['en' => 'I am calling', 'fr' => "j'appelle", 'es' => 'llamo', 'de' => 'ich rufe an', 'ja' => '電話します', 'ko' => '전화해요', 'tr' => 'arıyorum', 'ru' => 'звоню', 'ar' => 'أتصل'],
        'yeyirəm' => ['en' => 'I eat', 'fr' => 'je mange', 'es' => 'como', 'de' => 'ich esse', 'ja' => '食べます', 'ko' => '먹어요', 'tr' => 'yiyorum', 'ru' => 'ем', 'ar' => 'آكل'],
        'yemirəm' => ['en' => 'I do not eat', 'fr' => 'je ne mange pas', 'es' => 'no como', 'de' => 'ich esse nicht', 'ja' => '食べません', 'ko' => '먹지 않아요', 'tr' => 'yemiyorum', 'ru' => 'не ем', 'ar' => 'لا آكل'],

        // --- Conversation: the past ------------------------------------
        'gördüm' => ['en' => 'I saw', 'fr' => "j'ai vu", 'es' => 'vi', 'de' => 'ich sah', 'ja' => '見ました', 'ko' => '봤어요', 'tr' => 'gördüm', 'ru' => 'видел', 'ar' => 'رأيت'],
        'yedim' => ['en' => 'I ate', 'fr' => "j'ai mangé", 'es' => 'comí', 'de' => 'ich aß', 'ja' => '食べました', 'ko' => '먹었어요', 'tr' => 'yedim', 'ru' => 'ел', 'ar' => 'أكلت'],
        'içdim' => ['en' => 'I drank', 'fr' => "j'ai bu", 'es' => 'bebí', 'de' => 'ich trank', 'ja' => '飲みました', 'ko' => '마셨어요', 'tr' => 'içtim', 'ru' => 'пил', 'ar' => 'شربت'],
        'burada idim' => ['en' => 'I was here', 'fr' => "j'étais ici", 'es' => 'estuve aquí', 'de' => 'ich war hier', 'ja' => 'ここにいました', 'ko' => '여기 있었어요', 'tr' => 'buradaydım', 'ru' => 'был здесь', 'ar' => 'كنت هنا'],
        'məktəbdə idim' => ['en' => 'I was in the school', 'fr' => "j'étais à l'école", 'es' => 'estuve en la escuela', 'de' => 'ich war in der Schule', 'ja' => '学校にいました', 'ko' => '학교에 있었어요', 'tr' => 'okuldaydım', 'ru' => 'был в школе', 'ar' => 'كنت في المدرسة'],
        'yaxşı idi' => ['en' => 'it was good', 'fr' => "c'était bien", 'es' => 'estuvo bien', 'de' => 'es war gut', 'ja' => 'よかったです', 'ko' => '좋았어요', 'tr' => 'iyiydi', 'ru' => 'было хорошо', 'ar' => 'كان جيدا'],
        'gördü' => ['en' => 'saw', 'fr' => 'a vu', 'es' => 'vio', 'de' => 'sah', 'ja' => '見た', 'ko' => '봤다', 'tr' => 'gördü', 'ru' => 'видела', 'ar' => 'رأى'],

        // --- Conversation: the future ----------------------------------
        'zəng edəcəyəm' => ['en' => 'I will call', 'fr' => "j'appellerai", 'es' => 'llamaré', 'de' => 'ich werde anrufen', 'ja' => '電話します', 'ko' => '전화할게요', 'tr' => 'arayacağım', 'ru' => 'позвоню', 'ar' => 'سأتصل'],
        'gələcəyəm' => ['en' => 'I will come', 'fr' => 'je viendrai', 'es' => 'vendré', 'de' => 'ich werde kommen', 'ja' => '来ます', 'ko' => '올게요', 'tr' => 'geleceğim', 'ru' => 'приду', 'ar' => 'سآتي'],
        'edəcəyəm' => ['en' => 'I will do', 'fr' => 'je ferai', 'es' => 'haré', 'de' => 'ich werde machen', 'ja' => 'します', 'ko' => '할게요', 'tr' => 'yapacağım', 'ru' => 'сделаю', 'ar' => 'سأفعل'],
        'gedəcəyəm' => ['en' => 'I will go', 'fr' => "j'irai", 'es' => 'iré', 'de' => 'ich werde gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğim', 'ru' => 'пойду', 'ar' => 'سأذهب'],
        'görəcəyəm' => ['en' => 'I will see', 'fr' => 'je verrai', 'es' => 'veré', 'de' => 'ich werde sehen', 'ja' => '見ます', 'ko' => '볼게요', 'tr' => 'göreceğim', 'ru' => 'увижу', 'ar' => 'سأرى'],

        // --- Conversation: infinitives ---------------------------------
        'getmək' => ['en' => 'to go', 'fr' => 'aller', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'tr' => 'gitmek', 'ru' => 'идти', 'ar' => 'الذهاب'],
        'oxumaq' => ['en' => 'to read', 'fr' => 'lire', 'es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'tr' => 'okumak', 'ru' => 'читать', 'ar' => 'القراءة'],
        'yatmaq' => ['en' => 'to sleep', 'fr' => 'dormir', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다', 'tr' => 'uyumak', 'ru' => 'спать', 'ar' => 'النوم'],
        'danışmaq' => ['en' => 'to speak', 'fr' => 'parler', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'tr' => 'konuşmak', 'ru' => 'говорить', 'ar' => 'التكلم'],
        'içmək' => ['en' => 'to drink', 'fr' => 'boire', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'tr' => 'içmek', 'ru' => 'пить', 'ar' => 'الشرب'],
        'gəzmək' => ['en' => 'to walk', 'fr' => 'se promener', 'es' => 'caminar', 'de' => 'spazieren', 'ja' => '散歩する', 'ko' => '걷다', 'tr' => 'yürümek', 'ru' => 'гулять', 'ar' => 'التمشي'],

        // --- Conversation: how you feel --------------------------------
        'şadam' => ['en' => 'I am glad', 'fr' => 'je suis content', 'es' => 'estoy contento', 'de' => 'ich freue mich', 'ja' => 'うれしいです', 'ko' => '기뻐요', 'tr' => 'memnunum', 'ru' => 'рад', 'ar' => 'أنا سعيد'],
        'xoşbəxtəm' => ['en' => 'I am happy', 'fr' => 'je suis heureux', 'es' => 'estoy feliz', 'de' => 'ich bin glücklich', 'ja' => '幸せです', 'ko' => '행복해요', 'tr' => 'mutluyum', 'ru' => 'счастлив', 'ar' => 'أنا فرح'],
        'kədərliyəm' => ['en' => 'I am sad', 'fr' => 'je suis triste', 'es' => 'estoy triste', 'de' => 'ich bin traurig', 'ja' => '悲しいです', 'ko' => '슬퍼요', 'tr' => 'üzgünüm', 'ru' => 'грустно', 'ar' => 'أنا حزين'],
        'xəstəyəm' => ['en' => 'I am sick', 'fr' => 'je suis malade', 'es' => 'estoy enfermo', 'de' => 'ich bin krank', 'ja' => '病気です', 'ko' => '아파요', 'tr' => 'hastayım', 'ru' => 'болен', 'ar' => 'أنا مريض'],
        'yorğunam' => ['en' => 'I am tired', 'fr' => 'je suis fatigué', 'es' => 'estoy cansado', 'de' => 'ich bin müde', 'ja' => '疲れました', 'ko' => '피곤해요', 'tr' => 'yorgunum', 'ru' => 'устал', 'ar' => 'أنا متعب'],
        'yaxşıyam' => ['en' => 'well', 'fr' => 'bien', 'es' => 'bien', 'de' => 'gut', 'ja' => '元気', 'ko' => '잘', 'tr' => 'iyi', 'ru' => 'хорошо', 'ar' => 'بخير'],
        'şad' => ['en' => 'glad', 'fr' => 'content', 'es' => 'contento', 'de' => 'froh', 'ja' => 'うれしい', 'ko' => '기쁜', 'tr' => 'memnun', 'ru' => 'рада', 'ar' => 'سعيد'],
        'kədərli' => ['en' => 'sad', 'fr' => 'triste', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'tr' => 'üzgün', 'ru' => 'грустный', 'ar' => 'حزين'],
        'xəstə' => ['en' => 'sick', 'fr' => 'malade', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気の', 'ko' => '아픈', 'tr' => 'hasta', 'ru' => 'больной', 'ar' => 'مريض'],
        'yorğun' => ['en' => 'tired', 'fr' => 'fatigué', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'tr' => 'yorgun', 'ru' => 'усталый', 'ar' => 'متعب'],
        'xoşbəxt' => ['en' => 'happy', 'fr' => 'heureux', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せな', 'ko' => '행복한', 'tr' => 'mutlu', 'ru' => 'счастливый', 'ar' => 'فرح'],

        // --- Conversation: opinions ------------------------------------
        'razıyam' => ['en' => 'I agree', 'fr' => "je suis d'accord", 'es' => 'estoy de acuerdo', 'de' => 'ich stimme zu', 'ja' => '賛成です', 'ko' => '동의해요', 'tr' => 'katılıyorum', 'ru' => 'согласен', 'ar' => 'أوافق'],
        'razı deyiləm' => ['en' => 'I do not agree', 'fr' => "je ne suis pas d'accord", 'es' => 'no estoy de acuerdo', 'de' => 'ich stimme nicht zu', 'ja' => '反対です', 'ko' => '동의하지 않아요', 'tr' => 'katılmıyorum', 'ru' => 'не согласен', 'ar' => 'لا أوافق'],
        'məncə' => ['en' => 'in my opinion', 'fr' => 'à mon avis', 'es' => 'en mi opinión', 'de' => 'meiner Meinung nach', 'ja' => '私の意見では', 'ko' => '제 생각에는', 'tr' => 'bence', 'ru' => 'по-моему', 'ar' => 'برأيي'],
        'bəlkə' => ['en' => 'maybe', 'fr' => 'peut-être', 'es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도', 'tr' => 'belki', 'ru' => 'может быть', 'ar' => 'ربما'],
        'çünki' => ['en' => 'because', 'fr' => 'parce que', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'tr' => 'çünkü', 'ru' => 'потому что', 'ar' => 'لأن'],
        'mesaj' => ['en' => 'message', 'fr' => 'message', 'es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'tr' => 'mesaj', 'ru' => 'сообщение', 'ar' => 'رسالة'],
        'plan' => ['en' => 'plan', 'fr' => 'plan', 'es' => 'plan', 'de' => 'Plan', 'ja' => '計画', 'ko' => '계획', 'tr' => 'plan', 'ru' => 'план', 'ar' => 'خطة'],
        'şey' => ['en' => 'thing', 'fr' => 'chose', 'es' => 'cosa', 'de' => 'Ding', 'ja' => 'もの', 'ko' => '것', 'tr' => 'şey', 'ru' => 'вещь', 'ar' => 'شيء'],

        // --- Conversation: existence and negation ----------------------
        'var' => ['en' => 'there is', 'fr' => 'il y a', 'es' => 'hay', 'de' => 'es gibt', 'ja' => 'あります', 'ko' => '있어요', 'tr' => 'var', 'ru' => 'есть', 'ar' => 'يوجد'],
        'yoxdur' => ['en' => 'there is not', 'fr' => "il n'y a pas", 'es' => 'no hay', 'de' => 'es gibt nicht', 'ja' => 'ありません', 'ko' => '없어요', 'tr' => 'yok', 'ru' => 'нету', 'ar' => 'لا يوجد'],
        'deyil' => ['en' => 'is not', 'fr' => "n'est pas", 'es' => 'no es', 'de' => 'ist nicht', 'ja' => 'ではない', 'ko' => '아니에요', 'tr' => 'değil', 'ru' => 'не', 'ar' => 'ليس'],
        'mı' => ['en' => 'is there', 'fr' => 'est-ce que', 'es' => 'acaso', 'de' => 'ob', 'ja' => 'か', 'ko' => '요', 'tr' => 'mı', 'ru' => 'ли', 'ar' => 'هل'],

        // --- Restaurant: the menu --------------------------------------
        'menyu' => ['en' => 'menu', 'fr' => 'menu', 'es' => 'menú', 'de' => 'Speisekarte', 'ja' => 'メニュー', 'ko' => '메뉴', 'tr' => 'menü', 'ru' => 'меню', 'ar' => 'قائمة الطعام'],
        'sifariş' => ['en' => 'order', 'fr' => 'commande', 'es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'tr' => 'sipariş', 'ru' => 'заказ', 'ar' => 'طلب'],
        'porsiya' => ['en' => 'portion', 'fr' => 'portion', 'es' => 'porción', 'de' => 'Portion', 'ja' => '一人前', 'ko' => '인분', 'tr' => 'porsiyon', 'ru' => 'порция', 'ar' => 'حصة'],
        'rezervasiya' => ['en' => 'reservation', 'fr' => 'réservation', 'es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'tr' => 'rezervasyon', 'ru' => 'бронь', 'ar' => 'حجز'],
        'şikayət' => ['en' => 'complaint', 'fr' => 'réclamation', 'es' => 'queja', 'de' => 'Beschwerde', 'ja' => '苦情', 'ko' => '불만', 'tr' => 'şikayet', 'ru' => 'жалоба', 'ar' => 'شكوى'],
        'allergiya' => ['en' => 'allergy', 'fr' => 'allergie', 'es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'tr' => 'alerji', 'ru' => 'аллергия', 'ar' => 'حساسية'],
        'allergiyam' => ['en' => 'my allergy', 'fr' => 'mon allergie', 'es' => 'mi alergia', 'de' => 'meine Allergie', 'ja' => '私のアレルギー', 'ko' => '제 알레르기', 'tr' => 'alerjim', 'ru' => 'моя аллергия', 'ar' => 'حساسيتي'],
        'vegetarian' => ['en' => 'vegetarian', 'fr' => 'végétarien', 'es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'tr' => 'vejetaryen', 'ru' => 'вегетарианец', 'ar' => 'نباتي'],
        'vegetarianam' => ['en' => 'I am vegetarian', 'fr' => 'je suis végétarien', 'es' => 'soy vegetariano', 'de' => 'ich bin vegetarisch', 'ja' => '私はベジタリアンです', 'ko' => '저는 채식주의자예요', 'tr' => 'vejetaryenim', 'ru' => 'я вегетарианец', 'ar' => 'أنا نباتي'],
        'yeyə bilmirəm' => ['en' => 'I cannot eat', 'fr' => 'je ne peux pas manger', 'es' => 'no puedo comer', 'de' => 'ich kann nicht essen', 'ja' => '食べられません', 'ko' => '먹을 수 없어요', 'tr' => 'yiyemem', 'ru' => 'не могу есть', 'ar' => 'لا أستطيع الأكل'],

        // --- Restaurant: dishes ----------------------------------------
        'şorba' => ['en' => 'soup', 'fr' => 'soupe', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'tr' => 'çorba', 'ru' => 'суп', 'ar' => 'حساء'],
        'balıq' => ['en' => 'fish', 'fr' => 'poisson', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'tr' => 'balık', 'ru' => 'рыба', 'ar' => 'سمك'],
        'ət' => ['en' => 'meat', 'fr' => 'viande', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'tr' => 'et', 'ru' => 'мясо', 'ar' => 'لحم'],
        'düyü' => ['en' => 'rice', 'fr' => 'riz', 'es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥', 'tr' => 'pirinç', 'ru' => 'рис', 'ar' => 'أرز'],
        'salat' => ['en' => 'salad', 'fr' => 'salade', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'tr' => 'salata', 'ru' => 'салат', 'ar' => 'سلطة'],
        'kartof' => ['en' => 'potato', 'fr' => 'pomme de terre', 'es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'tr' => 'patates', 'ru' => 'картофель', 'ar' => 'بطاطا'],
        'toyuq' => ['en' => 'chicken', 'fr' => 'poulet', 'es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'tr' => 'tavuk', 'ru' => 'курица', 'ar' => 'دجاج'],
        'yemək' => ['en' => 'food', 'fr' => 'nourriture', 'es' => 'comida', 'de' => 'Essen', 'ja' => '食べ物', 'ko' => '음식', 'tr' => 'yemek', 'ru' => 'еда', 'ar' => 'طعام'],

        // --- Restaurant: drinks and sweets -----------------------------
        'içki' => ['en' => 'drink', 'fr' => 'boisson', 'es' => 'bebida', 'de' => 'Getränk', 'ja' => '飲み物', 'ko' => '음료', 'tr' => 'içecek', 'ru' => 'напиток', 'ar' => 'مشروب'],
        'şərab' => ['en' => 'wine', 'fr' => 'vin', 'es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'tr' => 'şarap', 'ru' => 'вино', 'ar' => 'نبيذ'],
        'pivə' => ['en' => 'beer', 'fr' => 'bière', 'es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'tr' => 'bira', 'ru' => 'пиво', 'ar' => 'بيرة'],
        'buz' => ['en' => 'ice', 'fr' => 'glace', 'es' => 'hielo', 'de' => 'Eis', 'ja' => '氷', 'ko' => '얼음', 'tr' => 'buz', 'ru' => 'лёд', 'ar' => 'الثلج'],
        'şirniyyat' => ['en' => 'dessert', 'fr' => 'dessert', 'es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'tr' => 'tatlı', 'ru' => 'десерт', 'ar' => 'حلوى'],
        'dondurma' => ['en' => 'ice cream', 'fr' => 'glace', 'es' => 'helado', 'de' => 'Eiscreme', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'tr' => 'dondurma', 'ru' => 'мороженое', 'ar' => 'آيس كريم'],
        'şokolad' => ['en' => 'chocolate', 'fr' => 'chocolat', 'es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'tr' => 'çikolata', 'ru' => 'шоколад', 'ar' => 'شوكولاتة'],

        // --- Restaurant: the table -------------------------------------
        'çəngəl' => ['en' => 'fork', 'fr' => 'fourchette', 'es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'tr' => 'çatal', 'ru' => 'вилка', 'ar' => 'شوكة'],
        'bıçaq' => ['en' => 'knife', 'fr' => 'couteau', 'es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'tr' => 'bıçak', 'ru' => 'нож', 'ar' => 'سكين'],
        'qaşıq' => ['en' => 'spoon', 'fr' => 'cuillère', 'es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'tr' => 'kaşık', 'ru' => 'ложка', 'ar' => 'ملعقة'],
        'boşqab' => ['en' => 'plate', 'fr' => 'assiette', 'es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'tr' => 'tabak', 'ru' => 'тарелка', 'ar' => 'صحن'],
        'salfet' => ['en' => 'napkin', 'fr' => 'serviette', 'es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'tr' => 'peçete', 'ru' => 'салфетка', 'ar' => 'منديل'],
        'stəkan' => ['en' => 'glass', 'fr' => 'verre', 'es' => 'vaso', 'de' => 'Glas', 'ja' => 'コップ', 'ko' => '컵', 'tr' => 'bardak', 'ru' => 'стакан', 'ar' => 'كوب'],
        'özümlə' => ['en' => 'takeaway', 'fr' => 'à emporter', 'es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'tr' => 'paket', 'ru' => 'с собой', 'ar' => 'للخارج'],

        // --- Restaurant: paying ----------------------------------------
        'qiymət' => ['en' => 'price', 'fr' => 'prix', 'es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'tr' => 'fiyat', 'ru' => 'цена', 'ar' => 'سعر'],
        'pul' => ['en' => 'money', 'fr' => 'argent', 'es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'tr' => 'para', 'ru' => 'деньги', 'ar' => 'نقود'],
        'pulum' => ['en' => 'my money', 'fr' => 'mon argent', 'es' => 'mi dinero', 'de' => 'mein Geld', 'ja' => '私のお金', 'ko' => '제 돈', 'tr' => 'param', 'ru' => 'мои деньги', 'ar' => 'نقودي'],
        'kart' => ['en' => 'card', 'fr' => 'carte', 'es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'tr' => 'kart', 'ru' => 'карта', 'ar' => 'بطاقة'],
        'nağd' => ['en' => 'cash', 'fr' => 'espèces', 'es' => 'efectivo', 'de' => 'Bargeld', 'ja' => '現金', 'ko' => '현금', 'tr' => 'nakit', 'ru' => 'наличные', 'ar' => 'كاش'],
        'manat' => ['en' => 'lira', 'fr' => 'rouble', 'es' => 'rublo', 'de' => 'Rubel', 'ja' => 'ルーブル', 'ko' => '루블', 'tr' => 'lira', 'ru' => 'рубль', 'ar' => 'ريال'],
        'cəmi' => ['en' => 'total', 'fr' => 'total', 'es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '합계', 'tr' => 'toplam', 'ru' => 'итого', 'ar' => 'المجموع'],

        // --- Supermarket: the shop -------------------------------------
        'supermarket' => ['en' => 'supermarket', 'fr' => 'supermarché', 'es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'tr' => 'market', 'ru' => 'супермаркет', 'ar' => 'سوبرماركت'],
        'supermarketdə' => ['en' => 'in the supermarket', 'fr' => 'au supermarché', 'es' => 'en el supermercado', 'de' => 'im Supermarkt', 'ja' => 'スーパーで', 'ko' => '슈퍼마켓에서', 'tr' => 'markette', 'ru' => 'супермаркете', 'ar' => 'في السوبرماركت'],
        'şöbə' => ['en' => 'aisle', 'fr' => 'rayon', 'es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '코너', 'tr' => 'reyon', 'ru' => 'отдел', 'ar' => 'قسم'],
        'şöbədə' => ['en' => 'in the aisle', 'fr' => 'au rayon', 'es' => 'en el pasillo', 'de' => 'im Regal', 'ja' => '売り場で', 'ko' => '코너에서', 'tr' => 'reyonda', 'ru' => 'отделе', 'ar' => 'في القسم'],
        'səbət' => ['en' => 'basket', 'fr' => 'panier', 'es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'tr' => 'sepet', 'ru' => 'корзина', 'ar' => 'سلة'],
        'kassa' => ['en' => 'checkout', 'fr' => 'caisse', 'es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'tr' => 'kasa', 'ru' => 'касса', 'ar' => 'صندوق الدفع'],
        'siyahı' => ['en' => 'list', 'fr' => 'liste', 'es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'tr' => 'liste', 'ru' => 'список', 'ar' => 'قائمة'],
        'siyahıda' => ['en' => 'on the list', 'fr' => 'sur la liste', 'es' => 'en la lista', 'de' => 'auf der Liste', 'ja' => 'リストに', 'ko' => '목록에', 'tr' => 'listede', 'ru' => 'списке', 'ar' => 'في القائمة'],
        'endirim' => ['en' => 'discount', 'fr' => 'réduction', 'es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'tr' => 'indirim', 'ru' => 'скидка', 'ar' => 'خصم'],
        'endirimdə' => ['en' => 'on discount', 'fr' => 'en réduction', 'es' => 'en descuento', 'de' => 'im Rabatt', 'ja' => '割引で', 'ko' => '할인이에요', 'tr' => 'indirimde', 'ru' => 'со скидкой', 'ar' => 'بخصم'],
        'torba' => ['en' => 'bag', 'fr' => 'sac', 'es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'tr' => 'poşet', 'ru' => 'пакет', 'ar' => 'كيس'],

        // --- Supermarket: fruit and vegetables -------------------------
        'meyvə' => ['en' => 'fruit', 'fr' => 'fruit', 'es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'tr' => 'meyve', 'ru' => 'фрукт', 'ar' => 'فاكهة'],
        'tərəvəz' => ['en' => 'vegetable', 'fr' => 'légume', 'es' => 'verdura', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebze', 'ru' => 'овощ', 'ar' => 'خضار'],
        'alma' => ['en' => 'apple', 'fr' => 'pomme', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elma', 'ru' => 'яблоко', 'ar' => 'تفاحة'],
        'almalar' => ['en' => 'apples', 'fr' => 'pommes', 'es' => 'manzanas', 'de' => 'Äpfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elmalar', 'ru' => 'яблоки', 'ar' => 'تفاح'],
        'banan' => ['en' => 'banana', 'fr' => 'banane', 'es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muz', 'ru' => 'банан', 'ar' => 'موزة'],
        'portağal' => ['en' => 'orange', 'fr' => 'orange', 'es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakal', 'ru' => 'апельсин', 'ar' => 'برتقالة'],
        'üzüm' => ['en' => 'grape', 'fr' => 'raisin', 'es' => 'uva', 'de' => 'Traube', 'ja' => 'ぶどう', 'ko' => '포도', 'tr' => 'üzüm', 'ru' => 'виноград', 'ar' => 'عنب'],
        'pomidor' => ['en' => 'tomato', 'fr' => 'tomate', 'es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'tr' => 'domates', 'ru' => 'помидор', 'ar' => 'طماطم'],
        'xiyar' => ['en' => 'cucumber', 'fr' => 'concombre', 'es' => 'pepino', 'de' => 'Gurke', 'ja' => 'きゅうり', 'ko' => '오이', 'tr' => 'salatalık', 'ru' => 'огурец', 'ar' => 'خيار'],
        'soğan' => ['en' => 'onion', 'fr' => 'oignon', 'es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => 'たまねぎ', 'ko' => '양파', 'tr' => 'soğan', 'ru' => 'лук', 'ar' => 'بصل'],
        'yerkökü' => ['en' => 'carrot', 'fr' => 'carotte', 'es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'tr' => 'havuç', 'ru' => 'морковь', 'ar' => 'جزر'],

        // --- Supermarket: dairy and staples ----------------------------
        'qatıq' => ['en' => 'yoghurt', 'fr' => 'yaourt', 'es' => 'yogur', 'de' => 'Joghurt', 'ja' => 'ヨーグルト', 'ko' => '요구르트', 'tr' => 'yoğurt', 'ru' => 'йогурт', 'ar' => 'لبن'],
        'kərə yağı' => ['en' => 'butter', 'fr' => 'beurre', 'es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'tr' => 'tereyağı', 'ru' => 'масло', 'ar' => 'زبدة'],
        'yumurta' => ['en' => 'egg', 'fr' => 'oeuf', 'es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurta', 'ru' => 'яйцо', 'ar' => 'بيضة'],
        'kilo' => ['en' => 'kilo', 'fr' => 'kilo', 'es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'tr' => 'kilo', 'ru' => 'кило', 'ar' => 'كيلو'],
        'şüşə' => ['en' => 'bottle', 'fr' => 'bouteille', 'es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişe', 'ru' => 'бутылка', 'ar' => 'زجاجة'],
        'qutu' => ['en' => 'box', 'fr' => 'boîte', 'es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutu', 'ru' => 'коробка', 'ar' => 'علبة'],

        // --- Prepositions and the forms they govern --------------------
        'içində' => ['en' => 'in', 'fr' => 'dans', 'es' => 'en', 'de' => 'in', 'ja' => 'に', 'ko' => '에', 'tr' => 'içinde', 'ru' => 'в', 'ar' => 'في'],
        'ilə' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와', 'tr' => 'ile', 'ru' => 'с', 'ar' => 'مع'],
        'olmadan' => ['en' => 'without', 'fr' => 'sans', 'es' => 'sin', 'de' => 'ohne', 'ja' => 'なしで', 'ko' => '없이', 'tr' => 'olmadan', 'ru' => 'без', 'ar' => 'بدون'],
        'üçün' => ['en' => 'for', 'fr' => 'pour', 'es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'tr' => 'için', 'ru' => 'для', 'ar' => 'لأجل'],
        'dan' => ['en' => 'than', 'fr' => 'que', 'es' => 'que', 'de' => 'als', 'ja' => 'より', 'ko' => '보다', 'tr' => 'den', 'ru' => 'чем', 'ar' => 'من'],
        'südlü' => ['en' => 'with milk', 'fr' => 'avec du lait', 'es' => 'con leche', 'de' => 'mit Milch', 'ja' => '牛乳入りの', 'ko' => '우유 있는', 'tr' => 'sütlü', 'ru' => 'молоком', 'ar' => 'مع الحليب'],
        'şəkərli' => ['en' => 'with sugar', 'fr' => 'avec du sucre', 'es' => 'con azúcar', 'de' => 'mit Zucker', 'ja' => '砂糖入りの', 'ko' => '설탕 있는', 'tr' => 'şekerli', 'ru' => 'сахаром', 'ar' => 'مع السكر'],
        'buzlu' => ['en' => 'with ice', 'fr' => 'avec des glaçons', 'es' => 'con hielo', 'de' => 'mit Eis', 'ja' => '氷入りの', 'ko' => '얼음 있는', 'tr' => 'buzlu', 'ru' => 'льдом', 'ar' => 'مع الثلج'],
        'şokoladlı' => ['en' => 'with chocolate', 'fr' => 'avec du chocolat', 'es' => 'con chocolate', 'de' => 'mit Schokolade', 'ja' => 'チョコ入りの', 'ko' => '초콜릿 있는', 'tr' => 'çikolatalı', 'ru' => 'шоколадом', 'ar' => 'مع الشوكولاتة'],
        'yağlı' => ['en' => 'with butter', 'fr' => 'avec du beurre', 'es' => 'con mantequilla', 'de' => 'mit Butter', 'ja' => 'バター入りの', 'ko' => '버터 있는', 'tr' => 'tereyağlı', 'ru' => 'маслом', 'ar' => 'مع الزبدة'],
        'südsüz' => ['en' => 'without milk', 'fr' => 'sans lait', 'es' => 'sin leche', 'de' => 'ohne Milch', 'ja' => '牛乳なしの', 'ko' => '우유 없는', 'tr' => 'sütsüz', 'ru' => 'молока', 'ar' => 'بدون حليب'],
        'şəkərsiz' => ['en' => 'without sugar', 'fr' => 'sans sucre', 'es' => 'sin azúcar', 'de' => 'ohne Zucker', 'ja' => '砂糖なしの', 'ko' => '설탕 없는', 'tr' => 'şekersiz', 'ru' => 'сахара', 'ar' => 'بدون سكر'],
        'buzsuz' => ['en' => 'without ice', 'fr' => 'sans glaçons', 'es' => 'sin hielo', 'de' => 'ohne Eis', 'ja' => '氷なしの', 'ko' => '얼음 없는', 'tr' => 'buzsuz', 'ru' => 'льда', 'ar' => 'بدون ثلج'],
        'suyun' => ['en' => 'of water', 'fr' => "d'eau", 'es' => 'de agua', 'de' => 'Wasser', 'ja' => '水の', 'ko' => '물의', 'tr' => 'suyun', 'ru' => 'воды', 'ar' => 'الماء'],
        'bunda' => ['en' => 'in this', 'fr' => 'dedans', 'es' => 'en esto', 'de' => 'darin', 'ja' => 'これに', 'ko' => '이것에', 'tr' => 'bunda', 'ru' => 'этом', 'ar' => 'في هذا'],

        // --- Accusative forms the phrases need as whole tiles ----------
        'suyu' => ['en' => 'the water', 'fr' => "l'eau", 'es' => 'el agua', 'de' => 'das Wasser', 'ja' => '水を', 'ko' => '물을', 'tr' => 'suyu', 'ru' => 'воду', 'ar' => 'الماء'],
        'balığı' => ['en' => 'the fish', 'fr' => 'le poisson', 'es' => 'el pescado', 'de' => 'den Fisch', 'ja' => '魚を', 'ko' => '생선을', 'tr' => 'balığı', 'ru' => 'рыбу', 'ar' => 'السمك'],
        'kitabımı' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本を', 'ko' => '제 책을', 'tr' => 'kitabımı', 'ru' => 'книгу', 'ar' => 'كتابي'],
        'qəzeti' => ['en' => 'the newspaper', 'fr' => 'le journal', 'es' => 'el periódico', 'de' => 'die Zeitung', 'ja' => '新聞を', 'ko' => '신문을', 'tr' => 'gazeteyi', 'ru' => 'газету', 'ar' => 'الجريدة'],

        // --- Plurals the phrases ask for as whole tiles ----------------
        'pişiklər' => ['en' => 'cats', 'fr' => 'chats', 'es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kediler', 'ru' => 'коты', 'ar' => 'قطط'],
        'itlər' => ['en' => 'dogs', 'fr' => 'chiens', 'es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpekler', 'ru' => 'собаки', 'ar' => 'كلاب'],
        'insanlar' => ['en' => 'people', 'fr' => 'gens', 'es' => 'gente', 'de' => 'Leute', 'ja' => '人々', 'ko' => '사람들', 'tr' => 'insanlar', 'ru' => 'люди', 'ar' => 'ناس'],
        'qələmlər' => ['en' => 'pens', 'fr' => 'stylos', 'es' => 'bolígrafos', 'de' => 'Stifte', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalemler', 'ru' => 'ручки', 'ar' => 'أقلام'],
        'tərəvəzlər' => ['en' => 'vegetables', 'fr' => 'légumes', 'es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebzeler', 'ru' => 'овощи', 'ar' => 'خضروات'],
        'pomidorlar' => ['en' => 'tomatoes', 'fr' => 'tomates', 'es' => 'tomates', 'de' => 'Tomaten', 'ja' => 'トマト', 'ko' => '토마토', 'tr' => 'domatesler', 'ru' => 'помидоры', 'ar' => 'طماطم'],
        'yumurtalar' => ['en' => 'eggs', 'fr' => 'oeufs', 'es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurtalar', 'ru' => 'яйца', 'ar' => 'بيض'],
        'bananlar' => ['en' => 'bananas', 'fr' => 'bananes', 'es' => 'plátanos', 'de' => 'Bananen', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muzlar', 'ru' => 'бананы', 'ar' => 'موز'],
        'portağallar' => ['en' => 'oranges', 'fr' => 'oranges', 'es' => 'naranjas', 'de' => 'Orangen', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakallar', 'ru' => 'апельсины', 'ar' => 'برتقال'],
        'şüşələr' => ['en' => 'bottles', 'fr' => 'bouteilles', 'es' => 'botellas', 'de' => 'Flaschen', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişeler', 'ru' => 'бутылки', 'ar' => 'زجاجات'],
        'qutular' => ['en' => 'boxes', 'fr' => 'boîtes', 'es' => 'cajas', 'de' => 'Schachteln', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutular', 'ru' => 'коробки', 'ar' => 'علب'],
        'saat' => ['en' => 'clock', 'fr' => 'horloge', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'tr' => 'saat', 'ru' => 'часы', 'ar' => 'ساعة'],
        'yaşında' => ['en' => 'years', 'fr' => 'ans', 'es' => 'años', 'de' => 'Jahre', 'ja' => '歳', 'ko' => '살', 'tr' => 'yaşında', 'ru' => 'лет', 'ar' => 'سنوات'],

        // --- Comparatives and superlatives -----------------------------
        'daha yaxşı' => ['en' => 'better', 'fr' => 'mieux', 'es' => 'mejor', 'de' => 'besser', 'ja' => 'もっといい', 'ko' => '더 좋은', 'tr' => 'daha iyi', 'ru' => 'лучше', 'ar' => 'أحسن'],
        'daha kiçik' => ['en' => 'smaller', 'fr' => 'plus petit', 'es' => 'más pequeño', 'de' => 'kleiner', 'ja' => 'もっと小さい', 'ko' => '더 작은', 'tr' => 'daha küçük', 'ru' => 'меньше', 'ar' => 'أصغر'],
        'daha yaşlı' => ['en' => 'older', 'fr' => 'plus vieux', 'es' => 'mayor', 'de' => 'älter', 'ja' => 'もっと年上', 'ko' => '더 나이 든', 'tr' => 'daha yaşlı', 'ru' => 'старше', 'ar' => 'أكبر سنا'],
        'daha bahalı' => ['en' => 'more expensive', 'fr' => 'plus cher', 'es' => 'más caro', 'de' => 'teurer', 'ja' => 'もっと高い', 'ko' => '더 비싼', 'tr' => 'daha pahalı', 'ru' => 'дороже', 'ar' => 'أغلى'],
        'daha ucuz' => ['en' => 'cheaper', 'fr' => 'moins cher', 'es' => 'más barato', 'de' => 'billiger', 'ja' => 'もっと安い', 'ko' => '더 싼', 'tr' => 'daha ucuz', 'ru' => 'дешевле', 'ar' => 'أرخص'],
        'ən yaxşı' => ['en' => 'best', 'fr' => 'meilleur', 'es' => 'mejor', 'de' => 'beste', 'ja' => '最高の', 'ko' => '최고의', 'tr' => 'en iyi', 'ru' => 'лучший', 'ar' => 'الأفضل'],

        // --- Words the phrases need that the core list missed ----------
        'çox' => ['en' => 'very', 'fr' => 'très', 'es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '아주', 'tr' => 'çok', 'ru' => 'очень', 'ar' => 'جدا'],
        'hər şey' => ['en' => 'everything', 'fr' => 'tout', 'es' => 'todo', 'de' => 'alles', 'ja' => '全部', 'ko' => '모두', 'tr' => 'her şey', 'ru' => 'всё', 'ar' => 'كل شيء'],
        'o kişi' => ['en' => 'he', 'fr' => 'il', 'es' => 'él', 'de' => 'er', 'ja' => '彼', 'ko' => '그', 'tr' => 'o', 'ru' => 'он', 'ar' => 'هو'],
        'biz' => ['en' => 'we', 'fr' => 'nous', 'es' => 'nosotros', 'de' => 'wir', 'ja' => '私たち', 'ko' => '우리', 'tr' => 'biz', 'ru' => 'мы', 'ar' => 'نحن'],
        'bir' => ['en' => 'a / one', 'fr' => 'un', 'es' => 'uno', 'de' => 'eins', 'ja' => '一', 'ko' => '하나', 'tr' => 'bir', 'ru' => 'один', 'ar' => 'واحد'],
        'ad' => ['en' => 'name', 'fr' => 'nom', 'es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름', 'tr' => 'isim', 'ru' => 'имя', 'ar' => 'اسم'],
        'evdəyəm' => ['en' => 'home', 'fr' => 'à la maison', 'es' => 'en casa', 'de' => 'zu Hause', 'ja' => '家で', 'ko' => '집에', 'tr' => 'evde', 'ru' => 'дома', 'ar' => 'في البيت'],
        'şirin' => ['en' => 'sweet', 'fr' => 'sucré', 'es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '달콤한', 'tr' => 'tatlı', 'ru' => 'сладкий', 'ar' => 'حلو'],
        'sonradan' => ['en' => 'later', 'fr' => 'plus tard', 'es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에', 'tr' => 'sonra', 'ru' => 'позже', 'ar' => 'لاحقا'],
        'belə' => ['en' => 'so', 'fr' => 'donc', 'es' => 'así', 'de' => 'so', 'ja' => 'そう', 'ko' => '그래서', 'tr' => 'öyle', 'ru' => 'так', 'ar' => 'إذن'],
        'gecələr' => ['en' => 'at night', 'fr' => 'la nuit', 'es' => 'por la noche', 'de' => 'nachts', 'ja' => '夜に', 'ko' => '밤에', 'tr' => 'geceleyin', 'ru' => 'ночью', 'ar' => 'ليلا'],
        'yayda' => ['en' => 'in summer', 'fr' => 'en été', 'es' => 'en verano', 'de' => 'im Sommer', 'ja' => '夏に', 'ko' => '여름에', 'tr' => 'yazın', 'ru' => 'летом', 'ar' => 'صيفا'],
        'sifariş vermək' => ['en' => 'to order', 'fr' => 'commander', 'es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다', 'tr' => 'sipariş vermek', 'ru' => 'заказать', 'ar' => 'الطلب'],
        'bacarıram' => ['en' => 'can', 'fr' => 'peux', 'es' => 'puedo', 'de' => 'kann', 'ja' => 'できます', 'ko' => '할 수 있어요', 'tr' => 'yapabilirim', 'ru' => 'могу', 'ar' => 'أستطيع'],
        'yanında' => ['en' => 'at', 'fr' => 'chez', 'es' => 'en', 'de' => 'bei', 'ja' => 'に', 'ko' => '에게', 'tr' => 'de', 'ru' => 'у', 'ar' => 'عند'],
        'mənə' => ['en' => 'me', 'fr' => 'moi', 'es' => 'mí', 'de' => 'mich', 'ja' => '私に', 'ko' => '저에게', 'tr' => 'bana', 'ru' => 'меня', 'ar' => 'لي'],
        'gedəcəyik' => ['en' => 'we will go', 'fr' => 'nous irons', 'es' => 'iremos', 'de' => 'wir gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğiz', 'ru' => 'пойдём', 'ar' => 'سنذهب'],
        'tanış olmaq' => ['en' => 'to meet', 'fr' => 'faire connaissance', 'es' => 'conocerse', 'de' => 'kennenlernen', 'ja' => '知り合う', 'ko' => '만나다', 'tr' => 'tanışmak', 'ru' => 'познакомиться', 'ar' => 'التعرف'],
        'xoş' => ['en' => 'nice', 'fr' => 'agréable', 'es' => 'agradable', 'de' => 'angenehm', 'ja' => 'うれしい', 'ko' => '반가워요', 'tr' => 'memnun', 'ru' => 'приятно', 'ar' => 'لطيف'],
        'balığın' => ['en' => 'of fish', 'fr' => 'de poisson', 'es' => 'de pescado', 'de' => 'Fisch', 'ja' => '魚の', 'ko' => '생선의', 'tr' => 'balığın', 'ru' => 'рыбы', 'ar' => 'السمك'],
        'yumurtanın' => ['en' => 'of eggs', 'fr' => "d'oeufs", 'es' => 'de huevos', 'de' => 'Eier', 'ja' => '卵の', 'ko' => '달걀의', 'tr' => 'yumurtanın', 'ru' => 'яиц', 'ar' => 'البيض'],
        'yemək yemək' => ['en' => 'to eat', 'fr' => 'manger', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'tr' => 'yemek yemek', 'ru' => 'кушать', 'ar' => 'الأكل'],
        'idim' => ['en' => 'I was', 'fr' => "j'étais", 'es' => 'estuve', 'de' => 'ich war', 'ja' => 'いました', 'ko' => '있었어요', 'tr' => 'idim', 'ru' => 'был', 'ar' => 'كنت'],
        'idi' => ['en' => 'it was', 'fr' => "c'était", 'es' => 'fue', 'de' => 'es war', 'ja' => 'でした', 'ko' => '이었어요', 'tr' => 'idi', 'ru' => 'было', 'ar' => 'كان'],
        'on yaşında' => ['en' => 'ten years', 'fr' => 'dix ans', 'es' => 'diez años', 'de' => 'zehn Jahre', 'ja' => '十歳', 'ko' => '열 살', 'tr' => 'on yaşında', 'ru' => 'десять лет', 'ar' => 'عشر سنوات'],
        'görüşmək' => ['en' => 'seeing you', 'fr' => 'au revoir', 'es' => 'hasta la vista', 'de' => 'Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕', 'tr' => 'görüşmek', 'ru' => 'свидания', 'ar' => 'اللقاء'],
        'çox sağ ol' => ['en' => 'very much', 'fr' => 'beaucoup', 'es' => 'muchas', 'de' => 'vielen', 'ja' => 'どうも', 'ko' => '정말', 'tr' => 'çok', 'ru' => 'большое', 'ar' => 'جزيلا'],

        // --- Quantity and comparison -----------------------------------
        'az' => ['en' => 'a little', 'fr' => 'un peu', 'es' => 'un poco', 'de' => 'wenig', 'ja' => '少し', 'ko' => '조금', 'tr' => 'az', 'ru' => 'немного', 'ar' => 'قليل'],
        'çoxlu' => ['en' => 'a lot', 'fr' => 'beaucoup', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이', 'tr' => 'çok', 'ru' => 'много', 'ar' => 'كثير'],
        'daha' => ['en' => 'more', 'fr' => 'plus', 'es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'tr' => 'daha', 'ru' => 'больше', 'ar' => 'أكثر'],
        'ən' => ['en' => 'most', 'fr' => 'le plus', 'es' => 'el más', 'de' => 'am meisten', 'ja' => '最も', 'ko' => '가장', 'tr' => 'en', 'ru' => 'самый', 'ar' => 'الأكثر'],
        'yarım' => ['en' => 'half', 'fr' => 'demi', 'es' => 'medio', 'de' => 'halb', 'ja' => '半', 'ko' => '반', 'tr' => 'yarım', 'ru' => 'половина', 'ar' => 'نصف'],
        'eyni' => ['en' => 'the same', 'fr' => 'le même', 'es' => 'el mismo', 'de' => 'derselbe', 'ja' => '同じ', 'ko' => '같은', 'tr' => 'aynı', 'ru' => 'такой же', 'ar' => 'نفسه'],

        // --- Azerbaijani-only headwords --------------------------------
        'mənim kitabım' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '제 책', 'tr' => 'kitabım', 'ru' => 'моя книга', 'ar' => 'كتابي'],
        'parka' => ['en' => 'to the park', 'fr' => 'au parc', 'es' => 'al parque', 'de' => 'zum Park', 'ja' => '公園へ', 'ko' => '공원으로', 'tr' => 'parka', 'ru' => 'в парк', 'ar' => 'إلى الحديقة'],
        'kinoteatra' => ['en' => 'to the cinema', 'fr' => 'au cinéma', 'es' => 'al cine', 'de' => 'ins Kino', 'ja' => '映画館へ', 'ko' => '영화관으로', 'tr' => 'sinemaya', 'ru' => 'в кино', 'ar' => 'إلى السينما'],
        'mağazaya' => ['en' => 'to the shop', 'fr' => 'au magasin', 'es' => 'a la tienda', 'de' => 'zum Geschäft', 'ja' => '店へ', 'ko' => '가게로', 'tr' => 'dükkana', 'ru' => 'в магазин', 'ar' => 'إلى المتجر'],
        'evə' => ['en' => 'to the house', 'fr' => 'à la maison', 'es' => 'a la casa', 'de' => 'nach Hause', 'ja' => '家へ', 'ko' => '집으로', 'tr' => 'eve', 'ru' => 'в дом', 'ar' => 'إلى البيت'],
        'supermarketə' => ['en' => 'to the supermarket', 'fr' => 'au supermarché', 'es' => 'al supermercado', 'de' => 'zum Supermarkt', 'ja' => 'スーパーへ', 'ko' => '슈퍼마켓으로', 'tr' => 'markete', 'ru' => 'в супермаркет', 'ar' => 'إلى السوبرماركت'],
        'menyuda' => ['en' => 'on the menu', 'fr' => 'au menu', 'es' => 'en el menú', 'de' => 'auf der Speisekarte', 'ja' => 'メニューに', 'ko' => '메뉴에', 'tr' => 'menüde', 'ru' => 'в меню', 'ar' => 'في قائمة الطعام'],
        'məndə var' => ['en' => 'I have', 'fr' => "j'ai", 'es' => 'tengo', 'de' => 'ich habe', 'ja' => 'あります', 'ko' => '있어요', 'tr' => 'var', 'ru' => 'у меня', 'ar' => 'عندي'],
        'məndə yoxdur' => ['en' => 'I do not have', 'fr' => "je n'ai pas", 'es' => 'no tengo', 'de' => 'ich habe nicht', 'ja' => 'ありません', 'ko' => '없어요', 'tr' => 'yok', 'ru' => 'у меня нету', 'ar' => 'ليس عندي'],
        'daha böyük' => ['en' => 'bigger', 'fr' => 'plus grand', 'es' => 'más grande', 'de' => 'größer', 'ja' => 'もっと大きい', 'ko' => '더 큰', 'tr' => 'daha büyük', 'ru' => 'больше', 'ar' => 'أكبر'],
        'ən böyük' => ['en' => 'the biggest', 'fr' => 'le plus grand', 'es' => 'el más grande', 'de' => 'am größten', 'ja' => '最も大きい', 'ko' => '가장 큰', 'tr' => 'en büyük', 'ru' => 'самый большой', 'ar' => 'الأكبر'],
        'ən kiçik' => ['en' => 'the smallest', 'fr' => 'le plus petit', 'es' => 'el más pequeño', 'de' => 'am kleinsten', 'ja' => '最も小さい', 'ko' => '가장 작은', 'tr' => 'en küçük', 'ru' => 'самый маленький', 'ar' => 'الأصغر'],
        'ən ucuz' => ['en' => 'the cheapest', 'fr' => 'le moins cher', 'es' => 'el más barato', 'de' => 'am billigsten', 'ja' => '最も安い', 'ko' => '가장 싼', 'tr' => 'en ucuz', 'ru' => 'самый дешёвый', 'ar' => 'الأرخص'],
        'on yaşındayam' => ['en' => 'I am ten years old', 'fr' => "j'ai dix ans", 'es' => 'tengo diez años', 'de' => 'ich bin zehn Jahre alt', 'ja' => '私は十歳です', 'ko' => '저는 열 살이에요', 'tr' => 'on yaşındayım', 'ru' => 'мне десять лет', 'ar' => 'عمري عشر سنوات'],
        'yaşayıram' => ['en' => 'I live', 'fr' => "j'habite", 'es' => 'vivo', 'de' => 'ich wohne', 'ja' => '住みます', 'ko' => '살아요', 'tr' => 'yaşıyorum', 'ru' => 'я живу', 'ar' => 'أسكن'],
        'sudan' => ['en' => 'than the water', 'fr' => "que l'eau", 'es' => 'que el agua', 'de' => 'als das Wasser', 'ja' => '水より', 'ko' => '물보다', 'tr' => 'sudan', 'ru' => 'чем воды', 'ar' => 'من الماء'],

    ];

    /** A word's meaning in every language, as an i18n map ready to store. */
    public static function hint(string $azerbaijani): array
    {
        return ['i18n' => self::meanings($azerbaijani)];
    }

    /** A word's meanings, keyed by language code. */
    public static function meanings(string $azerbaijani): array
    {
        return self::WORDS[self::key($azerbaijani)] ?? ['en' => $azerbaijani];
    }

    /** @return array<int, string> */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $azerbaijani): bool
    {
        return isset(self::WORDS[self::key($azerbaijani)]);
    }

    /**
     * Azerbaijani-aware lowercasing for dictionary lookups.
     *
     * Seeders write their word entries title-cased (`Qəhvə`) while the
     * dictionary is keyed lowercase, so this has to fold case or every lookup
     * from a picture step would miss.
     *
     * The dotted/dotless i needs handling for the same reason it does in
     * Turkish: PHP's mb_strtolower('I') gives 'i', but Azerbaijani 'I'
     * lowercases to 'ı' and 'İ' lowercases to 'i'. Getting this wrong silently
     * misses every word containing a capital I — `İnək` would look up as
     * `inək` in one place and `ınək` in another.
     */
    public static function key(string $azerbaijani): string
    {
        $trimmed = trim($azerbaijani);
        $mapped = str_replace(['I', 'İ'], ['ı', 'i'], $trimmed);

        return mb_strtolower($mapped, 'UTF-8');
    }
}
