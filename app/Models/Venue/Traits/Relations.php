<?php

namespace App\Models\Venue\Traits;

use App\Models\Court\Court;
use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}