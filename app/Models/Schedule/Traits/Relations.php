<?php

namespace App\Models\Schedule\Traits;

use App\Models\Court\Court;
use App\Models\Event\Event;
use App\Models\Team\Team;
use App\Models\Venue\Venue;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * Get the event that owns the schedule.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the venue that owns the schedule.
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Get the court that owns the schedule.
     */
    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class);
    }

    /**
     * Get the teams for the schedule.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)
                    ->withPivot(['score', 'created_at', 'updated_at']);
    }

    /**
     * Get the winner for the event-schedule.
     */
    public function winner(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}