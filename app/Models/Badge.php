<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'key', 'category', 'title', 'description', 'tier', 'gems_reward', 'xp_reward', 'hearts_reward', 'image_path',
    'requirement_type', 'requirement_value', 'is_active', 'order_number',
])]
class Badge extends Model
{
    public const CATEGORIES = ['streak', 'xp', 'lesson'];

    /**
     * Valid requirement_type values — single source for the admin form's
     * validation. IMPORTANT: every value here MUST have a matching arm in
     * LessonProgressService::checkNewBadges()'s `match`; a value validated
     * here but unhandled there silently evaluates to false, making the badge
     * impossible to ever earn. Keep the two in lockstep.
     */
    public const REQUIREMENT_TYPES = [
        'streak', 'total_xp', 'total_lessons_completed',
        'perfect_lessons', 'units_completed_count', 'max_lessons_in_a_day', 'chapter_complete',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * What the learner gets on claiming this badge.
     *
     * @return array{gems: int, xp: int, hearts: int}
     */
    public function reward(): array
    {
        return ['gems' => (int) $this->gems_reward, 'xp' => (int) $this->xp_reward, 'hearts' => (int) $this->hearts_reward];
    }

    /**
     * The image an admin uploaded for this badge, else the same artwork the
     * web app uses (one image per category and tier), else null.
     */
    public function imageUrl(): ?string
    {
        if ($this->image_path) {
            return Storage::disk('public')->url($this->image_path);
        }

        $path = 'images/badges/'.$this->category.'-'.strtolower((string) $this->tier).'.webp';

        return is_file(public_path($path)) ? asset($path) : null;
    }
}
