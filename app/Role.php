<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // mass assign
    protected $fillable = [
        'name'
    ];


    // 1:M relational join
    public function users()
    {
        return $this->belongsToMany('App\Role');
    }
}
