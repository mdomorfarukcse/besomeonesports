<?php

namespace App\Models\Gallery\Traits;

use App\Models\League\League;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the league that owns the gallery.
     */
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}