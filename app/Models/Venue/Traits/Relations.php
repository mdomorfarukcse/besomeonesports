<?php

namespace App\Models\Venue\Traits;

use App\Models\Court\Court;
use App\Models\League\League;
use App\Models\Schedule\Schedule;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * The courts that belong to the venue.
     */
    public function courts(): HasMany
    {
        return $this->hasMany(Court::class);
    }
    
    /**
     * The leagues that belong to the venue.
     */
    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class);
    }

    /**
     * The schedules that belong to the venue.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}