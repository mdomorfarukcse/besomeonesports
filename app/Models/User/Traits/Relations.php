<?php

namespace App\Models\User\Traits;

use App\Models\Coach\Coach;
use App\Models\Player\Player;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}