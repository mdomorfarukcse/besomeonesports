<?php

namespace App\Models\Coach\Traits;

use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Get the teams for the coach.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}