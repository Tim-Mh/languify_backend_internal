<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_invites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_group_id')->constrained('family_groups')->cascadeOnDelete();
            $table->string('email');
            $table->string('token', 64)->unique();
            // pending | accepted | revoked | expired
            $table->string('status')->default('pending');
            $table->foreignId('invited_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('expires_at');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();

            $table->index(['family_group_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_invites');
    }
};
