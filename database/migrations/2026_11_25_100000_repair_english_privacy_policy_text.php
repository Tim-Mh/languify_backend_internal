<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Repairs the English Privacy Policy. An edit on 2026-09-10 lost pieces of
 * several sentences ("Languify contains no thi.", "We share d providers",
 * "100% secabsolute security", ...). The missing words are restored from the
 * original text and from the translations, which were made before the damage.
 *
 * Each repair only runs when its damaged fragment is still there, so running
 * this on a copy that was already fixed by hand changes nothing.
 */
return new class extends Migration
{
    private const REPAIRS = [
        'Languify contains no thi.' => 'Languify contains no third-party advertising networks.',
        'We share d providers who help us operate the Service, namelyStripe' => 'We share data only with trusted service providers who help us operate the Service, namely Stripe',
        'and only to the eerform their services.' => 'and only to the extent necessary for them to perform their services.',
        'for as longf you delete your account' => 'for as long as your account is active. If you delete your account',
        'remove oranonymize' => 'remove or anonymize',
        'removes yoscribed above.' => 'removes your personal information as described above.',
        'you mayhave' => 'you may have',
        '100% secabsolute security.' => '100% secure, and we cannot guarantee absolute security.',
        'from time to time.al changes' => 'from time to time. We will notify you of material changes',
        'or hse visit our Contact Us page.' => 'or how your data is handled, please visit our Contact Us page.',
        // Two sentences that were split into separate paragraphs mid-sentence.
        'No</p><p>method' => 'No method',
        'our email</p><p>provider' => 'our email provider',
    ];

    public function up(): void
    {
        $page = DB::table('legal_pages')->where('slug', 'privacy')->where('locale', 'en')->first();

        if (! $page) {
            return;
        }

        $content = str_replace(array_keys(self::REPAIRS), array_values(self::REPAIRS), $page->content);

        if ($content !== $page->content) {
            DB::table('legal_pages')->where('id', $page->id)->update(['content' => $content, 'updated_at' => now()]);
        }
    }

    public function down(): void
    {
        // Not reversible: the damaged text is not worth restoring.
    }
};
