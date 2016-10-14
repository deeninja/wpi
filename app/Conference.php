<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    // mass assign
    protected $fillable = [
        'id',
        'photo_id',
        'year',
        'excerpt',
        'title',
        'details'
    ];

    // define relationship
    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    // define M:M plays relationship
    public function plays()
    {
        return $this->belongsToMany('App\Play');
        //return $this->belongsToMany('App\Play')->withPivot('conference_id','play_id');
    }

}
