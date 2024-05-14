<?php

namespace App\Models\League\Traits;

use App\Models\Division\Division;
use App\Models\Gallery\Gallery;
use App\Models\Player\Player;
use App\Models\Round\Round;
use App\Models\Schedule\Schedule;
use App\Models\Season\Season;
use App\Models\Sport\Sport;
use App\Models\Team\Team;
use App\Models\User;
use App\Models\Venue\Venue;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * Get the user that owns the league.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the season that owns the league.
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the sport that owns the league.
     */
    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * The teams that belong to the league.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * The referees that belong to the league.
     */
    public function referees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'league_referee', 'league_id', 'referee_id');
    }

    /**
     * The divisions that belong to the league.
     */
    public function divisions(): BelongsToMany
    {
        return $this->belongsToMany(Division::class);
    }

    /**
     * The venues that belong to the league.
     */
    public function venues(): BelongsToMany
    {
        return $this->belongsToMany(Venue::class);
    }

    /**
     * Get the players for the league.
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class)
                    ->withPivot(['paid_by', 'total_paid', 'transaction_id', 'invoice_number', 'created_at', 'updated_at']);
    }

    
    /**
     * The rounds that belong to the league.
     */
    public function rounds(): HasMany
    {
        return $this->hasMany(Round::class);
    }

    /**
     * The schedules that belong to the league.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * The galleries that belong to the league.
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}