<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function imageAccess()
    {
        return $this->hasMany('App\ImageAccess');
    }
}
