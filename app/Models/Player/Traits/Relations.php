<?php

namespace App\Models\Player\Traits;

use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * The teams that belong to the player.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }
}