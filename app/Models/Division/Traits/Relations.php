<?php

namespace App\Models\Division\Traits;

use App\Models\Event\Event;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * Get the teams for the division.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The events that belong to the division.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}