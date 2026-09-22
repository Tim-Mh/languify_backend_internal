<?php

namespace Database\Seeders;

use App\Models\AlphabetLetter;
use App\Models\Language;
use Illuminate\Database\Seeder;

class AlphabetLettersSeeder extends Seeder
{
    /**
     * Seeds the full native-script alphabet/character set for every learning
     * language. Latin-script languages get their letters (plus any
     * language-specific extra characters, e.g. German's umlauts/eszett,
     * Spanish's Ñ) with the letter's own spoken NAME as the "romanization"
     * (e.g. Spanish B -> "beh"), not just the lowercase form — that's what's
     * shown under each tile. Japanese/Korean are ordered alphabetically by
     * their romanized reading (rather than native gojūon/Hangul-chart order)
     * so they browse the same "A, B, C..." way as the Latin-script courses;
     * their existing romanization already doubles as the pronunciation guide.
     */
    public function run(): void
    {
        $this->seedLanguage('en', $this->englishLetters());
        $this->seedLanguage('es', $this->spanishLetters());
        $this->seedLanguage('fr', $this->frenchLetters());
        $this->seedLanguage('de', $this->germanLetters());
        $this->seedLanguage('ja', $this->japaneseLetters());
        $this->seedLanguage('ko', $this->koreanLetters());
    }

    private function seedLanguage(string $code, array $letters): void
    {
        $language = Language::where('code', $code)->first();

        if (! $language) {
            return;
        }

        AlphabetLetter::where('language_id', $language->id)->delete();

        foreach ($letters as $index => $letter) {
            AlphabetLetter::create([
                'language_id' => $language->id,
                'character' => $letter['character'],
                'romanization' => $letter['romanization'] ?? null,
                'example_word' => $letter['example_word'] ?? null,
                'script_group' => $letter['script_group'] ?? null,
                'order_number' => $index + 1,
            ]);
        }
    }

    private function latinAlphabet(array $pronunciations, array $exampleWords): array
    {
        $letters = range('A', 'Z');

        return array_map(fn ($letter, $pronunciation, $word) => [
            'character' => $letter,
            'romanization' => $pronunciation,
            'example_word' => $word,
        ], $letters, $pronunciations, $exampleWords);
    }

    private function englishLetters(): array
    {
        return $this->latinAlphabet(
            ['ay', 'bee', 'see', 'dee', 'ee', 'ef', 'jee', 'aitch', 'eye', 'jay', 'kay', 'el', 'em',
                'en', 'oh', 'pee', 'kyoo', 'ar', 'ess', 'tee', 'yoo', 'vee', 'double-u', 'ex', 'why', 'zee'],
            ['Apple', 'Banana', 'Cat', 'Dog', 'Elephant', 'Fish', 'Grape', 'Hat', 'Ice cream',
                'Juice', 'Kite', 'Lion', 'Moon', 'Nest', 'Orange', 'Pencil', 'Queen', 'Rain', 'Sun',
                'Tree', 'Umbrella', 'Van', 'Water', 'Xylophone', 'Yellow', 'Zebra'],
        );
    }

    private function spanishLetters(): array
    {
        $letters = $this->latinAlphabet(
            ['ah', 'beh', 'seh', 'deh', 'eh', 'EH-feh', 'heh', 'AH-cheh', 'ee', 'HOH-tah', 'kah', 'EH-leh',
                'EH-meh', 'EH-neh', 'oh', 'peh', 'koo', 'EH-rreh', 'EH-seh', 'teh', 'oo', 'OO-veh',
                'OO-veh DOH-bleh', 'EH-kees', 'yeh', 'SEH-tah'],
            ['Ala', 'Barco', 'Casa', 'Dado', 'Elefante', 'Foca', 'Gato', 'Hoja', 'Iglú',
                'Jirafa', 'Kilo', 'León', 'Mano', 'Nube', 'Oso', 'Perro', 'Queso', 'Ratón',
                'Sol', 'Taza', 'Uva', 'Vaca', 'Wifi', 'Xilófono', 'Yate', 'Zapato'],
        );

        array_splice($letters, 14, 0, [[
            'character' => 'Ñ', 'romanization' => 'EH-nyeh', 'example_word' => 'Ñandú',
        ]]);

        return $letters;
    }

