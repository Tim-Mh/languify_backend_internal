<?php

namespace App\Enums;

/**
 * Where an ad is shown. Each placement has its own list of ads.
 */
enum AdPlacement: string
{
    /**
     * The two cards in the home sidebar. One list feeds both: the website
     * shows neighbouring ads of the play order in the top and bottom card,
     * and neighbours are always different products, so the two cards never
     * show the same ad at once.
     */
    case HomeSidebar = 'home_sidebar';

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
            self::HomeSidebar => 'Home sidebar (top and bottom cards)',
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
            self::HomeSidebar => 'Landscape, 900×620.',
            self::LessonComplete => 'Landscape, 1680×1080. Shown as a large popup after the lesson.',
            self::MobileLessonComplete => 'Portrait, 1080×1920. Fills the whole phone screen.',
        };
    }

    /**
     * The box an uploaded image is shrunk to fit, as [width, height]. About
     * three times the size the placement is drawn at, so ads stay sharp on
     * high-resolution screens without anything larger being stored or
     * downloaded: the sidebar card is 300x207, the lesson popup at most
     * 1280x823, the phone screen 1080x1920. Used both by the admin page's in-browser compression and by
     * the server-side optimizer.
     *
     * @return array{0: int, 1: int}
     */
    public function box(): array
    {
        return match ($this) {
            self::HomeSidebar => [900, 620],
            self::LessonComplete => [1680, 1080],
            self::MobileLessonComplete => [1080, 1920],
        };
    }

    /** The key this placement is published under in the API response. */
    public function apiKey(): string
    {
        return match ($this) {
            self::HomeSidebar => 'homeSidebar',
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
