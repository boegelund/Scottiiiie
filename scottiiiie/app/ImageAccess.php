<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageAccess extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'image_access';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
