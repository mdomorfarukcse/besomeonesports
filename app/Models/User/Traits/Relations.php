<?php

namespace App\Models\User\Traits;

use App\Models\Coach\Coach;
use App\Models\League\League;
use App\Models\Player\Player;
use App\Models\Message\Message;
use App\Models\Schedule\Schedule;
use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->hasMany(Player::class, 'guardian_id');
    }
    

    /**
     * The leagues that belong to the referee(user).
     */
    public function leagues(): BelongsToMany
    {
        return $this->belongsToMany(League::class, 'league_referee', 'referee_id', 'league_id');
    }
    
    /**
     * The schedules that belong to the user.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'referee_id');
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