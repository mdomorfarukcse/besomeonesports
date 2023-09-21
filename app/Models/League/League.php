<?php

namespace App\Models\League;

use App\Models\League\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use HasFactory, Relations, SoftDeletes, CascadeSoftDeletes;

    // protected $cascadeDeletes = ['divisions', 'players'];
    protected $cascadeDeletes = [];
}
