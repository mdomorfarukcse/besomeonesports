<?php

namespace App\Models\User\Traits;

use App\Models\Coach\Coach;
use App\Models\Player\Player;
use App\Models\Message\Message;
use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Get the players associated with the user(guardian).
     */
    public function players(): HasMany
    {
        return $this->hasOne(Player::class, 'guardian_id');
    }
    
    /**
     * The orders that belong to the user.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The Messages that belong to the team.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}