<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // mass assign
    protected $fillable = ['conference_id','name','created_by','status'];

    public function photos()
    {
        return $this->belongsToMany('App\Photo');
    }

    public function conference() {
        return $this->belongsTo('App\Conference');
    }
}
