<?php

namespace App\Models\User\Traits;

use App\Models\Coach\Coach;
use App\Models\Player\Player;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Event\Registration\EventRegistration;

trait Relations
{
    /**
     * Get the coach associated with the user.
     */
    public function coach(): HasOne
    {
        return $this->hasOne(Coach::class);
    }
    
    /**
     * Get the player associated with the user.
     */
    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    /**
     * Get the registrations (paid by) for the user.
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }
}