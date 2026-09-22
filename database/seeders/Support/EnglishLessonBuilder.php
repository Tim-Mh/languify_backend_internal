<?php

namespace Database\Seeders\Support;

use App\Enums\ExerciseType;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Support\Str;

/**
 * Builds an English unit as 5 small lessons that ALL follow the same 10-step
 * shape, so a learner always knows what is coming and only the words get
 * harder:
 *
 *   1-2. Pick the picture          6. Fill the gap (short phrase)
 *   3. Write it in your language   7. A longer phrase (read, then build)
 *   4. The short phrase            8. Fill the gap (longer phrase)
 *   5. Build that phrase in English   9. Pick the English word   10. Listen
 *
 * This is the exact twin of FrenchLessonBuilder — only the language roles are
 * swapped. English is the LEARNING language, so content (words, phrases, tiles)
 * is authored in English, and the native languages a learner can take the
 * course in are Spanish, German, Japanese, Korean and French.
 *
 * NOTHING user-facing is hardcoded: every hint, prompt and word tile is stored
 * as an ['i18n' => [...]] map (under the field named `en` the frontend reads),
 * resolved per learner at request time by ExerciseContentService.
 */
class EnglishLessonBuilder
{
    /** Native languages a learner can take an English course in. */
    public const LANGS = ['es', 'de', 'ja', 'ko', 'fr', 'tr', 'ru', 'ar', 'az'];

    /**
     * @param  array<string, string>  $picturePool  English label => image slug,
     *                                              used for wrong picture options.
     */
    public function __construct(private array $picturePool) {}

    /**
     * Write a unit's 5 lessons to the database, replacing whatever was there.
     *
     * @param  array<int, array>  $lessons  from lesson()
     */
    public function seedUnit(int $chapterId, int $orderNumber, string $title, array $lessons): void
    {
        // Keyed on (chapter_id, order_number) so re-seeding RENAMES the unit in
        // place rather than creating a second unit at the same position.
        $unit = Unit::updateOrCreate(
            ['chapter_id' => $chapterId, 'order_number' => $orderNumber],
            ['title' => $title]
        );

        Lesson::where('unit_id', $unit->id)->where('order_number', '>', count($lessons))->delete();

        foreach ($lessons as $lessonDef) {
            $lesson = Lesson::updateOrCreate(
                ['unit_id' => $unit->id, 'order_number' => $lessonDef['order']],
                ['title' => $lessonDef['title']]
            );

            $order = 0;

            foreach ($lessonDef['sessions'] as $sessionIndex => $sessionExercises) {
                foreach ($sessionExercises as $exercise) {
                    $order++;
                    Exercise::updateOrCreate(
                        ['lesson_id' => $lesson->id, 'order_number' => $order],
                        [
                            'type' => $exercise['type'],
                            'data' => $exercise['data'],
                            'session_number' => $sessionIndex + 1,
                        ]
                    );
                }
            }

            Exercise::where('lesson_id', $lesson->id)->where('order_number', '>', $order)->delete();
        }
    }

    /**
     * Which two phrases each session uses, and whether the learner READS it
     * (build the meaning in their own language) or BUILDS it (assemble the
     * English). Every session gets a different pair, so replaying a lesson is
     * never the same quiz twice — and the mode shifts from reading toward
     * producing as the sessions go on.
     */
    private const SESSION_PLAN = [
        0 => [['a', 'read'], ['b', 'read']],
        1 => [['a', 'build'], ['b', 'read']],
        2 => [['b', 'build'], ['c', 'read']],
        3 => [['c', 'read'], ['a', 'build']],
        4 => [['c', 'build'], ['b', 'build']],
    ];

    /**
     * Which word each of the four single-word drills asks about, per session.
     * Explicit permutations rather than "session + n": with 4 words and 5
     * sessions, simple rotation wraps around and makes session 5 an exact
     * replay of session 1.
     */
    private const WORD_ROTATION = [
        0 => [0, 1, 2, 3],
        1 => [1, 2, 3, 0],
        2 => [2, 3, 0, 1],
        3 => [3, 0, 1, 2],
        4 => [1, 3, 0, 2],
    ];

