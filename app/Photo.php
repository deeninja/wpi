<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // defining photo -- 1:1 --> user relationship (user can have 1 & only 1 photo)
    public function user() {

        return $this->belongsTo('App\User');

    }
}
