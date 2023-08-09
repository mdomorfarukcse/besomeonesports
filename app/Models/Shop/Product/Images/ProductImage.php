<?php

namespace App\Models\Shop\Product\Images;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\Shop\Product\Images\Traits\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = [];

    protected $fillable = [
        'path',
    ];
}
