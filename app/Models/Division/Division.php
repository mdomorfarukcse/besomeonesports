<?php

namespace App\Models\Division;

use Illuminate\Database\Eloquent\Model;
use App\Models\Division\Traits\Relations;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, Relations, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = [];
}
