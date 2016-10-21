<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // mass assignm
    protected $fillable = ['id','code','name'];

    // define 0:m user
    public function users()
    {
        return $this->belongsToMany('App\Country');
    }

}
