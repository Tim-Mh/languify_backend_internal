<?php

namespace Database\Seeders\Support;

use App\Enums\ExerciseType;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Support\Str;

/**
 * Builds a Russian unit as 5 small lessons that ALL follow the same 10-step
 * shape, so a learner always knows what is coming and only the words get
 * harder:
 *
 *   1-2. Pick the picture         6. Fill the gap (short phrase)
 *   3. Write it in your language  7. A longer phrase (read, then build)
 *   4. The short phrase           8. Fill the gap (longer phrase)
 *   5. Build that phrase in Russian   9. Pick the Russian word   10. Listen
 *
 * Each lesson mixes 2 "picturable" words with 2 abstract ones so every lesson
 * can use every format.
 *
 * NOTHING user-facing is hardcoded to English: every hint, prompt and word tile
 * is stored as an ['i18n' => [...]] map, resolved per learner at request time
 * by ExerciseContentService.
 *
 * TWO THINGS DIFFER FROM THE OTHER COURSES.
 *
 * 1. Seven native languages. Every other course glosses into six; a Russian
 *    course has to gloss into all seven, Turkish included.
 *
 * 2. Russian is inflected, so a phrase's `words` array must list the exact
 *    case forms the learner will assemble — `в` + `доме`, not `в` + `дом`.
 *    Each of those forms has to exist in RussianVocabulary, because the
 *    tap-word and fill-blank steps hand out one tile per entry and hint each
 *    one separately. A unit that lists a bare nominative where the sentence
 *    needs the prepositional teaches Russian that nobody speaks.
 *
 *    Russian writes its prepositions as separate words, which is why this
 *    differs from Turkish: there the preposition is glued on and the whole
 *    thing is one tile, here it is two.
 *
 * A word entry is ['ru' => 'Кофе', 'img' => 'coffee']; a phrase's translations
 * live under 'means'. Those are deliberately different keys.
 */
class RussianLessonBuilder
{
    /** Native languages a learner can take a Russian course in. */
    public const LANGS = ['en', 'fr', 'es', 'de', 'ja', 'ko', 'tr', 'ar', 'az'];

