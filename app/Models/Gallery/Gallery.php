<?php

namespace App\Models\Gallery;

use App\Models\Gallery\Traits\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory, Relations;
}
