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
        'category_id',
        'cover',
    ];

    /**
     * RELATION WITH CATEGORY
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }

    /**
     * RELATION WITH TAG
     */
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
