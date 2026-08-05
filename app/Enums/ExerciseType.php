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
}
