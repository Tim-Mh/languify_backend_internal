<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('family_groups', function (Blueprint $table) {
            $table->id();
            // One family group per paying user — the group's perks flow from
            // this user's own active `family` subscription (see User::activeSubscription()).
            $table->foreignId('owner_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('family_groups');
    }
};
