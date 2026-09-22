<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * One row per page *per language*, instead of one row per page.
 *
 * Terms and Privacy were a single English row each, so every learner read them
 * in English whatever their own language was. Shipping translated copies inside
 * the app would have been worse than that: the admin edits the English one and
 * the bundled copies go quietly stale, which for a legal document means the app
 * is showing terms that are no longer the terms.
 *
 * Keeping the translations here, beside the source, is what fixes that. An edit
 * in the admin panel is live immediately, because nothing is baked into a
 * build.
 *
 * `source_hash` records which English text a translation was made from. When
 * the English changes, every other locale whose hash no longer matches is shown
 * as out of date in the admin panel — the staleness is visible rather than
 * silent, which is the whole problem with the bundled approach.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_pages', function (Blueprint $table) {
            // `en` for everything already here: those rows are the English
            // originals, and calling them anything else would lose the one
            // language we definitely have.
            $table->string('locale', 5)->default('en')->after('slug');

            // Null means "written by hand, not translated from anything", which
            // is true of every existing row.
            $table->string('source_hash', 64)->nullable()->after('content');
        });

        // A slug is no longer unique on its own: `privacy` now exists once per
        // language. The pair is what identifies a page.
        Schema::table('legal_pages', function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });

        Schema::table('legal_pages', function (Blueprint $table) {
            $table->unique(['slug', 'locale']);
        });

        // Belt and braces: the column default covers new rows, this covers any
        // row written before the default existed.
        DB::table('legal_pages')->whereNull('locale')->update(['locale' => 'en']);
    }

    public function down(): void
    {
        // Everything that is not English goes, or the unique index below cannot
        // be rebuilt.
        DB::table('legal_pages')->where('locale', '!=', 'en')->delete();

        Schema::table('legal_pages', function (Blueprint $table) {
            $table->dropUnique(['slug', 'locale']);
        });

        Schema::table('legal_pages', function (Blueprint $table) {
            $table->unique(['slug']);
        });

        Schema::table('legal_pages', function (Blueprint $table) {
            $table->dropColumn(['locale', 'source_hash']);
        });
    }
};
