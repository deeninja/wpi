<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // mass assign
    protected $fillable = [
        'user_id',
        'photo_ud',
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
}
