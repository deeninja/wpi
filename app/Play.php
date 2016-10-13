<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{

    // mass assign
    protected $fillable = [
        'title',
        'abstract',
        'authors',
        'url',
    ];

    // define 1:1 conference
    public function conference()
    {
        return $this->hasOne('App\Conference');
    }
}
