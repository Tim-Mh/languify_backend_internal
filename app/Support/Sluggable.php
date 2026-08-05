<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Generates a unique slug for admin-created catalog rows whose `key` column
 * is an internal identifier, not something the admin should have to type.
 */
class Sluggable
{
    /**
     * @param  array<string, mixed>  $scope  Extra equality constraints (e.g. ['language_id' => 3])
     *                                       so uniqueness is checked within that scope rather than table-wide.
     */
    public static function unique(string $table, string $column, string $title, array $scope = []): string
    {
        $base = Str::slug($title) ?: 'item';
        $slug = $base;
        $suffix = 2;

        while (DB::table($table)->where($column, $slug)->where($scope)->exists()) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
