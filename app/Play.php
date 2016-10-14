<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{

    // mass assign
    protected $fillable = [
        'title',
        'photo_id',
        'abstract',
        'author1',
        'author2',
        'author3',
        'author4',
        'url',
    ];

    // define inverse 1:1 photo
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    // define M:M conferences
    public function conferences()
    {
        return $this->belongsToMany('App\Conference');

    }
}