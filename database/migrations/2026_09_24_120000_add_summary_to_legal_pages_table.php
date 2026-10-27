<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * A plain-language "In short" summary for each legal page, per language.
 *
 * WCAG 2.2 AAA, 3.1.5 Reading Level: when text needs more than lower
 * secondary school reading ability, a simpler version has to be available.
 * Terms and privacy policies always do, so each page now carries a few short
 * sentences shown above the full text. Stored beside the page, per locale,
 * and editable in the admin panel like the page itself.
 *
 * One point per line, plain text. Existing rows are filled from
 * database/data/legal-summaries.php where a summary is written for them.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_pages', function (Blueprint $table) {
            $table->text('summary')->nullable()->after('title');
        });

        $summaries = require database_path('data/legal-summaries.php');

        foreach ($summaries as $slug => $locales) {
            foreach ($locales as $locale => $lines) {
                DB::table('legal_pages')
                    ->where('slug', $slug)
                    ->where('locale', $locale)
                    ->whereNull('summary')
                    ->update(['summary' => implode("\n", $lines)]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('legal_pages', function (Blueprint $table) {
            $table->dropColumn('summary');
        });
    }
};
