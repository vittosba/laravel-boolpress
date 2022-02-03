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
        'category_id'
    ];

    /**
     * RELATION WITH CATEGORY
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
