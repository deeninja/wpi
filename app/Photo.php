<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $image_dir = '/images/';

    // accessor to get photo attribute & concatenate it's dir with it, which echos entire resource link.
    public function getPathAttribute($photo)
    {
        return $this->image_dir . $photo;
    }

    // mass assign.
    protected $fillable = ['path'];

    // defining photo -- 1:1 --> user relationship (user can have 1 & only 1 photo)
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
