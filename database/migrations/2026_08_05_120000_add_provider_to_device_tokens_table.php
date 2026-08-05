<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Which push service a token belongs to.
 *
 * The bare React Native build of the app registers raw FCM registration
 * tokens instead of Expo's wrapped ones, and the two are sent through
 * different APIs. Existing rows are all Expo by definition, which is what
 * the default preserves. Both kinds coexist in this table until the last
 * Expo build ages out, at which point the Expo path can be deleted.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('device_tokens', function (Blueprint $table) {
            // 'expo' or 'fcm'. A string rather than an enum so retiring the
            // Expo path later is a code change, not a schema change.
            $table->string('provider', 8)->default('expo')->after('token');
        });
    }

    public function down(): void
    {
        Schema::table('device_tokens', function (Blueprint $table) {
            $table->dropColumn('provider');
        });
    }
};
