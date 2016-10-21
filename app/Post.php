<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // mass assign
    protected $fillable = [
        'user_id',
        'photo_id',
        'title',
        'date',
        'body',
        'url'
    ];

    // define 1:1 user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
