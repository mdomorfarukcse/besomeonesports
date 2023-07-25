<?php

namespace App\Models\Event;

use App\Models\Event\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, Relations, CascadeSoftDeletes;

    protected $cascadeDeletes = [];
}
