<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * RELATION WITH POST
     */
    public function posts() {
        return $this->belongsToMany('App\Post');
    } 
}
