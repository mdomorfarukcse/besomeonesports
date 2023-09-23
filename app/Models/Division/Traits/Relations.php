<?php

namespace App\Models\Division\Traits;

use App\Models\League\League;
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
     * The leagues that belong to the division.
     */
    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class);
    }
}