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
        'kahve' => ['en' => 'coffee', 'fr' => 'café', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피'],
        'çay' => ['en' => 'tea', 'fr' => 'thé', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차'],
        'su' => ['en' => 'water', 'fr' => 'eau', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물'],
        'süt' => ['en' => 'milk', 'fr' => 'lait', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유'],
        'ekmek' => ['en' => 'bread', 'fr' => 'pain', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵'],
        'şeker' => ['en' => 'sugar', 'fr' => 'sucre', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕'],
        'peynir' => ['en' => 'cheese', 'fr' => 'fromage', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈'],
        'pasta' => ['en' => 'cake', 'fr' => 'gâteau', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크'],

        // --- Unit 1: the glue words ------------------------------------
        // `bir` is both "one" and the indefinite article, which is why it can
        // carry the whole job "un/une" does in French.
        'bir' => ['en' => 'a', 'fr' => 'un', 'es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의'],
        've' => ['en' => 'and', 'fr' => 'et', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고'],
        'lütfen' => ['en' => 'please', 'fr' => "s'il vous plaît", 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다'],
        'merhaba' => ['en' => 'hello', 'fr' => 'bonjour', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요'],

        // --- Unit 2: greetings and courtesy ----------------------------
        'teşekkürler' => ['en' => 'thank you', 'fr' => 'merci', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다'],
        'evet' => ['en' => 'yes', 'fr' => 'oui', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네'],
        'hayır' => ['en' => 'no', 'fr' => 'non', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요'],
        'hoşça kal' => ['en' => 'goodbye', 'fr' => 'au revoir', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요'],
        'günaydın' => ['en' => 'good morning', 'fr' => 'bonjour', 'es' => 'buenos días', 'de' => 'guten Morgen', 'ja' => 'おはよう', 'ko' => '좋은 아침'],
        'affedersiniz' => ['en' => 'excuse me', 'fr' => 'excusez-moi', 'es' => 'perdón', 'de' => 'Entschuldigung', 'ja' => 'すみません', 'ko' => '실례합니다'],
        'istiyorum' => ['en' => 'I would like', 'fr' => 'je voudrais', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요'],
        'hesap' => ['en' => 'the bill', 'fr' => "l'addition", 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서'],

        // --- Unit 2: people and home -----------------------------------
        'kitap' => ['en' => 'book', 'fr' => 'livre', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책'],
        'kalem' => ['en' => 'pen', 'fr' => 'stylo', 'es' => 'bolígrafo', 'de' => 'Stift', 'ja' => 'ペン', 'ko' => '펜'],
        'ev' => ['en' => 'house', 'fr' => 'maison', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집'],
        'okul' => ['en' => 'school', 'fr' => 'école', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교'],
        'masa' => ['en' => 'table', 'fr' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '탁자'],
        'sandalye' => ['en' => 'chair', 'fr' => 'chaise', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자'],
        'kedi' => ['en' => 'cat', 'fr' => 'chat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이'],
        'köpek' => ['en' => 'dog', 'fr' => 'chien', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개'],
        'bu' => ['en' => 'this', 'fr' => 'ceci', 'es' => 'este', 'de' => 'dies', 'ja' => 'これ', 'ko' => '이것'],
        'benim' => ['en' => 'my', 'fr' => 'mon', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '내'],

        // Possessed forms, listed whole because the learner places them as one
        // tile. `kitabım` (not `kitapım`): a final p softens to b before a
        // vowel-initial suffix. `evim` / `okulum`: the suffix vowel harmonises
        // with the stem, so no single ending fits every word.
        'kitabım' => ['en' => 'my book', 'fr' => 'mon livre', 'es' => 'mi libro', 'de' => 'mein Buch', 'ja' => '私の本', 'ko' => '내 책'],
        'evim' => ['en' => 'my house', 'fr' => 'ma maison', 'es' => 'mi casa', 'de' => 'mein Haus', 'ja' => '私の家', 'ko' => '내 집'],
        'okulum' => ['en' => 'my school', 'fr' => 'mon école', 'es' => 'mi escuela', 'de' => 'meine Schule', 'ja' => '私の学校', 'ko' => '내 학교'],

        // --- Unit 3: family --------------------------------------------
        // Turkish splits siblings by gender and has no single word for
        // "brother"/"sister" on its own, so the two-word forms are the entries.
        'anne' => ['en' => 'mother', 'fr' => 'mère', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니'],
        'baba' => ['en' => 'father', 'fr' => 'père', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지'],
        'erkek kardeş' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '남자 형제'],
        'kız kardeş' => ['en' => 'sister', 'fr' => 'sœur', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '여자 형제'],
        'arkadaş' => ['en' => 'friend', 'fr' => 'ami', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구'],
        'komşu' => ['en' => 'neighbour', 'fr' => 'voisin', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃'],
        'öğretmen' => ['en' => 'teacher', 'fr' => 'professeur', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님'],
        'doktor' => ['en' => 'doctor', 'fr' => 'médecin', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사'],

        // Possessed family forms. `annem` / `babam` end in a vowel so they take
        // a bare -m; `arkadaşım` needs a harmony vowel first. Whole tiles again.
        'annem' => ['en' => 'my mother', 'fr' => 'ma mère', 'es' => 'mi madre', 'de' => 'meine Mutter', 'ja' => '私の母', 'ko' => '내 어머니'],
        'babam' => ['en' => 'my father', 'fr' => 'mon père', 'es' => 'mi padre', 'de' => 'mein Vater', 'ja' => '私の父', 'ko' => '내 아버지'],
        'arkadaşım' => ['en' => 'my friend', 'fr' => 'mon ami', 'es' => 'mi amigo', 'de' => 'mein Freund', 'ja' => '私の友達', 'ko' => '내 친구'],
        'kardeşim' => ['en' => 'my sibling', 'fr' => 'mon frère', 'es' => 'mi hermano', 'de' => 'mein Geschwister', 'ja' => '私の兄弟', 'ko' => '내 형제'],

        // --- Unit 4: eating and drinking, and the first verbs -----------
        // Turkish verbs are cited by their infinitive (-mek/-mak), which is the
        // form a dictionary and a word bank both use.
        'yemek' => ['en' => 'to eat', 'fr' => 'manger', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다'],
        'içmek' => ['en' => 'to drink', 'fr' => 'boire', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다'],
        'elma' => ['en' => 'apple', 'fr' => 'pomme', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과'],
        'balık' => ['en' => 'fish', 'fr' => 'poisson', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선'],
        'çorba' => ['en' => 'soup', 'fr' => 'soupe', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프'],
        'salata' => ['en' => 'salad', 'fr' => 'salade', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드'],
        'pirinç' => ['en' => 'rice', 'fr' => 'riz', 'es' => 'arroz', 'de' => 'Reis', 'ja' => '米', 'ko' => '쌀'],
        'et' => ['en' => 'meat', 'fr' => 'viande', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기'],

        // ACCUSATIVE FORMS. Turkish marks a DEFINITE direct object with a
        // suffix: you eat "an apple" (`elma yemek`) but "the apple" is
        // `elmayı`. The vowel harmonises with the stem and a buffer -y- appears
        // after a vowel, so `elmayı` / `balığı` / `çorbayı` share no single
        // ending. Each is its own tile, and its own entry, for that reason.
        // `balığı`, not `balıkı`: final k softens to ğ before a vowel.
        'elmayı' => ['en' => 'the apple', 'fr' => 'la pomme', 'es' => 'la manzana', 'de' => 'den Apfel', 'ja' => 'りんごを', 'ko' => '사과를'],
        'balığı' => ['en' => 'the fish', 'fr' => 'le poisson', 'es' => 'el pescado', 'de' => 'den Fisch', 'ja' => '魚を', 'ko' => '생선을'],
        'çorbayı' => ['en' => 'the soup', 'fr' => 'la soupe', 'es' => 'la sopa', 'de' => 'die Suppe', 'ja' => 'スープを', 'ko' => '수프를'],
        'suyu' => ['en' => 'the water', 'fr' => "l'eau", 'es' => 'el agua', 'de' => 'das Wasser', 'ja' => '水を', 'ko' => '물을'],

        // --- Unit 5: colours and size ----------------------------------
        // Adjectives sit in front of the noun and never change shape, which
        // makes this the easiest unit in the chapter: `kırmızı kitap`,
        // `kırmızı ev`, `kırmızı elma` — one form, every time.
        'kırmızı' => ['en' => 'red', 'fr' => 'rouge', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤い', 'ko' => '빨간'],
        'mavi' => ['en' => 'blue', 'fr' => 'bleu', 'es' => 'azul', 'de' => 'blau', 'ja' => '青い', 'ko' => '파란'],
        'yeşil' => ['en' => 'green', 'fr' => 'vert', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑の', 'ko' => '초록'],
        'sarı' => ['en' => 'yellow', 'fr' => 'jaune', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色い', 'ko' => '노란'],
        'siyah' => ['en' => 'black', 'fr' => 'noir', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒い', 'ko' => '검은'],
        'beyaz' => ['en' => 'white', 'fr' => 'blanc', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白い', 'ko' => '하얀'],
        'büyük' => ['en' => 'big', 'fr' => 'grand', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰'],
        'küçük' => ['en' => 'small', 'fr' => 'petit', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은'],

        // --- Unit 6: places and going to them --------------------------
        'park' => ['en' => 'park', 'fr' => 'parc', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원'],
        'dükkân' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게'],
        'sokak' => ['en' => 'street', 'fr' => 'rue', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리'],
        'istasyon' => ['en' => 'station', 'fr' => 'gare', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역'],
        'gitmek' => ['en' => 'to go', 'fr' => 'aller', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다'],

        // DATIVE FORMS — "to the park". Another suffix, another set of shapes:
        // `parka` after a back vowel, `eve` after a front one, and a buffer -y-
        // after a vowel (`okula` has none, but `arabaya` would). Whole tiles.
        'parka' => ['en' => 'to the park', 'fr' => 'au parc', 'es' => 'al parque', 'de' => 'zum Park', 'ja' => '公園へ', 'ko' => '공원에'],
        'eve' => ['en' => 'to the house', 'fr' => 'à la maison', 'es' => 'a casa', 'de' => 'nach Hause', 'ja' => '家へ', 'ko' => '집에'],
        'okula' => ['en' => 'to school', 'fr' => "à l'école", 'es' => 'a la escuela', 'de' => 'zur Schule', 'ja' => '学校へ', 'ko' => '학교에'],
        'dükkâna' => ['en' => 'to the shop', 'fr' => 'au magasin', 'es' => 'a la tienda', 'de' => 'zum Geschäft', 'ja' => '店へ', 'ko' => '가게에'],

        // --- Unit 7: daily actions -------------------------------------
        'yürümek' => ['en' => 'to walk', 'fr' => 'marcher', 'es' => 'caminar', 'de' => 'gehen', 'ja' => '歩く', 'ko' => '걷다'],
        'uyumak' => ['en' => 'to sleep', 'fr' => 'dormir', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다'],
        'konuşmak' => ['en' => 'to speak', 'fr' => 'parler', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다'],
        'okumak' => ['en' => 'to read', 'fr' => 'lire', 'es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다'],
        'ben' => ['en' => 'I', 'fr' => 'je', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '나'],
        'yavaş' => ['en' => 'slowly', 'fr' => 'lentement', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히'],
        'iyi' => ['en' => 'well', 'fr' => 'bien', 'es' => 'bien', 'de' => 'gut', 'ja' => 'よく', 'ko' => '잘'],
        // `ile` (with) follows its noun rather than preceding it, and in speech
        // usually fuses onto it (`arkadaşımla`). The standalone form is taught
        // first because it is the one a learner can place as a tile.
        'ile' => ['en' => 'with', 'fr' => 'avec', 'es' => 'con', 'de' => 'mit', 'ja' => 'と', 'ko' => '와'],
        'çok' => ['en' => 'a lot', 'fr' => 'beaucoup', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이'],

        // PRESENT-TENSE FORMS, first person. Turkish conjugates by suffix, and
        // the shape depends on the stem's last vowel and whether it ends in a
        // vowel: `yürüyorum`, `uyuyorum`, `okuyorum`, `yiyorum`. The -yor- is
        // constant; nothing else is. Whole tiles, as always.
        'yürüyorum' => ['en' => 'I walk', 'fr' => 'je marche', 'es' => 'camino', 'de' => 'ich gehe', 'ja' => '私は歩く', 'ko' => '나는 걷는다'],
        'uyuyorum' => ['en' => 'I sleep', 'fr' => 'je dors', 'es' => 'duermo', 'de' => 'ich schlafe', 'ja' => '私は寝る', 'ko' => '나는 잔다'],
        'okuyorum' => ['en' => 'I read', 'fr' => 'je lis', 'es' => 'leo', 'de' => 'ich lese', 'ja' => '私は読む', 'ko' => '나는 읽는다'],
        'konuşuyorum' => ['en' => 'I speak', 'fr' => 'je parle', 'es' => 'hablo', 'de' => 'ich spreche', 'ja' => '私は話す', 'ko' => '나는 말한다'],

        // --- Unit 8: time and days -------------------------------------
        'gün' => ['en' => 'day', 'fr' => 'jour', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날'],
        'sabah' => ['en' => 'morning', 'fr' => 'matin', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침'],
        'akşam' => ['en' => 'evening', 'fr' => 'soir', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁'],
        'gece' => ['en' => 'night', 'fr' => 'nuit', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤'],
        'bugün' => ['en' => 'today', 'fr' => "aujourd'hui", 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘'],
        'yarın' => ['en' => 'tomorrow', 'fr' => 'demain', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일'],
        'saat' => ['en' => 'clock', 'fr' => 'horloge', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계'],
        'hafta' => ['en' => 'week', 'fr' => 'semaine', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주'],

        // --- Unit 9: weather and seasons -------------------------------
        'güneş' => ['en' => 'sun', 'fr' => 'soleil', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '태양'],
        'yağmur' => ['en' => 'rain', 'fr' => 'pluie', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비'],
        'kar' => ['en' => 'snow', 'fr' => 'neige', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈'],
        'rüzgâr' => ['en' => 'wind', 'fr' => 'vent', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람'],
        'yaz' => ['en' => 'summer', 'fr' => 'été', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름'],
        'kış' => ['en' => 'winter', 'fr' => 'hiver', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울'],
        'ilkbahar' => ['en' => 'spring', 'fr' => 'printemps', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄'],
        'sonbahar' => ['en' => 'autumn', 'fr' => 'automne', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을'],
        'sıcak' => ['en' => 'hot', 'fr' => 'chaud', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '暑い', 'ko' => '더운'],
        'soğuk' => ['en' => 'cold', 'fr' => 'froid', 'es' => 'frío', 'de' => 'kalt', 'ja' => '寒い', 'ko' => '추운'],

        // --- Unit 10: feelings and review ------------------------------
        'mutlu' => ['en' => 'happy', 'fr' => 'heureux', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せ', 'ko' => '행복한'],
        'üzgün' => ['en' => 'sad', 'fr' => 'triste', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈'],
        'yorgun' => ['en' => 'tired', 'fr' => 'fatigué', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한'],
        'hasta' => ['en' => 'sick', 'fr' => 'malade', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気', 'ko' => '아픈'],
        'mutluyum' => ['en' => 'I am happy', 'fr' => 'je suis heureux', 'es' => 'estoy feliz', 'de' => 'ich bin glücklich', 'ja' => '私は幸せです', 'ko' => '나는 행복하다'],
        'yorgunum' => ['en' => 'I am tired', 'fr' => 'je suis fatigué', 'es' => 'estoy cansado', 'de' => 'ich bin müde', 'ja' => '私は疲れた', 'ko' => '나는 피곤하다'],

        /* =====================================================================
         * CHAPTER 2 — CONVERSATION
         * ===================================================================*/

        // --- C2 Unit 1: meeting people ---------------------------------
        'nasılsın' => ['en' => 'how are you', 'fr' => 'comment vas-tu', 'es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => '元気ですか', 'ko' => '어떻게 지내'],
        'iyiyim' => ['en' => 'I am well', 'fr' => 'je vais bien', 'es' => 'estoy bien', 'de' => 'mir geht es gut', 'ja' => '元気です', 'ko' => '잘 지내요'],
        'memnun oldum' => ['en' => 'nice to meet you', 'fr' => 'enchanté', 'es' => 'mucho gusto', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '만나서 반갑습니다'],
        'adım' => ['en' => 'my name', 'fr' => 'mon nom', 'es' => 'mi nombre', 'de' => 'mein Name', 'ja' => '私の名前', 'ko' => '내 이름'],
        'senin' => ['en' => 'your', 'fr' => 'ton', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '너의'],
        'sen' => ['en' => 'you', 'fr' => 'tu', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '너'],
        'hoş geldin' => ['en' => 'welcome', 'fr' => 'bienvenue', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다'],

        // --- C2 Unit 2: asking questions -------------------------------
        // Turkish question words go where the answer would go, not at the
        // front — `adın ne` is literally "your-name what".
        'ne' => ['en' => 'what', 'fr' => 'quoi', 'es' => 'qué', 'de' => 'was', 'ja' => '何', 'ko' => '무엇'],
        'kim' => ['en' => 'who', 'fr' => 'qui', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구'],
        'nerede' => ['en' => 'where', 'fr' => 'où', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디'],
        'ne zaman' => ['en' => 'when', 'fr' => 'quand', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제'],
        'neden' => ['en' => 'why', 'fr' => 'pourquoi', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜'],
        'nasıl' => ['en' => 'how', 'fr' => 'comment', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게'],
        'kaç' => ['en' => 'how many', 'fr' => 'combien', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇'],
        'adın' => ['en' => 'your name', 'fr' => 'ton nom', 'es' => 'tu nombre', 'de' => 'dein Name', 'ja' => 'あなたの名前', 'ko' => '너의 이름'],

        // --- C2 Unit 3: numbers ----------------------------------------
        'iki' => ['en' => 'two', 'fr' => 'deux', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘'],
        'üç' => ['en' => 'three', 'fr' => 'trois', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋'],
        'dört' => ['en' => 'four', 'fr' => 'quatre', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷'],
        'beş' => ['en' => 'five', 'fr' => 'cinq', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯'],
        'on' => ['en' => 'ten', 'fr' => 'dix', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열'],
        'yaş' => ['en' => 'age', 'fr' => 'âge', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이'],
        'yaşındayım' => ['en' => 'I am years old', 'fr' => "j'ai ans", 'es' => 'tengo años', 'de' => 'ich bin Jahre alt', 'ja' => '歳です', 'ko' => '살입니다'],
        // `yaşım` = my age. Same possessive -ım the Beginner chapter taught.
        'yaşım' => ['en' => 'my age', 'fr' => 'mon âge', 'es' => 'mi edad', 'de' => 'mein Alter', 'ja' => '私の年齢', 'ko' => '내 나이'],
        'kitaplar' => ['en' => 'books', 'fr' => 'livres', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들'],

        // --- C2 Unit 4: feelings ---------------------------------------
        'memnun' => ['en' => 'glad', 'fr' => 'content', 'es' => 'contento', 'de' => 'froh', 'ja' => 'うれしい', 'ko' => '기쁜'],
        'sakin' => ['en' => 'calm', 'fr' => 'calme', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '穏やか', 'ko' => '차분한'],
        'biraz' => ['en' => 'a little', 'fr' => 'un peu', 'es' => 'un poco', 'de' => 'ein wenig', 'ja' => '少し', 'ko' => '조금'],
        'çünkü' => ['en' => 'because', 'fr' => 'parce que', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면'],
        'hastayım' => ['en' => 'I am sick', 'fr' => 'je suis malade', 'es' => 'estoy enfermo', 'de' => 'ich bin krank', 'ja' => '私は病気です', 'ko' => '나는 아프다'],
        'üzgünüm' => ['en' => 'I am sad', 'fr' => 'je suis triste', 'es' => 'estoy triste', 'de' => 'ich bin traurig', 'ja' => '私は悲しい', 'ko' => '나는 슬프다'],

        // --- C2 Unit 5: the past ---------------------------------------
        // Turkish past tense is -dı/-di/-du/-dü, harmonising with the stem, and
        // hardening to -tı after a voiceless consonant (`gitti`, not `gitdi`).
        'yedim' => ['en' => 'I ate', 'fr' => "j'ai mangé", 'es' => 'comí', 'de' => 'ich aß', 'ja' => '私は食べた', 'ko' => '나는 먹었다'],
        'içtim' => ['en' => 'I drank', 'fr' => "j'ai bu", 'es' => 'bebí', 'de' => 'ich trank', 'ja' => '私は飲んだ', 'ko' => '나는 마셨다'],
        'gördüm' => ['en' => 'I saw', 'fr' => "j'ai vu", 'es' => 'vi', 'de' => 'ich sah', 'ja' => '私は見た', 'ko' => '나는 봤다'],
        'dün' => ['en' => 'yesterday', 'fr' => 'hier', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제'],
        'zaten' => ['en' => 'already', 'fr' => 'déjà', 'es' => 'ya', 'de' => 'schon', 'ja' => 'すでに', 'ko' => '이미'],
        'sonra' => ['en' => 'then', 'fr' => 'ensuite', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그 다음'],
        'iyiydi' => ['en' => 'it was good', 'fr' => "c'était bien", 'es' => 'estuvo bien', 'de' => 'es war gut', 'ja' => 'よかった', 'ko' => '좋았다'],
        'gördü' => ['en' => 'saw', 'fr' => 'a vu', 'es' => 'vio', 'de' => 'sah', 'ja' => '見た', 'ko' => '봤다'],

        'memnunum' => ['en' => 'I am glad', 'fr' => 'je suis content', 'es' => 'estoy contento', 'de' => 'ich bin froh', 'ja' => '私は嬉しいです', 'ko' => '저는 기쁩니다'],
        'kız kardeşim' => ['en' => 'my sister', 'fr' => 'ma soeur', 'es' => 'mi hermana', 'de' => 'meine Schwester', 'ja' => '私の姉妹', 'ko' => '제 자매'],
        'evde' => ['en' => 'in the house', 'fr' => 'à la maison', 'es' => 'en la casa', 'de' => 'im Haus', 'ja' => '家で', 'ko' => '집에서'],
        'hissediyorum' => ['en' => 'I feel', 'fr' => 'je me sens', 'es' => 'me siento', 'de' => 'ich fühle mich', 'ja' => '私は感じます', 'ko' => '저는 느낍니다'],
        'arkadaşımla' => ['en' => 'with my friend', 'fr' => 'avec mon ami', 'es' => 'con mi amigo', 'de' => 'mit meinem Freund', 'ja' => '私の友達と', 'ko' => '제 친구와'],
        'o' => ['en' => 'it', 'fr' => 'il', 'es' => 'eso', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것'],
        'parkı' => ['en' => 'the park', 'fr' => 'le parc', 'es' => 'el parque', 'de' => 'den Park', 'ja' => '公園を', 'ko' => '공원을'],
        'burada' => ['en' => 'here', 'fr' => 'ici', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここに', 'ko' => '여기에'],
        'evi' => ['en' => 'the house', 'fr' => 'la maison', 'es' => 'la casa', 'de' => 'das Haus', 'ja' => '家を', 'ko' => '집을'],
        'okuldaydım' => ['en' => 'I was in the school', 'fr' => 'j\'étais à l\'école', 'es' => 'estaba en la escuela', 'de' => 'ich war in der Schule', 'ja' => '私は学校にいました', 'ko' => '저는 학교에 있었습니다'],
        'buradaydım' => ['en' => 'I was here', 'fr' => 'j\'étais ici', 'es' => 'estaba aquí', 'de' => 'ich war hier', 'ja' => '私はここにいました', 'ko' => '저는 여기에 있었습니다'],
        'dükkan' => ['en' => 'shop', 'fr' => 'magasin', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게'],
        'kardeş' => ['en' => 'brother', 'fr' => 'frère', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제'],
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
