<?php

namespace App\Models\Event\Traits;

use App\Models\Division\Division;
use App\Models\Season\Season;
use App\Models\Sport\Sport;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the user that owns the event.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the season that owns the event.
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the sport that owns the event.
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * The divisions that belong to the event.
     */
    public function divisions(): BelongsToMany
    {
        return $this->belongsToMany(Division::class);
    }

    /**
     * The teams that belong to the event.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }
}