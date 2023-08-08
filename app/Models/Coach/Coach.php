<?php

namespace App\Models\Coach;

use App\Models\Coach\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = ['user'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($coach) {
            // Prefix 'BSSCOACH' to the 'coach_id' attribute
            $coach->coach_id = 'BSSCOACH' . $coach->coach_id;
        });
    }
}
