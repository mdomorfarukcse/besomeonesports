<?php

namespace App\Models\Message\Traits;

use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the Team that owns the Message.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the User that owns the Message.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}