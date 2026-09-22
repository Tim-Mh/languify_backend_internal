<?php

namespace Database\Seeders\Support;

/**
 * Turkish word => its meaning in every native language the app supports.
 *
 * Exercise hints, prompts and word-bank tiles must appear in the LEARNER'S
 * native language, so nothing user-facing may be hardcoded to English. Seeders
 * pull from here and store the result as an ['i18n' => [...]] map, which
 * ExerciseContentService resolves per request.
 *
 * TURKISH IS AGGLUTINATIVE, WHICH CHANGES WHAT BELONGS IN HERE.
 *
 * The other courses can treat a word and its grammar separately, because
 * French and German mark case with separate particles. Turkish glues them on:
 * "in the house" is one word, `evde`, not `ev` + `de`. Since the tap-word and
 * translate exercises hand the learner one tile per array entry, every inflected
 * form a phrase uses has to exist here as its own entry — otherwise the learner
 * is taught to assemble a form that is not Turkish.
 *
 * So `ev` (house) and `evde` (in the house) are both listed, and both are real
 * standalone words. What is never listed is a bare suffix, because a suffix is
 * not a tile a learner should ever be asked to place on its own.
 *
 * Add a word here once and every unit can use it.
 */
class TurkishVocabulary
{
    private const WORDS = [
        // --- Unit 1: at the café ---------------------------------------
        'kahve' => ['en' => 'coffee', 'fr' => 'café', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'ru' => 'кофе', 'ar' => 'قهوة', 'az' => 'qəhvə'],
        'çay' => ['en' => 'tea', 'fr' => 'thé', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'ru' => 'чай', 'ar' => 'شاي', 'az' => 'çay'],
        'su' => ['en' => 'water', 'fr' => 'eau', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'ru' => 'вода', 'ar' => 'ماء', 'az' => 'su'],
        'süt' => ['en' => 'milk', 'fr' => 'lait', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'ru' => 'молоко', 'ar' => 'حليب', 'az' => 'süd'],
        'ekmek' => ['en' => 'bread', 'fr' => 'pain', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'ru' => 'хлеб', 'ar' => 'خبز', 'az' => 'çörək'],
        'şeker' => ['en' => 'sugar', 'fr' => 'sucre', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'ru' => 'сахар', 'ar' => 'سكر', 'az' => 'şəkər'],
        'peynir' => ['en' => 'cheese', 'fr' => 'fromage', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'ru' => 'сыр', 'ar' => 'جبن', 'az' => 'pendir'],
        'pasta' => ['en' => 'cake', 'fr' => 'gâteau', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'ru' => 'торт', 'ar' => 'كعكة', 'az' => 'tort'],
        // --- Unit 1: the glue words ------------------------------------
        // `bir` is both "one" and the indefinite article, which is why it can
        // carry the whole job "un/une" does in French.
        'bir' => ['en' => 'a', 'fr' => 'un', 'es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의', 'ru' => 'один', 'ar' => 'واحد', 'az' => 'bir'],
        've' => ['en' => 'and', 'fr' => 'et', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'ru' => 'и', 'ar' => 'و', 'az' => 'və'],
        'lütfen' => ['en' => 'please', 'fr' => "s'il vous plaît", 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'ru' => 'пожалуйста', 'ar' => 'من فضلك', 'az' => 'zəhmət olmasa'],
        'merhaba' => ['en' => 'hello', 'fr' => 'bonjour', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'ru' => 'привет', 'ar' => 'مرحبا', 'az' => 'salam'],
        // --- Unit 2: greetings and courtesy ----------------------------
        'teşekkürler' => ['en' => 'thank you', 'fr' => 'merci', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'ru' => 'спасибо', 'ar' => 'شكرا', 'az' => 'təşəkkür'],
        'evet' => ['en' => 'yes', 'fr' => 'oui', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'ru' => 'да', 'ar' => 'نعم', 'az' => 'bəli'],
        'hayır' => ['en' => 'no', 'fr' => 'non', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'ru' => 'нет', 'ar' => 'لا', 'az' => 'xeyr'],
        'hoşça kal' => ['en' => 'goodbye', 'fr' => 'au revoir', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'ru' => 'до свидания', 'ar' => 'مع السلامة', 'az' => 'sağ ol'],
        'günaydın' => ['en' => 'good morning', 'fr' => 'bonjour', 'es' => 'buenos días', 'de' => 'guten Morgen', 'ja' => 'おはよう', 'ko' => '좋은 아침', 'ru' => 'доброе утро', 'ar' => 'صباح الخير', 'az' => 'sabahınız xeyir'],
        'affedersiniz' => ['en' => 'excuse me', 'fr' => 'excusez-moi', 'es' => 'perdón', 'de' => 'Entschuldigung', 'ja' => 'すみません', 'ko' => '실례합니다', 'ru' => 'извините', 'ar' => 'عفوا', 'az' => 'bağışlayın'],
        'istiyorum' => ['en' => 'I would like', 'fr' => 'je voudrais', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'ru' => 'я хочу', 'ar' => 'أريد', 'az' => 'istəyirəm'],
        'hesap' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'ru' => 'счёт', 'ar' => 'الحساب', 'az' => 'hesab'],
        // --- Unit 2: people and home -----------------------------------
        'kitap' => ['en' => 'book', 'fr' => 'livre', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'ru' => 'книга', 'ar' => 'كتاب', 'az' => 'kitab'],
        'kalem' => ['en' => 'pen', 'fr' => 'stylo', 'es' => 'bolígrafo', 'de' => 'Stift', 'ja' => 'ペン', 'ko' => '펜', 'ru' => 'ручка', 'ar' => 'قلم', 'az' => 'qələm'],
        'ev' => ['en' => 'house', 'fr' => 'maison', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'ru' => 'дом', 'ar' => 'بيت', 'az' => 'ev'],
        'okul' => ['en' => 'school', 'fr' => 'école', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'ru' => 'школа', 'ar' => 'مدرسة', 'az' => 'məktəb'],
        'masa' => ['en' => 'table', 'fr' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '탁자', 'ru' => 'стол', 'ar' => 'طاولة', 'az' => 'masa'],
        'sandalye' => ['en' => 'chair', 'fr' => 'chaise', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'ru' => 'стул', 'ar' => 'كرسي', 'az' => 'stul'],
        'kedi' => ['en' => 'cat', 'fr' => 'chat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'ru' => 'кот', 'ar' => 'قط', 'az' => 'pişik'],
        'köpek' => ['en' => 'dog', 'fr' => 'chien', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'ru' => 'собака', 'ar' => 'كلب', 'az' => 'it'],
        'bu' => ['en' => 'this', 'fr' => 'ceci', 'es' => 'este', 'de' => 'dies', 'ja' => 'これ', 'ko' => '이것', 'ru' => 'это', 'ar' => 'هذا', 'az' => 'bu'],
        'benim' => ['en' => 'my', 'fr' => 'mon', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '내', 'ru' => 'мой', 'ar' => 'خاصتي', 'az' => 'mənim'],
        // Possessed forms, listed whole because the learner places them as one
        // tile. `kitabım` (not `kitapım`): a final p softens to b before a
        // vowel-initial suffix. `evim` / `okulum`: the suffix vowel harmonises
        // with the stem, so no single ending fits every word.
        'kitabım' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '내 책', 'ru' => 'моя книга', 'ar' => 'كتابي', 'az' => 'kitabım'],
        'evim' => ['en' => 'my house', 'fr' => 'ma maison', 'es' => 'mi casa', 'de' => 'mein Haus', 'ja' => '私の家', 'ko' => '내 집', 'ru' => 'мой дом', 'ar' => 'بيتي', 'az' => 'evim'],
        'okulum' => ['en' => 'my school', 'fr' => 'mon école', 'es' => 'mi escuela', 'de' => 'meine Schule', 'ja' => '私の学校', 'ko' => '내 학교', 'ru' => 'моя школа', 'ar' => 'مدرستي', 'az' => 'məktəbim'],
        // --- Unit 3: family --------------------------------------------
        // Turkish splits siblings by gender and has no single word for
        // "brother"/"sister" on its own, so the two-word forms are the entries.
        'anne' => ['en' => 'mother', 'fr' => 'mère', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'ru' => 'мама', 'ar' => 'أم', 'az' => 'ana'],
        'baba' => ['en' => 'father', 'fr' => 'père', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'ru' => 'папа', 'ar' => 'أب', 'az' => 'ata'],
        'erkek kardeş' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '남자 형제', 'ru' => 'брат', 'ar' => 'أخ', 'az' => 'qardaş'],
        'kız kardeş' => ['en' => 'sister', 'fr' => 'sœur', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '여자 형제', 'ru' => 'сестра', 'ar' => 'أخت', 'az' => 'bacı'],
        'arkadaş' => ['en' => 'friend', 'fr' => 'ami', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'ru' => 'друг', 'ar' => 'صديق', 'az' => 'dost'],
        'komşu' => ['en' => 'neighbour', 'fr' => 'voisin', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'ru' => 'сосед', 'ar' => 'جار', 'az' => 'qonşu'],
        'öğretmen' => ['en' => 'teacher', 'fr' => 'professeur', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'ru' => 'учитель', 'ar' => 'معلم', 'az' => 'müəllim'],
        'doktor' => ['en' => 'doctor', 'fr' => 'médecin', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'ru' => 'врач', 'ar' => 'طبيب', 'az' => 'həkim'],
        // Possessed family forms. `annem` / `babam` end in a vowel so they take
        // a bare -m; `arkadaşım` needs a harmony vowel first. Whole tiles again.
        'annem' => ['en' => 'my mother', 'fr' => 'ma mère', 'es' => 'mi madre', 'de' => 'meine Mutter', 'ja' => '私の母', 'ko' => '내 어머니', 'ru' => 'моя мама', 'ar' => 'أمي', 'az' => 'anam'],
        'babam' => ['en' => 'my father', 'fr' => 'mon père', 'es' => 'mi padre', 'de' => 'mein Vater', 'ja' => '私の父', 'ko' => '내 아버지', 'ru' => 'мой папа', 'ar' => 'أبي', 'az' => 'atam'],
        'arkadaşım' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'mi amigo', 'de' => 'mein Freund', 'ja' => '私の友達', 'ko' => '내 친구', 'ru' => 'мой друг', 'ar' => 'صديقي', 'az' => 'dostum'],
        'kardeşim' => ['en' => 'my sibling', 'fr' => 'mon frère', 'es' => 'mi hermano', 'de' => 'mein Geschwister', 'ja' => '私の兄弟', 'ko' => '내 형제', 'ru' => 'мой брат', 'ar' => 'أخ', 'az' => 'mənim qardaş'],
        // --- Unit 4: eating and drinking, and the first verbs -----------
        // Turkish verbs are cited by their infinitive (-mek/-mak), which is the
        // form a dictionary and a word bank both use.
        'yemek' => ['en' => 'to eat', 'fr' => 'manger', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'ru' => 'кушать', 'ar' => 'الأكل', 'az' => 'yemək yemək'],
        'içmek' => ['en' => 'to drink', 'fr' => 'boire', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'ru' => 'пить', 'ar' => 'الشرب', 'az' => 'içmək'],
        'elma' => ['en' => 'apple', 'fr' => 'pomme', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'ru' => 'яблоко', 'ar' => 'تفاحة', 'az' => 'alma'],
        'balık' => ['en' => 'fish', 'fr' => 'poisson', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'ru' => 'рыба', 'ar' => 'سمك', 'az' => 'balıq'],
        'çorba' => ['en' => 'soup', 'fr' => 'soupe', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'ru' => 'суп', 'ar' => 'حساء', 'az' => 'şorba'],
        'salata' => ['en' => 'salad', 'fr' => 'salade', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'ru' => 'салат', 'ar' => 'سلطة', 'az' => 'salat'],
        'pirinç' => ['en' => 'rice', 'fr' => 'riz', 'es' => 'arroz', 'de' => 'Reis', 'ja' => '米', 'ko' => '쌀', 'ru' => 'рис', 'ar' => 'أرز', 'az' => 'düyü'],
        'et' => ['en' => 'meat', 'fr' => 'viande', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'ru' => 'мясо', 'ar' => 'لحم', 'az' => 'ət'],
        // ACCUSATIVE FORMS. Turkish marks a DEFINITE direct object with a
        // suffix: you eat "an apple" (`elma yemek`) but "the apple" is
        // `elmayı`. The vowel harmonises with the stem and a buffer -y- appears
        // after a vowel, so `elmayı` / `balığı` / `çorbayı` share no single
        // ending. Each is its own tile, and its own entry, for that reason.
        // `balığı`, not `balıkı`: final k softens to ğ before a vowel.
        'elmayı' => ['en' => 'the apple', 'fr' => 'la pomme', 'es' => 'la manzana', 'de' => 'den Apfel', 'ja' => 'りんごを', 'ko' => '사과를', 'ru' => 'яблоко', 'ar' => 'تفاحة', 'az' => 'alma'],
        'balığı' => ['en' => 'the fish', 'fr' => 'le poisson', 'es' => 'el pescado', 'de' => 'den Fisch', 'ja' => '魚を', 'ko' => '생선을', 'ru' => 'рыбу', 'ar' => 'السمك', 'az' => 'balığı'],
        'çorbayı' => ['en' => 'the soup', 'fr' => 'la soupe', 'es' => 'la sopa', 'de' => 'die Suppe', 'ja' => 'スープを', 'ko' => '수프를', 'ru' => 'суп', 'ar' => 'حساء', 'az' => 'şorba'],
        'suyu' => ['en' => 'the water', 'fr' => "l'eau", 'es' => 'el agua', 'de' => 'das Wasser', 'ja' => '水を', 'ko' => '물을', 'ru' => 'воду', 'ar' => 'الماء', 'az' => 'suyu'],
        // --- Unit 5: colours and size ----------------------------------
        // Adjectives sit in front of the noun and never change shape, which
        // makes this the easiest unit in the chapter: `kırmızı kitap`,
        // `kırmızı ev`, `kırmızı elma` — one form, every time.
        'kırmızı' => ['en' => 'red', 'fr' => 'rouge', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤い', 'ko' => '빨간', 'ru' => 'красный', 'ar' => 'أحمر', 'az' => 'qırmızı'],
        'mavi' => ['en' => 'blue', 'fr' => 'bleu', 'es' => 'azul', 'de' => 'blau', 'ja' => '青い', 'ko' => '파란', 'ru' => 'синий', 'ar' => 'أزرق', 'az' => 'mavi'],
        'yeşil' => ['en' => 'green', 'fr' => 'vert', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑の', 'ko' => '초록', 'ru' => 'зелёный', 'ar' => 'أخضر', 'az' => 'yaşıl'],
        'sarı' => ['en' => 'yellow', 'fr' => 'jaune', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色い', 'ko' => '노란', 'ru' => 'жёлтый', 'ar' => 'أصفر', 'az' => 'sarı'],
        'siyah' => ['en' => 'black', 'fr' => 'noir', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒い', 'ko' => '검은', 'ru' => 'чёрный', 'ar' => 'أسود', 'az' => 'qara'],
        'beyaz' => ['en' => 'white', 'fr' => 'blanc', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白い', 'ko' => '하얀', 'ru' => 'белый', 'ar' => 'أبيض', 'az' => 'ağ'],
        'büyük' => ['en' => 'big', 'fr' => 'grand', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'ru' => 'большой', 'ar' => 'كبير', 'az' => 'böyük'],
        'küçük' => ['en' => 'small', 'fr' => 'petit', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'ru' => 'маленький', 'ar' => 'صغير', 'az' => 'kiçik'],
        // --- Unit 6: places and going to them --------------------------
        'park' => ['en' => 'park', 'fr' => 'parc', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'ru' => 'парк', 'ar' => 'حديقة', 'az' => 'park'],
        'dükkân' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'ru' => 'магазин', 'ar' => 'متجر', 'az' => 'mağaza'],
        'sokak' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'ru' => 'улица', 'ar' => 'شارع', 'az' => 'küçə'],
        'istasyon' => ['en' => 'station', 'fr' => 'gare', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'ru' => 'станция', 'ar' => 'محطة', 'az' => 'stansiya'],
        'gitmek' => ['en' => 'to go', 'fr' => 'aller', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'ru' => 'идти', 'ar' => 'الذهاب', 'az' => 'getmək'],
        // DATIVE FORMS — "to the park". Another suffix, another set of shapes:
        // `parka` after a back vowel, `eve` after a front one, and a buffer -y-
        // after a vowel (`okula` has none, but `arabaya` would). Whole tiles.
        'parka' => ['en' => 'to the park', 'fr' => 'au parc', 'es' => 'al parque', 'de' => 'zum Park', 'ja' => '公園へ', 'ko' => '공원에', 'ru' => 'в парк', 'ar' => 'إلى الحديقة', 'az' => 'parka'],
        'eve' => ['en' => 'to the house', 'fr' => 'à la maison', 'es' => 'a casa', 'de' => 'nach Hause', 'ja' => '家へ', 'ko' => '집에', 'ru' => 'в дом', 'ar' => 'إلى البيت', 'az' => 'evə'],
        'okula' => ['en' => 'to school', 'fr' => "à l'école", 'es' => 'a la escuela', 'de' => 'zur Schule', 'ja' => '学校へ', 'ko' => '학교에', 'ru' => 'в школу', 'ar' => 'إلى المدرسة', 'az' => 'məktəbə'],
        'dükkâna' => ['en' => 'to the shop', 'fr' => 'au magasin', 'es' => 'a la tienda', 'de' => 'zum Geschäft', 'ja' => '店へ', 'ko' => '가게에', 'ru' => 'в магазин', 'ar' => 'إلى المتجر', 'az' => 'mağazaya'],
        // --- Unit 7: daily actions -------------------------------------
        'yürümek' => ['en' => 'to walk', 'fr' => 'marcher', 'es' => 'caminar', 'de' => 'gehen', 'ja' => '歩く', 'ko' => '걷다', 'ru' => 'гулять', 'ar' => 'التمشي', 'az' => 'gəzmək'],
        'uyumak' => ['en' => 'to sleep', 'fr' => 'dormir', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다', 'ru' => 'спать', 'ar' => 'النوم', 'az' => 'yatmaq'],
        'konuşmak' => ['en' => 'to speak', 'fr' => 'parler', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'ru' => 'говорить', 'ar' => 'التكلم', 'az' => 'danışmaq'],
        'okumak' => ['en' => 'to read', 'fr' => 'lire', 'es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'ru' => 'читать', 'ar' => 'القراءة', 'az' => 'oxumaq'],
        'ben' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '나', 'ru' => 'я', 'ar' => 'أنا', 'az' => 'mən'],
        'yavaş' => ['en' => 'slowly', 'fr' => 'lentement', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'ru' => 'медленно', 'ar' => 'ببطء', 'az' => 'yavaş'],
        'iyi' => ['en' => 'well', 'fr' => 'bien', 'es' => 'bien', 'de' => 'gut', 'ja' => 'よく', 'ko' => '잘', 'ru' => 'хорошо', 'ar' => 'بخير', 'az' => 'yaxşıyam'],
        // `ile` (with) follows its noun rather than preceding it, and in speech
        // usually fuses onto it (`arkadaşımla`). The standalone form is taught
        // first because it is the one a learner can place as a tile.
        'ile' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와', 'ru' => 'с', 'ar' => 'مع', 'az' => 'ilə'],
        'çok' => ['en' => 'a lot', 'fr' => 'beaucoup', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이', 'ru' => 'много', 'ar' => 'كثير', 'az' => 'çoxlu'],
        // PRESENT-TENSE FORMS, first person. Turkish conjugates by suffix, and
        // the shape depends on the stem's last vowel and whether it ends in a
        // vowel: `yürüyorum`, `uyuyorum`, `okuyorum`, `yiyorum`. The -yor- is
        // constant; nothing else is. Whole tiles, as always.
        'yürüyorum' => ['en' => 'I walk', 'fr' => 'je marche', 'es' => 'camino', 'de' => 'ich gehe', 'ja' => '私は歩く', 'ko' => '나는 걷는다', 'ru' => 'я гуляю', 'ar' => 'أتمشى', 'az' => 'gəzirəm'],
        'uyuyorum' => ['en' => 'I sleep', 'fr' => 'je dors', 'es' => 'duermo', 'de' => 'ich schlafe', 'ja' => '私は寝る', 'ko' => '나는 잔다', 'ru' => 'я сплю', 'ar' => 'أنام', 'az' => 'yatıram'],
        'okuyorum' => ['en' => 'I read', 'fr' => 'je lis', 'es' => 'leo', 'de' => 'ich lese', 'ja' => '私は読む', 'ko' => '나는 읽는다', 'ru' => 'я читаю', 'ar' => 'أقرأ', 'az' => 'oxuyuram'],
        'konuşuyorum' => ['en' => 'I speak', 'fr' => 'je parle', 'es' => 'hablo', 'de' => 'ich spreche', 'ja' => '私は話す', 'ko' => '나는 말한다', 'ru' => 'я говорю', 'ar' => 'أتكلم', 'az' => 'danışıram'],
        // --- Unit 8: time and days -------------------------------------
        'gün' => ['en' => 'day', 'fr' => 'jour', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'ru' => 'день', 'ar' => 'يوم', 'az' => 'gün'],
        'sabah' => ['en' => 'morning', 'fr' => 'matin', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'ru' => 'утро', 'ar' => 'صباح', 'az' => 'səhər'],
        'akşam' => ['en' => 'evening', 'fr' => 'soir', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'ru' => 'вечер', 'ar' => 'مساء', 'az' => 'axşam'],
        'gece' => ['en' => 'night', 'fr' => 'nuit', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'ru' => 'ночь', 'ar' => 'ليل', 'az' => 'gecə'],
        'bugün' => ['en' => 'today', 'fr' => "aujourd'hui", 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'ru' => 'сегодня', 'ar' => 'اليوم', 'az' => 'bu gün'],
        'yarın' => ['en' => 'tomorrow', 'fr' => 'demain', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'ru' => 'завтра', 'ar' => 'غدا', 'az' => 'sabah'],
        'saat' => ['en' => 'clock', 'fr' => 'horloge', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'ru' => 'часы', 'ar' => 'ساعة', 'az' => 'saat'],
        'hafta' => ['en' => 'week', 'fr' => 'semaine', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'ru' => 'неделя', 'ar' => 'أسبوع', 'az' => 'həftə'],
        // --- Unit 9: weather and seasons -------------------------------
        'güneş' => ['en' => 'sun', 'fr' => 'soleil', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '태양', 'ru' => 'солнце', 'ar' => 'شمس', 'az' => 'günəş'],
        'yağmur' => ['en' => 'rain', 'fr' => 'pluie', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'ru' => 'дождь', 'ar' => 'مطر', 'az' => 'yağış'],
        'kar' => ['en' => 'snow', 'fr' => 'neige', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'ru' => 'снег', 'ar' => 'ثلج', 'az' => 'qar'],
        'rüzgâr' => ['en' => 'wind', 'fr' => 'vent', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'ru' => 'ветер', 'ar' => 'ريح', 'az' => 'külək'],
        'yaz' => ['en' => 'summer', 'fr' => 'été', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'ru' => 'лето', 'ar' => 'صيف', 'az' => 'yay'],
        'kış' => ['en' => 'winter', 'fr' => 'hiver', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'ru' => 'зима', 'ar' => 'شتاء', 'az' => 'qış'],
        'ilkbahar' => ['en' => 'spring', 'fr' => 'printemps', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'ru' => 'весна', 'ar' => 'ربيع', 'az' => 'yaz'],
        'sonbahar' => ['en' => 'autumn', 'fr' => 'automne', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'ru' => 'осень', 'ar' => 'خريف', 'az' => 'payız'],
        'sıcak' => ['en' => 'hot', 'fr' => 'chaud', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '暑い', 'ko' => '더운', 'ru' => 'горячий', 'ar' => 'ساخن', 'az' => 'isti'],
        'soğuk' => ['en' => 'cold', 'fr' => 'froid', 'es' => 'frío', 'de' => 'kalt', 'ja' => '寒い', 'ko' => '추운', 'ru' => 'холодный', 'ar' => 'بارد', 'az' => 'soyuq'],
        // --- Unit 10: feelings and review ------------------------------
        'mutlu' => ['en' => 'happy', 'fr' => 'heureux', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せ', 'ko' => '행복한', 'ru' => 'счастливый', 'ar' => 'فرح', 'az' => 'xoşbəxt'],
        'üzgün' => ['en' => 'sad', 'fr' => 'triste', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'ru' => 'грустный', 'ar' => 'حزين', 'az' => 'kədərli'],
        'yorgun' => ['en' => 'tired', 'fr' => 'fatigué', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'ru' => 'усталый', 'ar' => 'متعب', 'az' => 'yorğun'],
        'hasta' => ['en' => 'sick', 'fr' => 'malade', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気', 'ko' => '아픈', 'ru' => 'больной', 'ar' => 'مريض', 'az' => 'xəstə'],
        'mutluyum' => ['en' => 'I am happy', 'fr' => 'je suis heureux', 'es' => 'estoy feliz', 'de' => 'ich bin glücklich', 'ja' => '私は幸せです', 'ko' => '나는 행복하다', 'ru' => 'я счастлив', 'ar' => 'أنا فرح', 'az' => 'xoşbəxtəm'],
        'yorgunum' => ['en' => 'I am tired', 'fr' => 'je suis fatigué', 'es' => 'estoy cansado', 'de' => 'ich bin müde', 'ja' => '私は疲れた', 'ko' => '나는 피곤하다', 'ru' => 'я устал', 'ar' => 'أنا متعب', 'az' => 'yorğunam'],
        /* =====================================================================
         * CHAPTER 2 — CONVERSATION
         * ===================================================================*/

        // --- C2 Unit 1: meeting people ---------------------------------
        'nasılsın' => ['en' => 'how are you', 'fr' => 'comment vas-tu', 'es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => '元気ですか', 'ko' => '어떻게 지내', 'ru' => 'как дела', 'ar' => 'كيف حالك', 'az' => 'necəsən'],
        'iyiyim' => ['en' => 'I am well', 'fr' => 'je vais bien', 'es' => 'estoy bien', 'de' => 'mir geht es gut', 'ja' => '元気です', 'ko' => '잘 지내요', 'ru' => 'я хорошо', 'ar' => 'بخير', 'az' => 'yaxşıyam'],
        'memnun oldum' => ['en' => 'nice to meet you', 'fr' => 'enchanté', 'es' => 'mucho gusto', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '만나서 반갑습니다', 'ru' => 'приятно познакомиться', 'ar' => 'تشرفنا', 'az' => 'tanış olmağa şadam'],
        'adım' => ['en' => 'my name', 'fr' => 'mon nom', 'es' => 'mi nombre', 'de' => 'mein Name', 'ja' => '私の名前', 'ko' => '내 이름', 'ru' => 'моё имя', 'ar' => 'اسمي', 'az' => 'adım'],
        'senin' => ['en' => 'your', 'fr' => 'ton', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '너의', 'ru' => 'твой', 'ar' => 'خاصتك', 'az' => 'sənin'],
        'sen' => ['en' => 'you', 'fr' => 'tu', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '너', 'ru' => 'ты', 'ar' => 'أنت', 'az' => 'sən'],
        'hoş geldin' => ['en' => 'welcome', 'fr' => 'bienvenue', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'ru' => 'добро пожаловать', 'ar' => 'أهلا وسهلا', 'az' => 'xoş gəlmisiniz'],
        // --- C2 Unit 2: asking questions -------------------------------
        // Turkish question words go where the answer would go, not at the
        // front — `adın ne` is literally "your-name what".
        'ne' => ['en' => 'what', 'fr' => 'quoi', 'es' => 'qué', 'de' => 'was', 'ja' => '何', 'ko' => '무엇', 'ru' => 'что', 'ar' => 'ماذا', 'az' => 'nə'],
        'kim' => ['en' => 'who', 'fr' => 'qui', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'ru' => 'кто', 'ar' => 'مَن', 'az' => 'kim'],
        'nerede' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'ru' => 'где', 'ar' => 'أين', 'az' => 'harada'],
        'ne zaman' => ['en' => 'when', 'fr' => 'quand', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'ru' => 'когда', 'ar' => 'متى', 'az' => 'nə vaxt'],
        'neden' => ['en' => 'why', 'fr' => 'pourquoi', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'ru' => 'почему', 'ar' => 'لماذا', 'az' => 'niyə'],
        'nasıl' => ['en' => 'how', 'fr' => 'comment', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게', 'ru' => 'как', 'ar' => 'كيف', 'az' => 'necə'],
        'kaç' => ['en' => 'how many', 'fr' => 'combien', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇', 'ru' => 'сколько', 'ar' => 'كم', 'az' => 'neçə'],
        'adın' => ['en' => 'your name', 'fr' => 'ton nom', 'es' => 'tu nombre', 'de' => 'dein Name', 'ja' => 'あなたの名前', 'ko' => '너의 이름', 'ru' => 'твоё имя', 'ar' => 'اسمك', 'az' => 'adın'],
        // --- C2 Unit 3: numbers ----------------------------------------
        'iki' => ['en' => 'two', 'fr' => 'deux', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'ru' => 'два', 'ar' => 'اثنان', 'az' => 'iki'],
        'üç' => ['en' => 'three', 'fr' => 'trois', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'ru' => 'три', 'ar' => 'ثلاثة', 'az' => 'üç'],
        'dört' => ['en' => 'four', 'fr' => 'quatre', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'ru' => 'четыре', 'ar' => 'أربعة', 'az' => 'dörd'],
        'beş' => ['en' => 'five', 'fr' => 'cinq', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'ru' => 'пять', 'ar' => 'خمسة', 'az' => 'beş'],
        'on' => ['en' => 'ten', 'fr' => 'dix', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'ru' => 'десять', 'ar' => 'عشرة', 'az' => 'on'],
        'yaş' => ['en' => 'age', 'fr' => 'âge', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'ru' => 'возраст', 'ar' => 'عمر', 'az' => 'yaş'],
        'yaşındayım' => ['en' => 'I am years old', 'fr' => "j'ai ans", 'es' => 'tengo años', 'de' => 'ich bin Jahre alt', 'ja' => '歳です', 'ko' => '살입니다', 'ru' => 'мне лет', 'ar' => 'عمري سنة', 'az' => 'yaşındayam'],
        // `yaşım` = my age. Same possessive -ım the Beginner chapter taught.
        'yaşım' => ['en' => 'my age', 'fr' => 'mon âge', 'es' => 'mi edad', 'de' => 'mein Alter', 'ja' => '私の年齢', 'ko' => '내 나이', 'ru' => 'мой возраст', 'ar' => 'عمري', 'az' => 'yaşım'],
        'kitaplar' => ['en' => 'books', 'fr' => 'livres', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'ru' => 'книги', 'ar' => 'كتب', 'az' => 'kitablar'],
        // --- C2 Unit 4: feelings ---------------------------------------
        'memnun' => ['en' => 'glad', 'fr' => 'content', 'es' => 'contento', 'de' => 'froh', 'ja' => 'うれしい', 'ko' => '기쁜', 'ru' => 'рада', 'ar' => 'سعيد', 'az' => 'şad'],
        'sakin' => ['en' => 'calm', 'fr' => 'calme', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '穏やか', 'ko' => '차분한', 'ru' => 'спокойный', 'ar' => 'هادئ', 'az' => 'sakit'],
        'biraz' => ['en' => 'a little', 'fr' => 'un peu', 'es' => 'un poco', 'de' => 'ein wenig', 'ja' => '少し', 'ko' => '조금', 'ru' => 'немного', 'ar' => 'قليل', 'az' => 'az'],
        'çünkü' => ['en' => 'because', 'fr' => 'parce que', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'ru' => 'потому что', 'ar' => 'لأن', 'az' => 'çünki'],
        'hastayım' => ['en' => 'I am sick', 'fr' => 'je suis malade', 'es' => 'estoy enfermo', 'de' => 'ich bin krank', 'ja' => '私は病気です', 'ko' => '나는 아프다', 'ru' => 'я болен', 'ar' => 'أنا مريض', 'az' => 'xəstəyəm'],
        'üzgünüm' => ['en' => 'I am sad', 'fr' => 'je suis triste', 'es' => 'estoy triste', 'de' => 'ich bin traurig', 'ja' => '私は悲しい', 'ko' => '나는 슬프다', 'ru' => 'мне грустно', 'ar' => 'أنا حزين', 'az' => 'kədərliyəm'],
        // --- C2 Unit 5: the past ---------------------------------------
        // Turkish past tense is -dı/-di/-du/-dü, harmonising with the stem, and
        // hardening to -tı after a voiceless consonant (`gitti`, not `gitdi`).
        'yedim' => ['en' => 'I ate', 'fr' => "j'ai mangé", 'es' => 'comí', 'de' => 'ich aß', 'ja' => '私は食べた', 'ko' => '나는 먹었다', 'ru' => 'я ел', 'ar' => 'أكلت', 'az' => 'yedim'],
        'içtim' => ['en' => 'I drank', 'fr' => "j'ai bu", 'es' => 'bebí', 'de' => 'ich trank', 'ja' => '私は飲んだ', 'ko' => '나는 마셨다', 'ru' => 'я пил', 'ar' => 'شربت', 'az' => 'içdim'],
        'gördüm' => ['en' => 'I saw', 'fr' => "j'ai vu", 'es' => 'vi', 'de' => 'ich sah', 'ja' => '私は見た', 'ko' => '나는 봤다', 'ru' => 'я видел', 'ar' => 'رأيت', 'az' => 'gördüm'],
        'dün' => ['en' => 'yesterday', 'fr' => 'hier', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'ru' => 'вчера', 'ar' => 'أمس', 'az' => 'dünən'],
        'zaten' => ['en' => 'already', 'fr' => 'déjà', 'es' => 'ya', 'de' => 'schon', 'ja' => 'すでに', 'ko' => '이미', 'ru' => 'уже', 'ar' => 'بالفعل', 'az' => 'artıq'],
        'sonra' => ['en' => 'then', 'fr' => 'ensuite', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그 다음', 'ru' => 'потом', 'ar' => 'ثم', 'az' => 'sonra'],
        'iyiydi' => ['en' => 'it was good', 'fr' => "c'était bien", 'es' => 'estuvo bien', 'de' => 'es war gut', 'ja' => 'よかった', 'ko' => '좋았다', 'ru' => 'было хорошо', 'ar' => 'كان جيدا', 'az' => 'yaxşı idi'],
        'gördü' => ['en' => 'saw', 'fr' => 'a vu', 'es' => 'vio', 'de' => 'sah', 'ja' => '見た', 'ko' => '봤다', 'ru' => 'видела', 'ar' => 'رأى', 'az' => 'gördü'],
        'memnunum' => ['en' => 'I am glad', 'fr' => 'je suis content', 'es' => 'estoy contento', 'de' => 'ich bin froh', 'ja' => '私は嬉しいです', 'ko' => '저는 기쁩니다', 'ru' => 'я рад', 'ar' => 'أنا سعيد', 'az' => 'şadam'],
        'kız kardeşim' => ['en' => 'my sister', 'fr' => 'ma soeur', 'es' => 'mi hermana', 'de' => 'meine Schwester', 'ja' => '私の姉妹', 'ko' => '제 자매', 'ru' => 'моя сестра', 'ar' => 'أختي', 'az' => 'bacım'],
        'evde' => ['en' => 'in the house', 'fr' => 'à la maison', 'es' => 'en la casa', 'de' => 'im Haus', 'ja' => '家で', 'ko' => '집에서', 'ru' => 'в доме', 'ar' => 'في البيت', 'az' => 'evdə'],
        'hissediyorum' => ['en' => 'I feel', 'fr' => 'je me sens', 'es' => 'me siento', 'de' => 'ich fühle mich', 'ja' => '私は感じます', 'ko' => '저는 느낍니다', 'ru' => 'я чувствую', 'ar' => 'أشعر', 'az' => 'hiss edirəm'],
        'arkadaşımla' => ['en' => 'with my friend', 'fr' => 'avec mon ami', 'es' => 'con mi amigo', 'de' => 'mit meinem Freund', 'ja' => '私の友達と', 'ko' => '제 친구와', 'ru' => 'с другом', 'ar' => 'مع صديقي', 'az' => 'dostumla'],
        'o' => ['en' => 'it', 'fr' => 'il', 'es' => 'eso', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것', 'ru' => 'оно', 'ar' => 'هو', 'az' => 'o'],
        'parkı' => ['en' => 'the park', 'fr' => 'le parc', 'es' => 'el parque', 'de' => 'den Park', 'ja' => '公園を', 'ko' => '공원을', 'ru' => 'парк', 'ar' => 'الحديقة', 'az' => 'parkda'],
        'burada' => ['en' => 'here', 'fr' => 'ici', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここに', 'ko' => '여기에', 'ru' => 'здесь', 'ar' => 'هنا', 'az' => 'burada'],
        'evi' => ['en' => 'the house', 'fr' => 'la maison', 'es' => 'la casa', 'de' => 'das Haus', 'ja' => '家を', 'ko' => '집을', 'ru' => 'доме', 'ar' => 'البيت', 'az' => 'evdə'],
        'okuldaydım' => ['en' => 'I was in the school', 'fr' => 'j\'étais à l\'école', 'es' => 'estaba en la escuela', 'de' => 'ich war in der Schule', 'ja' => '私は学校にいました', 'ko' => '저는 학교에 있었습니다', 'ru' => 'был в школе', 'ar' => 'كنت في المدرسة', 'az' => 'məktəbdə idim'],
        'buradaydım' => ['en' => 'I was here', 'fr' => 'j\'étais ici', 'es' => 'estaba aquí', 'de' => 'ich war hier', 'ja' => '私はここにいました', 'ko' => '저는 여기에 있었습니다', 'ru' => 'был здесь', 'ar' => 'كنت هنا', 'az' => 'burada idim'],
        'dükkan' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'ru' => 'магазин', 'ar' => 'متجر', 'az' => 'mağaza'],
        'kardeş' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'ru' => 'брат', 'ar' => 'أخ', 'az' => 'qardaş'],
        // --- Conversation Unit 6: future plans -------------------------
        //
        // The future is the suffix -acak/-ecek, picked by vowel harmony, and
        // the -k softens to -ğ before the personal ending: gel + ecek + im
        // becomes `geleceğim`, not `gelecekim`. Whole tiles, as everywhere
        // else here, because a learner assembling the suffix themselves would
        // have to make two sound changes nobody has taught them yet.
        'gideceğim' => ['en' => 'I will go', 'fr' => "j'irai", 'es' => 'iré', 'de' => 'ich werde gehen', 'ja' => '私は行きます', 'ko' => '저는 갈 거예요', 'ru' => 'я пойду', 'ar' => 'سأذهب', 'az' => 'gedəcəyəm'],
        'geleceğim' => ['en' => 'I will come', 'fr' => 'je viendrai', 'es' => 'vendré', 'de' => 'ich werde kommen', 'ja' => '私は来ます', 'ko' => '저는 올 거예요', 'ru' => 'я приду', 'ar' => 'سآتي', 'az' => 'gələcəyəm'],
        'yapacağım' => ['en' => 'I will do', 'fr' => 'je ferai', 'es' => 'haré', 'de' => 'ich werde machen', 'ja' => '私はします', 'ko' => '저는 할 거예요', 'ru' => 'я сделаю', 'ar' => 'سأفعل', 'az' => 'edəcəyəm'],
        'göreceğim' => ['en' => 'I will see', 'fr' => 'je verrai', 'es' => 'veré', 'de' => 'ich werde sehen', 'ja' => '私は見ます', 'ko' => '저는 볼 거예요', 'ru' => 'я увижу', 'ar' => 'سأرى', 'az' => 'görəcəyəm'],
        'haftaya' => ['en' => 'next week', 'fr' => 'la semaine prochaine', 'es' => 'la próxima semana', 'de' => 'nächste Woche', 'ja' => '来週', 'ko' => '다음 주에', 'ru' => 'на следующей неделе', 'ar' => 'الأسبوع القادم', 'az' => 'gələn həftə'],
        'sinema' => ['en' => 'cinema', 'fr' => 'cinéma', 'es' => 'cine', 'de' => 'Kino', 'ja' => '映画館', 'ko' => '영화관', 'ru' => 'кино', 'ar' => 'سينما', 'az' => 'kinoteatr'],
        'sinemaya' => ['en' => 'to the cinema', 'fr' => 'au cinéma', 'es' => 'al cine', 'de' => 'ins Kino', 'ja' => '映画館へ', 'ko' => '영화관에', 'ru' => 'в кино', 'ar' => 'إلى السينما', 'az' => 'kinoteatra'],
        'birlikte' => ['en' => 'together', 'fr' => 'ensemble', 'es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '함께', 'ru' => 'вместе', 'ar' => 'معا', 'az' => 'birlikdə'],
        'plan' => ['en' => 'plan', 'fr' => 'plan', 'es' => 'plan', 'de' => 'Plan', 'ja' => '予定', 'ko' => '계획', 'ru' => 'план', 'ar' => 'خطة', 'az' => 'plan'],
        // --- Conversation Unit 7: directions ---------------------------
        //
        // `sağ` is the noun "right"; `sağa` is "to the right". The dative is
        // what turns a side into a direction, the same -a/-e seen in Unit 6,
        // so both forms are listed and the unit shows them side by side.
        'sağ' => ['en' => 'right', 'fr' => 'droite', 'es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'ru' => 'правый', 'ar' => 'يمين', 'az' => 'sağ'],
        'sol' => ['en' => 'left', 'fr' => 'gauche', 'es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'ru' => 'левый', 'ar' => 'يسار', 'az' => 'sol'],
        'sağa' => ['en' => 'to the right', 'fr' => 'à droite', 'es' => 'a la derecha', 'de' => 'nach rechts', 'ja' => '右へ', 'ko' => '오른쪽으로', 'ru' => 'направо', 'ar' => 'يمينا', 'az' => 'sağa'],
        'sola' => ['en' => 'to the left', 'fr' => 'à gauche', 'es' => 'a la izquierda', 'de' => 'nach links', 'ja' => '左へ', 'ko' => '왼쪽으로', 'ru' => 'налево', 'ar' => 'يسارا', 'az' => 'sola'],
        'düz' => ['en' => 'straight', 'fr' => 'tout droit', 'es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '직진', 'ru' => 'прямо', 'ar' => 'مباشرة', 'az' => 'düz'],
        'dönün' => ['en' => 'turn', 'fr' => 'tournez', 'es' => 'gire', 'de' => 'biegen Sie ab', 'ja' => '曲がってください', 'ko' => '도세요', 'ru' => 'поворот', 'ar' => 'منعطف', 'az' => 'dönüş'],
        'gidin' => ['en' => 'go', 'fr' => 'allez', 'es' => 'vaya', 'de' => 'gehen Sie', 'ja' => '行ってください', 'ko' => '가세요', 'ru' => 'иду', 'ar' => 'أذهب', 'az' => 'gedirəm'],
        'cadde' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'ru' => 'улица', 'ar' => 'شارع', 'az' => 'küçə'],
        'köşe' => ['en' => 'corner', 'fr' => 'coin', 'es' => 'esquina', 'de' => 'Ecke', 'ja' => '角', 'ko' => '모퉁이', 'ru' => 'угол', 'ar' => 'زاوية', 'az' => 'künc'],
        'yakın' => ['en' => 'near', 'fr' => 'près', 'es' => 'cerca', 'de' => 'nah', 'ja' => '近い', 'ko' => '가까운', 'ru' => 'близко', 'ar' => 'قريب', 'az' => 'yaxın'],
        'uzak' => ['en' => 'far', 'fr' => 'loin', 'es' => 'lejos', 'de' => 'weit', 'ja' => '遠い', 'ko' => '먼', 'ru' => 'далеко', 'ar' => 'بعيد', 'az' => 'uzaq'],
        'orada' => ['en' => 'there', 'fr' => 'là-bas', 'es' => 'allí', 'de' => 'dort', 'ja' => 'そこに', 'ko' => '거기에', 'ru' => 'там', 'ar' => 'هناك', 'az' => 'orada'],
        // The locative -da/-de, "at/in". Same suffix as `evde` back in
        // Conversation 5, so these are recognisable rather than new grammar.
        'köşede' => ['en' => 'at the corner', 'fr' => 'au coin', 'es' => 'en la esquina', 'de' => 'an der Ecke', 'ja' => '角に', 'ko' => '모퉁이에', 'ru' => 'на углу', 'ar' => 'في الزاوية', 'az' => 'küncdə'],
        'sağda' => ['en' => 'on the right', 'fr' => 'à droite', 'es' => 'a la derecha', 'de' => 'rechts', 'ja' => '右に', 'ko' => '오른쪽에', 'ru' => 'справа', 'ar' => 'على اليمين', 'az' => 'sağda'],
        'solda' => ['en' => 'on the left', 'fr' => 'à gauche', 'es' => 'a la izquierda', 'de' => 'links', 'ja' => '左に', 'ko' => '왼쪽에', 'ru' => 'слева', 'ar' => 'على اليسار', 'az' => 'solda'],
        // Turkish negates a noun or adjective with a separate word, not a
        // suffix, which is why this one IS its own tile.
        'değil' => ['en' => 'is not', 'fr' => "n'est pas", 'es' => 'no está', 'de' => 'ist nicht', 'ja' => 'ではありません', 'ko' => '아니에요', 'ru' => 'не', 'ar' => 'ليس', 'az' => 'deyil'],
        // --- Conversation Unit 8: on the phone --------------------------
        'telefon' => ['en' => 'telephone', 'fr' => 'téléphone', 'es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'ru' => 'телефон', 'ar' => 'هاتف', 'az' => 'telefon'],
        'alo' => ['en' => 'hello', 'fr' => 'allô', 'es' => 'diga', 'de' => 'hallo', 'ja' => 'もしもし', 'ko' => '여보세요', 'ru' => 'привет', 'ar' => 'مرحبا', 'az' => 'salam'],
        'arıyorum' => ['en' => 'I am calling', 'fr' => "j'appelle", 'es' => 'estoy llamando', 'de' => 'ich rufe an', 'ja' => '電話しています', 'ko' => '전화하고 있어요', 'ru' => 'я звоню', 'ar' => 'أتصل', 'az' => 'zəng edirəm'],
        'meşgul' => ['en' => 'busy', 'fr' => 'occupé', 'es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'ru' => 'занят', 'ar' => 'مشغول', 'az' => 'məşğul'],
        'mesaj' => ['en' => 'message', 'fr' => 'message', 'es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'ru' => 'сообщение', 'ar' => 'رسالة', 'az' => 'mesaj'],
        'numara' => ['en' => 'number', 'fr' => 'numéro', 'es' => 'número', 'de' => 'Nummer', 'ja' => '番号', 'ko' => '번호', 'ru' => 'номер', 'ar' => 'رقم', 'az' => 'nömrə'],
        'ararım' => ['en' => 'I will call', 'fr' => "j'appellerai", 'es' => 'llamaré', 'de' => 'ich rufe an', 'ja' => '電話します', 'ko' => '전화할게요', 'ru' => 'я позвоню', 'ar' => 'سأتصل', 'az' => 'zəng edəcəyəm'],
        // --- Conversation Unit 9: opinions ------------------------------
        //
        // `bence` is one word doing what English needs four for: ben (me) plus
        // -ce (according to). It is never split.
        'bence' => ['en' => 'in my opinion', 'fr' => 'à mon avis', 'es' => 'en mi opinión', 'de' => 'meiner Meinung nach', 'ja' => '私の意見では', 'ko' => '제 생각에는', 'ru' => 'по-моему', 'ar' => 'برأيي', 'az' => 'məncə'],
        'düşünüyorum' => ['en' => 'I think', 'fr' => 'je pense', 'es' => 'creo', 'de' => 'ich denke', 'ja' => '私は思います', 'ko' => '저는 생각해요', 'ru' => 'я думаю', 'ar' => 'أفكر', 'az' => 'düşünürəm'],
        'doğru' => ['en' => 'true', 'fr' => 'vrai', 'es' => 'verdadero', 'de' => 'richtig', 'ja' => '正しい', 'ko' => '맞는', 'ru' => 'правильно', 'ar' => 'صحيح', 'az' => 'düzgün'],
        'yanlış' => ['en' => 'wrong', 'fr' => 'faux', 'es' => 'falso', 'de' => 'falsch', 'ja' => '間違い', 'ko' => '틀린', 'ru' => 'неправильно', 'ar' => 'خطأ', 'az' => 'səhv'],
        'katılıyorum' => ['en' => 'I agree', 'fr' => "je suis d'accord", 'es' => 'estoy de acuerdo', 'de' => 'ich stimme zu', 'ja' => '賛成です', 'ko' => '동의해요', 'ru' => 'я согласен', 'ar' => 'أوافق', 'az' => 'razıyam'],
        'belki' => ['en' => 'maybe', 'fr' => 'peut-être', 'es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마', 'ru' => 'может быть', 'ar' => 'ربما', 'az' => 'bəlkə'],
        'güzel' => ['en' => 'nice', 'fr' => 'beau', 'es' => 'bonito', 'de' => 'schön', 'ja' => '素敵', 'ko' => '멋진', 'ru' => 'приятно', 'ar' => 'لطيف', 'az' => 'xoş'],
        'kötü' => ['en' => 'bad', 'fr' => 'mauvais', 'es' => 'malo', 'de' => 'schlecht', 'ja' => '悪い', 'ko' => '나쁜', 'ru' => 'плохой', 'ar' => 'سيء', 'az' => 'pis'],
        // --- Conversation Unit 10: comparisons --------------------------
        //
        // Turkish compares with a bare `daha` before the adjective and `en`
        // for the superlative. No -er/-est endings, nothing attaches: `daha
        // büyük` bigger, `en büyük` biggest. Two tiles, not one.
        'daha' => ['en' => 'more', 'fr' => 'plus', 'es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'ru' => 'больше', 'ar' => 'أكثر', 'az' => 'daha'],
        'en' => ['en' => 'most', 'fr' => 'le plus', 'es' => 'el más', 'de' => 'am meisten', 'ja' => '最も', 'ko' => '가장', 'ru' => 'самый', 'ar' => 'الأكثر', 'az' => 'ən'],
        'yeni' => ['en' => 'new', 'fr' => 'nouveau', 'es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새로운', 'ru' => 'новый', 'ar' => 'جديد', 'az' => 'yeni'],
        'eski' => ['en' => 'old', 'fr' => 'vieux', 'es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'ru' => 'старый', 'ar' => 'قديم', 'az' => 'köhnə'],
        'tercih ederim' => ['en' => 'I prefer', 'fr' => 'je préfère', 'es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '私は好みます', 'ko' => '저는 선호해요', 'ru' => 'я предпочитаю', 'ar' => 'أفضل', 'az' => 'üstünlük verirəm'],
        // Shared across Conversation 8 to 10.
        //
        // `var` and `yok` are a pair English has no clean equivalent for: they
        // state that something exists or does not, and they carry the whole
        // clause on their own. "Zamanım yok" is literally "my-time not-exist".
        'var' => ['en' => 'there is', 'fr' => 'il y a', 'es' => 'hay', 'de' => 'es gibt', 'ja' => 'あります', 'ko' => '있어요', 'ru' => 'есть', 'ar' => 'يوجد', 'az' => 'var'],
        'yok' => ['en' => 'there is not', 'fr' => "il n'y a pas", 'es' => 'no hay', 'de' => 'es gibt nicht', 'ja' => 'ありません', 'ko' => '없어요', 'ru' => 'нету', 'ar' => 'لا يوجد', 'az' => 'yoxdur'],
        'şimdi' => ['en' => 'now', 'fr' => 'maintenant', 'es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'ru' => 'сейчас', 'ar' => 'الآن', 'az' => 'indi'],
        'film' => ['en' => 'film', 'fr' => 'film', 'es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'ru' => 'фильм', 'ar' => 'فيلم', 'az' => 'film'],
        'şehir' => ['en' => 'city', 'fr' => 'ville', 'es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'ru' => 'город', 'ar' => 'مدينة', 'az' => 'şəhər'],
        'araba' => ['en' => 'car', 'fr' => 'voiture', 'es' => 'coche', 'de' => 'Auto', 'ja' => '車', 'ko' => '자동차', 'ru' => 'машина', 'ar' => 'سيارة', 'az' => 'maşın'],
        'ben' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '저', 'ru' => 'я', 'ar' => 'أنا', 'az' => 'mən'],
        'her' => ['en' => 'every', 'fr' => 'chaque', 'es' => 'cada', 'de' => 'jeder', 'ja' => 'すべての', 'ko' => '모든', 'ru' => 'каждый', 'ar' => 'كل', 'az' => 'hər'],
        'şey' => ['en' => 'thing', 'fr' => 'chose', 'es' => 'cosa', 'de' => 'Ding', 'ja' => 'こと', 'ko' => '것', 'ru' => 'вещь', 'ar' => 'شيء', 'az' => 'şey'],
        // `zamanım` is zaman + -ım, "my time". The possessive is the suffix,
        // so the pair with `var`/`yok` is what expresses having something.
        'zamanım' => ['en' => 'my time', 'fr' => 'mon temps', 'es' => 'mi tiempo', 'de' => 'meine Zeit', 'ja' => '私の時間', 'ko' => '제 시간', 'ru' => 'моё время', 'ar' => 'وقتي', 'az' => 'vaxtım'],
        'arkadaşımı' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'a mi amigo', 'de' => 'meinen Freund', 'ja' => '私の友達に', 'ko' => '제 친구에게', 'ru' => 'мой друг', 'ar' => 'صديقي', 'az' => 'dostum'],
        'okulda' => ['en' => 'at school', 'fr' => "à l'école", 'es' => 'en la escuela', 'de' => 'in der Schule', 'ja' => '学校に', 'ko' => '학교에', 'ru' => 'в школе', 'ar' => 'في المدرسة', 'az' => 'məktəbdə'],
        'de' => ['en' => 'too', 'fr' => 'aussi', 'es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '도', 'ru' => 'тоже', 'ar' => 'أيضا', 'az' => 'də'],
        'katılmıyorum' => ['en' => 'I do not agree', 'fr' => "je ne suis pas d'accord", 'es' => 'no estoy de acuerdo', 'de' => 'ich stimme nicht zu', 'ja' => '賛成しません', 'ko' => '동의하지 않아요', 'ru' => 'не согласен', 'ar' => 'لا أوافق', 'az' => 'razı deyiləm'],
        // ===============================================================
        // RESTAURANT CHAPTER
        // ===============================================================

        // --- Units 1 to 3: ordering, prices, paying ---------------------
        'garson' => ['en' => 'waiter', 'fr' => 'serveur', 'es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'ru' => 'официант', 'ar' => 'نادل', 'az' => 'ofisiant'],
        'menü' => ['en' => 'menu', 'fr' => 'menu', 'es' => 'menú', 'de' => 'Speisekarte', 'ja' => 'メニュー', 'ko' => '메뉴', 'ru' => 'меню', 'ar' => 'قائمة الطعام', 'az' => 'menyu'],
        'sipariş' => ['en' => 'order', 'fr' => 'commande', 'es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'ru' => 'заказ', 'ar' => 'طلب', 'az' => 'sifariş'],
        'porsiyon' => ['en' => 'portion', 'fr' => 'portion', 'es' => 'ración', 'de' => 'Portion', 'ja' => '一人前', 'ko' => '일인분', 'ru' => 'порция', 'ar' => 'حصة', 'az' => 'porsiya'],
        'fiyat' => ['en' => 'price', 'fr' => 'prix', 'es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'ru' => 'цена', 'ar' => 'سعر', 'az' => 'qiymət'],
        'lira' => ['en' => 'lira', 'fr' => 'lire', 'es' => 'lira', 'de' => 'Lira', 'ja' => 'リラ', 'ko' => '리라', 'ru' => 'рубль', 'ar' => 'ريال', 'az' => 'manat'],
        'para' => ['en' => 'money', 'fr' => 'argent', 'es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'ru' => 'деньги', 'ar' => 'نقود', 'az' => 'pul'],
        'pahalı' => ['en' => 'expensive', 'fr' => 'cher', 'es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'ru' => 'дорогой', 'ar' => 'غالي', 'az' => 'bahalı'],
        'ucuz' => ['en' => 'cheap', 'fr' => 'bon marché', 'es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'ru' => 'дешёвый', 'ar' => 'رخيص', 'az' => 'ucuz'],
        'kart' => ['en' => 'card', 'fr' => 'carte', 'es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'ru' => 'карта', 'ar' => 'بطاقة', 'az' => 'kart'],
        'nakit' => ['en' => 'cash', 'fr' => 'espèces', 'es' => 'efectivo', 'de' => 'Bargeld', 'ja' => '現金', 'ko' => '현금', 'ru' => 'наличные', 'ar' => 'كاش', 'az' => 'nağd'],
        'ile' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'で', 'ko' => '으로', 'ru' => 'с', 'ar' => 'مع', 'az' => 'ilə'],
        // --- Unit 4: reservations ---------------------------------------
        'rezervasyon' => ['en' => 'reservation', 'fr' => 'réservation', 'es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'ru' => 'бронь', 'ar' => 'حجز', 'az' => 'rezervasiya'],
        'kişi' => ['en' => 'person', 'fr' => 'personne', 'es' => 'persona', 'de' => 'Person', 'ja' => '人', 'ko' => '사람', 'ru' => 'человек', 'ar' => 'شخص', 'az' => 'adam'],
        'için' => ['en' => 'for', 'fr' => 'pour', 'es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'ru' => 'для', 'ar' => 'لأجل', 'az' => 'üçün'],
        // --- Units 5 and 6: opinions on food, diet ----------------------
        'lezzetli' => ['en' => 'delicious', 'fr' => 'délicieux', 'es' => 'delicioso', 'de' => 'lecker', 'ja' => 'おいしい', 'ko' => '맛있는', 'ru' => 'вкусный', 'ar' => 'لذيذ', 'az' => 'dadlı'],
        'tuzlu' => ['en' => 'salty', 'fr' => 'salé', 'es' => 'salado', 'de' => 'salzig', 'ja' => '塩辛い', 'ko' => '짠', 'ru' => 'солёный', 'ar' => 'مالح', 'az' => 'duzlu'],
        'şikayet' => ['en' => 'complaint', 'fr' => 'plainte', 'es' => 'queja', 'de' => 'Beschwerde', 'ja' => '苦情', 'ko' => '불만', 'ru' => 'жалоба', 'ar' => 'شكوى', 'az' => 'şikayət'],
        'alerji' => ['en' => 'allergy', 'fr' => 'allergie', 'es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'ru' => 'аллергия', 'ar' => 'حساسية', 'az' => 'allergiya'],
        'alerjim' => ['en' => 'my allergy', 'fr' => 'mon allergie', 'es' => 'mi alergia', 'de' => 'meine Allergie', 'ja' => '私のアレルギー', 'ko' => '제 알레르기', 'ru' => 'моя аллергия', 'ar' => 'حساسيتي', 'az' => 'allergiyam'],
        'vejetaryen' => ['en' => 'vegetarian', 'fr' => 'végétarien', 'es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'ru' => 'вегетарианец', 'ar' => 'نباتي', 'az' => 'vegetarian'],
        'yiyemem' => ['en' => 'I cannot eat', 'fr' => 'je ne peux pas manger', 'es' => 'no puedo comer', 'de' => 'ich kann nicht essen', 'ja' => '食べられません', 'ko' => '먹을 수 없어요', 'ru' => 'не могу кушать', 'ar' => 'لا أستطيع الأكل', 'az' => 'yeyə bilmirəm'],
        // --- Units 7 and 8: drinks and sweets ---------------------------
        'içecek' => ['en' => 'drink', 'fr' => 'boisson', 'es' => 'bebida', 'de' => 'Getränk', 'ja' => '飲み物', 'ko' => '음료', 'ru' => 'напиток', 'ar' => 'مشروب', 'az' => 'içki'],
        'şarap' => ['en' => 'wine', 'fr' => 'vin', 'es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'ru' => 'вино', 'ar' => 'نبيذ', 'az' => 'şərab'],
        'bira' => ['en' => 'beer', 'fr' => 'bière', 'es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'ru' => 'пиво', 'ar' => 'بيرة', 'az' => 'pivə'],
        'buz' => ['en' => 'ice', 'fr' => 'glace', 'es' => 'hielo', 'de' => 'Eis', 'ja' => '氷', 'ko' => '얼음', 'ru' => 'лёд', 'ar' => 'الثلج', 'az' => 'buz'],
        'tatlı' => ['en' => 'dessert', 'fr' => 'dessert', 'es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'ru' => 'десерт', 'ar' => 'حلوى', 'az' => 'şirniyyat'],
        'dondurma' => ['en' => 'ice cream', 'fr' => 'glace', 'es' => 'helado', 'de' => 'Eiscreme', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'ru' => 'мороженое', 'ar' => 'آيس كريم', 'az' => 'dondurma'],
        'çikolata' => ['en' => 'chocolate', 'fr' => 'chocolat', 'es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'ru' => 'шоколад', 'ar' => 'شوكولاتة', 'az' => 'şokolad'],
        // --- Units 9 and 10: the table, takeaway ------------------------
        'çatal' => ['en' => 'fork', 'fr' => 'fourchette', 'es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'ru' => 'вилка', 'ar' => 'شوكة', 'az' => 'çəngəl'],
        'bıçak' => ['en' => 'knife', 'fr' => 'couteau', 'es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'ru' => 'нож', 'ar' => 'سكين', 'az' => 'bıçaq'],
        'kaşık' => ['en' => 'spoon', 'fr' => 'cuillère', 'es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'ru' => 'ложка', 'ar' => 'ملعقة', 'az' => 'qaşıq'],
        'tabak' => ['en' => 'plate', 'fr' => 'assiette', 'es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'ru' => 'тарелка', 'ar' => 'صحن', 'az' => 'boşqab'],
        'peçete' => ['en' => 'napkin', 'fr' => 'serviette', 'es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'ru' => 'салфетка', 'ar' => 'منديل', 'az' => 'salfet'],
        'bardak' => ['en' => 'glass', 'fr' => 'verre', 'es' => 'vaso', 'de' => 'Glas', 'ja' => 'コップ', 'ko' => '컵', 'ru' => 'стакан', 'ar' => 'كوب', 'az' => 'stəkan'],
        'paket' => ['en' => 'takeaway', 'fr' => 'à emporter', 'es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'ru' => 'с собой', 'ar' => 'للخارج', 'az' => 'özümlə'],
        'patates' => ['en' => 'potato', 'fr' => 'pomme de terre', 'es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'ru' => 'картофель', 'ar' => 'بطاطا', 'az' => 'kartof'],
        'hesabı' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計を', 'ko' => '계산서를', 'ru' => 'счёт', 'ar' => 'الحساب', 'az' => 'hesab'],
        'masayı' => ['en' => 'the table', 'fr' => 'la table', 'es' => 'la mesa', 'de' => 'den Tisch', 'ja' => 'テーブルを', 'ko' => '테이블을', 'ru' => 'стол', 'ar' => 'طاولة', 'az' => 'masa'],
        'çok lezzetli' => ['en' => 'very delicious', 'fr' => 'très délicieux', 'es' => 'muy delicioso', 'de' => 'sehr lecker', 'ja' => 'とてもおいしい', 'ko' => '아주 맛있는', 'ru' => 'очень вкусный', 'ar' => 'لذيذ جدا', 'az' => 'çox dadlı'],
        // ===============================================================
        // SUPERMARKET CHAPTER
        // ===============================================================
        'market' => ['en' => 'supermarket', 'fr' => 'supermarché', 'es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'ru' => 'супермаркет', 'ar' => 'سوبرماركت', 'az' => 'supermarket'],
        'reyon' => ['en' => 'aisle', 'fr' => 'rayon', 'es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '코너', 'ru' => 'отдел', 'ar' => 'قسم', 'az' => 'şöbə'],
        'sepet' => ['en' => 'basket', 'fr' => 'panier', 'es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'ru' => 'корзина', 'ar' => 'سلة', 'az' => 'səbət'],
        'kasa' => ['en' => 'checkout', 'fr' => 'caisse', 'es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'ru' => 'касса', 'ar' => 'صندوق الدفع', 'az' => 'kassa'],
        'liste' => ['en' => 'list', 'fr' => 'liste', 'es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'ru' => 'список', 'ar' => 'قائمة', 'az' => 'siyahı'],
        'meyve' => ['en' => 'fruit', 'fr' => 'fruit', 'es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'ru' => 'фрукт', 'ar' => 'فاكهة', 'az' => 'meyvə'],
        'sebze' => ['en' => 'vegetable', 'fr' => 'légume', 'es' => 'verdura', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'ru' => 'овощ', 'ar' => 'خضار', 'az' => 'tərəvəz'],
        'muz' => ['en' => 'banana', 'fr' => 'banane', 'es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'ru' => 'банан', 'ar' => 'موزة', 'az' => 'banan'],
        'portakal' => ['en' => 'orange', 'fr' => 'orange', 'es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'ru' => 'апельсин', 'ar' => 'برتقالة', 'az' => 'portağal'],
        'üzüm' => ['en' => 'grape', 'fr' => 'raisin', 'es' => 'uva', 'de' => 'Traube', 'ja' => 'ぶどう', 'ko' => '포도', 'ru' => 'виноград', 'ar' => 'عنب', 'az' => 'üzüm'],
        'domates' => ['en' => 'tomato', 'fr' => 'tomate', 'es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'ru' => 'помидор', 'ar' => 'طماطم', 'az' => 'pomidor'],
        'salatalık' => ['en' => 'cucumber', 'fr' => 'concombre', 'es' => 'pepino', 'de' => 'Gurke', 'ja' => 'きゅうり', 'ko' => '오이', 'ru' => 'огурец', 'ar' => 'خيار', 'az' => 'xiyar'],
        'soğan' => ['en' => 'onion', 'fr' => 'oignon', 'es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => 'たまねぎ', 'ko' => '양파', 'ru' => 'лук', 'ar' => 'بصل', 'az' => 'soğan'],
        'havuç' => ['en' => 'carrot', 'fr' => 'carotte', 'es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'ru' => 'морковь', 'ar' => 'جزر', 'az' => 'yerkökü'],
        'yoğurt' => ['en' => 'yoghurt', 'fr' => 'yaourt', 'es' => 'yogur', 'de' => 'Joghurt', 'ja' => 'ヨーグルト', 'ko' => '요구르트', 'ru' => 'йогурт', 'ar' => 'لبن', 'az' => 'qatıq'],
        'tereyağı' => ['en' => 'butter', 'fr' => 'beurre', 'es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'ru' => 'масло', 'ar' => 'زبدة', 'az' => 'kərə yağı'],
        'yumurta' => ['en' => 'egg', 'fr' => 'oeuf', 'es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '달걀', 'ru' => 'яйцо', 'ar' => 'بيضة', 'az' => 'yumurta'],
        'tavuk' => ['en' => 'chicken', 'fr' => 'poulet', 'es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'ru' => 'курица', 'ar' => 'دجاج', 'az' => 'toyuq'],
        'kilo' => ['en' => 'kilo', 'fr' => 'kilo', 'es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'ru' => 'кило', 'ar' => 'كيلو', 'az' => 'kilo'],
        'şişe' => ['en' => 'bottle', 'fr' => 'bouteille', 'es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'ru' => 'бутылка', 'ar' => 'زجاجة', 'az' => 'şüşə'],
        'kutu' => ['en' => 'box', 'fr' => 'boîte', 'es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'ru' => 'коробка', 'ar' => 'علبة', 'az' => 'qutu'],
        'indirim' => ['en' => 'discount', 'fr' => 'réduction', 'es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'ru' => 'скидка', 'ar' => 'خصم', 'az' => 'endirim'],
        'poşet' => ['en' => 'bag', 'fr' => 'sac', 'es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'ru' => 'пакет', 'ar' => 'كيس', 'az' => 'torba'],
        'taze' => ['en' => 'fresh', 'fr' => 'frais', 'es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮な', 'ko' => '신선한', 'ru' => 'свежий', 'ar' => 'طازج', 'az' => 'təzə'],
        'alıyorum' => ['en' => 'I am buying', 'fr' => "j'achète", 'es' => 'compro', 'de' => 'ich kaufe', 'ja' => '買います', 'ko' => '삽니다', 'ru' => 'я покупаю', 'ar' => 'أشتري', 'az' => 'alıram'],
        'nerede' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'ru' => 'где', 'ar' => 'أين', 'az' => 'harada'],
        'toplam' => ['en' => 'total', 'fr' => 'total', 'es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '합계', 'ru' => 'итого', 'ar' => 'المجموع', 'az' => 'cəmi'],
        // Forms the Restaurant chapter needs as whole tiles.
        'param' => ['en' => 'my money', 'fr' => 'mon argent', 'es' => 'mi dinero', 'de' => 'mein Geld', 'ja' => '私のお金', 'ko' => '제 돈', 'ru' => 'мои деньги', 'ar' => 'نقودي', 'az' => 'pulum'],
        'menüde' => ['en' => 'on the menu', 'fr' => 'au menu', 'es' => 'en el menú', 'de' => 'auf der Speisekarte', 'ja' => 'メニューに', 'ko' => '메뉴에', 'ru' => 'в меню', 'ar' => 'في قائمة الطعام', 'az' => 'menyuda'],
        'ödüyorum' => ['en' => 'I am paying', 'fr' => 'je paie', 'es' => 'pago', 'de' => 'ich zahle', 'ja' => '払います', 'ko' => '계산해요', 'ru' => 'я плачу', 'ar' => 'أدفع', 'az' => 'ödəyirəm'],
        'ödüyoruz' => ['en' => 'we are paying', 'fr' => 'nous payons', 'es' => 'pagamos', 'de' => 'wir zahlen', 'ja' => '払います', 'ko' => '계산해요', 'ru' => 'мы платим', 'ar' => 'ندفع', 'az' => 'ödəyirik'],
        // The yes/no question particle. It is written as a separate word in
        // Turkish even though it harmonises like a suffix, so it is its own
        // tile: `kart var mı` is "card exists ?".
        'mı' => ['en' => 'is there', 'fr' => 'est-ce que', 'es' => 'acaso', 'de' => 'ob', 'ja' => 'か', 'ko' => '요', 'ru' => 'ли', 'ar' => 'هل', 'az' => 'mı'],
        'hazır' => ['en' => 'ready', 'fr' => 'prêt', 'es' => 'listo', 'de' => 'fertig', 'ja' => '準備できた', 'ko' => '준비된', 'ru' => 'готов', 'ar' => 'جاهز', 'az' => 'hazır'],
        'yemek' => ['en' => 'food', 'fr' => 'nourriture', 'es' => 'comida', 'de' => 'Essen', 'ja' => '食べ物', 'ko' => '음식', 'ru' => 'еда', 'ar' => 'طعام', 'az' => 'yemək'],
        'vejetaryenim' => ['en' => 'I am vegetarian', 'fr' => 'je suis végétarien', 'es' => 'soy vegetariano', 'de' => 'ich bin vegetarisch', 'ja' => '私はベジタリアンです', 'ko' => '저는 채식주의자예요', 'ru' => 'я вегетарианец', 'ar' => 'أنا نباتي', 'az' => 'vegetarianam'],
        'yiyorum' => ['en' => 'I eat', 'fr' => 'je mange', 'es' => 'como', 'de' => 'ich esse', 'ja' => '食べます', 'ko' => '먹어요', 'ru' => 'я ем', 'ar' => 'آكل', 'az' => 'yeyirəm'],
        'yemiyorum' => ['en' => 'I do not eat', 'fr' => 'je ne mange pas', 'es' => 'no como', 'de' => 'ich esse nicht', 'ja' => '食べません', 'ko' => '먹지 않아요', 'ru' => 'не ем', 'ar' => 'لا آكل', 'az' => 'yemirəm'],
        'bunda' => ['en' => 'in this', 'fr' => 'dedans', 'es' => 'en esto', 'de' => 'darin', 'ja' => 'これに', 'ko' => '이것에', 'ru' => 'в этом', 'ar' => 'في هذا', 'az' => 'bunda'],
        // WITH and WITHOUT, as suffixes. -lı/-li/-lu/-lü adds the thing,
        // -sız/-siz/-suz/-süz removes it, and the vowel is decided by the stem
        // rather than by the speaker. Whole tiles, so nobody has to choose.
        'buzlu' => ['en' => 'with ice', 'fr' => 'avec de la glace', 'es' => 'con hielo', 'de' => 'mit Eis', 'ja' => '氷入りの', 'ko' => '얼음 있는', 'ru' => 'со льдом', 'ar' => 'مع الثلج', 'az' => 'buzlu'],
        'buzsuz' => ['en' => 'without ice', 'fr' => 'sans glace', 'es' => 'sin hielo', 'de' => 'ohne Eis', 'ja' => '氷なしの', 'ko' => '얼음 없는', 'ru' => 'без льда', 'ar' => 'بدون ثلج', 'az' => 'buzsuz'],
        'şekerli' => ['en' => 'with sugar', 'fr' => 'avec du sucre', 'es' => 'con azúcar', 'de' => 'mit Zucker', 'ja' => '砂糖入りの', 'ko' => '설탕 있는', 'ru' => 'с сахаром', 'ar' => 'مع السكر', 'az' => 'şəkərli'],
        'şekersiz' => ['en' => 'without sugar', 'fr' => 'sans sucre', 'es' => 'sin azúcar', 'de' => 'ohne Zucker', 'ja' => '砂糖なしの', 'ko' => '설탕 없는', 'ru' => 'без сахара', 'ar' => 'بدون سكر', 'az' => 'şəkərsiz'],
        'sütlü' => ['en' => 'with milk', 'fr' => 'avec du lait', 'es' => 'con leche', 'de' => 'mit Milch', 'ja' => '牛乳入りの', 'ko' => '우유 있는', 'ru' => 'с молоком', 'ar' => 'مع الحليب', 'az' => 'südlü'],
        'sütsüz' => ['en' => 'without milk', 'fr' => 'sans lait', 'es' => 'sin leche', 'de' => 'ohne Milch', 'ja' => '牛乳なしの', 'ko' => '우유 없는', 'ru' => 'без молока', 'ar' => 'بدون حليب', 'az' => 'südsüz'],
        'çikolatalı' => ['en' => 'with chocolate', 'fr' => 'avec du chocolat', 'es' => 'con chocolate', 'de' => 'mit Schokolade', 'ja' => 'チョコレート入りの', 'ko' => '초콜릿 있는', 'ru' => 'с шоколадом', 'ar' => 'مع الشوكولاتة', 'az' => 'şokoladlı'],
        'temiz' => ['en' => 'clean', 'fr' => 'propre', 'es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれい', 'ko' => '깨끗한', 'ru' => 'чистый', 'ar' => 'نظيف', 'az' => 'təmiz'],
        'hızlı' => ['en' => 'fast', 'fr' => 'rapide', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速い', 'ko' => '빠른', 'ru' => 'быстро', 'ar' => 'بسرعة', 'az' => 'sürətli'],
        // Inflected shop words. Dative for going, locative for being there.
        'markete' => ['en' => 'to the supermarket', 'fr' => 'au supermarché', 'es' => 'al supermercado', 'de' => 'zum Supermarkt', 'ja' => 'スーパーへ', 'ko' => '슈퍼마켓에', 'ru' => 'в супермаркет', 'ar' => 'إلى السوبرماركت', 'az' => 'supermarketə'],
        'markette' => ['en' => 'in the supermarket', 'fr' => 'au supermarché', 'es' => 'en el supermercado', 'de' => 'im Supermarkt', 'ja' => 'スーパーに', 'ko' => '슈퍼마켓에', 'ru' => 'в супермаркете', 'ar' => 'في السوبرماركت', 'az' => 'supermarketdə'],
        'reyonda' => ['en' => 'in the aisle', 'fr' => 'au rayon', 'es' => 'en el pasillo', 'de' => 'im Regal', 'ja' => '売り場に', 'ko' => '코너에', 'ru' => 'в отделе', 'ar' => 'في القسم', 'az' => 'şöbədə'],
        'listede' => ['en' => 'on the list', 'fr' => 'sur la liste', 'es' => 'en la lista', 'de' => 'auf der Liste', 'ja' => 'リストに', 'ko' => '목록에', 'ru' => 'в списке', 'ar' => 'في القائمة', 'az' => 'siyahıda'],
        'gidiyorum' => ['en' => 'I am going', 'fr' => 'je vais', 'es' => 'voy', 'de' => 'ich gehe', 'ja' => '行きます', 'ko' => '가요', 'ru' => 'я иду', 'ar' => 'أذهب', 'az' => 'gedirəm'],
        // The plural, -lar/-ler. A number cancels it: `elmalar` but `beş elma`.
        'elmalar' => ['en' => 'apples', 'fr' => 'pommes', 'es' => 'manzanas', 'de' => 'Äpfel', 'ja' => 'りんご', 'ko' => '사과', 'ru' => 'яблоки', 'ar' => 'تفاح', 'az' => 'almalar'],
        'tereyağlı' => ['en' => 'with butter', 'fr' => 'avec du beurre', 'es' => 'con mantequilla', 'de' => 'mit Butter', 'ja' => 'バター入りの', 'ko' => '버터 있는', 'ru' => 'с маслом', 'ar' => 'مع الزبدة', 'az' => 'yağlı'],
        'yarım' => ['en' => 'half', 'fr' => 'demi', 'es' => 'medio', 'de' => 'halb', 'ja' => '半', 'ko' => '반', 'ru' => 'половина', 'ar' => 'نصف', 'az' => 'yarım'],
        'az' => ['en' => 'a little', 'fr' => 'peu', 'es' => 'poco', 'de' => 'wenig', 'ja' => '少し', 'ko' => '조금', 'ru' => 'немного', 'ar' => 'قليل', 'az' => 'az'],
        'aynı' => ['en' => 'the same', 'fr' => 'le même', 'es' => 'el mismo', 'de' => 'derselbe', 'ja' => '同じ', 'ko' => '같은', 'ru' => 'такой же', 'ar' => 'نفسه', 'az' => 'eyni'],
        'indirimde' => ['en' => 'on discount', 'fr' => 'en réduction', 'es' => 'en descuento', 'de' => 'im Rabatt', 'ja' => '割引で', 'ko' => '할인이에요', 'ru' => 'со скидкой', 'ar' => 'بخصم', 'az' => 'endirimdə'],
        // The ablative -dan/-den, "than" in a comparison: `sudan pahalı`,
        // more expensive THAN the water. Turkish marks the thing compared
        // against, where English uses a separate word.
        'sudan' => ['en' => 'than the water', 'fr' => 'que l’eau', 'es' => 'que el agua', 'de' => 'als das Wasser', 'ja' => '水より', 'ko' => '물보다', 'ru' => 'чем воды', 'ar' => 'من الماء', 'az' => 'sudan'],
        'yirmi' => ['en' => 'twenty', 'fr' => 'vingt', 'es' => 'veinte', 'de' => 'zwanzig', 'ja' => '二十', 'ko' => '이십', 'ru' => 'двадцать', 'ar' => 'عشرون', 'az' => 'iyirmi'],
    ];

    /** A word's meaning in every language, as an i18n map ready to store. */
    public static function hint(string $turkish): array
    {
        return ['i18n' => self::meanings($turkish)];
    }

    /**
     * A word's meanings, keyed by language code.
     *
     * Lowercased with the Turkish locale in mind: `mb_strtolower` maps `I` to
     * `i`, which is wrong for Turkish (`I` lowercases to `ı`), so keys are
     * normalised through the same helper everywhere rather than inline.
     */
    public static function meanings(string $turkish): array
    {
        return self::WORDS[self::key($turkish)] ?? ['en' => $turkish];
    }

    /** @return array<int, string> */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $turkish): bool
    {
        return isset(self::WORDS[self::key($turkish)]);
    }

    /**
     * Turkish-aware lowercasing for dictionary lookups.
     *
     * PHP's mb_strtolower('I') gives 'i', but Turkish 'I' lowercases to 'ı' and
     * 'İ' lowercases to 'i'. Getting this wrong silently misses dictionary
     * entries for any word containing a capital I — `İstasyon` would look up as
     * `istasyon` in one place and `ıstasyon` in another.
     */
    public static function key(string $turkish): string
    {
        $trimmed = trim($turkish);
        $mapped = str_replace(['I', 'İ'], ['ı', 'i'], $trimmed);

        return mb_strtolower($mapped, 'UTF-8');
    }
}
