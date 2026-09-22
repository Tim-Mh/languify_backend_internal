<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * One row per page per language. See the migration for why the translations
 * live here rather than in the app.
 */
#[Fillable(['slug', 'locale', 'title', 'content', 'source_hash'])]
class LegalPage extends Model
{
    /**
     * The language every page is written in first, and the one served to anyone
     * whose own language has not been translated yet.
     */
    public const SOURCE_LOCALE = 'en';

    /**
     * The languages the apps offer, matching the catalogue in the mobile app's
     * `src/lib/i18n.js` and the web's own switcher. Adding one here is what
     * makes it appear as a tab in the admin editor.
     */
    public const LOCALES = ['en', 'fr', 'es', 'de', 'ja', 'ko', 'tr', 'ru', 'ar', 'az'];

    /** Human names for the tabs, so the admin is not picking between codes. */
    public const LOCALE_NAMES = [
        'en' => 'English',
        'fr' => 'Français',
        'es' => 'Español',
        'de' => 'Deutsch',
        'ja' => '日本語',
        'ko' => '한국어',
        'tr' => 'Türkçe',
        'ru' => 'Русский',
        'ar' => 'العربية',
        'az' => 'Azərbaycan dili',
    ];

    /**
     * A fingerprint of the English body, stored on a translation so we can tell
     * later whether the source has moved on since.
     *
     * Whitespace is not normalised away on purpose: a change to the spacing of
     * a legal document can change how it reads, and a translator should see it.
     */
    public static function fingerprint(string $content): string
    {
        return hash('sha256', $content);
    }

    /**
     * Whether this translation was made from an English text that has since
     * changed.
     *
     * False for the English row itself, which is the source and cannot be out
     * of date with itself, and false for a translation written before the hash
     * was recorded — there is nothing to compare, and flagging every page on
     * the day this shipped would train the admin to ignore the warning.
     */
    public function isOutdated(?self $source): bool
    {
        if ($this->locale === self::SOURCE_LOCALE) {
            return false;
        }

        if (! $source || $this->source_hash === null) {
            return false;
        }

        return $this->source_hash !== self::fingerprint($source->content);
    }
}
