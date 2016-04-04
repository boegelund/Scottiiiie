<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the Image associated with the comment.
     */
    public function image()
    {
        return $this->hasOne('App\Image');
    }
    
    /**
     * Get the user associated with the comment.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
