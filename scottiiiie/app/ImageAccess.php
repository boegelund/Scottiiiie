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
    
    /**
     * Using composite unique keys
     */
    protected $incrementing = false;
}
