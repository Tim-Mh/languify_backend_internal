<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('proficiency_level')->nullable()->after('learning_language_id');
            $table->unsignedSmallInteger('streak_goal_days')->nullable()->after('proficiency_level');
            $table->string('password_reset_code')->nullable()->after('otp_expires_at');
            $table->timestamp('password_reset_expires_at')->nullable()->after('password_reset_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['proficiency_level', 'streak_goal_days', 'password_reset_code', 'password_reset_expires_at']);
        });
    }
};
