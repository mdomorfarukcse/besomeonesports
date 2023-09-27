<?php

namespace App\Models\Player\Traits;

use App\Models\Division\Division;
use App\Models\League\League;
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
     * Get the division for the coach.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * The teams that belong to the player.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * Get the leagues for the player.
     */
    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class);
    }
}