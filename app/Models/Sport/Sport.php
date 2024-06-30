<?php

namespace App\Models\Sport;

use App\Models\Sport\Traits\Relations;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use HasFactory, Relations, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['leagues'];

    protected $fillable = ['name', 'description', 'status'];
}
