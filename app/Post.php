<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // MASS ASSIGNAMENT
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];
}
