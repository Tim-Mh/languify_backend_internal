<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Records the specific calendar date (in the user's own timezone) that
     * a streak freeze covered, so the Activity Calendar can mark it
     * distinctly from an actually-completed lesson day. See
     * LessonProgressService::breakStreakIfMissed()/tryConsumeStreakFreeze().
     */
    public function up(): void
    {
        Schema::create('streak_freeze_uses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('freeze_date');
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['user_id', 'freeze_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('streak_freeze_uses');
    }
};
