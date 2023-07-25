<?php

namespace App\Models\Venue;

use App\Models\Venue\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venue extends Model
{
    use HasFactory, Relations, CascadeSoftDeletes;

    protected $cascadeDeletes = [];
}
