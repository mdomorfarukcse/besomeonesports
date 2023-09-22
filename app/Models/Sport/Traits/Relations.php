<?php

namespace App\Models\Sport\Traits;

use App\Models\League\League;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the leagues for the sport.
     */
    public function leagues(): HasMany
    {
        return $this->hasMany(League::class);
    }
}