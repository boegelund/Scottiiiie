<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function images()
    {
        return $this->belongsTo('App\Image');
    }
    
    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
    
    public function imageAccess()
    {
        return $this->belongsToMany('App\ImageAccess');
    }
}