    /**
     * @param  array<string, string>  $picturePool  Russian label => image slug,
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
     * Russian).
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
     * These are explicit permutations rather than "session + n": with 4 words
     * and 5 sessions, simple rotation wraps around and makes session 5 an exact
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
        // Put this back to 5 to restore the progressive sessions: SESSION_PLAN
        // and WORD_ROTATION still describe all five variations, so no content
        // has to be rewritten to go back.
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
            : $this->phraseToRussian($phrases[$step[0]]);

        return [
            $this->pickPicture($pictures[0], $pictures[1]),
            $this->pickPicture($pictures[1], $pictures[0]),
            $this->singleWord($pick(0), $words),
            $render($first),
            $this->fillBlank($phrases[$first[0]], $words),
            $render($second),
            $this->fillBlank($phrases[$second[0]], $words),
            $this->singleWord($pick(1), $words),
            $this->pickRussianWord($pick(2)),
            $this->listenAndPick($words, $pick(3)),
        ];
    }

    /** Steps 1-2: "Which one of these is X?" — Russian options, each a picture. */
    private function pickPicture(array $word, array $sibling): array
    {
        $options = [[$word['ru'], $word['img']], [$sibling['ru'], $sibling['img']]];

        foreach ($this->picturePool as $ru => $img) {
            if (count($options) >= 4) {
                break;
            }
            if (in_array($ru, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$ru, $img];
        }

        return ['type' => ExerciseType::MatchPairs, 'data' => [
            'word' => $this->nativePrompt($word['ru']),
            'options' => array_map(fn (array $o) => [
                'text' => $o[0],
                'image' => '/images/exercises/'.$o[1].'.svg',
            ], $options),
            'correct_answer' => $word['ru'],
        ]];
    }

    /** Step 3: one Russian word, hover shows its meaning, tap the native tile. */
    private function singleWord(array $word, array $lessonWords): array
    {
        $distractors = [];
        foreach ($lessonWords as $other) {
            if (RussianVocabulary::key($other['ru']) === RussianVocabulary::key($word['ru'])) {
                continue;
            }
            $distractors[] = $other['ru'];
            if (count($distractors) >= 3) {
                break;
            }
        }

        $bank = [];
        $correct = [];
        foreach (self::LANGS as $lang) {
            $answer = $this->meaning($word['ru'], $lang);
            $tiles = [$answer];
            foreach ($distractors as $other) {
                $tiles[] = $this->meaning($other, $lang);
            }
            $bank[$lang] = $tiles;
            $correct[$lang] = [$answer];
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => [['text' => $word['ru'], 'en' => RussianVocabulary::hint($word['ru'])]],
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /** Steps 4 & 7: read the Russian phrase, build it in your own language. */
    private function phraseToNative(array $phrase): array
    {
        $bank = [];
        $correct = [];
        foreach (self::LANGS as $lang) {
            $means = $phrase['means'][$lang] ?? $phrase['means']['en'];
            $bank[$lang] = array_merge($means['correct'], $means['extra'] ?? []);
            $correct[$lang] = $means['correct'];
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => $this->russianWords($phrase),
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /**
     * Build the phrase in Russian (production). The learner is TOLD what to say,
     * in their own language — without it they can only guess the intended
     * sentence from the individual word hints, which misleads whenever the two
     * languages order words differently.
     */
    private function phraseToRussian(array $phrase): array
    {
        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['means'][$lang] ?? $phrase['means']['en'])['sentence'];
        }

        return ['type' => ExerciseType::TapWord, 'data' => [
            'target_sentence' => implode(' ', $phrase['words']),
            'sentence_translation' => ['i18n' => $translation],
            'words' => $this->russianWords($phrase),
            'correct_order' => $phrase['words'],
        ]];
    }

    /** Steps 6 & 8: a Russian phrase with one word missing. */
    private function fillBlank(array $phrase, array $lessonWords): array
    {
        $index = $phrase['blank'];
        $answer = RussianVocabulary::key($phrase['words'][$index]);

        $sentence = implode(' ', array_map(
            fn (string $word, int $i) => $i === $index ? '____' : $word,
            $phrase['words'],
            array_keys($phrase['words']),
        ));

        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['means'][$lang] ?? $phrase['means']['en'])['sentence'];
        }

        // Wrong answers: this lesson's own words first, then the wider
        // dictionary. Anything overlapping the answer is skipped so only one
        // option can be right, and all are lowercased so the correct one can't
        // be spotted by its capitalisation.
        //
        // The overlap test matters more in Russian than elsewhere, because the
        // case forms of one noun ARE substrings of each other: offering `дом`
        // against `доме` would be offering the same word twice.
        $candidates = array_merge(array_column($lessonWords, 'ru'), RussianVocabulary::all());
        $options = [];
        foreach ($candidates as $candidate) {
            $candidate = RussianVocabulary::key($candidate);
            if (str_contains($candidate, $answer) || str_contains($answer, $candidate)) {
                continue;
            }
            if (in_array($candidate, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$candidate, RussianVocabulary::hint($candidate)];
            if (count($options) >= 3) {
                break;
            }
        }
        $options[] = [$answer, RussianVocabulary::hint($answer)];

        return ['type' => ExerciseType::FillBlank, 'data' => [
            'sentence' => $sentence,
            'sentence_translation' => ['i18n' => $translation],
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $answer,
        ]];
    }

    /** Step 9: your language shown, pick the matching Russian word. */
    private function pickRussianWord(array $word): array
    {
        $correct = RussianVocabulary::key($word['ru']);
        $options = [$correct];

        foreach (RussianVocabulary::all() as $candidate) {
            if (count($options) >= 4) {
                break;
            }
            if (str_contains($candidate, $correct) || str_contains($correct, $candidate)) {
                continue;
            }
            $options[] = $candidate;
        }

        return ['type' => ExerciseType::MultipleChoice, 'data' => [
            'word' => $this->nativePrompt($word['ru']),
            'options' => $options,
            'correct_answer' => $correct,
        ]];
    }

    /** Step 10: hear the Russian, pick it from Russian options. */
    private function listenAndPick(array $words, array $word): array
    {
        $options = [[$word['ru'], RussianVocabulary::hint($word['ru'])]];
        $seen = [$word['ru'] => true];

        foreach ($words as $other) {
            // Guard on the surface form rather than on the entry: a unit can
            // introduce the same word twice, and adding it again would show the
            // learner two identical tiles to choose between.
            if (isset($seen[$other['ru']])) {
                continue;
            }
            $seen[$other['ru']] = true;
            $options[] = [$other['ru'], RussianVocabulary::hint($other['ru'])];
            if (count($options) >= 4) {
                break;
            }
        }

        return ['type' => ExerciseType::ListenSelect, 'data' => [
            'audio_text' => $word['ru'],
            'audio_url' => '/audio/exercises/'.Str::slug($word['ru']).'.mp3',
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $word['ru'],
        ]];
    }

    /** The phrase's Russian words, each carrying its native-language hint. */
    private function russianWords(array $phrase): array
    {
        return array_map(
            fn (string $word) => ['text' => $word, 'en' => RussianVocabulary::hint($word)],
            $phrase['words'],
        );
    }

    /** A Russian word's meaning in one language (falls back to English). */
    private function meaning(string $russian, string $lang): string
    {
        $meanings = RussianVocabulary::meanings($russian);

        return $meanings[$lang] ?? $meanings['en'];
    }

    /** A Russian word's meaning in every language, capitalised, as a prompt. */
    private function nativePrompt(string $russian): array
    {
        $prompts = [];
        foreach (RussianVocabulary::meanings($russian) as $lang => $text) {
            $prompts[$lang] = mb_strtoupper(mb_substr($text, 0, 1)).mb_substr($text, 1);
        }

        return ['i18n' => $prompts];
    }
}