    private function frenchLetters(): array
    {
        return $this->latinAlphabet(
            ['ah', 'beh', 'seh', 'deh', 'euh', 'ef', 'zheh', 'ahsh', 'ee', 'zhee', 'kah', 'el', 'em',
                'en', 'oh', 'peh', 'kew', 'air', 'ess', 'teh', 'ew', 'veh', 'doo-bluh-veh', 'eeks', 'ee-grek', 'zed'],
            ['Avion', 'Ballon', 'Chat', 'Dé', 'École', 'Fleur', 'Girafe', 'Hibou', 'Île',
                'Jardin', 'Koala', 'Lune', 'Maison', 'Nuage', 'Orange', 'Papillon', 'Quatre',
                'Rat', 'Soleil', 'Tortue', 'Uniforme', 'Vache', 'Wagon', 'Xylophone', 'Yaourt', 'Zèbre'],
        );
    }

    private function germanLetters(): array
    {
        $letters = $this->latinAlphabet(
            ['ah', 'beh', 'tseh', 'deh', 'eh', 'ef', 'geh', 'hah', 'ee', 'yot', 'kah', 'el', 'em',
                'en', 'oh', 'peh', 'koo', 'er', 'es', 'teh', 'oo', 'fow', 'veh', 'iks', 'EWP-si-lon', 'tset'],
            ['Apfel', 'Ball', 'Clown', 'Dach', 'Elefant', 'Fisch', 'Gans', 'Hut', 'Insel',
                'Jacke', 'Katze', 'Löwe', 'Maus', 'Nase', 'Ohr', 'Pilz', 'Qualle', 'Regen',
                'Sonne', 'Tisch', 'Uhr', 'Vogel', 'Wasser', 'Xylophon', 'Yoga', 'Zebra'],
        );

        return [
            ...$letters,
            ['character' => 'Ä', 'romanization' => 'eh', 'example_word' => 'Ähre'],
            ['character' => 'Ö', 'romanization' => 'ur', 'example_word' => 'Öl'],
            ['character' => 'Ü', 'romanization' => 'ew', 'example_word' => 'Übung'],
            ['character' => 'ß', 'romanization' => 'es-tset', 'example_word' => 'Straße'],
        ];
    }

    private function japaneseLetters(): array
    {
        // Same 46 gojūon pairs as before, reordered alphabetically by romaji
        // (a, chi, e, fu, ha, he, hi, ho, i, ka, ...) instead of the
        // traditional a-i-u-e-o chart order.
        $gojuonAlphabetical = [
            ['あ', 'ア', 'a'], ['ち', 'チ', 'chi'], ['え', 'エ', 'e'], ['ふ', 'フ', 'fu'],
            ['は', 'ハ', 'ha'], ['へ', 'ヘ', 'he'], ['ひ', 'ヒ', 'hi'], ['ほ', 'ホ', 'ho'],
            ['い', 'イ', 'i'], ['か', 'カ', 'ka'], ['け', 'ケ', 'ke'], ['き', 'キ', 'ki'],
            ['こ', 'コ', 'ko'], ['く', 'ク', 'ku'], ['ま', 'マ', 'ma'], ['め', 'メ', 'me'],
            ['み', 'ミ', 'mi'], ['も', 'モ', 'mo'], ['む', 'ム', 'mu'], ['ん', 'ン', 'n'],
            ['な', 'ナ', 'na'], ['ね', 'ネ', 'ne'], ['に', 'ニ', 'ni'], ['の', 'ノ', 'no'],
            ['ぬ', 'ヌ', 'nu'], ['お', 'オ', 'o'], ['ら', 'ラ', 'ra'], ['れ', 'レ', 're'],
            ['り', 'リ', 'ri'], ['ろ', 'ロ', 'ro'], ['る', 'ル', 'ru'], ['さ', 'サ', 'sa'],
            ['せ', 'セ', 'se'], ['し', 'シ', 'shi'], ['そ', 'ソ', 'so'], ['す', 'ス', 'su'],
            ['た', 'タ', 'ta'], ['て', 'テ', 'te'], ['と', 'ト', 'to'], ['つ', 'ツ', 'tsu'],
            ['う', 'ウ', 'u'], ['わ', 'ワ', 'wa'], ['を', 'ヲ', 'wo'], ['や', 'ヤ', 'ya'],
            ['よ', 'ヨ', 'yo'], ['ゆ', 'ユ', 'yu'],
        ];

        $letters = [];

        foreach ($gojuonAlphabetical as [$hiragana, $katakana, $romaji]) {
            $letters[] = ['character' => $hiragana, 'romanization' => $romaji, 'script_group' => 'hiragana'];
        }

        foreach ($gojuonAlphabetical as [$hiragana, $katakana, $romaji]) {
            $letters[] = ['character' => $katakana, 'romanization' => $romaji, 'script_group' => 'katakana'];
        }

        return $letters;
    }

