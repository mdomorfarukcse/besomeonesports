<?php

namespace App\Models\Coach\Traits;

use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the teams for the coach.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}