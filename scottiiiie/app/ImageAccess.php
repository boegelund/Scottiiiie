<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageAccess extends Model
{
    use SoftDeletes;
    
    protected $table = 'image_access';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
    
    protected $dates = ['deleted_at'];
}
