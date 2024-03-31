<?php

namespace App\Models\Gallery\Traits;

use App\Models\League\League;
use App\Models\Season\Season;
use App\Models\Sport\Sport;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the league that owns the gallery.
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
    /**
     * Get the league that owns the gallery.
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
    /**
     * Get the league that owns the gallery.
     */
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}