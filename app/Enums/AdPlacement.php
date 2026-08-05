<?php

namespace App\Enums;

/**
 * Where an ad creative is shown. Each placement is an independent pool, which
 * is what guarantees the two home-page slots can never display the same
 * creative at the same moment: they simply draw from different pools.
 */
enum AdPlacement: string
{
    /** Home sidebar, upper slot. */
    case HomePrimary = 'home_primary';

    /** Home sidebar, lower slot. */
    case HomeSecondary = 'home_secondary';

    /** Full-screen interstitial shown after a lesson session is completed. */
    case LessonComplete = 'lesson_complete';

    /**
     * The same moment, but in the mobile app, which shows it full-screen and
     * portrait rather than as a landscape card in a sidebar. It is a separate
     * pool because it needs a differently shaped creative, not because it is a
     * different moment — uploading one 580x400 image for both surfaces means it
     * is letterboxed on one of them.
     */
    case MobileLessonComplete = 'mobile_lesson_complete';

    /** Human label for the admin panel. */
    public function label(): string
    {
        return match ($this) {
            self::HomePrimary => 'Home sidebar, top slot',
            self::HomeSecondary => 'Home sidebar, bottom slot',
            self::LessonComplete => 'After a lesson is completed',
            self::MobileLessonComplete => 'After a lesson is completed (mobile app)',
        };
    }

    /** Which product this placement is shown in, for grouping the admin panel. */
    public function surface(): string
    {
        return match ($this) {
            self::MobileLessonComplete => 'Mobile app',
            default => 'Website',
        };
    }

    /** The shape a creative for this placement should be uploaded at. */
    public function guidance(): string
    {
        return match ($this) {
            self::HomePrimary, self::HomeSecondary => 'Landscape, around 580×400.',
            self::LessonComplete => 'Landscape, around 580×400. Shown as a card mid-page.',
            self::MobileLessonComplete => 'Portrait, around 1080×1920. Fills the whole phone screen.',
        };
    }

    /** The key this placement is published under in the API response. */
    public function apiKey(): string
    {
        return match ($this) {
            self::HomePrimary => 'homePrimary',
            self::HomeSecondary => 'homeSecondary',
            self::LessonComplete => 'lessonComplete',
            self::MobileLessonComplete => 'mobileLessonComplete',
        };
    }

    /** @return array<string, string> value => label, for a select box. */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()])
            ->all();
    }
}
