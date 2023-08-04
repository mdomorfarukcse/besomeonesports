<?php

namespace App\Models\Event\Registration;

use App\Models\Event\Registration\Traits\Relations;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegistration extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'player_id',
        'paid_by',
    ];
}
