<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // mass assign
    protected $fillable = [
    'post_id',
    'name'
    ];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }
}
