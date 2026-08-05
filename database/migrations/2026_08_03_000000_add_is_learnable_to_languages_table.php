<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Separates "you can learn this" from "the app speaks this".
 *
 * `is_active` alone could not express both: one list feeds the native-language
 * picker and the learning-language picker, so a UI language with no course
 * behind it could only be added by also offering an empty course. Turkish is
 * the first of those — the interface is fully translated, the 201-lesson course
 * is not written yet.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->boolean('is_learnable')->default(true)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->dropColumn('is_learnable');
        });
    }
};
