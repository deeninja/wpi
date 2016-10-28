<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // mass assign
    protected $fillable = [
        'user_id',
        'photo_id',
        'category_id',
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

    public function category() {
        return $this->hasOne('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
}
