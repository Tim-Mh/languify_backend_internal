<?php

namespace Database\Seeders\Support;

/**
 * French word => its meaning in every native language the app supports.
 *
 * Exercise hints, prompts and word-bank tiles must appear in the LEARNER'S
 * native language, so nothing user-facing may be hardcoded to English. Seeders
 * pull from here and store the result as an ['i18n' => [...]] map, which
 * ExerciseContentService resolves per request.
 *
 * Add a word here once and every unit can use it.
 */
class FrenchVocabulary
{
    private const WORDS = [
        // --- Unit 1: café ---
        'café' => ['en' => 'coffee', 'es' => 'café', 'de' => 'Kaffee', 'ja' => 'コーヒー', 'ko' => '커피'],
        'thé' => ['en' => 'tea', 'es' => 'té', 'de' => 'Tee', 'ja' => 'お茶', 'ko' => '차'],
        'eau' => ['en' => 'water', 'es' => 'agua', 'de' => 'Wasser', 'ja' => '水', 'ko' => '물'],
        'lait' => ['en' => 'milk', 'es' => 'leche', 'de' => 'Milch', 'ja' => '牛乳', 'ko' => '우유'],
        'croissant' => ['en' => 'croissant', 'es' => 'cruasán', 'de' => 'Croissant', 'ja' => 'クロワッサン', 'ko' => '크루아상'],
        'pain' => ['en' => 'bread', 'es' => 'pan', 'de' => 'Brot', 'ja' => 'パン', 'ko' => '빵'],
        'éclair' => ['en' => 'eclair', 'es' => 'éclair', 'de' => 'Éclair', 'ja' => 'エクレア', 'ko' => '에클레어'],
        'sucre' => ['en' => 'sugar', 'es' => 'azúcar', 'de' => 'Zucker', 'ja' => '砂糖', 'ko' => '설탕'],
        'bonjour' => ['en' => 'hello', 'es' => 'hola', 'de' => 'hallo', 'ja' => 'こんにちは', 'ko' => '안녕하세요'],
        'merci' => ['en' => 'thank you', 'es' => 'gracias', 'de' => 'danke', 'ja' => 'ありがとう', 'ko' => '감사합니다'],
        'oui' => ['en' => 'yes', 'es' => 'sí', 'de' => 'ja', 'ja' => 'はい', 'ko' => '네'],
        'non' => ['en' => 'no', 'es' => 'no', 'de' => 'nein', 'ja' => 'いいえ', 'ko' => '아니요'],
        "s'il vous plaît" => ['en' => 'please', 'es' => 'por favor', 'de' => 'bitte', 'ja' => 'お願いします', 'ko' => '부탁합니다'],
        'au revoir' => ['en' => 'goodbye', 'es' => 'adiós', 'de' => 'auf Wiedersehen', 'ja' => 'さようなら', 'ko' => '안녕히 가세요'],
        'madame' => ['en' => 'madam', 'es' => 'señora', 'de' => 'gnädige Frau', 'ja' => 'マダム', 'ko' => '부인'],
        'monsieur' => ['en' => 'sir', 'es' => 'señor', 'de' => 'mein Herr', 'ja' => 'ムッシュ', 'ko' => '선생님'],
        'je voudrais' => ['en' => 'I would like', 'es' => 'quisiera', 'de' => 'ich möchte', 'ja' => 'ください', 'ko' => '주세요'],
        'donnez-moi' => ['en' => 'give me', 'es' => 'deme', 'de' => 'geben Sie mir', 'ja' => 'ください', 'ko' => '주세요'],
        "l'addition" => ['en' => 'the bill', 'es' => 'la cuenta', 'de' => 'die Rechnung', 'ja' => 'お会計', 'ko' => '계산서'],
        'un' => ['en' => 'a', 'es' => 'un', 'de' => 'ein', 'ja' => '一つの', 'ko' => '하나의'],
        'je' => ['en' => 'I', 'es' => 'yo', 'de' => 'ich', 'ja' => '私', 'ko' => '나'],
        'voudrais' => ['en' => 'would like', 'es' => 'quisiera', 'de' => 'möchte', 'ja' => 'ほしい', 'ko' => '원하다'],
        'et' => ['en' => 'and', 'es' => 'y', 'de' => 'und', 'ja' => 'と', 'ko' => '그리고'],
        'avec' => ['en' => 'with', 'es' => 'con', 'de' => 'mit', 'ja' => 'と一緒に', 'ko' => '와 함께'],

        // --- Unit 2: objects, colours, numbers ---
        'livre' => ['en' => 'book', 'es' => 'libro', 'de' => 'Buch', 'ja' => '本', 'ko' => '책'],
        'stylo' => ['en' => 'pen', 'es' => 'bolígrafo', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜'],
        'rouge' => ['en' => 'red', 'es' => 'rojo', 'de' => 'rot', 'ja' => '赤', 'ko' => '빨간색'],
        'bleu' => ['en' => 'blue', 'es' => 'azul', 'de' => 'blau', 'ja' => '青', 'ko' => '파란색'],
        'vert' => ['en' => 'green', 'es' => 'verde', 'de' => 'grün', 'ja' => '緑', 'ko' => '초록색'],
        'jaune' => ['en' => 'yellow', 'es' => 'amarillo', 'de' => 'gelb', 'ja' => '黄色', 'ko' => '노란색'],
        'noir' => ['en' => 'black', 'es' => 'negro', 'de' => 'schwarz', 'ja' => '黒', 'ko' => '검은색'],
        'blanc' => ['en' => 'white', 'es' => 'blanco', 'de' => 'weiß', 'ja' => '白', 'ko' => '하얀색'],
        'zéro' => ['en' => 'zero', 'es' => 'cero', 'de' => 'null', 'ja' => 'ゼロ', 'ko' => '영'],
        'deux' => ['en' => 'two', 'es' => 'dos', 'de' => 'zwei', 'ja' => '二', 'ko' => '둘'],
        'trois' => ['en' => 'three', 'es' => 'tres', 'de' => 'drei', 'ja' => '三', 'ko' => '셋'],
        'quatre' => ['en' => 'four', 'es' => 'cuatro', 'de' => 'vier', 'ja' => '四', 'ko' => '넷'],
        'cinq' => ['en' => 'five', 'es' => 'cinco', 'de' => 'fünf', 'ja' => '五', 'ko' => '다섯'],
        'six' => ['en' => 'six', 'es' => 'seis', 'de' => 'sechs', 'ja' => '六', 'ko' => '여섯'],
        'sept' => ['en' => 'seven', 'es' => 'siete', 'de' => 'sieben', 'ja' => '七', 'ko' => '일곱'],
        'huit' => ['en' => 'eight', 'es' => 'ocho', 'de' => 'acht', 'ja' => '八', 'ko' => '여덟'],
        'neuf' => ['en' => 'nine', 'es' => 'nueve', 'de' => 'neun', 'ja' => '九', 'ko' => '아홉'],
        'dix' => ['en' => 'ten', 'es' => 'diez', 'de' => 'zehn', 'ja' => '十', 'ko' => '열'],

        // --- Unit 3: family and people ---
        'mère' => ['en' => 'mother', 'es' => 'madre', 'de' => 'Mutter', 'ja' => '母', 'ko' => '어머니'],
        'père' => ['en' => 'father', 'es' => 'padre', 'de' => 'Vater', 'ja' => '父', 'ko' => '아버지'],
        'frère' => ['en' => 'brother', 'es' => 'hermano', 'de' => 'Bruder', 'ja' => '兄弟', 'ko' => '형제'],
        'sœur' => ['en' => 'sister', 'es' => 'hermana', 'de' => 'Schwester', 'ja' => '姉妹', 'ko' => '자매'],
        'ami' => ['en' => 'friend', 'es' => 'amigo', 'de' => 'Freund', 'ja' => '友達', 'ko' => '친구'],
        'voisin' => ['en' => 'neighbour', 'es' => 'vecino', 'de' => 'Nachbar', 'ja' => '隣人', 'ko' => '이웃'],
        'professeur' => ['en' => 'teacher', 'es' => 'profesor', 'de' => 'Lehrer', 'ja' => '先生', 'ko' => '선생님'],
        'médecin' => ['en' => 'doctor', 'es' => 'médico', 'de' => 'Arzt', 'ja' => '医者', 'ko' => '의사'],
        'mon' => ['en' => 'my', 'es' => 'mi', 'de' => 'mein', 'ja' => '私の', 'ko' => '나의'],
        'ma' => ['en' => 'my', 'es' => 'mi', 'de' => 'meine', 'ja' => '私の', 'ko' => '나의'],
        "c'est" => ['en' => 'this is', 'es' => 'este es', 'de' => 'das ist', 'ja' => 'これは', 'ko' => '이분은'],
        'aussi' => ['en' => 'also', 'es' => 'también', 'de' => 'auch', 'ja' => 'も', 'ko' => '또한'],
        'il est' => ['en' => 'he is', 'es' => 'él es', 'de' => 'er ist', 'ja' => '彼は', 'ko' => '그는'],
        'elle est' => ['en' => 'she is', 'es' => 'ella es', 'de' => 'sie ist', 'ja' => '彼女は', 'ko' => '그녀는'],
        'qui' => ['en' => 'who', 'es' => 'quién', 'de' => 'wer', 'ja' => '誰', 'ko' => '누구'],
        'très' => ['en' => 'very', 'es' => 'muy', 'de' => 'sehr', 'ja' => 'とても', 'ko' => '매우'],
        'mais' => ['en' => 'but', 'es' => 'pero', 'de' => 'aber', 'ja' => 'しかし', 'ko' => '하지만'],
        'ou' => ['en' => 'or', 'es' => 'o', 'de' => 'oder', 'ja' => 'または', 'ko' => '또는'],

        // --- Unit 4: home and objects ---
        'table' => ['en' => 'table', 'es' => 'mesa', 'de' => 'Tisch', 'ja' => 'テーブル', 'ko' => '탁자'],
        'chaise' => ['en' => 'chair', 'es' => 'silla', 'de' => 'Stuhl', 'ja' => '椅子', 'ko' => '의자'],
        'maison' => ['en' => 'house', 'es' => 'casa', 'de' => 'Haus', 'ja' => '家', 'ko' => '집'],
        'chien' => ['en' => 'dog', 'es' => 'perro', 'de' => 'Hund', 'ja' => '犬', 'ko' => '개'],
        'chat' => ['en' => 'cat', 'es' => 'gato', 'de' => 'Katze', 'ja' => '猫', 'ko' => '고양이'],
        'le' => ['en' => 'the', 'es' => 'el', 'de' => 'der', 'ja' => 'その', 'ko' => '그'],
        'la' => ['en' => 'the', 'es' => 'la', 'de' => 'die', 'ja' => 'その', 'ko' => '그'],
        'dans' => ['en' => 'in', 'es' => 'en', 'de' => 'in', 'ja' => 'の中に', 'ko' => '안에'],
        'sur' => ['en' => 'on', 'es' => 'sobre', 'de' => 'auf', 'ja' => 'の上に', 'ko' => '위에'],
        'sous' => ['en' => 'under', 'es' => 'debajo', 'de' => 'unter', 'ja' => 'の下に', 'ko' => '아래에'],
        "j'ai" => ['en' => 'I have', 'es' => 'tengo', 'de' => 'ich habe', 'ja' => '私は持っている', 'ko' => '나는 가지고 있다'],
        'où' => ['en' => 'where', 'es' => 'dónde', 'de' => 'wo', 'ja' => 'どこ', 'ko' => '어디'],
        'voici' => ['en' => 'here is', 'es' => 'aquí está', 'de' => 'hier ist', 'ja' => 'これが', 'ko' => '여기'],
        'ici' => ['en' => 'here', 'es' => 'aquí', 'de' => 'hier', 'ja' => 'ここ', 'ko' => '여기에'],
        'là' => ['en' => 'there', 'es' => 'allí', 'de' => 'dort', 'ja' => 'そこ', 'ko' => '거기'],
        'est' => ['en' => 'is', 'es' => 'está', 'de' => 'ist', 'ja' => 'です', 'ko' => '이다'],

        // --- Unit 5: days and time ---
        'soleil' => ['en' => 'sun', 'es' => 'sol', 'de' => 'Sonne', 'ja' => '太陽', 'ko' => '태양'],
        'lune' => ['en' => 'moon', 'es' => 'luna', 'de' => 'Mond', 'ja' => '月', 'ko' => '달'],
        'horloge' => ['en' => 'clock', 'es' => 'reloj', 'de' => 'Uhr', 'ja' => '時計', 'ko' => '시계'],
        'calendrier' => ['en' => 'calendar', 'es' => 'calendario', 'de' => 'Kalender', 'ja' => 'カレンダー', 'ko' => '달력'],
        'matin' => ['en' => 'morning', 'es' => 'mañana', 'de' => 'Morgen', 'ja' => '朝', 'ko' => '아침'],
        'soir' => ['en' => 'evening', 'es' => 'tarde', 'de' => 'Abend', 'ja' => '夕方', 'ko' => '저녁'],
        'heure' => ['en' => 'hour', 'es' => 'hora', 'de' => 'Stunde', 'ja' => '時間', 'ko' => '시간'],
        'jour' => ['en' => 'day', 'es' => 'día', 'de' => 'Tag', 'ja' => '日', 'ko' => '날'],
        'lundi' => ['en' => 'Monday', 'es' => 'lunes', 'de' => 'Montag', 'ja' => '月曜日', 'ko' => '월요일'],
        'mardi' => ['en' => 'Tuesday', 'es' => 'martes', 'de' => 'Dienstag', 'ja' => '火曜日', 'ko' => '화요일'],
        "aujourd'hui" => ['en' => 'today', 'es' => 'hoy', 'de' => 'heute', 'ja' => '今日', 'ko' => '오늘'],
        'demain' => ['en' => 'tomorrow', 'es' => 'mañana', 'de' => 'morgen', 'ja' => '明日', 'ko' => '내일'],
        'semaine' => ['en' => 'week', 'es' => 'semana', 'de' => 'Woche', 'ja' => '週', 'ko' => '주'],
        'nuit' => ['en' => 'night', 'es' => 'noche', 'de' => 'Nacht', 'ja' => '夜', 'ko' => '밤'],

        // --- Unit 6: everyday verbs ---
        'manger' => ['en' => 'to eat', 'es' => 'comer', 'de' => 'essen', 'ja' => '食べる', 'ko' => '먹다'],
        'boire' => ['en' => 'to drink', 'es' => 'beber', 'de' => 'trinken', 'ja' => '飲む', 'ko' => '마시다'],
        'marcher' => ['en' => 'to walk', 'es' => 'caminar', 'de' => 'gehen', 'ja' => '歩く', 'ko' => '걷다'],
        'parler' => ['en' => 'to speak', 'es' => 'hablar', 'de' => 'sprechen', 'ja' => '話す', 'ko' => '말하다'],
        'dormir' => ['en' => 'to sleep', 'es' => 'dormir', 'de' => 'schlafen', 'ja' => '寝る', 'ko' => '자다'],
        'tu' => ['en' => 'you', 'es' => 'tú', 'de' => 'du', 'ja' => 'あなた', 'ko' => '너'],
        'nous' => ['en' => 'we', 'es' => 'nosotros', 'de' => 'wir', 'ja' => '私たち', 'ko' => '우리'],
        'beaucoup' => ['en' => 'a lot', 'es' => 'mucho', 'de' => 'viel', 'ja' => 'たくさん', 'ko' => '많이'],
        'toujours' => ['en' => 'always', 'es' => 'siempre', 'de' => 'immer', 'ja' => 'いつも', 'ko' => '항상'],
        'bien' => ['en' => 'well', 'es' => 'bien', 'de' => 'gut', 'ja' => 'よく', 'ko' => '잘'],
        'vite' => ['en' => 'fast', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速く', 'ko' => '빨리'],
        'souvent' => ['en' => 'often', 'es' => 'a menudo', 'de' => 'oft', 'ja' => 'しばしば', 'ko' => '자주'],
        'jamais' => ['en' => 'never', 'es' => 'nunca', 'de' => 'nie', 'ja' => '決して', 'ko' => '결코'],
        'lentement' => ['en' => 'slowly', 'es' => 'despacio', 'de' => 'langsam', 'ja' => 'ゆっくり', 'ko' => '천천히'],
        'maintenant' => ['en' => 'now', 'es' => 'ahora', 'de' => 'jetzt', 'ja' => '今', 'ko' => '지금'],
        'il' => ['en' => 'he', 'es' => 'él', 'de' => 'er', 'ja' => '彼', 'ko' => '그'],
        'elle' => ['en' => 'she', 'es' => 'ella', 'de' => 'sie', 'ja' => '彼女', 'ko' => '그녀'],

        // --- Unit 7: describing things ---
        'grand' => ['en' => 'big', 'es' => 'grande', 'de' => 'groß', 'ja' => '大きい', 'ko' => '큰'],
        'petit' => ['en' => 'small', 'es' => 'pequeño', 'de' => 'klein', 'ja' => '小さい', 'ko' => '작은'],
        'chaud' => ['en' => 'hot', 'es' => 'caliente', 'de' => 'heiß', 'ja' => '熱い', 'ko' => '뜨거운'],
        'froid' => ['en' => 'cold', 'es' => 'frío', 'de' => 'kalt', 'ja' => '冷たい', 'ko' => '차가운'],
        'bon' => ['en' => 'good', 'es' => 'bueno', 'de' => 'gut', 'ja' => '良い', 'ko' => '좋은'],
        'mauvais' => ['en' => 'bad', 'es' => 'malo', 'de' => 'schlecht', 'ja' => '悪い', 'ko' => '나쁜'],
        'nouveau' => ['en' => 'new', 'es' => 'nuevo', 'de' => 'neu', 'ja' => '新しい', 'ko' => '새로운'],
        'vieux' => ['en' => 'old', 'es' => 'viejo', 'de' => 'alt', 'ja' => '古い', 'ko' => '오래된'],
        'beau' => ['en' => 'beautiful', 'es' => 'hermoso', 'de' => 'schön', 'ja' => '美しい', 'ko' => '아름다운'],
        'joli' => ['en' => 'pretty', 'es' => 'bonito', 'de' => 'hübsch', 'ja' => 'かわいい', 'ko' => '예쁜'],
        'facile' => ['en' => 'easy', 'es' => 'fácil', 'de' => 'leicht', 'ja' => '簡単な', 'ko' => '쉬운'],
        'difficile' => ['en' => 'difficult', 'es' => 'difícil', 'de' => 'schwierig', 'ja' => '難しい', 'ko' => '어려운'],
        'assez' => ['en' => 'quite', 'es' => 'bastante', 'de' => 'ziemlich', 'ja' => 'かなり', 'ko' => '꽤'],
        'trop' => ['en' => 'too much', 'es' => 'demasiado', 'de' => 'zu viel', 'ja' => '多すぎる', 'ko' => '너무'],

        // --- Unit 8: places in town ---
        'école' => ['en' => 'school', 'es' => 'escuela', 'de' => 'Schule', 'ja' => '学校', 'ko' => '학교'],
        'magasin' => ['en' => 'shop', 'es' => 'tienda', 'de' => 'Geschäft', 'ja' => '店', 'ko' => '가게'],
        'parc' => ['en' => 'park', 'es' => 'parque', 'de' => 'Park', 'ja' => '公園', 'ko' => '공원'],
        'rue' => ['en' => 'street', 'es' => 'calle', 'de' => 'Straße', 'ja' => '通り', 'ko' => '거리'],
        'gare' => ['en' => 'station', 'es' => 'estación', 'de' => 'Bahnhof', 'ja' => '駅', 'ko' => '역'],
        'ville' => ['en' => 'city', 'es' => 'ciudad', 'de' => 'Stadt', 'ja' => '町', 'ko' => '도시'],
        'village' => ['en' => 'village', 'es' => 'pueblo', 'de' => 'Dorf', 'ja' => '村', 'ko' => '마을'],
        'aller' => ['en' => 'to go', 'es' => 'ir', 'de' => 'gehen', 'ja' => '行く', 'ko' => '가다'],
        'venir' => ['en' => 'to come', 'es' => 'venir', 'de' => 'kommen', 'ja' => '来る', 'ko' => '오다'],
        'loin' => ['en' => 'far', 'es' => 'lejos', 'de' => 'weit', 'ja' => '遠い', 'ko' => '먼'],
        'près' => ['en' => 'near', 'es' => 'cerca', 'de' => 'nah', 'ja' => '近い', 'ko' => '가까운'],
        'gauche' => ['en' => 'left', 'es' => 'izquierda', 'de' => 'links', 'ja' => '左', 'ko' => '왼쪽'],
        'droite' => ['en' => 'right', 'es' => 'derecha', 'de' => 'rechts', 'ja' => '右', 'ko' => '오른쪽'],
        'à' => ['en' => 'to', 'es' => 'a', 'de' => 'zu', 'ja' => 'へ', 'ko' => '에'],
        'ouvert' => ['en' => 'open', 'es' => 'abierto', 'de' => 'offen', 'ja' => '開いている', 'ko' => '열린'],
        'fermé' => ['en' => 'closed', 'es' => 'cerrado', 'de' => 'geschlossen', 'ja' => '閉まっている', 'ko' => '닫힌'],
        'nuage' => ['en' => 'cloud', 'es' => 'nube', 'de' => 'Wolke', 'ja' => '雲', 'ko' => '구름'],
        'ciel' => ['en' => 'sky', 'es' => 'cielo', 'de' => 'Himmel', 'ja' => '空', 'ko' => '하늘'],

        // --- Unit 9: weather and seasons ---
        'pluie' => ['en' => 'rain', 'es' => 'lluvia', 'de' => 'Regen', 'ja' => '雨', 'ko' => '비'],
        'neige' => ['en' => 'snow', 'es' => 'nieve', 'de' => 'Schnee', 'ja' => '雪', 'ko' => '눈'],
        'vent' => ['en' => 'wind', 'es' => 'viento', 'de' => 'Wind', 'ja' => '風', 'ko' => '바람'],
        'printemps' => ['en' => 'spring', 'es' => 'primavera', 'de' => 'Frühling', 'ja' => '春', 'ko' => '봄'],
        'été' => ['en' => 'summer', 'es' => 'verano', 'de' => 'Sommer', 'ja' => '夏', 'ko' => '여름'],
        'automne' => ['en' => 'autumn', 'es' => 'otoño', 'de' => 'Herbst', 'ja' => '秋', 'ko' => '가을'],
        'hiver' => ['en' => 'winter', 'es' => 'invierno', 'de' => 'Winter', 'ja' => '冬', 'ko' => '겨울'],
        'saison' => ['en' => 'season', 'es' => 'estación', 'de' => 'Jahreszeit', 'ja' => '季節', 'ko' => '계절'],
        'mois' => ['en' => 'month', 'es' => 'mes', 'de' => 'Monat', 'ja' => '月', 'ko' => '달'],
        'année' => ['en' => 'year', 'es' => 'año', 'de' => 'Jahr', 'ja' => '年', 'ko' => '년'],
        'temps' => ['en' => 'weather', 'es' => 'tiempo', 'de' => 'Wetter', 'ja' => '天気', 'ko' => '날씨'],
        'parfois' => ['en' => 'sometimes', 'es' => 'a veces', 'de' => 'manchmal', 'ja' => '時々', 'ko' => '가끔'],
        'encore' => ['en' => 'again', 'es' => 'otra vez', 'de' => 'wieder', 'ja' => 'また', 'ko' => '다시'],

        // --- Unit 10: articles and demonstratives ---
        'une' => ['en' => 'a', 'es' => 'una', 'de' => 'eine', 'ja' => '一つの', 'ko' => '하나의'],
        'les' => ['en' => 'the', 'es' => 'los', 'de' => 'die', 'ja' => 'その', 'ko' => '그'],
        'des' => ['en' => 'some', 'es' => 'unos', 'de' => 'einige', 'ja' => 'いくつかの', 'ko' => '몇몇'],
        'ce' => ['en' => 'this', 'es' => 'este', 'de' => 'dieser', 'ja' => 'この', 'ko' => '이'],
        'cette' => ['en' => 'this', 'es' => 'esta', 'de' => 'diese', 'ja' => 'この', 'ko' => '이'],
        'mes' => ['en' => 'my', 'es' => 'mis', 'de' => 'meine', 'ja' => '私の', 'ko' => '나의'],
        'ces' => ['en' => 'these', 'es' => 'estos', 'de' => 'diese', 'ja' => 'これらの', 'ko' => '이'],
        'livres' => ['en' => 'books', 'es' => 'libros', 'de' => 'Bücher', 'ja' => '本', 'ko' => '책들'],
        'stylos' => ['en' => 'pens', 'es' => 'bolígrafos', 'de' => 'Kugelschreiber', 'ja' => 'ペン', 'ko' => '펜들'],

        // --- Chapter 2, Unit 1: introducing yourself ---
        'nom' => ['en' => 'name', 'es' => 'nombre', 'de' => 'Name', 'ja' => '名前', 'ko' => '이름'],
        'âge' => ['en' => 'age', 'es' => 'edad', 'de' => 'Alter', 'ja' => '年齢', 'ko' => '나이'],
        'ans' => ['en' => 'years old', 'es' => 'años', 'de' => 'Jahre alt', 'ja' => '歳', 'ko' => '살'],
        'je suis' => ['en' => 'I am', 'es' => 'soy', 'de' => 'ich bin', 'ja' => 'です', 'ko' => '입니다'],
        'tu es' => ['en' => 'you are', 'es' => 'eres', 'de' => 'du bist', 'ja' => 'です', 'ko' => '입니다'],
        'ton' => ['en' => 'your', 'es' => 'tu', 'de' => 'dein', 'ja' => 'あなたの', 'ko' => '당신의'],
        "j'habite" => ['en' => 'I live', 'es' => 'vivo', 'de' => 'ich wohne', 'ja' => '私は住んでいる', 'ko' => '나는 삽니다'],
        'enchanté' => ['en' => 'nice to meet you', 'es' => 'encantado', 'de' => 'freut mich', 'ja' => 'はじめまして', 'ko' => '반갑습니다'],
        'bienvenue' => ['en' => 'welcome', 'es' => 'bienvenido', 'de' => 'willkommen', 'ja' => 'ようこそ', 'ko' => '환영합니다'],

        // --- Chapter 2, Unit 2: asking questions ---
        'comment' => ['en' => 'how', 'es' => 'cómo', 'de' => 'wie', 'ja' => 'どう', 'ko' => '어떻게'],
        'ça va' => ['en' => 'how is it going', 'es' => 'qué tal', 'de' => 'wie geht es', 'ja' => '元気ですか', 'ko' => '잘 지내요'],
        'quel' => ['en' => 'which', 'es' => 'cuál', 'de' => 'welcher', 'ja' => 'どの', 'ko' => '어떤'],
        'combien' => ['en' => 'how many', 'es' => 'cuántos', 'de' => 'wie viele', 'ja' => 'いくつ', 'ko' => '얼마나'],
        'de' => ['en' => 'of', 'es' => 'de', 'de' => 'von', 'ja' => 'の', 'ko' => '의'],
        'pourquoi' => ['en' => 'why', 'es' => 'por qué', 'de' => 'warum', 'ja' => 'なぜ', 'ko' => '왜'],
        'quand' => ['en' => 'when', 'es' => 'cuándo', 'de' => 'wann', 'ja' => 'いつ', 'ko' => '언제'],
        'peut-être' => ['en' => 'maybe', 'es' => 'quizás', 'de' => 'vielleicht', 'ja' => 'たぶん', 'ko' => '아마도'],
        'bien sûr' => ['en' => 'of course', 'es' => 'por supuesto', 'de' => 'natürlich', 'ja' => 'もちろん', 'ko' => '물론'],

        // --- Chapter 2, Unit 3: making plans ---
        'allons' => ['en' => "let's go", 'es' => 'vamos', 'de' => 'lass uns gehen', 'ja' => '行きましょう', 'ko' => '갑시다'],
        'ensemble' => ['en' => 'together', 'es' => 'juntos', 'de' => 'zusammen', 'ja' => '一緒に', 'ko' => '함께'],
        'bientôt' => ['en' => 'soon', 'es' => 'pronto', 'de' => 'bald', 'ja' => 'すぐに', 'ko' => '곧'],
        'ce soir' => ['en' => 'this evening', 'es' => 'esta tarde', 'de' => 'heute Abend', 'ja' => '今晩', 'ko' => '오늘 저녁'],
        "d'accord" => ['en' => 'okay', 'es' => 'de acuerdo', 'de' => 'einverstanden', 'ja' => 'わかりました', 'ko' => '알겠습니다'],
        'ensuite' => ['en' => 'then', 'es' => 'luego', 'de' => 'dann', 'ja' => 'それから', 'ko' => '그다음에'],
        'plus tard' => ['en' => 'later', 'es' => 'más tarde', 'de' => 'später', 'ja' => '後で', 'ko' => '나중에'],
        'vraiment' => ['en' => 'really', 'es' => 'realmente', 'de' => 'wirklich', 'ja' => '本当に', 'ko' => '정말'],
        'film' => ['en' => 'film', 'es' => 'película', 'de' => 'Film', 'ja' => '映画', 'ko' => '영화'],
        'regarder' => ['en' => 'to watch', 'es' => 'mirar', 'de' => 'schauen', 'ja' => '見る', 'ko' => '보다'],

        // --- Chapter 2, Unit 4: feelings ---
        'content' => ['en' => 'happy', 'es' => 'contento', 'de' => 'zufrieden', 'ja' => '満足した', 'ko' => '만족한'],
        'triste' => ['en' => 'sad', 'es' => 'triste', 'de' => 'traurig', 'ja' => '悲しい', 'ko' => '슬픈'],
        'fatigué' => ['en' => 'tired', 'es' => 'cansado', 'de' => 'müde', 'ja' => '疲れた', 'ko' => '피곤한'],
        'malade' => ['en' => 'sick', 'es' => 'enfermo', 'de' => 'krank', 'ja' => '病気の', 'ko' => '아픈'],
        'heureux' => ['en' => 'glad', 'es' => 'feliz', 'de' => 'glücklich', 'ja' => '嬉しい', 'ko' => '기쁜'],
        'calme' => ['en' => 'calm', 'es' => 'tranquilo', 'de' => 'ruhig', 'ja' => '落ち着いた', 'ko' => '차분한'],
        'un peu' => ['en' => 'a little', 'es' => 'un poco', 'de' => 'ein wenig', 'ja' => '少し', 'ko' => '조금'],
        'parce que' => ['en' => 'because', 'es' => 'porque', 'de' => 'weil', 'ja' => 'なぜなら', 'ko' => '왜냐하면'],

        // --- Chapter 2, Unit 5: talking about the past ---
        // Past forms are taught whole ("j'ai mangé"), not as a conjugation
        // rule — a beginner needs to say it before they can analyse it.
        'hier' => ['en' => 'yesterday', 'es' => 'ayer', 'de' => 'gestern', 'ja' => '昨日', 'ko' => '어제'],
        "j'ai mangé" => ['en' => 'I ate', 'es' => 'comí', 'de' => 'ich habe gegessen', 'ja' => '私は食べた', 'ko' => '나는 먹었다'],
        "j'ai bu" => ['en' => 'I drank', 'es' => 'bebí', 'de' => 'ich habe getrunken', 'ja' => '私は飲んだ', 'ko' => '나는 마셨다'],
        "j'ai vu" => ['en' => 'I saw', 'es' => 'vi', 'de' => 'ich habe gesehen', 'ja' => '私は見た', 'ko' => '나는 보았다'],
        "c'était" => ['en' => 'it was', 'es' => 'era', 'de' => 'es war', 'ja' => 'でした', 'ko' => '였습니다'],
        "j'étais" => ['en' => 'I was', 'es' => 'estaba', 'de' => 'ich war', 'ja' => 'でした', 'ko' => '였습니다'],
        'déjà' => ['en' => 'already', 'es' => 'ya', 'de' => 'schon', 'ja' => 'すでに', 'ko' => '이미'],
        'puis' => ['en' => 'then', 'es' => 'después', 'de' => 'danach', 'ja' => 'それから', 'ko' => '그러고 나서'],

        // --- Chapter 2, Unit 6: future plans ---
        'je vais' => ['en' => 'I am going', 'es' => 'voy', 'de' => 'ich gehe', 'ja' => '私は行く', 'ko' => '나는 간다'],
        'prochain' => ['en' => 'next', 'es' => 'próximo', 'de' => 'nächste', 'ja' => '次の', 'ko' => '다음'],
        'après' => ['en' => 'after', 'es' => 'después de', 'de' => 'nach', 'ja' => '後', 'ko' => '후에'],
        'avant' => ['en' => 'before', 'es' => 'antes de', 'de' => 'vor', 'ja' => '前', 'ko' => '전에'],
        'vouloir' => ['en' => 'to want', 'es' => 'querer', 'de' => 'wollen', 'ja' => '欲しい', 'ko' => '원하다'],
        'pouvoir' => ['en' => 'to be able', 'es' => 'poder', 'de' => 'können', 'ja' => 'できる', 'ko' => '할 수 있다'],
        'prêt' => ['en' => 'ready', 'es' => 'listo', 'de' => 'bereit', 'ja' => '準備ができた', 'ko' => '준비된'],
        'libre' => ['en' => 'free', 'es' => 'libre', 'de' => 'frei', 'ja' => '自由な', 'ko' => '자유로운'],

        // --- Chapter 2, Unit 7: giving directions ---
        'tout droit' => ['en' => 'straight ahead', 'es' => 'todo recto', 'de' => 'geradeaus', 'ja' => 'まっすぐ', 'ko' => '직진'],
        'tourner' => ['en' => 'to turn', 'es' => 'girar', 'de' => 'abbiegen', 'ja' => '曲がる', 'ko' => '돌다'],
        'traverser' => ['en' => 'to cross', 'es' => 'cruzar', 'de' => 'überqueren', 'ja' => '渡る', 'ko' => '건너다'],
        'continuer' => ['en' => 'to continue', 'es' => 'continuar', 'de' => 'weitergehen', 'ja' => '続ける', 'ko' => '계속하다'],
        'devant' => ['en' => 'in front of', 'es' => 'delante de', 'de' => 'vor', 'ja' => '前に', 'ko' => '앞에'],
        'derrière' => ['en' => 'behind', 'es' => 'detrás de', 'de' => 'hinter', 'ja' => '後ろに', 'ko' => '뒤에'],
        'nord' => ['en' => 'north', 'es' => 'norte', 'de' => 'Norden', 'ja' => '北', 'ko' => '북쪽'],
        'sud' => ['en' => 'south', 'es' => 'sur', 'de' => 'Süden', 'ja' => '南', 'ko' => '남쪽'],

        // --- Chapter 2, Unit 8: phone conversations ---
        'allô' => ['en' => 'hello', 'es' => 'aló', 'de' => 'hallo', 'ja' => 'もしもし', 'ko' => '여보세요'],
        'téléphone' => ['en' => 'telephone', 'es' => 'teléfono', 'de' => 'Telefon', 'ja' => '電話', 'ko' => '전화'],
        'appeler' => ['en' => 'to call', 'es' => 'llamar', 'de' => 'anrufen', 'ja' => '電話する', 'ko' => '전화하다'],
        'attendre' => ['en' => 'to wait', 'es' => 'esperar', 'de' => 'warten', 'ja' => '待つ', 'ko' => '기다리다'],
        'message' => ['en' => 'message', 'es' => 'mensaje', 'de' => 'Nachricht', 'ja' => 'メッセージ', 'ko' => '메시지'],
        'rappeler' => ['en' => 'to call back', 'es' => 'volver a llamar', 'de' => 'zurückrufen', 'ja' => '折り返す', 'ko' => '다시 전화하다'],
        'occupé' => ['en' => 'busy', 'es' => 'ocupado', 'de' => 'beschäftigt', 'ja' => '忙しい', 'ko' => '바쁜'],
        'désolé' => ['en' => 'sorry', 'es' => 'lo siento', 'de' => 'entschuldigung', 'ja' => 'ごめんなさい', 'ko' => '미안합니다'],

        // --- Chapter 2, Unit 9: expressing opinions ---
        'je pense' => ['en' => 'I think', 'es' => 'pienso', 'de' => 'ich denke', 'ja' => '私は思う', 'ko' => '나는 생각한다'],
        'je crois' => ['en' => 'I believe', 'es' => 'creo', 'de' => 'ich glaube', 'ja' => '私は信じる', 'ko' => '나는 믿는다'],
        'que' => ['en' => 'that', 'es' => 'que', 'de' => 'dass', 'ja' => 'ということ', 'ko' => '라고'],
        'intéressant' => ['en' => 'interesting', 'es' => 'interesante', 'de' => 'interessant', 'ja' => '面白い', 'ko' => '흥미로운'],
        'important' => ['en' => 'important', 'es' => 'importante', 'de' => 'wichtig', 'ja' => '重要な', 'ko' => '중요한'],
        'vrai' => ['en' => 'true', 'es' => 'verdadero', 'de' => 'wahr', 'ja' => '本当の', 'ko' => '진실한'],
        'faux' => ['en' => 'false', 'es' => 'falso', 'de' => 'falsch', 'ja' => '偽の', 'ko' => '거짓의'],
        'préférer' => ['en' => 'to prefer', 'es' => 'preferir', 'de' => 'bevorzugen', 'ja' => '好む', 'ko' => '선호하다'],
        'meilleur' => ['en' => 'better', 'es' => 'mejor', 'de' => 'besser', 'ja' => 'より良い', 'ko' => '더 좋은'],

        // --- Chapter 2, Unit 10: comparisons and preferences ---
        'plus' => ['en' => 'more', 'es' => 'más', 'de' => 'mehr', 'ja' => 'もっと', 'ko' => '더'],
        'moins' => ['en' => 'less', 'es' => 'menos', 'de' => 'weniger', 'ja' => 'より少ない', 'ko' => '덜'],
        'comme' => ['en' => 'like', 'es' => 'como', 'de' => 'wie', 'ja' => 'のように', 'ko' => '처럼'],
        'même' => ['en' => 'same', 'es' => 'mismo', 'de' => 'gleich', 'ja' => '同じ', 'ko' => '같은'],
        'mieux' => ['en' => 'better', 'es' => 'mejor', 'de' => 'besser', 'ja' => 'もっと良い', 'ko' => '더 잘'],
        'pire' => ['en' => 'worse', 'es' => 'peor', 'de' => 'schlechter', 'ja' => 'より悪い', 'ko' => '더 나쁜'],
        'autant' => ['en' => 'as much', 'es' => 'tanto', 'de' => 'genauso viel', 'ja' => '同じくらい', 'ko' => '그만큼'],
        'surtout' => ['en' => 'especially', 'es' => 'sobre todo', 'de' => 'besonders', 'ja' => '特に', 'ko' => '특히'],
        'chats' => ['en' => 'cats', 'es' => 'gatos', 'de' => 'Katzen', 'ja' => '猫', 'ko' => '고양이들'],
        'chiens' => ['en' => 'dogs', 'es' => 'perros', 'de' => 'Hunde', 'ja' => '犬', 'ko' => '개들'],

        'au' => ['en' => 'to the', 'es' => 'al', 'de' => 'zum', 'ja' => 'に', 'ko' => '에'],
        'aux' => ['en' => 'to the', 'es' => 'a los', 'de' => 'zu den', 'ja' => 'に', 'ko' => '에'],
        'glaçons' => ['en' => 'ice cubes', 'es' => 'hielo', 'de' => 'Eiswürfel', 'ja' => '氷', 'ko' => '얼음'],
        'enfants' => ['en' => 'children', 'es' => 'niños', 'de' => 'Kinder', 'ja' => '子供たち', 'ko' => '아이들'],
        // --- Chapter 3: restaurant — food ---
        'soupe' => ['en' => 'soup', 'es' => 'sopa', 'de' => 'Suppe', 'ja' => 'スープ', 'ko' => '수프'],
        'salade' => ['en' => 'salad', 'es' => 'ensalada', 'de' => 'Salat', 'ja' => 'サラダ', 'ko' => '샐러드'],
        'poulet' => ['en' => 'chicken', 'es' => 'pollo', 'de' => 'Hähnchen', 'ja' => '鶏肉', 'ko' => '닭고기'],
        'poisson' => ['en' => 'fish', 'es' => 'pescado', 'de' => 'Fisch', 'ja' => '魚', 'ko' => '생선'],
        'viande' => ['en' => 'meat', 'es' => 'carne', 'de' => 'Fleisch', 'ja' => '肉', 'ko' => '고기'],
        'riz' => ['en' => 'rice', 'es' => 'arroz', 'de' => 'Reis', 'ja' => 'ご飯', 'ko' => '밥'],
        'fromage' => ['en' => 'cheese', 'es' => 'queso', 'de' => 'Käse', 'ja' => 'チーズ', 'ko' => '치즈'],
        'pomme' => ['en' => 'apple', 'es' => 'manzana', 'de' => 'Apfel', 'ja' => 'りんご', 'ko' => '사과'],
        'gâteau' => ['en' => 'cake', 'es' => 'pastel', 'de' => 'Kuchen', 'ja' => 'ケーキ', 'ko' => '케이크'],
        'glace' => ['en' => 'ice cream', 'es' => 'helado', 'de' => 'Eis', 'ja' => 'アイスクリーム', 'ko' => '아이스크림'],
        'sandwich' => ['en' => 'sandwich', 'es' => 'sándwich', 'de' => 'Sandwich', 'ja' => 'サンドイッチ', 'ko' => '샌드위치'],
        'frites' => ['en' => 'fries', 'es' => 'patatas fritas', 'de' => 'Pommes', 'ja' => 'フライドポテト', 'ko' => '감자튀김'],
        'hamburger' => ['en' => 'burger', 'es' => 'hamburguesa', 'de' => 'Burger', 'ja' => 'ハンバーガー', 'ko' => '햄버거'],
        'jus' => ['en' => 'juice', 'es' => 'zumo', 'de' => 'Saft', 'ja' => 'ジュース', 'ko' => '주스'],
        'vin' => ['en' => 'wine', 'es' => 'vino', 'de' => 'Wein', 'ja' => 'ワイン', 'ko' => '와인'],
        'bière' => ['en' => 'beer', 'es' => 'cerveza', 'de' => 'Bier', 'ja' => 'ビール', 'ko' => '맥주'],
        'chocolat' => ['en' => 'chocolate', 'es' => 'chocolate', 'de' => 'Schokolade', 'ja' => 'チョコレート', 'ko' => '초콜릿'],
        'tarte' => ['en' => 'tart', 'es' => 'tarta', 'de' => 'Torte', 'ja' => 'タルト', 'ko' => '타르트'],
        'crème' => ['en' => 'cream', 'es' => 'nata', 'de' => 'Sahne', 'ja' => 'クリーム', 'ko' => '크림'],
        'vanille' => ['en' => 'vanilla', 'es' => 'vainilla', 'de' => 'Vanille', 'ja' => 'バニラ', 'ko' => '바닐라'],
        'fraise' => ['en' => 'strawberry', 'es' => 'fresa', 'de' => 'Erdbeere', 'ja' => 'いちご', 'ko' => '딸기'],
        'légumes' => ['en' => 'vegetables', 'es' => 'verduras', 'de' => 'Gemüse', 'ja' => '野菜', 'ko' => '채소'],
        'fruit' => ['en' => 'fruit', 'es' => 'fruta', 'de' => 'Obst', 'ja' => '果物', 'ko' => '과일'],
        'œuf' => ['en' => 'egg', 'es' => 'huevo', 'de' => 'Ei', 'ja' => '卵', 'ko' => '계란'],
        'sel' => ['en' => 'salt', 'es' => 'sal', 'de' => 'Salz', 'ja' => '塩', 'ko' => '소금'],
        'poivre' => ['en' => 'pepper', 'es' => 'pimienta', 'de' => 'Pfeffer', 'ja' => 'こしょう', 'ko' => '후추'],
        'beurre' => ['en' => 'butter', 'es' => 'mantequilla', 'de' => 'Butter', 'ja' => 'バター', 'ko' => '버터'],

        // --- Chapter 3: restaurant — table and tableware ---
        'assiette' => ['en' => 'plate', 'es' => 'plato', 'de' => 'Teller', 'ja' => 'お皿', 'ko' => '접시'],
        'fourchette' => ['en' => 'fork', 'es' => 'tenedor', 'de' => 'Gabel', 'ja' => 'フォーク', 'ko' => '포크'],
        'couteau' => ['en' => 'knife', 'es' => 'cuchillo', 'de' => 'Messer', 'ja' => 'ナイフ', 'ko' => '나이프'],
        'cuillère' => ['en' => 'spoon', 'es' => 'cuchara', 'de' => 'Löffel', 'ja' => 'スプーン', 'ko' => '숟가락'],
        'verre' => ['en' => 'glass', 'es' => 'vaso', 'de' => 'Glas', 'ja' => 'グラス', 'ko' => '유리잔'],
        'bouteille' => ['en' => 'bottle', 'es' => 'botella', 'de' => 'Flasche', 'ja' => 'ボトル', 'ko' => '병'],
        'serviette' => ['en' => 'napkin', 'es' => 'servilleta', 'de' => 'Serviette', 'ja' => 'ナプキン', 'ko' => '냅킨'],
        'nappe' => ['en' => 'tablecloth', 'es' => 'mantel', 'de' => 'Tischdecke', 'ja' => 'テーブルクロス', 'ko' => '식탁보'],
        'menu' => ['en' => 'menu', 'es' => 'menú', 'de' => 'Menü', 'ja' => 'メニュー', 'ko' => '메뉴'],
        'carte' => ['en' => 'menu card', 'es' => 'carta', 'de' => 'Speisekarte', 'ja' => 'メニュー表', 'ko' => '메뉴판'],
        'serveur' => ['en' => 'waiter', 'es' => 'camarero', 'de' => 'Kellner', 'ja' => 'ウェイター', 'ko' => '웨이터'],
        'cuisine' => ['en' => 'kitchen', 'es' => 'cocina', 'de' => 'Küche', 'ja' => '厨房', 'ko' => '주방'],
        'restaurant' => ['en' => 'restaurant', 'es' => 'restaurante', 'de' => 'Restaurant', 'ja' => 'レストラン', 'ko' => '식당'],

        // --- Chapter 3: restaurant — ordering ---
        'commander' => ['en' => 'to order', 'es' => 'pedir', 'de' => 'bestellen', 'ja' => '注文する', 'ko' => '주문하다'],
        'commande' => ['en' => 'order', 'es' => 'pedido', 'de' => 'Bestellung', 'ja' => '注文', 'ko' => '주문'],
        'prendre' => ['en' => 'to have', 'es' => 'tomar', 'de' => 'nehmen', 'ja' => '取る', 'ko' => '먹다'],
        'je prends' => ['en' => "I'll have", 'es' => 'tomo', 'de' => 'ich nehme', 'ja' => 'にします', 'ko' => '하겠습니다'],
        'plat' => ['en' => 'dish', 'es' => 'plato', 'de' => 'Gericht', 'ja' => '料理', 'ko' => '요리'],
        'entrée' => ['en' => 'starter', 'es' => 'entrante', 'de' => 'Vorspeise', 'ja' => '前菜', 'ko' => '전채'],
        'dessert' => ['en' => 'dessert', 'es' => 'postre', 'de' => 'Nachtisch', 'ja' => 'デザート', 'ko' => '디저트'],
        'boisson' => ['en' => 'drink', 'es' => 'bebida', 'de' => 'Getränk', 'ja' => '飲み物', 'ko' => '음료'],
        'part' => ['en' => 'slice', 'es' => 'trozo', 'de' => 'Stück', 'ja' => '一切れ', 'ko' => '한 조각'],
        'partager' => ['en' => 'to share', 'es' => 'compartir', 'de' => 'teilen', 'ja' => '分ける', 'ko' => '나누다'],
        'choisir' => ['en' => 'to choose', 'es' => 'elegir', 'de' => 'wählen', 'ja' => '選ぶ', 'ko' => '고르다'],
        'apporter' => ['en' => 'to bring', 'es' => 'traer', 'de' => 'bringen', 'ja' => '持ってくる', 'ko' => '가져오다'],
        'apportez-moi' => ['en' => 'bring me', 'es' => 'tráigame', 'de' => 'bringen Sie mir', 'ja' => '持ってきてください', 'ko' => '가져다주세요'],
        'pouvez-vous' => ['en' => 'can you', 'es' => 'puede usted', 'de' => 'können Sie', 'ja' => 'できますか', 'ko' => '주시겠어요'],
        'je peux' => ['en' => 'I can', 'es' => 'puedo', 'de' => 'ich kann', 'ja' => '私はできる', 'ko' => '저는 할 수 있습니다'],
        'excusez-moi' => ['en' => 'excuse me', 'es' => 'disculpe', 'de' => 'entschuldigen Sie', 'ja' => 'すみません', 'ko' => '실례합니다'],
        'pour' => ['en' => 'for', 'es' => 'para', 'de' => 'für', 'ja' => 'のために', 'ko' => '위해'],
        'pour moi' => ['en' => 'for me', 'es' => 'para mí', 'de' => 'für mich', 'ja' => '私に', 'ko' => '저에게'],
        'sans' => ['en' => 'without', 'es' => 'sin', 'de' => 'ohne', 'ja' => 'なし', 'ko' => '없이'],
        'du' => ['en' => 'some', 'es' => 'algo de', 'de' => 'etwas', 'ja' => '少しの', 'ko' => '약간의'],
        'moi' => ['en' => 'me', 'es' => 'mí', 'de' => 'mich', 'ja' => '私', 'ko' => '저'],
        'chaque' => ['en' => 'each', 'es' => 'cada', 'de' => 'jeder', 'ja' => 'それぞれの', 'ko' => '각각의'],
        'faim' => ['en' => 'hunger', 'es' => 'hambre', 'de' => 'Hunger', 'ja' => '空腹', 'ko' => '배고픔'],
        'soif' => ['en' => 'thirst', 'es' => 'sed', 'de' => 'Durst', 'ja' => 'のどの渇き', 'ko' => '갈증'],

        // --- Chapter 3: restaurant — money ---
        'prix' => ['en' => 'price', 'es' => 'precio', 'de' => 'Preis', 'ja' => '値段', 'ko' => '가격'],
        'argent' => ['en' => 'money', 'es' => 'dinero', 'de' => 'Geld', 'ja' => 'お金', 'ko' => '돈'],
        'euros' => ['en' => 'euros', 'es' => 'euros', 'de' => 'Euro', 'ja' => 'ユーロ', 'ko' => '유로'],
        'cher' => ['en' => 'expensive', 'es' => 'caro', 'de' => 'teuer', 'ja' => '高い', 'ko' => '비싼'],
        'coûte' => ['en' => 'costs', 'es' => 'cuesta', 'de' => 'kostet', 'ja' => 'かかります', 'ko' => '입니다'],
        'total' => ['en' => 'total', 'es' => 'total', 'de' => 'Gesamt', 'ja' => '合計', 'ko' => '총액'],
        'addition' => ['en' => 'bill', 'es' => 'cuenta', 'de' => 'Rechnung', 'ja' => 'お会計', 'ko' => '계산서'],
        'payer' => ['en' => 'to pay', 'es' => 'pagar', 'de' => 'bezahlen', 'ja' => '払う', 'ko' => '지불하다'],
        'je paie' => ['en' => 'I pay', 'es' => 'pago', 'de' => 'ich bezahle', 'ja' => '私が払う', 'ko' => '제가 냅니다'],
        'monnaie' => ['en' => 'change', 'es' => 'cambio', 'de' => 'Wechselgeld', 'ja' => 'おつり', 'ko' => '거스름돈'],
        'espèces' => ['en' => 'cash', 'es' => 'efectivo', 'de' => 'Bargeld', 'ja' => '現金', 'ko' => '현금'],
        'en espèces' => ['en' => 'in cash', 'es' => 'en efectivo', 'de' => 'in bar', 'ja' => '現金で', 'ko' => '현금으로'],
        'pourboire' => ['en' => 'tip', 'es' => 'propina', 'de' => 'Trinkgeld', 'ja' => 'チップ', 'ko' => '팁'],
        'reçu' => ['en' => 'receipt', 'es' => 'recibo', 'de' => 'Quittung', 'ja' => 'レシート', 'ko' => '영수증'],
        'séparément' => ['en' => 'separately', 'es' => 'por separado', 'de' => 'getrennt', 'ja' => '別々に', 'ko' => '따로'],

        // --- Chapter 3: restaurant — reservations ---
        'réserver' => ['en' => 'to book', 'es' => 'reservar', 'de' => 'reservieren', 'ja' => '予約する', 'ko' => '예약하다'],
        'réservation' => ['en' => 'booking', 'es' => 'reserva', 'de' => 'Reservierung', 'ja' => '予約', 'ko' => '예약'],
        'personnes' => ['en' => 'people', 'es' => 'personas', 'de' => 'Personen', 'ja' => '人', 'ko' => '명'],
        'place' => ['en' => 'seat', 'es' => 'sitio', 'de' => 'Platz', 'ja' => '席', 'ko' => '자리'],
        'annuler' => ['en' => 'to cancel', 'es' => 'cancelar', 'de' => 'stornieren', 'ja' => 'キャンセルする', 'ko' => '취소하다'],
        'confirmer' => ['en' => 'to confirm', 'es' => 'confirmar', 'de' => 'bestätigen', 'ja' => '確認する', 'ko' => '확인하다'],
        'midi' => ['en' => 'noon', 'es' => 'mediodía', 'de' => 'Mittag', 'ja' => '正午', 'ko' => '정오'],
        'heures' => ['en' => "o'clock", 'es' => 'en punto', 'de' => 'Uhr', 'ja' => '時', 'ko' => '시'],

        // --- Chapter 3: restaurant — taste and complaints ---
        'délicieux' => ['en' => 'delicious', 'es' => 'delicioso', 'de' => 'köstlich', 'ja' => 'おいしい', 'ko' => '맛있는'],
        'excellent' => ['en' => 'excellent', 'es' => 'excelente', 'de' => 'ausgezeichnet', 'ja' => '素晴らしい', 'ko' => '훌륭한'],
        'parfait' => ['en' => 'perfect', 'es' => 'perfecto', 'de' => 'perfekt', 'ja' => '完璧', 'ko' => '완벽한'],
        'salé' => ['en' => 'salty', 'es' => 'salado', 'de' => 'salzig', 'ja' => 'しょっぱい', 'ko' => '짠'],
        'sucré' => ['en' => 'sweet', 'es' => 'dulce', 'de' => 'süß', 'ja' => '甘い', 'ko' => '단'],
        'épicé' => ['en' => 'spicy', 'es' => 'picante', 'de' => 'scharf', 'ja' => '辛い', 'ko' => '매운'],
        'cuit' => ['en' => 'cooked', 'es' => 'cocido', 'de' => 'gegart', 'ja' => '火が通った', 'ko' => '익힌'],
        'goût' => ['en' => 'taste', 'es' => 'sabor', 'de' => 'Geschmack', 'ja' => '味', 'ko' => '맛'],
        'problème' => ['en' => 'problem', 'es' => 'problema', 'de' => 'Problem', 'ja' => '問題', 'ko' => '문제'],
        'propre' => ['en' => 'clean', 'es' => 'limpio', 'de' => 'sauber', 'ja' => 'きれい', 'ko' => '깨끗한'],
        'sale' => ['en' => 'dirty', 'es' => 'sucio', 'de' => 'schmutzig', 'ja' => '汚い', 'ko' => '더러운'],
        'frais' => ['en' => 'fresh', 'es' => 'fresco', 'de' => 'frisch', 'ja' => '新鮮', 'ko' => '신선한'],

        // --- Chapter 3: restaurant — diet and allergies ---
        'végétarien' => ['en' => 'vegetarian', 'es' => 'vegetariano', 'de' => 'vegetarisch', 'ja' => 'ベジタリアン', 'ko' => '채식주의자'],
        'allergique' => ['en' => 'allergic', 'es' => 'alérgico', 'de' => 'allergisch', 'ja' => 'アレルギーの', 'ko' => '알레르기가 있는'],
        'allergie' => ['en' => 'allergy', 'es' => 'alergia', 'de' => 'Allergie', 'ja' => 'アレルギー', 'ko' => '알레르기'],
        'gluten' => ['en' => 'gluten', 'es' => 'gluten', 'de' => 'Gluten', 'ja' => 'グルテン', 'ko' => '글루텐'],
        'noix' => ['en' => 'nuts', 'es' => 'nueces', 'de' => 'Nüsse', 'ja' => 'ナッツ', 'ko' => '견과류'],
        'régime' => ['en' => 'diet', 'es' => 'dieta', 'de' => 'Diät', 'ja' => '食事制限', 'ko' => '식단'],
        'ingrédients' => ['en' => 'ingredients', 'es' => 'ingredientes', 'de' => 'Zutaten', 'ja' => '材料', 'ko' => '재료'],
        'lactose' => ['en' => 'lactose', 'es' => 'lactosa', 'de' => 'Laktose', 'ja' => '乳糖', 'ko' => '유당'],
        'éviter' => ['en' => 'to avoid', 'es' => 'evitar', 'de' => 'vermeiden', 'ja' => '避ける', 'ko' => '피하다'],
        'contient' => ['en' => 'contains', 'es' => 'contiene', 'de' => 'enthält', 'ja' => '含む', 'ko' => '들어있다'],

        // --- Chapter 3: restaurant — fast food ---
        'emporter' => ['en' => 'to take away', 'es' => 'para llevar', 'de' => 'zum Mitnehmen', 'ja' => '持ち帰り', 'ko' => '포장'],
        'sur place' => ['en' => 'eat in', 'es' => 'para tomar aquí', 'de' => 'zum Hieressen', 'ja' => '店内で', 'ko' => '매장에서'],
        'minutes' => ['en' => 'minutes', 'es' => 'minutos', 'de' => 'Minuten', 'ja' => '分', 'ko' => '분'],
        'rapide' => ['en' => 'fast', 'es' => 'rápido', 'de' => 'schnell', 'ja' => '速い', 'ko' => '빠른'],
        'sac' => ['en' => 'bag', 'es' => 'bolsa', 'de' => 'Tüte', 'ja' => '袋', 'ko' => '봉투'],
        'enfant' => ['en' => 'child', 'es' => 'niño', 'de' => 'Kind', 'ja' => '子供', 'ko' => '아이'],

        // --- Chapter 4: supermarket — the shop itself ---
        "d'argent" => ['en' => 'of money', 'es' => 'de dinero', 'de' => 'Geld', 'ja' => 'お金の', 'ko' => '돈의'],
        "d'eau" => ['en' => 'of water', 'es' => 'de agua', 'de' => 'Wasser', 'ja' => '水の', 'ko' => '물의'],
        'supermarché' => ['en' => 'supermarket', 'es' => 'supermercado', 'de' => 'Supermarkt', 'ja' => 'スーパー', 'ko' => '슈퍼마켓'],
        'rayon' => ['en' => 'aisle', 'es' => 'pasillo', 'de' => 'Regal', 'ja' => '売り場', 'ko' => '진열대'],
        'liste' => ['en' => 'list', 'es' => 'lista', 'de' => 'Liste', 'ja' => 'リスト', 'ko' => '목록'],
        'chariot' => ['en' => 'trolley', 'es' => 'carrito', 'de' => 'Einkaufswagen', 'ja' => 'カート', 'ko' => '카트'],
        'panier' => ['en' => 'basket', 'es' => 'cesta', 'de' => 'Korb', 'ja' => 'かご', 'ko' => '바구니'],
        'caisse' => ['en' => 'checkout', 'es' => 'caja', 'de' => 'Kasse', 'ja' => 'レジ', 'ko' => '계산대'],
        'carte bancaire' => ['en' => 'bank card', 'es' => 'tarjeta', 'de' => 'Bankkarte', 'ja' => 'カード', 'ko' => '카드'],
        'longue' => ['en' => 'long', 'es' => 'larga', 'de' => 'lang', 'ja' => '長い', 'ko' => '긴'],
        'caissier' => ['en' => 'cashier', 'es' => 'cajero', 'de' => 'Kassierer', 'ja' => 'レジ係', 'ko' => '계산원'],
        'file' => ['en' => 'queue', 'es' => 'cola', 'de' => 'Schlange', 'ja' => '列', 'ko' => '줄'],
        'produit' => ['en' => 'product', 'es' => 'producto', 'de' => 'Produkt', 'ja' => '商品', 'ko' => '상품'],

        // --- Chapter 4: supermarket — fruit and vegetables ---
        'banane' => ['en' => 'banana', 'es' => 'plátano', 'de' => 'Banane', 'ja' => 'バナナ', 'ko' => '바나나'],
        'orange' => ['en' => 'orange', 'es' => 'naranja', 'de' => 'Orange', 'ja' => 'オレンジ', 'ko' => '오렌지'],
        'raisin' => ['en' => 'grapes', 'es' => 'uvas', 'de' => 'Trauben', 'ja' => 'ぶどう', 'ko' => '포도'],
        'carotte' => ['en' => 'carrot', 'es' => 'zanahoria', 'de' => 'Karotte', 'ja' => 'にんじん', 'ko' => '당근'],
        'tomate' => ['en' => 'tomato', 'es' => 'tomate', 'de' => 'Tomate', 'ja' => 'トマト', 'ko' => '토마토'],
        'pomme de terre' => ['en' => 'potato', 'es' => 'patata', 'de' => 'Kartoffel', 'ja' => 'じゃがいも', 'ko' => '감자'],
        'oignon' => ['en' => 'onion', 'es' => 'cebolla', 'de' => 'Zwiebel', 'ja' => '玉ねぎ', 'ko' => '양파'],
        'œufs' => ['en' => 'eggs', 'es' => 'huevos', 'de' => 'Eier', 'ja' => '卵', 'ko' => '계란'],
        'fruits' => ['en' => 'fruits', 'es' => 'frutas', 'de' => 'Früchte', 'ja' => '果物', 'ko' => '과일'],

        // --- Chapter 4: supermarket — quantities ---
        'kilo' => ['en' => 'kilo', 'es' => 'kilo', 'de' => 'Kilo', 'ja' => 'キロ', 'ko' => '킬로'],
        'gramme' => ['en' => 'gram', 'es' => 'gramo', 'de' => 'Gramm', 'ja' => 'グラム', 'ko' => '그램'],
        'litre' => ['en' => 'litre', 'es' => 'litro', 'de' => 'Liter', 'ja' => 'リットル', 'ko' => '리터'],
        'boîte' => ['en' => 'box', 'es' => 'caja', 'de' => 'Schachtel', 'ja' => '箱', 'ko' => '상자'],
        'plein' => ['en' => 'full', 'es' => 'lleno', 'de' => 'voll', 'ja' => 'いっぱい', 'ko' => '가득한'],
        'vide' => ['en' => 'empty', 'es' => 'vacío', 'de' => 'leer', 'ja' => '空', 'ko' => '빈'],
        'lourd' => ['en' => 'heavy', 'es' => 'pesado', 'de' => 'schwer', 'ja' => '重い', 'ko' => '무거운'],
        'léger' => ['en' => 'light', 'es' => 'ligero', 'de' => 'leicht', 'ja' => '軽い', 'ko' => '가벼운'],

        // --- Chapter 4: supermarket — shopping ---
        'acheter' => ['en' => 'to buy', 'es' => 'comprar', 'de' => 'kaufen', 'ja' => '買う', 'ko' => '사다'],
        'chercher' => ['en' => 'to look for', 'es' => 'buscar', 'de' => 'suchen', 'ja' => '探す', 'ko' => '찾다'],
        'trouver' => ['en' => 'to find', 'es' => 'encontrar', 'de' => 'finden', 'ja' => '見つける', 'ko' => '발견하다'],
        'besoin' => ['en' => 'need', 'es' => 'necesidad', 'de' => 'Bedarf', 'ja' => '必要', 'ko' => '필요'],
        'comparer' => ['en' => 'to compare', 'es' => 'comparar', 'de' => 'vergleichen', 'ja' => '比べる', 'ko' => '비교하다'],
        'bon marché' => ['en' => 'cheap', 'es' => 'barato', 'de' => 'billig', 'ja' => '安い', 'ko' => '싼'],
        'réduction' => ['en' => 'discount', 'es' => 'descuento', 'de' => 'Rabatt', 'ja' => '割引', 'ko' => '할인'],
        'mettre' => ['en' => 'to put', 'es' => 'poner', 'de' => 'legen', 'ja' => '入れる', 'ko' => '넣다'],
        'peser' => ['en' => 'to weigh', 'es' => 'pesar', 'de' => 'wiegen', 'ja' => '量る', 'ko' => '무게를 재다'],
        'balance' => ['en' => 'scales', 'es' => 'balanza', 'de' => 'Waage', 'ja' => 'はかり', 'ko' => '저울'],
        'gratuit' => ['en' => 'free', 'es' => 'gratis', 'de' => 'kostenlos', 'ja' => '無料', 'ko' => '무료'],
        'boulangerie' => ['en' => 'bakery', 'es' => 'panadería', 'de' => 'Bäckerei', 'ja' => 'パン屋', 'ko' => '빵집'],
        'demander' => ['en' => 'to ask', 'es' => 'preguntar', 'de' => 'fragen', 'ja' => '尋ねる', 'ko' => '묻다'],
        'donner' => ['en' => 'to give', 'es' => 'dar', 'de' => 'geben', 'ja' => '与える', 'ko' => '주다'],
        'porter' => ['en' => 'to carry', 'es' => 'llevar', 'de' => 'tragen', 'ja' => '運ぶ', 'ko' => '나르다'],
    ];

    /**
     * The ['i18n' => [...]] map for a French word, ready to store in exercise
     * data. Falls back to the word itself if it isn't in the dictionary yet.
     *
     * @return array{i18n: array<string, string>}
     */
    public static function hint(string $french): array
    {
        return ['i18n' => self::meanings($french)];
    }

    /**
     * @return array<string, string>
     */
    public static function meanings(string $french): array
    {
        $key = mb_strtolower(trim($french));

        return self::WORDS[$key] ?? ['en' => $french];
    }

    /** Every French word the dictionary knows (used for wrong-answer options). */
    public static function all(): array
    {
        return array_keys(self::WORDS);
    }

    public static function knows(string $french): bool
    {
        return isset(self::WORDS[mb_strtolower(trim($french))]);
    }
}
