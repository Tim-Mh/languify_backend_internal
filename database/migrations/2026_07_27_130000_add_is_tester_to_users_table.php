<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Per-user "tester" flag, toggleable from the admin panel. A tester gets every
 * chapter, lesson, exercise, and trivia topic unlocked regardless of progress,
 * for walking the whole app on the live site. Complements the config-file
 * allowlist (config/app.php `tester_emails`) — User::isTester() returns true if
 * EITHER source marks the account, so existing config testers keep working and
 * admins can grant it ad hoc without a deploy.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_tester')->default(false)->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_tester');
        });
    }
};
