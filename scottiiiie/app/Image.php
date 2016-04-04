<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
    
    /**
     * Get the comments for the image.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
