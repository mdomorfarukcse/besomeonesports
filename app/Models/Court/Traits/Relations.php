<?php

namespace App\Models\Court\Traits;

use App\Models\Venue\Venue;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the venue that owns the court.
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
}