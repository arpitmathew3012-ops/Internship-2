<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
      protected $fillable = [
        'name',
        'release_date',
        'created_at',
        'updated_at'
    ];
}
