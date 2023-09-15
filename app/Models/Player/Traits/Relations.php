<?php

namespace App\Models\Player\Traits;

use App\Models\Event\Event;
use App\Models\User;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * Get the user for the coach.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The teams that belong to the player.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Get the events for the player.
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}