<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * One view or click of an ad. Append-only, so there is no updated_at.
 */
#[Fillable(['ad_id', 'type', 'placement', 'user_id'])]
class AdEvent extends Model
{
    public const VIEW = 'view';

    public const CLICK = 'click';

    public const UPDATED_AT = null;
}
