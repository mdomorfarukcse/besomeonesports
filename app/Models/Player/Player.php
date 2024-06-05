<?php

namespace App\Models\Player;

use App\Models\Player\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = ['user'];

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($player) {
            // Prefix 'BSSPLAYER' to the 'player_id' attribute
            $player->player_id = 'BSSP' . $player->player_id;
        });
    }
}
