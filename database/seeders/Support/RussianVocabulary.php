<?php

namespace Database\Seeders\Support;

/**
 * Russian word => its meaning in every native language the app supports.
 *
 * Exercise hints, prompts and word-bank tiles must appear in the LEARNER'S
 * native language, so nothing user-facing may be hardcoded to English. Seeders
 * pull from here and store the result as an ['i18n' => [...]] map, which
 * ExerciseContentService resolves per request.
 *
 * RUSSIAN IS INFLECTED, WHICH CHANGES WHAT BELONGS IN HERE.
 *
 * Six cases, and the ending carries meaning English puts in a separate word:
 * `дом` is "house", `доме` is the form that follows `в` to mean "in the house".
 * The tap-word and translate exercises hand the learner one tile per array
 * entry, so every form a phrase uses has to exist here in its own right, or the
 * learner is taught to assemble something that is not Russian.
 *
 * Unlike Turkish, Russian writes its prepositions separately, so `в` is its own
 * tile rather than a suffix. Both `в` and `доме` are listed; a bare case ENDING
 * never is, because an ending is not a tile anyone should be asked to place.
 *
 * Russian also has no articles. "A coffee" and "the coffee" are both `кофе`,
 * which is why the English meanings here rarely carry one.
 *
 * Add a word here once and every unit can use it.
 */
