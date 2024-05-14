<?php

namespace App\Models\Court;

use App\Models\Court\Traits\Relations;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Court extends Model
{
    use HasFactory, Relations, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = [];

    protected $fillable = [
        'venue_id',
        'name',
    ];
}
