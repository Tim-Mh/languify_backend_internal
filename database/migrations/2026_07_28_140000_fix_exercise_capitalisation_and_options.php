<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Content quality pass over every exercise.
 *
 * Four faults, all decidable from the data itself:
 *
 *  1. Sentences starting with a lowercase letter, in every language. Roughly
 *     one displayed sentence in five.
 *  2. German nouns written lowercase mid-sentence, which is a grammar error.
 *     The noun list is derived from the content's own evidence: a German word
 *     the corpus already writes with a capital somewhere OTHER than the first
 *     word of a sentence is a noun. Words that are only ever capitalised at the
 *     start of a sentence (articles, prepositions, verbs) are therefore never
 *     touched, and five genuinely ambiguous words are excluded by hand.
 *  3. Exercises offering the same option twice, so two buttons are identical.
 *  4. Translate word banks containing no distractors, where the answer uses
 *     every tile and there is no wrong choice to make.
 *
 * Every row this changes is backed up first, so down() restores the exact
 * original JSON rather than trying to undo the transformations.
 */
return new class extends Migration
{
    private const BACKUP_TABLE = 'exercise_data_backups';

    /**
     * Ambiguous German words deliberately left alone. Capitalising these would
     * teach something incorrect, which is worse than inconsistent casing.
     */
    private const AMBIGUOUS = [
        'morgen',      // "morgen" = tomorrow (adverb) vs "Morgen" = morning (noun)
        'kaufen',      // verb, capitalised only when nominalised
        'mitnehmen',   // verb; correct in "zum Mitnehmen", wrong on its own
        'gesamt',      // adjective, capitalised only inside compounds
        'hieressen',   // looks like "hier essen" wrongly joined; a separate fault
    ];

    public function up(): void
    {
        if (! Schema::hasTable(self::BACKUP_TABLE)) {
            Schema::create(self::BACKUP_TABLE, function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('exercise_id')->index();
                $table->json('data');
                $table->string('reason')->default('capitalisation-pass');
                $table->timestamp('created_at')->useCurrent();
            });
        }

        // 60,006 exercises with their JSON will not fit in memory at once, so
        // every pass streams in chunks and keeps only the small summaries it
        // needs (the noun list and the word-bank vocabulary).
        $nouns = $this->deriveGermanNouns();
        $distractors = $this->collectWordBankVocabulary();

        echo '  derived '.count($nouns)." German nouns from the content\n";

        $changed = 0;

        $this->eachExercise(function (object $row) use ($nouns, $distractors, &$changed) {
            $before = json_decode($row->data, true);

            if (! is_array($before)) {
                return;
            }

            $after = $this->capitaliseGermanNouns($before, $row->lang, $row->type, $nouns);
            $after = $this->capitaliseSentenceStarts($after);
            $after = $this->dropDuplicateOptions($after, $row->type);
            $after = $this->addMissingDistractors($after, $row->type, $distractors);

            if ($after === $before) {
                return;
            }

            DB::table(self::BACKUP_TABLE)->insert([
                'exercise_id' => $row->id,
                'data' => json_encode($before, JSON_UNESCAPED_UNICODE),
            ]);

            DB::table('exercises')->where('id', $row->id)->update([
                'data' => json_encode($after, JSON_UNESCAPED_UNICODE),
            ]);

            $changed++;
        });

        echo "  updated {$changed} exercises\n";
    }

    /** Streams every exercise with its course language, in id order. */
    private function eachExercise(callable $callback, ?string $onlyLanguage = null): void
    {
        $query = DB::table('exercises')
            ->join('lessons', 'exercises.lesson_id', '=', 'lessons.id')
            ->join('units', 'lessons.unit_id', '=', 'units.id')
            ->join('chapters', 'units.chapter_id', '=', 'chapters.id')
            ->join('languages', 'chapters.language_id', '=', 'languages.id')
            ->select('exercises.id', 'exercises.type', 'exercises.data', 'languages.code as lang')
            ->orderBy('exercises.id');

        if ($onlyLanguage !== null) {
            $query->where('languages.code', $onlyLanguage);
        }

        $query->chunk(400, function ($rows) use ($callback) {
            foreach ($rows as $row) {
                $callback($row);
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable(self::BACKUP_TABLE)) {
            return;
        }

        DB::table(self::BACKUP_TABLE)->orderBy('id')->each(function ($backup) {
            DB::table('exercises')->where('id', $backup->exercise_id)->update(['data' => $backup->data]);
        });

        Schema::dropIfExists(self::BACKUP_TABLE);
    }

    /**
     * German capitalises every noun wherever it stands, so a word already
     * written with a capital in a NON sentence-initial position is a noun on the
     * content's own evidence.
     *
     * @return array<string, string> lowercase form => canonical capitalised form
     */
    private function deriveGermanNouns(): array
    {
        $nouns = [];

        $this->eachExercise(function (object $row) use (&$nouns) {
            $data = json_decode($row->data, true);

            if (! is_array($data)) {
                return;
            }

            foreach ($this->germanSentences($data) as $sentence) {
                $tokens = preg_split('/\s+/u', trim($sentence), -1, PREG_SPLIT_NO_EMPTY) ?: [];

                foreach ($tokens as $i => $token) {
                    if ($i === 0) {
                        continue;
                    }
                    $clean = preg_replace('/[^\p{L}\p{N}\'-]/u', '', $token);

                    if ($clean !== '' && mb_strlen($clean) >= 2 && preg_match('/^\p{Lu}/u', $clean)) {
                        $nouns[mb_strtolower($clean)] = $clean;
                    }
                }
            }
        }, 'de');

        foreach (self::AMBIGUOUS as $word) {
            unset($nouns[$word]);
        }

        return $nouns;
    }

    /** Every fully-formed target-language sentence an exercise contains. */
    private function germanSentences(array $d): array
    {
        $out = [];

        if (isset($d['sentence'])) {
            $out[] = preg_replace('/_+/u', (string) ($d['correct_answer'] ?? ''), (string) $d['sentence']);
        }
        if (isset($d['target_sentence'])) {
            $out[] = (string) $d['target_sentence'];
        }
        if (isset($d['correct_order']) && is_array($d['correct_order'])) {
            $out[] = implode(' ', $d['correct_order']);
        }

        return array_filter($out, fn ($s) => is_string($s) && trim($s) !== '');
    }

    /**
     * Applies noun casing to every field that holds a German word, so the option
     * tiles, the answer key and the sentence can never fall out of sync.
     */
    private function capitaliseGermanNouns(array $d, string $lang, string $type, array $nouns): array
    {
        if ($lang !== 'de' || $nouns === []) {
            return $d;
        }

        // match_pairs labels its options in English regardless of the course
        // (the tiles are captioned pictures), so German noun rules must not
        // touch them or English words get wrongly capitalised.
        if ($type === 'match_pairs') {
            return $d;
        }

        $fixWord = function (string $text) use ($nouns): string {
            $key = mb_strtolower($text);

            return $nouns[$key] ?? $text;
        };

        $fixSentence = fn (string $s) => preg_replace_callback(
            '/\p{L}[\p{L}\'-]*/u',
            fn ($m) => $nouns[mb_strtolower($m[0])] ?? $m[0],
            $s,
        );

        foreach (['options', 'words', 'prompt_words'] as $key) {
            foreach ($d[$key] ?? [] as $i => $w) {
                if (is_array($w) && isset($w['text']) && is_string($w['text'])) {
                    $d[$key][$i]['text'] = $fixWord($w['text']);
                } elseif (is_string($w)) {
                    // multiple_choice stores its options as plain strings, and
                    // correct_answer points at one of them by value. Missing
                    // these here is what desynchronises the answer key.
                    $d[$key][$i] = $fixWord($w);
                }
            }
        }

        if (isset($d['correct_answer']) && is_string($d['correct_answer'])) {
            $d['correct_answer'] = $fixWord($d['correct_answer']);
        }
        if (isset($d['word']) && is_string($d['word'])) {
            $d['word'] = $fixWord($d['word']);
        }
        if (isset($d['correct_order']) && is_array($d['correct_order'])) {
            $d['correct_order'] = array_map(fn ($w) => is_string($w) ? $fixWord($w) : $w, $d['correct_order']);
        }
        foreach (['sentence', 'target_sentence', 'audio_text'] as $key) {
            if (isset($d[$key]) && is_string($d[$key])) {
                $d[$key] = $fixSentence($d[$key]);
            }
        }

        return $d;
    }

    /**
     * Upper-cases the first letter of every displayed sentence. Skips anything
     * that does not begin with a letter, which leaves a sentence opening with
     * the blank marker alone rather than mangling it. Japanese and Korean have
     * no case, so this is a natural no-op there.
     */
    private function capitaliseSentenceStarts(array $d): array
    {
        $upperFirst = function ($s) {
            if (! is_string($s) || $s === '') {
                return $s;
            }
            $first = mb_substr($s, 0, 1);

            return preg_match('/^\p{Ll}/u', $first)
                ? mb_strtoupper($first).mb_substr($s, 1)
                : $s;
        };

        // target_sentence is excluded for the same reason: it has to stay equal
        // to correct_order joined together.
        if (isset($d['sentence'])) {
            $d['sentence'] = $upperFirst($d['sentence']);
        }

        // correct_order and its tiles are deliberately left alone. tap_word
        // matches the learner's answer by tile TEXT, and a sentence like
        // "a coffee and a tea" has two identical "a" tiles: capitalising the
        // first would rename both, leaving the tiles unable to spell the
        // answer. An internally consistent exercise beats a leading capital.

        foreach ($d['sentence_translation']['i18n'] ?? [] as $code => $value) {
            $d['sentence_translation']['i18n'][$code] = $upperFirst($value);
        }

        return $d;
    }

    /** Two identical buttons are never a real choice. */
    private function dropDuplicateOptions(array $d, string $type): array
    {
        if (! in_array($type, ['multiple_choice', 'listen_select', 'match_pairs', 'fill_blank'], true)) {
            return $d;
        }
        if (! isset($d['options']) || ! is_array($d['options'])) {
            return $d;
        }

        $seen = [];
        $kept = [];

        foreach ($d['options'] as $option) {
            $label = is_array($option) ? ($option['text'] ?? '') : (string) $option;
            $key = mb_strtolower((string) $label);

            if (isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            $kept[] = $option;
        }

        $d['options'] = array_values($kept);

        return $d;
    }

    /** Native-language words available to pad a word bank, per language. */
    private function collectWordBankVocabulary(): array
    {
        $vocab = [];

        $this->eachExercise(function (object $row) use (&$vocab) {
            if ($row->type !== 'translate') {
                return;
            }

            $data = json_decode($row->data, true);

            foreach ($data['word_bank']['i18n'] ?? [] as $code => $tiles) {
                foreach ((array) $tiles as $tile) {
                    if (is_string($tile) && trim($tile) !== '') {
                        $vocab[$code][$tile] = true;
                    }
                }
            }
        });

        return array_map(fn ($set) => array_keys($set), $vocab);
    }

    /** A word bank the answer consumes entirely offers no wrong choice. */
    private function addMissingDistractors(array $d, string $type, array $vocab): array
    {
        if ($type !== 'translate' || ! isset($d['word_bank']['i18n'])) {
            return $d;
        }

        foreach ($d['word_bank']['i18n'] as $code => $tiles) {
            $tiles = array_values((array) $tiles);
            $correct = array_values((array) ($d['correct']['i18n'][$code] ?? []));

            if (count($tiles) > count($correct)) {
                continue;
            }

            $lower = array_map('mb_strtolower', $tiles);

            foreach ($vocab[$code] ?? [] as $candidate) {
                if (count($tiles) >= count($correct) + 2) {
                    break;
                }
                if (in_array(mb_strtolower($candidate), $lower, true)) {
                    continue;
                }
                $tiles[] = $candidate;
                $lower[] = mb_strtolower($candidate);
            }

            $d['word_bank']['i18n'][$code] = $tiles;
        }

        return $d;
    }
};
