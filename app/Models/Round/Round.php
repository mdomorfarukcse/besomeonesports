<?php

namespace App\Models\Round;

use App\Models\Round\Traits\Relations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Round extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'league_id',
        'name'
    ];
}