class RussianVocabulary
{
    private const WORDS = [
        // --- Unit 1: at the cafe ---------------------------------------
        'кофе' => ['en' => 'coffee', 'fr' => 'café', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'tr' => 'kahve', 'ar' => 'قهوة', 'az' => 'qəhvə'],
        'чай' => ['en' => 'tea', 'fr' => 'thé', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'tr' => 'çay', 'ar' => 'شاي', 'az' => 'çay'],
        'вода' => ['en' => 'water', 'fr' => 'eau', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'tr' => 'su', 'ar' => 'ماء', 'az' => 'su'],
        'молоко' => ['en' => 'milk', 'fr' => 'lait', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'tr' => 'süt', 'ar' => 'حليب', 'az' => 'süd'],
        'хлеб' => ['en' => 'bread', 'fr' => 'pain', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'tr' => 'ekmek', 'ar' => 'خبز', 'az' => 'çörək'],
        'сахар' => ['en' => 'sugar', 'fr' => 'sucre', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'tr' => 'şeker', 'ar' => 'سكر', 'az' => 'şəkər'],
        'сыр' => ['en' => 'cheese', 'fr' => 'fromage', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'tr' => 'peynir', 'ar' => 'جبن', 'az' => 'pendir'],
        'торт' => ['en' => 'cake', 'fr' => 'gâteau', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'tr' => 'pasta', 'ar' => 'كعكة', 'az' => 'tort'],
        // --- Unit 1: the glue words ------------------------------------
        'и' => ['en' => 'and', 'fr' => 'et', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'tr' => 've', 'ar' => 'و', 'az' => 'və'],
        'пожалуйста' => ['en' => 'please', 'fr' => "s'il vous plaît", 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'tr' => 'lütfen', 'ar' => 'من فضلك', 'az' => 'zəhmət olmasa'],
        'привет' => ['en' => 'hello', 'fr' => 'bonjour', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'tr' => 'merhaba', 'ar' => 'مرحبا', 'az' => 'salam'],
        // --- Unit 2: greetings and courtesy ----------------------------
        'спасибо' => ['en' => 'thank you', 'fr' => 'merci', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'tr' => 'teşekkürler', 'ar' => 'شكرا', 'az' => 'təşəkkür'],
        'да' => ['en' => 'yes', 'fr' => 'oui', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'tr' => 'evet', 'ar' => 'نعم', 'az' => 'bəli'],
        'нет' => ['en' => 'no', 'fr' => 'non', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'tr' => 'hayır', 'ar' => 'لا', 'az' => 'xeyr'],
        'до свидания' => ['en' => 'goodbye', 'fr' => 'au revoir', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'tr' => 'hoşça kal', 'ar' => 'مع السلامة', 'az' => 'sağ ol'],
        'доброе утро' => ['en' => 'good morning', 'fr' => 'bonjour', 'es' => 'buenos días', 'de' => 'guten Morgen', 'ja' => 'おはよう', 'ko' => '좋은 아침', 'tr' => 'günaydın', 'ar' => 'صباح الخير', 'az' => 'sabahınız xeyir'],
        'извините' => ['en' => 'excuse me', 'fr' => 'excusez-moi', 'es' => 'perdón', 'de' => 'Entschuldigung', 'ja' => 'すみません', 'ko' => '실례합니다', 'tr' => 'affedersiniz', 'ar' => 'عفوا', 'az' => 'bağışlayın'],
        'хочу' => ['en' => 'I would like', 'fr' => 'je voudrais', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'tr' => 'istiyorum', 'ar' => 'أريد', 'az' => 'istəyirəm'],
        'счёт' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'tr' => 'hesap', 'ar' => 'الحساب', 'az' => 'hesab'],
        'добро пожаловать' => ['en' => 'welcome', 'fr' => 'bienvenue', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'tr' => 'hoş geldiniz', 'ar' => 'أهلا وسهلا', 'az' => 'xoş gəlmisiniz'],
        'приятно познакомиться' => ['en' => 'nice to meet you', 'fr' => 'enchanté', 'es' => 'mucho gusto', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '만나서 반갑습니다', 'tr' => 'memnun oldum', 'ar' => 'تشرفنا', 'az' => 'tanış olmağa şadam'],
        'как дела' => ['en' => 'how are you', 'fr' => 'comment ça va', 'es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => 'お元気ですか', 'ko' => '잘 지내세요', 'tr' => 'nasılsın', 'ar' => 'كيف حالك', 'az' => 'necəsən'],
        // --- Unit 2: people and home -----------------------------------
        'книга' => ['en' => 'book', 'fr' => 'livre', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'tr' => 'kitap', 'ar' => 'كتاب', 'az' => 'kitab'],
        'книги' => ['en' => 'books', 'fr' => 'livres', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'tr' => 'kitaplar', 'ar' => 'كتب', 'az' => 'kitablar'],
        'дом' => ['en' => 'house', 'fr' => 'maison', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'ev', 'ar' => 'بيت', 'az' => 'ev'],
        'доме' => ['en' => 'the house', 'fr' => 'la maison', 'es' => 'la casa', 'de' => 'dem Haus', 'ja' => '家', 'ko' => '집', 'tr' => 'evde', 'ar' => 'البيت', 'az' => 'evdə'],
        'кот' => ['en' => 'cat', 'fr' => 'chat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kedi', 'ar' => 'قط', 'az' => 'pişik'],
        'собака' => ['en' => 'dog', 'fr' => 'chien', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpek', 'ar' => 'كلب', 'az' => 'it'],
        'стол' => ['en' => 'table', 'fr' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '테이블', 'tr' => 'masa', 'ar' => 'طاولة', 'az' => 'masa'],
        'стул' => ['en' => 'chair', 'fr' => 'chaise', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'tr' => 'sandalye', 'ar' => 'كرسي', 'az' => 'stul'],
        'друг' => ['en' => 'friend', 'fr' => 'ami', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'tr' => 'arkadaş', 'ar' => 'صديق', 'az' => 'dost'],
        'другом' => ['en' => 'with my friend', 'fr' => 'avec mon ami', 'es' => 'con mi amigo', 'de' => 'mit meinem Freund', 'ja' => '友達と', 'ko' => '친구와', 'tr' => 'arkadaşımla', 'ar' => 'مع صديقي', 'az' => 'dostumla'],
        'мама' => ['en' => 'mother', 'fr' => 'mère', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'tr' => 'anne', 'ar' => 'أم', 'az' => 'ana'],
        'папа' => ['en' => 'father', 'fr' => 'père', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'tr' => 'baba', 'ar' => 'أب', 'az' => 'ata'],
        'сестра' => ['en' => 'sister', 'fr' => 'soeur', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매', 'tr' => 'kız kardeş', 'ar' => 'أخت', 'az' => 'bacı'],
        'брат' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'tr' => 'erkek kardeş', 'ar' => 'أخ', 'az' => 'qardaş'],
        'школа' => ['en' => 'school', 'fr' => 'école', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'tr' => 'okul', 'ar' => 'مدرسة', 'az' => 'məktəb'],
        'школе' => ['en' => 'at school', 'fr' => "à l'école", 'es' => 'en la escuela', 'de' => 'in der Schule', 'ja' => '学校で', 'ko' => '학교에서', 'tr' => 'okulda', 'ar' => 'في المدرسة', 'az' => 'məktəbdə'],
        'школу' => ['en' => 'to school', 'fr' => "à l'école", 'es' => 'a la escuela', 'de' => 'zur Schule', 'ja' => '学校へ', 'ko' => '학교로', 'tr' => 'okula', 'ar' => 'إلى المدرسة', 'az' => 'məktəbə'],
        'учитель' => ['en' => 'teacher', 'fr' => 'professeur', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'tr' => 'öğretmen', 'ar' => 'معلم', 'az' => 'müəllim'],
        'врач' => ['en' => 'doctor', 'fr' => 'médecin', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'tr' => 'doktor', 'ar' => 'طبيب', 'az' => 'həkim'],
        'человек' => ['en' => 'person', 'fr' => 'personne', 'es' => 'persona', 'de' => 'Person', 'ja' => '人', 'ko' => '사람', 'tr' => 'kişi', 'ar' => 'شخص', 'az' => 'adam'],
        'сосед' => ['en' => 'neighbour', 'fr' => 'voisin', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'tr' => 'komşu', 'ar' => 'جار', 'az' => 'qonşu'],
        'официант' => ['en' => 'waiter', 'fr' => 'serveur', 'es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'tr' => 'garson', 'ar' => 'نادل', 'az' => 'ofisiant'],
        // --- Unit 3: pronouns and possessives --------------------------
        'я' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '저', 'tr' => 'ben', 'ar' => 'أنا', 'az' => 'mən'],
        'ты' => ['en' => 'you', 'fr' => 'tu', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '당신', 'tr' => 'sen', 'ar' => 'أنت', 'az' => 'sən'],
        'это' => ['en' => 'this', 'fr' => 'ce', 'es' => 'esto', 'de' => 'das', 'ja' => 'これ', 'ko' => '이것', 'tr' => 'bu', 'ar' => 'هذا', 'az' => 'bu'],
        'оно' => ['en' => 'it', 'fr' => 'il', 'es' => 'ello', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것', 'tr' => 'o', 'ar' => 'هو', 'az' => 'o'],
        'мой' => ['en' => 'my', 'fr' => 'mon', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '제', 'tr' => 'benim', 'ar' => 'خاصتي', 'az' => 'mənim'],
        'моя' => ['en' => 'my', 'fr' => 'ma', 'es' => 'mi', 'de' => 'meine', 'ja' => '私の', 'ko' => '제', 'tr' => 'benim', 'ar' => 'خاصتي', 'az' => 'mənim'],
        'твой' => ['en' => 'your', 'fr' => 'ton', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의', 'tr' => 'senin', 'ar' => 'خاصتك', 'az' => 'sənin'],
        'моя книга' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '제 책', 'tr' => 'kitabım', 'ar' => 'كتابي', 'az' => 'kitabım'],
        'мой дом' => ['en' => 'my house', 'fr' => 'ma maison', 'es' => 'mi casa', 'de' => 'mein Haus', 'ja' => '私の家', 'ko' => '제 집', 'tr' => 'evim', 'ar' => 'بيتي', 'az' => 'evim'],
        'моя мама' => ['en' => 'my mother', 'fr' => 'ma mère', 'es' => 'mi madre', 'de' => 'meine Mutter', 'ja' => '私の母', 'ko' => '제 어머니', 'tr' => 'annem', 'ar' => 'أمي', 'az' => 'anam'],
        'мой папа' => ['en' => 'my father', 'fr' => 'mon père', 'es' => 'mi padre', 'de' => 'mein Vater', 'ja' => '私の父', 'ko' => '제 아버지', 'tr' => 'babam', 'ar' => 'أبي', 'az' => 'atam'],
        'моя сестра' => ['en' => 'my sister', 'fr' => 'ma soeur', 'es' => 'mi hermana', 'de' => 'meine Schwester', 'ja' => '私の姉妹', 'ko' => '제 자매', 'tr' => 'kız kardeşim', 'ar' => 'أختي', 'az' => 'bacım'],
        'мой друг' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'mi amigo', 'de' => 'mein Freund', 'ja' => '私の友達', 'ko' => '제 친구', 'tr' => 'arkadaşım', 'ar' => 'صديقي', 'az' => 'dostum'],
        'моя школа' => ['en' => 'my school', 'fr' => 'mon école', 'es' => 'mi escuela', 'de' => 'meine Schule', 'ja' => '私の学校', 'ko' => '제 학교', 'tr' => 'okulum', 'ar' => 'مدرستي', 'az' => 'məktəbim'],
        'моё имя' => ['en' => 'my name', 'fr' => 'mon nom', 'es' => 'mi nombre', 'de' => 'mein Name', 'ja' => '私の名前', 'ko' => '제 이름', 'tr' => 'adım', 'ar' => 'اسمي', 'az' => 'adım'],
        'твоё имя' => ['en' => 'your name', 'fr' => 'ton nom', 'es' => 'tu nombre', 'de' => 'dein Name', 'ja' => 'あなたの名前', 'ko' => '당신의 이름', 'tr' => 'adın', 'ar' => 'اسمك', 'az' => 'adın'],
        // --- Unit 4: colours -------------------------------------------
        'красный' => ['en' => 'red', 'fr' => 'rouge', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤い', 'ko' => '빨간', 'tr' => 'kırmızı', 'ar' => 'أحمر', 'az' => 'qırmızı'],
        'синий' => ['en' => 'blue', 'fr' => 'bleu', 'es' => 'azul', 'de' => 'blau', 'ja' => '青い', 'ko' => '파란', 'tr' => 'mavi', 'ar' => 'أزرق', 'az' => 'mavi'],
        'зелёный' => ['en' => 'green', 'fr' => 'vert', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑の', 'ko' => '초록', 'tr' => 'yeşil', 'ar' => 'أخضر', 'az' => 'yaşıl'],
        'жёлтый' => ['en' => 'yellow', 'fr' => 'jaune', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色い', 'ko' => '노란', 'tr' => 'sarı', 'ar' => 'أصفر', 'az' => 'sarı'],
        'чёрный' => ['en' => 'black', 'fr' => 'noir', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒い', 'ko' => '검은', 'tr' => 'siyah', 'ar' => 'أسود', 'az' => 'qara'],
        'белый' => ['en' => 'white', 'fr' => 'blanc', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白い', 'ko' => '하얀', 'tr' => 'beyaz', 'ar' => 'أبيض', 'az' => 'ağ'],
        // --- Unit 4: numbers -------------------------------------------
        'два' => ['en' => 'two', 'fr' => 'deux', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'tr' => 'iki', 'ar' => 'اثنان', 'az' => 'iki'],
        'три' => ['en' => 'three', 'fr' => 'trois', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'tr' => 'üç', 'ar' => 'ثلاثة', 'az' => 'üç'],
        'четыре' => ['en' => 'four', 'fr' => 'quatre', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'tr' => 'dört', 'ar' => 'أربعة', 'az' => 'dörd'],
        'пять' => ['en' => 'five', 'fr' => 'cinq', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'tr' => 'beş', 'ar' => 'خمسة', 'az' => 'beş'],
        'десять' => ['en' => 'ten', 'fr' => 'dix', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'tr' => 'on', 'ar' => 'عشرة', 'az' => 'on'],
        'двадцать' => ['en' => 'twenty', 'fr' => 'vingt', 'es' => 'veinte', 'de' => 'zwanzig', 'ja' => '二十', 'ko' => '스물', 'tr' => 'yirmi', 'ar' => 'عشرون', 'az' => 'iyirmi'],
        'номер' => ['en' => 'number', 'fr' => 'numéro', 'es' => 'número', 'de' => 'Nummer', 'ja' => '番号', 'ko' => '번호', 'tr' => 'numara', 'ar' => 'رقم', 'az' => 'nömrə'],
        'сколько' => ['en' => 'how many', 'fr' => 'combien', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇', 'tr' => 'kaç', 'ar' => 'كم', 'az' => 'neçə'],
        // --- Unit 5: describing things ---------------------------------
        'большой' => ['en' => 'big', 'fr' => 'grand', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'tr' => 'büyük', 'ar' => 'كبير', 'az' => 'böyük'],
        'маленький' => ['en' => 'small', 'fr' => 'petit', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'tr' => 'küçük', 'ar' => 'صغير', 'az' => 'kiçik'],
        'новый' => ['en' => 'new', 'fr' => 'nouveau', 'es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새', 'tr' => 'yeni', 'ar' => 'جديد', 'az' => 'yeni'],
        'старый' => ['en' => 'old', 'fr' => 'vieux', 'es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'tr' => 'eski', 'ar' => 'قديم', 'az' => 'köhnə'],
        'хороший' => ['en' => 'good', 'fr' => 'bon', 'es' => 'bueno', 'de' => 'gut', 'ja' => 'いい', 'ko' => '좋은', 'tr' => 'iyi', 'ar' => 'جيد', 'az' => 'yaxşı'],
        'плохой' => ['en' => 'bad', 'fr' => 'mauvais', 'es' => 'malo', 'de' => 'schlecht', 'ja' => '悪い', 'ko' => '나쁜', 'tr' => 'kötü', 'ar' => 'سيء', 'az' => 'pis'],
        'дорогой' => ['en' => 'expensive', 'fr' => 'cher', 'es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'tr' => 'pahalı', 'ar' => 'غالي', 'az' => 'bahalı'],
        'дешёвый' => ['en' => 'cheap', 'fr' => 'bon marché', 'es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'tr' => 'ucuz', 'ar' => 'رخيص', 'az' => 'ucuz'],
        'чистый' => ['en' => 'clean', 'fr' => 'propre', 'es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれいな', 'ko' => '깨끗한', 'tr' => 'temiz', 'ar' => 'نظيف', 'az' => 'təmiz'],
        'свежий' => ['en' => 'fresh', 'fr' => 'frais', 'es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮な', 'ko' => '신선한', 'tr' => 'taze', 'ar' => 'طازج', 'az' => 'təzə'],
        'горячий' => ['en' => 'hot', 'fr' => 'chaud', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운', 'tr' => 'sıcak', 'ar' => 'ساخن', 'az' => 'isti'],
        'холодный' => ['en' => 'cold', 'fr' => 'froid', 'es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운', 'tr' => 'soğuk', 'ar' => 'بارد', 'az' => 'soyuq'],
        'вкусный' => ['en' => 'delicious', 'fr' => 'délicieux', 'es' => 'delicioso', 'de' => 'lecker', 'ja' => 'おいしい', 'ko' => '맛있는', 'tr' => 'lezzetli', 'ar' => 'لذيذ', 'az' => 'dadlı'],
        'очень вкусный' => ['en' => 'very delicious', 'fr' => 'très délicieux', 'es' => 'muy delicioso', 'de' => 'sehr lecker', 'ja' => 'とてもおいしい', 'ko' => '아주 맛있는', 'tr' => 'çok lezzetli', 'ar' => 'لذيذ جدا', 'az' => 'çox dadlı'],
        'солёный' => ['en' => 'salty', 'fr' => 'salé', 'es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠', 'tr' => 'tuzlu', 'ar' => 'مالح', 'az' => 'duzlu'],
        'занят' => ['en' => 'busy', 'fr' => 'occupé', 'es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'tr' => 'meşgul', 'ar' => 'مشغول', 'az' => 'məşğul'],
        'спокойный' => ['en' => 'calm', 'fr' => 'calme', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '静かな', 'ko' => '조용한', 'tr' => 'sakin', 'ar' => 'هادئ', 'az' => 'sakit'],
        'готов' => ['en' => 'ready', 'fr' => 'prêt', 'es' => 'listo', 'de' => 'fertig', 'ja' => '準備できた', 'ko' => '준비된', 'tr' => 'hazır', 'ar' => 'جاهز', 'az' => 'hazır'],
        'правильно' => ['en' => 'true', 'fr' => 'vrai', 'es' => 'verdadero', 'de' => 'richtig', 'ja' => '正しい', 'ko' => '맞아요', 'tr' => 'doğru', 'ar' => 'صحيح', 'az' => 'düzgün'],
        'неправильно' => ['en' => 'wrong', 'fr' => 'faux', 'es' => 'incorrecto', 'de' => 'falsch', 'ja' => '間違い', 'ko' => '틀려요', 'tr' => 'yanlış', 'ar' => 'خطأ', 'az' => 'səhv'],
        'быстро' => ['en' => 'fast', 'fr' => 'vite', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速く', 'ko' => '빨리', 'tr' => 'hızlı', 'ar' => 'بسرعة', 'az' => 'sürətli'],
        'медленно' => ['en' => 'slowly', 'fr' => 'lentement', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'tr' => 'yavaşça', 'ar' => 'ببطء', 'az' => 'yavaş'],
        // --- Unit 6: time ----------------------------------------------
        'день' => ['en' => 'day', 'fr' => 'jour', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'tr' => 'gün', 'ar' => 'يوم', 'az' => 'gün'],
        'утро' => ['en' => 'morning', 'fr' => 'matin', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'tr' => 'sabah', 'ar' => 'صباح', 'az' => 'səhər'],
        'вечер' => ['en' => 'evening', 'fr' => 'soir', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'tr' => 'akşam', 'ar' => 'مساء', 'az' => 'axşam'],
        'ночь' => ['en' => 'night', 'fr' => 'nuit', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'tr' => 'gece', 'ar' => 'ليل', 'az' => 'gecə'],
        'сегодня' => ['en' => 'today', 'fr' => "aujourd'hui", 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'tr' => 'bugün', 'ar' => 'اليوم', 'az' => 'bu gün'],
        'завтра' => ['en' => 'tomorrow', 'fr' => 'demain', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'tr' => 'yarın', 'ar' => 'غدا', 'az' => 'sabah'],
        'вчера' => ['en' => 'yesterday', 'fr' => 'hier', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'tr' => 'dün', 'ar' => 'أمس', 'az' => 'dünən'],
        'сейчас' => ['en' => 'now', 'fr' => 'maintenant', 'es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'tr' => 'şimdi', 'ar' => 'الآن', 'az' => 'indi'],
        'неделя' => ['en' => 'week', 'fr' => 'semaine', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'tr' => 'hafta', 'ar' => 'أسبوع', 'az' => 'həftə'],
        'на следующей неделе' => ['en' => 'next week', 'fr' => 'la semaine prochaine', 'es' => 'la próxima semana', 'de' => 'nächste Woche', 'ja' => '来週', 'ko' => '다음 주', 'tr' => 'gelecek hafta', 'ar' => 'الأسبوع القادم', 'az' => 'gələn həftə'],
        'время' => ['en' => 'time', 'fr' => 'temps', 'es' => 'tiempo', 'de' => 'Zeit', 'ja' => '時間', 'ko' => '시간', 'tr' => 'zaman', 'ar' => 'وقت', 'az' => 'vaxt'],
        'моё время' => ['en' => 'my time', 'fr' => 'mon temps', 'es' => 'mi tiempo', 'de' => 'meine Zeit', 'ja' => '私の時間', 'ko' => '제 시간', 'tr' => 'zamanım', 'ar' => 'وقتي', 'az' => 'vaxtım'],
        'уже' => ['en' => 'already', 'fr' => 'déjà', 'es' => 'ya', 'de' => 'schon', 'ja' => 'もう', 'ko' => '이미', 'tr' => 'zaten', 'ar' => 'بالفعل', 'az' => 'artıq'],
        'потом' => ['en' => 'then', 'fr' => 'ensuite', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그다음', 'tr' => 'sonra', 'ar' => 'ثم', 'az' => 'sonra'],
        'каждый' => ['en' => 'every', 'fr' => 'chaque', 'es' => 'cada', 'de' => 'jeder', 'ja' => '毎', 'ko' => '매', 'tr' => 'her', 'ar' => 'كل', 'az' => 'hər'],
        'вместе' => ['en' => 'together', 'fr' => 'ensemble', 'es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '같이', 'tr' => 'birlikte', 'ar' => 'معا', 'az' => 'birlikdə'],
        'тоже' => ['en' => 'too', 'fr' => 'aussi', 'es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한', 'tr' => 'de', 'ar' => 'أيضا', 'az' => 'də'],
        'возраст' => ['en' => 'age', 'fr' => 'âge', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'tr' => 'yaş', 'ar' => 'عمر', 'az' => 'yaş'],
        'мой возраст' => ['en' => 'my age', 'fr' => 'mon âge', 'es' => 'mi edad', 'de' => 'mein Alter', 'ja' => '私の年齢', 'ko' => '제 나이', 'tr' => 'yaşım', 'ar' => 'عمري', 'az' => 'yaşım'],
        'мне лет' => ['en' => 'I am years old', 'fr' => "j'ai ans", 'es' => 'tengo años', 'de' => 'ich bin Jahre alt', 'ja' => '私は歳です', 'ko' => '저는 살이에요', 'tr' => 'yaşındayım', 'ar' => 'عمري سنة', 'az' => 'yaşındayam'],
        // --- Unit 7: weather and seasons -------------------------------
        'солнце' => ['en' => 'sun', 'fr' => 'soleil', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '해', 'tr' => 'güneş', 'ar' => 'شمس', 'az' => 'günəş'],
        'дождь' => ['en' => 'rain', 'fr' => 'pluie', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'tr' => 'yağmur', 'ar' => 'مطر', 'az' => 'yağış'],
        'снег' => ['en' => 'snow', 'fr' => 'neige', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'tr' => 'kar', 'ar' => 'ثلج', 'az' => 'qar'],
        'ветер' => ['en' => 'wind', 'fr' => 'vent', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'tr' => 'rüzgar', 'ar' => 'ريح', 'az' => 'külək'],
        'весна' => ['en' => 'spring', 'fr' => 'printemps', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'tr' => 'ilkbahar', 'ar' => 'ربيع', 'az' => 'yaz'],
        'лето' => ['en' => 'summer', 'fr' => 'été', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'tr' => 'yaz', 'ar' => 'صيف', 'az' => 'yay'],
        'осень' => ['en' => 'autumn', 'fr' => 'automne', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'tr' => 'sonbahar', 'ar' => 'خريف', 'az' => 'payız'],
        'зима' => ['en' => 'winter', 'fr' => 'hiver', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'tr' => 'kış', 'ar' => 'شتاء', 'az' => 'qış'],
        // --- Unit 8: the city ------------------------------------------
        'город' => ['en' => 'city', 'fr' => 'ville', 'es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'tr' => 'şehir', 'ar' => 'مدينة', 'az' => 'şəhər'],
        'парк' => ['en' => 'park', 'fr' => 'parc', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'park', 'ar' => 'حديقة', 'az' => 'park'],
        'парке' => ['en' => 'the park', 'fr' => 'le parc', 'es' => 'el parque', 'de' => 'dem Park', 'ja' => '公園', 'ko' => '공원', 'tr' => 'parkta', 'ar' => 'الحديقة', 'az' => 'parkda'],
        'магазин' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'tr' => 'dükkan', 'ar' => 'متجر', 'az' => 'mağaza'],
        'кино' => ['en' => 'cinema', 'fr' => 'cinéma', 'es' => 'cine', 'de' => 'Kino', 'ja' => '映画館', 'ko' => '영화관', 'tr' => 'sinema', 'ar' => 'سينما', 'az' => 'kinoteatr'],
        'станция' => ['en' => 'station', 'fr' => 'gare', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'tr' => 'istasyon', 'ar' => 'محطة', 'az' => 'stansiya'],
        'улица' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'tr' => 'sokak', 'ar' => 'شارع', 'az' => 'küçə'],
        'угол' => ['en' => 'corner', 'fr' => 'coin', 'es' => 'esquina', 'de' => 'Ecke', 'ja' => '角', 'ko' => '모퉁이', 'tr' => 'köşe', 'ar' => 'زاوية', 'az' => 'künc'],
        'углу' => ['en' => 'at the corner', 'fr' => 'au coin', 'es' => 'en la esquina', 'de' => 'an der Ecke', 'ja' => '角で', 'ko' => '모퉁이에서', 'tr' => 'köşede', 'ar' => 'في الزاوية', 'az' => 'küncdə'],
        'машина' => ['en' => 'car', 'fr' => 'voiture', 'es' => 'coche', 'de' => 'Auto', 'ja' => '車', 'ko' => '자동차', 'tr' => 'araba', 'ar' => 'سيارة', 'az' => 'maşın'],
        'телефон' => ['en' => 'telephone', 'fr' => 'téléphone', 'es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'tr' => 'telefon', 'ar' => 'هاتف', 'az' => 'telefon'],
        'фильм' => ['en' => 'film', 'fr' => 'film', 'es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'tr' => 'film', 'ar' => 'فيلم', 'az' => 'film'],
        'ручка' => ['en' => 'pen', 'fr' => 'stylo', 'es' => 'bolígrafo', 'de' => 'Stift', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalem', 'ar' => 'قلم', 'az' => 'qələm'],
        // --- Unit 9: directions ----------------------------------------
        'налево' => ['en' => 'to the left', 'fr' => 'à gauche', 'es' => 'a la izquierda', 'de' => 'nach links', 'ja' => '左へ', 'ko' => '왼쪽으로', 'tr' => 'sola', 'ar' => 'يسارا', 'az' => 'sola'],
        'направо' => ['en' => 'to the right', 'fr' => 'à droite', 'es' => 'a la derecha', 'de' => 'nach rechts', 'ja' => '右へ', 'ko' => '오른쪽으로', 'tr' => 'sağa', 'ar' => 'يمينا', 'az' => 'sağa'],
        'слева' => ['en' => 'on the left', 'fr' => 'sur la gauche', 'es' => 'a la izquierda', 'de' => 'links', 'ja' => '左に', 'ko' => '왼쪽에', 'tr' => 'solda', 'ar' => 'على اليسار', 'az' => 'solda'],
        'справа' => ['en' => 'on the right', 'fr' => 'sur la droite', 'es' => 'a la derecha', 'de' => 'rechts', 'ja' => '右に', 'ko' => '오른쪽에', 'tr' => 'sağda', 'ar' => 'على اليمين', 'az' => 'sağda'],
        'левый' => ['en' => 'left', 'fr' => 'gauche', 'es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'tr' => 'sol', 'ar' => 'يسار', 'az' => 'sol'],
        'правый' => ['en' => 'right', 'fr' => 'droite', 'es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'tr' => 'sağ', 'ar' => 'يمين', 'az' => 'sağ'],
        'прямо' => ['en' => 'straight', 'fr' => 'tout droit', 'es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '직진', 'tr' => 'düz', 'ar' => 'مباشرة', 'az' => 'düz'],
        'поворот' => ['en' => 'turn', 'fr' => 'tournant', 'es' => 'giro', 'de' => 'Abbiegung', 'ja' => '曲がり角', 'ko' => '회전', 'tr' => 'dönüş', 'ar' => 'منعطف', 'az' => 'dönüş'],
        'где' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'tr' => 'nerede', 'ar' => 'أين', 'az' => 'harada'],
        'здесь' => ['en' => 'here', 'fr' => 'ici', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기', 'tr' => 'burada', 'ar' => 'هنا', 'az' => 'burada'],
        'там' => ['en' => 'there', 'fr' => 'là', 'es' => 'allí', 'de' => 'dort', 'ja' => 'そこ', 'ko' => '거기', 'tr' => 'orada', 'ar' => 'هناك', 'az' => 'orada'],
        'далеко' => ['en' => 'far', 'fr' => 'loin', 'es' => 'lejos', 'de' => 'weit', 'ja' => '遠い', 'ko' => '멀어요', 'tr' => 'uzak', 'ar' => 'بعيد', 'az' => 'uzaq'],
        'близко' => ['en' => 'near', 'fr' => 'près', 'es' => 'cerca', 'de' => 'nah', 'ja' => '近い', 'ko' => '가까워요', 'tr' => 'yakın', 'ar' => 'قريب', 'az' => 'yaxın'],
        // --- Unit 10: question words -----------------------------------
        'что' => ['en' => 'what', 'fr' => 'quoi', 'es' => 'qué', 'de' => 'was', 'ja' => '何', 'ko' => '무엇', 'tr' => 'ne', 'ar' => 'ماذا', 'az' => 'nə'],
        'кто' => ['en' => 'who', 'fr' => 'qui', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'tr' => 'kim', 'ar' => 'مَن', 'az' => 'kim'],
        'когда' => ['en' => 'when', 'fr' => 'quand', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'tr' => 'ne zaman', 'ar' => 'متى', 'az' => 'nə vaxt'],
        'почему' => ['en' => 'why', 'fr' => 'pourquoi', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'tr' => 'neden', 'ar' => 'لماذا', 'az' => 'niyə'],
        'как' => ['en' => 'how', 'fr' => 'comment', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게', 'tr' => 'nasıl', 'ar' => 'كيف', 'az' => 'necə'],
        // --- Conversation: verbs in the first person -------------------
        'иду' => ['en' => 'I am going', 'fr' => 'je vais', 'es' => 'voy', 'de' => 'ich gehe', 'ja' => '行きます', 'ko' => '가요', 'tr' => 'gidiyorum', 'ar' => 'أذهب', 'az' => 'gedirəm'],
        'читаю' => ['en' => 'I read', 'fr' => 'je lis', 'es' => 'leo', 'de' => 'ich lese', 'ja' => '読みます', 'ko' => '읽어요', 'tr' => 'okuyorum', 'ar' => 'أقرأ', 'az' => 'oxuyuram'],
        'сплю' => ['en' => 'I sleep', 'fr' => 'je dors', 'es' => 'duermo', 'de' => 'ich schlafe', 'ja' => '寝ます', 'ko' => '자요', 'tr' => 'uyuyorum', 'ar' => 'أنام', 'az' => 'yatıram'],
        'говорю' => ['en' => 'I speak', 'fr' => 'je parle', 'es' => 'hablo', 'de' => 'ich spreche', 'ja' => '話します', 'ko' => '말해요', 'tr' => 'konuşuyorum', 'ar' => 'أتكلم', 'az' => 'danışıram'],
        'думаю' => ['en' => 'I think', 'fr' => 'je pense', 'es' => 'pienso', 'de' => 'ich denke', 'ja' => '思います', 'ko' => '생각해요', 'tr' => 'düşünüyorum', 'ar' => 'أفكر', 'az' => 'düşünürəm'],
        'гуляю' => ['en' => 'I walk', 'fr' => 'je me promène', 'es' => 'camino', 'de' => 'ich spaziere', 'ja' => '散歩します', 'ko' => '산책해요', 'tr' => 'yürüyorum', 'ar' => 'أتمشى', 'az' => 'gəzirəm'],
        'чувствую' => ['en' => 'I feel', 'fr' => 'je sens', 'es' => 'siento', 'de' => 'ich fühle', 'ja' => '感じます', 'ko' => '느껴요', 'tr' => 'hissediyorum', 'ar' => 'أشعر', 'az' => 'hiss edirəm'],
        'предпочитаю' => ['en' => 'I prefer', 'fr' => 'je préfère', 'es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '好みます', 'ko' => '선호해요', 'tr' => 'tercih ediyorum', 'ar' => 'أفضل', 'az' => 'üstünlük verirəm'],
        'покупаю' => ['en' => 'I am buying', 'fr' => "j'achète", 'es' => 'compro', 'de' => 'ich kaufe', 'ja' => '買います', 'ko' => '삽니다', 'tr' => 'alıyorum', 'ar' => 'أشتري', 'az' => 'alıram'],
        'плачу' => ['en' => 'I am paying', 'fr' => 'je paie', 'es' => 'pago', 'de' => 'ich zahle', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyorum', 'ar' => 'أدفع', 'az' => 'ödəyirəm'],
        'платим' => ['en' => 'we are paying', 'fr' => 'nous payons', 'es' => 'pagamos', 'de' => 'wir zahlen', 'ja' => '払います', 'ko' => '계산해요', 'tr' => 'ödüyoruz', 'ar' => 'ندفع', 'az' => 'ödəyirik'],
        'звоню' => ['en' => 'I am calling', 'fr' => "j'appelle", 'es' => 'llamo', 'de' => 'ich rufe an', 'ja' => '電話します', 'ko' => '전화해요', 'tr' => 'arıyorum', 'ar' => 'أتصل', 'az' => 'zəng edirəm'],
        'ем' => ['en' => 'I eat', 'fr' => 'je mange', 'es' => 'como', 'de' => 'ich esse', 'ja' => '食べます', 'ko' => '먹어요', 'tr' => 'yiyorum', 'ar' => 'آكل', 'az' => 'yeyirəm'],
        'не ем' => ['en' => 'I do not eat', 'fr' => 'je ne mange pas', 'es' => 'no como', 'de' => 'ich esse nicht', 'ja' => '食べません', 'ko' => '먹지 않아요', 'tr' => 'yemiyorum', 'ar' => 'لا آكل', 'az' => 'yemirəm'],
        // --- Conversation: the past ------------------------------------
        'видел' => ['en' => 'I saw', 'fr' => "j'ai vu", 'es' => 'vi', 'de' => 'ich sah', 'ja' => '見ました', 'ko' => '봤어요', 'tr' => 'gördüm', 'ar' => 'رأيت', 'az' => 'gördüm'],
        'ел' => ['en' => 'I ate', 'fr' => "j'ai mangé", 'es' => 'comí', 'de' => 'ich aß', 'ja' => '食べました', 'ko' => '먹었어요', 'tr' => 'yedim', 'ar' => 'أكلت', 'az' => 'yedim'],
        'пил' => ['en' => 'I drank', 'fr' => "j'ai bu", 'es' => 'bebí', 'de' => 'ich trank', 'ja' => '飲みました', 'ko' => '마셨어요', 'tr' => 'içtim', 'ar' => 'شربت', 'az' => 'içdim'],
        'был здесь' => ['en' => 'I was here', 'fr' => "j'étais ici", 'es' => 'estuve aquí', 'de' => 'ich war hier', 'ja' => 'ここにいました', 'ko' => '여기 있었어요', 'tr' => 'buradaydım', 'ar' => 'كنت هنا', 'az' => 'burada idim'],
        'был в школе' => ['en' => 'I was in the school', 'fr' => "j'étais à l'école", 'es' => 'estuve en la escuela', 'de' => 'ich war in der Schule', 'ja' => '学校にいました', 'ko' => '학교에 있었어요', 'tr' => 'okuldaydım', 'ar' => 'كنت في المدرسة', 'az' => 'məktəbdə idim'],
        'было хорошо' => ['en' => 'it was good', 'fr' => "c'était bien", 'es' => 'estuvo bien', 'de' => 'es war gut', 'ja' => 'よかったです', 'ko' => '좋았어요', 'tr' => 'iyiydi', 'ar' => 'كان جيدا', 'az' => 'yaxşı idi'],
        'видела' => ['en' => 'saw', 'fr' => 'a vu', 'es' => 'vio', 'de' => 'sah', 'ja' => '見た', 'ko' => '봤다', 'tr' => 'gördü', 'ar' => 'رأى', 'az' => 'gördü'],
        // --- Conversation: the future ----------------------------------
        'позвоню' => ['en' => 'I will call', 'fr' => "j'appellerai", 'es' => 'llamaré', 'de' => 'ich werde anrufen', 'ja' => '電話します', 'ko' => '전화할게요', 'tr' => 'arayacağım', 'ar' => 'سأتصل', 'az' => 'zəng edəcəyəm'],
        'приду' => ['en' => 'I will come', 'fr' => 'je viendrai', 'es' => 'vendré', 'de' => 'ich werde kommen', 'ja' => '来ます', 'ko' => '올게요', 'tr' => 'geleceğim', 'ar' => 'سآتي', 'az' => 'gələcəyəm'],
        'сделаю' => ['en' => 'I will do', 'fr' => 'je ferai', 'es' => 'haré', 'de' => 'ich werde machen', 'ja' => 'します', 'ko' => '할게요', 'tr' => 'yapacağım', 'ar' => 'سأفعل', 'az' => 'edəcəyəm'],
        'пойду' => ['en' => 'I will go', 'fr' => "j'irai", 'es' => 'iré', 'de' => 'ich werde gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğim', 'ar' => 'سأذهب', 'az' => 'gedəcəyəm'],
        'увижу' => ['en' => 'I will see', 'fr' => 'je verrai', 'es' => 'veré', 'de' => 'ich werde sehen', 'ja' => '見ます', 'ko' => '볼게요', 'tr' => 'göreceğim', 'ar' => 'سأرى', 'az' => 'görəcəyəm'],
        // --- Conversation: infinitives ---------------------------------
        'идти' => ['en' => 'to go', 'fr' => 'aller', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'tr' => 'gitmek', 'ar' => 'الذهاب', 'az' => 'getmək'],
        'читать' => ['en' => 'to read', 'fr' => 'lire', 'es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'tr' => 'okumak', 'ar' => 'القراءة', 'az' => 'oxumaq'],
        'спать' => ['en' => 'to sleep', 'fr' => 'dormir', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다', 'tr' => 'uyumak', 'ar' => 'النوم', 'az' => 'yatmaq'],
        'говорить' => ['en' => 'to speak', 'fr' => 'parler', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'tr' => 'konuşmak', 'ar' => 'التكلم', 'az' => 'danışmaq'],
        'пить' => ['en' => 'to drink', 'fr' => 'boire', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'tr' => 'içmek', 'ar' => 'الشرب', 'az' => 'içmək'],
        'гулять' => ['en' => 'to walk', 'fr' => 'se promener', 'es' => 'caminar', 'de' => 'spazieren', 'ja' => '散歩する', 'ko' => '걷다', 'tr' => 'yürümek', 'ar' => 'التمشي', 'az' => 'gəzmək'],
        // --- Conversation: how you feel --------------------------------
        'рад' => ['en' => 'I am glad', 'fr' => 'je suis content', 'es' => 'estoy contento', 'de' => 'ich freue mich', 'ja' => 'うれしいです', 'ko' => '기뻐요', 'tr' => 'memnunum', 'ar' => 'أنا سعيد', 'az' => 'şadam'],
        'счастлив' => ['en' => 'I am happy', 'fr' => 'je suis heureux', 'es' => 'estoy feliz', 'de' => 'ich bin glücklich', 'ja' => '幸せです', 'ko' => '행복해요', 'tr' => 'mutluyum', 'ar' => 'أنا فرح', 'az' => 'xoşbəxtəm'],
        'грустно' => ['en' => 'I am sad', 'fr' => 'je suis triste', 'es' => 'estoy triste', 'de' => 'ich bin traurig', 'ja' => '悲しいです', 'ko' => '슬퍼요', 'tr' => 'üzgünüm', 'ar' => 'أنا حزين', 'az' => 'kədərliyəm'],
        'болен' => ['en' => 'I am sick', 'fr' => 'je suis malade', 'es' => 'estoy enfermo', 'de' => 'ich bin krank', 'ja' => '病気です', 'ko' => '아파요', 'tr' => 'hastayım', 'ar' => 'أنا مريض', 'az' => 'xəstəyəm'],
        'устал' => ['en' => 'I am tired', 'fr' => 'je suis fatigué', 'es' => 'estoy cansado', 'de' => 'ich bin müde', 'ja' => '疲れました', 'ko' => '피곤해요', 'tr' => 'yorgunum', 'ar' => 'أنا متعب', 'az' => 'yorğunam'],
        'хорошо' => ['en' => 'well', 'fr' => 'bien', 'es' => 'bien', 'de' => 'gut', 'ja' => '元気', 'ko' => '잘', 'tr' => 'iyi', 'ar' => 'بخير', 'az' => 'yaxşıyam'],
        'рада' => ['en' => 'glad', 'fr' => 'content', 'es' => 'contento', 'de' => 'froh', 'ja' => 'うれしい', 'ko' => '기쁜', 'tr' => 'memnun', 'ar' => 'سعيد', 'az' => 'şad'],
        'грустный' => ['en' => 'sad', 'fr' => 'triste', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'tr' => 'üzgün', 'ar' => 'حزين', 'az' => 'kədərli'],
        'больной' => ['en' => 'sick', 'fr' => 'malade', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気の', 'ko' => '아픈', 'tr' => 'hasta', 'ar' => 'مريض', 'az' => 'xəstə'],
        'усталый' => ['en' => 'tired', 'fr' => 'fatigué', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'tr' => 'yorgun', 'ar' => 'متعب', 'az' => 'yorğun'],
        'счастливый' => ['en' => 'happy', 'fr' => 'heureux', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せな', 'ko' => '행복한', 'tr' => 'mutlu', 'ar' => 'فرح', 'az' => 'xoşbəxt'],
        // --- Conversation: opinions ------------------------------------
        'согласен' => ['en' => 'I agree', 'fr' => "je suis d'accord", 'es' => 'estoy de acuerdo', 'de' => 'ich stimme zu', 'ja' => '賛成です', 'ko' => '동의해요', 'tr' => 'katılıyorum', 'ar' => 'أوافق', 'az' => 'razıyam'],
        'не согласен' => ['en' => 'I do not agree', 'fr' => "je ne suis pas d'accord", 'es' => 'no estoy de acuerdo', 'de' => 'ich stimme nicht zu', 'ja' => '反対です', 'ko' => '동의하지 않아요', 'tr' => 'katılmıyorum', 'ar' => 'لا أوافق', 'az' => 'razı deyiləm'],
        'по-моему' => ['en' => 'in my opinion', 'fr' => 'à mon avis', 'es' => 'en mi opinión', 'de' => 'meiner Meinung nach', 'ja' => '私の意見では', 'ko' => '제 생각에는', 'tr' => 'bence', 'ar' => 'برأيي', 'az' => 'məncə'],
        'может быть' => ['en' => 'maybe', 'fr' => 'peut-être', 'es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도', 'tr' => 'belki', 'ar' => 'ربما', 'az' => 'bəlkə'],
        'потому что' => ['en' => 'because', 'fr' => 'parce que', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'tr' => 'çünkü', 'ar' => 'لأن', 'az' => 'çünki'],
        'сообщение' => ['en' => 'message', 'fr' => 'message', 'es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'tr' => 'mesaj', 'ar' => 'رسالة', 'az' => 'mesaj'],
        'план' => ['en' => 'plan', 'fr' => 'plan', 'es' => 'plan', 'de' => 'Plan', 'ja' => '計画', 'ko' => '계획', 'tr' => 'plan', 'ar' => 'خطة', 'az' => 'plan'],
        'вещь' => ['en' => 'thing', 'fr' => 'chose', 'es' => 'cosa', 'de' => 'Ding', 'ja' => 'もの', 'ko' => '것', 'tr' => 'şey', 'ar' => 'شيء', 'az' => 'şey'],
        // --- Conversation: existence and negation ----------------------
        'есть' => ['en' => 'there is', 'fr' => 'il y a', 'es' => 'hay', 'de' => 'es gibt', 'ja' => 'あります', 'ko' => '있어요', 'tr' => 'var', 'ar' => 'يوجد', 'az' => 'var'],
        'нету' => ['en' => 'there is not', 'fr' => "il n'y a pas", 'es' => 'no hay', 'de' => 'es gibt nicht', 'ja' => 'ありません', 'ko' => '없어요', 'tr' => 'yok', 'ar' => 'لا يوجد', 'az' => 'yoxdur'],
        'не' => ['en' => 'is not', 'fr' => "n'est pas", 'es' => 'no es', 'de' => 'ist nicht', 'ja' => 'ではない', 'ko' => '아니에요', 'tr' => 'değil', 'ar' => 'ليس', 'az' => 'deyil'],
        'ли' => ['en' => 'is there', 'fr' => 'est-ce que', 'es' => 'acaso', 'de' => 'ob', 'ja' => 'か', 'ko' => '요', 'tr' => 'mı', 'ar' => 'هل', 'az' => 'mı'],
        // --- Restaurant: the menu --------------------------------------
        'меню' => ['en' => 'menu', 'fr' => 'menu', 'es' => 'menú', 'de' => 'Speisekarte', 'ja' => 'メニュー', 'ko' => '메뉴', 'tr' => 'menü', 'ar' => 'قائمة الطعام', 'az' => 'menyu'],
        'заказ' => ['en' => 'order', 'fr' => 'commande', 'es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'tr' => 'sipariş', 'ar' => 'طلب', 'az' => 'sifariş'],
        'порция' => ['en' => 'portion', 'fr' => 'portion', 'es' => 'porción', 'de' => 'Portion', 'ja' => '一人前', 'ko' => '인분', 'tr' => 'porsiyon', 'ar' => 'حصة', 'az' => 'porsiya'],
        'бронь' => ['en' => 'reservation', 'fr' => 'réservation', 'es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'tr' => 'rezervasyon', 'ar' => 'حجز', 'az' => 'rezervasiya'],
        'жалоба' => ['en' => 'complaint', 'fr' => 'réclamation', 'es' => 'queja', 'de' => 'Beschwerde', 'ja' => '苦情', 'ko' => '불만', 'tr' => 'şikayet', 'ar' => 'شكوى', 'az' => 'şikayət'],
        'аллергия' => ['en' => 'allergy', 'fr' => 'allergie', 'es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'tr' => 'alerji', 'ar' => 'حساسية', 'az' => 'allergiya'],
        'моя аллергия' => ['en' => 'my allergy', 'fr' => 'mon allergie', 'es' => 'mi alergia', 'de' => 'meine Allergie', 'ja' => '私のアレルギー', 'ko' => '제 알레르기', 'tr' => 'alerjim', 'ar' => 'حساسيتي', 'az' => 'allergiyam'],
        'вегетарианец' => ['en' => 'vegetarian', 'fr' => 'végétarien', 'es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'tr' => 'vejetaryen', 'ar' => 'نباتي', 'az' => 'vegetarian'],
        'я вегетарианец' => ['en' => 'I am vegetarian', 'fr' => 'je suis végétarien', 'es' => 'soy vegetariano', 'de' => 'ich bin vegetarisch', 'ja' => '私はベジタリアンです', 'ko' => '저는 채식주의자예요', 'tr' => 'vejetaryenim', 'ar' => 'أنا نباتي', 'az' => 'vegetarianam'],
        'не могу есть' => ['en' => 'I cannot eat', 'fr' => 'je ne peux pas manger', 'es' => 'no puedo comer', 'de' => 'ich kann nicht essen', 'ja' => '食べられません', 'ko' => '먹을 수 없어요', 'tr' => 'yiyemem', 'ar' => 'لا أستطيع الأكل', 'az' => 'yeyə bilmirəm'],
        // --- Restaurant: dishes ----------------------------------------
        'суп' => ['en' => 'soup', 'fr' => 'soupe', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'tr' => 'çorba', 'ar' => 'حساء', 'az' => 'şorba'],
        'рыба' => ['en' => 'fish', 'fr' => 'poisson', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'tr' => 'balık', 'ar' => 'سمك', 'az' => 'balıq'],
        'мясо' => ['en' => 'meat', 'fr' => 'viande', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'tr' => 'et', 'ar' => 'لحم', 'az' => 'ət'],
        'рис' => ['en' => 'rice', 'fr' => 'riz', 'es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥', 'tr' => 'pirinç', 'ar' => 'أرز', 'az' => 'düyü'],
        'салат' => ['en' => 'salad', 'fr' => 'salade', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'tr' => 'salata', 'ar' => 'سلطة', 'az' => 'salat'],
        'картофель' => ['en' => 'potato', 'fr' => 'pomme de terre', 'es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'tr' => 'patates', 'ar' => 'بطاطا', 'az' => 'kartof'],
        'курица' => ['en' => 'chicken', 'fr' => 'poulet', 'es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'tr' => 'tavuk', 'ar' => 'دجاج', 'az' => 'toyuq'],
        'еда' => ['en' => 'food', 'fr' => 'nourriture', 'es' => 'comida', 'de' => 'Essen', 'ja' => '食べ物', 'ko' => '음식', 'tr' => 'yemek', 'ar' => 'طعام', 'az' => 'yemək'],
        // --- Restaurant: drinks and sweets -----------------------------
        'напиток' => ['en' => 'drink', 'fr' => 'boisson', 'es' => 'bebida', 'de' => 'Getränk', 'ja' => '飲み物', 'ko' => '음료', 'tr' => 'içecek', 'ar' => 'مشروب', 'az' => 'içki'],
        'вино' => ['en' => 'wine', 'fr' => 'vin', 'es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'tr' => 'şarap', 'ar' => 'نبيذ', 'az' => 'şərab'],
        'пиво' => ['en' => 'beer', 'fr' => 'bière', 'es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'tr' => 'bira', 'ar' => 'بيرة', 'az' => 'pivə'],
        'лёд' => ['en' => 'ice', 'fr' => 'glace', 'es' => 'hielo', 'de' => 'Eis', 'ja' => '氷', 'ko' => '얼음', 'tr' => 'buz', 'ar' => 'الثلج', 'az' => 'buz'],
        'десерт' => ['en' => 'dessert', 'fr' => 'dessert', 'es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'tr' => 'tatlı', 'ar' => 'حلوى', 'az' => 'şirniyyat'],
        'мороженое' => ['en' => 'ice cream', 'fr' => 'glace', 'es' => 'helado', 'de' => 'Eiscreme', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'tr' => 'dondurma', 'ar' => 'آيس كريم', 'az' => 'dondurma'],
        'шоколад' => ['en' => 'chocolate', 'fr' => 'chocolat', 'es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'tr' => 'çikolata', 'ar' => 'شوكولاتة', 'az' => 'şokolad'],
        // --- Restaurant: the table -------------------------------------
        'вилка' => ['en' => 'fork', 'fr' => 'fourchette', 'es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'tr' => 'çatal', 'ar' => 'شوكة', 'az' => 'çəngəl'],
        'нож' => ['en' => 'knife', 'fr' => 'couteau', 'es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'tr' => 'bıçak', 'ar' => 'سكين', 'az' => 'bıçaq'],
        'ложка' => ['en' => 'spoon', 'fr' => 'cuillère', 'es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'tr' => 'kaşık', 'ar' => 'ملعقة', 'az' => 'qaşıq'],
        'тарелка' => ['en' => 'plate', 'fr' => 'assiette', 'es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'tr' => 'tabak', 'ar' => 'صحن', 'az' => 'boşqab'],
        'салфетка' => ['en' => 'napkin', 'fr' => 'serviette', 'es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'tr' => 'peçete', 'ar' => 'منديل', 'az' => 'salfet'],
        'стакан' => ['en' => 'glass', 'fr' => 'verre', 'es' => 'vaso', 'de' => 'Glas', 'ja' => 'コップ', 'ko' => '컵', 'tr' => 'bardak', 'ar' => 'كوب', 'az' => 'stəkan'],
        'с собой' => ['en' => 'takeaway', 'fr' => 'à emporter', 'es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'tr' => 'paket', 'ar' => 'للخارج', 'az' => 'özümlə'],
        // --- Restaurant: paying ----------------------------------------
        'цена' => ['en' => 'price', 'fr' => 'prix', 'es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'tr' => 'fiyat', 'ar' => 'سعر', 'az' => 'qiymət'],
        'деньги' => ['en' => 'money', 'fr' => 'argent', 'es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'tr' => 'para', 'ar' => 'نقود', 'az' => 'pul'],
        'мои деньги' => ['en' => 'my money', 'fr' => 'mon argent', 'es' => 'mi dinero', 'de' => 'mein Geld', 'ja' => '私のお金', 'ko' => '제 돈', 'tr' => 'param', 'ar' => 'نقودي', 'az' => 'pulum'],
        'карта' => ['en' => 'card', 'fr' => 'carte', 'es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'tr' => 'kart', 'ar' => 'بطاقة', 'az' => 'kart'],
        'наличные' => ['en' => 'cash', 'fr' => 'espèces', 'es' => 'efectivo', 'de' => 'Bargeld', 'ja' => '現金', 'ko' => '현금', 'tr' => 'nakit', 'ar' => 'كاش', 'az' => 'nağd'],
        'рубль' => ['en' => 'lira', 'fr' => 'rouble', 'es' => 'rublo', 'de' => 'Rubel', 'ja' => 'ルーブル', 'ko' => '루블', 'tr' => 'lira', 'ar' => 'ريال', 'az' => 'manat'],
        'итого' => ['en' => 'total', 'fr' => 'total', 'es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '합계', 'tr' => 'toplam', 'ar' => 'المجموع', 'az' => 'cəmi'],
        // --- Supermarket: the shop -------------------------------------
        'супермаркет' => ['en' => 'supermarket', 'fr' => 'supermarché', 'es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'tr' => 'market', 'ar' => 'سوبرماركت', 'az' => 'supermarket'],
        'супермаркете' => ['en' => 'in the supermarket', 'fr' => 'au supermarché', 'es' => 'en el supermercado', 'de' => 'im Supermarkt', 'ja' => 'スーパーで', 'ko' => '슈퍼마켓에서', 'tr' => 'markette', 'ar' => 'في السوبرماركت', 'az' => 'supermarketdə'],
        'отдел' => ['en' => 'aisle', 'fr' => 'rayon', 'es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '코너', 'tr' => 'reyon', 'ar' => 'قسم', 'az' => 'şöbə'],
        'отделе' => ['en' => 'in the aisle', 'fr' => 'au rayon', 'es' => 'en el pasillo', 'de' => 'im Regal', 'ja' => '売り場で', 'ko' => '코너에서', 'tr' => 'reyonda', 'ar' => 'في القسم', 'az' => 'şöbədə'],
        'корзина' => ['en' => 'basket', 'fr' => 'panier', 'es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'tr' => 'sepet', 'ar' => 'سلة', 'az' => 'səbət'],
        'касса' => ['en' => 'checkout', 'fr' => 'caisse', 'es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'tr' => 'kasa', 'ar' => 'صندوق الدفع', 'az' => 'kassa'],
        'список' => ['en' => 'list', 'fr' => 'liste', 'es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'tr' => 'liste', 'ar' => 'قائمة', 'az' => 'siyahı'],
        'списке' => ['en' => 'on the list', 'fr' => 'sur la liste', 'es' => 'en la lista', 'de' => 'auf der Liste', 'ja' => 'リストに', 'ko' => '목록에', 'tr' => 'listede', 'ar' => 'في القائمة', 'az' => 'siyahıda'],
        'скидка' => ['en' => 'discount', 'fr' => 'réduction', 'es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'tr' => 'indirim', 'ar' => 'خصم', 'az' => 'endirim'],
        'со скидкой' => ['en' => 'on discount', 'fr' => 'en réduction', 'es' => 'en descuento', 'de' => 'im Rabatt', 'ja' => '割引で', 'ko' => '할인이에요', 'tr' => 'indirimde', 'ar' => 'بخصم', 'az' => 'endirimdə'],
        'пакет' => ['en' => 'bag', 'fr' => 'sac', 'es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'tr' => 'poşet', 'ar' => 'كيس', 'az' => 'torba'],
        // --- Supermarket: fruit and vegetables -------------------------
        'фрукт' => ['en' => 'fruit', 'fr' => 'fruit', 'es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'tr' => 'meyve', 'ar' => 'فاكهة', 'az' => 'meyvə'],
        'овощ' => ['en' => 'vegetable', 'fr' => 'légume', 'es' => 'verdura', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebze', 'ar' => 'خضار', 'az' => 'tərəvəz'],
        'яблоко' => ['en' => 'apple', 'fr' => 'pomme', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elma', 'ar' => 'تفاحة', 'az' => 'alma'],
        'яблоки' => ['en' => 'apples', 'fr' => 'pommes', 'es' => 'manzanas', 'de' => 'Äpfel', 'ja' => 'りんご', 'ko' => '사과', 'tr' => 'elmalar', 'ar' => 'تفاح', 'az' => 'almalar'],
        'банан' => ['en' => 'banana', 'fr' => 'banane', 'es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muz', 'ar' => 'موزة', 'az' => 'banan'],
        'апельсин' => ['en' => 'orange', 'fr' => 'orange', 'es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakal', 'ar' => 'برتقالة', 'az' => 'portağal'],
        'виноград' => ['en' => 'grape', 'fr' => 'raisin', 'es' => 'uva', 'de' => 'Traube', 'ja' => 'ぶどう', 'ko' => '포도', 'tr' => 'üzüm', 'ar' => 'عنب', 'az' => 'üzüm'],
        'помидор' => ['en' => 'tomato', 'fr' => 'tomate', 'es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'tr' => 'domates', 'ar' => 'طماطم', 'az' => 'pomidor'],
        'огурец' => ['en' => 'cucumber', 'fr' => 'concombre', 'es' => 'pepino', 'de' => 'Gurke', 'ja' => 'きゅうり', 'ko' => '오이', 'tr' => 'salatalık', 'ar' => 'خيار', 'az' => 'xiyar'],
        'лук' => ['en' => 'onion', 'fr' => 'oignon', 'es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => 'たまねぎ', 'ko' => '양파', 'tr' => 'soğan', 'ar' => 'بصل', 'az' => 'soğan'],
        'морковь' => ['en' => 'carrot', 'fr' => 'carotte', 'es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'tr' => 'havuç', 'ar' => 'جزر', 'az' => 'yerkökü'],
        // --- Supermarket: dairy and staples ----------------------------
        'йогурт' => ['en' => 'yoghurt', 'fr' => 'yaourt', 'es' => 'yogur', 'de' => 'Joghurt', 'ja' => 'ヨーグルト', 'ko' => '요구르트', 'tr' => 'yoğurt', 'ar' => 'لبن', 'az' => 'qatıq'],
        'масло' => ['en' => 'butter', 'fr' => 'beurre', 'es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'tr' => 'tereyağı', 'ar' => 'زبدة', 'az' => 'kərə yağı'],
        'яйцо' => ['en' => 'egg', 'fr' => 'oeuf', 'es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurta', 'ar' => 'بيضة', 'az' => 'yumurta'],
        'кило' => ['en' => 'kilo', 'fr' => 'kilo', 'es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'tr' => 'kilo', 'ar' => 'كيلو', 'az' => 'kilo'],
        'бутылка' => ['en' => 'bottle', 'fr' => 'bouteille', 'es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişe', 'ar' => 'زجاجة', 'az' => 'şüşə'],
        'коробка' => ['en' => 'box', 'fr' => 'boîte', 'es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutu', 'ar' => 'علبة', 'az' => 'qutu'],
        // --- Prepositions and the forms they govern --------------------
        'в' => ['en' => 'in', 'fr' => 'dans', 'es' => 'en', 'de' => 'in', 'ja' => 'に', 'ko' => '에', 'tr' => 'içinde', 'ar' => 'في', 'az' => 'içində'],
        'на' => ['en' => 'at', 'fr' => 'à', 'es' => 'en', 'de' => 'an', 'ja' => 'に', 'ko' => '에', 'tr' => 'de', 'ar' => 'على', 'az' => 'yanında'],
        'с' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와', 'tr' => 'ile', 'ar' => 'مع', 'az' => 'ilə'],
        'без' => ['en' => 'without', 'fr' => 'sans', 'es' => 'sin', 'de' => 'ohne', 'ja' => 'なしで', 'ko' => '없이', 'tr' => 'olmadan', 'ar' => 'بدون', 'az' => 'olmadan'],
        'для' => ['en' => 'for', 'fr' => 'pour', 'es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'tr' => 'için', 'ar' => 'لأجل', 'az' => 'üçün'],
        'чем' => ['en' => 'than', 'fr' => 'que', 'es' => 'que', 'de' => 'als', 'ja' => 'より', 'ko' => '보다', 'tr' => 'den', 'ar' => 'من', 'az' => 'dan'],
        'молоком' => ['en' => 'with milk', 'fr' => 'avec du lait', 'es' => 'con leche', 'de' => 'mit Milch', 'ja' => '牛乳入りの', 'ko' => '우유 있는', 'tr' => 'sütlü', 'ar' => 'مع الحليب', 'az' => 'südlü'],
        'сахаром' => ['en' => 'with sugar', 'fr' => 'avec du sucre', 'es' => 'con azúcar', 'de' => 'mit Zucker', 'ja' => '砂糖入りの', 'ko' => '설탕 있는', 'tr' => 'şekerli', 'ar' => 'مع السكر', 'az' => 'şəkərli'],
        'льдом' => ['en' => 'with ice', 'fr' => 'avec des glaçons', 'es' => 'con hielo', 'de' => 'mit Eis', 'ja' => '氷入りの', 'ko' => '얼음 있는', 'tr' => 'buzlu', 'ar' => 'مع الثلج', 'az' => 'buzlu'],
        'шоколадом' => ['en' => 'with chocolate', 'fr' => 'avec du chocolat', 'es' => 'con chocolate', 'de' => 'mit Schokolade', 'ja' => 'チョコ入りの', 'ko' => '초콜릿 있는', 'tr' => 'çikolatalı', 'ar' => 'مع الشوكولاتة', 'az' => 'şokoladlı'],
        'маслом' => ['en' => 'with butter', 'fr' => 'avec du beurre', 'es' => 'con mantequilla', 'de' => 'mit Butter', 'ja' => 'バター入りの', 'ko' => '버터 있는', 'tr' => 'tereyağlı', 'ar' => 'مع الزبدة', 'az' => 'yağlı'],
        'молока' => ['en' => 'without milk', 'fr' => 'sans lait', 'es' => 'sin leche', 'de' => 'ohne Milch', 'ja' => '牛乳なしの', 'ko' => '우유 없는', 'tr' => 'sütsüz', 'ar' => 'بدون حليب', 'az' => 'südsüz'],
        'сахара' => ['en' => 'without sugar', 'fr' => 'sans sucre', 'es' => 'sin azúcar', 'de' => 'ohne Zucker', 'ja' => '砂糖なしの', 'ko' => '설탕 없는', 'tr' => 'şekersiz', 'ar' => 'بدون سكر', 'az' => 'şəkərsiz'],
        'льда' => ['en' => 'without ice', 'fr' => 'sans glaçons', 'es' => 'sin hielo', 'de' => 'ohne Eis', 'ja' => '氷なしの', 'ko' => '얼음 없는', 'tr' => 'buzsuz', 'ar' => 'بدون ثلج', 'az' => 'buzsuz'],
        'воды' => ['en' => 'of water', 'fr' => "d'eau", 'es' => 'de agua', 'de' => 'Wasser', 'ja' => '水の', 'ko' => '물의', 'tr' => 'suyun', 'ar' => 'الماء', 'az' => 'suyun'],
        'этом' => ['en' => 'in this', 'fr' => 'dedans', 'es' => 'en esto', 'de' => 'darin', 'ja' => 'これに', 'ko' => '이것에', 'tr' => 'bunda', 'ar' => 'في هذا', 'az' => 'bunda'],
        // --- Accusative forms the phrases need as whole tiles ----------
        'воду' => ['en' => 'the water', 'fr' => "l'eau", 'es' => 'el agua', 'de' => 'das Wasser', 'ja' => '水を', 'ko' => '물을', 'tr' => 'suyu', 'ar' => 'الماء', 'az' => 'suyu'],
        'рыбу' => ['en' => 'the fish', 'fr' => 'le poisson', 'es' => 'el pescado', 'de' => 'den Fisch', 'ja' => '魚を', 'ko' => '생선을', 'tr' => 'balığı', 'ar' => 'السمك', 'az' => 'balığı'],
        'книгу' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本を', 'ko' => '제 책을', 'tr' => 'kitabımı', 'ar' => 'كتابي', 'az' => 'kitabım'],
        'газету' => ['en' => 'the newspaper', 'fr' => 'le journal', 'es' => 'el periódico', 'de' => 'die Zeitung', 'ja' => '新聞を', 'ko' => '신문을', 'tr' => 'gazeteyi', 'ar' => 'الجريدة', 'az' => 'qəzeti'],
        // --- Plurals the phrases ask for as whole tiles ----------------
        'коты' => ['en' => 'cats', 'fr' => 'chats', 'es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이', 'tr' => 'kediler', 'ar' => 'قطط', 'az' => 'pişiklər'],
        'собаки' => ['en' => 'dogs', 'fr' => 'chiens', 'es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개', 'tr' => 'köpekler', 'ar' => 'كلاب', 'az' => 'itlər'],
        'люди' => ['en' => 'people', 'fr' => 'gens', 'es' => 'gente', 'de' => 'Leute', 'ja' => '人々', 'ko' => '사람들', 'tr' => 'insanlar', 'ar' => 'ناس', 'az' => 'insanlar'],
        'ручки' => ['en' => 'pens', 'fr' => 'stylos', 'es' => 'bolígrafos', 'de' => 'Stifte', 'ja' => 'ペン', 'ko' => '펜', 'tr' => 'kalemler', 'ar' => 'أقلام', 'az' => 'qələmlər'],
        'овощи' => ['en' => 'vegetables', 'fr' => 'légumes', 'es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'tr' => 'sebzeler', 'ar' => 'خضروات', 'az' => 'tərəvəzlər'],
        'помидоры' => ['en' => 'tomatoes', 'fr' => 'tomates', 'es' => 'tomates', 'de' => 'Tomaten', 'ja' => 'トマト', 'ko' => '토마토', 'tr' => 'domatesler', 'ar' => 'طماطم', 'az' => 'pomidorlar'],
        'яйца' => ['en' => 'eggs', 'fr' => 'oeufs', 'es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '달걀', 'tr' => 'yumurtalar', 'ar' => 'بيض', 'az' => 'yumurtalar'],
        'бананы' => ['en' => 'bananas', 'fr' => 'bananes', 'es' => 'plátanos', 'de' => 'Bananen', 'ja' => 'バナナ', 'ko' => '바나나', 'tr' => 'muzlar', 'ar' => 'موز', 'az' => 'bananlar'],
        'апельсины' => ['en' => 'oranges', 'fr' => 'oranges', 'es' => 'naranjas', 'de' => 'Orangen', 'ja' => 'オレンジ', 'ko' => '오렌지', 'tr' => 'portakallar', 'ar' => 'برتقال', 'az' => 'portağallar'],
        'бутылки' => ['en' => 'bottles', 'fr' => 'bouteilles', 'es' => 'botellas', 'de' => 'Flaschen', 'ja' => 'ボトル', 'ko' => '병', 'tr' => 'şişeler', 'ar' => 'زجاجات', 'az' => 'şüşələr'],
        'коробки' => ['en' => 'boxes', 'fr' => 'boîtes', 'es' => 'cajas', 'de' => 'Schachteln', 'ja' => '箱', 'ko' => '상자', 'tr' => 'kutular', 'ar' => 'علب', 'az' => 'qutular'],
        'часы' => ['en' => 'clock', 'fr' => 'horloge', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'tr' => 'saat', 'ar' => 'ساعة', 'az' => 'saat'],
        'лет' => ['en' => 'years', 'fr' => 'ans', 'es' => 'años', 'de' => 'Jahre', 'ja' => '歳', 'ko' => '살', 'tr' => 'yaşında', 'ar' => 'سنوات', 'az' => 'yaşında'],
        // --- Comparatives and superlatives -----------------------------
        'лучше' => ['en' => 'better', 'fr' => 'mieux', 'es' => 'mejor', 'de' => 'besser', 'ja' => 'もっといい', 'ko' => '더 좋은', 'tr' => 'daha iyi', 'ar' => 'أحسن', 'az' => 'daha yaxşı'],
        'меньше' => ['en' => 'smaller', 'fr' => 'plus petit', 'es' => 'más pequeño', 'de' => 'kleiner', 'ja' => 'もっと小さい', 'ko' => '더 작은', 'tr' => 'daha küçük', 'ar' => 'أصغر', 'az' => 'daha kiçik'],
        'старше' => ['en' => 'older', 'fr' => 'plus vieux', 'es' => 'mayor', 'de' => 'älter', 'ja' => 'もっと年上', 'ko' => '더 나이 든', 'tr' => 'daha yaşlı', 'ar' => 'أكبر سنا', 'az' => 'daha yaşlı'],
        'дороже' => ['en' => 'more expensive', 'fr' => 'plus cher', 'es' => 'más caro', 'de' => 'teurer', 'ja' => 'もっと高い', 'ko' => '더 비싼', 'tr' => 'daha pahalı', 'ar' => 'أغلى', 'az' => 'daha bahalı'],
        'дешевле' => ['en' => 'cheaper', 'fr' => 'moins cher', 'es' => 'más barato', 'de' => 'billiger', 'ja' => 'もっと安い', 'ko' => '더 싼', 'tr' => 'daha ucuz', 'ar' => 'أرخص', 'az' => 'daha ucuz'],
        'лучший' => ['en' => 'best', 'fr' => 'meilleur', 'es' => 'mejor', 'de' => 'beste', 'ja' => '最高の', 'ko' => '최고의', 'tr' => 'en iyi', 'ar' => 'الأفضل', 'az' => 'ən yaxşı'],
        // --- Words the phrases need that the core list missed ----------
        'очень' => ['en' => 'very', 'fr' => 'très', 'es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '아주', 'tr' => 'çok', 'ar' => 'جدا', 'az' => 'çox'],
        'всё' => ['en' => 'everything', 'fr' => 'tout', 'es' => 'todo', 'de' => 'alles', 'ja' => '全部', 'ko' => '모두', 'tr' => 'her şey', 'ar' => 'كل شيء', 'az' => 'hər şey'],
        'он' => ['en' => 'he', 'fr' => 'il', 'es' => 'él', 'de' => 'er', 'ja' => '彼', 'ko' => '그', 'tr' => 'o', 'ar' => 'هو', 'az' => 'o kişi'],
        'мы' => ['en' => 'we', 'fr' => 'nous', 'es' => 'nosotros', 'de' => 'wir', 'ja' => '私たち', 'ko' => '우리', 'tr' => 'biz', 'ar' => 'نحن', 'az' => 'biz'],
        'один' => ['en' => 'one', 'fr' => 'un', 'es' => 'uno', 'de' => 'eins', 'ja' => '一', 'ko' => '하나', 'tr' => 'bir', 'ar' => 'واحد', 'az' => 'bir'],
        'имя' => ['en' => 'name', 'fr' => 'nom', 'es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름', 'tr' => 'isim', 'ar' => 'اسم', 'az' => 'ad'],
        'дома' => ['en' => 'home', 'fr' => 'à la maison', 'es' => 'en casa', 'de' => 'zu Hause', 'ja' => '家で', 'ko' => '집에', 'tr' => 'evde', 'ar' => 'في البيت', 'az' => 'evdəyəm'],
        'сладкий' => ['en' => 'sweet', 'fr' => 'sucré', 'es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '달콤한', 'tr' => 'tatlı', 'ar' => 'حلو', 'az' => 'şirin'],
        'позже' => ['en' => 'later', 'fr' => 'plus tard', 'es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에', 'tr' => 'sonra', 'ar' => 'لاحقا', 'az' => 'sonradan'],
        'так' => ['en' => 'so', 'fr' => 'donc', 'es' => 'así', 'de' => 'so', 'ja' => 'そう', 'ko' => '그래서', 'tr' => 'öyle', 'ar' => 'إذن', 'az' => 'belə'],
        'ночью' => ['en' => 'at night', 'fr' => 'la nuit', 'es' => 'por la noche', 'de' => 'nachts', 'ja' => '夜に', 'ko' => '밤에', 'tr' => 'geceleyin', 'ar' => 'ليلا', 'az' => 'gecələr'],
        'летом' => ['en' => 'in summer', 'fr' => 'en été', 'es' => 'en verano', 'de' => 'im Sommer', 'ja' => '夏に', 'ko' => '여름에', 'tr' => 'yazın', 'ar' => 'صيفا', 'az' => 'yayda'],
        'заказать' => ['en' => 'to order', 'fr' => 'commander', 'es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다', 'tr' => 'sipariş vermek', 'ar' => 'الطلب', 'az' => 'sifariş vermək'],
        'могу' => ['en' => 'can', 'fr' => 'peux', 'es' => 'puedo', 'de' => 'kann', 'ja' => 'できます', 'ko' => '할 수 있어요', 'tr' => 'yapabilirim', 'ar' => 'أستطيع', 'az' => 'bacarıram'],
        'у' => ['en' => 'at', 'fr' => 'chez', 'es' => 'en', 'de' => 'bei', 'ja' => 'に', 'ko' => '에게', 'tr' => 'de', 'ar' => 'على', 'az' => 'yanında'],
        'меня' => ['en' => 'me', 'fr' => 'moi', 'es' => 'mí', 'de' => 'mich', 'ja' => '私に', 'ko' => '저에게', 'tr' => 'bana', 'ar' => 'لي', 'az' => 'mənə'],
        'пойдём' => ['en' => 'we will go', 'fr' => 'nous irons', 'es' => 'iremos', 'de' => 'wir gehen', 'ja' => '行きます', 'ko' => '갈게요', 'tr' => 'gideceğiz', 'ar' => 'سنذهب', 'az' => 'gedəcəyik'],
        'познакомиться' => ['en' => 'to meet', 'fr' => 'faire connaissance', 'es' => 'conocerse', 'de' => 'kennenlernen', 'ja' => '知り合う', 'ko' => '만나다', 'tr' => 'tanışmak', 'ar' => 'التعرف', 'az' => 'tanış olmaq'],
        'приятно' => ['en' => 'nice', 'fr' => 'agréable', 'es' => 'agradable', 'de' => 'angenehm', 'ja' => 'うれしい', 'ko' => '반가워요', 'tr' => 'memnun', 'ar' => 'لطيف', 'az' => 'xoş'],
        'со' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와', 'tr' => 'ile', 'ar' => 'مع', 'az' => 'ilə'],
        'рыбы' => ['en' => 'of fish', 'fr' => 'de poisson', 'es' => 'de pescado', 'de' => 'Fisch', 'ja' => '魚の', 'ko' => '생선의', 'tr' => 'balığın', 'ar' => 'السمك', 'az' => 'balığın'],
        'яиц' => ['en' => 'of eggs', 'fr' => "d'oeufs", 'es' => 'de huevos', 'de' => 'Eier', 'ja' => '卵の', 'ko' => '달걀의', 'tr' => 'yumurtanın', 'ar' => 'البيض', 'az' => 'yumurtanın'],
        'кушать' => ['en' => 'to eat', 'fr' => 'manger', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'tr' => 'yemek yemek', 'ar' => 'الأكل', 'az' => 'yemək yemək'],
        'был' => ['en' => 'I was', 'fr' => "j'étais", 'es' => 'estuve', 'de' => 'ich war', 'ja' => 'いました', 'ko' => '있었어요', 'tr' => 'idim', 'ar' => 'كنت', 'az' => 'idim'],
        'было' => ['en' => 'it was', 'fr' => "c'était", 'es' => 'fue', 'de' => 'es war', 'ja' => 'でした', 'ko' => '이었어요', 'tr' => 'idi', 'ar' => 'كان', 'az' => 'idi'],
        'мне' => ['en' => 'to me', 'fr' => 'à moi', 'es' => 'a mí', 'de' => 'mir', 'ja' => '私に', 'ko' => '저에게', 'tr' => 'bana', 'ar' => 'إلى لي', 'az' => 'mənə'],
        'десять лет' => ['en' => 'ten years', 'fr' => 'dix ans', 'es' => 'diez años', 'de' => 'zehn Jahre', 'ja' => '十歳', 'ko' => '열 살', 'tr' => 'on yaşında', 'ar' => 'عشر سنوات', 'az' => 'on yaşında'],
        'мои' => ['en' => 'my', 'fr' => 'mes', 'es' => 'mis', 'de' => 'meine', 'ja' => '私の', 'ko' => '제', 'tr' => 'benim', 'ar' => 'خاصتي', 'az' => 'mənim'],
        'моё' => ['en' => 'my', 'fr' => 'mon', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '제', 'tr' => 'benim', 'ar' => 'خاصتي', 'az' => 'mənim'],
        'твоё' => ['en' => 'your', 'fr' => 'ton', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의', 'tr' => 'senin', 'ar' => 'خاصتك', 'az' => 'sənin'],
        'свидания' => ['en' => 'seeing you', 'fr' => 'au revoir', 'es' => 'hasta la vista', 'de' => 'Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕', 'tr' => 'görüşmek', 'ar' => 'اللقاء', 'az' => 'görüşmək'],
        'большое' => ['en' => 'very much', 'fr' => 'beaucoup', 'es' => 'muchas', 'de' => 'vielen', 'ja' => 'どうも', 'ko' => '정말', 'tr' => 'çok', 'ar' => 'جزيلا', 'az' => 'çox sağ ol'],
        // --- Quantity and comparison -----------------------------------
        'немного' => ['en' => 'a little', 'fr' => 'un peu', 'es' => 'un poco', 'de' => 'wenig', 'ja' => '少し', 'ko' => '조금', 'tr' => 'az', 'ar' => 'قليل', 'az' => 'az'],
        'много' => ['en' => 'a lot', 'fr' => 'beaucoup', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이', 'tr' => 'çok', 'ar' => 'كثير', 'az' => 'çoxlu'],
        'больше' => ['en' => 'more', 'fr' => 'plus', 'es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'tr' => 'daha', 'ar' => 'أكثر', 'az' => 'daha'],
        'самый' => ['en' => 'most', 'fr' => 'le plus', 'es' => 'el más', 'de' => 'am meisten', 'ja' => '最も', 'ko' => '가장', 'tr' => 'en', 'ar' => 'الأكثر', 'az' => 'ən'],
        'половина' => ['en' => 'half', 'fr' => 'demi', 'es' => 'medio', 'de' => 'halb', 'ja' => '半', 'ko' => '반', 'tr' => 'yarım', 'ar' => 'نصف', 'az' => 'yarım'],
        'такой же' => ['en' => 'the same', 'fr' => 'le même', 'es' => 'el mismo', 'de' => 'derselbe', 'ja' => '同じ', 'ko' => '같은', 'tr' => 'aynı', 'ar' => 'نفسه', 'az' => 'eyni'],
    ];

    /** A word's meaning in every language, as an i18n map ready to store. */
    public static function hint(string $russian): array
    {
        return ['i18n' => self::meanings($russian)];
    }

    /** A word's meanings, keyed by language code. */
    public static function meanings(string $russian): array
    {
        return self::WORDS[self::key($russian)] ?? ['en' => $russian];
    }

    /** @return array<int, string> */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $russian): bool
    {
        return isset(self::WORDS[self::key($russian)]);
    }

    /**
     * Normalised lookup key.
     *
     * Cyrillic lowercases without the traps Turkish has, so this is a plain
     * trim and fold. Ё is deliberately NOT folded to Е: they are different
     * letters, and `всё` (everything) and `все` (everyone) are different words.
     */
    public static function key(string $russian): string
    {
        return mb_strtolower(trim($russian), 'UTF-8');
    }
}
