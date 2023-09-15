<?php

namespace App\Models\Team\Traits;

use App\Models\Coach\Coach;
use App\Models\Event\Event;
use App\Models\Division\Division;
use App\Models\Player\Player;
use App\Models\Schedule\Schedule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * Get the event that owns the team.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    
    
    /**
     * Get the division that owns the team.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    
    /**
     * Get the coach that owns the team.
     */
    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    /**
     * The players that belong to the team.
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class);
    }

    
    /**
     * Get the schedules for the team.
     */
    public function schedules(): BelongsToMany
    {
        return $this->belongsToMany(Schedule::class)
                    ->withPivot(['status', 'score', 'created_at', 'updated_at']);
    }

    /**
     * Get the event-schedule for the team.
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}