<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Singleton row holding admin-tunable ad behaviour. The only setting so
        // far is how long the lesson-complete interstitial stays up before the
        // learner can dismiss it. The sidebar rotation interval is fixed in the
        // frontend, so it lives in code rather than here.
        Schema::create('ad_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('interstitial_seconds')->default(10);
            $table->timestamps();
        });

        DB::table('ad_settings')->insert([
            'interstitial_seconds' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_settings');
    }
};
