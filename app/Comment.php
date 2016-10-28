<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // mass assign
    protected $fillable = [
    'post_id',
    'name',
    'email',
    'content'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
