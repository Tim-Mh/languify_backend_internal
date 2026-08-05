<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ad_images', function (Blueprint $table) {
            $table->id();
            // Admin-facing label only — never shown to end users.
            $table->string('title');
            // Relative path under the `public` disk (storage/app/public/...).
            $table->string('image_path');
            $table->unsignedInteger('order_number')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_images');
    }
};
