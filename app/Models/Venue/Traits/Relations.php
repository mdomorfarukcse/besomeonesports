<?php

namespace App\Models\Venue\Traits;

use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * The events that belong to the division.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}