<?php

namespace App\Models\Team;

use App\Models\Team\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory, Relations, CascadeSoftDeletes;

    protected $cascadeDeletes = [];
}
