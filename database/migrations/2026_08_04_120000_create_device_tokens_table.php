<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Where to reach a learner's device with a push notification.
     *
     * One row per device, not per user: a learner with a phone and a tablet
     * should get the notification on both. The Expo push token is the identity
     * of the device, so it is unique across the whole table rather than per
     * user — the same phone signed into a different account must MOVE, not
     * duplicate, or the previous account's streak reminders keep arriving for
     * whoever uses the phone next.
     */
    public function up(): void
    {
        Schema::create('device_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // An Expo token ("ExponentPushToken[...]") is well under 255, but
            // the column is the natural key so it carries the unique index.
            $table->string('token')->unique();
            // 'ios' or 'android'. Purely for support and analytics — sending is
            // identical for both, since Expo decides which of FCM/APNs to use
            // from the token itself.
            $table->string('platform', 16)->nullable();
            // Bumped every time the app re-registers, which is on every launch
            // of a signed-in session. A token that has not been seen for months
            // belongs to an app that was deleted, and is safe to prune.
            $table->timestamp('last_registered_at')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_tokens');
    }
};
