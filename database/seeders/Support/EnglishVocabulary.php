<?php

namespace Database\Seeders\Support;

/**
 * English word => its meaning in every native language an English course
 * supports (Spanish, German, Japanese, Korean, French).
 *
 * English is the LEARNING language here, so exercise content (words, phrases,
 * tiles) is authored in English, and only the hints/prompts are shown in the
 * learner's own language. Nothing user-facing is hardcoded: seeders pull from
 * here and store the result as an ['i18n' => [...]] map, which
 * ExerciseContentService resolves per request.
 *
 * This mirrors FrenchVocabulary exactly, only the language roles are swapped.
 * Add a word here once and every unit can use it.
 */
class EnglishVocabulary
{
    private const WORDS = [
        // --- Unit 1: greetings & drinks ---
        'coffee' => ['es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'fr' => 'café', 'tr' => 'kahve', 'ru' => 'кофе', 'ar' => 'قهوة', 'az' => 'qəhvə'],
        'tea' => ['es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'fr' => 'thé', 'tr' => 'çay', 'ru' => 'чай', 'ar' => 'شاي', 'az' => 'çay'],
        'milk' => ['es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'fr' => 'lait', 'tr' => 'süt', 'ru' => 'молоко', 'ar' => 'حليب', 'az' => 'süd'],
        'sugar' => ['es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'fr' => 'sucre', 'tr' => 'şeker', 'ru' => 'сахар', 'ar' => 'سكر', 'az' => 'şəkər'],
        'bread' => ['es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'fr' => 'pain', 'tr' => 'ekmek', 'ru' => 'хлеб', 'ar' => 'خبز', 'az' => 'çörək'],
        'water' => ['es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'fr' => 'eau', 'tr' => 'su', 'ru' => 'вода', 'ar' => 'ماء', 'az' => 'su'],
        'hello' => ['es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'fr' => 'bonjour', 'tr' => 'merhaba', 'ru' => 'привет', 'ar' => 'مرحبا', 'az' => 'salam'],
        'thank you' => ['es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'fr' => 'merci', 'tr' => 'teşekkürler', 'ru' => 'спасибо', 'ar' => 'شكرا', 'az' => 'təşəkkür'],
        'please' => ['es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'fr' => "s'il vous plaît", 'tr' => 'lütfen', 'ru' => 'пожалуйста', 'ar' => 'من فضلك', 'az' => 'zəhmət olmasa'],
        'yes' => ['es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'fr' => 'oui', 'tr' => 'evet', 'ru' => 'да', 'ar' => 'نعم', 'az' => 'bəli'],
        'no' => ['es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'fr' => 'non', 'tr' => 'hayır', 'ru' => 'нет', 'ar' => 'لا', 'az' => 'xeyr'],
        'goodbye' => ['es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'fr' => 'au revoir', 'tr' => 'hoşça kal', 'ru' => 'до свидания', 'ar' => 'مع السلامة', 'az' => 'sağ ol'],
        'sir' => ['es' => 'señor', 'de' => 'mein Herr', 'ja' => 'ムッシュ', 'ko' => '선생님', 'fr' => 'monsieur', 'tr' => 'beyefendi', 'ru' => 'господин', 'ar' => 'سيدي', 'az' => 'cənab'],
        'madam' => ['es' => 'señora', 'de' => 'gnädige Frau', 'ja' => 'マダム', 'ko' => '부인', 'fr' => 'madame', 'tr' => 'hanımefendi', 'ru' => 'госпожа', 'ar' => 'سيدتي', 'az' => 'xanım'],
        'I would like' => ['es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'fr' => 'je voudrais', 'tr' => 'istiyorum', 'ru' => 'я хочу', 'ar' => 'أريد', 'az' => 'istəyirəm'],
        'give me' => ['es' => 'deme', 'de' => 'geben Sie mir', 'ja' => 'ください', 'ko' => '주세요', 'fr' => 'donnez-moi', 'tr' => 'bana ver', 'ru' => 'дайте мне', 'ar' => 'أعطني', 'az' => 'mənə ver'],
        'a' => ['es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의', 'fr' => 'un', 'tr' => 'bir', 'ru' => 'один', 'ar' => 'واحد', 'az' => 'bir'],
        'and' => ['es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'fr' => 'et', 'tr' => 've', 'ru' => 'и', 'ar' => 'و', 'az' => 'və'],
        'with' => ['es' => 'con', 'de' => 'mit', 'ja' => 'と一緒に', 'ko' => '와 함께', 'fr' => 'avec', 'tr' => 'ile', 'ru' => 'с', 'ar' => 'مع', 'az' => 'ilə'],
        'I' => ['es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '나', 'fr' => 'je', 'tr' => 'ben', 'ru' => 'я', 'ar' => 'أنا', 'az' => 'mən'],
        'the bill' => ['es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'fr' => "l'addition", 'tr' => 'hesap', 'ru' => 'счёт', 'ar' => 'الحساب', 'az' => 'hesab'],
        // --- Unit 2: colours & counting ---
        'book' => ['es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'fr' => 'livre', 'tr' => 'kitap', 'ru' => 'книга', 'ar' => 'كتاب', 'az' => 'kitab'],
        'pen' => ['es' => 'bolígrafo', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜', 'fr' => 'stylo', 'tr' => 'kalem', 'ru' => 'ручка', 'ar' => 'قلم', 'az' => 'qələm'],
        'red' => ['es' => 'rojo', 'de' => 'rot', 'ja' => '赤', 'ko' => '빨간색', 'fr' => 'rouge', 'tr' => 'kırmızı', 'ru' => 'красный', 'ar' => 'أحمر', 'az' => 'qırmızı'],
        'blue' => ['es' => 'azul', 'de' => 'blau', 'ja' => '青', 'ko' => '파란색', 'fr' => 'bleu', 'tr' => 'mavi', 'ru' => 'синий', 'ar' => 'أزرق', 'az' => 'mavi'],
        'green' => ['es' => 'verde', 'de' => 'grün', 'ja' => '緑', 'ko' => '초록색', 'fr' => 'vert', 'tr' => 'yeşil', 'ru' => 'зелёный', 'ar' => 'أخضر', 'az' => 'yaşıl'],
        'yellow' => ['es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色', 'ko' => '노란색', 'fr' => 'jaune', 'tr' => 'sarı', 'ru' => 'жёлтый', 'ar' => 'أصفر', 'az' => 'sarı'],
        'black' => ['es' => 'negro', 'de' => 'schwarz', 'ja' => '黒', 'ko' => '검은색', 'fr' => 'noir', 'tr' => 'siyah', 'ru' => 'чёрный', 'ar' => 'أسود', 'az' => 'qara'],
        'white' => ['es' => 'blanco', 'de' => 'weiß', 'ja' => '白', 'ko' => '하얀색', 'fr' => 'blanc', 'tr' => 'beyaz', 'ru' => 'белый', 'ar' => 'أبيض', 'az' => 'ağ'],
        'one' => ['es' => 'uno', 'de' => 'eins', 'ja' => '一', 'ko' => '하나', 'fr' => 'un', 'tr' => 'bir', 'ru' => 'один', 'ar' => 'واحد', 'az' => 'bir'],
        'two' => ['es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'fr' => 'deux', 'tr' => 'iki', 'ru' => 'два', 'ar' => 'اثنان', 'az' => 'iki'],
        'three' => ['es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'fr' => 'trois', 'tr' => 'üç', 'ru' => 'три', 'ar' => 'ثلاثة', 'az' => 'üç'],
        'four' => ['es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'fr' => 'quatre', 'tr' => 'dört', 'ru' => 'четыре', 'ar' => 'أربعة', 'az' => 'dörd'],
        'five' => ['es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'fr' => 'cinq', 'tr' => 'beş', 'ru' => 'пять', 'ar' => 'خمسة', 'az' => 'beş'],
        'six' => ['es' => 'seis', 'de' => 'sechs', 'ja' => '六', 'ko' => '여섯', 'fr' => 'six', 'tr' => 'altı', 'ru' => 'шесть', 'ar' => 'ستة', 'az' => 'altı'],
        'seven' => ['es' => 'siete', 'de' => 'sieben', 'ja' => '七', 'ko' => '일곱', 'fr' => 'sept', 'tr' => 'yedi', 'ru' => 'семь', 'ar' => 'سبعة', 'az' => 'yeddi'],
        'eight' => ['es' => 'ocho', 'de' => 'acht', 'ja' => '八', 'ko' => '여덟', 'fr' => 'huit', 'tr' => 'sekiz', 'ru' => 'восемь', 'ar' => 'ثمانية', 'az' => 'səkkiz'],
        'nine' => ['es' => 'nueve', 'de' => 'neun', 'ja' => '九', 'ko' => '아홉', 'fr' => 'neuf', 'tr' => 'dokuz', 'ru' => 'девять', 'ar' => 'تسعة', 'az' => 'doqquz'],
        'ten' => ['es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'fr' => 'dix', 'tr' => 'on', 'ru' => 'десять', 'ar' => 'عشرة', 'az' => 'on'],
        'two books' => ['es' => 'dos libros', 'de' => 'zwei Bücher', 'ja' => '二冊の本', 'ko' => '책 두 권', 'fr' => 'deux livres', 'tr' => 'iki kitap', 'ru' => 'два книги', 'ar' => 'اثنان كتب', 'az' => 'iki kitablar'],
        // --- Unit 3: family & people ---
        'mother' => ['es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'fr' => 'mère', 'tr' => 'anne', 'ru' => 'мама', 'ar' => 'أم', 'az' => 'ana'],
        'father' => ['es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'fr' => 'père', 'tr' => 'baba', 'ru' => 'папа', 'ar' => 'أب', 'az' => 'ata'],
        'brother' => ['es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'fr' => 'frère', 'tr' => 'erkek kardeş', 'ru' => 'брат', 'ar' => 'أخ', 'az' => 'qardaş'],
        'sister' => ['es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매', 'fr' => 'sœur', 'tr' => 'kız kardeş', 'ru' => 'сестра', 'ar' => 'أخت', 'az' => 'bacı'],
        'friend' => ['es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'fr' => 'ami', 'tr' => 'arkadaş', 'ru' => 'друг', 'ar' => 'صديق', 'az' => 'dost'],
        'neighbour' => ['es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'fr' => 'voisin', 'tr' => 'komşu', 'ru' => 'сосед', 'ar' => 'جار', 'az' => 'qonşu'],
        'teacher' => ['es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'fr' => 'professeur', 'tr' => 'öğretmen', 'ru' => 'учитель', 'ar' => 'معلم', 'az' => 'müəllim'],
        'doctor' => ['es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'fr' => 'médecin', 'tr' => 'doktor', 'ru' => 'врач', 'ar' => 'طبيب', 'az' => 'həkim'],
        'my' => ['es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '나의', 'fr' => 'mon', 'tr' => 'benim', 'ru' => 'мой', 'ar' => 'خاصتي', 'az' => 'mənim'],
        'is' => ['es' => 'es', 'de' => 'ist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'est', 'tr' => 'dır', 'ru' => 'есть', 'ar' => 'يكون', 'az' => 'olmaq'],
        'this is' => ['es' => 'este es', 'de' => 'das ist', 'ja' => 'これは', 'ko' => '이분은', 'fr' => "c'est", 'tr' => 'bu', 'ru' => 'это', 'ar' => 'هذا', 'az' => 'bu'],
        'also' => ['es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한', 'fr' => 'aussi', 'tr' => 'de', 'ru' => 'тоже', 'ar' => 'أيضا', 'az' => 'həmçinin'],
        'he is' => ['es' => 'él es', 'de' => 'er ist', 'ja' => '彼は', 'ko' => '그는', 'fr' => 'il est', 'tr' => 'o', 'ru' => 'он', 'ar' => 'هو', 'az' => 'o'],
        'she is' => ['es' => 'ella es', 'de' => 'sie ist', 'ja' => '彼女は', 'ko' => '그녀는', 'fr' => 'elle est', 'tr' => 'o', 'ru' => 'она', 'ar' => 'هي', 'az' => 'o qadın'],
        'who' => ['es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'fr' => 'qui', 'tr' => 'kim', 'ru' => 'кто', 'ar' => 'مَن', 'az' => 'kim'],
        'very' => ['es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '매우', 'fr' => 'très', 'tr' => 'çok', 'ru' => 'очень', 'ar' => 'جدا', 'az' => 'çox'],
        'but' => ['es' => 'pero', 'de' => 'aber', 'ja' => 'しかし', 'ko' => '하지만', 'fr' => 'mais', 'tr' => 'ama', 'ru' => 'но', 'ar' => 'لكن', 'az' => 'amma'],
        'or' => ['es' => 'o', 'de' => 'oder', 'ja' => 'または', 'ko' => '또는', 'fr' => 'ou', 'tr' => 'veya', 'ru' => 'или', 'ar' => 'أو', 'az' => 'və ya'],
        'well' => ['es' => 'bien', 'de' => 'gut', 'ja' => '元気', 'ko' => '잘', 'fr' => 'bien', 'tr' => 'iyi', 'ru' => 'хорошо', 'ar' => 'بخير', 'az' => 'yaxşıyam'],
        'am' => ['es' => 'estoy', 'de' => 'bin', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'suis', 'tr' => 'im', 'ru' => 'есть', 'ar' => 'يكون', 'az' => 'olmaq'],
        'are' => ['es' => 'estás', 'de' => 'bist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'es', 'tr' => 'sin', 'ru' => 'есть', 'ar' => 'يكون', 'az' => 'olmaq'],
        'you' => ['es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '당신', 'fr' => 'tu', 'tr' => 'sen', 'ru' => 'ты', 'ar' => 'أنت', 'az' => 'sən'],
        'your' => ['es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의', 'fr' => 'ton', 'tr' => 'senin', 'ru' => 'твой', 'ar' => 'خاصتك', 'az' => 'sənin'],
        'name' => ['es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름', 'fr' => 'nom', 'tr' => 'ad', 'ru' => 'имя', 'ar' => 'اسم', 'az' => 'ad'],
        // --- Unit 4: home & objects ---
        'table' => ['es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '탁자', 'fr' => 'table', 'tr' => 'masa', 'ru' => 'стол', 'ar' => 'طاولة', 'az' => 'masa'],
        'chair' => ['es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'fr' => 'chaise', 'tr' => 'sandalye', 'ru' => 'стул', 'ar' => 'كرسي', 'az' => 'stul'],
        'house' => ['es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'fr' => 'maison', 'tr' => 'ev', 'ru' => 'дом', 'ar' => 'بيت', 'az' => 'ev'],
        'cat' => ['es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'fr' => 'chat', 'tr' => 'kedi', 'ru' => 'кот', 'ar' => 'قط', 'az' => 'pişik'],
        'dog' => ['es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'fr' => 'chien', 'tr' => 'köpek', 'ru' => 'собака', 'ar' => 'كلب', 'az' => 'it'],
        'the' => ['es' => 'el', 'de' => 'der', 'ja' => 'その', 'ko' => '그', 'fr' => 'le', 'tr' => 'o', 'ru' => 'этот', 'ar' => 'هذا', 'az' => 'həmin'],
        'in' => ['es' => 'en', 'de' => 'in', 'ja' => 'の中に', 'ko' => '안에', 'fr' => 'dans', 'tr' => 'içinde', 'ru' => 'в', 'ar' => 'في', 'az' => 'içində'],
        'on' => ['es' => 'sobre', 'de' => 'auf', 'ja' => 'の上に', 'ko' => '위에', 'fr' => 'sur', 'tr' => 'üzerinde', 'ru' => 'на', 'ar' => 'على', 'az' => 'üzərində'],
        'under' => ['es' => 'debajo', 'de' => 'unter', 'ja' => 'の下に', 'ko' => '아래에', 'fr' => 'sous', 'tr' => 'altında', 'ru' => 'под', 'ar' => 'تحت', 'az' => 'altında'],
        'I have' => ['es' => 'tengo', 'de' => 'ich habe', 'ja' => '私は持っている', 'ko' => '나는 가지고 있다', 'fr' => "j'ai", 'tr' => 'var', 'ru' => 'у меня', 'ar' => 'عندي', 'az' => 'məndə var'],
        'where is' => ['es' => 'dónde está', 'de' => 'wo ist', 'ja' => 'どこですか', 'ko' => '어디입니까', 'fr' => 'où est', 'tr' => 'nerede', 'ru' => 'где', 'ar' => 'أين', 'az' => 'harada'],
        'here is' => ['es' => 'aquí está', 'de' => 'hier ist', 'ja' => 'これが', 'ko' => '여기', 'fr' => 'voici', 'tr' => 'işte', 'ru' => 'здесь', 'ar' => 'هنا', 'az' => 'burada'],
        // --- Unit 5: days & time ---
        'morning' => ['es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'fr' => 'matin', 'tr' => 'sabah', 'ru' => 'утро', 'ar' => 'صباح', 'az' => 'səhər'],
        'evening' => ['es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'fr' => 'soir', 'tr' => 'akşam', 'ru' => 'вечер', 'ar' => 'مساء', 'az' => 'axşam'],
        'night' => ['es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'fr' => 'nuit', 'tr' => 'gece', 'ru' => 'ночь', 'ar' => 'ليل', 'az' => 'gecə'],
        'clock' => ['es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'fr' => 'horloge', 'tr' => 'saat', 'ru' => 'часы', 'ar' => 'ساعة', 'az' => 'saat'],
        'calendar' => ['es' => 'calendario', 'de' => 'Kalender', 'ja' => 'カレンダー', 'ko' => '달력', 'fr' => 'calendrier', 'tr' => 'takvim', 'ru' => 'календарь', 'ar' => 'تقويم', 'az' => 'təqvim'],
        'Monday' => ['es' => 'lunes', 'de' => 'Montag', 'ja' => '月曜日', 'ko' => '월요일', 'fr' => 'lundi', 'tr' => 'pazartesi', 'ru' => 'понедельник', 'ar' => 'الاثنين', 'az' => 'bazar ertəsi'],
        'Tuesday' => ['es' => 'martes', 'de' => 'Dienstag', 'ja' => '火曜日', 'ko' => '화요일', 'fr' => 'mardi', 'tr' => 'salı', 'ru' => 'вторник', 'ar' => 'الثلاثاء', 'az' => 'çərşənbə axşamı'],
        'today' => ['es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'fr' => "aujourd'hui", 'tr' => 'bugün', 'ru' => 'сегодня', 'ar' => 'اليوم', 'az' => 'bu gün'],
        'tomorrow' => ['es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'fr' => 'demain', 'tr' => 'yarın', 'ru' => 'завтра', 'ar' => 'غدا', 'az' => 'sabah'],
        'week' => ['es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'fr' => 'semaine', 'tr' => 'hafta', 'ru' => 'неделя', 'ar' => 'أسبوع', 'az' => 'həftə'],
        'hour' => ['es' => 'hora', 'de' => 'Stunde', 'ja' => '時間', 'ko' => '시간', 'fr' => 'heure', 'tr' => 'saat', 'ru' => 'час', 'ar' => 'ساعة', 'az' => 'saat'],
        'day' => ['es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'fr' => 'jour', 'tr' => 'gün', 'ru' => 'день', 'ar' => 'يوم', 'az' => 'gün'],
        // --- Unit 6: everyday verbs ---
        'eat' => ['es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'fr' => 'manger', 'tr' => 'ye', 'ru' => 'ем', 'ar' => 'آكل', 'az' => 'yeyirəm'],
        'drink' => ['es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'fr' => 'boire', 'tr' => 'iç', 'ru' => 'напиток', 'ar' => 'مشروب', 'az' => 'içki'],
        'walk' => ['es' => 'caminar', 'de' => 'gehen', 'ja' => '歩く', 'ko' => '걷다', 'fr' => 'marcher', 'tr' => 'yürü', 'ru' => 'гуляю', 'ar' => 'أتمشى', 'az' => 'gəzirəm'],
        'speak' => ['es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'fr' => 'parler', 'tr' => 'konuş', 'ru' => 'говорю', 'ar' => 'أتكلم', 'az' => 'danışıram'],
        'sleep' => ['es' => 'dormir', 'de' => 'schlafen', 'ja' => '眠る', 'ko' => '자다', 'fr' => 'dormir', 'tr' => 'uyu', 'ru' => 'сплю', 'ar' => 'أنام', 'az' => 'yatıram'],
        'read' => ['es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'fr' => 'lire', 'tr' => 'oku', 'ru' => 'читаю', 'ar' => 'أقرأ', 'az' => 'oxuyuram'],
        'slowly' => ['es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'fr' => 'lentement', 'tr' => 'yavaş', 'ru' => 'медленно', 'ar' => 'ببطء', 'az' => 'yavaş'],
        'now' => ['es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'fr' => 'maintenant', 'tr' => 'şimdi', 'ru' => 'сейчас', 'ar' => 'الآن', 'az' => 'indi'],
        'too much' => ['es' => 'demasiado', 'de' => 'zu viel', 'ja' => 'すぎます', 'ko' => '너무', 'fr' => 'trop', 'tr' => 'çok fazla', 'ru' => 'слишком много', 'ar' => 'كثير جدا', 'az' => 'çox artıq'],
        'together' => ['es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '함께', 'fr' => 'ensemble', 'tr' => 'birlikte', 'ru' => 'вместе', 'ar' => 'معا', 'az' => 'birlikdə'],
        // --- Unit 7: describing things ---
        'big' => ['es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'fr' => 'grand', 'tr' => 'büyük', 'ru' => 'большой', 'ar' => 'كبير', 'az' => 'böyük'],
        'small' => ['es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'fr' => 'petit', 'tr' => 'küçük', 'ru' => 'маленький', 'ar' => 'صغير', 'az' => 'kiçik'],
        'hot' => ['es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운', 'fr' => 'chaud', 'tr' => 'sıcak', 'ru' => 'горячий', 'ar' => 'ساخن', 'az' => 'isti'],
        'cold' => ['es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운', 'fr' => 'froid', 'tr' => 'soğuk', 'ru' => 'холодный', 'ar' => 'بارد', 'az' => 'soyuq'],
        'beautiful' => ['es' => 'hermoso', 'de' => 'schön', 'ja' => '美しい', 'ko' => '아름다운', 'fr' => 'beau', 'tr' => 'güzel', 'ru' => 'красивый', 'ar' => 'جميل', 'az' => 'gözəl'],
        'pretty' => ['es' => 'bonito', 'de' => 'hübsch', 'ja' => 'かわいい', 'ko' => '예쁜', 'fr' => 'joli', 'tr' => 'güzel', 'ru' => 'красивый', 'ar' => 'جميل', 'az' => 'gözəl'],
        'easy' => ['es' => 'fácil', 'de' => 'einfach', 'ja' => '簡単', 'ko' => '쉬운', 'fr' => 'facile', 'tr' => 'kolay', 'ru' => 'легко', 'ar' => 'سهل', 'az' => 'asan'],
        'hard' => ['es' => 'difícil', 'de' => 'schwer', 'ja' => '難しい', 'ko' => '어려운', 'fr' => 'difficile', 'tr' => 'zor', 'ru' => 'трудно', 'ar' => 'صعب', 'az' => 'çətin'],
        'good' => ['es' => 'bueno', 'de' => 'gut', 'ja' => '良い', 'ko' => '좋은', 'fr' => 'bon', 'tr' => 'iyi', 'ru' => 'хороший', 'ar' => 'جيد', 'az' => 'yaxşı'],
        'new' => ['es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새로운', 'fr' => 'nouveau', 'tr' => 'yeni', 'ru' => 'новый', 'ar' => 'جديد', 'az' => 'yeni'],
        'old' => ['es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'fr' => 'vieux', 'tr' => 'eski', 'ru' => 'старый', 'ar' => 'قديم', 'az' => 'köhnə'],
        // --- Unit 8: places in town ---
        'town' => ['es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'fr' => 'ville', 'tr' => 'şehir', 'ru' => 'город', 'ar' => 'بلدة', 'az' => 'qəsəbə'],
        'village' => ['es' => 'pueblo', 'de' => 'Dorf', 'ja' => '村', 'ko' => '마을', 'fr' => 'village', 'tr' => 'köy', 'ru' => 'деревня', 'ar' => 'قرية', 'az' => 'kənd'],
        'school' => ['es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'fr' => 'école', 'tr' => 'okul', 'ru' => 'школа', 'ar' => 'مدرسة', 'az' => 'məktəb'],
        'park' => ['es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'fr' => 'parc', 'tr' => 'park', 'ru' => 'парк', 'ar' => 'حديقة', 'az' => 'park'],
        'shop' => ['es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'fr' => 'magasin', 'tr' => 'dükkan', 'ru' => 'магазин', 'ar' => 'متجر', 'az' => 'mağaza'],
        'street' => ['es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'fr' => 'rue', 'tr' => 'cadde', 'ru' => 'улица', 'ar' => 'شارع', 'az' => 'küçə'],
        'station' => ['es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'fr' => 'gare', 'tr' => 'istasyon', 'ru' => 'станция', 'ar' => 'محطة', 'az' => 'stansiya'],
        'near' => ['es' => 'cerca', 'de' => 'nah', 'ja' => '近く', 'ko' => '가까이', 'fr' => 'près', 'tr' => 'yakın', 'ru' => 'близко', 'ar' => 'قريب', 'az' => 'yaxın'],
        'far' => ['es' => 'lejos', 'de' => 'weit', 'ja' => '遠く', 'ko' => '멀리', 'fr' => 'loin', 'tr' => 'uzak', 'ru' => 'далеко', 'ar' => 'بعيد', 'az' => 'uzaq'],
        'go' => ['es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'fr' => 'aller', 'tr' => 'git', 'ru' => 'иду', 'ar' => 'أذهب', 'az' => 'gedirəm'],
        'come' => ['es' => 'venir', 'de' => 'kommen', 'ja' => '来る', 'ko' => '오다', 'fr' => 'venir', 'tr' => 'gel', 'ru' => 'приходи', 'ar' => 'تعال', 'az' => 'gəl'],
        'left' => ['es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'fr' => 'gauche', 'tr' => 'sol', 'ru' => 'левый', 'ar' => 'يسار', 'az' => 'sol'],
        'right' => ['es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'fr' => 'droite', 'tr' => 'sağ', 'ru' => 'правый', 'ar' => 'يمين', 'az' => 'sağ'],
        'open' => ['es' => 'abierto', 'de' => 'offen', 'ja' => '開いた', 'ko' => '열린', 'fr' => 'ouvert', 'tr' => 'açık', 'ru' => 'открыто', 'ar' => 'مفتوح', 'az' => 'açıq'],
        'closed' => ['es' => 'cerrado', 'de' => 'geschlossen', 'ja' => '閉じた', 'ko' => '닫힌', 'fr' => 'fermé', 'tr' => 'kapalı', 'ru' => 'закрыто', 'ar' => 'مغلق', 'az' => 'bağlı'],
        'here' => ['es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기', 'fr' => 'ici', 'tr' => 'burada', 'ru' => 'здесь', 'ar' => 'هنا', 'az' => 'burada'],
        'to' => ['es' => 'a', 'de' => 'zu', 'ja' => 'へ', 'ko' => '로', 'fr' => 'à', 'tr' => 'e', 'ru' => 'в', 'ar' => 'إلى', 'az' => 'doğru'],
        'of' => ['es' => 'de', 'de' => 'von', 'ja' => 'の', 'ko' => '의', 'fr' => 'de', 'tr' => 'in', 'ru' => 'из', 'ar' => 'من', 'az' => 'ın'],
        'at' => ['es' => 'en', 'de' => 'an', 'ja' => 'で', 'ko' => '에서', 'fr' => 'à', 'tr' => 'de', 'ru' => 'на', 'ar' => 'على', 'az' => 'yanında'],
        'for' => ['es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'fr' => 'pour', 'tr' => 'için', 'ru' => 'для', 'ar' => 'لأجل', 'az' => 'üçün'],
        'me' => ['es' => 'me', 'de' => 'mich', 'ja' => '私', 'ko' => '저', 'fr' => 'moi', 'tr' => 'ben', 'ru' => 'меня', 'ar' => 'لي', 'az' => 'mənə'],
        'it' => ['es' => 'eso', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것', 'fr' => 'ce', 'tr' => 'o', 'ru' => 'оно', 'ar' => 'هو', 'az' => 'o'],
        'from' => ['es' => 'de', 'de' => 'von', 'ja' => 'から', 'ko' => '에서', 'fr' => 'de', 'tr' => 'den', 'ru' => 'из', 'ar' => 'من', 'az' => 'dan'],
        // --- Unit 9: weather & seasons ---
        'rain' => ['es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'fr' => 'pluie', 'tr' => 'yağmur', 'ru' => 'дождь', 'ar' => 'مطر', 'az' => 'yağış'],
        'snow' => ['es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'fr' => 'neige', 'tr' => 'kar', 'ru' => 'снег', 'ar' => 'ثلج', 'az' => 'qar'],
        'wind' => ['es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'fr' => 'vent', 'tr' => 'rüzgâr', 'ru' => 'ветер', 'ar' => 'ريح', 'az' => 'külək'],
        'sun' => ['es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '해', 'fr' => 'soleil', 'tr' => 'güneş', 'ru' => 'солнце', 'ar' => 'شمس', 'az' => 'günəş'],
        'sky' => ['es' => 'cielo', 'de' => 'Himmel', 'ja' => '空', 'ko' => '하늘', 'fr' => 'ciel', 'tr' => 'gökyüzü', 'ru' => 'небо', 'ar' => 'سماء', 'az' => 'göy'],
        'cloud' => ['es' => 'nube', 'de' => 'Wolke', 'ja' => '雲', 'ko' => '구름', 'fr' => 'nuage', 'tr' => 'bulut', 'ru' => 'облако', 'ar' => 'سحابة', 'az' => 'bulud'],
        'spring' => ['es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'fr' => 'printemps', 'tr' => 'ilkbahar', 'ru' => 'весна', 'ar' => 'ربيع', 'az' => 'yaz'],
        'summer' => ['es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'fr' => 'été', 'tr' => 'yaz', 'ru' => 'лето', 'ar' => 'صيف', 'az' => 'yay'],
        'autumn' => ['es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'fr' => 'automne', 'tr' => 'sonbahar', 'ru' => 'осень', 'ar' => 'خريف', 'az' => 'payız'],
        'winter' => ['es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'fr' => 'hiver', 'tr' => 'kış', 'ru' => 'зима', 'ar' => 'شتاء', 'az' => 'qış'],
        'weather' => ['es' => 'tiempo', 'de' => 'Wetter', 'ja' => '天気', 'ko' => '날씨', 'fr' => 'temps', 'tr' => 'hava', 'ru' => 'погода', 'ar' => 'طقس', 'az' => 'hava'],
        'warm' => ['es' => 'cálido', 'de' => 'warm', 'ja' => '暖かい', 'ko' => '따뜻한', 'fr' => 'doux', 'tr' => 'sıcak', 'ru' => 'тёплый', 'ar' => 'دافئ', 'az' => 'isti'],
        'season' => ['es' => 'estación', 'de' => 'Jahreszeit', 'ja' => '季節', 'ko' => '계절', 'fr' => 'saison', 'tr' => 'mevsim', 'ru' => 'сезон', 'ar' => 'موسم', 'az' => 'mövsüm'],
        // --- Unit 10: grammar — a, the, this, these ---
        'an' => ['es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의', 'fr' => 'un', 'tr' => 'bir', 'ru' => 'один', 'ar' => 'واحد', 'az' => 'bir'],
        'this' => ['es' => 'este', 'de' => 'dieser', 'ja' => 'この', 'ko' => '이', 'fr' => 'ce', 'tr' => 'bu', 'ru' => 'это', 'ar' => 'هذا', 'az' => 'bu'],
        'that' => ['es' => 'ese', 'de' => 'jener', 'ja' => 'あの', 'ko' => '저', 'fr' => 'cette', 'tr' => 'o', 'ru' => 'тот', 'ar' => 'ذلك', 'az' => 'o'],
        'these' => ['es' => 'estos', 'de' => 'diese', 'ja' => 'これらの', 'ko' => '이것들', 'fr' => 'ces', 'tr' => 'bunlar', 'ru' => 'эти', 'ar' => 'هذه', 'az' => 'bunlar'],
        'those' => ['es' => 'esos', 'de' => 'jene', 'ja' => 'あれらの', 'ko' => '저것들', 'fr' => 'ces', 'tr' => 'onlar', 'ru' => 'те', 'ar' => 'تلك', 'az' => 'onlar'],
        'some' => ['es' => 'algo de', 'de' => 'etwas', 'ja' => '少しの', 'ko' => '약간의', 'fr' => 'du', 'tr' => 'biraz', 'ru' => 'немного', 'ar' => 'بعض', 'az' => 'bir az'],
        'books' => ['es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'fr' => 'livres', 'tr' => 'kitaplar', 'ru' => 'книги', 'ar' => 'كتب', 'az' => 'kitablar'],
        'pens' => ['es' => 'bolígrafos', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜들', 'fr' => 'stylos', 'tr' => 'kalemler', 'ru' => 'ручки', 'ar' => 'أقلام', 'az' => 'qələmlər'],
        'cats' => ['es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이들', 'fr' => 'chats', 'tr' => 'kediler', 'ru' => 'коты', 'ar' => 'قطط', 'az' => 'pişiklər'],
        'dogs' => ['es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개들', 'fr' => 'chiens', 'tr' => 'köpekler', 'ru' => 'собаки', 'ar' => 'كلاب', 'az' => 'itlər'],
        'apple' => ['es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'fr' => 'pomme', 'tr' => 'elma', 'ru' => 'яблоко', 'ar' => 'تفاحة', 'az' => 'alma'],
        // === Chapter 2: Conversation ===

        // --- Unit 1: introducing yourself ---
        'I am' => ['es' => 'soy', 'de' => 'ich bin', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'je suis', 'tr' => 'ben', 'ru' => 'я', 'ar' => 'أنا', 'az' => 'mən'],
        'you are' => ['es' => 'eres', 'de' => 'du bist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'tu es', 'tr' => 'sensin', 'ru' => 'ты', 'ar' => 'أنت', 'az' => 'sən'],
        'I live' => ['es' => 'vivo', 'de' => 'ich wohne', 'ja' => '私は住んでいる', 'ko' => '나는 삽니다', 'fr' => "j'habite", 'tr' => 'yaşıyorum', 'ru' => 'я живу', 'ar' => 'أسكن', 'az' => 'yaşayıram'],
        'city' => ['es' => 'ciudad', 'de' => 'Stadt', 'ja' => '都市', 'ko' => '도시', 'fr' => 'ville', 'tr' => 'şehir', 'ru' => 'город', 'ar' => 'مدينة', 'az' => 'şəhər'],
        'age' => ['es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'fr' => 'âge', 'tr' => 'yaş', 'ru' => 'возраст', 'ar' => 'عمر', 'az' => 'yaş'],
        'years old' => ['es' => 'años', 'de' => 'Jahre alt', 'ja' => '歳', 'ko' => '살', 'fr' => 'ans', 'tr' => 'yaşında', 'ru' => 'лет старый', 'ar' => 'سنوات قديم', 'az' => 'yaşında köhnə'],
        'nice to meet you' => ['es' => 'encantado', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '반갑습니다', 'fr' => 'enchanté', 'tr' => 'memnun oldum', 'ru' => 'приятно познакомиться', 'ar' => 'تشرفنا', 'az' => 'tanış olmağa şadam'],
        'welcome' => ['es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'fr' => 'bienvenue', 'tr' => 'hoş geldin', 'ru' => 'добро пожаловать', 'ar' => 'أهلا وسهلا', 'az' => 'xoş gəlmisiniz'],
        // --- Unit 2: asking questions ---
        'how are you' => ['es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => 'お元気ですか', 'ko' => '어떻게 지내세요', 'fr' => 'comment ça va', 'tr' => 'nasılsın', 'ru' => 'как дела', 'ar' => 'كيف حالك', 'az' => 'necəsən'],
        'where' => ['es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'fr' => 'où', 'tr' => 'nerede', 'ru' => 'где', 'ar' => 'أين', 'az' => 'harada'],
        'which' => ['es' => 'cuál', 'de' => 'welcher', 'ja' => 'どれ', 'ko' => '어느', 'fr' => 'quel', 'tr' => 'hangi', 'ru' => 'какой', 'ar' => 'أي', 'az' => 'hansı'],
        'how many' => ['es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇 개', 'fr' => 'combien', 'tr' => 'kaç', 'ru' => 'сколько', 'ar' => 'كم', 'az' => 'neçə'],
        'when' => ['es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'fr' => 'quand', 'tr' => 'ne zaman', 'ru' => 'когда', 'ar' => 'متى', 'az' => 'nə vaxt'],
        'why' => ['es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'fr' => 'pourquoi', 'tr' => 'neden', 'ru' => 'почему', 'ar' => 'لماذا', 'az' => 'niyə'],
        'maybe' => ['es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도', 'fr' => 'peut-être', 'tr' => 'belki', 'ru' => 'может быть', 'ar' => 'ربما', 'az' => 'bəlkə'],
        'of course' => ['es' => 'por supuesto', 'de' => 'natürlich', 'ja' => 'もちろん', 'ko' => '물론', 'fr' => 'bien sûr', 'tr' => 'elbette', 'ru' => 'конечно', 'ar' => 'بالطبع', 'az' => 'əlbəttə'],
        // --- Unit 3: making plans ---
        "let's go" => ['es' => 'vamos', 'de' => 'lass uns gehen', 'ja' => '行きましょう', 'ko' => '갑시다', 'fr' => 'allons-y', 'tr' => 'gidelim', 'ru' => 'пойдём', 'ar' => 'هيا بنا', 'az' => 'gedək'],
        'soon' => ['es' => 'pronto', 'de' => 'bald', 'ja' => 'すぐに', 'ko' => '곧', 'fr' => 'bientôt', 'tr' => 'yakında', 'ru' => 'скоро', 'ar' => 'قريبا', 'az' => 'tezliklə'],
        'tonight' => ['es' => 'esta noche', 'de' => 'heute Abend', 'ja' => '今夜', 'ko' => '오늘 밤', 'fr' => 'ce soir', 'tr' => 'bu akşam', 'ru' => 'сегодня вечером', 'ar' => 'الليلة', 'az' => 'bu axşam'],
        'okay' => ['es' => 'vale', 'de' => 'okay', 'ja' => 'いいよ', 'ko' => '좋아요', 'fr' => "d'accord", 'tr' => 'tamam', 'ru' => 'хорошо', 'ar' => 'حسنا', 'az' => 'yaxşı'],
        'then' => ['es' => 'entonces', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그러면', 'fr' => 'ensuite', 'tr' => 'sonra', 'ru' => 'потом', 'ar' => 'ثم', 'az' => 'sonra'],
        'later' => ['es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에', 'fr' => 'plus tard', 'tr' => 'sonra', 'ru' => 'позже', 'ar' => 'لاحقا', 'az' => 'sonradan'],
        'really' => ['es' => 'de verdad', 'de' => 'wirklich', 'ja' => '本当に', 'ko' => '정말', 'fr' => 'vraiment', 'tr' => 'gerçekten', 'ru' => 'действительно', 'ar' => 'حقا', 'az' => 'həqiqətən'],
        'watch' => ['es' => 'mirar', 'de' => 'schauen', 'ja' => '見る', 'ko' => '보다', 'fr' => 'regarder', 'tr' => 'izle', 'ru' => 'смотри', 'ar' => 'شاهد', 'az' => 'izlə'],
        'film' => ['es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'fr' => 'film', 'tr' => 'film', 'ru' => 'фильм', 'ar' => 'فيلم', 'az' => 'film'],
        // --- Unit 4: feelings ---
        'happy' => ['es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せ', 'ko' => '행복한', 'fr' => 'heureux', 'tr' => 'mutlu', 'ru' => 'счастливый', 'ar' => 'فرح', 'az' => 'xoşbəxt'],
        'sad' => ['es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'fr' => 'triste', 'tr' => 'üzgün', 'ru' => 'грустный', 'ar' => 'حزين', 'az' => 'kədərli'],
        'tired' => ['es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'fr' => 'fatigué', 'tr' => 'yorgun', 'ru' => 'усталый', 'ar' => 'متعب', 'az' => 'yorğun'],
        'sick' => ['es' => 'enfermo', 'de' => 'krank', 'ja' => '病気', 'ko' => '아픈', 'fr' => 'malade', 'tr' => 'hasta', 'ru' => 'больной', 'ar' => 'مريض', 'az' => 'xəstə'],
        'glad' => ['es' => 'contento', 'de' => 'froh', 'ja' => '嬉しい', 'ko' => '기쁜', 'fr' => 'content', 'tr' => 'memnun', 'ru' => 'рада', 'ar' => 'سعيد', 'az' => 'şad'],
        'calm' => ['es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '落ち着いた', 'ko' => '차분한', 'fr' => 'calme', 'tr' => 'sakin', 'ru' => 'спокойный', 'ar' => 'هادئ', 'az' => 'sakit'],
        'a little' => ['es' => 'un poco', 'de' => 'ein bisschen', 'ja' => '少し', 'ko' => '조금', 'fr' => 'un peu', 'tr' => 'biraz', 'ru' => 'немного', 'ar' => 'قليل', 'az' => 'az'],
        'because' => ['es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'fr' => 'parce que', 'tr' => 'çünkü', 'ru' => 'потому что', 'ar' => 'لأن', 'az' => 'çünki'],
        'I feel' => ['es' => 'me siento', 'de' => 'ich fühle mich', 'ja' => '私は感じる', 'ko' => '나는 느낍니다', 'fr' => 'je me sens', 'tr' => 'hissediyorum', 'ru' => 'я чувствую', 'ar' => 'أشعر', 'az' => 'hiss edirəm'],
        // --- Unit 5: the past ---
        'yesterday' => ['es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'fr' => 'hier', 'tr' => 'dün', 'ru' => 'вчера', 'ar' => 'أمس', 'az' => 'dünən'],
        'I ate' => ['es' => 'comí', 'de' => 'ich aß', 'ja' => '私は食べた', 'ko' => '나는 먹었다', 'fr' => "j'ai mangé", 'tr' => 'yedim', 'ru' => 'я ел', 'ar' => 'أكلت', 'az' => 'yedim'],
        'I drank' => ['es' => 'bebí', 'de' => 'ich trank', 'ja' => '私は飲んだ', 'ko' => '나는 마셨다', 'fr' => "j'ai bu", 'tr' => 'içtim', 'ru' => 'я пил', 'ar' => 'شربت', 'az' => 'içdim'],
        'it was' => ['es' => 'fue', 'de' => 'es war', 'ja' => 'でした', 'ko' => '였습니다', 'fr' => "c'était", 'tr' => 'idi', 'ru' => 'было', 'ar' => 'كان', 'az' => 'idi'],
        'I saw' => ['es' => 'vi', 'de' => 'ich sah', 'ja' => '私は見た', 'ko' => '나는 보았다', 'fr' => "j'ai vu", 'tr' => 'gördüm', 'ru' => 'я видел', 'ar' => 'رأيت', 'az' => 'gördüm'],
        'already' => ['es' => 'ya', 'de' => 'schon', 'ja' => 'もう', 'ko' => '이미', 'fr' => 'déjà', 'tr' => 'zaten', 'ru' => 'уже', 'ar' => 'بالفعل', 'az' => 'artıq'],
        'I was' => ['es' => 'estaba', 'de' => 'ich war', 'ja' => 'でした', 'ko' => '였습니다', 'fr' => "j'étais", 'tr' => 'idim', 'ru' => 'я был', 'ar' => 'كنت', 'az' => 'idim'],
        // --- Unit 6: future plans ---
        'I am going' => ['es' => 'voy', 'de' => 'ich gehe', 'ja' => '私は行く', 'ko' => '나는 갈 것이다', 'fr' => 'je vais', 'tr' => 'gidiyorum', 'ru' => 'я иду', 'ar' => 'أذهب', 'az' => 'gedirəm'],
        'before' => ['es' => 'antes', 'de' => 'vor', 'ja' => '前に', 'ko' => '전에', 'fr' => 'avant', 'tr' => 'önce', 'ru' => 'до', 'ar' => 'قبل', 'az' => 'əvvəl'],
        'after' => ['es' => 'después', 'de' => 'nach', 'ja' => '後に', 'ko' => '후에', 'fr' => 'après', 'tr' => 'sonra', 'ru' => 'после', 'ar' => 'بعد', 'az' => 'sonra'],
        'I want' => ['es' => 'quiero', 'de' => 'ich will', 'ja' => 'たいです', 'ko' => '나는 원한다', 'fr' => 'je veux', 'tr' => 'istiyorum', 'ru' => 'я хочу', 'ar' => 'أريد', 'az' => 'istəyirəm'],
        'I can' => ['es' => 'puedo', 'de' => 'ich kann', 'ja' => '私はできる', 'ko' => '나는 할 수 있다', 'fr' => 'je peux', 'tr' => 'yapabilirim', 'ru' => 'я могу', 'ar' => 'أنا أستطيع', 'az' => 'mən bacarıram'],
        'ready' => ['es' => 'listo', 'de' => 'bereit', 'ja' => '準備ができた', 'ko' => '준비된', 'fr' => 'prêt', 'tr' => 'hazır', 'ru' => 'готов', 'ar' => 'جاهز', 'az' => 'hazır'],
        'free' => ['es' => 'libre', 'de' => 'frei', 'ja' => '暇', 'ko' => '한가한', 'fr' => 'libre', 'tr' => 'boş', 'ru' => 'бесплатно', 'ar' => 'مجاني', 'az' => 'pulsuz'],
        'next' => ['es' => 'próximo', 'de' => 'nächste', 'ja' => '次の', 'ko' => '다음', 'fr' => 'prochain', 'tr' => 'sonraki', 'ru' => 'следующий', 'ar' => 'التالي', 'az' => 'növbəti'],
        // --- Unit 7: giving directions ---
        'straight' => ['es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '똑바로', 'fr' => 'tout droit', 'tr' => 'düz', 'ru' => 'прямо', 'ar' => 'مباشرة', 'az' => 'düz'],
        'turn' => ['es' => 'girar', 'de' => 'abbiegen', 'ja' => '曲がる', 'ko' => '돌다', 'fr' => 'tourner', 'tr' => 'dön', 'ru' => 'поворот', 'ar' => 'منعطف', 'az' => 'dönüş'],
        'cross' => ['es' => 'cruzar', 'de' => 'überqueren', 'ja' => '渡る', 'ko' => '건너다', 'fr' => 'traverser', 'tr' => 'geç', 'ru' => 'перейди', 'ar' => 'اعبر', 'az' => 'keç'],
        'continue' => ['es' => 'continuar', 'de' => 'weitergehen', 'ja' => '続ける', 'ko' => '계속하다', 'fr' => 'continuer', 'tr' => 'devam et', 'ru' => 'продолжай', 'ar' => 'تابع', 'az' => 'davam et'],
        'in front' => ['es' => 'delante', 'de' => 'vorne', 'ja' => '前に', 'ko' => '앞에', 'fr' => 'devant', 'tr' => 'önde', 'ru' => 'впереди', 'ar' => 'أمام', 'az' => 'qarşıda'],
        'behind' => ['es' => 'detrás', 'de' => 'hinten', 'ja' => '後ろに', 'ko' => '뒤에', 'fr' => 'derrière', 'tr' => 'arkasında', 'ru' => 'сзади', 'ar' => 'خلف', 'az' => 'arxada'],
        'north' => ['es' => 'norte', 'de' => 'Norden', 'ja' => '北', 'ko' => '북쪽', 'fr' => 'nord', 'tr' => 'kuzey', 'ru' => 'север', 'ar' => 'شمال', 'az' => 'şimal'],
        'south' => ['es' => 'sur', 'de' => 'Süden', 'ja' => '南', 'ko' => '남쪽', 'fr' => 'sud', 'tr' => 'güney', 'ru' => 'юг', 'ar' => 'جنوب', 'az' => 'cənub'],
        // --- Unit 8: phone conversations ---
        'call' => ['es' => 'llamar', 'de' => 'anrufen', 'ja' => '電話する', 'ko' => '전화하다', 'fr' => 'appeler', 'tr' => 'ara', 'ru' => 'позвони', 'ar' => 'اتصل', 'az' => 'zəng et'],
        'wait' => ['es' => 'esperar', 'de' => 'warten', 'ja' => '待つ', 'ko' => '기다리다', 'fr' => 'attendre', 'tr' => 'bekle', 'ru' => 'подожди', 'ar' => 'انتظر', 'az' => 'gözlə'],
        'message' => ['es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'fr' => 'message', 'tr' => 'mesaj', 'ru' => 'сообщение', 'ar' => 'رسالة', 'az' => 'mesaj'],
        'call back' => ['es' => 'devolver la llamada', 'de' => 'zurückrufen', 'ja' => '折り返す', 'ko' => '다시 전화하다', 'fr' => 'rappeler', 'tr' => 'tekrar ara', 'ru' => 'перезвони', 'ar' => 'عاود الاتصال', 'az' => 'geri zəng et'],
        'busy' => ['es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'fr' => 'occupé', 'tr' => 'meşgul', 'ru' => 'занят', 'ar' => 'مشغول', 'az' => 'məşğul'],
        'sorry' => ['es' => 'lo siento', 'de' => 'Entschuldigung', 'ja' => 'ごめんなさい', 'ko' => '죄송합니다', 'fr' => 'désolé', 'tr' => 'üzgünüm', 'ru' => 'извините', 'ar' => 'آسف', 'az' => 'bağışlayın'],
        'phone' => ['es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'fr' => 'téléphone', 'tr' => 'telefon', 'ru' => 'телефон', 'ar' => 'هاتف', 'az' => 'telefon'],
        // --- Unit 9: expressing opinions ---
        'I think' => ['es' => 'creo', 'de' => 'ich denke', 'ja' => '私は思う', 'ko' => '나는 생각한다', 'fr' => 'je pense', 'tr' => 'düşünüyorum', 'ru' => 'я думаю', 'ar' => 'أفكر', 'az' => 'düşünürəm'],
        'I believe' => ['es' => 'creo que', 'de' => 'ich glaube', 'ja' => '私は信じる', 'ko' => '나는 믿는다', 'fr' => 'je crois', 'tr' => 'bence', 'ru' => 'я думаю', 'ar' => 'أعتقد', 'az' => 'inanıram'],
        'true' => ['es' => 'verdadero', 'de' => 'wahr', 'ja' => '本当', 'ko' => '사실', 'fr' => 'vrai', 'tr' => 'doğru', 'ru' => 'правильно', 'ar' => 'صحيح', 'az' => 'düzgün'],
        'false' => ['es' => 'falso', 'de' => 'falsch', 'ja' => '偽', 'ko' => '거짓', 'fr' => 'faux', 'tr' => 'yanlış', 'ru' => 'неверно', 'ar' => 'خطأ', 'az' => 'səhv'],
        'I prefer' => ['es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '私は好む', 'ko' => '나는 선호한다', 'fr' => 'je préfère', 'tr' => 'tercih ederim', 'ru' => 'я предпочитаю', 'ar' => 'أفضل', 'az' => 'üstünlük verirəm'],
        'better' => ['es' => 'mejor', 'de' => 'besser', 'ja' => 'もっと良い', 'ko' => '더 좋은', 'fr' => 'meilleur', 'tr' => 'daha iyi', 'ru' => 'лучше', 'ar' => 'أحسن', 'az' => 'daha yaxşı'],
        // --- Unit 10: comparisons & preferences ---
        'more' => ['es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'fr' => 'plus', 'tr' => 'daha çok', 'ru' => 'больше', 'ar' => 'أكثر', 'az' => 'daha'],
        'less' => ['es' => 'menos', 'de' => 'weniger', 'ja' => 'より少ない', 'ko' => '덜', 'fr' => 'moins', 'tr' => 'daha az', 'ru' => 'меньше', 'ar' => 'أقل', 'az' => 'daha az'],
        'like' => ['es' => 'como', 'de' => 'wie', 'ja' => 'のように', 'ko' => '처럼', 'fr' => 'comme', 'tr' => 'gibi', 'ru' => 'нравится', 'ar' => 'يعجبني', 'az' => 'xoşuma gəlir'],
        'same' => ['es' => 'mismo', 'de' => 'gleich', 'ja' => '同じ', 'ko' => '같은', 'fr' => 'même', 'tr' => 'aynı', 'ru' => 'такой же', 'ar' => 'نفسه', 'az' => 'eyni'],
        'worse' => ['es' => 'peor', 'de' => 'schlechter', 'ja' => 'もっと悪い', 'ko' => '더 나쁜', 'fr' => 'pire', 'tr' => 'daha kötü', 'ru' => 'хуже', 'ar' => 'أسوأ', 'az' => 'daha pis'],
        'as much' => ['es' => 'tanto', 'de' => 'genauso viel', 'ja' => '同じくらい', 'ko' => '그만큼', 'fr' => 'autant', 'tr' => 'bu kadar', 'ru' => 'столько же', 'ar' => 'بقدر', 'az' => 'qədər'],
        'especially' => ['es' => 'sobre todo', 'de' => 'besonders', 'ja' => '特に', 'ko' => '특히', 'fr' => 'surtout', 'tr' => 'özellikle', 'ru' => 'особенно', 'ar' => 'خاصة', 'az' => 'xüsusilə'],
        'as' => ['es' => 'como', 'de' => 'wie', 'ja' => 'のように', 'ko' => '만큼', 'fr' => 'comme', 'tr' => 'gibi', 'ru' => 'как', 'ar' => 'كما', 'az' => 'kimi'],
        'than' => ['es' => 'que', 'de' => 'als', 'ja' => 'より', 'ko' => '보다', 'fr' => 'que', 'tr' => 'den', 'ru' => 'чем', 'ar' => 'من', 'az' => 'dan'],
        // === Chapter 3: Restaurant ===

        // --- food ---
        'soup' => ['es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'fr' => 'soupe', 'tr' => 'çorba', 'ru' => 'суп', 'ar' => 'حساء', 'az' => 'şorba'],
        'salad' => ['es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'fr' => 'salade', 'tr' => 'salata', 'ru' => 'салат', 'ar' => 'سلطة', 'az' => 'salat'],
        'chicken' => ['es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'fr' => 'poulet', 'tr' => 'tavuk', 'ru' => 'курица', 'ar' => 'دجاج', 'az' => 'toyuq'],
        'fish' => ['es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'fr' => 'poisson', 'tr' => 'balık', 'ru' => 'рыба', 'ar' => 'سمك', 'az' => 'balıq'],
        'meat' => ['es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'fr' => 'viande', 'tr' => 'et', 'ru' => 'мясо', 'ar' => 'لحم', 'az' => 'ət'],
        'rice' => ['es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥', 'fr' => 'riz', 'tr' => 'pirinç', 'ru' => 'рис', 'ar' => 'أرز', 'az' => 'düyü'],
        'cheese' => ['es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'fr' => 'fromage', 'tr' => 'peynir', 'ru' => 'сыр', 'ar' => 'جبن', 'az' => 'pendir'],
        'cake' => ['es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'fr' => 'gâteau', 'tr' => 'pasta', 'ru' => 'торт', 'ar' => 'كعكة', 'az' => 'tort'],
        'ice cream' => ['es' => 'helado', 'de' => 'Eis', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'fr' => 'glace', 'tr' => 'dondurma', 'ru' => 'мороженое', 'ar' => 'آيس كريم', 'az' => 'dondurma'],
        'sandwich' => ['es' => 'sándwich', 'de' => 'Sandwich', 'ja' => 'サンドイッチ', 'ko' => '샌드위치', 'fr' => 'sandwich', 'tr' => 'sandviç', 'ru' => 'сэндвич', 'ar' => 'شطيرة', 'az' => 'sendviç'],
        'burger' => ['es' => 'hamburguesa', 'de' => 'Burger', 'ja' => 'ハンバーガー', 'ko' => '햄버거', 'fr' => 'hamburger', 'tr' => 'hamburger', 'ru' => 'бургер', 'ar' => 'برجر', 'az' => 'burger'],
        'fries' => ['es' => 'patatas fritas', 'de' => 'Pommes', 'ja' => 'フライドポテト', 'ko' => '감자튀김', 'fr' => 'frites', 'tr' => 'patates kızartması', 'ru' => 'картошка фри', 'ar' => 'بطاطا مقلية', 'az' => 'kartof fri'],
        'wine' => ['es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'fr' => 'vin', 'tr' => 'şarap', 'ru' => 'вино', 'ar' => 'نبيذ', 'az' => 'şərab'],
        'beer' => ['es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'fr' => 'bière', 'tr' => 'bira', 'ru' => 'пиво', 'ar' => 'بيرة', 'az' => 'pivə'],
        'juice' => ['es' => 'zumo', 'de' => 'Saft', 'ja' => 'ジュース', 'ko' => '주스', 'fr' => 'jus', 'tr' => 'meyve suyu', 'ru' => 'сок', 'ar' => 'عصير', 'az' => 'şirə'],
        'chocolate' => ['es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'fr' => 'chocolat', 'tr' => 'çikolata', 'ru' => 'шоколад', 'ar' => 'شوكولاتة', 'az' => 'şokolad'],
        'tart' => ['es' => 'tarta', 'de' => 'Torte', 'ja' => 'タルト', 'ko' => '타르트', 'fr' => 'tarte', 'tr' => 'turta', 'ru' => 'тарт', 'ar' => 'فطيرة', 'az' => 'tart'],
        'cream' => ['es' => 'nata', 'de' => 'Sahne', 'ja' => 'クリーム', 'ko' => '크림', 'fr' => 'crème', 'tr' => 'krema', 'ru' => 'сливки', 'ar' => 'كريمة', 'az' => 'qaymaq'],
        'vanilla' => ['es' => 'vainilla', 'de' => 'Vanille', 'ja' => 'バニラ', 'ko' => '바닐라', 'fr' => 'vanille', 'tr' => 'vanilya', 'ru' => 'ванильный', 'ar' => 'فانيليا', 'az' => 'vanil'],
        'strawberry' => ['es' => 'fresa', 'de' => 'Erdbeere', 'ja' => 'いちご', 'ko' => '딸기', 'fr' => 'fraise', 'tr' => 'çilek', 'ru' => 'клубничный', 'ar' => 'فراولة', 'az' => 'çiyələk'],
        'vegetables' => ['es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'fr' => 'légumes', 'tr' => 'sebze', 'ru' => 'овощи', 'ar' => 'خضروات', 'az' => 'tərəvəzlər'],
        'fruit' => ['es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'fr' => 'fruit', 'tr' => 'meyve', 'ru' => 'фрукт', 'ar' => 'فاكهة', 'az' => 'meyvə'],
        'salt' => ['es' => 'sal', 'de' => 'Salz', 'ja' => '塩', 'ko' => '소금', 'fr' => 'sel', 'tr' => 'tuz', 'ru' => 'соль', 'ar' => 'ملح', 'az' => 'duz'],
        'pepper' => ['es' => 'pimienta', 'de' => 'Pfeffer', 'ja' => 'こしょう', 'ko' => '후추', 'fr' => 'poivre', 'tr' => 'biber', 'ru' => 'перец', 'ar' => 'فلفل', 'az' => 'bibər'],
        'butter' => ['es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'fr' => 'beurre', 'tr' => 'tereyağı', 'ru' => 'масло', 'ar' => 'زبدة', 'az' => 'kərə yağı'],
        'egg' => ['es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '계란', 'fr' => 'œuf', 'tr' => 'yumurta', 'ru' => 'яйцо', 'ar' => 'بيضة', 'az' => 'yumurta'],
        'ice' => ['es' => 'hielo', 'de' => 'Eiswürfel', 'ja' => '氷', 'ko' => '얼음', 'fr' => 'glaçons', 'tr' => 'buz', 'ru' => 'лёд', 'ar' => 'الثلج', 'az' => 'buz'],
        // --- the table ---
        'plate' => ['es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'fr' => 'assiette', 'tr' => 'tabak', 'ru' => 'тарелка', 'ar' => 'صحن', 'az' => 'boşqab'],
        'fork' => ['es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'fr' => 'fourchette', 'tr' => 'çatal', 'ru' => 'вилка', 'ar' => 'شوكة', 'az' => 'çəngəl'],
        'knife' => ['es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'fr' => 'couteau', 'tr' => 'bıçak', 'ru' => 'нож', 'ar' => 'سكين', 'az' => 'bıçaq'],
        'spoon' => ['es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'fr' => 'cuillère', 'tr' => 'kaşık', 'ru' => 'ложка', 'ar' => 'ملعقة', 'az' => 'qaşıq'],
        'glass' => ['es' => 'vaso', 'de' => 'Glas', 'ja' => 'グラス', 'ko' => '유리잔', 'fr' => 'verre', 'tr' => 'bardak', 'ru' => 'стакан', 'ar' => 'كوب', 'az' => 'stəkan'],
        'bottle' => ['es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'fr' => 'bouteille', 'tr' => 'şişe', 'ru' => 'бутылка', 'ar' => 'زجاجة', 'az' => 'şüşə'],
        'napkin' => ['es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'fr' => 'serviette', 'tr' => 'peçete', 'ru' => 'салфетка', 'ar' => 'منديل', 'az' => 'salfet'],
        'menu' => ['es' => 'menú', 'de' => 'Menü', 'ja' => 'メニュー', 'ko' => '메뉴', 'fr' => 'menu', 'tr' => 'menü', 'ru' => 'меню', 'ar' => 'قائمة الطعام', 'az' => 'menyu'],
        'waiter' => ['es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'fr' => 'serveur', 'tr' => 'garson', 'ru' => 'официант', 'ar' => 'نادل', 'az' => 'ofisiant'],
        'kitchen' => ['es' => 'cocina', 'de' => 'Küche', 'ja' => '厨房', 'ko' => '주방', 'fr' => 'cuisine', 'tr' => 'mutfak', 'ru' => 'кухня', 'ar' => 'مطبخ', 'az' => 'mətbəx'],
        'restaurant' => ['es' => 'restaurante', 'de' => 'Restaurant', 'ja' => 'レストラン', 'ko' => '식당', 'fr' => 'restaurant', 'tr' => 'restoran', 'ru' => 'ресторан', 'ar' => 'مطعم', 'az' => 'restoran'],
        // --- ordering ---
        'to order' => ['es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다', 'fr' => 'commander', 'tr' => 'sipariş vermek', 'ru' => 'заказать', 'ar' => 'الطلب', 'az' => 'sifariş vermək'],
        'order' => ['es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'fr' => 'commande', 'tr' => 'sipariş', 'ru' => 'заказ', 'ar' => 'طلب', 'az' => 'sifariş'],
        "I'll have" => ['es' => 'tomo', 'de' => 'ich nehme', 'ja' => 'にします', 'ko' => '하겠습니다', 'fr' => 'je prends', 'tr' => 'alayım', 'ru' => 'я возьму', 'ar' => 'سآخذ', 'az' => 'götürəcəyəm'],
        'dish' => ['es' => 'plato', 'de' => 'Gericht', 'ja' => '料理', 'ko' => '요리', 'fr' => 'plat', 'tr' => 'yemek', 'ru' => 'блюдо', 'ar' => 'طبق', 'az' => 'yemək'],
        'starter' => ['es' => 'entrante', 'de' => 'Vorspeise', 'ja' => '前菜', 'ko' => '전채', 'fr' => 'entrée', 'tr' => 'başlangıç', 'ru' => 'закуска', 'ar' => 'مقبلات', 'az' => 'qəlyanaltı'],
        'dessert' => ['es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'fr' => 'dessert', 'tr' => 'tatlı', 'ru' => 'десерт', 'ar' => 'حلوى', 'az' => 'şirniyyat'],
        'a drink' => ['es' => 'una bebida', 'de' => 'ein Getränk', 'ja' => '飲み物', 'ko' => '음료', 'fr' => 'une boisson', 'tr' => 'bir içecek', 'ru' => 'напиток', 'ar' => 'مشروب', 'az' => 'içki'],
        'slice' => ['es' => 'trozo', 'de' => 'Stück', 'ja' => '一切れ', 'ko' => '한 조각', 'fr' => 'part', 'tr' => 'dilim', 'ru' => 'кусок', 'ar' => 'شريحة', 'az' => 'dilim'],
        'to share' => ['es' => 'compartir', 'de' => 'teilen', 'ja' => '分ける', 'ko' => '나누다', 'fr' => 'partager', 'tr' => 'paylaşmak', 'ru' => 'разделить', 'ar' => 'المشاركة', 'az' => 'bölüşmək'],
        'to choose' => ['es' => 'elegir', 'de' => 'wählen', 'ja' => '選ぶ', 'ko' => '고르다', 'fr' => 'choisir', 'tr' => 'seçmek', 'ru' => 'выбрать', 'ar' => 'الاختيار', 'az' => 'seçmək'],
        'to bring' => ['es' => 'traer', 'de' => 'bringen', 'ja' => '持ってくる', 'ko' => '가져오다', 'fr' => 'apporter', 'tr' => 'getirmek', 'ru' => 'принести', 'ar' => 'الإحضار', 'az' => 'gətirmək'],
        'bring' => ['es' => 'traer', 'de' => 'bringen', 'ja' => '持ってくる', 'ko' => '가져오다', 'fr' => 'apporter', 'tr' => 'getir', 'ru' => 'принеси', 'ar' => 'أحضر', 'az' => 'gətir'],
        'pay' => ['es' => 'pagar', 'de' => 'bezahlen', 'ja' => '払う', 'ko' => '지불하다', 'fr' => 'payer', 'tr' => 'öde', 'ru' => 'плати', 'ar' => 'ادفع', 'az' => 'ödə'],
        'choose' => ['es' => 'elegir', 'de' => 'wählen', 'ja' => '選ぶ', 'ko' => '고르다', 'fr' => 'choisir', 'tr' => 'seç', 'ru' => 'выбери', 'ar' => 'اختر', 'az' => 'seç'],
        'bring me' => ['es' => 'tráigame', 'de' => 'bringen Sie mir', 'ja' => '持ってきてください', 'ko' => '가져다주세요', 'fr' => 'apportez-moi', 'tr' => 'bana getirin', 'ru' => 'принесите мне', 'ar' => 'أحضر لي', 'az' => 'mənə gətir'],
        'can you' => ['es' => 'puede usted', 'de' => 'können Sie', 'ja' => 'できますか', 'ko' => '주시겠어요', 'fr' => 'pouvez-vous', 'tr' => 'yapabilir misiniz', 'ru' => 'могу ты', 'ar' => 'أستطيع أنت', 'az' => 'bacarıram sən'],
        'excuse me' => ['es' => 'disculpe', 'de' => 'entschuldigen Sie', 'ja' => 'すみません', 'ko' => '실례합니다', 'fr' => 'excusez-moi', 'tr' => 'affedersiniz', 'ru' => 'извините', 'ar' => 'عفوا', 'az' => 'bağışlayın'],
        'without' => ['es' => 'sin', 'de' => 'ohne', 'ja' => 'なし', 'ko' => '없이', 'fr' => 'sans', 'tr' => 'sız', 'ru' => 'без', 'ar' => 'بدون', 'az' => 'olmadan'],
        'each' => ['es' => 'cada', 'de' => 'jeder', 'ja' => 'それぞれの', 'ko' => '각각의', 'fr' => 'chaque', 'tr' => 'her', 'ru' => 'каждый', 'ar' => 'كل', 'az' => 'hər biri'],
        'hungry' => ['es' => 'hambriento', 'de' => 'hungrig', 'ja' => 'お腹がすいた', 'ko' => '배고픈', 'fr' => 'affamé', 'tr' => 'aç', 'ru' => 'голодный', 'ar' => 'جائع', 'az' => 'ac'],
        'thirsty' => ['es' => 'sediento', 'de' => 'durstig', 'ja' => 'のどが渇いた', 'ko' => '목마른', 'fr' => 'assoiffé', 'tr' => 'susamış', 'ru' => 'хочу пить', 'ar' => 'عطشان', 'az' => 'susuz'],
        'another' => ['es' => 'otro', 'de' => 'noch ein', 'ja' => 'もう一つの', 'ko' => '하나 더', 'fr' => 'encore', 'tr' => 'başka', 'ru' => 'другой', 'ar' => 'آخر', 'az' => 'başqa'],
        // --- money ---
        'money' => ['es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'fr' => 'argent', 'tr' => 'para', 'ru' => 'деньги', 'ar' => 'نقود', 'az' => 'pul'],
        'price' => ['es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'fr' => 'prix', 'tr' => 'fiyat', 'ru' => 'цена', 'ar' => 'سعر', 'az' => 'qiymət'],
        'expensive' => ['es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'fr' => 'cher', 'tr' => 'pahalı', 'ru' => 'дорогой', 'ar' => 'غالي', 'az' => 'bahalı'],
        'cheap' => ['es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'fr' => 'bon marché', 'tr' => 'ucuz', 'ru' => 'дешёвый', 'ar' => 'رخيص', 'az' => 'ucuz'],
        'costs' => ['es' => 'cuesta', 'de' => 'kostet', 'ja' => 'かかる', 'ko' => '입니다', 'fr' => 'coûte', 'tr' => 'tutar', 'ru' => 'стоит', 'ar' => 'يكلف', 'az' => 'qiyməti'],
        'total' => ['es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '총액', 'fr' => 'total', 'tr' => 'toplam', 'ru' => 'итого', 'ar' => 'المجموع', 'az' => 'cəmi'],
        'to pay' => ['es' => 'pagar', 'de' => 'bezahlen', 'ja' => '払う', 'ko' => '지불하다', 'fr' => 'payer', 'tr' => 'ödemek', 'ru' => 'платить', 'ar' => 'الدفع', 'az' => 'ödəmək'],
        'I pay' => ['es' => 'pago', 'de' => 'ich bezahle', 'ja' => '私が払う', 'ko' => '제가 냅니다', 'fr' => 'je paie', 'tr' => 'ödüyorum', 'ru' => 'я плачу', 'ar' => 'أدفع', 'az' => 'ödəyirəm'],
        'change' => ['es' => 'cambio', 'de' => 'Wechselgeld', 'ja' => 'おつり', 'ko' => '거스름돈', 'fr' => 'monnaie', 'tr' => 'para üstü', 'ru' => 'сдача', 'ar' => 'الباقي', 'az' => 'qalıq'],
        'cash' => ['es' => 'en efectivo', 'de' => 'in bar', 'ja' => '現金で', 'ko' => '현금으로', 'fr' => 'en espèces', 'tr' => 'nakit', 'ru' => 'наличные', 'ar' => 'كاش', 'az' => 'nağd'],
        'tip' => ['es' => 'propina', 'de' => 'Trinkgeld', 'ja' => 'チップ', 'ko' => '팁', 'fr' => 'pourboire', 'tr' => 'bahşiş', 'ru' => 'чаевые', 'ar' => 'بقشيش', 'az' => 'çaypulu'],
        'receipt' => ['es' => 'recibo', 'de' => 'Quittung', 'ja' => 'レシート', 'ko' => '영수증', 'fr' => 'reçu', 'tr' => 'fiş', 'ru' => 'чек', 'ar' => 'إيصال', 'az' => 'qəbz'],
        'separately' => ['es' => 'por separado', 'de' => 'getrennt', 'ja' => '別々に', 'ko' => '따로', 'fr' => 'séparément', 'tr' => 'ayrı', 'ru' => 'отдельно', 'ar' => 'منفصل', 'az' => 'ayrıca'],
        'dollars' => ['es' => 'dólares', 'de' => 'Dollar', 'ja' => 'ドル', 'ko' => '달러', 'fr' => 'dollars', 'tr' => 'dolar', 'ru' => 'долларов', 'ar' => 'دولارات', 'az' => 'dollar'],
        'card' => ['es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'fr' => 'carte', 'tr' => 'kart', 'ru' => 'карта', 'ar' => 'بطاقة', 'az' => 'kart'],
        // --- reservations ---
        'to book' => ['es' => 'reservar', 'de' => 'reservieren', 'ja' => '予約する', 'ko' => '예약하다', 'fr' => 'réserver', 'tr' => 'ayırtmak', 'ru' => 'в книга', 'ar' => 'إلى كتاب', 'az' => 'kitab'],
        'booking' => ['es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'fr' => 'réservation', 'tr' => 'rezervasyon', 'ru' => 'бронь', 'ar' => 'حجز', 'az' => 'rezervasiya'],
        'people' => ['es' => 'personas', 'de' => 'Personen', 'ja' => '人', 'ko' => '명', 'fr' => 'personnes', 'tr' => 'kişi', 'ru' => 'люди', 'ar' => 'ناس', 'az' => 'insanlar'],
        'seat' => ['es' => 'sitio', 'de' => 'Platz', 'ja' => '席', 'ko' => '자리', 'fr' => 'place', 'tr' => 'koltuk', 'ru' => 'место', 'ar' => 'مقعد', 'az' => 'yer'],
        'to cancel' => ['es' => 'cancelar', 'de' => 'stornieren', 'ja' => 'キャンセルする', 'ko' => '취소하다', 'fr' => 'annuler', 'tr' => 'iptal etmek', 'ru' => 'отменить', 'ar' => 'الإلغاء', 'az' => 'ləğv etmək'],
        'to confirm' => ['es' => 'confirmar', 'de' => 'bestätigen', 'ja' => '確認する', 'ko' => '확인하다', 'fr' => 'confirmer', 'tr' => 'onaylamak', 'ru' => 'подтвердить', 'ar' => 'التأكيد', 'az' => 'təsdiqləmək'],
        'noon' => ['es' => 'mediodía', 'de' => 'Mittag', 'ja' => '正午', 'ko' => '정오', 'fr' => 'midi', 'tr' => 'öğlen', 'ru' => 'полдень', 'ar' => 'ظهرا', 'az' => 'günorta'],
        "o'clock" => ['es' => 'en punto', 'de' => 'Uhr', 'ja' => '時', 'ko' => '시', 'fr' => 'heures', 'tr' => 'saat', 'ru' => 'часов', 'ar' => 'الساعة', 'az' => 'saat'],
        'minutes' => ['es' => 'minutos', 'de' => 'Minuten', 'ja' => '分', 'ko' => '분', 'fr' => 'minutes', 'tr' => 'dakika', 'ru' => 'минут', 'ar' => 'دقائق', 'az' => 'dəqiqə'],
        // --- taste & complaints ---
        'delicious' => ['es' => 'delicioso', 'de' => 'köstlich', 'ja' => 'おいしい', 'ko' => '맛있는', 'fr' => 'délicieux', 'tr' => 'lezzetli', 'ru' => 'вкусный', 'ar' => 'لذيذ', 'az' => 'dadlı'],
        'excellent' => ['es' => 'excelente', 'de' => 'ausgezeichnet', 'ja' => '素晴らしい', 'ko' => '훌륭한', 'fr' => 'excellent', 'tr' => 'mükemmel', 'ru' => 'отлично', 'ar' => 'ممتاز', 'az' => 'əla'],
        'perfect' => ['es' => 'perfecto', 'de' => 'perfekt', 'ja' => '完璧', 'ko' => '완벽한', 'fr' => 'parfait', 'tr' => 'mükemmel', 'ru' => 'идеально', 'ar' => 'مثالي', 'az' => 'mükəmməl'],
        'salty' => ['es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠', 'fr' => 'salé', 'tr' => 'tuzlu', 'ru' => 'солёный', 'ar' => 'مالح', 'az' => 'duzlu'],
        'sweet' => ['es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '단', 'fr' => 'sucré', 'tr' => 'tatlı', 'ru' => 'сладкий', 'ar' => 'حلو', 'az' => 'şirin'],
        'spicy' => ['es' => 'picante', 'de' => 'scharf', 'ja' => '辛い', 'ko' => '매운', 'fr' => 'épicé', 'tr' => 'acılı', 'ru' => 'острый', 'ar' => 'حار', 'az' => 'acılı'],
        'taste' => ['es' => 'sabor', 'de' => 'Geschmack', 'ja' => '味', 'ko' => '맛', 'fr' => 'goût', 'tr' => 'tat', 'ru' => 'вкус', 'ar' => 'مذاق', 'az' => 'dad'],
        'problem' => ['es' => 'problema', 'de' => 'Problem', 'ja' => '問題', 'ko' => '문제', 'fr' => 'problème', 'tr' => 'sorun', 'ru' => 'проблема', 'ar' => 'مشكلة', 'az' => 'problem'],
        'clean' => ['es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれい', 'ko' => '깨끗한', 'fr' => 'propre', 'tr' => 'temiz', 'ru' => 'чистый', 'ar' => 'نظيف', 'az' => 'təmiz'],
        'dirty' => ['es' => 'sucio', 'de' => 'schmutzig', 'ja' => '汚い', 'ko' => '더러운', 'fr' => 'sale', 'tr' => 'kirli', 'ru' => 'грязный', 'ar' => 'متسخ', 'az' => 'çirkli'],
        'fresh' => ['es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮', 'ko' => '신선한', 'fr' => 'frais', 'tr' => 'taze', 'ru' => 'свежий', 'ar' => 'طازج', 'az' => 'təzə'],
        // --- diet & allergies ---
        'vegetarian' => ['es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'fr' => 'végétarien', 'tr' => 'vejetaryen', 'ru' => 'вегетарианец', 'ar' => 'نباتي', 'az' => 'vegetarian'],
        'allergic' => ['es' => 'alérgico', 'de' => 'allergisch', 'ja' => 'アレルギーの', 'ko' => '알레르기가 있는', 'fr' => 'allergique', 'tr' => 'alerjik', 'ru' => 'аллергия', 'ar' => 'حساسية', 'az' => 'allergiya'],
        'allergy' => ['es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'fr' => 'allergie', 'tr' => 'alerji', 'ru' => 'аллергия', 'ar' => 'حساسية', 'az' => 'allergiya'],
        'gluten' => ['es' => 'gluten', 'de' => 'Gluten', 'ja' => 'グルテン', 'ko' => '글루텐', 'fr' => 'gluten', 'tr' => 'gluten', 'ru' => 'глютен', 'ar' => 'غلوتين', 'az' => 'qlüten'],
        'nuts' => ['es' => 'nueces', 'de' => 'Nüsse', 'ja' => 'ナッツ', 'ko' => '견과류', 'fr' => 'noix', 'tr' => 'fındık', 'ru' => 'орехи', 'ar' => 'مكسرات', 'az' => 'qoz'],
        'diet' => ['es' => 'dieta', 'de' => 'Diät', 'ja' => '食事制限', 'ko' => '식단', 'fr' => 'régime', 'tr' => 'beslenme', 'ru' => 'диета', 'ar' => 'حمية', 'az' => 'pəhriz'],
        'ingredients' => ['es' => 'ingredientes', 'de' => 'Zutaten', 'ja' => '材料', 'ko' => '재료', 'fr' => 'ingrédients', 'tr' => 'içindekiler', 'ru' => 'ингредиенты', 'ar' => 'مكونات', 'az' => 'tərkib'],
        'to avoid' => ['es' => 'evitar', 'de' => 'vermeiden', 'ja' => '避ける', 'ko' => '피하다', 'fr' => 'éviter', 'tr' => 'kaçınmak', 'ru' => 'избегать', 'ar' => 'التجنب', 'az' => 'qaçınmaq'],
        'contains' => ['es' => 'contiene', 'de' => 'enthält', 'ja' => '含む', 'ko' => '들어있다', 'fr' => 'contient', 'tr' => 'içerir', 'ru' => 'содержит', 'ar' => 'يحتوي', 'az' => 'tərkibində var'],
        // --- fast food ---
        'takeaway' => ['es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'fr' => 'à emporter', 'tr' => 'paket', 'ru' => 'с собой', 'ar' => 'للخارج', 'az' => 'özümlə'],
        'eat in' => ['es' => 'para tomar aquí', 'de' => 'zum Hieressen', 'ja' => '店内で', 'ko' => '매장에서', 'fr' => 'sur place', 'tr' => 'burada ye', 'ru' => 'ем в', 'ar' => 'آكل في', 'az' => 'yeyirəm içində'],
        'fast' => ['es' => 'rápido', 'de' => 'schnell', 'ja' => '速い', 'ko' => '빠른', 'fr' => 'rapide', 'tr' => 'hızlı', 'ru' => 'быстро', 'ar' => 'بسرعة', 'az' => 'sürətli'],
        'bag' => ['es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'fr' => 'sac', 'tr' => 'poşet', 'ru' => 'пакет', 'ar' => 'كيس', 'az' => 'torba'],
        'child' => ['es' => 'niño', 'de' => 'Kind', 'ja' => '子供', 'ko' => '아이', 'fr' => 'enfant', 'tr' => 'çocuk', 'ru' => 'ребёнок', 'ar' => 'طفل', 'az' => 'uşaq'],
        // === Chapter 4: Supermarket ===

        // --- the shop ---
        'supermarket' => ['es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'fr' => 'supermarché', 'tr' => 'market', 'ru' => 'супермаркет', 'ar' => 'سوبرماركت', 'az' => 'supermarket'],
        'aisle' => ['es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '진열대', 'fr' => 'rayon', 'tr' => 'reyon', 'ru' => 'отдел', 'ar' => 'قسم', 'az' => 'şöbə'],
        'list' => ['es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'fr' => 'liste', 'tr' => 'liste', 'ru' => 'список', 'ar' => 'قائمة', 'az' => 'siyahı'],
        'trolley' => ['es' => 'carrito', 'de' => 'Einkaufswagen', 'ja' => 'カート', 'ko' => '카트', 'fr' => 'chariot', 'tr' => 'araba', 'ru' => 'тележка', 'ar' => 'عربة', 'az' => 'araba'],
        'basket' => ['es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'fr' => 'panier', 'tr' => 'sepet', 'ru' => 'корзина', 'ar' => 'سلة', 'az' => 'səbət'],
        'checkout' => ['es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'fr' => 'caisse', 'tr' => 'kasa', 'ru' => 'касса', 'ar' => 'صندوق الدفع', 'az' => 'kassa'],
        'cashier' => ['es' => 'cajero', 'de' => 'Kassierer', 'ja' => 'レジ係', 'ko' => '계산원', 'fr' => 'caissier', 'tr' => 'kasiyer', 'ru' => 'кассир', 'ar' => 'أمين الصندوق', 'az' => 'kassir'],
        'queue' => ['es' => 'cola', 'de' => 'Schlange', 'ja' => '列', 'ko' => '줄', 'fr' => 'file', 'tr' => 'sıra', 'ru' => 'очередь', 'ar' => 'طابور', 'az' => 'növbə'],
        'product' => ['es' => 'producto', 'de' => 'Produkt', 'ja' => '商品', 'ko' => '상품', 'fr' => 'produit', 'tr' => 'ürün', 'ru' => 'продукт', 'ar' => 'منتج', 'az' => 'məhsul'],
        'bakery' => ['es' => 'panadería', 'de' => 'Bäckerei', 'ja' => 'パン屋', 'ko' => '빵집', 'fr' => 'boulangerie', 'tr' => 'fırın', 'ru' => 'пекарня', 'ar' => 'مخبز', 'az' => 'çörəkxana'],
        // --- fruit & vegetables ---
        'banana' => ['es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'fr' => 'banane', 'tr' => 'muz', 'ru' => 'банан', 'ar' => 'موزة', 'az' => 'banan'],
        'orange' => ['es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'fr' => 'orange', 'tr' => 'portakal', 'ru' => 'апельсин', 'ar' => 'برتقالة', 'az' => 'portağal'],
        'grapes' => ['es' => 'uvas', 'de' => 'Trauben', 'ja' => 'ぶどう', 'ko' => '포도', 'fr' => 'raisin', 'tr' => 'üzüm', 'ru' => 'виноград', 'ar' => 'عنب', 'az' => 'üzüm'],
        'carrot' => ['es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'fr' => 'carotte', 'tr' => 'havuç', 'ru' => 'морковь', 'ar' => 'جزر', 'az' => 'yerkökü'],
        'tomato' => ['es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'fr' => 'tomate', 'tr' => 'domates', 'ru' => 'помидор', 'ar' => 'طماطم', 'az' => 'pomidor'],
        'potato' => ['es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'fr' => 'pomme de terre', 'tr' => 'patates', 'ru' => 'картофель', 'ar' => 'بطاطا', 'az' => 'kartof'],
        'onion' => ['es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => '玉ねぎ', 'ko' => '양파', 'fr' => 'oignon', 'tr' => 'soğan', 'ru' => 'лук', 'ar' => 'بصل', 'az' => 'soğan'],
        'fruits' => ['es' => 'frutas', 'de' => 'Früchte', 'ja' => '果物', 'ko' => '과일', 'fr' => 'fruits', 'tr' => 'meyveler', 'ru' => 'фрукты', 'ar' => 'فواكه', 'az' => 'meyvələr'],
        'eggs' => ['es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '계란', 'fr' => 'œufs', 'tr' => 'yumurta', 'ru' => 'яйца', 'ar' => 'بيض', 'az' => 'yumurtalar'],
        // --- quantities & packaging ---
        'kilo' => ['es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'fr' => 'kilo', 'tr' => 'kilo', 'ru' => 'кило', 'ar' => 'كيلو', 'az' => 'kilo'],
        'gram' => ['es' => 'gramo', 'de' => 'Gramm', 'ja' => 'グラム', 'ko' => '그램', 'fr' => 'gramme', 'tr' => 'gram', 'ru' => 'грамм', 'ar' => 'غرام', 'az' => 'qram'],
        'litre' => ['es' => 'litro', 'de' => 'Liter', 'ja' => 'リットル', 'ko' => '리터', 'fr' => 'litre', 'tr' => 'litre', 'ru' => 'литр', 'ar' => 'لتر', 'az' => 'litr'],
        'litres' => ['es' => 'litros', 'de' => 'Liter', 'ja' => 'リットル', 'ko' => '리터', 'fr' => 'litres', 'tr' => 'litre', 'ru' => 'литров', 'ar' => 'لترات', 'az' => 'litr'],
        'box' => ['es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'fr' => 'boîte', 'tr' => 'kutu', 'ru' => 'коробка', 'ar' => 'علبة', 'az' => 'qutu'],
        'full' => ['es' => 'lleno', 'de' => 'voll', 'ja' => 'いっぱい', 'ko' => '가득한', 'fr' => 'plein', 'tr' => 'dolu', 'ru' => 'полный', 'ar' => 'ممتلئ', 'az' => 'dolu'],
        'empty' => ['es' => 'vacío', 'de' => 'leer', 'ja' => '空', 'ko' => '빈', 'fr' => 'vide', 'tr' => 'boş', 'ru' => 'пустой', 'ar' => 'فارغ', 'az' => 'boş'],
        'heavy' => ['es' => 'pesado', 'de' => 'schwer', 'ja' => '重い', 'ko' => '무거운', 'fr' => 'lourd', 'tr' => 'ağır', 'ru' => 'тяжёлый', 'ar' => 'ثقيل', 'az' => 'ağır'],
        'light' => ['es' => 'ligero', 'de' => 'leicht', 'ja' => '軽い', 'ko' => '가벼운', 'fr' => 'léger', 'tr' => 'hafif', 'ru' => 'лёгкий', 'ar' => 'خفيف', 'az' => 'yüngül'],
        'scales' => ['es' => 'balanza', 'de' => 'Waage', 'ja' => 'はかり', 'ko' => '저울', 'fr' => 'balance', 'tr' => 'terazi', 'ru' => 'весы', 'ar' => 'ميزان', 'az' => 'tərəzi'],
        'to weigh' => ['es' => 'pesar', 'de' => 'wiegen', 'ja' => '量る', 'ko' => '무게를 재다', 'fr' => 'peser', 'tr' => 'tartmak', 'ru' => 'взвесить', 'ar' => 'الوزن', 'az' => 'çəkmək'],
        // --- shopping ---
        'to buy' => ['es' => 'comprar', 'de' => 'kaufen', 'ja' => '買う', 'ko' => '사다', 'fr' => 'acheter', 'tr' => 'almak', 'ru' => 'купить', 'ar' => 'الشراء', 'az' => 'almaq'],
        'buy' => ['es' => 'comprar', 'de' => 'kaufen', 'ja' => '買う', 'ko' => '사다', 'fr' => 'acheter', 'tr' => 'al', 'ru' => 'купи', 'ar' => 'اشتر', 'az' => 'al'],
        'to look for' => ['es' => 'buscar', 'de' => 'suchen', 'ja' => '探す', 'ko' => '찾다', 'fr' => 'chercher', 'tr' => 'aramak', 'ru' => 'искать', 'ar' => 'البحث', 'az' => 'axtarmaq'],
        'to find' => ['es' => 'encontrar', 'de' => 'finden', 'ja' => '見つける', 'ko' => '발견하다', 'fr' => 'trouver', 'tr' => 'bulmak', 'ru' => 'найти', 'ar' => 'العثور', 'az' => 'tapmaq'],
        'I need' => ['es' => 'necesito', 'de' => 'ich brauche', 'ja' => '必要です', 'ko' => '필요합니다', 'fr' => "j'ai besoin", 'tr' => 'ihtiyacım var', 'ru' => 'мне нужно', 'ar' => 'أحتاج', 'az' => 'lazımdır'],
        'to compare' => ['es' => 'comparar', 'de' => 'vergleichen', 'ja' => '比べる', 'ko' => '비교하다', 'fr' => 'comparer', 'tr' => 'karşılaştırmak', 'ru' => 'сравнить', 'ar' => 'المقارنة', 'az' => 'müqayisə etmək'],
        'discount' => ['es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'fr' => 'réduction', 'tr' => 'indirim', 'ru' => 'скидка', 'ar' => 'خصم', 'az' => 'endirim'],
        'to put' => ['es' => 'poner', 'de' => 'legen', 'ja' => '入れる', 'ko' => '넣다', 'fr' => 'mettre', 'tr' => 'koymak', 'ru' => 'положить', 'ar' => 'وضع', 'az' => 'qoymaq'],
        'to carry' => ['es' => 'llevar', 'de' => 'tragen', 'ja' => '運ぶ', 'ko' => '나르다', 'fr' => 'porter', 'tr' => 'taşımak', 'ru' => 'нести', 'ar' => 'الحمل', 'az' => 'daşımaq'],
        'enough' => ['es' => 'bastante', 'de' => 'genug', 'ja' => '十分に', 'ko' => '충분히', 'fr' => 'assez', 'tr' => 'yeterli', 'ru' => 'достаточно', 'ar' => 'كفى', 'az' => 'kifayət'],
        'prices' => ['es' => 'precios', 'de' => 'Preise', 'ja' => '値段', 'ko' => '가격', 'fr' => 'prix', 'tr' => 'fiyatlar', 'ru' => 'цены', 'ar' => 'أسعار', 'az' => 'qiymətlər'],
        'find' => ['es' => 'encontrar', 'de' => 'finden', 'ja' => '見つける', 'ko' => '발견하다', 'fr' => 'trouver', 'tr' => 'bul', 'ru' => 'найди', 'ar' => 'ابحث', 'az' => 'tap'],
    ];

    /** Native languages a learner can take an English course in. */
    private const LANGS = ['es', 'de', 'ja', 'ko', 'fr'];

    /**
     * The ['i18n' => [...]] map for an English word, ready to store in exercise
     * data. Falls back to the word itself if it isn't in the dictionary yet.
     *
     * @return array{i18n: array<string, string>}
     */
    public static function hint(string $english): array
    {
        return ['i18n' => self::meanings($english)];
    }

    /**
     * @return array<string, string>
     */
    public static function meanings(string $english): array
    {
        $key = mb_strtolower(trim($english));

        foreach (self::WORDS as $word => $translations) {
            if (mb_strtolower($word) === $key) {
                return $translations;
            }
        }

        // Not in the dictionary: show the English word itself to every learner.
        return array_fill_keys(self::LANGS, $english);
    }

    /** Every English word the dictionary knows (used for wrong-answer options). */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $english): bool
    {
        $key = mb_strtolower(trim($english));

        foreach (array_keys(self::WORDS) as $word) {
            if (mb_strtolower($word) === $key) {
                return true;
            }
        }

        return false;
    }
}
