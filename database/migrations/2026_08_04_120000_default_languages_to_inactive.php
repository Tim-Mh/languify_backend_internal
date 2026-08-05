<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Makes a newly seeded language invisible until an admin says otherwise.
 *
 * A language row now arrives switched off. Seeding a language and publishing a
 * language become two separate acts: the seeder writes the row and its
 * chapters, and the Language Activation screen decides when learners see it.
 * Previously the row went live the instant it was seeded, so a half-written
 * course could reach the pickers before anyone meant it to.
 *
 * The existing rows are switched off too, deliberately. That empties the native
 * and learning pickers until an admin ticks the boxes in
 * /admin/language-activation. Nothing else reads `is_active` — a learner
 * already enrolled keeps their course, their progress and their lessons, since
 * only the pickers filter on this flag.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->change();
        });

        DB::table('languages')->update(['is_active' => false]);
    }

    public function down(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->change();
        });

        DB::table('languages')->update(['is_active' => true]);
    }
};
