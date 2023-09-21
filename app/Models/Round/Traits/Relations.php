<?php

namespace App\Models\Round\Traits;

use App\Models\League\League;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the league for the round.
     */
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}