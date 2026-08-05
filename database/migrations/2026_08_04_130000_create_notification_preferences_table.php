<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Per-learner push settings, plus the counters that enforce the daily cap.
     *
     * One row per user with a column per category, rather than a row per
     * (user, category) pair: there are exactly six, they are read together on
     * every single send, and a wide row is one lookup instead of six.
     *
     * Everything defaults to on. A learner who has just granted the OS
     * permission has said yes; making them opt in a second time in-app would
     * mean nobody ever receives anything.
     */
    public function up(): void
    {
        Schema::create('notification_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            $table->boolean('reminders')->default(true);
            $table->boolean('rewards')->default(true);
            $table->boolean('league')->default(true);
            $table->boolean('progress')->default(true);
            $table->boolean('family')->default(true);
            $table->boolean('billing')->default(true);

            // The learner's local date the counters below belong to. Stored
            // rather than derived because "today" depends on user.timezone, and
            // a counter compared against the server's date would reset at the
            // wrong moment for most of the world.
            $table->date('sent_date')->nullable();
            // How many pushes have gone out on sent_date. Capped in PushPolicy.
            $table->unsignedSmallInteger('sent_count')->default(0);
            // Whether a nagging notification (see NotificationCategory::isNag)
            // has already gone out on sent_date. Separate from the count so one
            // reminder plus two reports is fine, but two reminders is not.
            $table->boolean('nag_sent')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_preferences');
    }
};