    /**
     * @param  array<string, array>  $phrases  keyed 'a' (short), 'b' (carries the
     *                                         lesson's grammar word), 'c' (long).
     */
    public function lesson(string $title, int $order, array $pictures, array $plain, array $phrases): array
    {
        // One session per lesson, to match
        // LessonProgressService::LESSON_TARGET_COMPLETIONS.
        //
        // A lesson used to be built as five progressive sessions, but only
        // the first is ever served now, so building the other four just
        // wrote rows nothing reads. Put this back to 5 to restore them:
        // SESSION_PLAN and WORD_ROTATION still describe all five
        // variations, so no content has to be rewritten to go back.
        $sessions = [];
        for ($session = 0; $session < 1; $session++) {
            $sessions[] = $this->session($session, $pictures, $plain, $phrases);
        }

        return ['title' => $title, 'order' => $order, 'sessions' => $sessions];
    }

    private function session(int $session, array $pictures, array $plain, array $phrases): array
    {
        $words = array_merge($pictures, $plain);
        $count = count($words);
        [$first, $second] = self::SESSION_PLAN[$session];
        $rotation = self::WORD_ROTATION[$session];
        $pick = fn (int $slot) => $words[$rotation[$slot] % $count];

        $render = fn (array $step) => $step[1] === 'read'
            ? $this->phraseToNative($phrases[$step[0]])
            : $this->phraseToEnglish($phrases[$step[0]]);

        return [
            $this->pickPicture($pictures[0], $pictures[1]),
            $this->pickPicture($pictures[1], $pictures[0]),
            $this->singleWord($pick(0), $words),
            $render($first),
            $this->fillBlank($phrases[$first[0]], $words),
            $render($second),
            $this->fillBlank($phrases[$second[0]], $words),
            $this->singleWord($pick(1), $words),
            $this->pickEnglishWord($pick(2)),
            $this->listenAndPick($words, $pick(3)),
        ];
    }

