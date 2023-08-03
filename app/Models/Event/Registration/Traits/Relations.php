<?php

namespace App\Models\Event\Registration\Traits;

use App\Models\Event\Event;
use App\Models\Player\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the event that owns the registration.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
   
    /**
     * Get the player that owns the registration.
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
   
    /**
     * Get the paidBy that owns the registration.
     */
    public function paidBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'paid_by', 'id');
    }
}