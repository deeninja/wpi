<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

   /* protected $image_dir_main = '/images/';
    protected $image_dir_plays = '/images/plays';

    // accessor to get photo attribute & concatenate it's dir with it, which echos entire resource link.
    public function getPathAttribute($photo, $dir)
    {
        return $dir . $photo;
    }*/

    // mass assign.
    protected $fillable = ['id','path'];

    // defining photo -- 1:1 --> user relationship (user can have 1 & only 1 photo)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // define 1:1 relationship with photo model
    public function conference()
    {
        return $this->belongsTo('App\Conference');
    }

    public function play()
    {
        return $this->hasOne('App\Play');
    }
}