    /** Steps 1-2: "Which one of these is X?" — English options, each a picture. */
    private function pickPicture(array $word, array $sibling): array
    {
        $options = [[$word['en'], $word['img']], [$sibling['en'], $sibling['img']]];

        foreach ($this->picturePool as $en => $img) {
            if (count($options) >= 4) {
                break;
            }
            if (in_array($en, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$en, $img];
        }

        return ['type' => ExerciseType::MatchPairs, 'data' => [
            'word' => $this->nativePrompt($word['en']),
            'options' => array_map(fn (array $o) => [
                'text' => $o[0],
                'image' => '/images/exercises/'.$o[1].'.svg',
            ], $options),
            'correct_answer' => $word['en'],
        ]];
    }

    /** Step 3: one English word, hover shows its meaning, tap the native tile. */
    private function singleWord(array $word, array $lessonWords): array
    {
        $distractors = [];
        foreach ($lessonWords as $other) {
            if (mb_strtolower($other['en']) === mb_strtolower($word['en'])) {
                continue;
            }
            $distractors[] = $other['en'];
            if (count($distractors) >= 3) {
                break;
            }
        }

        $bank = [];
        $correct = [];
        foreach (self::LANGS as $lang) {
            $answer = $this->meaning($word['en'], $lang);
            $tiles = [$answer];
            foreach ($distractors as $other) {
                $tiles[] = $this->meaning($other, $lang);
            }
            $bank[$lang] = $tiles;
            $correct[$lang] = [$answer];
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => [['text' => $word['en'], 'en' => EnglishVocabulary::hint($word['en'])]],
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /** Steps 4 & 7: read the English phrase, build it in your own language. */
    private function phraseToNative(array $phrase): array
    {
        $bank = [];
        $correct = [];
        foreach (self::LANGS as $lang) {
            $tr = $phrase['tr'][$lang] ?? $phrase['tr']['es'];
            $bank[$lang] = array_merge($tr['correct'], $tr['extra'] ?? []);
            $correct[$lang] = $tr['correct'];
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => $this->englishWords($phrase),
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /**
     * Build the phrase in English (production). The learner is TOLD what to say,
     * in their own language — without it they can only guess the intended
     * sentence from the individual word hints, which misleads whenever the two
     * languages order words differently.
     */
    private function phraseToEnglish(array $phrase): array
    {
        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['tr'][$lang] ?? $phrase['tr']['es'])['sentence'];
        }

        return ['type' => ExerciseType::TapWord, 'data' => [
            'target_sentence' => implode(' ', $phrase['words']),
            'sentence_translation' => ['i18n' => $translation],
            'words' => $this->englishWords($phrase),
            'correct_order' => $phrase['words'],
        ]];
    }

    /** Steps 6 & 8: an English phrase with one word missing. */
    private function fillBlank(array $phrase, array $lessonWords): array
    {
        $index = $phrase['blank'];
        $answer = mb_strtolower($phrase['words'][$index]);

        $sentence = implode(' ', array_map(
            fn (string $word, int $i) => $i === $index ? '____' : $word,
            $phrase['words'],
            array_keys($phrase['words']),
        ));

        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['tr'][$lang] ?? $phrase['tr']['es'])['sentence'];
        }

        // Wrong answers: this lesson's own words first, then the wider
        // dictionary. Anything overlapping the answer is skipped so only one
        // option can be right, and all are lowercased so the correct one can't
        // be spotted by its capitalisation.
        $candidates = array_merge(array_column($lessonWords, 'en'), EnglishVocabulary::all());
        $options = [];
        foreach ($candidates as $candidate) {
            $candidate = mb_strtolower($candidate);
            if (str_contains($candidate, $answer) || str_contains($answer, $candidate)) {
                continue;
            }
            if (in_array($candidate, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$candidate, EnglishVocabulary::hint($candidate)];
            if (count($options) >= 3) {
                break;
            }
        }
        $options[] = [$answer, EnglishVocabulary::hint($answer)];

        return ['type' => ExerciseType::FillBlank, 'data' => [
            'sentence' => $sentence,
            'sentence_translation' => ['i18n' => $translation],
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $answer,
        ]];
    }

    /** Step 9: your language shown, pick the matching English word. */
    private function pickEnglishWord(array $word): array
    {
        $correct = mb_strtolower($word['en']);
        $options = [$correct];

        foreach (EnglishVocabulary::all() as $candidate) {
            if (count($options) >= 4) {
                break;
            }
            $candidate = mb_strtolower($candidate);
            if (str_contains($candidate, $correct) || str_contains($correct, $candidate)) {
                continue;
            }
            if (in_array($candidate, $options, true)) {
                continue;
            }
            $options[] = $candidate;
        }

        return ['type' => ExerciseType::MultipleChoice, 'data' => [
            'word' => $this->nativePrompt($word['en']),
            'options' => $options,
            'correct_answer' => $correct,
        ]];
    }

    /** Step 10: hear the English, pick it from English options. */
    private function listenAndPick(array $words, array $word): array
    {
        $options = [[$word['en'], EnglishVocabulary::hint($word['en'])]];
        $seen = [$word['en'] => true];

        foreach ($words as $other) {
            // Guard on the surface form rather than on the entry: a unit can
            // introduce the same word twice, and adding it again would show the
            // learner two identical tiles to choose between.
            if (isset($seen[$other['en']])) {
                continue;
            }
            $seen[$other['en']] = true;
            $options[] = [$other['en'], EnglishVocabulary::hint($other['en'])];
            if (count($options) >= 4) {
                break;
            }
        }

        return ['type' => ExerciseType::ListenSelect, 'data' => [
            'audio_text' => $word['en'],
            'audio_url' => '/audio/exercises/'.Str::slug($word['en']).'.mp3',
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $word['en'],
        ]];
    }

    /** The phrase's English words, each carrying its native-language hint. */
    private function englishWords(array $phrase): array
    {
        return array_map(
            fn (string $word) => ['text' => $word, 'en' => EnglishVocabulary::hint($word)],
            $phrase['words'],
        );
    }

    /** An English word's meaning in one language (falls back to the word). */
    private function meaning(string $english, string $lang): string
    {
        $meanings = EnglishVocabulary::meanings($english);

        return $meanings[$lang] ?? $english;
    }

    /** An English word's meaning in every language, capitalised, as a prompt. */
    private function nativePrompt(string $english): array
    {
        $prompts = [];
        foreach (EnglishVocabulary::meanings($english) as $lang => $text) {
            $prompts[$lang] = mb_strtoupper(mb_substr($text, 0, 1)).mb_substr($text, 1);
        }

        return ['i18n' => $prompts];
    }
}
