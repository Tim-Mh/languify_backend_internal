<?php

namespace App\Models;

use App\Enums\NotificationCategory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'reminders', 'rewards', 'league', 'progress', 'family', 'billing',
    'sent_date', 'sent_count', 'nag_sent',
])]
class NotificationPreference extends Model
{
    /**
     * Mirrors the migration's defaults. Eloquent does not re-read DB-applied
     * defaults after an insert, so a freshly created row would otherwise report
     * null for every toggle until the next full reload — and null reads as
     * "switched off" at the point it matters most, the learner's first day.
     */
    protected $attributes = [
        'reminders' => true,
        'rewards' => true,
        'league' => true,
        'progress' => true,
        'family' => true,
        'billing' => true,
        'sent_count' => 0,
        'nag_sent' => false,
    ];

    protected function casts(): array
    {
        return [
            'reminders' => 'boolean',
            'rewards' => 'boolean',
            'league' => 'boolean',
            'progress' => 'boolean',
            'family' => 'boolean',
            'billing' => 'boolean',
            'nag_sent' => 'boolean',
            'sent_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function allows(NotificationCategory $category): bool
    {
        return (bool) $this->{$category->value};
    }

    /** The toggles alone, in the shape the mobile settings screen reads. */
    public function toggles(): array
    {
        return array_combine(
            NotificationCategory::values(),
            array_map(fn (string $key) => (bool) $this->{$key}, NotificationCategory::values()),
        );
    }
}