    /**
     * Hangul, as ONE list.
     *
     * script_group is deliberately left unset. It exists to separate genuinely
     * different writing systems, which is what Japanese uses it for: hiragana
     * and katakana are two alphabets for the same sounds, so a learner has to
     * see which is which. Korean has one alphabet. Consonants and vowels are
     * two kinds of letter inside it, not two scripts, and splitting the screen
     * on that made Hangul look like twice as much to learn as it is.
     *
     * Both clients already render a letter with no script_group as a single
     * flat run, which is how English, Spanish, German, French and Turkish are
     * shown, so nothing on either front end had to change.
     */
    private function koreanLetters(): array
    {
        // Same jamo as before, reordered alphabetically by romanization
        // (b/p, ch, d/t, g/k, h, ...) instead of the traditional Hangul
        // chart order (ㄱㄴㄷㄹㅁㅂㅅㅇㅈㅊㅋㅌㅍㅎ). Consonants are still listed
        // before vowels, which is the order the chart is learned in.
        $consonants = [
            ['ㅂ', 'b/p'], ['ㅊ', 'ch'], ['ㄷ', 'd/t'], ['ㄱ', 'g/k'], ['ㅎ', 'h'],
            ['ㅈ', 'j'], ['ㅋ', 'k'], ['ㅁ', 'm'], ['ㄴ', 'n'], ['ㅇ', 'ng/-'],
            ['ㅍ', 'p'], ['ㄹ', 'r/l'], ['ㅅ', 's'], ['ㅌ', 't'],
        ];

        $vowels = [
            ['ㅏ', 'a'], ['ㅓ', 'eo'], ['ㅡ', 'eu'], ['ㅣ', 'i'], ['ㅗ', 'o'],
            ['ㅜ', 'u'], ['ㅑ', 'ya'], ['ㅕ', 'yeo'], ['ㅛ', 'yo'], ['ㅠ', 'yu'],
        ];

        $letters = [];

        // Sorted across BOTH kinds, not consonants-then-vowels. As two sections
        // each ran A-Z on its own; as one section that ordering reads as a
        // broken sort, running b, ch, d ... t and then jumping back to a. The
        // screen groups non-Latin scripts under the first letter of the
        // romanization, so a single section has to be in a single order for
        // those headings to make sense.
        $merged = [...$consonants, ...$vowels];

        usort($merged, fn (array $a, array $b) => strcmp(
            explode('/', $a[1])[0],
            explode('/', $b[1])[0],
        ));

        foreach ($merged as [$character, $romanization]) {
            $letters[] = ['character' => $character, 'romanization' => $romanization];
        }

        return $letters;
    }
}
