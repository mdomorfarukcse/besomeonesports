<?php

namespace App\Models\Round\Traits;

use App\Models\League\League;
use App\Models\Schedule\Schedule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the league for the round.
     */
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
    
    /**
     * Get the schedules for the round.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}