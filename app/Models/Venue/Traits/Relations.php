<?php

namespace App\Models\Venue\Traits;

use App\Models\Court\Court;
use App\Models\Event\Event;
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
     * The events that belong to the venue.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * The schedules that belong to the venue.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}