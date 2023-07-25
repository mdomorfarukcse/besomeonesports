<?php

namespace App\Models\Season\Traits;

use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the events for the sport.
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}