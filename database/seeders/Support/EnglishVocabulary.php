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
        'coffee' => ['es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피', 'fr' => 'café'],
        'tea' => ['es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차', 'fr' => 'thé'],
        'milk' => ['es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유', 'fr' => 'lait'],
        'sugar' => ['es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕', 'fr' => 'sucre'],
        'bread' => ['es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵', 'fr' => 'pain'],
        'water' => ['es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물', 'fr' => 'eau'],
        'hello' => ['es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요', 'fr' => 'bonjour'],
        'thank you' => ['es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다', 'fr' => 'merci'],
        'please' => ['es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다', 'fr' => "s'il vous plaît"],
        'yes' => ['es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네', 'fr' => 'oui'],
        'no' => ['es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요', 'fr' => 'non'],
        'goodbye' => ['es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요', 'fr' => 'au revoir'],
        'sir' => ['es' => 'señor', 'de' => 'mein Herr', 'ja' => 'ムッシュ', 'ko' => '선생님', 'fr' => 'monsieur'],
        'madam' => ['es' => 'señora', 'de' => 'gnädige Frau', 'ja' => 'マダム', 'ko' => '부인', 'fr' => 'madame'],
        'I would like' => ['es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요', 'fr' => 'je voudrais'],
        'give me' => ['es' => 'deme', 'de' => 'geben Sie mir', 'ja' => 'ください', 'ko' => '주세요', 'fr' => 'donnez-moi'],
        'a' => ['es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의', 'fr' => 'un'],
        'and' => ['es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고', 'fr' => 'et'],
        'with' => ['es' => 'con', 'de' => 'mit', 'ja' => 'と一緒に', 'ko' => '와 함께', 'fr' => 'avec'],
        'I' => ['es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '나', 'fr' => 'je'],
        'the bill' => ['es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서', 'fr' => "l'addition"],

        // --- Unit 2: colours & counting ---
        'book' => ['es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책', 'fr' => 'livre'],
        'pen' => ['es' => 'bolígrafo', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜', 'fr' => 'stylo'],
        'red' => ['es' => 'rojo', 'de' => 'rot', 'ja' => '赤', 'ko' => '빨간색', 'fr' => 'rouge'],
        'blue' => ['es' => 'azul', 'de' => 'blau', 'ja' => '青', 'ko' => '파란색', 'fr' => 'bleu'],
        'green' => ['es' => 'verde', 'de' => 'grün', 'ja' => '緑', 'ko' => '초록색', 'fr' => 'vert'],
        'yellow' => ['es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色', 'ko' => '노란색', 'fr' => 'jaune'],
        'black' => ['es' => 'negro', 'de' => 'schwarz', 'ja' => '黒', 'ko' => '검은색', 'fr' => 'noir'],
        'white' => ['es' => 'blanco', 'de' => 'weiß', 'ja' => '白', 'ko' => '하얀색', 'fr' => 'blanc'],
        'one' => ['es' => 'uno', 'de' => 'eins', 'ja' => '一', 'ko' => '하나', 'fr' => 'un'],
        'two' => ['es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘', 'fr' => 'deux'],
        'three' => ['es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋', 'fr' => 'trois'],
        'four' => ['es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷', 'fr' => 'quatre'],
        'five' => ['es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯', 'fr' => 'cinq'],
        'six' => ['es' => 'seis', 'de' => 'sechs', 'ja' => '六', 'ko' => '여섯', 'fr' => 'six'],
        'seven' => ['es' => 'siete', 'de' => 'sieben', 'ja' => '七', 'ko' => '일곱', 'fr' => 'sept'],
        'eight' => ['es' => 'ocho', 'de' => 'acht', 'ja' => '八', 'ko' => '여덟', 'fr' => 'huit'],
        'nine' => ['es' => 'nueve', 'de' => 'neun', 'ja' => '九', 'ko' => '아홉', 'fr' => 'neuf'],
        'ten' => ['es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열', 'fr' => 'dix'],
        'two books' => ['es' => 'dos libros', 'de' => 'zwei Bücher', 'ja' => '二冊の本', 'ko' => '책 두 권', 'fr' => 'deux livres'],

        // --- Unit 3: family & people ---
        'mother' => ['es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니', 'fr' => 'mère'],
        'father' => ['es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지', 'fr' => 'père'],
        'brother' => ['es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제', 'fr' => 'frère'],
        'sister' => ['es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매', 'fr' => 'sœur'],
        'friend' => ['es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구', 'fr' => 'ami'],
        'neighbour' => ['es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃', 'fr' => 'voisin'],
        'teacher' => ['es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님', 'fr' => 'professeur'],
        'doctor' => ['es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사', 'fr' => 'médecin'],
        'my' => ['es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '나의', 'fr' => 'mon'],
        'is' => ['es' => 'es', 'de' => 'ist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'est'],
        'this is' => ['es' => 'este es', 'de' => 'das ist', 'ja' => 'これは', 'ko' => '이분은', 'fr' => "c'est"],
        'also' => ['es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한', 'fr' => 'aussi'],
        'he is' => ['es' => 'él es', 'de' => 'er ist', 'ja' => '彼は', 'ko' => '그는', 'fr' => 'il est'],
        'she is' => ['es' => 'ella es', 'de' => 'sie ist', 'ja' => '彼女は', 'ko' => '그녀는', 'fr' => 'elle est'],
        'who' => ['es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구', 'fr' => 'qui'],
        'very' => ['es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '매우', 'fr' => 'très'],
        'but' => ['es' => 'pero', 'de' => 'aber', 'ja' => 'しかし', 'ko' => '하지만', 'fr' => 'mais'],
        'or' => ['es' => 'o', 'de' => 'oder', 'ja' => 'または', 'ko' => '또는', 'fr' => 'ou'],
        'well' => ['es' => 'bien', 'de' => 'gut', 'ja' => '元気', 'ko' => '잘', 'fr' => 'bien'],
        'am' => ['es' => 'estoy', 'de' => 'bin', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'suis'],
        'are' => ['es' => 'estás', 'de' => 'bist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'es'],
        'you' => ['es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '당신', 'fr' => 'tu'],
        'your' => ['es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의', 'fr' => 'ton'],
        'name' => ['es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름', 'fr' => 'nom'],

        // --- Unit 4: home & objects ---
        'table' => ['es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '탁자', 'fr' => 'table'],
        'chair' => ['es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자', 'fr' => 'chaise'],
        'house' => ['es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집', 'fr' => 'maison'],
        'cat' => ['es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이', 'fr' => 'chat'],
        'dog' => ['es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개', 'fr' => 'chien'],
        'the' => ['es' => 'el', 'de' => 'der', 'ja' => 'その', 'ko' => '그', 'fr' => 'le'],
        'in' => ['es' => 'en', 'de' => 'in', 'ja' => 'の中に', 'ko' => '안에', 'fr' => 'dans'],
        'on' => ['es' => 'sobre', 'de' => 'auf', 'ja' => 'の上に', 'ko' => '위에', 'fr' => 'sur'],
        'under' => ['es' => 'debajo', 'de' => 'unter', 'ja' => 'の下に', 'ko' => '아래에', 'fr' => 'sous'],
        'I have' => ['es' => 'tengo', 'de' => 'ich habe', 'ja' => '私は持っている', 'ko' => '나는 가지고 있다', 'fr' => "j'ai"],
        'where is' => ['es' => 'dónde está', 'de' => 'wo ist', 'ja' => 'どこですか', 'ko' => '어디입니까', 'fr' => 'où est'],
        'here is' => ['es' => 'aquí está', 'de' => 'hier ist', 'ja' => 'これが', 'ko' => '여기', 'fr' => 'voici'],

        // --- Unit 5: days & time ---
        'morning' => ['es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침', 'fr' => 'matin'],
        'evening' => ['es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁', 'fr' => 'soir'],
        'night' => ['es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤', 'fr' => 'nuit'],
        'clock' => ['es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계', 'fr' => 'horloge'],
        'calendar' => ['es' => 'calendario', 'de' => 'Kalender', 'ja' => 'カレンダー', 'ko' => '달력', 'fr' => 'calendrier'],
        'Monday' => ['es' => 'lunes', 'de' => 'Montag', 'ja' => '月曜日', 'ko' => '월요일', 'fr' => 'lundi'],
        'Tuesday' => ['es' => 'martes', 'de' => 'Dienstag', 'ja' => '火曜日', 'ko' => '화요일', 'fr' => 'mardi'],
        'today' => ['es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘', 'fr' => "aujourd'hui"],
        'tomorrow' => ['es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일', 'fr' => 'demain'],
        'week' => ['es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주', 'fr' => 'semaine'],
        'hour' => ['es' => 'hora', 'de' => 'Stunde', 'ja' => '時間', 'ko' => '시간', 'fr' => 'heure'],
        'day' => ['es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날', 'fr' => 'jour'],

        // --- Unit 6: everyday verbs ---
        'eat' => ['es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다', 'fr' => 'manger'],
        'drink' => ['es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다', 'fr' => 'boire'],
        'walk' => ['es' => 'caminar', 'de' => 'gehen', 'ja' => '歩く', 'ko' => '걷다', 'fr' => 'marcher'],
        'speak' => ['es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다', 'fr' => 'parler'],
        'sleep' => ['es' => 'dormir', 'de' => 'schlafen', 'ja' => '眠る', 'ko' => '자다', 'fr' => 'dormir'],
        'read' => ['es' => 'leer', 'de' => 'lesen', 'ja' => '読む', 'ko' => '읽다', 'fr' => 'lire'],
        'slowly' => ['es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히', 'fr' => 'lentement'],
        'now' => ['es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금', 'fr' => 'maintenant'],
        'too much' => ['es' => 'demasiado', 'de' => 'zu viel', 'ja' => 'すぎます', 'ko' => '너무', 'fr' => 'trop'],
        'together' => ['es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '함께', 'fr' => 'ensemble'],

        // --- Unit 7: describing things ---
        'big' => ['es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰', 'fr' => 'grand'],
        'small' => ['es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은', 'fr' => 'petit'],
        'hot' => ['es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운', 'fr' => 'chaud'],
        'cold' => ['es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운', 'fr' => 'froid'],
        'beautiful' => ['es' => 'hermoso', 'de' => 'schön', 'ja' => '美しい', 'ko' => '아름다운', 'fr' => 'beau'],
        'pretty' => ['es' => 'bonito', 'de' => 'hübsch', 'ja' => 'かわいい', 'ko' => '예쁜', 'fr' => 'joli'],
        'easy' => ['es' => 'fácil', 'de' => 'einfach', 'ja' => '簡単', 'ko' => '쉬운', 'fr' => 'facile'],
        'hard' => ['es' => 'difícil', 'de' => 'schwer', 'ja' => '難しい', 'ko' => '어려운', 'fr' => 'difficile'],
        'good' => ['es' => 'bueno', 'de' => 'gut', 'ja' => '良い', 'ko' => '좋은', 'fr' => 'bon'],
        'new' => ['es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새로운', 'fr' => 'nouveau'],
        'old' => ['es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된', 'fr' => 'vieux'],

        // --- Unit 8: places in town ---
        'town' => ['es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시', 'fr' => 'ville'],
        'village' => ['es' => 'pueblo', 'de' => 'Dorf', 'ja' => '村', 'ko' => '마을', 'fr' => 'village'],
        'school' => ['es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교', 'fr' => 'école'],
        'park' => ['es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원', 'fr' => 'parc'],
        'shop' => ['es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게', 'fr' => 'magasin'],
        'street' => ['es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리', 'fr' => 'rue'],
        'station' => ['es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역', 'fr' => 'gare'],
        'near' => ['es' => 'cerca', 'de' => 'nah', 'ja' => '近く', 'ko' => '가까이', 'fr' => 'près'],
        'far' => ['es' => 'lejos', 'de' => 'weit', 'ja' => '遠く', 'ko' => '멀리', 'fr' => 'loin'],
        'go' => ['es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다', 'fr' => 'aller'],
        'come' => ['es' => 'venir', 'de' => 'kommen', 'ja' => '来る', 'ko' => '오다', 'fr' => 'venir'],
        'left' => ['es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽', 'fr' => 'gauche'],
        'right' => ['es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽', 'fr' => 'droite'],
        'open' => ['es' => 'abierto', 'de' => 'offen', 'ja' => '開いた', 'ko' => '열린', 'fr' => 'ouvert'],
        'closed' => ['es' => 'cerrado', 'de' => 'geschlossen', 'ja' => '閉じた', 'ko' => '닫힌', 'fr' => 'fermé'],
        'here' => ['es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기', 'fr' => 'ici'],
        'to' => ['es' => 'a', 'de' => 'zu', 'ja' => 'へ', 'ko' => '로', 'fr' => 'à'],
        'of' => ['es' => 'de', 'de' => 'von', 'ja' => 'の', 'ko' => '의', 'fr' => 'de'],
        'at' => ['es' => 'en', 'de' => 'an', 'ja' => 'で', 'ko' => '에서', 'fr' => 'à'],
        'for' => ['es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해', 'fr' => 'pour'],
        'me' => ['es' => 'me', 'de' => 'mich', 'ja' => '私', 'ko' => '저', 'fr' => 'moi'],
        'it' => ['es' => 'eso', 'de' => 'es', 'ja' => 'それ', 'ko' => '그것', 'fr' => 'ce'],
        'from' => ['es' => 'de', 'de' => 'von', 'ja' => 'から', 'ko' => '에서', 'fr' => 'de'],

        // --- Unit 9: weather & seasons ---
        'rain' => ['es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비', 'fr' => 'pluie'],
        'snow' => ['es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈', 'fr' => 'neige'],
        'wind' => ['es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람', 'fr' => 'vent'],
        'sun' => ['es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '해', 'fr' => 'soleil'],
        'sky' => ['es' => 'cielo', 'de' => 'Himmel', 'ja' => '空', 'ko' => '하늘', 'fr' => 'ciel'],
        'cloud' => ['es' => 'nube', 'de' => 'Wolke', 'ja' => '雲', 'ko' => '구름', 'fr' => 'nuage'],
        'spring' => ['es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄', 'fr' => 'printemps'],
        'summer' => ['es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름', 'fr' => 'été'],
        'autumn' => ['es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을', 'fr' => 'automne'],
        'winter' => ['es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울', 'fr' => 'hiver'],
        'weather' => ['es' => 'tiempo', 'de' => 'Wetter', 'ja' => '天気', 'ko' => '날씨', 'fr' => 'temps'],
        'warm' => ['es' => 'cálido', 'de' => 'warm', 'ja' => '暖かい', 'ko' => '따뜻한', 'fr' => 'doux'],
        'season' => ['es' => 'estación', 'de' => 'Jahreszeit', 'ja' => '季節', 'ko' => '계절', 'fr' => 'saison'],

        // --- Unit 10: grammar — a, the, this, these ---
        'an' => ['es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의', 'fr' => 'un'],
        'this' => ['es' => 'este', 'de' => 'dieser', 'ja' => 'この', 'ko' => '이', 'fr' => 'ce'],
        'that' => ['es' => 'ese', 'de' => 'jener', 'ja' => 'あの', 'ko' => '저', 'fr' => 'cette'],
        'these' => ['es' => 'estos', 'de' => 'diese', 'ja' => 'これらの', 'ko' => '이것들', 'fr' => 'ces'],
        'those' => ['es' => 'esos', 'de' => 'jene', 'ja' => 'あれらの', 'ko' => '저것들', 'fr' => 'ces'],
        'some' => ['es' => 'algo de', 'de' => 'etwas', 'ja' => '少しの', 'ko' => '약간의', 'fr' => 'du'],
        'books' => ['es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들', 'fr' => 'livres'],
        'pens' => ['es' => 'bolígrafos', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜들', 'fr' => 'stylos'],
        'cats' => ['es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이들', 'fr' => 'chats'],
        'dogs' => ['es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개들', 'fr' => 'chiens'],
        'apple' => ['es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과', 'fr' => 'pomme'],

        // === Chapter 2: Conversation ===

        // --- Unit 1: introducing yourself ---
        'I am' => ['es' => 'soy', 'de' => 'ich bin', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'je suis'],
        'you are' => ['es' => 'eres', 'de' => 'du bist', 'ja' => 'です', 'ko' => '입니다', 'fr' => 'tu es'],
        'I live' => ['es' => 'vivo', 'de' => 'ich wohne', 'ja' => '私は住んでいる', 'ko' => '나는 삽니다', 'fr' => "j'habite"],
        'city' => ['es' => 'ciudad', 'de' => 'Stadt', 'ja' => '都市', 'ko' => '도시', 'fr' => 'ville'],
        'age' => ['es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이', 'fr' => 'âge'],
        'years old' => ['es' => 'años', 'de' => 'Jahre alt', 'ja' => '歳', 'ko' => '살', 'fr' => 'ans'],
        'nice to meet you' => ['es' => 'encantado', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '반갑습니다', 'fr' => 'enchanté'],
        'welcome' => ['es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다', 'fr' => 'bienvenue'],

        // --- Unit 2: asking questions ---
        'how are you' => ['es' => 'cómo estás', 'de' => 'wie geht es dir', 'ja' => 'お元気ですか', 'ko' => '어떻게 지내세요', 'fr' => 'comment ça va'],
        'where' => ['es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디', 'fr' => 'où'],
        'which' => ['es' => 'cuál', 'de' => 'welcher', 'ja' => 'どれ', 'ko' => '어느', 'fr' => 'quel'],
        'how many' => ['es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '몇 개', 'fr' => 'combien'],
        'when' => ['es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제', 'fr' => 'quand'],
        'why' => ['es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜', 'fr' => 'pourquoi'],
        'maybe' => ['es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도', 'fr' => 'peut-être'],
        'of course' => ['es' => 'por supuesto', 'de' => 'natürlich', 'ja' => 'もちろん', 'ko' => '물론', 'fr' => 'bien sûr'],

        // --- Unit 3: making plans ---
        "let's go" => ['es' => 'vamos', 'de' => 'lass uns gehen', 'ja' => '行きましょう', 'ko' => '갑시다', 'fr' => 'allons-y'],
        'soon' => ['es' => 'pronto', 'de' => 'bald', 'ja' => 'すぐに', 'ko' => '곧', 'fr' => 'bientôt'],
        'tonight' => ['es' => 'esta noche', 'de' => 'heute Abend', 'ja' => '今夜', 'ko' => '오늘 밤', 'fr' => 'ce soir'],
        'okay' => ['es' => 'vale', 'de' => 'okay', 'ja' => 'いいよ', 'ko' => '좋아요', 'fr' => "d'accord"],
        'then' => ['es' => 'entonces', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그러면', 'fr' => 'ensuite'],
        'later' => ['es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에', 'fr' => 'plus tard'],
        'really' => ['es' => 'de verdad', 'de' => 'wirklich', 'ja' => '本当に', 'ko' => '정말', 'fr' => 'vraiment'],
        'watch' => ['es' => 'mirar', 'de' => 'schauen', 'ja' => '見る', 'ko' => '보다', 'fr' => 'regarder'],
        'film' => ['es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화', 'fr' => 'film'],

        // --- Unit 4: feelings ---
        'happy' => ['es' => 'feliz', 'de' => 'glücklich', 'ja' => '幸せ', 'ko' => '행복한', 'fr' => 'heureux'],
        'sad' => ['es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈', 'fr' => 'triste'],
        'tired' => ['es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한', 'fr' => 'fatigué'],
        'sick' => ['es' => 'enfermo', 'de' => 'krank', 'ja' => '病気', 'ko' => '아픈', 'fr' => 'malade'],
        'glad' => ['es' => 'contento', 'de' => 'froh', 'ja' => '嬉しい', 'ko' => '기쁜', 'fr' => 'content'],
        'calm' => ['es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '落ち着いた', 'ko' => '차분한', 'fr' => 'calme'],
        'a little' => ['es' => 'un poco', 'de' => 'ein bisschen', 'ja' => '少し', 'ko' => '조금', 'fr' => 'un peu'],
        'because' => ['es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면', 'fr' => 'parce que'],
        'I feel' => ['es' => 'me siento', 'de' => 'ich fühle mich', 'ja' => '私は感じる', 'ko' => '나는 느낍니다', 'fr' => 'je me sens'],

        // --- Unit 5: the past ---
        'yesterday' => ['es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제', 'fr' => 'hier'],
        'I ate' => ['es' => 'comí', 'de' => 'ich aß', 'ja' => '私は食べた', 'ko' => '나는 먹었다', 'fr' => "j'ai mangé"],
        'I drank' => ['es' => 'bebí', 'de' => 'ich trank', 'ja' => '私は飲んだ', 'ko' => '나는 마셨다', 'fr' => "j'ai bu"],
        'it was' => ['es' => 'fue', 'de' => 'es war', 'ja' => 'でした', 'ko' => '였습니다', 'fr' => "c'était"],
        'I saw' => ['es' => 'vi', 'de' => 'ich sah', 'ja' => '私は見た', 'ko' => '나는 보았다', 'fr' => "j'ai vu"],
        'already' => ['es' => 'ya', 'de' => 'schon', 'ja' => 'もう', 'ko' => '이미', 'fr' => 'déjà'],
        'I was' => ['es' => 'estaba', 'de' => 'ich war', 'ja' => 'でした', 'ko' => '였습니다', 'fr' => "j'étais"],

        // --- Unit 6: future plans ---
        'I am going' => ['es' => 'voy', 'de' => 'ich gehe', 'ja' => '私は行く', 'ko' => '나는 갈 것이다', 'fr' => 'je vais'],
        'before' => ['es' => 'antes', 'de' => 'vor', 'ja' => '前に', 'ko' => '전에', 'fr' => 'avant'],
        'after' => ['es' => 'después', 'de' => 'nach', 'ja' => '後に', 'ko' => '후에', 'fr' => 'après'],
        'I want' => ['es' => 'quiero', 'de' => 'ich will', 'ja' => 'たいです', 'ko' => '나는 원한다', 'fr' => 'je veux'],
        'I can' => ['es' => 'puedo', 'de' => 'ich kann', 'ja' => '私はできる', 'ko' => '나는 할 수 있다', 'fr' => 'je peux'],
        'ready' => ['es' => 'listo', 'de' => 'bereit', 'ja' => '準備ができた', 'ko' => '준비된', 'fr' => 'prêt'],
        'free' => ['es' => 'libre', 'de' => 'frei', 'ja' => '暇', 'ko' => '한가한', 'fr' => 'libre'],
        'next' => ['es' => 'próximo', 'de' => 'nächste', 'ja' => '次の', 'ko' => '다음', 'fr' => 'prochain'],

        // --- Unit 7: giving directions ---
        'straight' => ['es' => 'recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '똑바로', 'fr' => 'tout droit'],
        'turn' => ['es' => 'girar', 'de' => 'abbiegen', 'ja' => '曲がる', 'ko' => '돌다', 'fr' => 'tourner'],
        'cross' => ['es' => 'cruzar', 'de' => 'überqueren', 'ja' => '渡る', 'ko' => '건너다', 'fr' => 'traverser'],
        'continue' => ['es' => 'continuar', 'de' => 'weitergehen', 'ja' => '続ける', 'ko' => '계속하다', 'fr' => 'continuer'],
        'in front' => ['es' => 'delante', 'de' => 'vorne', 'ja' => '前に', 'ko' => '앞에', 'fr' => 'devant'],
        'behind' => ['es' => 'detrás', 'de' => 'hinten', 'ja' => '後ろに', 'ko' => '뒤에', 'fr' => 'derrière'],
        'north' => ['es' => 'norte', 'de' => 'Norden', 'ja' => '北', 'ko' => '북쪽', 'fr' => 'nord'],
        'south' => ['es' => 'sur', 'de' => 'Süden', 'ja' => '南', 'ko' => '남쪽', 'fr' => 'sud'],

        // --- Unit 8: phone conversations ---
        'call' => ['es' => 'llamar', 'de' => 'anrufen', 'ja' => '電話する', 'ko' => '전화하다', 'fr' => 'appeler'],
        'wait' => ['es' => 'esperar', 'de' => 'warten', 'ja' => '待つ', 'ko' => '기다리다', 'fr' => 'attendre'],
        'message' => ['es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지', 'fr' => 'message'],
        'call back' => ['es' => 'devolver la llamada', 'de' => 'zurückrufen', 'ja' => '折り返す', 'ko' => '다시 전화하다', 'fr' => 'rappeler'],
        'busy' => ['es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜', 'fr' => 'occupé'],
        'sorry' => ['es' => 'lo siento', 'de' => 'Entschuldigung', 'ja' => 'ごめんなさい', 'ko' => '죄송합니다', 'fr' => 'désolé'],
        'phone' => ['es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화', 'fr' => 'téléphone'],

        // --- Unit 9: expressing opinions ---
        'I think' => ['es' => 'creo', 'de' => 'ich denke', 'ja' => '私は思う', 'ko' => '나는 생각한다', 'fr' => 'je pense'],
        'I believe' => ['es' => 'creo que', 'de' => 'ich glaube', 'ja' => '私は信じる', 'ko' => '나는 믿는다', 'fr' => 'je crois'],
        'true' => ['es' => 'verdadero', 'de' => 'wahr', 'ja' => '本当', 'ko' => '사실', 'fr' => 'vrai'],
        'false' => ['es' => 'falso', 'de' => 'falsch', 'ja' => '偽', 'ko' => '거짓', 'fr' => 'faux'],
        'I prefer' => ['es' => 'prefiero', 'de' => 'ich bevorzuge', 'ja' => '私は好む', 'ko' => '나는 선호한다', 'fr' => 'je préfère'],
        'better' => ['es' => 'mejor', 'de' => 'besser', 'ja' => 'もっと良い', 'ko' => '더 좋은', 'fr' => 'meilleur'],

        // --- Unit 10: comparisons & preferences ---
        'more' => ['es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더', 'fr' => 'plus'],
        'less' => ['es' => 'menos', 'de' => 'weniger', 'ja' => 'より少ない', 'ko' => '덜', 'fr' => 'moins'],
        'like' => ['es' => 'como', 'de' => 'wie', 'ja' => 'のように', 'ko' => '처럼', 'fr' => 'comme'],
        'same' => ['es' => 'mismo', 'de' => 'gleich', 'ja' => '同じ', 'ko' => '같은', 'fr' => 'même'],
        'worse' => ['es' => 'peor', 'de' => 'schlechter', 'ja' => 'もっと悪い', 'ko' => '더 나쁜', 'fr' => 'pire'],
        'as much' => ['es' => 'tanto', 'de' => 'genauso viel', 'ja' => '同じくらい', 'ko' => '그만큼', 'fr' => 'autant'],
        'especially' => ['es' => 'sobre todo', 'de' => 'besonders', 'ja' => '特に', 'ko' => '특히', 'fr' => 'surtout'],
        'as' => ['es' => 'como', 'de' => 'wie', 'ja' => 'のように', 'ko' => '만큼', 'fr' => 'comme'],
        'than' => ['es' => 'que', 'de' => 'als', 'ja' => 'より', 'ko' => '보다', 'fr' => 'que'],

        // === Chapter 3: Restaurant ===

        // --- food ---
        'soup' => ['es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프', 'fr' => 'soupe'],
        'salad' => ['es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드', 'fr' => 'salade'],
        'chicken' => ['es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기', 'fr' => 'poulet'],
        'fish' => ['es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선', 'fr' => 'poisson'],
        'meat' => ['es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기', 'fr' => 'viande'],
        'rice' => ['es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥', 'fr' => 'riz'],
        'cheese' => ['es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈', 'fr' => 'fromage'],
        'cake' => ['es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크', 'fr' => 'gâteau'],
        'ice cream' => ['es' => 'helado', 'de' => 'Eis', 'ja' => 'アイスクリーム', 'ko' => '아이스크림', 'fr' => 'glace'],
        'sandwich' => ['es' => 'sándwich', 'de' => 'Sandwich', 'ja' => 'サンドイッチ', 'ko' => '샌드위치', 'fr' => 'sandwich'],
        'burger' => ['es' => 'hamburguesa', 'de' => 'Burger', 'ja' => 'ハンバーガー', 'ko' => '햄버거', 'fr' => 'hamburger'],
        'fries' => ['es' => 'patatas fritas', 'de' => 'Pommes', 'ja' => 'フライドポテト', 'ko' => '감자튀김', 'fr' => 'frites'],
        'wine' => ['es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인', 'fr' => 'vin'],
        'beer' => ['es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주', 'fr' => 'bière'],
        'juice' => ['es' => 'zumo', 'de' => 'Saft', 'ja' => 'ジュース', 'ko' => '주스', 'fr' => 'jus'],
        'chocolate' => ['es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿', 'fr' => 'chocolat'],
        'tart' => ['es' => 'tarta', 'de' => 'Torte', 'ja' => 'タルト', 'ko' => '타르트', 'fr' => 'tarte'],
        'cream' => ['es' => 'nata', 'de' => 'Sahne', 'ja' => 'クリーム', 'ko' => '크림', 'fr' => 'crème'],
        'vanilla' => ['es' => 'vainilla', 'de' => 'Vanille', 'ja' => 'バニラ', 'ko' => '바닐라', 'fr' => 'vanille'],
        'strawberry' => ['es' => 'fresa', 'de' => 'Erdbeere', 'ja' => 'いちご', 'ko' => '딸기', 'fr' => 'fraise'],
        'vegetables' => ['es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소', 'fr' => 'légumes'],
        'fruit' => ['es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일', 'fr' => 'fruit'],
        'salt' => ['es' => 'sal', 'de' => 'Salz', 'ja' => '塩', 'ko' => '소금', 'fr' => 'sel'],
        'pepper' => ['es' => 'pimienta', 'de' => 'Pfeffer', 'ja' => 'こしょう', 'ko' => '후추', 'fr' => 'poivre'],
        'butter' => ['es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터', 'fr' => 'beurre'],
        'egg' => ['es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '계란', 'fr' => 'œuf'],
        'ice' => ['es' => 'hielo', 'de' => 'Eiswürfel', 'ja' => '氷', 'ko' => '얼음', 'fr' => 'glaçons'],

        // --- the table ---
        'plate' => ['es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시', 'fr' => 'assiette'],
        'fork' => ['es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크', 'fr' => 'fourchette'],
        'knife' => ['es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프', 'fr' => 'couteau'],
        'spoon' => ['es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락', 'fr' => 'cuillère'],
        'glass' => ['es' => 'vaso', 'de' => 'Glas', 'ja' => 'グラス', 'ko' => '유리잔', 'fr' => 'verre'],
        'bottle' => ['es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병', 'fr' => 'bouteille'],
        'napkin' => ['es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨', 'fr' => 'serviette'],
        'menu' => ['es' => 'menú', 'de' => 'Menü', 'ja' => 'メニュー', 'ko' => '메뉴', 'fr' => 'menu'],
        'waiter' => ['es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터', 'fr' => 'serveur'],
        'kitchen' => ['es' => 'cocina', 'de' => 'Küche', 'ja' => '厨房', 'ko' => '주방', 'fr' => 'cuisine'],
        'restaurant' => ['es' => 'restaurante', 'de' => 'Restaurant', 'ja' => 'レストラン', 'ko' => '식당', 'fr' => 'restaurant'],

        // --- ordering ---
        'to order' => ['es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다', 'fr' => 'commander'],
        'order' => ['es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문', 'fr' => 'commande'],
        "I'll have" => ['es' => 'tomo', 'de' => 'ich nehme', 'ja' => 'にします', 'ko' => '하겠습니다', 'fr' => 'je prends'],
        'dish' => ['es' => 'plato', 'de' => 'Gericht', 'ja' => '料理', 'ko' => '요리', 'fr' => 'plat'],
        'starter' => ['es' => 'entrante', 'de' => 'Vorspeise', 'ja' => '前菜', 'ko' => '전채', 'fr' => 'entrée'],
        'dessert' => ['es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트', 'fr' => 'dessert'],
        'a drink' => ['es' => 'una bebida', 'de' => 'ein Getränk', 'ja' => '飲み物', 'ko' => '음료', 'fr' => 'une boisson'],
        'slice' => ['es' => 'trozo', 'de' => 'Stück', 'ja' => '一切れ', 'ko' => '한 조각', 'fr' => 'part'],
        'to share' => ['es' => 'compartir', 'de' => 'teilen', 'ja' => '分ける', 'ko' => '나누다', 'fr' => 'partager'],
        'to choose' => ['es' => 'elegir', 'de' => 'wählen', 'ja' => '選ぶ', 'ko' => '고르다', 'fr' => 'choisir'],
        'to bring' => ['es' => 'traer', 'de' => 'bringen', 'ja' => '持ってくる', 'ko' => '가져오다', 'fr' => 'apporter'],
        'bring' => ['es' => 'traer', 'de' => 'bringen', 'ja' => '持ってくる', 'ko' => '가져오다', 'fr' => 'apporter'],
        'pay' => ['es' => 'pagar', 'de' => 'bezahlen', 'ja' => '払う', 'ko' => '지불하다', 'fr' => 'payer'],
        'choose' => ['es' => 'elegir', 'de' => 'wählen', 'ja' => '選ぶ', 'ko' => '고르다', 'fr' => 'choisir'],
        'bring me' => ['es' => 'tráigame', 'de' => 'bringen Sie mir', 'ja' => '持ってきてください', 'ko' => '가져다주세요', 'fr' => 'apportez-moi'],
        'can you' => ['es' => 'puede usted', 'de' => 'können Sie', 'ja' => 'できますか', 'ko' => '주시겠어요', 'fr' => 'pouvez-vous'],
        'excuse me' => ['es' => 'disculpe', 'de' => 'entschuldigen Sie', 'ja' => 'すみません', 'ko' => '실례합니다', 'fr' => 'excusez-moi'],
        'without' => ['es' => 'sin', 'de' => 'ohne', 'ja' => 'なし', 'ko' => '없이', 'fr' => 'sans'],
        'each' => ['es' => 'cada', 'de' => 'jeder', 'ja' => 'それぞれの', 'ko' => '각각의', 'fr' => 'chaque'],
        'hungry' => ['es' => 'hambriento', 'de' => 'hungrig', 'ja' => 'お腹がすいた', 'ko' => '배고픈', 'fr' => 'affamé'],
        'thirsty' => ['es' => 'sediento', 'de' => 'durstig', 'ja' => 'のどが渇いた', 'ko' => '목마른', 'fr' => 'assoiffé'],
        'another' => ['es' => 'otro', 'de' => 'noch ein', 'ja' => 'もう一つの', 'ko' => '하나 더', 'fr' => 'encore'],

        // --- money ---
        'money' => ['es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈', 'fr' => 'argent'],
        'price' => ['es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격', 'fr' => 'prix'],
        'expensive' => ['es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼', 'fr' => 'cher'],
        'cheap' => ['es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼', 'fr' => 'bon marché'],
        'costs' => ['es' => 'cuesta', 'de' => 'kostet', 'ja' => 'かかる', 'ko' => '입니다', 'fr' => 'coûte'],
        'total' => ['es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '총액', 'fr' => 'total'],
        'to pay' => ['es' => 'pagar', 'de' => 'bezahlen', 'ja' => '払う', 'ko' => '지불하다', 'fr' => 'payer'],
        'I pay' => ['es' => 'pago', 'de' => 'ich bezahle', 'ja' => '私が払う', 'ko' => '제가 냅니다', 'fr' => 'je paie'],
        'change' => ['es' => 'cambio', 'de' => 'Wechselgeld', 'ja' => 'おつり', 'ko' => '거스름돈', 'fr' => 'monnaie'],
        'cash' => ['es' => 'en efectivo', 'de' => 'in bar', 'ja' => '現金で', 'ko' => '현금으로', 'fr' => 'en espèces'],
        'tip' => ['es' => 'propina', 'de' => 'Trinkgeld', 'ja' => 'チップ', 'ko' => '팁', 'fr' => 'pourboire'],
        'receipt' => ['es' => 'recibo', 'de' => 'Quittung', 'ja' => 'レシート', 'ko' => '영수증', 'fr' => 'reçu'],
        'separately' => ['es' => 'por separado', 'de' => 'getrennt', 'ja' => '別々に', 'ko' => '따로', 'fr' => 'séparément'],
        'dollars' => ['es' => 'dólares', 'de' => 'Dollar', 'ja' => 'ドル', 'ko' => '달러', 'fr' => 'dollars'],
        'card' => ['es' => 'tarjeta', 'de' => 'Karte', 'ja' => 'カード', 'ko' => '카드', 'fr' => 'carte'],

        // --- reservations ---
        'to book' => ['es' => 'reservar', 'de' => 'reservieren', 'ja' => '予約する', 'ko' => '예약하다', 'fr' => 'réserver'],
        'booking' => ['es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약', 'fr' => 'réservation'],
        'people' => ['es' => 'personas', 'de' => 'Personen', 'ja' => '人', 'ko' => '명', 'fr' => 'personnes'],
        'seat' => ['es' => 'sitio', 'de' => 'Platz', 'ja' => '席', 'ko' => '자리', 'fr' => 'place'],
        'to cancel' => ['es' => 'cancelar', 'de' => 'stornieren', 'ja' => 'キャンセルする', 'ko' => '취소하다', 'fr' => 'annuler'],
        'to confirm' => ['es' => 'confirmar', 'de' => 'bestätigen', 'ja' => '確認する', 'ko' => '확인하다', 'fr' => 'confirmer'],
        'noon' => ['es' => 'mediodía', 'de' => 'Mittag', 'ja' => '正午', 'ko' => '정오', 'fr' => 'midi'],
        "o'clock" => ['es' => 'en punto', 'de' => 'Uhr', 'ja' => '時', 'ko' => '시', 'fr' => 'heures'],
        'minutes' => ['es' => 'minutos', 'de' => 'Minuten', 'ja' => '分', 'ko' => '분', 'fr' => 'minutes'],

        // --- taste & complaints ---
        'delicious' => ['es' => 'delicioso', 'de' => 'köstlich', 'ja' => 'おいしい', 'ko' => '맛있는', 'fr' => 'délicieux'],
        'excellent' => ['es' => 'excelente', 'de' => 'ausgezeichnet', 'ja' => '素晴らしい', 'ko' => '훌륭한', 'fr' => 'excellent'],
        'perfect' => ['es' => 'perfecto', 'de' => 'perfekt', 'ja' => '完璧', 'ko' => '완벽한', 'fr' => 'parfait'],
        'salty' => ['es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠', 'fr' => 'salé'],
        'sweet' => ['es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '단', 'fr' => 'sucré'],
        'spicy' => ['es' => 'picante', 'de' => 'scharf', 'ja' => '辛い', 'ko' => '매운', 'fr' => 'épicé'],
        'taste' => ['es' => 'sabor', 'de' => 'Geschmack', 'ja' => '味', 'ko' => '맛', 'fr' => 'goût'],
        'problem' => ['es' => 'problema', 'de' => 'Problem', 'ja' => '問題', 'ko' => '문제', 'fr' => 'problème'],
        'clean' => ['es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれい', 'ko' => '깨끗한', 'fr' => 'propre'],
        'dirty' => ['es' => 'sucio', 'de' => 'schmutzig', 'ja' => '汚い', 'ko' => '더러운', 'fr' => 'sale'],
        'fresh' => ['es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮', 'ko' => '신선한', 'fr' => 'frais'],

        // --- diet & allergies ---
        'vegetarian' => ['es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자', 'fr' => 'végétarien'],
        'allergic' => ['es' => 'alérgico', 'de' => 'allergisch', 'ja' => 'アレルギーの', 'ko' => '알레르기가 있는', 'fr' => 'allergique'],
        'allergy' => ['es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기', 'fr' => 'allergie'],
        'gluten' => ['es' => 'gluten', 'de' => 'Gluten', 'ja' => 'グルテン', 'ko' => '글루텐', 'fr' => 'gluten'],
        'nuts' => ['es' => 'nueces', 'de' => 'Nüsse', 'ja' => 'ナッツ', 'ko' => '견과류', 'fr' => 'noix'],
        'diet' => ['es' => 'dieta', 'de' => 'Diät', 'ja' => '食事制限', 'ko' => '식단', 'fr' => 'régime'],
        'ingredients' => ['es' => 'ingredientes', 'de' => 'Zutaten', 'ja' => '材料', 'ko' => '재료', 'fr' => 'ingrédients'],
        'to avoid' => ['es' => 'evitar', 'de' => 'vermeiden', 'ja' => '避ける', 'ko' => '피하다', 'fr' => 'éviter'],
        'contains' => ['es' => 'contiene', 'de' => 'enthält', 'ja' => '含む', 'ko' => '들어있다', 'fr' => 'contient'],

        // --- fast food ---
        'takeaway' => ['es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장', 'fr' => 'à emporter'],
        'eat in' => ['es' => 'para tomar aquí', 'de' => 'zum Hieressen', 'ja' => '店内で', 'ko' => '매장에서', 'fr' => 'sur place'],
        'fast' => ['es' => 'rápido', 'de' => 'schnell', 'ja' => '速い', 'ko' => '빠른', 'fr' => 'rapide'],
        'bag' => ['es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투', 'fr' => 'sac'],
        'child' => ['es' => 'niño', 'de' => 'Kind', 'ja' => '子供', 'ko' => '아이', 'fr' => 'enfant'],

        // === Chapter 4: Supermarket ===

        // --- the shop ---
        'supermarket' => ['es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓', 'fr' => 'supermarché'],
        'aisle' => ['es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '진열대', 'fr' => 'rayon'],
        'list' => ['es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록', 'fr' => 'liste'],
        'trolley' => ['es' => 'carrito', 'de' => 'Einkaufswagen', 'ja' => 'カート', 'ko' => '카트', 'fr' => 'chariot'],
        'basket' => ['es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니', 'fr' => 'panier'],
        'checkout' => ['es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대', 'fr' => 'caisse'],
        'cashier' => ['es' => 'cajero', 'de' => 'Kassierer', 'ja' => 'レジ係', 'ko' => '계산원', 'fr' => 'caissier'],
        'queue' => ['es' => 'cola', 'de' => 'Schlange', 'ja' => '列', 'ko' => '줄', 'fr' => 'file'],
        'product' => ['es' => 'producto', 'de' => 'Produkt', 'ja' => '商品', 'ko' => '상품', 'fr' => 'produit'],
        'bakery' => ['es' => 'panadería', 'de' => 'Bäckerei', 'ja' => 'パン屋', 'ko' => '빵집', 'fr' => 'boulangerie'],

        // --- fruit & vegetables ---
        'banana' => ['es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나', 'fr' => 'banane'],
        'orange' => ['es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지', 'fr' => 'orange'],
        'grapes' => ['es' => 'uvas', 'de' => 'Trauben', 'ja' => 'ぶどう', 'ko' => '포도', 'fr' => 'raisin'],
        'carrot' => ['es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근', 'fr' => 'carotte'],
        'tomato' => ['es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토', 'fr' => 'tomate'],
        'potato' => ['es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자', 'fr' => 'pomme de terre'],
        'onion' => ['es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => '玉ねぎ', 'ko' => '양파', 'fr' => 'oignon'],
        'fruits' => ['es' => 'frutas', 'de' => 'Früchte', 'ja' => '果物', 'ko' => '과일', 'fr' => 'fruits'],
        'eggs' => ['es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '계란', 'fr' => 'œufs'],

        // --- quantities & packaging ---
        'kilo' => ['es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로', 'fr' => 'kilo'],
        'gram' => ['es' => 'gramo', 'de' => 'Gramm', 'ja' => 'グラム', 'ko' => '그램', 'fr' => 'gramme'],
        'litre' => ['es' => 'litro', 'de' => 'Liter', 'ja' => 'リットル', 'ko' => '리터', 'fr' => 'litre'],
        'box' => ['es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자', 'fr' => 'boîte'],
        'full' => ['es' => 'lleno', 'de' => 'voll', 'ja' => 'いっぱい', 'ko' => '가득한', 'fr' => 'plein'],
        'empty' => ['es' => 'vacío', 'de' => 'leer', 'ja' => '空', 'ko' => '빈', 'fr' => 'vide'],
        'heavy' => ['es' => 'pesado', 'de' => 'schwer', 'ja' => '重い', 'ko' => '무거운', 'fr' => 'lourd'],
        'light' => ['es' => 'ligero', 'de' => 'leicht', 'ja' => '軽い', 'ko' => '가벼운', 'fr' => 'léger'],
        'scales' => ['es' => 'balanza', 'de' => 'Waage', 'ja' => 'はかり', 'ko' => '저울', 'fr' => 'balance'],
        'to weigh' => ['es' => 'pesar', 'de' => 'wiegen', 'ja' => '量る', 'ko' => '무게를 재다', 'fr' => 'peser'],

        // --- shopping ---
        'to buy' => ['es' => 'comprar', 'de' => 'kaufen', 'ja' => '買う', 'ko' => '사다', 'fr' => 'acheter'],
        'buy' => ['es' => 'comprar', 'de' => 'kaufen', 'ja' => '買う', 'ko' => '사다', 'fr' => 'acheter'],
        'to look for' => ['es' => 'buscar', 'de' => 'suchen', 'ja' => '探す', 'ko' => '찾다', 'fr' => 'chercher'],
        'to find' => ['es' => 'encontrar', 'de' => 'finden', 'ja' => '見つける', 'ko' => '발견하다', 'fr' => 'trouver'],
        'I need' => ['es' => 'necesito', 'de' => 'ich brauche', 'ja' => '必要です', 'ko' => '필요합니다', 'fr' => "j'ai besoin"],
        'to compare' => ['es' => 'comparar', 'de' => 'vergleichen', 'ja' => '比べる', 'ko' => '비교하다', 'fr' => 'comparer'],
        'discount' => ['es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인', 'fr' => 'réduction'],
        'to put' => ['es' => 'poner', 'de' => 'legen', 'ja' => '入れる', 'ko' => '넣다', 'fr' => 'mettre'],
        'to carry' => ['es' => 'llevar', 'de' => 'tragen', 'ja' => '運ぶ', 'ko' => '나르다', 'fr' => 'porter'],
        'enough' => ['es' => 'bastante', 'de' => 'genug', 'ja' => '十分に', 'ko' => '충분히', 'fr' => 'assez'],
        'prices' => ['es' => 'precios', 'de' => 'Preise', 'ja' => '値段', 'ko' => '가격', 'fr' => 'prix'],
        'find' => ['es' => 'encontrar', 'de' => 'finden', 'ja' => '見つける', 'ko' => '발견하다', 'fr' => 'trouver'],
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
