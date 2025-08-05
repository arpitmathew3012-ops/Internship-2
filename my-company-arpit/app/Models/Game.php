<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'genre',
        'release_date',
        'image',
        'created_at',
        'updated_at'
    ];
}
