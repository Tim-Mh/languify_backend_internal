<?php

namespace App\Enums;

enum ExerciseType: string
{
    case MatchPairs = 'match_pairs';
    case FillBlank = 'fill_blank';
    case TapWord = 'tap_word';
    case ListenSelect = 'listen_select';
    case MultipleChoice = 'multiple_choice';
    case ParagraphTranslation = 'paragraph_translation';
    // "Write this in English": show a course-language phrase (each word
    // hoverable for its meaning) and build the native-language translation by
    // tapping word-bank tiles.
    case Translate = 'translate';

    /** Plain name for the admin panel. */
    public function label(): string
    {
        return match ($this) {
            self::MatchPairs => 'Match pairs',
            self::FillBlank => 'Fill the blank',
            self::TapWord => 'Tap the words',
            self::ListenSelect => 'Listen and pick',
            self::MultipleChoice => 'Multiple choice',
            self::ParagraphTranslation => 'Paragraph translation',
            self::Translate => 'Translate',
        };
    }
}
