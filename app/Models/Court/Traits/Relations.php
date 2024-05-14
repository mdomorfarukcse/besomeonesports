<?php

namespace App\Models\Court\Traits;

use App\Models\Venue\Venue;
use App\Models\Schedule\Schedule;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    /**
     * The schedules that belong to the court.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}